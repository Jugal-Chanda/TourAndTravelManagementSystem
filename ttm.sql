-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 09:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttm`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_place_id` int(11) NOT NULL,
  `booking_hotel_id` int(11) NOT NULL DEFAULT '0',
  `no_of_person` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `travel_cost` int(11) NOT NULL DEFAULT '0',
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `approve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `booking_place_id`, `booking_hotel_id`, `no_of_person`, `no_of_days`, `travel_cost`, `starting_date`, `ending_date`, `approve`) VALUES
(2, 1, 2, 1, 2, 2, 8000, '2019-04-07', '2019-04-09', 1),
(3, 1, 1, 0, 3, 2, 12000, '2019-04-08', '2019-04-10', 1),
(4, 1, 1, 0, 3, 2, 12000, '2019-04-02', '2019-04-04', 1),
(5, 1, 2, 1, 2, 2, 8150, '2019-04-05', '2019-04-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `c_id` int(11) NOT NULL,
  `catagory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`c_id`, `catagory_name`) VALUES
(1, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `galary_images`
--

CREATE TABLE `galary_images` (
  `g_i_id` int(11) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galary_images`
--

INSERT INTO `galary_images` (`g_i_id`, `image_name`, `place`) VALUES
(2, 'galary_image2.jpg', 'chittagong_hill_tracts'),
(3, 'galary_image3.jpg', 'jaflong'),
(4, 'galary_image4.jpg', 'cox bazar');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `h_id` int(11) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `sub_location` varchar(100) NOT NULL,
  `city_town` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `cover_photo` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`h_id`, `hotel_name`, `sub_location`, `city_town`, `country`, `cover_photo`, `cost`) VALUES
(1, 'abcd', 'abcd', 'abdfa', 'afdas', 'hotel_cover_image1.jpg', 150),
(2, 'af', 'af', 'af', 'fa', 'hotel_cover_image2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `profile_image` varchar(100) NOT NULL DEFAULT 'blankimage.jpg',
  `name` varchar(40) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `payment_type` text NOT NULL,
  `account_number` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information_admin`
--

CREATE TABLE `information_admin` (
  `profile_image` varchar(100) NOT NULL DEFAULT 'blankimage.jpg',
  `name` varchar(40) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakages`
--

CREATE TABLE `pakages` (
  `pakage_id` int(11) NOT NULL,
  `pakage_name` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `travel_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakages`
--

INSERT INTO `pakages` (`pakage_id`, `pakage_name`, `place_id`, `hotel_id`, `catagory_id`, `person`, `duration`, `travel_cost`) VALUES
(1, 'rimi', 1, 1, 1, 2, 2, 2500),
(2, 'monir', 3, 2, 1, 1, 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tourist_place`
--

CREATE TABLE `tourist_place` (
  `p_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_cover_photo` varchar(50) NOT NULL,
  `travel_cost` int(11) NOT NULL,
  `city_town` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tourist_place`
--

INSERT INTO `tourist_place` (`p_id`, `place_name`, `place_cover_photo`, `travel_cost`, `city_town`, `country`) VALUES
(1, 'm-d-c-s', 'tourist_place_cover1.jpg', 4000, 'Bandarban', 'Bangladesh'),
(2, 'chittagong_hill_tracts', 'tourist_place_cover2.jpg', 4000, 'chittagong', 'Bangladesh'),
(3, 'jaflong', 'tourist_place_cover3.jpg', 3500, 'Sylhet', 'Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `galary_images`
--
ALTER TABLE `galary_images`
  ADD PRIMARY KEY (`g_i_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique` (`name`,`email`);

--
-- Indexes for table `information_admin`
--
ALTER TABLE `information_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `pakages`
--
ALTER TABLE `pakages`
  ADD PRIMARY KEY (`pakage_id`);

--
-- Indexes for table `tourist_place`
--
ALTER TABLE `tourist_place`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galary_images`
--
ALTER TABLE `galary_images`
  MODIFY `g_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information_admin`
--
ALTER TABLE `information_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pakages`
--
ALTER TABLE `pakages`
  MODIFY `pakage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourist_place`
--
ALTER TABLE `tourist_place`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
