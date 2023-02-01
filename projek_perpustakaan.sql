-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 10.28
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` char(5) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `tahun_penerbit` char(4) NOT NULL,
  `gambar_buku` varchar(100) NOT NULL,
  `stok_buku` char(11) NOT NULL,
  `sinopsis` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_penerbit`, `gambar_buku`, `stok_buku`, `sinopsis`) VALUES
(10018, '0001', 'Udin Vtuber Kaya', 'Asep', 'PT Magrib', '2022', 'Udin Vtuber Kaya.jpg', '10', 'Disuatu kota hiduplah seseorang yg bernama Udin. Udin sangat gemar menonton Vtuber ,Tiap hari ia selalu mendonate dan selalu memuji Vtuber yg ia tonton. Tapi suatu ketika orng tua Udin mengalami penurunan ekonomi yg membuat Udin tidak bisa menghamburkan uangnya untuk mendonate Vtuber , Karena itu ide cemerlang pun terlintas di pikiran Udin yaitu Udin ingin mendaftar sebagai Vtuber . apakah ide udin akan berjalan mulus atau tidak?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kembali`
--

CREATE TABLE `log_kembali` (
  `id_log_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alasan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `nis` char(4) NOT NULL,
  `kode_buku` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nis` char(4) NOT NULL,
  `nip` char(4) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jk_anggota` varchar(10) NOT NULL,
  `jurusan_anggota` varchar(50) NOT NULL,
  `no_telp_anggota` varchar(50) NOT NULL,
  `alamat_anggota` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nis`, `nip`, `nama_anggota`, `jk_anggota`, `jurusan_anggota`, `no_telp_anggota`, `alamat_anggota`, `username`, `password`, `email`, `gambar`, `level`) VALUES
(6769, '', '0001', 'Ibu Kiki ', 'Perempuan', 'Admin', 'o88829379218149', 'Bumi', 'admin123', '827ccb0eea8a706c4c34a16891f84e7b', 'admin123@gmail.com', '62a1ae9280962.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indeks untuk tabel `log_kembali`
--
ALTER TABLE `log_kembali`
  ADD PRIMARY KEY (`id_log_kembali`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10025;

--
-- AUTO_INCREMENT untuk tabel `log_kembali`
--
ALTER TABLE `log_kembali`
  MODIFY `id_log_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6770;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
