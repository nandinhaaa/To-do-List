-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/09/2024 às 01:02
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(190) DEFAULT NULL,
  `task_description` varchar(250) DEFAULT NULL,
  `task_image` varchar(50) DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_description`, `task_image`, `task_date`, `user_id`) VALUES
(10, 'Espero que tenha gostado', 'Trabalho com PHP e banco de Dados 1', '3279555b94b90fe2242c181fc4d1f215.gif', '2024-06-09', 0),
(13, 'Teste', 'teste2', '27ec51d274862dbce158f3caee318479.png', '2024-05-31', 0),
(17, 'Testando 123', '123', 'd9b71a29add6b0e8aef4fec577f3e081.png', '2024-07-31', 0),
(18, 'Teste', 'Teste de BD', 'b9fe3fc09d89fabbb31a8c3340733c96.pdf', '2024-08-06', 0),
(19, 'Testando ', 'teste', NULL, '2024-02-22', 5),
(20, 'Teste 2', 'testando 2', 'b7e2f62b25ef104dcbfd5bce1a7e1fe1.png', '2024-08-10', 2),
(21, 'eu odeio o batman! ', 'odia-lo', '4e499e901680363934ffd247a3763bef.jpg', '2024-10-10', 11),
(22, 'amo a arlequina', 'S2', 'b6215689e749227d0ca25243e611f16cwebp', '2024-09-12', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$OeXgX9ZseZ6Aos0P5jqZgO2PaKNhOxDiP0HzOE5Zjx2DLZNUi.Fem', '2024-08-08 22:30:17'),
(2, 'amanda@gmail.com', '$2y$10$6XdH.h/cbkUnknzCP7xwWeqSLllk3xC1UG7jOyzX8tCAe8QqVsR6O', '2024-08-08 22:34:05'),
(5, 'nanda@gmail.com', '$2y$10$/RWbHOv27IJpUN8YQtN2X.pkh4SuLaWVeGighkwaVn5NCE5y3XOZK', '2024-08-08 22:44:31'),
(7, 'teste@gmail.com', '123', '2024-08-08 23:10:23'),
(8, 'batman@gmail.com', '123', '2024-09-02 22:23:47'),
(10, 'batman1@gmail.com', '$2y$10$OccCL.Nlq2ipQ8eAJKv5HeJJb9TOGf3kG5LFmyW1t7gU3hDntqysO', '2024-09-02 22:33:49'),
(11, 'coringa@gmail.com', '$2y$10$RxZevrCn1HNJpI3y6.n/GO9UihB4yILHTPGL809YbOWp/.qQb4rvO', '2024-09-02 22:55:51');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
