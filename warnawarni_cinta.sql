-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2022 at 06:44 AM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~bullseye
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warnawarni_cinta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role` enum('admin','validator') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role`, `username`, `password`) VALUES
(1, 'admin', 'baliola', 'W4rn4w4rn1'),
(2, 'validator', 'mimin', 'm1m1nb4l10l4');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `name` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`name`, `account`) VALUES
('bca', '4400.254287'),
('bpd', '0110202146875'),
('qris', 'i4RZTS.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `wallet` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `status` enum('pending','hide','approved') NOT NULL,
  `hide` enum('yes','no') NOT NULL,
  `book_amount` int(11) NOT NULL,
  `priceUnique` int(11) NOT NULL,
  `receive_book` enum('yes','no') NOT NULL,
  `image` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `confirmed_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `wallet`, `email`, `phone_number`, `status`, `hide`, `book_amount`, `priceUnique`, `receive_book`, `image`, `bank`, `created_at`, `confirmed_at`) VALUES
(3, 'Cok wie', '0', 'sarilestarigroup@gmail.com', '081237596826', 'approved', 'no', 1, 500220, 'yes', '624e469fa332f.jpg', 'bca', '2022-04-07 10:04:15', '2022-04-07 11:17:22'),
(13, 'Dewi Rukmini', '0', 'putudewirukmini@gmail.com', '081246752705', 'approved', 'no', 1, 500279, 'yes', '624f8b7526e3c.jpeg', 'qris', '2022-04-08 09:10:13', '2022-04-08 09:13:55'),
(17, 'Agung Ocha', '0', 'gex_ocha@yahoo.com', '081805516384', 'approved', 'no', 1, 500299, 'yes', '6253a940542b5.png', 'bca', '2022-04-11 12:06:24', '2022-04-11 12:49:01'),
(18, 'Putri Widhiastuti', '0', 'dr.iapwidhiastuti@yahoo.com', '08124695325', 'approved', 'no', 1, 500777, 'yes', '6253b230e76e8.jpeg', 'bca', '2022-04-11 12:44:32', '2022-04-11 13:16:31'),
(19, 'Debi Bismark', '0', 'idaayuputudebiyani@yahoo.com', '+628123807380', 'approved', 'no', 1, 500522, 'yes', '6253c18c87ed4.jpeg', 'bca', '2022-04-11 13:50:04', '2022-04-11 13:59:28'),
(20, 'Ni Nyoman Sri Utari', '0', 'sriutari100667@gmail.com', '081338602031', 'approved', 'no', 2, 1000368, 'yes', '6253d10dd8e83.jpeg', 'bpd', '2022-04-11 14:56:13', '2022-04-11 15:01:39'),
(22, 'Ninik kartika', '0', 'ninik.kartika99@gmail.com', '081339579544', 'approved', 'no', 1, 500324, 'yes', '6253d780187e1.jpg', 'bca', '2022-04-11 15:23:44', '2022-04-11 15:27:54'),
(23, 'Swan Dewi', '0', 'dewi_newmelati@yahoo.com', '081239367478', 'approved', 'no', 1, 500459, 'yes', '6253db143375e.jpeg', 'bca', '2022-04-11 15:39:00', '2022-04-12 09:08:48'),
(24, 'Gung Sri', '0', 'sri_wariyani@yahoo.com', '+628123813366', 'approved', 'no', 1, 500344, 'yes', '6253ebc5086a6.jpeg', 'bca', '2022-04-11 16:50:13', '2022-04-12 09:09:02'),
(25, 'Dr. A.A.Mira Yudiani', '0', 'mira.yudiani@gmail.com', '08123617137', 'approved', 'no', 1, 500742, 'yes', '625420a66c939.jpg', 'bca', '2022-04-11 20:35:50', '2022-04-12 09:33:24'),
(28, 'I Gusti Ayu Laxmy saraswaty', '0', 'mahakalisaraswaty@gmail.com', '62818357417', 'approved', 'no', 1, 500511, 'yes', '6254fb9bb95e4.png', 'bpd', '2022-04-12 12:10:03', '2022-04-12 13:16:09'),
(29, 'Igan Raini', '0', 'iganraini1@gmail.com', '087860084883', 'approved', 'no', 1, 500806, 'yes', '62551f0755d68.jpeg', 'bpd', '2022-04-12 14:41:11', '2022-04-12 15:11:04'),
(32, 'AA SG Luna Agastyari', '0', 'lunamantra1@gmail.com', '0811389213', 'approved', 'no', 1, 500893, 'yes', '625520834d2c9.jpeg', 'bca', '2022-04-12 14:47:31', '2022-04-12 15:11:34'),
(33, 'Ni Luh Putu Darmika', '0', 'putudarmika9@gmail.com', '08123917058', 'approved', 'no', 1, 500767, 'yes', '625522175bf34.jpeg', 'bca', '2022-04-12 14:54:15', '2022-04-12 15:11:59'),
(34, 'Ida Ayu Asweni Dewi', '0', 'dewiasweni@yahoo.com', '+6281338646414', 'approved', 'no', 1, 500382, 'yes', '625523dfb20a5.jpeg', 'bpd', '2022-04-12 15:01:51', '2022-04-12 15:12:21'),
(35, 'Ni Luh Putu Andari', '0', 'putuandari77@gmail.com', '+6281238751029', 'approved', 'no', 1, 500846, 'yes', '6255257a261b4.jpeg', 'bca', '2022-04-12 15:08:42', '2022-04-12 15:12:47'),
(36, 'Tita Gayatri', '0', 'titagayatri@gmail.com', '087861759558', 'approved', 'no', 1, 500236, 'yes', '62552cf5c203c.jpeg', 'bca', '2022-04-12 15:40:37', '2022-04-12 15:41:33'),
(37, 'dr. Anak Agung Made Widiasa, Sp.A, MARS', '0', 'gungwid70@yahhoo.co.id', '081337977222', 'approved', 'no', 1, 500364, 'yes', '625603e204700.jpg', 'bpd', '2022-04-13 06:57:38', '2022-04-13 09:56:38'),
(38, 'Era Leys', '0', 'era.leys@gmail.com', '08124040333', 'approved', 'no', 2, 1000000, 'yes', '6256262667040.jpeg', 'bca', '2022-04-13 09:23:50', '2022-04-13 09:57:04'),
(39, 'Dyah Handini', '0', 'dyah.handini@gmail.com', '08113882918', 'approved', 'no', 1, 500359, 'yes', '62562f0cd5b49.jpeg', 'bca', '2022-04-13 10:01:48', '2022-04-13 11:07:11'),
(40, 'Ririn', '0', 'nana.bali@yahoo.com', '081236441849', 'approved', 'no', 1, 500000, 'yes', '62563047670eb.jpeg', 'bca', '2022-04-13 10:07:03', '2022-04-13 11:06:42'),
(41, 'Ida Ayu Astarini', '0', 'iaastarini@unud.ac.id', '+6281337174509', 'approved', 'no', 1, 500655, 'yes', '625666a779143.jpg', 'bpd', '2022-04-13 13:59:03', '2022-04-13 14:20:13'),
(42, 'Ida Ayu Dewi Apriyanti', '0', 'Dewidayu797@gmail.com', '081337311108', 'approved', 'no', 1, 500389, 'yes', '62579a9dd640e.jpg', 'bca', '2022-04-14 11:53:01', '2022-04-14 12:49:06'),
(43, 'Putu ayu ekariyani', '0', 'putuayuekariyani.pa@gmail.com', '081905504868', 'approved', 'no', 1, 500451, 'yes', '6257bbb802068.jpg', 'qris', '2022-04-14 14:14:16', '2022-04-14 14:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'bbb', 'huvyuv@gmail.com', 'bu', '2022-04-04 15:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `uniq_code`
--

CREATE TABLE `uniq_code` (
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uniq_code`
--

INSERT INTO `uniq_code` (`total`) VALUES
(467),
(958),
(676),
(127),
(688),
(959),
(275),
(211),
(626),
(302),
(236),
(501),
(220),
(921),
(607),
(769),
(588),
(806),
(269),
(305),
(919),
(837),
(175),
(190),
(396),
(209),
(893),
(105),
(599),
(293),
(767),
(279),
(975),
(936),
(382),
(756),
(318),
(568),
(299),
(777),
(656),
(573),
(522),
(521),
(107),
(846),
(193),
(394),
(368),
(324),
(128),
(359),
(459),
(989),
(725),
(344),
(907),
(496),
(497),
(697),
(742),
(964),
(431),
(988),
(1000000),
(1000000),
(511),
(372),
(917),
(786),
(371),
(535),
(500806),
(945),
(583),
(364),
(585),
(0),
(655),
(682),
(389),
(840),
(355),
(451),
(827);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
