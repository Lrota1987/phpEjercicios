

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `author`, `stock`, `price`) VALUES
(1, '978-3-16-1484', 'Harry Potter y la piedra filosofal', 'J. K. Rowling', 5, 15.99),
(2, '978-4-16-1484', 'La sombre del viento', 'Carlos Ruiz Zafón', 5, 19.99),
(3, '978-5-16-1484', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 5, 9.99),
(4, '978-6-16-1484', 'Drácula', 'Bram Stoker', 5, 15.99),
(5, '978-7-16-1484', 'Frankenstein', 'Mary Shelley', 5, 15.99),
(6, '978-8-16-1484', 'Historia de dos ciudades', 'Charles Dickens', 5, 9.99),
(7, '978-9-16-1484', 'Las aventuras de Alicia en el país de las maravillas', 'Lewis Carroll', 5, 15.99),
(8, '978-2-12-1484', 'El león, la bruja y el armario', 'C. S. Lewis', 5, 15.99),
(9, '978-3-16-7484', 'El principito', 'Antoine de Saint-Exupéry', 5, 9.99),
(10, '958-3-16-1484', 'El guardián entre el centeno', 'J. D. Salinger', 5, 9.99),
(11, '998-3-16-1484', 'El alquimista', 'Paulo Coelho', 5, 5.99),
(12, '973-6-18-1489', 'El nombre de la rosa', 'Umberto Eco', 5, 5.99),
(13, '948-3-16-1484', 'El señor de las moscas', 'William Golding', 5, 19.99),
(14, '178-3-15-1484', 'El señor de los anillos', 'J. R. R. Tolkien', 5, 25.99),
(15, '678-0-06-1484', 'Un mundo feliz', 'Aldous Huxley', 5, 19.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrowed_books`
--

CREATE TABLE IF NOT EXISTS `borrowed_books` (
  `book_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`book_id`,`customer_id`,`start`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` enum('basic','premium') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_book`
--

CREATE TABLE IF NOT EXISTS `sale_book` (
  `book_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `amount` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`book_id`,`sale_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Filtros para la tabla `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Filtros para la tabla `sale_book`
--
ALTER TABLE `sale_book`
  ADD CONSTRAINT `sale_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `sale_book_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;