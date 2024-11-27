-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2024 às 20:01
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
-- Banco de dados: `pioneirosmanagment`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `karol_wojtyla`
--

CREATE TABLE `karol_wojtyla` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_cne` int(11) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `cargo` enum('Guia','Subguia','Secretario','Tesoureiro','Guardamaterial','Cozinheiro','Socorrista','Animador') DEFAULT NULL,
  `etapaprogresso` enum('Desprendimento','Conhecimento','Vontade','Construcao') DEFAULT NULL,
  `noitescampo` int(11) DEFAULT NULL,
  `doencas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `equipa` enum('Karol Wojtyla','Nelson Mandela','Salgueiro Maia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nelson_mandela`
--

CREATE TABLE `nelson_mandela` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_cne` int(11) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `cargo` enum('Guia','Subguia','Secretario','Tesoureiro','Guardamaterial','Cozinheiro','Socorrista','Animador') DEFAULT NULL,
  `etapaprogresso` enum('Desprendimento','Conhecimento','Vontade','Construcao') DEFAULT NULL,
  `noitescampo` int(11) DEFAULT NULL,
  `doencas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salgueiro_maia`
--

CREATE TABLE `salgueiro_maia` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_cne` int(11) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `cargo` enum('Guia','Subguia','Secretario','Tesoureiro','Guardamaterial','Cozinheiro','Socorrista','Animador') DEFAULT NULL,
  `etapaprogresso` enum('Desprendimento','Conhecimento','Vontade','Construcao') DEFAULT NULL,
  `noitescampo` int(11) DEFAULT NULL,
  `doencas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `karol_wojtyla`
--
ALTER TABLE `karol_wojtyla`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nelson_mandela`
--
ALTER TABLE `nelson_mandela`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `salgueiro_maia`
--
ALTER TABLE `salgueiro_maia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `karol_wojtyla`
--
ALTER TABLE `karol_wojtyla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nelson_mandela`
--
ALTER TABLE `nelson_mandela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `salgueiro_maia`
--
ALTER TABLE `salgueiro_maia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
