-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 07:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(5) NOT NULL,
  `bill_id` varchar(50) NOT NULL,
  `product_company` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `packing_size` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `billing_header`
--

CREATE TABLE `billing_header` (
  `id` int(5) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `bill_type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing_header`
--

INSERT INTO `billing_header` (`id`, `full_name`, `bill_type`, `date`, `bill_no`, `username`) VALUES
(1, '', 'bill 1', '0000-00-00', '00001', 'admin'),
(2, '', 'bill 1', '0000-00-00', '00001', 'admin'),
(3, 'tanvirul karim', 'bill 1', '2022-01-23', '00002', 'admin'),
(4, '', 'bill 1', '0000-00-00', '00003', 'admin'),
(5, 'tanvirul karim', 'bill 1', '2022-01-08', '00005', 'admin'),
(6, '', 'bill 1', '0000-00-00', '00006', 'admin'),
(7, '', 'bill 1', '0000-00-00', '00007', 'admin'),
(8, 'abcd', 'bill 1', '2022-01-31', '00008', 'admin'),
(9, '', 'bill 1', '0000-00-00', '00009', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `company_name`
--

CREATE TABLE `company_name` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_name`
--

INSERT INTO `company_name` (`id`, `company_name`) VALUES
(16, 'Tata'),
(17, 'Bajaj'),
(18, 'Choruighor');

-- --------------------------------------------------------

--
-- Table structure for table `party_info`
--

CREATE TABLE `party_info` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `businessname` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `party_info`
--

INSERT INTO `party_info` (`id`, `firstname`, `lastname`, `businessname`, `contact`, `address`, `city`) VALUES
(1, 'tanvir ', 'tasneem', 'choruighor', '02929333322', 'sdsadasdd', 'dhaka '),
(3, 'tanvir', 'Karim', 'কিরন্মিয়া', '01966927688', 'Bamoil ,demra ,dhaka\r\n১২, ৪/এ', 'মিরপুর'),
(4, 'Rahela updated', 'Khatun updated', 'rahelar dokan  updated', 'dfdfddfdfdf updated', 'Mirpur 10  updated', 'dhaka  updated');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `packing_size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_name`, `product_name`, `unit`, `packing_size`) VALUES
(1, 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat'),
(2, 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp'),
(5, 'Tata', 'ssdsd', 's', 'sdsd'),
(6, 'Choruighor', 'sdsdf', 'kg', 'fgfg'),
(7, 'Tata', 'product tata kg ', 'kg', 'ps-1'),
(8, 'Bajaj', 'product 2', 'gm', 'ps-2'),
(9, 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp');

-- --------------------------------------------------------

--
-- Table structure for table `product_calculator`
--

CREATE TABLE `product_calculator` (
  `id` int(5) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `buying_price` varchar(255) NOT NULL,
  `shipping_cost` varchar(255) NOT NULL,
  `staff_cost` varchar(255) NOT NULL,
  `packaging_cost` varchar(255) NOT NULL,
  `weight_cost` varchar(255) NOT NULL,
  `cod_cost` varchar(255) NOT NULL,
  `bkash_cost` varchar(255) NOT NULL,
  `total_cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_calculator`
--

INSERT INTO `product_calculator` (`id`, `product_name`, `product_code`, `buying_price`, `shipping_cost`, `staff_cost`, `packaging_cost`, `weight_cost`, `cod_cost`, `bkash_cost`, `total_cost`) VALUES
(1, 'Product One', 'chw112', '100', '10', '5', '5', '0.2', '1', '1.8', '123'),
(2, 'Product One updated', 'chw112', '100', '10', '5', '10', '4', '1', '1.8', '131.8');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` int(5) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `packing_size` varchar(20) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `purchase_type` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `company_name`, `product_name`, `unit`, `packing_size`, `quantity`, `price`, `party_name`, `purchase_type`, `expiry_date`, `purchase_date`, `username`) VALUES
(15, 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat', '123', '1234', 'choruighor', 'Debit', '2022-02-06', '0000-00-00', 'admin'),
(16, 'Choruighor', 'sdsdf', 'kg', 'fgfg', '34', '678', 'rahelar dokan updated', 'Credit', '2022-02-06', '0000-00-00', 'admin'),
(17, 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '12', '123', 'choruighor', 'Debit', '2022-02-06', '0000-00-00', 'admin'),
(18, 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '12', '123', 'choruighor', 'Debit', '2022-02-06', '0000-00-00', 'admin'),
(19, 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat', '23', '45', 'কিরন্মিয়া', 'Debit', '2022-02-06', '0000-00-00', 'admin'),
(23, 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat', '445', '5665', 'কিরন্মিয়া', 'Debit', '2022-02-23', '2022-02-01', ''),
(24, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `retuen_by` varchar(50) NOT NULL,
  `id` int(5) NOT NULL,
  `bill_no` int(10) NOT NULL,
  `return_date` varchar(15) NOT NULL,
  `product_company` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_qty` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `return_products`
--

INSERT INTO `return_products` (`retuen_by`, `id`, `bill_no`, `return_date`, `product_company`, `product_name`, `product_unit`, `product_size`, `product_price`, `product_qty`, `total`) VALUES
('admin', 1, 5, '2022-01-31', 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '123', '4', '492'),
('admin', 2, 5, '2022-01-31', 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat', '456', '10', '4560'),
('admin', 3, 6, '2022-01-31', 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '123', '2', '246'),
('admin', 4, 6, '2022-01-31', 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '123', '2', '246'),
('admin', 5, 7, '2022-01-31', 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat', '456', '10', '4560'),
('admin', 6, 8, '2022-01-31', 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '123', '7', '861'),
('admin', 7, 0, '2022-01-31', '', '', '', '', '', '', '0'),
('admin', 8, 9, '2022-01-31', 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '123', '3', '369'),
('admin', 9, 0, '2022-01-31', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE `stock_master` (
  `id` int(5) NOT NULL,
  `product_company` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `packing_size` varchar(100) NOT NULL,
  `product_qty` varchar(5) NOT NULL,
  `product_selling_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`id`, `product_company`, `product_name`, `product_unit`, `packing_size`, `product_qty`, `product_selling_price`) VALUES
(4, 'Tata', 'Product Two upp', 'kg', 'packing-size-1 upp', '85', '123'),
(5, 'Bajaj', 'Product One updated', 'uni-1', 'packing-size-1 updat', '6142', '456'),
(6, '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(5) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit`) VALUES
(3, 's'),
(6, 'kg'),
(22, 'gm'),
(23, 'uni-1'),
(24, 'unit-2');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(1, 'tanvirul', 'karim', 'tanvir', '12345', 'user', 'active'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'active'),
(3, 'tanvir ', 'karimul ', 'tanvirul ', '1234567', '', 'active'),
(4, 'Tanvirul', 'karim ', 'tanvirrrr ', '123', 'User', 'active'),
(11, 'dsdsds ssss', 'sdsdsd  ssss', 'adminsdsdsds', '12345ssds', 'user', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_header`
--
ALTER TABLE `billing_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_info`
--
ALTER TABLE `party_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_calculator`
--
ALTER TABLE `product_calculator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_master`
--
ALTER TABLE `stock_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billing_header`
--
ALTER TABLE `billing_header`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `party_info`
--
ALTER TABLE `party_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_calculator`
--
ALTER TABLE `product_calculator`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `return_products`
--
ALTER TABLE `return_products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_master`
--
ALTER TABLE `stock_master`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
