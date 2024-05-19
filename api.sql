-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 19 mai 2024 à 02:51
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Genie Civil', NULL, NULL),
(78, 'Santé', '2024-04-21 15:55:06', '2024-04-21 15:55:06'),
(80, 'Management et stratégie', '2024-04-21 15:55:50', '2024-04-21 15:55:50'),
(84, 'Informatique', '2024-05-18 19:47:05', '2024-05-18 19:47:05');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contenu` text NOT NULL,
  `membre_id` bigint(20) UNSIGNED NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demandeinscriptions`
--

CREATE TABLE `demandeinscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_membre` bigint(20) UNSIGNED DEFAULT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `pay` varchar(20) DEFAULT NULL,
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `demandeinscriptions`
--

INSERT INTO `demandeinscriptions` (`id`, `id_membre`, `id_formation`, `created_at`, `updated_at`, `nom`, `prenom`, `email`, `tele`, `pay`, `etat`) VALUES
(37, 246, 48, '2024-05-09 08:21:38', '2024-05-09 08:23:40', 'mandour', 'ilyass', 'ilyassmandour2002@gmail.com', '0606178638', 'Morocco', 1),
(38, 308, 50, '2024-05-10 13:56:16', '2024-05-10 13:59:11', 'sinbel', 'yaqout', 'yaqout02@gmail.com', '0701229911', 'Morocco', 1),
(55, 317, 57, '2024-05-18 23:27:21', '2024-05-18 23:27:55', 'Mandour', 'Nadia', 'nadounettenadia@gmail.com', '0606178638', 'Morocco', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `propos` text NOT NULL,
  `numero_whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ecoles`
--

INSERT INTO `ecoles` (`id`, `nom`, `logo`, `video`, `propos`, `numero_whatsapp`, `facebook`, `instagram`, `twitter`, `email`, `created_at`, `updated_at`) VALUES
(16, 'Academics', '1716078079_logo.jpg', '1716065139_Conversation Bing avec GPT-4 et 2 pages de plus - Personnel – Microsoft​ Edge Dev 2023-12-24 17-53-10.mp4', 'Bienvenue à notre école virtuelle, un espace d\'apprentissage innovant et interactif conçu pour répondre aux besoins éducatifs des étudiants . Grâce à notre plateforme numérique, nous offrons une expérience éducative flexible et personnalisée, accessible de partout et à tout moment. Nos cours en ligne sont élaborés par des enseignants qualifiés et sont enrichis de ressources multimédias pour favoriser un apprentissage dynamique et engageant.', '0606178638', 'www.fb.com/academics', 'www.insta.com/academics', 'www.twitter.com/academics', 'academics@gmail.com', '2024-05-18 19:45:39', '2024-05-18 23:21:19');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

CREATE TABLE `formateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formateurs`
--

INSERT INTO `formateurs` (`id`, `nom`, `prenom`, `iduser`, `created_at`, `updated_at`, `description`, `image`) VALUES
(53, 'boul', 'abdo', 304, '2024-05-06 19:38:00', '2024-05-06 19:38:00', 'PHD IN AI', '1715027880_prof.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `contenue` text NOT NULL,
  `disponibilite` tinyint(1) NOT NULL,
  `langue` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `niveau` varchar(255) NOT NULL,
  `prerequis` text DEFAULT NULL,
  `objectif` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categ_id` bigint(20) UNSIGNED NOT NULL,
  `programme` text NOT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `prix`, `contenue`, `disponibilite`, `langue`, `image`, `niveau`, `prerequis`, `objectif`, `created_at`, `updated_at`, `categ_id`, `programme`, `video`) VALUES
(48, 'Bâtiment et Travaux Publics', '500.00', 'L’objectif de ce Certificat est de fournir aux lauréats les compétences nécessaires dans le domaine des Sciences de l’Ingénieur en Génie Civil afin de répondre à la demande croissante du marché de l’emploi dans ce secteur. La formation abordera les techniques et méthodes de conception, d’étude et d’exécution de projets', 1, 'francais', '1713719601_Capture-decran-2023-09-19-a-18.20.13-1989x1303.webp', 'Debutant', 'Diplôme Universitaire scientifique ou en génie civil,Diplôme professionnel en Génie Civil,Brevet de technicien supérieur en Génie Civil,Toute autre qualification équivalente compatible avec la formation professionnelle proposée sera examinée par la commission pédagogique', '<ul><li>Maîtriser les outils et méthodes de calcul physique et mécanique nécessaires à l’étude des structures en génie civil.</li><li>Étudier et connaître les propriétés et caractéristiques des différents matériaux de construction.<br>Concevoir et dimensionner des structures en béton armé en assurant une sécurité optimale tout en minimisant les coûts.</li><li>Connaître les différents essais et techniques pour caractériser et comprendre les sols.<br>Sélectionner la structure appropriée et réaliser les études techniques nécessaires pour mener à bien un projet routier.</li><li>Maîtriser les outils de calcul et de dimensionnement des éléments structuraux des ponts, en respectant les contraintes naturelles et fonctionnelles.</li></ul>', '2024-04-21 16:13:21', '2024-04-21 16:22:55', 1, '<h4><strong>Module 1 </strong>: Résistance des Matériaux (8 heures).<br><strong>Module 2</strong> : Matériaux de Construction (8 heures).<br><strong>Module 3</strong> : Géotechnique Routière (8 heures).<br><strong>Module 4</strong> : Béton Armé (8 heures).<br><strong>Module 5</strong> : Ponts (8 heures).</h4>', '1713719601_2024-03-30 20-22-40.mp4'),
(49, 'Dimensionnement des Structures et modélisation Numériques', '400.00', 'Le Certificat offrira à nos candidats la possibilité de mener à bien des projets techniques en Génie Civil et de fournir les plans nécessaires à la réalisation de projets de construction. La formation portera sur les méthodes de calcul théoriques pour le dimensionnement des ouvrages du BTP, ainsi que la modélisation numérique des structures', 1, 'francais', '1713719978_Capture-decran-2023-09-19-a-18.19.15-2559x1281.webp', 'Debutant', 'AUTOCAD,CBS , ROBOT STRUCTURAL ANALYSIS', '<ul><li>Dimensionner les éléments structurels des bâtiments en tenant compte la descente des charges.</li><li>Analyser et dimensionner les structures des ponts.</li><li>Dimensionner un bâtiment à l’aide des logiciels : &nbsp;AUTOCAD, CBS et ROBOT STRUCTURAL ANALYSIS.</li><li>Dimensionner les structures routières à l’aide des logiciels: ALIZE et PISTE.</li></ul>', '2024-04-21 16:19:38', '2024-04-21 16:19:38', 1, '<h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 1 : Calcul de structures (8 heures)</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 2 : Dimensionnement des structures de Bâtiment (8 heures)</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 3 : Dimensionnement des structures de Ponts (8 heures)</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 4 : Simulation et calcul numérique en Bâtiment (8 heures)</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 5 : Simulation et calcul numérique des Routes (8 heures)</h3><p>&nbsp;</p>', '1713719978_2024-03-30 20-22-40.mp4'),
(50, 'Gestion et Suivi des Programmes de Santé', '400.00', 'L’objectif de ce certificat est de garantir aux participants non seulement une meilleure connaissance pour le secteur de la santé mais aussi de les doter des moyens et outils scientifiques', 1, 'francais', '1713720449_male-nurse-with-stethoscope-2021-08-26-20-17-00-utc-scaled-2559x1708.webp', 'Intermediaire', 'Diplôme Universitaire scientifique,Diplôme professionnel,Brevet de technicien supérieur', '<ul><li>Concevoir et conduire un projet en santé publique&nbsp;</li><li>Evaluer une situation clinique et établir un diagnostic dans le domaine de santé&nbsp;</li><li>Connaitre le système de santé et ses différentes composantes&nbsp;</li><li>Mettre en œuvre des actions à visée analytique, éducative&nbsp;</li><li>Participer à la planification, l’exécution, la supervision et à l’évaluation des activités et programmes sanitaires&nbsp;</li><li>Agir avec professionnalisme selon les règles de l’éthique, de la déontologie, du partenariat, de la collaboration interdisciplinaire, de l’humanisme, du respect de la diversité socioculturelle et religieuse et de la communication efficace ;</li><li>Porter un regard critique sur la pratique et traiter toute activité professionnelle avec rigueur scientifique et créativité&nbsp;</li><li>Contribuer à la formation et à l’encadrement des étudiants&nbsp;</li><li>Contribuer au développement de la Recherche scientifique&nbsp;</li><li>Maitriser la méthodologie de recherche en sciences de santé et les outils d’analyse de biostatistique .</li></ul>', '2024-04-21 16:27:29', '2024-04-21 16:27:29', 78, '<h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 1 : Système national de santé (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 2 : Démographie (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 3 : Méthodologie de recherche en sciences de santé (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 4 : Biostatistique et analyse des données (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 5 : Économie de Santé (8 heures).</h3><p>&nbsp;</p>', '1713720449_2024-03-30 20-22-40.mp4'),
(51, 'Management de la Santé à l’Ère du Numérique', '700.00', 'L’objectif de ce certificat est de permettre aux professionnels de la santé d’acquérir des compétences en gestion et en leadership dans le domaine de la santé.', 1, 'francais', '1713720953_R-1-1014x675.webp', 'Avance', 'Professionnels de la santé,Administrateurs et gestionnaires de soins de santé,Fonctionnaires et décideurs politiques dans le domaine de la santé', '<ul><li>Comprendre les concepts fondamentaux du management et de la gestion appliquée à la santé.</li><li>Acquérir des compétences en matière de planification stratégique, de budgétisation et de gestion des ressources financières.</li><li>Développer des compétences en gestion des opérations, de la qualité et de la performance dans le secteur de la santé.</li><li>Apprendre à gérer les équipes, à motiver le personnel et à favoriser un environnement de travail collaboratif.</li><li>Comprendre les enjeux éthiques et juridiques liés à la gestion de la santé.</li></ul>', '2024-04-21 16:35:53', '2024-04-21 16:35:53', 78, '<h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 1 : Introduction en Management de la Santé et Gestion Stratégique (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 2 : Gestion des Ressources Humaines en Santé (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 3 : Gestion Financière en Santé (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 4 : Systèmes d’Information Hospitaliers (8 heures).</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 5 : Qualité des Soins et Gestion de la Performance (8 heures)</h3>', '1713720953_2024-03-30 20-22-40.mp4'),
(53, 'Innovation et propriété intellectuelle', '200.00', 'Préparer le public à la création d’activités économiques basée sur des innovations et initier aux différents aspects de la propriété intellectuelle .', 1, 'francais', '1713721854_management-of-financial-company-reading-statistics-2022-01-19-00-09-42-utc-scaled-2559x1706.webp', 'Debutant', 'Chercheurs/ingénieurs et étudiants,Chargés de l’innovation', '<ul style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(39, 48, 68);font-family:Montserrat;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:30px !important;margin-top:0px;orphans:2;padding-left:20px;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><li style=\"box-sizing:border-box;font-weight:400;margin-bottom:8px;\" aria-level=\"1\"><p style=\"text-align:justify;\"><b style=\"box-sizing:border-box;\"><strong>Comprendre </strong></b><span style=\"box-sizing:border-box;font-weight:400;\">l’origine, le processus et les conséquences de l’innovation.</span></p></li><li style=\"box-sizing:border-box;font-weight:400;margin-bottom:8px;\" aria-level=\"1\"><p style=\"text-align:justify;\"><b style=\"box-sizing:border-box;\"><strong>Appréhender </strong></b><span style=\"box-sizing:border-box;font-weight:400;\">les enjeux socio-économiques de d’innovation sous différents angles et prendre du recul quant aux problématiques liées au lancement d’une innovation.</span></p></li><li style=\"box-sizing:border-box;font-weight:400;margin-bottom:8px;\" aria-level=\"1\"><p style=\"text-align:justify;\"><b style=\"box-sizing:border-box;\"><strong>Appréhender </strong></b><span style=\"box-sizing:border-box;font-weight:400;\">les éléments liés à la propriété industrielle et s’approprier une méthode d’analyse et de diagnostic de la brevetabilité et les différentes stratégies appliquées dans ce domaine à travers l’étude de cas concrets.</span></p></li><li style=\"box-sizing:border-box;margin-bottom:8px;\" aria-level=\"1\"><p style=\"text-align:justify;\"><b style=\"box-sizing:border-box;\"><strong>Préparer </strong></b><span style=\"box-sizing:border-box;font-weight:400;\">à la création d’activités économiques basées sur des innovations.</span></p></li></ul>', '2024-04-21 16:50:54', '2024-04-21 16:50:54', 80, '<h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 1 : &nbsp;Management de l’Innovation Technologique.</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 2 : La fabrique de l’innovation au sein d’une entreprise.</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 3 : Introduction à la propriété intellectuelle.</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 4 : Anatomie et demande des brevets.</h3><h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 5 : Les droits conférés par le brevet.</h3>', '1713721854_portrait.jpg'),
(57, 'Cyber sécurité', '1000.00', '’objectif de ce certificat est d’apprendre comment améliorer la sécurité de votre système informatique', 1, 'francais', '1716065318_cyber-security-1159x649.webp', 'Intermediaire', 'C++,Python,Java', '<ul><li>Protéger des systèmes informatiques (software et hardware), des réseaux, et des applications web.</li><li>Créer programmes et des laboratoires de test pour pratiquer légalement et sans rien casser.</li><li>Vous préparez aux métiers dans le domaine de la cybersécurité, ou à des certifications informatiques.</li><li>Comprendre le fonctionnement des systèmes, des réseaux et de l’informatique de manière générale.</li></ul>', '2024-05-18 19:48:38', '2024-05-18 19:48:38', 84, '<h3 style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(128, 128, 128);font-family:Muli, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;font-size:21px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:550;letter-spacing:normal;line-height:1.2;margin-bottom:0.5rem;margin-top:0px;orphans:2;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Module 1 : &nbsp;Sécurité des système Informatique (8 heures).<br>Module 2 : Hacking éthique (8 heures).</h3><p>&nbsp;</p>', '1716065318_Conversation Bing avec GPT-4 et 2 pages de plus - Personnel – Microsoft​ Edge Dev 2023-12-24 17-53-10.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etat` int(11) NOT NULL,
  `id_membre` bigint(20) UNSIGNED NOT NULL,
  `id_session` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `etat`, `id_membre`, `id_session`, `created_at`, `updated_at`) VALUES
(103, 1, 317, 44, '2024-05-18 23:28:12', '2024-05-18 23:28:12');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `image`, `iduser`, `created_at`, `updated_at`) VALUES
(246, 'mandour', 'ilyass', '1715434972_portrait.jpg', 301, '2024-05-04 01:54:33', '2024-05-11 12:42:52'),
(248, 'boul', 'abdo', '1715045929_portrait.jpg', 305, '2024-05-07 00:38:49', '2024-05-07 00:38:49'),
(306, 'daoudi', 'mohammed', '1715281873_prof.jpeg', 361, '2024-05-08 01:08:55', '2024-05-09 18:12:46'),
(308, 'sinbel', 'yaqout', 'noimage.png', 364, '2024-05-10 13:59:10', '2024-05-10 13:59:10'),
(317, 'Mandour', 'Nadia', 'noimage.png', 373, '2024-05-18 23:27:54', '2024-05-18 23:27:54');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(84, '2014_10_12_000000_create_users_table', 1),
(85, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(86, '2019_08_19_000000_create_failed_jobs_table', 1),
(87, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(88, '2024_02_28_205042_create_posts_table', 1),
(89, '2024_02_29_205542_create_utilisateurs_table', 1),
(90, '2024_02_29_211918_create_membres_table', 1),
(91, '2024_02_29_212356_create_formateurs_table', 1),
(92, '2024_02_29_215058_create_formations_table', 1),
(93, '2024_02_29_215808_create_commentaires_table', 1),
(94, '2024_03_01_200836_create_categories_table', 2),
(95, '2024_03_01_200850_create_supports_table', 2),
(96, '2024_03_01_201405_add_idcateg_to_formation', 3),
(97, '2024_03_01_202231_create_sessions_table', 4),
(98, '2024_03_01_211850_formateur_session', 5),
(99, '2024_03_01_222322_formateur_sessions', 6),
(100, '2024_03_01_222528_create_inscriptions_table', 7),
(101, '2024_03_01_222825_create_votes_table', 8),
(102, '2024_03_30_035748_add_desreption_formateur', 9),
(103, '2024_03_30_040234_add_image_formateur', 10),
(104, '2024_04_03_223437_drop_table_formateur_sessions', 11),
(105, '2024_04_03_223713_add_column_sessions', 12),
(106, '2024_04_12_230231_add_progr_to_formation', 13),
(107, '2024_04_13_075413_add_video_to_formation', 14),
(108, '2024_04_21_232517_ecole', 15),
(109, '2024_04_29_170948_add_additional_fields_to_users_table', 16),
(110, '2024_04_29_185149_add_remember_token_to_utilisateurs_table', 16),
(111, '2024_05_04_012322_create_demande_inscription_table', 17);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `descreption` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `descreption`, `status`, `created_at`, `updated_at`) VALUES
(4, 'walid', 'chouway', 1, '2024-02-29 23:01:43', '2024-02-29 23:01:43'),
(5, 'adam', 'bessam', 0, '2024-03-08 20:12:13', '2024-03-08 20:12:13'),
(6, 'ilyass', 'mandour', 1, '2024-03-08 20:14:48', '2024-03-08 20:14:48'),
(7, 'dsqlmdlkq', 'mllkdsqlmkdmklq', 1, '2024-03-08 23:16:16', '2024-03-08 23:16:16');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fun` date NOT NULL,
  `nbd_place` int(11) NOT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_formateur` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `date_debut`, `date_fun`, `nbd_place`, `id_formation`, `created_at`, `updated_at`, `id_formateur`, `url`) VALUES
(44, '2024-05-19', '2024-07-27', 50, 57, '2024-05-18 23:10:14', '2024-05-18 23:10:14', 53, 'https://meet.google.com/orf-jtqh-aeq');

-- --------------------------------------------------------

--
-- Structure de la table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` text NOT NULL,
  `fichier` text NOT NULL,
  `id_session` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `supports`
--

INSERT INTO `supports` (`id`, `titre`, `fichier`, `id_session`, `created_at`, `updated_at`) VALUES
(22, 'chapitre 1', '1716077443_Certificat (66).pdf', 44, '2024-05-18 23:10:43', '2024-05-18 23:10:43'),
(23, 'chapitre 2', '1716077460_test (1).pdf', 44, '2024-05-18 23:11:01', '2024-05-18 23:11:01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `num_tel` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `password`, `num_tel`, `type`, `created_at`, `updated_at`, `remember_token`) VALUES
(301, 'ilyassmandour2002@gmail.com', '$2y$12$mAewFZR0Vh57CLZdYKmyIeULDXM7uP00b1W3u/mbDuNs66vO9yun6', '0606178639', 2, '2024-05-04 01:54:32', '2024-05-11 12:42:52', NULL),
(304, 'abdo@gmail.com', '$2y$12$1o5ccpVwqRPH7M.BNuPRWu7YMeOvxU5NHq3bDIXDPfyHsBgjbdiUa', '0606178638', 1, '2024-05-06 19:38:00', '2024-05-06 19:38:00', NULL),
(305, 'abdoboul@gmail.com', '$2y$12$UoCfVv92EbtDGRMVUT7yQuVX4pVJsRPL6mgnw9vjAlybWXGWGfoZu', '0606178638', 2, '2024-05-07 00:38:46', '2024-05-07 00:38:46', NULL),
(361, 'bouleknadelabderrahmane33@gmail.com', '$2y$12$mAewFZR0Vh57CLZdYKmyIeULDXM7uP00b1W3u/mbDuNs66vO9yun6', '0606178638', 2, '2024-05-08 01:08:55', '2024-05-09 18:11:39', NULL),
(363, 'admin@gmail.com', '$2y$12$mAewFZR0Vh57CLZdYKmyIeULDXM7uP00b1W3u/mbDuNs66vO9yun6', '0606178638', 0, NULL, NULL, NULL),
(364, 'yaqout02@gmail.com', '$2y$12$haLvgQAinua9.WscxLuMhOjDIGJNnQZG4dqLP3KeX9ad6qAgCIM5u', '0701229911', 2, '2024-05-10 13:59:09', '2024-05-10 13:59:09', NULL),
(373, 'nadounettenadia@gmail.com', '$2y$12$7fLH7ChOyDOQG7/x6Zlo4uGcOK.kR7cGAo/ySOTvJ8Liu4mi2uSSG', '0606178638', 2, '2024-05-18 23:27:47', '2024-05-18 23:27:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `niveau_etoile` int(11) NOT NULL,
  `id_membre` bigint(20) UNSIGNED NOT NULL,
  `id_formation` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`id`, `niveau_etoile`, `id_membre`, `id_formation`, `created_at`, `updated_at`) VALUES
(14, 2, 246, 49, '2024-05-06 18:53:40', '2024-05-06 18:53:40'),
(28, 2, 246, 48, '2024-05-11 18:51:22', '2024-05-11 18:51:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_membre_id_foreign` (`membre_id`),
  ADD KEY `commentaires_formation_id_foreign` (`formation_id`);

--
-- Index pour la table `demandeinscriptions`
--
ALTER TABLE `demandeinscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandeinscriptions_id_membre_foreign` (`id_membre`),
  ADD KEY `demandeinscriptions_id_formation_foreign` (`id_formation`);

--
-- Index pour la table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_formateurs_iduser` (`iduser`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formations_categ_id_foreign` (`categ_id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_id_membre_foreign` (`id_membre`),
  ADD KEY `inscriptions_id_session_foreign` (`id_session`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`iduser`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_id_formation_foreign` (`id_formation`),
  ADD KEY `sessions_id_formateur_foreign` (`id_formateur`);

--
-- Index pour la table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk22` (`id_session`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_id_membre_foreign` (`id_membre`),
  ADD KEY `fk5` (`id_formation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `demandeinscriptions`
--
ALTER TABLE `demandeinscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_membre_id_foreign` FOREIGN KEY (`membre_id`) REFERENCES `membres` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `demandeinscriptions`
--
ALTER TABLE `demandeinscriptions`
  ADD CONSTRAINT `demandeinscriptions_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demandeinscriptions_id_membre_foreign` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD CONSTRAINT `fk_formateurs_iduser` FOREIGN KEY (`iduser`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_categ_id_foreign` FOREIGN KEY (`categ_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_id_membre_foreign` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_id_session_foreign` FOREIGN KEY (`id_session`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`iduser`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_id_formateur_foreign` FOREIGN KEY (`id_formateur`) REFERENCES `formateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sessions_id_formation_foreign` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `supports`
--
ALTER TABLE `supports`
  ADD CONSTRAINT `fk22` FOREIGN KEY (`id_session`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_id_membre_foreign` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
