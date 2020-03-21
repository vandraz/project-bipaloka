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
-- Database: `dbbipa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_pengajar`
--

CREATE TABLE `ms_pengajar` (
  `id_pengajar` varchar(10) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `nm_lengkap` varchar(200) NOT NULL,
  `asal_kota` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `asal_institusi` varchar(100) NOT NULL,
  `asal_univs1` varchar(100) NOT NULL,
  `jurusan_s1` varchar(150) NOT NULL,
  `asal_univs2` varchar(100) DEFAULT NULL,
  `jurusan_s2` varchar(150) DEFAULT NULL,
  `asal_univs3` varchar(100) DEFAULT NULL,
  `jurusan_s3` varchar(150) NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `ijazah` text NOT NULL,
  `pengalaman` varchar(500) NOT NULL,
  `up_pengalaman` text NOT NULL,
  `hobi` varchar(100) NOT NULL,
  `keterampilan` varchar(150) NOT NULL,
  `foto` text NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_rek_bank` int(50) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_ktp` int(50) NOT NULL,
  `suku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_siswa`
--

CREATE TABLE `ms_siswa` (
  `id_siswa` varchar(10) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `foto` varchar(300) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `zona_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_skype` varchar(100) NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_day`
--

CREATE TABLE `sm_day` (
  `id_day` int(11) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sm_day`
--

INSERT INTO `sm_day` (`id_day`, `day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_peserta`
--

CREATE TABLE `sm_peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(250) NOT NULL,
  `email_peserta` varchar(250) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `id_day` int(11) NOT NULL,
  `id_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sm_peserta`
--

INSERT INTO `sm_peserta` (`id_peserta`, `nama_peserta`, `email_peserta`, `status_pembayaran`, `id_paket`, `id_tutor`, `id_day`, `id_time`) VALUES
(1, 'Rio de janeiro', 'rio@gmail.com', 0, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_time`
--

CREATE TABLE `sm_time` (
  `id_time` int(11) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sm_time`
--

INSERT INTO `sm_time` (`id_time`, `time`) VALUES
(1, '05.00 - 06.00 am'),
(2, '06.00 - 07.00 am'),
(3, '07.00 - 08.00 am'),
(4, '08.00 - 09.00 am');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_timetutor`
--

CREATE TABLE `sm_timetutor` (
  `id_timetutor` int(11) NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `id_day` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `id_time2` int(11) DEFAULT NULL,
  `id_time3` int(11) DEFAULT NULL,
  `id_time4` int(11) DEFAULT NULL,
  `id_time5` int(11) DEFAULT NULL,
  `id_time6` int(11) DEFAULT NULL,
  `id_time7` int(11) DEFAULT NULL,
  `id_time8` int(11) DEFAULT NULL,
  `id_time9` int(11) DEFAULT NULL,
  `id_time10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sm_timetutor`
--

INSERT INTO `sm_timetutor` (`id_timetutor`, `id_tutor`, `id_day`, `id_time`, `id_time2`, `id_time3`, `id_time4`, `id_time5`, `id_time6`, `id_time7`, `id_time8`, `id_time9`, `id_time10`) VALUES
(1, 1, 1, 2, 1, 3, 2, 2, 4, 1, NULL, NULL, NULL),
(2, 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 4, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 6, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 6, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 7, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 3, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 4, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_tutor`
--

CREATE TABLE `sm_tutor` (
  `id_tutor` int(11) NOT NULL,
  `nama_tutor` varchar(250) NOT NULL,
  `email_tutor` varchar(250) NOT NULL,
  `pendidikan_tutor` varchar(100) NOT NULL,
  `jurusan_tutor` varchar(200) NOT NULL,
  `pengalaman_tutor` varchar(500) NOT NULL,
  `language_tutor` varchar(250) NOT NULL,
  `keterampilan_tutor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sm_tutor`
--

INSERT INTO `sm_tutor` (`id_tutor`, `nama_tutor`, `email_tutor`, `pendidikan_tutor`, `jurusan_tutor`, `pengalaman_tutor`, `language_tutor`, `keterampilan_tutor`) VALUES
(1, 'Vindiatul Miftah Maulyna', 'vindiatulmiftah@gmail.com', 'Bachelor', 'Language Education, Indonesian and Regional Literature - State University of Malang ', '2014-2016 Students who take BIPA lectures at Malang State University;\r\n2015 Peer Tutor Critical Language Scholarship Program at Malang State University;\r\n2015 Following Student Exchange for the BIPA Teaching Practice Program at Walailak University, Thailand;\r\n2016 BIPA Instructors in the Critical La', 'Java', '- Interested in teaching world, especially Indonesian language teaching for foreign speakers (BIPA);\r\n- Traveling;\r\n- Baking'),
(2, 'Hasan Nugroho', 'hasannugroho90@gmail.com', 'Bachelor', 'Language, Indonesian Literature and Regional Education, State University of Malang', 'ISP Dharmasiswa Instructor Program STIE Malangkucecwara 201-2019, Flower Program Instructor ISP STIE Malangkucecwara 2018, Instructor Critical Language (CLS) Scholarship Program at State University of 2017, Peer-Tutor Critical Language (CLS) Scholarship Program Malang State University 2015, Peer-Tutor Program 2014 Critical Language (CLS) Scholarship of State University of Malang, 2013 Peer-Tutor Critical Language (CLS) Scholarship Program at State University of Malang', 'Java', 'Singing and playing music of Indonesian traditional songs'),
(3, 'Imam Mashuri', 'MASHURI.LING@gmail.com', 'Bachelor', 'English language and literature, english education', 'Peer tutor Program CLS Amerika 2012-2014 - UM; Language Instructor CLS Amerika 2015-2018 - UM; Language Instructor Program Bunga 2018 -ISP MCE; Language Instructor of Darmasiswa 2018/2019- ISP MCE; Language Instructor of  Sakura Program 2019- ISP MCE', 'Java', 'Traveling, Reading, Watching Movie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sm_waktu`
--

CREATE TABLE `sm_waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sm_waktu`
--

INSERT INTO `sm_waktu` (`id_waktu`, `waktu`) VALUES
(1, '08.00 - 10.00'),
(2, '10.00 - 11.00'),
(3, '07.00 - 08.00 am'),
(4, '11.00 - 12.00 am');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank_soal`
--

CREATE TABLE `tb_bank_soal` (
  `id_soal` varchar(15) NOT NULL,
  `id_kategori_soal` tinyint(1) NOT NULL,
  `soal` varchar(300) NOT NULL,
  `gambar_soal` text NOT NULL,
  `jawaban_a` varchar(100) NOT NULL,
  `jawaban_b` varchar(100) NOT NULL,
  `jawaban_c` varchar(100) NOT NULL,
  `jawaban_d` varchar(100) NOT NULL,
  `jawaban_e` varchar(100) NOT NULL,
  `jawaban_tf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `kode_jadwal` varchar(15) NOT NULL,
  `id_pengajar` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `id_kelas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jk`
--

CREATE TABLE `tb_jk` (
  `id_jk` tinyint(1) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jk`
--

INSERT INTO `tb_jk` (`id_jk`, `jk`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_soal`
--

CREATE TABLE `tb_kategori_soal` (
  `id_kategori` tinyint(1) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_soal`
--

INSERT INTO `tb_kategori_soal` (`id_kategori`, `kategori`) VALUES
(1, 'Pilihan Ganda'),
(2, 'True / False'),
(3, 'Mencocokkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` tinyint(1) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'BIPA'),
(2, 'Bahasa Daerah Jawa'),
(3, 'Bahasa Daerah Sunda'),
(4, 'Bahasa Daerah Batak'),
(5, 'Bahasa Daerah Bali'),
(6, 'Bahasa Daerah Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_bipa`
--

CREATE TABLE `tb_level_bipa` (
  `id_level` tinyint(1) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level_bipa`
--

INSERT INTO `tb_level_bipa` (`id_level`, `level`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'B1'),
(4, 'B2'),
(5, 'C1'),
(6, 'C2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_user`
--

CREATE TABLE `tb_level_user` (
  `id_level` tinyint(1) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level_user`
--

INSERT INTO `tb_level_user` (`id_level`, `level`) VALUES
(1, 'Tutor / Guru'),
(2, 'Siswa'),
(3, 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_medsos`
--

CREATE TABLE `tb_medsos` (
  `id_medsos` tinyint(1) NOT NULL,
  `medsos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_medsos`
--

INSERT INTO `tb_medsos` (`id_medsos`, `medsos`) VALUES
(1, 'Manual'),
(2, 'Facebook'),
(3, 'Gmail'),
(4, 'WeChat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajaran`
--

CREATE TABLE `tb_pengajaran` (
  `kode_pengajaran` varchar(20) NOT NULL,
  `id_pengajar` varchar(15) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `kode_jadwal` varchar(15) NOT NULL,
  `id_level` tinyint(1) NOT NULL,
  `id_kelas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rating_pengajar`
--

CREATE TABLE `tb_rating_pengajar` (
  `id_pengajar` varchar(15) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `rating` int(2) NOT NULL,
  `total_rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rating_siswa`
--

CREATE TABLE `tb_rating_siswa` (
  `id_siswa` varchar(10) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_level` tinyint(1) NOT NULL,
  `id_medsos` tinyint(1) NOT NULL,
  `foto` text NOT NULL,
  `tgllahir` date NOT NULL,
  `aktivasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_pengajar`
--
ALTER TABLE `ms_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `jk` (`jk`);

--
-- Indeks untuk tabel `ms_siswa`
--
ALTER TABLE `ms_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `jk` (`jk`);

--
-- Indeks untuk tabel `sm_day`
--
ALTER TABLE `sm_day`
  ADD PRIMARY KEY (`id_day`);

--
-- Indeks untuk tabel `sm_peserta`
--
ALTER TABLE `sm_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_tutor_2` (`id_tutor`),
  ADD KEY `id_day_2` (`id_day`),
  ADD KEY `id_time_2` (`id_time`);

--
-- Indeks untuk tabel `sm_time`
--
ALTER TABLE `sm_time`
  ADD PRIMARY KEY (`id_time`);

--
-- Indeks untuk tabel `sm_timetutor`
--
ALTER TABLE `sm_timetutor`
  ADD PRIMARY KEY (`id_timetutor`),
  ADD KEY `id_tutor_2` (`id_tutor`),
  ADD KEY `id_time_2` (`id_time`),
  ADD KEY `id_time2_2` (`id_time2`),
  ADD KEY `id_time3_2` (`id_time3`),
  ADD KEY `id_time4_2` (`id_time4`),
  ADD KEY `id_time5_2` (`id_time5`),
  ADD KEY `id_time6_2` (`id_time6`),
  ADD KEY `id_time7_2` (`id_time7`),
  ADD KEY `id_time8_2` (`id_time8`),
  ADD KEY `id_time9_2` (`id_time9`),
  ADD KEY `id_time10_2` (`id_time10`),
  ADD KEY `id_day` (`id_day`);

--
-- Indeks untuk tabel `sm_tutor`
--
ALTER TABLE `sm_tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indeks untuk tabel `sm_waktu`
--
ALTER TABLE `sm_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indeks untuk tabel `tb_bank_soal`
--
ALTER TABLE `tb_bank_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kategori_soal` (`id_kategori_soal`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_jk`
--
ALTER TABLE `tb_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `tb_kategori_soal`
--
ALTER TABLE `tb_kategori_soal`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_level_bipa`
--
ALTER TABLE `tb_level_bipa`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_level_user`
--
ALTER TABLE `tb_level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_medsos`
--
ALTER TABLE `tb_medsos`
  ADD PRIMARY KEY (`id_medsos`);

--
-- Indeks untuk tabel `tb_pengajaran`
--
ALTER TABLE `tb_pengajaran`
  ADD PRIMARY KEY (`kode_pengajaran`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `kode_jadwal` (`kode_jadwal`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_rating_pengajar`
--
ALTER TABLE `tb_rating_pengajar`
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_rating_siswa`
--
ALTER TABLE `tb_rating_siswa`
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_medsos` (`id_medsos`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sm_day`
--
ALTER TABLE `sm_day`
  MODIFY `id_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sm_peserta`
--
ALTER TABLE `sm_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sm_time`
--
ALTER TABLE `sm_time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sm_timetutor`
--
ALTER TABLE `sm_timetutor`
  MODIFY `id_timetutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sm_tutor`
--
ALTER TABLE `sm_tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sm_waktu`
--
ALTER TABLE `sm_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jk`
--
ALTER TABLE `tb_jk`
  MODIFY `id_jk` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_soal`
--
ALTER TABLE `tb_kategori_soal`
  MODIFY `id_kategori` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_level_bipa`
--
ALTER TABLE `tb_level_bipa`
  MODIFY `id_level` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_level_user`
--
ALTER TABLE `tb_level_user`
  MODIFY `id_level` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_medsos`
--
ALTER TABLE `tb_medsos`
  MODIFY `id_medsos` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ms_pengajar`
--
ALTER TABLE `ms_pengajar`
  ADD CONSTRAINT `fk_pengajar_jk` FOREIGN KEY (`jk`) REFERENCES `tb_jk` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajar_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ms_siswa`
--
ALTER TABLE `ms_siswa`
  ADD CONSTRAINT `fk_siswa_jk` FOREIGN KEY (`jk`) REFERENCES `tb_jk` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_bank_soal`
--
ALTER TABLE `tb_bank_soal`
  ADD CONSTRAINT `fk_bank_kategori` FOREIGN KEY (`id_kategori_soal`) REFERENCES `tb_kategori_soal` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `fk_jadwal_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jadwal_pengajar` FOREIGN KEY (`id_pengajar`) REFERENCES `ms_pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengajaran`
--
ALTER TABLE `tb_pengajaran`
  ADD CONSTRAINT `fk_pengajaran_jadwal` FOREIGN KEY (`kode_jadwal`) REFERENCES `tb_jadwal` (`kode_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajaran_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajaran_level` FOREIGN KEY (`id_level`) REFERENCES `tb_level_bipa` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajaran_pengajar` FOREIGN KEY (`id_pengajar`) REFERENCES `ms_pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengajaran_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `ms_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rating_pengajar`
--
ALTER TABLE `tb_rating_pengajar`
  ADD CONSTRAINT `fk_rating_pengajar` FOREIGN KEY (`id_pengajar`) REFERENCES `ms_pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rating_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `ms_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rating_siswa`
--
ALTER TABLE `tb_rating_siswa`
  ADD CONSTRAINT `fk_rating_siswa1` FOREIGN KEY (`id_siswa`) REFERENCES `ms_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`id_level`) REFERENCES `tb_level_user` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_medsos` FOREIGN KEY (`id_medsos`) REFERENCES `tb_medsos` (`id_medsos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
