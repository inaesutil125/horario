-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2017 at 09:54 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `horarios academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `aulas`
--

CREATE TABLE `aulas` (
  `idAula` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aulas`
--

INSERT INTO `aulas` (`idAula`, `data`, `hora`, `status`) VALUES
(1, '2017-10-27', '07:00:00', 1),
(2, '2017-10-20', '07:30:00', 0),
(3, '2017-10-30', '07:30:00', 1),
(4, '2017-10-31', '07:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diasemana`
--

CREATE TABLE `diasemana` (
  `diaSemana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diasemana`
--

INSERT INTO `diasemana` (`diaSemana`) VALUES
('domingo'),
('segunda'),
('Terça'),
('Quarta'),
('Quinta'),
('Sexta'),
('Sábado');

-- --------------------------------------------------------

--
-- Table structure for table `horarioo`
--

CREATE TABLE `horarioo` (
  `idHorarioo` int(11) NOT NULL,
  `hora1` varchar(12) NOT NULL,
  `hora2` varchar(12) NOT NULL,
  `hora3` varchar(12) NOT NULL,
  `hora4` varchar(12) NOT NULL,
  `hora5` varchar(12) NOT NULL,
  `hora6` varchar(12) NOT NULL,
  `hora7` varchar(12) NOT NULL,
  `hora8` varchar(12) NOT NULL,
  `hora9` varchar(12) NOT NULL,
  `hora10` varchar(12) NOT NULL,
  `hora11` varchar(12) NOT NULL,
  `hora12` varchar(12) NOT NULL,
  `hora13` varchar(12) NOT NULL,
  `hora14` varchar(12) NOT NULL,
  `hora15` varchar(12) NOT NULL,
  `hora16` varchar(12) NOT NULL,
  `hora17` varchar(12) NOT NULL,
  `hora18` varchar(12) NOT NULL,
  `hora19` varchar(12) NOT NULL,
  `hora20` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horarioo`
--

INSERT INTO `horarioo` (`idHorarioo`, `hora1`, `hora2`, `hora3`, `hora4`, `hora5`, `hora6`, `hora7`, `hora8`, `hora9`, `hora10`, `hora11`, `hora12`, `hora13`, `hora14`, `hora15`, `hora16`, `hora17`, `hora18`, `hora19`, `hora20`) VALUES
(134, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível'),
(135, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível'),
(136, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível'),
(137, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível'),
(138, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível'),
(139, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível'),
(140, 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível', 'Disponível');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`idHorario`, `horario`) VALUES
(1, '06:30:00'),
(2, '07:00:00'),
(3, '07:30:00'),
(4, '08:00:00'),
(5, '08:30:00'),
(6, '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `cod_tipo` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`cod_tipo`, `nome`) VALUES
(1, 'Aluno'),
(2, 'Professor'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `dtNasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `tipoUsuario`, `nome`, `sobrenome`, `dtNasc`, `cpf`, `endereco`, `sexo`, `email`, `senha`) VALUES
(1, 3, 'Inaê', 'Sutil Brisola', '1999-07-12', '99388', 'rua flores', '0', 'inae@gmail.com', '123'),
(2, 2, 'Paulo Ricardo', 'de Souza Silva', '0000-00-00', '76687', 'rua flores', '0', 'paulo.silva@ifpr.edu.br', '321'),
(3, 1, 'marcos', 'silva', '0000-00-00', '76687', 'rua flores', '0', 'marcos@gmail.com', '0102'),
(6, 1, 'joao', 'oliveira', '1995-12-10', '99388', 'rua flores', '0', 'joaozinho@gmail.com', '2020'),
(7, 1, 'lucas', 'batista', '1990-01-01', '987654', 'rua venezaa', '0', 'lucas@gmail.com', '5555'),
(13, 2, 'Alisson Rodrigo', 'Santos Prestes', '1986-08-19', '321.456.789-10', 'Rua fos Fofinhos', 'M', 'alisson.prestes@ifpr.edu.br', '321'),
(14, 1, 'maria luiza', 'banks', '1999-09-13', '000.123.456.23', 'rua das florzinhas', 'F', 'marialuizabanks@gmail.com', '1010'),
(15, 1, 'juliano', 'rodrigues', '1996-05-13', '000.508.138-52', 'rua italia', 'M', 'juliano@gmail.com', 'juliano'),
(16, 1, 'gabriel', 'silva oliveira', '1995-01-12', '145.987.654-28', 'rua das coxinhas', 'M', 'gabriel@gmail.com', 'gabriel'),
(17, 1, 'gabriela', 'souza', '1992-03-03', '321.456.789-15', 'rua das carnes', 'F', 'gabsouza@gmail.com', '321'),
(18, 1, 'Beatriz', 'costa', '1999-08-24', '123.456.987-85', 'rua prost', 'F', 'beatrizcf@gmail.com', 'beatriz'),
(19, 1, 'maria ', 'eduarda', '1998-05-13', '000.508.138-68', 'rua jasmim', 'F', 'madu@gmail.com', 'madu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`idAula`);

--
-- Indexes for table `horarioo`
--
ALTER TABLE `horarioo`
  ADD PRIMARY KEY (`idHorarioo`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `idAula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `horarioo`
--
ALTER TABLE `horarioo`
  MODIFY `idHorarioo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
