-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2021 às 18:18
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pacientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes_cadastro`
--

CREATE TABLE `pacientes_cadastro` (
  `paciente_id` int(11) NOT NULL,
  `paciente_data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `paciente_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paciente_nome` varchar(250) NOT NULL,
  `paciente_sobrenome` varchar(250) NOT NULL,
  `paciente_nome_completo` varchar(250) DEFAULT NULL,
  `paciente_data_nascimento` date NOT NULL,
  `paciente_cpf` varchar(20) NOT NULL,
  `paciente_cns` varchar(20) NOT NULL,
  `paciente_cep` varchar(20) NOT NULL,
  `paciente_endereco` varchar(250) NOT NULL,
  `paciente_numero_endereco` varchar(20) NOT NULL,
  `paciente_bairro` varchar(50) NOT NULL,
  `paciente_cidade` varchar(50) NOT NULL,
  `paciente_uf` varchar(2) NOT NULL,
  `paciente_complemento` varchar(100) DEFAULT NULL,
  `paciente_nome_completo_mae` varchar(250) NOT NULL,
  `paciente_imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes_cadastro`
--

INSERT INTO `pacientes_cadastro` (`paciente_id`, `paciente_data_cadastro`, `paciente_data_alteracao`, `paciente_nome`, `paciente_sobrenome`, `paciente_nome_completo`, `paciente_data_nascimento`, `paciente_cpf`, `paciente_cns`, `paciente_cep`, `paciente_endereco`, `paciente_numero_endereco`, `paciente_bairro`, `paciente_cidade`, `paciente_uf`, `paciente_complemento`, `paciente_nome_completo_mae`, `paciente_imagem`) VALUES
(60, '2021-01-27 17:03:33', '2021-01-27 17:03:33', 'Giuseppe', 'Foza', 'Giuseppe Foza', '1995-04-19', '031.681.590-00', '262677787940007', '93052-170', 'Rua Otto Daudt', '1665', 'Feitoria', 'São Leopoldo', 'RS', '', 'Neuza Maria Cezimbra Foza', '58996235.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pacientes_cadastro`
--
ALTER TABLE `pacientes_cadastro`
  ADD PRIMARY KEY (`paciente_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pacientes_cadastro`
--
ALTER TABLE `pacientes_cadastro`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
