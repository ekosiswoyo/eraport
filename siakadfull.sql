-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2019 pada 05.00
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakadfull`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_catatan`
--

CREATE TABLE `rb_catatan` (
  `id_catatan` int(11) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_catatan`
--

INSERT INTO `rb_catatan` (`id_catatan`, `nisn`, `kode_kelas`, `catatan`) VALUES
(2, '4443', 'VII1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_guru`
--

CREATE TABLE `rb_guru` (
  `nip` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_jalan` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_pernikahan` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_guru`
--

INSERT INTO `rb_guru` (`nip`, `password`, `kode_kelas`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `alamat_jalan`, `hp`, `email`, `status_pernikahan`, `foto`) VALUES
('1234567890', 'admin', '', 'sdfsdf', 'Laki-Laki', 'semarang', '0000-00-00', '123213', '2', 'fa', '2342', 'sf@g.com', '1', ''),
('1112222', 'admin', '', 'Andi ', 'Laki-Laki', 'pkl', '1975-09-20', '', 'Islam', 'kajen', '53703802', 'Andi@gmail.com', 'Menikah', ''),
('555555', 'admin', '', 'Tri elyawati, S.Pd', 'Perempuan', 'Pemalang', '1978-05-21', '', 'Islam', 'kajen', '085256932192', 'Trielyawati@gmail.co', 'Menikah', ''),
('3333333', 'admin', '', 'Dyah Hendarti, S.Pd', 'Perempuan', 'pkl', '1979-03-15', '', 'Islam', 'kesesi', '085642778856', 'dyahhendar@gmail.com', 'Menikah', ''),
('12367', 'admin', '', 'slamet', 'Laki-Laki', 'pkl', '1970-02-23', '', 'Islam', 'bojong', '31637208', 'slamet@gmail.com', 'Menikah', ''),
('657', '9', '', '10', 'Laki-Laki', '11', '0000-00-00', '', 'Islam', '14', '12', '13', 'Belum Menikah', '12'),
('123321', 'admin', 'VII1', 'diyah', 'Laki-Laki', 'semarang', '0000-00-00', '', 'Islam', 'semarang', '123', 'diyah@gmail.com', 'Belum Menikah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_jadwal_pelajaran`
--

CREATE TABLE `rb_jadwal_pelajaran` (
  `kodejdwl` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_pelajaran` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `hari` varchar(20) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_jadwal_pelajaran`
--

INSERT INTO `rb_jadwal_pelajaran` (`kodejdwl`, `id_tahun_akademik`, `kode_kelas`, `kode_pelajaran`, `nip`, `jam_mulai`, `jam_selesai`, `hari`, `aktif`) VALUES
(1, 2018, 'VII1', 'P01', '1234567890', '00:00:00', '00:00:00', 'Kamis', 'Ya'),
(2, 2018, 'VII1', 'P01', '1234567890', '00:00:00', '00:00:00', 'Kamis', 'Ya'),
(3, 2018, 'VII1', 'admin1', '12345678903', '09:24:08', '09:24:08', 'Senin', 'Ya'),
(4, 2014, 'VII1', 'admin1', '12345678903', '09:24:28', '09:24:28', 'Senin', 'Ya'),
(5, 2018, 'VIIA', 'P03', '3333333', '07:05:00', '08:10:00', 'Senin', 'Ya'),
(6, 2018, 'VII1', 'P01', '1234567890', '17:08:20', '17:08:20', 'Senin', 'Ya'),
(7, 2018, 'VII1', 'P01', '1234567890', '17:09:05', '17:09:05', 'Rabu', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_kehadiran`
--

CREATE TABLE `rb_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `sakit` int(3) DEFAULT NULL,
  `izin` int(3) DEFAULT NULL,
  `alpha` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_kehadiran`
--

INSERT INTO `rb_kehadiran` (`id_kehadiran`, `nisn`, `kode_kelas`, `sakit`, `izin`, `alpha`) VALUES
(2, '4443', 'VII1', 3, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_kelas`
--

CREATE TABLE `rb_kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_kelas`
--

INSERT INTO `rb_kelas` (`kode_kelas`, `nip`, `nama_kelas`, `aktif`) VALUES
('VII1', '1234567890', 'VII.12', 'Ya'),
('VIIA', '555555', 'VIIA', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_kelompok_mata_pelajaran`
--

CREATE TABLE `rb_kelompok_mata_pelajaran` (
  `id_kelompok_mata_pelajaran` int(5) NOT NULL,
  `jenis_kelompok_mata_pelajaran` varchar(50) NOT NULL,
  `nama_kelompok_mata_pelajaran` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_kelompok_mata_pelajaran`
--

INSERT INTO `rb_kelompok_mata_pelajaran` (`id_kelompok_mata_pelajaran`, `jenis_kelompok_mata_pelajaran`, `nama_kelompok_mata_pelajaran`) VALUES
(1, 'C', 'Kelompok C (KET'),
(2, 'B', 'Kelompok B (PEN'),
(3, 'A', 'Kelompok A (SIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_mata_pelajaran`
--

CREATE TABLE `rb_mata_pelajaran` (
  `kode_pelajaran` varchar(20) NOT NULL,
  `kelompok_mata_pelajaran` int(3) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `namamatapelajaran` varchar(25) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `kompetensi_umum` text NOT NULL,
  `kompetensi_khusus` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_mata_pelajaran`
--

INSERT INTO `rb_mata_pelajaran` (`kode_pelajaran`, `kelompok_mata_pelajaran`, `nip`, `namamatapelajaran`, `tingkat`, `kompetensi_umum`, `kompetensi_khusus`, `aktif`) VALUES
('P01', 1, '1234567890', 'ADAsa', '1', 'AD', 'FS', 'Ya'),
('admin1', 1, '1234567890', 'FFF', '1', 'FFSD', 'S', 'Ya'),
('P02', 0, '555555', 'IPA', '1', '', '', 'Ya'),
('P03', 0, '3333333', 'Matematika', '1', '', '', 'Ya'),
('C02', 0, '12367', 'Seni Budaya', '1', '', '', 'Ya'),
('12', 0, '1112222', 's', '22', 'JURUSAN', 'KK', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_extrakulikuler`
--

CREATE TABLE `rb_nilai_extrakulikuler` (
  `id_nilai_extrakulikuler` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kegiatan` text NOT NULL,
  `nilai` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_extrakulikuler`
--

INSERT INTO `rb_nilai_extrakulikuler` (`id_nilai_extrakulikuler`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `kegiatan`, `nilai`, `deskripsi`, `user_akses`, `waktu_input`) VALUES
(1, 20161, '9991268756', 'X.MIPA.1', 'Kegiatan Mandi-mandii', 87, 'Kegiatan mandi-mandi dilaksanakan di lubuak minturun bersamaan dengan perayaan ulang tahun sekolah.', '1', '2016-04-29 10:11:10'),
(2, 20161, '9991268756', 'X.MIPA.1', 'Kegiatan Bakar ayam.', 95, 'Memiliki keterampilan Mengidentifikasi, menyajikan model matematika dan menyelesaikan masalah keseharian.				', '1', '2016-04-29 07:08:28'),
(7, 2018, '123456789', 'VII1', 'dsa', 56, 'vd', '2', '2019-06-09 11:19:51'),
(8, 2018, '123456789', 'VII1', 'dsa', 56, 'vd', '2', '2019-06-09 11:30:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_keterampilan`
--

CREATE TABLE `rb_nilai_keterampilan` (
  `id_nilai_keterampilan` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kd` varchar(5) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_keterampilan`
--

INSERT INTO `rb_nilai_keterampilan` (`id_nilai_keterampilan`, `kodejdwl`, `nisn`, `kd`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `deskripsi`, `user_akses`, `waktu`) VALUES
(1, 5, '9991268756', '4.1', 75, 70, 78, 85, 'Mengabstraksi teks cerita pendek, baik secara lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(2, 5, '9998218087', '1', 88, 90, 98, 96, '', '1', '2016-04-11 18:26:32'),
(3, 5, '9998215055', '1', 67, 98, 76, 90, '', '1', '2016-04-11 18:26:32'),
(4, 5, '9998214335', '1', 87, 88, 0, 0, '', '1', '2016-04-11 18:26:32'),
(5, 5, '9998214151', '1', 89, 0, 0, 90, '', '1', '2016-04-11 18:26:32'),
(6, 5, '9997515863', '1', 89, 80, 88, 0, '', '1', '2016-04-11 18:26:32'),
(7, 5, '9991268756', '4.2', 87, 90, 94, 93, 'Mengabstraksi teks cerita ulang, baik secara lisan maupun tulisan ', '1', '2016-04-14 08:03:27'),
(8, 5, '9998218087', '2', 88, 93, 90, 99, '', '1', '2016-04-14 08:03:27'),
(9, 5, '9998215055', '2', 78, 87, 89, 79, '', '1', '2016-04-14 08:03:27'),
(10, 5, '9991268756', '4.3', 89, 89, 98, 95, 'Mengabstraksi teks pantun, baik secara lisan maupun tulisan', '1', '2016-04-14 08:03:57'),
(11, 5, '9998218087', '3', 78, 87, 89, 88, '', '1', '2016-04-14 08:03:57'),
(12, 5, '9998215055', '3', 70, 78, 87, 90, '', '1', '2016-04-14 08:03:57'),
(13, 5, '9991268756', '4.4', 90, 89, 87, 90, 'Menginterpretasi makna teks pantun, baik secara lisan maupun tulisan ', '1', '2016-04-14 08:04:20'),
(14, 5, '9998218087', '4', 87, 88, 83, 89, '', '1', '2016-04-14 08:04:20'),
(15, 5, '9991268756', '4.5', 99, 87, 98, 95, 'Menyunting teks cerita ulang, sesuai dengan struktur dan kaidah teks baik secara lisan maupun tulisan', '1', '2016-04-14 08:04:36'),
(17, 3, '123456789', '1', 75, 80, 80, 75, 'sads', '2', '2019-04-24 11:30:21'),
(18, 3, '123456789', '2', 45, 95, 90, 85, 'adr', '2', '2019-04-24 11:30:39'),
(19, 3, '321', '1', 80, 90, 90, 90, 'ssa', '2', '2019-04-24 11:32:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_pengetahuan`
--

CREATE TABLE `rb_nilai_pengetahuan` (
  `id_nilai_pengetahuan` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kd` varchar(5) NOT NULL,
  `nilai1` float NOT NULL,
  `nilai2` float NOT NULL,
  `nilai3` float NOT NULL,
  `nilai4` float NOT NULL,
  `deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_pengetahuan`
--

INSERT INTO `rb_nilai_pengetahuan` (`id_nilai_pengetahuan`, `kodejdwl`, `nisn`, `kd`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `deskripsi`, `user_akses`, `waktu`) VALUES
(1, 5, '9991268756', '4.1', 89, 90, 89, 95, 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(2, 5, '9998218087', '4.1', 90, 88, 90, 98, 'Menganalisis teks cerita pendek, baik melalui lisan maupun tulisan ', '1', '2016-04-11 18:26:32'),
(3, 5, '9998215055', '', 98, 67, 98, 76, '', '1', '2016-04-11 18:26:32'),
(4, 5, '9998214335', '', 88, 87, 88, 0, '', '1', '2016-04-11 18:26:32'),
(5, 5, '9998214151', '', 0, 89, 0, 0, '', '1', '2016-04-11 18:26:32'),
(6, 5, '9997515863', '', 80, 89, 80, 88, '', '1', '2016-04-11 18:26:32'),
(7, 5, '9991268756', '4.2', 90, 87, 90, 94, 'Membandingkan teks cerita pendek, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:03:27'),
(8, 5, '9998218087', '4.2', 93, 88, 93, 90, 'Menganalisis teks cerita ulang, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:03:27'),
(9, 5, '9998215055', '', 87, 78, 87, 89, '', '1', '2016-04-14 08:03:27'),
(10, 5, '9991268756', '4.3', 89, 89, 89, 98, 'Menganalisis teks pantun, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:03:57'),
(11, 5, '9998218087', '', 87, 78, 87, 89, '', '1', '2016-04-14 08:03:57'),
(12, 5, '9998215055', '', 78, 70, 78, 87, '', '1', '2016-04-14 08:03:57'),
(13, 5, '9991268756', '4.4', 89, 90, 89, 87, 'Membandingkan teks cerita ulang, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:04:20'),
(14, 5, '9998218087', '', 88, 87, 88, 83, '', '1', '2016-04-14 08:04:20'),
(15, 5, '9991268756', '4.5', 87, 90, 87, 78, 'Menganalisis teks cerita ulang, baik melalui lisan maupun tulisan ', '1', '2016-04-14 08:04:36'),
(16, 5, '9998218087', '', 98, 99, 98, 89, 'Menganalisis teks pantun, baik melalui lisan maupun tulisan', '1', '2016-04-14 08:04:36'),
(18, 5, '9991268756', '4.6', 90, 89, 90, 98, 'Memahami struktur dan kaidah teks cerita pendek, baik melalui lisan maupun tulisan', '1', '2016-04-30 10:50:43'),
(19, 3, '123456789', '1', 70, 80, 70, 80, 'sad', '2', '2019-04-24 11:35:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_prestasi`
--

CREATE TABLE `rb_nilai_prestasi` (
  `id_nilai_prestasi` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `jenis_kegiatan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_prestasi`
--

INSERT INTO `rb_nilai_prestasi` (`id_nilai_prestasi`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `jenis_kegiatan`, `keterangan`, `user_akses`, `waktu_input`) VALUES
(2, 20161, '9991268756', 'X.MIPA.1', 'Kegiatan Jalan-jalan sore', 'Memiliki keterampilan merencanakan dan melaksanakan percobaan interferensi gelombang cahaya 				', '1', '2016-04-29 08:09:42'),
(7, 0, '123456789', '', '1', '', '123321', '2019-07-03 15:18:38'),
(8, 0, '123456789', '', '1', '', '123321', '2019-07-03 15:21:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_sikap`
--

CREATE TABLE `rb_nilai_sikap` (
  `id_nilai_sikap` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `positif` text NOT NULL,
  `negatif` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('spiritual','sosial') NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_sikap`
--

INSERT INTO `rb_nilai_sikap` (`id_nilai_sikap`, `kodejdwl`, `nisn`, `positif`, `negatif`, `deskripsi`, `status`, `user_akses`, `waktu`) VALUES
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
(22, 3, '4443', '7', '8', '9', 'spiritual', '2', '2019-04-24 12:19:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_sikap_semester`
--

CREATE TABLE `rb_nilai_sikap_semester` (
  `id_nilai_sikap_semester` int(10) NOT NULL,
  `id_tahun_akademik` int(5) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `spiritual_predikat` varchar(2) NOT NULL,
  `spiritual_deskripsi` text NOT NULL,
  `sosial_predikat` varchar(2) NOT NULL,
  `sosial_deskripsi` text NOT NULL,
  `user_akses` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_sikap_semester`
--

INSERT INTO `rb_nilai_sikap_semester` (`id_nilai_sikap_semester`, `id_tahun_akademik`, `nisn`, `kode_kelas`, `spiritual_predikat`, `spiritual_deskripsi`, `sosial_predikat`, `sosial_deskripsi`, `user_akses`, `waktu_input`) VALUES
(1, 20161, '9991268756', 'X.MIPA.1', 'A', 'Pertahankan Nilai anda,..', 'B', 'Tingkatkan Nilai anda,..', '1', '2016-04-28 10:10:16'),
(2, 20161, '0151379251', 'X.MIPA.1', 'C', 'Tolong Perbaiki Sikap anda,..', 'D', 'Anda Tidak Berutak,..', '1', '2016-04-28 10:10:16'),
(3, 20161, '0004107204', 'X.MIPA.1', 'A', 'Pertahankan Nilai anda,..', 'C', 'Tolong Perbaiki Sikap anda,..', '1', '2016-04-28 10:10:50'),
(4, 2018, '123456789', 'VII1', 'A', 'sad', 'B', 'ddds', '2', '2019-06-07 09:32:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_nilai_uts`
--

CREATE TABLE `rb_nilai_uts` (
  `id_nilai_uts` int(10) NOT NULL,
  `kodejdwl` int(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `angka_pengetahuan` float NOT NULL,
  `deskripsi_pengetahuan` text NOT NULL,
  `angka_keterampilan` float NOT NULL,
  `deskripsi_keterampilan` text NOT NULL,
  `waktu_input_uts` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_nilai_uts`
--

INSERT INTO `rb_nilai_uts` (`id_nilai_uts`, `kodejdwl`, `nisn`, `angka_pengetahuan`, `deskripsi_pengetahuan`, `angka_keterampilan`, `deskripsi_keterampilan`, `waktu_input_uts`) VALUES
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
(14, 1, '321', 90, '', 60, '', '2019-06-30 17:06:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_predikat`
--

CREATE TABLE `rb_predikat` (
  `id_predikat` int(5) NOT NULL,
  `nilai_a` int(3) NOT NULL,
  `nilai_b` int(3) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_predikat`
--

INSERT INTO `rb_predikat` (`id_predikat`, `nilai_a`, `nilai_b`, `grade`, `keterangan`) VALUES
(1, 50, 59, 'D', 'Kurang'),
(2, 60, 74, 'C', 'Cukup'),
(3, 75, 84, 'B', 'Baik'),
(4, 85, 1001, 'A', 'sangat baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_siswa`
--

CREATE TABLE `rb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_ayah` varchar(35) NOT NULL,
  `no_telpon_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(35) NOT NULL,
  `no_telpon_ibu` varchar(15) NOT NULL,
  `nama_wali` varchar(35) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `status_awal` varchar(20) NOT NULL,
  `status_siswa` enum('Aktif','Tidak Aktif') NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `id_sesi` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_siswa`
--

INSERT INTO `rb_siswa` (`id_siswa`, `password`, `nama`, `jenis_kelamin`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `hp`, `email`, `foto`, `nama_ayah`, `no_telpon_ayah`, `nama_ibu`, `no_telpon_ibu`, `nama_wali`, `angkatan`, `status_awal`, `status_siswa`, `tingkat`, `kode_kelas`, `id_sesi`) VALUES
(1272, 'admin', 'ekodsa', '0', '123456789', 'oiuoiu', '2019-09-09', '0', 'kjbk', 'hkjh', 'kjhkj', '20190702112651-', '1', '2', '3', '4', '5', 1, 'jh', 'Aktif', '', 'VII1', 0),
(1273, 'POSTa', 'POSTb', 'm', '321', 'k', '0000-00-00', 'n', 'Pe', '', 'q', 'j', '', '', '', '', '', 0, 'i', '', '', 'POSTc', 0),
(1274, 'admin', 'admin', 'Laki-Laki', '4443', 'smc', '1998-03-26', '0', 'semarang', 'No Handpone	', 'Alamat Email	', '', '', '', '', '', '', 1, 'ya', 'Aktif', '', 'VII1', 0),
(1275, 'admin', 'galuh', 'Perempuan', '888999', 'pkl', '2005-08-23', 'Islam', 'Perkiringan  Ageng, kajen', '085210649861', 'galuh12@gmail.com', '', '', '', '', '', '', 2018, '', 'Aktif', '', 'VIIA', 0),
(1276, 'admin', 'Viko saputra', 'Laki-Laki', '777555', 'pkl', '2004-06-12', 'Islam', 'desa kulu, kajen', '0853147207733', 'vikoputra@gmail.com', '', '', '', '', '', '', 2018, '', 'Aktif', '', 'VIIB', 0),
(1277, 'admin', 'aldi', 'Laki-Laki', '1234', 'pkl', '2004-08-23', 'Islam', 'kajen', '03763738', 'raka@gmail.com', '', '', '', '', '', '', 2018, '', 'Aktif', '', 'VII1', 0),
(1278, 'admin', 'siti', 'Perempuan', '1235', 'pkl', '2005-02-12', 'Islam', 'kajen', '32528', '@gmail.com', '', '', '', '', '', '', 2018, '', 'Aktif', '', 'VII1', 0),
(1279, 'admin', 'siti', 'Perempuan', '22222', 'pkl', '0000-00-00', 'Islam', 'bojong', '09529', 'siti@gmail.com', '', '', '', '', '', '', 2018, '', 'Aktif', '', 'VII1', 0),
(1280, 'admin', 'popo', 'Laki-Laki', '324234212', 'dsada', '1998-09-09', 'Islam', 'sadas', '131231', 'eko@gmail.com', '', '', '', '', '', '', 2019, 'asd', 'Aktif', '', 'VII1', 0),
(1281, 'admin', 'bisa', 'Laki-Laki', '7853', 'pkl', '0000-00-00', 'Islam', 'as', '12', 'a@gmail.com', '', '1', '2', '3', '4', '5', 1, 's', 'Aktif', '', 'VII1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_tahun_akademik`
--

CREATE TABLE `rb_tahun_akademik` (
  `id_tahun_akademik` int(5) NOT NULL,
  `nama_tahun` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_tahun_akademik`
--

INSERT INTO `rb_tahun_akademik` (`id_tahun_akademik`, `nama_tahun`, `keterangan`, `aktif`) VALUES
(2018, '2018', 'Aktif', 'Ya'),
(2014, '2014', 'Aktif', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_users`
--

CREATE TABLE `rb_users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `rb_users`
--

INSERT INTO `rb_users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telpon`, `jabatan`, `level`, `aktif`) VALUES
(1, '661166', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'Arifin, S.Pd.i', 'arifin@gmail.com', '082128713345', 'kepala sekolah', 'kepala', 'Y'),
(2, 'admin', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'Cicik Anggraeni, S.Pd.i', 'Cicik.Angraeni1@gmail.com', '085268009213', 'Admin', 'superuser', 'Y'),
(107, '', '8d5891b55ccb5f5809559d62af779ae306d2f39b23e0d2508a11e8140b049f003e4004e6f5189b5513d56c1ba75074f9efba4a02b7ab92db43496f426e46075e', '', '', '', '', 'superuser', 'Y'),
(109, '', '8d5891b55ccb5f5809559d62af779ae306d2f39b23e0d2508a11e8140b049f003e4004e6f5189b5513d56c1ba75074f9efba4a02b7ab92db43496f426e46075e', '', '', '', '', 'superuser', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rb_catatan`
--
ALTER TABLE `rb_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `rb_guru`
--
ALTER TABLE `rb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `rb_jadwal_pelajaran`
--
ALTER TABLE `rb_jadwal_pelajaran`
  ADD PRIMARY KEY (`kodejdwl`);

--
-- Indeks untuk tabel `rb_kehadiran`
--
ALTER TABLE `rb_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indeks untuk tabel `rb_kelas`
--
ALTER TABLE `rb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `rb_kelompok_mata_pelajaran`
--
ALTER TABLE `rb_kelompok_mata_pelajaran`
  ADD PRIMARY KEY (`id_kelompok_mata_pelajaran`);

--
-- Indeks untuk tabel `rb_mata_pelajaran`
--
ALTER TABLE `rb_mata_pelajaran`
  ADD PRIMARY KEY (`kode_pelajaran`);

--
-- Indeks untuk tabel `rb_nilai_extrakulikuler`
--
ALTER TABLE `rb_nilai_extrakulikuler`
  ADD PRIMARY KEY (`id_nilai_extrakulikuler`);

--
-- Indeks untuk tabel `rb_nilai_keterampilan`
--
ALTER TABLE `rb_nilai_keterampilan`
  ADD PRIMARY KEY (`id_nilai_keterampilan`);

--
-- Indeks untuk tabel `rb_nilai_pengetahuan`
--
ALTER TABLE `rb_nilai_pengetahuan`
  ADD PRIMARY KEY (`id_nilai_pengetahuan`);

--
-- Indeks untuk tabel `rb_nilai_prestasi`
--
ALTER TABLE `rb_nilai_prestasi`
  ADD PRIMARY KEY (`id_nilai_prestasi`);

--
-- Indeks untuk tabel `rb_nilai_sikap`
--
ALTER TABLE `rb_nilai_sikap`
  ADD PRIMARY KEY (`id_nilai_sikap`);

--
-- Indeks untuk tabel `rb_nilai_sikap_semester`
--
ALTER TABLE `rb_nilai_sikap_semester`
  ADD PRIMARY KEY (`id_nilai_sikap_semester`);

--
-- Indeks untuk tabel `rb_nilai_uts`
--
ALTER TABLE `rb_nilai_uts`
  ADD PRIMARY KEY (`id_nilai_uts`);

--
-- Indeks untuk tabel `rb_predikat`
--
ALTER TABLE `rb_predikat`
  ADD PRIMARY KEY (`id_predikat`);

--
-- Indeks untuk tabel `rb_siswa`
--
ALTER TABLE `rb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `rb_tahun_akademik`
--
ALTER TABLE `rb_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `rb_users`
--
ALTER TABLE `rb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rb_catatan`
--
ALTER TABLE `rb_catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rb_jadwal_pelajaran`
--
ALTER TABLE `rb_jadwal_pelajaran`
  MODIFY `kodejdwl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rb_kehadiran`
--
ALTER TABLE `rb_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rb_kelompok_mata_pelajaran`
--
ALTER TABLE `rb_kelompok_mata_pelajaran`
  MODIFY `id_kelompok_mata_pelajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_extrakulikuler`
--
ALTER TABLE `rb_nilai_extrakulikuler`
  MODIFY `id_nilai_extrakulikuler` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_keterampilan`
--
ALTER TABLE `rb_nilai_keterampilan`
  MODIFY `id_nilai_keterampilan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_pengetahuan`
--
ALTER TABLE `rb_nilai_pengetahuan`
  MODIFY `id_nilai_pengetahuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_prestasi`
--
ALTER TABLE `rb_nilai_prestasi`
  MODIFY `id_nilai_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_sikap`
--
ALTER TABLE `rb_nilai_sikap`
  MODIFY `id_nilai_sikap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_sikap_semester`
--
ALTER TABLE `rb_nilai_sikap_semester`
  MODIFY `id_nilai_sikap_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rb_nilai_uts`
--
ALTER TABLE `rb_nilai_uts`
  MODIFY `id_nilai_uts` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rb_predikat`
--
ALTER TABLE `rb_predikat`
  MODIFY `id_predikat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rb_siswa`
--
ALTER TABLE `rb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1282;

--
-- AUTO_INCREMENT untuk tabel `rb_tahun_akademik`
--
ALTER TABLE `rb_tahun_akademik`
  MODIFY `id_tahun_akademik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20164;

--
-- AUTO_INCREMENT untuk tabel `rb_users`
--
ALTER TABLE `rb_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;