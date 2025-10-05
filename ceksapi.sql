/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.0.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cek_sapi
-- ------------------------------------------------------
-- Server version	12.0.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `basis_pengetahuan`
--

DROP TABLE IF EXISTS `basis_pengetahuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `basis_pengetahuan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_penyakit` bigint(20) unsigned NOT NULL,
  `id_gejala` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `basis_pengetahuan_id_penyakit_foreign` (`id_penyakit`),
  KEY `basis_pengetahuan_id_gejala_foreign` (`id_gejala`),
  CONSTRAINT `basis_pengetahuan_id_gejala_foreign` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`) ON DELETE CASCADE,
  CONSTRAINT `basis_pengetahuan_id_penyakit_foreign` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basis_pengetahuan`
--

LOCK TABLES `basis_pengetahuan` WRITE;
/*!40000 ALTER TABLE `basis_pengetahuan` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `basis_pengetahuan` VALUES
(2,2,4,NULL,NULL),
(3,2,17,NULL,NULL),
(4,2,27,NULL,NULL),
(5,2,30,NULL,NULL),
(6,2,40,NULL,NULL),
(8,3,3,NULL,NULL),
(9,3,7,NULL,NULL),
(10,3,16,NULL,NULL),
(11,3,18,NULL,NULL),
(12,3,37,NULL,NULL),
(13,3,48,NULL,NULL),
(14,4,9,NULL,NULL),
(15,4,23,NULL,NULL),
(16,4,34,NULL,NULL),
(17,4,41,NULL,NULL),
(19,5,3,NULL,NULL),
(20,5,10,NULL,NULL),
(21,5,19,NULL,NULL),
(22,5,32,NULL,NULL),
(23,5,35,NULL,NULL),
(24,5,45,NULL,NULL),
(25,5,49,NULL,NULL),
(27,6,22,NULL,NULL),
(28,6,28,NULL,NULL),
(29,6,42,NULL,NULL),
(30,6,43,NULL,NULL),
(31,7,6,NULL,NULL),
(32,7,24,NULL,NULL),
(33,7,38,NULL,NULL),
(34,7,50,NULL,NULL),
(35,7,53,NULL,NULL),
(36,8,2,NULL,NULL),
(37,8,14,NULL,NULL),
(38,8,20,NULL,NULL),
(39,8,28,NULL,NULL),
(40,8,29,NULL,NULL),
(41,8,47,NULL,NULL),
(42,8,52,NULL,NULL),
(43,9,3,NULL,NULL),
(44,9,5,NULL,NULL),
(45,9,8,NULL,NULL),
(46,9,20,NULL,NULL),
(47,9,30,NULL,NULL),
(48,9,36,NULL,NULL),
(49,9,44,NULL,NULL),
(50,10,3,NULL,NULL),
(51,10,15,NULL,NULL),
(52,10,20,NULL,NULL),
(53,10,25,NULL,NULL),
(54,10,26,NULL,NULL),
(55,10,31,NULL,NULL),
(56,11,3,NULL,NULL),
(57,11,4,NULL,NULL),
(58,11,12,NULL,NULL),
(59,11,23,NULL,NULL),
(60,11,33,NULL,NULL),
(61,12,4,NULL,NULL),
(62,12,7,NULL,NULL),
(63,12,11,NULL,NULL),
(64,12,16,NULL,NULL),
(65,12,21,NULL,NULL),
(66,12,26,NULL,NULL),
(67,12,39,NULL,NULL),
(68,12,51,NULL,NULL),
(69,4,54,NULL,NULL),
(70,6,14,NULL,NULL);
/*!40000 ALTER TABLE `basis_pengetahuan` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cache` VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab','i:1;',1759655583),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1759655583;',1759655583);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `gejala`
--

DROP TABLE IF EXISTS `gejala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `gejala` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gejala_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gejala`
--

LOCK TABLES `gejala` WRITE;
/*!40000 ALTER TABLE `gejala` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `gejala` VALUES
(2,'G01','Pembengkakan berisi cairan pada persendian, seperti lutut','2025-09-26 22:34:22','2025-09-26 22:34:22'),
(3,'G02','Nafsu makan menurun','2025-09-26 22:35:42','2025-09-26 22:35:42'),
(4,'G03','Diare atau konstipasi','2025-09-26 22:37:10','2025-09-26 22:37:10'),
(5,'G04','Gatal-gatal (Pruritus)','2025-09-26 22:37:28','2025-09-26 22:37:28'),
(6,'G05','Keluar cairan atau lendir abnormal','2025-09-26 22:37:44','2025-09-26 22:37:44'),
(7,'G06','Air liur berlebihan','2025-09-26 22:38:01','2025-09-26 22:38:01'),
(8,'G07','Penurunan berat badan','2025-09-26 22:38:28','2025-09-26 22:38:28'),
(9,'G08','Perut terasa keras saat ditekan','2025-09-26 22:39:01','2025-09-26 22:39:01'),
(10,'G09','Sensitive terhadap cahaya','2025-09-26 22:39:19','2025-09-26 22:39:19'),
(11,'G10','Leleran pada hidung dan mata','2025-09-26 22:39:36','2025-09-26 22:39:36'),
(12,'G11','Demam','2025-09-26 22:43:19','2025-09-26 22:43:19'),
(13,'G12','Tidak ada atau tidak teraturnya birahi','2025-09-26 22:43:53','2025-09-26 22:43:53'),
(14,'G13','Sapi yang dilahirkan mati atau lemah','2025-09-26 22:44:14','2025-09-26 22:44:14'),
(15,'G14','Demam susu (Milk Fever)','2025-09-26 22:44:27','2025-09-26 22:44:27'),
(16,'G15','Demam tinggi ','2025-09-26 22:44:47','2025-09-26 22:44:47'),
(17,'G16','Ditemukan cacing pada feses','2025-09-26 22:47:23','2025-09-26 22:47:23'),
(18,'G17','Luka pada area mulut dan kuku','2025-09-26 22:47:51','2025-09-26 22:47:51'),
(19,'G18','Terdapat bekas luka sekitar mata','2025-09-26 22:48:10','2025-09-26 22:48:10'),
(20,'G19','Penurunan produksi susu','2025-09-26 22:48:27','2025-09-26 22:48:27'),
(21,'G20','Kekakuan otot','2025-09-26 22:48:45','2025-09-26 22:48:45'),
(22,'G21','Kelahiran prematur','2025-09-26 22:48:58','2025-09-26 22:48:58'),
(23,'G22','Kesulitan bernapas','2025-09-26 22:49:15','2025-09-26 22:49:15'),
(24,'G23','Posisi fetus yang tidak normal','2025-09-26 22:49:28','2025-09-26 22:49:28'),
(25,'G24','Kesulitan berdiri','2025-09-26 22:49:41','2025-09-26 22:49:41'),
(26,'G25','Akumulasi cairan (edema) di rahang bawah','2025-09-26 22:50:01','2025-09-26 22:50:01'),
(27,'G26','Lemas dan lesu','2025-09-26 22:50:15','2025-09-26 22:50:15'),
(28,'G27','Keguguran','2025-09-26 22:50:29','2025-09-26 22:50:29'),
(29,'G28','Kesulitan untuk hamil kembali setelah keguguran','2025-09-26 22:50:48','2025-09-26 22:50:48'),
(30,'G29','Anemia','2025-09-26 22:51:04','2025-09-26 22:51:04'),
(31,'G30','Kesulitan berdiri','2025-09-26 22:51:19','2025-09-26 22:51:19'),
(32,'G31','Terdapat bercak putih pada kornea','2025-09-26 22:51:42','2025-09-26 22:51:42'),
(33,'G32','Keluarnya cairan dari hidung','2025-09-26 22:51:56','2025-09-26 22:51:56'),
(34,'G33','Pembesaran abdomen sisi kiri','2025-09-26 22:54:09','2025-09-26 22:54:09'),
(35,'G34','Mata bengkak dan kemerahan','2025-09-26 22:54:33','2025-09-26 22:54:33'),
(36,'G35','Kerusakan kulit','2025-09-26 22:54:53','2025-09-26 22:54:53'),
(37,'G36','Lepuh di mulut dan kuku','2025-09-26 22:56:04','2025-09-26 22:56:04'),
(38,'G37','Perut membengkak','2025-09-26 22:56:18','2025-09-26 22:56:18'),
(39,'G38','Gemetar','2025-09-26 22:56:33','2025-09-26 22:56:33'),
(40,'G39','Bulu kusam dan rontok','2025-09-26 22:56:48','2025-09-26 22:56:48'),
(41,'G40','Gelisah','2025-09-26 22:57:19','2025-09-26 22:57:19'),
(42,'G41','Kawin berulang','2025-09-26 22:57:44','2025-09-26 22:57:44'),
(43,'G42','Infeksi pada organ reproduksi','2025-09-26 22:57:58','2025-09-26 22:57:58'),
(44,'G43','Rambut rontok','2025-09-26 22:58:11','2025-09-26 22:58:11'),
(45,'G44','Mata berair','2025-09-26 22:58:29','2025-09-26 22:58:29'),
(46,'G45','Lesu','2025-09-26 22:58:52','2025-09-26 22:58:52'),
(47,'G46','Infeksi rahim','2025-09-26 22:59:09','2025-09-26 22:59:09'),
(48,'G47','Pincang','2025-09-26 22:59:24','2025-09-26 22:59:24'),
(49,'G48','Mata terlihat keruh','2025-09-26 22:59:40','2025-09-26 22:59:40'),
(50,'G49','Ketidakmampuan untuk berdiri','2025-09-26 22:59:53','2025-09-26 22:59:53'),
(51,'G50','Peradangan sendi','2025-09-26 23:00:06','2025-09-26 23:00:06'),
(52,'G51','Retensi plasenta','2025-09-26 23:00:19','2025-09-26 23:00:19'),
(53,'G52','Prolaps vagina','2025-09-26 23:00:33','2025-09-26 23:00:33'),
(54,'G53','Perubahan perilaku','2025-09-26 23:00:46','2025-09-26 23:00:46');
/*!40000 ALTER TABLE `gejala` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_08_08_080215_create_penyakit_table',1),
(5,'2025_08_08_080239_create_gejala_table',1),
(6,'2025_08_08_080300_create_basis_pengetahuan_table',1),
(7,'2025_09_09_012531_create_riwayat_diagnosis_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `penyakit`
--

DROP TABLE IF EXISTS `penyakit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `penyakit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penyakit_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penyakit`
--

LOCK TABLES `penyakit` WRITE;
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `penyakit` VALUES
(2,'P001','Helminthiasis','Helminthiasis  merupakan  penyakit pada  ternak yang  disebabkan  oleh infestasi cacing yang menyerang saluran pencernaan atau organ lainnya dan dapat menurunkan kualitas dan kuantitas produk daging sapi potong ','Memberikan obat antihelminthes, vitamin supportif daya tahan tubuh, vitamin penambah nafsu makan serta obat antidiare','2025-09-26 22:02:59','2025-09-26 22:02:59'),
(3,'P002','Penyakit Mulut dan Kuku (PMK)','Penyakit mulut dan kuku (PMK) adalah penyakit infeksi virus yang bersifat akut dan sangat menular pada hewan berkuku genap/belah (sapi, kerbau, kambing, domba, babi) dan beberapa jenis hewan liar. Penyakit ini menimbulkan kerugian ekonomi yang sangat besar ','Melakukan isolasi pada hewan ternak sakit, pembrian obat-obatan  (Antiseptik, antibiotik, vitamin dan suplemen obat luka), melakukan pencegahan dengan vaksinasi pada sapi yang sehat, melakukan pembersihan melalui desinfeksi kandang, serta melakukan pemeriksaan kesehatan hewan secara rutin.','2025-09-26 22:04:58','2025-09-26 22:05:34'),
(4,'P003','Tympani','Tympani (kembung) pada hewan adalah kondisi yang disebabkan oleh akumulasi gas di dalam rumen dan ketidakmampuan untuk mengeluarkan gas, sehingga mengakibatkan perut kembung. Jika dicurigai adanya timpani, jika masalah pembengkakan pada hewan berada di sisi kiri dan menyerupai suara seperti drum serta keras, hal ini mengindikasikan adanya masalah gas','Posisikan sapi dalam kondisi berdiri, melakukan pemberian obat-obatan anti kembung, suplemen vitamin dan pemberian trokar ( tahap akhir jika kembung pada sapi sudah parah )','2025-09-26 22:07:11','2025-09-26 22:07:11'),
(5,'P004','Pink Eye','Penyakit pink eye pada sapi adalah infeksi mata yang menular, disebut juga keratokonjungtivitis menular, dan disebabkan terutama oleh bakteri Moraxella bovis. Penyakit ini menimbulkan gejala seperti mata berair, kemerahan pada kelopak mata, dan kekeruhan pada kornea','Memberikan salep atau tetes mata pada sapi, injeksi antibiotik, serta vitamin dan suplemen. Melindungi mata dari debu dengan penutup mata, menjaga kebersihan kandang, dan melakukan islolasi pada sapi yang sakit','2025-09-26 22:09:06','2025-09-26 22:09:06'),
(6,'P005','Gangren','Ganggren pada sapi adalah kondisi kematian jaringan tubuh (nekrosis) yang diikuti dengan pembusukan akibat terganggunya aliran darah ke jaringan atau karena adanya infeksi bakteri. Jaringan yang mengalami ganggren biasanya berubah warna menjadi hitam atau hijau, berbau busuk, dan tidak dapat pulih kembali','Melakukan pemberian antibiotik pada sapi, vitamin dan suplemen, injeksi hormon, perbaikan nutrisi pakan untuk sapi serta menjaga kebersihan kandang sapi','2025-09-26 22:13:19','2025-09-26 22:13:19'),
(7,'P006','Distoksia','Dystocia pada sapi adalah kesulitan dalam proses melahirkan (partus) yang mengakibatkan anak sapi (pedet) atau induk sapi tidak dapat melahirkan secara normal tanpa bantuan. Kondisi ini merupakan salah satu masalah reproduksi yang sering terjadi pada ternak sapi, terutama pada sapi dara atau sapi dengan ukuran janin terlalu besar','Lakukan perbaikan posisi janin sapi, dengan cara melakukan penarikan paksa sesuai prosedur medis fetotomi (Jika anak sapi telah mati) atau melakukan operasi caesar','2025-09-26 22:14:27','2025-09-26 22:14:27'),
(8,'P007','Brucellosis','Penyakit brucellosis adalah penyakit menular yang disebabkan oleh bakteri dari genus brucella. Penyakit ini menyerang hewan ternak seperti sapi, kambing, domba, babi, dan anjing, serta dapat menular ke manusia sehingga digolongkan sebagai penyakit zoonosis','Lakukan pemeriksaan atau pemusnahan, melakukan karantina pada hewan yang terdiagnosa penyakit, melakukan vaksinasi rutin, sanitasi dan desinfeksi pada area kandang, memberikan vitamin dan suplemen antibiotik jika perlu','2025-09-26 22:16:56','2025-09-26 22:16:56'),
(9,'P008','Ekstoparasit','Penyakit ektoparasit pada sapi adalah penyakit yang disebabkan oleh parasit luar (ektoparasit) yang hidup di permukaan kulit, bulu, atau liang telinga sapi. Parasit ini mengambil darah, jaringan, atau cairan tubuh sebagai sumber makanan','Memberikan injeksi antiparasit, vitamin kulit dan bulu, vitamin penambah nafsu makan dan daya tahan tubuh, serta melakukan desinfeksi dan sanitasi area kandang sapi','2025-09-26 22:20:02','2025-09-26 22:20:02'),
(10,'P009','Hypcalcemia','Hypocalcemia pada sapi adalah penyakit metabolik yang terjadi karena turunnya kadar kalsium dalam darah secara drastis. Penyakit ini lebih dikenal dengan nama milk fever atau parturient paresis, dan umumnya menyerang sapi perah setelah melahirkan ketika kebutuhan kalsium untuk produksi susu meningkat sangat tinggi','Memberikan infus, injeksi, atau oral calcium, obat pendukung anti nyeri terapi cairan, vitamin dan mineral','2025-09-26 22:22:05','2025-09-26 22:22:05'),
(11,'P010','Bovine Viral Diarrhea','Bovine viral diarrhea (BVD) adalah penyakit menular pada sapi yang disebabkan oleh bovine viral diarrhea virus (BVDV) dari genus Pestivirus, family Flaviviridae. Penyakit ini sangat penting dalam dunia peternakan karena bersifat multisistemik (menyerang sistem pencernaan, pernapasan, reproduksi, hingga sistem imun), menurunkan produktivitas, dan menimbulkan kerugian ekonomi yang besar','Melakukan pemeriksaan dan pemusnahan BVD dengan cara vaksinasi pada ternak sehat, lakukan penerapan biosekuriti pada kandang, pemberian antibiotik pencegahan infeksi sekunder, vitamin dan suplemen penambah imunitas','2025-09-26 22:24:33','2025-09-26 22:24:33'),
(12,'P011','Bovine Ephemeral Fever','Bovine ephemeral fever (BEF) adalah penyakit virus akut pada sapi dan kerbau yang ditandai dengan demam tinggi mendadak, lemah, nyeri otot dan sendi, serta kelumpuhan sementara. Karena gejalanya berlangsung singkat (biasanya 1–3 hari)','Lakukan pemberian obat-obatan (analgesik dan antinyeri), vitamin dan suplemen penambah nafsu makan serta imunitas, berikan pakan yang kulitas tinggi, serta biosekuriti pada kandang','2025-09-26 22:27:48','2025-09-26 22:27:48');
/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `riwayat_diagnosis`
--

DROP TABLE IF EXISTS `riwayat_diagnosis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `riwayat_diagnosis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) NOT NULL,
  `id_penyakit` bigint(20) unsigned NOT NULL,
  `probabilitas` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_diagnosis_id_penyakit_foreign` (`id_penyakit`),
  CONSTRAINT `riwayat_diagnosis_id_penyakit_foreign` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_diagnosis`
--

LOCK TABLES `riwayat_diagnosis` WRITE;
/*!40000 ALTER TABLE `riwayat_diagnosis` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `riwayat_diagnosis` VALUES
(2,'sri wahyuni',2,0.000001,'2025-09-26 23:15:12','2025-09-26 23:15:12'),
(3,'fdafda',9,0.000007,'2025-09-27 19:16:25','2025-09-27 19:16:25'),
(4,'ffdada',2,0.000009,'2025-09-27 19:17:18','2025-09-27 19:17:18'),
(7,'fda',8,0.1,'2025-09-30 22:33:49','2025-09-30 22:33:49'),
(8,'fdafdas',3,0.00892,'2025-09-30 22:33:57','2025-09-30 22:33:57'),
(9,'fdafda',2,0.0001,'2025-10-04 23:49:37','2025-10-04 23:49:37'),
(10,'kdkj',2,0.0001,'2025-10-04 23:50:21','2025-10-04 23:50:21'),
(11,'f',9,0.00011159424714125,'2025-10-04 23:56:29','2025-10-04 23:56:29'),
(12,'ak',2,0.0000096978,'2025-10-05 00:25:38','2025-10-05 00:25:38'),
(13,'fda',2,0.0000096978,'2025-10-05 00:33:00','2025-10-05 00:33:00'),
(14,'f',2,0.0000096978,'2025-10-05 00:33:20','2025-10-05 00:33:20'),
(15,'f',2,0.0000096978,'2025-10-05 00:33:44','2025-10-05 00:33:44');
/*!40000 ALTER TABLE `riwayat_diagnosis` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sessions` VALUES
('WnRPmD1L8juIjja4LLY1gU4PcvKTxiaHfThU673N',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:143.0) Gecko/20100101 Firefox/143.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY1FNRGh1eVJwZHVvNnB4SFNBdHNKdjYwdVZZYTlvV1hhZmNzdzgyVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZW55YWtpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1759655523);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$FSppjRCMtqY9zxHl4zRSNeG0X2IpeGFpMaovJnSSmTNy2xBMfFteO',
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'Drh. Titin Tambing, S.KH.,M.Pt','admin@gmail.com','2025-09-26 03:19:46','$2y$12$U/BZ99slTo/P42wnF7E9O.kHYhAcyLuaIh.Yw.VUoq4PKowOuw6VO','1992-04-03','S2','Pengawas Penyakit dan Pengendali Penyakit Hewan','East Edwina','photos/BDFWplNXf98gxkIwTKbFurmdk9QZEX7kP34utGH2.jpg','tLdfiEuORqpDcK7rsOKViXWEdGiE7FX1cQR9OjZKw2RqiG316tSRDLP48ncG','2025-09-26 03:19:46','2025-09-26 23:25:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-10-05 17:15:00
