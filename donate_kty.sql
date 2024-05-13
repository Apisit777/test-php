-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2024 at 04:48 PM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `donate_kty`
--

-- --------------------------------------------------------

--
-- Table structure for table `trn_dona_tosc_head`
--

CREATE TABLE IF NOT EXISTS `trn_dona_tosc_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันเวลาเปลี่ยนแปลงล่าสุด',
  `blog` varchar(100) NOT NULL COMMENT 'url ภาพกิจกรรม',
  `date_ok` date NOT NULL COMMENT 'วันที่มอบให้รร.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `doc_no` (`doc_no`),
  KEY `tb_id` (`tb_id`),
  KEY `school_id` (`school_id`),
  KEY `doc_datetime` (`doc_datetime`),
  KEY `doc_no_2` (`doc_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `trn_dona_tosc_head`
--

INSERT INTO `trn_dona_tosc_head` (`id`, `doc_datetime`, `doc_no`, `name`, `event`, `flag`, `tb_id`, `school_id`, `member_no`, `id_card`, `vat`, `donate_before`, `do_befor`, `do_reedem`, `do_balance`, `remark`, `date_send`, `status_approve`, `user_approve`, `date_approve`, `reg_user`, `reg_time`, `upd_user`, `upd_time`, `time_up`, `blog`, `date_ok`) VALUES
(1, '0000-00-00 00:00:00', 'SI001150กก', '', '', 'C', 0, 'SI001150', '', '', '0.00', '0.00', '0.00', '1.00', '0.00', '', '0000-00-00', 'N', 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2024-04-03 04:34:32', '', '0000-00-00'),
(2, '2024-04-02 00:00:00', 'RS20240000000076', 'testttt', '', 'C', 120401, 'SI001150', '', '', '0.07', '1.00', '0.00', '1.07', '0.93', '', '0000-00-00', 'N', 'admin', '0000-00-00 00:00:00', 'admin', '2024-04-03 11:31:58', 'admin', '2024-04-03 11:31:58', '2024-04-03 04:43:07', '', '0000-00-00'),
(3, '2024-04-03 00:00:00', 'RS20240000000077', 'test2', '', 'C', 120401, 'SI001150', '', '', '0.07', '1.00', '0.00', '1.07', '0.93', '', '0000-00-00', '', 'admin', '0000-00-00 00:00:00', 'admin', '2024-04-10 10:19:30', 'admin', '2024-04-10 10:19:30', '2024-05-02 08:51:09', '', '0000-00-00'),
(4, '2024-04-18 10:59:55', 'RS20240000000078', '', 'M_to_SC', '', 550902, '0994000047126', '0937955544045', '', '1.40', '20.00', '0.00', '21.40', '21.40', '', '0000-00-00', '', 'admin', '0000-00-00 00:00:00', 'admin', '2024-04-18 10:59:55', 'admin', '2024-04-18 10:59:55', '2024-05-02 08:51:40', '', '0000-00-00'),
(5, '2024-04-24 00:00:00', 'RS20240000000079', 'test', '', '', 450802, '0994000896727', '', '', '0.14', '2.00', '0.00', '2.14', '0.86', '', '0000-00-00', '', '', '0000-00-00 00:00:00', '00c007', '2024-04-24 14:20:58', '00c007', '2024-04-24 14:20:58', '2024-04-24 07:20:58', '', '0000-00-00'),
(6, '2024-04-25 00:00:00', 'RS20240000000080', 'testest', '', '', 711102, '0994002427996', '', '', '1400.00', '20000.00', '0.00', '10700.00', '-10700.00', '', '0000-00-00', '', '', '0000-00-00 00:00:00', '005879', '2024-04-25 16:56:59', 'admin', '2024-05-03 16:42:10', '2024-05-03 09:42:10', '', '0000-00-00'),
(7, '2024-04-25 00:00:00', 'RS20240000000081', 'test222', '', 'C', 711102, '0994002427996', '', '', '1820.04', '26000.50', '0.00', '27820.54', '779.46', '', '0000-00-00', 'N', '005879', '0000-00-00 00:00:00', '005879', '2024-04-25 16:59:30', '005879', '2024-04-25 16:59:30', '2024-04-25 10:00:23', '', '0000-00-00'),
(8, '2024-05-06 00:00:00', 'RS20240000000082', 'testtttt', '', 'C', 190101, '3019200101', '', '', '0.14', '2.00', '0.00', '2.00', '8.00', '', '0000-00-00', 'N', 'admin', '0000-00-00 00:00:00', 'admin', '2024-05-06 14:55:12', 'admin', '2024-05-06 14:55:12', '2024-05-06 08:00:49', '', '0000-00-00'),
(9, '2024-05-06 00:00:00', 'RS20240000000084', 'test2', '', '', 190101, '3019200101', '', '', '0.00', '2.00', '10.00', '1.00', '9.00', '', '2024-05-06', 'Y', 'admin', '2024-05-07 14:33:07', 'admin', '2024-05-06 15:05:47', 'admin', '2024-05-07 14:32:37', '2024-05-07 07:33:07', '', '0000-00-00'),
(10, '2024-05-07 00:00:00', 'RS20240000000085', 'test', '', 'C', 190101, '3019200101', '', '', '0.00', '1.00', '9.00', '1.00', '8.00', '', '0000-00-00', 'N', 'admin', '2024-05-07 14:46:51', 'admin', '2024-05-07 14:42:08', 'admin', '2024-05-07 14:42:08', '2024-05-07 07:46:51', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `trn_dona_tosc_list`
--

CREATE TABLE IF NOT EXISTS `trn_dona_tosc_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `time_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันเวลาเปลี่ยนแปลงล่าสุด',
  PRIMARY KEY (`id`),
  UNIQUE KEY `doc_no` (`doc_no`,`seq`),
  KEY `product_id` (`product_id`),
  KEY `doc_no_2` (`doc_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `trn_dona_tosc_list`
--

INSERT INTO `trn_dona_tosc_list` (`id`, `doc_datetime`, `doc_no`, `flag_st`, `seq`, `product_id`, `request_quantity`, `request_amount`, `request_net`, `quantity`, `amount`, `net`, `remark`, `refer_inv`, `refer_inv_date`, `refer_inv_product`, `reg_user`, `reg_time`, `upd_user`, `upd_time`, `time_up`) VALUES
(1, '2024-04-02 00:00:00', 'RS20240000000076', '', 1, 'P005', 0, '0', '0', 1, '1.00', '1.00', '', '', '0000-00-00', '', 'admin', '2024-04-03 11:31:58', 'admin', '2024-04-03 11:31:58', '2024-04-03 04:31:59'),
(2, '2024-04-03 00:00:00', 'RS20240000000077', '', 1, 'P001', 0, '0', '0', 1, '1.00', '1.00', '11111', '', '0000-00-00', '', 'admin', '2024-04-10 10:19:30', 'admin', '2024-04-10 10:19:30', '2024-04-10 03:19:30'),
(3, '2024-04-18 10:59:55', 'RS20240000000078', '', 1, 'P005', 0, '0', '0', 1, '20.00', '20.00', 'test', '', '0000-00-00', '', 'admin', '2024-04-18 10:59:55', 'admin', '2024-04-18 10:59:55', '2024-04-18 03:59:55'),
(4, '2024-04-24 00:00:00', 'RS20240000000079', '', 1, 'P005', 0, '0', '0', 1, '2.00', '2.00', '', '', '0000-00-00', '', '00c007', '2024-04-24 14:20:58', '00c007', '2024-04-24 14:20:58', '2024-04-24 07:20:59'),
(5, '2024-04-25 00:00:00', 'RS20240000000080', 'C', 1, 'P002', 0, '0', '0', 1, '10000.00', '0.00', 'รร. cancel', 'inv-ddcc', '2024-05-16', '1234d', '005879', '2024-04-25 16:56:59', 'admin', '2024-05-03 17:15:39', '2024-05-03 10:15:39'),
(6, '2024-04-25 00:00:00', 'RS20240000000080', '', 2, 'P003', 0, '0', '0', 1, '10000.00', '10000.00', 'test', 'inv-55566', '2024-05-15', 'testtt', '005879', '2024-04-25 16:56:59', '005879', '2024-05-03 15:46:35', '2024-05-03 08:46:35'),
(7, '2024-04-25 00:00:00', 'RS20240000000081', '', 1, 'P001', 0, '0', '0', 1, '25000.00', '25000.00', 'testtest', '', '0000-00-00', '', '005879', '2024-04-25 16:59:30', '005879', '2024-04-25 16:59:30', '2024-04-25 09:59:30'),
(8, '2024-04-25 00:00:00', 'RS20240000000081', '', 2, 'P002', 0, '0', '0', 1, '1000.50', '1000.50', 'testtt', '', '0000-00-00', '', '005879', '2024-04-25 16:59:30', '005879', '2024-04-25 16:59:30', '2024-04-25 09:59:30'),
(9, '2024-05-06 00:00:00', 'RS20240000000082', '', 1, 'P001', 1, '1', '1', 1, '1.00', '1.00', '', '', '0000-00-00', '', 'admin', '2024-05-06 14:55:12', 'admin', '2024-05-06 14:55:12', '2024-05-06 07:55:12'),
(10, '2024-05-06 00:00:00', 'RS20240000000082', '', 2, 'P002', 1, '1', '1', 1, '1.00', '1.00', '', '', '0000-00-00', '', 'admin', '2024-05-06 14:55:12', 'admin', '2024-05-06 14:55:12', '2024-05-06 07:55:12'),
(11, '2024-05-06 00:00:00', 'RS20240000000084', '', 1, 'P001', 1, '1', '1', 1, '1.00', '0.00', 'รร. ยกเลิก', 'inv111', '2024-05-07', 'tsdfsdf', 'admin', '2024-05-06 15:05:47', 'admin', '2024-05-06 16:05:57', '2024-05-06 09:05:57'),
(12, '2024-05-06 00:00:00', 'RS20240000000084', '', 2, 'P002', 1, '1', '1', 1, '1.00', '1.00', '', '', '0000-00-00', '', 'admin', '2024-05-06 15:05:47', 'admin', '2024-05-06 15:05:47', '2024-05-06 08:05:47'),
(13, '2024-05-07 00:00:00', 'RS20240000000085', '', 1, 'P001', 1, '1', '1', 1, '1.00', '1.00', '', '', '0000-00-00', '', 'admin', '2024-05-07 14:42:08', 'admin', '2024-05-07 14:42:08', '2024-05-07 07:42:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
