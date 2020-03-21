-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2019 pada 09.12
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bipa_dummy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(1) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'pengajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `source_user`
--

CREATE TABLE `source_user` (
  `id_source` int(1) NOT NULL,
  `source` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `source_user`
--

INSERT INTO `source_user` (`id_source`, `source`) VALUES
(1, 'facebook'),
(2, 'google'),
(3, 'self_signup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_level` int(1) NOT NULL,
  `id_source` int(1) NOT NULL,
  `picture` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `id_level`, `id_source`, `picture`) VALUES
('10215231885459078', 'Vandha Pra Wid', 'jervis_vandraz@yahoo.com', '', 2, 1, 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=10215231885459078&height=50&width=50&ext=1575350021&hash=AeTYZ3PUk0f7VAVt'),
('115745551605201414866', 'Vandha Pradwiyasma Widartha', 'jervis.vandraz@gmail.com', '', 2, 2, 'https://lh3.googleusercontent.com/a-/AAuE7mC5vmC-YeRHItqvFMGuBkHbaLNSBlufRmDxc0OQ0A');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `source_user`
--
ALTER TABLE `source_user`
  ADD PRIMARY KEY (`id_source`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_ibfk_1` (`id_level`),
  ADD KEY `id_source` (`id_source`),
  ADD KEY `id_source_2` (`id_source`),
  ADD KEY `id_source_3` (`id_source`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `source_user`
--
ALTER TABLE `source_user`
  MODIFY `id_source` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_source`) REFERENCES `source_user` (`id_source`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
