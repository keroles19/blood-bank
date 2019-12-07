-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 04:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'o-'),
(2, NULL, NULL, 'o+'),
(3, NULL, NULL, 'A-'),
(4, NULL, NULL, 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type_client`
--

CREATE TABLE `blood_type_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'تبرع'),
(2, NULL, NULL, 'استقبال'),
(5, '2019-11-28 10:28:34', '2019-12-03 12:50:14', 'عادي');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`created_at`, `updated_at`, `id`, `name`, `governorate_id`) VALUES
('2019-11-25 10:19:55', '2019-11-25 10:19:55', 7, 'bani-mazar', 3),
('2019-11-28 08:46:33', '2019-11-28 08:46:33', 8, 'ma3mora', 8),
('2019-11-28 08:46:43', '2019-11-28 08:46:43', 9, 'alex', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `last_donation_date` date DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `phone`, `password`, `name`, `email`, `date_of_birth`, `blood_type_id`, `last_donation_date`, `city_id`, `pin_code`, `api_token`, `active`) VALUES
(7, '2019-11-26 15:10:44', '2019-11-27 21:13:18', 1060402710, '$2y$10$uUf3vUOdlswGf5PbRhdsk.iLKYlgmAPryOgsQCb5dVQV5YTDlEpOy', 'keroles', 'keroles.test@gmail.com', '2018-10-01', 1, '2018-10-01', 7, NULL, 'QvP4zpaZVmnn22kfJEam4FZ5gbOqbR1UPCVh0XS7RzvyR5Mv8WZZsXjXsJXf', 0),
(8, '2019-11-26 15:11:03', '2019-11-26 15:11:03', 1060402711, '$2y$10$P53JmBNo7P1x2IwZ8gp1EeB0YZu8Q2d2d3w6tsM8PS5NEO5M5I8bG', 'sameh', 'sameh.test@gmail.com', '2018-10-01', 1, '2018-10-01', 7, NULL, 'QXJpvG15vfP01MgFQ0VVRvq1bqtjVbhqCH0yjDPaMA6HuZdr5g2eIpnVeHKG', 0),
(9, '2019-11-26 15:11:20', '2019-11-26 15:11:20', 1060402712, '$2y$10$R3iEYh57bKtrrvTU8GbfX.9ssqrUa3Gnyie7rdAy6a3bn6E2rays6', 'mena', 'mena.test@gmail.com', '2018-10-01', 1, '2018-10-01', 7, NULL, 'UexlCcx53LLmVqdrlJuVLRvFYcvquqDH01tHuAporuZQUD5e2S4yWcjhaWh3', 0),
(10, '2019-11-26 15:11:32', '2019-11-26 15:11:32', 1060402713, '$2y$10$ab9rRXUagVYgJtgShn2jzOBuIQ..wiLJY0AuGYJhusdpFV8QxMWRC', 'mary', 'mary.test@gmail.com', '2018-10-01', 1, '2018-10-01', 7, NULL, '10GuDeGrtF534Mkx6pY22PD43bUyGOJ30HYPxvRnFBeWSw50LniV8wOFdifA', 0),
(11, '2019-11-26 15:11:51', '2019-11-27 16:11:27', 1060402714, '$2y$10$aGxnjLSFsG7HCWyHEcYo.OFjJMq.ZtD4BGwTwjz1wSifOkxtgBZTe', 'abanoub', 'abanoub.test@gmail.com', '2018-10-01', 1, '2018-10-01', 7, NULL, 'IJnRNU05FTb8rfuaZJpc7zyCbqw0aIB9PjQ8qx5zqGCcGMckZ4HP0LeTAlcW', 0),
(12, '2019-11-26 15:12:03', '2019-11-27 16:11:07', 1060402715, '$2y$10$pHk3UggYZQUdeWI9pkJMpeuJQ/LXzuvIBwErQxwmtdu.9pfmCGbjO', 'mr', 'mr.test@gmail.com', '2018-10-01', 1, '2018-10-01', 7, NULL, '2Jqc9nNnebaJcBVAbRqdZN7rid2QG0GNU41Ynwptuy8eY1fBJALfZvClTJs3', 1),
(23, '2019-12-07 00:16:58', '2019-12-07 00:16:58', 1060402713, '$2y$10$nBBlGD2KtOtrHUDO6VN0G.Kb4sOKVxePIpdcAA2aN1GubTfFRkoxK', 'writer', 'kerolesatef200@gmail.com', '2019-12-11', 2, '2019-12-18', 8, NULL, 'peA9cpoM5NCojSG4DS5E2dDipJ6SEDxEjRin7FVXDbRrxdbExi0t6QlKzSEu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_governorate`
--

CREATE TABLE `client_governorate` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `governorate_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_notification`
--

CREATE TABLE `client_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_post`
--

CREATE TABLE `client_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_post`
--

INSERT INTO `client_post` (`id`, `created_at`, `updated_at`, `post_id`, `client_id`) VALUES
(5, NULL, NULL, 16, 9),
(16, NULL, NULL, 15, 7),
(17, NULL, NULL, 20, 7),
(18, NULL, NULL, 21, 7);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(5, '2019-12-07 12:06:43', '2019-12-07 12:06:43', 'writer', 'kerolesatef200@gmail.com', 1060402713, 'eee', 'wwwwwwwwwww');

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` smallint(6) NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `bags_num` int(11) NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(8,2) DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `created_at`, `updated_at`, `name`, `age`, `blood_type_id`, `bags_num`, `hospital_name`, `hospital_address`, `latitude`, `longitude`, `city_id`, `notes`, `client_id`) VALUES
(53, '2019-11-28 08:48:11', '2019-11-28 08:43:58', 'dd', 12, 2, 2, 'elslam', 'minya-bani-mazar', NULL, NULL, 7, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim, ipsum reiciendis deleniti dolor quia voluptate itaque vero doloremque labore consequuntur. Excepturi a neque doloremque. Vitae debitis sit explicabo tenetur est. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur cumque, hic enim nostrum assumenda esse quisquam error doloribus dolorem dolor commodi. Ratione eaque voluptate voluptatibus mollitia doloremque suscipit perferendis earum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. In impedit mollitia similique tenetur, excepturi soluta culpa perferendis magni perspiciatis ullam porro rerum amet inventore voluptates ad, minima facere quam asperiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet delectus laudantium aut recusandae quo aliquid cum magni. Praesentium, suscipit dolor reprehenderit unde natus laboriosam? Provident rem officiis et impedit fugit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quasi ullam nemo neque aut reprehenderit! Animi adipisci omnis eius iure ullam, dolorum odit ut nostrum atque repellat in earum velit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem natus sapiente, dolores, ratione ducimus sequi iusto mollitia porro nobis eligendi ipsum, quibusdam minus beatae provident totam enim est et. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magnam, debitis veritatis libero ipsum odio, architecto neque quibusdam cupiditate iste distinctio dignissimos temporibus! Harum eius possimus tenetur tempora placeat tempore?\r\n\r\n', 12),
(55, '2019-11-28 08:47:17', '2019-11-28 08:47:17', 'rr', 12, 2, 2, 'masr', 'msr-el', NULL, NULL, 8, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim, ipsum reiciendis deleniti dolor quia voluptate itaque vero doloremque labore consequuntur. Excepturi a neque doloremque. Vitae debitis sit explicabo tenetur est. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur cumque, hic enim nostrum assumenda esse quisquam error doloribus dolorem dolor commodi. Ratione eaque voluptate voluptatibus mollitia doloremque suscipit perferendis earum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. In impedit mollitia similique tenetur, excepturi soluta culpa perferendis magni perspiciatis ullam porro rerum amet inventore voluptates ad, minima facere quam asperiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet delectus laudantium aut recusandae quo aliquid cum magni. Praesentium, suscipit dolor reprehenderit unde natus laboriosam? Provident rem officiis et impedit fugit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quasi ullam nemo neque aut reprehenderit! Animi adipisci omnis eius iure ullam, dolorum odit ut nostrum atque repellat in earum velit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem natus sapiente, dolores, ratione ducimus sequi iusto mollitia porro nobis eligendi ipsum, quibusdam minus beatae provident totam enim est et. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magnam, debitis veritatis libero ipsum odio, architecto neque quibusdam cupiditate iste distinctio dignissimos temporibus! Harum eius possimus tenetur tempora placeat tempore?\r\n\r\n', 7),
(56, '2019-11-28 08:47:46', '2019-11-28 08:47:46', '33', 12, 3, 2, 'masr', 'msr-el', NULL, NULL, 9, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim, ipsum reiciendis deleniti dolor quia voluptate itaque vero doloremque labore consequuntur. Excepturi a neque doloremque. Vitae debitis sit explicabo tenetur est. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur cumque, hic enim nostrum assumenda esse quisquam error doloribus dolorem dolor commodi. Ratione eaque voluptate voluptatibus mollitia doloremque suscipit perferendis earum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. In impedit mollitia similique tenetur, excepturi soluta culpa perferendis magni perspiciatis ullam porro rerum amet inventore voluptates ad, minima facere quam asperiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet delectus laudantium aut recusandae quo aliquid cum magni. Praesentium, suscipit dolor reprehenderit unde natus laboriosam? Provident rem officiis et impedit fugit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quasi ullam nemo neque aut reprehenderit! Animi adipisci omnis eius iure ullam, dolorum odit ut nostrum atque repellat in earum velit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem natus sapiente, dolores, ratione ducimus sequi iusto mollitia porro nobis eligendi ipsum, quibusdam minus beatae provident totam enim est et. Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magnam, debitis veritatis libero ipsum odio, architecto neque quibusdam cupiditate iste distinctio dignissimos temporibus! Harum eius possimus tenetur tempora placeat tempore?\r\n\r\n', 8),
(57, '2019-11-28 08:48:11', '2019-11-28 08:48:11', 'pp', 12, 1, 2, 'masr', 'msr-el', NULL, NULL, 9, NULL, 9),
(58, NULL, NULL, 'bbbb', 23, 4, 2, 'ewwe fwe ewr', 'ewrwe', '12.00000000', '12.00', 9, 'eee', 10);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `created_at`, `updated_at`, `name`) VALUES
(2, NULL, NULL, 'alex'),
(3, NULL, NULL, 'minya'),
(4, NULL, NULL, 'asyout'),
(8, '2019-11-28 08:46:15', '2019-11-28 08:46:15', 'cairo');

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
(2, '2019_11_19_155533_create_blood_type_client_table', 1),
(3, '2019_11_19_155533_create_blood_types_table', 1),
(4, '2019_11_19_155533_create_categories_table', 1),
(5, '2019_11_19_155533_create_cities_table', 1),
(6, '2019_11_19_155533_create_client_governorate_table', 1),
(7, '2019_11_19_155533_create_client_notification_table', 1),
(8, '2019_11_19_155533_create_client_post_table', 1),
(9, '2019_11_19_155533_create_clients_table', 1),
(10, '2019_11_19_155533_create_contacts_table', 1),
(11, '2019_11_19_155533_create_donation_requests_table', 1),
(12, '2019_11_19_155533_create_governorates_table', 1),
(13, '2019_11_19_155533_create_notifications_table', 1),
(14, '2019_11_19_155533_create_posts_table', 1),
(15, '2019_11_19_155533_create_settings_table', 1),
(16, '2019_11_19_155533_create_tokens_table', 1),
(17, '2019_11_19_155543_create_foreign_keys', 1),
(18, '2014_10_12_100000_create_password_resets_table', 2),
(19, '2019_08_19_000000_create_failed_jobs_table', 2),
(20, '2019_12_01_115053_create_permission_tables', 3);

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
(9, 'App\\User', 1),
(11, 'App\\User', 3),
(12, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_request_id` int(10) UNSIGNED NOT NULL
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kerolesatef200@gmail.com', '$2y$10$XKknUK5YTfGnFo/EwK34cuIS2Rej9tO4Vg9JCuWGYtSgbA09h3z1S', '2019-12-05 13:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `routes` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `group_id`, `routes`) VALUES
(1, 'user-lists', 'web', NULL, NULL, 1, 'user.index'),
(2, 'user-create', 'web', NULL, NULL, 1, 'user.create,user.store'),
(3, 'user-edit', 'web', NULL, NULL, 1, 'user.edit,user.update'),
(4, 'user-delete', 'web', NULL, NULL, 1, 'user.destroy'),
(5, 'categories-lists', 'web', NULL, NULL, 2, 'category.index'),
(6, 'categories-edit', 'web', NULL, NULL, 2, 'category.edit,category.update'),
(7, 'categories-delete', 'web', NULL, NULL, 2, 'category.destroy'),
(8, 'categories-create', 'web', NULL, NULL, 2, 'category.create,category.store'),
(9, 'posts-lists', 'web', NULL, NULL, 3, 'post.index'),
(10, 'posts-edit', 'web', NULL, NULL, 3, 'post.edit,post.update'),
(11, 'posts-create', 'web', NULL, NULL, 3, 'post.create,post.store'),
(12, 'posts-delete', 'web', NULL, NULL, 3, 'post.destroy');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `image`, `body`, `category_id`) VALUES
(15, '2019-12-03 12:49:03', '2019-12-03 12:51:01', 'متبرع بفصيله  A+', 'post_image1575384542.jpg', 'متبرع بفصيله  متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله\"', 2),
(16, '2019-12-03 12:49:33', '2019-12-03 12:53:38', 'متبرع بفصيله B+', 'post_image1575384573.jpg', 'متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله متبرع بفصيله\"\"', 1),
(20, '2019-12-03 13:36:46', '2019-12-03 13:38:00', 'متبرع  من بني  مزار', 'post_image1575387480.jpg', 'متبرع  من بني  مزار متبرع  من بني  مزار متبرع  من بني  مزار    متبرع  من بني  مزار  متبرع  من بني  مزار  متبرع  من بني  مزار متبرع  من بني  مزار متبرع  من بني  مزار متبرع  من بني  مزار متبرع  من بني  مزار متبرع  من بني  مزار\"\"\"\"', 1),
(21, '2019-12-03 13:42:13', '2019-12-03 13:42:13', 'متبرع  من اسيوط', 'post_image1575387733.jpg', 'متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط متبرع  من متبرع  من بني  اسيوط بني  اسيوط متبرع  من بني  اسيوط متبرع  من بني  اسيوط', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'web', 'do everything', '2019-12-04 14:49:29', '2019-12-04 14:49:29'),
(11, 'writer', 'web', NULL, '2019-12-05 13:00:35', '2019-12-05 13:00:35'),
(12, 'editor', 'web', NULL, '2019-12-05 13:00:59', '2019-12-05 13:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 9),
(1, 11),
(1, 12),
(2, 9),
(2, 11),
(3, 9),
(3, 12),
(4, 9),
(5, 9),
(5, 11),
(5, 12),
(6, 9),
(6, 12),
(7, 9),
(8, 9),
(8, 11),
(9, 9),
(9, 12),
(10, 9),
(11, 9),
(12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `play_store_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_store_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_settings_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_app` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `play_store_url`, `app_store_url`, `notification_settings_text`, `about_app`, `phone`, `phone_email`, `fb_link`, `tw_link`) VALUES
(1, NULL, '2019-12-02 13:58:07', '', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi cupiditate velit vero? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis quisquam vero. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora consequuntur ad accusamus. Voluptatem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi cupiditate velit vero? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis quisquam vero. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora consequuntur ad accusamus. Voluptatem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi cupiditate velit vero? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis quisquam vero. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora consequuntur ad accusamus. Voluptatem?', '01060402713', 'kerolesAtef200@gmail.com', 'https://www.facebook.com/kerolesatef200/', '');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('andriod','ios') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'keroles', 'kerolesatef200@gmail.com', NULL, '$2y$10$owK/2ZHj4asZlymvwJBAj.KRdkq0htZb9cQhYVf9btbXDkrqH4slO', NULL, '2019-11-21 10:35:39', '2019-12-05 14:03:13'),
(3, 'keroles', 'kero@gmail.com', NULL, '$2y$10$owK/2ZHj4asZlymvwJBAj.KRdkq0htZb9cQhYVf9btbXDkrqH4slO', NULL, '2019-12-05 13:12:56', '2019-12-05 13:12:56'),
(6, 'abanoub', 'abanoub200@gmail.com', NULL, '$2y$10$kHvK2E3/gj0DgZg7C1DVMenpfGa4ku9AYpy8FSLAXoATSIoP/eF7G', NULL, '2019-12-05 14:09:57', '2019-12-05 14:09:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_type_client_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `blood_type_client_client_id_foreign` (`client_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_governorate_id_foreign` (`governorate_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_api_token_unique` (`api_token`),
  ADD KEY `clients_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `client_governorate`
--
ALTER TABLE `client_governorate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_governorate_client_id_foreign` (`client_id`),
  ADD KEY `client_governorate_governorate_id_foreign` (`governorate_id`);

--
-- Indexes for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notification_client_id_foreign` (`client_id`),
  ADD KEY `client_notification_notification_id_foreign` (`notification_id`);

--
-- Indexes for table `client_post`
--
ALTER TABLE `client_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_post_client_id_foreign` (`client_id`),
  ADD KEY `client_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_requests_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `donation_requests_city_id_foreign` (`city_id`),
  ADD KEY `donation_requests_client_id_foreign` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_donation_request_id_foreign` (`donation_request_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokens_client_id_foreign` (`client_id`);

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
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_governorate`
--
ALTER TABLE `client_governorate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_notification`
--
ALTER TABLE `client_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `client_post`
--
ALTER TABLE `client_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation_requests`
--
ALTER TABLE `donation_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD CONSTRAINT `blood_type_client_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_type_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_governorate`
--
ALTER TABLE `client_governorate`
  ADD CONSTRAINT `client_governorate_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_governorate_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD CONSTRAINT `client_notification_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_notification_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_post`
--
ALTER TABLE `client_post`
  ADD CONSTRAINT `client_post_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD CONSTRAINT `donation_requests_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_requests_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_requests_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_donation_request_id_foreign` FOREIGN KEY (`donation_request_id`) REFERENCES `donation_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
