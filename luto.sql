CREATE DATABASE  IF NOT EXISTS `luto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `luto`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: luto
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_recipe_id` int(11) DEFAULT NULL,
  `comment_message` text,
  `comment_author` varchar(45) DEFAULT NULL,
  `recipe_rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `index2` (`comment_recipe_id`),
  CONSTRAINT `fk_comment_1` FOREIGN KEY (`comment_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,1,'Superbe tarte au citron','nain connu',5),(2,1,'Bof','grincheux',2),(3,1,'J\'ai adorÃ© !','blanche neige',4),(4,1,'Cool !','simplet',3),(5,2,'Pas mal comme entrÃ©e !','Samantha',4),(6,2,'Je prÃ©fÃ¨re avec de la crÃ¨me fraiche','Antoine',2),(7,2,'Je l\'ai faite en accompagnement et tout le monde Ã  aimÃ©','PamÃ©la',5),(8,3,'J\'aime pas trop la combinaison avec le soja','Henri',1),(9,3,'Pareil, je trouve que le soja donne un gout trop bizarre','Jean',2),(10,3,'OsÃ© et dÃ©licieux !','Lin',5),(11,3,'Pas mal','Bernard',4),(12,3,'pas terrible','Louis',2),(13,4,'Depuis le temps que je voulais savoir en faire, merci !','Louise',5),(14,4,'Meilleur recette de cheesecake','Martin',5),(15,4,'Manque un peu de sucre pour moi','Riton',3),(16,5,'Ã§a Ã  fait le plaisir de mes invitÃ©s','Lisa',5),(17,5,'J\'adore le lapin et je cherchais une idÃ©e pour le prÃ©parer','Romain',4),(18,5,'Souple et savoureux !','Jean',5),(19,6,'Oh oui, une nouvelle idÃ©e de dessert','Marie',5),(20,6,'j\'adore les fruits rouges !','Melanie',5),(21,6,'On peux faire mieux avec les mÃªmes ingrÃ©dients','Raymond',2);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ingredient_id`),
  CONSTRAINT `fk_ingredient_1` FOREIGN KEY (`ingredient_id`) REFERENCES `recipe_ingredient_quantity` (`recipe_ingredient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` VALUES (1,'farine'),(2,'beurre'),(3,'sucre'),(4,'jaune d\'oeuf'),(5,'eau'),(6,'sel'),(7,'citrons de taille moyenne'),(8,'oeufs'),(9,'Maizena'),(10,'levure chimique'),(11,'pÃ¢tes (penne)'),(12,'thon naturel'),(13,'mayonnaise'),(14,'asperges vertes'),(15,'jus de citron'),(16,'huile'),(17,'curry en poudre'),(18,'poivre'),(19,'escalopes de poulet'),(20,'gousse d\'ail hachÃ© trÃ¨s finement'),(21,'crÃ¨me fraiche'),(22,'sauce soja'),(23,'champignons de paris'),(24,'fromage blanc'),(25,'petits suisses'),(26,'vanille'),(27,'petits beurres (ou autres sablÃ©s)'),(28,'sucre roux'),(29,'Lesieur duo Huile & Beurre'),(30,'cuisses de lapin'),(31,'rÃ¢ble de lapin coupÃ© en deux'),(32,'lardons fumÃ©s'),(33,'gousses d\'ail'),(34,'Ã©chalotes'),(35,'thym'),(36,'tomates confites'),(37,'pommes de terre charlottes'),(38,'Ã©pinards frais'),(39,'boules de crÃ¨me glacÃ©e carte d\'or vanille d'),(40,'fraises'),(41,'framboises'),(42,'myrtilles'),(43,'groseilles'),(44,'miel'),(45,'cerises'),(46,'meringues'),(47,'blancs d\'oeufs'),(48,'zeste de citron');
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `picture_recipe_id` int(11) DEFAULT NULL,
  `picture_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`picture_id`),
  KEY `index2` (`picture_recipe_id`),
  CONSTRAINT `fk_picture_1` FOREIGN KEY (`picture_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantity`
--

DROP TABLE IF EXISTS `quantity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantity` (
  `quantity_id` int(11) NOT NULL,
  `quantity_ingredient_id` int(11) DEFAULT NULL,
  `quantity_number` int(11) DEFAULT NULL,
  `quantity_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`quantity_id`),
  CONSTRAINT `fk_quantity_1` FOREIGN KEY (`quantity_id`) REFERENCES `recipe_ingredient_quantity` (`recipe_quantity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantity`
--

LOCK TABLES `quantity` WRITE;
/*!40000 ALTER TABLE `quantity` DISABLE KEYS */;
INSERT INTO `quantity` VALUES (1,1,250,'g'),(2,1,2,'cuillÃ¨res Ã  soupe'),(3,2,125,'g'),(4,2,1,'noix'),(5,3,220,'g'),(6,4,2,NULL),(7,5,5,'cl'),(8,6,1,'pincÃ©e'),(9,7,4,NULL),(10,8,3,NULL),(11,9,1,'cuillÃ¨re Ã  soupe'),(12,10,1,'cuillÃ¨re Ã  cafÃ©'),(13,11,300,'g'),(14,12,200,'g'),(15,13,4,'c-Ã -s'),(16,14,1,'bocal'),(17,15,1,'c-Ã -s'),(18,16,1,'c-Ã -s'),(19,17,1,'c-Ã -c'),(20,19,2,NULL),(21,20,1,NULL),(22,21,2,'grosses cuillÃ¨res'),(23,22,1,'c-Ã -s'),(24,23,2,NULL),(25,24,500,'g'),(26,25,2,NULL),(27,27,1,'de paquet'),(28,28,2,'cuillÃ¨res Ã  soupe'),(29,30,2,NULL),(30,31,1,NULL),(31,32,200,'g'),(32,33,8,''),(33,34,2,NULL),(34,35,2,'petites branches'),(35,36,4,NULL),(36,37,6,NULL),(37,38,40,'g'),(38,39,10,NULL),(39,40,100,'g'),(40,41,100,'g'),(41,42,50,'g'),(42,43,50,'g'),(43,44,2,'cuillÃ¨res Ã  cafÃ©'),(44,45,4,NULL),(45,46,4,NULL),(46,47,2,NULL),(47,2,50,'g'),(48,48,1,NULL),(49,15,2,'cuillÃ¨re Ã  soupe');
/*!40000 ALTER TABLE `quantity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `author` varchar(45) DEFAULT NULL,
  `author_mail` varchar(45) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `dish_type` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (1,'dimitri','dim.fruit@gmail.com','tarte au citron','dessert','2013-09-22 16:19:43','2013-09-22 16:19:43'),(2,'martin','martin.pecheur@gmail.com','salade de thon','entrÃ©e','2013-09-22 16:19:43','2013-09-22 16:19:43'),(3,'jean','jean.bon@gmail.com','Poulet Ã  la crÃ¨me et sauce soja','plat','2015-09-22 16:19:43','2015-09-22 16:19:43'),(4,'martine','martine.lalapine@gmail.com','cheesecake maison','dessert','2015-09-22 18:19:43','2015-09-22 18:19:43'),(5,'lucie','lucie.labe@gmail.com','Lapin en cocotte','plat','2015-09-22 18:19:43','2015-09-22 18:19:43'),(6,'simon','simon.precieux@gmail.com','Dessert glacÃ© aux fruits rouges','dessert','2015-09-18 18:19:43','2015-09-18 18:19:43');
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_ingredient_quantity`
--

DROP TABLE IF EXISTS `recipe_ingredient_quantity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_ingredient_quantity` (
  `recipe_id` int(11) DEFAULT NULL,
  `recipe_quantity_id` int(11) DEFAULT NULL,
  `recipe_ingredient_id` int(11) DEFAULT NULL,
  `recipe_ingredient_quantity_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_ingredient_quantity_id`),
  KEY `index2` (`recipe_quantity_id`),
  KEY `index3` (`recipe_ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_ingredient_quantity`
--

LOCK TABLES `recipe_ingredient_quantity` WRITE;
/*!40000 ALTER TABLE `recipe_ingredient_quantity` DISABLE KEYS */;
INSERT INTO `recipe_ingredient_quantity` VALUES (1,1,1,1),(1,3,2,2),(1,5,3,3),(1,6,4,4),(1,7,5,5),(1,8,6,6),(1,9,7,7),(1,10,8,8),(1,11,9,9),(1,12,10,10),(1,46,47,11),(2,13,11,12),(2,14,12,13),(2,15,13,14),(2,16,14,15),(2,17,15,16),(2,18,16,17),(2,19,17,18),(2,NULL,6,19),(2,NULL,18,20),(3,20,19,21),(3,21,20,22),(3,4,2,23),(3,22,21,24),(3,23,22,25),(3,24,23,26),(4,25,24,27),(4,47,2,28),(4,10,8,29),(4,26,25,30),(4,NULL,3,31),(4,2,1,32),(4,48,48,33),(4,49,15,34),(4,NULL,26,35),(4,27,27,36),(4,28,28,37),(5,NULL,29,38),(5,29,30,39),(5,30,31,40),(5,31,32,41),(5,32,33,42),(5,33,34,43),(5,34,35,44),(5,35,36,45),(5,36,37,46),(5,37,38,47),(6,38,39,48),(6,39,40,49),(6,40,41,50),(6,41,42,51),(6,42,43,52),(6,43,44,53),(6,44,45,54),(6,45,46,55);
/*!40000 ALTER TABLE `recipe_ingredient_quantity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_tag`
--

DROP TABLE IF EXISTS `recipe_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_tag` (
  `recipe_tag_primary_id` int(11) NOT NULL,
  `recipe_tag_id` int(11) DEFAULT NULL,
  `tag_recipe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`recipe_tag_primary_id`),
  KEY `index2` (`tag_recipe_id`),
  KEY `fk_recipe_tag_2_idx` (`recipe_tag_id`),
  CONSTRAINT `fk_recipe_tag_1` FOREIGN KEY (`recipe_tag_id`) REFERENCES `tag` (`tag_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_recipe_tag_2` FOREIGN KEY (`tag_recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_tag`
--

LOCK TABLES `recipe_tag` WRITE;
/*!40000 ALTER TABLE `recipe_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipe_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `step`
--

DROP TABLE IF EXISTS `step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `step` (
  `step_id` int(11) NOT NULL,
  `step_title` varchar(255) DEFAULT NULL,
  `step_description` text,
  `step_order` int(11) DEFAULT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`step_id`),
  KEY `index2` (`recipe_id`),
  CONSTRAINT `fk_step_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `step`
--

LOCK TABLES `step` WRITE;
/*!40000 ALTER TABLE `step` DISABLE KEYS */;
INSERT INTO `step` VALUES (1,'PremiÃ¨re Ã©tape','Blanchir les jaunes et le sucre au fouet et dÃ©tendre le mÃ©lange avec un peu d\'eau.',1,1),(2,'DeuxiÃ¨me Ã©tape','MÃ©langer au doigt la farine et le beurre coupÃ© en petites parcelles pour obtenir une consistance sableuse et que tout le beurre soit absorbÃ© (!!! Il faut faire vite pour que le mÃ©lange ne ramollisse pas trop!). ',2,1),(3,'TroisiÃ¨me Ã©tape','Verser au milieu de ce \"sable\" le mÃ©lange liquide. Incoporer au couteau les Ã©lÃ©ments rapidement sans leur donner de corps. ',3,1),(4,'QuatriÃ¨me Ã©tape','Former une boule avec les paumes et fraiser 1 ou 2 fois pour rendre la boule + homogÃ¨ne. Foncez un moule de 25 cm de diamÃ¨tre avec la pÃ¢te, garnissez la de papier sulfurisÃ© et de haricots secs. ',4,1),(5,'CinquiÃ¨me Ã©tape : CrÃ¨me de citron','CRÃˆME AU CITRON : Laver les citrons et en \"zester\" 2. Mettre les zestes trÃ¨s fins dans une casserole. Presser les citrons et mettre le jus avec les zestes dans la casserole. Verser le sucre et la MaÃ¯zena. Remuer, et commencer Ã  faire chauffer Ã  feux doux. Battre les oeufs dans un rÃ©cipients sÃ©parÃ©. Une fois les oeufs battus, incorporer tout en remuant le jus de citron, le sucre, la MaÃ¯zena et les zestes. Mettre Ã  feu fort et continuer Ã  remuer Ã  l\'aide d\'un fouet. Le mÃ©lange va commencer Ã  s\'Ã©paissir. Attention de toujours remuer lorsque les oeufs sont ajoutÃ©s, car la crÃ¨me de citron pourrait brÃ»ler. Oter du feux et verser l\'appareil sur le fond de tarte cuit. ',5,1),(6,'SixiÃ¨me Ã©tape : Meringue','MERINGUE : Monter les blancs en neige avec une pincÃ©e de sel. Quand ils commencent Ã  Ãªtre fermes, ajouter le sucre puis la levure. Mixer jusqu\'Ã  ce que la neige soit ferme. Recouvrir avec les blancs en neige et napper. Cuire Ã  four doux (120Â°C/150Â°C) juqu\'Ã  ce que la meringue dore (10 mn) ',6,1),(7,'PrÃ©paration des pÃ¢tes','Dans une grande casserole d\'eau, faites cuire les pÃ¢tes, ajouter l\'huile. VÃ©rifier la cuisson 10 Ã  15 mn. Une fois cuites les passer sous l\'eau froide. ',1,2),(8,'La sauce','Egoutter le thon et l\'Ã©mietter grossiÃ¨rement. MÃ©langer la mayonnaise, le jus de citron et le curry. ',2,2),(9,'Melange','Couper les asperges en tiges de 3 Ã  4 cm. Dans un saladier, verser les pÃ¢tes, le thon, les asperges, puis la sauce. Attention, mÃ©langer doucement pour ne pas abimer les asperges. GoÃ»ter, si il vous semble que cela manque de curry, ajouter en un peu (par petites doses !!).\n\nServir frais. ',3,2),(10,'Les escalopes','DÃ©couper les escalopes congeleÃ©s en fines lamelles (les congeler facilite la dÃ©coupe et permet de faire de belles lamelles !). ',1,3),(11,'Le beurre et l\'ail','Faites fondre la noix de beurre dans une poÃªle Ã  fond Ã©pais. Quand le beurre cesse de chanter, faites saisir l\'ail pendant 30 s. ',2,3),(12,'La cuisson','Ajouter les escalopes. et faites-les bien dorer. Vous pouvez ajouter des lamelles de champignons de Paris que vous faites griller, Ã§a donne un bon goÃ»t. ',3,3),(13,'Ajout de sauce','Ajouter une bonne cuillÃ¨re Ã  soupe de sauce soja, remuer, et laisser les lamelles de viande s\'en imprÃ©gner pendant 1 mn. Ajouter la crÃ¨me, remuer, et c\'est prÃªt !',4,3),(14,'Bonus','Vous pouvez ajouter quelques brins de persil et accompager cette prÃ©paration avec du riz ou ce que vous voulez ! Bon appÃ©tit !',5,3),(15,'Les moules','Ecraser les petits beurre en grosses miettes dans 1 saladier, y verser dessus le beurre prÃ©alablement fondu, mÃ©langer le tout. Ajouter 2 cuillÃ¨res Ã  soupe de sucre roux et mÃ©langer. Etaler cette prÃ©paration dans un moule anti-adhÃ©sif (moule Ã  manquÃ© c\'est bien). RÃ©server au frigo en attendant. ',1,4),(16,'La mixture','MÃ©langer les jaunes d\'oeufs et le sucre (pour moi environ 100 g) jusqu\'Ã  ce que le mÃ©lange devienne mousseux et clair (au batteur Ã©lectrique c\'est plus rapide...). Ajouter le zeste et le jus du 1/2 citron. Ensuite mÃ©langer avec le fromage blanc et les deux petits suisses. Puis mettre la farine et rendre la prÃ©paration homogÃ¨ne. Monter les blancs en neige bien ferme et les incorporer dÃ©licatement Ã  la prÃ©paration. ',2,4),(17,'La cuisson','Verser doucement dans le moule tapissÃ© de petits beurres. Mettre au four pendant 45 mn Ã  1 heure (cela dÃ©pend du four et du la teneur en eau du fromage blanc) Th 150Â°C ou 4 . Quand c\'est cuit (pÃ¢te ferme, mousseuse et lÃ©gÃ¨rement colorÃ©e) mettre au frais avant de dÃ©guster.',3,4),(18,'DÃ©but de sauce et lapin','PrÃ©chauffez le four Ã  180Â°C (thermostat 6). DÃ©posez les lardons dans une casserole, couvrez dâ€™eau froide Ã  hauteur, puis portez Ã  Ã©bullition, Ã©gouttez et refroidissez. Otez lâ€™os de la partie haute des cuisses. Pour cela ouvrez en portefeuille de part et dâ€™autre de lâ€™os et dÃ©gagez-le. Salez, poivrez, puis dÃ©posez une petite branche de thym et une tomate confite. Refermez et ficelez. Garnissez les rÃ¢bles de la mÃªme faÃ§on, rabattez les flans lâ€™un sur lâ€™autre et ficelez.',1,5),(19,'Fin de lapin et cuisson','Salez lÃ©gÃ¨rement, poivrez le tout, et faites-les colorer dans une cocotte chaude avec une cuillÃ¨re Ã  soupe de Lesieur Duo Huile & Beurre. Ajoutez les lardons, les gousses dâ€™ail lavÃ©es non-Ã©pluchÃ©es et les Ã©chalotes taillÃ©es en quatre dans le sens de la longueur. Couvrez et enfournez pour 40 minutes Ã  Th 5/6. A mi-cuisson dÃ©couvrez et terminez la cuisson ainsi.',2,5),(20,'Fin de cuisson et accompagnement','Pendant ce temps, lavez les pommes de terre sans les Ã©plucher, taillez-les en 6 dans le sens de la longueur et faites-les sauter dans une poÃªle chaude avec 2 cuillÃ¨res Ã  soupe de Lesieur Duo Huile & Beurre. Au moment de servir, ajoutez dans la cocotte les feuilles dâ€™Ã©pinards lavÃ©es, Ã©queutÃ©es, et mÃ©langez dÃ©licatement, puis rectifiez lâ€™assaisonnement. Accompagnez des pommes rissolÃ©es, parsemÃ©es de fleur de sel et de ciboulette ciselÃ©e.',3,5),(21,'PrÃ©paration ramequins','Tapissez l\'intÃ©rieur de 4 ramequins de film alimentaire. ',1,6),(22,'La crÃ¨me','Dans un saladier, mettez la crÃ¨me glacÃ©e Carte d\'Or et Ã©miettez les 4 meringues. Ajoutez la moitiÃ© des fruits rouges et mÃ©langez dÃ©licatement. ',2,6),(23,'La crÃ¨me : suite','Versez ce mÃ©lange dans les 4 ramequins, lissez la surface, recouvrez de film alimentaire et placez au congÃ©lateur pour une heure de repos. ',3,6),(24,'Le coulis','Pendant ce temps, mettez le reste des fruits rouges dans un mixeur avec le miel et mixez jusqu\'Ã  obtenir un coulis. ',4,6),(25,'DÃ©moulage','Au moment de servir, dÃ©moulez prÃ©cautionneusement les ramequins sur des assiettes Ã  dessert, nappez de coulis aux fruits rouges, dÃ©corez d\'une cerise et dÃ©gustez. ',5,6);
/*!40000 ALTER TABLE `step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'Poulet'),(2,'Creme'),(3,'Soja'),(4,'Tendre'),(5,'TrÃ¨s facile'),(6,'Bon marchÃ©'),(7,'Tarte'),(8,'Citron'),(9,'Meringue'),(10,'Facile'),(11,'Moyen'),(12,'Difficile'),(13,'TrÃ¨s difficile'),(14,'Accompagnement'),(15,'Pates'),(16,'Thon'),(17,'Curry'),(18,'Cheesecake'),(19,'Moelleux'),(20,'Fromage blanc'),(21,'Lapin'),(22,'Cocotte'),(23,'TrÃ¨s facile - Facile'),(24,'Facile - Moyen'),(25,'Moyen - Difficile'),(26,'Difficile - TrÃ¨s difficile'),(27,'Fruits rouges'),(28,'Framboises'),(29,'Myrtilles'),(30,'Fraises'),(31,'Groseilles');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-15  9:38:34
