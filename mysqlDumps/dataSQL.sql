-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: contentmanagement
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manufacturer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (1,'Honda'),(2,'Subaru'),(3,'Toyota'),(4,'Nissian'),(5,'Mazda'),(6,'Acura'),(7,'Lexus'),(8,'Ford'),(9,'GMC'),(10,'Chevrolet'),(11,'Chrysler'),(12,'Tesla');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `isAdmin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `manufacturer_id` int NOT NULL,
  `model` varchar(45) NOT NULL,
  `year` int DEFAULT NULL,
  `imageUrl` text,
  `mpg` double DEFAULT NULL,
  `body_style` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,1,'Civic',2023,'https://hips.hearstapps.com/hmg-prod/images/2023-honda-civic-type-r-2980-1671034048.jpg?crop=0.592xw:0.886xh;0.337xw,0.114xh&resize=1200:*',37,'Sedan',23450),(2,1,'Accord',2023,'https://hips.hearstapps.com/hmg-prod/images/2023-honda-accord-front-three-quarters-1667945447.jpg?crop=0.646xw:0.686xh;0.211xw,0.183xh&resize=1200:*',33,'Sedan',27295),(3,1,'S2000',2000,'https://www.carscoops.com/wp-content/uploads/2019/12/Honda-S2000-.jpg',23,'Coupe',34795),(4,2,'WRX',2023,'https://s3.us-east-2.amazonaws.com/dealer-inspire-vps-vehicle-images/4057-110010411/thumbnails/large/JF1VBAF63P9805004/1e866e5645b823790c0695a2a22b827d.jpg',23,'Sedan',30605),(5,2,'Crosstreck',2023,'https://file.kelleybluebookimages.com/kbb/base/evox/CP/14425/2023-Subaru-Crosstrek-front_14425_032_2400x1800_PAF_nologo.png',30,'Hatchback',23645),(6,2,'Impreza',2023,'https://www.motortrend.com/uploads/2022/11/2023-Subaru-Impreza-Exterior-1.jpg',32,'Hatchback',19795),(7,3,'Corolla',2023,'https://www.autotrader.com/wp-content/uploads/2022/12/2023-toyota-corolla-se-front-right.jpg?w=1024',36,'Hatchback',23155),(8,3,'Supra',2023,'https://prodhq.s3.amazonaws.com/img/content/gp1/models/2023/toyota/gr_supra_white_front_grill_passenger_side_1080x1080.png',28,'Coupe',44640),(9,3,'Camry',2023,'https://hips.hearstapps.com/hmg-prod/images/c-005-1500x1000-1652713137.jpg',34,'Sedan',26320),(10,4,'400z',2024,'https://hips.hearstapps.com/hmg-prod/images/2023-nissan-z-performance-test-108-1655460635.jpg?crop=0.558xw:0.418xh;0.223xw,0.286xh&resize=1200:*',22,'Coupe',40990),(11,4,'GTR',2023,'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRC65WdJ67rZhhiWMzc70Jm4TE-_zMOwAQr25J0scxMrkLrzHrb',20,'Coupe',116040),(12,4,'Titan',2023,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfy7oNq5dfE4PWBhoJd98CNiqGicxXuKZvPsK9C-cwwloILxKl',19,'Truck',39950),(13,5,'6 Sport',2023,'https://www.motortrend.com/uploads/sites/5/2021/07/Mazda6-RWD-1.jpg',30,'Sedan',54935),(14,5,'MX-5',2023,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5jfuCKJoZwNbieIAcUDOYhnFd0g5J6Z8lTxXAcgpqwl8RQjNS',20,'Coupe',28050),(15,5,'CX-5',2023,'https://overtake-images.sfo2.digitaloceanspaces.com/2021/Mazda/CX-5/cx-5%20ext.jpg',26,'SUV',26700),(16,6,'Integra',2023,'https://www.acura.com/-/media/Acura-Platform/Vehicle-Pages/INTEGRA/2023/overview-page/Performance/2023-Integra-performance-xl.jpg',34,'Sedan',31300),(17,6,'NSX',2022,'https://www.chicagoautoshow.com/assets/1/23/VehicleRegularDimensionId/2022-Acura-NSX-11.jpg',21,'Coupe',171495),(18,6,'MDX',2023,'https://www.autotrader.com/wp-content/uploads/2022/07/2023-acura-mdx.jpg',23,'SUV',49550),(19,7,'LFA',2012,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSB8EdHuZIDhB_a4o2W-Ey0kVB3nSwD6BmWjP7ME33JFrD8KpuB',14,'Coupe',375000),(20,7,'IS350',2015,'https://images.squarespace-cdn.com/content/v1/530a661ae4b09a0716b9d02d/1439848837619-FFBMP2BUQSV68IDVAEOS/image-asset.jpeg?format=1000w',22,'Sedan',40065),(21,7,'RX350',2023,'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSqwPZUEJ852aMbKKPc-1mwbUrBXO9_zdW0ON4Bz3IefpO6s4ui',35,'SUV',47400),(22,8,'Mustange',2023,'https://www.motortrend.com/uploads/2023/01/2023-Ford-Mustang-Mach-1-6M-42.jpg',27,'Coupe',27770),(23,8,'GT',2020,'https://hips.hearstapps.com/hmg-prod/images/2020-ford-gt-110-1580930617.jpg?crop=1.00xw:0.846xh;0,0.154xh&resize=1200:*',14,'Coupe',500000),(24,8,'Bronco Raptor',2023,'https://i.ytimg.com/vi/LlNFdMR3QwE/maxresdefault.jpg',15,'SUV',83580),(25,9,'Canyon',2023,'https://media.ed.edmunds-media.com/gmc/canyon/2023/oem/2023_gmc_canyon_crew-cab-pickup_at4_fq_oem_1_1280.jpg',19,'Mid-Size Truck',36900),(26,9,'Sierra',2023,'https://content.homenetiol.com/2000292/2147673/0x0/15637826f285483fb3cbd8259eb4c1e8.jpg',26,'Truck',65700),(27,9,'Yukon',2023,'https://www.autotrader.com/wp-content/uploads/2022/06/2023-gmc-yukon-denali-xl.jpg',24,'SUV',64100),(28,10,'Corvette',2023,'https://robbreport.com/wp-content/uploads/2021/10/z0609.jpg?w=1000',19,'Coupe',79795),(29,10,'Apache',1959,'https://classiccarsltd.com/wp-content/uploads/sites/35/2020/07/IMG_0981.jpg',18,'Truck',38658),(30,10,'Trailblazer',2023,'https://hips.hearstapps.com/hmg-prod/images/2023-chevrolet-trailblazer-activ-001-1654617775.jpg?crop=0.723xw:0.590xh;0.236xw,0.255xh&resize=1200:*',31,'Mid-Size SUV',22100),(31,11,'300',2023,'https://media.ed.edmunds-media.com/chrysler/300/2023/oem/2023_chrysler_300_sedan_c_fq_oem_1_1600.jpg',25,'Sedan',37495),(32,11,'Pacifica',2023,'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTykIy1vMsZnyQk3oPi-CdY1h4ncj6D6iFQMy931zuOLPttAeAy',23,'Mini Van',37270),(33,12,'Model 3',2023,'https://hips.hearstapps.com/hmg-prod/images/2023-tesla-model-3-101-1671468297.jpeg?crop=0.481xw:0.427xh;0.372xw,0.279xh&resize=1200:*',0,'Sedan',39990),(34,12,'Model S',2023,'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRU_WJSPz0xLbrGtKmSczTjBrJ7L5FSTnU5Pq798SBSckWl0yYp',NULL,'Sedan',87490),(35,12,'Model X',2023,'https://s3-prod-europe.autonews.com/s3fs-public/COPY_308319893_AR_1_BWANCHRHSAKC.jpg',NULL,'SUV',97490);
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-08 10:17:15
