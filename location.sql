-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2016 às 03:15
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `location`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `academiceducation`
--

CREATE TABLE `academiceducation` (
  `idacademic` int(11) NOT NULL,
  `activitiesGroups` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  `formation` date NOT NULL,
  `institution` varchar(200) NOT NULL,
  `note` varchar(50) NOT NULL,
  `period` date NOT NULL,
  `studyArea` varchar(100) NOT NULL,
  `cod_academic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `experience`
--

CREATE TABLE `experience` (
  `idexperience` int(11) NOT NULL,
  `companyName` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `period` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `cod_experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `map`
--

CREATE TABLE `map` (
  `idmap` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cod_map` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academiceducation`
--
ALTER TABLE `academiceducation`
  ADD PRIMARY KEY (`idacademic`),
  ADD KEY `fk_academiceducation_user` (`cod_academic`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`idexperience`),
  ADD KEY `fk_experience_user1` (`cod_experience`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`idmap`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_user_map1` (`cod_map`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academiceducation`
--
ALTER TABLE `academiceducation`
  MODIFY `idacademic` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `idexperience` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `idmap` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `academiceducation`
--
ALTER TABLE `academiceducation`
  ADD CONSTRAINT `fk_academiceducation_user` FOREIGN KEY (`cod_academic`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk_experience_user1` FOREIGN KEY (`cod_experience`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_map1` FOREIGN KEY (`cod_map`) REFERENCES `map` (`idmap`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
