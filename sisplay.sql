-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 11:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `maps` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id_info` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `pelayanan` varchar(255) NOT NULL,
  `operational` varchar(255) NOT NULL,
  `organisasi` varchar(255) NOT NULL,
  `running_text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id_poster` int(255) NOT NULL,
  `poster_name` varchar(255) NOT NULL,
  `poster_desc` varchar(255) NOT NULL,
  `poster_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `today_activities`
--

CREATE TABLE `today_activities` (
  `id_act` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name_act` varchar(255) DEFAULT NULL,
  `title_act` varchar(255) NOT NULL,
  `desc_act` varchar(255) NOT NULL,
  `date_act` date NOT NULL,
  `startfrom_act` time NOT NULL,
  `startuntil_act` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `today_activities`
--

INSERT INTO `today_activities` (`id_act`, `user_id`, `name_act`, `title_act`, `desc_act`, `date_act`, `startfrom_act`, `startuntil_act`, `created_at`, `updated_at`) VALUES
(25, 1, 'Kepala Dinas', 'Undangan Penyelenggaraan Informasi Geospasial', ' Hotel Gardenia Resort & Spa', '2021-03-17', '08:12:00', '13:13:00', '2021-03-17 11:13:08', '2021-03-17 11:13:08'),
(26, 1, 'Kabid Ekonomi Kreatif', 'Undangan Jadwal Verifikasi Lapangan Dalam Pemberian Penghargaan Anugerah Parahita Ekapraya', ' R. Pamong Praja 1, Kantor Bupati', '2021-03-17', '07:30:00', '10:00:00', '2021-03-17 11:14:45', '2021-03-17 11:14:45'),
(27, 1, 'Kepala Dinas', 'Undangan Sosialisasi Ketaspenan & Pengenalan Layanan Produk, Program Bank Mandiri', ' Hotel Gardenia Resort & Spa', '2021-03-18', '07:30:00', '10:14:00', '2021-03-17 11:15:46', '2021-03-17 11:15:46'),
(28, 1, 'Kepala Dinas', 'Undangan Konsultasi Publik RKPD 2022 & Forum Lintas SKPD', ' Aula Kantor Bupati Kubu Raya', '2021-03-18', '08:30:00', '15:30:00', '2021-03-17 11:16:50', '2021-03-17 11:16:50'),
(29, 1, 'Kepala Dinas', 'Undangan Konsultasi Publik RKPD 2022 & Forum Lintas SKPD', ' Aula Kantor Bupati Kubu Raya', '2021-03-19', '08:30:00', '15:30:00', '2021-03-17 11:17:29', '2021-03-17 11:17:29'),
(30, 1, 'Kabid Pariwisata', 'Undangan Persiapan Penyusunan Dokumen Evaluasi & Kajian Penilaian Terhadap Peminjaman Kembali Dokumen RT RW Kubu Raya Th.2016-2036', ' Ruang Bidang Penataan Ruang', '2021-03-24', '13:30:00', '15:30:00', '2021-03-17 11:18:50', '2021-03-17 11:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2021-02-23 08:27:48', '2021-02-23 08:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `video_playlist`
--

CREATE TABLE `video_playlist` (
  `id_video` int(255) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `Information_fk0` (`user_id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id_poster`);

--
-- Indexes for table `today_activities`
--
ALTER TABLE `today_activities`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `Today_Activities_fk0` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `video_playlist`
--
ALTER TABLE `video_playlist`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id_info` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id_poster` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `today_activities`
--
ALTER TABLE `today_activities`
  MODIFY `id_act` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_playlist`
--
ALTER TABLE `video_playlist`
  MODIFY `id_video` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `Information_fk0` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `today_activities`
--
ALTER TABLE `today_activities`
  ADD CONSTRAINT `Today_Activities_fk0` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
