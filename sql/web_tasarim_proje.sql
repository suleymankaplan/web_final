-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2025 at 10:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tasarim_proje`
--

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanicilar_id` int(11) NOT NULL,
  `kullanicilar_isim` varchar(50) NOT NULL,
  `kullanicilar_soyisim` varchar(50) NOT NULL,
  `kullanicilar_mail` varchar(500) NOT NULL,
  `kullanicilar_sifre` varchar(50) NOT NULL,
  `kullanicilar_kayıt_tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanicilar_id`, `kullanicilar_isim`, `kullanicilar_soyisim`, `kullanicilar_mail`, `kullanicilar_sifre`, `kullanicilar_kayıt_tarih`) VALUES
(15, 'süleyman', 'kaplan', 'a', 'a', '2024-12-27 11:35:25'),
(30, 'Ecenur', 'Ektaş', 'ecenurekts1@gmail.com', '12345q', '2025-01-05 16:19:00'),
(31, 'Sultan', 'Tekercioğlu', 'shvada@gmail.com', '1234', '2025-01-07 11:22:59'),
(32, 'Samet', 'Kapan', 'asdasas', '1234', '2025-01-07 11:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_resim` varchar(100) NOT NULL,
  `urun_isim` varchar(100) NOT NULL,
  `urun_fiyat` int(11) NOT NULL,
  `urun_tur` varchar(50) NOT NULL,
  `urun_stok` varchar(50) NOT NULL,
  `urun_renk` varchar(50) NOT NULL,
  `urun_beden_xs` tinyint(4) NOT NULL,
  `urun_beden_s` tinyint(4) NOT NULL,
  `urun_beden_m` tinyint(4) NOT NULL,
  `urun_beden_l` tinyint(4) NOT NULL,
  `urun_beden_xl` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_resim`, `urun_isim`, `urun_fiyat`, `urun_tur`, `urun_stok`, `urun_renk`, `urun_beden_xs`, `urun_beden_s`, `urun_beden_m`, `urun_beden_l`, `urun_beden_xl`) VALUES
(16, 'images/tisort-9-1.webp', 'S-SHOP Oversize Panam Tişört', 799, 'tisort', 'var', 'beyaz', 1, 1, 0, 1, 1),
(17, 'images/hoodie-7-1.webp', 'S-SHOP Oversize Not Another Viral Hoodie', 1699, 'hoodie', 'yok', 'siyah', 0, 0, 0, 0, 0),
(18, 'images/tisort-8-1.webp', 'S-SHOP Oversize Vincent Van Gogh Tişört', 599, 'tisort', 'var', 'beyaz', 1, 0, 1, 1, 0),
(19, 'images/hoodie-8-1.webp', 'S-SHOP Oversize Noctural Hoodie', 1599, 'hoodie', 'var', 'siyah', 1, 1, 1, 1, 1),
(20, 'images/tisort-7-1.webp', 'S-SHOP Oversize Inner Growth Tişört', 699, 'tisort', 'var', 'beyaz', 1, 1, 1, 0, 0),
(21, 'images/hoodie-5-1.webp', 'S-SHOP Oversize BH Hoodie', 1099, 'hoodie', 'var', 'mavi', 0, 1, 1, 1, 0),
(22, 'images/tisort-10-1.webp', 'S-SHOP Oversize Welcome to Capri Tişört', 599, 'tisort', 'var', 'mavi', 1, 0, 1, 1, 1),
(23, 'images/hoodie-6-1.webp', 'S-SHOP Oversize Out of Stock Hoodie', 1899, 'hoodie', 'var', 'sari', 1, 1, 0, 1, 0),
(24, 'images/hoodie-9-1.webp', 'S-SHOP Oversize Room Service Hoodie', 699, 'hoodie', 'var', 'beyaz', 1, 1, 1, 1, 0),
(25, 'images/tisort-1-1.webp', 'S-SHOP Oversize Ramen Tişört', 799, 'tisort', 'var', 'beyaz', 0, 1, 1, 1, 0),
(26, 'images/tisort-2-1.webp', 'S-SHOP Oversize Disco Only Tişört', 899, 'tisort', 'var', 'beyaz', 1, 1, 0, 0, 1),
(27, 'images/hoodie-10-1.webp', 'S-SHOP Oversize West Coast Hoodie', 699, 'hoodie', 'var', 'sari', 1, 0, 1, 1, 0),
(28, 'images/hoodie-1-1.webp', 'S-SHOP Oversize Katana Hoodie', 1699, 'hoodie', 'var', 'siyah', 1, 1, 0, 0, 0),
(29, 'images/tisort-3-1.webp', 'S-SHOP Oversize Margarita Tişört', 699, 'tisort', 'var', 'beyaz', 0, 1, 0, 0, 1),
(30, 'images/hoodie-2-1.webp', 'S-SHOP Oversize Beverage Hoodie', 1399, 'hoodie', 'var', 'siyah', 1, 0, 1, 1, 0),
(31, 'images/tisort-6-1.webp', 'S-SHOP Oversize Basic Crop Tişört', 399, 'tisort', 'var', 'siyah', 1, 1, 1, 0, 1),
(32, 'images/hoodie-3-1.webp', 'S-SHOP Oversize Death Helmet Hoodie', 1299, 'hoodie', 'var', 'siyah', 1, 1, 1, 1, 0),
(33, 'images/tisort-4-1.webp', 'S-SHOP Oversize Fujibayashi Tişört', 899, 'tisort', 'var', 'siyah', 1, 1, 0, 1, 0),
(34, 'images/hoodie-4-1.webp', 'S-SHOP Oversize Afraid of the Dark Hoodie', 2199, 'hoodie', 'var', 'siyah', 1, 0, 1, 1, 0),
(35, 'images/tisort-5-1.webp', 'S-SHOP Oversize Skully\'s Pizzeria Tişört', 699, 'tisort', 'var', 'beyaz', 1, 1, 1, 1, 1),
(44, 'ghggh', 'sjdjsdj', 123, 'asdasd', 'aksdfadf', 'sdf', 0, 1, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanicilar_id`);

--
-- Indexes for table `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanicilar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
