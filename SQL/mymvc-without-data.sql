-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 jan. 2025 à 10:16
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

-- --------------------------------------------------------

--
-- Structure de la table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `ID` int NOT NULL,
  `USERS_ID` int NOT NULL,
  `PERMISSIONS_ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings_categories`
--
ALTER TABLE `settings_categories`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

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
