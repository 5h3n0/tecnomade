-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jun-2024 às 20:17
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
(3, 5, '2024-06-10', 'ótimo serviço, superou minhas expectativas!!', 3),
(4, 5, '2024-06-20', 'ótimo atendimento, profissional muito bem qualificada, realizou o serviço muito bem.', 12),
(5, 4, '2024-06-20', 'excelente profissional, atendimento bacana.', 9),
(6, 3, '2024-06-22', 'Gostei bastante, não tive tanto feedback do profissional.', 14),
(7, 3, '2024-06-22', 'Nada a declarar, apenas não gostei muito.', 3),
(8, 5, '2024-06-24', 'ótimo trabalho, conseguiu resolver o problema do meu computador e ainda fez uma limpeza nele. sem palavras, valeu o preço. ', 6),
(9, 5, '2024-06-24', 'ótimo trabalho, recomendo conseguiu me ajudar a deixar o designer excelente.', 6),
(10, 5, '2024-06-24', 'recomendo fazer a instalação de câmeras com o Ismael, fez o serviço bem rápido na minha empresa. sem contar a educação e organização. ótimo profissional', 6),
(12, 5, '2024-06-24', 'Fez um site extremamente lindo amei o serviço, muito satisfeita, saiu um pouco caro mas valeu a pena.', 7),
(13, 3, '2024-06-03', 'Não gostei muito do serviço, mas o empenho do profissional foi evidente.', 2),
(14, 4, '2024-06-03', 'Gostei muito, obrigada!', 13),
(15, 5, '2024-02-02', 'Ofereceu um auxílio incrível na gestão de dados da minha empresa!', 11);

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
(14, 5, 12),
(15, 6, 1),
(16, 6, 8),
(17, 6, 10),
(18, 6, 11),
(19, 7, 4),
(20, 7, 6),
(21, 7, 7),
(22, 7, 12),
(23, 8, 6),
(24, 8, 10),
(25, 8, 11),
(26, 8, 12),
(27, 9, 4),
(28, 9, 5),
(29, 9, 6),
(30, 9, 9),
(31, 9, 10),
(32, 9, 12),
(33, 10, 4),
(34, 10, 5),
(35, 10, 10),
(36, 11, 2),
(37, 11, 3),
(38, 11, 9),
(39, 11, 12),
(40, 10, 9),
(41, 12, 1),
(42, 12, 2),
(43, 12, 7),
(44, 13, 11),
(45, 14, 2),
(46, 14, 3),
(47, 14, 5),
(48, 14, 8);

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
(3, 4, 8, 55000, '2024-06-10', 3),
(4, 5, 20, 50000, '2024-06-20', 12),
(5, 5, 15, 70000, '2024-06-20', 9),
(6, 5, 14, 100000, '2024-06-20', 9),
(7, 6, 26, 90000, '2024-06-22', 14),
(8, 6, 9, 90000, '2024-06-22', 3),
(9, 2, 10, 20000, '2024-06-24', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_bancarios`
--

CREATE TABLE `dados_bancarios` (
  `id_bank` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `conta` varchar(255) NOT NULL,
  `agencia` varchar(255) NOT NULL
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
(2, 2, NULL, '08580-070', 'Rua dos Arquitetos', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '194', ''),
(3, 3, NULL, '07190065', 'Rua Cristobal Claudio Elillo', 'Parque Cecap', 'Guarulhos', 'SP', '224', ''),
(4, NULL, 1, '05022-000', 'Avenida Pompéia', 'Vila Pompéia', 'São Paulo', 'SP', '96', ''),
(5, 4, NULL, '08586010', 'Avenida Cardeal', 'Parque São Pedro', 'Itaquaquecetuba', 'SP', '150', ''),
(6, NULL, 2, '08586-180', 'Rua do Bronze', 'Parque São Pedro', 'Itaquaquecetuba', 'SP', '250', ''),
(7, NULL, 3, '01001-000', 'Praça da Sé', 'Sé', 'São Paulo', 'SP', '1150', ''),
(8, 5, NULL, '08580-050', 'Rua dos Engenheiros', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '1245', ''),
(9, NULL, 4, '01001-000', 'Praça da Sé', 'Sé', 'São Paulo', 'SP', '767', ''),
(10, 6, NULL, '07132230', 'Rua Siderópolis', 'Jardim Jovaia', 'Guarulhos', 'SP', '45', ''),
(11, 7, NULL, '01310-930', 'Avenida Cardeal', 'Parque São Pedro', 'Itaquaquecetuba', 'SP', '85', 'Casa B'),
(12, 8, NULL, '01310-930', 'Avenida Paulista', 'Bela Vista', 'São Paulo', 'SP', '123', 'Bloco B'),
(15, 9, NULL, '08596680', 'Rua Renato Russo', 'Jardim Santa Rita', 'Itaquaquecetuba', 'SP', '688', ''),
(17, 10, NULL, '04020-050', 'Rua Professor Francisco de Castro', 'Vila Mariana', 'São Paulo', 'SP', '131', ''),
(18, 11, NULL, '02179050', 'Rua Soldado Sebastião Garcia', 'Parque Novo Mundo', 'São Paulo', 'SP', '', ''),
(19, 12, NULL, '08574150', 'Rua Cambará', 'Jardim Aracaré', 'Itaquaquecetuba', 'SP', '800', ''),
(20, 13, NULL, '08573250', 'Rua Itamogi', 'Vila Virgínia', 'Itaquaquecetuba', 'SP', '12', 'Casa dos fundos'),
(21, NULL, 5, '08596-682', 'Rua Cely Campello', 'Jardim Santa Rita', 'Itaquaquecetuba', 'SP', '90', ''),
(22, 14, NULL, '14090-344', 'Rua José da Silva', 'Jardim Paulistano', 'Ribeirão Preto', 'SP', '98', 'bloco A, ap. 31'),
(23, NULL, 6, '08580-730', 'Rua Marciliano Faustino', 'Jardim Ipê', 'Itaquaquecetuba', 'SP', '73', '');

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
(3, 3, 3, 55000, 'Aceito', 'Boa tarde, parece ser algo simples, irei estruturar o projeto e logo envio um feedback.'),
(4, 4, 12, 50000, 'Aceito', 'obrigada pela preferencia'),
(5, 5, 9, 70000, 'Aceito', 'obrigada pela preferencia'),
(6, 7, 9, 100000, 'Aceito', 'aaaaaaaaa'),
(7, 8, 14, 90000, 'Aceito', 'Olá, tudo bem? Em aproximadamente dois meses consigo entregar, pois trabalho sozinha.'),
(8, 9, 3, 90000, 'Aceito', 'dasdasdasdasdasdasdas'),
(9, 10, 6, 20000, 'Aceito', 'então, eu vou ter que diagnosticar ele primeiro mas se for problema na fonte ou placa mãe vai sair em torno de 200 a 800 reais dependo do problema');

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
(3, 'Infraestrutura de Rede', 'Cabeamento estruturado com pontos de câmera e redes.', '2019-04-17', '4a257554a82331589d68a72d33479deb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Projeto em Java', 'Um pequeno projeto que trabalho em Java desde 2002, mantenho ele sempre atualizado.', '2002-05-10', '39a28dd3d437512fa49e09ad0298cbcb.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(5, 'Aplicação android', 'App para recomendação de filmes', '2023-05-24', '91fc22b1a594434d6a0ed3fa58589d54.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(6, 'Cafeteria Mundo do Café', 'um projeto Web sobre uma cafeteria, para amantes de Café', '2009-07-15', '83bd8a4bee0139bfea1552d423fe0e0a.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(7, 'Manutenção de Servidores', 'Manutenção de Servidores, atualizando e fazendo checagem', '2009-04-28', '60ad9395b15bcd543d9d9db9822be307.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(8, 'Cloud Computing', 'Cloud Computing e manutenção de dados', '2010-03-18', '7da78c9c3629898887b5ef01e0f4bab8.jfif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(9, 'Power BI', 'Power BI é uma ferramenta de análise de dados para gerenciar qualquer negocio.', '2022-01-25', 'f3f324751332986cffb1ff240e53a3b0.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(10, 'Design front-end', 'Design de página feito em bootstrap', '2024-02-27', '72e9032be0fabc4c3ceb52b38ab1d0f1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(11, 'Aplicativo para viagem ', 'Um aplicativo que auxilia no encontro de voos e hoteis.', '2020-05-25', '9cb02d0fd248393aa122c8c500812e50.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(12, 'Jogo plataforma', 'Jogo plataforma feito para computadores Windows', '2024-04-10', '7e684a9287327cfe966a00caef3816ce.jfif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(13, 'Desenvolvimento web', ' site de imagens que desenvolvemos para ter uma vasta coleção de imagens de alta qualidade.', '2024-02-15', '6f946637ccbceda09e58ba153f8c4d53.png', '2cccb618c35dd43a04968668c1347306.jpg', '949dbd3aac6acb026c20f17960353b46.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(14, 'Designer para usar de fundo', 'Desenvolvi uma arte para ser usada como plano de fundo no site.', '2024-02-13', 'febf7a7c8952b18ffadd3d6825a13ab8.jpg', '3ab84e13041f305da19823be25e4ec48.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(15, 'Desenvolvimento em java', 'Desenvolvi um sistema para uma corporação que precisava interligar alguns projetos internos deles.', '2024-05-22', '89a5095889a727ca2a73e4da7c18645f.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(16, 'Power BI em python', 'Desenvolvimento de gráfico dinâmicos e de melhor e mais atrativa visualização.', '2024-06-23', '65f2a89a5f9adc2d2a46caf7a99352d1.jpg', '313bd1e89dd7d060b6dc78911b40d708.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(17, 'Manuteção de computador', 'Troquei as memórias e fiz uma limpeza profunda neste computador. ', '2024-06-12', '993b0507cb86e31ae11a6324781a3a0c.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);

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
(5, 'Rafael Sousa Oliveira', '1998-02-05', 'rol@gmail.com', '(11) 98454-5689', 'm', 'fc6961fc54edac9228fd2d798fb3441f4940405f', '78.445.646/0001-25', 'b48bee7eaa944376ecaf9be3521d1e35.jpg', NULL, 'Sou Rafael Sousa, um profissional especializado em desenvolvimento de sistemas, Power BI e computação em nuvem. Minha paixão reside em criar soluções inovadoras e eficientes que atendam às necessidades específicas dos clientes. Com experiência em desenvolvimento de software, análise de dados e implementação de soluções em nuvem, estou comprometido em fornecer resultados de alta qualidade que impulsionem o sucesso dos projetos.', NULL),
(6, 'Ismael Santana', '1986-06-15', 'santana@hotmail.com', '(13) 95886-4235', 'm', '7c222fb2927d828af22f592134e8932480637c0d', '78.954.621/3545-68', 'a7ad747a97431481f36bbc63bba97478.webp', NULL, 'Trabalho há alguns anos na área de tecnologia e sempre busquei desempenhar o melhor de mim enquanto realizo meus serviços. Além de ajudar gosto sempre de ensinar o que puder.', NULL),
(7, 'Henrique Souza', '2000-05-10', 'henriquesouza23@gmail.com', '(11) 98745-6321', 'm', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '78.542.361/2423-14', '8e16e18b865911de8088eb500ad3d3c7.jpg', NULL, 'Sou um profissional versátil e experiente em desenvolvimento de sistemas, manutenção de servidores e cloud computing. minha habilidade em integrar tecnologias avançadas, como AWS e Kubernetes, demonstra minha capacidade de implementar soluções robustas e escaláveis. Sou eficiente na resolução de problemas complexos e estou sempre atualizado com as melhores práticas do setor, garantindo operações fluidas e eficazes em ambientes tecnologicamente exigentes.', NULL),
(8, 'Lizandro Nogueira', '1997-03-28', 'lizandroNog@gmail.com', '(21) 91046-8712', 'm', 'ce5784e1f6bdacc4e99918d8bafe1e25b6df2e1d', '15.789.463/2564-85', 'c47660b2d29b55b90720f07753809dd6.jpg', NULL, 'Sou um desenvolvedor completo, faço softwares inteiros e me dou bem com a programação, adoro o que faço e gosto mais ainda de me aprimorar nisso, e é isso que faz eu me considerar um bom profissional.', NULL),
(9, 'Carla Silva', '2000-05-13', 'carlasilva@gmail.com', '(11) 91334-7137', 'f', 'c7313f0bd8f3cdc8a1fa6e8912043db8e57b4e8c', '24.511.180/0411-40', 'dc9494fe9e1349c3c37580ec2e5d17ae.avif', NULL, 'desenvolvimento web de alta qualidade, criação de jogos envolventes, visualização de dados com Power BI para insights estratégicos, design intuitivo de interfaces e implementação eficiente de soluções em nuvem. Transformamos ideias em realidade digital de forma eficaz e inovadora, impulsionando o sucesso dos nossos clientes.', NULL),
(10, 'Ana Carolina Santos Lima', '1998-03-15', 'anaclima@email.com', '(11) 98854-4658', 'f', '2d31bd06e3c6fa468c4219bc3f154b5dcfc9259b', '47.884.445/2145-69', 'b39c9d42c35572d9db0efe01c1febe6c.jpg', NULL, 'Sou apaixonada pelo ramo de tecnologia e desejo oferecer qualidade de serviço, tenho prazer em oferecer e dispor o meu melhor.', NULL),
(11, 'Luana Prado', '1995-03-08', 'lupraddo178@hotmail.com', '(21) 89459-6545', 'f', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '45.687.895/4532-14', '531d3aff44cf790018702904ce9207e4.jpeg', NULL, 'Oi!! Me chamo Luana e to há mais ou menos 3 anos trabalhando na área e atualmente to buscando ajudar quem precisa e assim também expando meu portfólio.', NULL),
(12, 'Raissa Costa Duarte', '2004-03-22', 'raissacduarte@gmail.com', '(11) 91347-1382', 'f', '7206a3230ff8c3fb297d8300d5e8a44bc50c5aff', '12.457.438/9560-44', '0289ce917d6f081561b4a323f68e09d7.jpg', NULL, 'Serviços de qualidade e essenciais para empresas, incluindo manutenção de desktops/notebooks, infraestrutura de rede e manutenção de servidores. Garanto a operação contínua e eficiente de sua tecnologia, mantendo seus sistemas sempre seguros e funcionando sem interrupções.', NULL),
(13, 'Ana Lombato de Souza', '1995-09-05', 'lomana@yahoo.com', '(11) 59687-4562', 'f', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '45.978.565/2135-48', '9300793620c2c72caf2dbefc6a81e014.jpeg', NULL, 'Me chamo Ana e to na área há uns anos, meu interesse aumentou assim que terminei o ensino médio e comecei a estudar mais sobre, e foi ai que notei que era a minha área. Procurei me especializar no que mais gosto que é o desenvolvimento de aplicações mobile então espero poder te ajudar no desenvolvimento do seu aplicativo. ', NULL),
(14, 'Sara Gomes Costa', '2002-09-01', 'saracosta@gmail.com', '(16) 90254-6523', 'f', '43347d748cab5de4e85cf4b31b363a2c869f12db', '05.516.254/8202-36', '791b98b29444a93c415cd4447a3a1e09.jpg', NULL, 'Especialista em infraestrutura de todos os tipos de redes e com experiência em desenvolvimento de games.', NULL);

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
(9, 'Desenvolvimento de Jogos MMORPG', 'O serviço de Desenvolvimento de Jogos oferece uma solução completa, empregando tecnologias avançadas e ferramentas líderes de mercado. Utilizando de PixelArt e C#, como principais pontos.  ', 3, 5),
(10, 'Manutenção de computadores e notebooks', 'Qualquer problema  que você tenha com seu desktop ou note, entra em contato que eu resolvo o trabalho', 6, 1),
(11, 'Auxiliar no desenvolvimento dos processos de UI/UX', 'Ajudo no desenvolvimento de toda parte UI e UX sem deixar de lado a peça mais fundamental quando falamos disso, que é o usuário final.', 6, 10),
(12, 'Desenvolvimento de games', 'experiências de jogo emocionantes e envolventes, desde conceitos originais até a entrega final. Utilizando tecnologias de ponta para desenvolver jogos que combinam arte visual impressionante, mecânicas de jogo inovadoras e uma experiência imersiva para os jogadores. ', 9, 5),
(13, 'desenvolvimento de aplicação para android', 'qualquer tipo de aplicação para android.', 8, 11),
(14, 'Desenvolvimento web', ' é focado na criação de websites modernos, responsivos e funcionais. Utilizando as últimas tecnologias para garantir que cada projeto não apenas atenda, mas exceda suas expectativas . Desde o design inicial até a implementação final, o objetivo é proporcionar uma experiência de usuário intuitiva e eficiente, ajudando empresas a alcançarem seus objetivos online de forma eficaz.', 9, 4),
(15, 'Power BI', 'Power BI envolve a transformação de dados em insights acionáveis. Crio dashboards e relatórios personalizados que ajudam a entenderem melhor seus dados e a tomarem decisões estratégicas informadas. Utilizamos o Power BI para visualizar informações complexas de maneira clara e intuitiva, capacitando as empresas a otimizarem suas operações e alcançarem melhores resultados.', 9, 9),
(16, 'desenvolvimento front-end', 'desenvolvimento front-end utilizando frameworks e tecnologias recentes, como: Laravel, TypeScript e Bootstrap', 8, 10),
(17, 'auxiliar na estruturação de uma rede ', 'Vou te ajudar diretamente na estruturação de uma boa infraestrutura de rede. ', 11, 2),
(18, 'Análise de dados com Python e Power Bi', 'Desenvolvo métodos para uma análise de dados completa utilizando um Plataforma desenvolvida com a linguagem Python e Power BI. ', 10, 9),
(19, 'auxílio no Power BI', 'Vou te ajudar no desenvolvimento do seu power BI para sua empresa.', 11, 9),
(20, 'Manutenção de Desktop/Notebook', 'realizo diagnósticos, reparos de hardware e software, instalação de sistemas operacionais e aplicativos, além de garantir a segurança e realizar backups de dados, proporcionando suporte técnico essencial.', 12, 1),
(21, 'AWS', 'Ofereço disponibilidade de serviços utilizando ferramenta de AWS.', 7, 12),
(22, 'infraestrutura de rede', 'Soluções completas em infraestrutura de rede para empresas. Desde o planejamento estratégico até a implementação e suporte contínuo, sou especializada em redes eficientes e seguras para o seu negócio prosperar. Conte comigo para maximizar o desempenho da sua infraestrutura de TI.', 12, 2),
(23, 'Manutenção de servidores', 'Ofereço um serviço completo de manutenção de servidores para empresas, focado na garantia de estabilidade e desempenho contínuo da infraestrutura de TI. Incluindo monitoramento proativo , gestão de atualizações e patches, manutenção preventiva e corretiva, além de suporte técnico especializado para resolver incidentes rapidamente. Minha abordagem visa minimizar o tempo de inatividade não planejado e maximizar a segurança e eficiência dos seus sistemas.', 12, 7),
(24, 'Desenvolver aplicativos para mobile ', 'Vou desenvolver o aplicativo que você precisar ', 13, 11),
(25, 'Infraestrutura de rede', 'Todo tipo de infra pode ser realizado por mim, desde um pequeno escritório, até grandes servidores.', 14, 2),
(26, 'Desenvolvimento de games plataforma', 'Desenvolvimento de jogos simples para Windows.', 14, 5);

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
(3, 3, 3, 4, 8, '2024-06-10'),
(4, 4, 12, 5, 20, '2024-06-20'),
(5, 5, 9, 5, 15, '2024-06-20'),
(9, 7, 14, 6, 26, '2024-06-22'),
(10, 7, 14, 6, 26, '2024-06-22'),
(12, 8, 3, 6, 9, '2024-06-22'),
(13, 9, 6, 2, 10, '2024-06-24');

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
(3, 8, 3, 4, 'O serviço de Desenvolvimento Web utiliza as mais recentes tecnologias e frameworks, incluindo HTML5, CSS3, JavaScript e php, para criar websites e aplicações web de alto desempenho. Com um monitoramento contínuo do progresso do projeto, identificamos e resolvemos proativamente quaisquer desafios, garantindo um desenvolvimento suave e eficaz. Além disso, oferecemos atualizações regulares de software e implementação de novos recursos para manter seu site ou aplicação atualizados e relevantes.', 'Olá, preciso de um blog privado para mim e meus amigos.  Não tenho restrições, pois preciso de algo simples.', '2024-06-10', 'Orçamento Enviado'),
(4, 20, 12, 5, 'realizo diagnósticos, reparos de hardware e software, instalação de sistemas operacionais e aplicativos, além de garantir a segurança e realizar backups de dados, proporcionando suporte técnico essencial.', 'troca de placa de vídeo, e memória ram', '2024-06-20', 'Orçamento Enviado'),
(5, 15, 9, 5, 'Power BI envolve a transformação de dados em insights acionáveis. Crio dashboards e relatórios personalizados que ajudam a entenderem melhor seus dados e a tomarem decisões estratégicas informadas. Utilizamos o Power BI para visualizar informações complexas de maneira clara e intuitiva, capacitando as empresas a otimizarem suas operações e alcançarem melhores resultados.', 'preciso de um modelo de power BI para as finanças da minha empresa', '2024-06-20', 'Orçamento Enviado'),
(6, 23, 12, 5, 'Ofereço um serviço completo de manutenção de servidores para empresas, focado na garantia de estabilidade e desempenho contínuo da infraestrutura de TI. Incluindo monitoramento proativo , gestão de atualizações e patches, manutenção preventiva e corretiva, além de suporte técnico especializado para resolver incidentes rapidamente. Minha abordagem visa minimizar o tempo de inatividade não planejado e maximizar a segurança e eficiência dos seus sistemas.', 'aaaaaaaaaaaaaa', '2024-06-20', 'Pendente'),
(7, 14, 9, 5, ' é focado na criação de websites modernos, responsivos e funcionais. Utilizando as últimas tecnologias para garantir que cada projeto não apenas atenda, mas exceda suas expectativas . Desde o design inicial até a implementação final, o objetivo é proporcionar uma experiência de usuário intuitiva e eficiente, ajudando empresas a alcançarem seus objetivos online de forma eficaz.', 'aaaaaaaaaaaaaaaaaaaaaaa', '2024-06-20', 'Orçamento Enviado'),
(8, 26, 14, 6, 'Desenvolvimento de jogos simples para Windows.', 'preciso de um jogo parecido com metal slug, como no máximo 6 fases.', '2024-06-22', 'Orçamento Enviado'),
(9, 9, 3, 6, 'O serviço de Desenvolvimento de Jogos oferece uma solução completa, empregando tecnologias avançadas e ferramentas líderes de mercado. Utilizando de PixelArt e C#, como principais pontos.  ', 'asddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddsadasdasdas', '2024-06-22', 'Orçamento Enviado'),
(10, 10, 6, 2, 'Qualquer problema  que você tenha com seu desktop ou note, entra em contato que eu resolvo o trabalho', 'Quero veja qual problema meu computador tem, ele não quer ligar, talvez a fonte que tenha queimado', '2024-06-24', 'Orçamento Enviado'),
(11, 7, 2, 2, 'Armazenamento seguro, processamento eficiente e escalabilidade flexível são apenas o começo com os serviços de cloud computing AWS. De startups a grandes corporações, esses serviços oferecem as ferramentas necessárias para impulsionar sua empresa para o futuro. Aproveite ao máximo recursos, reduza custos e aumente a agilidade com esta solução de cloud computing líder de mercado. Entre em contato para saber mais sobre como podemos ajudar a impulsionar o sucesso na nuvem com a AWS.', 'Preciso que desenvolva um sistema bancário, interno , para minha empresa ', '2024-06-24', 'Pendente'),
(12, 14, 9, 2, ' é focado na criação de websites modernos, responsivos e funcionais. Utilizando as últimas tecnologias para garantir que cada projeto não apenas atenda, mas exceda suas expectativas . Desde o design inicial até a implementação final, o objetivo é proporcionar uma experiência de usuário intuitiva e eficiente, ajudando empresas a alcançarem seus objetivos online de forma eficaz.', 'preciso de uma pag que seja com um e commerce, tenho uma loja de relógios e preciso que você faça uma pagina web mostrando os produtos que tenho e os preços ', '2024-06-24', 'Pendente');

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
(4, 'Marina Oliveira Costa', '1988-06-05', 'marinacosta@email.com', 'f', 'df9b831bd09209cc4cb3216237d63e60.jpg', '(11) 98765-4321', 'd8eb84b7736b6e5a8c3fdf47f0fccf987ae4aa2d', '321.654.987-00'),
(5, 'Gabriela Duccini Duarte', '2005-02-22', 'gabiducciniduarte30@gmail.com', 'f', '99ff91815df5878984d43a83f30240a0.webp', '(11) 91334-7137', '0c24b51bc25fd6fba0df4a11f3ede8ddf3b73b03', '529.734.729-90'),
(6, 'Sheno da SIlva Carvalho', '2005-11-12', 's.silvac@outlook.com', 'm', 'c44d61a94303d8090e2ccc50aae3cd09.webp', '(11) 93062-1466', 'fbcab2c304989652b76c3fff7267b5fee1b3262a', '479.187.418-89');

--
-- Índices para tabelas despejadas
--

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
-- Índices para tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  ADD PRIMARY KEY (`id_bank`),
  ADD KEY `fk_id_Pf_bank` (`id_Pf`);

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
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_Cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cat_sel`
--
ALTER TABLE `cat_sel`
  MODIFY `id_Cat_Sel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `contratacoes`
--
ALTER TABLE `contratacoes`
  MODIFY `id_Contratacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_Endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portifolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `prof`
--
ALTER TABLE `prof`
  MODIFY `id_Pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  MODIFY `id_ServicoRealizado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `solicitacoes_servico`
--
ALTER TABLE `solicitacoes_servico`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_Usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Limitadores para a tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  ADD CONSTRAINT `fk_id_Pf_bank` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
