-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2016 às 08:14
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idendereco`, `logradouro`, `cidade`, `estado`, `bairro`) VALUES
(1, 'aewasd', 'asdse', 'esawe', 'asewaas'),
(2, 'Teste', 'Tretas', 'asdsaa', 'seinao'),
(3, 'asrase', 'teste', 'teaste', 'teste'),
(4, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `experience`
--

CREATE TABLE `experience` (
  `idexperience` int(11) NOT NULL,
  `companyName` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `period` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idendereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `email`, `lastName`, `firstName`, `password`, `phone`) VALUES
(67, 'pedro@pedro.com', 'Henrique', 'Pedro', '564564321', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academiceducation`
--
ALTER TABLE `academiceducation`
  ADD PRIMARY KEY (`idacademic`),
  ADD KEY `fk_academiceducation_user` (`iduser`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`idexperience`),
  ADD KEY `fk_experience_user1` (`iduser`),
  ADD KEY `fk_experience_endereco` (`idendereco`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academiceducation`
--
ALTER TABLE `academiceducation`
  MODIFY `idacademic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `idexperience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `academiceducation`
--
ALTER TABLE `academiceducation`
  ADD CONSTRAINT `fk_academiceducation_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `fk_experience_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
