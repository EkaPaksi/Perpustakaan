-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2019 pada 05.20
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `last_sent` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alias`, `email`, `last_sent`, `edit_time`) VALUES
(2, 'Admedika - Prudential PT ', 'Admedika - Prudential PT ', 'eka@binahusada.com', '2019-11-15 11:05:31', '2019-11-15 09:15:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `status` varchar(500) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `info` varchar(500) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`status`, `nama`, `email`, `info`, `create_time`) VALUES
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 09:15:24'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 09:19:20'),
('Mailer Error', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'Message body empty', '2019-11-15 09:25:55'),
('Mailer Error', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'Message body empty', '2019-11-15 09:28:36'),
('Mailer Error', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'Message body empty', '2019-11-15 09:28:51'),
('Mailer Error', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'Message body empty', '2019-11-15 09:29:09'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 09:29:32'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 09:31:11'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 09:35:35'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 09:36:21'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:33:09'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:33:53'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:35:15'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:36:32'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:38:31'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:41:04'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:45:41'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:47:03'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:48:07'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:48:47'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:49:33'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:50:12'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:56:02'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 10:56:23'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 11:04:59'),
('Message sent', 'Admedika - Prudential PT ', 'eka&#64;binahusada.com', 'gaji/Admedika - Prudential PT .png', '2019-11-15 11:05:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Karyawan','Konsumen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Khalid Insan Tauhid', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator'),
(7, 'test', 'adminn', '827ccb0eea8a706c4c34a16891f84e7b', 'Karyawan'),
(8, 'hgjgh', 'jhgjh', '633bd287609b5b5854509b614ef5bee0', 'Karyawan'),
(9, 'fgh', 'gfhfgh', 'fab1e6a27315978f02953cedf6019fe5', 'Karyawan'),
(10, 'tyuy', 'tuyt', 'd36f82f29c235b2ff503e19b50ea61a5', 'Karyawan'),
(11, 'fdsf', 'dsfds', '08c6a51dde006e64aed953b94fd68f0c', 'Karyawan'),
(12, 'fdsf', 'sdfsdf', 'd4b2758da0205c1e0aa9512cd188002a', 'Karyawan'),
(13, 'dfgdf', 'gdf', '6ff81213f4309e6d2fcf1f6350f79c5b', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
