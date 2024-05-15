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
-- Table structure for table `trn_dona_tosc_head`
--

CREATE TABLE `trn_dona_tosc_head` (
  `id` int(11) NOT NULL,
  `doc_datetime` datetime NOT NULL COMMENT 'วันเวลากิจกรรมบริจาค',
  `doc_no` varchar(50) NOT NULL COMMENT 'เลขที่กิจกรรมบริจาค',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อกิจกรรม',
  `event` varchar(50) NOT NULL COMMENT 'รูปแบบการบริจาค',
  `flag` varchar(2) NOT NULL COMMENT 'C=Cancel',
  `tb_id` int(20) NOT NULL COMMENT 'รหัสตำบล',
  `school_id` varchar(20) NOT NULL COMMENT 'รร.',
  `member_no` varchar(50) NOT NULL,
  `id_card` varchar(50) NOT NULL COMMENT 'รหัส ปชช./Tax ID',
  `vat` decimal(12,2) NOT NULL COMMENT 'vat',
  `donate_before` decimal(12,2) NOT NULL COMMENT 'ยอดก่อน vat',
  `do_befor` decimal(12,2) NOT NULL COMMENT 'ยอดบริจาคเริ่ม',
  `do_reedem` decimal(12,2) NOT NULL COMMENT 'ยอดบริจาคให้ รร',
  `do_balance` decimal(12,2) NOT NULL COMMENT 'ยอดบริจาคคงเหลือ',
  `remark` varchar(200) NOT NULL,
  `date_send` date NOT NULL COMMENT 'วันที่ส่งมอมให้ รร',
  `status_approve` varchar(2) NOT NULL COMMENT 'Y=อนุมัติ,N=ไม่อนุมัติ',
  `user_approve` varchar(20) NOT NULL COMMENT 'รหัสผู้อนุมัติ',
  `date_approve` datetime NOT NULL COMMENT 'วันเวลาอนุมัติ',
  `reg_user` varchar(50) NOT NULL COMMENT 'รหัสผู้สร้างrecord',
  `reg_time` datetime NOT NULL COMMENT 'วันเวลาสร้างrecord',
  `upd_user` varchar(50) NOT NULL COMMENT 'รหัสผู้update record',
  `upd_time` datetime NOT NULL COMMENT 'วันเวลาผู้update record',
  `time_up` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันเวลาเปลี่ยนแปลงล่าสุด',
  `blog` varchar(100) NOT NULL COMMENT 'url ภาพกิจกรรม',
  `date_ok` date NOT NULL COMMENT 'วันที่มอบให้รร.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trn_dona_tosc_head`
--

INSERT INTO `trn_dona_tosc_head` (`id`, `doc_datetime`, `doc_no`, `name`, `event`, `flag`, `tb_id`, `school_id`, `member_no`, `id_card`, `vat`, `donate_before`, `do_befor`, `do_reedem`, `do_balance`, `remark`, `date_send`, `status_approve`, `user_approve`, `date_approve`, `reg_user`, `reg_time`, `upd_user`, `upd_time`, `time_up`, `blog`, `date_ok`) VALUES
(1, '0000-00-00 00:00:00', 'RS20240000000075', '', '', 'C', 0, '1573072001', '', '', 0.00, 0.00, 0.00, 1.00, 0.00, '', '0000-00-00', 'N', 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2024-05-15 07:07:50', '', '0000-00-00'),
(2, '2024-04-02 00:00:00', 'RS20240000000076', 'testttt', '', 'C', 120401, '1410491501', '', '', 0.07, 1.00, 0.00, 1.07, 0.93, '', '0000-00-00', 'N', 'admin', '0000-00-00 00:00:00', 'admin', '2024-04-03 11:31:58', 'admin', '2024-04-03 11:31:58', '2024-05-15 07:08:25', '', '0000-00-00'),
(3, '2024-04-03 00:00:00', 'RS20240000000077', 'test2', '', 'C', 120401, '1414011202', '', '', 0.07, 1.00, 0.00, 1.07, 0.93, '', '0000-00-00', '', 'admin', '0000-00-00 00:00:00', 'admin', '2024-04-10 10:19:30', 'admin', '2024-04-10 10:19:30', '2024-05-15 07:08:35', '', '0000-00-00'),
(4, '2024-04-18 10:59:55', 'RS20240000000078', '', 'M_to_SC', '', 550902, '1414011201', '0937955544045', '', 1.40, 20.00, 0.00, 21.40, 21.40, '', '0000-00-00', '', 'admin', '0000-00-00 00:00:00', 'admin', '2024-04-18 10:59:55', 'admin', '2024-04-18 10:59:55', '2024-05-15 07:08:46', '', '0000-00-00'),
(5, '2024-04-24 00:00:00', 'RS20240000000079', 'test', '', '', 450802, '1410051202', '', '', 0.14, 2.00, 0.00, 2.14, 0.86, '', '0000-00-00', '', '', '0000-00-00 00:00:00', '00c007', '2024-04-24 14:20:58', '00c007', '2024-04-24 14:20:58', '2024-05-15 07:08:58', '', '0000-00-00'),
(6, '2024-04-25 00:00:00', 'RS20240000000080', 'testest', '', '', 711102, '1420011101', '', '', 1400.00, 20000.00, 0.00, 10700.00, -10700.00, '', '0000-00-00', '', '', '0000-00-00 00:00:00', '005879', '2024-04-25 16:56:59', 'admin', '2024-05-03 16:42:10', '2024-05-15 07:09:08', '', '0000-00-00'),
(7, '2024-04-25 00:00:00', 'RS20240000000081', 'test222', '', 'C', 711102, '1410071101', '', '', 1820.04, 26000.50, 0.00, 27820.54, 779.46, '', '0000-00-00', 'N', '005879', '0000-00-00 00:00:00', '005879', '2024-04-25 16:59:30', '005879', '2024-04-25 16:59:30', '2024-05-15 07:09:20', '', '0000-00-00'),
(8, '2024-05-06 00:00:00', 'RS20240000000082', 'testtttt', '', 'C', 190101, '1410071102', '', '', 0.14, 2.00, 0.00, 2.00, 8.00, '', '0000-00-00', 'N', 'admin', '0000-00-00 00:00:00', 'admin', '2024-05-06 14:55:12', 'admin', '2024-05-06 14:55:12', '2024-05-15 07:09:30', '', '0000-00-00'),
(9, '2024-05-06 00:00:00', 'RS20240000000084', 'test2', '', '', 190101, '1413031302', '', '', 0.00, 2.00, 10.00, 1.00, 9.00, '', '2024-05-06', 'Y', 'admin', '2024-05-07 14:33:07', 'admin', '2024-05-06 15:05:47', 'admin', '2024-05-07 14:32:37', '2024-05-15 07:09:40', '', '0000-00-00'),
(10, '2024-05-07 00:00:00', 'RS20240000000085', 'test', '', 'C', 190101, '1414011203', '', '', 0.00, 1.00, 9.00, 1.00, 8.00, '', '0000-00-00', 'N', 'admin', '2024-05-07 14:46:51', 'admin', '2024-05-07 14:42:08', 'admin', '2024-05-07 14:42:08', '2024-05-15 07:09:55', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trn_dona_tosc_head`
--
ALTER TABLE `trn_dona_tosc_head`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doc_no` (`doc_no`),
  ADD KEY `tb_id` (`tb_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `doc_datetime` (`doc_datetime`),
  ADD KEY `doc_no_2` (`doc_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trn_dona_tosc_head`
--
ALTER TABLE `trn_dona_tosc_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
