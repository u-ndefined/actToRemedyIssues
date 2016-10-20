-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Jeu 20 Octobre 2016 à 18:36
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `testBDD`
--

-- --------------------------------------------------------

--
-- Structure de la table `act`
--

CREATE TABLE `act` (
  `act_id` int(11) NOT NULL,
  `act_remedyID` int(11) NOT NULL,
  `act_title` varchar(255) NOT NULL,
  `act_content` text NOT NULL,
  `act_authorID` int(11) NOT NULL,
  `act_postDate` datetime NOT NULL,
  `act_modifyDate` datetime NOT NULL,
  `act_feasibility` int(11) NOT NULL,
  `act_issueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `act`
--

INSERT INTO `act` (`act_id`, `act_remedyID`, `act_title`, `act_content`, `act_authorID`, `act_postDate`, `act_modifyDate`, `act_feasibility`, `act_issueID`) VALUES
(1, 1, 'Donnez moi votre argent', 'Envoyez moi vos dons. J’achèterai des poulets rôtis et je les enverrai en Afrique. Faites moi confiance!', 0, '2016-10-06 23:33:00', '0000-00-00 00:00:00', 1, 2),
(2, 3, 'Du poivre dans l\'océan', 'A chaque fois que vous faites les courses achetez du poivre en plus et versez le dans l\'océan. A force ça arrivera jusqu\'en Afrique.', 0, '2016-10-06 23:59:00', '0000-00-00 00:00:00', 500, 3),
(3, 4, 'Des graines', 'Envoyez leur des graines comme ça il feront pousser leurs propres citrouilles! (à moins qu\'ils ne les mangent avant :/)', 0, '2016-10-11 00:00:00', '0000-00-00 00:00:00', 42, 2),
(4, 1, 'Vous avez pas confiance?', 'Bon voici un lien pour faire une bonne action sans m\'envoyer votre argent: http://www.goodeed.com/', 0, '2016-10-12 00:00:00', '2016-10-20 13:56:58', 23, 2),
(21, 19, 'La marche à suivre', '- Retirer tous les bijoux (bagues, chaînes, bracelets...) du membre piqué car celui-ci va enfler (et après ce sera trop tard).\r\n- Si l\'aiguillon est resté dans la plaie il faut le faire sortir en faisant levier avec quelque chose de fin, sans appuyer dessus.\r\n- Munissez vous d\'une source de chaleur: cigarette, bout de bois incandescent, allume cigare, briquet, sèche-cheveux... et approchez le de la piqure (assez près pour ressentir la chaleur sans que ça ne brûle) pendant quelques secondes.\r\n- Puis désinfectez.', 14, '2016-10-14 19:25:14', '0000-00-00 00:00:00', 0, 0),
(29, 3, '[b]aze[/b]', '[i]azeeaz[/i] sqdv https://frenchmac.com/mac/utiliser-votre-mac-comme-reveil-2/', 14, '2016-10-16 23:19:49', '0000-00-00 00:00:00', 0, 0),
(30, 4, 'citrouilles', 'ffqdsfq[b]fsqfds[/b]', 14, '2016-10-17 10:45:17', '0000-00-00 00:00:00', 0, 0),
(32, 24, '3', '3', 14, '2016-10-17 16:56:47', '2016-10-17 17:01:36', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(511) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`config_name`, `config_value`) VALUES
('usernameMaxLength', '20'),
('usernameMinLength', '3');

-- --------------------------------------------------------

--
-- Structure de la table `intro`
--

CREATE TABLE `intro` (
  `intro_id` int(11) NOT NULL,
  `intro_title` varchar(255) NOT NULL,
  `intro_content` text NOT NULL,
  `intro_authorID` int(11) NOT NULL,
  `intro_postDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `intro`
--

INSERT INTO `intro` (`intro_id`, `intro_title`, `intro_content`, `intro_authorID`, `intro_postDate`) VALUES
(5, 'ceci est une intro', '1 trop 1 trop 1 trop 1 trop 1 trop 1 trop 1 trop 1 trop 1 trop 1 trop 1 trop 1 trop ', 14, '2016-10-20 18:34:50');

-- --------------------------------------------------------

--
-- Structure de la table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(11) NOT NULL,
  `issue_title` varchar(255) NOT NULL,
  `issue_content` text NOT NULL,
  `issue_sources` text NOT NULL,
  `issue_authorID` varchar(255) NOT NULL,
  `issue_postDate` datetime NOT NULL,
  `issue_modifyDate` datetime NOT NULL,
  `issue_urgency` int(11) NOT NULL,
  `issue_sectionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `issue`
--

INSERT INTO `issue` (`issue_id`, `issue_title`, `issue_content`, `issue_sources`, `issue_authorID`, `issue_postDate`, `issue_modifyDate`, `issue_urgency`, `issue_sectionID`) VALUES
(2, 'Faim dans le monde', 'Les petits africains n\'ont rien à manger. Quand on mange rien pendant trop longtemps on meurt!', '', 'undefined', '2016-10-06 00:00:00', '0000-00-00 00:00:00', 5, 1),
(3, 'Soif dans le monde', 'Toujours les mêmes ces petites africains ils n\'ont rien à manger, et rien à boire! Et l\'eau de mer ça compte pas, c\'est salé. Berk!', '', 'undefined', '2016-10-06 12:00:00', '0000-00-00 00:00:00', 12, 1),
(19, 'Piqûre d\'insecte', 'En cas de rencontre avec la petite bête qui pique, c\'est souvent la grosse bête qui pleure.\r\nQue faire en cas de piqure?', '', '14', '2016-10-14 19:25:14', '0000-00-00 00:00:00', 0, 5),
(22, 'IUG', 'IUG', '', '16', '2016-10-16 15:42:50', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_picture` varchar(255) NOT NULL,
  `member_rank` tinyint(4) NOT NULL,
  `member_signinDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`member_id`, `member_username`, `member_password`, `member_email`, `member_picture`, `member_rank`, `member_signinDate`) VALUES
(8, 'Pumpkinwaffle', 'c8e94539b3ed26a565b7c450a41d2e53', 'maxime.spraypaint@gmail.com', '0', 2, '2016-10-12 17:21:07'),
(11, 'Yachar', '44598f07c9ab3ecafe93af2b0c17fc1c', 'yachar.vl@gmail.com', '0', 2, '2016-10-12 20:45:18'),
(14, 'undefined', '8c0eb3282a86e7be6563f92aa5eb0f9a', 'paul.gaston@me.com', '1476225822.png', 4, '1942-04-02 04:42:42'),
(15, 'wood', '0', 'polwood@hotmail.fr', '1476269259.png', 2, '2016-10-12 12:47:39'),
(16, 'rorolabricot', 'eebd5093134824ef3fb27590de733c55', 'roxane.rodiac@hotmail.fr', '', 2, '2016-10-12 14:40:27'),
(17, 'sachaamm', '721a9b52bfceacc503c056e3b9b93cfa', 'sachaamm@gmail.com', '', 2, '2016-10-12 15:22:05');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_authorID` int(11) NOT NULL,
  `news_postDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_authorID`, `news_postDate`) VALUES
(5, 'ceci est une news', ' newsvv news news news news news news news news news news news newsvv', 14, '2016-10-20 18:34:26'),
(6, 'une news récente!', 'first!!!', 14, '2016-10-20 18:35:09');

-- --------------------------------------------------------

--
-- Structure de la table `privatemessage`
--

CREATE TABLE `privatemessage` (
  `PM_id` int(11) NOT NULL,
  `PM_sender` int(11) NOT NULL,
  `PM_recipient` int(11) NOT NULL,
  `PM_title` varchar(255) NOT NULL,
  `PM_content` text NOT NULL,
  `PM_sendDate` datetime NOT NULL,
  `PM_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `privatemessage`
--

INSERT INTO `privatemessage` (`PM_id`, `PM_sender`, `PM_recipient`, `PM_title`, `PM_content`, `PM_sendDate`, `PM_read`) VALUES
(2, 14, 0, 'test', 'Salut Roxane! Ceci est le premier test (concluant) de la messagerie!', '2016-10-18 22:29:37', 0),
(3, 14, 16, 'mieux', 'Maintenant ça marche mieux :)', '2016-10-18 22:34:07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `remedy`
--

CREATE TABLE `remedy` (
  `remedy_id` int(11) NOT NULL,
  `remedy_issueID` int(11) NOT NULL,
  `remedy_title` varchar(255) NOT NULL,
  `remedy_content` text NOT NULL,
  `remedy_sources` text NOT NULL,
  `remedy_authorID` varchar(255) NOT NULL,
  `remedy_postDate` datetime NOT NULL,
  `remedy_modifyDate` datetime NOT NULL,
  `remedy_relevence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `remedy`
--

INSERT INTO `remedy` (`remedy_id`, `remedy_issueID`, `remedy_title`, `remedy_content`, `remedy_sources`, `remedy_authorID`, `remedy_postDate`, `remedy_modifyDate`, `remedy_relevence`) VALUES
(1, 2, 'Le rôti pardi!', 'J\'aime bien le poulet rôti, et c\'est vrai que ça calle bien. On pourrait leur en envoyer!', '', 'undefined', '2016-10-06 23:00:00', '0000-00-00 00:00:00', 15),
(3, 3, 'Poivrez là!', 'Si l\'eau de mer est trop salé il suffit de la poivrer et elle sera buvable.', '', 'undefined', '2016-10-06 23:00:00', '2016-10-19 10:58:52', 50),
(4, 2, 'pourquoi pas la tarte à la citrouille?', 'c\'est meilleur la tarte à la citrouille et en plus c\'est végétarien. nah!', '', 'waffleOfPumpkin', '2016-10-07 15:00:00', '0000-00-00 00:00:00', 1),
(19, 19, 'Chauffer le venin', 'Le venin de la plupart des insectes qui nous piquent l\'été (guêpes, abeilles, taon...) est thermolabile, la chaleur l\'inactive.\r\n\r\nhttps://www.youtube.com/watch?v=9KHUHaaMIBw', 'https://www.youtube.com/watch?v=9KHUHaaMIBw', '14', '2016-10-14 19:25:14', '2016-10-18 13:36:48', 0),
(23, 22, 'KPJP', 'K', '', '16', '2016-10-16 15:42:56', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `section_order`) VALUES
(1, 'Écologie', 10),
(2, 'Éducation', 20),
(3, 'Humanitaire', 30),
(4, 'Autre', 200),
(5, 'Santé', 40),
(6, 'Politique', 50),
(7, 'Économie', 60);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `act`
--
ALTER TABLE `act`
  ADD PRIMARY KEY (`act_id`);

--
-- Index pour la table `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`intro_id`);

--
-- Index pour la table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Index pour la table `privatemessage`
--
ALTER TABLE `privatemessage`
  ADD PRIMARY KEY (`PM_id`);

--
-- Index pour la table `remedy`
--
ALTER TABLE `remedy`
  ADD PRIMARY KEY (`remedy_id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD UNIQUE KEY `section_order` (`section_order`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `act`
--
ALTER TABLE `act`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `intro`
--
ALTER TABLE `intro`
  MODIFY `intro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `privatemessage`
--
ALTER TABLE `privatemessage`
  MODIFY `PM_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `remedy`
--
ALTER TABLE `remedy`
  MODIFY `remedy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;