-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2021 pada 06.38
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_simpan_pinjam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(150) CHARACTER SET latin1 NOT NULL,
  `level` varchar(30) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `email`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Dionysius Yudha Riadi', 'dionriadi@student.ub.ac.id', 'dion', '982c500a206551c665f746cc9e77a961', 'Superadmin', 'dion.png'),
(2, 'Desi Fitriyyah', 'desifitriyyah25@student.ub.ac.id', 'desi', '069e2dd171f61ecffb845190a7adf425', 'Superadmin', 'desi.jpeg'),
(3, 'Deva Nur Fadhilah', 'devanur@student.ub.ac.id', 'deva', '5b369dd8eefbc60ac2880e9538448121', 'Superadmin', 'deva.jpg'),
(4, 'Hafiza Kartikasari', 'hafizaka@student.ub.ac.id', 'hafiza', '3487557f227137a65d7961dfc88f1a27', 'Admin', 'hafiza.jpg'),
(5, 'Eiden', '-', 'eiden', '9880b727d2a776575c388907b7a9a783', 'Admin', ''),
(6, 'Raihan', '-', 'raihan', 'daa6b8d04ce72d953d5501adc53ddd82', 'Admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `no_hp` int(15) DEFAULT NULL,
  `no_ktp` int(30) DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status/pekerjaan` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'anggota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `tgl_daftar`, `no_hp`, `no_ktp`, `alamat`, `status/pekerjaan`, `level`) VALUES
(1, 'member 1', '2021-11-10', 12345667, 12314214, 'Blitar', 'pelajar', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `id_jenis_simpanan` int(11) NOT NULL,
  `jenis_simpanan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pinjaman` int(11) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `jumlah_pembayaran` int(30) DEFAULT NULL,
  `pembayaran_ke` int(11) DEFAULT NULL,
  `sisa` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `isi` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `jumlah_pinjaman` int(30) DEFAULT NULL,
  `pembayaran_per_bulan` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `id_jenis_simpanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`id_jenis_simpanan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `kode_pinjaman` (`id_pinjaman`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `relasi_simpanan` (`id_jenis_simpanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  MODIFY `id_jenis_simpanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `relasi_simpanan` FOREIGN KEY (`id_jenis_simpanan`) REFERENCES `jenis_simpanan` (`id_jenis_simpanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
