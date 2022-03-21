-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 mars 2022 à 13:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `estenouest`
--

-- --------------------------------------------------------

--
-- Structure de la table `pro_activities`
--

DROP TABLE IF EXISTS `pro_activities`;
CREATE TABLE IF NOT EXISTS `pro_activities` (
  `act_id` int(11) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(50) NOT NULL,
  `act_icon` varchar(500) DEFAULT NULL,
  `act_icon_views` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_activities`
--

INSERT INTO `pro_activities` (`act_id`, `act_name`, `act_icon`, `act_icon_views`) VALUES
(1, 'Ski', 'ski.png', NULL),
(2, 'Randonnée', 'randonnee.png', NULL),
(3, 'Détente', 'detente.png', NULL),
(4, 'Alpinisme', 'alpinisme.png', NULL),
(5, 'Escalade', 'escalade.png', NULL),
(6, 'Surf', 'surf.png', NULL),
(7, 'Vélo', 'velo.png', NULL),
(8, 'Parachute', 'parachute.png', NULL),
(9, 'Parapente', 'parapente.png', NULL),
(10, 'Musées', 'musee.png', NULL),
(11, 'Visites Historiques', 'histoire.png', NULL),
(12, 'Découvertes Culinaires', 'manger.png', NULL),
(13, 'Jet Ski', 'jetski.png', NULL),
(14, 'Sandsurf', 'sandsurf.png', NULL),
(15, 'Buggy', 'buggy.png', NULL),
(16, 'Tourisme Urbain', 'ville.png', NULL),
(17, 'Golf', 'golf.png', NULL),
(18, 'Plongée Sous-marine', 'plongee', NULL),
(19, 'Shopping', 'shopping.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pro_blog`
--

DROP TABLE IF EXISTS `pro_blog`;
CREATE TABLE IF NOT EXISTS `pro_blog` (
  `blo_id` int(11) NOT NULL AUTO_INCREMENT,
  `blo_title` varchar(300) DEFAULT NULL,
  `blo_content` longtext,
  `blo_picture` varchar(50) DEFAULT NULL,
  `blo_moderation` tinyint(1) NOT NULL,
  `use_id` int(11) NOT NULL,
  PRIMARY KEY (`blo_id`),
  KEY `pro_blog_pro_users_FK` (`use_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_blog`
--

INSERT INTO `pro_blog` (`blo_id`, `blo_title`, `blo_content`, `blo_picture`, `blo_moderation`, `use_id`) VALUES
(24, 'Partir en Trekking au Népal', '<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">Avant de poser le pied au N&eacute;pal, je n&rsquo;avais jamais de ma vie march&eacute; plusieurs jours d&rsquo;affil&eacute;e. Ma plus grande rando ? Une journ&eacute;e, en France, 11 km et 900 m&egrave;tres de d&eacute;nivel&eacute;. Il m&rsquo;a fallu 3 jours pour m&rsquo;en remettre&nbsp;<em style=\"margin: 0px; padding: 0px;\">(edit : &ccedil;a c&rsquo;&eacute;tait avant ! Depuis lors, j&rsquo;ai pris go&ucirc;t &agrave; la marche et bien progress&eacute;).</em></p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">Bien s&ucirc;r, d&egrave;s l&rsquo;instant o&ugrave; j&rsquo;ai r&eacute;serv&eacute; ce voyage, je me suis jur&eacute;e de m&rsquo;entra&icirc;ner, d&rsquo;aller marcher tous les dimanches et de courir tous les matins. Mais force est de constater que mes bonnes r&eacute;solutions n&rsquo;ont pas la persistance des neiges &eacute;ternelles. Je me suis donc retrouv&eacute;e &agrave; Katmandou avec un entra&icirc;nement proche de l&rsquo;altitude 0. Mais, vous l&rsquo;aurez devin&eacute; en lisant ces lignes : j&rsquo;ai surv&eacute;cu !</p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">Je vous rassure tout de suite : je ne me suis pas lanc&eacute;e &agrave; l&rsquo;assaut de l&rsquo;Everest sans pr&eacute;paration. Je me suis content&eacute;e de signer pour un mini-trek de niveau &laquo; facile &agrave; moyen &raquo;, dixit la brochure de mon agence de voyage. Une boucle de 3 jours autour du village de Ghorepani en passant par Poon Hill, &agrave; 3 270 m&egrave;tres d&rsquo;altitude. Bien sous la barre fatidique des 4 000 m&egrave;tres, altitude &agrave; laquelle plane le spectre du mal d&rsquo;altitude.</p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">Apr&egrave;s avoir pass&eacute; 4 heures d&rsquo;affil&eacute;e &agrave; gravir des marches irr&eacute;guli&egrave;res &agrave; flan de montagne, j&rsquo;ai saisi toute la relativit&eacute; du qualificatif &laquo; facile &agrave; moyen &raquo;. Mais j&rsquo;ai tenu bon, j&rsquo;ai ma fiert&eacute; tout de m&ecirc;me ! Et &agrave; mon grand &eacute;tonnement, pas apr&egrave;s pas, je suis arriv&eacute;e &agrave; destination.</p>', '622a14e9d70f9.JPG', 1, 15),
(26, 'Séville: l\'Andalousie dans toute sa splendeur', '<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"color: #242424;\">Quand on &eacute;voque la magie de l&rsquo;Andalousie, on pense spontan&eacute;ment &agrave; l&rsquo;Alhambra de </span><strong>Grenade</strong><span style=\"color: #242424;\">&nbsp;C&rsquo;est vrai qu&rsquo;avec ses jardins, ses palais et ses fortifications, sans compter toutes les l&eacute;gendes qui l&rsquo;animent, ce vestige d&rsquo;Al Andaluz a de quoi faire vibrer l&rsquo;imagination&hellip; Et pourtant, &agrave; mes yeux, son rival,&nbsp;</span><span style=\"color: #242424; margin: 0px; padding: 0px; font-weight: bold;\">l&rsquo;Alcazar de S&eacute;ville</span><span style=\"color: #242424;\">, bien que plus petit, est encore plus splendide, plus magique, plus envo&ucirc;tant, inoubliable&hellip;</span></p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">J&rsquo;avais &eacute;t&eacute; s&eacute;duit par la sc&egrave;ne culinaire de <span style=\"color: #000000;\"><strong>Malaga</strong></span>, ses bars &agrave; tapas, ses fameuses brochettes de sardines grill&eacute;es sur la plage&hellip; Mais &agrave; S&eacute;ville, le niveau &eacute;tait encore un cran sup&eacute;rieur. Des&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">bons restos</span>, des&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">petits caf&eacute;s sympas</span>, des&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">bars &agrave; tapas traditionnels ou revisit&eacute;s</span>, il y en a &agrave; tous les coins de rue. Une ambiance joyeuse et p&eacute;tillante anime les quartiers populaires jusqu&rsquo;aux petites heures.</p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">J&rsquo;avais aim&eacute; l&rsquo;architecture unique de <span style=\"color: #000000;\"><strong>Ronda</strong></span>: ses palais perch&eacute;s au bord de la falaise, ses promenades, sa vieille ville&hellip; S&eacute;ville avec ses&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">parcs</span>, son&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">ancien quartier juif</span>, sa&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">richesse culturelle</span>&nbsp;et ses&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">impressionnants monuments</span>&nbsp;&eacute;tait tout aussi splendide, dans un autre genre.</p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">S&eacute;ville, Ishbilliyya en arabe, Hispalis en latin&hellip; Une&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">cit&eacute; ancienne</span>&nbsp;devenue &agrave; une &eacute;poque l&rsquo;un des poumons &eacute;conomiques et culturels du monde occidental. Au XVI&egrave;me si&egrave;cle, S&eacute;ville, avec son acc&egrave;s &agrave; la mer via le fleuve Guadalquivir, a en effet le&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">monopole sur le commerce des richesses du Nouveau Monde</span>.</p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">De cette histoire longue et florissante, S&eacute;ville garde aujourd&rsquo;hui une&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bold;\">architecture m&eacute;tiss&eacute;e</span>&nbsp;d&rsquo;influences arabes, juives et chr&eacute;tiennes et des quartiers charg&eacute;s d&rsquo;histoire et de secrets.</p>', '622a188b2612f.JPG', 1, 14),
(27, 'Apprivoiser Bangkok', '<p><span style=\"color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">Bien install&eacute;s &agrave; l&rsquo;arri&egrave;re d&rsquo;un taxi climatis&eacute;, nous regardons d&eacute;filer les buildings &eacute;clair&eacute;s, oubliant quelques instants&nbsp;le chaos de la circulation autour de nous. Nous voici de retour pour une semaine dans cette&nbsp;</span><strong style=\"margin: 0px; padding: 0px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">m&eacute;gapole de 6 millions d&rsquo;habitants</strong><span style=\"color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">. Notre programme nous laisse relativement peu de temps libre puisque nous sommes ici pour participer &agrave; une conf&eacute;rence sur le blogging voyage mais nous comptons bien&nbsp;</span><strong style=\"margin: 0px; padding: 0px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">tenter la r&eacute;conciliation</strong><span style=\"color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">&nbsp;avec Bangkok.</span></p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">A peine le temps de d&eacute;poser&nbsp;nos valises&nbsp;dans la petite guesthouse du quartier des affaires de Silom o&ugrave; nous tenterons de r&eacute;cup&eacute;rer un maximum du d&eacute;calage horaire et nous nous mettons en qu&ecirc;te de notre premier repas sur place. Au menu,&nbsp;<strong style=\"margin: 0px; padding: 0px;\"><em style=\"margin: 0px; padding: 0px;\">streetfood</em></strong>&nbsp;bien s&ucirc;r ! Je r&ecirc;ve de cette d&eacute;licieuse soupe de nouilles&nbsp;au poulet&nbsp;(<em style=\"margin: 0px; padding: 0px;\">Kuai Tiao Nam Sai</em>)&nbsp;dont je me suis r&eacute;gal&eacute;e tout au long de notre dernier voyage en Tha&iuml;lande.</p>\r\n<p style=\"margin: 0px 0px 30px; padding: 0px; line-height: 24px; color: #242424; font-family: lora, sans-serif; font-size: 16px; background-color: #ffffff;\">La soupe arrive, fumante, dans un bol en plastique bleu. Ici, on ne s&rsquo;embarrasse pas de chichis et d&rsquo;art de la table.&nbsp;<strong style=\"margin: 0px; padding: 0px;\">On mange &agrave; m&ecirc;me le trottoir</strong>, sur une petite table en plastique qui me rappelle les ann&eacute;es o&ugrave; je jouais &agrave; la dinette avec ma petite soeur. Un rouleau de papier WC fait office de serviettes. En lieu et place de sel et poivre, nous avons tout ce qu&rsquo;il faut pour &eacute;picer &agrave; notre go&ucirc;t le repas : piment s&eacute;ch&eacute;, sucre, sauce poisson, vinaigre au piment. Je m&rsquo;en donne &agrave; coeur joie, au risque de m&rsquo;insensibiliser les papilles.</p>', '622a19f168fb5.JPG', 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `pro_categories`
--

DROP TABLE IF EXISTS `pro_categories`;
CREATE TABLE IF NOT EXISTS `pro_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_category` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_categories`
--

INSERT INTO `pro_categories` (`cat_id`, `cat_category`) VALUES
(1, 'Montagne'),
(2, 'Plage'),
(3, 'Ville'),
(4, 'Sport'),
(5, 'Histoire'),
(6, 'Gastronomie');

-- --------------------------------------------------------

--
-- Structure de la table `pro_destination`
--

DROP TABLE IF EXISTS `pro_destination`;
CREATE TABLE IF NOT EXISTS `pro_destination` (
  `des_id` int(11) NOT NULL AUTO_INCREMENT,
  `des_picture` varchar(500) DEFAULT NULL,
  `des_title` varchar(100) DEFAULT NULL,
  `des_description` varchar(5000) DEFAULT NULL,
  `des_city_code` varchar(50) NOT NULL,
  `des_iframe` varchar(5000) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `des_visit` int(11) DEFAULT NULL,
  PRIMARY KEY (`des_id`),
  KEY `pro_destination_pro_categories_FK` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_destination`
--

INSERT INTO `pro_destination` (`des_id`, `des_picture`, `des_title`, `des_description`, `des_city_code`, `des_iframe`, `cat_id`, `des_visit`) VALUES
(13, '62068276dbc4d.JPG', 'Tignes', 'Si on se rend à Tignes c’est forcément pour y pratiquer du ski et en la matière, il y a pas mal de choix. La station de Val Claret qui a vu le jour en 1965 est l’une des plus animées grâce à la présence de nombreux commerces et d’une boîte de nuit. Outre les sports d’hiver, Tignes est aussi connue pour ses activités de parachutisme et de parapente qui donnent l’occasion de survoler les massifs montagneux en toute sécurité pour davantage de sensations fortes. Les plus audacieux pourront s’aventurer sur Le glacier de la Grande Motte pour s’adonner au ski sur glace et profiter des services prévus pour les touristes.', '2972607', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d179057.78228874342!2d6.821084262389219!3d45.47427883867073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47890c63287d7ebb%3A0x408ab2ae4baa8b0!2s73320%20Tignes!5e0!3m2!1sfr!2sfr!4v1644593772713!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 15),
(14, '62068320d4c7e.JPG', 'Luchon', 'Autour de Luchon, 400 km de sentiers balisés s’ouvrent à vous, pour des balades ou des randonnées au long cours. Immergez-vous ainsi dans les paysages magnifiques de la vallée de la Pique, de la vallée d’Oueil, de la vallée du Lys où vous ferez face à la Cascade d\'Enfer. Grimpez vers le lac d\'Oô, l\'un des plus beaux lacs d\'altitude des Pyrénées centrales. Partez pour une randonnée cyclo dans les roues des coureurs du Tour de France.', '3035416', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1540313.8253701543!2d-0.8287379785261157!3d42.89855679789499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a861f104f68b5b%3A0x387ece5e3eeee589!2s31110%20Bagn%C3%A8res-de-Luchon!5e0!3m2!1sfr!2sfr!4v1644593929064!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 25),
(15, '620683aec78d3.JPG', 'Aspen', 'Une station de ski pour les happy few ? Oui, c’est un peu le côté glamour qu’aime montrer Aspen, cette station de ski huppée du Colorado. Avec un peu de chance vous croiserez sur les pistes Mariah Carey ou Antonio Banderas. Mais au-delà de cet aspect mondain, la destination de ski la plus populaire de tout l’Ouest américain est un site époustouflant.', '5412230', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85020.78474663947!2d-106.88309309795787!3d39.199718978912244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8740397cf7413c7d%3A0xc12b42dc782cf672!2sAspen%2C%20Colorado%2081611%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2sfr!4v1644594082790!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 13),
(16, '6207840deea91.jpg', 'Tenerife', 'Tenerife est l\'île des mille expériences sur une seule et même île. Vous pourrez pénétrer dans la nature, vous détendre sur la place, monter au Teide, faire du shopping, aller voir un spectacle, vous promener dans la vieille ville, vous amuser dans un parc à thème, jouer au golf... Gonflez-vous d\'énergie en pratiquant un nombre infini d\'activités, mais surtout, ne partez pas de Tenerife sans goûter à l\'excellente gastronomie. Vous asseoir en terrasse avec vue sur la mer et savourer des crevettes est une expérience délectable.', '2511174', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d304477.99567204795!2d-16.629658870109548!3d28.29902315270726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc4029effe8682ed%3A0xb01a4bf1c84baf3c!2sTenerife!5e0!3m2!1sfr!2sfr!4v1644659457530!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 6),
(17, '6207f16abfe8c.jpg', 'Bourg Saint Maurice', 'Pôle d’attraction de la vallée et en lien direct avec Les Arcs, c’est une ville qui compte de nombreux commerces, restaurants, hôtels et services. Des vacances stratégiques puisque vous serez au cœur de la vallée avec un accès direct aux différents cols d’altitude et à quelques kilomètres de l’Italie.  Tout l’été, le terroir est mis à l’honneur avec de nombreux marchés et la place belle à l’artisanat local. Vous pourrez goûter à différents sports depuis la vallée avec notamment l’eau vive, pratiquée à quelques minutes du centre-ville : rafting, canoë, hydrospeed... ', '3002138', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103859.51750203696!2d6.733476976452664!3d45.6511457658931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4789663482257639%3A0x408ab2ae4bab6b0!2s73700%20Bourg-Saint-Maurice!5e0!3m2!1sfr!2sfr!4v1644687710651!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 18),
(18, '6207f3564b9cf.jpg', 'Biarritz', 'Élégante station balnéaire du sud-ouest de la France, Biarritz était autrefois le lieu de villégiature préféré de la noblesse. C’est aujourd’hui la capitale européenne du surf. Prise d’assaut tout l’été, elle connaît un véritable essor touristique. À Biarritz, vous ne trouverez ni le luxe ni les paillettes de la Côte d’Azur, mais vous croiserez aussi bien des vacanciers chics et aisés que des surfeurs en tongs, et vous entendrez parler français, espagnol et basque. La Grande Plage est le véritable pôle d’attraction de la ville. Juste derrière, visitez le casino Art déco restauré, et promenez-vous au hasard des rues jusqu’au vieux port, à l’ouest de la ville.', '3032797', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46328.06153880549!2d-1.5908099034764396!3d43.470954506605494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51152b0af31e33%3A0x40665174813a830!2s64200%20Biarritz!5e0!3m2!1sfr!2sfr!4v1644687816153!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 17),
(19, '620a2b2a6c9cc.jpg', 'Bora-Bora', 'Des plages de sable blanc parfaites s’allient à des eaux azurées où les poissons colorés animent les jardins de corail d’où surgissent des raies manta majestueuses et élégantes. Vous voilà au coeur d’un univers romantique où il fait bon de se détendre au creux des bungalows sur pilotis des hôtels de luxe ou des SPAs dont les villas en toit de chaume accompagnent un cadre et une atmosphère légendaire. Autrement dit, Bora Bora est l’une des plus belles îles au monde.', '4034688', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21954.990602799364!2d-151.72940327808107!3d-16.50145649054575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x76bdbd188a4a98ab%3A0x160a089e92d5ce61!2sBora-Bora!5e0!3m2!1sfr!2sfr!4v1644833469376!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 57),
(20, '620a2f11563c9.jpg', 'Cala Macarella, Minorque', 'Située au sud-ouest de Minorque, dans les îles Baléares, la plage secrète et isolée de Cala Macarella vous offre un sable fin d’une blancheur étincelante et des eaux calmes bleu azur sur une petite étendue de 105 mètres. En forme de fer à cheval, elle est bordée de falaises et de forêts de chênes verdoyants, ce qui en fait l’une des plus belles plages d’Europe. Prévoyez masque et tuba pour faire du snorkeling dans cet endroit qui fait la fierté des minorquins.', '6533953', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106730.22772551156!2d3.8901929094002234!3d39.95253164690794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x129587974b14648f%3A0xe9cf8ae05776f53f!2sPort%20Mahon%2C%20Bal%C3%A9ares%2C%20Espagne!5e0!3m2!1sfr!2sfr!4v1644834438317!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 2),
(21, '620a2fbfe7b55.jpg', 'Nazaré', 'Située au nord du Sitio, le célèbre promontoire de Nazaré, la plage do Norte possède un charme et des paysages authentiques. Avec son phare, ses tentes rayées et son petit fort, la plage est entourée de dunes de sable fin qui permettent de protéger la végétation environnante.\r\nTrès calme, la plage est surtout fréquentée par les surfeurs, qui viennent tenter de dompter les vagues spectaculaires qui y déferlent tout au long de l’année. Si vous êtes chanceux, vous pourrez apercevoir les groupes de dauphins qui nagent parfois au large.', '2265552', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58913.110802105366!2d-9.072338020474687!3d39.605498082182415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd18a8232f6ad417%3A0x3d2d871af42106f!2sNazar%C3%A9%2C%20Portugal!5e0!3m2!1sfr!2sfr!4v1644834739626!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 6),
(22, '620a31513b00c.jpg', 'Fig Tree Bay, Protaras (Chypre)', 'Plage la plus populaire de Protaras, Fig Tree Bay est très appréciée par les familles en raison de ses nombreux aménagements et infrastructures. Très animée dès la tombée de la nuit, son sable couleur or et ses eaux limpides sont propices à la baignade ainsi qu’au snorkeling en journée.\r\n\r\nNommée d’après le figuier solitaire qui se trouve tout au bout de la plage, elle fait partie des plages les plus propres et préservées de Chypre grâce aux programmes écologiques mis en place dans le pays.', '18918', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13071.026153078641!2d34.050145232145745!3d35.01279913568652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14dfc40608add83b%3A0x84b602d4d8d7723f!2sFig%20Tree%20Bay!5e0!3m2!1sfr!2sfr!4v1644835111357!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 4),
(23, '620a33664b54a.jpg', 'Bali', 'Bali fait partie des îles les plus enchanteresses au monde. Malgré sa taille réduite, elle vous promet de nombreuses aventures. Les fans de soleil et les surfeurs se pressent sur les plages idylliques de la côte sud-ouest, tandis que Ubud attire les touristes recherchant bien-être et spiritualité. Bali séduit tous les voyageurs : écotouristes, hédonistes et âmes en quête de détente, mais aussi les fans de vie nocturne avec les clubs de Seminyak et Kuta, les amateurs de luxe dans les hôtels de Nusa Dua, et les aventuriers qui s\'attaquent aux jungles et volcans au nord de l\'île.', '1650535', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1010290.7975268234!2d114.51105816599815!3d-8.455697404655568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd22f7520fca7d3%3A0x2872b62cc456cd84!2sBali!5e0!3m2!1sfr!2sfr!4v1644835541601!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 5),
(24, '620a3432383c3.jpg', 'Malindi, Kenya', 'Cette ville est traditionnellement un lieu portuaire important, mais est aujourd’hui davantage devenue une station balnéaire animée très prisée des touristes internationaux pour son dynamisme, sa richesse culturelle et ses plages de sable blanc.', '187968', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152692.52395111645!2d40.06823608068904!3d-3.2020137795888495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18158fa8aba15693%3A0xcbebf1008265d79d!2sMalindi%2C%20Kenya!5e0!3m2!1sfr!2sfr!4v1644835850657!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 3),
(25, '620a35e58aee1.jpg', 'Baie de Maputo, Mozambique', 'Sable blanc, dunes dorées et eaux limpides de l’océan Indien sont les qualificatifs qui décrivent bien les plages de cette baie. Cette plage idyllique plaira tant aux plongeurs qu’aux simples vacanciers venus profiter de la tranquillité des lieux.\r\n\r\nBordée de sable blanc, cette plage est idéale pour les amateurs de farniente et de soleil. Pour les plus aventureux, l’eau turquoise de l’océan Indien offre une grande variété de coraux qui surprennent par leurs couleurs et leurs formes variées.', '1040652', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d137557.12464074706!2d32.50591984700525!3d-25.911489218855092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ee69723b666da55%3A0x42497f579a6bb442!2sMaputo%2C%20Mozambique!5e0!3m2!1sfr!2sfr!4v1644836240164!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 2, 4),
(28, '620babbfee0e8.jpg', 'Chamonix', 'Au cœur de la Haute-Savoie, vos rêves de nature et de montagne prennent vie dans la Vallée de Chamonix-Mont-Blanc. Repoussez vos limites jusqu’à l’Aiguille du Midi, découvrez les récits des pionniers de l’alpinisme et skiez sur les pistes magiques de nos 5 stations face au mont Blanc.', '3027301', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d177605.7494578762!2d6.789012411358123!3d45.92950427145309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47894c062dfe2ee7%3A0x408ab2ae4baa380!2sChamonix-Mont-Blanc!5e0!3m2!1sfr!2sfr!4v1644932022705!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 46),
(29, '620bac68079d1.jpg', 'Gstaad', 'Gstaad, ville du sud-ouest des Alpes suisses et très prisée de la jet set, est accessible par les trains ou les routes de montagne. Cette station de montagne libre de toute circulation est renommée pour ses bons restaurants, et possède trois domaines skiables, du ski héliporté, 10 écoles de sports d’hiver et plus de 48 kilomètres de pistes de ski de fond à proximité. Le centre-ville s’organise autour d’une belle promenade bordée de boutiques de luxe. L’été, les activités sont tout aussi nombreuses, entre autres tennis, golf, randonnée et alpinisme.', '2660461', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21982.499332392163!2d7.269036863139648!3d46.47222346403387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478ef1af70318185%3A0xa6dfcf3af154d556!2sGstaad%2C%20Saanen%2C%20Suisse!5e0!3m2!1sfr!2sfr!4v1644932189655!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 5),
(31, '620bb8a952da4.jpg', 'Rome', 'Rome est la ville idéale pour un séjour centré sur l\'Histoire. Elle fut longtemps le centre du monde politique et culturel ce qui lui laisse un patrimoine riche. Côté Antiquité : Forum, Colisée, Temple de Vestales et autres vestiges. Côté Renaissance : Fontaine de Trévis, Villa Borghèse et toiles de maîtres.', '3169070', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d190029.01773690036!2d12.395912695881988!3d41.90998597224697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f6196f9928ebb%3A0xb90f770693656e38!2sRome%2C%20Italie!5e0!3m2!1sfr!2sfr!4v1644935324458!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 3),
(32, '620bb91b3950e.jpg', 'Berlin', 'Berlin est une ville par l\'Histoire. Le mur qui a divisé la ville pendant la Guerre Froide est encore (en partie) présent, témoignage de cette époque. Il est maintenant un monument-hommage à la liberté et aux droits de l\'Homme. C\'est un symbole fort de Berlin mais pas le seul. : porte de Brandebourg, Reichstag et église du Souvenir vous offriront un bel apperçu de l\'histoire allemande. ', '2950159', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d310846.42020703683!2d13.144550070871432!3d52.50651326213395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a84e373f035901%3A0x42120465b5e3b70!2sBerlin%2C%20Allemagne!5e0!3m2!1sfr!2sfr!4v1644935435410!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 62),
(33, '620bb980a3246.jpg', 'Pompéi', 'Pompéi est LE site archéologique par excellence ! Cette ville romaine, détruite par une éruption du Vésuve, a traversé les siècles. Extraordinairement bien conservée (on parle quand même d\'une ville détruite par la lave), Pompéi est ouverte aux visiteurs toute l\'année. Vous pouvez y accéder facilement depuis Naples.', '3170335', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48357.66523601926!2d14.467785262596102!3d40.75423643294519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bbc95914ba4ef%3A0xd2d18a72aeb414a4!2s80045%20Pompei%2C%20Naples%2C%20Italie!5e0!3m2!1sfr!2sfr!4v1644935544664!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 2),
(34, '620bb9db1614f.jpg', 'Pékin (Beijing)', 'La Chine possède une histoire ancestrale et Pékin en est la meilleure représentation. Entre tradition et modernité, en parcourant la ville vous ne pourrez qu\'être fasciné par son héritage culturelle et historique.', '1816670', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d391568.2687922804!2d116.11726836096722!3d39.938546580518604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35f05296e7142cb9%3A0xb9625620af0fa98a!2zUMOpa2luLCBDaGluZQ!5e0!3m2!1sfr!2sfr!4v1644935635716!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 2),
(35, '620bba4c70a5c.jpg', 'Istanbul', 'Antiquité, Empire byzantin, Empire ottoman, conflits actuels... Istanbul a tout connu. La ville garde la trace de son Histoire dans son architecture, très riche. Celle qu\'on appelait autrefois Constantinople, regorge de 1001 histoires.', '745042', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d385398.5898502307!2d28.731989594091843!3d41.004982275143284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa7040068086b%3A0xe1ccfe98bc01b0d0!2sIstanbul%2C%20Turquie!5e0!3m2!1sfr!2sfr!4v1644935711913!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 14),
(36, '620bbaabd3f70.jpg', 'Pétra', 'L\'histoire du site archéologique de Pétra, au sud de l\'actuelle Jordanie, remonte à la Préhistoire. La ville connait son heure de gloire à l\'époque byzanthine avant de tomber dans l\'oubli au Moyen-Age. Redécouverte en 1812, elle deviendra Parc national archéologique en 1993. L\'idéal pour tout ceux qui souhaitent découvrir la culture de cette région du globe.', '246008', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4941.0831045405985!2d35.4418810476609!3d30.328705325009093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15016ef1703b6071%3A0x199bf908679a2291!2zUMOpdHJh!5e0!3m2!1sfr!2sfr!4v1644935840569!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 3),
(37, '620bbb18c3edf.jpg', 'Séville', 'La ville de Séville, en Andalousie, est située au carrefour des cultures espagnole et arabe. Cette région du sud de l\'Espagne est passée sous domination musulmane du 8ème au 13ème siècle. La ville garde une trace culturelle, architecturale et historique de cette période. Cette mixité lui confère une atmosphère unique et en fait une source inépuisable pour tous les amateurs d\'Histoire.', '2510911', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101459.59291856231!2d-6.025098643990054!3d37.375350098684414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd126c1114be6291%3A0x34f018621cfe5648!2sS%C3%A9ville%2C%20Espagne!5e0!3m2!1sfr!2sfr!4v1644935953236!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 2),
(38, '620bbb6dc7b79.jpg', 'Athènes', 'Athènes est un véritable musée à ciel ouvert. Elle permet à tous les amoureux d\'Histoire d\'épancher leur soif de culture. De l\'Acropole au musée national d\'Archéologie, ils trouveront forcément leur bonheur dans la ville de Platon et Homère.', '264371', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50310.6040015949!2d23.703319796190673!3d37.99083200831814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1bd1f067043f1%3A0x2736354576668ddd!2zQXRow6huZXMsIEdyw6hjZQ!5e0!3m2!1sfr!2sfr!4v1644936036826!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 2),
(39, '620bbc32c6bb7.jpg', 'Angkor', 'Angkor, au Cambodge, est un des sites archéologiques les plus riches au monde. On y a retrouvé des vestiges y indiquant la présence de nos ancêtres dès l\'Age de Bronze ! La cité a longtemps été la capitale du royaume khmer et est un magnifique témoin de cette époque. En plus d\'être intéressant archéologiquement parlant, Angkor fait partie des plus beaux monuments au monde.', '1822213', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.9977007254615!2d103.86479701439063!3d13.412469290567751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3110168aea9a272d%3A0x3eaba81157b0418d!2sAngkor%20Vat!5e0!3m2!1sfr!2sfr!4v1644936234499!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 5, 2),
(40, '620bbd4b60513.jpg', 'Wanaka', 'Ce pays est largement réputé pour la beauté et la diversité de sa nature. L’île du Nord et du Sud bénéficient d’un climat distinct qui permettent chacune la réalisation de différentes activités. La randonnée est une activité majeure. Il est possible de traverser à pied une partie de l’île.\r\nIl est possible d’y faire de l’escalade, des sports d’eau ou encore de la chute libre.\r\n\r\nSur place, pour un peu de repos, pourquoi ne pas assister à un match de rugby, discipline phare du pays ?!', '2184707', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90713.50298023902!2d169.07303042737792!3d-44.72375504631209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa9d5461db9ec2d6f%3A0x500ef868479c1e0!2sWanaka%2C%20Nouvelle-Z%C3%A9lande!5e0!3m2!1sfr!2sfr!4v1644936513896!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(41, '620bbde165750.jpg', 'Le Népal', 'Les aficionados de sport et d’alpinisme partagent souvent le rêve de partir en voyage au Népal et faire un trek dans l’Himalaya. Il existe plusieurs alternatives selon le niveau de difficulté et les envies de chacun. L’expérience est unique, au fur et à mesure des villages sherpas traversés.\r\n\r\nIl est également possible de profiter de la beauté de l’Himalaya lors d’un saut en parachute, de descendre la rivière Rapti en pirogue ou encore de faire du rafting et canyoning.\r\n\r\nCette destination est également idéale pour vivre un dépaysement complet, entre la diversité des paysages, l’intérêt certain des temples et du patrimoine religieux, et à la découverte de l’hindouisme et bouddhisme.', '1282988', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2496050.0193803227!2d83.38699769864812!3d28.768654295188284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995e8c77d2e68cf%3A0x34a29abcd0cc86de!2zTsOpcGFs!5e0!3m2!1sfr!2sfr!4v1644936664499!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(42, '620bbe996ac45.jpg', 'La Namibie', 'La Namibie est un pays intéressant pour les fans de sports. Parmi l’une des activités phares, il est possible de citer le sandboarding. Faire de la planche sur les dunes du désert du Namib, c’est une expérience authentique ! Swakopmund est le spot le plus réputé pour pratiquer cette activité. Quad et buggy peuvent également être pratiqués dans les dunes.\r\n\r\nAussi, les vents assez violents sur la côte permettent de faire du windsurf à Walvis Bay et à Lüderitz.\r\n\r\nEnfin, le lieu le plus réputé en matière de randonnée est Fish River Canyon.', '3355338', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7526939.23931148!2d13.868590262242066!3d-22.903657240897456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1bf53c7e6ed37521%3A0xd3b9e5a5a8ecb261!2sNamibie!5e0!3m2!1sfr!2sfr!4v1644936843169!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(43, '620bbf1d3a513.jpg', 'Anglet', 'Adepte de la culture surf, vous êtes à la bonne adresse. Avec ses 4,5 km de plage, Anglet est un passage obligé de la côte basque pour les mordus de glisse : pas moins de 11 spots vous attendent ! La vague parfaite n’est pas loin, elle guette juste le moment où vous allez venir la dompter. Que les novices se rassurent, les clubs de surf sont là pour vous former à apprivoiser les déferlantes.', '3037612', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92628.08639266355!2d-1.589364966157367!3d43.489239424924634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51401cdc979735%3A0xbdbc5ff838b9ab48!2s64600%20Anglet!5e0!3m2!1sfr!2sfr!4v1644936981952!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(44, '620bbfe31ad9c.jpg', 'La Haute-Savoie', 'Musclez vos vacances avec des sports extrêmes ! L’été, les stations de ski se métamorphosent en repaires pour escaladeurs, parapentistes ou VTTistes survoltés. Défiez les rivières tumultueuses d’Annecy en rafting ou hydrospeed et testez le premier tremplin de saut à l’élastique au monde à La Clusaz… ', '6455254', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d708960.5605013316!2d5.864131589601086!3d46.043574246345074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c09f4796a177d%3A0x308ab2ae4b92a20!2sHaute-Savoie!5e0!3m2!1sfr!2sfr!4v1644937117499!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(45, '620bc08f0edc7.jpg', 'L\'Irlande', 'Si vous êtes féru de golf, l’Irlande et ses 450 terrains sont faits pour vous. Régalez-vous sur l’un des parcours légendaires de la discipline : le Doonbeg Golf Club. Posé sur une dune verdoyante, les yeux rivés vers l’océan, difficile de se concentrer sur sa balle !', '2963597', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1658809.2761785495!2d-9.322958551111018!3d53.157646810910315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4859bae45c4027fb%3A0xcf7c1234cedbf408!2sIrlande!5e0!3m2!1sfr!2sfr!4v1644937351357!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(46, '620bc14c495e3.jpg', 'Garda', 'Nombreux sont les parcours de randonnées spécialement dessinés pour les passionnés de marche nordique ou de VTT. Le lac de garde est d’ailleurs l’une des destination les plus plébiscitée par les cyclistes.\r\nles plus aventureux pourront s’adonner au canyonisme dans les ravins creusés par l’érosion des montagnes ou bien s’élancer de ses mêmes montagnes en parapente pour profiter d’une vue absolument incroyable sur le lac et l’arrière pays alpin.', '3176320', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97446.13915924866!2d10.64521947899105!3d45.581428101060126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4781f238607306f1%3A0x5767507925c7ea7!2s37016%20Garda%2C%20V%C3%A9rone%2C%20Italie!5e0!3m2!1sfr!2sfr!4v1644937538990!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 2),
(47, '620bc38166c37.jpg', 'L\'Italie', 'On aurait tort d’ailleurs de penser que la cuisine italienne se limite au duo pâtes/pizza. Chacune des 20 régions possède ses propres spécialités.\r\nLe Piémont est réputé pour sa truffe blanche, les vins des Langhe et pour ses viandes en sauce comme le bœuf brasato al barolo. Grande productrice de riz, la Lombardie brille par son fameux risotto alla milanese (au safran), mais c’est aussi une région à qui l’on doit des fromages comme le gorgonzola et le mascarpone.\r\nAu sud, les Pouilles sont considérées comme le grenier de l’Italie. Productrice d’huile d’olive, la région fait la part belle aux antipasti. Surtout, ne manquez pas sa délicieuse mozzarella Burata, que l’on retrouve en Campanie, où se trouve Naples la capitale de la pizza.', '3175395', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12344962.525510592!2d3.718411787935884!3d40.93970830811762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d4fe82448dd203%3A0xe22cf55c24635e6f!2sItalie!5e0!3m2!1sfr!2sfr!4v1644938099654!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2),
(48, '620bc53cbc9bf.jpg', 'La Grèce', 'On peut dire qu’il y a du choix, mais citons les emblématiques tzatziki (dip à base de concombre, ail, yaourt) et dolmas (feuilles de vigne marinées farcies de riz) ou encore les keftedès (boulettes de bœuf).\r\nOn ne présente plus la salade grecque (horiatiki), un savant mélange de crudités (tomates, concombre), d’oignons, d’olives et de féta. Les Grecs raffolent de ce fromage au lait de brebis, parfois mélangé à du lait de chèvre.\r\nSucré ou salé, la Grèce saura satisfaire toutes les papilles!', '390903', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6433659.641263294!2d19.989727570897422!3d38.06024071581417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x135b4ac711716c63%3A0x363a1775dc9a2d1d!2zR3LDqGNl!5e0!3m2!1sfr!2sfr!4v1644938545616!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2),
(49, '620bc5c2c5028.jpg', 'L\'Espagne', 'Paella à Valence, cocido à Madrid, gaspacho en Andalousie, poulpe à la galicienne, fabada (sorte de cassoulet) dans les Asturies, crème catalane, churros, ensaimada (sorte de beignet) à Majorque, agneau grillé à Ségovie, salmorejo de Cordoue, tortilla, papas bravas, jambon bellota ou pata negra, tapas partout, mais pintxos au Pays basque… La cuisine espagnole fait preuve d’une belle diversité en raison de multiples terroirs, avec des plats mondialement connus.', '2510769', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6248297.385122561!2d-8.204383089264509!3d40.12164237279905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sEspagne!5e0!3m2!1sfr!2sfr!4v1644938676604!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2),
(50, '620bc6a97b6a8.jpg', 'Le Danemark', 'La cuisine nordique a connu un véritable renouveau. Même le plus simple et le plus typique des déjeuners danois, le « smørrebrod », a eu droit à son lifting ! Il s’agit là d’une tartine de pain de seigle (rugbrød), beurrée et recouverte de toutes sortes de garnitures : ce peut être du hareng ou du saumon, mais aussi de la viande, des charcuteries, des légumes, du fromage...\r\nEn cas de petit creux dans la journée, les pâtisseries danoises – wienerbrød – volent à la rescousse. On croque par exemple dans un « kanelsnegl », un roulé à la cannelle.', '2623032', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1905191.6085135455!2d9.60489486814665!3d56.04293195640614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464b27b6ee945ffb%3A0x528743d0c3e092cd!2sDanemark!5e0!3m2!1sfr!2sfr!4v1644938909841!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2),
(51, '620bc7f81f7f1.jpg', 'L\'Inde', 'S’il y a bien un pays où les épices sont les star, c’est bien l’Inde ! C’est le pays du safran, clou de girofle, cumin, safran ou curcuma. Elles ont la réputation de donner aux différents plats, un mélange de saveurs subtiles et raffinées. La grande variété de sa cuisine en fait une destination privilégiée pour le tourisme gastronomique.', '1269750', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8687596.88763448!2d76.15356079293487!3d19.882417787667688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sInde!5e0!3m2!1sfr!2sfr!4v1644939245911!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 6),
(52, '620bc86694cf6.jpg', 'Le Liban', 'Le Liban fait partie des destinations les plus réputées au monde pour les amateurs de saveurs exquises. Houmous, taboulé… sont des produits qui font partie intégrante de notre alimentation, mais on ne connaît pas toujours l’origine exacte : le Liban.\r\n\r\nVariée, raffinée et fraîche, la cuisine libanaise a la réputation de mixer les fruits et légumes, les laitages et céréales. L’agneau fait également partie des viandes les plus consommées. Qu’elles soient déclinées à base de lentilles, de frik ,blé vert , de poulet ou de blé concassé, les soupes sont un moment important dans la cuisine libanaise .', '272103', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696164.8184072548!2d34.72611575842516!3d33.86848024008972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17028422aaad%3A0xcc7d34096c00f970!2sLiban!5e0!3m2!1sfr!2sfr!4v1644939357488!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 3),
(53, '620bc8bcb54d0.jpg', 'Le Japon', 'Le Sushi,le Onigri, le Yakitori… et la liste est encore bien longue.vous l’aurez bien compris, la destination Japon est une destination culinaire par excellence.\r\n\r\nLa cuisine japonaise offre une grande variété de plats et de spécialités régionales. Certains des plats japonais les plus populaires sont à base de de riz, de fruits de mer, nouilles, viande, fèves de soja\r\n\r\nDes centaines de variétés de poissons, crustacés et autres fruits de mer sont utilisés dans la cuisine japonaise. Ils sont préparés et consommés de différentes manières, crus, séchés, bouillis, grillés, frits ou cuits à la vapeur.', '1861060', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13307236.305835316!2d137.03391665760734!3d33.05554308817372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34674e0fd77f192f%3A0xf54275d47c665244!2sJapon!5e0!3m2!1sfr!2sfr!4v1644939441116!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2),
(54, '620bc91c8e5a0.jpg', 'La France', 'La France c’est beau , mais la nourriture française est encore meilleure sur place! Outre les spécialités culinaires de France, c’est l’art de bien manger et la dimension conviviale des repas qui sont célébrés.\r\n\r\nla diversité et le raffinement culinaire français s’expriment dans ses régions. La choucroute alsacienne, le magret de canard du sud-ouest, les produits de la mer en Bretagne, l’aïoli provençale, la fondue savoyarde. Partout, des grands domaines viticoles… Nul doute, l’histoire de l’Hexagone se découvre aussi dans son assiette !', '3017382', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11379752.984884022!2d-6.92935823899444!3d45.86610745032564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd54a02933785731%3A0x6bfd3f96c747d9f7!2sFrance!5e0!3m2!1sfr!2sfr!4v1644939538587!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 18),
(55, '620bc9ade78c6.jpg', 'Le Maroc', 'La cuisine marocaine est le reflet même de son histoire et des différentes influences. C’est le résultat d’un savoir-faire ancestral qui se transmet de génération en génération par le geste et la parole. Sa particularité est de ne pas être figée dans des livres de recettes.\r\n\r\nGrâce à son climat, le Maroc regorge des produits de qualité. Véritable pilier culturel du pays, la gastronomie marocaine est le reflet de ses multiples racines. Les épices, comme la cannelle ou le safran, la fleur d’oranger, le miel, la menthe, les olives agrémentent délicieusement salades et plats de viande. Sa cuisine de rue est aussi excellente que celle des grands restaurants étoilés. ', '2542007', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6950464.828181825!2d-11.645140770603803!3d31.721858926911167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b88619651c58d%3A0xd9d39381c42cffc3!2sMaroc!5e0!3m2!1sfr!2sfr!4v1644939679949!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2),
(56, '620bca8472ef1.jpg', 'Bangkok', 'La capitale Thaïlandaise attire près de 22 millions de touristes chaque année. Bangkok est célèbre pour sa vie nocturne, ses temples, musées, boutiques, restaurants et aussi pour ses plages. Un touriste reste, en moyenne, 9,5 jours à Bangkok. La ville est la porte d’entrée dans le pays', '1609350', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496115.33129972673!2d100.35290853542335!3d13.724441634346556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d6032280d61f3%3A0x10100b25de24820!2sBangkok%2C%20Tha%C3%AFlande!5e0!3m2!1sfr!2sfr!4v1644939882067!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 4),
(57, '620bcad3e86ca.jpg', 'Paris', 'Seconde ville parmi les villes les plus visitées au monde: Paris. Avec ses quatre sites au patrimoine mondial de l’UNESCO, Paris possède de nombreux moments qui attirent les foules. Tour Eiffel, Cathédrale Notre-Dame, Centre Pompidou, Musée du Louvres, font de Paris une des villes les plus touristiques du monde avec près de 20 millions de visiteurs par an. Même si Paris est particulièrement étendu, Paris est une ville qui se visite à pied (ou en metro).', '2988507', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.95410712961!2d2.2769950559679137!3d48.85883363919223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1644939978971!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 35),
(58, '620bcb2d4ea44.jpg', 'Londres', 'Londres est maintenant la troisième ville la plus visitée du monde, et la seconde en Europe. Londres est connue pour ses monuments tels que le London Eye sur la Tamise, Big Ben, la tour de Londres, Buckingham Palace, le Musée de Madame Tussaud, etc. Organisatrice des Jeux Olympiques en 2012 Londres est l’une des villes les plus attractives du monde, mais aussi l’une des plus chères. Elle attire tout de même 19 millions de touristes.\r\nIl est commun de visiter Londres en trois jours, une durée idéale pour s’imprégner de l’atmosphère unique de la ville.', '2643743', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.6932689098!2d-0.38178107685393387!3d51.52830797402332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondres%2C%20Royaume-Uni!5e0!3m2!1sfr!2sfr!4v1644940069690!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 3),
(59, '620bcb90e5175.jpg', 'Dubai', 'En croissance de 11% le tourisme à Dubaï est en pleine essor. Celui-ci représente une partie importante du PID de l’émirat de Dubaï. Dubaï à pour objectif de devenir la capitale mondiale du tourisme dans les prochaines années. Notamment connue pour ses buildings, notamment l’incontournable Burj Khalifa, sa piste de ski et ses îles artificielles, Dubaï est également la « capitale du shopping au Moyen-Orient ».', '292223', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462562.65099882265!2d54.947548329376424!3d25.07575944295914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDuba%C3%AF%20-%20%C3%89mirats%20arabes%20unis!5e0!3m2!1sfr!2sfr!4v1644940168043!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 2),
(60, '620bcc216502d.jpg', 'Singapour', 'Un faible taux de criminalité, une langue compréhensible (principalement l’anglais), un très bon réseau de transport en commun, l’une des meilleures compagnies aériennes au monde et un respect de l’environnement font de Singapour la 5ème ville la plus visitée au monde avec près de 14 millions de visiteurs.\r\nLa ville attire des touristes du monde entier venus admirer les gratte-ciel de la ville mais aussi ses étonnantes constructions comme le Dôme Floral ou le Science Centre Singapore.', '1880252', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255281.22544737146!2d103.70416137326707!3d1.3139961237885789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da11238a8b9375%3A0x887869cf52abf5c4!2sSingapour!5e0!3m2!1sfr!2sfr!4v1644940311372!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 2),
(61, '620bcc6e84568.jpg', 'New York', 'New-York compte près de 13 millions de touristes. C’est une ville très attractive avec de nombreux lieux symboliques, connus dans le monde entier comme l’Empire State Building, Central Park, Time Square ou encore la statue de la Liberté.', '5128581', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3060135961!2d-74.2598710545227!3d40.69714940585522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20%C3%89tat%20de%20New%20York%2C%20%C3%89tats-Unis!5e0!3m2!1sfr!2sfr!4v1644940388114!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 2),
(62, '620bccde313ce.jpg', 'Barcelone', 'Barcelone, la deuxième plus grande ville d’Espagne, est riche en patrimoine culturel et constitue une destination touristique populaire. Les célèbres œuvres architecturales de Antoni Gaudí et Lluís Domènech i Montaner font parties des sites classés au patrimoine mondial de l’UNESCO. Ses monuments, plages et parcs ont attirent toujours de nombreux touristes avec comme attraction numéro un, l’incontournable Sagrada Familia.', '3128760', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95780.65560410511!2d2.0701491970298576!3d41.392646714799575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelone%2C%20Espagne!5e0!3m2!1sfr!2sfr!4v1644940502722!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 3),
(64, '620f753094fa5.jpg', 'La Plagne', 'La Plagne est une station familiale de sports d’hiver et d’été, située en Savoie et implantée entre 1250 et 3250 mètres d\'altitude. Depuis plus de 50 ans, la destination a acquis une renommée internationale grâce à son vaste domaine skiable tous niveaux de 225 kilomètres de pistes. Depuis 2003, la Plagne elle est une station composante de Paradiski (le domaine skiable qui la relie avec les stations voisines des Arcs et Peisey-Vallandry).', '2991320', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89502.7615530145!2d6.614756887330175!3d45.490724088703004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47897bbbf6bdba69%3A0x40feb492e9386e00!2sLa%20Plagne!5e0!3m2!1sfr!2sfr!4v1645180194851!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 2),
(68, '621cca4eebbb1.jpg', 'Le Pérou', 'La gastronomie péruvienne est l’une des plus diversifiées au monde. La preuve ? Le Pérou est l‘un des pays avec le plus grand nombre de plats typiques, on peut en compter quasiment cinq cents ! Selon les experts, la cuisine péruvienne est de mieux en mieux positionnée dans le monde. Ce n’est pas pour rien qu’en janvier 2016, le magazine National Geographic a inclus Lima comme la seule ville en Amérique Latine dans le Top 10 des destinations gastronomiques mondiales.', '3936456', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16135228.087388994!2d-84.06427478906657!3d-9.130550585019135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c850c05914f5%3A0xf29e011279210648!2zUMOpcm91!5e0!3m2!1sfr!2sfr!4v1646053949235!5m2!1sfr!2sfr\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pro_destination_cat`
--

DROP TABLE IF EXISTS `pro_destination_cat`;
CREATE TABLE IF NOT EXISTS `pro_destination_cat` (
  `des_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  PRIMARY KEY (`des_id`,`act_id`),
  KEY `pro_destination_cat_pro_activities0_FK` (`act_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_destination_cat`
--

INSERT INTO `pro_destination_cat` (`des_id`, `act_id`) VALUES
(13, 1),
(15, 1),
(17, 1),
(28, 1),
(29, 1),
(41, 1),
(44, 1),
(52, 1),
(54, 1),
(64, 1),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(19, 2),
(20, 2),
(22, 2),
(23, 2),
(24, 2),
(28, 2),
(29, 2),
(33, 2),
(36, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(64, 2),
(68, 2),
(14, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(28, 3),
(29, 3),
(31, 3),
(36, 3),
(37, 3),
(38, 3),
(40, 3),
(42, 3),
(43, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(57, 3),
(58, 3),
(62, 3),
(64, 3),
(68, 3),
(17, 4),
(28, 4),
(29, 4),
(41, 4),
(44, 4),
(54, 4),
(13, 5),
(14, 5),
(15, 5),
(17, 5),
(28, 5),
(29, 5),
(40, 5),
(41, 5),
(44, 5),
(49, 5),
(54, 5),
(64, 5),
(68, 5),
(16, 6),
(18, 6),
(21, 6),
(23, 6),
(24, 6),
(43, 6),
(51, 6),
(54, 6),
(13, 7),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(20, 7),
(22, 7),
(25, 7),
(40, 7),
(42, 7),
(44, 7),
(46, 7),
(47, 7),
(49, 7),
(50, 7),
(53, 7),
(54, 7),
(64, 7),
(68, 7),
(14, 8),
(16, 8),
(18, 8),
(19, 8),
(20, 8),
(23, 8),
(24, 8),
(25, 8),
(40, 8),
(42, 8),
(43, 8),
(44, 8),
(45, 8),
(46, 8),
(47, 8),
(48, 8),
(49, 8),
(53, 8),
(54, 8),
(59, 8),
(62, 8),
(13, 9),
(14, 9),
(15, 9),
(16, 9),
(17, 9),
(18, 9),
(19, 9),
(20, 9),
(23, 9),
(28, 9),
(29, 9),
(40, 9),
(41, 9),
(42, 9),
(43, 9),
(44, 9),
(45, 9),
(46, 9),
(47, 9),
(48, 9),
(49, 9),
(54, 9),
(64, 9),
(31, 10),
(32, 10),
(33, 10),
(34, 10),
(35, 10),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(47, 10),
(48, 10),
(49, 10),
(50, 10),
(53, 10),
(54, 10),
(57, 10),
(58, 10),
(61, 10),
(62, 10),
(68, 10),
(31, 11),
(32, 11),
(33, 11),
(34, 11),
(35, 11),
(36, 11),
(37, 11),
(38, 11),
(39, 11),
(40, 11),
(41, 11),
(42, 11),
(45, 11),
(47, 11),
(48, 11),
(49, 11),
(50, 11),
(51, 11),
(52, 11),
(53, 11),
(54, 11),
(55, 11),
(56, 11),
(57, 11),
(58, 11),
(14, 12),
(16, 12),
(18, 12),
(19, 12),
(20, 12),
(22, 12),
(23, 12),
(24, 12),
(25, 12),
(28, 12),
(31, 12),
(32, 12),
(33, 12),
(34, 12),
(35, 12),
(36, 12),
(37, 12),
(38, 12),
(39, 12),
(40, 12),
(41, 12),
(42, 12),
(43, 12),
(44, 12),
(47, 12),
(48, 12),
(49, 12),
(50, 12),
(51, 12),
(52, 12),
(53, 12),
(54, 12),
(55, 12),
(56, 12),
(57, 12),
(60, 12),
(62, 12),
(16, 13),
(23, 13),
(25, 13),
(48, 13),
(49, 13),
(54, 13),
(59, 13),
(25, 14),
(42, 14),
(55, 14),
(59, 14),
(25, 15),
(42, 15),
(55, 15),
(59, 15),
(31, 16),
(32, 16),
(34, 16),
(35, 16),
(37, 16),
(38, 16),
(39, 16),
(41, 16),
(47, 16),
(48, 16),
(49, 16),
(50, 16),
(51, 16),
(52, 16),
(53, 16),
(54, 16),
(55, 16),
(56, 16),
(57, 16),
(58, 16),
(59, 16),
(60, 16),
(61, 16),
(62, 16),
(45, 17),
(19, 18),
(23, 18),
(25, 18),
(42, 18),
(47, 18),
(48, 18),
(49, 18),
(51, 18),
(54, 18),
(57, 19),
(58, 19),
(59, 19),
(61, 19);

-- --------------------------------------------------------

--
-- Structure de la table `pro_passed_trips`
--

DROP TABLE IF EXISTS `pro_passed_trips`;
CREATE TABLE IF NOT EXISTS `pro_passed_trips` (
  `des_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  PRIMARY KEY (`des_id`,`use_id`),
  KEY `pro_passed_trips_pro_users0_FK` (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_passed_trips`
--

INSERT INTO `pro_passed_trips` (`des_id`, `use_id`) VALUES
(13, 1),
(14, 1),
(15, 1),
(23, 2),
(24, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pro_roles`
--

DROP TABLE IF EXISTS `pro_roles`;
CREATE TABLE IF NOT EXISTS `pro_roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(50) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_roles`
--

INSERT INTO `pro_roles` (`rol_id`, `rol_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `pro_users`
--

DROP TABLE IF EXISTS `pro_users`;
CREATE TABLE IF NOT EXISTS `pro_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_first_name` varchar(50) NOT NULL,
  `use_email` varchar(100) NOT NULL,
  `use_password` varchar(200) DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `use_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`use_id`),
  KEY `pro_users_pro_roles_FK` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_users`
--

INSERT INTO `pro_users` (`use_id`, `use_first_name`, `use_email`, `use_password`, `rol_id`, `use_status`) VALUES
(1, 'Admin', 'admin@admin.fr', '$2y$10$MGM/uzFyIedi1dfEXbGRLuy3X1wXZ8YbNhiDJG4hEFHuGLQoIl2Iu', 1, 1),
(2, 'Test', 'test@test.fr', '$2y$10$8spNBug/243ehdTfbQRpIOyaCo4d8AG2tZo0nXqgcP2YylcncXhx2', 2, 1),
(4, 'Dennis', 'dennis@gmail.com', '$2y$10$0bmQWVJ2nWD70yKGMFrN0eT8fkvPzC3LyNTQhN9ru9rG6cPaJZZK6', 2, 1),
(5, 'Milo', 'milo@gmail.com', '$2y$10$anTpPgVPF9C/5j5mpwsYW.gMy5rqnaFeLJOXsKCQhvuMkx/cGGcSS', 2, 1),
(11, 'Bernard', 'bernard@gmail.com', '$2y$10$.Yh8Xm25/DLA6LmIpHJTyuY9nV5SPJ3lDNVndLsjS/A81xfaIrxaG', 2, 1),
(12, 'Jean', 'jean@gmail.com', '$2y$10$YfWSVn75PGxh2TiVfR4kbexF/bnfTyo/IWHy0zGasBajCeJS2ocpS', 2, 1),
(13, 'Pedro', 'pedro@gmail.com', '$2y$10$DCX27nk7qTPk/zt22D6U7exT2x.1UNkLe08p6QasYeYJ2myOjTWA6', 2, 1),
(14, 'Julie', 'julie@gmail.com', '$2y$10$tRmxqbcZVCPPlttXX5VUH.Hr3V2inmXJLhU6Ji5z3lbfldVmeVyZm', 2, 1),
(15, 'Caroline', 'caroline@gmail.com', '$2y$10$WAr3WJGOGldeMLXMnQwEMebtRhQBXpjYht3LRob1cYUub.byM2G/C', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pro_wishlist`
--

DROP TABLE IF EXISTS `pro_wishlist`;
CREATE TABLE IF NOT EXISTS `pro_wishlist` (
  `des_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  PRIMARY KEY (`des_id`,`use_id`),
  KEY `pro_wishlist_pro_users0_FK` (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pro_wishlist`
--

INSERT INTO `pro_wishlist` (`des_id`, `use_id`) VALUES
(13, 1),
(14, 1),
(21, 1),
(57, 1),
(16, 2),
(35, 2),
(39, 2),
(56, 2),
(57, 2),
(60, 2),
(61, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pro_blog`
--
ALTER TABLE `pro_blog`
  ADD CONSTRAINT `pro_blog_pro_users_FK` FOREIGN KEY (`use_id`) REFERENCES `pro_users` (`use_id`);

--
-- Contraintes pour la table `pro_destination`
--
ALTER TABLE `pro_destination`
  ADD CONSTRAINT `pro_destination_pro_categories_FK` FOREIGN KEY (`cat_id`) REFERENCES `pro_categories` (`cat_id`);

--
-- Contraintes pour la table `pro_destination_cat`
--
ALTER TABLE `pro_destination_cat`
  ADD CONSTRAINT `pro_destination_cat_pro_activities0_FK` FOREIGN KEY (`act_id`) REFERENCES `pro_activities` (`act_id`),
  ADD CONSTRAINT `pro_destination_cat_pro_destination_FK` FOREIGN KEY (`des_id`) REFERENCES `pro_destination` (`des_id`);

--
-- Contraintes pour la table `pro_passed_trips`
--
ALTER TABLE `pro_passed_trips`
  ADD CONSTRAINT `pro_passed_trips_pro_destination_FK` FOREIGN KEY (`des_id`) REFERENCES `pro_destination` (`des_id`),
  ADD CONSTRAINT `pro_passed_trips_pro_users0_FK` FOREIGN KEY (`use_id`) REFERENCES `pro_users` (`use_id`);

--
-- Contraintes pour la table `pro_users`
--
ALTER TABLE `pro_users`
  ADD CONSTRAINT `pro_users_pro_roles_FK` FOREIGN KEY (`rol_id`) REFERENCES `pro_roles` (`rol_id`);

--
-- Contraintes pour la table `pro_wishlist`
--
ALTER TABLE `pro_wishlist`
  ADD CONSTRAINT `pro_wishlist_pro_destination_FK` FOREIGN KEY (`des_id`) REFERENCES `pro_destination` (`des_id`),
  ADD CONSTRAINT `pro_wishlist_pro_users0_FK` FOREIGN KEY (`use_id`) REFERENCES `pro_users` (`use_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
