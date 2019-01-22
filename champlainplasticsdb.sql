-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2019 at 04:44 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `champlainplasticsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `Cart_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Cart_Total_Cost` decimal(20,0) NOT NULL,
  PRIMARY KEY (`Cart_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `User_ID`, `Cart_Total_Cost`) VALUES
(1, 1, '5000'),
(2, 3, '75000'),
(3, 7, '2500'),
(4, 10, '600'),
(5, 15, '2450');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
CREATE TABLE IF NOT EXISTS `cart_item` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cart_ID` int(11) NOT NULL,
  `Item_Qty` int(11) NOT NULL,
  PRIMARY KEY (`Item_ID`),
  KEY `Cart_ID` (`Cart_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`Item_ID`, `Cart_ID`, `Item_Qty`) VALUES
(1, 1, 5),
(2, 5, 20),
(5, 3, 15),
(4, 4, 5),
(3, 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category` varchar(11) NOT NULL,
  `Parent_Category` varchar(11) DEFAULT NULL,
  `Availability` varchar(2) NOT NULL DEFAULT 'OP',
  `EnglishCat` varchar(50) NOT NULL,
  `FrenchCat` varchar(50) NOT NULL,
  `Image` blob,
  `Alt_Text` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Category`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category`, `Parent_Category`, `Availability`, `EnglishCat`, `FrenchCat`, `Image`, `Alt_Text`) VALUES
('1', NULL, 'OP', 'New Products', 'Nouveaux Produits', NULL, 'New Poducts'),
('2', NULL, 'OP', 'Maintenance', 'Entretien', NULL, 'Maintenance'),
('3', NULL, 'OP', 'Vacuum Hoses', 'Boyau d\'aspirateur', NULL, 'Vacuum Hoses'),
('4', NULL, 'OP', 'Accessories', 'Accessoires', NULL, 'Accessories'),
('5', NULL, 'OP', 'Backwash Hoses', 'Boyau de vidange', NULL, 'Backwash Hoses'),
('6', NULL, 'OP', 'Skimmers & Drains', 'Écumoires & drain de fond', NULL, 'Skimmers & Drains'),
('7', NULL, 'OP', 'Plumbing', 'Plomberie', NULL, 'Plumbing'),
('8', NULL, 'OP', 'Ladders & Steps', 'Échelles & marches', NULL, 'Ladders & Steps'),
('9', NULL, 'OP', 'Lights', 'Lumières', NULL, 'Lights'),
('10', NULL, 'OP', 'Cover Reels & Solar Rollers', 'Bobines & Rouleaux', NULL, 'Cover Reels & Solar Rollers'),
('11', NULL, 'OP', 'Games, Chairs & More', 'Jeu, Chaises & Plus', NULL, 'Games, Chairs & More'),
('1sc', '1', 'OP', 'Automatic Vaccum Cleaner', 'Aspirateur automatique', NULL, NULL),
('2sc', '1', 'OP', 'Spa Step', 'Marches Spa', NULL, NULL),
('3sc', '1', 'OP', 'Hose Holder', 'Porte-boyaux', NULL, NULL),
('4sc', '1', 'OP', 'Lubricant - Sealant', 'Lubrifiant - scellant', NULL, NULL),
('5sc', '1', 'OP', 'Solar Shower', 'Douche solaires', NULL, NULL),
('6sc', '1', 'OP', '2\" PVC Backwash Hose', 'Boyau de vidange PVC - 51 mm', NULL, NULL),
('7sc', '1', 'OP', '1-1/2\" EVA Vacuum Hose', 'Boyau d\'aspirateur EVA - 38 mm', NULL, NULL),
('8sc', '1', 'OP', 'Lights', 'Lumières', NULL, NULL),
('9sc', '1', 'OP', 'Body/kick boards', 'Planches', NULL, NULL),
('10sc', '1', 'OP', 'Water Heaters', 'Chauffe eau', NULL, NULL),
('11sc', '1', 'OP', 'Cover Reels', 'Bobines de couverture', NULL, NULL),
('12sc', '2', 'OP', 'Cleaners', 'Nettoyeurs', NULL, NULL),
('13sc', '2', 'OP', 'Pro Series Plus', 'Pro Series Plus', NULL, NULL),
('14sc', '2', 'OP', 'Platinum Line', 'Ligne Platinum', NULL, NULL),
('15sc', '2', 'OP', 'Golden Line', 'La ligne or', NULL, NULL),
('16sc', '2', 'OP', 'Telescopic Poles', 'Manches télescopiques', NULL, NULL),
('17sc', '2', 'OP', 'Brushes', 'Brosses', NULL, NULL),
('18sc', '2', 'OP', 'Leaf Skimmers', 'Ramasse-feuilles', NULL, NULL),
('19sc', '2', 'OP', 'Vacuum Heads', 'Têtes d’aspirateur', NULL, NULL),
('20sc', '4', 'OP', 'Hose Holder', 'Porte-boyaux', NULL, NULL),
('21sc', '4', 'OP', 'Chlorine Dispensers', 'Diffuseurs de chlore', NULL, NULL),
('22sc', '4', 'OP', 'Automatic in-line chlorinator', 'Chlorinateur automatique', NULL, NULL),
('23sc', '4', 'OP', 'Thermometers', 'Thermomètres', NULL, NULL),
('24sc', '4', 'OP', 'Test Kits', 'Trousses d\'analyse', NULL, NULL),
('25sc', '4', 'OP', 'Test Strips', 'Languette d\'analyse', NULL, NULL),
('26sc', '4', 'OP', 'Accessories', 'Accessoires', NULL, NULL),
('27sc', '4', 'OP', 'Lubricant - Sealant', 'Lubrifiant- scellant', NULL, NULL),
('28sc', '4', 'OP', 'Inground Pool Accessories', 'Accessoires piscine creusée', NULL, NULL),
('29sc', '6', 'OP', 'Wall Skimmers', 'Écumoires murales', NULL, NULL),
('30sc', '6', 'OP', 'Main Drains', 'Drain de Fond', NULL, NULL),
('31sc', '10', 'OP', 'Cover Reels', 'Bobines de couverture ', NULL, NULL),
('32sc', '10', 'OP', 'Solar Rollers', 'Rouleaux solaires', NULL, NULL),
('33sc', '11', 'OP', 'Wintering ', 'Hivernage', NULL, NULL),
('34sc', '11', 'OP', 'Submersible Pump', 'Pompe submersible', NULL, NULL),
('35sc', '11', 'OP', 'Programmable Timer', 'Minuterie programmable', NULL, NULL),
('36sc', '11', 'OP', 'Solar Showers/ Foot Bath', 'Douches solaires/ Bain de pied', NULL, NULL),
('37sc', '11', 'OP', 'Pool Carpet', 'Tapis de piscine', NULL, NULL),
('38sc', '11', 'OP', 'Chairs ', 'Chaises', NULL, NULL),
('39sc', '11', 'OP', 'Floating Fountains', 'Fontaines flottantes', NULL, NULL),
('40sc', '11', 'OP', 'Heaters', 'Chauffe-eau', NULL, NULL),
('41sc', '11', 'OP', 'Games', 'Jeux', NULL, NULL),
('42sc', NULL, 'P', 'ACM-42 Ladder', 'ACM-42 Ladder', NULL, NULL),
('43sc', NULL, 'P', 'ACM-224 Ladder', 'ACM-224 Ladder', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `changes`
--

DROP TABLE IF EXISTS `changes`;
CREATE TABLE IF NOT EXISTS `changes` (
  `Changes_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Item_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Change_Info` varchar(255) NOT NULL,
  `Change_Date` date NOT NULL,
  PRIMARY KEY (`Changes_ID`),
  KEY `Item_ID` (`Item_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changes`
--

INSERT INTO `changes` (`Changes_ID`, `Item_ID`, `User_ID`, `Change_Info`, `Change_Date`) VALUES
(10, 2, 1, 'Changed price of item 5 from 6.00 to 5.00', '2018-11-30'),
(20, 4, 2, 'Changed price of item 10 from 8.00 to 7.00', '2018-11-30'),
(30, 6, 2, 'Changed price of item 7 from 300.00 to 250.00', '2018-11-30'),
(40, 8, 3, 'Changed price of item 2 from 250.00 to 20.00', '2018-11-30'),
(50, 10, 3, 'Changed price of item 6 from 175.00 to 150.00', '2018-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `dealsdiscount`
--

DROP TABLE IF EXISTS `dealsdiscount`;
CREATE TABLE IF NOT EXISTS `dealsdiscount` (
  `Deals_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Item_ID` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  PRIMARY KEY (`Deals_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealsdiscount`
--

INSERT INTO `dealsdiscount` (`Deals_ID`, `Item_ID`, `Discount`) VALUES
(1, 1, 20),
(2, 3, 15),
(3, 5, 10),
(4, 10, 50),
(5, 13, 40);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `Item_No` varchar(50) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `SubCategory` varchar(11) NOT NULL,
  `Availability` varchar(2) NOT NULL DEFAULT 'OP',
  `New` tinyint(1) NOT NULL,
  `Colors` varchar(50) DEFAULT NULL,
  `Title_English` varchar(250) NOT NULL,
  `Description_English` varchar(250) DEFAULT NULL,
  `Title_French` varchar(250) NOT NULL,
  `Description_French` varchar(250) DEFAULT NULL,
  `Country_Of_Origin` varchar(50) DEFAULT NULL,
  `Spare_Parts` varchar(10) DEFAULT NULL,
  `Large_Image` blob,
  `Large_Image_Text` varchar(50) DEFAULT NULL,
  `Small_Image` blob,
  `Small_Image_Text` varchar(50) DEFAULT NULL,
  `Instructions` varchar(250) DEFAULT NULL,
  `Price` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`Item_No`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Cart_ID` int(11) NOT NULL,
  `Total_Cost` decimal(20,0) NOT NULL,
  `Transaction_Date` date NOT NULL,
  PRIMARY KEY (`Transaction_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Cart_ID` (`Cart_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_ID`, `User_ID`, `Cart_ID`, `Total_Cost`, `Transaction_Date`) VALUES
(1, 1, 1, '5000', '2018-11-30'),
(2, 3, 2, '75000', '2018-11-30'),
(3, 7, 3, '2500', '2018-11-30'),
(4, 10, 4, '600', '2018-11-30'),
(5, 15, 5, '2450', '2018-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Email` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `User_Fname` varchar(255) NOT NULL,
  `User_Lname` varchar(255) NOT NULL,
  `User_Type` varchar(255) NOT NULL,
  `Date_Added` date NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Email`, `User_Password`, `Username`, `User_Fname`, `User_Lname`, `User_Type`, `Date_Added`) VALUES
(1, 'person1@gmail.com', 'dingleberry', 'admin', 'thing1', 'Last1', 'Admin', '2018-11-30'),
(2, 'person2@gmail.com', 'blueberry', 'modAlpha', 'thing2', 'Last2', 'Moderator', '2018-11-30'),
(3, 'person3@gmail.com', 'strawberry', 'modGamma', 'thing3', 'Last3', 'Moderator', '2018-11-30'),
(4, 'person4@gmail.com', 'blackberry', 'steve', 'thing4', 'Last4', 'Customer', '2018-11-30'),
(5, 'person5@gmail.com', 'raspberry', 'john', 'thing5', 'Last5', 'Customer', '2018-11-30'),
(6, 'person6@gmail.com', 'gojiberry', 'pete', 'thing6', 'Last6', 'Customer', '2018-11-30'),
(7, 'person7@gmail.com', 'acaiberry', 'MohiLove', 'thing7', 'Last7', 'Customer', '2018-11-30'),
(8, 'person8@gmail.com', 'bilberry', 'LoveLove', 'thing8', 'Last8', 'Customer', '2018-11-30'),
(9, 'person9@gmail.com', 'craneberry', 'powerpuff', 'thing9', 'Last9', 'Customer', '2018-11-30'),
(10, 'person10@gmail.com', 'bearberry', 'jerrysmith', 'thing10', 'Last10', 'Customer', '2018-11-30'),
(11, 'person11@gmail.com', 'barberry', 'iloverickandmorty', 'thing11', 'Last11', 'Customer', '2018-11-30'),
(12, 'person12@gmail.com', 'boysenberry', 'powpow', 'thing12', 'Last12', 'Customer', '2018-11-30'),
(13, 'person13@gmail.com', 'buffaloberry', 'bigdab', 'thing13', 'Last13', 'Customer', '2018-11-30'),
(14, 'person14@gmail.com', 'bunchberry', 'munchkin', 'thing14', 'Last14', 'Customer', '2018-11-30'),
(15, 'person15@gmail.com', 'cloudberry', 'thelegend27', 'thing15', 'Last15', 'Customer', '2018-11-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
