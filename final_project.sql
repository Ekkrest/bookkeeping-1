-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-06-08 09:50:42
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `final_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `userdata`
--

CREATE TABLE `userdata` (
  `cID` int(20) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `CostDate` date DEFAULT NULL,
  `CostType` varchar(10) DEFAULT NULL,
  `CostAmount` bigint(20) DEFAULT NULL,
  `CostExtended` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `userdata`
--

INSERT INTO `userdata` (`cID`, `UserName`, `CostDate`, `CostType`, `CostAmount`, `CostExtended`) VALUES
(1, '123', '2021-06-03', '123', 3000, '123');

-- --------------------------------------------------------

--
-- 資料表結構 `userlogin`
--

CREATE TABLE `userlogin` (
  `UserName` varchar(200) NOT NULL,
  `UserPassword` varchar(1000) NOT NULL,
  `UserEmail` varchar(1000) NOT NULL,
  `UserApproved` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `userlogin`
--

INSERT INTO `userlogin` (`UserName`, `UserPassword`, `UserEmail`, `UserApproved`) VALUES
('', '', '', 'N'),
('1', '2', '123@gmail.com', 'N'),
('123456', '123456', 'asdf@yahoo.com.tw', 'N'),
('woyudagg', 'woyudagg', '123@gmail.com', 'N');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`cID`),
  ADD KEY `UserName` (`UserName`);

--
-- 資料表索引 `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`UserName`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `userdata`
--
ALTER TABLE `userdata`
  MODIFY `cID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
