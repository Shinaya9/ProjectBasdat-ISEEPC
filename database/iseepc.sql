-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 04:36 PM
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
-- Database: `iseepc`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `address_id` int(11) NOT NULL,
  `address_uid` varchar(20) NOT NULL,
  `province` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `district` varchar(64) NOT NULL,
  `street` text NOT NULL,
  `postcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`address_id`, `address_uid`, `province`, `city`, `district`, `street`, `postcode`) VALUES
(3, 'darel111', 'jawa barat', 'BOGOR', 'cimangu', 'yang ada mangunya', 618888),
(7, 'Naya123', 'jawa barat', 'jakarta', 'durian runtuh', 'yang ada mangunya', 618899),
(8, 'Naya123', 'Jawa timur', 'Surabaya', 'jtimur', 'jalanantimur', 875656),
(16, 'po', 'Aceh', 'aceh barat', 'kuta aceh', 'puluang', 234567),
(17, 'Nabil123', 'Jawa Barat', 'Bekasi', 'Cibekas', 'yang ada mangunya', 618888),
(19, 'Maya12', 'Jabar', 'jakarta', 'kakak', 'yang ada mangunya', 618888),
(20, 'Maya12', 'jatim', 'aceh barat', 'adik', 'puluang', 234567),
(21, 'sywa', 'Jawa Barat', 'bogor', 'dramaga', 'Wisma sakinah', 618888),
(22, 'sywa', 'Jawa Barat', 'bogor', 'dramaga', 'astri', 618888),
(23, 'Unyil', 'Jawa Barat', 'bogor', 'dramaga', 'astra', 618888);

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `ord_id` int(11) NOT NULL,
  `ord_selleruid` varchar(20) NOT NULL,
  `ord_buyeruid` varchar(20) NOT NULL,
  `ord_pid` int(11) NOT NULL,
  `ord_alamat` varchar(500) NOT NULL,
  `ord_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ord_price` int(11) NOT NULL,
  `ord_statbayar` varchar(20) NOT NULL DEFAULT 'Belum Bayar',
  `ord_stat` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`ord_id`, `ord_selleruid`, `ord_buyeruid`, `ord_pid`, `ord_alamat`, `ord_date`, `ord_price`, `ord_statbayar`, `ord_stat`) VALUES
(16, 'Nabil123', 'darel111', 1, 'apalah, cimangu, bogor, jawa barat, 987654', '2023-12-01 19:58:31', 10000000, 'Sudah Bayar', 'accepted'),
(21, 'darel111', 'Nabil123', 8, 'jalanan, medan utara, Padang, Sumatra Barat, 123456', '2023-12-01 19:58:31', 500000, 'Sudah Bayar', 'accepted'),
(23, 'Naya123', 'darel111', 9, 'yang ada mangunya, cimangu, BOGOR, jawa barat, 618888', '2023-12-01 19:58:31', 10000000, 'Sudah Bayar', 'accepted'),
(24, 'darel111', 'Nabil123', 8, 'yang ada mangunya, cimangu, BOGOR, jawa barat, 618888', '2023-12-02 04:03:35', 500000, 'Sudah Bayar', 'canceled'),
(25, 'po', 'darel111', 13, 'yang ada mangunya, cimangu, BOGOR, jawa barat, 618888', '2023-12-01 19:56:12', 10000000, 'Sudah Bayar', 'pending'),
(26, 'po', 'darel111', 13, 'yang ada mangunya, cimangu, BOGOR, jawa barat, 618888', '2023-12-01 20:42:58', 10000000, 'Sudah Bayar', 'pending'),
(27, 'po', 'po', 13, 'pokoknya rumah ungu aja, apa aja yg ada di aceh, yang ada di aceh, Aceh, 123456', '2023-12-01 21:26:13', 10000000, 'Sudah Bayar', 'pending'),
(28, 'po', 'po', 13, 'pokoknya rumah ungu aja, apa aja yg ada di aceh, yang ada di aceh, Aceh, 123456', '2023-12-01 21:25:45', 10000000, 'Sudah Bayar', 'pending'),
(29, 'Nabil123', 'po', 3, 'puluang, kuta aceh, aceh barat, Aceh, 234567', '2023-12-02 03:09:51', 15000000, 'Refunded', 'canceled'),
(30, 'Naya123', 'po', 9, 'puluang, kuta aceh, aceh barat, Aceh, 234567', '2023-12-01 17:53:29', 10000000, 'Belum Bayar', 'pending'),
(31, 'po', 'Nabil123', 13, 'yang ada mangunya, kirchoff, jakarta, jawa barat, 618888', '2023-12-02 01:39:40', 10000000, 'Sudah Bayar', 'pending'),
(32, 'po', 'Nabil123', 13, 'yang ada mangunya, Cibekas, Bekasi, Jawa Barat, 618888', '2023-12-02 02:30:58', 10000000, 'Sudah Bayar', 'pending'),
(34, 'Nabil123', 'Maya12', 3, 'puluang, adik, aceh barat, jatim, 234567', '2023-12-02 05:34:35', 15000000, 'Refunded', 'canceled'),
(35, 'Naya123', 'Maya12', 9, 'yang ada mangunya, kakak, jakarta, Jabar, 618888', '2023-12-02 05:33:10', 10000000, 'Belum Bayar', 'accepted'),
(36, 'po', 'sywa', 13, 'astri, dramaga, bogor, Jawa Barat, 618888', '2023-12-06 11:40:13', 10000000, 'Refunded', 'canceled'),
(37, 'darel111', 'Naya123', 8, 'yang ada mangunya, durian runtuh, jakarta, jawa barat, 618899', '2023-12-09 18:33:55', 500000, 'Sudah Bayar', 'pending'),
(38, 'po', 'Unyil', 13, 'astra, dramaga, bogor, Jawa Barat, 618888', '2023-12-14 09:24:44', 10000000, 'Sudah Bayar', 'accepted'),
(39, 'Nabil123', 'Unyil', 5, 'jalanantimur, apa aja, Surabaya, Jawa timur, 875656', '2023-12-14 09:25:37', 30000, 'Belum Bayar', 'canceled'),
(40, 'Nabil123', 'Unyil', 3, 'astra, dramaga, bogor, Jawa Barat, 618888', '2023-12-14 09:27:11', 15000000, 'Refunded', 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_uid` varchar(20) NOT NULL,
  `pay_oid` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_method` varchar(64) NOT NULL,
  `pay_stat` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_uid`, `pay_oid`, `pay_amount`, `pay_method`, `pay_stat`) VALUES
(3, 'darel111', 16, 10000000, 'mbanking', 'sudah bayar'),
(8, 'Nabil123', 21, 500000, 'mbanking', 'sudah bayar'),
(10, 'darel111', 23, 10000000, 'mbanking', 'sudah bayar'),
(11, 'darel111', 25, 10000000, 'COD', 'Sudah Bayar'),
(12, 'darel111', 26, 10000000, 'M-banking', 'Sudah Bayar'),
(13, 'po', 28, 10000000, 'COD', 'Sudah Bayar'),
(14, 'po', 27, 10000000, 'M-banking', 'Sudah Bayar'),
(15, 'po', 29, 15000000, 'COD', 'Sudah Bayar'),
(16, 'Nabil123', 31, 10000000, 'COD', 'Sudah Bayar'),
(17, 'Nabil123', 32, 10000000, 'COD', 'Sudah Bayar'),
(18, 'Nabil123', 24, 500000, 'Dana', 'Sudah Bayar'),
(19, 'Maya12', 34, 15000000, 'COD', 'Sudah Bayar'),
(20, 'sywa', 36, 10000000, 'COD', 'Sudah Bayar'),
(21, 'Naya123', 37, 500000, 'COD', 'Sudah Bayar'),
(22, 'Unyil', 38, 10000000, 'M-banking', 'Sudah Bayar'),
(23, 'Unyil', 40, 15000000, 'COD', 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `pc_pid` int(11) NOT NULL,
  `pc_processor` varchar(64) NOT NULL,
  `pc_mem` varchar(64) NOT NULL,
  `pc_storage` varchar(64) NOT NULL,
  `pc_graph` varchar(64) NOT NULL,
  `pc_display` varchar(64) NOT NULL,
  `pc_opsys` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`pc_pid`, `pc_processor`, `pc_mem`, `pc_storage`, `pc_graph`, `pc_display`, `pc_opsys`) VALUES
(1, 'intel core i7', '16GB', 'SSD 500GB', 'Nvidia', 'layar 15,6', 'Windows'),
(3, 'intel core newgen', '32GB', 'HDD 128GB', 'Nvidia RTX', 'layar 16.6\"', 'Windows 11'),
(8, 'rayzen', '100GB', 'SSD 212GB', 'NVIDIA GFORCE', '20', 'windows12'),
(9, 'intel core i7', '100GB', 'SSD 800GB', 'Nvidia RTX', '16', 'Windows 11'),
(13, 'intel core i7', '100GB', 'SSD 1TB', 'Nvidia RTX', '20', 'windows12'),
(14, 'intel core i7', '32GB', 'SSD 1TB', 'Nvidia RTX', 'layar 15,6\"', 'Windows 11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(20) NOT NULL,
  `prd_uid` varchar(20) NOT NULL,
  `prd_name` varchar(64) NOT NULL,
  `prd_condition` varchar(20) NOT NULL,
  `prd_type` varchar(64) NOT NULL,
  `prd_desc` text NOT NULL,
  `prd_price` int(13) NOT NULL,
  `prd_pic` varchar(64) NOT NULL DEFAULT 'NULL.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prd_id`, `prd_uid`, `prd_name`, `prd_condition`, `prd_type`, `prd_desc`, `prd_price`, `prd_pic`) VALUES
(1, 'Nabil123', 'lenovo a30', 'Baru', 'Komputer/Laptop', 'barang bagus, masih ada garansi', 10000000, 'lenovo3.jpg'),
(3, 'Nabil123', 'lenovo S22', 'baru', 'Komputer/Laptop', 'barang baru, impor, garansi 5 tahun', 15000000, 'lenovo2.jpg'),
(5, 'Nabil123', 'headset sumsang 11o', 'lama', 'lainnya', 'udahlah lg BU', 30000, 'NULL.png'),
(8, 'darel111', 'acer', 'baru', 'Komputer/Laptop', 'BELI BANG BELIII', 500000, 'lenovo1.jpg'),
(9, 'Naya123', 'Laptop Ashdaha', 'Baru', 'Komputer/Laptop', 'bang bli bang butuh duid', 10000000, 'asus2.jpg'),
(13, 'po', 'Laptop Anjay Surgawi Ultra ROG', 'Bekas', 'Komputer/Laptop', 'Barang masih bagus untuk digunakan, seken tapi gak seken', 10000000, 'asus1.jpg'),
(14, 'Unyil', 'asus 2023', 'Bekas', 'Komputer/Laptop', 'Barang masih bagus untuk digunakan, seken tapi gak seken dan masih ada garansi', 10000000, 'asus3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` varchar(20) NOT NULL,
  `usr_fname` varchar(64) NOT NULL,
  `usr_lname` varchar(64) NOT NULL,
  `usr_email` varchar(256) NOT NULL,
  `usr_pass` varchar(64) NOT NULL,
  `usr_phonum` varchar(16) NOT NULL,
  `usr_pic` varchar(64) DEFAULT 'NULL.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_fname`, `usr_lname`, `usr_email`, `usr_pass`, `usr_phonum`, `usr_pic`) VALUES
('darel111', 'darel', 'azmi', 'darel123@gmail.com', 'yugy1', '089877654321', 'wallpaperflare.com_wallpaper (4).jpg'),
('Maya12', 'maya', 'sari', 'mayasari12@gmail.com', '12345678', '089765431234', NULL),
('Nabil123', 'Nabil', 'Hamzah', 'nabilaja123@gmail.com', '12345678', '08765432188', 'kucing-outline.png'),
('Naya123', 'shidqi', 'abhinaya', 'shidqiabinaya@gmail.com', '987654321', '0987654321', 'WhatsApp Image 2023-08-20 at 18.53.01.jpeg'),
('po', 'po', 'po', 'popo@gmail.co', '12345678', '089654321543', 'WhatsApp Image 2023-08-20 at 18.53.11.jpeg'),
('sywa', 'nasywa', 'nozumi', 'sywa@gmail.com', '12345678', '081234567822', 'wallpaperflare.com_wallpaper (2).jpg'),
('Unyil', 'unyil', 'baru', 'unyil@gmail.com', '12345678', '0987654323', 'pico_img.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `address_uid` (`address_uid`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `orderan_ibfk_2` (`ord_pid`),
  ADD KEY `orderan_ibfk_1` (`ord_buyeruid`),
  ADD KEY `ord_selleruid` (`ord_selleruid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `pay_uid` (`pay_uid`),
  ADD KEY `pay_oid` (`pay_oid`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`pc_pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `product_ibfk_1` (`prd_uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_id` (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`address_uid`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderan`
--
ALTER TABLE `orderan`
  ADD CONSTRAINT `orderan_ibfk_1` FOREIGN KEY (`ord_buyeruid`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderan_ibfk_2` FOREIGN KEY (`ord_pid`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderan_ibfk_3` FOREIGN KEY (`ord_selleruid`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`pay_uid`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`pay_oid`) REFERENCES `orderan` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`pc_pid`) REFERENCES `product` (`prd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prd_uid`) REFERENCES `user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
