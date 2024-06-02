-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2024 at 06:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multivendor_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2024-05-06 09:46:16', '2024-05-06 09:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', 'm', '2024-05-06 09:46:26', '2024-05-06 09:46:26'),
(2, 1, 'S', 's', '2024-05-06 09:46:39', '2024-05-06 09:46:39'),
(3, 1, 'L', 'l', '2024-05-06 09:46:48', '2024-05-06 09:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `customer_id`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 09:17:38', '2024-05-06 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` int NOT NULL,
  `upload_id` int NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `featured_status` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `meta`, `meta_description`, `featured_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Piking', 'uploads/brands/aaa.jpg', 'Piking', 'Piking', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(2, 'Apple', 'uploads/brands/apple.jpg', 'Apple', 'Apple', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(3, 'Asus', 'uploads/brands/asus.jpg', 'Asus', 'Asus', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(4, 'Baseus', 'uploads/brands/baseus.jpg', 'Baseus', 'Baseus', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(5, 'Edifier', 'uploads/brands/edifier.jpg', 'Edifier', 'Edifier', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(6, 'General', 'uploads/brands/general.jpg', 'General', 'General', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(7, 'Gree', 'uploads/brands/gree.jpg', 'Gree', 'Gree', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(8, 'Panasonic', 'uploads/brands/panasonic.jpg', 'Panasonic', 'Panasonic', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(9, 'Samsung', 'uploads/brands/samsung.jpg', 'Samsung', 'Samsung', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(10, 'Sharp', 'uploads/brands/sharp.jpg', 'Sharp', 'Sharp', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `level` int NOT NULL,
  `orderNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `cover` text COLLATE utf8mb4_unicode_ci,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaDescription` text COLLATE utf8mb4_unicode_ci,
  `featured_status` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `parent_id`, `level`, `orderNumber`, `banner`, `icon`, `cover`, `meta`, `metaDescription`, `featured_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bathroom Shelving', 'physical', 0, 0, '', '/uploads/cat/1.png', '/uploads/cat/1.png', '/uploads/cat/1.png', 'Bathroom Shelving', 'Bathroom Shelving', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(2, 'Smartwatches', 'physical', 0, 0, '', '/uploads/cat/2.jpg', '/uploads/cat/2.jpg', '/uploads/cat/2.jpg', 'Smartwatches', 'Smartwatches', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(3, 'Closed circuit camera', 'physical', 0, 0, '', '/uploads/cat/3.jpg', '/uploads/cat/3.jpg', '/uploads/cat/3.jpg', 'Closed circuit camera', 'Closed circuit camera', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(4, 'Men\'s T-shit', 'digital', 0, 0, '', '/uploads/cat/4.jpg', '/uploads/cat/4.jpg', '/uploads/cat/4.jpg', 'Men\'s T-shit', 'Men\'s T-shit', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(5, 'Wardrobe Organisers', 'digital', 0, 0, '', '/uploads/cat/5.jpg', '/uploads/cat/5.jpg', '/uploads/cat/5.jpg', 'Wardrobe Organisers', 'Wardrobe Organisers', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(6, 'Ear phone/ Head phone', 'digital', 0, 0, '', '/uploads/cat/6.jpg', '/uploads/cat/6.jpg', '/uploads/cat/6.jpg', 'Ear phone/ Head phone', 'Ear phone/ Head phone', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(7, 'Watch', 'digital', 0, 0, '', '/uploads/cat/7.jpg', '/uploads/cat/7.jpg', '/uploads/cat/7.jpg', 'Watch', 'Watch', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(8, 'Home Accessories', 'digital', 0, 0, '', '/uploads/cat/8.jpg', '/uploads/cat/8.jpg', '/uploads/cat/8.jpg', 'Home Accessories', 'Home Accessories', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(9, 'Lifestyle', 'digital', 0, 0, '', '/uploads/cat/9.jpg', '/uploads/cat/9.jpg', '/uploads/cat/9.jpg', 'Lifestyle', 'Lifestyle', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(10, 'Fairy Lights', 'digital', 0, 0, '', '/uploads/cat/10.jpg', '/uploads/cat/10.jpg', '/uploads/cat/10.jpg', 'Fairy Lights', 'Fairy Lights', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(11, 'Hats & Caps', 'digital', 0, 0, '', '/uploads/cat/11.jpg', '/uploads/cat/11.jpg', '/uploads/cat/11.jpg', 'Hats & Caps', 'Hats & Caps', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(12, 'Humidifiers', 'digital', 0, 0, '', '/uploads/cat/12.jpg', '/uploads/cat/12.jpg', '/uploads/cat/12.jpg', 'Humidifiers', 'Humidifiers', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(13, 'Rings', 'digital', 0, 0, '', '/uploads/cat/13.jpg', '/uploads/cat/13.jpg', '/uploads/cat/13.jpg', 'Rings', 'Rings', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(14, 'Eyelashes & Eyeglasses', 'digital', 0, 0, '', '/uploads/cat/14.jpg', '/uploads/cat/14.jpg', '/uploads/cat/14.jpg', 'Eyelashes & Eyeglasses', 'Eyelashes & Eyeglasses', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(15, 'Smart PHone', 'digital', 0, 0, '', '/uploads/cat/15.jpg', '/uploads/cat/15.jpg', '/uploads/cat/15.jpg', 'Smart PHone', 'Smart PHone', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(16, 'Modelling and Sculpting', 'digital', 0, 0, '', '/uploads/cat/16.jpg', '/uploads/cat/16.jpg', '/uploads/cat/16.jpg', 'Modelling and Sculpting', 'Modelling and Sculpting', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(17, 'Chino', 'digital', 0, 0, '', '/uploads/cat/17.jpg', '/uploads/cat/17.jpg', '/uploads/cat/17.jpg', 'Chino', 'Chino', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(18, 'Modelling & Sculpting', 'digital', 0, 0, '', '/uploads/cat/18.jpg', '/uploads/cat/18.jpg', '/uploads/cat/18.jpg', 'Modelling & Sculpting', 'Modelling & Sculpting', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(19, 'Groceries', 'digital', 0, 0, '', '/uploads/cat/19.jpg', '/uploads/cat/19.jpg', '/uploads/cat/19.jpg', 'Groceries', 'Groceries', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(20, 'Sports & Outdoors', 'digital', 0, 0, '', '/uploads/cat/20.png', '/uploads/cat/20.png', '/uploads/cat/20.png', 'Sports & Outdoors', 'Sports & Outdoors', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(21, 'Automotive & Motorbike', 'digital', 0, 0, '', '/uploads/cat/21.jpg', '/uploads/cat/21.jpg', '/uploads/cat/21.jpg', 'Automotive & Motorbike', 'Automotive & Motorbike', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(22, 'Traditional Wear', 'digital', 0, 0, '', '/uploads/cat/22.jpg', '/uploads/cat/22.jpg', '/uploads/cat/22.jpg', 'Traditional Wear', 'Traditional Wear', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(23, 'Trendy Mobile Accessories', 'physical', 0, 0, '', '/uploads/cat/23.jpg', '/uploads/cat/23.jpg', '/uploads/cat/23.jpg', 'Trendy Mobile Accessories', 'Trendy Mobile Accessories', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(24, 'Personal Care', 'physical', 0, 0, '', '/uploads/cat/24.jpg', '/uploads/cat/24.jpg', '/uploads/cat/24.jpg', 'Personal Care', 'Personal Care', 0, 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', 1, '2024-05-06 09:44:49', '2024-05-06 09:44:49'),
(2, 'Green', '#22e22f', 1, '2024-05-06 09:45:06', '2024-05-06 09:45:06'),
(3, 'Red', '#f50505', 1, '2024-05-06 09:45:19', '2024-05-06 09:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `seller_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(10,2) NOT NULL,
  `discount_status` tinyint(1) NOT NULL,
  `date_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `min_shopping` int DEFAULT NULL,
  `max_discount_amount` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_type`, `coupon_code`, `discount`, `discount_status`, `date_range`, `product_id`, `user_id`, `min_shopping`, `max_discount_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'product', 'abc123', 5.00, 1, '05/06/2024 - 06/29/2024', 4, 3, NULL, NULL, 1, '2024-05-06 10:42:21', '2024-05-06 10:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `firstName`, `lastName`, `image`, `phone`, `date_of_birth`, `gender`, `street_address`, `city`, `state`, `post`, `country`, `ssn`, `company`, `website`, `facebook`, `linkedIn`, `twitter`, `youtube`, `instagram`, `marital_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-05-06 09:17:38', '2024-05-06 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer_auths`
--

CREATE TABLE `customer_auths` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mid_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expired_at` datetime DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_expired_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_classified_packages`
--

CREATE TABLE `customer_classified_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `product_upload` int NOT NULL,
  `package_logo` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_wallets`
--

CREATE TABLE `customer_wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `balance` double(10,2) NOT NULL DEFAULT '0.00',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_wallets`
--

INSERT INTO `customer_wallets` (`id`, `user_id`, `balance`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 4, 0.00, '0', NULL, '2024-05-06 09:17:38', '2024-05-06 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` bigint UNSIGNED NOT NULL,
  `owner_id` bigint DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanentAddress` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci,
  `payment_method` text COLLATE utf8mb4_unicode_ci,
  `account_holder_name` text COLLATE utf8mb4_unicode_ci,
  `account_number` bigint DEFAULT NULL,
  `branch` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_orders`
--

CREATE TABLE `delivery_boy_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `pending_order` bigint NOT NULL DEFAULT '0',
  `pickup_order` bigint NOT NULL DEFAULT '0',
  `complete_order` bigint NOT NULL DEFAULT '0',
  `request_cancel_order` bigint NOT NULL DEFAULT '0',
  `cancel_order` bigint NOT NULL DEFAULT '0',
  `earning` bigint NOT NULL DEFAULT '0',
  `balance` bigint NOT NULL DEFAULT '0',
  `total_withdraw` bigint NOT NULL DEFAULT '0',
  `total_collection` bigint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_payments`
--

CREATE TABLE `delivery_boy_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint NOT NULL,
  `withdrawal_amount` bigint NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature_activations`
--

CREATE TABLE `feature_activations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_activations`
--

INSERT INTO `feature_activations` (`id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HTTPS_Activation', 'System', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(2, 'Maintenance_Mode_Activation', 'System', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(3, 'Vendor_System_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(4, 'Classified_Product', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(5, 'Wallet_System_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(6, 'Coupon_System_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(7, 'Pickup_Point_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(8, 'Conversation_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(9, 'Seller_Product_Manage_By_Admin', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(10, 'Admin_Approval_On_Seller_Product', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(11, 'Email_Verification', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(12, 'Product_Query_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(13, 'Guest_Checkout_Activation', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(14, 'Wholesale_Product_for_Seller', 'Business Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(15, 'Paypal_Payment_Activation', 'Payment Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(16, 'Stripe_Payment_Activation', 'Payment Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(17, 'SSlCommerz_Activation', 'Payment Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(18, 'Bkash_Activation', 'Payment Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(19, 'Nagad_Activation', 'Payment Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(20, 'Rocket_Activation', 'Payment Related', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(21, 'Facebook_login', 'Social Media Login', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(22, 'Google_login', 'Social Media Login', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(23, 'Apple_login', 'Social Media Login', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(24, 'Twitter_login', 'Social Media Login', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_18_201818_create_sessions_table', 1),
(7, '2023_12_19_042330_create_roles_table', 1),
(8, '2023_12_19_042355_create_permissions_table', 1),
(9, '2023_12_19_042413_create_role_permissions_table', 1),
(10, '2023_12_19_164438_create_categories_table', 1),
(11, '2023_12_19_215220_create_brands_table', 1),
(12, '2023_12_19_224913_create_units_table', 1),
(13, '2023_12_19_232356_create_colors_table', 1),
(14, '2023_12_20_041910_create_sizes_table', 1),
(15, '2023_12_20_050103_create_sub_categories_table', 1),
(16, '2023_12_21_032733_create_product_types_table', 1),
(17, '2023_12_23_045624_create_blogs_table', 1),
(18, '2023_12_23_045905_create_blog_categories_table', 1),
(19, '2023_12_24_031635_create_delivery_boys_table', 1),
(20, '2023_12_24_063029_create_customer_auths_table', 1),
(21, '2023_12_25_032721_create_sellers_table', 1),
(22, '2023_12_25_095517_create_website_settings_table', 1),
(23, '2023_12_27_060215_create_seller_reviews_table', 1),
(24, '2023_12_28_110514_create_website_sliders_table', 1),
(25, '2023_12_28_110809_create_blog_images_table', 1),
(26, '2024_03_13_100003_create_countries_table', 1),
(27, '2024_03_13_115134_create_currencies_table', 1),
(28, '2024_03_13_125222_create_feature_activations_table', 1),
(29, '2024_03_13_153929_create_billings_table', 1),
(30, '2024_03_13_153933_create_shippings_table', 1),
(31, '2024_03_13_161036_create_refunds_table', 1),
(32, '2024_03_14_112133_create_customers_table', 1),
(33, '2024_03_14_140447_create_seller_form_verification_fields_table', 1),
(34, '2024_03_18_094713_create_uploads_table', 1),
(35, '2024_03_19_092639_create_customer_classified_packages_table', 1),
(36, '2024_03_19_100427_create_products_table', 1),
(37, '2024_03_20_103819_create_seller_packages_table', 1),
(38, '2024_03_20_111538_create_seller_commissions_table', 1),
(39, '2024_03_21_101543_create_seller_shop_settings_table', 1),
(40, '2024_03_21_120943_create_coupons_table', 1),
(41, '2024_03_23_102015_create_subscribers_table', 1),
(42, '2024_03_23_161850_create_purchage_packages_table', 1),
(43, '2024_03_24_100747_create_offline_payments_table', 1),
(44, '2024_03_28_100243_create_product_queries_table', 1),
(45, '2024_03_28_113803_create_tickets_table', 1),
(46, '2024_03_28_114050_create_ticket_replies_table', 1),
(47, '2024_03_28_135208_create_conversations_table', 1),
(48, '2024_03_28_135309_create_messages_table', 1),
(49, '2024_03_30_092811_create_product_queries_replies_table', 1),
(50, '2024_04_06_132838_create_delivery_boy_orders_table', 1),
(51, '2024_04_16_121610_create_orders_details_table', 1),
(52, '2024_04_16_121848_create_orders_table', 1),
(53, '2024_04_17_101851_create_wishlists_table', 1),
(54, '2024_04_17_160447_create_cart_items_table', 1),
(55, '2024_04_18_104827_create_delivery_boy_payments_table', 1),
(56, '2024_04_18_150456_create_attributes_table', 1),
(57, '2024_04_18_150541_create_attribute_values_table', 1),
(58, '2024_04_18_173301_create_product_stocks_table', 1),
(59, '2024_04_21_143932_create_pages_table', 1),
(60, '2024_04_22_103259_create_seller_payments_table', 1),
(61, '2024_04_22_103420_create_vendor_wallets_table', 1),
(62, '2024_04_22_132417_create_vendor_payment_infos_table', 1),
(63, '2024_04_28_102410_create_product_whole_sales_table', 1),
(64, '2024_05_02_095502_create_customer_wallets_table', 1),
(65, '2024_05_02_102914_create_product_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offline_payments`
--

CREATE TABLE `offline_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `transition_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` bigint NOT NULL,
  `order_status` tinyint NOT NULL DEFAULT '0',
  `order_date` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(10,2) NOT NULL DEFAULT '0.00',
  `total_shipping` double(10,2) NOT NULL DEFAULT '0.00',
  `payment_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` tinyint NOT NULL DEFAULT '0',
  `payment_date` date DEFAULT NULL,
  `manual_payment_status` tinyint NOT NULL DEFAULT '0',
  `manual_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on',
  `payment_details` text COLLATE utf8mb4_unicode_ci,
  `deliveryBoy_id` bigint DEFAULT NULL,
  `deliveryBoy_pickup` bigint DEFAULT NULL,
  `delivery_status` tinyint NOT NULL DEFAULT '0',
  `delivery_date` date DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` double(10,2) NOT NULL DEFAULT '0.00',
  `commission` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_code`, `order_number`, `order_status`, `order_date`, `phone`, `total_price`, `total_shipping`, `payment_amount`, `payment_method`, `payment_status`, `payment_date`, `manual_payment_status`, `manual_payment`, `payment_details`, `deliveryBoy_id`, `deliveryBoy_pickup`, `delivery_status`, `delivery_date`, `delivery_address`, `currency`, `transaction_id`, `coupon_code`, `coupon_discount`, `commission`, `created_at`, `updated_at`) VALUES
(1, 4, '85130706740', 46984479659, 0, '2024-05-06', '34535', 1302.00, 10.00, 0.00, 'cash_on_delivery', 0, NULL, 0, 'cash_on', NULL, NULL, NULL, 0, NULL, 'dfgd', NULL, NULL, NULL, 0.00, 0, '2024-05-06 09:21:26', '2024-05-06 09:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `seller_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` int NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `tax_total` double(10,2) NOT NULL,
  `minQty` int DEFAULT NULL,
  `maxQty` int DEFAULT NULL,
  `unit_price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `seller_id`, `product_name`, `variant_id`, `product_color`, `product_size`, `product_qty`, `product_price`, `tax_total`, `minQty`, `maxQty`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'newr prod', '', '', '', 1, 1230.00, 62.00, NULL, NULL, 1230.00, '2024-05-06 09:21:26', '2024-05-06 09:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `unit_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bar_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_stock` int DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_select` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_count` int NOT NULL DEFAULT '0',
  `featured_status` tinyint DEFAULT NULL,
  `refund` tinyint NOT NULL DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `estimate_shipping_time` int DEFAULT NULL,
  `variant_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `brand_id`, `unit_id`, `unit_amount`, `name`, `slug`, `bar_code`, `product_price`, `product_stock`, `product_image`, `product_select`, `other_image`, `short_description`, `long_description`, `product_type`, `category_type`, `sales_count`, `featured_status`, `refund`, `tags`, `shipping_cost`, `estimate_shipping_time`, `variant_product`, `attributes`, `choice_options`, `colors`, `file`, `role`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 2, 2, '1', 'newr prod', 'newr_prod', '10sdsf', 1230.00, -1, 'uploads/file-uploads/tour-destination6.jpg', 'single_product', '[\"8\",\"9\"]', 'sfdsf sdf ssdfsdf', '<p>sfs sdfdsf s sfdsf</p>', 'regular-product', 'physical', 0, NULL, 0, 'sfdsf', 10.00, NULL, 'single_product', '[]', '[]', '[]', NULL, 'admin', 1, '2024-05-06 05:35:19', '2024-05-06 09:21:26'),
(3, 3, 6, 2, 2, '500', 'Seller Product one', 'seller_product_one', '126sdfs', 1200.00, NULL, 'uploads/file-uploads/tour-destination4.jpg', 'single_product', '[\"4\",\"5\",\"6\"]', 'sfdsf', '<p>sdfsdf</p>', 'regular_product', 'digital', 0, NULL, 0, NULL, 3454.00, NULL, 'single_product', '[]', '[]', '[]', NULL, 'seller', 1, '2024-05-06 07:07:12', '2024-05-06 10:06:29'),
(4, 3, 5, 2, 0, '', 'This is seller variant product', 'this_is_seller_variant_product', 'var120', 1200.00, 10, 'uploads/file-uploads/tour-destination4.jpg', 'product_variation', '[\"7\",\"8\",\"9\"]', 'short description', '<p>long description</p>', 'regular_product', 'digital', 0, NULL, 0, NULL, 10.00, NULL, '1', '[\"1\"]', '[{\"attribute_id\":\"1\",\"values\":[\"M\"]}]', '[\"#22e22f\",\"#f50505\"]', NULL, 'seller', 1, '2024-05-06 09:51:51', '2024-05-06 10:06:19'),
(5, 3, 2, 3, 0, '', 'test product one', 'test_product_one', 'asu789', 1200.00, 15, 'uploads/file-uploads/tour-destination2.jpg', 'single_product', '[\"5\",\"6\"]', 'sfsdf', '<p>sdfsf<br></p>', 'regular_product', 'physical', 0, NULL, 0, NULL, 1.00, NULL, 'single_product', '[]', '[]', '[]', NULL, 'seller', 0, '2024-05-06 10:25:33', '2024-05-06 10:25:33'),
(6, 3, 6, 4, 0, '', 'test product two', 'test_product_two', 'ear150', 750.00, 20, 'uploads/file-uploads/tour-destination5.jpg', 'product_variation', '[\"4\",\"5\"]', NULL, NULL, 'regular_product', 'digital', 0, NULL, 0, NULL, 0.00, NULL, '1', '[]', '[]', '[\"#000000\",\"#22e22f\"]', NULL, 'seller', 0, '2024-05-06 10:26:57', '2024-05-06 10:26:57'),
(7, 1, 2, 2, 1, '1', 'IAURA I8 Pro Max Smart Watch Series 8 Phone Call Custom Watch Face Sport Waterproof Women Man Wireless Charging Passometer', 'iaura_i8_pro_max_smart_watch_series_8_phone_call_custom_watch_face_sport_waterproof_women_man_wireless_charging_passometer', 'bar1230000', 1200.00, 1, 'uploads/file-uploads/tour-destination5.jpg', 'product_variation', '[\"3\",\"4\",\"5\"]', NULL, NULL, 'regular-product', 'physical', 0, NULL, 0, NULL, 10.00, NULL, '1', '[\"1\"]', '[{\"attribute_id\":\"1\",\"values\":[\"S\"]}]', '[\"#000000\"]', NULL, 'admin', 1, '2024-05-07 06:47:16', '2024-05-07 06:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_queries`
--

CREATE TABLE `product_queries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_queries_replies`
--

CREATE TABLE `product_queries_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `queries_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `seller_id` bigint NOT NULL,
  `rating` bigint DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `variant`, `sku`, `price`, `qty`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 'Seller Product one', '126sdfs', '1200', '10', 'uploads/file-uploads/tour-destination4.jpg', '2024-05-06 07:07:12', '2024-05-06 07:07:12'),
(5, 4, 'Green-M', 'Green-M', '1200', '10', NULL, '2024-05-06 10:05:16', '2024-05-06 10:05:16'),
(6, 4, 'Red-M', 'Red-M', '1200', '10', NULL, '2024-05-06 10:05:16', '2024-05-06 10:05:16'),
(7, 5, 'test product one', 'asu789', '1200', '15', 'uploads/file-uploads/tour-destination2.jpg', '2024-05-06 10:25:33', '2024-05-06 10:25:33'),
(8, 6, 'Black', 'Black', '1750', '20', NULL, '2024-05-06 10:26:57', '2024-05-06 10:26:57'),
(9, 6, 'Green', 'Green', '1750', '20', NULL, '2024-05-06 10:26:57', '2024-05-06 10:26:57'),
(10, 7, 'Black-S', 'Black-S', '1200', '10', NULL, '2024-05-07 06:47:16', '2024-05-07 06:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_whole_sales`
--

CREATE TABLE `product_whole_sales` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `minQty` int DEFAULT NULL,
  `maxQty` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchage_packages`
--

CREATE TABLE `purchage_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint UNSIGNED NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `seller_approval` tinyint NOT NULL DEFAULT '0',
  `refund_status` tinyint NOT NULL DEFAULT '0',
  `reason` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_policy` tinyint(1) NOT NULL DEFAULT '0',
  `verify_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `shop_name`, `address`, `terms_policy`, `verify_field`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Welcome Shop', 'Dhaka,Bangladesh', 0, '[]', 0, '2024-05-05 04:32:50', '2024-05-06 10:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `seller_commissions`
--

CREATE TABLE `seller_commissions` (
  `id` bigint UNSIGNED NOT NULL,
  `commission_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `seller_commission` double DEFAULT NULL,
  `previous_seller_commission` double DEFAULT NULL,
  `withdraw_seller_amount` double DEFAULT NULL,
  `category_based_commission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_commissions`
--

INSERT INTO `seller_commissions` (`id`, `commission_status`, `seller_commission`, `previous_seller_commission`, `withdraw_seller_amount`, `category_based_commission`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 0, NULL, '0', '2024-05-05 04:32:50', '2024-05-05 04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `seller_form_verification_fields`
--

CREATE TABLE `seller_form_verification_fields` (
  `id` bigint UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_packages`
--

CREATE TABLE `seller_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `product_upload` int NOT NULL,
  `duration` int NOT NULL,
  `package_logo` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_payments`
--

CREATE TABLE `seller_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint NOT NULL,
  `withdrawal_amount` bigint NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_reviews`
--

CREATE TABLE `seller_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `total_review` int NOT NULL DEFAULT '0',
  `customer_review` int NOT NULL DEFAULT '0',
  `shipping_seed` tinyint DEFAULT NULL,
  `communication` tinyint DEFAULT NULL,
  `customer_service` tinyint DEFAULT NULL,
  `return_policy` tinyint DEFAULT NULL,
  `package_policy` tinyint DEFAULT NULL,
  `package_quantity` tinyint DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_shop_settings`
--

CREATE TABLE `seller_shop_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `seller_id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_shop_settings`
--

INSERT INTO `seller_shop_settings` (`id`, `seller_id`, `logo`, `banner`, `icon`, `slogan`, `meta`, `meta_description`, `about`, `facebook`, `twitter`, `youtube`, `linkedIn`, `map`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-05 04:32:49', '2024-05-05 04:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PbXoengyjCJshsiZkGUSLuXYQxaQxmfS9l4Lidfx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZVhvMGNESEl6d055ekhqdTR2ZG5kR3d0STdhY2hTMzJicTI1OWN3YSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9zZW9fbXVsdGl2ZW5kb3JfZWNvbW1lcmNlLnRlc3QvYWRtaW4vZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRDRG9leERBNFR2SkY1UnF2Q2x0TmR1eUNEOE15UVpGcXdHSkpvNm84dnBLY1RuRzFhcThhTyI7fQ==', 1715064470);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `address_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `customer_id`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 09:17:38', '2024-05-06 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sender_id` bigint NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint NOT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` tinyint NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kilogram', 'kg', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(2, 'Meter', 'm', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(3, 'Pices', 'pcs', 1, '2024-05-07 06:07:33', '2024-05-07 06:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `file_name`, `file_type`, `file_size`, `file`, `uploaded_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'tour-destination1.jpg', 'file', '52.1416015625', 'uploads/file-uploads/tour-destination1.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(2, 1, 'tour-destination2.jpg', 'file', '37.9873046875', 'uploads/file-uploads/tour-destination2.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(3, 1, 'tour-destination3.jpg', 'file', '36.029296875', 'uploads/file-uploads/tour-destination3.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(4, 1, 'tour-destination4.jpg', 'file', '46.74609375', 'uploads/file-uploads/tour-destination4.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(5, 1, 'tour-destination5.jpg', 'file', '45.9033203125', 'uploads/file-uploads/tour-destination5.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(6, 1, 'tour-destination6.jpg', 'file', '32.3330078125', 'uploads/file-uploads/tour-destination6.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(7, 1, 'tour-destination7.jpg', 'file', '47.7646484375', 'uploads/file-uploads/tour-destination7.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(8, 1, 'tour-destination8.jpg', 'file', '45.634765625', 'uploads/file-uploads/tour-destination8.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05'),
(9, 1, 'tour-destination9.jpg', 'file', '41.5048828125', 'uploads/file-uploads/tour-destination9.jpg', 'Admin', '2024-05-05 04:34:05', '2024-05-05 04:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expired_at` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `profile_verified` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `gender`, `date_of_birth`, `phone_number`, `image`, `token`, `token_expired_at`, `email_verified_at`, `profile_verified`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$CDoexDA4TvJF5RqvCltNduyCD8MyQZFqwGJJo6o8vpKcTnG1aq8aO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'admin', 1, '2024-05-05 04:32:49', '2024-05-05 04:32:49'),
(2, 'Manager', 'manager@gmail.com', '$2y$12$mDCU2kiIIi5ev0AwY/hcwOmt4GTigxTk0MtiSEoPt0OajsqVgrmhu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'manager', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(3, 'Seller', 'seller@gmail.com', '$2y$12$ObHHP1H1fVPYi656Jgnb9ex/1YsNSwFU/XTfZinfDNPQKCIWt/x82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-05 10:32:50', 1, 'seller', 1, '2024-05-05 04:32:50', '2024-05-06 10:34:42'),
(4, 'Md Rokon', 'rokon@gmail.com', '$2y$12$RrA2gY4MIX9DlGmIWryNvOvJHY9oIUhjfgYh/dQfCXpQ0qWvRvPtG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'customer', 1, '2024-05-06 09:17:38', '2024-05-06 09:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment_infos`
--

CREATE TABLE `vendor_payment_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci,
  `account_holder_name` text COLLATE utf8mb4_unicode_ci,
  `account_number` bigint DEFAULT NULL,
  `branch` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wallets`
--

CREATE TABLE `vendor_wallets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `pending_order` bigint NOT NULL DEFAULT '0',
  `complete_order` bigint NOT NULL DEFAULT '0',
  `cancel_order` bigint NOT NULL DEFAULT '0',
  `total_earning` bigint NOT NULL DEFAULT '0',
  `balance` bigint NOT NULL DEFAULT '0',
  `total_withdraw` bigint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `logo`, `banner`, `icon`, `slogan`, `email`, `mobile`, `address`, `about`, `facebook`, `twitter`, `youtube`, `linkedIn`, `map`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/logo.png', 'Insert your banner here', 'Insert your icon here', 'Insert your slogan here', 'Insert your email here', 'Insert your mobile here', 'Insert your address here', 'write your about us description', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.youtube.com', 'https://www.linkedIn.com', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.595646957583!2d90.4219536!3d23.822193449999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1703564956846!5m2!1sen!2sbd', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `website_sliders`
--

CREATE TABLE `website_sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_sliders`
--

INSERT INTO `website_sliders` (`id`, `title`, `image`, `banner`, `slogan`, `meta`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'slider 1', 'uploads//sliderExample.jpg', '', 'slider 1', 'slider 1', 'slider 1', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(2, 'slider 2', 'uploads//sliderExample.jpg', '', 'slider 2', 'slider 2', 'slider 2', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50'),
(3, 'slider 3', 'uploads/sliderExample.jpg', '', 'slider 3', 'slider 3', 'slider 3', 1, '2024-05-05 04:32:50', '2024-05-05 04:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wishlist_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `color`, `size`, `wishlist_status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '', '', '1', '2024-05-06 09:18:42', '2024-05-06 09:18:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`),
  ADD UNIQUE KEY `colors_code_unique` (`code`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_name_unique` (`name`),
  ADD UNIQUE KEY `countries_code_unique` (`code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_auths`
--
ALTER TABLE `customer_auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_auths_email_unique` (`email`);

--
-- Indexes for table `customer_classified_packages`
--
ALTER TABLE `customer_classified_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivery_boys_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `delivery_boys_facebook_unique` (`facebook`),
  ADD UNIQUE KEY `delivery_boys_twitter_unique` (`twitter`),
  ADD UNIQUE KEY `delivery_boys_linkedin_unique` (`linkedIn`),
  ADD UNIQUE KEY `delivery_boys_account_number_unique` (`account_number`);

--
-- Indexes for table `delivery_boy_orders`
--
ALTER TABLE `delivery_boy_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy_payments`
--
ALTER TABLE `delivery_boy_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_activations`
--
ALTER TABLE `feature_activations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `offline_payments`
--
ALTER TABLE `offline_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_bar_code_unique` (`bar_code`);

--
-- Indexes for table `product_queries`
--
ALTER TABLE `product_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_queries_replies`
--
ALTER TABLE `product_queries_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_name_unique` (`name`);

--
-- Indexes for table `product_whole_sales`
--
ALTER TABLE `product_whole_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchage_packages`
--
ALTER TABLE `purchage_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_shop_name_unique` (`shop_name`);

--
-- Indexes for table `seller_commissions`
--
ALTER TABLE `seller_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_form_verification_fields`
--
ALTER TABLE `seller_form_verification_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_packages`
--
ALTER TABLE `seller_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_payments`
--
ALTER TABLE `seller_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_reviews`
--
ALTER TABLE `seller_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_shop_settings`
--
ALTER TABLE `seller_shop_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`),
  ADD UNIQUE KEY `sizes_code_unique` (`code`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_name_unique` (`name`),
  ADD UNIQUE KEY `units_code_unique` (`code`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_payment_infos`
--
ALTER TABLE `vendor_payment_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_payment_infos_account_number_unique` (`account_number`);

--
-- Indexes for table `vendor_wallets`
--
ALTER TABLE `vendor_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_sliders`
--
ALTER TABLE `website_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_auths`
--
ALTER TABLE `customer_auths`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_classified_packages`
--
ALTER TABLE `customer_classified_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_wallets`
--
ALTER TABLE `customer_wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy_orders`
--
ALTER TABLE `delivery_boy_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy_payments`
--
ALTER TABLE `delivery_boy_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_activations`
--
ALTER TABLE `feature_activations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `offline_payments`
--
ALTER TABLE `offline_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_queries`
--
ALTER TABLE `product_queries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_queries_replies`
--
ALTER TABLE `product_queries_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_whole_sales`
--
ALTER TABLE `product_whole_sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchage_packages`
--
ALTER TABLE `purchage_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_commissions`
--
ALTER TABLE `seller_commissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_form_verification_fields`
--
ALTER TABLE `seller_form_verification_fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_packages`
--
ALTER TABLE `seller_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_payments`
--
ALTER TABLE `seller_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_reviews`
--
ALTER TABLE `seller_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_shop_settings`
--
ALTER TABLE `seller_shop_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_payment_infos`
--
ALTER TABLE `vendor_payment_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_wallets`
--
ALTER TABLE `vendor_wallets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_sliders`
--
ALTER TABLE `website_sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
