-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Ago-2021 às 00:52
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medir_acoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE `acao` (
  `id_acao` int(8) UNSIGNED NOT NULL,
  `id_empresa` int(8) UNSIGNED NOT NULL,
  `simbolo_acao` varchar(5) NOT NULL,
  `valor_atual` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acao`
--

INSERT INTO `acao` (`id_acao`, `id_empresa`, `simbolo_acao`, `valor_atual`) VALUES
(1, 5, 'mFmFw', 853),
(2, 2, 'mFnMh', 64),
(3, 4, 'mFnM5', 353),
(4, 6, 'mFnNI', 462),
(5, 5, 'mFnO8', 456),
(6, 6, 'mFnOl', 743),
(7, 4, 'mFnP5', 534),
(8, 3, 'mFnPN', 530),
(9, 2, 'mFnPz', 277),
(10, 5, 'mFnQY', 810),
(11, 6, 'mFnQz', 750),
(12, 4, 'mFnRT', 389),
(13, 3, 'mFnRm', 915),
(14, 2, 'mFnS7', 153);

-- --------------------------------------------------------

--
-- Estrutura da tabela `balanco`
--

CREATE TABLE `balanco` (
  `id_balanco` int(8) UNSIGNED NOT NULL,
  `id_acao` int(8) UNSIGNED NOT NULL,
  `numero_analistas` int(8) UNSIGNED NOT NULL,
  `data_consenso` datetime NOT NULL,
  `media_consenso_atual` float UNSIGNED NOT NULL,
  `media_consenso_futuro` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `balanco`
--

INSERT INTO `balanco` (`id_balanco`, `id_acao`, `numero_analistas`, `data_consenso`, `media_consenso_atual`, `media_consenso_futuro`) VALUES
(3, 1, 12, '2021-08-17 14:49:12', 708, 853),
(4, 3, 12, '2021-08-17 14:59:17', 397, 353),
(5, 2, 18, '2021-08-17 15:00:23', 240, 64),
(6, 4, 2, '2021-08-17 15:01:00', 400, 462),
(7, 5, 7, '2021-08-17 15:01:28', 138, 456),
(8, 6, 17, '2021-08-17 15:02:07', 6, 743),
(9, 7, 8, '2021-08-17 15:02:26', 372, 534),
(10, 8, 7, '2021-08-17 15:03:06', 511, 530),
(11, 9, 18, '2021-08-17 15:03:23', 533, 277),
(12, 10, 16, '2021-08-17 15:03:57', 671, 810),
(13, 11, 11, '2021-08-17 15:06:17', 712, 750),
(14, 13, 18, '2021-08-17 15:07:26', 657, 915),
(15, 12, 6, '2021-08-17 15:07:52', 525, 389),
(16, 14, 11, '2021-08-17 15:08:43', 282, 153);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(8) UNSIGNED NOT NULL,
  `simbolo_empresa` varchar(5) NOT NULL,
  `CNPJ_empresa` varchar(14) NOT NULL,
  `nome_empresa` text NOT NULL,
  `numero_funcionarios` int(8) UNSIGNED NOT NULL,
  `URL` text NOT NULL,
  `setor` varchar(10) DEFAULT NULL,
  `CEO` text NOT NULL,
  `nome_seguranca` text NOT NULL,
  `DESC_empresa` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `simbolo_empresa`, `CNPJ_empresa`, `nome_empresa`, `numero_funcionarios`, `URL`, `setor`, `CEO`, `nome_seguranca`, `DESC_empresa`) VALUES
(2, 'SNT', '84433950000108', 'Sarah e Nina Telecomunicações ME', 100, 'www.saraheninatelecomunicacoesme.com.br', NULL, 'Sarah', 'Sarah e Nina Telecomunicações ME', 'Atuar no ramo de comunicação'),
(3, 'RCA', '06562041000158', 'Ruan e Carla Assessoria Jurídica Ltda', 32, 'www.ruanecarlaassessoriajuridicaltda.com.br', NULL, 'Ruan', 'Ruan e Carla Assessoria Jurídica Ltda', 'Garantir justiça aos nossos clientes'),
(4, 'MLC', '70030938000130', 'Manuela e Luana Construções ME', 88, 'www.manuelaeluanaconstrucoesme.com.br', NULL, 'Manuela', 'Manuela e Luana Construções ME', 'Garantir teto e lar para todos'),
(5, 'EHT', '88889935000111', 'Emanuelly e Heloise Telecom ME', 43, 'www.emanuellyeheloisetelecomme.com.br', NULL, 'Emanuelly', 'Emanuelly e Heloise Telecom ME', 'Garantir a comunicação de pessoas'),
(6, 'LMA', '24923391000184', 'Liz e Marlene Adega ME', 67, 'www.lizemarleneadegame.com.br', NULL, 'Liz', 'Liz e Marlene Adega ME', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(8) UNSIGNED NOT NULL,
  `id_empresa` int(8) UNSIGNED NOT NULL,
  `nome_rua` text NOT NULL,
  `numero_rua` varchar(5) NOT NULL,
  `CEP` varchar(8) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(2) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `id_empresa`, `nome_rua`, `numero_rua`, `CEP`, `bairro`, `cidade`, `estado`, `pais`) VALUES
(1, 5, 'Rua Mangaba', '677', '81560390', 'Uberaba', 'CT', 'PB', 'Brasil'),
(2, 6, 'Rua Rural', '662', '38401861', 'Jardim Brasília', 'UB', 'MG', 'Brasil'),
(3, 4, 'Rua G', 'Rua G', '65037006', 'Liberdade', 'SL', 'MA', 'Brasil'),
(4, 3, 'Rua Coronel Gomes Machado', '750', '24020067', 'Centro', 'NT', 'RJ', 'Brasil'),
(5, 2, 'Quadra QR 308 Conjunto 6', '533', '72306606', 'Samambaia Sul (Samam', 'BR', 'DF', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id_telefone` int(8) UNSIGNED NOT NULL,
  `id_empresa` int(8) UNSIGNED NOT NULL,
  `DDD_telefone` varchar(2) NOT NULL,
  `numero_telefone` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id_telefone`, `id_empresa`, `DDD_telefone`, `numero_telefone`) VALUES
(1, 5, '39', '133468171'),
(2, 6, '36', '562583784'),
(3, 4, '46', '408508392'),
(4, 3, '40', '234111252'),
(5, 2, '51', '736344811');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao`
--
ALTER TABLE `acao`
  ADD PRIMARY KEY (`id_acao`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indexes for table `balanco`
--
ALTER TABLE `balanco`
  ADD PRIMARY KEY (`id_balanco`),
  ADD KEY `id_acao` (`id_acao`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id_telefone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao`
--
ALTER TABLE `acao`
  MODIFY `id_acao` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `balanco`
--
ALTER TABLE `balanco`
  MODIFY `id_balanco` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id_telefone` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `acao`
--
ALTER TABLE `acao`
  ADD CONSTRAINT `acao_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Limitadores para a tabela `balanco`
--
ALTER TABLE `balanco`
  ADD CONSTRAINT `balanco_ibfk_1` FOREIGN KEY (`id_acao`) REFERENCES `acao` (`id_acao`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
