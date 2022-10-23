-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Out-2022 às 02:20
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
(1, 'camila', '21474836471', 88132149, 'Avenida Atílio Pedro Pagani', '1243', 'Pagani', 'Palhoça', 'SC', 11111, 1111, '11111@11111', 1111, 1111, 1111, 'poupança', 'ativo', '0000-00-00 00:00:00'),
(2, 'papapa', '11111111111', 88132149, 'Avenida Atílio Pedro Pagani', '12', 'Pagani', 'Palhoça', 'SC', 2147483647, 2147483647, 'sdasd@gm', 0, 12312312, 23123123, 'corrente', 'ativo', '0000-00-00 00:00:00'),
(3, 'shaushasuahsuahs', '11111111122', 88132149, 'Avenida Atílio Pedro Pagani', '1111', 'Pagani', 'Palhoça', 'SC', 1111, 1, '111@1111', 11111, 1111, 111, 'corrente', 'ativo', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_contas` int(11) NOT NULL,
  `id_cliente_fk` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `vencimento` date NOT NULL,
  `data_recebimento` datetime NOT NULL,
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
(1, 1, 'aaaaaa', '2022-10-23', '0000-00-00 00:00:00', 50, 'boleto', 'pendente', 'receita', 'ativo', '0000-00-00 00:00:00'),
(2, 1, 'aaaaaa', '2022-10-23', '0000-00-00 00:00:00', 500, 'boleto', 'pendente', 'despesa_fixa', 'ativo', '0000-00-00 00:00:00'),
(3, 1, 'aaaaaa', '2022-10-23', '0000-00-00 00:00:00', 1200, 'boleto', 'pendente', 'despesa_variavel', 'ativo', '0000-00-00 00:00:00'),
(4, 1, 'aaaaaaa', '2022-10-26', '0000-00-00 00:00:00', 45, 'boleto', 'pendente', 'receita', 'ativo', '0000-00-00 00:00:00'),
(5, 3, 'aaaaaaaa', '2022-10-24', '0000-00-00 00:00:00', 45, 'boleto', 'pendente', 'receita', 'ativo', '0000-00-00 00:00:00'),
(6, 3, 'asasasasa', '2022-11-01', '0000-00-00 00:00:00', 5000, 'boleto', 'pendente', 'receita', 'ativo', '0000-00-00 00:00:00'),
(7, 2, 'SADAASDASD', '2022-10-27', '0000-00-00 00:00:00', 10000, 'boleto', 'pendente', 'receita', 'ativo', '0000-00-00 00:00:00'),
(8, 1, '4WQRRWQWER', '2022-10-28', '0000-00-00 00:00:00', 1000, 'pix/ted/doc', 'pendente', 'receita', 'ativo', '0000-00-00 00:00:00'),
(9, 2, 'dsdsadah', '2022-10-24', '0000-00-00 00:00:00', 3, 'boleto', 'Pendente', 'despesa_fixa', 'ativo', '0000-00-00 00:00:00'),
(10, 1, 'aaaaaaa', '2022-11-02', '0000-00-00 00:00:00', 1.2, 'pix/ted/doc', 'Pendente', 'receita', 'ativo', '0000-00-00 00:00:00');

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
  MODIFY `id_contas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
