-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Fev-2020 às 22:21
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistics`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `order_type` enum('d','s','i','') NOT NULL,
  `order_value` decimal NOT NULL,
  `scheduled_date` date NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `status` enum('p','a','o','d','c') NOT NULL,
  `country` varchar(3) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `order_type`, `order_value`, `scheduled_date`, `street_address`, `city`, `state`, `zip`, `status`, `country`, `lat`, `lng`) VALUES
(1, 'marcos', 'Pinto', 'marcospaulosp10@gmail.com', '16133353189', 'd', 100.89, '2020-02-29', '3900 NW 25th St Suite 400', 'Miami', 'FL', '33142', 'p', 'usa', '25.558428', '-80.458168'),
(3, 'marcos', 'Pinto', 'marcospaulosp10@gmail.com', '16133353189', 'd', 800.99, '2020-02-27', '262 Kingsland Avenue A, Brooklyn', 'New York', 'NY', '11222', 'a', 'usa', '40.68863', '-74.018244'),
(4, 'marcos', 'Pinto', 'marcospaulosp10@gmail.com', '16133353189', 'd', 800.89, '2020-02-29', '14523 Carowinds Blvd Charlotte', 'North Carolina', 'NC', '28273', 'd', 'usa', '35.53971', '-79.130864');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
