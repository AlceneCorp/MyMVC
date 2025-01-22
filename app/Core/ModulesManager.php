<?php

namespace App\Core;

use App\Core\CoreManager;

class ModulesManager
{
    private static string $modulesPath = __DIR__ . '/../Modules/';

    /**
        * Détecte les modules présents dans le répertoire des modules et récupère leur configuration.
        *
        * @return array Liste des modules avec leur configuration.
        */
    public static function detectModules(): array
    {
        $modules = [];

        foreach (glob(self::$modulesPath . '*', GLOB_ONLYDIR) as $moduleDir) {
            $moduleName = basename($moduleDir);
            $configPath = $moduleDir . '/config/config.php';

            // Charger la configuration si le fichier existe
            if (file_exists($configPath)) {
                $config = require $configPath;
                $modules[] = $config;
            } 
            else 
            {
                // Ajouter un module avec une configuration par défaut s'il n'a pas de config
                $modules[] = [
                    'name' => [
                        'value' => $moduleName,
                        'type' => 'text',
                        'description' => 'Module sans configuration.',
                        'readonly' => true
                    ],
                    'active' => [
                        'value' => false,
                        'type' => 'boolean',
                        'description' => 'Statut par défaut du module.',
                        'readonly' => false
                    ]
                ];
            }
        }

        return $modules;
    }

    /**
     * Charge la configuration d'un module.
     *
     * @param string $moduleName Le nom du module.
     * @return array La configuration du module.
     * @throws \Exception Si le fichier de configuration n'existe pas.
     */
    public static function getModuleConfig(string $moduleName): array
    {
        $configPath = self::getConfigPath($moduleName);

        if (!file_exists($configPath)) {
            throw new \Exception("La configuration du module {$moduleName} est introuvable.");
        }

        return include $configPath;
    }

    /**
     * Active ou désactive un module.
     *
     * @param string $moduleName Le nom du module.
     * @param bool $active Indique si le module doit être activé (true) ou désactivé (false).
     * @return bool Retourne true si l'état a été mis à jour avec succès.
     * @throws \Exception Si le fichier de configuration, le champ 'active' ou le contrôleur principal n'existe pas.
     */
    public static function setModuleActive(string $moduleName, bool $active): bool
    {
        $configPath = self::getConfigPath($moduleName);


        if (!file_exists($configPath)) 
        {
            throw new \Exception("La configuration du module {$moduleName} est introuvable.");
        }

        $config = include $configPath;

        if (!isset($config[$moduleName]['active'])) 
        {
            throw new \Exception("Le champ 'active' est introuvable dans la configuration du module {$moduleName}.");
        }

        // Détecte le contrôleur principal
        $controllerPath = __DIR__ . "\\..\\Modules\\{$moduleName}\\Controllers\\{$moduleName}Controller.php";

        if (!file_exists($controllerPath)) 
        {
            throw new \Exception("Le contrôleur principal du module {$moduleName} est introuvable.");
        }

        // Inclut dynamiquement le contrôleur principal
        include_once $controllerPath;

        $controllerClass = "App\\Modules\\{$moduleName}\\Controllers\\{$moduleName}Controller";

        

        if (!class_exists($controllerClass)) 
        {
            throw new \Exception("La classe {$controllerClass} est introuvable.");
        }
        
        $controllerInstance = new $controllerClass(CoreManager::getTwig());

        
        // Vérifie et exécute les méthodes install() et uninstall() en fonction de l'état
        if ($active && method_exists($controllerInstance, 'install')) 
        {
            $controllerInstance->install();
        } 
        elseif (!$active && method_exists($controllerInstance, 'uninstall')) 
        {
            $controllerInstance->uninstall();
        }

        // Met à jour uniquement l'état actif dans la configuration
        $config[$moduleName]['active']['value'] = $active;

        // Réécrit la configuration
        $exportedConfig = "<?php\n\nreturn " . var_export($config, true) . ";\n";
        return file_put_contents($configPath, $exportedConfig) !== false;
    }

    /**
     * Charge les routes d'un module.
     *
     * @param string $moduleName Le nom du module.
     * @return array Les routes du module.
     * @throws \Exception Si le fichier de routes n'existe pas.
     */
    public static function getModuleRoutes(string $moduleName): array
    {
        $routesPath = self::getRoutesPath($moduleName);

        if (!file_exists($routesPath)) {
            throw new \Exception("Les routes du module {$moduleName} sont introuvables.");
        }

        return include $routesPath;
    }

    /**
     * Génère le chemin vers le fichier de configuration d'un module.
     *
     * @param string $moduleName Le nom du module.
     * @return string Le chemin du fichier de configuration.
     */
    private static function getConfigPath(string $moduleName): string
    {
        return self::$modulesPath . $moduleName . '/config/config.php';
    }

    /**
     * Génère le chemin vers le fichier de routes d'un module.
     *
     * @param string $moduleName Le nom du module.
     * @return string Le chemin du fichier de routes.
     */
    private static function getRoutesPath(string $moduleName): string
    {
        return self::$modulesPath . $moduleName . '/config/routes.php';
    }
}
