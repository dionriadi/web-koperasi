-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2021 pada 10.31
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
  `id_admin` int(11) NOT NULL,
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

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Dionysius Yudha Riadi', 'dion@email.com', 'dion', '982c500a206551c665f746cc9e77a961', 'Superadmin', 'dion.png'),
(2, 'Desi Fitriyyah', 'desi@email.com', 'desi', '069e2dd171f61ecffb845190a7adf425', 'Superadmin', 'desi.jpeg'),
(4, 'Hafiza Kartikasari', 'hafiza@email.com', 'hafiza', '3487557f227137a65d7961dfc88f1a27', 'Admin', 'hafiza.jpg'),
(6, 'Raihan', 'raihan@email.com', 'raihan', 'daa6b8d04ce72d953d5501adc53ddd82', 'Superadmin', 'Screenshot (235).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL,
  `nama_anggota` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `total_tabungan` int(20) NOT NULL,
  `total_pinjaman` int(20) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'anggota',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `tgl_daftar`, `total_tabungan`, `total_pinjaman`, `no_hp`, `email`, `username`, `password`, `alamat`, `pekerjaan`, `level`, `foto`) VALUES
(1, 'Anggota1', '2021-12-09', 6822222, 9000005, '09763126386', 'tes@email.com', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'Blitar', 'peternak', 'anggota', 'Screenshot (236).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `id_jenis_simpanan` int(11) NOT NULL,
  `jenis_simpanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`id_jenis_simpanan`, `jenis_simpanan`) VALUES
(1, 'Simpanan Wajib'),
(2, 'Simpanan Pokok'),
(3, 'Simpanan Sukarela');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(5) NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `metode_pembayaran`) VALUES
(1, 'Go Pay'),
(2, 'Shoppe Pay'),
(3, 'Dana'),
(4, 'Ovo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `isi` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_admin`, `judul`, `isi`, `tanggal`) VALUES
(1, 1, 'Tentang Koperasi', 'Koperasi Adalah blablabla', '2021-12-02'),
(2, 1, 'coba', 'd', '2021-12-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_anggota` int(5) DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `batas_bayar` date NOT NULL,
  `jumlah_pinjaman` int(30) DEFAULT NULL,
  `bukti` varchar(30) NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_anggota`, `tgl_pinjaman`, `batas_bayar`, `jumlah_pinjaman`, `bukti`, `keterangan`) VALUES
(3, 1, '2021-12-10', '2021-12-27', 22222222, 'Screenshot (240).png', 'lunas'),
(4, 1, '2021-12-11', '2021-12-22', 100000, 'Screenshot (240).png', 'lunas'),
(5, 1, '2021-12-11', '2021-12-22', 5, 'Screenshot (240).png', 'lunas'),
(6, 1, '2021-12-11', '2021-12-31', 9000, 'Screenshot (240).png', 'belum'),
(7, 1, '2021-12-11', '2022-01-08', 20000000, 'Screenshot (240).png', 'belum'),
(8, 1, '2021-12-11', '2021-12-11', 9000000, 'Screenshot (240).png', 'belum'),
(9, 1, '2021-12-11', '2021-11-30', 5, 'Screenshot (240).png', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `id_jenis_simpanan` int(11) NOT NULL,
  `id_metode` int(5) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_anggota`, `id_jenis_simpanan`, `id_metode`, `jumlah`) VALUES
(13, 1, 2, 1, 500000),
(14, 1, 3, 2, 1000000),
(15, 1, 1, 1, 1000000),
(16, 1, 3, 2, 1000000),
(17, 1, 1, 1, 1000000),
(18, 1, 2, 3, 1000000),
(19, 1, 2, 2, 1000000),
(20, 1, 1, 1, 1000000),
(21, 1, 2, 1, 1000000),
(22, 1, 3, 1, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_dana`
--

CREATE TABLE `total_dana` (
  `id_total` int(11) NOT NULL,
  `nama_dana` varchar(20) NOT NULL,
  `total_dana` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `total_dana`
--

INSERT INTO `total_dana` (`id_total`, `nama_dana`, `total_dana`) VALUES
(1, 'total_tabungan', 213217),
(2, 'total_pinjaman', 29009005);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `jumlah_pembayaran` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_anggota`, `jenis_pembayaran`, `tgl_transaksi`, `jumlah_pembayaran`) VALUES
(18, 1, 'Penambahan Tabungan', '2021-12-20', 1000000),
(19, 1, 'Pengambilan Tabungan', '2021-12-11', 1000000),
(20, 1, 'Penambahan Tabungan', '2021-12-11', 500000),
(21, 1, 'Penambahan Tabungan', '2021-12-11', 1000000),
(22, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(23, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(24, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(25, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(26, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(27, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(28, 1, 'Pembayaran Simpanan', '2021-12-01', 1000000),
(29, 1, 'Pembayaran Simpanan', '2021-12-11', 1000000),
(30, 1, 'Pembayaran Pinjaman', '2021-12-11', 5),
(31, 1, 'Pembayaran Pinjaman', '2021-12-11', 22222222),
(32, 1, 'Peminjaman', '2021-12-11', 9000),
(33, 1, 'Peminjaman', '2021-12-11', 20000000),
(34, 1, 'Peminjaman', '2021-12-11', 9000000),
(35, 1, 'Peminjaman', '2021-12-11', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `relasi_penulis` (`id_admin`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `relasi_pinjaman` (`id_anggota`);

--
-- Indeks untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD KEY `relasi_simpanan` (`id_jenis_simpanan`),
  ADD KEY `relasi_anggota` (`id_anggota`),
  ADD KEY `relasi_metode` (`id_metode`);

--
-- Indeks untuk tabel `total_dana`
--
ALTER TABLE `total_dana`
  ADD PRIMARY KEY (`id_total`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `relasi_bayar` (`id_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  MODIFY `id_jenis_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `total_dana`
--
ALTER TABLE `total_dana`
  MODIFY `id_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `relasi_penulis` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `relasi_pinjaman` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `relasi_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_jenis_simpanan` FOREIGN KEY (`id_jenis_simpanan`) REFERENCES `jenis_simpanan` (`id_jenis_simpanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_metode` FOREIGN KEY (`id_metode`) REFERENCES `metode_pembayaran` (`id_metode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `relasi_bayar` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
