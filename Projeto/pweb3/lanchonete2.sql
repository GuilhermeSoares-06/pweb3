-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2026 at 11:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanchonete2`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuid` int NOT NULL,
  `usunome` varchar(100) DEFAULT NULL,
  `usulogin` varchar(100) DEFAULT NULL,
  `ususenha` varchar(100) DEFAULT NULL,
  `usulogado` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuid`, `usunome`, `usulogin`, `ususenha`, `usulogado`) VALUES
(1, 'João Silva', 'joao.silva', '123456', 0),
(2, 'Maria Oliveira', 'maria.oliveira', 'senha123', 0),
(3, 'Carlos Souza', 'carlos.souza', 'abc123', 0),
(5, 'Guilherme Soares', 'Guizera', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, 'João Silva', 'joao.silva', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, 'Maria Oliveira', 'maria.oliveira', 'e7d80ffeefa212b7c5c55700e4f7193e', 0),
(8, 'Carlos Souza', 'carlos.souza', 'e99a18c428cb38d5f260853678922e03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
