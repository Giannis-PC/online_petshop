-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2020 at 01:57 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokstoudis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE IF NOT EXISTS `order_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` enum('Κατατέθηκε','Σε επεξεργασία','Απεστάλη','Ολοκληρωμένη') NOT NULL DEFAULT 'Κατατέθηκε',
  PRIMARY KEY (`id`),
  KEY `fk_prod` (`product_id`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `user_id`, `product_id`, `quantity`, `order_date`, `order_time`, `total_cost`, `status`) VALUES
(11, 70, 19, 2, '2020-01-18', '21:18:23', '53.80', 'Ολοκληρωμένη'),
(12, 70, 15, 2, '2020-01-18', '21:18:23', '9.00', 'Ολοκληρωμένη'),
(13, 70, 14, 1, '2020-01-18', '21:18:23', '13.30', 'Ολοκληρωμένη'),
(31, 39, 5, 4, '2020-01-21', '01:10:23', '18.00', 'Ολοκληρωμένη'),
(32, 37, 2, 3, '2020-01-24', '01:11:34', '40.50', 'Ολοκληρωμένη'),
(36, 38, 2, 2, '2020-01-25', '13:20:16', '27.00', 'Ολοκληρωμένη'),
(40, 40, 2, 3, '2020-01-25', '15:51:19', '40.50', 'Ολοκληρωμένη'),
(41, 40, 6, 1, '2020-01-25', '15:51:19', '13.60', 'Ολοκληρωμένη'),
(43, 41, 5, 6, '2020-02-12', '16:02:03', '27.00', 'Ολοκληρωμένη'),
(47, 39, 15, 1, '2020-02-12', '18:49:29', '4.50', 'Ολοκληρωμένη'),
(48, 39, 19, 2, '2020-02-12', '18:49:29', '53.80', 'Ολοκληρωμένη'),
(49, 37, 16, 1, '2020-02-12', '18:53:31', '13.51', 'Ολοκληρωμένη'),
(50, 37, 13, 1, '2020-02-12', '18:53:31', '23.99', 'Ολοκληρωμένη'),
(51, 36, 11, 2, '2020-03-12', '18:56:53', '35.76', 'Ολοκληρωμένη'),
(52, 38, 6, 1, '2020-03-12', '19:30:14', '13.60', 'Ολοκληρωμένη'),
(58, 42, 16, 1, '2020-03-13', '02:14:46', '13.51', 'Ολοκληρωμένη'),
(59, 42, 6, 3, '2020-03-13', '02:14:46', '40.80', 'Ολοκληρωμένη'),
(60, 42, 14, 1, '2020-03-13', '02:14:46', '13.29', 'Ολοκληρωμένη'),
(61, 42, 2, 2, '2020-03-13', '02:14:46', '27.00', 'Ολοκληρωμένη'),
(73, 73, 12, 1, '2020-03-17', '11:03:37', '23.85', 'Ολοκληρωμένη'),
(74, 73, 17, 1, '2020-03-17', '11:03:37', '13.20', 'Ολοκληρωμένη'),
(75, 73, 19, 2, '2020-03-17', '11:03:37', '53.80', 'Ολοκληρωμένη'),
(76, 40, 13, 1, '2020-03-17', '17:13:59', '23.99', 'Ολοκληρωμένη'),
(77, 40, 17, 3, '2020-03-17', '17:13:59', '39.60', 'Ολοκληρωμένη'),
(78, 71, 16, 2, '2020-03-17', '17:31:55', '27.02', 'Ολοκληρωμένη'),
(79, 71, 2, 4, '2020-03-17', '17:31:55', '54.00', 'Ολοκληρωμένη'),
(80, 70, 18, 5, '2020-03-17', '17:33:36', '25.00', 'Ολοκληρωμένη'),
(81, 70, 12, 1, '2020-03-17', '17:33:36', '23.85', 'Ολοκληρωμένη'),
(82, 70, 6, 2, '2020-03-17', '17:33:36', '27.20', 'Ολοκληρωμένη'),
(92, 21, 16, 2, '2020-03-17', '20:15:08', '27.02', 'Ολοκληρωμένη'),
(93, 21, 13, 1, '2020-03-17', '20:15:08', '23.99', 'Ολοκληρωμένη'),
(94, 21, 12, 1, '2020-03-17', '20:15:08', '23.85', 'Ολοκληρωμένη'),
(95, 21, 17, 2, '2020-03-17', '20:15:08', '26.40', 'Ολοκληρωμένη'),
(96, 21, 2, 3, '2020-03-17', '20:15:08', '40.50', 'Ολοκληρωμένη'),
(101, 76, 2, 2, '2020-03-18', '12:38:30', '27.00', 'Ολοκληρωμένη'),
(102, 76, 6, 2, '2020-03-18', '12:38:30', '27.20', 'Ολοκληρωμένη'),
(103, 76, 11, 1, '2020-03-18', '12:38:30', '17.88', 'Ολοκληρωμένη'),
(104, 76, 17, 2, '2020-03-18', '12:38:30', '26.40', 'Ολοκληρωμένη'),
(105, 74, 11, 2, '2020-03-18', '13:00:03', '35.76', 'Ολοκληρωμένη'),
(106, 74, 6, 2, '2020-03-18', '13:00:03', '27.20', 'Ολοκληρωμένη'),
(107, 74, 2, 2, '2020-03-18', '13:00:03', '27.00', 'Ολοκληρωμένη'),
(108, 77, 14, 4, '2020-03-18', '20:19:11', '53.20', 'Ολοκληρωμένη'),
(109, 77, 17, 1, '2020-03-18', '20:19:11', '13.20', 'Ολοκληρωμένη'),
(110, 77, 2, 1, '2020-03-18', '20:19:11', '13.50', 'Ολοκληρωμένη'),
(111, 39, 5, 2, '2020-03-18', '20:23:21', '9.00', 'Ολοκληρωμένη'),
(112, 39, 15, 1, '2020-03-18', '20:23:21', '4.50', 'Ολοκληρωμένη'),
(113, 39, 18, 3, '2020-03-18', '20:23:21', '15.00', 'Ολοκληρωμένη'),
(114, 78, 16, 1, '2020-03-18', '20:52:04', '13.56', 'Ολοκληρωμένη'),
(115, 78, 15, 1, '2020-03-18', '20:52:04', '4.50', 'Ολοκληρωμένη'),
(116, 78, 12, 1, '2020-03-18', '20:52:04', '23.85', 'Ολοκληρωμένη'),
(117, 36, 16, 1, '2020-03-18', '21:14:59', '13.56', 'Ολοκληρωμένη'),
(118, 36, 2, 2, '2020-03-18', '21:14:59', '27.00', 'Ολοκληρωμένη'),
(119, 36, 6, 1, '2020-03-18', '21:14:59', '13.60', 'Ολοκληρωμένη'),
(120, 36, 18, 2, '2020-03-18', '21:14:59', '10.00', 'Ολοκληρωμένη'),
(124, 79, 5, 3, '2020-03-19', '11:09:12', '13.50', 'Ολοκληρωμένη'),
(125, 79, 19, 2, '2020-03-19', '11:09:12', '53.80', 'Ολοκληρωμένη'),
(126, 79, 15, 1, '2020-03-19', '11:09:12', '4.50', 'Ολοκληρωμένη'),
(127, 80, 19, 2, '2020-03-19', '13:47:03', '53.80', 'Ολοκληρωμένη'),
(128, 80, 14, 1, '2020-03-19', '13:47:03', '13.30', 'Ολοκληρωμένη'),
(129, 81, 5, 4, '2020-03-23', '16:13:29', '18.00', 'Ολοκληρωμένη'),
(130, 81, 19, 1, '2020-03-23', '16:13:29', '26.90', 'Ολοκληρωμένη'),
(131, 37, 2, 2, '2020-03-25', '18:51:46', '27.00', 'Ολοκληρωμένη'),
(132, 37, 6, 1, '2020-03-25', '18:51:46', '13.60', 'Ολοκληρωμένη'),
(133, 37, 5, 3, '2020-03-25', '18:51:46', '13.50', 'Ολοκληρωμένη'),
(134, 37, 19, 1, '2020-03-25', '18:51:46', '26.90', 'Ολοκληρωμένη'),
(138, 21, 2, 2, '2020-03-28', '14:39:06', '27.00', 'Ολοκληρωμένη'),
(139, 21, 6, 2, '2020-03-28', '14:39:06', '27.20', 'Ολοκληρωμένη'),
(140, 21, 19, 1, '2020-03-28', '14:39:06', '26.90', 'Ολοκληρωμένη'),
(141, 21, 17, 1, '2020-03-28', '14:39:06', '13.20', 'Ολοκληρωμένη'),
(142, 42, 17, 2, '2020-03-28', '14:41:58', '26.40', 'Ολοκληρωμένη'),
(143, 42, 18, 2, '2020-03-28', '14:41:58', '10.00', 'Ολοκληρωμένη'),
(144, 42, 6, 1, '2020-03-28', '14:41:58', '13.60', 'Ολοκληρωμένη'),
(145, 38, 2, 2, '2020-03-29', '14:00:07', '27.00', 'Ολοκληρωμένη'),
(146, 38, 5, 1, '2020-03-29', '14:00:07', '4.50', 'Ολοκληρωμένη'),
(147, 38, 6, 1, '2020-03-29', '14:00:07', '13.60', 'Ολοκληρωμένη'),
(148, 38, 17, 1, '2020-03-29', '14:00:07', '13.20', 'Ολοκληρωμένη'),
(149, 38, 16, 1, '2020-03-29', '14:00:07', '13.56', 'Ολοκληρωμένη'),
(150, 70, 2, 2, '2020-03-30', '15:29:28', '27.00', 'Ολοκληρωμένη'),
(151, 70, 17, 1, '2020-03-30', '15:29:28', '13.20', 'Ολοκληρωμένη'),
(152, 70, 5, 2, '2020-03-30', '15:29:28', '9.00', 'Ολοκληρωμένη'),
(153, 70, 6, 1, '2020-03-30', '15:29:28', '13.60', 'Ολοκληρωμένη'),
(154, 82, 2, 2, '2020-03-30', '15:35:19', '27.00', 'Ολοκληρωμένη'),
(155, 82, 5, 2, '2020-03-30', '15:35:19', '9.00', 'Ολοκληρωμένη'),
(156, 82, 6, 1, '2020-03-30', '15:35:19', '13.60', 'Ολοκληρωμένη'),
(157, 82, 18, 2, '2020-03-30', '15:35:19', '10.00', 'Ολοκληρωμένη'),
(158, 82, 16, 2, '2020-03-30', '15:35:19', '27.12', 'Ολοκληρωμένη'),
(159, 83, 13, 1, '2020-04-02', '13:56:24', '23.99', 'Ολοκληρωμένη'),
(160, 83, 11, 1, '2020-04-02', '13:56:24', '17.88', 'Ολοκληρωμένη'),
(161, 83, 16, 2, '2020-04-02', '13:56:24', '27.12', 'Ολοκληρωμένη'),
(162, 83, 15, 2, '2020-04-02', '13:56:24', '9.00', 'Ολοκληρωμένη'),
(163, 83, 17, 2, '2020-04-02', '13:56:24', '26.40', 'Ολοκληρωμένη'),
(164, 83, 6, 2, '2020-04-02', '13:56:24', '27.20', 'Ολοκληρωμένη'),
(165, 84, 16, 1, '2020-04-09', '01:43:03', '13.56', 'Ολοκληρωμένη'),
(166, 84, 2, 1, '2020-04-09', '01:43:03', '13.50', 'Ολοκληρωμένη'),
(167, 84, 11, 1, '2020-04-09', '01:43:03', '17.88', 'Ολοκληρωμένη'),
(168, 84, 5, 2, '2020-04-09', '01:43:03', '9.00', 'Ολοκληρωμένη'),
(169, 36, 2, 2, '2020-04-14', '11:20:43', '27.00', 'Ολοκληρωμένη'),
(170, 36, 5, 3, '2020-04-14', '11:20:43', '13.50', 'Ολοκληρωμένη'),
(171, 36, 6, 1, '2020-04-14', '11:20:43', '13.60', 'Ολοκληρωμένη'),
(172, 36, 17, 1, '2020-04-14', '11:20:43', '13.20', 'Ολοκληρωμένη'),
(173, 73, 19, 1, '2020-04-18', '03:30:51', '26.90', 'Ολοκληρωμένη'),
(174, 73, 2, 2, '2020-04-18', '03:30:51', '27.00', 'Ολοκληρωμένη'),
(175, 73, 6, 1, '2020-04-18', '03:30:51', '13.60', 'Ολοκληρωμένη'),
(176, 73, 16, 1, '2020-04-18', '03:30:51', '13.56', 'Ολοκληρωμένη'),
(177, 73, 18, 2, '2020-04-18', '03:30:51', '10.00', 'Ολοκληρωμένη'),
(178, 76, 18, 3, '2020-04-21', '18:30:05', '15.00', 'Ολοκληρωμένη'),
(179, 76, 16, 1, '2020-04-21', '18:30:05', '13.56', 'Ολοκληρωμένη'),
(180, 76, 5, 2, '2020-04-21', '18:30:05', '9.00', 'Ολοκληρωμένη'),
(181, 78, 19, 2, '2020-04-22', '09:58:03', '53.80', 'Ολοκληρωμένη'),
(182, 78, 17, 1, '2020-04-22', '09:58:03', '13.20', 'Ολοκληρωμένη'),
(183, 78, 2, 2, '2020-04-22', '09:58:03', '27.00', 'Ολοκληρωμένη'),
(184, 78, 5, 3, '2020-04-22', '09:58:03', '13.50', 'Ολοκληρωμένη'),
(185, 78, 6, 1, '2020-04-22', '09:58:03', '13.60', 'Ολοκληρωμένη'),
(186, 78, 16, 1, '2020-04-22', '09:58:03', '13.56', 'Ολοκληρωμένη'),
(187, 85, 19, 1, '2020-04-23', '00:16:22', '26.90', 'Ολοκληρωμένη'),
(188, 85, 2, 2, '2020-04-23', '00:16:22', '27.00', 'Ολοκληρωμένη'),
(189, 85, 11, 1, '2020-04-23', '00:16:22', '17.88', 'Ολοκληρωμένη'),
(190, 85, 12, 1, '2020-04-23', '00:16:22', '23.85', 'Ολοκληρωμένη'),
(191, 85, 16, 2, '2020-04-23', '00:16:22', '27.12', 'Ολοκληρωμένη'),
(195, 77, 2, 2, '2020-05-06', '13:42:45', '27.00', 'Απεστάλη'),
(196, 77, 5, 3, '2020-05-06', '13:42:45', '13.50', 'Απεστάλη'),
(197, 77, 6, 1, '2020-05-06', '13:42:45', '13.60', 'Απεστάλη'),
(198, 77, 15, 1, '2020-05-06', '13:42:45', '4.50', 'Απεστάλη'),
(199, 79, 2, 1, '2020-05-06', '13:45:22', '13.50', 'Απεστάλη'),
(200, 79, 5, 3, '2020-05-06', '13:45:22', '13.50', 'Απεστάλη'),
(201, 79, 18, 2, '2020-05-06', '13:45:22', '10.00', 'Απεστάλη'),
(202, 40, 19, 1, '2020-05-06', '13:47:00', '26.90', 'Απεστάλη'),
(203, 40, 6, 2, '2020-05-06', '13:47:00', '27.20', 'Απεστάλη'),
(204, 40, 15, 1, '2020-05-06', '13:47:00', '4.50', 'Απεστάλη'),
(205, 21, 2, 3, '2020-05-07', '12:40:22', '40.50', 'Σε επεξεργασία'),
(206, 21, 5, 1, '2020-05-07', '12:40:22', '4.50', 'Σε επεξεργασία'),
(207, 21, 15, 2, '2020-05-07', '12:40:22', '9.00', 'Σε επεξεργασία'),
(208, 21, 6, 2, '2020-05-07', '12:40:22', '27.20', 'Σε επεξεργασία'),
(209, 42, 19, 4, '2020-05-07', '19:02:07', '107.60', 'Σε επεξεργασία'),
(210, 42, 16, 1, '2020-05-07', '19:02:07', '13.56', 'Σε επεξεργασία'),
(211, 42, 15, 1, '2020-05-07', '19:02:07', '4.50', 'Σε επεξεργασία'),
(212, 42, 6, 1, '2020-05-07', '19:02:07', '13.60', 'Σε επεξεργασία'),
(213, 74, 2, 2, '2020-05-09', '13:49:50', '27.00', 'Κατατέθηκε'),
(214, 74, 5, 4, '2020-05-09', '13:49:50', '18.00', 'Κατατέθηκε'),
(215, 74, 6, 1, '2020-05-09', '13:49:50', '13.60', 'Κατατέθηκε'),
(216, 74, 19, 1, '2020-05-09', '13:49:50', '26.90', 'Κατατέθηκε');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

DROP TABLE IF EXISTS `product_tbl`;
CREATE TABLE IF NOT EXISTS `product_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `name`, `category`, `description`, `image`, `quantity`, `price`) VALUES
(2, 'Eminem Platinum Adult', 'ΤΡΟΦΗ ΣΚΥΛΩΝ', 'Πλήρης τροφή χωρίς δημητριακά για ενήλικους σκύλους μικρών και μεσαίων φυλών. 2kg.', 'images/eminent-platinum.jpg', 56, '13.50'),
(5, 'Van Cat Classic', 'ΑΞΕΣΟΥΑΡ ΓΑΤΑΣ', 'Άμμος Γάτας. Ψιλή άμμος μπετονίτη χωρίς άρωμα 5kg (0.6mm - 2.25mm).', 'images/van-cat.jpg', 34, '4.50'),
(6, 'Body Suplement 60 caps', 'ΥΓΙΕΙΝΗ ΣΚΥΛΩΝ', 'Το Animology Coat & Body έχει δημιουργηθεί για να παρέχει εξαιρετική θρεπτική υποστήριξη, να βοηθήσει & να συμβάλει στη γενική κατάσταση, την υγεία & την εμφάνιση του σκύλου σας.', 'images/animology-coat-body.jpg', 60, '13.60'),
(11, 'Bubble Lime Juice', 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ', 'Μπωλ διπλού \"χαρακτήρα\" και εργονομική σχεδίαση! Ανοξείδωτο αποσπώμενο μπωλάκι και αντιολησθιτική, ανθετική μελαμίνη. Πλένεται στο πλυντήριο πιάτων. 350ml.', 'images/dog-boll-1', 38, '17.88'),
(12, 'Bubble Turqoise Paw', 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ', 'Μπωλ διπλού \"χαρακτήρα\" και εργονομική σχεδίαση! Ανοξείδωτο αποσπώμενο μπωλάκι και αντιολησθιτική, ανθετική μελαμίνη. Πλένεται στο πλυντήριο πιάτων. 700ml.', 'images/dog-boll-2.jpg', 26, '23.85'),
(13, 'Bubble Mocha Bone', 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ', 'Μπωλ διπλού \"χαρακτήρα\" και εργονομική σχεδίαση! Ανοξείδωτο αποσπώμενο μπωλάκι και αντιολησθιτική, ανθετική μελαμίνη. Πλένεται στο πλυντήριο πιάτων. 700ml.', 'images/dog-boll-3.jpg', 32, '23.99'),
(14, 'Luna Blue', 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ', 'Μπωλ διπλού \"χαρακτήρα\" και εργονομική σχεδίαση! Ανοξείδωτο αποσπώμενο μπωλάκι και αντιολησθιτική, ανθετική μελαμίνη. Πλένεται στο πλυντήριο πιάτων. 160ml.', 'images/dog-boll-4.jpg', 29, '13.30'),
(15, 'Αυτόματη Ποτίστρα Νερού', 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ', 'Επιτρέπει την καλύτερη διαχείριση της ποσότητας, καθώς το κατοικίδιο μπορεί να προσλαμβάνει την ποσότητα που επιθυμεί μέχρι να αδειάσει το περιεχόμενο.', 'images/dog-boll-5.jpg', 22, '4.50'),
(16, 'Μπωλ Διατήρησης Φρέσκου Νερού', 'ΑΞΕΣΟΥΑΡ ΦΑΓΗΤΟΥ ΣΚΥΛΟΙ', 'Το μπωλ διατήρησης φρέσκου νερού για κατοικίδια είναι ένα καινοτόμο μπολ το οποίο μπορεί να διατηρήσει το νερό του αγαπημένου σας κατοικίδιου φρέσκο για 8 ολόκληρες ώρες.', 'images/dog-boll-6.jpg', 24, '13.56'),
(17, 'Dr Max Grain Free', 'ΤΡΟΦΗ ΣΚΥΛΩΝ', 'Grain Free κονσέρβα σκύλου με βοδινό κρέας, πατάτες και έλαιο λιναρόσπορου. Σύνθεση: Κρέας και υποπροϊόντα κρέατος (30% μοσχάρι), Λαχανικά (5% πατάτα), έλαια και λίπη (0,1% λινέλαιο).', 'images/dr-max-grain.jpg', 30, '13.20'),
(18, 'Vadigran Siskins', 'ΤΡΟΦΗ ΠΤΗΝΩΝ', 'Συστατικά: Αγκάθι, Σπόροι Υγείας (9σπόροι), Κεχρί Καναδά, Νίζερ, Μαραθόσπορος, Ραδικόσπορος, Λαχανόσπορος, Ρούπσεν, λευκή Περίλα, Σπανακόσπορος, Παπαρουνόσπορος. 1kg.', 'images/vadigran-siskins.jpg', 36, '5.00'),
(19, 'Belcado Fresh Meat Beef', 'ΤΡΟΦΗ ΣΚΥΛΩΝ', 'Κορυφαία ολιστική τροφή με 80% ολόφρεσκο ψαχνό κρέας βοδινού & super foods, 0% σιτηρά & πατάτες (Grain-free). 2.2kg.', 'images/belcando-fresh.jpg', 50, '26.90');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone_num` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `role` enum('Διαχειριστής','Πελάτης') NOT NULL DEFAULT 'Πελάτης',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `fname`, `lname`, `phone_num`, `email`, `password`, `address`, `birth`, `role`) VALUES
(21, 'Γιάννης', 'Βαβούρας', '6938066142', 'johnybowser@yahoo.com', '12345678', 'Ρόδου 16, 54453, Θεσσαλονίκη', '1981-09-25', 'Πελάτης'),
(36, 'Κωνσταντίνος', 'Σαμδάνης', '6987107350', 'kostas_samdan@yahoo.gr', '12345678', 'Ηφαίστου 2, 42100, Τρίκαλα', '1981-11-08', 'Πελάτης'),
(37, 'Ευμορφίλη', 'Παπαδοπούλου', '6987107350', 'eui_p@hotmail.com', '12345678', 'Σωκράτους 24, 54635, Θεσσαλονίκη', '1983-08-09', 'Πελάτης'),
(38, 'Μαρίνος', 'Αλεξιάδης', '6978556412', 'alexis@gmail.com', '12345678', 'Δημοκρίτου 8, 69100, Κομοτηνή', '1976-05-15', 'Πελάτης'),
(39, 'Αγησίλαος', 'Γεωργιάδης', '6978451223', 'ag_georgiadis@hotmail.com', '12345678', 'Κολοκοτρώνη, 56625, Συκιές - Θεσσαλονίκη', '1991-06-20', 'Πελάτης'),
(40, 'Πηνελόπη', 'Βασιλειάδου', '6978125689', 'pl_vasiliadou@yahoo.gr', '12345678', 'Παπαφλέσσα, 26222, Πάτρα', '1987-10-02', 'Πελάτης'),
(41, 'Σίμος', 'Αλεξανδρής', '6945784041', 'simos_alex@gmail.com', '12345678', 'Καραϊσκάκη 17, 10554, Ψυρρή - Αθήνα', '1982-02-15', 'Πελάτης'),
(42, 'Φρειδερίκος', 'Σαλπιγγίδης', '6945122145', 'fr_salp@gmail.com', '12345678', 'Ανδρούτσου 11Β, 67100, Ξάνθη', '1981-03-31', 'Πελάτης'),
(70, 'Μενέλαος', 'Σωτηράκης', '6978326061', 'menios_sot@gmail.com', '12345678', 'Πλάτωνος 8, 65302, Καβάλα ', '1992-03-20', 'Πελάτης'),
(71, 'Μάκης', 'Καλπάκης', '6938456112', 'mak_kalp@gmail.com', '12345678', 'Αναξιμάνδρου 3, 11633, Αθήνα', '1978-12-11', 'Πελάτης'),
(73, 'Ευγενία', 'Σαμαρά', '6942050066', 'jenny@windowslive.com', '12345678', 'Αδραμυτίου 12, 17121, Νέα Σμύρνη, Αθήνα', '1990-06-19', 'Πελάτης'),
(74, 'Απόστολος', 'Χριστοδουλόπουλος', '6945788651', 'christodouloup_ap@gmail.com', '12345678', 'Μακεδονίας 23, 69100, Κομοτηνή', '1968-05-22', 'Πελάτης'),
(75, 'Ιωάννης', 'Ποκστούδης-Χριστοδούλου', '6945793031', 'admin@eap.gr', '12345678', 'Σύρου 16, 54453, Θεσσαλονίκη', '1981-09-25', 'Διαχειριστής'),
(76, 'Ερμής', 'Παρμενίδης', '6978651263', 'ermis90@gmail.com', '12345678', 'Αναξιμένους 12, 65488, Καστοριά', '1990-05-14', 'Πελάτης'),
(77, 'Αλέξανδρος', 'Βουκεφάλας', '6943126655', 'alexandros_v@gmail.com', '12345678', 'Αμβροσίου 53, 12240, Σπάρτη', '1989-10-03', 'Πελάτης'),
(78, 'Ευγένιος', 'Σπαθάρης', '6978451223', 'spatharis@yahoo.com', '12345678', 'Σπετσών 3, 69400, Ξάνθη', '1974-02-04', 'Πελάτης'),
(79, 'Ελένη', 'Ωραιοπούλου', '6942568879', 'helen@gmail.com', '12345678', 'Ολυμπιάδος 42, 89100, Θεσσαλονίκη', '1980-12-05', 'Πελάτης'),
(80, 'Βασίλης', 'Δημητριάδης', '6945606051', 'dimitriadis@gmail.com', '12345678', 'Αθανασίου Διάκου 23, 59111, Σέρρες', '1991-03-05', 'Πελάτης'),
(81, 'Μιχάλης', 'Μιχαηλίδης', '6974536255', 'michael@gmail.com', '12345678', 'Χίου 32, 54453, Θεσααλονίκη', '1982-03-14', 'Πελάτης'),
(82, 'Διαγόρας', 'Ανανιάδης', '6945895645', 'diagor@gmail.com', '12345678', 'Καρπάθου 16, 68600, Σέρρες', '1984-05-21', 'Πελάτης'),
(83, 'Θωμάς', 'Μαρκόπουλος', '6942156532', 'tom@gmail.com', '12345678', 'Βαμβακάρη 32, 75100, Καλαμάτα', '1988-05-29', 'Πελάτης'),
(84, 'Ιερώνυμος', 'Ματθαίου', '6987253226', 'jeron@gmail.com', '12345678', 'Αχαρνών 37, 78500, Αττική', '1979-04-14', 'Πελάτης'),
(85, 'Θανάσης', 'Καραπάνος', '6978526598', 'akarawd@gmail.com', '12345678', 'Κουμουνδούρου 35, 64100, Κομοτηνή', '1977-12-12', 'Πελάτης');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


