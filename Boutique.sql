-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 02 nov. 2024 à 20:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `libelle`, `prix`, `description`, `quantite`, `image`) VALUES
(1, 'Chapeau ', '3000', 'Ajoutez une touche d&#039;élégance à votre tenue avec notre chapeau en feutre. Conçu avec des matériaux de haute qualité, il offre confort et style tout au long de la journée. Parfait pour toutes les occasions, ce chapeau s&#039;adapte à votre personnalité tout en vous protégeant du soleil.\r\n\r\n', 25, 'uploads/image_6725ef5c0d0c29.58343835.jpg'),
(2, 'Champagne', '75000', 'Savourez l&#039;élégance de notre champagne premium, élaboré à partir des meilleurs raisins de la région. Chaque gorgée offre des notes délicates de fruits frais et une effervescence raffinée, idéale pour célébrer les moments spéciaux. Offrez-vous une expérience inoubliable et partagez la joie avec vos proches ', 4, 'uploads/image_6725efe6deca51.44496140.jpg'),
(3, 'modem Wifi', '25000', 'Optimisez votre connexion Internet avec notre routeur haute performance, conçu pour des vitesses ultra-rapides et une couverture étendue. Grâce à ses fonctionnalités avancées de sécurité, protégez votre réseau contre les intrusions. Idéal pour les foyers et les bureaux, il prend en charge plusieurs appareils sans compromettre la performance.\r\n\r\n', 15, 'uploads/image_6725f08fcdf584.20888926.jpeg'),
(4, 'Velo', '35000', 'Découvrez notre vélo léger et robuste, parfait pour les balades en ville ou les aventures sur des terrains variés. Équipé de composants de qualité et d&#039;un design ergonomique, il garantit confort et performance à chaque coup de pédale. Que vous soyez un cycliste novice ou expérimenté, ce vélo répondra à toutes vos attentes.', 7, 'uploads/image_6725f0fc850d32.00542768.jpeg'),
(5, 'Casque audio', '18000', 'Plongez dans un son immersif avec notre casque audio, offrant une qualité sonore exceptionnelle et un confort durable. Son design léger et ses fonctionnalités sans fil en font le compagnon idéal pour écouter votre musique partout.\r\n\r\n', 45, 'uploads/image_6725f46ec3b632.13097506.jpeg'),
(6, 'Chaussure de Sport', '2500', 'chaussures EPS, idéales pour les activités scolaires et les loisirs. Conçues avec des matériaux respirants et résistants, elles assurent un excellent maintien tout au long de la journée. Disponibles en plusieurs tailles, ces chaussures sont parfaites pour accompagner chaque pas avec confiance.\r\n\r\n', 52, 'uploads/image_6725f251e1d8d7.47217123.jpg'),
(7, 'Patalon', '7000', 'pantalon élégant, parfait pour le travail ou les sorties décontractées. Confectionné dans un tissu de haute qualité, il offre un ajustement confortable et une coupe moderne. Disponible en plusieurs couleurs, ce pantalon est un essentiel polyvalent pour toutes les occasions.', 11, 'uploads/image_6725f35fcf1f19.68484099.webp'),
(8, 'Montre Connecté', '11000', 'Découvrez notre montre connectée, le parfait allié pour suivre vos activités et votre santé au quotidien. Avec ses notifications intelligentes et son design élégant, elle combine style et fonctionnalité pour un mode de vie actif.\r\n\r\n', 7, 'uploads/image_6725f6e8948c53.70803058.jpg'),
(9, 'Modem', '15000', 'Améliorez votre connexion Internet avec notre modem haute vitesse, conçu pour des performances optimales et une configuration facile. Grâce à sa technologie avancée, il offre une stabilité exceptionnelle pour le streaming, le jeu en ligne et le télétravail. Compatible avec la plupart des fournisseurs, ce modem est l&#039;élément essentiel pour un réseau domestique fiable.\r\n\r\n', 5, 'uploads/image_6725f8d6563db8.30463303.avif'),
(10, 'pilovert', '5000', 'Découvrez notre pilouvert ultra doux, parfait pour vous garder au chaud lors des soirées fraîches. Conçu en tissu moelleux et confortable, il allie style et praticité pour un look décontracté. Idéal pour se détendre à la maison ou se blottir devant un bon film !', 28, 'uploads/image_6725f92dd59112.65369729.jpg'),
(11, 'Chaussure ', '12000', 'Élevez votre style et vos performances avec nos chaussures Nike, conçues pour allier confort et innovation. Grâce à leur design moderne et à leur technologie de pointe, elles offrent un excellent maintien et une amorti réactif pour tous vos entraînements. Que ce soit pour le sport ou la vie quotidienne, ces chaussures sont le choix parfait pour rester actif avec style.\r\n\r\n', 3, 'uploads/image_6725f970a76983.86262010.jpg'),
(12, 'Chaussure du soir', '15000', 'Chaussure pour vos soireés et fête bien confortable', 8, 'uploads/image_6725fa423f2da8.98557030.jpg'),
(13, 'Casque de moto', '4500', 'Tres resistant aux chocs , meilleure pour vous proteger sur la route', 45, 'uploads/image_6725facd950e07.31313568.jpeg'),
(14, 'ordinateur DELL', '17000', ' Ordinateur Dell, conçu pour répondre à tous vos besoins professionnels et personnels. Avec un processeur rapide et une mémoire généreuse, il gère facilement les tâches multitâches et les applications exigeantes.', 5, 'uploads/image_6726067b530d33.24061441.webp'),
(15, 'Smartphone', '80000', 'Élevez votre expérience mobile avec notre smartphone ultra-rapide, conçu pour capturer chaque instant avec style. Avec son design sleek et ses fonctionnalités innovantes, il est l&#039;outil parfait pour les aventuriers modernes !\r\n\r\n', 5, 'uploads/image_6725fcc3299799.29027416.jpg'),
(16, 'Smartphone', '75000', 'Découvrez notre smartphone puissant, alliant performance et élégance, idéal pour rester connecté au quotidien. Son appareil photo haute résolution et sa batterie longue durée vous garantissent une expérience exceptionnelle à chaque utilisation.\r\n\r\n', 4, 'uploads/image_6725fd31dccac1.13886757.jpg'),
(17, 'Sac au dos', '2000', 'Pratique et stylé, notre sac à dos est conçu pour accueillir toutes vos affaires avec confort. Sa conception ergonomique et ses multiples compartiments en font l&#039;allié idéal pour vos déplacements quotidiens ou vos aventures en plein air.\r\n\r\n', 41, 'uploads/image_6725fd8dba6446.71983777.webp');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(2555) NOT NULL,
  `role` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(1, 'DEFALEOUNA', 'Tchassama Dessoklema', 'maximedefa@gmail.com', '$2y$10$BquAyNgQiw1QaKBMlPzm8.Tx9qunZEObdfI8fjMSvCKhRXDWtnSPa', 'User'),
(3, 'DEFALEOUNA', 'Tchassama Dessoklema', 'maximedefaleouna@gmail.com', '$2y$10$o9gfcDFxQ/1IviAkQFVxzu7oRF.fkA98WNXyj4rShX8e0g8s4swp6', 'Admin'),
(4, 'GNANSA', 'Patrice', 'del@gmail.com', '$2y$10$WUtigkJdosLReavsBp2hkOTh1lO9DlHIS8n0Bn49Mo8rGZX1BOQVW', 'Admin'),
(7, 'BAKOMA', 'Audrey', 'audrey@gmail.com', '$2y$10$V1ikSF3XsHnVa19Ug0dTKuP/Ign.xEWQlfK4e6Rk0hdr//Vmj0KE.', 'User'),
(8, 'BAKOMA', 'Audrey', 'Delfy4015@gmail.com', '$2y$10$CwkcSbmew2NTmKZ2oS.NaePaMGZOJjZCdBUiBpTKMgrHvIQnGIcnO', 'Admin'),
(9, 'AWATE', 'GRACIA', 'AWATE@gmail.com', '$2y$10$uPtxqW4hEGxRiidGtNEmwezTtkpS6UEgsz/5XzelgVxVaVfkFN8Rq', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
