-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2016 at 12:09 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astalaxmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `user_id`, `parent_id`, `created_at`, `updated_at`, `balance`) VALUES
(1, 'asset', 0, NULL, NULL, NULL, ''),
(2, 'Liability', 0, NULL, NULL, NULL, ''),
(3, 'Income', 0, NULL, NULL, NULL, ''),
(4, 'Expense', 0, NULL, NULL, NULL, ''),
(5, 'Equity', 0, NULL, NULL, NULL, ''),
(31, 'cash', 0, 1, '2016-05-07 02:47:33', '2016-05-07 02:47:33', ''),
(32, 'Capital', 0, 1, '2016-05-07 05:33:41', '2016-05-07 05:33:41', ''),
(33, 'stationary', 0, 1, '2016-05-07 05:38:08', '2016-05-07 05:38:08', ''),
(34, 'computer', 0, 1, '2016-05-07 05:39:49', '2016-05-07 05:39:49', ''),
(35, 'communication', 0, 4, '2016-05-07 05:41:07', '2016-05-07 05:41:07', ''),
(36, 'sales', 0, 1, '2016-05-07 05:41:33', '2016-05-07 05:41:33', ''),
(37, 'rent', 0, 4, '2016-05-07 05:45:09', '2016-05-07 05:45:09', ''),
(38, 'salary', 0, 4, '2016-05-07 05:49:05', '2016-05-07 05:49:05', ''),
(39, 'purchase', 0, 4, '2016-05-15 04:52:27', '2016-05-15 05:42:30', ''),
(40, 'payable ', 0, 2, '2016-05-15 05:41:03', '2016-05-15 05:41:03', ''),
(41, 'receiveable', 0, 1, '2016-05-15 06:16:36', '2016-05-15 06:16:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `annotations`
--

CREATE TABLE IF NOT EXISTS `annotations` (
  `id` int(11) NOT NULL,
  `annotaionable_type` varchar(50) NOT NULL,
  `annotaionable_id` int(11) NOT NULL,
  `receive_money` varchar(100) NOT NULL,
  `receive_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `receive_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `bill_number` int(11) NOT NULL,
  `bill_data` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `total` varchar(100) NOT NULL,
  `setting_id` int(11) NOT NULL,
  `paid` tinyint(4) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Hello', '2016-05-05 12:10:14', '2016-05-05 12:10:29'),
(2, 'kkk', '2016-05-05 13:59:50', '2016-05-05 13:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(125) NOT NULL,
  `last_name` varchar(125) NOT NULL,
  `phone` varchar(125) NOT NULL,
  `mobile` varchar(125) NOT NULL,
  `address` varchar(120) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `phone`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Balbatika ', '', '', '', '', '2016-05-15 09:40:28', '2016-05-15 09:40:28'),
(2, 'Navajagriti', 'school', '', '', '', '2016-05-15 11:59:24', '2016-05-15 11:59:24'),
(3, 'Nava Manjushree', 'School', '', '', '', '2016-05-15 11:59:44', '2016-05-15 11:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(20) NOT NULL,
  `meta_value` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `meta_key`, `meta_value`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'cash', '31', '2016-05-15 08:44:50', '2016-05-15 10:34:40', 0),
(2, 'purchase', '39', '2016-05-15 08:53:27', '2016-05-15 10:37:42', 0),
(3, 'sales', '36', '2016-05-15 10:39:09', '2016-05-15 10:39:09', 0),
(4, 'payable', '40', '2016-05-15 11:26:31', '2016-05-15 11:26:31', 0),
(5, 'receiveable', '41', '2016-05-15 12:07:38', '2016-05-15 12:07:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_data` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `total` varchar(100) NOT NULL,
  `setting_id` int(11) NOT NULL,
  `tax` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE IF NOT EXISTS `journals` (
  `id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `setting_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_transctions`
--

CREATE TABLE IF NOT EXISTS `journal_transctions` (
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `debit_amount` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `credit_amount` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `journalable_id` int(11) NOT NULL,
  `journalable_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_18_104613_create_accounts_table', 1),
('2016_04_18_104636_create_journals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationable_type` varchar(50) NOT NULL,
  `notificationable_id` int(11) NOT NULL,
  `visit` tinyint(4) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `category_id` int(11) NOT NULL,
  `qtn` int(11) NOT NULL,
  `price` double(4,2) NOT NULL,
  `serial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `fiscal_year_start` varchar(50) NOT NULL,
  `fiscal_year_end` varchar(50) NOT NULL,
  `opening_balance` varchar(100) NOT NULL,
  `closing_balance` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `fiscal_year_start`, `fiscal_year_end`, `opening_balance`, `closing_balance`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2073-03-01', '2074-01-02', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2072-03-01', '2073-02-28', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '2072/73', '0000-00-00', '0', '', 0, '2016-05-03 15:26:37', '2016-05-03 15:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `role` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `last_login`, `role`) VALUES
(1, 'ramesh', 'admin@example.com', '$2y$10$PkBIFgg8X6afsaG5aaq.e.WMAhkyrKd1RVeQkYasfHewmhmO80N5y', 'WryJWpSAJufeq1JU174qnAZOraUIAkU27SQhjDGVXQv5tA2mV5TLfYSrkPwu', '2016-04-23 18:33:14', '2016-05-30 06:23:40', 'kharel', '0000-00-00 00:00:00', 1),
(2, 'Govinda', 'gk@gmail.com', '$2y$10$gBYSkdSKBv3bbdLwtBNQWuPsK2WpPseO5FCaR/PevP87Dna25fXKe', 'WoHPBEsobGvxCmbvwt1TIGdHkTw81I29Ijq22M2OB5E8zho4yFhvfcQDReAL', '2016-04-29 21:43:31', '2016-05-04 04:14:29', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(35) NOT NULL,
  `address` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `last_name`, `phone`, `mobile`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'intervision', 'advertising and marketing', '4442129', '4442129', '', '', '2016-05-15 11:14:04', '2016-05-15 11:14:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annotations`
--
ALTER TABLE `annotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_transctions`
--
ALTER TABLE `journal_transctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `annotations`
--
ALTER TABLE `annotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_transctions`
--
ALTER TABLE `journal_transctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
