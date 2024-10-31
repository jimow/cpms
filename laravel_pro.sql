-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 05:20 PM
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
-- Database: `laravel_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mandera', '2024-10-26 16:43:39', '2024-10-26 16:43:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ministry_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `ministry_id`) VALUES
(1, 'Finance & Economic Planning', NULL, NULL, NULL, 1),
(2, 'Health Services', NULL, NULL, NULL, 2),
(3, 'Water Services', NULL, NULL, NULL, 3),
(4, 'Lands & Physical Planning', NULL, NULL, NULL, 4),
(5, 'Gender & Social Services', NULL, NULL, NULL, 5),
(6, 'Agriculture & Irrigation', NULL, NULL, NULL, 6),
(7, 'Public Services', NULL, NULL, NULL, 7),
(8, 'Trade & Cooperatives', NULL, NULL, NULL, 8),
(9, 'Roads, Public Works And Transport', NULL, NULL, NULL, 9),
(10, 'Education & Human Capital', NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `feedback` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_project`
--

CREATE TABLE `feedback_project` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `feedback_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

CREATE TABLE `financial_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2024-2025', '2024-10-26 17:01:02', '2024-10-26 17:01:02', NULL),
(2, '2023-2024', '2024-10-26 17:01:11', '2024-10-26 17:01:11', NULL),
(3, '2022-2023', '2024-10-26 17:01:19', '2024-10-26 17:01:19', NULL),
(4, '2021-2022', '2024-10-26 17:01:26', '2024-10-26 17:01:26', NULL),
(5, '2020-2021', '2024-10-26 17:01:36', '2024-10-26 17:01:36', NULL),
(6, '2019-2020', '2024-10-26 17:01:47', '2024-10-26 17:01:47', NULL),
(7, '2018-2019', '2024-10-26 17:01:56', '2024-10-26 17:01:56', NULL),
(8, '2016-2017', '2024-10-26 17:02:05', '2024-10-26 17:02:05', NULL),
(9, '2015-2016', '2024-10-26 17:02:16', '2024-10-26 17:02:16', NULL),
(10, '2014-2015', '2024-10-26 17:02:23', '2024-10-26 17:02:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_10_25_000001_create_media_table', 1),
(4, '2024_10_25_000002_create_permissions_table', 1),
(5, '2024_10_25_000003_create_roles_table', 1),
(6, '2024_10_25_000004_create_users_table', 1),
(7, '2024_10_25_000005_create_projects_table', 1),
(8, '2024_10_25_000006_create_counties_table', 1),
(9, '2024_10_25_000007_create_sub_counties_table', 1),
(10, '2024_10_25_000008_create_wards_table', 1),
(11, '2024_10_25_000009_create_ministries_table', 1),
(12, '2024_10_25_000010_create_departments_table', 1),
(13, '2024_10_25_000011_create_financial_years_table', 1),
(14, '2024_10_25_000012_create_feedbacks_table', 1),
(15, '2024_10_25_000013_create_permission_role_pivot_table', 1),
(16, '2024_10_25_000014_create_role_user_pivot_table', 1),
(17, '2024_10_25_000015_create_feedback_project_pivot_table', 1),
(18, '2024_10_25_000016_add_relationship_fields_to_projects_table', 1),
(19, '2024_10_25_000017_add_relationship_fields_to_sub_counties_table', 1),
(20, '2024_10_25_000018_add_relationship_fields_to_wards_table', 1),
(21, '2024_10_25_000019_add_relationship_fields_to_departments_table', 1),
(22, '2024_10_25_000020_add_relationship_fields_to_feedbacks_table', 1),
(23, '2024_10_25_000021_add_verification_fields', 1),
(24, '2024_10_25_000022_add_approval_fields', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Finance & Economic Planning', '2024-10-26 16:56:16', '2024-10-26 16:56:16', NULL),
(2, 'Health Services', '2024-10-26 16:56:26', '2024-10-26 16:56:26', NULL),
(3, 'Water Services', '2024-10-26 16:56:35', '2024-10-26 16:56:35', NULL),
(4, 'Lands & Physical Planning', '2024-10-26 16:56:50', '2024-10-26 16:56:50', NULL),
(5, 'Gender & Social Services', '2024-10-26 16:57:04', '2024-10-26 16:57:04', NULL),
(6, 'Agriculture & Irrigation', '2024-10-26 16:57:24', '2024-10-26 16:57:24', NULL),
(7, 'Public Services', '2024-10-26 16:57:39', '2024-10-26 16:57:39', NULL),
(8, 'Trade & Cooperatives', '2024-10-26 16:57:51', '2024-10-26 16:57:51', NULL),
(9, 'Roads, Public Works And Transport', '2024-10-26 16:58:23', '2024-10-26 16:58:23', NULL),
(10, 'Education & Human Capital', '2024-10-26 16:59:10', '2024-10-26 16:59:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'project_create', NULL, NULL, NULL),
(18, 'project_edit', NULL, NULL, NULL),
(19, 'project_show', NULL, NULL, NULL),
(20, 'project_delete', NULL, NULL, NULL),
(21, 'project_access', NULL, NULL, NULL),
(22, 'county_create', NULL, NULL, NULL),
(23, 'county_edit', NULL, NULL, NULL),
(24, 'county_show', NULL, NULL, NULL),
(25, 'county_delete', NULL, NULL, NULL),
(26, 'county_access', NULL, NULL, NULL),
(27, 'sub_county_create', NULL, NULL, NULL),
(28, 'sub_county_edit', NULL, NULL, NULL),
(29, 'sub_county_show', NULL, NULL, NULL),
(30, 'sub_county_delete', NULL, NULL, NULL),
(31, 'sub_county_access', NULL, NULL, NULL),
(32, 'ward_create', NULL, NULL, NULL),
(33, 'ward_edit', NULL, NULL, NULL),
(34, 'ward_show', NULL, NULL, NULL),
(35, 'ward_delete', NULL, NULL, NULL),
(36, 'ward_access', NULL, NULL, NULL),
(37, 'ministry_create', NULL, NULL, NULL),
(38, 'ministry_edit', NULL, NULL, NULL),
(39, 'ministry_show', NULL, NULL, NULL),
(40, 'ministry_delete', NULL, NULL, NULL),
(41, 'ministry_access', NULL, NULL, NULL),
(42, 'department_create', NULL, NULL, NULL),
(43, 'department_edit', NULL, NULL, NULL),
(44, 'department_show', NULL, NULL, NULL),
(45, 'department_delete', NULL, NULL, NULL),
(46, 'department_access', NULL, NULL, NULL),
(47, 'financial_year_create', NULL, NULL, NULL),
(48, 'financial_year_edit', NULL, NULL, NULL),
(49, 'financial_year_show', NULL, NULL, NULL),
(50, 'financial_year_delete', NULL, NULL, NULL),
(51, 'financial_year_access', NULL, NULL, NULL),
(52, 'feedback_create', NULL, NULL, NULL),
(53, 'feedback_edit', NULL, NULL, NULL),
(54, 'feedback_show', NULL, NULL, NULL),
(55, 'feedback_delete', NULL, NULL, NULL),
(56, 'feedback_access', NULL, NULL, NULL),
(57, 'setting_access', NULL, NULL, NULL),
(58, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `financial_year_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `details`, `budget`, `status`, `created_at`, `updated_at`, `deleted_at`, `ward_id`, `department_id`, `financial_year_id`) VALUES
(1, 'Project 1', 'Description of project 1, a significant development in its respective ward.', '7373794', 'Completed', NULL, NULL, NULL, 30, 6, 5),
(2, 'Project 2', 'Description of project 2, a significant development in its respective ward.', '9957704', 'Completed', NULL, NULL, NULL, 22, 9, 5),
(3, 'Project 3', 'Description of project 3, a significant development in its respective ward.', '4479817', 'Ongoing', NULL, NULL, NULL, 18, 2, 3),
(4, 'Project 4', 'Description of project 4, a significant development in its respective ward.', '1945756', 'Stalled', NULL, NULL, NULL, 9, 8, 7),
(5, 'Project 5', 'Description of project 5, a significant development in its respective ward.', '8983739', 'Ongoing', NULL, NULL, NULL, 22, 9, 7),
(6, 'Project 6', 'Description of project 6, a significant development in its respective ward.', '6615836', 'In Procurement', NULL, NULL, NULL, 9, 10, 7),
(7, 'Project 7', 'Description of project 7, a significant development in its respective ward.', '923157', 'Stalled', NULL, NULL, NULL, 16, 8, 6),
(8, 'Project 8', 'Description of project 8, a significant development in its respective ward.', '932864', 'In Procurement', NULL, NULL, NULL, 30, 10, 8),
(9, 'Project 9', 'Description of project 9, a significant development in its respective ward.', '8248039', 'Ongoing', NULL, NULL, NULL, 21, 6, 4),
(10, 'Project 10', 'Description of project 10, a significant development in its respective ward.', '7281878', 'Ongoing', NULL, NULL, NULL, 23, 1, 6),
(11, 'Project 11', 'Description of project 11, a significant development in its respective ward.', '6205991', 'Completed', NULL, NULL, NULL, 30, 4, 8),
(12, 'Project 12', 'Description of project 12, a significant development in its respective ward.', '1247466', 'In Procurement', NULL, NULL, NULL, 22, 8, 10),
(13, 'Project 13', 'Description of project 13, a significant development in its respective ward.', '6840847', 'Ongoing', NULL, NULL, NULL, 24, 5, 2),
(14, 'Project 14', 'Description of project 14, a significant development in its respective ward.', '9311861', 'In Procurement', NULL, NULL, NULL, 27, 4, 9),
(15, 'Project 15', 'Description of project 15, a significant development in its respective ward.', '7764193', 'In Procurement', NULL, NULL, NULL, 8, 8, 6),
(16, 'Project 16', 'Description of project 16, a significant development in its respective ward.', '8015400', 'Ongoing', NULL, NULL, NULL, 16, 2, 1),
(17, 'Project 17', 'Description of project 17, a significant development in its respective ward.', '2417586', 'In Procurement', NULL, NULL, NULL, 21, 10, 6),
(18, 'Project 18', 'Description of project 18, a significant development in its respective ward.', '8835903', 'Stalled', NULL, NULL, NULL, 9, 9, 2),
(19, 'Project 19', 'Description of project 19, a significant development in its respective ward.', '3496470', 'Stalled', NULL, NULL, NULL, 18, 6, 9),
(20, 'Project 20', 'Description of project 20, a significant development in its respective ward.', '2263170', 'Completed', NULL, NULL, NULL, 24, 2, 3),
(21, 'Project 21', 'Description of project 21, a significant development in its respective ward.', '5706582', 'Ongoing', NULL, NULL, NULL, 3, 5, 6),
(22, 'Project 22', 'Description of project 22, a significant development in its respective ward.', '2714367', 'Completed', NULL, NULL, NULL, 6, 6, 8),
(23, 'Project 23', 'Description of project 23, a significant development in its respective ward.', '5953331', 'Ongoing', NULL, NULL, NULL, 10, 10, 3),
(24, 'Project 24', 'Description of project 24, a significant development in its respective ward.', '6694718', 'Stalled', NULL, NULL, NULL, 27, 1, 3),
(25, 'Project 25', 'Description of project 25, a significant development in its respective ward.', '7601823', 'In Procurement', NULL, NULL, NULL, 7, 3, 4),
(26, 'Project 26', 'Description of project 26, a significant development in its respective ward.', '9900146', 'Ongoing', NULL, NULL, NULL, 8, 1, 7),
(27, 'Project 27', 'Description of project 27, a significant development in its respective ward.', '8158894', 'In Procurement', NULL, NULL, NULL, 26, 9, 8),
(28, 'Project 28', 'Description of project 28, a significant development in its respective ward.', '8289552', 'In Procurement', NULL, NULL, NULL, 17, 6, 5),
(29, 'Project 29', 'Description of project 29, a significant development in its respective ward.', '8767332', 'Stalled', NULL, NULL, NULL, 18, 2, 9),
(30, 'Project 30', 'Description of project 30, a significant development in its respective ward.', '2867371', 'In Procurement', NULL, NULL, NULL, 28, 3, 7),
(31, 'Project 31', 'Description of project 31, a significant development in its respective ward.', '1360722', 'In Procurement', NULL, NULL, NULL, 3, 9, 1),
(32, 'Project 32', 'Description of project 32, a significant development in its respective ward.', '3730864', 'Ongoing', NULL, NULL, NULL, 20, 2, 4),
(33, 'Project 33', 'Description of project 33, a significant development in its respective ward.', '8962459', 'In Procurement', NULL, NULL, NULL, 11, 2, 6),
(34, 'Project 34', 'Description of project 34, a significant development in its respective ward.', '6708110', 'Completed', NULL, NULL, NULL, 22, 7, 6),
(35, 'Project 35', 'Description of project 35, a significant development in its respective ward.', '8911619', 'Stalled', NULL, NULL, NULL, 9, 3, 5),
(36, 'Project 36', 'Description of project 36, a significant development in its respective ward.', '2535269', 'In Procurement', NULL, NULL, NULL, 16, 1, 4),
(37, 'Project 37', 'Description of project 37, a significant development in its respective ward.', '9660503', 'In Procurement', NULL, NULL, NULL, 17, 1, 8),
(38, 'Project 38', 'Description of project 38, a significant development in its respective ward.', '6785179', 'Completed', NULL, NULL, NULL, 19, 4, 4),
(39, 'Project 39', 'Description of project 39, a significant development in its respective ward.', '9270931', 'In Procurement', NULL, NULL, NULL, 14, 9, 3),
(40, 'Project 40', 'Description of project 40, a significant development in its respective ward.', '3034628', 'Stalled', NULL, NULL, NULL, 11, 7, 4),
(41, 'Project 41', 'Description of project 41, a significant development in its respective ward.', '6384471', 'In Procurement', NULL, NULL, NULL, 9, 10, 2),
(42, 'Project 42', 'Description of project 42, a significant development in its respective ward.', '3213872', 'Completed', NULL, NULL, NULL, 20, 8, 7),
(43, 'Project 43', 'Description of project 43, a significant development in its respective ward.', '2670401', 'Stalled', NULL, NULL, NULL, 17, 3, 10),
(44, 'Project 44', 'Description of project 44, a significant development in its respective ward.', '8904923', 'In Procurement', NULL, NULL, NULL, 18, 1, 10),
(45, 'Project 45', 'Description of project 45, a significant development in its respective ward.', '4880709', 'Ongoing', NULL, NULL, NULL, 11, 3, 8),
(46, 'Project 46', 'Description of project 46, a significant development in its respective ward.', '1584767', 'Ongoing', NULL, NULL, NULL, 10, 3, 5),
(47, 'Project 47', 'Description of project 47, a significant development in its respective ward.', '3063055', 'In Procurement', NULL, NULL, NULL, 30, 3, 9),
(48, 'Project 48', 'Description of project 48, a significant development in its respective ward.', '6409446', 'In Procurement', NULL, NULL, NULL, 20, 5, 7),
(49, 'Project 49', 'Description of project 49, a significant development in its respective ward.', '3368795', 'Completed', NULL, NULL, NULL, 3, 5, 1),
(50, 'Project 50', 'Description of project 50, a significant development in its respective ward.', '3527813', 'Stalled', NULL, NULL, NULL, 1, 5, 7),
(51, 'Project 51', 'Description of project 51, a significant development in its respective ward.', '9893900', 'Ongoing', NULL, NULL, NULL, 16, 1, 8),
(52, 'Project 52', 'Description of project 52, a significant development in its respective ward.', '6665852', 'Ongoing', NULL, NULL, NULL, 28, 9, 6),
(53, 'Project 53', 'Description of project 53, a significant development in its respective ward.', '1397254', 'Completed', NULL, NULL, NULL, 21, 1, 3),
(54, 'Project 54', 'Description of project 54, a significant development in its respective ward.', '6265123', 'In Procurement', NULL, NULL, NULL, 8, 8, 7),
(55, 'Project 55', 'Description of project 55, a significant development in its respective ward.', '9605145', 'Stalled', NULL, NULL, NULL, 9, 7, 8),
(56, 'Project 56', 'Description of project 56, a significant development in its respective ward.', '6222152', 'Completed', NULL, NULL, NULL, 14, 2, 8),
(57, 'Project 57', 'Description of project 57, a significant development in its respective ward.', '726462', 'Ongoing', NULL, NULL, NULL, 17, 6, 10),
(58, 'Project 58', 'Description of project 58, a significant development in its respective ward.', '5011844', 'Ongoing', NULL, NULL, NULL, 27, 10, 10),
(59, 'Project 59', 'Description of project 59, a significant development in its respective ward.', '4016521', 'Completed', NULL, NULL, NULL, 19, 7, 3),
(60, 'Project 60', 'Description of project 60, a significant development in its respective ward.', '5510090', 'Stalled', NULL, NULL, NULL, 15, 9, 5),
(61, 'Project 61', 'Description of project 61, a significant development in its respective ward.', '4121067', 'Stalled', NULL, NULL, NULL, 3, 8, 8),
(62, 'Project 62', 'Description of project 62, a significant development in its respective ward.', '7923367', 'In Procurement', NULL, NULL, NULL, 30, 10, 7),
(63, 'Project 63', 'Description of project 63, a significant development in its respective ward.', '3049954', 'Ongoing', NULL, NULL, NULL, 12, 7, 2),
(64, 'Project 64', 'Description of project 64, a significant development in its respective ward.', '1724040', 'In Procurement', NULL, NULL, NULL, 10, 3, 7),
(65, 'Project 65', 'Description of project 65, a significant development in its respective ward.', '788712', 'Stalled', NULL, NULL, NULL, 30, 7, 4),
(66, 'Project 66', 'Description of project 66, a significant development in its respective ward.', '5864473', 'Stalled', NULL, NULL, NULL, 11, 9, 10),
(67, 'Project 67', 'Description of project 67, a significant development in its respective ward.', '9161619', 'Stalled', NULL, NULL, NULL, 23, 3, 5),
(68, 'Project 68', 'Description of project 68, a significant development in its respective ward.', '8455432', 'Ongoing', NULL, NULL, NULL, 2, 7, 4),
(69, 'Project 69', 'Description of project 69, a significant development in its respective ward.', '3610746', 'Stalled', NULL, NULL, NULL, 15, 6, 5),
(70, 'Project 70', 'Description of project 70, a significant development in its respective ward.', '6538210', 'Ongoing', NULL, NULL, NULL, 30, 3, 1),
(71, 'Project 71', 'Description of project 71, a significant development in its respective ward.', '7843489', 'Completed', NULL, NULL, NULL, 5, 7, 8),
(72, 'Project 72', 'Description of project 72, a significant development in its respective ward.', '5919237', 'Completed', NULL, NULL, NULL, 30, 1, 2),
(73, 'Project 73', 'Description of project 73, a significant development in its respective ward.', '6632264', 'In Procurement', NULL, NULL, NULL, 15, 1, 10),
(74, 'Project 74', 'Description of project 74, a significant development in its respective ward.', '7064088', 'In Procurement', NULL, NULL, NULL, 30, 7, 6),
(75, 'Project 75', 'Description of project 75, a significant development in its respective ward.', '4407146', 'In Procurement', NULL, NULL, NULL, 30, 2, 3),
(76, 'Project 76', 'Description of project 76, a significant development in its respective ward.', '9314098', 'Stalled', NULL, NULL, NULL, 4, 3, 9),
(77, 'Project 77', 'Description of project 77, a significant development in its respective ward.', '5943884', 'Stalled', NULL, NULL, NULL, 10, 4, 7),
(78, 'Project 78', 'Description of project 78, a significant development in its respective ward.', '8211993', 'In Procurement', NULL, NULL, NULL, 13, 2, 4),
(79, 'Project 79', 'Description of project 79, a significant development in its respective ward.', '7343710', 'Ongoing', NULL, NULL, NULL, 20, 7, 7),
(80, 'Project 80', 'Description of project 80, a significant development in its respective ward.', '4762940', 'Ongoing', NULL, NULL, NULL, 29, 10, 3),
(81, 'Project 81', 'Description of project 81, a significant development in its respective ward.', '1144202', 'Completed', NULL, NULL, NULL, 27, 9, 1),
(82, 'Project 82', 'Description of project 82, a significant development in its respective ward.', '6472354', 'Stalled', NULL, NULL, NULL, 28, 4, 4),
(83, 'Project 83', 'Description of project 83, a significant development in its respective ward.', '2412289', 'Completed', NULL, NULL, NULL, 2, 3, 4),
(84, 'Project 84', 'Description of project 84, a significant development in its respective ward.', '5861318', 'Stalled', NULL, NULL, NULL, 30, 7, 8),
(85, 'Project 85', 'Description of project 85, a significant development in its respective ward.', '5679243', 'Completed', NULL, NULL, NULL, 21, 2, 9),
(86, 'Project 86', 'Description of project 86, a significant development in its respective ward.', '4301657', 'Completed', NULL, NULL, NULL, 22, 4, 7),
(87, 'Project 87', 'Description of project 87, a significant development in its respective ward.', '6249299', 'In Procurement', NULL, NULL, NULL, 18, 3, 1),
(88, 'Project 88', 'Description of project 88, a significant development in its respective ward.', '9731043', 'Stalled', NULL, NULL, NULL, 21, 1, 5),
(89, 'Project 89', 'Description of project 89, a significant development in its respective ward.', '5677660', 'Stalled', NULL, NULL, NULL, 5, 3, 3),
(90, 'Project 90', 'Description of project 90, a significant development in its respective ward.', '3631730', 'In Procurement', NULL, NULL, NULL, 1, 3, 3),
(91, 'Project 91', 'Description of project 91, a significant development in its respective ward.', '2893037', 'Completed', NULL, NULL, NULL, 25, 3, 9),
(92, 'Project 92', 'Description of project 92, a significant development in its respective ward.', '8513971', 'In Procurement', NULL, NULL, NULL, 13, 4, 10),
(93, 'Project 93', 'Description of project 93, a significant development in its respective ward.', '7249168', 'Ongoing', NULL, NULL, NULL, 17, 6, 10),
(94, 'Project 94', 'Description of project 94, a significant development in its respective ward.', '1555123', 'Ongoing', NULL, NULL, NULL, 21, 2, 2),
(95, 'Project 95', 'Description of project 95, a significant development in its respective ward.', '9234242', 'Ongoing', NULL, NULL, NULL, 10, 3, 3),
(96, 'Project 96', 'Description of project 96, a significant development in its respective ward.', '6310807', 'Ongoing', NULL, NULL, NULL, 2, 6, 9),
(97, 'Project 97', 'Description of project 97, a significant development in its respective ward.', '4694475', 'Ongoing', NULL, NULL, NULL, 1, 8, 6),
(98, 'Project 98', 'Description of project 98, a significant development in its respective ward.', '4812506', 'In Procurement', NULL, NULL, NULL, 13, 2, 9),
(99, 'Project 99', 'Description of project 99, a significant development in its respective ward.', '2601826', 'Stalled', NULL, NULL, NULL, 21, 7, 7),
(100, 'Project 100', 'Description of project 100, a significant development in its respective ward.', '737769', 'Ongoing', NULL, NULL, NULL, 19, 7, 2),
(101, 'Project 101', 'Project 101 Details', '1000000', 'In Procurement', '2024-10-26 17:57:32', '2024-10-26 17:57:32', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_counties`
--

CREATE TABLE `sub_counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `county_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_counties`
--

INSERT INTO `sub_counties` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `county_id`) VALUES
(1, 'Mandera', '2024-10-26 16:43:55', '2024-10-26 16:43:55', NULL, 1),
(2, 'Mandera West', '2024-10-26 16:44:09', '2024-10-26 16:44:09', NULL, 1),
(3, 'Banisa', '2024-10-26 16:44:18', '2024-10-26 16:44:18', NULL, 1),
(4, 'Mandera South', '2024-10-26 16:44:30', '2024-10-26 16:44:30', NULL, 1),
(5, 'Mandera North', '2024-10-26 16:44:43', '2024-10-26 16:44:43', NULL, 1),
(6, 'Lafey', '2024-10-26 16:45:03', '2024-10-26 16:45:03', NULL, 1),
(7, 'Kutulo', '2024-10-26 16:45:15', '2024-10-26 16:45:15', NULL, 1),
(8, 'Kiliweheri', '2024-10-26 16:45:27', '2024-10-26 16:45:27', NULL, 1),
(9, 'Arabia', '2024-10-26 16:45:44', '2024-10-26 16:45:44', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `verified` tinyint(1) DEFAULT 0,
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `approved`, `verified`, `verified_at`, `verification_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$U1xYpfQC84XZc22bma0uWOaiDAowCEYaWJKGeOeIiiKprcI8aG/Ku', 1, 1, '2024-09-09 09:16:31', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sub_county_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `sub_county_id`) VALUES
(1, 'Township', '2024-10-26 16:46:33', '2024-10-26 16:46:33', NULL, 1),
(2, 'Neboi', '2024-10-26 16:46:45', '2024-10-26 16:46:45', NULL, 1),
(3, 'Khalalio', '2024-10-26 16:46:54', '2024-10-26 16:46:54', NULL, 1),
(4, 'Arabia', '2024-10-26 16:47:08', '2024-10-26 16:47:08', NULL, 1),
(5, 'Libehiya', '2024-10-26 16:47:20', '2024-10-26 16:47:20', NULL, 1),
(6, 'Rhamu Dimtu', '2024-10-26 16:47:32', '2024-10-26 16:47:32', NULL, 5),
(7, 'Rhamu', '2024-10-26 16:47:45', '2024-10-26 16:47:45', NULL, 5),
(8, 'guticha', '2024-10-26 16:48:11', '2024-10-26 16:48:11', NULL, 5),
(9, 'Lafeey', '2024-10-26 16:48:34', '2024-10-26 16:48:34', NULL, 6),
(10, 'Ashabito', '2024-10-26 16:48:47', '2024-10-26 16:48:47', NULL, 5),
(11, 'Fino', '2024-10-26 16:49:04', '2024-10-26 16:49:04', NULL, 6),
(12, 'Sala', '2024-10-26 16:49:17', '2024-10-26 16:49:17', NULL, 6),
(13, 'Warankara', '2024-10-26 16:49:30', '2024-10-26 16:49:30', NULL, 6),
(14, 'Alungo', '2024-10-26 16:49:46', '2024-10-26 16:49:46', NULL, 6),
(15, 'Elwak North', '2024-10-26 16:50:04', '2024-10-26 16:50:04', NULL, 4),
(16, 'Elwak South', '2024-10-26 16:50:18', '2024-10-26 16:50:18', NULL, 6),
(17, 'Kutulo', '2024-10-26 16:50:32', '2024-10-26 16:50:32', NULL, 4),
(18, 'Wargadud', '2024-10-26 16:50:57', '2024-10-26 16:50:57', NULL, 4),
(19, 'Takaba', '2024-10-26 16:51:26', '2024-10-26 16:51:26', NULL, 2),
(20, 'Takaba South', '2024-10-26 16:51:43', '2024-10-26 16:51:43', NULL, 2),
(21, 'Dandu', '2024-10-26 16:51:54', '2024-10-26 16:51:54', NULL, 2),
(22, 'Gither', '2024-10-26 16:52:06', '2024-10-26 16:52:06', NULL, 2),
(23, 'Guba', '2024-10-26 16:52:18', '2024-10-26 16:52:18', NULL, 3),
(24, 'Banisa', '2024-10-26 16:52:27', '2024-10-26 16:52:27', NULL, 3),
(25, 'Kiliweheri', '2024-10-26 16:52:40', '2024-10-26 16:52:40', NULL, 3),
(26, 'Malkamari', '2024-10-26 16:53:01', '2024-10-26 16:53:01', NULL, 3),
(27, 'Lagsure', '2024-10-26 16:54:39', '2024-10-26 16:54:39', NULL, 2),
(28, 'Derkhale', '2024-10-26 16:54:53', '2024-10-26 16:54:53', NULL, 3),
(29, 'Morothile', '2024-10-26 16:55:12', '2024-10-26 16:55:12', NULL, 5),
(30, 'Shimbir Fatuma', '2024-10-26 16:55:48', '2024-10-26 16:55:48', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ministry_fk_10112939` (`ministry_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_fk_10112960` (`project_id`);

--
-- Indexes for table `feedback_project`
--
ALTER TABLE `feedback_project`
  ADD KEY `project_id_fk_10219513` (`project_id`),
  ADD KEY `feedback_id_fk_10219513` (`feedback_id`);

--
-- Indexes for table `financial_years`
--
ALTER TABLE `financial_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_10107447` (`role_id`),
  ADD KEY `permission_id_fk_10107447` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ward_fk_10112965` (`ward_id`),
  ADD KEY `department_fk_10112966` (`department_id`),
  ADD KEY `financial_year_fk_10112968` (`financial_year_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_10107456` (`user_id`),
  ADD KEY `role_id_fk_10107456` (`role_id`);

--
-- Indexes for table `sub_counties`
--
ALTER TABLE `sub_counties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `county_fk_10112921` (`county_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wards_name_unique` (`name`),
  ADD KEY `sub_county_fk_10112927` (`sub_county_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_years`
--
ALTER TABLE `financial_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_counties`
--
ALTER TABLE `sub_counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `ministry_fk_10112939` FOREIGN KEY (`ministry_id`) REFERENCES `ministries` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `project_fk_10112960` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `feedback_project`
--
ALTER TABLE `feedback_project`
  ADD CONSTRAINT `feedback_id_fk_10219513` FOREIGN KEY (`feedback_id`) REFERENCES `feedbacks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_id_fk_10219513` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_10107447` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_10107447` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `department_fk_10112966` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `financial_year_fk_10112968` FOREIGN KEY (`financial_year_id`) REFERENCES `financial_years` (`id`),
  ADD CONSTRAINT `ward_fk_10112965` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_10107456` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_10107456` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_counties`
--
ALTER TABLE `sub_counties`
  ADD CONSTRAINT `county_fk_10112921` FOREIGN KEY (`county_id`) REFERENCES `counties` (`id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `sub_county_fk_10112927` FOREIGN KEY (`sub_county_id`) REFERENCES `sub_counties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
