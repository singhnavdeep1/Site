
CREATE DATABASE site;

CREATE TABLE `utilisateurs` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `avis` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `articleId` int(11) NOT NULL,
  `utilisateurId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `note` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `articles` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `peau` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `imageUrl` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `articles` (`id`, `titre`, `marque`, `peau`, `description`, `imageUrl`, `date`) VALUES
(3, 'Niacinamide 10% + Zinc 2%', 'The ordinary', 'Grasse, Mixte', 'Une formule vegan ultra-concentrée en vitamines et minéraux pour lutter contre les imperfections et les inflammations cutanées.\r\n\r\nLa Niacinamide (Vitamine B3), ici fortement concentrée (10%), réduit l\'apparence des imperfections et des pores dilatés. Cette formule contient aussi du sel de zinc d\'acide pyrrolidone carboxylique qui permet de réguler la production de sébum.', 'https://www.sephora.fr/dw/image/v2/BCVW_PRD/on/demandware.static/-/Sites-masterCatalog_Sephora/default/dw07ce870c/images/hi-res/SKU/SKU_1130/502450_swatch.jpg?sw=585&sh=585&sm=fit', '2022-05-02 16:54:32'),
(5, 'Acide Hyaluronique 2% + B5', 'The Ordinary', 'Tous, Grasse, Normal, Mixte, Seche', 'Une formule vegan hydratante à base d\'Acide Hyaluronique ultra-pur. Le poids moléculaire de l\'Acide Hyaluronique détermine sa capacité à agir en profondeur dans la peau.\r\n\r\nCette formule contient 3 poids moléculaires d\'Acide Hyaluronique (haut, moyen et bas), ainsi qu\'un polymère réticulé d\'Acide Hyaluronique de nouvelle génération, offrant une hydratation multicouche (en surface et en profondeur), sans huile. Cette concentration de 2% d\'Acide Hyaluronique est soutenue par la présence de Vitamine B5 qui renforce l\'hydratation de la surface de la peau.', 'https://www.sephora.fr/dw/image/v2/BCVW_PRD/on/demandware.static/-/Sites-masterCatalog_Sephora/default/dw42dfbd32/images/hi-res/SKU/SKU_1130/502440_swatch.jpg?sw=585&sh=585&sm=fit', '2022-05-02 16:59:36'),
(6, 'Serum Anti-Tache Vitamine C', 'Garnier', 'Tous, Grasse, Normal, Mixte, Seche', 'Rehaussez votre éclat avec le sérum Garnier Vitamin C. Ce sérum booster d\'éclat aide à rafraîchir et à rajeunir votre peau, pour un teint d\'apparence saine. Enrichi de 3,5 % de vitamine C, cet ingrédient puissant réduit l\'apparence des taches brunes tout en contribuant à illuminer votre peau. La niacinamide permet d\'hydrater en profondeur et de favoriser l\'élasticité de la peau, tandis que l\'acide salicylique élimine en douceur les impuretés.', 'https://m1.quebecormedia.com/emp/emp/8198KNSqS9L._AC_SL1500_6c1ebc97-be37-4659-8ef6-aba6d69c97dd_ORIGINAL.jpg?impolicy=crop-resize&x=0&y=0&w=1500&h=1500&width=925&height=925', '2022-05-02 17:00:54'),
(7, 'SkinActive Serum Creme', 'Garnier', 'Tous, Grasse, Normal, Mixte, Seche', 'Une forte concentration de sérum avec de la vitamine C et une protection solaire, qui protège la peau des taches solaires.\r\n\r\nCette crème-sérum minimise la visibilité des taches brunes et des signes de fatigue, tout en éclaircissant et en améliorant l\'uniformité de la peau.\r\n\r\nUn produit 2 en 1 car il agit comme un hydratant quotidien avec SPF25 pour protéger la peau, et également comme un sérum avec de la vitamine C pour l\'éclaircir.\r\n\r\nIndiqué pour tous les types de peau et testé cliniquement (72% déclarent avoir la peau moins terne).', 'https://cdn.parfumdreams.de/Img/Art/7/GARNIER-Skin-Active-Serum-Creme-Vitamin-C-Glow-LSF-25-110502.jpg', '2022-05-02 17:00:54'),
(8, 'Serum Matifiant, Acide Azelaique 10%', 'Typology', 'Grasse, Mixte', 'Concentré en acide azélaïque d\'origine végétale et extrait de bambou bio pour réduire l\'excès de sébum et matifier les peaux grasses.', 'https://media.typology.com/storyblok/1bb452870c/serum-a-l-acide-azelaique__main__284a3a3fdba04c8d95674e9b0c13b979.jpg?twic=v1/quality=70', '2022-05-02 17:02:36');

INSERT INTO avis (id, articleId, utilisateurId, comment, note, date) VALUES
(50, 8, 17, 'M\'a donne beaucoup de boutons, je ne recommande pas', 2, '2022-05-05 18:57:26'),
(52, 5, 17, 'rapport qualite/prix imbattable ! c\'est le troisieme que j\'achete, la texture de ma peau s\'est amelioree', 5, '2022-05-05 19:12:04'),
(54, 3, 16, 'bof, le produit rend le visage collant', 1, '2022-05-06 18:01:13'),
(55, 7, 18, 'le spf 25 est genial, c\'est assez rare de retrouver ca dans des serums ! Ma peau est bien plus hydratee et moins sensible. Et l\'odeur ? WAW', 5, '2022-05-06 18:01:13'),
(56, 6, 5, 'je l\'utilise depuis moins d\'un mois et ma peau est plus lumineuse ! J\'ai moins de tache et c\'est exactement pour cela que je l\'ai achete donc si vous hesitez..foncez sur celui-ci !!!', 5, '2022-03-14 06:36:02');

INSERT INTO utilisateurs (id, pseudo, email, password, ip, date_inscription, admin) VALUES
(5, 'EnjoyPhoenix', 'marieytb@gmail.fr', '180d803a580fabe1a24ddfdf6bf51ecbea0eb81f256b69ee6b39b33d294f6ebf', '::1', '2022-03-15 11:58:05', 0),
(16, 'admin', 'admin@admin.fr', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '::1', '2022-05-02 15:13:20', 1),
(17, 'elisa', 'elisa@elisa.fr', '180d803a580fabe1a24ddfdf6bf51ecbea0eb81f256b69ee6b39b33d294f6ebf', '::1', '2022-05-02 16:01:45', 0),
(18, 'manouKiss', 'manel.hdd@gmail.fr', '180d803a580fabe1a24ddfdf6bf51ecbea0eb81f256b69ee6b39b33d294f6ebf', '::1', '2022-05-02 15:02:49', 0);
