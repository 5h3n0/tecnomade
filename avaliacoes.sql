-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Maio-2024 às 00:00
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `tecnomadedb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `estrelas` int(11) NOT NULL,
  `data_avaliacao` date NOT NULL,
  `id_Pf` int(11) NOT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `fk_id_Pf_avaliacao` (`id_Pf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `estrelas`, `data_avaliacao`, `id_Pf`) VALUES
(1, 5, '0000-00-00', 1),
(2, 5, '0000-00-00', 1),
(3, 5, '0000-00-00', 1),
(4, 5, '0000-00-00', 1),
(5, 5, '0000-00-00', 1),
(6, 5, '0000-00-00', 1),
(7, 5, '0000-00-00', 1),
(8, 5, '0000-00-00', 1),
(9, 5, '0000-00-00', 1),
(10, 5, '0000-00-00', 1),
(11, 5, '0000-00-00', 1),
(12, 5, '0000-00-00', 1),
(13, 5, '0000-00-00', 1),
(14, 5, '0000-00-00', 1),
(15, 2, '0000-00-00', 1),
(16, 4, '0000-00-00', 1),
(17, 5, '0000-00-00', 1),
(18, 5, '0000-00-00', 1),
(19, 1, '0000-00-00', 1),
(20, 1, '0000-00-00', 1),
(21, 1, '0000-00-00', 1),
(22, 1, '0000-00-00', 1),
(23, 1, '0000-00-00', 1),
(24, 1, '0000-00-00', 1),
(25, 3, '0000-00-00', 1),
(26, 5, '0000-00-00', 1),
(27, 5, '0000-00-00', 1),
(28, 5, '0000-00-00', 1),
(29, 5, '0000-00-00', 1),
(30, 5, '0000-00-00', 1),
(31, 3, '0000-00-00', 1),
(32, 3, '0000-00-00', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_Pf_avaliacao` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
