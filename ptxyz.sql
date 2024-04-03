-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ptxyz
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (21,'2014_10_12_000000_create_users_table',1),(22,'2014_10_12_100000_create_password_resets_table',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('01ef76e6-26be-47b6-989b-3a403199fd44','User3','user3@ptxyz1.com','$2y$10$tjLsC6N0Z0TePJr8ifdGueA99fzjNuqGnY68R62w8LvoqemQqmKL6','user','pt xyz 1'),('169759be-d935-4226-85f0-42aa6e9400dc','User1','user1@ptxyz.com','$2y$10$qWCr2TCf8mFAUxtTPyN8peoe.2cNAe7g7d/3S28FoQD3IZjWJfVl.','user','pt xyz'),('34281809-62ce-42da-b5eb-583d5ddb2f49','user1 pt xyz 2','user1@ptxyz2.com','$2y$10$nhbAXQ6iB8a0RJo/7d7lg.DmHswUzRycwS2RZgRLrtRS965pvwCm.','user','pt xyz 2'),('58a69a99-a0db-45fc-9f62-b4dfd86d5c48','user1 pt xyz 1','user1@ptxyz1.com','$2y$10$KqWLGEnfHiVu.Vu2pPIoLOF440BZsJ0/1NMEWX9838l/6OnuUlTzm','user','pt xyz 1'),('65fc6f57-7ab8-452e-9494-71e2045d1839','User2','user2@ptxyz.com','$2y$10$AQigflOVH7Z8Ukxa9pQBy.MJtB5Pvh6RRQYznzwL97JivzVfkFrCC','user','pt xyz'),('6ccfd0b0-cded-41f6-8e60-942d5312c5c5','user2 pt xyz 2','user2@ptxyz2.com','$2y$10$uS9dRtrRm8J22e5WLVc0geLNG3pNFZgBQhr5uO0Pk6pUhMDA51.5e','user','pt xyz 2'),('80a3bbbb-a3f5-4928-abff-8fb28f16ac30','supervisor pt xyz 1','supervisor@ptxyz1.com','$2y$10$IquqSTs5rXCopVat6IJk0O/eH.W6jEyxnoZnL9bczk7DoOD1e1P2K','supervisor','pt xyz 1'),('81685944-8eb6-44fb-b5e7-cbf906426429','admin pt xyz 1','admin@ptxyz1.com','$2y$10$g9vleTuOJNP23eRAoZhIPuOLD3JHvYEAp9qttWYxPt9JuW18dl8ae','admin','pt xyz 1'),('819a64c8-ae52-45b5-bac3-6aa7e61f0ce6','supervisor pt xyz 2','supervisor@ptxyz2.com','$2y$10$cvmB3mbzfH5U5G3df5FLdepl6h5430IxPZiYWpdcG5BC9CwUfhi4u','supervisor','pt xyz 2'),('95b61ea1-5cde-4767-91f7-1d726bb88cb7','Manager PT XYZ','manager@ptxyz.com','$2y$10$gzq9Jbor4zK3a2VfoHVlV.Cyp.gG4tWNrSnUI4CbY2s70O0oB0QAC','manager','pt xyz'),('ade21788-063f-4033-b3ee-85738a29314e','admin pt xyz 2','admin@ptxyz2.com','$2y$10$P1VOEVcU0p4V/iSOyhtKxO1lEroq1a08rP5PUOXa7IBClaAbjOdg2','admin','pt xyz 2'),('b6f7c182-7380-4957-ba94-60b957cbe7f1','admin pt xyz','admin@ptxyz.com','$2y$10$/3bhM6/weRNXp0uHR3TjV.zSjDXj027BRACYW0R7Jni1N9Th7Yeoq','admin','pt xyz'),('f7d89d2b-8140-454c-b841-2073603f794c','user2 pt xyz 1','user2@ptxyz1.com','$2y$10$Dyg7/RJPRaEs2p6UfJwD3OUdalANNZI7d/l7ylG/Hha/j/cAo5mEe','user','pt xyz 1');
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

-- Dump completed on 2024-04-03 22:06:12
