/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : wifi_sharing

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-01-17 16:18:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'bismilah#2017', null);

-- ----------------------------
-- Table structure for guests
-- ----------------------------
DROP TABLE IF EXISTS `guests`;
CREATE TABLE `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `browser` varchar(150) DEFAULT NULL,
  `ip` varchar(150) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_email` (`email`),
  KEY `ix_created` (`created`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guests
-- ----------------------------
INSERT INTO `guests` VALUES ('3', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-14 18:11:08');
INSERT INTO `guests` VALUES ('4', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-15 08:27:01');
INSERT INTO `guests` VALUES ('5', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-15 12:03:15');
INSERT INTO `guests` VALUES ('6', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-15 14:27:42');
INSERT INTO `guests` VALUES ('7', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-15 17:17:27');
INSERT INTO `guests` VALUES ('8', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-16 06:03:09');
INSERT INTO `guests` VALUES ('9', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-16 09:52:34');
INSERT INTO `guests` VALUES ('10', 'randi eka setiawan', 'randiekas@gmail.com', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2017-01-17 15:42:29');

-- ----------------------------
-- Table structure for navigations
-- ----------------------------
DROP TABLE IF EXISTS `navigations`;
CREATE TABLE `navigations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort_number` int(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `content` text,
  `type` enum('singlepage','multipages','external') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of navigations
-- ----------------------------
INSERT INTO `navigations` VALUES ('1', '1', 'Berita 11', 'berita_sekolah', 'mdi-action-picture-in-picture', null, 'multipages');
INSERT INTO `navigations` VALUES ('2', '2', 'Berita Kewilayahan', 'berita_kewilayahan', 'mdi-action-picture-in-picture', null, 'multipages');
INSERT INTO `navigations` VALUES ('3', '3', 'Pusat Belajar 11', 'pusat_belajar', 'mdi-av-video-collection', null, 'multipages');
INSERT INTO `navigations` VALUES ('4', '4', 'Digital Library', 'digital_library', 'mdi-action-perm-media', null, 'multipages');
INSERT INTO `navigations` VALUES ('5', '5', 'Profil SMKN 11', 'tentang', 'mdi-action-info-outline', '<p class=\"caption\">Keberadaan SMK Negeri 11 Bandung, diawali dengan berdirinya SMEA Cimahi sebagai Filial SMEA Negeri 1 Negeri Bandung pada tahun 1968, dengan menempati SMP Negeri 2 Cimahi, kemudian pindah menempati SD Utama Leuwi Gajah sampai dengan tahun 1969. Awal tahun 1970 sempat pindah menempati SMP Negeri 1 Cimahi sampai tanggal 1 April 1970. Sejak tanggal 1 April 1970 tersebut SMEA Cimahi mengawali sejarah baru menempati bangunan, yang semula diperuntukkan untuk Sekolah Teknik, berlokasi di jalan Budi Cilember, sampai Tanggal 30 Juli 1980, dengan SK Mendikbud no 0207/0/1980, melepas status filialnya menjadi SMEA Negeri Cimahi. Pada tanggal 7 April 1987 dengan SK Mendikbud RI (nomenklatur SMK), nomor 036/0/1987 berubah nama menjadi SMK Negeri 11.&nbsp;</p>\r\n<p class=\"caption\">Juni 2003, SMKN 11 membuka program keahlian Rekayasa Perangkat Lunak, merupakan program re-engenering Dikmenjur.</p>\r\n<p class=\"caption\">SMKN 11 Bandung berlokasi di jalan Budi Cilember, kelurahan Sukaraja, Kecamatan Cicendo, berbatasan dengan Kota Cimahi. Jalan Budi terletak di jalan raya Cibeureum, dari arah Bandung, terletak sebelah kanan, setelah melewati jembatan Cimindi. Dari arah Jakarta, terdapat di sebelah kiri, sebelum jembatan Cimindi. Di Belakang Radio LITA Fm</p>\r\n<p class=\"caption\">Berdasarkan SK Mendiknas Nomor : 3587/C5.3/Kep/KU/2007 tanggal 27 Juli 2007 SMK Negeri 11 Bandung dinominasikan menjadi Rintisan Sekolah berstandar Internasional. Tahun 2007 merupakan era baru dengan akan diterapkannya pencapaian visi lembaga berdasarkan profil Sekolah Berstandar Internasional.</p>\r\n<p class=\"caption\">Pada tanggal 03 Agustus 2008 memperoleh sertifikat ISO 9001:2000 , dengan sisstem manajemen mutu ISO 9001:2000, SMK Negeri 11 Bandung siap melayani dan melaksanakan peningkatan mutu sumber daya pendidikan yang mampu bersaing di era global.</p>\r\n<h4 class=\"header\">Visi Misi</h4>\r\n<div class=\"card-panel\">\r\n<blockquote>“Menjadi SMK mandiri yang berbudaya lingkungan dengan berbasis ICT“</blockquote>\r\n</div>\r\n<p class=\"caption\">Misi SMK Negeri 11 Bandung disingkat SMK:</p>\r\n<ol>\r\n<li><strong>Siap</strong> memberikan layanan pendidikan yang berkualitas tinggi dan menciptakan lingkungan yang sehat dan baik</li>\r\n<li><strong>Me</strong><strong>ningkatkan</strong>&nbsp;proses pembelajaran bagi peserta didik dengan memberi keteladanan, memotivasi, mengilhami, memberdayakan, dan membudayakan</li>\r\n<li><strong>Komitmen</strong> tinggi dan kreatif menghasilkan&nbsp; tamatan yang cerdas, mandiri&nbsp; dan kompetitif sesuai kebutuhan masyarakat lokal dan global</li>\r\n</ol>\r\n<h4 class=\"header\">Sasaran dan Tujuan</h4>\r\n<p class=\"caption\">Tujuan SMK Negeri 11 Bandung dijabarkan berdasarkan tujuan umum pendidikan, visi dan misi sekolah. Berdasarkan tiga hal tersebut, dapat dijabarkan tujuan dari SMK Negeri 11 Bandung adalah</p>\r\n<ol>\r\n<li>Terdepan, Terbaik, dan Terpercaya dalam hal ketakwaan terhadap Tuhan Yang Maha Esa</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam pengembangan potensi, kecerdasan dan minat</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam perolehan Nilai UAN</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam persaingan masuk jenjang Perguruan Tinggi dan Dunia Kerja</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam membekali peserta didik agar memiliki keterampilan teknologi informasi dan komunikasi serta mampu mengembangkan diri secara mandiri.</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam persaingan secara global</li>\r\n<li>Terdepan, Terbaik dan Terpercaya dalam pelayanan</li>\r\n</ol>', 'singlepage');
INSERT INTO `navigations` VALUES ('6', '8', 'DITPSMK', 'external_lnk', 'mdi-action-open-in-new', null, 'external');
INSERT INTO `navigations` VALUES ('7', '6', 'Gallery Siswa', 'gallery_siswa', 'mdi-image-panorama', null, 'multipages');
INSERT INTO `navigations` VALUES ('8', '7', 'Gallery Guru', 'gallery_guru', 'mdi-image-panorama', null, 'multipages');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nvigation` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_navigations` (`id_nvigation`),
  CONSTRAINT `fk_id_navigations` FOREIGN KEY (`id_nvigation`) REFERENCES `navigations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '1', 'Berita 1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sdssdds sds</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"assets/news/32.jpg?1484476646435\" alt=\"32\" /></p>\r\n<p>&nbsp;</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('2', '1', 'Berita 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. bbsssds</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('3', '1', 'Berita 3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('4', '2', 'Berita Kewilayahan 1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('5', '2', 'Berita Kewilayahan 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('6', '2', 'Berita Kewilayahan 3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('7', '3', 'Belajar 1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('8', '3', 'Belajar 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('9', '3', 'Belajar 3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('10', '4', 'Digital Library 1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('11', '4', 'Digital Library 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');
INSERT INTO `news` VALUES ('12', '4', 'Digital Library 3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', '2017-01-13 08:01:02');

-- ----------------------------
-- Table structure for visitors
-- ----------------------------
DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_guest` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_link` (`link`),
  KEY `index_created` (`created`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of visitors
-- ----------------------------
INSERT INTO `visitors` VALUES ('11', '3', 'news/beranda', '2016-01-14 18:15:00');
INSERT INTO `visitors` VALUES ('12', '3', 'news/berita/berita_sekolah/', '2017-02-14 18:15:02');
INSERT INTO `visitors` VALUES ('13', '3', 'news/detail/1', '2017-01-14 18:15:02');
INSERT INTO `visitors` VALUES ('14', '3', 'news/berita/pusat_belajar/', '2017-01-14 18:15:04');
INSERT INTO `visitors` VALUES ('15', '3', 'news/berita/tentang/', '2017-01-14 18:15:06');
INSERT INTO `visitors` VALUES ('16', '3', 'news/berita/digital_library/', '2017-01-14 18:15:06');
INSERT INTO `visitors` VALUES ('17', '2', 'news/beranda', '2017-01-14 18:18:05');
INSERT INTO `visitors` VALUES ('18', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:31:04');
INSERT INTO `visitors` VALUES ('19', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:31:05');
INSERT INTO `visitors` VALUES ('20', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:31:06');
INSERT INTO `visitors` VALUES ('21', '2', 'news/berita/digital_library/', '2017-01-14 18:31:08');
INSERT INTO `visitors` VALUES ('22', '2', 'news/berita/tentang/', '2017-01-14 18:31:09');
INSERT INTO `visitors` VALUES ('23', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:31:10');
INSERT INTO `visitors` VALUES ('24', '2', 'news/detail/3', '2017-01-14 18:31:11');
INSERT INTO `visitors` VALUES ('25', '2', 'news/beranda', '2017-01-14 18:35:29');
INSERT INTO `visitors` VALUES ('26', '2', 'news/beranda', '2017-01-14 18:36:15');
INSERT INTO `visitors` VALUES ('27', '2', 'news/beranda', '2017-01-14 18:36:33');
INSERT INTO `visitors` VALUES ('28', '2', 'news/beranda', '2017-01-14 18:37:28');
INSERT INTO `visitors` VALUES ('29', '2', 'news/beranda', '2017-01-14 18:37:41');
INSERT INTO `visitors` VALUES ('30', '2', 'news/beranda', '2017-01-14 18:38:06');
INSERT INTO `visitors` VALUES ('31', '2', 'news/beranda', '2017-01-14 18:38:31');
INSERT INTO `visitors` VALUES ('32', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:38:35');
INSERT INTO `visitors` VALUES ('33', '2', 'news/beranda', '2017-01-14 18:38:38');
INSERT INTO `visitors` VALUES ('34', '2', 'news/beranda', '2017-01-14 18:38:51');
INSERT INTO `visitors` VALUES ('35', '2', 'news/beranda', '2017-01-14 18:39:03');
INSERT INTO `visitors` VALUES ('36', '2', 'news/beranda', '2017-01-14 18:39:27');
INSERT INTO `visitors` VALUES ('37', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:39:39');
INSERT INTO `visitors` VALUES ('38', '2', 'news/berita/tentang/', '2017-01-14 18:39:50');
INSERT INTO `visitors` VALUES ('39', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:39:52');
INSERT INTO `visitors` VALUES ('40', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:39:53');
INSERT INTO `visitors` VALUES ('41', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:40:00');
INSERT INTO `visitors` VALUES ('42', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:40:01');
INSERT INTO `visitors` VALUES ('43', '2', 'news/detail/7', '2017-01-14 18:40:13');
INSERT INTO `visitors` VALUES ('44', '2', 'news/detail/7', '2017-01-14 18:40:30');
INSERT INTO `visitors` VALUES ('45', '2', 'news/detail/7', '2017-01-14 18:40:59');
INSERT INTO `visitors` VALUES ('46', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:41:05');
INSERT INTO `visitors` VALUES ('47', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:41:40');
INSERT INTO `visitors` VALUES ('48', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:41:47');
INSERT INTO `visitors` VALUES ('49', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:41:49');
INSERT INTO `visitors` VALUES ('50', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:41:50');
INSERT INTO `visitors` VALUES ('51', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:41:52');
INSERT INTO `visitors` VALUES ('52', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:42:00');
INSERT INTO `visitors` VALUES ('53', '2', 'news/beranda', '2017-01-14 18:42:03');
INSERT INTO `visitors` VALUES ('54', '2', 'news/beranda', '2017-01-14 18:42:42');
INSERT INTO `visitors` VALUES ('55', '2', 'news/beranda', '2017-01-14 18:43:21');
INSERT INTO `visitors` VALUES ('56', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:43:28');
INSERT INTO `visitors` VALUES ('57', '2', 'news/berita/berita_sekolah/', '2017-01-14 18:43:31');
INSERT INTO `visitors` VALUES ('58', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:43:32');
INSERT INTO `visitors` VALUES ('59', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:43:33');
INSERT INTO `visitors` VALUES ('60', '2', 'news/berita/digital_library/', '2017-01-14 18:43:35');
INSERT INTO `visitors` VALUES ('61', '2', 'news/berita/tentang/', '2017-01-14 18:43:36');
INSERT INTO `visitors` VALUES ('62', '2', 'news/berita/pusat_belajar/', '2017-01-14 18:43:37');
INSERT INTO `visitors` VALUES ('63', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:43:38');
INSERT INTO `visitors` VALUES ('64', '2', 'news/berita/berita_kewilayahan/', '2017-01-14 18:46:29');
INSERT INTO `visitors` VALUES ('65', '2', 'news/berita/berita_sekolah/', '2017-01-14 19:23:31');
INSERT INTO `visitors` VALUES ('66', '4', 'news/beranda', '2017-01-15 08:27:03');
INSERT INTO `visitors` VALUES ('67', '4', 'news/beranda', '2017-01-15 08:50:48');
INSERT INTO `visitors` VALUES ('68', '4', 'news/berita/berita_sekolah/', '2017-01-15 08:50:51');
INSERT INTO `visitors` VALUES ('69', '4', 'news/detail/1', '2017-01-15 08:50:52');
INSERT INTO `visitors` VALUES ('70', '4', 'news/berita/tentang/', '2017-01-15 08:50:54');
INSERT INTO `visitors` VALUES ('71', '4', 'news/berita/digital_library/', '2017-01-15 08:50:55');
INSERT INTO `visitors` VALUES ('72', '4', 'news/berita/pusat_belajar/', '2017-01-15 08:52:48');
INSERT INTO `visitors` VALUES ('73', '4', 'news/berita/berita_sekolah/', '2017-01-15 08:52:50');
INSERT INTO `visitors` VALUES ('74', '4', 'news/berita/berita_kewilayahan/', '2017-01-15 08:52:51');
INSERT INTO `visitors` VALUES ('75', '4', 'news/berita/digital_library/', '2017-01-15 08:52:52');
INSERT INTO `visitors` VALUES ('76', '5', 'news/beranda', '2017-01-15 12:03:16');
INSERT INTO `visitors` VALUES ('77', '5', 'news/beranda', '2017-01-15 12:03:24');
INSERT INTO `visitors` VALUES ('78', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:04:46');
INSERT INTO `visitors` VALUES ('79', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:04:47');
INSERT INTO `visitors` VALUES ('80', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:04:53');
INSERT INTO `visitors` VALUES ('81', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:04:58');
INSERT INTO `visitors` VALUES ('82', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:05:15');
INSERT INTO `visitors` VALUES ('83', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:05:22');
INSERT INTO `visitors` VALUES ('84', '5', 'news/berita/berita_kewilayahan/', '2017-01-15 12:06:05');
INSERT INTO `visitors` VALUES ('85', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:06:06');
INSERT INTO `visitors` VALUES ('86', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:06:59');
INSERT INTO `visitors` VALUES ('87', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:07:06');
INSERT INTO `visitors` VALUES ('88', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:07:13');
INSERT INTO `visitors` VALUES ('89', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:07:22');
INSERT INTO `visitors` VALUES ('90', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:07:26');
INSERT INTO `visitors` VALUES ('91', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:07:34');
INSERT INTO `visitors` VALUES ('92', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:07:44');
INSERT INTO `visitors` VALUES ('93', '5', 'news/berita/berita_kewilayahan/', '2017-01-15 12:20:22');
INSERT INTO `visitors` VALUES ('94', '5', 'news/berita/pusat_belajar/', '2017-01-15 12:20:23');
INSERT INTO `visitors` VALUES ('95', '5', 'news/berita/berita_sekolah/', '2017-01-15 12:20:24');
INSERT INTO `visitors` VALUES ('96', '6', 'news/beranda', '2017-01-15 14:27:43');
INSERT INTO `visitors` VALUES ('97', '6', 'news/berita/berita_kewilayahan/', '2017-01-15 14:27:46');
INSERT INTO `visitors` VALUES ('98', '6', 'news/detail/4', '2017-01-15 14:27:47');
INSERT INTO `visitors` VALUES ('99', '6', 'news/berita/berita_sekolah/', '2017-01-15 14:27:49');
INSERT INTO `visitors` VALUES ('100', '6', 'news/berita/berita_sekolah/', '2017-01-15 14:29:03');
INSERT INTO `visitors` VALUES ('101', '6', 'news/berita/berita_sekolah/', '2017-01-15 15:09:15');
INSERT INTO `visitors` VALUES ('102', '7', 'news/beranda', '2017-01-15 17:17:28');
INSERT INTO `visitors` VALUES ('103', '7', 'news/berita/detail/2', '2017-01-15 17:17:34');
INSERT INTO `visitors` VALUES ('104', '7', 'news/berita/detail/2', '2017-01-15 17:17:36');
INSERT INTO `visitors` VALUES ('105', '7', 'news/berita/berita_kewilayahan/', '2017-01-15 17:17:45');
INSERT INTO `visitors` VALUES ('106', '7', 'news/berita/berita_kewilayahan/', '2017-01-15 17:17:46');
INSERT INTO `visitors` VALUES ('107', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:17:48');
INSERT INTO `visitors` VALUES ('108', '7', 'news/detail/3', '2017-01-15 17:17:51');
INSERT INTO `visitors` VALUES ('109', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:17:55');
INSERT INTO `visitors` VALUES ('110', '7', 'news/detail/2', '2017-01-15 17:17:57');
INSERT INTO `visitors` VALUES ('111', '7', 'news/detail/2', '2017-01-15 17:17:59');
INSERT INTO `visitors` VALUES ('112', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:18:09');
INSERT INTO `visitors` VALUES ('113', '7', 'news/detail/3', '2017-01-15 17:18:11');
INSERT INTO `visitors` VALUES ('114', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:18:13');
INSERT INTO `visitors` VALUES ('115', '7', 'news/detail/2', '2017-01-15 17:18:14');
INSERT INTO `visitors` VALUES ('116', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:18:15');
INSERT INTO `visitors` VALUES ('117', '7', 'news/detail/1', '2017-01-15 17:18:16');
INSERT INTO `visitors` VALUES ('118', '7', 'news/detail/1', '2017-01-15 17:18:44');
INSERT INTO `visitors` VALUES ('119', '7', 'news/detail/1', '2017-01-15 17:19:33');
INSERT INTO `visitors` VALUES ('120', '7', 'news/detail/1', '2017-01-15 17:31:46');
INSERT INTO `visitors` VALUES ('121', '7', 'news/detail/1', '2017-01-15 17:36:19');
INSERT INTO `visitors` VALUES ('122', '7', 'news/detail/1', '2017-01-15 17:36:35');
INSERT INTO `visitors` VALUES ('123', '7', 'news/detail/1', '2017-01-15 17:37:32');
INSERT INTO `visitors` VALUES ('124', '7', 'news/detail/1', '2017-01-15 17:39:56');
INSERT INTO `visitors` VALUES ('125', '7', 'news/detail/1', '2017-01-15 17:40:22');
INSERT INTO `visitors` VALUES ('126', '7', 'news/detail/1', '2017-01-15 17:41:32');
INSERT INTO `visitors` VALUES ('127', '7', 'news/beranda', '2017-01-15 17:41:36');
INSERT INTO `visitors` VALUES ('128', '7', 'news/berita/detail/1', '2017-01-15 17:41:42');
INSERT INTO `visitors` VALUES ('129', '7', 'news/berita/detail/1', '2017-01-15 17:41:45');
INSERT INTO `visitors` VALUES ('130', '7', 'news/berita/detail/1', '2017-01-15 17:41:47');
INSERT INTO `visitors` VALUES ('131', '7', 'news/berita/detail/1', '2017-01-15 17:41:47');
INSERT INTO `visitors` VALUES ('132', '7', 'news/berita/detail/1', '2017-01-15 17:41:48');
INSERT INTO `visitors` VALUES ('133', '7', 'news/berita/detail/1', '2017-01-15 17:41:52');
INSERT INTO `visitors` VALUES ('134', '7', 'news/berita/berita_kewilayahan/', '2017-01-15 17:41:53');
INSERT INTO `visitors` VALUES ('135', '7', 'news/detail/5', '2017-01-15 17:41:55');
INSERT INTO `visitors` VALUES ('136', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:41:56');
INSERT INTO `visitors` VALUES ('137', '7', 'news/detail/2', '2017-01-15 17:41:58');
INSERT INTO `visitors` VALUES ('138', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:42:00');
INSERT INTO `visitors` VALUES ('139', '7', 'news/detail/1', '2017-01-15 17:42:01');
INSERT INTO `visitors` VALUES ('140', '7', 'news/berita/tentang/', '2017-01-15 17:42:12');
INSERT INTO `visitors` VALUES ('141', '7', 'news/berita/digital_library/', '2017-01-15 17:42:12');
INSERT INTO `visitors` VALUES ('142', '7', 'news/berita/pusat_belajar/', '2017-01-15 17:42:13');
INSERT INTO `visitors` VALUES ('143', '7', 'news/berita/berita_kewilayahan/', '2017-01-15 17:42:14');
INSERT INTO `visitors` VALUES ('144', '7', 'news/berita/berita_kewilayahan/', '2017-01-15 17:42:15');
INSERT INTO `visitors` VALUES ('145', '7', 'news/berita/berita_sekolah/', '2017-01-15 17:42:17');
INSERT INTO `visitors` VALUES ('146', '7', 'news/detail/2', '2017-01-15 17:42:18');
INSERT INTO `visitors` VALUES ('147', '8', 'news/beranda', '2017-01-16 06:03:10');
INSERT INTO `visitors` VALUES ('148', '8', 'news/berita/detail/1', '2017-01-16 06:03:13');
INSERT INTO `visitors` VALUES ('149', '8', 'news/berita/digital_library/', '2017-01-16 06:03:15');
INSERT INTO `visitors` VALUES ('150', '8', 'news/detail/10', '2017-01-16 06:03:17');
INSERT INTO `visitors` VALUES ('151', '8', 'news/berita/berita_sekolah/', '2017-01-16 06:03:18');
INSERT INTO `visitors` VALUES ('152', '8', 'news/detail/1', '2017-01-16 06:03:19');
INSERT INTO `visitors` VALUES ('153', '8', 'news/beranda', '2017-01-16 06:06:41');
INSERT INTO `visitors` VALUES ('154', '8', 'news/berita/detail/1', '2017-01-16 06:23:35');
INSERT INTO `visitors` VALUES ('155', '8', 'news/beranda', '2017-01-16 06:23:37');
INSERT INTO `visitors` VALUES ('156', '8', 'news/berita/detail/1', '2017-01-16 06:23:38');
INSERT INTO `visitors` VALUES ('157', '8', 'news/beranda', '2017-01-16 06:23:39');
INSERT INTO `visitors` VALUES ('158', '8', 'news/berita/detail/1', '2017-01-16 06:23:41');
INSERT INTO `visitors` VALUES ('159', '8', 'news/beranda', '2017-01-16 06:23:42');
INSERT INTO `visitors` VALUES ('160', '8', 'news/berita/detail/1', '2017-01-16 06:23:52');
INSERT INTO `visitors` VALUES ('161', '8', 'news/berita/berita_sekolah/', '2017-01-16 06:24:30');
INSERT INTO `visitors` VALUES ('162', '8', 'news/detail/1', '2017-01-16 06:24:31');
INSERT INTO `visitors` VALUES ('163', '8', 'news/beranda', '2017-01-16 06:24:34');
INSERT INTO `visitors` VALUES ('164', '8', 'news/berita/berita_sekolah/', '2017-01-16 06:24:41');
INSERT INTO `visitors` VALUES ('165', '8', 'news/beranda', '2017-01-16 06:24:47');
INSERT INTO `visitors` VALUES ('166', '8', 'news/berita/berita_sekolah/', '2017-01-16 06:25:40');
INSERT INTO `visitors` VALUES ('167', '8', 'news/beranda', '2017-01-16 06:25:40');
INSERT INTO `visitors` VALUES ('168', '8', 'news/beranda', '2017-01-16 06:25:41');
INSERT INTO `visitors` VALUES ('169', '9', 'news/beranda', '2017-01-16 09:52:34');
INSERT INTO `visitors` VALUES ('170', '9', 'news/berita/pusat_belajar/', '2017-01-16 09:52:36');
INSERT INTO `visitors` VALUES ('171', '9', 'news/detail/7', '2017-01-16 09:52:47');
INSERT INTO `visitors` VALUES ('172', '9', 'news/berita/pusat_belajar/', '2017-01-16 09:52:50');
INSERT INTO `visitors` VALUES ('173', '9', 'news/beranda', '2017-01-16 09:52:52');
INSERT INTO `visitors` VALUES ('174', '9', 'news/berita/pusat_belajar/', '2017-01-16 09:52:54');
INSERT INTO `visitors` VALUES ('175', '9', 'news/berita/digital_library/', '2017-01-16 09:52:59');
INSERT INTO `visitors` VALUES ('176', '9', 'news/berita/berita_kewilayahan/', '2017-01-16 09:53:00');
INSERT INTO `visitors` VALUES ('177', '9', 'news/berita/berita_sekolah/', '2017-01-16 09:53:01');
INSERT INTO `visitors` VALUES ('178', '9', 'news/berita/berita_kewilayahan/', '2017-01-16 09:53:02');
INSERT INTO `visitors` VALUES ('179', '9', 'news/berita/pusat_belajar/', '2017-01-16 09:53:03');
INSERT INTO `visitors` VALUES ('180', '9', 'news/detail/8', '2017-01-16 09:53:06');
INSERT INTO `visitors` VALUES ('181', '9', 'news/berita/pusat_belajar/', '2017-01-16 09:53:52');
INSERT INTO `visitors` VALUES ('182', '9', 'news/beranda', '2017-01-16 10:04:41');
INSERT INTO `visitors` VALUES ('183', '9', 'news/berita/tentang/', '2017-01-16 10:41:15');
INSERT INTO `visitors` VALUES ('184', '9', 'news/berita/berita_sekolah/', '2017-01-16 10:41:16');
INSERT INTO `visitors` VALUES ('185', '9', 'news/beranda', '2017-01-16 10:41:17');
INSERT INTO `visitors` VALUES ('186', '10', 'news/beranda', '2017-01-17 15:42:30');
INSERT INTO `visitors` VALUES ('187', '10', 'news/detail/1', '2017-01-17 15:42:39');

-- ----------------------------
-- View structure for statistik_month
-- ----------------------------
DROP VIEW IF EXISTS `statistik_month`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `statistik_month` AS select count(id) as jumlah,date(created) as tanggal,DAY(created) as tgl
from visitors
where year(created) = year(NOW()) and month(created) = month(NOW())
group by date(visitors.created) 
order by tanggal asc ;

-- ----------------------------
-- View structure for statistik_month_menu
-- ----------------------------
DROP VIEW IF EXISTS `statistik_month_menu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `statistik_month_menu` AS select navigations.link,count(visitors.id) as jumlah
from navigations
LEFT JOIN visitors on visitors.link like concat("%",navigations.link,"%")
where year(visitors.created) = year(now()) and month(visitors.created) = month(now()) 
group by navigations.link ;

-- ----------------------------
-- View structure for statistik_register
-- ----------------------------
DROP VIEW IF EXISTS `statistik_register`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `statistik_register` AS select count(guests.id) as jumlah,year(guests.created) as tahun,month(guests.created) as bulan
from guests
group by year(guests.created),month(guests.created) ;

-- ----------------------------
-- View structure for statistik_year
-- ----------------------------
DROP VIEW IF EXISTS `statistik_year`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `statistik_year` AS /*
select navigations.link,count(visitors.id) as jumlah,year(visitors.created) as tahun,month(visitors.created) as bulan
from navigations
LEFT JOIN visitors on visitors.link like concat("%",navigations.link,"%")
group by navigations.link,year(visitors.created),month(visitors.created) 
*/
select count(id) as jumlah,year(created) as tahun,month(created) as bulan
from visitors 
where year(created) = year(now())
group by year(visitors.created),month(visitors.created) ;

-- ----------------------------
-- View structure for top_v_news
-- ----------------------------
DROP VIEW IF EXISTS `top_v_news`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `top_v_news` AS select navigations.`name`,navigations.link,news.*,DATE_FORMAT(news.created,"%e, %b %Y %T") as created_format,concat('assets/news/',news.id,'.jpg') as image,count(visitors.id) as views
from news
left join navigations on navigations.id = news.id_nvigation 
left join visitors on visitors.link = CONCAT("news/detail/",news.id)
group by news.id
order by views desc ;

-- ----------------------------
-- View structure for v_navigations
-- ----------------------------
DROP VIEW IF EXISTS `v_navigations`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_navigations` AS select navigations.id,navigations.name,navigations.link,navigations.icon,navigations.type
from navigations 
order by sort_number asc ;

-- ----------------------------
-- View structure for v_news
-- ----------------------------
DROP VIEW IF EXISTS `v_news`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_news` AS select navigations.`name`,navigations.link,news.*,DATE_FORMAT(news.created,"%e, %b %Y %T") as created_format,concat('assets/news/',news.id,'.jpg') as image 
from news
left join navigations on navigations.id = news.id_nvigation 
order by news.created desc ;
