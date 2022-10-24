-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2022 às 15:29
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empresadecontas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf_cnpj` text NOT NULL,
  `cep` int(11) NOT NULL,
  `rua` text NOT NULL,
  `numero_casa` varchar(11) NOT NULL,
  `bairro` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL,
  `telefone` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` text NOT NULL,
  `banco` int(11) NOT NULL,
  `agencia` int(11) NOT NULL,
  `conta` int(11) NOT NULL,
  `tipo_conta` text NOT NULL,
  `status_cliente` text NOT NULL,
  `exclusao_cliente` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf_cnpj`, `cep`, `rua`, `numero_casa`, `bairro`, `cidade`, `estado`, `telefone`, `celular`, `email`, `banco`, `agencia`, `conta`, `tipo_conta`, `status_cliente`, `exclusao_cliente`) VALUES
(1, 'FMP', '00000000000', 88130475, 'R. João Pereira dos Santos', '305', 'Pte. do Imaruim', 'Palhoça', 'SC', 32200376, 0, 'contato@fmpsc.edu.br ', 0, 0, 0, 'corrente', 'ativo', '0000-00-00 00:00:00'),
(2, 'Prefeitura Palhoça', '1111111111111', 88130000, 'Av. Hilza Terezinha Pagani', '280', 'Pagani', 'Palhoça', 'SC', 32200300, 32200300, 'pmp@palhoca.sc.gov.br', 1, 1, 1, 'corrente', 'ativo', '0000-00-00 00:00:00'),
(3, 'Cliente 2', '22222222222', 22222222, 'Avenida 2', '2', 'Bairro 2', 'Cidade 2', 'Estado 2', 22222222, 22222222, 'cliente2@gmail.com', 2, 2, 2, 'corrente', 'ativo', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_contas` int(11) NOT NULL,
  `id_cliente_fk` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `vencimento` date NOT NULL,
  `data_recebimento` datetime DEFAULT NULL,
  `valor` float NOT NULL,
  `forma_pagamento` text NOT NULL,
  `status_pagamento` text NOT NULL,
  `tipo_de_conta` text NOT NULL,
  `status_conta` text NOT NULL,
  `exclusao_conta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id_contas`, `id_cliente_fk`, `descricao`, `vencimento`, `data_recebimento`, `valor`, `forma_pagamento`, `status_pagamento`, `tipo_de_conta`, `status_conta`, `exclusao_conta`) VALUES
(1, 1, '--', '2022-10-25', NULL, 100, 'cartao_credito', 'Pendente', 'despesa_fixa', 'ativo', '0000-00-00 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_contas`),
  ADD KEY `id_cliente_fk` (`id_cliente_fk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id_contas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contas`
--
ALTER TABLE `contas`
  ADD CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente_fk`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
