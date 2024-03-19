-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 juil. 2023 à 06:48
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ahamar`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `IdDep` int(11) NOT NULL,
  `DepartmentName` varchar(50) DEFAULT NULL,
  `DepartmentShortName` varchar(50) DEFAULT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbldepartments`
--

INSERT INTO `tbldepartments` (`IdDep`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'La Direction Administrative et Financière ', 'DAF', 'DAF123', '2023-06-30 19:28:44'),
(2, 'Direction Technique de l’hydraulique', 'DTH', 'DTH1234', '2023-06-30 19:29:12');

-- --------------------------------------------------------

--
-- Structure de la table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `IdEmp` int(11) NOT NULL,
  `EmpId` varchar(50) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Department` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phonenumber` char(11) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblemployees`
--

INSERT INTO `tblemployees` (`IdEmp`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Department`, `Address`, `Phonenumber`, `Status`, `RegDate`, `Role`) VALUES
(1, 'EMP10806121', 'Anuj', 'kumar', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Male', '1', 'New Delhi', '9857555555', 1, '2021-04-01 11:29:59', 1),
(2, 'DEMP2132', 'Amit', 'kumar', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Other', '1', 'Gitwa', '858794425', 1, '2021-03-10 13:40:02', 0),
(14, 'EL123', 'ngendakuriyo', 'leonce', 'leonce@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '1', 'bwiza', '6756543329', 1, '2023-06-25 16:01:16', 1),
(15, 'ER767', 'kind', 'pro', 'kind@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '3', 'gitwa', '6941436 3', 1, '2023-06-27 10:53:05', 0),
(16, 'EMP1234', 'keza', 'Jeanne', 'keza@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '2', 'buha', ' 67889', 1, '2023-06-30 06:07:43', 0),
(17, 'EM789', 'Nahigombeye', 'jeammarie', 'nahigombeye@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '1', 'Kayogoro', '7865432', 1, '2023-06-30 16:52:30', 0),
(18, 'EM890', 'gaciyubwengee', 'jovise', 'gaci@gmail.com', '202cb962ac59075b964b07152d234b70', 'Other', '3', 'mabandae', '56789054', 1, '2023-06-30 16:59:24', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `IdLeave` int(11) NOT NULL,
  `LeaveType` varchar(50) DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `DayNumber` int(11) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(50) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `IsRead` int(1) DEFAULT NULL,
  `empid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblleaves`
--

INSERT INTO `tblleaves` (`IdLeave`, `LeaveType`, `ToDate`, `FromDate`, `DayNumber`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`) VALUES
(3, 'Annuel', '2023-07-14', '2023-07-07', 7, 'malade d;un mama', '2023-07-07 20:58:53', 'no', '2023-07-07 22:59:28 ', 2, 1, 16),
(4, 'Annuel', '2023-07-15', '2023-07-14', 1, 'kl', '2023-07-07 21:30:42', 'no', '2023-07-07 23:32:19 ', 2, 1, 17),
(11, 'Naissance', '2023-07-18', '2023-07-14', 4, 'mariage de mon grand frere', '2023-07-08 06:37:02', 'yes', '2023-07-08 8:53:16 ', 1, 1, 16),
(12, 'Annuel', '2023-07-13', '2023-07-08', 5, 'maladie', '2023-07-08 06:42:45', 'ok', '2023-07-08 12:34:27 ', 1, 1, 16),
(13, 'Annuel', '2023-07-15', '2023-07-08', 7, 'malade', '2023-07-08 18:36:19', 'no', '2023-07-08 20:38:23 ', 2, 1, 15),
(14, 'Mariage', '2023-07-12', '2023-07-08', 4, 'malade', '2023-07-08 18:37:05', 'no', '2023-07-09 11:47:12 ', 2, 1, 15),
(16, 'Mariage', '2023-07-23', '2023-07-20', 3, 'mariage', '2023-07-11 06:13:15', 'yes', '2023-07-11 8:16:46 ', 1, 1, 16),
(17, 'Annuel', '2023-07-21', '2023-07-11', 10, 'malade', '2023-07-11 06:13:54', NULL, NULL, 0, 1, 16),
(18, 'Annuel', '2023-07-20', '2023-07-11', 9, 'nn', '2023-07-11 10:19:59', NULL, NULL, 0, 1, 16),
(19, 'Mariage', '2023-07-12', '2023-07-11', 1, 'jj', '2023-07-11 10:21:11', 'yes', '2023-07-11 12:26:09 ', 1, 1, 16);

-- --------------------------------------------------------

--
-- Structure de la table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `IdT` int(11) NOT NULL,
  `LeaveType` varchar(50) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblleavetype`
--

INSERT INTO `tblleavetype` (`IdT`, `LeaveType`, `Description`, `CreationDate`) VALUES
(2, 'Congé de Maladie', 'Cas de Malade', '2021-04-06 13:16:09'),
(3, 'Congé Annuel', 'Congé obligatoire', '2021-04-06 13:16:38'),
(5, 'Congé Exceptionnel', 'Congé simple', '2023-06-30 05:57:44');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`IdDep`);

--
-- Index pour la table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`IdEmp`);

--
-- Index pour la table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`IdLeave`),
  ADD KEY `UserEmail` (`empid`);

--
-- Index pour la table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`IdT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `IdDep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `IdEmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `IdLeave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `IdT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
