-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: danos_tu_opinion
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `fkcorreo` varchar(45) NOT NULL,
  `fkdestino` varchar(45) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `calificacion` decimal(10,1) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  UNIQUE KEY `id_comentario_UNIQUE` (`id_comentario`),
  KEY `fkcorreo_idx` (`fkcorreo`),
  KEY `fkdestino_idx` (`fkdestino`),
  CONSTRAINT `fkcorreo` FOREIGN KEY (`fkcorreo`) REFERENCES `usuario` (`correo`),
  CONSTRAINT `fkdestino` FOREIGN KEY (`fkdestino`) REFERENCES `destino` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,'carlos@gmail.com','ÁMSTERDAM','¡Excelente lugar! Disfruté mucho mi tiempo allí. Altamente recomendado.',9.0,'2024-01-25 01:56:50'),(2,'andrea@hotmail.com','BUENOS AIRES','Cochabamba es una ciudad encantadora. Me encantó la comida y la cultura local.',8.0,'2024-01-25 01:56:50'),(3,'luisa@yahoo.com','KINGSTON','Kingston tiene un clima increíble. Pasé unas vacaciones maravillosas.',7.0,'2024-01-25 01:56:50'),(4,'javier@outlook.com','ROMA','Roma tiene una arquitectura fascinante. Recomiendo explorar el centro histórico.',10.0,'2024-01-25 01:56:50'),(5,'ana@live.com','OSLO','Oslo es un lugar tranquilo y hermoso. La gente es amable y la comida es deliciosa.',9.0,'2024-01-25 01:56:50'),(8,'nico@gmail.com','BARCELONA','Sergi Roberto me tiene miedo.',4.2,'2024-01-25 02:52:20');
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destino`
--

DROP TABLE IF EXISTS `destino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `destino` (
  `nombre` varchar(50) NOT NULL,
  `id_destino` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  PRIMARY KEY (`nombre`),
  UNIQUE KEY `id_destino_UNIQUE` (`id_destino`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destino`
--

LOCK TABLES `destino` WRITE;
/*!40000 ALTER TABLE `destino` DISABLE KEYS */;
INSERT INTO `destino` VALUES ('ÁMSTERDAM',27,'Euro','Países Bajos'),('ASTURIAS',24,'Euro','España'),('BARCELONA',20,'Euro','España'),('BERLÍN',12,'Euro','Alemania'),('BOGOTÁ',17,'Peso colombiano','Colombia'),('BRASILIA',9,'Real brasileño','Brasil'),('BUENOS AIRES',3,'Peso argentino','Argentina'),('CANTABRIA',22,'Euro','España'),('CIUDAD DE MEXICO',8,'Peso mexicano','México'),('EDIMBURGO',28,'Libra esterlina','Escocia'),('GRANADA',25,'Euro','España'),('KINGSTON',19,'Dólar jamaicano','Jamaica'),('LA HABANA',10,'Peso cubano','Cuba'),('LIMA',5,'Sol peruano','Perú'),('LISBOA',13,'Euro','Portugal'),('MOSCÚ',26,'Rublo ruso','Rusia'),('NUEVA YORK',1,'Dólar estadounidense','Estados Unidos'),('OSLO',11,'Corona noruega','Noruega'),('OTTAWA',7,'Dólar canadiense','Canadá'),('PARÍS',4,'Euro','Francia'),('REIKIAVIK',16,'Corona islandesa','Islandia'),('ROMA',14,'Euro','Italia'),('SANTIAGO',6,'Peso chileno','Chile'),('SEVILLA',21,'Euro','España'),('VIENA',2,'Euro','Austria'),('WASHINGTON D.C.',18,'Dólar estadounidense','Estados Unidos'),('ZAGREB',15,'Kuna croata','Croacia'),('ZARAGOZA',23,'Euro','España');
/*!40000 ALTER TABLE `destino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicioadicional`
--

DROP TABLE IF EXISTS `servicioadicional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicioadicional` (
  `id_servicio` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_servicio`),
  UNIQUE KEY `id_servicio_UNIQUE` (`id_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicioadicional`
--

LOCK TABLES `servicioadicional` WRITE;
/*!40000 ALTER TABLE `servicioadicional` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicioadicional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Carlos123!@#','Carlos Gutiérrez','carlos@gmail.com'),(2,'Andrea456!@#','Andrea López','andrea@hotmail.com'),(3,'Luisa789!@#','Luisa Mendoza','luisa@yahoo.com'),(4,'JavierABC!@#','Javier Vargas','javier@outlook.com'),(5,'AnaXYZ!@#','Ana Ruiz','ana@live.com'),(11,'Pablo1234#','Pablo','pablo@gmail.com'),(12,'Nico1234#N','Nico Williams','nico@gmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-25  5:48:36
