-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/06/2024 às 23:50
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_pokemon`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pokemons`
--

CREATE TABLE `pokemons` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `habilidade1` varchar(50) NOT NULL,
  `habilidade2` varchar(50) NOT NULL,
  `habilidade3` varchar(50) NOT NULL,
  `habilidade4` varchar(50) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pokemons`
--

INSERT INTO `pokemons` (`id`, `nome`, `habilidade1`, `habilidade2`, `habilidade3`, `habilidade4`, `usuario_id`) VALUES
(1, 'Charmander', 'fogo', 'bola de fogo', 'rajada de fogo', 'fogareu', 1),
(2, 'Pikachu', 'raio ', 'raio 2 ', 'raio 3', 'raio 4', 1),
(3, 'Charizard', 'fogo1', 'fogo2', 'fogo3', 'fogo4', 2),
(4, 'Charizard', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'paulo', '$2y$10$f2vG0UVm2kE4Y1FMBnZL8.lPJXcTlTiJCrPzwzCiadXOSP9vqFbxK'),
(2, 'victor', '$2y$10$YPuaNM8LoLwSemsSzxqEGeRHJcsd0lTvcdJrEP8ndzF6rSPiTV4wm');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pokemons`
--
ALTER TABLE `pokemons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pokemons`
--
ALTER TABLE `pokemons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pokemons`
--
ALTER TABLE `pokemons`
  ADD CONSTRAINT `pokemons_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
