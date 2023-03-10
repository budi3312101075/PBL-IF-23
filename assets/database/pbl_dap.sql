-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2023 pada 05.33
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbl_dap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `id_users`, `username`, `status`, `keterangan`, `tanggal`, `nominal`) VALUES
(19, 4, 'superadmin', 'Pemasukan', 'pemasukan bulan desember 2022', '2022-12-01', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_dap`
--

CREATE TABLE `kriteria_dap` (
  `id_kriteria` int(15) NOT NULL,
  `id_users` int(15) NOT NULL,
  `jenis_bantuan` varchar(100) NOT NULL,
  `nominal` varchar(30) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_dap`
--

INSERT INTO `kriteria_dap` (`id_kriteria`, `id_users`, `jenis_bantuan`, `nominal`, `keterangan`, `dokumen`) VALUES
(17, 4, 'bantuan menikah', '1.000.000', 'plus papan bunga daerah yang bisa terjangkau dan tersedia informasi/kontrak pembelian online', 'pemberitahuan ke admin dan bagian kepegawaian'),
(18, 4, 'keguguran(trisemester 2)', '1.000.000', 'santunan duka keguguran', 'pemberitahuan ke admin dan bagian kepegawaian'),
(19, 4, 'karyawan meninggal', '8.000.000', '', 'pemberitahuan ke admin dan bagian kepegawaian'),
(20, 4, 'khitan anak', '300.000', 'bisa berupa paket buah tangan senilai jumlah tersebut', 'pemberitahuan ke admin dan bagian kepegawaian'),
(21, 4, 'kecelakaan lalu lintas', '10.000.000', 'per tahun', 'surat keterangan hasil diagnosa dari dokter spesialis dan lab, beserta KK, pemberitahuan ke admin DAP dan bagian kepegawaian'),
(22, 4, 'bantuan meninggal', '2.000.000', 'plus papan bunga daerah yang bisa terjangkau dan tersedia informasi/kontrak pembelian online', 'pemberitahuan ke admin dan bagian kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(15) NOT NULL,
  `id_users` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `nominal` varchar(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jenis_bantuan` varchar(100) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `deskripsi_status` varchar(255) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_users`, `username`, `tanggal`, `telepon`, `nominal`, `deskripsi`, `jenis_bantuan`, `bukti`, `status`, `deskripsi_status`, `bukti_transfer`) VALUES
(77, 5, 'karyawan', '2023-01-04', '089519113444', '1000000', 'saya akan menikah pada tanggal 10 januari 2023', 'bantuan menikah', 'Foto19.jpg', 'Selesai', 'selesai', '16702476338297.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_users` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_users`, `username`, `password`, `level`, `no_telp`, `email`, `nama`) VALUES
(4, 'superadmin', 'superadmin', 'superadmin', '089519113444', 'danaamalpoltek@polibatam.ac.id', 'superadmin'),
(5, 'karyawan', 'karyawan', 'karyawan', '089519113444', 'adsadawfafsafa@gmail.com', 'karyawan'),
(6, 'admin', 'admin', 'admin', '089519113444', 'registrasi.@polibatam.ac.id', 'admin'),
(7, 'manajemen', 'manajemen', 'manajemen', '089519113444', 'registrasi.@polibatam.ac.id', 'manajemen'),
(12, 'budiprayoga', 'budiprayoga', 'karyawan', '089519113444', 'budiprayoga5103@gmail.com', 'budiprayoga');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `kriteria_dap`
--
ALTER TABLE `kriteria_dap`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kriteria_dap`
--
ALTER TABLE `kriteria_dap`
  MODIFY `id_kriteria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `user` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria_dap`
--
ALTER TABLE `kriteria_dap`
  ADD CONSTRAINT `kriteria_dap_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `user` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `user` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
