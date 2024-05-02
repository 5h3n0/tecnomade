-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Maio-2024 às 22:29
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecnomadedb`
--
CREATE DATABASE IF NOT EXISTS `tecnomadedb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tecnomadedb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Pf` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Pf` (`id_Pf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_Cat` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `categorias`
--

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cat_sel`
--

CREATE TABLE IF NOT EXISTS `cat_sel` (
  `id_Cat_Sel` int(11) NOT NULL AUTO_INCREMENT,
  `id_Pf` int(11) DEFAULT NULL,
  `id_Cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Cat_Sel`),
  KEY `id_Pf` (`id_Pf`),
  KEY `id_Cat` (`id_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `cat_sel`
--

INSERT INTO `cat_sel` (`id_Cat_Sel`, `id_Pf`, `id_Cat`) VALUES
(1, 1, 7),
(2, 1, 8),
(5, 1, 2),
(6, 1, 3),
(7, 2, 6),
(8, 2, 9),
(9, 2, 12),
(10, 3, 4),
(11, 3, 10),
(12, 4, 5),
(13, 4, 6),
(14, 4, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratacoes`
--

CREATE TABLE IF NOT EXISTS `contratacoes` (
  `id_Contratacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_Contratacao` date NOT NULL,
  `descricao` text NOT NULL,
  `id_Pf` int(11) NOT NULL,
  PRIMARY KEY (`id_Contratacao`),
  KEY `fk_contratacoes_users` (`id_Usr`),
  KEY `fk_contratacoes_services` (`id_Service`),
  KEY `fk_contratacoes_prof` (`id_Pf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contratacoes`
--

INSERT INTO `contratacoes` (`id_Contratacao`, `id_Usr`, `id_Service`, `valor`, `data_Contratacao`, `descricao`, `id_Pf`) VALUES
(1, 1, 1, 35000, '2024-05-02', 'O serviço de Manutenção/Suporte para Servidores oferece uma solução completa para garantir a estabilidade e o desempenho dos servidores de sua empresa. Este serviço abrange o monitoramento contínuo do desempenho dos servidores, a identificação e resolução proativa de problemas, além de atualizações regulares de software e firmware para manter os sistemas seguros e atualizados.', 1),
(2, 1, 2, 65000, '2024-05-02', 'O serviço de Instalação de Câmeras/Alarmes oferece uma solução abrangente para proteger sua residência ou empresa. Este serviço inclui a instalação profissional de câmeras de vigilância e sistemas de alarme, garantindo a segurança e a tranquilidade do ambiente. Nossos especialistas realizam uma avaliação detalhada das necessidades de segurança do local, seguida pela instalação estratégica dos equipamentos. Além disso, fornecemos orientação sobre o funcionamento dos sistemas e opções de monitoramento remoto para garantir uma proteção contínua.', 1),
(3, 1, 4, 15000, '2024-05-02', 'O serviço de Manutenção de Rede Sem Fio oferece uma solução abrangente para garantir a estabilidade e o desempenho de sua rede Wi-Fi. Este serviço inclui monitoramento contínuo da rede sem fio para identificar e resolver proativamente problemas de conectividade e desempenho. Nossos especialistas realizam ajustes na configuração da rede, otimizando canais e frequências para evitar interferências e garantir uma cobertura uniforme em todo o ambiente. ', 1),
(4, 1, 3, 250000, '2024-05-02', 'A infraestrutura de rede oferece uma solução completa para garantir a conectividade confiável e eficiente de sua empresa. Este serviço abrange o projeto, implementação e manutenção de redes locais (LANs) e de área ampla (WANs), garantindo uma comunicação fluida entre os dispositivos e a segurança dos dados. Nossos especialistas realizam uma análise detalhada das necessidades de sua empresa, projetando uma infraestrutura de rede escalável e adaptável às suas demandas atuais e futuras. Além disso, oferecemos suporte técnico contínuo para resolver qualquer problema de conectividade e garantir o funcionamento ininterrupto de sua rede.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id_Endereco` int(11) NOT NULL AUTO_INCREMENT,
  `id_Pf` int(11) DEFAULT NULL,
  `id_Usr` int(11) DEFAULT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `num` varchar(10) NOT NULL,
  `comp` text DEFAULT NULL,
  PRIMARY KEY (`id_Endereco`),
  UNIQUE KEY `id_Pf` (`id_Pf`),
  UNIQUE KEY `id_Usr` (`id_Usr`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id_Endereco`, `id_Pf`, `id_Usr`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `num`, `comp`) VALUES
(1, 1, NULL, '08580-730', 'Rua Marciliano Faustino', 'Jardim Ipê', 'Itaquaquecetuba', 'SP', '15', ''),
(2, 2, NULL, '08580-070', 'Rua dos Arquitetos', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '12', ''),
(3, 3, NULL, '08580-050', 'Rua dos Engenheiros', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '554', ''),
(4, 4, NULL, '07190065', 'Rua Cristobal Claudio Elillo', 'Parque Cecap', 'Guarulhos', 'SP', '1721', ''),
(5, NULL, 1, '05022-000', 'Avenida Pompéia', 'Vila Pompéia', 'São Paulo', 'SP', '445', ''),
(6, NULL, 2, '01001-000', 'Praça da Sé', 'Sé', 'São Paulo', 'SP', '119', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof`
--

CREATE TABLE IF NOT EXISTS `prof` (
  `id_Pf` int(11) NOT NULL AUTO_INCREMENT,
  `pfName` varchar(100) NOT NULL,
  `dtNasPf` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `celPf` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `hashPass` varchar(255) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `categorias` varchar(20) DEFAULT NULL,
  `descPf` text NOT NULL,
  `avaliacao_media` float DEFAULT NULL,
  PRIMARY KEY (`id_Pf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `prof`
--

INSERT INTO `prof` (`id_Pf`, `pfName`, `dtNasPf`, `email`, `celPf`, `gender`, `hashPass`, `cnpj`, `imgName`, `categorias`, `descPf`, `avaliacao_media`) VALUES
(1, 'Rodrigo Nunes Almeida', '1995-10-12', 'rdrigo35@gmail.com', '(11) 98859-4468', 'm', 'ed999f05e1ed9818541fcd882b2c780ebac594fc', '45.645.646/0001-46', 'b9918e8475397c1ceb84a274e555e6e6.jpg', NULL, 'Sou Rodrigo Nunes Almeida, um profissional especializado em manutenção de servidores, instalação de câmeras e alarmes, infraestrutura de rede e manutenção de redes sem fio. Minha experiência me permite oferecer soluções confiáveis e eficientes para garantir o funcionamento ininterrupto dos sistemas de TI e segurança. Estou comprometido em fornecer serviços de alta qualidade para empresas e organizações, ajudando a maximizar o desempenho de sua infraestrutura tecnológica.', NULL),
(2, 'Marcos Almeida Rocha', '2001-11-12', 'mcal@gmail.com', '(11) 98858-5589', 'm', '5a78d7207d53ee01ca20554180c9f80f44e7e61d', '79.945.646/0001-45', 'de5ede32dffbaed102875d52b22010fb.jpg', NULL, 'Eu sou Marcos, um profissional especializado em desenvolvimento de sistemas, Power BI e computação em nuvem. Minha paixão reside em criar soluções inovadoras e eficientes que atendam às necessidades específicas dos clientes. Com experiência em desenvolvimento de software, análise de dados e implementação de soluções em nuvem, estou comprometido em fornecer resultados de alta qualidade que impulsionem o sucesso dos projetos.', NULL),
(3, 'Rafael Sousa Oliveira', '1998-02-05', 'rol@gmail.com', '(11) 98454-5689', 'm', 'fc6961fc54edac9228fd2d798fb3441f4940405f', '78.445.646/0001-25', 'e29f5af8acbb2bcad186505fda3b7826.jpg', NULL, 'Eu sou Rafael Sousa Oliveira, um especialista em desenvolvimento web e design UX/UI. Minha paixão está em criar experiências digitais envolventes e intuitivas, combinando habilidades técnicas sólidas com uma compreensão profunda do usuário. Com uma abordagem centrada no usuário, estou comprometido em desenvolver websites e interfaces que não apenas impressionem visualmente, mas também ofereçam uma experiência excepcional aos usuários.', NULL),
(4, 'Ana Nunes Dos Santos', '1999-07-18', 'anunes@gmail.com', '(11) 90658-8689', 'f', 'e41079bf229d6ee9886927bb3326aa951cdae53e', '89.478.946/0001-66', 'd8eada203e133093d9c60f61c8346fc5.jpg', NULL, 'Eu sou Ana Nunes dos Santos, uma entusiasta do desenvolvimento de jogos e sistemas, bem como de aplicações para dispositivos móveis. Minha paixão é criar experiências interativas e cativantes que inspirem e entretenham os usuários. Com experiência em diversas plataformas e tecnologias, estou comprometida em desenvolver produtos inovadores e de alta qualidade que atendam às necessidades e expectativas do mercado.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_Service` int(11) NOT NULL AUTO_INCREMENT,
  `nomeService` varchar(60) NOT NULL,
  `descService` longtext NOT NULL,
  `vlrService` decimal(10,0) NOT NULL,
  `tempoEstimado` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Cat` int(11) NOT NULL,
  PRIMARY KEY (`id_Service`),
  KEY `fk_services_prof` (`id_Pf`),
  KEY `fk_services_categoria` (`id_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id_Service`, `nomeService`, `descService`, `vlrService`, `tempoEstimado`, `id_Pf`, `id_Cat`) VALUES
(1, 'Manutenção/Suporte para servidores', 'O serviço de Manutenção/Suporte para Servidores oferece uma solução completa para garantir a estabilidade e o desempenho dos servidores de sua empresa. Este serviço abrange o monitoramento contínuo do desempenho dos servidores, a identificação e resolução proativa de problemas, além de atualizações regulares de software e firmware para manter os sistemas seguros e atualizados.', 35000, 0, 1, 7),
(2, 'Instalação de Câmeras/Alarmes', 'O serviço de Instalação de Câmeras/Alarmes oferece uma solução abrangente para proteger sua residência ou empresa. Este serviço inclui a instalação profissional de câmeras de vigilância e sistemas de alarme, garantindo a segurança e a tranquilidade do ambiente. Nossos especialistas realizam uma avaliação detalhada das necessidades de segurança do local, seguida pela instalação estratégica dos equipamentos. Além disso, fornecemos orientação sobre o funcionamento dos sistemas e opções de monitoramento remoto para garantir uma proteção contínua.', 65000, 0, 1, 8),
(3, 'Instalação de Infraestrutura de rede', 'A infraestrutura de rede oferece uma solução completa para garantir a conectividade confiável e eficiente de sua empresa. Este serviço abrange o projeto, implementação e manutenção de redes locais (LANs) e de área ampla (WANs), garantindo uma comunicação fluida entre os dispositivos e a segurança dos dados. Nossos especialistas realizam uma análise detalhada das necessidades de sua empresa, projetando uma infraestrutura de rede escalável e adaptável às suas demandas atuais e futuras. Além disso, oferecemos suporte técnico contínuo para resolver qualquer problema de conectividade e garantir o funcionamento ininterrupto de sua rede.', 250000, 0, 1, 2),
(4, 'Manutenção/Instalação de rede sem fio', 'O serviço de Manutenção de Rede Sem Fio oferece uma solução abrangente para garantir a estabilidade e o desempenho de sua rede Wi-Fi. Este serviço inclui monitoramento contínuo da rede sem fio para identificar e resolver proativamente problemas de conectividade e desempenho. Nossos especialistas realizam ajustes na configuração da rede, otimizando canais e frequências para evitar interferências e garantir uma cobertura uniforme em todo o ambiente. ', 15000, 0, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_realizados`
--

CREATE TABLE IF NOT EXISTS `servicos_realizados` (
  `id_ServicoRealizado` int(11) NOT NULL AUTO_INCREMENT,
  `id_contratacao` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `data_realizacao` date NOT NULL,
  PRIMARY KEY (`id_ServicoRealizado`),
  KEY `id_contratacao` (`id_contratacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servicos_realizados`
--

INSERT INTO `servicos_realizados` (`id_ServicoRealizado`, `id_contratacao`, `id_Pf`, `id_Usr`, `id_Service`, `data_realizacao`) VALUES
(1, 1, 1, 1, 1, '2024-05-02'),
(2, 2, 1, 1, 2, '2024-05-02'),
(3, 3, 1, 1, 4, '2024-05-02'),
(4, 4, 1, 1, 3, '2024-05-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_Usr` int(11) NOT NULL AUTO_INCREMENT,
  `usrName` varchar(100) NOT NULL,
  `dtNasUsr` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `imgData` longblob NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `celUsr` varchar(20) NOT NULL,
  `hashPass` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`id_Usr`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_Usr`, `usrName`, `dtNasUsr`, `email`, `gender`, `imgData`, `imgName`, `celUsr`, `hashPass`, `cpf`) VALUES
(1, 'Joana da Silva Santos', '1985-04-25', 'joanadssantos@email.com', 'f', '', 'e72633b9a8a6d240ac6d4e35a776a3ce.jpg', '(21) 98765-4321', '4c6b8c96eace94c96cdba7ca44af939ed93ea3cb', '987.654.321-00'),
(2, 'Marina Oliveira Costa', '1999-12-05', 'marinacosta@email.com', 'f', '', 'a4e0ecf02edfccb879b16304838888fd.jpg', '(11) 98765-4321', 'd8eb84b7736b6e5a8c3fdf47f0fccf987ae4aa2d', '321.654.987-00');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

--
-- Limitadores para a tabela `cat_sel`
--
ALTER TABLE `cat_sel`
  ADD CONSTRAINT `cat_sel_ibfk_1` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `cat_sel_ibfk_2` FOREIGN KEY (`id_Cat`) REFERENCES `categorias` (`id_Cat`);

--
-- Limitadores para a tabela `contratacoes`
--
ALTER TABLE `contratacoes`
  ADD CONSTRAINT `fk_contratacoes_prof` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `fk_contratacoes_services` FOREIGN KEY (`id_Service`) REFERENCES `services` (`id_Service`),
  ADD CONSTRAINT `fk_contratacoes_users` FOREIGN KEY (`id_Usr`) REFERENCES `users` (`id_Usr`);

--
-- Limitadores para a tabela `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_categoria` FOREIGN KEY (`id_Cat`) REFERENCES `categorias` (`id_Cat`);

--
-- Limitadores para a tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  ADD CONSTRAINT `servicos_realizados_ibfk_1` FOREIGN KEY (`id_contratacao`) REFERENCES `contratacoes` (`id_Contratacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
