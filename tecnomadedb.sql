SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `tecnomadedb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tecnomadedb`;

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL,
  `estrelas` int(11) NOT NULL,
  `data_avaliacao` date NOT NULL,
  `id_Pf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categorias` (
  `id_Cat` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `cat_sel` (
  `id_Cat_Sel` int(11) NOT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `id_Cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(11, 3, 10);

CREATE TABLE `contratacoes` (
  `id_Contratacao` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_Contratacao` date NOT NULL,
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

INSERT INTO `enderecos` (`id_Endereco`, `id_Pf`, `id_Usr`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `num`, `comp`) VALUES
(1, 1, NULL, '08580-730', 'Rua Marciliano Faustino', 'Jardim Ipê', 'Itaquaquecetuba', 'SP', '15', ''),
(2, 2, NULL, '08580-070', 'Rua dos Arquitetos', 'Jardim Itaquá', 'Itaquaquecetuba', 'SP', '194', ''),
(3, 3, NULL, '07190065', 'Rua Cristobal Claudio Elillo', 'Parque Cecap', 'Guarulhos', 'SP', '224', ''),
(4, NULL, 1, '05022-000', 'Avenida Pompéia', 'Vila Pompéia', 'São Paulo', 'SP', '96', '');

CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL,
  `id_solicitacao` int(11) DEFAULT NULL,
  `id_Pf` int(11) DEFAULT NULL,
  `orcamento` decimal(10,0) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

INSERT INTO `prof` (`id_Pf`, `pfName`, `dtNasPf`, `email`, `celPf`, `gender`, `hashPass`, `cnpj`, `imgName`, `categorias`, `descPf`, `avaliacao_media`) VALUES
(1, 'Rodrigo Nunes Almeida', '1995-10-12', 'rdrigo35@gmail.com', '(11) 98859-4468', 'm', 'ed999f05e1ed9818541fcd882b2c780ebac594fc', '45.645.646/0001-46', 'b5d58a2dba09f30c2bff598f81ba85bf.jpg', NULL, 'Sou Rodrigo Nunes Almeida, um profissional especializado em manutenção de servidores, instalação de câmeras e alarmes, infraestrutura de rede e manutenção de redes sem fio. Minha experiência me permite oferecer soluções confiáveis e eficientes para garantir o funcionamento ininterrupto dos sistemas de TI e segurança. Estou comprometido em fornecer serviços de alta qualidade para empresas e organizações, ajudando a maximizar o desempenho de sua infraestrutura tecnológica.', NULL),
(2, 'Marcos Almeida Rocha', '2001-11-12', 'mcal@gmail.com', '(11) 98858-5589', 'm', '5a78d7207d53ee01ca20554180c9f80f44e7e61d', '79.945.646/0001-45', '80b35a95ed3b570c067da1de894c8b03.jpg', NULL, 'Eu sou Marcos, um profissional especializado em desenvolvimento de sistemas, Power BI e computação em nuvem. Minha paixão reside em criar soluções inovadoras e eficientes que atendam às necessidades específicas dos clientes. Com experiência em desenvolvimento de software, análise de dados e implementação de soluções em nuvem, estou comprometido em fornecer resultados de alta qualidade que impulsionem o sucesso dos projetos.', NULL),
(3, 'Ana Nunes Dos Santos', '1999-07-18', 'anunes@gmail.com', '(11) 90658-8689', 'm', 'e41079bf229d6ee9886927bb3326aa951cdae53e', '89.478.946/0001-66', 'eb00fa4b124ef87c7b8d962ff4d1e0e8.jpg', NULL, 'Eu sou Ana Nunes dos Santos, uma entusiasta do desenvolvimento de jogos e sistemas, bem como de aplicações para dispositivos móveis. Minha paixão é criar experiências interativas e cativantes que inspirem e entretenham os usuários. Com experiência em diversas plataformas e tecnologias, estou comprometida em desenvolver produtos inovadores e de alta qualidade que atendam às necessidades e expectativas do mercado.', NULL);

CREATE TABLE `services` (
  `id_Service` int(11) NOT NULL,
  `nomeService` varchar(60) NOT NULL,
  `descService` longtext NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `services` (`id_Service`, `nomeService`, `descService`, `id_Pf`, `id_Cat`) VALUES
(1, 'Manutenção/Suporte para servidores', 'O serviço de Manutenção/Suporte para Servidores oferece uma solução completa para garantir a estabilidade e o desempenho dos servidores de sua empresa. Este serviço abrange o monitoramento contínuo do desempenho dos servidores, a identificação e resolução proativa de problemas, além de atualizações regulares de software e firmware para manter os sistemas seguros e atualizados.', 1, 7),
(2, 'Instalação de Câmeras/Alarmes', 'O serviço de Instalação de Câmeras/Alarmes oferece uma solução abrangente para proteger sua residência ou empresa. Este serviço inclui a instalação profissional de câmeras de vigilância e sistemas de alarme, garantindo a segurança e a tranquilidade do ambiente. Nossos especialistas realizam uma avaliação detalhada das necessidades de segurança do local, seguida pela instalação estratégica dos equipamentos. Além disso, fornecemos orientação sobre o funcionamento dos sistemas e opções de monitoramento remoto para garantir uma proteção contínua.', 1, 8),
(3, 'Instalação de Infraestrutura de rede', 'A infraestrutura de rede oferece uma solução completa para garantir a conectividade confiável e eficiente de sua empresa. Este serviço abrange o projeto, implementação e manutenção de redes locais (LANs) e de área ampla (WANs), garantindo uma comunicação fluida entre os dispositivos e a segurança dos dados. Nossos especialistas realizam uma análise detalhada das necessidades de sua empresa, projetando uma infraestrutura de rede escalável e adaptável às suas demandas atuais e futuras. Além disso, oferecemos suporte técnico contínuo para resolver qualquer problema de conectividade e garantir o funcionamento ininterrupto de sua rede.', 1, 2),
(4, 'Suporte para rede sem fio', 'O serviço de Manutenção de Rede Sem Fio oferece uma solução abrangente para garantir a estabilidade e o desempenho de sua rede Wi-Fi. Este serviço inclui monitoramento contínuo da rede sem fio para identificar e resolver proativamente problemas de conectividade e desempenho. Nossos especialistas realizam ajustes na configuração da rede, otimizando canais e frequências para evitar interferências e garantir uma cobertura uniforme em todo o ambiente.', 1, 3),
(5, 'Desenvolvimento de Sistemas Java', 'Serviço especializados de desenvolvimento de sistemas em Java para atender às necessidades únicas do seu negócio. Com expertise na linguagem Java, desenvolvo soluções robustas e escaláveis, desde aplicativos corporativos até sistemas de gestão. ', 2, 6),
(6, 'Analise de Dados com Power BI', 'Maximize o potencial dos dados com nossas soluções especializadas em Power BI. Visualizações dinâmicas e análises avançadas transformam dados em insights acionáveis para impulsionar estratégias de negócios. De pequenas a grandes empresas, nossas soluções escaláveis fornecem as ferramentas necessárias para tomar decisões informadas e estratégicas.', 2, 9),
(7, 'Cloud Computing com AWS', 'Armazenamento seguro, processamento eficiente e escalabilidade flexível são apenas o começo com os serviços de cloud computing AWS. De startups a grandes corporações, esses serviços oferecem as ferramentas necessárias para impulsionar sua empresa para o futuro. Aproveite ao máximo recursos, reduza custos e aumente a agilidade com esta solução de cloud computing líder de mercado. Entre em contato para saber mais sobre como podemos ajudar a impulsionar o sucesso na nuvem com a AWS.', 2, 12);

CREATE TABLE `servicos_realizados` (
  `id_ServicoRealizado` int(11) NOT NULL,
  `id_contratacao` int(11) NOT NULL,
  `id_Pf` int(11) NOT NULL,
  `id_Usr` int(11) NOT NULL,
  `id_Service` int(11) NOT NULL,
  `data_realizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

INSERT INTO `users` (`id_Usr`, `usrName`, `dtNasUsr`, `email`, `gender`, `imgName`, `celUsr`, `hashPass`, `cpf`) VALUES
(1, 'Joana da Silva Santos', '1985-04-25', 'joanadssantos@email.com', 'm', '6ba10752e261b7cc53a6d7c5a92cabe0.jpg', '(11) 98765-4321', '4c6b8c96eace94c96cdba7ca44af939ed93ea3cb', '219.876.543-21');


ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_id_Pf_avaliacao` (`id_Pf`);

ALTER TABLE `avaliacoes` ADD `mensagem_avaliacao` VARCHAR( 255 ) NOT NULL AFTER `data_avaliacao` ;

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

ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `id_solicitacao` (`id_solicitacao`),
  ADD KEY `id_Pf` (`id_Pf`);

ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portifolio`),
  ADD KEY `fk_id_Pf` (`id_Pf`);

ALTER TABLE `prof`
  ADD PRIMARY KEY (`id_Pf`);

ALTER TABLE `services`
  ADD PRIMARY KEY (`id_Service`),
  ADD KEY `fk_services_prof` (`id_Pf`),
  ADD KEY `fk_services_categoria` (`id_Cat`);

ALTER TABLE `servicos_realizados`
  ADD PRIMARY KEY (`id_ServicoRealizado`),
  ADD KEY `id_contratacao` (`id_contratacao`);

ALTER TABLE `solicitacoes_servico`
  ADD PRIMARY KEY (`id_solicitacao`),
  ADD KEY `id_Service` (`id_Service`),
  ADD KEY `id_Pf` (`id_Pf`),
  ADD KEY `id_Usr` (`id_Usr`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id_Usr`);


ALTER TABLE `avaliacoes`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categorias`
  MODIFY `id_Cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `cat_sel`
  MODIFY `id_Cat_Sel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `contratacoes`
  MODIFY `id_Contratacao` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `enderecos`
  MODIFY `id_Endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `portfolio`
  MODIFY `id_portifolio` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `prof`
  MODIFY `id_Pf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `services`
  MODIFY `id_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `servicos_realizados`
  MODIFY `id_ServicoRealizado` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `solicitacoes_servico`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id_Usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_Pf_avaliacao` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

ALTER TABLE `cat_sel`
  ADD CONSTRAINT `cat_sel_ibfk_1` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `cat_sel_ibfk_2` FOREIGN KEY (`id_Cat`) REFERENCES `categorias` (`id_Cat`);

ALTER TABLE `contratacoes`
  ADD CONSTRAINT `fk_contratacoes_prof` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `fk_contratacoes_services` FOREIGN KEY (`id_Service`) REFERENCES `services` (`id_Service`),
  ADD CONSTRAINT `fk_contratacoes_users` FOREIGN KEY (`id_Usr`) REFERENCES `users` (`id_Usr`);

ALTER TABLE `orcamento`
  ADD CONSTRAINT `orcamento_ibfk_1` FOREIGN KEY (`id_solicitacao`) REFERENCES `solicitacoes_servico` (`id_solicitacao`),
  ADD CONSTRAINT `orcamento_ibfk_2` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_id_Pf` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`);

ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_categoria` FOREIGN KEY (`id_Cat`) REFERENCES `categorias` (`id_Cat`);

ALTER TABLE `servicos_realizados`
  ADD CONSTRAINT `servicos_realizados_ibfk_1` FOREIGN KEY (`id_contratacao`) REFERENCES `contratacoes` (`id_Contratacao`);

ALTER TABLE `solicitacoes_servico`
  ADD CONSTRAINT `solicitacoes_servico_ibfk_1` FOREIGN KEY (`id_Service`) REFERENCES `services` (`id_Service`),
  ADD CONSTRAINT `solicitacoes_servico_ibfk_2` FOREIGN KEY (`id_Pf`) REFERENCES `prof` (`id_Pf`),
  ADD CONSTRAINT `solicitacoes_servico_ibfk_3` FOREIGN KEY (`id_Usr`) REFERENCES `users` (`id_Usr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
