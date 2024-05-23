-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Maio-2024 às 23:59
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
-- Estrutura da tabela `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id_portifolio` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image1` varchar(40) DEFAULT NULL,
  `image2` varchar(40) DEFAULT NULL,
  `image3` varchar(40) DEFAULT NULL,
  `image4` varchar(40) DEFAULT NULL,
  `image5` varchar(40) DEFAULT NULL,
  `image6` varchar(40) DEFAULT NULL,
  `image7` varchar(40) DEFAULT NULL,
  `image8` varchar(40) DEFAULT NULL,
  `image9` varchar(40) DEFAULT NULL,
  `image10` varchar(40) DEFAULT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_portifolio`),
  KEY `fk_id_Pf` (`id_Pf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`id_portifolio`, `title`, `description`, `date`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `id_Pf`) VALUES
(8, 'fsdfsdf', 'fdsfsdfsd', '2005-11-12', 'aebe8bd51fec4e38d366201658e7493e.jpg', 'd8b8e4e997760d916028c931dacfc0fc.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'eqwqweqw', 'ja ja aj aj aja ja a', '2006-05-25', '9ca7332fd480840acfc1c2ca4630921b.jpg', 'af2016ba0b4594cf9289e236442bcae6.jpg', 'cacf24640aad762ad7921dc445994f96.jpg', '37ac2e896074631fa3964bf35cb06ee6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 'dsadsa', 'sdaasdas', '2005-11-12', '72abf6750f6397da93225470cd8ebc01.jpg', '1340cf63fdc3092e6478aa36baed2fc3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_id_Pf` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
