-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nip` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` enum('Admin','Kepsek','Wawancara','Bendahara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `nip`, `username`, `password`, `status`) VALUES
(1, 'Admin PPDB', '1234567890', 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 'Admin'),
(2, 'Dra. Hj. Rini Diah Herawati, M.Pd.', '0987654321', 'kepsek', 'd864774465da8063d5944f3a06336bcb', 'Kepsek'),
(3, 'Hj. Riyaningsih, S.Pd.', '02578789897', 'wawancara1', 'e2abbffda15f1a8fbb6a5b643759c3df', 'Wawancara'),
(4, 'Dra. Siti Aminah M.', '1029380123', 'wawancara2', 'faae632d47b78c32375fc20a140a3010', 'Wawancara'),
(5, 'Wasul Nuri, S.Hum.', '18923712', 'wawancara3', '458744cb130bb59922ec6512f0fee268', 'Wawancara'),
(6, 'Ris Arini', '98217319', 'bendahara', '43f052c92eed97d4728d54eed05f73b4', 'Bendahara'),
(7, 'Budi Anduk', '1902381', 'budi', '78e89e19d9992df929e519f197dff64e', 'Admin'),
(8, 'Suziyana, S.Pd.Si.', '0129830912', 'wawancara4', '8898a545720d2c9b7f8b41049360218f', 'Wawancara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya`
--

CREATE TABLE `tb_biaya` (
  `id_biaya` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `biaya` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bls_pesan`
--

CREATE TABLE `tb_bls_pesan` (
  `id_bls_pesan` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_pesan` int(5) NOT NULL,
  `status` text NOT NULL,
  `pesan` text NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bls_pesan`
--

INSERT INTO `tb_bls_pesan` (`id_bls_pesan`, `id_admin`, `id_pesan`, `status`, `pesan`, `tgl_konfirmasi`) VALUES
(2, 1, 2, 'Confirmation', 'Untuk Saat ini belum, masih daring', '2021-01-02 10:20:53'),
(3, 1, 5, 'Confirmation', 'Sekolah dimulai tanggal 4 januari 2020. Dan akan masih daring', '2021-01-02 10:22:15'),
(4, 1, 6, 'Confirmation', 'test`aja deh', '2021-01-10 12:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_catatan_kepsek`
--

CREATE TABLE `tb_catatan_kepsek` (
  `id_catatan_kepsek` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_entry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `informasi` text NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_informasi`, `id_admin`, `informasi`, `tgl_input`) VALUES
(1, 1, 'Apabila calon siswa dinyatakan diterima, mohon sekiranya segera melakukan Wawancara dan Pembayaran', '2021-01-19 13:12:59'),
(3, 1, 'Apabila calon siswa diminta hadir ke sekolah harap menerapkan protokol kesehatan (Jaga Jarak, Mencuci Tangan/Handsanitizer, Memakai Masker, Faceshield, dll)', '2021-01-19 13:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi_pendaftaran`
--

CREATE TABLE `tb_konfirmasi_pendaftaran` (
  `id_konfirmasi_pendaftaran` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `status` text NOT NULL,
  `pesan` text NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfirmasi_pendaftaran`
--

INSERT INTO `tb_konfirmasi_pendaftaran` (`id_konfirmasi_pendaftaran`, `id_admin`, `id_siswa`, `status`, `pesan`, `tgl_konfirmasi`) VALUES
(20, 4, 48, 'Terdaftar', 'Sudah Wawancara', '2021-01-29 13:35:37'),
(22, 4, 40, 'Sedang Diproses', '', '0000-00-00 00:00:00'),
(23, 4, 41, 'Sedang Diproses', '', '0000-00-00 00:00:00'),
(24, 5, 72, 'Sedang Diproses', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `status_verifikasi` text NOT NULL,
  `dana_pendidikan` text NOT NULL,
  `infaq` text NOT NULL,
  `spp` text NOT NULL,
  `angsuran1` text NOT NULL,
  `tgl_angsuran1` text NOT NULL,
  `angsuran2` text NOT NULL,
  `tgl_angsuran2` text NOT NULL,
  `angsuran3` text NOT NULL,
  `tgl_angsuran3` text NOT NULL,
  `angsuran4` text NOT NULL,
  `tgl_angsuran4` text NOT NULL,
  `angsuran5` text NOT NULL,
  `tgl_angsuran5` text NOT NULL,
  `tgl_entry` datetime NOT NULL,
  `status` text NOT NULL,
  `status_pembayaran` text NOT NULL,
  `metode_pembayaran` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_admin`, `id_siswa`, `status_verifikasi`, `dana_pendidikan`, `infaq`, `spp`, `angsuran1`, `tgl_angsuran1`, `angsuran2`, `tgl_angsuran2`, `angsuran3`, `tgl_angsuran3`, `angsuran4`, `tgl_angsuran4`, `angsuran5`, `tgl_angsuran5`, `tgl_entry`, `status`, `status_pembayaran`, `metode_pembayaran`, `jumlah`) VALUES
(14, 4, 48, 'Diterima', 'Rp. 3.800.000', 'Rp. 3.000.000', '450000', 'Rp. 3.000.000', '18-Jan-2021', '', '', '', '', '', '', '', '', '2021-01-29 13:41:37', 'Sudah Diproses', 'Diproses', 'Titip Dana', '7250000'),
(15, 1, 40, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', 'Sedang Diproses', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(5) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `email` text NOT NULL,
  `judul` text NOT NULL,
  `pesan` text NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `nama_lengkap`, `email`, `judul`, `pesan`, `tgl_kirim`, `tgl_konfirmasi`, `status`) VALUES
(1, 'Hariangga Indrajatmiko', 'harianggasukses@gmail.com', 'Menanyakan Perihal Uang SPP', 'Kepada Yth Bapak / Ibu Pimpinan SMP 4 Muhammadiyah<br />\r\nSaya ingin menanyakan terkait<br />\r\n1. Uang SPP perbualan<br />\r\n2. Uang tambahan selama 1 tahun <br />\r\n<br />\r\nTerima kasih ', '2020-12-26 16:43:08', '0000-00-00 00:00:00', 'Confirmation'),
(2, 'Novianti Sukmawati', 'novianti_sukmawati@yahoo.co.id', 'Model Sekolah', 'Halo. Admin<br />\r\nSaya ingin tahu apakah sekolah ini akan menerapkan tatap muka atau sekolah secara daring / online<br />\r\n<br />\r\nTerima kasih atas jawabannya.. :)', '2020-12-26 16:45:11', '0000-00-00 00:00:00', 'Confirmation'),
(4, 'NAMA LENGKAP(Requirded)', '', 'JUDUL PESAN(Requirded)', 'PESAN YANG AKAN DISAMPAIKAN(Requirded)<br />\r\n', '2020-12-29 22:13:06', '0000-00-00 00:00:00', 'Confirmation'),
(5, 'Hariangga Indrajatmiko', 'harianggasukses@gmail.com', 'Kapan Sekolah Dimulai ?', 'Saya ingin bertanya kapan sekolaha akan dimulai ya bapak / ibu', '2021-01-01 21:07:03', '0000-00-00 00:00:00', 'Confirmation'),
(6, 'Budi` a', 'email`a@gmail.com', 'judul`pesan', 'pesan ` yang disampaikan', '2021-01-10 12:43:20', '0000-00-00 00:00:00', 'Confirmation');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(5) NOT NULL,
  `no_pendaftaran` text NOT NULL,
  `nama_siswa` text NOT NULL,
  `nisn` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `agama` text NOT NULL,
  `anak_ke` text NOT NULL,
  `dari` text NOT NULL,
  `status_dalam_keluarga` text NOT NULL,
  `alamat_siswa` text NOT NULL,
  `telepon` text NOT NULL,
  `sekolah_asal` text NOT NULL,
  `nama_sekolah` text NOT NULL,
  `alamat` text NOT NULL,
  `sttb_tahun` text NOT NULL,
  `sttb_nomor` text NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telepon_ortu` text NOT NULL,
  `kerja_ayah` text NOT NULL,
  `kerja_ibu` text NOT NULL,
  `nama_wali` text NOT NULL,
  `alamat_wali` text NOT NULL,
  `telepon_wali` text NOT NULL,
  `pekerjaan_wali` text NOT NULL,
  `foto` text NOT NULL,
  `foto_skhu` text NOT NULL,
  `jumlah_nilai` text NOT NULL,
  `email_aktif` text NOT NULL,
  `kelas` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `tgl_entry` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  `status` text NOT NULL,
  `status_user` enum('Siswa','Null') NOT NULL,
  `auto_id` int(5) NOT NULL,
  `status_pembayaran` text NOT NULL,
  `bind` int(11) NOT NULL,
  `mtk` int(11) NOT NULL,
  `ipa` int(11) NOT NULL,
  `asal_ortu` varchar(50) NOT NULL,
  `asal_lain` varchar(50) NOT NULL,
  `domisili_siswa` varchar(100) NOT NULL,
  `domisili_ortu` varchar(100) NOT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `no_pendaftaran`, `nama_siswa`, `nisn`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `dari`, `status_dalam_keluarga`, `alamat_siswa`, `telepon`, `sekolah_asal`, `nama_sekolah`, `alamat`, `sttb_tahun`, `sttb_nomor`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `telepon_ortu`, `kerja_ayah`, `kerja_ibu`, `nama_wali`, `alamat_wali`, `telepon_wali`, `pekerjaan_wali`, `foto`, `foto_skhu`, `jumlah_nilai`, `email_aktif`, `kelas`, `username`, `password`, `tgl_entry`, `tgl_update`, `status`, `status_user`, `auto_id`, `status_pembayaran`, `bind`, `mtk`, `ipa`, `asal_ortu`, `asal_lain`, `domisili_siswa`, `domisili_ortu`, `golongan_darah`) VALUES
(40, 'PPDB21-001', 'KANAYA ANGGITA MAHARANI', '234', 'YOGYAKARTAA', '1970-01-01', '2', '-', '1', '2', 'Anak Kandung', 'GUNUNGKETUR', '23456', 'SD N BALIREJO', '-', 'BALIREJO', '2021', '345', 'BABE', 'NUBI', 'BANTUL', '890', 'Peg. Swasta', 'Ibu Rumah Tangga', 'AAN', 'BANTUL', '678', 'Wiraswasta', '', '', '250', 'kanaya', 'Regular', 'kanaya', 'a8760058726188d1418b79ba46470559', '2021-01-29 11:12:48', '0000-00-00 00:00:00', 'Baru', 'Siswa', 1, '', 90, 85, 75, '', '', 'GUNUNGKETUR', 'BANTUL', 'A'),
(41, 'PPDB21-002', 'BINTANG RAYHAN KAMIL', '123', 'YOGYAKARTA', '1970-01-01', '1', '-', '1', '2', 'Anak Kandung', 'PAKUALAMAN', '3030', 'SD MUH DANUNEGARAN', '-', 'DANUNEGARAN', '2021', '12', 'ADI', 'IDA', 'PAKUALAMAN', '085228632118', 'Wiraswasta', 'Ibu Rumah Tangga', 'ARI', 'PAKUALAMAN', '081', 'BUMN', '', '', '250', 'bintang', 'Regular', 'bintang', 'e06befd0e008141e9a946364e4e35d5a', '2021-01-29 11:16:12', '0000-00-00 00:00:00', 'Baru', 'Siswa', 2, '', 90, 80, 80, 'jalan', '', 'PAKUALAMAN', 'PAKUALAMAN', 'B'),
(42, 'PPDB21-003', 'MUHAMMAD RAYHAN SETIADIJAYA', '', 'YOGYAKARTA', '2009-11-21', '1', 'Islam', '3', '3', 'Anak Kandung', 'DEMANGAN GK I/79  RT 013/ RW 004 YOGYAKARTA 55221', '081226333479', 'SD MUH SAPEN', '-', 'JL BIMOKURDO NO.33 YOGYAKARTA', '2021', '', 'H.AHMAD RIFAI,S.Ag', 'TRIDASA SEPTIANI,SE', 'DEMANGAN GK I/79  RT 013/ RW 004 YOGYAKARTA 55221', '081226333479', 'PNS', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'rayhan', 'cf83accc66085b4acf225c8800d1773e', '2021-01-29 11:35:56', '2021-01-29 11:44:01', 'Baru', 'Siswa', 3, '', 0, 0, 0, 'Yogyakarta', '', 'DEMANGAN GK I/79  RT 013/ RW 004 YOGYAKARTA 55221', 'DEMANGAN GK I/79  RT 013/ RW 004 YOGYAKARTA 55221', ''),
(44, 'PPDB21-005', 'RETSA ABBY SYAHPUTRA', '', 'YOGYAKARTA', '2009-11-03', '1', 'Islam', '1', '1', 'Anak Kandung', 'KARANGKAJEN 296 YOGYAKARTA', '', 'SD MUH KARANGKAJEN', '-', 'KARANGKAJEN', '2021', '', 'BUDI', 'ANI', 'KARANGKAJEN 296 YOGYAKARTA', '0895391109046', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'retza', '48fb622588a551adefb7d894c3ee3d6e', '2021-01-29 11:56:36', '2021-01-29 12:01:55', 'Baru', 'Siswa', 5, '', 0, 0, 0, 'Yogyakarta', '', 'KARANGKAJEN 296 YOGYAKARTA', 'KARANGKAJEN 296 YOGYAKARTA', 'B'),
(47, 'PPDB21-008', 'DHIA AQEELA SHADY', '123', 'SANGATTA', '2009-04-04', '2', 'Islam', '1', '2', 'Anak Kandung', 'JL. SWADAYA No. 29 RT : 035 KELURAHAN KARANG REJO KECAMATAN BALIKPAPAPAN TENGAH KOTA BALIKPAPAN PROPINSI KALIMANTAN TIMUR', '081807878901', 'SD MUHAMMADIYAH SAPEN', '-', 'Jl. BIMOKURDO SAPEN YOGYAKARTA', '', '', 'TREE SHADY SETYAWAN', 'PUJI ASTUTI', 'JL. SWADAYA No. 29 RT : 035 KELURAHAN KARANG REJO KECAMATAN BALIKPAPAPAN TENGAH KOTA BALIKPAPAN PROPINSI KALIMANTAN TIMUR', '081807878901', 'Peg. Swasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'aqeela', '2c91a5cf2d2a5f42aebee8a935c3bf4f', '2021-01-29 12:33:57', '2021-01-29 12:50:59', 'Baru', 'Siswa', 8, '', 0, 0, 0, 'Lainnya', 'KALIMANTAN TIMUR', 'KUTAN RT 06 JATIREJO, LENDAH, KULON PROGO', 'KUTAN RT 06 JATIREJO, LENDAH, KULON PROGO', 'B'),
(48, 'PPDB21-009', 'RAIHANI ALYA FAUZIAH MACHDUN', '', 'Jakarta', '2021-07-08', '2', 'Islam', '1', '2', 'Anak Kandung', 'Dusun Kaum Rt 005 Rw 004 Panumbangan Kec Panumbangan Kab Ciamis Jawa Barat', '085725145866', 'SD Muhammadiyah Sapen', '-', 'Jl. Bimokurdo No 33 Yogyakarta', '', '', 'Machum Yudhastoro', '-', 'Dusun Kaum Rt 005 Rw 004 Panumbangan Kec Panumbangan Kab Ciamis Jawa Barat', '085725145866', 'Peg. Swasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'ICT', 'raihani', '7fcffefff6b8742b48db8dacb091bf24', '2021-01-29 12:39:02', '2021-01-29 13:23:44', 'Terdaftar', 'Siswa', 9, 'Diterima', 0, 0, 0, 'Lainnya', 'Ciamis', 'Jl. Laksda Adisucipto No 153 Ambarukmo CT Depok Sl', 'Jl. Laksda Adisucipto No 153 Ambarukmo CT Depok Sl', ''),
(49, 'PPDB21-010', 'ALFINO TEDY M', '', '-', '1970-01-01', '1', 'Islam', '1', '1', 'Anak Kandung', 'TAMANAN DS DONOLOYO RT 03  IMOGIRI TIMUR BANTUL', '082117551299', 'SD MUH BODON', '-', '-', '2021', '', '-', '-', 'TAMANAN DS DONOLOYO RT 03  IMOGIRI TIMUR BANTUL', '082117551299', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'alfino', 'a455b8cc9bb68908f465e659c978d119', '2021-01-29 12:42:04', '2021-01-29 12:55:03', 'Baru', 'Siswa', 10, '', 0, 0, 0, 'Yogyakarta', '', 'TAMANAN DS DONOLOYO RT 03  IMOGIRI TIMUR BANTUL', 'TAMANAN DS DONOLOYO RT 03  IMOGIRI TIMUR BANTUL', ''),
(50, 'PPDB21-011', 'ARIKA LATIFAH PUSPAHATI', '0081374316', 'BANTUL', '2008-07-25', '2', 'Islam', '2', '2', 'Anak Kandung', 'SANTAN RT 007, KELURAHAN JAMBIDAN KECAMATAN BANGUNTAPAN KABUPATEN BANTUL KODE POS 55195 PROV. DIY', '08122735101', 'SD MUH BODON', '-', 'BODON, JAGALAN, KOTAGEDE', '', '', 'JOKO WINTOLO', 'NUSANTARI', 'SANTAN RT 007, KELURAHAN JAMBIDAN KECAMATAN BANGUNTAPAN KABUPATEN BANTUL KODE POS 55195 PROV. DIY', '08122735101', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'arika', 'cadb30f55119105630f57f3295fefdbb', '2021-01-29 12:55:18', '2021-01-29 13:37:56', 'Baru', 'Siswa', 11, '', 0, 0, 0, 'Bantul', '', 'SANTAN RT 007, KELURAHAN JAMBIDAN KECAMATAN BANGUN', 'SANTAN RT 007, KELURAHAN JAMBIDAN KECAMATAN BANGUN', ''),
(51, 'PPDB21-012', 'RR SYIFA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'syifa', '17c95ef4bc77b6aa5235963ace9ec18b', '2021-01-29 12:57:05', '0000-00-00 00:00:00', 'Baru', 'Siswa', 12, '', 0, 0, 0, '', '', '', '', NULL),
(52, 'PPDB21-013', 'NISA ARIBA HASANAH', '', '-', '1970-01-01', '2', 'Islam', '1', '1', 'Anak Kandung', 'CELEBAN BARU UH 3/633 YOGYAKARTA', '085102170256', 'SD MUH PAKEL', '-', 'PAKEL', '2021', '', '-', '-', 'CELEBAN BARU UH 3/633 YOGYAKARTA', '085102170256', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'nisa', '8d196080fc71f1b0524188e769f3855d', '2021-01-29 13:00:33', '2021-01-29 13:03:35', 'Baru', 'Siswa', 13, '', 0, 0, 0, 'Yogyakarta', '', 'CELEBAN BARU UH 3/633 YOGYAKARTA', 'CELEBAN BARU UH 3/633 YOGYAKARTA', ''),
(53, 'PPDB21-014', 'KARINA RAHMAWATI', '', '-', '1970-01-01', '2', 'Islam', '1', '1', 'Anak Kandung', 'JL RETNO INTEN  3855 REJOWINANGUN YOGYAKARTA', '085868860363', 'SD MUH SURONATAN', '-', '-', '2021', '', '-', '-', 'JL RETNO INTEN  3855 REJOWINANGUN YOGYAKARTA', '085868860363', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'karina', '65023daf101205ecf0330f8736f45fae', '2021-01-29 13:04:18', '2021-01-29 13:08:33', 'Baru', 'Siswa', 14, '', 0, 0, 0, 'Yogyakarta', '', 'JL RETNO INTEN  3855 REJOWINANGUN YOGYAKARTA', 'JL RETNO INTEN  3855 REJOWINANGUN YOGYAKARTA', ''),
(54, 'PPDB21-015', 'CHALISA IZZATY PUTRI', '1900', 'SIDOARJO', '2009-01-19', '2', 'Islam', '1', '2', 'Anak Kandung', 'JL NAKULO 81 SOKOWATEN PLUMBON RT 003 / RW - BANGUNTAPAN BANTUL 55198', '081804122148', 'SD N SOKOWATEN', '-', 'JL ARIMBI NO 27 BANGUNTAPAN BANTUL ', '2021', '', 'SIGIT NOVIANTO SUHARDI , SE.,M.MT', 'CHRISTINE RATNA PUSPITASARI , SE', 'JL NAKULO 81 SOKOWATEN PLUMBON RT 003 / RW - BANGUNTAPAN BANTUL 55198', '081804122148', 'PNS', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'ICT', 'chalisa', 'f458dfad5825b440d278d8c0e02f438c', '2021-01-29 13:10:34', '2021-01-29 13:16:51', 'Baru', 'Siswa', 15, '', 0, 0, 0, 'Bantul', '', 'JL LARASATI NO 8 SOROWAJAN BARU BANTUL ', 'JL LARASATI NO 8 SOROWAJAN BARU BANTUL ', ''),
(55, 'PPDB21-016', 'JHEVANNO ALLAN WANGSAFYUDIN', '', 'YOGYAKARTA', '2009-02-05', '1', 'Islam', '1', '1', 'Anak Kandung', 'DUSUN CIMANGGU RT 001 / RW 001 , BATULAWANG  , PATURAMAN KOTA BANJAR JAWA BARAT 46326', '085100932290', 'SD MUH SOKONANDI ', '-', '-', '2021', '', 'AGUS SAFYUDIN', 'WIWIK YULIANTI', 'DUSUN CIMANGGU RT 001 / RW 001 , BATULAWANG  , PATURAMAN KOTA BANJAR JAWA BARAT 46326', '085100932290', 'Wiraswasta', 'Wiraswasta', '', '', '', '-', '', '', '', '', 'Regular', 'jhevano', 'e0af67617ccc06d3253eb903cc91f32c', '2021-01-29 13:19:08', '2021-01-29 13:25:11', 'Baru', 'Siswa', 16, '', 0, 0, 0, 'Lainnya', 'JAWABARAT', 'JL GONDOSULI NO 20 B YOGYAKARTA', 'JL GONDOSULI NO 20 B YOGYAKARTA', ''),
(56, 'PPDB21-017', 'KIRANA DESTANA PUSPITA BANGSA', '', '-', '1970-01-01', '2', 'Islam', '1', '1', 'Anak Kandung', '-', '085102145992', 'SD MUH WARUNGBOTO', '-', '-', '2021', '', '-', '-', '-', '085102145992', 'Wiraswasta', 'Wiraswasta', '', '', '', '-', '', '', '', '', 'Regular', 'kirana', '84347c74f4fc50abf9e9f69d970d59a7', '2021-01-29 13:26:52', '2021-01-29 13:28:58', 'Baru', 'Siswa', 17, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(57, 'PPDB21-018', 'M ALFARREL DIDA MAULANA', '', '-', '1970-01-01', '1', 'Islam', '1', '1', 'Anak Kandung', '-', '081329880084', 'SD MUH NITIKAN', '-', '-', '2021', '', '-', '-', '-', '081329880084', 'TNI/POLRI', 'Wiraswasta', '', '', '', '-', '', '', '', '', 'Regular', 'alfarrel', 'e93240e4f3f1f0d80ab0d53e3bfc01f3', '2021-01-29 13:33:27', '2021-01-29 13:35:49', 'Baru', 'Siswa', 18, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(60, 'PPDB21-019', 'RIZKA AYU RAMADHANI', '', '-', '1970-01-01', '2', 'Islam', '-', '-', 'Anak Kandung', '-', '08994139309', 'SD Muhammadiyah Sapen', '-', 'Sapen Yk', '', '', '-', '-', '-', '08994139309', 'Peg. Swasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'rizka', '123ad3ee80d888a855682ab5faac5604', '2021-01-29 13:42:50', '2021-01-29 13:47:09', 'Baru', 'Siswa', 19, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(61, 'PPDB21-020', 'JELITA ANGGRAENI', '', '-', '1970-01-01', '2', 'Islam', '1', '1', 'Anak Kandung', '-', '087739675660', 'SD MUH SAPEN', '-', '-', '2021', '', '-', '-', '-', '087739675660', 'Wiraswasta', 'Wiraswasta', '', '', '', '-', '', '', '', '', 'Regular', 'jelita', '70772b8eee398e98189b2e78083a16d2', '2021-01-29 13:44:44', '2021-01-29 13:51:10', 'Baru', 'Siswa', 20, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(63, 'PPDB21-021', 'AIDHA ASYAFIYAH LATIFAH', '', 'Kebumen', '1970-01-01', '2', 'Islam', '1', '2', 'Anak Kandung', 'Jl. Karangsari Gang Kemuning II Rt 047 Rw 005 Kel Rejowinangaun Kec Kotagede Kab Kota Yogyakarta', '08995245191', 'SD Muhammadiyah Gendeng', '-', 'Gendeng, Gondokusuman, Yogyakarta', '', '', 'Rasidin', 'Lasinem', 'Jl. Karangsari Gang Kemuning II Rt 047 Rw 005 Kel Rejowinangaun Kec Kotagede Kab Kota Yogyakarta', '08995245191', 'Peg. Swasta', 'Peg. Swasta', '', '', '', '-', '', '', '', '', 'Regular', 'aidha', 'c2adced5ed41b89bed2f0abed507abd3', '2021-01-29 13:52:15', '2021-01-29 13:57:06', 'Baru', 'Siswa', 21, '', 0, 0, 0, 'Lainnya', 'Kebumen', 'Jl. Karangsari Gang Kemuning II Rt 047 Rw 005 Kel ', 'Jl. Karangsari Gang Kemuning II Rt 047 Rw 005 Kel ', ''),
(64, 'PPDB21-022', 'RISMA AMELIA', '', '-', '1970-01-01', '2', 'Islam', '1', '1', 'Anak Kandung', 'MINGGIRAN MJ 2 / 1438 RT 58 RW 16  YOGYAKARTA', '08179419893', 'SD N SURYODININGRATAN 1', '-', '-', '2021', '', '-', '-', '-', '-', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'risma', '093362998f21d0bcd92bcea1bf03d610', '2021-01-29 13:53:18', '2021-01-29 13:55:51', 'Baru', 'Siswa', 22, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(65, 'PPDB21-023', 'ARDYTA KUSUMANINGRUM', '718', 'TANAH GROGOT', '2008-08-01', '2', 'Islam', '1', '3', 'Anak Kandung', 'PILAHAN RT 041 RW 013 KELURAHAN REJOWINANGUN KECAMATAN KOTAGEDE  KOTA YOGYAKARTA', '081225612689', 'SD MUH MILIRAN', '-', 'Jl. KENARI 304 MILIRAN YOGYAKARTA', '2021', '', 'TEDDY WINDIARTONO', 'JUANITA INDAH SURYANI PANDHORA', 'PILAHAN RT 041 RW 013 KELURAHAN REJOWINANGUN KECAMATAN KOTAGEDE  KOTA YOGYAKARTA', '081225612689', 'PNS', 'PNS', '', '', '', '-', '', '', '', '', 'Regular', 'ardyta', '5dac837c7346e4c528db297cde0ff3e8', '2021-01-29 13:56:56', '2021-01-29 14:07:46', 'Baru', 'Siswa', 23, '', 0, 0, 0, 'Lainnya', 'KLATEN', 'PILAHAN RT 041 RW 013 KELURAHAN REJOWINANGUN KECAM', 'PILAHAN RT 041 RW 013 KELURAHAN REJOWINANGUN KECAM', ''),
(66, 'PPDB21-024', 'DHIVO PRATAMA HERLAMBANG', '', '-', '1970-01-01', '1', 'Islam', '1', '1', 'Anak Kandung', 'KAUMAN GM I / 182 YOGYAKARTA', '081802797488', 'SD MUH SURYOWIJAYAN', '-', '-', '2021', '', '-', '-', '-', '081802797488', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'dhifo', '0d94a556d2e8b1a545234395e3520aa9', '2021-01-29 13:57:51', '2021-01-29 14:01:00', 'Baru', 'Siswa', 24, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(67, 'PPDB21-025', 'GALUH NADYA SEKARLANGIT', '', 'Kulon Progo', '1970-01-01', '2', 'Islam', '1', '1', 'Anak Kandung', 'Macanan DN.3/418 Rt 023 Rw 006 Bausasran Kec Danurejan Kab Kota Yogyakarta', '081225495249', 'SD Muhammadiyah Karangkajen IV', '-', 'Karangkajen', '', '', 'Budi Marwanto', 'Early Ika Fatmawati', 'Macanan DN.3/418 Rt 023 Rw 006 Bausasran Kec Danurejan Kab Kota Yogyakarta', '081225495249', 'Peg. Swasta', 'Peg. Swasta', '', '', '', '-', '', '', '', '', 'Regular', 'galuh', '631fdc22937136b5952e17c301bf6e12', '2021-01-29 13:59:49', '2021-01-29 14:04:10', 'Baru', 'Siswa', 25, '', 0, 0, 0, 'Lainnya', 'Bekasi', 'Macanan DN.3/418 Rt 023 Rw 006 Bausasran Kec Danur', 'Macanan DN.3/418 Rt 023 Rw 006 Bausasran Kec Danur', ''),
(68, 'PPDB21-026', 'FAUSTA AL GHAZY', '', '-', '1970-01-01', '1', 'Islam', '1', '1', 'Anak Kandung', 'KARANGKAJEN NO 919 RT 51 RW 14 BRONTOKUSUMAN , MERGANGSAN YOGYAKARTA', '081229825077', 'SD MUH KARANGKAJEN', '-', '-', '2021', '', '-', '-', '-', '081229825077', 'Wiraswasta', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'Regular', 'fausta', '3f87cfcc953496d3e53148f5e63f44c3', '2021-01-29 14:01:50', '2021-01-29 14:04:17', 'Baru', 'Siswa', 26, '', 0, 0, 0, 'Yogyakarta', '', '-', '-', ''),
(69, 'PPDB21-027', 'WISNU MAHENDRA WAHYUDI', '', 'BALIKPAPAN', '2009-05-18', '1', 'Islam', '1', '2', 'Anak Kandung', 'JL GURAMI NO.44 RT 047 , RW 012 SOROSUTAN UMBULHARJO YOGYAKARTA 55162', '0274376662', 'SD BUDI MULIA DUA', '-', 'PANJEN WEDOMARTANI NGEMPLAK SLEMAN DIY', '2021', '', 'RACHMAT TRI WAHYUDI', 'SHANTY PRATIWI ,SE', 'JL GURAMI NO.44 RT 047 , RW 012 SOROSUTAN UMBULHARJO YOGYAKARTA 55162', '081254226225', 'BUMN', 'Ibu Rumah Tangga', '', '', '', '-', '', '', '', '', 'ICT', 'wisnu', 'b60fc494af15e87f155333f69a57489f', '2021-01-29 14:05:21', '2021-01-29 14:11:52', 'Baru', 'Siswa', 27, '', 0, 0, 0, 'Lainnya', 'BLORA', 'JL GURAMI NO.44 RT 047 , RW 012 SOROSUTAN UMBULHAR', 'JL GURAMI NO.44 RT 047 , RW 012 SOROSUTAN UMBULHAR', ''),
(70, 'PPDB21-028', 'ALFATIH BAKTI NUSANTARA', '', 'Sleman', '1970-01-01', '1', 'Islam', '1', '4', 'Anak Kandung', 'Berbah Rt 002 rw 001 Kel Kalitirto Kec Berbah Kab Sleman', '08157896569', 'SD Purwodiningratan', '-', 'Purwodiningratan/ Ngampilan Yogyakarta', '', '', 'Hatib Rahmawan, S.Pd', 'Esti Pritantini, SS', 'Berbah Rt 002 rw 001 Kel Kalitirto Kec Berbah Kab Sleman', '08157896569', 'Wiraswasta', 'Guru', '', '', '', '-', '', '', '', '', 'Regular', 'alfatih', '842b64bffff70f5b93492a76c0c72ffa', '2021-01-29 14:06:46', '2021-01-29 14:11:37', 'Baru', 'Siswa', 28, '', 0, 0, 0, 'Lainnya', 'Balikpapan', 'Berbah Rt 002 rw 001 Kel Kalitirto Kec Berbah Kab ', 'Berbah Rt 002 rw 001 Kel Kalitirto Kec Berbah Kab ', ''),
(71, 'PPDB21-029', 'KAUSTA HABIBAH', '', 'BELITUNG', '2008-07-08', '2', 'Islam', '1', '2', 'Anak Kandung', 'Jl. GAMBIRAN No. 96a PANDEYAN UMBULHARJO', '', 'SDN TANJUNG PANDAN', '-', 'TANJUNG PANDAN BELITUNG', '', '', '-', '-', 'Jl. GAMBIRAN No. 96a PANDEYAN UMBULHARJO', '085732474576', 'Wiraswasta', 'Wiraswasta', '', '', '', '-', '', '', '', '', 'Regular', 'kausta', 'c6e3f5e73335f2e85fa0309add85678f', '2021-01-29 14:09:28', '2021-01-29 14:25:16', 'Baru', 'Siswa', 29, '', 0, 0, 0, 'Lainnya', 'BELITUNG', 'Jl. GAMBIRAN No. 96a PANDEYAN UMBULHARJO', 'Jl. GAMBIRAN No. 96a PANDEYAN UMBULHARJO', 'A'),
(72, 'PPDB21-030', 'Coba', '134567', 'Jakarta', '2008-05-20', '1', 'Islam', '2', '2', 'Anak Kandung', 'Tukangan 1 Mendiang', '1234567890', 'SD Tegalpanggung', '-', 'Jl. Tukangan No. 1 Yk', '2021', 'df1987654', 'Triharjo', 'Sutinah', 'Tukangan 1', '9876543210', 'BUMN', 'PNS', 'Suwito', 'Tukangan 1', '8976543210', 'Buruh Harian/Lepas', '', '', '245', 'coba@gmail.com', 'ICT', 'coba', '397b6825778a664f4c3b1b36fac03999', '2021-01-30 17:46:02', '2021-01-30 18:41:15', 'Baru', 'Siswa', 30, '', 88, 90, 88, 'Yogyakarta', '', 'Tukangan 2 Mendiang tenan', 'Tukangan 1', 'A'),
(73, 'PPDB21-031', 'Coba1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'coba1@gmail.com', '', 'coba1', '2ce3f3bd2d1c37733aee2c648b675139', '2021-01-30 19:11:28', '0000-00-00 00:00:00', 'Baru', 'Siswa', 31, '', 0, 0, 0, '', '', '', '', NULL),
(74, 'PPDB21-032', 'anggi mulya', '', 'kerinci', '2023-11-01', '1', 'Islam', '1', '2', 'Anak Kandung', 'jalan', '', 'jalan', '-', 'jaalan', '', '', 'ayah', 'ibu', 'jalan', '088811112222', 'BUMN', 'PNS', '', '', '', '-', '', '', '', 'anggimulya00@gmail.com', 'ICT', 'angga', 'b714337aa8007c433329ef43c7b8252c', '2023-11-13 07:46:51', '2023-11-13 08:21:09', 'Baru', 'Siswa', 32, '', 0, 0, 0, 'jalan', '', 'jalan', 'jalan', 'A'),
(75, 'PPDB21-033', 'anggi mulya', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12150312142@students.uin-suska.ac.id', '', 'anggi', '700c8b805a3e2a265b01c77614cd8b21', '2023-12-07 21:43:17', '0000-00-00 00:00:00', 'Baru', 'Siswa', 33, '', 0, 0, 0, '', '', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tb_bls_pesan`
--
ALTER TABLE `tb_bls_pesan`
  ADD PRIMARY KEY (`id_bls_pesan`);

--
-- Indexes for table `tb_catatan_kepsek`
--
ALTER TABLE `tb_catatan_kepsek`
  ADD PRIMARY KEY (`id_catatan_kepsek`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `tb_konfirmasi_pendaftaran`
--
ALTER TABLE `tb_konfirmasi_pendaftaran`
  ADD PRIMARY KEY (`id_konfirmasi_pendaftaran`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_biaya`
--
ALTER TABLE `tb_biaya`
  MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bls_pesan`
--
ALTER TABLE `tb_bls_pesan`
  MODIFY `id_bls_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_catatan_kepsek`
--
ALTER TABLE `tb_catatan_kepsek`
  MODIFY `id_catatan_kepsek` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_informasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_konfirmasi_pendaftaran`
--
ALTER TABLE `tb_konfirmasi_pendaftaran`
  MODIFY `id_konfirmasi_pendaftaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
