-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 09:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `icon`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Planners', NULL, 'fa fa-tasks', 1, 1, '2021-06-27 11:11:33', '2021-07-05 16:03:05'),
(2, 'Venues', NULL, 'fa fa-tasks', 1, 2, '2021-06-27 11:11:39', '2021-07-05 17:56:50'),
(4, 'Photographers', NULL, 'fa fa-camera', 1, 4, '2021-06-27 11:16:58', '2021-07-05 16:03:33'),
(5, 'Makeup Artists', NULL, NULL, 1, 5, '2021-06-27 11:17:18', '2021-07-05 17:54:26'),
(6, 'Decorators', NULL, NULL, 1, 6, '2021-06-27 11:17:33', '2021-06-27 11:17:33'),
(7, 'Bridal Designers', NULL, NULL, 1, 7, '2021-06-27 11:18:04', '2021-06-27 11:18:04'),
(8, 'Invitation Designers', NULL, NULL, 1, 8, '2021-06-27 11:19:21', '2021-06-27 11:19:21'),
(9, 'Choreographers', NULL, NULL, 1, 9, '2021-06-27 11:19:37', '2021-06-27 11:19:37'),
(10, 'Mehdi Artist', NULL, 'fa fa-tasks', 1, 10, '2021-07-05 17:57:34', '2021-07-12 18:49:18'),
(11, 'Caterer', NULL, 'fa fa-tasks', 1, 10, '2021-07-05 18:03:23', '2021-07-05 18:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'London', 1, NULL, NULL),
(2, 'Birmingham', 1, NULL, NULL),
(3, 'Manchester', 1, NULL, NULL),
(4, 'Leeds', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Niral', 'niral.patel@gmail.com', 'asd', '2021-07-18 20:32:30', '2021-07-18 20:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `category` smallint(6) NOT NULL,
  `name` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `category`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Privacy Policy', '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>Dari mana asalnya?\r\nTidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>', '2018-02-24 02:48:34', '2021-07-05 17:58:07'),
(2, 2, 'About Us', '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>Dari mana asalnya?\r\nTidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>', '2018-02-24 02:48:50', '2021-07-05 17:58:15'),
(3, 3, 'Term & Conditions', '<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>\r\n<p>Dari mana asalnya?\r\nTidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun. Richard McClintock, seorang professor Bahasa Latin dari Hampden-Sidney College di Virginia, mencoba mencari makna salah satu kata latin yang dianggap paling tidak jelas, yakni consectetur, yang diambil dari salah satu bagian Lorem Ipsum. Setelah ia mencari maknanya di di literatur klasik, ia mendapatkan sebuah sumber yang tidak bisa diragukan. Lorem Ipsum berasal dari bagian 1.10.32 dan 1.10.33 dari naskah \"de Finibus Bonorum et Malorum\" (Sisi Ekstrim dari Kebaikan dan Kejahatan) karya Cicero, yang ditulis pada tahun 45 sebelum masehi. BUku ini adalah risalah dari teori etika yang sangat terkenal pada masa Renaissance. Baris pertama dari Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", berasal dari sebuah baris di bagian 1.10.32.</p>', '2018-03-08 04:54:42', '2021-07-05 17:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `report_problem`
--

CREATE TABLE `report_problem` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `category` smallint(6) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` int(4) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_device_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_at` timestamp NULL DEFAULT NULL,
  `forgot_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT 1,
  `role` smallint(6) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `phone`, `password`, `verification_code`, `remember_token`, `user_id_token`, `firebase_token`, `device_number`, `registered_device_number`, `registered_token`, `registered_at`, `forgot_token`, `token`, `status`, `role`, `last_login_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', NULL, 'adminevent@yopmail.com', NULL, '$2y$10$lsgw9Sx0Rl3NcTzgPOCTw.4Dc90x0jxtAw2dZjTJuiWmAw3ovMgmy', NULL, 'kctZz4DxL2uPmbsyaw2SLmeTkoxq43Gt9D3D2G2Zturm6LBAb1QfOuCExkIZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2018-05-18 03:31:33', '2018-05-18 03:31:33', NULL),
(2, 'Jon', NULL, 'weddinguser@yopmail.com', '789456123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, '2021-07-11 14:05:18', '2021-07-11 14:18:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_relation`
--

CREATE TABLE `user_relation` (
  `id` bigint(20) NOT NULL,
  `male_user_id` bigint(20) UNSIGNED NOT NULL,
  `female_user_id` bigint(20) UNSIGNED NOT NULL,
  `wedding_day` date DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_relation_concept`
--

CREATE TABLE `user_relation_concept` (
  `id` int(11) NOT NULL,
  `user_relation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL COMMENT 'From city table',
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `price_quotation_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `order` smallint(6) DEFAULT NULL,
  `verification_code` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendor_name`, `email`, `category`, `city_id`, `business_name`, `description`, `price`, `price_quotation_line`, `pricing_detail`, `file`, `address`, `phone`, `instagram`, `website`, `status`, `order`, `verification_code`, `created_at`, `updated_at`) VALUES
(1, 'Niral', 'test14@yopmail.com', '1', 3, 'Test', 'INTRODUCTION\r\n\r\nWe are INeVENT and Decor, based in Chennai We started working in 2015 and have covered more than 32 weddings. We bring a fresh, unique approach to the event management industry. Our team understands that a properly executed event can be leveraged to support an organization’s strategic vision, incorporated into a company’s marketing plan & used to build networks and client loyalty. Read more\r\n\r\nWORKING SINCE\r\n\r\n2015\r\n\r\nSERVICES PROVIDED\r\n\r\nTrousseau Preparations, DJ/Music, Venue Booking, Decor, Photography Services, Honeymoon, Service Staff, Invitations, Catering, PR and Media Coverage, Gifts, Celebrity Invites\r\n\r\nIN HOUSE SERVICES\r\n\r\nTrousseau Preparations, DJ/Music, Venue Booking, Decor, Photography Services, Honeymoon, Service Staff, Invitations, Catering, PR and Media Coverage, Gifts, Celebrity Invites\r\n\r\nPLANNING TYPE\r\n\r\nConsultant, Coordination, Full Planning, Partial Planning', 345.00, 'etrer', '<div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \"segoe ui\", Roboto, Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\"; font-size: 16px; letter-spacing: normal;\"><p class=\"normal-14 mfont-12 light uppercase\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-transform: uppercase; color: var(--grey-text); font-size: 14px; line-height: 1.4;\">STARTING PACKAGE</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">₹ 50,000</p></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \"segoe ui\", Roboto, Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\"; font-size: 16px; letter-spacing: normal;\"><p class=\"normal-14 mfont-12 light uppercase\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-transform: uppercase; color: var(--grey-text); font-size: 14px; line-height: 1.4;\">PAYMENT POLICY</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">50% - At the Time of booking</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">50% - On Event date</p></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, \"segoe ui\", Roboto, Helvetica, Arial, sans-serif, \"apple color emoji\", \"segoe ui emoji\", \"segoe ui symbol\"; font-size: 16px; letter-spacing: normal;\"><p class=\"normal-14 mfont-12 light uppercase\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-transform: uppercase; color: var(--grey-text); font-size: 14px; line-height: 1.4;\">CANCELLATION POLICY</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">Payments made to INeVENT will be non-refundable. Deposit schedules will be agreed in the Services Contract. The client remains responsible for fee payment as well as costs of repairs or replacement of supplier services and/or products. Third party contracts remain independent between supplier and client, and are in no way the responsibility of INeVENT wedding planners. These Ts & Cs remain the intellectual property of INeVENT and are liable to modification at any given time.</p></div>', 'asda-sd-041805.jpg', 'asd', '12312312', '12312313', '3123', 1, 1, NULL, '2018-05-17 21:18:05', '2021-07-18 14:19:58'),
(3, NULL, NULL, '4', 1, 'Best Moment', 'INTRODUCTION\r\n\r\nEnchanted Carnivals is an Event Management company that started its Business in 2020. At Enchanted Carnivals, we look forward to creating a concept keeping in mind the requirements of the client, as every client has a different set of choices. Further, we have house Audio & Visual set up to create the right ambiance at a wedding venue. Enchanted Carnivals is a one-stop destination for all the w... Read more\r\n\r\nWORKING SINCE\r\n\r\n2020\r\n\r\nSERVICES PROVIDED\r\n\r\nDJ/Music, Venue Booking, Decor, Photography Services, Invitations, Gifts, Celebrity Invites, Trousseau Preparations, PR and Media Coverage\r\n\r\nIN HOUSE SERVICES\r\n\r\nDJ/Music, Venue Booking, Decor, Photography Services, Invitations, Gifts, Celebrity Invites, Trousseau Preparations\r\n\r\nPLANNING TYPE\r\n\r\nFull Planning', 1200.00, 'Starting', '<div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px; letter-spacing: normal;\"><p class=\"normal-14 mfont-12 light uppercase\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-transform: uppercase; color: var(--grey-text); font-size: 14px; line-height: 1.4;\">STARTING PACKAGE</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">₹ 50,000</p></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px; letter-spacing: normal;\"><p class=\"normal-14 mfont-12 light uppercase\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-transform: uppercase; color: var(--grey-text); font-size: 14px; line-height: 1.4;\">PAYMENT POLICY</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">50% - At the Time of booking</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">25% - On Event date</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">25% - After deliverables are delivered</p></div><div class=\"padt-32\" style=\"padding-top: 32px; color: rgb(53, 59, 80); font-family: -apple-system, BlinkMacSystemFont, &quot;segoe ui&quot;, Roboto, Helvetica, Arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 16px; letter-spacing: normal;\"><p class=\"normal-14 mfont-12 light uppercase\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-transform: uppercase; color: var(--grey-text); font-size: 14px; line-height: 1.4;\">CANCELLATION POLICY</p><p class=\"normal-14 padt-8\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 8px 0px 0px; font-size: 14px; line-height: 1.4;\">Cancellation till 10 days prior the event is allowed for 100% refund. After that, cancellation fee of 50% of the advance paid shall be levied.</p></div>', 'best-moment-004444.jpg', 'test', '789456123', 'test', 'http://kisan.com', 1, 8, NULL, '2021-07-05 18:00:44', '2021-07-12 19:18:17'),
(5, 'Peter', 'tom@gmail.com', '1', 1, 'My event', 'test', 4.00, 'dfssdg', '<p>sdg</p>', '231812.jpg', 'UK', '01234567891', 'addasd', 'http://r.com', 1, NULL, NULL, '2021-07-17 17:48:12', '2021-07-17 17:48:12'),
(6, 'Nicey', 'test@gmail.com', '2', 1, 'My event', 'sadasd', 24124.00, 'dfsdf', '<p>dsfdsfsdf</p>', '000937.jpg', 'Universal road', '01234567895', 'addasd', 'test.com', 1, NULL, NULL, '2021-07-17 18:39:37', '2021-07-17 18:39:37'),
(7, 'Nicey', 'test34@yopmail.com', '2', 1, 'My event', 'sadasd', 3423.00, 'test', '<p>asADadADad</p>', '001611.jpg', 'Universal road', '01234567895', 'addasd', 'test.com', 1, NULL, NULL, '2021-07-17 18:46:11', '2021-07-18 09:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_detail`
--

CREATE TABLE `vendor_detail` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_detail`
--

INSERT INTO `vendor_detail` (`id`, `vendor_id`, `name`, `file`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Photo 1', 'photo-1-060030.jpg', 1, 2, '2018-05-17 23:00:30', '2018-05-17 23:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_inquiry`
--

CREATE TABLE `vendor_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL COMMENT 'From vendor',
  `special_instruction` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_inquiry`
--

INSERT INTO `vendor_inquiry` (`id`, `name`, `email`, `phone_number`, `city_id`, `user_id`, `vendor_id`, `special_instruction`, `event_date`, `created_at`, `updated_at`) VALUES
(1, 'sda', 'sad@gmail.com', '1462886000', 1, 9, 1, NULL, '0000-00-00', '2021-07-11 19:36:22', '2021-07-11 14:18:51'),
(2, NULL, 'wedding@yopmail.com', '7898656565', 1, 9, 1, 'Test', '2021-07-27', '2021-07-18 01:42:20', '2021-07-17 20:12:20'),
(4, NULL, 'wedding@yopmail.com', '7898656565', 1, 10, 1, 'Test', '2021-07-27', '2021-07-18 01:44:28', '2021-07-17 20:14:28'),
(5, NULL, 'wedding@yopmail.com', '7898656565', 1, 10, 1, 'Test', '2021-07-27', '2021-07-18 01:54:54', '2021-07-17 20:24:54'),
(6, NULL, 'wedding@yopmail.com', '7898656565', 1, 10, 1, 'Test', '2021-07-27', '2021-07-18 01:55:44', '2021-07-17 20:25:44'),
(7, 'Niraldd', 'wedding@yopmail.com', '7898656565', 1, 10, 1, 'Test', '2021-07-27', '2021-07-18 01:57:15', '2021-07-17 20:27:15'),
(8, 'Niraldd', 'wedding@yopmail.com', '7898656565', 1, 10, 1, 'Test', '2021-07-27', '2021-07-18 01:57:33', '2021-07-17 20:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_photos`
--

CREATE TABLE `vendor_photos` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_photos`
--

INSERT INTO `vendor_photos` (`id`, `vendor_id`, `image_name`, `created_at`, `updated_at`) VALUES
(7, 3, 'best-moment-004444.jpg', '2021-07-12 19:14:44', '2021-07-12 19:14:44'),
(8, 1, 'test-004920.jpg', '2021-07-12 19:19:20', '2021-07-12 19:19:20'),
(9, 5, '231812.jpg', '2021-07-17 17:48:12', '2021-07-17 17:48:12'),
(10, 6, '000937.jpg', '2021-07-17 18:39:37', '2021-07-17 18:39:37'),
(11, 7, '001611.jpg', '2021-07-17 18:46:11', '2021-07-17 18:46:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_problem`
--
ALTER TABLE `report_problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_relation`
--
ALTER TABLE `user_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `male_user_id` (`male_user_id`),
  ADD KEY `female_user_id` (`female_user_id`);

--
-- Indexes for table `user_relation_concept`
--
ALTER TABLE `user_relation_concept`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_relation_id` (`user_relation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_detail`
--
ALTER TABLE `vendor_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_inquiry`
--
ALTER TABLE `vendor_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_photos`
--
ALTER TABLE `vendor_photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_problem`
--
ALTER TABLE `report_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_relation`
--
ALTER TABLE `user_relation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_relation_concept`
--
ALTER TABLE `user_relation_concept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_detail`
--
ALTER TABLE `vendor_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_inquiry`
--
ALTER TABLE `vendor_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor_photos`
--
ALTER TABLE `vendor_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_relation`
--
ALTER TABLE `user_relation`
  ADD CONSTRAINT `user_relation_ibfk_3` FOREIGN KEY (`male_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_relation_ibfk_4` FOREIGN KEY (`female_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_relation_concept`
--
ALTER TABLE `user_relation_concept`
  ADD CONSTRAINT `user_relation_concept_ibfk_3` FOREIGN KEY (`user_relation_id`) REFERENCES `user_relation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_relation_concept_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_detail`
--
ALTER TABLE `vendor_detail`
  ADD CONSTRAINT `vendor_detail_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
