<?php

namespace App\Core;

class Routes
{
    private $routes = [];

    /**
     * Ajoute une route.
     * 
     * @param string $url URL de la route.
     * @param string $controller Nom du contrôleur.
     * @param string $method Nom de la méthode à appeler dans le contrôleur.
     * @param array $params Paramètres optionnels pour la route (comme les valeurs par défaut).
     */
    public function add(string $name, string $url, string $controller, string $method, array $params = [], String $perm = '', $inMenu = false, array $child = [])
    {
        // Normaliser le chemin et définir les paramètres dynamiques
        $this->routes[] = [
            'name' => $name,
            'url' => $this->normalizePath($url),
            'controller' => $controller,
            'method' => $method,
            'params' => $params,
            'perm' => $perm,
            'inMenu' => $inMenu,
            'children' => $child
        ];
    }
    
    /**
     * Trouve la route correspondante à une URL.
     * 
     * @param string $url URL de la requête.
     * @return array|null Retourne la route correspondante ou null si aucune ne correspond.
     */
    public function find(string $url): ?array
    {
        $normalizedUrl = $this->normalizePath($url);

        foreach ($this->routes as $route) 
        {
            // Construire un modèle de l'URL avec des paramètres dynamiques
            $routePattern = preg_replace('/{([a-zA-Z0-9_-]+)}/', '([^/]+)', $route['url']);
            if (preg_match('#^' . $routePattern . '$#', $normalizedUrl, $matches)) 
            {
                // Supprimer la première correspondance (l'URL elle-même)
                array_shift($matches);

                // Extraire les noms des paramètres dynamiques dans l'URL (par exemple: page)
                $paramNames = $this->extractParamNames($route['url']);

                // Associer les valeurs capturées aux paramètres
                $params = [];
                foreach ($matches as $index => $match) 
                {
                    $params[$paramNames[$index]] = $match; // Ex. 'page' => '5'
                }

                // Ajouter les paramètres capturés à la route
                $route['params'] = array_merge($route['params'], $params);

                return $route;
            }
        }

        return null; // Aucune route trouvée
    }

    // Fonction pour extraire les noms des paramètres dynamiques de l'URL (exemple: {page})
    private function extractParamNames(string $url): array
    {
        preg_match_all('/{([a-zA-Z0-9_-]+)}/', $url, $matches);
        return $matches[1]; // Renvoie les noms des paramètres (par exemple, ['page'])
    }


    /**
     * Normalise un chemin d'URL (supprime les slashs en trop).
     * 
     * @param string $path
     * @return string
     */
    private function normalizePath(string $path): string
    {
        return '/' . trim($path, '/');
    }

    /**
     * Retourne toutes les routes enregistrées.
     * 
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
