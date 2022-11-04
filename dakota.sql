-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 08:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--
-- Database: `dakota`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) PRIMARY KEY,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
);

--
-- Dumping data for table `pengguna`
--



-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `id_bioskop` int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nama_cabang` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL
);

--
-- Dumping data for table `bioskop`
--



-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nama_film` varchar(40) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `tahun_rilis` year NOT NULL
);

--
-- Dumping data for table `film`
--

INSERT INTO `pengguna` (`username`, `password`, `email`) VALUES
('admin', '123', 'admin@gmail.com');

INSERT INTO `bioskop` (`id_bioskop`, `nama_cabang`, `alamat`, `nohp`) VALUES
("1", "Cilacap", "Jalan Tendean no 50", "081392412"),
("2", "Maos", "Jalan Sutomo no 10", "081394214"),
("3", "Bekasi", "Jalan Soekarno no 120", "0814151412");

INSERT INTO `film` (`id_film`, `nama_film`, `genre`, `tahun_rilis`) VALUES
("1", "Avengers", "Action", "2017"),
("2", "Ant-Man", "Action", "2019"),
("3", "The Conjuring", "Horor", "2018"),
("4", "Keramat", "Horor", "2017"),
("5", "Paranormal Activity", "Horor", "2017"),
("6", "Avengers 2", "Action", "2019"),
("7", "Ironman", "Action", "2017"),
("8", "7 Funny Man", "Comedy", "2018"),
("9", "Jangkrik Boss", "Comedy", "2020"),
("10", "Ironman 2", "Action", "2021"),
("11", "Despicable Me", "Comedy", "2020");

ALTER TABLE film AUTO_INCREMENT = 1;
ALTER TABLE bioskop AUTO_INCREMENT = 1;