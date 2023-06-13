-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 mai 2022 à 22:01
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `peau` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `imageUrl` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `marque`, `peau`, `description`, `imageUrl`, `date`) VALUES
(3, 'Niacinamide 10% + Zinc 2%', 'The ordinary', 'Grasse, Mixte', 'Une formule vegan ultra-concentrée en vitamines et minéraux pour lutter contre les imperfections et les inflammations cutanées.\r\n\r\nLa Niacinamide (Vitamine B3), ici fortement concentrée (10%), réduit l\'apparence des imperfections et des pores dilatés. Cette formule contient aussi du sel de zinc d\'acide pyrrolidone carboxylique qui permet de réguler la production de sébum.', 'https://www.sephora.fr/dw/image/v2/BCVW_PRD/on/demandware.static/-/Sites-masterCatalog_Sephora/default/dw07ce870c/images/hi-res/SKU/SKU_1130/502450_swatch.jpg?sw=585&sh=585&sm=fit', '2022-05-02 16:54:32'),
(5, 'Acide Hyaluronique 2% + B5', 'The Ordinary', 'Tous, Grasse, Normal, Mixte, Seche', 'Une formule vegan hydratante à base d\'Acide Hyaluronique ultra-pur. Le poids moléculaire de l\'Acide Hyaluronique détermine sa capacité à agir en profondeur dans la peau.\r\n\r\nCette formule contient 3 poids moléculaires d\'Acide Hyaluronique (haut, moyen et bas), ainsi qu\'un polymère réticulé d\'Acide Hyaluronique de nouvelle génération, offrant une hydratation multicouche (en surface et en profondeur), sans huile. Cette concentration de 2% d\'Acide Hyaluronique est soutenue par la présence de Vitamine B5 qui renforce l\'hydratation de la surface de la peau.', 'https://www.sephora.fr/dw/image/v2/BCVW_PRD/on/demandware.static/-/Sites-masterCatalog_Sephora/default/dw42dfbd32/images/hi-res/SKU/SKU_1130/502440_swatch.jpg?sw=585&sh=585&sm=fit', '2022-05-02 16:59:36'),
(6, 'Serum Anti-Tache Vitamine C', 'Garnier', 'Tous, Grasse, Normal, Mixte, Seche', 'Rehaussez votre éclat avec le sérum Garnier Vitamin C. Ce sérum booster d\'éclat aide à rafraîchir et à rajeunir votre peau, pour un teint d\'apparence saine. Enrichi de 3,5 % de vitamine C, cet ingrédient puissant réduit l\'apparence des taches brunes tout en contribuant à illuminer votre peau. La niacinamide permet d\'hydrater en profondeur et de favoriser l\'élasticité de la peau, tandis que l\'acide salicylique élimine en douceur les impuretés.', 'https://m.media-amazon.com/images/I/61ZynO2TE2L._AC_SY355_.jpg', '2022-05-02 17:00:54'),
(7, 'SkinActive Serum Creme', 'Garnier', 'Tous, Grasse, Normal, Mixte, Seche', 'Une forte concentration de sérum avec de la vitamine C et une protection solaire, qui protège la peau des taches solaires.\r\n\r\nCette crème-sérum minimise la visibilité des taches brunes et des signes de fatigue, tout en éclaircissant et en améliorant l\'uniformité de la peau.\r\n\r\nUn produit 2 en 1 car il agit comme un hydratant quotidien avec SPF25 pour protéger la peau, et également comme un sérum avec de la vitamine C pour l\'éclaircir.\r\n\r\nIndiqué pour tous les types de peau et testé cliniquement (72% déclarent avoir la peau moins terne).', 'https://cdn.parfumdreams.de/Img/Art/7/GARNIER-Skin-Active-Serum-Creme-Vitamin-C-Glow-LSF-25-110502.jpg', '2022-05-02 17:00:54'),
(8, 'Serum Matifiant, Acide Azelaique 10%', 'Typology', 'Grasse, Mixte', 'Concentré en acide azélaïque d\'origine végétale et extrait de bambou bio pour réduire l\'excès de sébum et matifier les peaux grasses.', 'https://media.typology.com/storyblok/1bb452870c/serum-a-l-acide-azelaique__main__284a3a3fdba04c8d95674e9b0c13b979.jpg?twic=v1/quality=70', '2022-05-02 17:02:36');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `utilisateurId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `note` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `articleId`, `utilisateurId`, `comment`, `note`, `date`) VALUES
(50, 8, 17, 'lol', 2, '2022-05-05 18:57:26'),
(52, 8, 17, 'lol', NULL, '2022-05-05 19:12:04'),
(54, 8, 16, 'test', 2, '2022-05-06 18:01:13');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `ip`, `date_inscription`, `admin`) VALUES
(16, 'admin', 'admin@admin.fr', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '::1', '2022-05-02 15:13:20', 1),
(17, 'aman', 'aman@aman.fr', '180d803a580fabe1a24ddfdf6bf51ecbea0eb81f256b69ee6b39b33d294f6ebf', '::1', '2022-05-02 16:01:45', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`articleId`),
  ADD KEY `utilisateurId` (`utilisateurId`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`,`email`,`ip`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`utilisateurId`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
