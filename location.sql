-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2016 às 23:21
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

--
-- Extraindo dados da tabela `academiceducation`
--

INSERT INTO `academiceducation` (`idacademic`, `activitiesGroups`, `description`, `formation`, `institution`, `note`, `period`, `studyArea`, `iduser`) VALUES
(2, 'asdadsasd', 'aseqwe', '0000-00-00', 'qweasd', 'asdasdas', '2016-06-08', 'asfasfas', 49),
(3, 'qweasd', 'aseqwew', '0000-00-00', 'asqweqwe', 'qweasd', '2016-06-14', 'qweasds', 49);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `logradouro` text NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idendereco`, `logradouro`, `cidade`, `estado`, `bairro`) VALUES
(1, 'aewasd', 'asdse', 'esawe', 'asewaas');

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

--
-- Extraindo dados da tabela `experience`
--

INSERT INTO `experience` (`idexperience`, `companyName`, `description`, `period`, `title`, `iduser`, `idendereco`) VALUES
(4, 'tqweased', 'qwease', '2016-06-01', 'qwease', 49, 1),
(5, 'asdasqwe', 'qweasd', '2016-06-14', 'asdqwe', 53, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `email`, `lastName`, `firstName`, `password`) VALUES
(49, 'aweqa@aaewa.com', 'teaseq', 'teste', 'ase1q12'),
(50, 'teste@tesate.com', 'testamos', 'teste', 'q213asd'),
(51, 'pedrotas@teae.com', 'teasre', 'teste', 'asd123'),
(52, 'apoek@qwe.com', 'qweopqdas', 'teae', '123ase'),
(53, 'aweop@awe.com', 'qweas', 'teawe', '123ase'),
(55, 'qw3e@23.com', '123', '123ase', '123'),
(56, 'qweas@awe.com', 'asd', 'twqwasd', 'asd123as'),
(57, 'asd123@ase.com', 'asdqw312', 'asd213', '123asd'),
(58, 'asd213@as3.com', 'asd123', 'safafsa', '123as'),
(59, 'asd213@as3.com', 'asd123', 'safafsa1', 'as213'),
(60, 'qweas@ase.com', 'qweas', 'teaste', '123asd'),
(61, 'pedro@pedro.com', 'pedro', 'pedro', 'abc123');

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
  MODIFY `idacademic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `idexperience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
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
