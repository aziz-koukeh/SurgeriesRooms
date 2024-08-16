-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 10:10 AM
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
-- Database: `hospital-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_slug` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `device_image` varchar(255) DEFAULT NULL,
  `device_number` varchar(255) DEFAULT NULL,
  `device_info` varchar(255) DEFAULT NULL,
  `device_status` tinyint(3) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_slug`, `device_name`, `device_image`, `device_number`, `device_info`, `device_status`, `created_at`, `updated_at`) VALUES
(1, 'ab4e2a2a-6197-4092-a16e-93559f0f1db3', 'قوسي', 'assets/img/device2.jpg', 'ES- 1952', 'جهاز تنظير عظمية', 1, '2024-05-29 05:23:41', '2024-06-01 18:48:37'),
(2, '3f6d1e26-12ac-49ac-a4dd-5f6b576a43d0', 'قوسي', 'assets/img/device2.jpg', 'ES- 19999', 'جهاز تنظير عظمية', 1, '2024-05-29 10:18:06', '2024-06-01 18:34:15'),
(3, 'd39f43a5-ce86-4df0-a422-5de22c641155', 'تنظير', 'assets/img/device1.jpg', 'ES- 999', 'جهاز تنظير جراحة باطن', 1, '2024-05-29 10:18:34', '2024-06-01 18:34:41'),
(5, '9b6daa3e-b69e-44c7-9c71-1daa50247f52', 'ضاغط الدم', 'assets/img/device3.jpg', 'ES- 19526', 'ضاغط الدم', 1, '2024-05-30 10:47:59', '2024-05-30 10:47:59'),
(6, '8e29d0eb-784c-4f1e-b489-2230527ae560', 'ضاغط الدم', 'assets/img/device3.jpg', 'ES- 19526', 'ضاغط الدم', 1, '2024-06-01 10:26:13', '2024-06-01 10:26:13'),
(7, 'c6498315-53c1-4bae-aa1a-778e6eb17869', 'قوسي', 'assets/img/device2.jpg', 'ES- 1952633', 'جهاز تنظير عظمية', 1, '2024-06-02 15:32:10', '2024-06-02 15:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_slug` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_image` varchar(255) DEFAULT 'assets/img/5.jpg',
  `employee_bio` varchar(255) DEFAULT NULL,
  `employee_speciality` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_slug`, `employee_name`, `employee_image`, `employee_bio`, `employee_speciality`, `created_at`, `updated_at`) VALUES
(10, '6b34da49-4665-4344-b3e0-da3976f7c54e', 'د. عبد العزيز كوكه', 'assets/img/1.jpg', 'دوام جزئي - صباحي', 'طبيب جراح', '2024-05-29 09:47:49', '2024-05-29 16:26:50'),
(13, 'fd7f5de4-546c-4ec4-b02e-c6e00d02b9d2', 'أ. أحمد مهنا', 'assets/img/6.jpg', 'دوام جزئي - مسائي', 'إداري', '2024-05-29 10:03:51', '2024-06-03 16:32:10'),
(14, '34b02317-7952-45a3-b929-91f8e2a44b69', 'خالد المصطفى', 'assets/img/4.jpg', 'دوام كامل', 'مساعد جراح', '2024-05-29 10:04:11', '2024-06-01 19:06:46'),
(17, 'd2484f52-ee54-4a37-89c6-61b2ee5df5e1', 'د. محمد الأحمد', 'assets/img/1.jpg', 'دوام جزئي - صباحي', 'طبيب جراح', '2024-06-01 19:04:57', '2024-06-01 19:05:24'),
(18, '1d57c43a-613b-4fec-a5f1-5aeee47d3eb3', 'أحمد أرناؤوط', 'assets/img/4.jpg', 'دوام جزئي - صباحي', 'مساعد جراح', '2024-06-02 05:12:22', '2024-06-02 05:12:56'),
(19, '7ea9b3f1-3c07-4d71-a1a1-fad2ff9fc463', 'محمود', 'assets/img/4.jpg', NULL, 'مساعد جراح', '2024-06-02 05:12:39', '2024-06-02 05:12:39'),
(20, '6691beab-a3c5-4a39-ba35-0ad415232169', 'محمد جلعوط', 'assets/img/5.jpg', NULL, 'فني تخدير', '2024-06-02 05:13:43', '2024-06-02 05:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_27_164554_create_devices_table', 1),
(7, '2024_05_27_164724_create_employees_table', 1),
(12, '2024_05_03_154502_create_surgeries_table', 2),
(13, '2024_05_31_204155_create_surgery_devices_table', 2);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surgery_slug` varchar(255) NOT NULL,
  `surgery_name` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `surgery_room` varchar(255) NOT NULL,
  `assistant_surgeon` varchar(255) DEFAULT NULL,
  `anesthesia_technician` varchar(255) DEFAULT NULL,
  `surgery_time` timestamp NULL DEFAULT NULL,
  `surgery_term` time DEFAULT NULL,
  `surgery_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`id`, `surgery_slug`, `surgery_name`, `doctor_name`, `surgery_room`, `assistant_surgeon`, `anesthesia_technician`, `surgery_time`, `surgery_term`, `surgery_info`, `created_at`, `updated_at`) VALUES
(2, 'a06155ad-45cc-4ef2-a8a2-779545055e28', 'استئصال مرارة', 'مهند نعساني', 'room_1', 'أحمد أرناؤوط', 'محمد جلعوط', '2024-06-02 05:00:00', '08:59:59', NULL, '2024-06-02 16:10:05', '2024-06-03 17:32:41'),
(3, 'b4bd0b25-7e0e-4505-a4a3-08f4838ee8f8', 'استئصال مرارة', 'أشرف شيخ علي', 'room_1', NULL, NULL, '2024-06-03 05:00:00', '08:59:59', NULL, '2024-06-03 17:47:34', '2024-06-03 17:47:49'),
(4, 'ec71a133-7286-4ae6-9e1a-9d78f7a4ba33', 'استئصال مرارة', 'مهند نعساني', 'room_2', NULL, NULL, '2024-06-03 07:00:00', '10:59:59', NULL, '2024-06-03 17:47:44', '2024-06-03 17:47:49'),
(5, '2e592748-2316-4bc3-a0b0-f8fc18cbdf53', 'استئصال مرارة', 'محمد حمادة', 'room_1', NULL, NULL, '2024-07-09 05:00:00', '12:59:59', NULL, '2024-07-09 10:04:27', '2024-07-09 10:04:27'),
(6, 'df5d65a0-ca90-4984-9db5-21e30e233907', 'استئصال مرارة', 'محمد حمادة', 'room_1', NULL, NULL, '2024-07-09 10:00:00', '14:59:59', NULL, '2024-07-09 10:04:46', '2024-07-09 10:04:46'),
(7, '234a2447-e908-46b7-9cf5-783e13b70ccd', 'استئصال مرارة', 'محمد حمادة', 'room_2', NULL, NULL, '2024-07-09 11:00:00', '17:59:59', NULL, '2024-07-09 10:04:56', '2024-07-09 10:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `surgery_devices`
--

CREATE TABLE `surgery_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surgery_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` int(11) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `surgery_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `surgery_term` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgery_devices`
--

INSERT INTO `surgery_devices` (`id`, `surgery_id`, `device_id`, `device_name`, `surgery_time`, `surgery_term`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 'قوسي', '2024-06-02 05:00:00', '10:59:59', '2024-06-02 16:13:00', '2024-06-02 16:13:00'),
(6, 2, 3, 'تنظير', '2024-06-02 05:00:00', '10:59:59', '2024-06-02 16:13:00', '2024-06-02 16:13:00'),
(7, 5, 1, 'قوسي', '2024-07-09 05:00:00', '12:59:59', '2024-07-09 10:04:27', '2024-07-09 10:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `user_slug` varchar(255) NOT NULL,
  `user_speciality` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT 'assets/img/5.jpg',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `grade`, `user_slug`, `user_speciality`, `bio`, `user_image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'د. عبد العزيز كوكه', 'abdulaziz', 'admin', '978a5a7b-3f25-41b4-9d1d-f5d980820eaa', 'طبيب جراح', 'دوام جزئي - صباحي', 'assets/img/1.jpg', '$2y$10$sKIDqLQtcku/Rn50jLHLVelcNanrh.C2T8jpgTWbbU3wa0JM0tB1q', NULL, '2024-05-29 09:47:49', '2024-05-30 10:07:26'),
(14, 'أ. أحمد مهنا', 'ahmd-mhna', 'user', '1e974717-78c1-4a3f-89a1-33936ec9146d', 'إداري', 'دوام جزئي - مسائي', 'assets/img/6.jpg', '$2y$10$teqqYfvuVrWOKhmBC2Q7VuJDeVrODxJTpiaROMesFJfH807mwxXtW', NULL, '2024-06-01 19:03:54', '2024-06-03 16:32:10'),
(15, 'خالد المصطفى', 'khald-almstf', 'user', 'f3c0d68f-4336-4c4e-b70d-fee61c0c2233', 'مساعد جراح', 'دوام كامل', 'assets/img/4.jpg', '$2y$10$FUWDEGBYMRERQDSp2NWnCuDsq/d0hL1t26tZYY9VuXPVk3JriHhCq', NULL, '2024-06-01 19:04:26', '2024-06-01 19:06:45'),
(16, 'د. محمد الأحمد', 'd-mhmd-alahmd', 'user', 'e1c57de5-fe89-44f9-ad59-e1cc07db62c8', 'طبيب جراح', 'دوام جزئي - صباحي', 'assets/img/1.jpg', '$2y$10$4aHTdwa.xRja9FGkRktaZ.L68GHQv1I9y.gZRo1d8X5ZOH0s6xSW2', NULL, '2024-06-01 19:05:46', '2024-06-01 19:05:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devices_device_slug_unique` (`device_slug`),
  ADD KEY `devices_device_name_index` (`device_name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_slug_unique` (`employee_slug`),
  ADD UNIQUE KEY `employees_employee_name_unique` (`employee_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surgeries_surgery_slug_unique` (`surgery_slug`),
  ADD KEY `surgeries_surgery_name_index` (`surgery_name`),
  ADD KEY `surgeries_doctor_name_index` (`doctor_name`);

--
-- Indexes for table `surgery_devices`
--
ALTER TABLE `surgery_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgery_devices_surgery_id_foreign` (`surgery_id`),
  ADD KEY `surgery_devices_device_id_foreign` (`device_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_user_slug_unique` (`user_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surgery_devices`
--
ALTER TABLE `surgery_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surgery_devices`
--
ALTER TABLE `surgery_devices`
  ADD CONSTRAINT `surgery_devices_surgery_id_foreign` FOREIGN KEY (`surgery_id`) REFERENCES `surgeries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
