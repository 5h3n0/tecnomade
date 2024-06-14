-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2024 às 21:13
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

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `estrelas` int(11) NOT NULL,
  `data_avaliacao` date NOT NULL,
  `mensagem_avaliacao` varchar(255) NOT NULL,
  `id_Pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `estrelas`, `data_avaliacao`, `mensagem_avaliacao`, `id_Pf`) VALUES
(1, 5, '2024-06-03', 'Gostei muito, ótimo atendimento.', 1),
(2, 5, '2024-06-03', 'Ótimo serviço, supriu todas as necessidades do ambiente!', 1),
(3, 5, '2024-06-10', 'ótimo serviço, superou minhas expectativas!!', 3);

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
(1, 1, 2),
(2, 1, 3),
(3, 1, 8),
(4, 1, 7),
(5, 2, 6),
(6, 2, 9),
(7, 2, 12),
(8, 3, 4),
(9, 3, 5),
(10, 3, 6),
(11, 3, 10),
(12, 5, 6),
(13, 5, 9),
(14, 5, 12);

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
  `id_Pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contratacoes`
--

INSERT INTO `contratacoes` (`id_Contratacao`, `id_Usr`, `id_Service`, `valor`, `data_Contratacao`, `id_Pf`) VALUES
(1, 1, 4, 40000, '2024-06-03', 1),
(2, 3, 2, 120000, '2024-06-03', 1),
(3, 4, 8, 55000, '2024-06-10', 3);

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
(2, 2, NULL, '08580-070', 'Rua dos Arquitetos', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '194', ''),
(3, 3, NULL, '07190065', 'Rua Cristobal Claudio Elillo', 'Parque Cecap', 'Guarulhos', 'SP', '224', ''),
(4, NULL, 1, '05022-000', 'Avenida Pompéia', 'Vila Pompéia', 'São Paulo', 'SP', '96', ''),
(5, 4, NULL, '08586010', 'Avenida Cardeal', 'Parque São Pedro', 'Itaquaquecetuba', 'SP', '150', ''),
(6, NULL, 2, '08586-180', 'Rua do Bronze', 'Parque São Pedro', 'Itaquaquecetuba', 'SP', '250', ''),
(7, NULL, 3, '01001-000', 'Praça da Sé', 'Sé', 'São Paulo', 'SP', '1150', ''),
(8, 5, NULL, '08580-050', 'Rua dos Engenheiros', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '1245', ''),
(9, NULL, 4, '01001-000', 'Praça da Sé', 'Sé', 'São Paulo', 'SP', '767', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL,
  `id_solicitacao` int(11) DEFAULT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `orcamento` decimal(10,0) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pendente',
  `msg_for_client` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id_orcamento`, `id_solicitacao`, `id_Pf`, `orcamento`, `status`, `msg_for_client`) VALUES
(1, 1, 1, 40000, 'Aceito', 'Agradeço o seu interesse no serviço de suporte e configuração de rede sem fio. O valor enviado acima para a realização do serviço solicitado cobre a avaliação do ambiente para otimizar a cobertura do sinal, configuração dos roteadores e pontos de acesso, e reforço da segurança da rede. Além disso, suporte técnico contínuo para manutenção e resolução de problemas, garantindo uma rede Wi-Fi eficiente e segura para a sua residência.'),
(2, 2, 1, 120000, 'Aceito', 'Agradeço pelo seu interesse em meu serviço de instalação de câmera de segurança. O valor para a realização do serviço solicitado será enviado juntamente com essa mensagem, cobrindo a avaliação do ambiente, instalação e configuração da câmera, além de oferecer suporte técnico contínuo para garantir o funcionamento eficiente do sistema. '),
(3, 3, 3, 55000, 'Aceito', 'Boa tarde, parece ser algo simples, irei estruturar o projeto e logo envio um feedback.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portifolio` int(11) NOT NULL,
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
  `id_Pf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`id_portifolio`, `title`, `description`, `date`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`, `id_Pf`) VALUES
(1, 'Instalação de Câmeras', 'Realizei um serviço de instalação de câmeras residenciais em São Paulo ', '2022-11-05', '56089366a34de263177ad674cf7dfaef.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Manutenção de Servidor', 'Troca de componentes em um servidor de dados.', '2021-05-14', '85e4e1da41d2434f9d1867a4d8a4299b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Infraestrutura de Rede', 'Cabeamento estruturado com pontos de câmera e redes.', '2019-04-17', '4a257554a82331589d68a72d33479deb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
  `imgName` varchar(255) NOT NULL,
  `categorias` varchar(20) DEFAULT NULL,
  `descPf` text NOT NULL,
  `avaliacao_media` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `prof`
--

INSERT INTO `prof` (`id_Pf`, `pfName`, `dtNasPf`, `email`, `celPf`, `gender`, `hashPass`, `cnpj`, `imgName`, `categorias`, `descPf`, `avaliacao_media`) VALUES
(1, 'Rodrigo Nunes Almeida', '1995-10-12', 'rdrigo35@gmail.com', '(11) 98859-4468', 'm', 'ed999f05e1ed9818541fcd882b2c780ebac594fc', '45.645.646/0001-46', 'b5d58a2dba09f30c2bff598f81ba85bf.jpg', NULL, 'Sou Rodrigo Nunes Almeida, um profissional especializado em manutenção de servidores, instalação de câmeras e alarmes, infraestrutura de rede e manutenção de redes sem fio. Minha experiência me permite oferecer soluções confiáveis e eficientes para garantir o funcionamento ininterrupto dos sistemas de TI e segurança. Estou comprometido em fornecer serviços de alta qualidade para empresas e organizações, ajudando a maximizar o desempenho de sua infraestrutura tecnológica.', NULL),
(2, 'Marcos Almeida Rocha', '2001-11-12', 'mcal@gmail.com', '(11) 98858-5589', 'm', '5a78d7207d53ee01ca20554180c9f80f44e7e61d', '79.945.646/0001-45', '80b35a95ed3b570c067da1de894c8b03.jpg', NULL, 'Eu sou Marcos, um profissional especializado em desenvolvimento de sistemas, Power BI e computação em nuvem. Minha paixão reside em criar soluções inovadoras e eficientes que atendam às necessidades específicas dos clientes. Com experiência em desenvolvimento de software, análise de dados e implementação de soluções em nuvem, estou comprometido em fornecer resultados de alta qualidade que impulsionem o sucesso dos projetos.', NULL),
(3, 'Ana Nunes Dos Santos', '1999-07-18', 'anunes@gmail.com', '(11) 90658-8689', 'm', 'e41079bf229d6ee9886927bb3326aa951cdae53e', '89.478.946/0001-66', '23645276957e700da1641c1a7ce641f0.jpg', NULL, 'Eu sou Ana Nunes dos Santos, uma entusiasta do desenvolvimento de jogos e sistemas, bem como de aplicações para dispositivos móveis. Minha paixão é criar experiências interativas e cativantes que inspirem e entretenham os usuários. Com experiência em diversas plataformas e tecnologias, estou comprometida em desenvolver produtos inovadores e de alta qualidade que atendam às necessidades e expectativas do mercado.', NULL),
(4, 'black xyz', '2005-06-22', 'black@gmail.com', '(11) 96486-1525', 'm', '933f868ccf7ece7601793d3887f5522fbb341418', '16.545.646/5464-86', 'cf001da34629ede7c257171085b12244.jpg', NULL, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL),
(5, 'Rafael Sousa Oliveira', '1998-02-05', 'rol@gmail.com', '(11) 98454-5689', 'm', 'fc6961fc54edac9228fd2d798fb3441f4940405f', '78.445.646/0001-25', 'b48bee7eaa944376ecaf9be3521d1e35.jpg', NULL, 'Sou Rafael Sousa, um profissional especializado em desenvolvimento de sistemas, Power BI e computação em nuvem. Minha paixão reside em criar soluções inovadoras e eficientes que atendam às necessidades específicas dos clientes. Com experiência em desenvolvimento de software, análise de dados e implementação de soluções em nuvem, estou comprometido em fornecer resultados de alta qualidade que impulsionem o sucesso dos projetos.', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id_Service` int(11) NOT NULL,
  `nomeService` varchar(60) NOT NULL,
  `descService` longtext NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id_Service`, `nomeService`, `descService`, `id_Pf`, `id_Cat`) VALUES
(1, 'Manutenção/Suporte para servidores', 'O serviço de Manutenção/Suporte para Servidores oferece uma solução completa para garantir a estabilidade e o desempenho dos servidores de sua empresa. Este serviço abrange o monitoramento contínuo do desempenho dos servidores, a identificação e resolução proativa de problemas, além de atualizações regulares de software e firmware para manter os sistemas seguros e atualizados.', 1, 7),
(2, 'Instalação de Câmeras/Alarmes', 'O serviço de Instalação de Câmeras/Alarmes oferece uma solução abrangente para proteger sua residência ou empresa. Este serviço inclui a instalação profissional de câmeras de vigilância e sistemas de alarme, garantindo a segurança e a tranquilidade do ambiente. Nossos especialistas realizam uma avaliação detalhada das necessidades de segurança do local, seguida pela instalação estratégica dos equipamentos. Além disso, fornecemos orientação sobre o funcionamento dos sistemas e opções de monitoramento remoto para garantir uma proteção contínua.', 1, 8),
(3, 'Instalação de Infraestrutura de rede', 'A infraestrutura de rede oferece uma solução completa para garantir a conectividade confiável e eficiente de sua empresa. Este serviço abrange o projeto, implementação e manutenção de redes locais (LANs) e de área ampla (WANs), garantindo uma comunicação fluida entre os dispositivos e a segurança dos dados. Nossos especialistas realizam uma análise detalhada das necessidades de sua empresa, projetando uma infraestrutura de rede escalável e adaptável às suas demandas atuais e futuras. Além disso, oferecemos suporte técnico contínuo para resolver qualquer problema de conectividade e garantir o funcionamento ininterrupto de sua rede.', 1, 2),
(4, 'Suporte para rede sem fio', 'O serviço de Manutenção de Rede Sem Fio oferece uma solução abrangente para garantir a estabilidade e o desempenho de sua rede Wi-Fi. Este serviço inclui monitoramento contínuo da rede sem fio para identificar e resolver proativamente problemas de conectividade e desempenho. Nossos especialistas realizam ajustes na configuração da rede, otimizando canais e frequências para evitar interferências e garantir uma cobertura uniforme em todo o ambiente.', 1, 3),
(5, 'Desenvolvimento de Sistemas Java', 'Serviço especializados de desenvolvimento de sistemas em Java para atender às necessidades únicas do seu negócio. Com expertise na linguagem Java, desenvolvo soluções robustas e escaláveis, desde aplicativos corporativos até sistemas de gestão. ', 2, 6),
(6, 'Analise de Dados com Power BI', 'Maximize o potencial dos dados com nossas soluções especializadas em Power BI. Visualizações dinâmicas e análises avançadas transformam dados em insights acionáveis para impulsionar estratégias de negócios. De pequenas a grandes empresas, nossas soluções escaláveis fornecem as ferramentas necessárias para tomar decisões informadas e estratégicas.', 2, 9),
(7, 'Cloud Computing com AWS', 'Armazenamento seguro, processamento eficiente e escalabilidade flexível são apenas o começo com os serviços de cloud computing AWS. De startups a grandes corporações, esses serviços oferecem as ferramentas necessárias para impulsionar sua empresa para o futuro. Aproveite ao máximo recursos, reduza custos e aumente a agilidade com esta solução de cloud computing líder de mercado. Entre em contato para saber mais sobre como podemos ajudar a impulsionar o sucesso na nuvem com a AWS.', 2, 12),
(8, 'Desenvolvimento de Web sites e aplicações web.', 'O serviço de Desenvolvimento Web utiliza as mais recentes tecnologias e frameworks, incluindo HTML5, CSS3, JavaScript e php, para criar websites e aplicações web de alto desempenho. Com um monitoramento contínuo do progresso do projeto, identificamos e resolvemos proativamente quaisquer desafios, garantindo um desenvolvimento suave e eficaz. Além disso, oferecemos atualizações regulares de software e implementação de novos recursos para manter seu site ou aplicação atualizados e relevantes.', 3, 4),
(9, 'Desenvolvimento de Jogos MMORPG', 'O serviço de Desenvolvimento de Jogos oferece uma solução completa, empregando tecnologias avançadas e ferramentas líderes de mercado. Utilizando de PixelArt e C#, como principais pontos.  ', 3, 5);

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

--
-- Extraindo dados da tabela `servicos_realizados`
--

INSERT INTO `servicos_realizados` (`id_ServicoRealizado`, `id_contratacao`, `id_Pf`, `id_Usr`, `id_Service`, `data_realizacao`) VALUES
(1, 1, 1, 1, 4, '2024-06-03'),
(2, 2, 1, 3, 2, '2024-06-03'),
(3, 3, 3, 4, 8, '2024-06-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes_servico`
--

CREATE TABLE `solicitacoes_servico` (
  `id_solicitacao` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `descricao_servico` text NOT NULL,
  `mensagem_cliente` text NOT NULL,
  `data_Solicitacao` date NOT NULL,
  `status` varchar(50) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `solicitacoes_servico`
--

INSERT INTO `solicitacoes_servico` (`id_solicitacao`, `id_Service`, `id_Pf`, `id_Usr`, `descricao_servico`, `mensagem_cliente`, `data_Solicitacao`, `status`) VALUES
(1, 4, 1, 1, 'O serviço de Manutenção de Rede Sem Fio oferece uma solução abrangente para garantir a estabilidade e o desempenho de sua rede Wi-Fi. Este serviço inclui monitoramento contínuo da rede sem fio para identificar e resolver proativamente problemas de conectividade e desempenho. Nossos especialistas realizam ajustes na configuração da rede, otimizando canais e frequências para evitar interferências e garantir uma cobertura uniforme em todo o ambiente.', 'Estou interessado em obter um orçamento para suporte e configuração de rede sem fio na minha residência. Atualmente, estamos enfrentando alguns problemas de conectividade e gostaria de melhorar a performance e segurança da nossa rede Wi-Fi. Precisamos de uma avaliação do ambiente para otimizar a cobertura do sinal, configuração de roteadores e pontos de acesso, reforço da segurança da rede e suporte técnico contínuo para manutenção e resolução de problemas.', '2024-06-03', 'Orçamento Enviado'),
(2, 2, 1, 3, 'O serviço de Instalação de Câmeras/Alarmes oferece uma solução abrangente para proteger sua residência ou empresa. Este serviço inclui a instalação profissional de câmeras de vigilância e sistemas de alarme, garantindo a segurança e a tranquilidade do ambiente. Nossos especialistas realizam uma avaliação detalhada das necessidades de segurança do local, seguida pela instalação estratégica dos equipamentos. Além disso, fornecemos orientação sobre o funcionamento dos sistemas e opções de monitoramento remoto para garantir uma proteção contínua.', 'Estou interessada em obter um orçamento para instalação de câmeras de segurança na minha residência. Atualmente, estou buscando melhorar a segurança do local e gostaria de implementar um sistema de vigilância por vídeo. Preciso de uma avaliação do ambiente para identificar os pontos estratégicos de instalação, instalação e configuração das câmeras, e suporte técnico contínuo para garantir o funcionamento adequado do sistema. Agradeço desde já pela atenção e aguardo um retorno com as informações solicitadas.', '2024-06-03', 'Orçamento Enviado'),
(3, 8, 3, 4, 'O serviço de Desenvolvimento Web utiliza as mais recentes tecnologias e frameworks, incluindo HTML5, CSS3, JavaScript e php, para criar websites e aplicações web de alto desempenho. Com um monitoramento contínuo do progresso do projeto, identificamos e resolvemos proativamente quaisquer desafios, garantindo um desenvolvimento suave e eficaz. Além disso, oferecemos atualizações regulares de software e implementação de novos recursos para manter seu site ou aplicação atualizados e relevantes.', 'Olá, preciso de um blog privado para mim e meus amigos.  Não tenho restrições, pois preciso de algo simples.', '2024-06-10', 'Orçamento Enviado');

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
  `imgName` varchar(255) NOT NULL,
  `celUsr` varchar(20) NOT NULL,
  `hashPass` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_Usr`, `usrName`, `dtNasUsr`, `email`, `gender`, `imgName`, `celUsr`, `hashPass`, `cpf`) VALUES
(1, 'Joana da Silva Santos', '1985-04-25', 'joanadssantos@email.com', 'm', '6ba10752e261b7cc53a6d7c5a92cabe0.jpg', '(11) 98765-4321', '4c6b8c96eace94c96cdba7ca44af939ed93ea3cb', '219.876.543-21'),
(2, 'black xyz', '2005-05-26', 'black@gmail.com', 'm', '554834f3cd8f1fa71026f9a6434ed0f7.jpg', '(11) 96464-8612', '933f868ccf7ece7601793d3887f5522fbb341418', '186.841.648-61'),
(3, 'Marina Oliveira Costa', '1988-06-05', 'marinacosta@gmail.com', 'f', '4090f199d24d6125b68e9dece5fb5692.jpg', '(11) 98765-4321', 'd8eb84b7736b6e5a8c3fdf47f0fccf987ae4aa2d', '321.654.987-00'),
(4, 'Marina Oliveira Costa', '1988-06-05', 'marinacosta@email.com', 'f', 'df9b831bd09209cc4cb3216237d63e60.jpg', '(11) 98765-4321', 'd8eb84b7736b6e5a8c3fdf47f0fccf987ae4aa2d', '321.654.987-00');


CREATE TABLE dados_bancarios (
    id_bank INT(11) NOT NULL AUTO_INCREMENT,
    id_Pf INT(11) NOT NULL,
    banco VARCHAR(255) NOT NULL,
    conta VARCHAR(255) NOT NULL,
    agencia VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_bank)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dados_bancarios`
--

-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_id_Pf_avaliacao` (`id_Pf`);

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
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `id_solicitacao` (`id_solicitacao`),
  ADD KEY `id_Pf` (`id_Pf`);

--
-- Índices para tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portifolio`),
  ADD KEY `fk_id_Pf` (`id_Pf`);

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
-- Índices para tabela `solicitacoes_servico`
--
ALTER TABLE `solicitacoes_servico`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `id_Service` (`id_Service`),
  ADD KEY `id_Pf` (`id_Pf`),
  ADD KEY `id_Usr` (`id_Usr`);

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
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_Contratacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_Endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portifolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `prof`
--
ALTER TABLE `prof`
  MODIFY `id_Pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  MODIFY `id_ServicoRealizado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `solicitacoes_servico`
--
ALTER TABLE `solicitacoes_servico`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_Usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_Pf_avaliacao` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

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
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `orcamento_ibfk_1` FOREIGN KEY (`id_solicitacao`) REFERENCES `solicitacoes_servico` (`id_solicitacao`),
  ADD CONSTRAINT `orcamento_ibfk_2` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

--
-- Limitadores para a tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_id_Pf` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

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

--
-- Limitadores para a tabela `solicitacoes_servico`
--
ALTER TABLE `solicitacoes_servico`
  ADD CONSTRAINT `solicitacoes_servico_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `services` (`id_Service`),
  ADD CONSTRAINT `solicitacoes_servico_ibfk_2` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `solicitacoes_servico_ibfk_3` FOREIGN KEY (`id_Usr`) REFERENCES `users` (`id_Usr`);
COMMIT;


ALTER TABLE `dados_bancarios`
  ADD KEY `fk_id_Pf_bank` (`id_Pf`);

ALTER TABLE `dados_bancarios`
  ADD CONSTRAINT `fk_id_Pf_bank` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
