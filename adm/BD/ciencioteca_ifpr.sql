-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Out-2021 às 14:22
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciencioteca_ifpr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nome_area` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id_area`, `nome_area`) VALUES
(17, 'Agricultura 1'),
(16, 'Medicina'),
(15, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo`
--

CREATE TABLE `conteudo` (
  `id_conteudo` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` varchar(2000) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_subarea` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudo`
--

INSERT INTO `conteudo` (`id_conteudo`, `titulo`, `descricao`, `id_area`, `id_subarea`, `id_usuario`) VALUES
(4, 'codigos abertos php', 'codigos php gratis e de ultima geracao', 15, 11, 15),
(5, 'CriaÃ§Ã¢o de banco de dados', 'Criando um banco de dados ', 15, 11, 15),
(7, 'Como fazer curativos', 'Descrevo como fazer um curativo em seu machucado', 16, 16, 15),
(8, 'Sistema MACos', 'Falaremos sobre o sistema MACos', 15, 12, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudoarquivos`
--

CREATE TABLE `conteudoarquivos` (
  `id_conteudoarquivos` int(11) NOT NULL,
  `id_conteudo` int(11) DEFAULT NULL,
  `url_conteudo` varchar(100) NOT NULL,
  `tipo_conteudo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudoarquivos`
--

INSERT INTO `conteudoarquivos` (`id_conteudoarquivos`, `id_conteudo`, `url_conteudo`, `tipo_conteudo`) VALUES
(1, 1, 'c1c10ab1e599978fe821c05044d114ff', NULL),
(2, 4, '73d5eb2bf91b06ac3a643c2f3a6a9971.jpg', NULL),
(3, 5, '3fb293c51b8a66d9ed967af796c80f45.jpg', NULL),
(4, 7, 'ef1888d5ed35187f07a86a695a1da4b2.jpg', NULL),
(5, 7, '3fb5fc595576c87460fe8c4013a829c3.jpg', NULL),
(10, 7, 'ef95a12fee0666c0d15d3015ef2eedc5.jpg', NULL),
(11, 7, 'a1ed97aea889d6450336e5ee7992fd6d.jpg', NULL),
(8, 8, 'ee0732bbf5d8c426535ec96333f78169.jpg', NULL),
(9, 8, 'teste.pdf', 'PDF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subarea`
--

CREATE TABLE `subarea` (
  `id_subarea` int(11) NOT NULL,
  `nome_subarea` varchar(100) NOT NULL,
  `id_area` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `nome_subarea`, `id_area`) VALUES
(17, 'InteligÃªncia Artificial ', '15'),
(16, 'Enfermagem', '16'),
(15, 'SeguranÃ§a de Sistemas ', '15'),
(14, 'MineraÃ§Ã£o de Dados', '15'),
(13, 'Desenvolvimento Mobile', '15'),
(12, 'Sistemas Operacionais', '15'),
(11, 'Desenvolvimento web', '15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(32) DEFAULT NULL,
  `permissoes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `permissoes`) VALUES
(15, 'Andre', 'andre@gmail.com', '202cb962ac59075b964b07152d234b70', '42998584505', 'GESTOR'),
(17, 'Novo', 'novo@gmail.com', '202cb962ac59075b964b07152d234b70', '4232215050', ''),
(18, 'Rodrigo', 'rodrigo@gmail.com', '202cb962ac59075b964b07152d234b70', '42998584505', ''),
(21, 'juvencio', 'juvencio@gmail.com', '202cb962ac59075b964b07152d234b70', '0000000000', ''),
(22, 'Pedro Alex', 'pedroalex@gmail.com', '202cb962ac59075b964b07152d234b70', '42998584505', ''),
(23, 'Marcos  Andre', 'marcosandre@gmail.com', '202cb962ac59075b964b07152d234b70', '42998584505', ''),
(25, 'Eduardo Martins', 'edumartins@gmail.com', '202cb962ac59075b964b07152d234b70', '42 99955442233', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id_conteudo`);

--
-- Indexes for table `conteudoarquivos`
--
ALTER TABLE `conteudoarquivos`
  ADD PRIMARY KEY (`id_conteudoarquivos`);

--
-- Indexes for table `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`id_subarea`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `conteudoarquivos`
--
ALTER TABLE `conteudoarquivos`
  MODIFY `id_conteudoarquivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subarea`
--
ALTER TABLE `subarea`
  MODIFY `id_subarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
