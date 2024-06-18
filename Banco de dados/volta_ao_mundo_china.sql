-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2024 às 04:24
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `volta_ao_mundo_china`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `aprovada` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mensagem`
--

INSERT INTO `tb_mensagem` (`Id`, `nome`, `email`, `comentario`, `aprovada`) VALUES
(1, 'Maria do Bairro', 'maria@bairro.com', 'Muito legal o site, não sabia que existia lugares tão bacanas   para se conhecer na China. \r\n', 1),
(2, 'Fabricio Andrade', 'anfa@hotmail.com', 'Legal !!!', 0),
(3, 'Ulisses de Itaca', 'uli@itaca.net', 'Pelos Deuses, tenho que visitar essas terras!!!', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `Id` int(11) NOT NULL,
  `nomeCompleto` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(260) NOT NULL,
  `permissao` enum('adm','usu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`Id`, `nomeCompleto`, `usuario`, `senha`, `permissao`) VALUES
(7, 'Andre Fonseca', 'Zarg', '$2y$10$Ei6McrEJawIgG9W1KgFbMezp8QFOWwvK6kHmr0x/.LT1OglMXCTou', 'adm'),
(10, 'Samuel Jr.', 'Samuka', '$2y$10$iRtiiUWX8zomG60PVueDnO/riD6ElSQ4z7Ahto7aqePgLa.cz.IB6', 'usu');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
