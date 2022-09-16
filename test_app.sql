-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for test_app
CREATE DATABASE IF NOT EXISTS `test_app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test_app`;

-- Dumping structure for table test_app.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.companies: ~2 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `email`, `telephone`, `website`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Webdesigner', 'admin@wearedesigners.net', '0714123423', 'http://localhost:8000/company', NULL, '2022-09-16 16:14:18', '2022-09-16 16:15:04'),
	(2, 'API COMPANYx', 'api@example.comx', '1345678999', 'www.api.comx', NULL, '2022-09-16 16:30:13', '2022-09-16 16:30:27');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table test_app.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.employees: ~1 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `first_name`, `last_name`, `company_id`, `email`, `phone`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Ishara', 'sewwandi', '1', 'yaisharasewwandi@gmail.com', '0714116061', NULL, '2022-09-16 16:17:33', '2022-09-16 16:17:33');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table test_app.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table test_app.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.media: ~6 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
	(2, 'App\\Models\\User', 3, '6515a399-9198-4704-8517-4792560122ac', 'images', 'user', 'user.png', 'image/webp', 'public', 'public', 162010, '[]', '[]', '[]', '[]', 1, '2022-09-16 15:30:48', '2022-09-16 15:30:48'),
	(3, 'App\\Models\\Company', 1, '88f3b88d-ac04-4dfe-be86-470a862b0d75', 'default', 'logo-1932539__340', 'logo-1932539__340.webp', 'image/webp', 'public', 'public', 21370, '[]', '[]', '[]', '[]', 2, '2022-09-16 16:14:18', '2022-09-16 16:14:18'),
	(4, 'App\\Models\\Company', 1, '948772a6-f063-4835-899f-bee8c4966b8b', 'default', '360_F_442018137_F4FTedsmVBxmaibxMKuNbeIms8Xkk1e4', '360_F_442018137_F4FTedsmVBxmaibxMKuNbeIms8Xkk1e4.jpg', 'image/jpeg', 'public', 'public', 36992, '[]', '[]', '[]', '[]', 3, '2022-09-16 16:14:19', '2022-09-16 16:14:19'),
	(5, 'App\\Models\\Company', 1, 'e7ecb27b-8486-448f-8d24-7e7616766aba', 'logo_image_path', 'logo-1932539__340', 'logo-1932539__340.webp', 'image/webp', 'public', 'public', 21370, '[]', '[]', '[]', '[]', 4, '2022-09-16 16:15:04', '2022-09-16 16:15:04'),
	(6, 'App\\Models\\Company', 1, '4e2d1bde-61b0-4183-9cf8-82adeaf0dce2', 'cover_image_path', '360_F_442018137_F4FTedsmVBxmaibxMKuNbeIms8Xkk1e4', '360_F_442018137_F4FTedsmVBxmaibxMKuNbeIms8Xkk1e4.jpg', 'image/jpeg', 'public', 'public', 36992, '[]', '[]', '[]', '[]', 5, '2022-09-16 16:15:05', '2022-09-16 16:15:05'),
	(7, 'App\\Models\\Employee', 1, '3b31cbd7-8c4d-48df-8d52-e89084ffe112', 'default', 'download11', 'download11.jfif', 'image/jpeg', 'public', 'public', 4272, '[]', '[]', '[]', '[]', 6, '2022-09-16 16:17:33', '2022-09-16 16:17:33');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table test_app.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_03_20_014142_create_permission_group_table', 1),
	(6, '2022_09_14_184433_create_permission_tables', 1),
	(7, '2022_09_14_193557_add_delete_at_to_roles_table', 1),
	(8, '2022_09_14_195221_add_image_path_to_users_table', 1),
	(9, '2022_09_15_161500_create_media_table', 1),
	(10, '2022_09_15_183225_create_companies_table', 1),
	(11, '2022_09_15_183252_create_employees_table', 1),
	(12, '2022_09_20_014643_add_group_id_to_permission_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table test_app.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table test_app.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.model_has_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table test_app.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table test_app.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.permissions: ~22 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
	(1, 'role-list', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 1),
	(2, 'role-create', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 1),
	(3, 'role-edit', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 1),
	(4, 'role-delete', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 1),
	(5, 'user-list', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 2),
	(6, 'user-create', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 2),
	(7, 'user-edit', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 2),
	(8, 'user-delete', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 2),
	(9, 'permission-list', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 3),
	(10, 'permission-create', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 3),
	(11, 'permission-edit', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 3),
	(12, 'permission-delete', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 3),
	(13, 'userProfile-edit', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 4),
	(14, 'company-list', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 5),
	(15, 'company-create', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 5),
	(16, 'company-edit', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 5),
	(17, 'company-delete', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 5),
	(18, 'employee-list', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 6),
	(19, 'employee-create', 'web', '2022-09-16 15:07:47', '2022-09-16 15:07:47', 6),
	(20, 'employee-edit', 'web', '2022-09-16 15:07:48', '2022-09-16 15:07:48', 6),
	(21, 'employee-delete', 'web', '2022-09-16 15:07:48', '2022-09-16 15:07:48', 6),
	(22, 'dashboard-list', 'web', '2022-09-16 15:07:48', '2022-09-16 15:07:48', 7);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table test_app.permission_group
CREATE TABLE IF NOT EXISTS `permission_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.permission_group: ~7 rows (approximately)
/*!40000 ALTER TABLE `permission_group` DISABLE KEYS */;
INSERT INTO `permission_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Role', '2022-09-16 15:07:47', '2022-09-16 15:07:47'),
	(2, 'User', '2022-09-16 15:07:47', '2022-09-16 15:07:47'),
	(3, 'Permission', '2022-09-16 15:07:47', '2022-09-16 15:07:47'),
	(4, 'UserProfile', '2022-09-16 15:07:47', '2022-09-16 15:07:47'),
	(5, 'Company', '2022-09-16 15:07:47', '2022-09-16 15:07:47'),
	(6, 'Employee', '2022-09-16 15:07:47', '2022-09-16 15:07:47'),
	(7, 'Dashboard', '2022-09-16 15:07:48', '2022-09-16 15:07:48');
/*!40000 ALTER TABLE `permission_group` ENABLE KEYS */;

-- Dumping structure for table test_app.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.personal_access_tokens: ~1 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, 'postmsn', 'eb825b66aecd3857e7a9b578e8bb886e785aa425b00bdcdfb53dc2cad3804395', '["*"]', '2022-09-16 16:35:15', '2022-09-16 16:28:11', '2022-09-16 16:35:15');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table test_app.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administrator', 'web', '2022-09-16 15:07:48', '2022-09-16 15:07:48', NULL),
	(2, 'User', 'web', '2022-09-16 15:18:02', '2022-09-16 15:18:02', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table test_app.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.role_has_permissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(13, 2),
	(22, 2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table test_app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test_app.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image_path`) VALUES
	(1, 'Admin', 'admin@wearedesigners.net', NULL, '$2y$10$XlDIn5Wz/ZnJQIu9ZP1dqef9N.X/G/t4aFfAJCAjuc/5aQh2m6NXe', NULL, '2022-09-16 15:07:48', '2022-09-16 15:18:02', NULL),
	(3, 'Ishara', 'yaisharasewwandi@gmail.com', NULL, '$2y$10$5MxoVg1TW.Mm/AAzBnaY0usjV7pJ0tQxFp1tVE5D8onWWCnusxSN.', NULL, '2022-09-16 15:19:23', '2022-09-16 15:19:23', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
