SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE tecnomadedb;

USE tecnomadedb;
CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `categorias` (
  `id_Cat` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `cat_sel` (
  `id_Cat_Sel` int(11) NOT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `id_Cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `contratacoes` (
  `id_Contratacao` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `valor` decimal(9,2) NOT NULL,
  `descricao` text NOT NULL,
  `id_Pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `enderecos` (
  `id_Endereco` int(11) NOT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `id_Usr` int(11) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `num` varchar(10) NOT NULL,
  `comp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `prof` (
  `id_Pf` int(11) NOT NULL,
  `pfName` varchar(100) NOT NULL,
  `dtNasPf` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `celPf` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `hashPass` varchar(255) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `imgData` longblob NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `categorias` varchar(20) DEFAULT NULL,
  `descPf` text NOT NULL,
  `avaliacao_media` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `services` (
  `id_Service` int(11) NOT NULL,
  `nomeService` varchar(60) NOT NULL,
  `descService` longtext NOT NULL,
  `vlrHora` decimal(9,2) NOT NULL,
  `vlrService` decimal(9,2) NOT NULL,
  `tempoEstimado` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id_Usr` int(11) NOT NULL,
  `usrName` varchar(100) NOT NULL,
  `dtNasUsr` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `imgData` longblob NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `celUsr` varchar(20) NOT NULL,
  `hashPass` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categorias` (`id_Cat`, `nome`) VALUES
(1, 'Manutenção de Desktop/Notebook'),
(2, 'Infraestrutura de rede'),
(3, 'Manutenção de rede sem fio'),
(4, 'Desenvolvimento Web'),
(5, 'Desenvolvimento de Games'),
(6, 'Desenvolvimento de Sistemas'),
(7, 'Manutenção de Servidores'),
(8, 'Instalação de Câmeras/Alarmes'),
(9, 'Power BI'),
(10, 'UI/UX Design'),
(11, 'Aplicações para dispositivos Móveis'),
(12, 'Cloud Computing');

ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Pf` (`id_Pf`);

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_Cat`);

ALTER TABLE `cat_sel`
  ADD PRIMARY KEY (`id_Cat_Sel`),
  ADD KEY `id_Pf` (`id_Pf`),
  ADD KEY `id_Cat` (`id_Cat`);

ALTER TABLE `contratacoes`
  ADD PRIMARY KEY (`id_Contratacao`),
  ADD KEY `fk_contratacoes_users` (`id_Usr`),
  ADD KEY `fk_contratacoes_services` (`id_Service`),
  ADD KEY `fk_contratacoes_prof` (`id_Pf`);

ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_Endereco`),
  ADD UNIQUE KEY `id_Pf` (`id_Pf`),
  ADD UNIQUE KEY `id_Usr` (`id_Usr`);

ALTER TABLE `prof`
  ADD PRIMARY KEY (`id_Pf`);

ALTER TABLE `services`
  ADD PRIMARY KEY (`id_Service`),
  ADD KEY `fk_services_prof` (`id_Pf`),
  ADD KEY `fk_services_categoria` (`id_Cat`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id_Usr`);


ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categorias`
  MODIFY `id_Cat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cat_sel`
  MODIFY `id_Cat_Sel` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `contratacoes`
  MODIFY `id_Contratacao` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `enderecos`
  MODIFY `id_Endereco` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `prof`
  MODIFY `id_Pf` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `services`
  MODIFY `id_Service` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id_Usr` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

ALTER TABLE `cat_sel`
  ADD CONSTRAINT `cat_sel_ibfk_1` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `cat_sel_ibfk_2` FOREIGN KEY (`id_Cat`) REFERENCES `categorias` (`id_Cat`);

ALTER TABLE `contratacoes`
  ADD CONSTRAINT `fk_contratacoes_prof` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `fk_contratacoes_services` FOREIGN KEY (`id_Service`) REFERENCES `services` (`id_Service`),
  ADD CONSTRAINT `fk_contratacoes_users` FOREIGN KEY (`id_Usr`) REFERENCES `users` (`id_Usr`);

ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_categoria` FOREIGN KEY (`id_Cat`) REFERENCES `categorias` (`id_Cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
