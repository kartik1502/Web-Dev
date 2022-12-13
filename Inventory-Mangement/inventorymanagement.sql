-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 03:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorymanagement`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `display` ()  SELECT * FROM customer$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addemployee`
--

CREATE TABLE `addemployee` (
  `Emp_id` int(11) NOT NULL,
  `Emp_FName` varchar(255) NOT NULL,
  `Emp_LName` varchar(255) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Hire_date` date NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Job_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addemployee`
--

INSERT INTO `addemployee` (`Emp_id`, `Emp_FName`, `Emp_LName`, `Email_id`, `address`, `Hire_date`, `Contact_No`, `Job_id`) VALUES
(91, 'Karthik', 'Kulkarni', 'kartikkulkarni1411@gmail.com', 'Gadag', '2022-01-07', '6361921186', 1),
(92, 'Adam ', 'Sanadi', 'adamsanadi6@gmail.com', 'Belgaum', '2022-01-21', '7899115929', 2),
(93, 'Kotappa', 'Gandudi', 'kygandudi@gmail.com', 'Hubli', '2022-01-13', '9611828660', 3),
(94, 'Jayanth', 'G', 'jayanthgjayanthg123@gmail.com', 'Davangere', '2022-01-20', '9902828014', 2),
(95, 'Vinayak', 'Ugargol', 'vinayakugargol143@gmail.com', 'Hubli', '2022-01-24', '6363761077', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_id` int(100) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Email_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_id`, `FName`, `LName`, `address`, `Contact_No`, `Email_id`) VALUES
(9, 'Kishan', 'Kulkarni', 'Gadag', '956845781', 'kulkarnikishan1502@gmail.com'),
(10, 'Navaya', 'Gowda', 'Banglore', '8457126954', 'navayagowda1547@outlook.com'),
(13, 'Ranjith', 'Alagawadi', 'Hubli', '8451269875', 'ranjithalagawadi4589@yahoo.com'),
(14, 'Naveen', 'Kuratti', 'Hubli', '8457126359', 'naveenkuratti7845@gmail.com'),
(15, 'Sunil', 'Talwar', 'Hubli', '8451269754', 'suniltalwar7841@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `itemsold`
--

CREATE TABLE `itemsold` (
  `Cust_id` int(255) NOT NULL,
  `Prod_id` int(255) NOT NULL,
  `Prod_Name` varchar(255) NOT NULL,
  `Brnd_Name` varchar(255) NOT NULL,
  `Cust_Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `itemsold`
--
DELIMITER $$
CREATE TRIGGER `updateData` BEFORE INSERT ON `itemsold` FOR EACH ROW UPDATE product SET product.Avaliability = product.Avaliability - new.Cust_Quantity
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `Job_id` int(100) NOT NULL,
  `Job_Title` varchar(255) NOT NULL,
  `Salary` int(100) NOT NULL,
  `Manager_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`Job_id`, `Job_Title`, `Salary`, `Manager_id`) VALUES
(1, 'Manager', 100000, NULL),
(2, 'Assistant Manager', 85000, 1),
(3, 'Employee', 50000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(100) NOT NULL,
  `Date_ordered` date NOT NULL,
  `Inv_No` int(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Tot_Price` int(255) NOT NULL,
  `Sup_id` int(11) NOT NULL,
  `Prod_id` int(11) NOT NULL,
  `Emp_id` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `updateTotPrice` BEFORE INSERT ON `orders` FOR EACH ROW set new.Tot_Price = new.Price * new.Quantity
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Prod_id` varchar(255) NOT NULL,
  `Prod_Name` varchar(255) NOT NULL,
  `Date_recv` date NOT NULL,
  `Ser_No` int(100) NOT NULL,
  `Brnd_Name` varchar(100) NOT NULL,
  `Avaliability` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Prod_id`, `Prod_Name`, `Date_recv`, `Ser_No`, `Brnd_Name`, `Avaliability`) VALUES
('BSP457845', 'Body Soap', '2022-01-12', 45784512, 'Dove', 4584),
('FW154879', 'Face Wash', '2022-02-09', 457845123, 'Park Avenu', 248);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Sup_id` int(100) NOT NULL,
  `Sup_Name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Sup_id`, `Sup_Name`, `Location`, `Contact_No`, `Email_id`, `Company`) VALUES
(10, 'Mahesh Hadagli', 'Hubli', '9663717683', 'maheshhadagi@gmail.com', 'Garnier Inc.'),
(11, 'Kishan Kulkarni', 'Gadag', '9108147547', 'kulkarnikishan1502@gmail.com', 'Arya industries'),
(12, 'Girish Kudalappaool', 'Athni', '6364243716', 'girishkuddalappagol@gmail.com', 'Nivea Men'),
(13, 'Ishika Joshi', 'Belguam', '8451259657', 'ishikajoshi1415@gmail.com', 'Vikram supplirs');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Trans_id` int(100) NOT NULL,
  `Ord_id` int(100) NOT NULL,
  `Date_trans` date NOT NULL,
  `Tot_Amt` int(255) NOT NULL,
  `Amount_Paid` int(255) NOT NULL,
  `Rem_Amt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--



--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `UpdateAmt` BEFORE INSERT ON `transaction` FOR EACH ROW SET new.Rem_Amt = new.Tot_Amt - new.Amount_Paid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'Jayanth', 'jayanthg@gmail.com', 'b8b30d8d2c67a3fa4b6dc5a6a0dd817f'),
(4, 'Karthik Kulkarni', 'kartikkulkarni1411@gmail.com', '547383706f188229d330d7de9f9b046b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addemployee`
--
ALTER TABLE `addemployee`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `Job_id` (`Job_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `itemsold`
--
ALTER TABLE `itemsold`
  ADD KEY `Cust_id` (`Cust_id`),
  ADD KEY `Prod_id` (`Prod_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`Job_id`),
  ADD KEY `Manager_id` (`Manager_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Sup_id` (`Sup_id`),
  ADD KEY `Emp_id` (`Emp_id`),
  ADD KEY `Prod_id` (`Prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Prod_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Sup_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Trans_id`,`Ord_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addemployee`
--
ALTER TABLE `addemployee`
  MODIFY `Emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Sup_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Trans_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addemployee`
--
ALTER TABLE `addemployee`
  ADD CONSTRAINT `addemployee_ibfk_1` FOREIGN KEY (`Job_id`) REFERENCES `job` (`Job_id`) ON DELETE CASCADE;

--
-- Constraints for table `itemsold`
--
ALTER TABLE `itemsold`
  ADD CONSTRAINT `itemsold_ibfk_1` FOREIGN KEY (`Cust_id`) REFERENCES `customer` (`Cust_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itemsold_ibfk_2` FOREIGN KEY (`Prod_id`) REFERENCES `product` (`Prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Sup_id`) REFERENCES `supplier` (`Sup_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Emp_id`) REFERENCES `addemployee` (`Emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Prod_id`) REFERENCES `product` (`Prod_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
