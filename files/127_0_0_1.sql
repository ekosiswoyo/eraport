-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 10:01 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdcol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);
--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'siakadfull', 'rb_siswa', 'nama', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"siakadfull","table":"rb_guru"},{"db":"siakadfull","table":"rb_users"},{"db":"siakadfull","table":"rb_siswa"},{"db":"siakadfull","table":"rb_jadwal_pelajaran"},{"db":"siakadfull","table":"rb_mata_pelajaran"},{"db":"siakadfull","table":"rb_kelompok_mata_pelajaran"},{"db":"siakadfull","table":"rb_kelas"},{"db":"phpmyadmin","table":"pma_column_info"},{"db":"phpmyadmin","table":"pma_designer_coords"},{"db":"phpmyadmin","table":"pma_history"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-08-11 20:37:45', '{"collation_connection":"utf8mb4_general_ci"}');
--
-- Database: `siakadfull`
--

-- --------------------------------------------------------

--
-- Table structure for table `rb_catatan`
--

CREATE TABLE IF NOT EXISTS `rb_catatan` (
  `id_catatan` int(3) NOT NULL AUTO_INCREMENT,
  `nis` varchar(18) DEFAULT NULL,
  `kode_kelas` varchar(6) DEFAULT NULL,
  `catatan` text,
  PRIMARY KEY (`id_catatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rb_catatan`
--

INSERT INTO `rb_catatan` (`id_catatan`, `nis`, `kode_kelas`, `catatan`) VALUES
(2, '4443', 'VII1', '2'),
(3, '0050855185', 'VIIC', 'harus tingkatkan'),
(4, '00508232739', 'VIIA', 'Selalu berusaha memahami tata tertib sekolah dan bersikap jujur. diharapkan dapat meningkatkan komitmennya supaya lebih serius  saat mengerjakan tugas'),
(5, '0050835524', 'VIIA', 'Selalu berusaha menjalankan tata tertib sekolah dan selalu berusaha mandiri. diharapkan agar lebih ditingkatkan kembali'),
(6, '0050857908', 'VIIA', 'Selalu berusaha tepat waktu dalam mengerjakan tugas'),
(7, '7562', 'K-VIIA', 'baik'),
(8, '1278', 'K-VIIA', 'selalu berusaha untuk mematuhi peraturan sekolah'),
(9, '7552', 'K-VIIA', 'selalu berusaha taat kepada guru'),
(10, '7562', 'K-VIIA', 'selalu berusaha tepat waktu'),
(12, '7890', 'K-VIID', 'memiliki sikap yang baik, namun tingkatka kembali belajarnya');

-- --------------------------------------------------------

--
-- Table structure for table `rb_guru`
--

CREATE TABLE IF NOT EXISTS `rb_guru` (
  `nip` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_jalan` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_pernikahan` varchar(15) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_guru`
--

INSERT INTO `rb_guru` (`nip`, `password`, `kode_kelas`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat_jalan`, `hp`, `email`, `status_pernikahan`) VALUES
('197912022008011019', 'admin', 'K-VIIA', 'Andi Haryono, S.Pd.I.', '0', 'pekalongan', '1920-08-14', '0', 'kajen', '081533312213', 'Andiharyono@gmail.co', '0'),
('197211111997022001', 'admin', '0', 'Tri elyawati, S.Pd', 'Perempuan', 'Pemalang', '1978-05-21', 'Islam', 'Sanganjaya,kajen', '085256932192', 'Trielyawati@gmail.co', 'Menikah'),
('197603262007012008', 'admin', 'K-VIIB', 'Dyah Hendarti, S.Pd', 'Perempuan', 'pkl', '1979-03-15', '0', 'kesesi, kajen', '085642778856', 'dyahhendar@gmail.com', 'Menikah'),
('197608312008012003', 'admin', 'K-VIIC', 'Tri Puji Astuti, S.Pd', 'Perempuan', 'pekalongan', '1975-02-16', 'Islam', 'karanganyar', '082134567654', 'TripujiA@gmail.co', 'Menikah'),
('197005192008012007', 'admin', 'K-VIID', 'Cadaryanti', '0', 'semarang', '1988-07-21', '0', 'kajen', '085211292231', 'cadaryanti@gmail.com', 'Menikah'),
('19650117', 'admin', '0', 'Drs. Bambang ', 'Laki-Laki', 'Pekalongan', '1972-05-27', 'Islam', 'karanganyar', '082264585049', 'bambang@gmail.com', 'Menikah'),
('197106081997022001', 'admin', '0', 'Indah Avrianna, S.Pd', 'Perempuan', 'Pekalongan', '1983-04-22', 'Islam', 'sumurjomblang bogo-bojong', '085216042104', 'indahavrianna12@gmai', 'Menikah'),
('19631006', 'admin', '0', 'Masithoh, S.Pd', 'Laki-Laki', 'Semarang', '1979-07-01', 'Islam', 'gejlik/kajen', '082346082065', 'Masithoh@gmail.com', 'Menikah'),
('19650406', 'admin', '0', 'Dra. Rusmiyati', 'Perempuan', 'Pekalongan', '1970-05-21', 'Islam', 'bojong kidul/bojong', '085210686635', 'rusmiyati@gmail.com', 'Menikah'),
('196909261994122001', 'admin', '0', 'Musyarofah, S.pd.Ing', 'Perempuan', 'Semarang', '1983-07-19', 'Islam', 'karanggondang/karanganyar', '082317332512', 'musyarofah12@gmail.c', 'Menikah'),
('19600616', 'admin', '0', 'Mustahid, S.Pd.I', 'Laki-Laki', 'Pekalongan', '1979-04-20', 'Islam', 'gandarum/kajen', '082346572394', 'mustahid20@gmail.com', 'Menikah'),
('19600629', 'admin', '0', 'Drs. Budi Supono', 'Laki-Laki', 'Pekalongan', '1974-09-11', 'Islam', 'gandarum/kajen', '085217224100', 'budisupono@gmail.com', 'Menikah'),
('196540406198901100', 'admin', '0', 'Slamet riyadi, S.Pd', 'Laki-Laki', 'Pekalongan', '1977-03-21', 'Islam', 'ds jagung,kajen', '085314152644', 'slametri@gmail.com', 'Menikah'),
('19630910', 'admin', '0', 'Moh. Irfani, S.Pd', 'Laki-Laki', 'Surabaya', '1986-07-05', 'Islam', 'rowolaku/kajen', '085215585780', 'irfani05@gmail.com', 'Menikah'),
('196606221998022001', 'admin', '0', 'Dra. Titik Sugiarti, M.Pd', 'Perempuan', 'Semarang', '1973-03-15', 'Islam', 'gandarum/kajen', '088227879864', 'titiksugiarti@gmail.', 'Menikah'),
('098765432345678987', 'admin', '0', 'nur hasanah', 'Perempuan', 'pkl', '0000-00-00', 'Islam', 'kajen', '08765432345', 'nur@gmail.com', 'Belum Menikah'),
('098765432345678901', 'admin', '0', 'Tri endang, S.pd', 'Laki-Laki', 'Pekalongan', '0000-00-00', 'Islam', 'kajen', '085345765432', 'triendang@gmail.com', 'Menikah'),
('', '', '0', '', '0', 'gu', '2019-08-02', 'Katolik', '', '', '', '0'),
('087654323456789876', 'admin', '0', 'Aisyah nur, S.pd', 'Perempuan', 'Pekalongan', '1989-01-25', 'Islam', 'kajen', '085875432312', 'aisyahnur@gmail.com', 'Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `rb_jadwal_pelajaran`
--

CREATE TABLE IF NOT EXISTS `rb_jadwal_pelajaran` (
  `kodejdwl` int(10) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(5) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `kode_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `hari` varchar(20) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  PRIMARY KEY (`kodejdwl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `rb_jadwal_pelajaran`
--

INSERT INTO `rb_jadwal_pelajaran` (`kodejdwl`, `id_tahun_akademik`, `kode_kelas`, `kode_pelajaran`, `nip`, `jam_mulai`, `jam_selesai`, `hari`, `aktif`) VALUES
(9, 2019, 'K-VIIA', 'P02', '1112222', '12:15:58', '12:15:58', 'Rabu', 'Ya'),
(10, 2019, 'K-VIIC', '0', '567890', '13:16:48', '13:16:48', 'Jumat', 'Ya'),
(11, 2019, 'K-VIIC', 'B01', '567890', '13:18:35', '13:18:35', 'Sabtu', 'Ya'),
(12, 2019, 'K-VIIB', 'P06', '12367', '13:53:04', '13:53:04', 'Kamis', 'Ya'),
(13, 2019, 'K-VIID', 'P07', '19710608', '23:54:51', '23:54:51', 'Rabu', 'Ya'),
(14, 2019, 'K-VIIA', 'A01', '19600616', '07:30:00', '08:05:00', 'Senin', 'Ya'),
(15, 2019, 'K-VIIA', 'A02', '19700519', '08:05:00', '08:40:00', 'Senin', 'Ya'),
(16, 2019, 'K-VIIA', 'A03', '19660622', '07:30:00', '08:05:00', 'Selasa', 'Ya'),
(17, 2019, 'K-VIIA', 'A04', '19630910', '08:40:00', '09:50:00', 'Selasa', 'Ya'),
(19, 2019, 'K-VIIA', 'A06', '19630215', '07:30:00', '09:15:00', 'Rabu', 'Ya'),
(20, 2019, 'K-VIIA', 'A07', '19690926', '09:15:00', '10:30:00', 'Rabu', 'Ya'),
(21, 2019, 'K-VIID', 'A03', '19700519', '10:25:08', '10:25:08', 'Rabu', 'Ya'),
(22, 2019, 'K-VIIA', 'A04', '19630910', '07:30:00', '08:40:00', 'Kamis', 'Ya'),
(23, 2019, 'K-VIIA', 'A05', '19650406', '08:40:00', '09:15:00', 'Kamis', 'Ya'),
(24, 2019, 'K-VIIA', 'A03', '19660622', '10:30:00', '11:05:00', 'Kamis', 'Ya'),
(26, 2019, 'K-VIIA', 'A03', '19660622', '11:40:00', '12:15:00', 'Kamis', 'Ya'),
(29, 2019, 'K-VIIC', 'A03', '19660622', '08:05:00', '08:40:00', 'Senin', 'Ya'),
(30, 2019, 'K-VIIA', 'A03', '19660622', '08:40:00', '09:15:00', 'Senin', 'Ya'),
(33, 2019, 'K-VIIA', 'A04', '19630910', '10:30:00', '11:05:00', 'Senin', 'Ya'),
(34, 2019, 'K-VIIA', 'A07', '197912022008011019', '13:22:04', '13:22:04', 'Kamis', 'Ya'),
(36, 2019, 'K-VIIB', 'A02', '19630910', '13:23:25', '13:23:25', 'Sabtu', 'Ya'),
(37, 19, 'K-VIIA', 'B01', '19600616', '12:18:00', '13:18:00', 'Senin', 'Ya'),
(38, 19, 'K-VIIA', 'B02', '19630910', '10:19:00', '11:25:00', 'Senin', 'Ya'),
(39, 19, 'K-VIIA', 'B03', '197912022008011019', '09:20:00', '10:20:00', 'Selasa', 'Ya'),
(40, 19, 'K-VIIA', 'C01', '19650406', '10:20:00', '11:00:00', 'Selasa', 'Ya'),
(41, 0, 'K-VIIA', 'C02', '19650117', '09:00:00', '10:10:00', 'Rabu', 'Ya'),
(42, 19, 'K-VIIA', 'C02', '19650117', '08:25:00', '09:25:00', 'Rabu', 'Ya'),
(43, 19, 'K-VIIF', 'B08', '087654323456789876', '09:45:00', '10:35:00', 'Rabu', 'Ya'),
(44, 19, 'K-VIID', 'B08', '087654323456789876', '03:18:42', '03:18:42', 'Kamis', 'Ya'),
(45, 2019, 'K-VIIA', 'B01', '19600616', '09:27:00', '10:27:00', 'Senin', 'Ya'),
(46, 2019, 'K-VIIA', 'B02', '19630910', '10:27:00', '11:45:00', 'Senin', 'Ya'),
(47, 2019, 'K-VIIA', 'B03', '197005192008012007', '08:00:00', '09:29:00', 'Selasa', 'Ya'),
(48, 2019, 'K-VIIA', 'B08', '087654323456789876', '09:28:00', '10:55:00', 'Selasa', 'Ya'),
(49, 2019, 'K-VIIA', 'B05', '19650406', '09:39:06', '09:39:06', 'Rabu', 'Ya'),
(50, 2019, 'K-VIIA', 'B06', '196606221998022001', '09:40:03', '09:40:03', 'Kamis', 'Ya'),
(51, 2019, 'K-VIIA', 'B07', '197912022008011019', '09:40:41', '09:40:41', 'Kamis', 'Ya'),
(52, 2019, 'K-VIIA', 'C01', '197106081997022001', '09:41:11', '09:41:11', 'Kamis', 'Ya'),
(53, 2019, 'K-VIIA', 'C02', '19650117', '09:25:00', '10:45:00', 'Jumat', 'Ya'),
(54, 2019, 'K-VIIB', 'B01', '19600616', '08:00:00', '09:43:00', 'Senin', 'Ya'),
(55, 2019, 'K-VIIB', 'B02', '19630910', '09:05:00', '10:25:00', 'Selasa', 'Ya'),
(56, 2019, 'K-VIIB', 'B03', '197005192008012007', '09:46:00', '09:46:00', 'Senin', 'Ya'),
(57, 2019, 'K-VIIB', 'B08', '087654323456789876', '10:25:00', '11:45:00', 'Selasa', 'Ya'),
(58, 2019, 'K-VIIB', 'B05', '19650406', '08:00:00', '09:48:00', 'Kamis', 'Ya'),
(59, 2019, 'K-VIIB', 'B07', '197912022008011019', '09:50:09', '11:30:00', 'Rabu', 'Ya'),
(60, 2019, 'K-VIIB', 'B06', '196606221998022001', '10:30:00', '12:00:00', 'Rabu', 'Ya'),
(61, 2019, 'K-VIIB', 'C01', '197106081997022001', '09:52:31', '09:52:31', 'Jumat', 'Ya'),
(62, 2019, 'K-VIIB', 'C02', '19650117', '10:48:00', '12:00:00', 'Kamis', 'Ya'),
(63, 2019, 'K-VIIC', 'B07', '197912022008011019', '08:00:00', '09:56:00', 'Senin', 'Ya'),
(72, 2019, 'K-VIIC', 'B01', '19600616', '10:49:24', '10:49:24', 'Rabu', 'Ya'),
(65, 2019, 'K-VIIC', 'B05', '19650406', '09:00:00', '10:30:00', 'Senin', 'Ya'),
(66, 2019, 'K-VIIC', 'B03', '197005192008012007', '08:00:00', '09:20:00', 'Selasa', 'Ya'),
(67, 2019, 'K-VIIC', 'B02', '19630910', '10:41:45', '10:41:45', 'Rabu', 'Ya'),
(68, 2019, 'K-VIIC', 'B08', '087654323456789876', '10:45:28', '10:45:28', 'Selasa', 'Ya'),
(69, 2019, 'K-VIIC', 'B06', '196606221998022001', '10:45:53', '10:45:53', 'Kamis', 'Ya'),
(70, 2019, 'K-VIIC', 'C01', '197106081997022001', '09:50:00', '11:46:00', 'Kamis', 'Ya'),
(71, 0, 'K-VIIC', 'C02', '19650117', '09:00:00', '10:15:00', 'Jumat', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kehadiran`
--

CREATE TABLE IF NOT EXISTS `rb_kehadiran` (
  `id_kehadiran` int(3) NOT NULL AUTO_INCREMENT,
  `nis` varchar(4) DEFAULT NULL,
  `kode_kelas` varchar(6) DEFAULT NULL,
  `sakit` int(3) DEFAULT NULL,
  `izin` int(3) DEFAULT NULL,
  `alpha` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rb_kehadiran`
--

INSERT INTO `rb_kehadiran` (`id_kehadiran`, `nis`, `kode_kelas`, `sakit`, `izin`, `alpha`) VALUES
(2, '4443', 'VII1', 3, 4, 5),
(3, '0050', 'VIIC', 1, 2, 0),
(4, '0050', 'VIIC', 0, 1, 1),
(5, '0050', 'VIIA', 1, 0, 0),
(6, '0050', 'VIIA', 0, 1, 0),
(7, '0050', 'VIIA', 0, 0, 0),
(8, '7562', 'K-VIIA', 1, 3, 0),
(9, '1278', 'K-VIIA', 0, 2, 0),
(10, '7552', 'K-VIIA', 1, 0, 1),
(11, '7658', 'K-VIIA', 0, 2, 1),
(12, '7890', 'K-VIID', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rb_kelas`
--

CREATE TABLE IF NOT EXISTS `rb_kelas` (
  `kode_kelas` varchar(6) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kelas`
--

INSERT INTO `rb_kelas` (`kode_kelas`, `nip`, `nama_kelas`, `aktif`) VALUES
('K-VIIB', '197603262007012008', ' VIIB', 'Ya'),
('K-VIIA', '197912022008011019', 'VIIA', 'Ya'),
('K-VIIC', '197608312008012003', 'VIIC', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kelompok_mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `rb_kelompok_mata_pelajaran` (
  `id_kelompok_mata_pelajaran` int(5) NOT NULL AUTO_INCREMENT,
  `jenis_kelompok_mata_pelajaran` varchar(2) NOT NULL,
  `nama_kelompok_mata_pelajaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelompok_mata_pelajaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `rb_kelompok_mata_pelajaran`
--

INSERT INTO `rb_kelompok_mata_pelajaran` (`id_kelompok_mata_pelajaran`, `jenis_kelompok_mata_pelajaran`, `nama_kelompok_mata_pelajaran`) VALUES
(2, 'B', 'Kelompok A (PENGETAHUAN)'),
(6, 'C', 'Kelompok B (KETERAMPILAN)');

-- --------------------------------------------------------

--
-- Table structure for table `rb_mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `rb_mata_pelajaran` (
  `kode_pelajaran` varchar(3) NOT NULL,
  `id_kelompok_mata_pelajaran` int(3) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `namamatapelajaran` varchar(40) NOT NULL,
  `kompetensi_umum` text NOT NULL,
  `kompetensi_khusus` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  PRIMARY KEY (`kode_pelajaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_mata_pelajaran`
--

INSERT INTO `rb_mata_pelajaran` (`kode_pelajaran`, `id_kelompok_mata_pelajaran`, `nip`, `namamatapelajaran`, `kompetensi_umum`, `kompetensi_khusus`, `aktif`) VALUES
('B01', 2, '19600616', 'Pendidikan Agama dan Budi Pekerti', '', '', 'Ya'),
('B02', 0, '19630910', 'Pendidikan Pancasila dan Kewarganegaraan', '', '', 'Ya'),
('B03', 2, '0', 'Bahasa Indonesia', '', '', 'Ya'),
('B08', 2, '087654323456789876', 'Matematika', '1.2 mengetahui perhitungan', '1.2 siswa mampu dalam perhitungan algoritma', 'Ya'),
('B05', 2, '19650406', 'Ilmu Pengetahuan Alam', '', '', 'Ya'),
('B06', 2, '19630215', 'Ilmu Pengetahuan Sosial', '', '', 'Ya'),
('B07', 2, '197912022008011019', 'Bahasa Inggris', '', '', 'Ya'),
('C01', 6, '0', 'Seni Budaya ', '', '', 'Ya'),
('C02', 6, '19650117', 'Pendidikan jasmani, olahraga dan kesehat', '', '', 'Ya'),
('C03', 6, '19631006', 'Prakarya', '', '', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_extrakulikuler`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_extrakulikuler` (
  `id_nilai_extrakulikuler` int(3) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(4) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `kegiatan` text NOT NULL,
  `nilai` char(3) NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_extrakulikuler`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `rb_nilai_extrakulikuler`
--

INSERT INTO `rb_nilai_extrakulikuler` (`id_nilai_extrakulikuler`, `id_tahun_akademik`, `nis`, `kode_kelas`, `kegiatan`, `nilai`, `deskripsi`, `user_akses`, `waktu_input`) VALUES
(1, 20161, '9991', 'X.MIPA', 'Kegiatan Mandi-mandii', '87', 'Kegiatan mandi-mandi dilaksanakan di lubuak minturun bersamaan dengan perayaan ulang tahun sekolah.', '1', '2016-04-29 10:11:10'),
(2, 20161, '9991', 'X.MIPA', 'Kegiatan Bakar ayam.', '95', 'Memiliki keterampilan Mengidentifikasi, menyajikan model matematika dan menyelesaikan masalah keseharian.				', '1', '2016-04-29 07:08:28'),
(7, 2019, '1234', 'VII1', 'dsa', '56', 'vd', '2', '2019-06-09 11:19:51'),
(8, 2019, '1234', 'VII1', 'dsa', '56', 'vd', '2', '2019-06-09 11:30:28'),
(9, 2019, '8889', 'VIIA', 'voli', '75', 'oke aja', '123321', '2019-07-07 12:26:27'),
(10, 2019, '0050', 'VIIC', 'pramuka', '75', 'iya', '567890', '2019-07-07 13:24:10'),
(11, 2019, '0050', 'VIIC', '', '0', '', '567890', '2019-07-07 13:24:11'),
(12, 2019, '8889', 'VIIA', 'sad', 'A', 'df', '567890', '2019-07-07 14:25:52'),
(13, 2019, '0050', 'VIIA', 'Pramuka', 'B', 'aktif dalam kepramukaan', '19690926', '2019-07-09 06:16:10'),
(14, 2019, '0050', 'VIIA', '', '', '', '19690926', '2019-07-09 06:16:12'),
(15, 2019, '0050', 'VIIA', 'PMR', 'B', 'Memiliki pemahaman dasar ', '19690926', '2019-07-09 06:16:43'),
(16, 2019, '7551', 'K-VIIA', 'Pramuka', 'B', '', '19600616', '2019-07-15 20:55:13'),
(21, 2019, '1278', 'K-VIIA', 'vokal', 'B', 'Baik dalam berlatih', '087654323456789876', '2019-08-07 11:40:41'),
(19, 18, '7658', 'K-VIIA', 'Pramuka', 'B', 'Kemampuan baik dalam mengikut kegiatan', '19650117', '2019-07-29 02:41:01'),
(20, 18, '7890', 'K-VIID', 'pramuka', 'B', 'baik dalam mengikuti kegiatan', '087654323456789876', '2019-07-31 03:29:13'),
(22, 2019, '7553', 'K-VIIB', 'Vokal', 'B', 'Baik dalam berlatih', '087654323456789876', '2019-08-07 11:41:13'),
(23, 2019, '7555', 'K-VIIC', 'Vokal', 'B', 'Baik dalam berlatih', '087654323456789876', '2019-08-07 11:41:31'),
(24, 2019, '1278', 'K-VIIA', 'pramuka', 'B', 'selalu berangkat pramuka dan taat', '19650117', '2019-08-08 15:37:29'),
(25, 2019, '7552', 'K-VIIA', 'pramuka', 'B', 'selalu berangkat pramuka dan taat', '19650117', '2019-08-08 15:37:48'),
(26, 2019, '7551', 'K-VIIB', 'pramuka', 'B', 'selalu berangkat pramuka dan taat', '19650117', '2019-08-08 15:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_keterampilan`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_keterampilan` (
  `id_nilai_keterampilan` int(3) NOT NULL AUTO_INCREMENT,
  `kodejdwl` int(3) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `kd` varchar(5) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `nilai5` float NOT NULL,
  `nilai6` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_keterampilan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `rb_nilai_keterampilan`
--

INSERT INTO `rb_nilai_keterampilan` (`id_nilai_keterampilan`, `kodejdwl`, `nis`, `kd`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`, `deskripsi`, `user_akses`, `waktu`) VALUES
(1, 5, '9991', '4.1', 75, 70, 78, 85, 0, 0, 'Mengabstraksi teks cerita pendek, baik secara lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(10, 5, '9991', '4.3', 89, 89, 98, 95, 0, 0, 'Mengabstraksi teks pantun, baik secara lisan maupun tulisan', '1', '2016-04-14 08:03:57'),
(13, 5, '9991', '4.4', 90, 89, 87, 90, 0, 0, 'Menginterpretasi makna teks pantun, baik secara lisan maupun tulisan ', '1', '2016-04-14 08:04:20'),
(15, 5, '9991', '4.5', 99, 87, 98, 95, 0, 0, 'Menyunting teks cerita ulang, sesuai dengan struktur dan kaidah teks baik secara lisan maupun tulisan', '1', '2016-04-14 08:04:36'),
(21, 20, '0050', '1.1', 78, 80, 75, 77, 0, 0, 'memiliki keterampilan baik dalam menyusun teks', '19690926', '2019-07-09 06:09:18'),
(22, 20, '0050', '1.1', 80, 79, 77, 81, 0, 0, 'Memiliki keterampilan baik dalam menyusun teks', '19690926', '2019-07-09 06:10:37'),
(23, 20, '0050', '100', 80, 85, 83, 85, 0, 0, 'Memiliki keterampilan  baik dalam menyusun teks', '19690926', '2019-07-09 06:11:11'),
(27, 44, '7890', '1.2', 79, 81, 84, 80, 89, 92, 'sangat baik dalam keterampilan ', '087654323456789876', '2019-07-31 03:28:40'),
(28, 37, '1278', 'K-3', 80, 83, 80, 79, 83, 85, 'Memiliki Keterampilan baik dalam mempraktikkan wudhu sesuai ketentuan', '19600616', '2019-08-06 17:18:56'),
(29, 37, '7552', 'K-3', 79, 80, 82, 81, 88, 80, 'Memiliki keterampilan baik dalam mempraktikan solat ', '19600616', '2019-08-06 17:20:47'),
(30, 37, '7562', 'K-3', 85, 84, 89, 81, 82, 89, 'Memiliki keterampilan baik dalam mempraktikan solat berjamaah', '19600616', '2019-08-06 17:22:06'),
(31, 14, '1278', 'K-3', 78, 89, 76, 67, 89, 76, 'mjkjsl', '19600616', '2019-08-07 08:52:18'),
(32, 48, '1278', 'K-1', 89, 80, 76, 75, 80, 82, 'Memiliki keterampilan baik dalam menentukan hasil', '087654323456789876', '2019-08-07 11:17:07'),
(33, 48, '7552', 'K-1', 80, 75, 79, 81, 84, 87, 'Memiliki keterampilan baik dalam menentukan pengoperasian', '087654323456789876', '2019-08-07 11:18:08'),
(34, 48, '7562', 'K-1', 85, 88, 87, 86, 89, 93, 'Memiliki keterampilan sangat baik dalam menyelesaikan macam-macam himpunan', '087654323456789876', '2019-08-07 11:19:43'),
(35, 68, '7555', 'K-1', 80, 79, 81, 81, 83, 85, 'Memiliki keterampilan baik dalam menentukan pengoperasian', '087654323456789876', '2019-08-07 11:26:49'),
(36, 68, '7556', 'K-1', 75, 79, 78, 80, 81, 79, 'Memiliki keterampilan cukup baik dalam menentukan hasil', '087654323456789876', '2019-08-07 11:30:51'),
(37, 57, '7551', 'K-1', 81, 79, 85, 83, 80, 89, 'Memiliki keterampilan baik dalam menentukan pengoperasian', '087654323456789876', '2019-08-07 11:33:39'),
(38, 57, '7553', 'K-1', 80, 82, 85, 81, 85, 88, 'Memiliki keterampilan baik dalam menentukan hasil', '087654323456789876', '2019-08-07 11:34:41'),
(39, 50, '1278', 'K-2', 80, 86, 79, 81, 88, 82, 'Memiliki keterampilan dalam membuat tabel', '196606221998022001', '2019-08-07 11:48:09'),
(40, 50, '7552', 'K-2', 80, 78, 79, 79, 80, 81, 'Memiliki keterampilan baik dalam membuat peta', '196606221998022001', '2019-08-07 11:49:34'),
(41, 50, '7562', 'K-2', 79, 78, 80, 81, 77, 79, 'Memiliki keterampilan cukup baik dalam membuat peta', '196606221998022001', '2019-08-07 11:50:50'),
(42, 60, '7551', 'K-2', 80, 79, 79, 81, 82, 79, 'Memiliki keterampilan cukup baik dalam membuat peta', '196606221998022001', '2019-08-07 11:53:42'),
(43, 60, '7553', 'K-2', 79, 80, 81, 78, 85, 81, 'Memiliki keterampilan baik dalam membuat peta', '196606221998022001', '2019-08-07 11:54:59'),
(44, 69, '7555', 'K-2', 80, 81, 79, 82, 80, 81, 'Memiliki keterampilan baik dalam membuat peta', '196606221998022001', '2019-08-07 11:58:28'),
(45, 69, '7556', 'K-2', 79, 74, 81, 82, 79, 82, 'Memiliki keterampilan cukup baik dalam membuat peta', '196606221998022001', '2019-08-07 11:59:06'),
(46, 45, '1278', 'K-1', 80, 81, 75, 71, 80, 82, 'Memiliki keterampilan dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:16:04'),
(47, 45, '7552', 'K-1', 80, 79, 79, 78, 81, 80, 'Memiliki keterampilan dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:17:25'),
(48, 45, '7562', 'K-1', 81, 78, 79, 80, 81, 79, 'Memiliki keterampilan dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:18:07'),
(49, 54, '7551', 'K-1', 80, 81, 76, 75, 80, 79, 'Memiliki keterampilan cukup baik dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:23:30'),
(50, 54, '7553', 'K-1', 80, 82, 81, 85, 80, 87, 'Memiliki keterampilan baik dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:24:27'),
(51, 72, '7555', 'K-1', 79, 78, 80, 84, 86, 87, 'Memiliki keterampilan dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:25:32'),
(52, 72, '7556', 'K-1', 81, 82, 81, 70, 87, 89, 'Memiliki keterampilan dalam mempraktikkan wudhu', '19600616', '2019-08-07 12:26:19'),
(53, 46, '1278', 'K-1', 79, 89, 80, 77, 80, 78, 'Memiliki keterampilan baik dalam perumusan', '19630910', '2019-08-07 13:42:11'),
(54, 46, '7552', 'K-1', 80, 79, 82, 76, 80, 82, 'Memiliki keterampilan baik dalam perumusan', '19630910', '2019-08-07 13:53:35'),
(55, 55, '7551', 'K-1', 80, 81, 78, 79, 80, 82, 'Memiliki keterampilan baik dalam perumusan', '19630910', '2019-08-07 14:10:31'),
(56, 67, '7555', 'K-1', 76, 81, 71, 79, 80, 81, 'Memiliki keterampilan baik dalam perumusan', '19630910', '2019-08-07 14:20:53'),
(57, 49, '1278', 'K-1', 79, 80, 83, 81, 87, 90, 'Memiliki keterampilan biak dalam melakukan percobaan suhu benda', '19650406', '2019-08-07 14:26:53'),
(58, 58, '7551', 'K-1', 80, 81, 79, 79, 80, 83, 'Memiliki keterampilan baik dalam melakukan percobaan membuat  tempe dan tape', '19650406', '2019-08-07 14:31:51'),
(59, 65, '7555', 'K-1', 79, 83, 78, 88, 89, 93, 'Memiliki keterampilan sangat baik untuk mengetahui suhu benda', '19650406', '2019-08-07 14:34:15'),
(60, 52, '1278', 'K-1', 80, 76, 81, 79, 82, 85, 'Memiliki keterampilan baik dalam bernyanyi', '197106081997022001', '2019-08-07 14:42:32'),
(61, 61, '7551', 'K-1', 80, 76, 79, 81, 82, 81, 'Memiliki keterampilan baik dalam memainkan alat musik', '197106081997022001', '2019-08-07 14:45:24'),
(62, 70, '7555', 'K-1', 75, 80, 80, 82, 82, 87, 'Memiliki keterampilan baik dalam bernyanyi', '197106081997022001', '2019-08-07 14:47:32'),
(63, 47, '1278', 'K-1', 79, 80, 74, 79, 80, 81, 'Memiliki keterampilan baik dalam merangkum hasil laporan   ', '197005192008012007', '2019-08-08 15:12:14'),
(64, 66, '7555', 'K-1', 80, 79, 75, 80, 81, 82, 'Memiliki keterampilan baik dalam merangkum', '197005192008012007', '2019-08-08 15:14:52'),
(65, 56, '7551', 'K-1', 80, 75, 78, 80, 88, 81, 'Memiliki keterampilan baik dalam menyajikan teks', '197005192008012007', '2019-08-08 15:17:12'),
(66, 51, '1278', 'K-1', 79, 75, 84, 81, 85, 81, 'Memiliki keterampilan baik dalam menyusun teks sapaan', '197912022008011019', '2019-08-08 15:21:13'),
(67, 59, '7551', 'K-1', 81, 78, 72, 82, 79, 81, 'Memiliki keterampilan dalam menyusun teks sapaan,pamitan', '197912022008011019', '2019-08-08 15:24:29'),
(68, 63, '7555', 'K-1', 80, 81, 75, 85, 80, 81, 'Memiliki keterampilan baik dalam menyusun teks sapaan', '197912022008011019', '2019-08-08 15:27:57'),
(69, 53, '1278', 'K-1', 80, 79, 81, 78, 83, 88, 'Memiliki keterampilan baik melakukan senam', '19650117', '2019-08-08 15:32:21'),
(70, 62, '7551', 'K-1', 80, 71, 83, 79, 81, 83, 'Memiliki keterampilan baik dalam melakukan senam', '19650117', '2019-08-08 15:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_pengetahuan`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_pengetahuan` (
  `id_nilai_pengetahuan` int(3) NOT NULL AUTO_INCREMENT,
  `kodejdwl` int(3) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `kd` varchar(7) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `nilai5` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_pengetahuan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `rb_nilai_pengetahuan`
--

INSERT INTO `rb_nilai_pengetahuan` (`id_nilai_pengetahuan`, `kodejdwl`, `nis`, `kd`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `deskripsi`, `user_akses`, `waktu`) VALUES
(1, 5, '9991', '4.1', 89, 90, 89, 95, 0, 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(2, 5, '9998', '4.1', 90, 88, 90, 98, 0, 'Menganalisis teks cerita pendek, baik melalui lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(7, 5, '9991', '4.2', 90, 87, 90, 94, 0, 'Membandingkan teks cerita pendek, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:03:27'),
(8, 5, '9998', '4.2', 93, 88, 93, 90, 0, 'Menganalisis teks cerita ulang, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:03:27'),
(10, 5, '9991', '4.3', 89, 89, 89, 98, 0, 'Menganalisis teks pantun, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:03:57'),
(13, 5, '9991', '4.4', 89, 90, 89, 87, 0, 'Membandingkan teks cerita ulang, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:04:20'),
(15, 5, '9991', '4.5', 87, 90, 87, 78, 0, 'Menganalisis teks cerita ulang, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:04:36'),
(16, 5, '9998', '', 98, 99, 98, 89, 0, 'Menganalisis teks pantun, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:04:36'),
(18, 5, '9991', '4.6', 90, 89, 90, 98, 0, 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisan', '1', '2016-04-30 10:50:43'),
(21, 20, '0050', '1.1', 70, 75, 80, 85, 0, 'Memahami  dalam perkata ', '19690926', '2019-07-09 06:03:36'),
(22, 20, '0050', '1.1', 80, 83, 80, 85, 0, 'Memiliki kemampuan baik dalam mengeidentifikasi jumlah dan nama benda', '19690926', '2019-07-09 06:06:35'),
(23, 20, '0050', '1.1', 85, 88, 83, 89, 0, 'Memmiliki kemampuan sangat baik dalam mengidentifikasi nama binatang dan benda', '19690926', '2019-07-09 06:07:21'),
(28, 14, '1890', '2.1', 89, 23, 90, 90, 89, '', '19600616', '2019-07-18 19:55:55'),
(29, 34, '1234', '1.1', 79, 80, 70, 90, 89, '', '197912022008011019', '2019-07-21 13:26:53'),
(54, 48, '1278', 'K-1', 80, 81, 81, 89, 89, 'Memiliki kemampuan baik dalam menjelaskan hitungan', '087654323456789876', '2019-08-07 11:13:06'),
(31, 14, '7562', '1.1', 78, 84, 88, 82, 81, 'memahami', '19600616', '2019-07-24 08:22:21'),
(32, 17, '1278', '1.2', 79, 83, 81, 79, 84, 'memiliki kemampuan baik dlaam menjelaskan sifat', '19630910', '2019-07-26 06:10:10'),
(33, 42, '1278', '1.1', 79, 80, 81, 80, 82, 'mampu mengetahui baik dalam pelajaran', '19650117', '2019-07-29 02:37:37'),
(34, 42, '7658', '1.1', 80, 79, 80, 80, 80, 'mampu mempelajari baik di peljaaran dan tingatkan', '19650117', '2019-07-29 02:38:30'),
(35, 38, '1278', '1.1', 79, 89, 82, 80, 86, '', '19630910', '2019-07-30 13:57:54'),
(41, 44, '7890', '1.2', 80, 79, 85, 80, 83, 'mengetahui baik dalam pembelajaran mtk', '087654323456789876', '2019-07-31 03:27:33'),
(38, 39, '1278', '1.1', 81, 79, 80, 79, 80, 'lebih lagi tingkatkan dalam pembelajaran', '197912022008011019', '2019-07-30 17:50:18'),
(40, 39, '7552', '1.3', 78, 80, 83, 100, 90, '', '197912022008011019', '2019-07-30 17:52:08'),
(43, 39, '7562', '', 10, 70, 80, 90, 79, '', '197912022008011019', '2019-08-05 07:18:24'),
(44, 39, '1278', '', 2, 3, 4, 5, 6, '', '197912022008011019', '2019-08-05 08:36:14'),
(45, 39, '1278', '', 2, 3, 4, 5, 6, '', '197912022008011019', '2019-08-05 08:40:44'),
(46, 39, '1278', '', 1, 2, 3, 4, 5, '', '197912022008011019', '2019-08-05 08:40:53'),
(47, 39, '1278', '', 1, 2, 3, 4, 5, '', '197912022008011019', '2019-08-05 08:41:27'),
(48, 39, '1278', 'K-7', 5, 4, 3, 2, 1, '', '197912022008011019', '2019-08-05 08:41:34'),
(49, 37, '1278', 'K-3', 79, 81, 83, 80, 87, 'Memiliki kemampuan baik dalam memahami makna', '19600616', '2019-08-06 17:04:06'),
(50, 37, '7552', 'K-3', 80, 82, 90, 82, 89, 'Memiliki kemampuan sangat baik dalam menjelaskan arti jujur', '19600616', '2019-08-06 17:10:12'),
(51, 37, '7562', 'K-3', 79, 79, 81, 87, 83, 'Memiliki kemampuan baik dalam memahami makna dan menjelaskan arti amanah', '19600616', '2019-08-06 17:11:28'),
(53, 14, '7552', 'K-3', 70, 98, 87, 78, 89, 'memhamai', '19600616', '2019-08-07 08:48:48'),
(55, 48, '7552', 'K-1', 79, 82, 91, 80, 85, 'Memiliki kemampuan baik dalam menjelaskan sifat pengoperasian', '087654323456789876', '2019-08-07 11:14:34'),
(56, 48, '7562', 'K-1', 78, 80, 90, 84, 82, 'Memiliki kemampuan baik dalam bilangan bulat', '087654323456789876', '2019-08-07 11:15:31'),
(57, 68, '7555', 'K-1', 80, 82, 79, 86, 80, 'Memiliki kemampuan baik dalam bilangan bulat', '087654323456789876', '2019-08-07 11:25:06'),
(58, 68, '7556', 'K-1', 81, 82, 80, 81, 82, 'Memiliki kemampuan baik dalam menjelaskan hitungan', '087654323456789876', '2019-08-07 11:25:39'),
(59, 57, '7551', 'K-1', 80, 83, 80, 81, 83, 'Memiliki kemampuan baik dalam menjelaskan hitungan', '087654323456789876', '2019-08-07 11:31:45'),
(60, 57, '7553', 'K-1', 78, 82, 76, 75, 80, 'Memiliki kemampuan baik dalam menjelaskan sifat pengoperasian', '087654323456789876', '2019-08-07 11:32:29'),
(61, 50, '1278', 'K-2', 89, 82, 83, 87, 88, 'Memiliki kemampuan baik dalam ruang cukup ', '196606221998022001', '2019-08-07 11:43:32'),
(62, 50, '7552', 'K-2', 83, 79, 80, 81, 83, 'Memiliki kemampuan baik dalam interaksi', '196606221998022001', '2019-08-07 11:45:49'),
(63, 50, '7562', 'K-2', 79, 79, 77, 80, 81, 'memiliki kemampuan cuku dalam memahami interaksi ruang cukup', '196606221998022001', '2019-08-07 11:46:36'),
(64, 60, '7551', 'K-2', 79, 80, 81, 79, 81, 'Memiliki kemampuan baik dalam interaksi', '196606221998022001', '2019-08-07 11:51:53'),
(65, 60, '7553', 'K-2', 78, 80, 82, 80, 85, 'memiliki kemampuan cuku dalam memahami interaksi ruang cukup', '196606221998022001', '2019-08-07 11:52:28'),
(66, 69, '7555', 'K-2', 81, 82, 80, 83, 88, 'Memiliki kemampuan baik dalam interaksi', '196606221998022001', '2019-08-07 11:56:14'),
(67, 69, '7556', 'K-2', 78, 79, 80, 80, 82, 'Memiliki kemampuan baik dalam ruang cukup ', '196606221998022001', '2019-08-07 11:57:02'),
(68, 45, '1278', 'K-1', 79, 89, 80, 79, 79, 'Memiliki kemampuan baik dalam memahami makna', '19600616', '2019-08-07 12:08:29'),
(69, 45, '7552', 'K-1', 83, 80, 79, 81, 84, 'Memiliki kemampuan baik dalam memahami makna', '19600616', '2019-08-07 12:09:32'),
(70, 45, '7562', 'K-1', 83, 76, 80, 79, 83, 'Memiliki kemampuan baik dalam memahami makna dan menjelaskan arti jujur', '19600616', '2019-08-07 12:13:38'),
(71, 54, '7551', 'K-1', 70, 81, 80, 81, 80, 'Memiliki kemampuan baik dalam memahami makna', '19600616', '2019-08-07 12:20:13'),
(72, 54, '7553', 'K-1', 79, 81, 80, 78, 80, 'Memiliki kemampuan baik dalam memahami makna', '19600616', '2019-08-07 12:20:44'),
(73, 72, '7555', 'K-1', 81, 76, 74, 80, 81, 'Memiliki kemampuan baik dalam memahami makna', '19600616', '2019-08-07 12:21:44'),
(74, 72, '7556', 'K-1', 81, 78, 75, 80, 84, 'Memiliki kemampuan baik dalam memahami makna dan menjelaskan arti jujur', '19600616', '2019-08-07 12:22:33'),
(75, 46, '1278', 'K-1', 70, 80, 81, 89, 87, 'Memiliki kemampuan baik dalam norma ', '19630910', '2019-08-07 13:25:31'),
(76, 46, '7552', 'K-1', 80, 82, 76, 81, 82, 'Memiliki kemampuan baik dalam perumusan', '19630910', '2019-08-07 13:27:10'),
(77, 55, '7551', 'K-1', 79, 80, 78, 82, 81, 'Memiliki kemampuan baik dalam norma ', '19630910', '2019-08-07 13:57:26'),
(78, 67, '7555', 'K-1', 80, 79, 82, 81, 86, 'Memiliki kemampuan baik dalam norma', '19630910', '2019-08-07 14:16:15'),
(79, 49, '1278', 'K-1', 80, 87, 78, 80, 81, 'Memiliki kemampuan baik dalam obyek IPA', '19650406', '2019-08-07 14:25:25'),
(80, 58, '7551', 'K-1', 79, 85, 79, 87, 89, 'Memiliki kemampuan baik dalam obyek IPA', '19650406', '2019-08-07 14:30:07'),
(81, 65, '7555', 'K-1', 80, 76, 79, 80, 86, 'Memiliki kemampuan baik dalam klasifikasi materi dan perubahan', '19650406', '2019-08-07 14:32:56'),
(82, 52, '1278', 'K-1', 80, 83, 82, 80, 87, 'Memiliki kemampuan baik dalam memahami prinsip flora fauna', '197106081997022001', '2019-08-07 14:36:30'),
(83, 61, '7551', 'K-1', 78, 80, 79, 83, 81, 'Memiliki kemampuan baik dalam memahami unsur dan prinsip', '197106081997022001', '2019-08-07 14:44:29'),
(84, 70, '7555', 'K-1', 81, 80, 79, 80, 86, 'Memiliki kemampuan baik dalam memahami unsur dan prinsip', '197106081997022001', '2019-08-07 14:46:25'),
(85, 47, '1278', 'K-1', 80, 79, 81, 82, 81, 'Memiliki kemampuan biak dalam mewariskan budaya melalui teks prosedur', '197005192008012007', '2019-08-07 14:49:15'),
(86, 66, '7555', 'K-1', 79, 81, 81, 80, 82, 'Memiliki kemampuan baik dalam memahami makna', '197005192008012007', '2019-08-08 15:13:39'),
(87, 56, '7551', 'K-1', 79, 81, 75, 85, 82, 'Memiliki kemampuan baik dalam memahami makna ', '197005192008012007', '2019-08-08 15:15:42'),
(88, 51, '1278', 'K-1', 83, 78, 81, 82, 80, 'Memiliki kemampuan baik dalam mengidentifikasi sapaan', '197912022008011019', '2019-08-08 15:20:00'),
(89, 59, '7551', 'K-1', 81, 80, 79, 80, 89, 'Memiliki kemampuan baik dalam mengidentifikasi nama, hari,bulan', '197912022008011019', '2019-08-08 15:22:56'),
(90, 63, '7555', 'K-1', 79, 80, 82, 84, 89, 'Memiliki kemampuan baik dalam mengidentifikasi sapaan', '197912022008011019', '2019-08-08 15:25:46'),
(91, 53, '1278', 'K-1', 83, 76, 79, 80, 81, 'Memiliki kemampuan baik dalam permainan bola besar', '19650117', '2019-08-08 15:30:05'),
(92, 62, '7551', 'K-1', 80, 76, 77, 81, 81, 'Memiliki kemampuan baik dalam permainan bola kecil', '19650117', '2019-08-08 15:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_prestasi`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_prestasi` (
  `id_nilai_prestasi` int(10) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(5) NOT NULL,
  `nis` varchar(18) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `jenis_kegiatan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_prestasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `rb_nilai_prestasi`
--

INSERT INTO `rb_nilai_prestasi` (`id_nilai_prestasi`, `id_tahun_akademik`, `nis`, `kode_kelas`, `jenis_kegiatan`, `keterangan`, `user_akses`, `waktu_input`) VALUES
(2, 20161, '9991268756', 'X.MIPA', 'Kegiata', 'Memiliki keterampilan merencanakan dan melaksanakan percobaan interferensi gelombang cahaya 				', '1', '2016-04-29 08:09:42'),
(7, 0, '123456789', '', '1', '', '123321', '2019-07-03 15:18:38'),
(8, 0, '123456789', '', '1', '', '123321', '2019-07-03 15:21:53'),
(9, 2019, '888999', 'VIIA', 'olahrag', 'oke aja', '123321', '2019-07-07 12:29:00'),
(10, 2019, '0050855185', 'VIIC', 'pramuka', 'sip', '567890', '2019-07-07 13:24:45'),
(13, 2019, '00508579091', 'VIIC', 'olahrag', 'iya', '567890', '2019-07-07 13:25:09'),
(17, 2019, '7552', 'K-VIIA', 'PMR', 'juara 2', '197912022008011019', '2019-07-26 05:51:40'),
(19, 18, '7658', 'K-VIIA', 'Pramuka', 'Juara 1', '197912022008011019', '2019-07-29 02:43:21'),
(20, 18, '7890', 'K-VIID', 'Pramuka', 'juara 2', '19630215', '2019-07-31 03:22:35'),
(21, 2019, '1278', 'K-VIIA', 'PMR', 'Juara 2', '197912022008011019', '2019-08-13 11:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_sikap`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_sikap` (
  `id_nilai_sikap` int(10) NOT NULL AUTO_INCREMENT,
  `kodejdwl` int(3) NOT NULL,
  `nis` varchar(18) NOT NULL,
  `positif` text NOT NULL,
  `negatif` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('spiritual','sosial') NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_sikap`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `rb_nilai_sikap`
--

INSERT INTO `rb_nilai_sikap` (`id_nilai_sikap`, `kodejdwl`, `nis`, `positif`, `negatif`, `deskripsi`, `status`, `user_akses`, `waktu`) VALUES
(1, 5, '9999152999', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda', 'Ketaatan beribadah mulai berkembang', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda; ketaatan beribadah mulai berkembang', 'spiritual', '1', '2016-04-18 16:38:53'),
(2, 5, '9998218087', 'Nilai Positif,..', 'Nilai Negatif,..', 'Deskripsi Nilai Sikap,..', 'spiritual', '1', '2016-04-18 16:38:53'),
(3, 5, '9999152999', 'Nilai Sosial Posisitf,..', 'Nilai Sosial Negatif,..', 'Nilai Deskripsi Sosial,..', 'sosial', '1', '2016-04-18 16:39:53'),
(4, 5, '9998218087', 'Nilai Sosial Posisitf 2,..', 'Nilai Sosial Negatif 2,..', 'Nilai Deskripsi Sosial 2,..', 'sosial', '1', '2016-04-18 16:39:53'),
(5, 5, '9991268756', 'Nilai Positif,..', 'Nilai Negatif,..', 'Deskripsi Nilai Sikap,..', 'spiritual', '1', '2016-04-29 20:12:48'),
(6, 5, '0151379251', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda', 'Ketaatan beribadah mulai berkembang', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda; ketaatan beribadah mulai berkembang', 'spiritual', '1', '2016-04-29 20:12:48'),
(7, 5, '9991268756', 'Nilai Positif,..', 'Nilai Negatif,..', 'Deskripsi Nilai Sikap,..', 'spiritual', '1', '2016-04-29 20:13:05'),
(8, 5, '0151379251', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda', 'Ketaatan beribadah mulai berkembang', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda; ketaatan beribadah mulai berkembang', 'spiritual', '1', '2016-04-29 20:13:05'),
(9, 5, '9998218087', 'Nilai Positif,..', 'Nilai Negatif,..', 'Deskripsi Nilai Sikap,..', 'spiritual', '1', '2016-04-29 20:13:05'),
(10, 5, '9991268756', 'Nilai Positif,..', 'Nilai Negatif,..', 'Deskripsi Nilai Sikap,..', 'spiritual', '1', '2016-04-29 20:13:34'),
(11, 5, '0151379251', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda', 'Ketaatan beribadah mulai berkembang', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda; ketaatan beribadah mulai berkembang', 'spiritual', '1', '2016-04-29 20:13:34'),
(12, 5, '9998218087', 'Isi dengan Nilai Positif,..', 'Isi dengan Nilai Negatif,..', 'Deskripsi Nilai Sikap,..', 'spiritual', '1', '2016-04-29 20:13:34'),
(13, 5, '9999152999', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda', 'Ketaatan beribadah mulai berkembang', 'Selalu bersyukur dan selalu berdoa sebelum melakukan kegiatan serta memiliki toleran pada agama yang berbeda; ketaatan beribadah mulai berkembang', 'spiritual', '1', '2016-04-29 20:13:34'),
(14, 5, '9991268756', 'Isi dengan Nilai Sosial Posisitf 2,..', 'Isi dengan Nilai Sosial Negatif 2,..', 'Isi dengan Nilai Deskripsi Sosial 2,..', 'sosial', '1', '2016-04-29 20:14:07'),
(15, 5, '9998218087', 'Nilai Sosial Posisitf 2,..', 'Nilai Sosial Negatif 2,..', '', 'sosial', '1', '2016-04-29 20:14:07'),
(16, 5, '9999152999', 'Nilai Sosial Posisitf,..', 'Nilai Sosial Negatif,..', 'Nilai Deskripsi Sosial,..', 'sosial', '1', '2016-04-29 20:14:07'),
(17, 0, '123456789', 'wq', 're', 't', 'spiritual', '2', '2019-04-11 16:58:11'),
(18, 0, '321', 'we', 't', 'v', 'spiritual', '2', '2019-04-11 16:58:11'),
(19, 0, '123456789', 'er', 'a', 's', 'sosial', '2', '2019-04-11 16:58:19'),
(20, 0, '321', 'q', 'er', 'r', 'sosial', '2', '2019-04-11 16:58:19'),
(21, 3, '4443', 'asd', 'ad', 'da', 'spiritual', '2', '2019-04-24 12:19:30'),
(22, 3, '4443', '7', '8', '9', 'spiritual', '2', '2019-04-24 12:19:43'),
(23, 5, '888999', 'kamu baik', 'kamu olo', 'yayayay', 'spiritual', '3333333', '2019-07-07 12:22:54'),
(24, 5, '888999', 'ok', 'yek', 'ayeaye', 'sosial', '3333333', '2019-07-07 12:23:10'),
(25, 11, '0050855185', 'baik', '-', 'iya', 'spiritual', '567890', '2019-07-07 13:26:56'),
(26, 11, '00508579091', 'baik', '-', 'iya', 'spiritual', '567890', '2019-07-07 13:26:56'),
(27, 11, '0050855185', 'baik', '-', 'tingatkan', 'sosial', '567890', '2019-07-07 13:27:27'),
(28, 11, '00508579091', 'baik', '-', 'sp', 'sosial', '567890', '2019-07-07 13:27:27'),
(29, 20, '00508232739', 'Baik', '-', 'selalu memberi salam pada saat awal dan akhir kegiatan', 'spiritual', '19690926', '2019-07-09 05:42:40'),
(30, 20, '0050835524', 'Baik', '-', 'berdoa sebelum dan sesudah pelajaran', 'spiritual', '19690926', '2019-07-09 05:42:40'),
(31, 20, '0050857908', 'Baik', '-', 'berdoa sebelum dan sesudah pelajaran', 'spiritual', '19690926', '2019-07-09 05:42:40'),
(32, 20, '00508232739', 'Baik', '', 'selalu menunjukan sikap jujur', 'sosial', '19690926', '2019-07-09 05:44:28'),
(33, 20, '0050835524', 'Baik', '', 'bersiskap sopan santun', 'sosial', '19690926', '2019-07-09 05:44:28'),
(34, 20, '0050857908', 'Baik', '', 'bersikap toleransi dan disiplin', 'sosial', '19690926', '2019-07-09 05:44:28'),
(35, 0, '00508232739', 'cd', 'd', 'd', 'spiritual', '1112222', '2019-07-09 13:36:07'),
(36, 15, '0050835524', 'Baik', '', 'Selalu menjalankan ibadah', 'spiritual', '19700519', '2019-07-09 22:16:23'),
(37, 15, '0050835524', 'Baik', '', 'Selalu menjalankan ibadah', 'spiritual', '19700519', '2019-07-09 22:16:47'),
(38, 15, '0050835524', 'Baik', '', 'Selalu menjalankan ibadah', 'spiritual', '19700519', '2019-07-09 22:17:14'),
(39, 0, '0050835524', 'hgkj', '', '', 'spiritual', '19791202', '2019-07-10 09:00:49'),
(40, 42, '7658', 'Baik', 'Baik', 'Selalu baik dalam da mampu mejalankan serangkaian praktik dalam pelajaran', 'spiritual', '19650117', '2019-07-29 02:34:49'),
(41, 42, '7658', 'Baik', 'Baik', 'Selalu berusaha meningkatkan kemmapuan belajar', 'sosial', '19650117', '2019-07-29 02:36:06'),
(42, 42, '1278', 'a', 'b', 'c', 'spiritual', '19650117', '2019-07-30 16:24:39'),
(43, 42, '7658', 'Baik', 'Baik', 'Selalu baik dalam da mampu mejalankan serangkaian praktik dalam pelajaran', 'spiritual', '19650117', '2019-07-30 16:24:39'),
(44, 42, '1278', 'sa', 'fd', 'df', 'sosial', '19650117', '2019-07-30 16:24:45'),
(45, 42, '7658', 'Baik', 'Baik', 'Selalu berusaha meningkatkan kemmapuan belajar', 'sosial', '19650117', '2019-07-30 16:24:45'),
(46, 39, '1278', 'bersikap baik ', 'tingkatkan lagi beribadah', 'tingkatkan kembali', 'spiritual', '197912022008011019', '2019-07-30 17:45:18'),
(47, 44, '7890', 'selalu berdoa disetiap kegiatan', '', 'tingkatkan kembali dan mulai berubah lebih baik', 'spiritual', '087654323456789876', '2019-07-31 03:25:15'),
(48, 44, '7890', 'selalu mengerjakan tugas', 'coba untuk tidak masuk kelas telat', 'lebih tingkatkan dan berubah', 'sosial', '087654323456789876', '2019-07-31 03:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_sikap_semester`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_sikap_semester` (
  `id_nilai_sikap_semester` int(10) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(4) NOT NULL,
  `nis` varchar(18) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `spiritual_predikat` varchar(10) NOT NULL,
  `spiritual_deskripsi` text NOT NULL,
  `sosial_predikat` varchar(10) NOT NULL,
  `sosial_deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_sikap_semester`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rb_nilai_sikap_semester`
--

INSERT INTO `rb_nilai_sikap_semester` (`id_nilai_sikap_semester`, `id_tahun_akademik`, `nis`, `kode_kelas`, `spiritual_predikat`, `spiritual_deskripsi`, `sosial_predikat`, `sosial_deskripsi`, `user_akses`, `waktu_input`) VALUES
(1, 20161, '9991268756', 'X.MIPA', 'A', 'Pertahankan Nilai anda,..', 'B', 'Tingkatkan Nilai anda,..', '1', '2016-04-28 10:10:16'),
(2, 20161, '0151379251', 'X.MIPA', 'C', 'Tolong Perbaiki Sikap anda,..', 'D', 'Anda Tidak Berutak,..', '1', '2016-04-28 10:10:16'),
(3, 20161, '0004107204', 'X.MIPA', 'A', 'Pertahankan Nilai anda,..', 'C', 'Tolong Perbaiki Sikap anda,..', '1', '2016-04-28 10:10:50'),
(4, 2019, '123456789', 'VII1', 'A', 'sad', 'B', 'ddds', '2', '2019-06-07 09:32:05'),
(5, 2019, '888999', 'VIIA', 'ba', 'yayay', 'ti', 'oke', '123321', '2019-07-07 12:25:42'),
(6, 2019, '0050855185', 'VIIC', 'Ba', 'iya', 'ba', 'tingkat', '567890', '2019-07-07 13:21:19'),
(7, 2019, '00508579091', 'VIIC', 'Ba', 'oke', 'bu', 'turunkan harga', '567890', '2019-07-07 13:21:19'),
(8, 2019, '00508232739', 'VIIA', 'Baik', 'Selalu memberi salam pada saat awal dan akhir kegiatan', 'Baik', 'Selalu menunjukan sikap jujur', '19690926', '2019-07-09 06:14:25'),
(9, 2019, '0050835524', 'VIIA', 'Baik', 'Selalu berdoa sebelum dan sesudah kegiatan', 'Baik', 'bersikap sopan santun', '19690926', '2019-07-09 06:14:25'),
(10, 2019, '0050857908', 'VIIA', 'Baik', ' beribadah sesuai dengan agamanya mulai berkembang', 'Baik', 'bersikap toleransi dan disiplin', '19690926', '2019-07-09 06:14:25'),
(11, 2019, '7551', 'K-VIIA', 'Baik', '', '', '', '197912022008011019', '2019-07-15 22:22:38'),
(12, 2019, '7552', 'K-VIIA', 'Baik', 'selalu berdoa sebelum memulai kegiatan', 'Baik', 'selalu bersikap jujur dan bertoleransi', '197912022008011019', '2019-07-15 22:22:38'),
(13, 2019, '1234', 'K-VIIA', 'baik', '', '', '', '197912022008011019', '2019-07-17 16:45:45'),
(14, 2019, '1278', 'K-VIIA', 'Baik', 'selalu memberi salam di awal dan akhir kegiatan', 'Baik', 'selalu menunjukan sikap jujur', '197912022008011019', '2019-07-26 05:48:42'),
(15, 2019, '7562', 'K-VIIA', 'Baik', 'selalu menjlaankan ibadah', 'Baik', 'sikap disiplin mulai eningkat', '197912022008011019', '2019-07-26 05:48:42'),
(16, 18, '7658', 'K-VIIA', 'Baik', 'selalu berdoa sebelum memulia kegiatan', 'Baik', 'berusaha menikutoi peraturan sekolah', '197912022008011019', '2019-07-29 02:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `rb_nilai_uts`
--

CREATE TABLE IF NOT EXISTS `rb_nilai_uts` (
  `id_nilai_uts` int(10) NOT NULL AUTO_INCREMENT,
  `kodejdwl` int(3) NOT NULL,
  `nis` varchar(18) NOT NULL,
  `angka_pengetahuan` float NOT NULL,
  `deskripsi_pengetahuan` text NOT NULL,
  `angka_keterampilan` float NOT NULL,
  `deskripsi_keterampilan` text NOT NULL,
  `waktu_input_uts` datetime NOT NULL,
  PRIMARY KEY (`id_nilai_uts`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `rb_nilai_uts`
--

INSERT INTO `rb_nilai_uts` (`id_nilai_uts`, `kodejdwl`, `nis`, `angka_pengetahuan`, `deskripsi_pengetahuan`, `angka_keterampilan`, `deskripsi_keterampilan`, `waktu_input_uts`) VALUES
(1, 5, '9991268756', 85, '', 90, '', '2016-04-15 17:54:05'),
(2, 5, '9998218087', 74, '', 83, '', '2016-04-15 17:54:05'),
(3, 13, '9999152999', 89, '', 90, '', '2016-04-21 18:52:57'),
(4, 14, '9999152999', 85, '', 79, '', '2016-04-21 18:53:14'),
(5, 13, '0000261141', 79, '', 90, '', '2018-02-07 23:44:14'),
(6, 0, '123456789', 91, '', 90, '', '2019-04-11 15:46:31'),
(7, 0, '321', 80, '', 70, '', '2019-04-11 15:46:31'),
(8, 3, '123456789', 75, '', 80, '', '2019-04-24 11:23:37'),
(9, 3, '321', 80, '', 70, '', '2019-04-24 12:25:29'),
(10, 2, '123456789', 80, '', 75, '', '2019-06-27 05:33:54'),
(11, 2, '321', 78, '', 75, '', '2019-06-27 05:33:54'),
(12, 2, '4443', 79, '', 70, '', '2019-06-27 05:33:54'),
(13, 1, '123456789', 80, '', 70, '', '2019-06-30 17:05:36'),
(14, 1, '321', 90, '', 60, '', '2019-06-30 17:06:37'),
(15, 5, '888999', 70, '', 75, '', '2019-07-07 12:21:50'),
(16, 9, '888999', 80, '', 90, '', '2019-07-07 13:01:10'),
(17, 11, '0050855185', 89, '1', 85, '2', '2019-07-07 13:25:55'),
(18, 11, '00508579091', 90, '3', 90, '3', '2019-07-07 13:25:55'),
(19, 20, '00508232739', 75, 'Tingkatkan lagi', 73, 'Tingkatkan', '2019-07-09 05:36:54'),
(20, 20, '0050835524', 82, 'Tingkatkan', 85, 'tingkatkan lagi', '2019-07-09 05:36:54'),
(21, 20, '0050857908', 80, 'tingkatkan', 83, 'tingkatkan', '2019-07-09 05:36:54'),
(22, 14, '00508232739', 75, 'tingkatkan', 80, 'tingkatkan', '2019-07-09 10:06:37'),
(23, 14, '0050835524', 80, 'tingkatkan', 80, 'tingkatkan', '2019-07-09 10:06:37'),
(24, 14, '0050857908', 90, 'tingkatkan', 75, 'lebih tingkatkan', '2019-07-09 10:06:37'),
(25, 15, '00508232739', 79, 'tingkatkan', 81, 'baik namun tingkatkan kebali', '2019-07-09 22:13:27'),
(26, 15, '0050835524', 80, ' Memiliki kemampuan baik dalam norma', 85, 'Memiliki keterampilan baik dalam merangkum', '2019-07-09 22:13:27'),
(27, 16, '00508232739', 80, 'memiliki kemampuan baik dalam mewariskan budaya melalui teks', 78, 'lebih tingkatkan kembali dalam keterampilan', '2019-07-09 22:23:00'),
(28, 16, '0050835524', 82, 'memiliki kemampuan baik dalam teks prosedur', 84, 'memiliki keterampilan baik dalam merangkum teks', '2019-07-09 22:23:00'),
(29, 16, '0050857908', 85, '', 0, '', '2019-07-09 22:23:00'),
(30, 14, '7551', 80, 'baikk', 79, 'pelajari', '2019-07-15 20:53:35'),
(31, 14, '1234', 80, '', 0, '', '2019-07-16 16:27:37'),
(32, 34, '1234', 70, '', 80, '', '2019-07-21 13:25:08'),
(33, 34, '1278', 80, '', 75, '', '2019-07-21 13:25:08'),
(34, 34, '1890', 78, '', 67, '', '2019-07-21 13:25:08'),
(35, 34, '7552', 80, '', 70, '', '2019-07-21 13:25:08'),
(36, 14, '1278', 83, 'baik', 86, 'baik', '2019-07-24 08:20:33'),
(37, 14, '7552', 85, '', 90, '', '2019-07-24 08:20:33'),
(38, 14, '7562', 88, '', 90, '', '2019-07-24 08:20:33'),
(39, 17, '1278', 79, 'pahami lagi', 80, 'tingkatkan', '2019-07-26 06:06:16'),
(40, 17, '7552', 80, 'tingkatkan', 83, 'tingkatkan', '2019-07-26 06:06:16'),
(41, 17, '7562', 77, 'pahami lagi', 81, 'tingkatkan', '2019-07-26 06:06:16'),
(42, 42, '7658', 80, 'kemampuan baik dalam materi', 83, 'keterampilan atau praktik baik', '2019-07-29 02:32:11'),
(43, 40, '1278', 79, 'Tingkatkan', 80, 'baik dalam keterampilan', '2019-07-30 13:32:09'),
(44, 39, '1278', 78, 'tingkatkan lagi', 80, 'memiliki keterampilan yang baik', '2019-07-30 17:43:45'),
(45, 18, '7552', 90, 'a', 67, 'dfsf', '2019-07-30 18:00:28'),
(46, 43, '7890', 80, 'pengetahuan baik dan tingkatan kembali', 78, 'tingkatkan kembali dalam keterampilan atau dalam perhitungan', '2019-07-31 03:01:36'),
(47, 44, '7890', 79, 'tingkatkan kembali dalam pengetahuan', 90, 'mengetahui begitu baik dalam keterampilan', '2019-07-31 03:20:01'),
(48, 57, '7551', 81, 'Memiliki kemampuan dalam menghitung', 83, 'memiliki keterampilan dalam pengoperasian', '2019-08-07 11:36:04'),
(49, 57, '7553', 75, 'Memiliki kemampuan dalam menjelaskan perhitungan', 80, 'Memiliki keterampilan dalam menentukan hasil', '2019-08-07 11:36:48'),
(50, 68, '7555', 86, 'Memiliki kemampuan dalam menghitung', 83, 'memiliki keterampilan dalam pengoperasian', '2019-08-07 11:38:00'),
(51, 68, '7556', 81, 'Memiliki kemampuan dalam menjelaskan perhitungan', 81, 'Memiliki keterampilan dalam menentukan hasil', '2019-08-07 11:38:00'),
(52, 48, '1278', 89, 'Memiliki kemampuan dalam menghitung', 80, 'memiliki keterampilan dalam pengoperasian', '2019-08-07 11:39:53'),
(53, 48, '7552', 80, 'Memiliki kemampuan dalam menjelaskan perhitungan', 84, 'Memiliki keterampilan dalam menentukan hasil', '2019-08-07 11:39:53'),
(54, 48, '7562', 84, 'Memiliki kemampuan baik dalam menjelaskan perhitngan dan hasil', 89, 'Memiliki keterampilan dalam menentukan hasil', '2019-08-07 11:39:53'),
(55, 50, '1278', 87, '', 88, '', '2019-08-07 12:00:13'),
(56, 50, '7552', 81, '', 80, '', '2019-08-07 12:00:13'),
(57, 50, '7562', 80, '', 77, '', '2019-08-07 12:00:13'),
(58, 69, '7555', 83, '', 80, '', '2019-08-07 12:00:51'),
(59, 69, '7556', 80, '', 79, '', '2019-08-07 12:00:51'),
(60, 60, '7551', 79, '', 82, '', '2019-08-07 12:01:20'),
(61, 60, '7553', 80, '', 85, '', '2019-08-07 12:01:20'),
(62, 54, '7551', 81, 'Memiliki kemampuan dalam menjelaskan arti jujur', 80, '', '2019-08-07 13:05:24'),
(63, 54, '7553', 78, 'Memiliki kemampuan dalam memahami makna', 80, '', '2019-08-07 13:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `rb_predikat`
--

CREATE TABLE IF NOT EXISTS `rb_predikat` (
  `id_predikat` int(6) NOT NULL AUTO_INCREMENT,
  `nilai_a` int(3) NOT NULL,
  `nilai_b` int(3) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_predikat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rb_predikat`
--

INSERT INTO `rb_predikat` (`id_predikat`, `nilai_a`, `nilai_b`, `grade`, `keterangan`) VALUES
(1, 50, 59, 'D', 'Kurang'),
(2, 60, 74, 'C', 'Cukup'),
(3, 75, 84, 'B', 'Baik'),
(4, 85, 100, 'A', 'sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `rb_siswa`
--

CREATE TABLE IF NOT EXISTS `rb_siswa` (
  `nis` varchar(18) NOT NULL,
  `password` varchar(5) NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nama_ayah` varchar(10) NOT NULL,
  `no_telpon_ayah` varchar(12) NOT NULL,
  `nama_ibu` varchar(10) NOT NULL,
  `no_telpon_ibu` varchar(12) NOT NULL,
  `nama_wali` varchar(10) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `status_awal` varchar(6) NOT NULL,
  `status_siswa` enum('Aktif','Tidak Aktif') NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_siswa`
--

INSERT INTO `rb_siswa` (`nis`, `password`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `hp`, `email`, `nama_ayah`, `no_telpon_ayah`, `nama_ibu`, `no_telpon_ibu`, `nama_wali`, `angkatan`, `status_awal`, `status_siswa`, `kode_kelas`, `foto`) VALUES
('7551', 'admin', 'DINDA AZAHRA DILA ', 'Perempuan', 'pekalongan', '2005-07-11', 'Islam', 'kajen', '085841122134', 'dindaad@gmail.com', 'Harjo', '082264585049', 'Siti ', '082329164067', 'Sri ', 34, 'Baru', 'Aktif', 'K-VIIB', ''),
('7555', 'admin', 'Nabila', 'Perempuan', 'pkl', '2005-04-10', 'Islam', 'bojong', '098765432134', 'nabil12@gmail.com', '', '', '', '', '', 34, '', 'Aktif', 'K-VIIC', ''),
('7556', 'admin', 'M. sofiyan ilham', 'Laki-Laki', 'pekalongan', '2005-05-21', 'Islam', 'karanganyar', '098567432123', '@gmail.com', '', '', '', '', '', 34, '', 'Aktif', 'K-VIIC', ''),
('7552', 'admin', 'ADITYA YUSUF RAHMAN', '0', 'pekalongan', '2005-05-19', '0', 'Bojong', '082134565432', 'aditya@gmail.com', '', '', '', '', '', 34, '', 'Aktif', 'K-VIIA', ''),
('7553', 'admin', 'DITO DWI NUGROHO 1', '0', 'pekalongan', '2006-02-23', '0', 'ds gejlik/kajen', '08213456456', 'dito@gmail.com', '', '', '', '', '', 34, 'Baru', 'Aktif', 'K-VIIB', ''),
('1278', 'admin', 'ADELA SEKAR', 'Perempuan', 'pekalongan', '2005-07-06', 'Islam', 'kajen', '082138723456', 'kajen', 'Alfi Amiru', '085876543478', 'Siti Warda', '085789907654', 'Setyarum', 34, 'baru', 'Aktif', 'K-VIIA', 'PhotoGrid_1563929284607.jpg'),
('7562', 'admin', 'ANA OKTAVIANI', 'Perempuan', 'pekalongan', '2005-10-12', 'Islam', 'kajen', '082345643214', 'ANA@gmail.com', 'tarjo', '085677136754', 'siti', '085887908432', 'warni', 34, 'baru', 'Aktif', 'K-VIIA', 'PhotoGrid_1563928849902.jpg'),
('65343', 'admin', 'adsadsas', '0', '', '1970-01-01', '0', '', '', '', '', '', '', '', '', 0, '', 'Aktif', '0', ''),
('76834', 'admin', 'Fdgfd', '0', '', '1970-01-01', '0', '', '', '', '', '', '', '', '', 0, '', 'Aktif', '0', ''),
('7550', 'admin', 'Bella', 'Perempuan', 'Pekalongan', '2019-07-31', 'Islam', 'Kajen', '', 'Bella@gmail.com', '', '', '', '', '', 34, 'Baru', 'Aktif', 'K-VIIA', ''),
('7557', 'admin', 'Malkiyah', 'Perempuan', 'Pekalongan', '2019-08-13', 'Islam', 'Kajen', '082345678765', 'Malkiyah@gmail.com', 'Bejo', '085345678765', 'Tina', '08236789765', 'Marti', 34, 'Baru', 'Aktif', 'K-VIIA', 'PhotoGrid_1563928875928.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rb_tahun_akademik`
--

CREATE TABLE IF NOT EXISTS `rb_tahun_akademik` (
  `id_tahun_akademik` int(4) NOT NULL AUTO_INCREMENT,
  `nama_tahun` varchar(4) NOT NULL,
  `keterangan` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  PRIMARY KEY (`id_tahun_akademik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20164 ;

--
-- Dumping data for table `rb_tahun_akademik`
--

INSERT INTO `rb_tahun_akademik` (`id_tahun_akademik`, `nama_tahun`, `keterangan`, `aktif`) VALUES
(2019, '2019', 'Aktif', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `rb_users`
--

CREATE TABLE IF NOT EXISTS `rb_users` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(18) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `no_telpon` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=113 ;

--
-- Dumping data for table `rb_users`
--

INSERT INTO `rb_users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telpon`, `jabatan`, `level`, `aktif`) VALUES
(1, '196805151994121005', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'ARIFIN, S.Pd.', 'arifin@gmail.com', '082128713345', 'kepala sekolah', 'kepala', 'Y'),
(2, 'admin', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'Nadhirin, S.Pd.', 'Cicik.Angraeni1@gmai', '085268009213', 'Admin', 'superuser', 'Y');
--
-- Database: `test`
--
--
-- Database: `webauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
