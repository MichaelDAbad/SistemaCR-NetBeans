-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2015 a las 19:32:46
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbpos`
--
CREATE DATABASE IF NOT EXISTS `dbpos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbpos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(7, 'Walk in Customers', 'na', 'na', 'na'),
(8, 'Paolo Asoy', '09456465465', 'Quezon City', 'na'),
(9, 'Carl Moneda', '09431215641', 'Valenzuela', 'na'),
(10, 'Ian Estabaya', '09644164565', 'Quezon City', 'na'),
(11, 'Jun Magayanes', '09641513561', 'Malabon', 'na'),
(12, 'Platea21', 'Gorchor', 'Peru', 'Hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`) VALUES
(21, 'Finger Food', 'Beta max', 100, 3, 4, 'Mangboks betamax'),
(22, 'Finger Food', 'Quek quek', 100, 2, 3, 'Street Quek2x'),
(23, 'Finger Food', 'fish balls', 100, 1, 1, 'Stick Fishing ball'),
(24, 'Finger Food', 'Chicken Ball', 99, 3, 5, 'Stick Fishing ball'),
(25, 'Dessert', 'Puto', 97, 3, 5, 'kakanin atb.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dates` date NOT NULL,
  `customers` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amnt` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `tendered` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `dates`, `customers`, `category`, `name`, `amnt`, `quantity`, `total`, `profit`, `tendered`, `changed`) VALUES
(1, '2015-11-13', 'Walk in Customers', 'Dessert', 'Puto', 5, 3, 15, 6, 20, 5),
(2, '2015-11-13', 'Platea21', 'Finger Food', 'Chicken Ball', 5, 1, 5, 2, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suppliername` varchar(100) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `note` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contactperson`, `address`, `contactno`, `note`) VALUES
(13, 'Mangboks betamax', 'Juli Sanjuan', 'Malabon', '09215454654', 'na'),
(14, 'Siomai tbp.', 'Jezzy Jaime', 'Caloocan', '09646454564', 'na'),
(15, 'Stick Fishing ball', 'Nardo Besoza', 'Valenzuela', '06365465446', 'na'),
(16, 'kakanin atb.', 'Loui Cruz', 'Pasay', '09634654654', 'na'),
(17, 'Street Quek2x', 'Nilo Cruz', 'Pasig', '09765464164', 'na');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `access`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'vendedor', 'vendedor', 'Salesperson');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
