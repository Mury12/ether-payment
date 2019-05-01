-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: mm_proj1
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `description` text,
  `thumb` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'Album de Exemplo 1',1,'A descrição do seu álbum pode ser alterada clicando no lápis <i class=\\\"fas fa-arrow-right\\\"></i>','assets/img/thumb/5c60d1761ea2f.png'),(2,'Album de Exemplo 2',1,'A descrição do seu álbum pode ser alterada clicando no lápis <i class=\\\"fas fa-arrow-right\\\"></i>','assets/img/thumb/5c60d1b3b444d.png'),(3,'Album de Exemplo 2',1,'A descrição do seu álbum pode ser alterada clicando no lápis <i class=\\\"fas fa-arrow-right\\\"></i>','assets/img/thumb/5c60d1bf1ac51.png'),(4,'ft_001',0,NULL,NULL),(5,'ft_002',0,NULL,NULL),(6,'ft_003',0,NULL,NULL),(7,'ft_004',0,NULL,NULL),(8,'ft_005',0,NULL,NULL);
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_sessions`
--

DROP TABLE IF EXISTS `login_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(135) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  KEY `fk_login_sections_1_idx` (`user_id`),
  CONSTRAINT `fk_login_sections_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_sessions`
--

LOCK TABLES `login_sessions` WRITE;
/*!40000 ALTER TABLE `login_sessions` DISABLE KEYS */;
INSERT INTO `login_sessions` VALUES (1,1,'tok_mmadvq_fc99455fe290a7eec9ae8f5bbcbcb1893f3fbfabc0410dc3544ac8ab42436bca','2019-04-03 23:39:29',1);
/*!40000 ALTER TABLE `login_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(45) NOT NULL DEFAULT 'Item',
  `ref` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `link` varchar(256) DEFAULT '/',
  PRIMARY KEY (`id`),
  KEY `fk_menu_1_idx` (`ref`),
  CONSTRAINT `fk_menu_1` FOREIGN KEY (`ref`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL DEFAULT 'Nova Página',
  `subtitle` varchar(128) DEFAULT 'Seu Subtítulo',
  `route` varchar(128) NOT NULL,
  `menufile` varchar(128) DEFAULT 'list-sections-menu',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `route_UNIQUE` (`route`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (175,'Sua PÃ¡gina DinÃ¢mica','Le paginÃª automatiquÃª','dynamic','list-sections-menu',1),(176,'','','asdxd',NULL,1),(177,'Rotinha de Tesite!','SubtÃ­tulo lindo!','rota/teste',NULL,1),(178,'Primeira rota de Testes!','Eu si lambuzo consigo!','primeira-rota-de-teste',NULL,1),(179,'fd','','fdssd',NULL,1),(180,'Rotona','RotartÃ³rioa','Rotinha',NULL,1),(184,'Rotona','RotartÃ³rioa','Rotinhac',NULL,1),(185,'TÃ­tulo da pÃ¡gina','SubtÃ­tulo da pÃ¡gina','eww',NULL,1),(187,'','','ewqeq',NULL,1),(188,'','','3123213',NULL,1),(190,'','','3123213dsa',NULL,1),(191,'ROTA','NoVa','minha-nova-rota',NULL,1),(192,'PÃ¡gina Master','Super PÃ¡gina','rota-master/hehehe',NULL,1),(193,'PÃ¡gina Master','Super PÃ¡gina','rota-master/bbe-chorao',NULL,1);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(128) NOT NULL,
  `description` text,
  `album` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`),
  KEY `fk_photo_1_idx` (`album`),
  CONSTRAINT `fk_photo_1` FOREIGN KEY (`album`) REFERENCES `album` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (3,'/assets/img/THALLIFA_18.jpg','Clique no lÃ¡pis >>',1,0),(4,'/assets/img/THALLIFA_19.jpg',NULL,1,0),(5,'/assets/img/THALLIFA_20.jpg',NULL,1,0),(6,'/assets/img/THALLIFA_23.jpg','',2,0),(7,'/assets/img/THALLIFA_24.jpg','',2,0),(8,'/assets/img/THALLIFA_25.jpg','',2,0),(9,'/assets/img/THALLIFA_26.jpg','',2,0),(23,'/assets/img/THALLIFA_17.jpg',NULL,3,0),(25,'/assets/img/THALLIFA_16.jpg',NULL,3,0),(26,'/assets/img/THALLIFA_15.jpg',NULL,3,0),(36,'/assets/img/THALLIFA_02.jpg',NULL,3,0),(37,'/assets/img/THALLIFA_03.jpg',NULL,3,0),(38,'/assets/img/THALLIFA_04.jpg',NULL,3,0),(39,'/assets/img/THALLIFA_05.jpg',NULL,3,0),(40,'/assets/img/THALLIFA_08.jpg',NULL,3,0),(41,'/assets/img/THALLIFA_14.jpg',NULL,3,0),(42,'assets/img/albums/680f8f4e98f3c27491e8265c82a0beca87eba545de23d27f5b6a38b5e5f9746a.png',NULL,1,0),(43,'assets/img/albums/521d8d75c699fa88ecb4cea5afbfbd0803143511bbc1d9c22d28a1a5ff4520f8.png',NULL,1,0),(44,'assets/img/albums/462a1120bbae5f581ce9bf11244c0074eb481c820723d2616a92f5d5f8fb0589.png',NULL,1,0),(45,'assets/img/albums/f5b7ade9836ef0bade957876c6c8ed1f84d903608e9596c1c85318429f5813ea.png',NULL,1,0),(46,'assets/img/albums/f723a2d320f7cfd04b7bc8ce8d889afff16bf3a59174cc46f275474c77e0d5e5.png',NULL,1,0),(47,'assets/img/albums/18471f1db9f3e3fef3997868eec8ec7df10a921410f5a556de1fdaa27a76c249.png',NULL,2,0),(48,'assets/img/albums/1239efbadcbc4ae1b5b7bdbcdab496c5938d04d189283916fdb4ba6b9a931477.png',NULL,2,0),(49,'assets/img/albums/1f52834a20e8f113a06300b03e2358b47a1024d889b4eac0dacfb60e37929c89.png','hehehehe',2,0),(50,'assets/img/albums/173e511f2ba08cb74ac0178688139a9608ed3c173822922620acfa3cdcaf6d3a.png','iasuheisaheisauhe',2,0),(51,'assets/img/albums/48ce121d3db2cb0ec93ef74c496ca0a22b2644e44ad282d558142f3cdf3abe7a.png',NULL,1,0),(52,'assets/img/albums/39885aad63956b1c4be8dba61ec5dd5c77128787130447ae9fad6b4657492672.png',NULL,1,0),(53,'assets/img/albums/36e02266cf3d0b40163e45605560060decbac82e2f6809cca97cced27bc3adc0.png',NULL,1,0),(54,'assets/img/albums/187b6ad66b80e58a1cb8f0604f2d0f7a121a32504d2783b209026b0a0c76b4df.png',NULL,1,0),(55,'assets/img/albums/072e9e9d54eb422c81656c97fb6c98fc3b961639e2ff54307e466342e2713634.png',NULL,1,0),(56,'assets/img/albums/ad097df9dbe73a1a653828881be9a9ff314bdac18b214db5d831bda1e3d7f922.png',NULL,1,0),(57,'assets/img/albums/f8299260dab39d7b7e048ad87c2d161dedb7e01aae4e8457115cc30819f977c9.png',NULL,1,0),(58,'assets/img/albums/94e6d84228977db4afdd1f288b07a25490a4d10cdd23655ebb461f4cf882e045.png',NULL,1,0),(59,'assets/img/albums/6ecfd34ea067cb0bc12c418b2ddfa8ed4914b3bdda99c5b9a7cbb0ab6bb56b4f.png',NULL,1,0),(60,'assets/img/albums/2dfe49334d5519a6fe266f2b6aafb85ec14b14665d325d54eb70919cb5601107.png',NULL,1,0),(61,'assets/img/albums/f3fb0b50f6afee0df7de2b2cd66728b469487b48883a204f8acd740069f34b8d.png',NULL,1,0),(62,'assets/img/albums/d78b3b0a6d82635cde6a115a0428f50596293be9d8896d15a77b8bd0d573d681.png',NULL,1,0),(63,'assets/img/albums/7a603be3d26d11bdbabec215a03de5ce4d905493cb4a67b8a74246f0adb6cafe.png',NULL,1,0),(64,'assets/img/albums/f15be62c94545be5cd08b2ce52e0d4f5dbb7b2230915c5337cdef22c68654bcd.png',NULL,1,0),(65,'assets/img/albums/493cd2ff65abb1b65b4f996294bb8fd52a9f51c8f16ca2d5c9b0916ffbfabfca.png',NULL,1,0),(66,'assets/img/albums/466c905969a587e3181e105293827c170b03beff9b5811d07df1f3b7970bd28e.png',NULL,1,0),(67,'assets/img/albums/f53c0b13d39cea6386ad8bbff888b3d5769a9e7440955cd6ca072356a1ba9dbb.png',NULL,2,0),(68,'assets/img/albums/b5f9076ec9aaf0e0ef6facd413e51e9afc74a6a790c56813205bf5ae2b242d71.png',NULL,1,0),(69,'assets/img/albums/c2d750e870910c73ae711964fa8d4ef85237c18b0182e33ea46c481bb11f6191.png',NULL,1,0),(70,'assets/img/albums/b3b74ab9c876e444318712958730cf9f1236ebad974a3778c84c4ffbbd097e53.png',NULL,1,0),(71,'assets/img/albums/4663cc89150bc0b6ffdc6de1400cdb92c631aa6107390012c3534aaf4c8b3a13.png',NULL,1,0),(72,'assets/img/albums/208061451dc0793378e9d2be68e220565c0203062e297c62b2e36e0c06a034e4.png',NULL,1,0),(73,'assets/img/albums/90ab36c263aa0e2216441707370d243bf59d4494bfca921eb66193712f8f59fc.png',NULL,1,0),(74,'assets/img/albums/7a837b54af698a71db4c20972b36ebc64aa3a459b1fa905b5f9c191723db62f6.png','cx',1,1);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(11) NOT NULL,
  `sectionName` varchar(45) NOT NULL DEFAULT 'Título da Seção',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_page_content_1_idx` (`ref`),
  CONSTRAINT `fk_page_content_1` FOREIGN KEY (`ref`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (14,175,'Sua seÃ§Ã£o dinÃ¢mica!',1,0),(53,175,'Mas preciso de subseÃ§Ã£o?',1,1),(55,179,'Nova SeÃ§Ã£o',1,1),(58,185,'SessÃ£o legal',1,1),(66,180,'Nova SeÃ§Ã£o',1,1);
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subsection`
--

DROP TABLE IF EXISTS `subsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subsection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(11) NOT NULL,
  `ssTitle` varchar(45) NOT NULL DEFAULT 'Lorem Ipsum',
  `ssContent` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_subsection_1_idx` (`ref`),
  CONSTRAINT `fk_subsection_1` FOREIGN KEY (`ref`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsection`
--

LOCK TABLES `subsection` WRITE;
/*!40000 ALTER TABLE `subsection` DISABLE KEYS */;
INSERT INTO `subsection` VALUES (3,14,'Mas o que?','<p style=\"text-align: center;\">O conte&uacute;do de uma subse&ccedil;&atilde;o pode ser qualquer coisa. Um texto, imagens ou m&iacute;dia. O interessante mesmo &eacute; que voc&ecirc; pode atualiz&aacute;-las instantaneamente, adicionar mais se&ccedil;&otilde;es e subse&ccedil;&otilde;es. Para editar este e outros textos, clique sobre o &iacute;cone de l&aacute;pis. Para cancelar, clique sobre o (x) e concluir, sobre o &iacute;cone de conclus&atilde;o (v). <br />Voc&ecirc; pode tamb&eacute;m mudar o t&iacute;tulo e o subt&iacute;tulo da p&aacute;gina da mesma maneira. Para customizar esta p&aacute;gina, fa&ccedil;a login como: \"<code>test@mail.com</code>\" e senha \"<code>@987.!m</code>\" a partir da barra de navega&ccedil;&atilde;o acima.</p>\n<p style=\"text-align: center;\"><iframe src=\"//www.youtube.com/embed/6jiNS_4CEug\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\n<p style=\"text-align: center;\">&nbsp;</p>',1),(4,14,'Mas que maravilha!','<p>Para adicionar uma nova se&ccedil;&atilde;o inteira, clique sobre &iacute;cone (+) no final da p&aacute;gina. Para adicionar uma nova subse&ccedil;&atilde;o, clique sobre o (+) no final da se&ccedil;&atilde;o. Voc&ecirc; tamb&eacute;m pode excluir subse&ccedil;&otilde;es e sedsad&ccedil;&otilde;es clicando no (x) no canto superior direito de cada uma delas.</p>',1),(18,53,'','<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.artmorrison.com/images/63-67vette/63-67vette-2-852.png\" alt=\"Vette\" width=\"852\" height=\"365\" /></p>\n<p style=\"text-align: center;\">Claro que n&atilde;o, voc&ecirc; pode deixar seu t&iacute;tulo em branco, caso queira apenas expressar um conte&uacute;do!</p>',1),(25,58,'SubseÃ§Ã£o mais legal ainda','<p>O conte&uacute;do da subse&ccedil;&atilde;o ent&atilde;o nem se fala!</p>',1),(33,66,'TÃ­tulo da SubseÃ§Ã£o','ConteÃºdo da subseÃ§Ã£o',1),(36,14,'Legendas ;)','',1),(38,14,'TÃ­tulo da SubseÃ§Ã£o','ConteÃºdo da subseÃ§Ã£o',1);
/*!40000 ALTER TABLE `subsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(128) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `zip` int(8) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  CONSTRAINT `fk_user_data_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_data`
--

LOCK TABLES `user_data` WRITE;
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'AndrÃ©','mury_gh@gmail.com','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',1),(2,'Testener','test@mail.com','b1ef5a1c354e825a685df623b3e054535940b603644623fed86d55693eb1bb4f',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-03 23:40:50
