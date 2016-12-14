-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2016 at 10:18 
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trabalhoFinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `idUsuario` int(11) NOT NULL,
  `mensagem` varchar(300) COLLATE utf8_bin NOT NULL,
  `horaPostagem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mensagens`
--

INSERT INTO `mensagens` (`idUsuario`, `mensagem`, `horaPostagem`) VALUES
(4, 'Teste de Mensagem', '2016-12-06 12:00:00'),
(3, 'Teste 2 de Mensagem -> Dont show', '2016-12-06 10:36:12'),
(3, 'Teste de Mensagem - AndrÃ© de Oliveira', '2016-12-08 18:26:06'),
(4, 'Teste de Mensagem - CÃ©sar Accioly', '2016-12-08 18:30:05'),
(5, 'Test Bot Sends Message Beep Boop', '2016-12-08 19:08:14'),
(3, 'Amo enviar mensagens no TwitterClone(tm)', '2016-12-10 02:16:26'),
(13, 'You are 10 years away from being actual idols!', '2016-12-13 01:11:54'),
(12, 'What the hell are you doing?', '2016-12-13 02:49:53'),
(3, 'Teste de Mensagem nova', '2016-12-13 18:29:07'),
(16, 'Rush B', '2016-12-14 17:00:05'),
(15, 'Oi, eu sou o Goku!', '2016-12-14 17:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `seguidores`
--

CREATE TABLE IF NOT EXISTS `seguidores` (
  `idUsuario` int(11) NOT NULL,
  `idSeguido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `seguidores`
--

INSERT INTO `seguidores` (`idUsuario`, `idSeguido`) VALUES
(4, 3),
(4, 5),
(3, 5),
(3, 4),
(13, 12),
(12, 13),
(3, 13),
(3, 12),
(15, 14),
(15, 4),
(16, 15),
(15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'img/default.png',
  `codigo` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT 'cf79ae6addba60ad018347359bd144d2'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `avatar`, `codigo`) VALUES
(3, 'AndrÃ© de Oliveira Bastos', 'NegiMahora', '3a337b80b8353c4ed4f4850528110aa3', 'img/default.png', 'cf79ae6addba60ad018347359bd144d2'),
(4, 'CÃ©sar Goersch Accioly', 'CesarAccioly', '6f597c1ddab467f7bf5498aad1b41899', 'img/default.png', 'cf79ae6addba60ad018347359bd144d2'),
(5, 'Teste de Seguidores', 'teste', '698dc19d489c4e4db73e28a713eab07b', 'img/default.png', 'cf79ae6addba60ad018347359bd144d2'),
(12, 'Nishikino Maki', 'nishikino', '9b5bd5c86c722ebf5f5426ca97684933', 'img/nishikino.png', 'cf79ae6addba60ad018347359bd144d2'),
(13, 'Yazawa Nico', 'yazawa', '410ec15153a6dff0bed851467309bcbd', 'img/yazawa.jpg', 'cf79ae6addba60ad018347359bd144d2'),
(14, 'UsuarioSemAvatar', 'semavatar', '4078d727848c2b3fed486a82fc1fd227', 'img/default.png', 'cf79ae6addba60ad018347359bd144d2'),
(15, 'Son Goku', 'goku', '48761b4ee1a42e430af6778f0bc1cefe', 'img/goku.jpg', '89d4402dc03d3b7318bbac10203034ab'),
(16, 'Bot Terrorista do CS', 'terrorista', '819aff9d5b00f24018d1a64f272171e4', 'img/t.jpg', '3b712de48137572f3849aabd5666a4e3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
