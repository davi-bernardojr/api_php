-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2022 às 10:22
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
-- Banco de dados: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `familia`
--

DROP TABLE IF EXISTS `familia`;
CREATE TABLE `familia` (
  `id` int(11) NOT NULL,
  `descricao` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `familia`
--

INSERT INTO `familia` (`id`, `descricao`) VALUES
(1, 'Limpeza'),
(2, 'Bebidas'),
(3, 'Cozinha'),
(4, 'Massas'),
(5, 'Molhos'),
(6, 'Pães'),
(7, 'Perfumaria'),
(8, 'Verduras'),
(9, 'Utensilios Cozinha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `fam_id`, `descricao`, `saldo`) VALUES
(1, 1, 'Detergente', 5),
(2, 1, 'Bucha Dupla Face', 5),
(3, 2, 'Sprite', 5),
(4, 2, 'Coca-Cola', 5),
(5, 3, 'Colher', 5),
(6, 3, 'Prato', 5),
(7, 4, 'Miojo Carne', 7),
(8, 0, 'Macarrão Espaguette n8', 3),
(9, 4, 'Macarrão Parafuso', 3),
(10, 5, 'Mostarda', 4),
(11, 5, 'Molho Barbecue', 7),
(12, 2, 'Cerveja Skol', 6),
(13, 2, 'Cerveja Brahma', 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `familia`
--
ALTER TABLE `familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
