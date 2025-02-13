<?php

namespace App\Core;

use PDO;
use Exception;

use App\Core\CoreManager;
use App\Core\ConfigManager;
use App\Core\ErrorManager;

class DatabaseManager
{
    /**
     * Instance de PDO.
     * @var PDO
     */
    private PDO $pdo;

    protected array $coreTables = 
    [
        'contacts',
        'logs',
        'permissions',
        'settings',
        'settings_categories',
        'users',
        'users_permissions',
        'users_profile',
        'visitor'
    ];

    /**
     * Constructeur du DatabaseManager.
     *
     * @param string $dsn Data Source Name pour la connexion.
     * @param string $username Nom d'utilisateur de la base de données.
     * @param string $password Mot de passe de la base de données.
     * @param array $options Options pour la connexion PDO.
     */
    public function __construct()
    {
        try 
        {
            $host = ConfigManager::get('DATABASE.host.value');
            $db = ConfigManager::get('DATABASE.dbname.value');
            $user = ConfigManager::get('DATABASE.username.value');
            $password = ConfigManager::get('DATABASE.password.value');
            $charset = ConfigManager::get('DATABASE.charset.value');

            // Exemple pour MySQL
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } 
        catch (PDOException $e) 
        {
            CoreManager::addLogs('APPLICATION', 'WARNING', 'Erreur de connexion à la base de données: ' . $e->getMessage());
            throw new Exception('Erreur de connexion à la base de données: ' . $e->getMessage());
        }
        catch (Exception $e)
        {
            CoreManager::addLogs('APPLICATION', 'WARNING', 'Erreur de connexion à la base de données: ' . $e->getMessage());
            throw new Exception('Erreur de connexion à la base de données: ' . $e->getMessage());
        }
    }

    /**
     * Récupère l'objet PDO pour la connexion à la base de données.
     *
     * @return PDO L'objet PDO de connexion à la base de données.
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * Génère une clause SQL à partir des paramètres fournis.
     *
     * @param array $parameters Paramètres incluant orderBy, groupBy, limit, etc.
     * @return string Clause SQL générée.
     */
    private function buildQueryParameters(array $parameters): string
    {
        $sql = '';

        // Vérifier la présence de GROUP BY
        if (isset($parameters['GROUP BY'])) {
            $sql .= ' GROUP BY ' . $parameters['GROUP BY'];
        }

        // Vérifier la présence de ORDER BY
        if (isset($parameters['ORDER BY'])) {
            $sql .= ' ORDER BY ' . $parameters['ORDER BY'];
        }

        // Vérifier la présence de LIMIT
        if (isset($parameters['LIMIT'])) {
            $sql .= ' LIMIT ' . $parameters['LIMIT'];
        }

        // Ajouter le paramètre OFFSET si présent
        if (isset($parameters['OFFSET'])) {
            $sql .= ' OFFSET ' . $parameters['OFFSET'];
        }

        return $sql;
    }

    /**
     * Trouve une seule entrée dans une table.
     *
     * @param string $table Nom de la table.
     * @param string $classObject Nom de la classe à utiliser pour l'objet résultant.
     * @param array $key Conditions WHERE (clé => valeur).
     * @param array $parameters Paramètres pour ORDER BY, LIMIT, etc.
     * @return object|null Instance de l'objet ou null si aucune entrée trouvée.
     */
    public function findOne(string $table, string $classObject, array $key = [], array $parameters = []): ?object
    {
        $sql = "SELECT * FROM $table";
        $where = [];
        $bindValues = [];

        foreach ($key as $column => $value) 
        {
            $where[] = "$column = :$column";
            $bindValues[$column] = $value;
        }

        if ($where) 
        {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        $sql .= $this->buildQueryParameters($parameters);

        $statement = $this->pdo->prepare($sql);
        $statement->execute($bindValues);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // Si aucun résultat, retourner null
        if (!$result) 
        {
            return null;
        }

        // Hydratation manuelle de l'objet
        return new $classObject($result);
    }

    public function findOneSign(string $table, string $classObject, array $conditions = [], array $parameters = []): ?object
    {
        $sql = "SELECT * FROM $table";
        $where = [];
        $bindValues = [];

        foreach ($conditions as $condition) 
        {
            $column = $condition[0];
            $operator = $condition[1];
            $value = $condition[2];

            // Sanitisation de la colonne avant d'ajouter la condition
            $column = $this->sanitizeColumnList($column);

            // Ajoute la condition à la clause WHERE
            $where[] = "$column $operator :$column";
            $bindValues[":$column"] = $value;
        }

        // Ajouter WHERE si nécessaire
        if (!empty($where)) 
        {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        // Ajouter les autres paramètres comme ORDER BY, LIMIT, etc.
        $sql .= $this->buildQueryParameters($parameters);

        try 
        {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($bindValues);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$result) 
            {
                return null;
            }

            // Hydratation de l'objet
            return new $classObject($result);
        } 
        catch (PDOException $e) 
        {
            throw new Exception('Erreur lors de l\'exécution de la requête : ' . $e->getMessage());
        }
    }

    /**
     * Trouve toutes les entrées dans une table.
     *
     * @param string $table Nom de la table.
     * @param string $classObject Nom de la classe à utiliser pour les objets résultants.
     * @param array $key Conditions WHERE (clé => valeur).
     * @param array $parameters Paramètres pour ORDER BY, LIMIT, etc.
     * @return array Liste d'instances de l'objet.
     */
    public function findAll(string $table, string $classObject, array $key = [], array $parameters = []): array
    {
        $sql = "SELECT * FROM $table";
        $where = [];
        $bindValues = [];

        // Construction des conditions WHERE
        foreach ($key as $condition => $value) 
        {
            if (strpos($condition, '(') !== false || strpos($condition, ' ') !== false) 
            {
                // Conditions complexes (avec fonctions ou opérateurs)
                $where[] = "$condition = ?";
                $bindValues[] = $value; // Ajout comme paramètre positionnel
            } 
            else 
            {
                // Conditions simples avec paramètres nommés
                $where[] = "$condition = :$condition";
                $bindValues[":$condition"] = $value;
            }
        }

        // Ajouter WHERE si nécessaire
        if (!empty($where)) 
        {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        // Ajouter les paramètres supplémentaires (ORDER BY, GROUP BY, LIMIT, etc.)
        $sql .= $this->buildQueryParameters($parameters);

        // Préparation et exécution de la requête
        $statement = $this->pdo->prepare($sql);
        $statement->execute($bindValues);

        // Récupération des résultats
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Hydratation manuelle des objets
        $objects = [];
        foreach ($results as $data) 
        {
            $objects[] = new $classObject($data);
        }

        return $objects;
    }

    /**
     * Insère une ligne dans une table.
     *
     * @param string $table Nom de la table.
     * @param array $data Données à insérer (clé => valeur).
     * @return int ID de la dernière ligne insérée.
     */
    public function insert(string $table, array $data): int
    {
        try
        {
            $columns = implode(', ', array_map(function($column) 
            {
                return "`$column`"; // Utilisation des backticks pour chaque colonne
            }, array_keys($data)));
            $placeholders = ':' . implode(', :', array_keys($data));
            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";


            $statement = $this->pdo->prepare($sql);
            

            $statement->execute($data);

        }
        catch (Exception $e)
        {
            CoreManager::addLogs('APPLICATION', 'WARNING', 'DatabaseManager::insert() : ' . $e->getMessage());
            return false;
        }
        catch(PDOException $e)
        {
            CoreManager::addLogs('APPLICATION', 'WARNING', 'DatabaseManager::insert() : ' . $e->getMessage());
            throw new Exception($e->getMessage());
        }


        return (int) $this->pdo->lastInsertId();
    }

    /**
     * Met à jour des lignes dans une table.
     *
     * @param string $table Nom de la table.
     * @param array $data Données à mettre à jour (clé => valeur).
     * @param array $where Conditions WHERE (facultatif si la clé primaire est dans $data).
     * @return int Nombre de lignes affectées.
     * @throws Exception Si la clé primaire n'est pas présente dans les données.
     */
    public function update(string $table, array $data, $param_id): int
    {
        try
        {
            // Récupérer la clé primaire avec auto-incrément
            $primaryKey = $this->getPrimaryKey($table);

            // Si aucune clé primaire auto-incrémentée n'est trouvée, on ne fait rien
            if ($primaryKey === null) 
            {
                // Aucun champ mis à jour
                return 0;
            }

            // Vérifier que $param_id est défini
            if (empty($param_id)) 
            {
                CoreManager::addLogs('APPLICATION', 'WARNING', 'DatabaseManager::update() : ' . "Aucune valeur pour la clé primaire '$primaryKey' n'a été fournie.");
                throw new Exception("Aucune valeur pour la clé primaire '$primaryKey' n'a été fournie.");
            }

            // Construire la clause SET
            $setClauses = [];
            foreach ($data as $key => $value) 
            {
                $setClauses[] = "`$key` = :$key";
            }

            // Construction de la requête SQL avec WHERE sur la clé primaire
            $sql = sprintf(
                'UPDATE `%s` SET %s WHERE `%s` = :primary_key',
                $table,
                implode(', ', $setClauses),
                $primaryKey
            );

            CoreManager::addLogs('DEBUG', 'WARNING', 'DatabaseManager::update() : ' . $sql);

            // Ajouter le paramètre pour la clé primaire
            $data['primary_key'] = $param_id;


            // Préparer et exécuter la requête
            $statement = $this->pdo->prepare($sql);
            $statement->execute($data);
        }
        catch (PDOException $e)
        {
            CoreManager::addLogs('APPLICATION', 'WARNING', 'DatabaseManager::update() : ' . $e->getMessage());
        }

        // Retourner le nombre de lignes affectées
        return $statement->rowCount();
    }

    /**
     * Supprime des lignes d'une table.
     *
     * @param string $table Nom de la table.
     * @param array $where Conditions WHERE.
     * @return int Nombre de lignes affectées.
     */
    public function delete(string $table, array $where): int
    {
        $whereClauses = [];
        $parameters = [];
        foreach ($where as $key => $value) 
        {
            $whereClauses[] = "$key = :$key";
            $parameters[$key] = $value;
        }

        $sql = sprintf('DELETE FROM %s WHERE %s', $table, implode(' AND ', $whereClauses));

        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);

        return $statement->rowCount();
    }

    public function count(string $table, string $classObject, array $key = [], array $parameters = []): int
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $where = [];
        $bindValues = [];

        // Ajout des conditions WHERE en fonction de $key
        foreach ($key as $column => $value) 
        {
            $where[] = "$column = :$column";
            $bindValues[$column] = $value;
        }

        // Si des conditions WHERE existent, les ajouter à la requête SQL
        if ($where) 
        {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }

        // Ajout des paramètres supplémentaires (ORDER BY, LIMIT, etc.) via buildQueryParameters
        $sql .= $this->buildQueryParameters($parameters);

        // Préparer et exécuter la requête
        $statement = $this->pdo->prepare($sql);
        $statement->execute($bindValues);

        // Récupérer le nombre de résultats
        $result = $statement->fetchColumn();

        // Retourner le nombre de résultats
        return (int) $result;
    }

    /**
     * Vide une table en supprimant toutes ses lignes sans supprimer la structure de la table.
     *
     * @param string $table Nom de la table à tronquer.
     * @return bool True si la table a été tronquée avec succès, false sinon.
     */
    public function truncate(string $table): bool
    {
        try 
        {
            // Construction de la requête TRUNCATE
            $sql = "TRUNCATE TABLE `$table`";
        
            // Exécution de la requête
            $statement = $this->pdo->prepare($sql);
            $statement->execute();

            return true;
        } 
        catch (PDOException $e) 
        {
            // Gestion des erreurs
            echo "Erreur lors du truncate de la table '$table' : " . $e->getMessage();
            return false;
        }
    }

    /**
     * Récupère toutes les tables de la base de données.
     *
     * @return array Liste des tables.
     */
    public function getAllTables(): array
    {
        // Détecter le SGBD utilisé pour ajuster la requête
        $driver = $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
    
        if ($driver === 'mysql') 
        {
            $sql = 'SHOW TABLES';
        } 
        elseif ($driver === 'pgsql') 
        {
            $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public';";
        } 
        else 
        {
            throw new Exception("Ce SGBD n'est pas supporté pour récupérer les tables.");
        }

        // Exécution de la requête
        $statement = $this->pdo->query($sql);
    
        if ($statement === false) 
        {
            throw new Exception("Erreur lors de la récupération des tables.");
        }

        // Retourner les noms des tables sous forme de tableau
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Récupère le nom de la clé primaire auto-incrémentée d'une table.
     *
     * @param string $table Nom de la table.
     * @return string|null Nom de la clé primaire auto-incrémentée, ou null si non trouvé.
     */
    public function getPrimaryKey(string $table): ?string
    {
        // Requête pour obtenir la structure de la table, incluant la clé primaire et les informations d'auto-incrémentation
        $sql = "DESCRIBE $table";
        $result = $this->pdo->query($sql);

        foreach ($result as $column) 
        {
            // Vérifier si la colonne est une clé primaire et si elle est auto-incrémentée
            if ($column['Key'] === 'PRI' && strpos($column['Extra'], 'auto_increment') !== false) {
                return $column['Field'];
            }
        }

        // Si aucune clé primaire auto-incrémentée n'est trouvée, retourner null ou une valeur par défaut
        return null;
    }

    

    /**
     * Exécute une requête SQL brute.
     *
     * @param string $sql Requête SQL.
     * @param array $parameters Paramètres pour la requête.
     * @return mixed Résultat de la requête.
     */
    public function rawQuery(string $sql, array $parameters = [])
    {
        try
        {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        }
        catch (\PDOException $e)
        {

        }
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les colonnes et leurs types d'une table
    public function getColumns(string $table): array
    {
        // Requête SQL pour récupérer les informations de la table
        $sql = "DESCRIBE $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $columns = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Extraire les noms des colonnes et leurs types
        $columnDetails = [];
        foreach ($columns as $column) {
            $columnDetails[] = [
                'name' => $column['Field'],
                'type' => $column['Type']
            ];
        }

        return $columnDetails;
    }

    /**
     * Vérifie si la connexion PDO est active.
     *
     * @return bool True si la connexion est active, False sinon.
     */
    public function isConnectionActive(): bool
    {
        try 
        {
            // Utilise rawQuery pour exécuter une requête simple
            $this->rawQuery('SELECT 1');
            return true;
        } 
        catch (PDOException $e) 
        {
            // Si une exception est levée, la connexion est inactive
            return false;
        }
    }

    // Méthode pour déterminer le type PHP en fonction du type de base de données
    private function getPropertyType(string $dbType): string
    {
        // Pour simplifier, voici un mappage basique. Vous pouvez ajouter des types plus spécifiques selon vos besoins.
        if (strpos($dbType, 'int') !== false) 
        {
            return 'int';
        } 
        elseif (strpos($dbType, 'varchar') !== false || strpos($dbType, 'text') !== false) 
        {
            return 'string';
        } 
        elseif (strpos($dbType, 'datetime') !== false) 
        {
            return 'string'; // Vous pouvez utiliser DateTime ici, si nécessaire
        }

        // Par défaut, retourner string
        return 'string';
    }


    public function generateModelClass(string $tableName, $namespace = 'App\\Models', $modelDirectory = "..\\app\\Models\\"): void
    {
        // Récupérer les colonnes de la table
        $columns = $this->getColumns($tableName);


        // Charger le template du modèle
        $templatePath = '../templates/model_template.php';
        if (!file_exists($templatePath)) 
        {
            throw new Exception("Le fichier de template '$templatePath' n'existe pas.");
        }

        $templateContent = file_get_contents($templatePath);

        // Nom de la classe à générer
        $className = $this->formatClassName($tableName);

        // Remplir les propriétés de la classe (déclaration des variables privées)
        $properties = '';
        foreach ($columns as $column) 
        {
            $propertyName = $column['name'];
            $properties .= "    private \${$propertyName};\n";
        }

        // Générer les getters et setters pour chaque colonne
        $gettersAndSetters = '';
        foreach ($columns as $column) 
        {
            $propertyName = ucfirst($column['name']);
            $type = $this->getPropertyType($column['type']);
        
            // Getter
            $gettersAndSetters .= "\n    public function get{$propertyName}()\n";
            $gettersAndSetters .= "    {\n        return \$this->{$column['name']};\n    }\n";

            // Setter
            $gettersAndSetters .= "\n    public function set{$propertyName}(\${$column['name']})\n";
            $gettersAndSetters .= "    {\n        \$this->{$column['name']} = \${$column['name']};\n    }\n";
        }

        // Remplacer les variables dans le template par les données générées
        $classContent = str_replace(
            ['{{Namespace}}', '{{ClassName}}', '{{Properties}}', '{{GettersAndSetters}}'],
            [$namespace, $className, $properties, $gettersAndSetters],
            $templateContent
        );

        // Vérifier si le dossier Models existe et est accessible
        if (!is_dir($modelDirectory)) 
        {
            throw new Exception("Le dossier '$modelDirectory' n'existe pas.");
        }

        // Écrire le fichier généré dans le dossier Models
        $filePath = "{$modelDirectory}{$className}.php";
        if (false === file_put_contents($filePath, $classContent)) 
        {
            throw new Exception("Impossible de créer le fichier $filePath.");
        }
    }

    public function generateManagersClass(string $tableName, $useObject = 'App\\Models\\', $namespace = 'App\\Managers', $path = '..\\app\\Managers\\'): void
    {
        // Récupérer les tables
        $table = $tableName;

        // Créer le nom de l'objet à partir de la table
        $objectName = ucfirst($this->camelize($table));

        // Générer le contenu du manager
        $managerContent = $this->generateManagerContent($objectName, $table, $namespace, $useObject);

        // Définir le chemin du fichier manager
        $managerPath = "{$path}{$objectName}Manager.php";

        // Créer le dossier si nécessaire
        if (!is_dir($path)) 
        {
            mkdir($path, 0777, true);
        }

        // Écrire le fichier
        file_put_contents($managerPath, $managerContent);
        
    }

    private function generateManagerContent(string $objectName, string $tableName, string $namespace, string $useObject): string
    {

        // Charger le template du manager
        $template = file_get_contents('../templates/managers_template.php');

        // Remplacer les variables dans le template par les valeurs spécifiques à la table
        $managerContent = str_replace(
            ['{{ObjectName}}', '{{TableName}}', '{{Namespace}}', '{{Useobject}}'],
            [$objectName, $tableName, $namespace, $useObject],
            $template
        );

        return $managerContent;
    }

    private function camelize(string $string): string
    {
        $string = strtolower($string);
        $string = str_replace(['_', '-'], ' ', $string);
        $string = ucwords($string);
        return str_replace(' ', '', $string);
    }

    /**
     * Formate le nom de la classe à partir du nom de la table.
     *
     * @param string $tableName Nom de la table.
     * @return string Nom de la classe formaté en PascalCase.
     */
    private function formatClassName(string $tableName): string
    {
        // Supprimer les underscores et tirets
        $formattedName = str_replace(['_', '-'], ' ', $tableName);
    
        // Mettre la première lettre de chaque mot en majuscule et enlever les espaces
        $formattedName = str_replace(' ', '', ucwords($formattedName));

        return $formattedName;
    }

    /**
     * Sanitize le paramètre GROUP BY pour éviter l'injection SQL
     */
    private function sanitizeColumnList(string $columnList): string
    {
        // Assure-toi que le groupe de colonnes est valide, par exemple en validant uniquement des noms de colonnes.
        // Cette fonction peut être améliorée selon les besoins (par exemple pour valider les noms de colonnes).
        return preg_replace('/[^a-zA-Z0-9_,\s]/', '', $columnList); // On autorise seulement des lettres, chiffres et séparateurs.
    }

    /**
     * Sanitize la clause ORDER BY pour éviter l'injection SQL
     */
    private function sanitizeOrderBy(string $orderBy): string
    {
        // Cette méthode peut être étendue pour valider les colonnes et les ordres comme 'ASC' ou 'DESC'
        $orderBy = preg_replace('/[^a-zA-Z0-9_,\s]/', '', $orderBy); // On autorise uniquement des colonnes et des séparateurs.

        // Vérifier la présence d'une direction valide (ASC ou DESC)
        if (preg_match('/\s(ASC|DESC)$/i', $orderBy) === 0) 
        {
            $orderBy .= ' ASC'; // Défaut à ASC si aucune direction n'est spécifiée.
        }

        return $orderBy;
    }
}