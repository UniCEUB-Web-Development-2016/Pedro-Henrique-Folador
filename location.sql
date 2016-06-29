-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2016 às 19:42
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
(5, 'aseae', 'asease', '0000-00-00', 'aseasesa', 'asease', '2016-06-08', 'aseasea', 67),
(6, 'aseaesaesa', 'aseasease', '0000-00-00', 'aseaseaeas', 'aseasease', '2016-06-09', 'aseasease', 68),
(7, 'easeaseae', 'aseaseaseas', '0000-00-00', 'aseaseas', 'asesaeaseas', '2016-06-01', 'saeasease', 67),
(9, 'eqeqeq', 'ewqeqeqe', '0000-00-00', 'awease', 'qewqewqewq', '2016-06-10', 'eqweqwewqe', 67),
(10, 'eqeqeq', 'ewqeqeqe', '0000-00-00', 'awease', 'qewqewqewq', '2016-06-10', 'eqweqwewqe', 67);

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
(5, 'loll', 'jajaja', 'lalala', 'Naosei'),
(6, 'loll', 'jajaja', 'lalala', 'Naosei'),
(7, 'loll', 'jajaja', 'lalala', 'Naosei'),
(8, 'loll', 'jajaja', 'lalala', 'Naosei'),
(9, 'loll', 'jajaja', 'lalala', 'Naosei'),
(10, 'lollase', 'jajajaasease', 'lalalasaese', 'Naoseiasease'),
(11, 'aseasesa', 'aseaseas', 'aseasea', 'aseasease'),
(14, 'aseaee', 'aseasea', 'asesaesae', 'aseaeae'),
(15, 'aseasea', 'aseasesa', 'asease', 'asease'),
(95, 'asease', 'asease', 'asease', 'aseas'),
(96, 'TESTEEEE123', 'aeaesaeae', 'aeeasea', 'easesaesae');

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
(1, 'Teste', 'testes', '2016-03-03', 'vamosver', 67, 1),
(2, 'Teste2', 'tretas', '2016-03-03', 'vamosver', 68, 2),
(8, 'Teste1', 'Teste3', '2016-06-09', 'Teste2', 67, 9),
(9, 'Teste3awea', 'Teste3', '2016-06-09', 'Teste2asease', 67, 10),
(10, 'aweae', 'asease', '2016-06-16', 'asease', 67, 11),
(13, 'aseaseaease', 'aseeeas', '2016-06-14', 'saease', 68, 14),
(14, 'taeasease', 'asease', '2016-06-09', 'asesaea', 67, 15),
(94, 'tease', 'asease', '2016-06-14', 'asease', 67, 95),
(95, 'aeaeaseaseas', 'aseaseaseaseas', '2016-06-02', 'easeasease', 67, 96);

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
(67, 'pedro@pedro.com', 'Henrique3', 'Pedro22233', 'abc123', '654'),
(68, 'teste@teste.com', 'teste', 'teste', '123456', 'teste4'),
(70, 'testando@tetando.com', 'Testando123', 'Testando', 'abc123', '564654'),
(71, 'aseas@asesa.com', 'aseasesa', 'aseasease', 'abc123', '4564654'),
(72, 'aseas@asesa.com', 'aseasesa', 'aseasease', 'teas', '4564654'),
(73, 'asease@aseaes.com', 'asesae', 'asesaesa', '123', '465456'),
(75, '', '', '', '', '');

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
  ADD KEY `fk_experience_endereco` (`idendereco`);

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
  MODIFY `idacademic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `idexperience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
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
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_experience_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
