-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 12:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic-laravel-search-school`
--

-- --------------------------------------------------------

--
-- Table structure for table `trn_dona_tosc_list`
--

CREATE TABLE `trn_dona_tosc_list` (
  `id` int(11) NOT NULL,
  `doc_datetime` datetime NOT NULL COMMENT 'วันเวลากิจกรรมบริจาค',
  `doc_no` varchar(50) NOT NULL COMMENT 'เลขที่กิจกรรมบริจาค',
  `flag_st` varchar(5) NOT NULL,
  `seq` int(11) NOT NULL COMMENT 'ลำดับ',
  `product_id` varchar(20) NOT NULL COMMENT 'รหัสรายการ',
  `request_quantity` int(10) NOT NULL COMMENT 'request from school',
  `request_amount` decimal(12,0) NOT NULL COMMENT 'request from school',
  `request_net` decimal(12,0) NOT NULL COMMENT 'request from school',
  `quantity` int(11) NOT NULL COMMENT 'จำนวน',
  `amount` decimal(12,2) NOT NULL COMMENT 'ยอดเงิน',
  `net` decimal(12,2) NOT NULL COMMENT 'ยอดเงินสุทธิ',
  `remark` varchar(500) NOT NULL,
  `refer_inv` varchar(50) NOT NULL,
  `refer_inv_date` date NOT NULL,
  `refer_inv_product` varchar(50) NOT NULL,
  `reg_user` varchar(50) NOT NULL COMMENT 'รหัสผู้สร้างrecord',
  `reg_time` datetime NOT NULL COMMENT 'วันเวลาสร้างrecord',
  `upd_user` varchar(50) NOT NULL COMMENT 'รหัสผู้update record',
  `upd_time` datetime NOT NULL COMMENT 'วันเวลาผู้update record',
  `time_up` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันเวลาเปลี่ยนแปลงล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trn_dona_tosc_list`
--

INSERT INTO `trn_dona_tosc_list` (`id`, `doc_datetime`, `doc_no`, `flag_st`, `seq`, `product_id`, `request_quantity`, `request_amount`, `request_net`, `quantity`, `amount`, `net`, `remark`, `refer_inv`, `refer_inv_date`, `refer_inv_product`, `reg_user`, `reg_time`, `upd_user`, `upd_time`, `time_up`) VALUES
(1, '2024-04-02 00:00:00', 'RS20240000000076', '', 1, 'P005', 0, 0, 0, 1, 1.00, 1.00, '', '', '0000-00-00', '', 'admin', '2024-04-03 11:31:58', 'admin', '2024-04-03 11:31:58', '2024-04-02 21:31:59'),
(2, '2024-04-03 00:00:00', 'RS20240000000077', '', 1, 'P001', 0, 0, 0, 1, 1.00, 1.00, '11111', '', '0000-00-00', '', 'admin', '2024-04-10 10:19:30', 'admin', '2024-04-10 10:19:30', '2024-04-09 20:19:30'),
(3, '2024-04-18 10:59:55', 'RS20240000000078', '', 1, 'P005', 0, 0, 0, 1, 20.00, 20.00, 'test', '', '0000-00-00', '', 'admin', '2024-04-18 10:59:55', 'admin', '2024-04-18 10:59:55', '2024-04-17 20:59:55'),
(4, '2024-04-24 00:00:00', 'RS20240000000079', '', 1, 'P005', 0, 0, 0, 1, 2.00, 2.00, '', '', '0000-00-00', '', '00c007', '2024-04-24 14:20:58', '00c007', '2024-04-24 14:20:58', '2024-04-24 00:20:59'),
(5, '2024-04-25 00:00:00', 'RS20240000000080', 'C', 1, 'P002', 0, 0, 0, 1, 10000.00, 0.00, 'รร. cancel', 'inv-ddcc', '2024-05-16', '1234d', '005879', '2024-04-25 16:56:59', 'admin', '2024-05-03 17:15:39', '2024-05-03 03:15:39'),
(6, '2024-04-25 00:00:00', 'RS20240000000080', '', 2, 'P003', 0, 0, 0, 1, 10000.00, 10000.00, 'test', 'inv-55566', '2024-05-15', 'testtt', '005879', '2024-04-25 16:56:59', '005879', '2024-05-03 15:46:35', '2024-05-03 01:46:35'),
(7, '2024-04-25 00:00:00', 'RS20240000000081', '', 1, 'P001', 0, 0, 0, 1, 25000.00, 25000.00, 'testtest', '', '0000-00-00', '', '005879', '2024-04-25 16:59:30', '005879', '2024-04-25 16:59:30', '2024-04-25 02:59:30'),
(8, '2024-04-25 00:00:00', 'RS20240000000081', '', 2, 'P002', 0, 0, 0, 1, 1000.50, 1000.50, 'testtt', '', '0000-00-00', '', '005879', '2024-04-25 16:59:30', '005879', '2024-04-25 16:59:30', '2024-04-25 02:59:30'),
(9, '2024-05-06 00:00:00', 'RS20240000000082', '', 1, 'P001', 1, 1, 1, 1, 1.00, 1.00, '', '', '0000-00-00', '', 'admin', '2024-05-06 14:55:12', 'admin', '2024-05-06 14:55:12', '2024-05-06 00:55:12'),
(10, '2024-05-06 00:00:00', 'RS20240000000082', '', 2, 'P002', 1, 1, 1, 1, 1.00, 1.00, '', '', '0000-00-00', '', 'admin', '2024-05-06 14:55:12', 'admin', '2024-05-06 14:55:12', '2024-05-06 00:55:12'),
(11, '2024-05-06 00:00:00', 'RS20240000000084', '', 1, 'P001', 1, 1, 1, 1, 1.00, 0.00, 'รร. ยกเลิก', 'inv111', '2024-05-07', 'tsdfsdf', 'admin', '2024-05-06 15:05:47', 'admin', '2024-05-06 16:05:57', '2024-05-06 02:05:57'),
(12, '2024-05-06 00:00:00', 'RS20240000000084', '', 2, 'P002', 1, 1, 1, 1, 1.00, 1.00, '', '', '0000-00-00', '', 'admin', '2024-05-06 15:05:47', 'admin', '2024-05-06 15:05:47', '2024-05-06 01:05:47'),
(13, '2024-05-07 00:00:00', 'RS20240000000085', '', 1, 'P001', 1, 1, 1, 1, 1.00, 1.00, '', '', '0000-00-00', '', 'admin', '2024-05-07 14:42:08', 'admin', '2024-05-07 14:42:08', '2024-05-07 00:42:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trn_dona_tosc_list`
--
ALTER TABLE `trn_dona_tosc_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doc_no` (`doc_no`,`seq`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `doc_no_2` (`doc_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trn_dona_tosc_list`
--
ALTER TABLE `trn_dona_tosc_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
