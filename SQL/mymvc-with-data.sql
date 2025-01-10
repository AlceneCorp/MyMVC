-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 jan. 2025 à 10:20
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mymvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `ID` int NOT NULL,
  `LEVEL` enum('SUCCESS','INFO','WARNING','ERROR','DEBUG','CRITICAL') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CATEGORY` enum('CONFIG','USERS','SECURITY','SYSTEM','APPLICATION') NOT NULL DEFAULT 'APPLICATION',
  `MESSAGE` text NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `USERS_ID` int DEFAULT NULL,
  `IP_ADDRESS` varchar(45) DEFAULT NULL,
  `METHOD` varchar(10) DEFAULT NULL,
  `URI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `ID` int NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `SLUG` varchar(255) NOT NULL,
  `IS_DROPDOWN` int NOT NULL,
  `PARENT_ID` int DEFAULT NULL,
  `URL` varchar(255) NOT NULL,
  `ORDERS` int DEFAULT '0',
  `IS_ACTIVE` tinyint(1) DEFAULT '1',
  `PERMISSIONS_ID` int DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`ID`, `TITLE`, `SLUG`, `IS_DROPDOWN`, `PARENT_ID`, `URL`, `ORDERS`, `IS_ACTIVE`, `PERMISSIONS_ID`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'Accueil', '/MyMVC/', 0, NULL, '/', 0, 1, NULL, '2025-01-07 13:55:43', '2025-01-07 14:16:34'),
(2, 'Administration', '/MyMVC/admin', 0, NULL, '/admin', 99, 1, 2, '2025-01-07 14:31:17', '2025-01-08 14:54:17');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `ID` int NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `FULLNAME` varchar(200) NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `COLOR` varchar(7) NOT NULL,
  `ORDERS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`ID`, `NAME`, `FULLNAME`, `DESCRIPTION`, `COLOR`, `ORDERS`) VALUES
(1, 'manage_sites', 'Gestion des sites', 'Gérer plusieurs sites ou applications', '#FF0000', 1),
(2, 'view_site_statistics', 'Consultation des statistiques du site', 'Accès aux statistiques du site (trafic, utilisateurs, etc.)', '#FFA500', 2),
(3, 'view_content_analytics', 'Consultation des analyses de contenu', 'Accéder aux analyses et aux performances du contenu', '#FFA500', 2),
(4, 'manage_content_types', 'Gestion des types de contenu', 'Créer, modifier et supprimer des types de contenu (articles, pages)', '#FFA500', 2),
(5, 'manage_templates', 'Gestion des templates', 'Modifier et gérer les modèles de page du site', '#FFA500', 2),
(6, 'manage_menus', 'Gestion des menus', 'Ajouter, modifier ou supprimer des menus du site', '#FFA500', 2),
(7, 'manage_themes', 'Gestion des thèmes', 'Personnaliser et gérer les thèmes du site', '#FFA500', 2),
(8, 'manage_plugins', 'Gestion des plugins', 'Installer, activer, désactiver et supprimer des plugins', '#FFA500', 2),
(9, 'manage_integrations', 'Gestion des intégrations', 'Gérer les intégrations externes (API, Google Analytics, etc.)', '#FFA500', 2),
(10, 'manage_emails', 'Gestion des emails', 'Gérer les paramètres d\'email (serveur, modèles, etc.)', '#FFA500', 2),
(11, 'edit_profile', 'Modification du profil', 'Permettre à l\'utilisateur de modifier son profil personnel', '#FFFF00', 3),
(12, 'view_other_profiles', 'Consultation des profils', 'Consulter les profils des autres utilisateurs', '#FFFF00', 3),
(13, 'block_user', 'Blocage d\'utilisateur', 'Bloquer un utilisateur', '#FFA500', 2),
(14, 'unblock_user', 'Déblocage d\'utilisateur', 'Débloquer un utilisateur précédemment bloqué', '#FFA500', 2),
(15, 'manage_user_groups', 'Gestion des groupes d\'utilisateurs', 'Gérer les groupes d\'utilisateurs, leurs permissions et rôles', '#FFA500', 2),
(16, 'view_user_activity', 'Consultation de l\'activité utilisateur', 'Visualiser l\'activité des utilisateurs sur le site', '#FFFF00', 3),
(17, 'send_private_messages', 'Envoi de messages privés', 'Envoyer des messages privés aux utilisateurs', '#FFFF00', 3),
(18, 'view_user_roles', 'Consultation des rôles utilisateur', 'Visualiser les rôles et permissions des utilisateurs', '#FFA500', 2),
(19, 'impersonate_user', 'Impersonation d\'utilisateur', 'Se faire passer pour un autre utilisateur à des fins de test ou dépannage', '#FF0000', 1),
(20, 'manage_2fa', 'Gestion de l\'authentification à deux facteurs', 'Configurer et gérer l\'authentification à deux facteurs des utilisateurs', '#FF0000', 1),
(21, 'edit_own_profil', 'Modification de son propre profile', 'Modifier le contenu que l\'utilisateur a créé', '#00FF00', 4),
(23, 'publish_content', 'Publication de contenu', 'Publier du contenu sur le site', '#FFA500', 2),
(24, 'unpublish_content', 'Dépublication de contenu', 'Retirer le contenu publié du site', '#FFA500', 2),
(25, 'restore_deleted_content', 'Restaurer un contenu supprimé', 'Restaurer du contenu précédemment supprimé', '#FFA500', 2),
(26, 'approve_user_content', 'Approbation du contenu utilisateur', 'Approuver le contenu soumis par d\'autres utilisateurs', '#FFA500', 2),
(27, 'manage_taxonomy', 'Gestion de la taxonomie', 'Créer, modifier et supprimer des catégories, des étiquettes et autres taxonomies', '#FFA500', 2),
(28, 'manage_media', 'Gestion des médias', 'Gérer la bibliothèque de médias (téléchargement, suppression, etc.)', '#FFA500', 2),
(29, 'create_categories', 'Création de catégories', 'Créer des catégories pour organiser le contenu', '#FFA500', 2),
(30, 'edit_categories', 'Modification des catégories', 'Modifier les catégories existantes pour le contenu', '#FFA500', 2),
(31, 'view_site_settings', 'Consultation des paramètres du site', 'Accéder aux paramètres généraux du site', '#FFA500', 2),
(32, 'edit_site_settings', 'Modification des paramètres du site', 'Modifier les paramètres du site (nom, logo, etc.)', '#FFA500', 2),
(33, 'manage_database', 'Gestion de la base de données', 'Accéder à la base de données pour des opérations de gestion avancées', '#FF0000', 1),
(34, 'manage_cache', 'Gestion du cache', 'Vider et configurer le cache du site pour améliorer les performances', '#FFA500', 2),
(35, 'perform_maintenance', 'Maintenance du site', 'Effectuer des opérations de maintenance sur le site', '#FF0000', 1),
(36, 'manage_backup', 'Gestion des sauvegardes', 'Effectuer et gérer les sauvegardes de données du site', '#FF0000', 1),
(37, 'schedule_tasks', 'Planification des tâches', 'Planifier des tâches automatisées comme les sauvegardes ou le nettoyage', '#FFA500', 2),
(38, 'access_debug_tools', 'Accès aux outils de débogage', 'Utiliser les outils de débogage pour résoudre les problèmes techniques', '#FF0000', 1),
(39, 'manage_error_logs', 'Gestion des logs d\'erreurs', 'Consulter et gérer les logs d\'erreurs du site', '#FF0000', 1),
(40, 'configure_search', 'Configuration de la recherche', 'Configurer les paramètres de recherche sur le site', '#FFA500', 2),
(41, 'view_transactions', 'Consultation des transactions', 'Accéder aux transactions financières ou de paiement effectuées sur le site', '#FFA500', 2),
(42, 'manage_transactions', 'Gestion des transactions', 'Valider, annuler ou gérer les transactions financières', '#FF0000', 1),
(43, 'view_invoices', 'Consultation des factures', 'Consulter les factures générées pour les utilisateurs ou clients', '#FFA500', 2),
(44, 'create_invoices', 'Création de factures', 'Créer des factures pour les utilisateurs ou clients', '#FFA500', 2),
(45, 'issue_refunds', 'Emettre des remboursements', 'Effectuer des remboursements pour les paiements effectués', '#FF0000', 1),
(46, 'manage_subscriptions', 'Gestion des abonnements', 'Gérer les abonnements utilisateurs et leurs paiements', '#FFA500', 2),
(47, 'view_payment_methods', 'Consultation des méthodes de paiement', 'Visualiser les méthodes de paiement disponibles', '#FFA500', 2),
(48, 'manage_payment_methods', 'Gestion des méthodes de paiement', 'Ajouter, modifier ou supprimer des méthodes de paiement', '#FF0000', 1),
(49, 'manage_discounts', 'Gestion des réductions', 'Créer et gérer les promotions et remises sur le site', '#FFA500', 2),
(50, 'track_revenue', 'Suivi des revenus', 'Surveiller et consulter les revenus générés par le site', '#FF0000', 1);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `ID` int NOT NULL,
  `NAME` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `VALUE` text NOT NULL,
  `DESCRIPTION` text,
  `TYPE` varchar(50) NOT NULL,
  `AUTOLOAD` tinyint(1) NOT NULL DEFAULT '0',
  `SETTINGS_CATEGORIES_ID` int NOT NULL,
  `CREATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`ID`, `NAME`, `VALUE`, `DESCRIPTION`, `TYPE`, `AUTOLOAD`, `SETTINGS_CATEGORIES_ID`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'site_name', 'MyMVC', 'Nom du site', 'text', 1, 1, '2024-12-17 13:11:45', '2024-12-17 16:50:49'),
(2, 'brand', 'Alcene\'s Corp', 'Entreprise', 'text', 1, 1, '2024-12-17 13:28:20', '2024-12-17 16:51:08'),
(3, 'debug', '1', 'Mode débug', 'checkbox', 1, 3, '2024-12-17 16:35:19', '2025-01-09 08:27:21'),
(4, 'smtp_server', 'smtp.mymvc.com', 'Serveur SMTP pour l\'envoi des emails', 'text', 1, 2, '2024-12-18 08:29:07', '2024-12-18 08:29:07'),
(5, 'smtp_port', '587', 'Port SMTP', 'text', 1, 2, '2024-12-18 08:29:33', '2024-12-18 08:29:33'),
(6, 'email_from', 'no-reply@mymvc.com', 'Adresse email de l\'expéditeur', 'text', 1, 2, '2024-12-18 08:36:23', '2024-12-18 08:36:23'),
(7, 'email_subject', 'Notification de MyMVC', 'Sujet par défaut pour les emails envoyés', 'text', 1, 2, '2024-12-18 08:36:46', '2024-12-18 08:36:46'),
(8, 'two_factor_auth', '0', 'Activation de l\'authentification à deux facteurs', 'checkbox', 1, 4, '2024-12-18 08:40:34', '2025-01-06 01:29:17'),
(9, 'user_can_register', '1', 'Les utilisateurs peuvent créer un compte', 'checkbox', 1, 4, '2024-12-18 08:40:34', '2024-12-19 08:59:30'),
(10, 'maintenance_mode', '0', 'Mode maintenance du site', 'checkbox', 1, 3, '2024-12-18 09:14:01', '2025-01-09 08:27:22'),
(11, 'account_lockout', '5', 'Définit le nombre maximal de tentatives de connexion infructueuses avant de verrouiller temporairement le compte', 'number', 1, 3, '2024-12-18 09:18:34', '2024-12-18 14:38:27'),
(34, 'sub_brand', '', 'Sous marque du site', 'text', 1, 1, '2024-12-18 13:41:07', '2024-12-18 13:44:48'),
(35, 'site_logo', 'images/logo/AlceneCorp.webp', 'Logo du site', 'text', 1, 1, '2024-12-18 13:41:07', '2025-01-08 15:37:18'),
(36, 'logsPerPage', '25', 'Nombre de d\'enregistrement affiché par page', 'number', 1, 3, '2024-12-18 14:38:15', '2024-12-19 11:30:12'),
(37, 'log_visitor', '1', 'Permet d\'activer les fonctionnalités des visiteurs ', 'checkbox', 1, 1, '2024-12-19 10:47:02', '2024-12-19 10:47:02'),
(38, 'usersPerPages', '50', 'Nombres d\'utilisateurs par page', 'number', 1, 3, '2024-12-20 07:12:53', '2024-12-23 11:06:16'),
(39, 'twig_debug', '1', 'Twig débug', 'checkbox', 1, 1, '2025-01-08 15:19:40', '2025-01-08 15:20:57'),
(40, 'site_color_1', '#6c63ff', 'Couleur 1 du site', 'color', 1, 1, '2025-01-09 09:24:51', '2025-01-09 09:25:54'),
(41, 'site_color_2', '#48c6ef', 'Couleur 2 du site', 'color', 1, 1, '2025-01-09 09:24:51', '2025-01-09 09:32:13');

-- --------------------------------------------------------

--
-- Structure de la table `settings_categories`
--

CREATE TABLE `settings_categories` (
  `ID` int NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `ICON` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `settings_categories`
--

INSERT INTO `settings_categories` (`ID`, `NAME`, `DESCRIPTION`, `ICON`) VALUES
(1, 'SITE', 'Paramètres généraux du site', 'fa-globe'),
(2, 'MAIL', 'Paramètres de messagerie pour l\'envoi des emails', 'fa-envelope'),
(3, 'SECURITY', 'Paramètres liés à la sécurité du site', 'fa-shield-alt'),
(4, 'USER', 'Paramètres des utilisateurs et profils', 'fa-users');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `STATUS` enum('active','pending','inactive','banned') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'active',
  `CREATED_AT` datetime DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `LAST_LOGIN` datetime DEFAULT NULL,
  `EMAIL_VERIFIED` tinyint(1) DEFAULT '0',
  `TWO_FACTOR_ENABLED` tinyint(1) DEFAULT '0',
  `API_TOKEN` varchar(255) DEFAULT NULL,
  `DELETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `STATUS`, `CREATED_AT`, `UPDATED_AT`, `LAST_LOGIN`, `EMAIL_VERIFIED`, `TWO_FACTOR_ENABLED`, `API_TOKEN`, `DELETED_AT`) VALUES
(5, 'Alcene', 'Alcene@live.fr', '$2y$10$qWZ3qFSiiIUu8iBmTV5TwuKcrnbM8ILtuVnPKT5NmyyU7YJ6dRaVm', 'active', '2024-12-17 11:08:49', '2025-01-09 10:44:39', '2025-01-09 09:44:39', 1, 0, NULL, NULL),
(6, 'Naillik', 'killerghost@hotmail.fr', '$2y$10$6enyKH5rbkeXAufBV8pywOF8RkfVv4KfYaUaTWWVcX09/lajiNXd6', 'active', '2024-12-17 11:08:49', '2024-12-17 11:09:17', NULL, 1, 0, NULL, NULL),
(7, 'test', 'teste@exemplo.us', '$2y$10$wQk/lN2eE73aWyjXFTnvy.9BYMqk2RnI/vNflX8rTNjZGiVpCc/Ae', 'active', '2025-01-06 02:14:20', '2025-01-06 02:16:58', '2025-01-06 01:16:58', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `ID` int NOT NULL,
  `USERS_ID` int NOT NULL,
  `PERMISSIONS_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users_permissions`
--

INSERT INTO `users_permissions` (`ID`, `USERS_ID`, `PERMISSIONS_ID`) VALUES
(263, 6, 1),
(264, 6, 42),
(265, 6, 20),
(266, 6, 35),
(267, 6, 33),
(268, 6, 39),
(269, 6, 50),
(270, 6, 38),
(271, 6, 36),
(272, 6, 19),
(273, 6, 45),
(274, 6, 48),
(275, 6, 31),
(276, 6, 32),
(277, 6, 2),
(283, 5, 1),
(284, 5, 42),
(285, 5, 39),
(286, 5, 19),
(287, 5, 20),
(288, 5, 33),
(289, 5, 50),
(290, 5, 38),
(291, 5, 36),
(292, 5, 35),
(293, 5, 45),
(294, 5, 48),
(295, 5, 6),
(296, 5, 13),
(297, 5, 14),
(298, 5, 15),
(299, 5, 31),
(300, 5, 32),
(301, 5, 2),
(302, 5, 21),
(303, 7, 21);

-- --------------------------------------------------------

--
-- Structure de la table `users_profile`
--

CREATE TABLE `users_profile` (
  `ID` int NOT NULL,
  `USERS_ID` int NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(20) DEFAULT NULL,
  `ADDRESS` text,
  `BIRTHDAY` date DEFAULT NULL,
  `GENDER` enum('male','female','other','prefer_not_to_say') DEFAULT NULL,
  `PROFILE_PICTURE` varchar(255) DEFAULT NULL,
  `ABOUT_ME` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users_profile`
--

INSERT INTO `users_profile` (`ID`, `USERS_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`, `ADDRESS`, `BIRTHDAY`, `GENDER`, `PROFILE_PICTURE`, `ABOUT_ME`) VALUES
(1, 5, '', '', NULL, NULL, NULL, 'male', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visitor`
--

CREATE TABLE `visitor` (
  `ID` int NOT NULL,
  `VISIT_DATE` date NOT NULL,
  `PAGE_VISITED` varchar(255) NOT NULL,
  `IP_ADDRESS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `visitor`
--

INSERT INTO `visitor` (`ID`, `VISIT_DATE`, `PAGE_VISITED`, `IP_ADDRESS`) VALUES
(1, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(2, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(3, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(4, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(5, '2025-01-08', 'admin/logs', '192.168.1.10'),
(6, '2025-01-08', 'admin/settings', '192.168.1.10'),
(7, '2025-01-08', 'admin/users', '192.168.1.10'),
(8, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(9, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(10, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(11, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(12, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(13, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(14, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(15, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(16, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(17, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(18, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(19, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(20, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(21, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(22, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(23, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(24, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(25, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(26, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(27, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(28, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(29, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(30, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(31, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(32, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(33, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(34, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(35, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(36, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(37, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(38, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(39, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(40, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(41, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(42, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(43, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(44, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(45, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(46, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(47, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(48, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(49, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(50, '2025-01-08', 'logout', '192.168.1.10'),
(51, '2025-01-08', 'accueil', '192.168.1.10'),
(52, '2025-01-08', 'login', '192.168.1.10'),
(53, '2025-01-08', 'login', '192.168.1.10'),
(54, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(55, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(56, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(57, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(58, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(59, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(60, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(61, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(62, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(63, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(64, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(65, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(66, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(67, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(68, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(69, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(70, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(71, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(72, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(73, '2025-01-08', 'admin/dashboard', '192.168.1.10'),
(74, '2025-01-08', 'admin/ajax/dashboard', '192.168.1.10'),
(75, '2025-01-09', 'admin/dashboard', '192.168.1.10'),
(76, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(77, '2025-01-09', 'admin/dashboard', '192.168.1.10'),
(78, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(79, '2025-01-09', 'admin/dashboard', '192.168.1.10'),
(80, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(81, '2025-01-09', 'admin/users', '192.168.1.10'),
(82, '2025-01-09', 'admin/settings', '192.168.1.10'),
(83, '2025-01-09', 'admin/logs', '192.168.1.10'),
(84, '2025-01-09', 'admin/settings', '192.168.1.10'),
(85, '2025-01-09', 'admin/settings', '192.168.1.10'),
(86, '2025-01-09', 'accueil', '192.168.1.10'),
(87, '2025-01-09', 'admin', '192.168.1.10'),
(88, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(89, '2025-01-09', 'accueil', '192.168.1.10'),
(90, '2025-01-09', 'admin', '192.168.1.10'),
(91, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(92, '2025-01-09', 'accueil', '192.168.1.10'),
(93, '2025-01-09', 'admin', '192.168.1.10'),
(94, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(95, '2025-01-09', 'accueil', '192.168.1.10'),
(96, '2025-01-09', 'admin/settings', '192.168.1.10'),
(97, '2025-01-09', 'admin/settings', '192.168.1.10'),
(98, '2025-01-09', 'admin', '192.168.1.10'),
(99, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(100, '2025-01-09', 'admin', '192.168.1.10'),
(101, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(102, '2025-01-09', 'accueil', '192.168.1.10'),
(103, '2025-01-09', 'admin', '192.168.1.10'),
(104, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(105, '2025-01-09', 'admin', '192.168.1.10'),
(106, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(107, '2025-01-09', 'admin', '192.168.1.10'),
(108, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(109, '2025-01-09', 'admin', '192.168.1.10'),
(110, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(111, '2025-01-09', 'admin', '192.168.1.10'),
(112, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(113, '2025-01-09', 'admin/settings', '192.168.1.10'),
(114, '2025-01-09', 'admin/users', '192.168.1.10'),
(115, '2025-01-09', 'admin/settings', '192.168.1.10'),
(116, '2025-01-09', 'admin/settings', '192.168.1.10'),
(117, '2025-01-09', 'admin/settings', '192.168.1.10'),
(118, '2025-01-09', 'admin/users', '192.168.1.10'),
(119, '2025-01-09', 'admin/users', '192.168.1.10'),
(120, '2025-01-09', 'admin/users', '192.168.1.10'),
(121, '2025-01-09', 'admin/users', '192.168.1.10'),
(122, '2025-01-09', 'admin/users', '192.168.1.10'),
(123, '2025-01-09', 'admin/users', '192.168.1.10'),
(124, '2025-01-09', 'admin/users', '192.168.1.10'),
(125, '2025-01-09', 'admin/users', '192.168.1.10'),
(126, '2025-01-09', 'admin/users', '192.168.1.10'),
(127, '2025-01-09', 'admin/users', '192.168.1.10'),
(128, '2025-01-09', 'admin/users', '192.168.1.10'),
(129, '2025-01-09', 'admin/users', '192.168.1.10'),
(130, '2025-01-09', 'admin/users', '192.168.1.10'),
(131, '2025-01-09', 'admin/users', '192.168.1.10'),
(132, '2025-01-09', 'admin/users', '192.168.1.10'),
(133, '2025-01-09', 'admin/users', '192.168.1.10'),
(134, '2025-01-09', 'admin/users', '192.168.1.10'),
(135, '2025-01-09', 'admin/users', '192.168.1.10'),
(136, '2025-01-09', 'admin/users', '192.168.1.10'),
(137, '2025-01-09', 'admin/users', '192.168.1.10'),
(138, '2025-01-09', 'admin/users', '192.168.1.10'),
(139, '2025-01-09', 'admin/users', '192.168.1.10'),
(140, '2025-01-09', 'admin/users', '192.168.1.10'),
(141, '2025-01-09', 'admin/users', '192.168.1.10'),
(142, '2025-01-09', 'admin/users', '192.168.1.10'),
(143, '2025-01-09', 'admin/users', '192.168.1.10'),
(144, '2025-01-09', 'admin/users', '192.168.1.10'),
(145, '2025-01-09', 'admin/users', '192.168.1.10'),
(146, '2025-01-09', 'admin/users', '192.168.1.10'),
(147, '2025-01-09', 'admin/users', '192.168.1.10'),
(148, '2025-01-09', 'admin/users', '192.168.1.10'),
(149, '2025-01-09', 'admin/users', '192.168.1.10'),
(150, '2025-01-09', 'admin/users', '192.168.1.10'),
(151, '2025-01-09', 'admin/users', '192.168.1.10'),
(152, '2025-01-09', 'admin/users', '192.168.1.10'),
(153, '2025-01-09', 'admin/users', '192.168.1.10'),
(154, '2025-01-09', 'admin/users', '192.168.1.10'),
(155, '2025-01-09', 'admin/users', '192.168.1.10'),
(156, '2025-01-09', 'admin/users', '192.168.1.10'),
(157, '2025-01-09', 'admin/users', '192.168.1.10'),
(158, '2025-01-09', 'admin/users', '192.168.1.10'),
(159, '2025-01-09', 'admin/users', '192.168.1.10'),
(160, '2025-01-09', 'admin/users', '192.168.1.10'),
(161, '2025-01-09', 'admin/users', '192.168.1.10'),
(162, '2025-01-09', 'admin/users', '192.168.1.10'),
(163, '2025-01-09', 'admin/users', '192.168.1.10'),
(164, '2025-01-09', 'admin/users', '192.168.1.10'),
(165, '2025-01-09', 'admin/users', '192.168.1.10'),
(166, '2025-01-09', 'admin/users', '192.168.1.10'),
(167, '2025-01-09', 'admin/users', '192.168.1.10'),
(168, '2025-01-09', 'admin/users', '192.168.1.10'),
(169, '2025-01-09', 'admin/users', '192.168.1.10'),
(170, '2025-01-09', 'admin/users', '192.168.1.10'),
(171, '2025-01-09', 'admin/users', '192.168.1.10'),
(172, '2025-01-09', 'admin/users', '192.168.1.10'),
(173, '2025-01-09', 'admin/users', '192.168.1.10'),
(174, '2025-01-09', 'admin/users', '192.168.1.10'),
(175, '2025-01-09', 'admin/users', '192.168.1.10'),
(176, '2025-01-09', 'admin/users', '192.168.1.10'),
(177, '2025-01-09', 'admin/users', '192.168.1.10'),
(178, '2025-01-09', 'admin/users', '192.168.1.10'),
(179, '2025-01-09', 'admin/users', '192.168.1.10'),
(180, '2025-01-09', 'admin/users', '192.168.1.10'),
(181, '2025-01-09', 'admin/users', '192.168.1.10'),
(182, '2025-01-09', 'admin/users', '192.168.1.10'),
(183, '2025-01-09', 'admin/users', '192.168.1.10'),
(184, '2025-01-09', 'admin/users', '192.168.1.10'),
(185, '2025-01-09', 'admin/users', '192.168.1.10'),
(186, '2025-01-09', 'admin/logs', '192.168.1.10'),
(187, '2025-01-09', 'admin/settings', '192.168.1.10'),
(188, '2025-01-09', 'admin/users', '192.168.1.10'),
(189, '2025-01-09', 'admin/users', '192.168.1.10'),
(190, '2025-01-09', 'admin/users', '192.168.1.10'),
(191, '2025-01-09', 'admin/users', '192.168.1.10'),
(192, '2025-01-09', 'admin/settings', '192.168.1.10'),
(193, '2025-01-09', 'admin/settings', '192.168.1.10'),
(194, '2025-01-09', 'admin/settings', '192.168.1.10'),
(195, '2025-01-09', 'admin/settings', '192.168.1.10'),
(196, '2025-01-09', 'admin/settings', '192.168.1.10'),
(197, '2025-01-09', 'admin/settings', '192.168.1.10'),
(198, '2025-01-09', 'admin/settings', '192.168.1.10'),
(199, '2025-01-09', 'admin/settings', '192.168.1.10'),
(200, '2025-01-09', 'admin/settings', '192.168.1.10'),
(201, '2025-01-09', 'admin/settings', '192.168.1.10'),
(202, '2025-01-09', 'admin/settings', '192.168.1.10'),
(203, '2025-01-09', 'admin/settings', '192.168.1.10'),
(204, '2025-01-09', 'admin/settings', '192.168.1.10'),
(205, '2025-01-09', 'admin/settings', '192.168.1.10'),
(206, '2025-01-09', 'admin/settings', '192.168.1.10'),
(207, '2025-01-09', 'admin/settings', '192.168.1.10'),
(208, '2025-01-09', 'admin/settings', '192.168.1.10'),
(209, '2025-01-09', 'admin/settings', '192.168.1.10'),
(210, '2025-01-09', 'admin/settings', '192.168.1.10'),
(211, '2025-01-09', 'admin/settings', '192.168.1.10'),
(212, '2025-01-09', 'admin/users', '192.168.1.10'),
(213, '2025-01-09', 'admin/users', '192.168.1.10'),
(214, '2025-01-09', 'admin/users', '192.168.1.10'),
(215, '2025-01-09', 'logout', '192.168.1.10'),
(216, '2025-01-09', 'accueil', '192.168.1.10'),
(217, '2025-01-09', 'accueil', '192.168.1.10'),
(218, '2025-01-09', 'login', '192.168.1.10'),
(219, '2025-01-09', 'login', '192.168.1.10'),
(220, '2025-01-09', 'admin/dashboard', '192.168.1.10'),
(221, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(222, '2025-01-09', 'admin/users', '192.168.1.10'),
(223, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(224, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(225, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(226, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(227, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(228, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(229, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(230, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(231, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(232, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(233, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(234, '2025-01-09', 'accueil', '192.168.1.10'),
(235, '2025-01-09', 'admin/dashboard', '192.168.1.10'),
(236, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(237, '2025-01-09', 'admin/users', '192.168.1.10'),
(238, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(239, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(240, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(241, '2025-01-09', 'admin/edit-permissions/5', '192.168.1.10'),
(242, '2025-01-09', 'admin/settings', '192.168.1.10'),
(243, '2025-01-09', 'admin/settings', '192.168.1.10'),
(244, '2025-01-09', 'admin/settings', '192.168.1.10'),
(245, '2025-01-09', 'admin/settings', '192.168.1.10'),
(246, '2025-01-09', 'admin/settings', '192.168.1.10'),
(247, '2025-01-09', 'admin/dashboard', '192.168.1.10'),
(248, '2025-01-09', 'admin/ajax/dashboard', '192.168.1.10'),
(249, '2025-01-10', 'admin/dashboard', '192.168.1.10'),
(250, '2025-01-10', 'admin/ajax/dashboard', '192.168.1.10'),
(251, '2025-01-10', 'admin/users', '192.168.1.10'),
(252, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(253, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(254, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(255, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(256, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(257, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(258, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(259, '2025-01-10', 'admin/users', '192.168.1.10'),
(260, '2025-01-10', 'admin/dashboard', '192.168.1.10'),
(261, '2025-01-10', 'admin/ajax/dashboard', '192.168.1.10'),
(262, '2025-01-10', 'admin/users', '192.168.1.10'),
(263, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(264, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(265, '2025-01-10', 'admin/users', '192.168.1.10'),
(266, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(267, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(268, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(269, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(270, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(271, '2025-01-10', 'admin/users', '192.168.1.10'),
(272, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(273, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(274, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(275, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(276, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(277, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(278, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(279, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(280, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(281, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(282, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(283, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(284, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(285, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(286, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(287, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(288, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(289, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(290, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(291, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(292, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(293, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(294, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(295, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(296, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(297, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(298, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(299, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(300, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(301, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(302, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(303, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(304, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(305, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(306, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(307, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(308, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(309, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(310, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(311, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(312, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(313, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(314, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(315, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(316, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(317, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(318, '2025-01-10', 'admin/settings', '192.168.1.10'),
(319, '2025-01-10', 'admin/logs', '192.168.1.10'),
(320, '2025-01-10', 'admin/users', '192.168.1.10'),
(321, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(322, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(323, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(324, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(325, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(326, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(327, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(328, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(329, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(330, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(331, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(332, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(333, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(334, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(335, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(336, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(337, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(338, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(339, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(340, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(341, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(342, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(343, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(344, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(345, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(346, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(347, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(348, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(349, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(350, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(351, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(352, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(353, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(354, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(355, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(356, '2025-01-10', 'admin/users', '192.168.1.10'),
(357, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(358, '2025-01-10', 'admin/edit-permissions/6', '192.168.1.10'),
(359, '2025-01-10', 'admin/users', '192.168.1.10'),
(360, '2025-01-10', 'admin/users', '192.168.1.10'),
(361, '2025-01-10', 'admin/users', '192.168.1.10'),
(362, '2025-01-10', 'admin/users', '192.168.1.10'),
(363, '2025-01-10', 'admin/edit-permissions/7', '192.168.1.10'),
(364, '2025-01-10', 'admin/edit-permissions/7', '192.168.1.10'),
(365, '2025-01-10', 'admin/users', '192.168.1.10'),
(366, '2025-01-10', 'admin/edit-permissions/7', '192.168.1.10'),
(367, '2025-01-10', 'admin/edit-permissions/7', '192.168.1.10'),
(368, '2025-01-10', 'admin/users', '192.168.1.10'),
(369, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(370, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(371, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(372, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(373, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(374, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(375, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(376, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(377, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(378, '2025-01-10', 'admin/edit-permissions/5', '192.168.1.10'),
(379, '2025-01-10', 'admin/users', '192.168.1.10'),
(380, '2025-01-10', 'admin/users', '192.168.1.10'),
(381, '2025-01-10', 'admin/edit-permissions/7', '192.168.1.10'),
(382, '2025-01-10', 'admin/edit-permissions/7', '192.168.1.10'),
(383, '2025-01-10', 'admin/users', '192.168.1.10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_parent_id` (`PARENT_ID`),
  ADD KEY `fk_permissions_id` (`PERMISSIONS_ID`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `KEY` (`NAME`),
  ADD KEY `SETTINGS_CATEGORIES_ID` (`SETTINGS_CATEGORIES_ID`) USING BTREE;

--
-- Index pour la table `settings_categories`
--
ALTER TABLE `settings_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Index pour la table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PERMISSIONS_ID` (`PERMISSIONS_ID`),
  ADD KEY `USERS_ID` (`USERS_ID`);

--
-- Index pour la table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERS_ID` (`USERS_ID`) USING BTREE;

--
-- Index pour la table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `settings_categories`
--
ALTER TABLE `settings_categories`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT pour la table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_parent_id` FOREIGN KEY (`PARENT_ID`) REFERENCES `menu` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_permissions_id` FOREIGN KEY (`PERMISSIONS_ID`) REFERENCES `permissions` (`ID`) ON DELETE SET NULL;

--
-- Contraintes pour la table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`SETTINGS_CATEGORIES_ID`) REFERENCES `settings_categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_ibfk_1` FOREIGN KEY (`USERS_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_permissions_ibfk_2` FOREIGN KEY (`PERMISSIONS_ID`) REFERENCES `permissions` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `users_profile_ibfk_1` FOREIGN KEY (`USERS_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
