-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 09:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` varchar(255) NOT NULL,
  `jenis_fasilitas` varchar(20) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `jenis_fasilitas`, `nama_fasilitas`, `deskripsi`) VALUES
('1618130396', 'KAMAR MANDI HOTEL', 'shower, bak mandi besar,wc duduk', 'bisa air hangat dan dingin untuk mandi keluarga'),
('1625087986', 'KAMAR MANDI HOTEL', 'shower ,Bak mandi kecil', 'shower air biasa untuk perorangan'),
('967424724', 'Kamar mandi umum', 'WC', 'Tersedia Untuk umum bisa untuk buang air besar \r\nbayar seikhlas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `id_hotel` varchar(255) NOT NULL,
  `id_jenis_hotel` varchar(255) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar_hotel` varchar(255) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hotel`
--

INSERT INTO `tb_hotel` (`id_hotel`, `id_jenis_hotel`, `nama_hotel`, `alamat`, `deskripsi`, `gambar_hotel`, `check_in`, `check_out`) VALUES
('1154685796', '1401817247', 'HOTEL KAPSUL BOBOBOX', 'jln alun alun', 'Hotel memiliki bangunan yang menyediakan kamar-kamar untuk para tamu, makanan, minuman, serta fasilitas-fasilitas lain yang diperlukan dan dikelola secara profesional.[1] Inilah yang membuat para tamu menjadi betah untuk bermalam di penginapan tersebut.w', 'NO INTERNET', 'jam 2', 'jam 3'),
('1485653115', '1401817247', 'HOTEL ROYAL GARDEN', 'jln Ahmad Yani', 'Hotel memiliki bangunan yang menyediakan kamar-kamar untuk para tamu, makanan, minuman, serta fasilitas-fasilitas lain yang diperlukan dan dikelola secara profesional.[1] Inilah yang membuat para tamu menjadi betah untuk bermalam di penginapan tersebut.w', 'p', 'jam 4', 'jam 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_hotel`
--

CREATE TABLE `tb_jenis_hotel` (
  `id_jenis_hotel` varchar(255) NOT NULL,
  `nama_jenis_hotel` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_hotel`
--

INSERT INTO `tb_jenis_hotel` (`id_jenis_hotel`, `nama_jenis_hotel`, `deskripsi`) VALUES
('1401817247', 'LUXURY', 'luxury adalah desain yang diaplikasikan pada hunian dan ruangan yang mewah dan properti komersial seperti hotel, restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_tempat_wisata`
--

CREATE TABLE `tb_jenis_tempat_wisata` (
  `id_jenis_tempat_wisata` varchar(255) NOT NULL,
  `nama_jenis_wisata` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_tempat_wisata`
--

INSERT INTO `tb_jenis_tempat_wisata` (`id_jenis_tempat_wisata`, `nama_jenis_wisata`, `deskripsi`) VALUES
('2082074327', 'Alun Alun Kota', 'Taman yang berada di tengah kota malang, dikelilingi masjid agung, sarinah mall, ramayana, dan cukup berjalan sekitar 3 menit menuju matahari dept. Store. Tidak ada tiket masuk. Ada toilet bersih, parkir sepeda motor 2k, mobil 5k'),
('727194123', 'TAMAN KAnak Kanak', 'Taman ini memiliki keunikan yaitu terdapat area pasir pantai dengan tersedianya berbagai mainan sebagai media bermain untuk anak-anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` varchar(255) NOT NULL,
  `id_hotel` varchar(255) NOT NULL,
  `id_fasilitas` varchar(255) NOT NULL,
  `jenis_kamar` varchar(255) NOT NULL,
  `status_kamar` varchar(255) NOT NULL,
  `harga_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `id_hotel`, `id_fasilitas`, `jenis_kamar`, `status_kamar`, `harga_kamar`) VALUES
('1435013694', '1485653115', '1625087986', 'KAMAR VIP', 'OPEN', '4000000'),
('1838988192', '1154685796', '1618130396', 'KAMAR VIP', 'OPEN', '2000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria_hotel`
--

CREATE TABLE `tb_kriteria_hotel` (
  `id_kriteria_hotel` varchar(255) NOT NULL,
  `id_hotel` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kriteria_hotel`
--

INSERT INTO `tb_kriteria_hotel` (`id_kriteria_hotel`, `id_hotel`, `nama`, `rating`, `deskripsi`) VALUES
('2146546186', '1485653115', 'Kriteria bintang 5', '9/10', 'Di malam hari, saya makan prasmanan di hotel. Restoran memiliki lingkungan yang sangat baik dan fasilitas pendukung yang lengkap. kembali lagi lain kali'),
('89480439', '1154685796', 'Kriteria bintang 3', '9 sangat bagus', 'Hotel memiliki bangunan yang menyediakan kamar-kamar untuk para tamu, makanan, minuman, serta fasilitas-fasilitas lain yang diperlukan dan dikelola secara profesional.[1] Inilah yang membuat para tamu menjadi betah untuk bermalam di penginapan tersebut.w');

-- --------------------------------------------------------

--
-- Table structure for table `tb_objek_atraksi`
--

CREATE TABLE `tb_objek_atraksi` (
  `id_objek_atraksi` varchar(255) NOT NULL,
  `id_tempat_wisata` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe_atraksi` varchar(255) NOT NULL,
  `kapasitas_atraksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_objek_atraksi`
--

INSERT INTO `tb_objek_atraksi` (`id_objek_atraksi`, `id_tempat_wisata`, `nama`, `tipe_atraksi`, `kapasitas_atraksi`) VALUES
('1169419415', '1297106499', 'Biang lala', 'Untuk Anak-Anak dan Dewasa', '2 orang'),
('1260709020', '1580837140', 'Ayunan', 'untuk anak anak', '1 orang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesan`
--

CREATE TABLE `tb_pemesan` (
  `id_pemesan` varchar(255) NOT NULL,
  `id_hotel` varchar(255) NOT NULL,
  `id_kamar` varchar(255) NOT NULL,
  `id_tempat_wisata` varchar(255) NOT NULL,
  `id_objek_atraksi` varchar(255) NOT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesan`
--

INSERT INTO `tb_pemesan` (`id_pemesan`, `id_hotel`, `id_kamar`, `id_tempat_wisata`, `id_objek_atraksi`, `id_pengguna`, `alamat`, `no_telp`, `total_harga`, `metode_pembayaran`, `tgl_pesan`) VALUES
('1560807186', '1154685796', '1838988192', '1297106499', '1169419415', '1704417867', 'ds jongbiru', '081920542345', 200000, 'cash', '2023-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `jabatan`, `no_telp`) VALUES
('1704417867', 'Sufiyan Bhekti', 'Panciwar', 'ibuku123', 'pemesan', '08129121209');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` varchar(255) NOT NULL,
  `id_hotel` varchar(255) NOT NULL,
  `id_tempat_wisata` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tanggapan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_hotel`, `id_tempat_wisata`, `nilai`, `tanggapan`, `kategori`, `tgl_penilaian`) VALUES
('124799530', '1154685796', '1297106499', '9/10', 'Tempat Bermainnya Bersih nyaman Hotel nya bagus dan memanjakan mata didalamnya', 'Hotel dan Tempat wisata', '2023-02-23'),
('1430871002', '1485653115', '1580837140', '10/10', 'Di malam hari, saya makan prasmanan di hotel. Restoran memiliki lingkungan yang sangat baik dan fasilitas pendukung yang lengkap. kembali lagi lain kali', 'Hotel dan Tempat wisata', '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat_wisata`
--

CREATE TABLE `tb_tempat_wisata` (
  `id_tempat_wisata` varchar(255) NOT NULL,
  `id_jenis_tempat_wisata` varchar(255) NOT NULL,
  `nama_tempat_wisata` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jam_buka` varchar(255) NOT NULL,
  `jam_tutup` varchar(255) NOT NULL,
  `harga_tiket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tempat_wisata`
--

INSERT INTO `tb_tempat_wisata` (`id_tempat_wisata`, `id_jenis_tempat_wisata`, `nama_tempat_wisata`, `alamat`, `deskripsi`, `jam_buka`, `jam_tutup`, `harga_tiket`) VALUES
('1297106499', '2082074327', 'taman bermain alun alun', 'jln alun alun', 'tempat bermain anak anak dan orang dewasa yang mengasikkan dan banyak wahana', 'jam 8 pagi', 'jam 10 malam', 'gratis'),
('1580837140', '727194123', 'TAMAN TENGAH KOTA', 'jln Suepomo', 'taman bermain anak anak dan orang dewasa yang mengasikkan', 'jam 8 pagi', 'jam 5 sore', '10000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`id_hotel`),
  ADD KEY `id_jenis_hotel` (`id_jenis_hotel`);

--
-- Indexes for table `tb_jenis_hotel`
--
ALTER TABLE `tb_jenis_hotel`
  ADD PRIMARY KEY (`id_jenis_hotel`);

--
-- Indexes for table `tb_jenis_tempat_wisata`
--
ALTER TABLE `tb_jenis_tempat_wisata`
  ADD PRIMARY KEY (`id_jenis_tempat_wisata`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `id_hotel_2` (`id_hotel`);

--
-- Indexes for table `tb_kriteria_hotel`
--
ALTER TABLE `tb_kriteria_hotel`
  ADD PRIMARY KEY (`id_kriteria_hotel`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `tb_objek_atraksi`
--
ALTER TABLE `tb_objek_atraksi`
  ADD PRIMARY KEY (`id_objek_atraksi`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`);

--
-- Indexes for table `tb_pemesan`
--
ALTER TABLE `tb_pemesan`
  ADD PRIMARY KEY (`id_pemesan`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`),
  ADD KEY `id_objek_atraksi` (`id_objek_atraksi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_tempat_wisata` (`id_tempat_wisata`);

--
-- Indexes for table `tb_tempat_wisata`
--
ALTER TABLE `tb_tempat_wisata`
  ADD PRIMARY KEY (`id_tempat_wisata`),
  ADD KEY `id_jenis_tempat_wisata` (`id_jenis_tempat_wisata`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD CONSTRAINT `tb_hotel_ibfk_2` FOREIGN KEY (`id_jenis_hotel`) REFERENCES `tb_jenis_hotel` (`id_jenis_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD CONSTRAINT `tb_kamar_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `tb_hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kamar_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `tb_fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kriteria_hotel`
--
ALTER TABLE `tb_kriteria_hotel`
  ADD CONSTRAINT `hotel` FOREIGN KEY (`id_hotel`) REFERENCES `tb_hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_objek_atraksi`
--
ALTER TABLE `tb_objek_atraksi`
  ADD CONSTRAINT `tb_objek_atraksi_ibfk_1` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tb_tempat_wisata` (`id_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemesan`
--
ALTER TABLE `tb_pemesan`
  ADD CONSTRAINT `tb_pemesan_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `tb_hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesan_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesan_ibfk_3` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tb_tempat_wisata` (`id_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesan_ibfk_4` FOREIGN KEY (`id_objek_atraksi`) REFERENCES `tb_objek_atraksi` (`id_objek_atraksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesan_ibfk_5` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD CONSTRAINT `tb_penilaian_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `tb_hotel` (`id_hotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_ibfk_2` FOREIGN KEY (`id_tempat_wisata`) REFERENCES `tb_tempat_wisata` (`id_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tempat_wisata`
--
ALTER TABLE `tb_tempat_wisata`
  ADD CONSTRAINT `tb_tempat_wisata_ibfk_1` FOREIGN KEY (`id_jenis_tempat_wisata`) REFERENCES `tb_jenis_tempat_wisata` (`id_jenis_tempat_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
