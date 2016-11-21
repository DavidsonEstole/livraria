-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2016 às 21:48
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`ID`, `NOME`) VALUES
(82, 'Khaled Hosseini'),
(83, 'Markus Zusak'),
(84, 'Markus Zusak'),
(85, 'Robert Lonr'),
(86, 'Khaled Hosseini'),
(87, 'John Boyne'),
(88, 'Eu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE IF NOT EXISTS `carrinho` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_LIVRO` int(11) NOT NULL,
  `qtd` int(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`ID`, `ID_CLIENTE`, `ID_LIVRO`, `qtd`) VALUES
(20, 25, 87, 1),
(26, 28, 93, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrousel`
--

CREATE TABLE IF NOT EXISTS `carrousel` (
  `ID_LIVRO1` int(11) NOT NULL,
  `ID_LIVRO2` int(11) NOT NULL,
  `ID_LIVRO3` int(11) NOT NULL,
  `ID_LIVRO4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrousel`
--

INSERT INTO `carrousel` (`ID_LIVRO1`, `ID_LIVRO2`, `ID_LIVRO3`, `ID_LIVRO4`) VALUES
(95, 89, 89, 93);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `TELEFONE2` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`ID`, `EMAIL`, `TELEFONE`, `TELEFONE2`) VALUES
(67, 'adm@adm.com', 2147483647, 0),
(69, 'editora@sextante.com', 2147483647, 2147483647),
(70, 'editora@abril.com', 2147483647, 2147483647),
(71, 'je_jmgbrasil@hotmail.com', 2147483647, 0),
(72, 'je_jmgbrasil@hotmail.com', 2147483647, 0),
(74, 'je_jmgbrasil@hotmail.com', 0, 0),
(75, 'je_jmgbrasil@hotmail.com', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  `ID_ENDERECO` int(11) NOT NULL,
  `ID_CONTATO` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_CONTATO3` (`ID_CONTATO`),
  KEY `FK_ENDERECO2` (`ID_ENDERECO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`ID`, `NOME`, `ID_ENDERECO`, `ID_CONTATO`) VALUES
(7, 'Editora Sextante', 55, 69),
(8, 'Editora Abril', 56, 70),
(9, 'Casa', 61, 75);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RUA` varchar(255) NOT NULL,
  `BAIRRO` varchar(255) NOT NULL,
  `CIDADE` varchar(255) NOT NULL,
  `ESTADO` varchar(255) NOT NULL,
  `CEP` int(8) NOT NULL,
  `numero` int(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`ID`, `RUA`, `BAIRRO`, `CIDADE`, `ESTADO`, `CEP`, `numero`) VALUES
(55, 'Orquidea', 'montreal', 'Ipatinga', 'MG', 313333333, 0),
(56, 'Orquidea', 'Industrial', 'Ipatinga', 'SP', 313333333, 0),
(57, '31', 'Bom Jardim', 'Ipatimga', 'MG', 35162289, 346),
(58, '31', 'Bom', 'Ipatimga', 'MG', 35162289, 346),
(60, 'Orquidea', 'Bom Jardim', 'Ipatimga', 'MG', 35160, 436),
(61, '', 'Bom Jardim', 'Ipatimga', 'MG', 35160, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  `CATEGORIA` varchar(255) NOT NULL,
  `PRECO` varchar(5) NOT NULL,
  `ID_EDITORA` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `Imagem` varchar(200) DEFAULT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_EDITORA` (`ID_EDITORA`),
  KEY `FK_CATEGORIA` (`CATEGORIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`ID`, `NOME`, `CATEGORIA`, `PRECO`, `ID_EDITORA`, `quantidade`, `Imagem`, `descricao`) VALUES
(89, 'O caÃ§ador de pipas', 'Aventura', '30.00', 7, 29, 'uploads/images.jpg', 'Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!Ã‰ um Livro Muito bom!'),
(93, 'A menina que roubava livros', 'Aventura', '16.00', 7, 41, 'uploads/images2.jpg', 'Livro muito bom! Segunda guerra e talz!Livro muito bom! Segunda guerra e talz!Livro muito bom! Segunda guerra e talz!Livro muito bom! Segunda guerra e talz!Livro muito bom! Segunda guerra e talz!Livro muito bom! Segunda guerra e talz!'),
(94, 'O Menino do Pijama Listrado', 'Romance', '13.00', 8, 11, 'uploads/download.jpg', 'OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo, OlÃ¡ mundo,'),
(95, 'Pop', 'AÃ§Ã£o', '400.0', 7, 33, 'uploads/download.jpg', 'Eu sou legal, meu trabalho vale 10!Eu sou legal, meu trabalho vale 10!Eu sou legal, meu trabalho vale 10!Eu sou legal, meu trabalho vale 10!Eu sou legal, meu trabalho vale 10!Eu sou legal, meu trabalho vale 10!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_autor`
--

CREATE TABLE IF NOT EXISTS `livro_autor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_AUTOR` int(11) NOT NULL,
  `ID_LIVRO` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_AUTOR` (`ID_AUTOR`),
  KEY `FK_LIVRO` (`ID_LIVRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Extraindo dados da tabela `livro_autor`
--

INSERT INTO `livro_autor` (`ID`, `ID_AUTOR`, `ID_LIVRO`) VALUES
(75, 82, 89),
(76, 83, 90),
(77, 84, 91),
(78, 85, 92),
(79, 86, 93),
(80, 87, 94),
(81, 88, 95);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  `SEXO` char(1) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `SOBRENOME` varchar(255) NOT NULL,
  `ID_ENDERECO` int(11) NOT NULL,
  `ID_CONTATO` int(11) NOT NULL,
  `CPF` text NOT NULL,
  `RG` text NOT NULL,
  `LVL` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_CONTATO` (`ID_CONTATO`),
  KEY `FK_ENDERECO` (`ID_ENDERECO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `SEXO`, `SENHA`, `SOBRENOME`, `ID_ENDERECO`, `ID_CONTATO`, `CPF`, `RG`, `LVL`) VALUES
(28, 'ADMIN', 'M', 'administrador', 'ADM', 53, 67, '10562288651', '231', 1),
(29, 'Jefferson Johnny', 'M', 'teste123', 'Gandra', 57, 71, '10562288651', '21321213131', 0),
(30, 'Johnny', 'M', 'teste123', 'Gandra', 58, 72, '10562288651', '21321213131', 0),
(32, 'Jeffin', 'M', 'engenharia', 'Gandra', 60, 74, '10562288651', '17421141', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_LIVRO` int(11) NOT NULL,
  `VALOR` varchar(5) NOT NULL,
  `DATA` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_USUARIO` (`ID_USUARIO`),
  KEY `FK_LIVRO2` (`ID_LIVRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`ID`, `ID_USUARIO`, `ID_LIVRO`, `VALOR`, `DATA`) VALUES
(17, 29, 94, '13.00', '2015-11-23 03:19:24'),
(18, 29, 89, '30.00', '2015-11-23 03:19:24'),
(19, 29, 93, '16.00', '2015-11-23 07:45:19'),
(20, 29, 94, '13.00', '2015-11-23 07:45:19'),
(21, 29, 93, '16.00', '2015-11-23 07:45:19');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `FK_EDITORA` FOREIGN KEY (`ID_EDITORA`) REFERENCES `editora` (`ID`);

--
-- Limitadores para a tabela `livro_autor`
--
ALTER TABLE `livro_autor`
  ADD CONSTRAINT `FK_AUTOR` FOREIGN KEY (`ID_AUTOR`) REFERENCES `autor` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
