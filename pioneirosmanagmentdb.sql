-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2025 às 20:03
-- Versão do servidor: 11.4.5-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pioneirosmanagmentdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `local` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `noites_campo` int(11) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `imaginario` text NOT NULL,
  `ementa` text NOT NULL,
  `observacoes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `local`, `data_inicio`, `data_fim`, `noites_campo`, `tema`, `imaginario`, `ementa`, `observacoes`, `created_at`) VALUES
(1, 'Qta. dos Alamos', '2025-03-01', '2025-03-03', 2, 'Vaiana', 'Vaiana e os Escuteiros...', 'Dia 1\r\nPeq. Almoco: Casa\r\nAlmoco: casa\r\nJantar: Carbonara\r\n\r\nDia 2\r\nPeq. Almoco: Cereais\r\nAlmoco: Bifanas', 'n/a', '2025-02-27 21:23:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `cargo_id` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`cargo_id`, `cargo`) VALUES
(1, 'Guia'),
(2, 'Sub Guia'),
(3, 'Secretario'),
(4, 'Tesoureiro'),
(5, 'Guarda Material'),
(6, 'Cozinheiro'),
(7, 'Animador'),
(8, 'Socorrista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipas`
--

CREATE TABLE `equipas` (
  `equipa_id` int(11) NOT NULL,
  `equipa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `equipas`
--

INSERT INTO `equipas` (`equipa_id`, `equipa`) VALUES
(1, 'Karol Wojtyla'),
(2, 'Nelson Mandela'),
(3, 'Salgueiro Maia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapas_progresso`
--

CREATE TABLE `etapas_progresso` (
  `etapa_id` int(11) NOT NULL,
  `etapa_progresso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `etapas_progresso`
--

INSERT INTO `etapas_progresso` (`etapa_id`, `etapa_progresso`) VALUES
(1, 'Desprendimento'),
(2, 'Conhecimento'),
(3, 'Vontade'),
(4, 'Construcao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `pioneiro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `pioneiro_id`) VALUES
(1, 'rafaelcosta', '1234', 1),
(2, 'inessimoes', '1234', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pioneiros`
--

CREATE TABLE `pioneiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_cne` int(11) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `noites_campo` int(11) NOT NULL,
  `observacoes` text NOT NULL,
  `cargo_fk` int(11) NOT NULL,
  `equipa_fk` int(11) NOT NULL,
  `etapa_progresso_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pioneiros`
--

INSERT INTO `pioneiros` (`id`, `nome`, `id_cne`, `dt_nascimento`, `noites_campo`, `observacoes`, `cargo_fk`, `equipa_fk`, `etapa_progresso_fk`) VALUES
(1, 'Rafael Costa', 1234, '2007-06-08', 76, 'Goofy ah ?', 2, 1, 4),
(2, 'Ines Simoes', 1234, '2025-03-19', 56, 'pupy ?', 1, 2, 4),
(3, 'Rita Ramos', 1234, '2025-03-19', 85, 'n/a', 1, 3, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargo_id`);

--
-- Índices para tabela `equipas`
--
ALTER TABLE `equipas`
  ADD PRIMARY KEY (`equipa_id`);

--
-- Índices para tabela `etapas_progresso`
--
ALTER TABLE `etapas_progresso`
  ADD PRIMARY KEY (`etapa_id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pioneiro_id` (`pioneiro_id`);

--
-- Índices para tabela `pioneiros`
--
ALTER TABLE `pioneiros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cargo` (`cargo_fk`),
  ADD KEY `fk_etapa` (`etapa_progresso_fk`),
  ADD KEY `fk_equipa` (`equipa_fk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `equipas`
--
ALTER TABLE `equipas`
  MODIFY `equipa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `etapas_progresso`
--
ALTER TABLE `etapas_progresso`
  MODIFY `etapa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pioneiros`
--
ALTER TABLE `pioneiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`pioneiro_id`) REFERENCES `pioneiros` (`id`);

--
-- Limitadores para a tabela `pioneiros`
--
ALTER TABLE `pioneiros`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`cargo_fk`) REFERENCES `cargos` (`cargo_id`),
  ADD CONSTRAINT `fk_equipa` FOREIGN KEY (`equipa_fk`) REFERENCES `equipas` (`equipa_id`),
  ADD CONSTRAINT `fk_etapa` FOREIGN KEY (`etapa_progresso_fk`) REFERENCES `etapas_progresso` (`etapa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
