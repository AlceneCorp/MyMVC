<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Managers\VisitorManager;

class AjaxController extends Controller
{
	public function ajaxAdminDashboard()
    {
        // Connexion à la base de données via votre manager
        $visitorManager = new VisitorManager();

        // Récupérer les logs des visiteurs pour le graphique 1 (Nombre de visiteurs par mois)
        $visitor_logs = $visitorManager->findAllVisitor([], ['GROUP BY' => 'IP_ADDRESS']);

        // Récupérer les logs des visiteurs pour le graphique 2 (Pages visitées par mois)
        $page_visits_logs = $visitorManager->findAllVisitor([], ['ORDER BY' => 'PAGE_VISITED ASC', 'GROUP BY' => 'IP_ADDRESS, PAGE_VISITED']);

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
        foreach ($visitor_logs as $log) {
            // Convertir la date de la visite en format "mois"
            $visit_date = new \DateTime($log->getVISIT_DATE());
            $month = $visit_date->format('m'); // Format mois (01 à 12)

            // Comptabiliser les visiteurs par mois
            if (!isset($visitor_counts[$month])) {
                $visitor_counts[$month] = 0;
            }
            $visitor_counts[$month]++;
        }

        // 2. Traitement des logs pour le graphique 2 (Pages visitées par mois)
        foreach ($page_visits_logs as $log) {
            // Convertir la date de la visite en format "mois"
            $visit_date = new \DateTime($log->getVISIT_DATE());
            $month = $visit_date->format('m'); // Format mois (01 à 12)

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
        foreach ($months as $month) {
            $visitor_counts_data[] = isset($visitor_counts[$month]) ? $visitor_counts[$month] : 0;
        }

        // Préparer les données pour le graphique 2 (Pages visitées par mois)
        $page_visits_data = [];
        $page_names = []; // Liste des pages visitées
        foreach ($months as $month) {
            // Ajouter les pages visitées de ce mois
            if (isset($page_visits_by_month[$month])) {
                foreach ($page_visits_by_month[$month] as $page => $count) {
                    if (!in_array($page, $page_names)) {
                        $page_names[] = $page;
                    }
                }
                $page_visits_data[] = $page_visits_by_month[$month];
            } else {
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


}