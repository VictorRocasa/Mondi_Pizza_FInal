-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Maio-2020 às 02:30
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_mondi_pizza`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE IF NOT EXISTS `cardapio` (
  `idCardapio` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCardapio` varchar(100) NOT NULL,
  `ingredientesCardapio` varchar(100) NOT NULL,
  `tamanhoCardapio` varchar(100) NOT NULL,
  `imagemCardapio` varchar(40) DEFAULT NULL,
  `tipoCardapio` varchar(40) NOT NULL,
  PRIMARY KEY (`idCardapio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`idCardapio`, `nomeCardapio`, `ingredientesCardapio`, `tamanhoCardapio`, `imagemCardapio`, `tipoCardapio`) VALUES
(1, 'Pizza de Calabresa', 'Calabresa, queijo, tomate, cebola, queijo ralado e azeitona', 'P, M', 'cardapio_1.jpg', 'Salgada'),
(2, 'Pizza de quatro queijos', 'Molho de omate, quijo mussarela, quijo gorgonzola, queijo parmessão, queijo provolone e orégano', 'M, G, GG', 'cardapio_2.png', 'Salgada'),
(3, 'Pizza Portuguesa', 'molho de tomate, queijo, presunto, tomate em rodelas, cebola e ovos cozidos em rodelas', 'P, M, G', 'cardapio_3.jpg', 'Salgada'),
(4, 'Pizza Vegetariana', 'ricota, espinafre, mussarela ralada e tomate', 'PP, P, M', 'cardapio_4.jpg', 'Salgada'),
(5, 'Pizza de Chocolate', 'Calda de chocolate e raspas de chocolate', 'P, M, G', 'cardapio_5.jpg', 'Doce');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filiais`
--

CREATE TABLE IF NOT EXISTS `filiais` (
  `idFilial` int(11) NOT NULL AUTO_INCREMENT,
  `localFilial` varchar(100) NOT NULL,
  `telefoneFilial` varchar(100) NOT NULL,
  `whatsappFilial` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idFilial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `filiais`
--

INSERT INTO `filiais` (`idFilial`, `localFilial`, `telefoneFilial`, `whatsappFilial`) VALUES
(1, 'Astolfo Dutra', '3451-1735', '32999776854'),
(2, 'Rio Pomba', '1111-1111', '99999999999'),
(3, 'Coronel Pacheco', '1111-1111', '99999999999'),
(4, 'Juiz de Fora', '1111-1111', '99999999999'),
(5, 'Cataguases', '1111-1111', '99999999999'),
(6, 'Rio Novo', '1111-1111', '99999999999'),
(7, 'Amparo do Serra', '1111-1111', '99999999999'),
(8, 'São João Del Rei', '1111-1111', '99999999999'),
(9, 'Piraúba', '1111-1111', '99999999999'),
(10, 'Muriaé', '1111-1111', '99999999999'),
(11, 'Tocantins', '1111-1111', '99999999999'),
(12, 'Lavras', '1111-1111', '99999999999'),
(13, 'Patos de Minas', '1111-1111', '99999999999'),
(14, 'Paracatú', '1111-1111', '99999999999'),
(15, 'Januária', '1111-1111', '99999999999'),
(16, 'Uberlândia', '1111-1111', '99999999999'),
(17, 'Governador valadares', '1111-1111', '99999999999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE IF NOT EXISTS `sobre` (
  `idSobre` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoSobre` longtext NOT NULL,
  PRIMARY KEY (`idSobre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sobre`
--

INSERT INTO `sobre` (`idSobre`, `descricaoSobre`) VALUES
(1, 'Mondi Pizza foi inaugurada em agosto de 2012 na atual sede da empresa, localizada em Belo Horizonte - MG. Nossa empresa é o resultado de anos de sonho e planejamento de Rosemere Focesca, fundadora e atual CEO da companhia. Temos uma trajetória familiar e nos baseamos nesses valores em todo serviço prestado. Nos dias de hoje, somos uma rede de pizzarias espalhadas por todas as regiões do estado de Minas Gerais. \r\n\r\nEm nossos estabelecimentos prezamos a qualidade dos produtos e a satisfação do cliente, por isso nossos funcionários são treinados e avaliados rotineiramente para que esse essa meta seja alcançada. Possuímos um atendimento totalmente informatizado, com equipamentos novos, profissionais treinados e instalações modernas e aconchegantes, além do salão com ar condicionado, que pode acomodar até 70 pessoas. Um ambiente aconchegante e familiar para descontrair enquanto saboreia sua pizza. Também oferecemos delivery, onde prezamos pelo cumprimento do prazo de entrega estabelecido ou a pizza sai por nossa conta!\r\n\r\nTemos um cardápio variado, indo de pizzas doces a salgadas. Possuímos diversos sabores, mas também temos a opção do cliente montar sua própria pizza com os ingredientes disponibilizados para essa escolha.\r\n\r\nAssim, aproveite e venha saborear a melhor pizza da sua região. Escolha o estabelecimento que se encontra mais pertinho de você e entre em contato!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `identificadorUsuario` varchar(30) NOT NULL,
  `senhaUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `identificadorUsuario`, `senhaUsuario`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
