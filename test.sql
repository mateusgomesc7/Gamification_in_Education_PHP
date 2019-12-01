-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2019 às 17:19
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gamification`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_usuarios`
--

CREATE TABLE `adms_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `apelido` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `recuperar_senha` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chave_descadastro` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conf_email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adms_niveis_acesso_id` int(11) NOT NULL,
  `adms_sits_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_usuarios`
--

INSERT INTO `adms_usuarios` (`id`, `nome`, `apelido`, `email`, `usuario`, `senha`, `recuperar_senha`, `chave_descadastro`, `conf_email`, `imagem`, `adms_niveis_acesso_id`, `adms_sits_usuario_id`, `created`, `modified`) VALUES
(1, 'Mateus', 'Mateus', 'mateusgomesc7@gmail.com', 'mateusgomesc7@gmail.com', '$2y$10$XFWEXmgQT6SyYCSSSe4nae65vyM57ZO0OhkdHefURUoB/XYeFOz6O', '6776c7c5b1b4c592b5339b774d3147ca', 'bbe0d9883f909fb95ca46e8396fd7194', '2', 'mateusgomes.jpg', 1, 1, '2018-05-23 00:00:00', '2019-11-29 16:11:31'),
(2, 'Kelly', 'Kelly', 'mateusgomes@ieee.org', 'mateusgomes@ieee.org', '$2y$10$Ljg1MfuADekeSv94OtD0d.7jZmmxP2lUblhn.911lldfs04LJYWvS', NULL, NULL, '1', 'mateus.jpg', 2, 1, '2018-05-23 00:00:00', '2018-06-20 11:12:35'),
(3, 'Mateus', 'Mateus', 'mateusgomesc3@gmail.com', 'mateusgomesc3@gmail.com', '$2y$10$g1IwcDcwY5rsAKeEHKwXDOhVjI7wIhRRkgdTN.YvEW7u996LJQNA2', NULL, NULL, '2', 'logo-mateus.jpg', 3, 1, '2018-06-02 14:29:36', '2018-06-24 15:40:59'),
(4, 'Mateus', 'Mateus', 'mateusgomesc4@gmail.com', 'mateusgomesc4@gmail.com', '$2y$10$ypvSoRiRpd8Ppx8n1pI4hOC4KX.2lPekK.jOhz1Z.DhNUMXG7jDu2', NULL, NULL, '2', NULL, 5, 2, '2018-06-02 15:10:57', '2018-06-20 12:23:53'),
(13, 'Mateus 1', 'Mateus 1', 'mateusgomesc5@gmail.com', 'mateusgomesc5@gmail.com', '$2y$10$Xgs2jrNEZLQH2ZGCOSj2KO0Y3HRvpzjijaRgpDU5Az/KT/s4oJlN2', NULL, NULL, NULL, 'logo-mateus.jpg', 2, 1, '2018-06-20 21:46:15', '2018-06-20 21:46:47');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;