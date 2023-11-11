-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 04:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpweb2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `director_id` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Nacionalidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `Nombre`, `Apellido`, `Nacionalidad`) VALUES
(1, 'Kevin', 'Greutert', 'Estados Unidos'),
(2, 'Alexandr', 'Reshetnikov', 'Rusia'),
(3, 'Martin', 'Scorsese', 'Estados Unidos'),
(4, 'Quentin', 'Tarantino', 'Estados Unidos'),
(5, 'Tim', 'Burton', 'Estados Unidos'),
(6, 'James', 'Cameron', 'Canada'),
(7, 'Cristopher', 'Nolan', 'Reino Unido'),
(8, 'Peter', 'Jackson', 'Nueva Zelanda');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `pelicula_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `fecha de lanzamiento` date NOT NULL,
  `premios` varchar(150) NOT NULL,
  `duracion en min` int(11) NOT NULL,
  `clasificacion por edades` varchar(45) NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `estudio de produccion` varchar(45) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`pelicula_id`, `nombre`, `genero`, `fecha de lanzamiento`, `premios`, `duracion en min`, `clasificacion por edades`, `presupuesto`, `estudio de produccion`, `director_id`) VALUES
(1, 'Saw 10', 'Thriller,Terror,Crimen,Gore', '2023-09-28', '0', 118, 'R', 13000000, 'Twisted Pictures', 1),
(2, 'The Collection', 'Terror', '2012-09-19', '0', 82, 'R', 10000000, 'LD Entertainment', 1),
(3, 'September 7th', 'Terror', '2023-09-05', '0', 185, 'R', 13000000, 'Emika Games', 2),
(4, 'Taxi Driver', 'Drama,Crimen', '1977-03-24', 'Palma de Oro, 2 BAFTA.', 114, 'R', 1300000, 'Bill/Phillips & Columbia Pictures', 3),
(6, 'The Wolf of Wall Street', 'Drama,Comedia,Satira', '2013-12-17', '1 Golden Globe, 2 MVT, 1 Eddie, 12 premios menores', 180, 'R', 100000000, 'Paramount Pictures', 3),
(7, 'The Aviator', 'Biografico,Drama', '2004-12-25', '5 Oscar, 3 Golden Globe, 4 BAFTA', 170, 'PG-13', 110000000, 'Intermedia', 3),
(8, 'Inglourious Basterds', 'Belico,Drama,Accion,Comedia', '2009-08-31', '1 Oscar, 1 Golden Globe, 1 BAFTA, 2 premios menores', 153, 'R', 70000000, 'Universal Pictures', 4),
(9, 'Pulp Fiction', 'Crimen', '1994-10-14', '1 Oscar, 1 Golden Globe, 2 BAFTA, 4 premios menores', 154, 'R', 8000000, 'A Band Apart', 4),
(10, 'Reservoir Dogs', 'Crimen,Thriller', '1992-01-21', '6 premios menores', 99, 'R', 1200000, 'Live America Inc.', 4),
(11, 'Sin City', 'Suspenso,Drama,Neo-noir', '2005-04-01', '11 premios menores', 124, 'R', 40000000, 'Dimension Films', 4),
(12, 'Dark Shadows', 'Comedia,Terror,Fantasia', '2012-04-11', '', 132, 'PG-13', 150000000, 'GK Films', 5),
(13, 'Mars Attacks!', 'Accion,Comedia,Ciencia Ficcion', '1996-12-13', '5 premios menores', 106, 'PG-13', 70000000, 'Warner Bros', 5),
(14, 'Corpse Bride', 'Fantasia,Musical,Animacion', '2005-09-23', '3 premios menores', 76, 'PG', 40000000, 'Laika', 5),
(15, 'Sleepy Hollow', 'Terror,Gotico,Fantasia,Aventura', '1999-11-17', '1 Oscar, 2 BAFTA, 6 premios menores', 105, 'R', 80000000, 'Paramount Pictures', 5),
(16, 'Avatar', 'Accion,Ciencia Ficcion, Aventura', '2009-12-10', '3 Oscar, 2 Golden Globe, 2 BAFTA, 7 premios menores', 162, 'PG-13', 237000000, '20th Century Fox', 6),
(17, 'Titanic', 'Drama,Romance,Catastrofe', '1997-12-19', '11 Oscar, 4 Golden Globe, 17 premios menores', 195, 'PG-13', 200000000, '20th Century Fox', 6),
(18, 'Terminator', 'Accion,Ciencia Ficcion', '1984-10-26', '3 premios menores', 108, 'R', 6400000, 'Orion Pictures', 6),
(19, 'True Lies', 'Accion,Suspenso,Comedia', '1994-07-15', '1 Golden Globe, 5 premios menores', 141, 'R', 115000000, '20th Century Fox', 6),
(20, 'Oppenheimer', 'Biografico,Suspenso', '2023-07-21', '', 180, 'R', 100000000, 'Atlas Entertainment', 7),
(21, 'Interstellar', 'Drama,Distopia,Ciencia Ficcion', '2014-10-26', '1 Oscar, 1 BAFTA, 6 premios Saturn', 169, 'PG-13', 165000000, 'Paramount Pictures', 7),
(22, 'Inception', 'Drama,Suspenso,Accion,Ciencia Ficcion', '2010-07-08', '4 Oscar, 3 BAFTA, 4 premios menores', 148, 'PG-13', 160000000, 'Warner Bros & Legendary Pictures', 7),
(23, 'Jessabelle', 'Terror,Suspenso', '2014-11-07', '', 90, 'R', 1000000, 'Blumhouse Productions', 1),
(24, 'Saw VI', 'Terror,Gore,Suspenso', '2009-10-23', '', 92, 'R', 11000000, 'Lions Gate Entertainment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `user_id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`user_id`, `username`, `password`) VALUES
(3, 'webadmin', '$2y$10$Kf7o12C0.hZcEchpJ1NxEuxcOL5ptMS/JBXVrCyIa7G/.YMpgIOye');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`pelicula_id`),
  ADD KEY `director_id_idx` (`director_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `pelicula_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `director_id` FOREIGN KEY (`director_id`) REFERENCES `director` (`director_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
