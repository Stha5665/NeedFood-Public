-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 03:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `need_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `priority` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES
('7ea56d03-dea3-4615-8004-721c3c66efa2', 'Drinks', 'Fresh juices, tea, coffee.', 'Medium', '2023-09-16 06:58:23', '2023-09-16 06:58:23', NULL),
('95003527-c1ec-410a-b20a-6e6b7ec83139', 'Meat', 'Meat products for every one.', 'Low', '2023-09-16 07:03:39', '2023-09-16 07:16:33', NULL),
('ce5cf2cb-9d39-40a3-9668-558ec40f451e', 'Rice', 'For Every one.', 'High', '2023-09-16 06:57:56', '2023-09-16 06:57:56', NULL),
('e6cbf3e3-bcc5-4a7b-a5cf-cca6991ae491', 'Milk', 'ok', 'High', '2023-09-23 06:10:03', '2023-09-23 06:10:03', NULL),
('eb4fb16d-4ad3-4de2-b337-307ed787896c', 'Vegetable', 'For daily.', 'High', '2023-09-16 11:47:40', '2023-09-16 11:47:40', NULL),
('f65b70e4-e78d-41fd-8b41-c2de97df1ca4', 'Dailyneed', 'Food for daily need.', 'High', '2023-09-16 07:16:00', '2023-09-16 07:16:00', NULL),
('f7221184-c2f0-48c0-98bd-fd3142b1398c', 'Others', 'Food or any item you can  donate.', 'High', '2023-09-16 07:04:03', '2023-09-16 07:04:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collaborations`
--

CREATE TABLE `collaborations` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `collaborator_id` char(36) NOT NULL,
  `request_id` char(36) DEFAULT NULL,
  `donation_id` char(36) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'under-approval',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collaborations`
--

INSERT INTO `collaborations` (`id`, `user_id`, `collaborator_id`, `request_id`, `donation_id`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('15a063b4-5645-4da0-9a90-0593d6cff48c', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '2840134e-568b-46c7-9d78-1ea0602eadaf', 'c7763d83-24d0-409e-96ab-6f6c99db3da9', NULL, '2023-09-24', '2023-09-27', 'accepted', '2023-09-23 06:19:53', '2023-09-23 07:19:14', NULL),
('6d509fd6-0a35-4edd-868f-ff42a1ad207f', '2840134e-568b-46c7-9d78-1ea0602eadaf', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', 'a03e5ba9-c0c1-44b4-951d-b40af12b50ff', NULL, '2023-09-19', '2023-11-29', 'accepted', '2023-09-16 12:46:29', '2023-09-23 06:20:18', NULL),
('72be8c0b-2705-42a5-8f01-e7d4c2cf4be6', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '2840134e-568b-46c7-9d78-1ea0602eadaf', '0ae1f827-3675-43eb-86c8-fcc61880d282', NULL, '2023-09-18', '2023-09-27', 'accepted', '2023-09-16 12:43:34', '2023-09-16 12:46:56', NULL),
('c980ad0f-9ccf-41d2-b5a5-e21d21724f5f', '2840134e-568b-46c7-9d78-1ea0602eadaf', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '536a0609-ab3a-416d-88f1-708428ea612c', NULL, '2023-09-24', '2023-09-28', 'under-approval', '2023-09-23 07:18:58', '2023-09-23 07:18:58', NULL),
('e73852a5-a80e-4ef4-a2a2-c6c2dcce2152', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '2840134e-568b-46c7-9d78-1ea0602eadaf', '0ecb4263-b9c4-4ff7-ab70-42c697db228c', NULL, '2023-09-25', '2023-09-28', 'under-approval', '2023-09-23 06:02:39', '2023-09-23 06:02:39', NULL),
('ea4bacd2-30b1-41be-99f3-ad4c2141cd40', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '2840134e-568b-46c7-9d78-1ea0602eadaf', '185e7e8d-16ff-41ae-a8da-a085c72a55a7', NULL, '2023-09-19', '2023-09-30', 'accepted', '2023-09-16 21:34:29', '2023-09-16 21:35:04', NULL),
('f8ab115d-2632-42da-ac04-a976e04e9bfd', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '2840134e-568b-46c7-9d78-1ea0602eadaf', '750c5c71-0b35-482b-8ced-f7144dc6d344', NULL, '2023-09-18', '2023-09-23', 'accepted', '2023-09-16 12:44:42', '2023-09-23 06:03:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` char(36) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `description` text NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `donated_date_time` datetime DEFAULT NULL,
  `is_archived` varchar(255) DEFAULT 'NO',
  `type` varchar(255) NOT NULL,
  `delivery_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receiver_id` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `user_id` char(36) NOT NULL,
  `request_id` char(36) DEFAULT NULL,
  `category_id` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `address`, `remarks`, `description`, `quantity`, `donated_date_time`, `is_archived`, `type`, `delivery_type`, `status`, `receiver_id`, `expiry_date`, `user_id`, `request_id`, `category_id`, `created_at`, `updated_at`) VALUES
('0598a3f5-a8d3-498a-8d26-55b0e0001f46', 'Tokha', 'Ok', 'For help.', 12, '2023-09-17 02:36:00', 'NO', 'donation_to_request', 'delivery', 'verified', NULL, '2023-09-29', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '33eddfae-70f2-49d7-a2ce-57ba52a9952c', NULL, '2023-09-16 12:08:04', '2023-09-23 06:17:57'),
('0cb9d3b2-003b-4cbb-b96e-d5435c07f545', 'Samakhushi', 'ok meat', 'ok', NULL, '2023-09-24 18:40:00', 'YES', 'donation', 'delivery', 'verified', NULL, '2023-11-21', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', NULL, '95003527-c1ec-410a-b20a-6e6b7ec83139', '2023-09-23 07:11:09', '2023-09-23 07:17:24'),
('32d6cfda-9a65-4614-b9a2-c3eab5084534', 'Gorkha, Nepal', 'Bread.', 'For the family who are in need. The bread from local bakery which healthy and tasty.', NULL, '2023-09-17 22:59:00', 'NO', 'donation', 'delivery', 'close', NULL, '2023-09-20', '916d258e-04b7-48cb-8d6c-1060e1f40806', NULL, 'f65b70e4-e78d-41fd-8b41-c2de97df1ca4', '2023-09-16 07:31:51', '2023-09-16 12:38:18'),
('45a1c2dc-c29b-45b8-9e81-352524c46035', 'New Baneshwor', 'Accepted.', 'I will help you for this.', 12, '2023-09-19 07:04:00', 'NO', 'donation_to_request', 'delivery', 'verified', NULL, '2024-03-21', '916d258e-04b7-48cb-8d6c-1060e1f40806', '705f878d-82f4-4c8c-9ec2-970a7f442bde', NULL, '2023-09-16 07:34:43', '2023-09-16 07:44:11'),
('4a2589db-e96f-40dd-9850-3d58f6987fb3', 'Northampton', NULL, 'ok', 1, '2023-09-24 18:36:00', 'NO', 'donation_to_request', 'delivery', 'unverified', NULL, '2023-10-25', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2630d05c-5ed4-44c9-a0dc-ed55c1add95f', NULL, '2023-09-23 07:06:35', '2023-09-23 07:06:35'),
('570baaf9-5188-4a90-9e6a-a413becf80d7', 'Buspark, Kathmandu', 'Fresh and healthy meal.', 'Daju vai restaurant, buspark near bg mall.', NULL, '2023-09-16 19:48:00', 'NO', 'donation', 'collection', 'verified', NULL, '2023-09-18', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', NULL, 'f65b70e4-e78d-41fd-8b41-c2de97df1ca4', '2023-09-16 07:20:42', '2023-09-16 18:42:53'),
('57299e86-913f-4f4d-bfa9-90b4784a3f58', 'Tokha', 'Ok', 'Ok', NULL, '2023-09-24 17:44:00', 'NO', 'donation', 'delivery', 'close', NULL, '2023-10-24', '5097d8b3-47ec-413c-a76d-c3391f4bc451', NULL, '95003527-c1ec-410a-b20a-6e6b7ec83139', '2023-09-23 06:14:22', '2023-09-23 07:10:14'),
('70442f54-2022-4539-93d4-739a565f16b9', 'Northampton', NULL, 'ok', 12, '2023-09-18 08:57:00', 'NO', 'donation_to_request', 'delivery', 'unverified', NULL, '2023-09-21', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '102ff49c-74d5-4adc-950e-aacfaf4623c2', NULL, '2023-09-16 21:27:55', '2023-09-16 21:27:55'),
('77aeb6f3-5dda-4c7d-a59d-0d3a9b77c305', 'Northampton', 'Ok', 'Ok', 12, '2023-09-24 17:21:00', 'NO', 'donation_to_request', 'delivery', 'verified', NULL, '2023-10-25', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2630d05c-5ed4-44c9-a0dc-ed55c1add95f', NULL, '2023-09-23 05:51:55', '2023-09-23 06:12:31'),
('7ed2d7e6-e30c-4474-a06a-7e64ac3fac23', 'Both Town, Kathmandu', 'Fresh sandwich.', 'Food For every one, those on need feel free to contact me or visit my hotel.', NULL, '2023-09-18 18:52:00', 'NO', 'donation', 'delivery', 'verified', NULL, '2023-09-19', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', NULL, 'f7221184-c2f0-48c0-98bd-fd3142b1398c', '2023-09-16 07:23:33', '2023-09-16 18:52:00'),
('9664b0a5-a2d9-42f7-a884-59ed4e685b67', 'Samakhushi', 'ok', 'Meat', NULL, '2023-09-18 08:56:00', 'NO', 'donation', 'collection', 'verified', NULL, '2023-09-22', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', NULL, '95003527-c1ec-410a-b20a-6e6b7ec83139', '2023-09-16 21:26:57', '2023-09-23 07:14:56'),
('9ecc6e32-1c25-4208-a690-e11f7dc47768', 'Tokha', 'Beans.', 'Fresh beans.', NULL, '2023-09-17 23:49:00', 'NO', 'donation', 'collection', 'close', NULL, '2023-10-25', '916d258e-04b7-48cb-8d6c-1060e1f40806', NULL, 'eb4fb16d-4ad3-4de2-b337-307ed787896c', '2023-09-16 12:19:47', '2023-09-23 06:18:29'),
('b0a0bbe4-3eea-4fa4-8427-8a8465449b7e', 'Samakhushi', 'pl', 'ok', 2, '2023-09-24 18:39:00', 'NO', 'donation_to_request', 'delivery', 'rejected', NULL, '2023-09-25', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2630d05c-5ed4-44c9-a0dc-ed55c1add95f', NULL, '2023-09-23 07:09:55', '2023-09-23 07:13:55'),
('b774bd53-f23c-4d44-b037-40a0a1ac4ff1', 'New Baneshwor', 'Ok', 'This is the milk of DDC.', 12, '2023-09-16 22:07:00', 'NO', 'donation_to_request', 'delivery', 'verified', NULL, '2023-09-26', '916d258e-04b7-48cb-8d6c-1060e1f40806', '52bcc93f-a493-46b1-9bfe-af7b98c42dd1', NULL, '2023-09-16 07:37:33', '2023-09-23 05:54:25'),
('c383d436-99bb-482f-992d-50ddd9efefac', '2nd street Northampton', 'ok', 'I have the donation for this request.', 8, '2023-09-17 19:02:00', 'NO', 'donation_to_request', 'delivery', 'rejected', NULL, '2024-01-17', '916d258e-04b7-48cb-8d6c-1060e1f40806', '2630d05c-5ed4-44c9-a0dc-ed55c1add95f', NULL, '2023-09-16 07:33:23', '2023-09-16 12:17:03'),
('d6f46956-a063-49a5-b558-eb40a1a5db16', 'Samakhushi', 'Donated', 'Ok', NULL, '2023-09-24 17:27:00', 'NO', 'donation', 'collection', 'close', NULL, '2023-09-29', '5097d8b3-47ec-413c-a76d-c3391f4bc451', NULL, '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-23 05:57:32', '2023-09-23 06:03:56'),
('de178f18-d543-41dd-b5f3-0014cc447ec1', 'Tokha', NULL, 'Delive', 12, '2023-09-25 17:47:00', 'NO', 'donation_to_request', 'collection', 'unverified', NULL, '2023-09-28', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '0fa70eff-c2cf-4b2c-a3c8-ab42b3028428', NULL, '2023-09-23 06:17:20', '2023-09-23 06:17:20'),
('e9a5a839-959c-4729-bc1f-0480033e229b', 'Kalimati, Kathmandu', 'carrot', 'Food as carrot.', NULL, '2023-09-17 02:41:00', 'NO', 'donation', 'collection', 'verified', NULL, '2023-09-29', '916d258e-04b7-48cb-8d6c-1060e1f40806', NULL, 'eb4fb16d-4ad3-4de2-b337-307ed787896c', '2023-09-16 12:11:58', '2023-09-23 06:14:46'),
('eb91f74d-c1ec-48d0-a355-4d4b586d2d91', 'Buspark', 'Healthy meal.', 'For 3/4 families', NULL, '2023-09-17 09:25:00', 'NO', 'donation', 'collection', 'verified', NULL, '2023-09-21', '916d258e-04b7-48cb-8d6c-1060e1f40806', NULL, 'f65b70e4-e78d-41fd-8b41-c2de97df1ca4', '2023-09-16 18:55:44', '2023-09-23 05:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `donation_images`
--

CREATE TABLE `donation_images` (
  `id` char(36) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `donation_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_images`
--

INSERT INTO `donation_images` (`id`, `image_path`, `donation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('162bec44-d4f3-47ee-b0fe-399ca6d6638a', 'uploads/donations/16949203171.jpg', '9664b0a5-a2d9-42f7-a884-59ed4e685b67', '2023-09-16 21:26:57', '2023-09-16 21:26:57', NULL),
('18e5086b-283c-4473-a71c-8c83a469addc', 'uploads/donations/16948697131.jpg', '7ed2d7e6-e30c-4474-a06a-7e64ac3fac23', '2023-09-16 07:23:34', '2023-09-16 07:23:34', NULL),
('230f0547-db33-4dbb-8c4e-68a2c2b1194e', 'uploads/donations/16954693521.jpg', 'd6f46956-a063-49a5-b558-eb40a1a5db16', '2023-09-23 05:57:32', '2023-09-23 05:57:32', NULL),
('27c56cef-f01b-433a-ac66-26a7caa268ec', 'uploads/donations/16948874871.jpg', '9ecc6e32-1c25-4208-a690-e11f7dc47768', '2023-09-16 12:19:47', '2023-09-16 12:19:47', NULL),
('381d8f54-da56-439d-9066-6e92bebcb3e1', 'uploads/donations/16954703621.jpg', '57299e86-913f-4f4d-bfa9-90b4784a3f58', '2023-09-23 06:14:22', '2023-09-23 06:14:22', NULL),
('5d9f463a-559a-4584-b4b9-0f4018dbba04', 'uploads/donations/16948702111.jpg', '32d6cfda-9a65-4614-b9a2-c3eab5084534', '2023-09-16 07:31:51', '2023-09-16 07:31:51', NULL),
('759e3cce-974c-490a-ae0d-c83b8e8a60af', 'uploads/donations/16948697142.jpg', '7ed2d7e6-e30c-4474-a06a-7e64ac3fac23', '2023-09-16 07:23:34', '2023-09-16 07:23:34', NULL),
('e733e6d5-8e33-4ce3-9780-aaa3b5ba984c', 'uploads/donations/16954737691.jpg', '0cb9d3b2-003b-4cbb-b96e-d5435c07f545', '2023-09-23 07:11:09', '2023-09-23 07:11:09', NULL),
('f3b2a267-c4b5-4dd0-bfea-d6d4295f0bbe', 'uploads/donations/16949112441.jpg', 'eb91f74d-c1ec-48d0-a355-4d4b586d2d91', '2023-09-16 18:55:44', '2023-09-16 18:55:44', NULL);

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit` varchar(255) NOT NULL,
  `type` enum('requested','donated') NOT NULL,
  `remaining_quantity` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `is_expiry_date_needed` enum('yes','no') DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `request_id` char(36) DEFAULT NULL,
  `donation_id` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `quantity`, `description`, `unit`, `type`, `remaining_quantity`, `status`, `is_expiry_date_needed`, `expiry_date`, `request_id`, `donation_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('008571ac-86e7-41cf-ab69-7379c17d24c1', 'Mineral Water', 200, 'Water to end thirst of needy people.', 'Bottles', 'requested', 200, 'open', 'yes', NULL, 'a03e5ba9-c0c1-44b4-951d-b40af12b50ff', NULL, '2023-09-16 12:46:29', '2023-09-23 06:20:18', NULL),
('0c9f9aec-40e6-4b1f-a80b-e5149f3cfb95', 'Non veg Meal', 20, 'For 3/4 families', 'plates', 'donated', NULL, 'open', NULL, '2023-09-21', NULL, 'eb91f74d-c1ec-48d0-a355-4d4b586d2d91', '2023-09-16 18:55:44', '2023-09-16 18:55:44', NULL),
('110ce61e-7494-4b51-9657-f3119cc3ba22', 'Beans', 22, 'Fresh beans.', 'Kg', 'donated', NULL, 'open', NULL, '2023-10-25', NULL, '9ecc6e32-1c25-4208-a690-e11f7dc47768', '2023-09-16 12:19:47', '2023-09-16 12:19:47', NULL),
('1c5f6a8b-2918-4e67-a9ce-d1e4a08de510', 'one', 1, 'ok', 'kg', 'requested', 1, 'open', 'yes', NULL, '76431763-9b39-437a-bb0e-fd4e8df27042', NULL, '2023-09-23 07:13:15', '2023-09-23 07:13:15', NULL),
('1c877eab-402c-4455-ab17-ac9996c7a77c', 'Meat', 12, 'ok', 'Kg', 'donated', NULL, 'open', NULL, '2023-11-21', NULL, '0cb9d3b2-003b-4cbb-b96e-d5435c07f545', '2023-09-23 07:11:09', '2023-09-23 07:11:09', NULL),
('1ce17d4c-9338-44e0-9a64-bb854fcc6e58', 'Orange Juice', 20, 'For school kids.', 'packets', 'requested', 8, 'open', 'yes', NULL, '705f878d-82f4-4c8c-9ec2-970a7f442bde', NULL, '2023-09-16 07:11:05', '2023-09-16 07:44:11', NULL),
('1e37fc3b-9356-4dbd-9396-7701541f4e72', 'DDC milk', 20, 'Help me to donate for my neighbourhood.', 'bottles', 'requested', 8, 'open', 'yes', NULL, '33eddfae-70f2-49d7-a2ce-57ba52a9952c', NULL, '2023-09-16 07:26:19', '2023-09-23 06:17:57', NULL),
('22d2821e-cb09-4ba4-a9ad-8586449d81ba', 'Veg Meal', 12, 'Daju vai restaurant, buspark near bg mall.', 'plates', 'donated', NULL, 'open', NULL, '2023-09-18', NULL, '570baaf9-5188-4a90-9e6a-a413becf80d7', '2023-09-16 07:20:42', '2023-09-16 07:20:42', NULL),
('3374542b-8633-449e-81c1-c21c0260c3dc', 'Chocolate', 12, 'Help for us', 'Kg', 'requested', 12, 'open', 'yes', NULL, 'baf13cde-3076-4d47-a4f9-2e02f77429ca', NULL, '2023-09-23 05:50:15', '2023-09-23 05:50:15', NULL),
('48fd6b84-ce61-49de-bddb-c8f2d64abe97', 'Veg Sandwich', 20, 'Food For every one, those on need feel free to contact me or visit my hotel.', 'pieces', 'donated', NULL, 'open', NULL, '2023-09-19', NULL, '7ed2d7e6-e30c-4474-a06a-7e64ac3fac23', '2023-09-16 07:23:33', '2023-09-16 07:23:33', NULL),
('4dee2455-5bb0-45e6-90c9-87fe46b70e16', 'Chicken meat', 14, 'For the festival of 2 families.', 'Kg', 'requested', 14, 'open', 'yes', NULL, '7e0f06fd-75d7-406f-86ba-4d5459d246c9', NULL, '2023-09-16 07:09:46', '2023-09-16 07:09:46', NULL),
('5769a01f-8f1d-4e9b-8051-1d9df163ebaf', 'Healthy meat', 12, 'Ok', 'Kg', 'donated', NULL, 'open', NULL, '2023-10-24', NULL, '57299e86-913f-4f4d-bfa9-90b4784a3f58', '2023-09-23 06:14:22', '2023-09-23 06:14:22', NULL),
('720bf2ad-3bf8-4141-be18-df448918c78b', 'Cauliflower', 12, 'Pleas help as soon as possible.', 'Kg', 'requested', 12, 'open', 'yes', NULL, 'fce03645-40d3-4eee-8551-6d062353174e', NULL, '2023-09-16 18:20:26', '2023-09-16 18:20:26', NULL),
('729f7234-60c0-4cc2-89e5-5f7eb31b198e', 'Milk', 12, 'ok', 'Litre', 'requested', 12, 'under-approval', 'yes', NULL, '0ecb4263-b9c4-4ff7-ab70-42c697db228c', NULL, '2023-09-23 06:02:39', '2023-09-23 06:02:39', NULL),
('76a40513-6858-4958-892f-454577d49adf', 'Milk', 12, 'Ok', 'Litres', 'requested', 12, 'open', 'yes', NULL, '0cd3809a-47c0-4319-8a5f-7c6ea1c6a624', NULL, '2023-09-23 07:08:07', '2023-09-23 07:08:07', NULL),
('76adcf2e-062d-4afd-ad55-10cbeecfc254', 'Meat chicken', 12, 'Provide me help', 'kg', 'requested', 12, 'open', 'yes', NULL, 'df52d13e-8c1d-436d-a743-5b4e3e5b9969', NULL, '2023-09-16 21:25:48', '2023-09-16 21:25:48', NULL),
('7a842c25-76e3-49b2-ba6e-3c4cc4aafa61', 'DDc Milk', 12, 'ok', 'Litre', 'requested', 12, 'open', 'yes', NULL, 'dd85663b-f029-4c2a-b0ec-c3509d60df27', NULL, '2023-09-23 06:10:46', '2023-09-23 06:10:46', NULL),
('7f12abba-9ce7-4314-915c-9873d97276f4', 'Milk', 12, 'For 5 babies.', 'Litres', 'requested', 0, 'closed', 'yes', NULL, '52bcc93f-a493-46b1-9bfe-af7b98c42dd1', NULL, '2023-09-16 07:00:37', '2023-09-23 05:54:25', NULL),
('838025d7-bc2c-426e-be02-fa5a9b321c87', 'Roi', 12, 'help', 'kg', 'requested', 12, 'open', 'yes', NULL, '185e7e8d-16ff-41ae-a8da-a085c72a55a7', NULL, '2023-09-16 21:34:29', '2023-09-16 21:35:04', NULL),
('8c7c1601-a89a-4860-a740-b59c44b8d2bb', 'Milk', 12, 'Hello', 'Litres', 'requested', 12, 'open', 'yes', NULL, '0fa70eff-c2cf-4b2c-a3c8-ab42b3028428', NULL, '2023-09-23 06:07:41', '2023-09-23 06:07:41', NULL),
('90da29af-6b36-4a1f-8428-9e3776cc7937', 'Fresh Bread', 12, 'For the family who are in need. The bread from local bakery which healthy and tasty.', 'packets', 'donated', NULL, 'open', NULL, '2023-09-20', NULL, '32d6cfda-9a65-4614-b9a2-c3eab5084534', '2023-09-16 07:31:51', '2023-09-16 07:31:51', NULL),
('996dd1d7-182a-469f-a5bd-131af4b13043', 'Carrot', 25, 'Food as carrot.', 'Kg', 'donated', NULL, 'open', NULL, '2023-09-29', NULL, 'e9a5a839-959c-4729-bc1f-0480033e229b', '2023-09-16 12:11:58', '2023-09-16 12:11:58', NULL),
('9c29f6f4-d9e0-4c3c-81de-19d48df9fef2', 'Gajar Haluwa', 22, 'Food for healthy life.', 'plates', 'requested', 22, 'open', 'yes', NULL, '750c5c71-0b35-482b-8ced-f7144dc6d344', NULL, '2023-09-16 12:44:42', '2023-09-23 06:03:17', NULL),
('a14d015c-1194-4b41-9265-f13e1468389e', 'Juice', 12, 'Need', 'Litre', 'requested', 12, 'open', 'yes', NULL, 'f170d13d-82bd-4f6f-93e1-7abe68f42173', NULL, '2023-09-23 07:05:18', '2023-09-23 07:05:18', NULL),
('a57c6ba4-fd0e-4405-922c-aa68aa5b780e', 'Food', 12, 'ok', 'Plates', 'requested', 12, 'open', 'yes', NULL, 'c7763d83-24d0-409e-96ab-6f6c99db3da9', NULL, '2023-09-23 06:19:53', '2023-09-23 07:19:14', NULL),
('be7a5fe6-d366-420f-a0e8-2d2449b61c2b', 'Meat', 12, 'Meat', 'Kg', 'donated', NULL, 'open', NULL, '2023-09-22', NULL, '9664b0a5-a2d9-42f7-a884-59ed4e685b67', '2023-09-16 21:26:57', '2023-09-16 21:26:57', NULL),
('c1514858-c80c-4726-9b15-b2a576c4fc10', 'Milk11', 11, 'ok', 'Litres', 'requested', 11, 'under-approval', 'yes', NULL, '536a0609-ab3a-416d-88f1-708428ea612c', NULL, '2023-09-23 07:18:58', '2023-09-23 07:18:58', NULL),
('cf72351f-73f9-4512-85d8-933ec6fb044f', 'Plain rice', 12, 'For every family.', 'plates', 'requested', 12, 'open', 'yes', NULL, '0ae1f827-3675-43eb-86c8-fcc61880d282', NULL, '2023-09-16 12:43:34', '2023-09-16 12:46:56', NULL),
('db59898e-935b-4d54-b67b-259e9b33f6c7', 'Fresh Basmati Rice', 14, 'Need Fresh edible rice for family.', 'Kg', 'requested', 2, 'open', 'yes', NULL, '2630d05c-5ed4-44c9-a0dc-ed55c1add95f', NULL, '2023-09-16 06:59:50', '2023-09-23 06:12:31', NULL),
('ddf55e38-1714-40f2-a20e-5e2df578a1c5', 'Mutton Curry1', 31, 'Help me for my child need. He wants to eat mutton curry but, I donot have money to feed him. Donate me to make my child happy on the occasion of his birthday. \r\nMy location Northampton, UK.\r\nPhone: 9898989898', 'plates', 'requested', 31, 'open', 'yes', NULL, '102ff49c-74d5-4adc-950e-aacfaf4623c2', NULL, '2023-09-16 07:28:54', '2023-09-16 12:36:06', NULL),
('e6cf7488-0869-4b16-b073-9b8f51363294', 'Happy meal', 12, 'Help', 'plates', 'requested', 12, 'open', 'yes', NULL, '7f002f16-63b9-4456-b9a0-e6a84ac1cf9b', NULL, '2023-09-24 07:17:02', '2023-09-24 07:17:02', NULL),
('fdff3e63-c9a1-4d3f-a5b6-849442e54364', 'Milk DDc1', 12, 'Ok', 'Litres', 'donated', NULL, 'open', NULL, '2023-09-29', NULL, 'd6f46956-a063-49a5-b558-eb40a1a5db16', '2023-09-23 05:57:32', '2023-09-23 05:58:21', NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_11_113915_create_categories_table', 1),
(6, '2023_08_13_123017_create_items_table', 1),
(7, '2023_08_13_130719_create_requests_table', 1),
(8, '2023_08_16_103850_create_donations_table', 1),
(9, '2023_08_30_144628_create_permission_tables', 1),
(10, '2023_08_31_141553_alter_permissions_table', 1),
(11, '2023_09_02_105700_create_donation_images_table', 1),
(12, '2023_09_04_033007_create_notifications_table', 1),
(13, '2023_09_04_123141_create_reciever_details_table', 1),
(14, '2023_09_10_055228_create_collaborations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', '5097d8b3-47ec-413c-a76d-c3391f4bc451'),
(2, 'App\\Models\\User', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(2, 'App\\Models\\User', '916d258e-04b7-48cb-8d6c-1060e1f40806'),
(3, 'App\\Models\\User', '0919f5a7-bb7d-49e9-8906-3a7255574dfa'),
(3, 'App\\Models\\User', '2840134e-568b-46c7-9d78-1ea0602eadaf'),
(4, 'App\\Models\\User', '59bccd43-8963-44a8-8d5b-e3824b3d1964');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sent_user_id` char(36) NOT NULL,
  `recieved_user_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `created_at`, `updated_at`, `sent_user_id`, `recieved_user_id`) VALUES
(1, 'Hey Ram, Your donation has been verified', 'With respect, It is great support.', '2023-09-16 11:51:35', '2023-09-16 11:51:35', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '916d258e-04b7-48cb-8d6c-1060e1f40806'),
(2, 'Hey Ram, Your donation has been verified', 'With respect, Ok valid.', '2023-09-16 12:12:39', '2023-09-16 12:12:39', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '916d258e-04b7-48cb-8d6c-1060e1f40806'),
(3, 'Hey Ram, Your donation has been verified', 'With respect, Valid beans.', '2023-09-16 12:20:37', '2023-09-16 12:20:37', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '916d258e-04b7-48cb-8d6c-1060e1f40806'),
(4, 'Hey Aayush, Your donation has been verified', 'With respect, Great help.', '2023-09-16 12:21:57', '2023-09-16 12:21:57', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(5, 'Hey Aayush, Your donation has been verified', 'With respect, It is great help.', '2023-09-16 18:24:39', '2023-09-16 18:24:39', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(6, 'Hey Aayush, Your donation has been verified', 'With respect, It is great help.', '2023-09-16 18:28:17', '2023-09-16 18:28:17', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(7, 'Hey Aayush, Your donation has been verified', 'With respect, It is great.', '2023-09-16 18:36:36', '2023-09-16 18:36:36', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(8, 'Hey Aayush, Your donation has been verified', 'With respect, It is great.', '2023-09-16 18:37:52', '2023-09-16 18:37:52', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(9, 'Hey Aayush, Your donation has been verified', 'With respect, It is ok.', '2023-09-16 18:42:53', '2023-09-16 18:42:53', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(10, 'Hey Aayush, Your donation has been verified', 'With respect, It is great help.', '2023-09-16 18:52:00', '2023-09-16 18:52:00', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(11, 'Hey Aayush, Your donation has been verified', 'With respect, Ok', '2023-09-16 21:31:16', '2023-09-16 21:31:16', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13'),
(12, 'Hey Ram, Your donation has been verified', 'With respect, It is great help', '2023-09-23 05:58:54', '2023-09-23 05:58:54', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '916d258e-04b7-48cb-8d6c-1060e1f40806'),
(13, 'Hey Aayush, Your donation has been verified', 'With respect, It is great help.', '2023-09-23 07:17:24', '2023-09-23 07:17:24', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `slug`, `table_name`) VALUES
(1, 'dashboard.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Dashboard'),
(2, 'categories.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Categories'),
(3, 'categories.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Categories'),
(4, 'categories.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Categories'),
(5, 'categories.show', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Show', 'Categories'),
(6, 'categories.edit', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Categories'),
(7, 'categories.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Categories'),
(8, 'categories.destroy', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Delete', 'Categories'),
(9, 'requests.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Donation Requests'),
(10, 'requests.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Donation Requests'),
(11, 'requests.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Donation Requests'),
(12, 'requests.show', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Show', 'Donation Requests'),
(13, 'requests.edit', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Donation Requests'),
(14, 'requests.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Donation Requests'),
(15, 'requests.destroy', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Delete', 'Donation Requests'),
(16, 'requests-archive.archive', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Archive', 'Donation Requests'),
(17, 'requests-donors.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View Donors', 'Donation Requests'),
(18, 'requests-archive.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Archived Requests'),
(19, 'requests-archive.unarchive', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'UnArchive', 'Archived Requests'),
(20, 'unverified-donations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Approve Donations of Request'),
(21, 'edit-status.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Approve', 'Approve Donations of Request'),
(22, 'donations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Donation'),
(23, 'donations.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Donation'),
(24, 'donations.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Donation'),
(25, 'donations.show', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Show', 'Donation'),
(26, 'donations.edit', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Donation'),
(27, 'donations.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Donation'),
(28, 'donations.destroy', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Delete', 'Donation'),
(29, 'donations-archive.archive', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Archive', 'Donation'),
(30, 'donations-receiver.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View Receiver', 'Donation'),
(31, 'approve-donations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Approve Donations'),
(32, 'edit-donation-status.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Approve', 'Approve Donations'),
(33, 'donations-archive.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Archived Donations'),
(34, 'donations-archive.unarchive', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'UnArchive', 'Archived Donations'),
(35, 'role-permissions.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Role Permissions'),
(36, 'role-permissions.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Role Permissions'),
(37, 'role-permissions.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Role Permissions'),
(38, 'role-permissions.edit', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Role Permissions'),
(39, 'role-permissions.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Role Permissions'),
(40, 'role-permissions.destroy', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Delete', 'Role Permissions'),
(41, 'users.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Users'),
(42, 'users.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Users'),
(43, 'users.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Users'),
(44, 'users.show', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Show', 'Users'),
(45, 'users.edit', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Users'),
(46, 'users.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Edit', 'Users'),
(47, 'users.destroy', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Delete', 'Users'),
(48, 'users-total-donations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View Donations', 'Users'),
(49, 'users-total-requests.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View Requests', 'Users'),
(50, 'organizations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Organizations'),
(51, 'make-collaboration.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Collaborate', 'Organizations'),
(52, 'store-collaboration.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Collaborate', 'Organizations'),
(53, 'collaborations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View Collaboration', 'Organizations'),
(54, 'accept-collaboration.update', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Accept Collaboration', 'Organizations'),
(55, 'frontend.requests.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Website Donation Request'),
(56, 'frontend.requests.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Website Donation Request'),
(57, 'frontend.make-donation.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Website Make Donation'),
(58, 'frontend.your-requests.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Website Your Request'),
(59, 'frontend.your-requests.show', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Show', 'Website Your Request'),
(60, 'frontend.donations.create', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Website Donation Page'),
(61, 'frontend.donations.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Create', 'Website Donation Page'),
(62, 'frontend.donations.show', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Show', 'Website Donation Page'),
(63, 'frontend.make-donations.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Make Donation', 'Website Donation Page'),
(64, 'frontend.accept-donation.store', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'Accept', 'Website Donation Page'),
(65, 'frontend.your-donations.index', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13', 'View', 'Website Your Donation Page');

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
-- Table structure for table `reciever_details`
--

CREATE TABLE `reciever_details` (
  `id` char(36) NOT NULL,
  `address` varchar(255) NOT NULL,
  `donation_id` char(36) NOT NULL,
  `receiver_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reciever_details`
--

INSERT INTO `reciever_details` (`id`, `address`, `donation_id`, `receiver_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('4b1489e8-dce7-42b1-add8-a106eb70bd2f', 'Gongabu', 'd6f46956-a063-49a5-b558-eb40a1a5db16', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2023-09-23 06:03:56', '2023-09-23 06:03:56', NULL),
('95413bb2-b3d8-4431-849a-3d0f29addce8', 'Gopal Chowk', '32d6cfda-9a65-4614-b9a2-c3eab5084534', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '2023-09-16 11:54:33', '2023-09-16 11:54:33', NULL),
('a0830919-9b5d-4fee-9934-4fcbe0124318', 'Gongabu', '9ecc6e32-1c25-4208-a690-e11f7dc47768', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2023-09-23 06:18:29', '2023-09-23 06:18:29', NULL),
('d4368256-aeb7-48f8-b606-22bd5071076f', 'Samakhushi', '57299e86-913f-4f4d-bfa9-90b4784a3f58', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2023-09-23 07:10:14', '2023-09-23 07:10:14', NULL),
('ff0e31f3-8f49-4784-acef-ccaa482c2515', 'Samakhushi', '57299e86-913f-4f4d-bfa9-90b4784a3f58', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '2023-09-23 07:10:15', '2023-09-23 07:10:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` char(36) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'requested',
  `description` text NOT NULL,
  `remarks` text NOT NULL,
  `received_date_time` datetime DEFAULT NULL,
  `is_archived` varchar(255) DEFAULT 'NO',
  `status` varchar(255) NOT NULL,
  `user_id` char(36) NOT NULL,
  `category_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `address`, `type`, `description`, `remarks`, `received_date_time`, `is_archived`, `status`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0ae1f827-3675-43eb-86c8-fcc61880d282', 'Baneshwor, Kathmandu', 'collaboration', 'For every family.', 'Help us to collaborate', NULL, 'NO', 'accepted', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', 'ce5cf2cb-9d39-40a3-9668-558ec40f451e', '2023-09-16 12:43:34', '2023-09-16 12:46:56', NULL),
('0cd3809a-47c0-4319-8a5f-7c6ea1c6a624', 'demo chowk', 'requested', 'Ok', 'Ik', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-23 07:08:07', '2023-09-23 07:13:30', NULL),
('0ecb4263-b9c4-4ff7-ab70-42c697db228c', 'Samakhushi', 'collaboration', 'ok', 'ok', NULL, 'YES', 'under-approval', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-23 06:02:39', '2023-09-23 06:11:35', NULL),
('0fa70eff-c2cf-4b2c-a3c8-ab42b3028428', 'Tokha', 'requested', 'Hello', 'Hellow', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-23 06:07:41', '2023-09-23 06:07:41', NULL),
('102ff49c-74d5-4adc-950e-aacfaf4623c2', 'Northampton, UK', 'requested', 'Help me for my child need. He wants to eat mutton curry but, I donot have money to feed him. Donate me to make my child happy on the occasion of his birthday. \r\nMy location Northampton, UK.\r\nPhone: 9898989898', 'curry for my child.', NULL, 'NO', 'open', '916d258e-04b7-48cb-8d6c-1060e1f40806', '95003527-c1ec-410a-b20a-6e6b7ec83139', '2023-09-16 07:28:54', '2023-09-16 12:36:31', NULL),
('185e7e8d-16ff-41ae-a8da-a085c72a55a7', 'demo chowk', 'collaboration', 'help', 'help', NULL, 'NO', 'accepted', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', 'f65b70e4-e78d-41fd-8b41-c2de97df1ca4', '2023-09-16 21:34:28', '2023-09-16 21:35:04', NULL),
('2630d05c-5ed4-44c9-a0dc-ed55c1add95f', 'Northampton', 'requested', 'Need Fresh edible rice for family.', 'Donate as soon as possible please.', NULL, 'NO', 'open', '5097d8b3-47ec-413c-a76d-c3391f4bc451', 'ce5cf2cb-9d39-40a3-9668-558ec40f451e', '2023-09-16 06:59:50', '2023-09-23 06:12:46', NULL),
('33eddfae-70f2-49d7-a2ce-57ba52a9952c', 'Putalisadak, Kathmandu', 'requested', 'Help me to donate for my neighbourhood.', 'DDC milk.', NULL, 'NO', 'open', '916d258e-04b7-48cb-8d6c-1060e1f40806', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-16 07:26:19', '2023-09-16 21:30:29', NULL),
('52bcc93f-a493-46b1-9bfe-af7b98c42dd1', 'Samakhushi', 'requested', 'For 5 babies.', 'Donate Milk', NULL, 'NO', 'closed', '5097d8b3-47ec-413c-a76d-c3391f4bc451', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-16 07:00:37', '2023-09-23 05:54:25', NULL),
('536a0609-ab3a-416d-88f1-708428ea612c', 'Gopal Chowk', 'collaboration', 'ok', 'ok', NULL, 'NO', 'under-approval', '2840134e-568b-46c7-9d78-1ea0602eadaf', 'e6cbf3e3-bcc5-4a7b-a5cf-cca6991ae491', '2023-09-23 07:18:58', '2023-09-23 07:18:58', NULL),
('705f878d-82f4-4c8c-9ec2-970a7f442bde', 'Baneshwor, Kathmandu', 'requested', 'For school kids.', 'Juice help.', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-16 07:11:05', '2023-09-16 07:11:05', NULL),
('750c5c71-0b35-482b-8ced-f7144dc6d344', 'Tokha, KTM', 'collaboration', 'Food for healthy life.', 'Gajar.', NULL, 'NO', 'accepted', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', 'f7221184-c2f0-48c0-98bd-fd3142b1398c', '2023-09-16 12:44:42', '2023-09-23 06:03:17', NULL),
('76431763-9b39-437a-bb0e-fd4e8df27042', 'one', 'requested', 'ok', 'ok', NULL, 'NO', 'open', '5097d8b3-47ec-413c-a76d-c3391f4bc451', 'f65b70e4-e78d-41fd-8b41-c2de97df1ca4', '2023-09-23 07:13:15', '2023-09-23 07:13:15', NULL),
('7e0f06fd-75d7-406f-86ba-4d5459d246c9', 'Basundhara, Kathmandu', 'requested', 'For the festival of 2 families.', 'meat please', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '95003527-c1ec-410a-b20a-6e6b7ec83139', '2023-09-16 07:09:46', '2023-09-16 07:09:46', NULL),
('7f002f16-63b9-4456-b9a0-e6a84ac1cf9b', 'Gorkha', 'requested', 'Help', 'Please', NULL, 'NO', 'open', '5097d8b3-47ec-413c-a76d-c3391f4bc451', 'f65b70e4-e78d-41fd-8b41-c2de97df1ca4', '2023-09-24 07:17:02', '2023-09-24 07:17:02', NULL),
('a03e5ba9-c0c1-44b4-951d-b40af12b50ff', 'Samakhushi, Kathmandu', 'collaboration', 'Water to end thirst of needy people.', 'Fresh mineral water.', NULL, 'NO', 'accepted', '2840134e-568b-46c7-9d78-1ea0602eadaf', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-16 12:46:29', '2023-09-23 06:20:18', NULL),
('baf13cde-3076-4d47-a4f9-2e02f77429ca', 'Samakhushi', 'requested', 'Help for us', 'Help', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', 'f7221184-c2f0-48c0-98bd-fd3142b1398c', '2023-09-23 05:50:15', '2023-09-23 05:50:15', NULL),
('c7763d83-24d0-409e-96ab-6f6c99db3da9', '12', 'collaboration', 'ok', 'ok', NULL, 'NO', 'accepted', '0919f5a7-bb7d-49e9-8906-3a7255574dfa', 'ce5cf2cb-9d39-40a3-9668-558ec40f451e', '2023-09-23 06:19:53', '2023-09-23 07:19:14', NULL),
('dd85663b-f029-4c2a-b0ec-c3509d60df27', 'Samakhushi', 'requested', 'ok', 'ok', NULL, 'NO', 'open', '5097d8b3-47ec-413c-a76d-c3391f4bc451', 'e6cbf3e3-bcc5-4a7b-a5cf-cca6991ae491', '2023-09-23 06:10:46', '2023-09-23 06:10:46', NULL),
('df52d13e-8c1d-436d-a743-5b4e3e5b9969', 'Tokha', 'requested', 'Provide me help', 'help me', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '95003527-c1ec-410a-b20a-6e6b7ec83139', '2023-09-16 21:25:48', '2023-09-23 05:55:59', NULL),
('f170d13d-82bd-4f6f-93e1-7abe68f42173', 'Samakhushi', 'requested', 'Need', 'Need', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', '7ea56d03-dea3-4615-8004-721c3c66efa2', '2023-09-23 07:05:18', '2023-09-23 07:05:18', NULL),
('fce03645-40d3-4eee-8551-6d062353174e', 'Gongabu', 'requested', 'Pleas help as soon as possible.', 'ok', NULL, 'NO', 'open', '263e817e-2d0e-4846-bed5-c3c3d8ba5c13', 'eb4fb16d-4ad3-4de2-b337-307ed787896c', '2023-09-16 18:20:26', '2023-09-16 18:20:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13'),
(2, 'user', 'web', '2023-09-16 06:53:13', '2023-09-16 06:53:13'),
(3, 'organization', 'web', '2023-09-16 12:39:28', '2023-09-16 12:39:28'),
(4, 'staff', 'web', '2023-09-16 21:32:20', '2023-09-16 21:32:20'),
(5, 'Hero', 'web', '2023-09-23 05:59:40', '2023-09-23 05:59:40'),
(6, 'goal', 'web', '2023-09-23 07:15:17', '2023-09-23 07:15:17');

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
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 3),
(18, 5),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(65, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone_number`, `email_verified_at`, `password`, `status`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0919f5a7-bb7d-49e9-8906-3a7255574dfa', 'NeeFood', NULL, 'Org', 'need.org@gmail.com', '9898987665', NULL, '$2y$10$FTY5yqIBF3LqzUCRVZbVi.RacWhZ4r0PWu.G8o5m27/8FCI17orIa', 'active', 'user', NULL, '2023-09-16 12:40:51', '2023-09-16 12:40:51', NULL),
('263e817e-2d0e-4846-bed5-c3c3d8ba5c13', 'Aayush', NULL, 'Shrestha', 'aayushstha56@gmail.com', '9809786678', NULL, '$2y$10$jsrR1009umIOGUBwQ0r9E.2.0vupJ1S1pEmDsKKXgiuFm7sIPfj4.', 'active', 'user', NULL, '2023-09-16 07:05:09', '2023-09-16 07:05:09', NULL),
('2840134e-568b-46c7-9d78-1ea0602eadaf', 'Pokhara', NULL, 'Donor', 'donorpokhara@gmail.com', '9898987655', NULL, '$2y$10$O36OXvum6h1Bo3Wt.oBo0.gjyCNUTRkWdC417SxezrzOuYNwwcP4S', 'active', 'user', NULL, '2023-09-16 12:41:32', '2023-09-16 12:41:32', NULL),
('5097d8b3-47ec-413c-a76d-c3391f4bc451', 'abc', NULL, 'admin', 'admin@gmail.com', '987654321', NULL, '$2y$10$ydbKQnZ/dG5exkStSwQpbONqx9CH5yy6bD2eQO4d5EJamuRFP7jhK', 'active', 'admin', NULL, '2023-09-16 06:53:13', '2023-09-16 06:53:13', NULL),
('59bccd43-8963-44a8-8d5b-e3824b3d1964', 'Staff', NULL, 'Staff', 'staff1@gmail.com', '9999999', NULL, '$2y$10$htk8/jNUSiJoxxsF18iWWOUnDwgY.rI3OzDohYU3iD9dN7vD0.l7O', 'active', 'user', NULL, '2023-09-16 21:32:55', '2023-09-16 21:32:55', NULL),
('916d258e-04b7-48cb-8d6c-1060e1f40806', 'Ram', NULL, 'Tamang', 'ram1user@gmail.com', '989898989', NULL, '$2y$10$8mKpGss6djr2sEY8GY1nMuAAVeFfohFkqbM32kbjo.GZTVpO1E0Wa', 'active', 'user', NULL, '2023-09-16 07:06:49', '2023-09-16 07:06:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborations_user_id_foreign` (`user_id`),
  ADD KEY `collaborations_collaborator_id_foreign` (`collaborator_id`),
  ADD KEY `collaborations_request_id_foreign` (`request_id`),
  ADD KEY `collaborations_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_user_id_foreign` (`user_id`),
  ADD KEY `donations_request_id_foreign` (`request_id`),
  ADD KEY `donations_category_id_foreign` (`category_id`);

--
-- Indexes for table `donation_images`
--
ALTER TABLE `donation_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_images_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
  ADD KEY `notifications_sent_user_id_foreign` (`sent_user_id`),
  ADD KEY `notifications_recieved_user_id_foreign` (`recieved_user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `reciever_details`
--
ALTER TABLE `reciever_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reciever_details_receiver_id_foreign` (`receiver_id`),
  ADD KEY `reciever_details_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_category_id_foreign` (`category_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD CONSTRAINT `collaborations_collaborator_id_foreign` FOREIGN KEY (`collaborator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `collaborations_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`),
  ADD CONSTRAINT `collaborations_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `collaborations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `donations_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donation_images`
--
ALTER TABLE `donation_images`
  ADD CONSTRAINT `donation_images_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `notifications_recieved_user_id_foreign` FOREIGN KEY (`recieved_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_sent_user_id_foreign` FOREIGN KEY (`sent_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reciever_details`
--
ALTER TABLE `reciever_details`
  ADD CONSTRAINT `reciever_details_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reciever_details_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
