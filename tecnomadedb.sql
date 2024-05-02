-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Maio-2024 às 02:19
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12
CREATE DATABASE tecnomadedb;
USE tecnomadedb;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_Cat` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `cat_sel` (
  `id_Cat_Sel` int(11) NOT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `id_Cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `contratacoes` (
  `id_Contratacao` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_Contratacao` date NOT NULL,
  `descricao` text NOT NULL,
  `id_Pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

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

--
-- Extraindo dados da tabela `prof`
--

INSERT INTO `prof` (`id_Pf`, `pfName`, `dtNasPf`, `email`, `celPf`, `gender`, `hashPass`, `cnpj`, `imgData`, `imgName`, `categorias`, `descPf`, `avaliacao_media`) VALUES
(1, 'Rodrigo Nunes Almeida', '1995-10-12', 'rdrigo35@gmail.com', '(11) 98859-4468', 'm', 'ed999f05e1ed9818541fcd882b2c780ebac594fc', '45.645.646/0001-46', '', 'b9918e8475397c1ceb84a274e555e6e6.jpg', NULL, 'Sou Rodrigo Nunes Almeida, um profissional especializado em manutenção de servidores, instalação de câmeras e alarmes, infraestrutura de rede e manutenção de redes sem fio. Minha experiência me permite oferecer soluções confiáveis e eficientes para garantir o funcionamento ininterrupto dos sistemas de TI e segurança. Estou comprometido em fornecer serviços de alta qualidade para empresas e organizações, ajudando a maximizar o desempenho de sua infraestrutura tecnológica.', NULL),
(2, 'Marcos Almeida Rocha', '2001-11-12', 'mcal@gmail.com', '(11) 98858-5589', 'm', '5a78d7207d53ee01ca20554180c9f80f44e7e61d', '79.945.646/0001-45', '', 'de5ede32dffbaed102875d52b22010fb.jpg', NULL, 'Eu sou Marcos, um profissional especializado em desenvolvimento de sistemas, Power BI e computação em nuvem. Minha paixão reside em criar soluções inovadoras e eficientes que atendam às necessidades específicas dos clientes. Com experiência em desenvolvimento de software, análise de dados e implementação de soluções em nuvem, estou comprometido em fornecer resultados de alta qualidade que impulsionem o sucesso dos projetos.', NULL),
(3, 'Rafael Sousa Oliveira', '1998-02-05', 'rol@gmail.com', '(11) 98454-5689', 'm', 'fc6961fc54edac9228fd2d798fb3441f4940405f', '78.445.646/0001-25', '', 'e29f5af8acbb2bcad186505fda3b7826.jpg', NULL, 'Eu sou Rafael Sousa Oliveira, um especialista em desenvolvimento web e design UX/UI. Minha paixão está em criar experiências digitais envolventes e intuitivas, combinando habilidades técnicas sólidas com uma compreensão profunda do usuário. Com uma abordagem centrada no usuário, estou comprometido em desenvolver websites e interfaces que não apenas impressionem visualmente, mas também ofereçam uma experiência excepcional aos usuários.', NULL),
(4, 'Ana Nunes Dos Santos', '1999-07-18', 'anunes@gmail.com', '(11) 90658-8689', 'f', 'e41079bf229d6ee9886927bb3326aa951cdae53e', '89.478.946/0001-66', '', 'd8eada203e133093d9c60f61c8346fc5.jpg', NULL, 'Eu sou Ana Nunes dos Santos, uma entusiasta do desenvolvimento de jogos e sistemas, bem como de aplicações para dispositivos móveis. Minha paixão é criar experiências interativas e cativantes que inspirem e entretenham os usuários. Com experiência em diversas plataformas e tecnologias, estou comprometida em desenvolver produtos inovadores e de alta qualidade que atendam às necessidades e expectativas do mercado.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id_Service` int(11) NOT NULL,
  `nomeService` varchar(60) NOT NULL,
  `descService` longtext NOT NULL,
  `vlrService` decimal(10,0) NOT NULL,
  `tempoEstimado` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_realizados`
--

CREATE TABLE `servicos_realizados` (
  `id_ServicoRealizado` int(11) NOT NULL,
  `id_contratacao` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `data_realizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

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

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_Usr`, `usrName`, `dtNasUsr`, `email`, `gender`, `imgData`, `imgName`, `celUsr`, `hashPass`, `cpf`) VALUES
(1, 'Joana da Silva Santos', '1985-04-25', 'joanadssantos@email.com', 'f', '', 'e72633b9a8a6d240ac6d4e35a776a3ce.jpg', '(21) 98765-4321', '4c6b8c96eace94c96cdba7ca44af939ed93ea3cb', '987.654.321-00'),
(2, 'Marina Oliveira Costa', '1999-12-05', 'marinacosta@email.com', 'f', '', 'a4e0ecf02edfccb879b16304838888fd.jpg', '(11) 98765-4321', 'd8eb84b7736b6e5a8c3fdf47f0fccf987ae4aa2d', '321.654.987-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Pf` (`id_Pf`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_Cat`);

--
-- Índices para tabela `cat_sel`
--
ALTER TABLE `cat_sel`
  ADD PRIMARY KEY (`id_Cat_Sel`),
  ADD KEY `id_Pf` (`id_Pf`),
  ADD KEY `id_Cat` (`id_Cat`);

--
-- Índices para tabela `contratacoes`
--
ALTER TABLE `contratacoes`
  ADD PRIMARY KEY (`id_Contratacao`),
  ADD KEY `fk_contratacoes_users` (`id_Usr`),
  ADD KEY `fk_contratacoes_services` (`id_Service`),
  ADD KEY `fk_contratacoes_prof` (`id_Pf`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_Endereco`),
  ADD UNIQUE KEY `id_Pf` (`id_Pf`),
  ADD UNIQUE KEY `id_Usr` (`id_Usr`);

--
-- Índices para tabela `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`id_Pf`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_Service`),
  ADD KEY `fk_services_prof` (`id_Pf`),
  ADD KEY `fk_services_categoria` (`id_Cat`);

--
-- Índices para tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  ADD PRIMARY KEY (`id_ServicoRealizado`),
  ADD KEY `id_contratacao` (`id_contratacao`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_Usr`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_Cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cat_sel`
--
ALTER TABLE `cat_sel`
  MODIFY `id_Cat_Sel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `contratacoes`
--
ALTER TABLE `contratacoes`
  MODIFY `id_Contratacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_Endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `prof`
--
ALTER TABLE `prof`
  MODIFY `id_Pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id_Service` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  MODIFY `id_ServicoRealizado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_Usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
