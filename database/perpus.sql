-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2023 pada 02.35
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kelas`
--

CREATE TABLE `r_kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat_kelas` int(2) NOT NULL,
  `nm_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_kelas`
--

INSERT INTO `r_kelas` (`id_kelas`, `tingkat_kelas`, `nm_kelas`) VALUES
(3, 10, 'X Umum 5'),
(4, 11, 'XI MIPA-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_buku`
--

CREATE TABLE `t_buku` (
  `id_buku` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `no_isbn` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_entri` date NOT NULL,
  `sampul` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_buku`
--

INSERT INTO `t_buku` (`id_buku`, `kode`, `judul`, `pengarang`, `penerbit`, `no_isbn`, `jumlah`, `tgl_entri`, `sampul`) VALUES
(4, 'A1', 'Cover book', 'indra', 'Cetak AR', 'isd-98-99', 8, '2023-01-11', 'mountain-survival-book-cover-template-design-5d7d298dc21cc8bf45e36a3c7caa732e_screen.jpg'),
(5, 'A2', 'Cinta di pelupuk mata', 'andre', 'CItra surabaya', 'isd-98-9945', 4, '2023-01-11', '97535_f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE `t_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` int(2) NOT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_entri` date NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`id_guru`, `nip`, `nama`, `alamat`, `jk`, `hp`, `tgl_lahir`, `tgl_entri`, `email`) VALUES
(10, '999', 'ALI', 'surabya', 2, '5453453', '2023-01-12', '2023-01-13', NULL),
(11, '98765', 'H. Yohanes', 'Surabaya', 1, '335435', '2023-01-02', '2023-01-14', 'yohanes@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log`
--

CREATE TABLE `t_log` (
  `id_log` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` int(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_log`
--

INSERT INTO `t_log` (`id_log`, `username`, `jam_masuk`, `jam_keluar`, `status`, `tanggal`) VALUES
(159, 'gilang@gmail.com', '08:37:21', NULL, 2, '2023-01-10'),
(160, 'andi@gmail.com', '08:38:45', NULL, 2, '2023-01-10'),
(161, 'andi@gmail.com', '08:39:44', NULL, 1, '2023-01-10'),
(162, 'andi@gmail.com', '09:38:21', NULL, 1, '2023-01-10'),
(163, 'andi@gmail.com', '10:28:15', NULL, 1, '2023-01-10'),
(164, 'andi@gmail.com', '11:20:51', NULL, 1, '2023-01-10'),
(165, 'andi@gmail.com', '12:45:36', NULL, 1, '2023-01-10'),
(166, 'andi@gmail.com', '19:08:13', NULL, 1, '2023-01-10'),
(167, 'andi@gmail.com', '20:16:04', NULL, 1, '2023-01-10'),
(168, 'andi@gmail.com', '09:03:54', NULL, 1, '2023-01-11'),
(169, 'andi@gmail.com', '10:04:38', NULL, 1, '2023-01-11'),
(170, 'andi@gmail.com', '21:21:18', NULL, 1, '2023-01-11'),
(171, 'andi@gmail.com', '20:18:41', NULL, 1, '2023-01-12'),
(172, 'andi@gmail.com', '15:30:56', NULL, 2, '2023-01-13'),
(173, 'andi@gmail.com', '15:31:02', NULL, 1, '2023-01-13'),
(174, 'andi@gmail.com', '20:35:02', NULL, 1, '2023-01-13'),
(175, 'vivi@gmail.com', '12:10:26', NULL, 1, '2023-01-14'),
(176, 'yohanes@gmail.com', '13:43:37', NULL, 1, '2023-01-14'),
(177, 'vivi@gmail.com', '13:44:11', NULL, 1, '2023-01-14'),
(178, 'andi@gmail.com', '17:39:00', NULL, 1, '2023-01-14'),
(179, 'vivi@gmail.com', '17:39:26', NULL, 1, '2023-01-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `catatan_pinjam` longtext DEFAULT NULL,
  `catatan_kembali` longtext DEFAULT NULL,
  `status` int(2) NOT NULL,
  `tgl_diambil` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`id_pinjam`, `id_buku`, `id_user`, `tgl_pinjam`, `tgl_kembali`, `catatan_pinjam`, `catatan_kembali`, `status`, `tgl_diambil`) VALUES
(1, 4, 3, '2022-12-01', NULL, 'Kondisi baik', NULL, 1, NULL),
(3, 4, 6, '2023-01-14', NULL, NULL, NULL, 2, '2023-01-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_setting_aplikasi`
--

CREATE TABLE `t_setting_aplikasi` (
  `id_setting` int(2) NOT NULL,
  `nm_aplikasi` varchar(50) NOT NULL,
  `nm_footer` varchar(100) NOT NULL,
  `foto_aplikasi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_setting_aplikasi`
--

INSERT INTO `t_setting_aplikasi` (`id_setting`, `nm_aplikasi`, `nm_footer`, `foto_aplikasi`) VALUES
(3, 'SIPER', 'Prayogi Academy', 'apple-logo-png-dallas-shootings-don-add-are-speech-zones-used-4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` int(2) NOT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `id_kelas` int(3) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_entri` date NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `nis`, `nama`, `alamat`, `jk`, `hp`, `id_kelas`, `tgl_lahir`, `tgl_entri`, `email`) VALUES
(2, '123', 'ALI', 'surabya', 1, '085173418206', 3, '2023-01-09', '2023-01-10', NULL),
(3, '234', 'Angga saputra', 'Gresik', 1, '342423', 4, '2023-01-10', '2023-01-11', NULL),
(4, '55', 'ika', 'surabaya', 2, '24324', 3, '2023-01-02', '2023-01-13', NULL),
(6, '8989', 'Cici', 'Jogja', 2, '2342323', 4, '2023-01-10', '2023-01-14', 'vivi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(5) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `foto` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `user_name`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'andi@gmail.com', '$2y$10$m7hzm9cMIzGfY4RCS4j8jOaHoBtCKTi6idGTpkhn2K.gVhr0UXeB.', 'Administrator', 1, 'user.png'),
(15, 'ali@gmail.com', '$2y$10$EWGSJBn6zP/verbCzs0txeuxulGvtdUFH34fBpfBmCVKg0n1clNdi', 'ALI', 2, '585e4bcdcb11b227491c3396.png'),
(17, 'vivi@gmail.com', '$2y$10$/S7RNL5kHh5rjU/IpbtpfeyDMKnLpXHr938HWn.9UeiB1L1GLprPu', 'Cici', 2, NULL),
(18, 'yohanes@gmail.com', '$2y$10$AGJ7jWzEUAyMHWPBp1w5WeOCUXsTSwRoIwwHkPtoTOwj6uCQr9VrW', 'H. Yohanes', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `r_kelas`
--
ALTER TABLE `r_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `t_log`
--
ALTER TABLE `t_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `t_setting_aplikasi`
--
ALTER TABLE `t_setting_aplikasi`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `r_kelas`
--
ALTER TABLE `r_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_log`
--
ALTER TABLE `t_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT untuk tabel `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_setting_aplikasi`
--
ALTER TABLE `t_setting_aplikasi`
  MODIFY `id_setting` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
