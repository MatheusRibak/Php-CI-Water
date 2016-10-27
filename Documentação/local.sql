-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2016 às 03:34
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `cd_local` int(11) NOT NULL,
  `nome_nascente` varchar(120) DEFAULT NULL,
  `descricao_nascente` varchar(120) DEFAULT NULL,
  `criador_nascente` varchar(120) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `data_local` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`cd_local`, `nome_nascente`, `descricao_nascente`, `criador_nascente`, `latitude`, `longitude`, `data_local`) VALUES
(4, 'teste', 'teste descrição', '', 37.429, -122.1419, '0000-00-00'),
(40, 'gambiarra', '', '', 37.329, -122.1419, '0000-00-00'),
(41, 'fafa', 'Teste eu sou brrrrrrr', '1', 37.329, -122.1419, NULL),
(42, 'fafa', 'Teste eu sou brrrrrrr', '1', 37.329, -122.1419, NULL),
(43, 'Auxiliar Administrativo', 'tes', '1', 35.329, -121.1419, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Matheus', 'matheusribak@hotmail.com', 'e4da3b7fbbce2345d7772b0674a318d5'),
(2, 'teste', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`cd_local`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `cd_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
