-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `scysx1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `username` text NOT NULL,
  `realrname` text NOT NULL,
  `passportid` text NOT NULL,
  `telephonenumber` text NOT NULL,
  `region` text NOT NULL,
  `emailaddress` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `realrname`, `passportid`, `telephonenumber`, `region`, `emailaddress`, `password`) VALUES
('China_1', 'China First', 'E11111111', '15312345678', 'China', 'china1@nottingham.edu.cn', 'china111111'),
('China_2', 'China Second', 'E22222222', '18512345678', 'China', 'china2@nottingham.edu.cn', 'china222222'),
('Japan_1', 'Japan First', 'G11111111', '09011111111', 'Japan', 'japan1@nottingham.edu.cn', 'japan111111'),
('Japan_2', 'Japan Second', 'G22222222', '09022222222', 'Japan', 'japan2@nottingham.edu.cn', 'japan222222'),
('UK_1', 'Uk First', 'P11111111', '071111111111', 'UK', 'uk1@nottingham.edu.cn', 'uk111111'),
('UK_2', 'Uk Second', 'P22222222', '072222222222', 'UK', 'uk2@nottingham.edu.cn', 'uk222222');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `password`) VALUES
('Heng', 'heng111111');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` text NOT NULL,
  `N95` int(11) NOT NULL,
  `surgical` int(11) NOT NULL,
  `surgical_N95` int(11) NOT NULL,
  `sales_rep` text NOT NULL,
  `customer` text NOT NULL,
  `time` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_abnormal`
--

DROP TABLE IF EXISTS `order_abnormal`;

CREATE TABLE `order_abnormal` (
  `id` text NOT NULL,
  `N95` int(11) NOT NULL,
  `surgical` int(11) NOT NULL,
  `surgical_N95` int(11) NOT NULL,
  `sales_rep` text NOT NULL,
  `customer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_canceled`
--

DROP TABLE IF EXISTS `order_canceled`;

CREATE TABLE `order_canceled` (
  `id` text NOT NULL,
  `N95` int(11) NOT NULL,
  `surgical` int(11) NOT NULL,
  `surgical_N95` int(11) NOT NULL,
  `sales_rep` text NOT NULL,
  `customer` text NOT NULL,
  `time` datetime NOT NULL,
  `cancellation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quota`
--

DROP TABLE IF EXISTS `quota`;

CREATE TABLE `quota` (
  `id` text NOT NULL,
  `sales_rep` text NOT NULL,
  `quota_N95` int(11) NOT NULL,
  `quota_surgical` int(11) NOT NULL,
  `quota_surgical_N95` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_rep`
--

DROP TABLE IF EXISTS `sales_rep`;

CREATE TABLE `sales_rep` (
  `username` text NOT NULL,
  `realname` text NOT NULL,
  `employeeid` text NOT NULL,
  `telephonenumber` text NOT NULL,
  `region` text NOT NULL,
  `emailaddress` text NOT NULL,
  `password` text NOT NULL,
  `quota_N95` int(11) NOT NULL,
  `quota_surgical` int(11) NOT NULL,
  `quota_surgical_N95` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_rep`
--

INSERT INTO `sales_rep` (`username`, `realname`, `employeeid`, `telephonenumber`, `region`, `emailaddress`, `password`, `quota_N95`, `quota_surgical`, `quota_surgical_N95`) VALUES
('China_rep1', 'China Rep First', 'C11111111', '15311111111', 'China', 'china1@nottingham.edu.cn', 'china111111', 0, 0, 0),
('China_rep2', 'China Rep Second', 'C22222222', '15322222222', 'China', 'china2@nottingham.edu.cn', 'china222222', 0, 0, 0),
('Japan_rep1', 'Japan Rep First', 'J11111111', '07011111111', 'Japan', 'japan1@nottingham.edu.cn', 'japan111111', 0, 0, 0),
('Japan_rep2', 'Japan Rep Second', 'J22222222', '07022222222', 'Japan', 'japan2@nottingham.edu.cn', 'japan222222', 0, 0, 0),
('UK_rep1', 'Uk Rep First', 'U11111111', '090111111111', 'UK', 'uk1@nottingham.edu.cn', 'uk111111', 0, 0, 0),
('UK_rep2', 'Uk Rep Second', 'U22222222', '090222222222', 'UK', 'uk2@nottingham.edu.cn', 'uk222222', 0, 0, 0);
