-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 08:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproject`
--

CREATE TABLE `addproject` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addproject`
--

INSERT INTO `addproject` (`id`, `project_name`, `client_name`, `client_id`, `project_type`, `start_date`, `deadline`, `project_description`, `created_at`, `updated_at`, `project_status`) VALUES
(1, 'KVK LIFTER', NULL, '1', 'Matrimonial', '2022-03-21', '2022-03-22', 'hello for testing', '2022-03-21 00:05:56', '2022-03-21 00:05:56', 1),
(2, 'Tokari', NULL, '4', 'Matrimonial', '2022-03-22', '2022-03-31', 'aXAaXA', '2022-03-21 00:10:14', '2022-03-21 00:10:14', 1),
(3, 'kkkkk', NULL, '3', 'Matrimonial', '2022-03-21', '2022-03-26', 'aXAXA', '2022-03-21 00:10:34', '2022-03-21 00:10:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignprojects`
--

CREATE TABLE `assignprojects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_leader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1752796213, 'user', 1, 11, 'by', NULL, 0, '2022-03-21 04:44:15', '2022-03-21 04:44:15'),
(1790530362, 'user', 1, 5, 'fewfesfcesc', NULL, 0, '2022-03-20 23:01:30', '2022-03-20 23:01:30'),
(1976868943, 'user', 1, 11, '', '{\"new_name\":\"9d117112-b037-4460-90d7-8f83229b6eaa.jpg\",\"old_name\":\"3 dot.jpg\"}', 0, '2022-03-21 04:44:27', '2022-03-21 04:44:27'),
(1990225488, 'user', 1, 12, 'Sadafdasf', NULL, 0, '2022-03-20 22:51:29', '2022-03-20 22:51:29'),
(2302528569, 'user', 1, 5, '', '{\"new_name\":\"fd8882c0-976d-44cf-82d2-0ee01eb99e35.jpg\",\"old_name\":\"abc.jpg\"}', 0, '2022-03-20 23:01:35', '2022-03-20 23:01:35'),
(2308298327, 'user', 5, 16, 'sdscscs', NULL, 0, '2022-03-21 04:52:45', '2022-03-21 04:52:45'),
(2332245969, 'user', 1, 4, 'dasdasdasdsads', NULL, 0, '2022-03-20 22:58:11', '2022-03-20 22:58:11'),
(2426461745, 'user', 1, 4, '', '{\"new_name\":\"8aa3a9a8-c3f4-4321-867a-5424b75c6839.jpg\",\"old_name\":\"abc.jpg\"}', 0, '2022-03-20 22:58:54', '2022-03-20 22:58:54'),
(2635551237, 'user', 1, 15, 'hdfhfdhdfh', NULL, 0, '2022-03-21 04:45:14', '2022-03-21 04:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `del_status` int(11) NOT NULL DEFAULT 0,
  `enable_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `company`, `description`, `created_at`, `updated_at`, `client_status`, `del_status`, `enable_status`) VALUES
(1, 'Nitesh', 'company@gmail.com', 'img global', 'helllo', '2022-03-12 06:17:53', '2022-03-14 22:28:10', '0', 1, 0),
(2, 'nitesh', 'nitesh91153@gmail.com', 'img global infotech', 'knjnjnjkn', '2022-03-14 05:30:39', '2022-03-21 01:11:51', '0', 0, 1),
(3, 'Nitesh', 'nitesh91153@gmail.com', 'img global', 'wreftwr', '2022-03-14 05:30:53', '2022-03-14 22:18:16', '1', 0, 1),
(4, 'england', 'nitesh91153@gmail.com', 'img global', ', mnjjm', '2022-03-14 05:31:07', '2022-03-14 22:23:30', '0', 0, 0),
(5, 'Shannon Jefferson', 'zyhyk@gmail.com', 'Flynn and Thornton Plc', 'In sed vero vitae in', '2022-03-14 07:28:25', '2022-03-14 07:28:25', '1', 0, 0),
(6, 'Breanna Davenport', 'higybaza@gmail.com', 'Fuentes Reid Inc', 'Et necessitatibus co', '2022-03-14 07:28:38', '2022-03-14 07:28:38', '1', 0, 0),
(7, 'Alice Donovan', 'jomara@gmail.com', 'Walters and Lott Inc', 'Est tempore except', '2022-03-14 07:28:52', '2022-03-14 22:23:57', '0', 0, 0),
(8, 'Ralph Sharp', 'hejyb@gmail.com', 'Ellison Dotson Plc', 'Eaque nisi suscipit', '2022-03-14 07:29:06', '2022-03-14 22:25:09', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'tyjatihuq', '2022-03-16 03:23:38', '2022-03-16 03:23:38', 1),
(2, 'Nitesh', '2022-03-17 04:07:12', '2022-03-17 04:07:12', 1),
(3, 'england', '2022-03-17 04:07:33', '2022-03-17 04:07:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` int(11) NOT NULL DEFAULT 0,
  `enable_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `dob`, `address`, `position`, `created_at`, `updated_at`, `department`, `del_status`, `enable_status`) VALUES
(8, 'Uma', 'Gregoryw', 'zykav@gmail.com', '$2y$10$lP046bBsb2wluYLcBbswDenDx6kZEpZYOWH4bxQvGmc1XO9rajmum', '2255336699', '1985-04-01', 'Nulla quos dolor aut', 'Project Leader', '2022-03-14 06:29:16', '2022-03-21 00:59:48', 'Developer', 0, 1),
(9, 'Erin', 'Snow', 'xomaxim@gmail.com', '$2y$10$7plFwERy9jyUnyIAtjzK0OddSTazfLuxoZEPQOdBdgDhyqLFw97Qe', '2233665588', '1989-01-06', 'Irure nemo nihil ali', 'Developer', '2022-03-14 06:30:06', '2022-03-14 06:30:06', '', 0, 0),
(10, 'Kuldeep', 'Singh', 'nitesh91153@gmail.com', '$2y$10$NOiKpmchCc13Uk3rUTgAK.gqV2Uff2WyAHIrk2Xs.Raj5vlWqWkXO', '8899665588', '1999-03-31', 'gfg', 'hr', '2022-03-16 03:25:38', '2022-03-21 02:14:02', 'tyjatihuq', 0, 0),
(11, 'Nitesh', 'Sharma', 'nitesh@gmail.com', '$2y$10$84fLXXNMcetUkEg.iHP.g.VqVrbAox2g6hUixfQPb0yEJtqY00T2a', '9988665522', '1999-04-06', 'hmbvbvhb', 'Project Leader', '2022-03-16 03:32:33', '2022-03-21 02:14:55', 'tyjatihuq', 0, 0),
(12, 'Puneet', 'Singh', 'niteseeh@gmail.com', '$2y$10$BPPrOFNaxyORfsGOF0KHXOF8YE2R.UUp4ZRqfTDvMWqPefszpOZXO', '8886669988', '1999-03-25', 'wdefef', 'Developer', '2022-03-16 03:37:49', '2022-03-21 02:12:44', 'tyjatihuq', 0, 0),
(13, 'Gaurav', 'Sharmma', 'gaurav@gmail.com', '$2y$10$n15WHjlqTHHD7qclhHzn0ubo2fVjeYAqoFTeKiNQYHToVuVtqZZaG', '4455663322', '1999-04-08', 'ddsscdsacsa', 'Developer', '2022-03-16 03:39:09', '2022-03-21 02:16:53', 'tyjatihuq', 0, 0),
(14, 'Vivek', 'Sharma', 'nitesh.img@gmail.com', '$2y$10$pqZLkutNNDWtE2DwoU3WR.62lMk3TjcrRIHJyPAga72CP5dfDWD.m', '9988665577', '1999-03-10', 'yryurfyhghjb', 'hr', '2022-03-16 22:53:37', '2022-03-16 22:53:37', 'tyjatihuq', 0, 0),
(15, 'Jhho', 'Hbuj', 'ijiok@gmail.com', '$2y$10$5GW12UNBV.ioHlrMKHY81.qIjPeyq3MvoFYR8jqsm17RRdjemdURy', '8976656556', '1998-03-22', 'vhojbhu', 'Ecommerce', '2022-03-21 02:20:23', '2022-03-21 02:20:23', '{\"id\":2,\"name\":\"Nitesh\",\"created_at\":\"2022-03-17T09:37:12.000000Z\",\"updated_at\":\"2022-03-17T09:37:12.000000Z\",\"status\":1}', 0, 0),
(16, 'Test', 'Test', 'test@gmail.com', '$2y$10$IOlUrsDLfrozQCrqCgkJ5edbqsoIy6ZKhLAE2pHL4pSEIuUT8kRjW', '8899665544', '1999-03-02', 'eweqeqwe', 'hr', '2022-03-21 04:47:55', '2022-03-21 04:47:55', '2', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_05_094101_create_permission_tables', 1),
(6, '2022_03_05_114658_create_jobs_table', 1),
(7, '2022_03_05_170224_create_employe_table', 1),
(8, '2022_03_07_050216_create_notification_table', 1),
(9, '2022_03_07_054419_create_projects_table', 1),
(10, '2022_03_07_064639_create_notifications_table', 1),
(11, '2022_03_08_063718_project', 1),
(12, '2022_03_09_034737_add_image_to_users_table', 1),
(13, '2022_03_09_093936_clients', 1),
(14, '2022_03_09_100217_client_status', 1),
(15, '2022_03_09_103826_add_project', 1),
(16, '2022_03_10_072401_project_type', 1),
(17, '2022_03_10_095635_add_project_status_to_addproject', 1),
(18, '2022_03_11_041205_client_name', 1),
(19, '2022_03_14_035038_chats_table', 2),
(25, '2022_03_11_091612_create_departments_table', 3),
(26, '2022_03_12_055059_add_status_to_roles', 3),
(27, '2022_03_12_062636_add_department__to_employe', 3),
(28, '2022_03_12_072234_create_assignprojects_table', 3),
(29, '2022_03_14_042228_add_status_to_departments', 3),
(30, '2022_03_14_121504_del_status', 4),
(31, '2022_03_14_125255_del_status_to_clients', 5),
(32, '2022_03_19_999999_add_active_status_to_users', 6),
(33, '2022_03_19_999999_add_avatar_to_users', 6),
(34, '2022_03_19_999999_add_dark_mode_to_users', 6),
(35, '2022_03_19_999999_add_messenger_color_to_users', 6),
(36, '2022_03_19_999999_create_favorites_table', 6),
(37, '2022_03_19_999999_create_messages_table', 6),
(38, '2022_03_14_122901_create_tasks_table', 7),
(39, '2022_03_15_032241_add_image_to_tasks', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification-for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification-send` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification-for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification-send` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_mananger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_leader` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_employee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_by_emp` int(11) NOT NULL COMMENT '1 = Complete and 0 = UnComplete',
  `status_by_team_leader` int(11) NOT NULL COMMENT '1 = Complete and 0 = UnComplete',
  `status_by_project_manager` int(11) NOT NULL COMMENT '1 = Complete and 0 = UnComplete',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`id`, `project_type`, `project_status`, `created_at`, `updated_at`) VALUES
(1, 'Matrimonial', '0', '2022-03-14 07:14:09', '2022-03-14 07:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Developer', 'web', '2022-03-14 01:16:57', '2022-03-14 01:16:57', 1),
(2, 'Ecommerce', 'web', '2022-03-16 06:40:06', '2022-03-16 06:40:06', 1),
(3, 'hr', 'web', '2022-03-16 06:40:39', '2022-03-16 06:40:39', 1),
(4, 'Project Leader', 'web', '2022-03-21 00:34:07', '2022-03-21 00:34:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `task_date`, `created_at`, `updated_at`, `image`) VALUES
(1, 'nitesh', 'xxcxzc', '2022-03-08', '2022-03-21 02:15:54', '2022-03-21 02:15:54', NULL),
(2, 'halfday', 'ggggg', '2022-03-31', '2022-03-21 02:18:38', '2022-03-21 02:19:00', '1647848940.show project.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firebase_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `firebase_token`, `remember_token`, `created_at`, `updated_at`, `image`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'Nitesh', 'nitesh91153@gmail.com', NULL, '$2y$10$2V74fkiYiQYBoP3lInfzAemyqReXCYnbi6Wn0VNPobcuMPvYn6FBS', NULL, NULL, '2022-03-14 01:17:48', '2022-03-21 04:49:02', NULL, 0, 'avatar.png', 0, '#00BCD4'),
(3, 'Nites', 'nitesh9153@gmail.com', NULL, '$2y$10$LJLkPBtJh1JL6wa5DZvs0eyG1vk4j3tCFYz1azUoOWAFCThowQaYO', NULL, NULL, '2022-03-14 01:29:14', '2022-03-14 01:29:14', NULL, 0, 'avatar.png', 0, '#2180f3'),
(4, 'shakti', 'nitesh9@gmail.com', NULL, '$2y$10$oxXC4A5O1QAAXt45Q9YpAeYAwEc.bX1xnWKf9idBlYNa.O0pe.hD2', NULL, NULL, '2022-03-14 01:29:59', '2022-03-14 01:29:59', NULL, 0, 'avatar.png', 0, '#2180f3'),
(5, 'parveen', 'company@gmail.com', NULL, '$2y$10$2V74fkiYiQYBoP3lInfzAemyqReXCYnbi6Wn0VNPobcuMPvYn6FBS', NULL, NULL, '2022-03-14 01:39:21', '2022-03-14 01:39:21', NULL, 0, 'avatar.png', 0, '#2180f3'),
(6, 'suman', 'nitesh913@gmail.com', NULL, '$2y$10$r2f/TVwdpBGrA1BHlua/J.Eu2CtPXpjY/OMKhf1/fNgZyGJCXy0Je', NULL, NULL, '2022-03-14 01:40:44', '2022-03-14 01:40:44', NULL, 0, 'avatar.png', 0, '#2180f3'),
(7, 'punit', 'don91153@gmail.com', NULL, '$2y$10$8e/YGMIBEG6NSfmKOSM7i.5yS15Kp1Zh66x6/XZio3dVI32lurpGO', NULL, NULL, '2022-03-14 04:41:46', '2022-03-14 04:41:46', NULL, 0, 'avatar.png', 0, '#2180f3'),
(8, 'Uma', 'zykav@gmail.com', NULL, '$2y$10$GE2k3JBiQszgB5EcTgQch.ljinb09JhzDakZsAwWwOtMBQRacZSoe', NULL, NULL, '2022-03-14 06:29:16', '2022-03-14 06:29:16', NULL, 0, 'avatar.png', 0, '#2180f3'),
(9, 'Erin', 'xomaxim@gmail.com', NULL, '$2y$10$ujr7TdiQzunOMuezGPSsE.1cCfNXFjlmaoh5ZOPtmdPokfbTumYoi', NULL, NULL, '2022-03-14 06:30:06', '2022-03-14 06:30:06', NULL, 0, 'avatar.png', 0, '#2180f3'),
(11, 'nitesh', 'nitesh@gmail.com', NULL, '$2y$10$92AE/y5U9ilgMqby3sl/gOOjHv9gD1.gxQJ4Y3HB2gE3NB3tYsaEO', NULL, NULL, '2022-03-16 03:32:33', '2022-03-16 03:32:33', NULL, 0, 'avatar.png', 0, '#2180f3'),
(12, 'puneet', 'niteseeh@gmail.com', NULL, '$2y$10$k9zIDDM9EPYovP8yb5a.c..2V5VCWM0LQ2.oo9.NEtXCq.exFCopm', NULL, NULL, '2022-03-16 03:37:50', '2022-03-16 03:37:50', NULL, 0, 'avatar.png', 0, '#2180f3'),
(13, 'gaurav', 'gaurav@gmail.com', NULL, '$2y$10$a7hWlENc3xq8QjvSQL5cXuXyH3FDCP1wm5RbIcAm08ZU1NoTs9hfq', NULL, NULL, '2022-03-16 03:39:09', '2022-03-16 03:39:09', NULL, 0, 'avatar.png', 0, '#2180f3'),
(14, 'vivek', 'nitesh.img@gmail.com', NULL, '$2y$10$UJjXqzj99UMpDDmi/mi80.HA9t1LRmzO3wWJ21JYdP.842x4jQuKW', NULL, NULL, '2022-03-16 22:53:37', '2022-03-16 22:53:37', NULL, 0, 'avatar.png', 0, '#2180f3'),
(15, 'jhho', 'ijiok@gmail.com', NULL, '$2y$10$J43.RR.wQv6hawiOKpLI7.lYJTDAQw/lcIftOLlXwSmZxHerkvBz6', NULL, NULL, '2022-03-21 02:20:23', '2022-03-21 02:20:23', NULL, 0, 'avatar.png', 0, '#2180f3'),
(16, 'test', 'test@gmail.com', NULL, '$2y$10$kT9XhL05wglBjq8VB4VHVe8z2iPMnn7QwCcxFLGj5C9KZSjp.283.', NULL, NULL, '2022-03-21 04:47:55', '2022-03-21 04:52:03', NULL, 0, 'avatar.png', 0, '#2180f3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproject`
--
ALTER TABLE `addproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignprojects`
--
ALTER TABLE `assignprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproject`
--
ALTER TABLE `addproject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignprojects`
--
ALTER TABLE `assignprojects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_type`
--
ALTER TABLE `project_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
