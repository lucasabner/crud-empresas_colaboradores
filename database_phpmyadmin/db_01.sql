-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2021 às 15:34
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `colaborador_id` int(11) NOT NULL,
  `cpf` text NOT NULL,
  `nome` text NOT NULL,
  `email` text DEFAULT NULL,
  `telefone` text DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `empresa_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`colaborador_id`, `cpf`, `nome`, `email`, `telefone`, `endereco`, `empresa_id`) VALUES
(43, '128.041.846-09', 'Lucas Abner', 'lucasabner98@outlook.com', '(33) 32314-2342', 'Rua Doutor Mario Wellington, 523, Planalto, MG-BR', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL,
  `cnpj` text NOT NULL,
  `email` text DEFAULT NULL,
  `nome` text NOT NULL,
  `endereco` text DEFAULT NULL,
  `telefone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`empresa_id`, `cnpj`, `email`, `nome`, `endereco`, `telefone`) VALUES
(10, '32.131.231/2312-31', 'negociosbrasil@gmail.com', 'Negócios Brasil', 'Rua Mauricio de Souza, 763, Lobato, MG -BR', '(31) 31344-3231');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`colaborador_id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`empresa_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `colaborador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
