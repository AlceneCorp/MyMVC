<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\CoreManager;
use App\Core\SessionsManager;

use App\Managers\VisitorManager;
use App\Managers\LogsManager;


class AjaxController extends Controller
{
	public function ajaxAdminDashboard()
    {
        // Connexion à la base de données via votre manager
        $visitorManager = new VisitorManager();
        
        $currentYear = date('Y');

        // Récupérer les logs des visiteurs pour le graphique 1 (Nombre de visiteurs par mois)
        $visitor_logs = $visitorManager->findAllVisitor(['YEAR(VISIT_DATE)' => $currentYear], ['GROUP BY' => 'IP_ADDRESS, MONTH(VISIT_DATE)']);

        // Récupérer les logs des visiteurs pour le graphique 2 (Pages visitées par mois)
        $page_visits_logs = $visitorManager->findAllVisitor(['YEAR(VISIT_DATE)' => $currentYear], ['ORDER BY' => 'PAGE_VISITED ASC', 'GROUP BY' => 'IP_ADDRESS, PAGE_VISITED, MONTH(VISIT_DATE)']);

        // Initialiser les tableaux pour les données de visites
        $visitor_counts = [];
        $page_visits_by_month = [];

        // Liste des noms des mois
        $month_names = [
            1 => 'Janvier', 
            2 => 'Février', 
            3 => 'Mars', 
            4 => 'Avril', 
            5 => 'Mai', 
            6 => 'Juin',
            7 => 'Juillet', 
            8 => 'Août', 
            9 => 'Septembre', 
            10 => 'Octobre', 
            11 => 'Novembre', 
            12 => 'Décembre'
        ];


        // 1. Traitement des logs pour le graphique 1 (Nombre de visiteurs par mois)
        foreach ($visitor_logs as $log) 
        {
            // Convertir la date de la visite en format "mois"
            $visit_date = new \DateTime($log->getVISIT_DATE());
            $month = (int) $visit_date->format('m'); // Format mois (01 à 12)


            // Comptabiliser les visiteurs par mois
            if (!isset($visitor_counts[$month])) 
            {
                $visitor_counts[$month] = 0;
            }
            $visitor_counts[$month]++;
        }

        // 2. Traitement des logs pour le graphique 2 (Pages visitées par mois)
        foreach ($page_visits_logs as $log) 
        {
            // Convertir la date de la visite en format "mois"
            $visit_date = new \DateTime($log->getVISIT_DATE());
            $month = (int) $visit_date->format('m'); // Format mois (01 à 12)

            // Comptabiliser les pages visitées par mois
            $page_visited = $log->getPAGE_VISITED(); // Récupérer la page visitée
            if (!isset($page_visits_by_month[$month])) {
                $page_visits_by_month[$month] = [];
            }
            if (!isset($page_visits_by_month[$month][$page_visited])) {
                $page_visits_by_month[$month][$page_visited] = 0;
            }
            $page_visits_by_month[$month][$page_visited]++;
        }

        // Préparer les données pour le graphique 1 (Nombre de visiteurs par mois)
        $months = array_keys($month_names); // Liste des mois sous forme de nombres (1 à 12)
        $month_labels = array_values($month_names); // Liste des noms des mois
        $visitor_counts_data = [];

        // Remplir les données pour chaque mois (si aucun visiteur pour le mois, mettre 0)
        foreach ($months as $month) 
        {
            $visitor_counts_data[] = isset($visitor_counts[$month]) ? $visitor_counts[$month] : 0;
        }

        // Préparer les données pour le graphique 2 (Pages visitées par mois)
        $page_visits_data = [];
        $page_names = []; // Liste des pages visitées
        foreach ($months as $month) 
        {
            // Ajouter les pages visitées de ce mois
            if (isset($page_visits_by_month[$month])) 
            {
                foreach ($page_visits_by_month[$month] as $page => $count) 
                {
                    if (!in_array($page, $page_names) && (substr_count($page, '/') == 1 || substr_count($page, '/') == 0)) 
                    {
                        $page_names[] = $page;
                    }
                }
                $page_visits_data[] = $page_visits_by_month[$month];
            } 
            else 
            {
                $page_visits_data[] = [];
            }
        }

        // Retourner les données au format JSON pour chaque graphique
        echo json_encode([
            'visitor_graph' => [
                'months' => $month_labels,
                'visitor_counts' => $visitor_counts_data
            ],
            'page_visits_graph' => [
                'months' => $month_labels,
                'page_names' => $page_names, // Les noms des pages
                'page_visits_data' => $page_visits_data // Visites des pages par mois
            ]
        ]);
    }

    public function clearLogs()
    {
        $logsManager = new LogsManager();
        $logsManager->truncateLogs();                // méthode que tu devras ajouter
        CoreManager::addLogs('SUCCESS', 'APPLICATION', 'Tous les logs ont été supprimés.');

        SessionsManager::setFlash('message', 'Tous les logs ont été supprimés avec succès.');
        SessionsManager::setFlash('messageType', 'success');


        $this->redirect(URL . '/admin/dashboard'); 
    }

    public function ajaxLogsSummary()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $logsManager = new LogsManager();

            // Ordre voulu des niveaux
            $levels = ['SUCCESS','DEBUG','INFO','WARNING','ERROR','CRITICAL'];

            $counts = [];
            foreach ($levels as $lvl) {
                $counts[$lvl] = (int) $logsManager->countLogs(['LEVEL' => $lvl]);
            }

            echo json_encode(['ok' => true, 'counts' => $counts]);
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode(['ok' => false, 'message' => $e->getMessage()]);
        }
    }

    public function ajaxLogsLast()
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            // Lis d'abord POST (routeurs sensibles aux query strings), puis GET en fallback
            $level = isset($_POST['level']) ? strtoupper(trim($_POST['level']))
                   : (isset($_GET['level']) ? strtoupper(trim($_GET['level'])) : 'ERROR');

            $limit = isset($_POST['limit']) ? max(1, (int) $_POST['limit'])
                   : (isset($_GET['limit']) ? max(1, (int) $_GET['limit']) : 10);

            // (Optionnel) Vérification CSRF
            // if (!CoreManager::checkCsrf($_POST['csrf_token'] ?? null)) {
            //     http_response_code(403);
            //     echo json_encode(['ok' => false, 'message' => 'CSRF token invalide']);
            //     return;
            // }

            // Sécurité du niveau demandé
            $allowed = ['SUCCESS', 'DEBUG','INFO','WARNING','ERROR','CRITICAL'];
            if (!in_array($level, $allowed, true)) 
            {
                $level = 'ERROR';
            }

            $logsManager = new LogsManager();
            $logs = $logsManager->findAllLogs(
                ['LEVEL' => $level],
                ['ORDER BY' => 'ID DESC', 'LIMIT' => (string)$limit]
            );

            // Normalise la réponse
            $data = [];
            foreach ($logs as $log) {
                $data[] = [
                    'ID'       => method_exists($log, 'getID') ? $log->getID() : null,
                    'LEVEL'    => method_exists($log, 'getLEVEL') ? $log->getLEVEL() : $level,
                    'CATEGORY' => method_exists($log, 'getCATEGORY') ? $log->getCATEGORY() : '',
                    'MESSAGE'  => method_exists($log, 'getMESSAGE') ? $log->getMESSAGE() : '',
                ];
            }

            echo json_encode(['ok' => true, 'data' => $data]);
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode(['ok' => false, 'message' => $e->getMessage()]);
        }
    }

    public function exportLogs()
    {
        try {
            $format = isset($_POST['format']) ? strtolower($_POST['format'])
                    : (isset($_GET['format']) ? strtolower($_GET['format']) : 'csv');

            $level  = isset($_POST['level']) ? strtoupper(trim($_POST['level']))
                    : (isset($_GET['level']) ? strtoupper(trim($_GET['level'])) : null);

            $limit  = isset($_POST['limit']) ? max(1, (int)$_POST['limit'])
                    : (isset($_GET['limit']) ? max(1, (int)$_GET['limit']) : 100);

            // (Optionnel) CSRF ici aussi

            $allowed = ['DEBUG','INFO','WARNING','ERROR','CRITICAL'];
            if ($level !== null && !in_array($level, $allowed, true)) {
                $level = null; // ignore filtre invalide
            }

            $logsManager = new LogsManager();
            $where = [];
            if ($level) { $where['LEVEL'] = $level; }

            $logs = $logsManager->findAllLogs($where, ['ORDER BY' => 'ID DESC', 'LIMIT' => (string)$limit]);

            $rows = [];
            foreach ($logs as $log) {
                $rows[] = [
                    'ID'       => method_exists($log, 'getID') ? $log->getID() : null,
                    'LEVEL'    => method_exists($log, 'getLEVEL') ? $log->getLEVEL() : '',
                    'CATEGORY' => method_exists($log, 'getCATEGORY') ? $log->getCATEGORY() : '',
                    'MESSAGE'  => method_exists($log, 'getMESSAGE') ? $log->getMESSAGE() : '',
                ];
            }

            $filenameBase = 'logs_export_' . date('Ymd_His');

            if ($format === 'json') {
                header('Content-Type: application/json; charset=utf-8');
                header('Content-Disposition: attachment; filename="'.$filenameBase.'.json"');
                echo json_encode($rows, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                return;
            }

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="'.$filenameBase.'.csv"');
            $out = fopen('php://output', 'w');
            fputcsv($out, ['ID','LEVEL','CATEGORY','MESSAGE'], ';');
            foreach ($rows as $r) {
                $msg = str_replace(["\r","\n"], ['\\r','\\n'], (string)$r['MESSAGE']);
                fputcsv($out, [$r['ID'], $r['LEVEL'], $r['CATEGORY'], $msg], ';');
            }
            fclose($out);
        } catch (\Throwable $e) {
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(500);
            echo json_encode(['ok' => false, 'message' => $e->getMessage()]);
        }
    }

}