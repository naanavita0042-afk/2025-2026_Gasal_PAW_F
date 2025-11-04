-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2025 pada 13.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Beras 5kg', 65000.00, 50, 1),
(2, 'BRG002', 'Gula 1kg', 15000.00, 100, 2),
(3, 'BRG003', 'Minyak Goreng 1L', 20000.00, 80, 3),
(4, 'BRG004', 'Telur 1kg', 25000.00, 70, 4),
(5, 'BRG005', 'Tepung Terigu 1kg', 12000.00, 90, 5),
(6, 'BRG006', 'Kopi 100gr', 10000.00, 60, 6),
(7, 'BRG007', 'Teh Celup 25pcs', 9000.00, 40, 7),
(8, 'BRG008', 'Susu 1L', 18000.00, 50, 8),
(9, 'BRG009', 'Sabun Mandi', 6000.00, 120, 9),
(10, 'BRG010', 'Shampoo 100ml', 8000.00, 110, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL CHECK (`jenis_kelamin` in ('L','P')),
  `telp` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi Pratama', 'L', 2147483647, 'Jl. Melati No.1'),
(2, 'Budi Santoso', 'L', 2147483647, 'Jl. Kenanga No.2'),
(3, 'Citra Ayu', 'P', 2147483647, 'Jl. Mawar No.3'),
(4, 'Dewi Lestari', 'P', 2147483647, 'Jl. Anggrek No.4'),
(5, 'Eko Saputra', 'L', 2147483647, 'Jl. Dahlia No.5'),
(6, 'Fitri Handayani', 'P', 2147483647, 'Jl. Flamboyan No.6'),
(7, 'Gilang Ramadhan', 'L', 2147483647, 'Jl. Merpati No.7'),
(8, 'Hani Wulandari', 'P', 2147483647, 'Jl. Rajawali No.8'),
(9, 'Indra Wijaya', 'L', 2147483647, 'Jl. Cendrawasih No.9'),
(10, 'Joko Susilo', 'L', 2147483647, 'Jl. Kutilang No.10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT NULL,
  `metode` enum('Tunai','Transfer','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 10:05:00', 85000.00, 'Tunai', 1),
(2, '2025-10-02 11:35:00', 125000.00, 'Transfer', 2),
(3, '2025-10-03 09:20:00', 56000.00, 'EDC', 3),
(4, '2025-10-04 14:50:00', 74000.00, 'Tunai', 4),
(5, '2025-10-05 16:15:00', 98000.00, 'Transfer', 5),
(6, '2025-10-06 08:25:00', 112000.00, 'EDC', 6),
(7, '2025-10-07 12:05:00', 93000.00, 'Tunai', 7),
(8, '2025-10-08 13:15:00', 71000.00, 'Transfer', 8),
(9, '2025-10-09 17:05:00', 150000.00, 'EDC', 9),
(10, '2025-10-10 09:35:00', 65000.00, 'Tunai', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT Sumber Makmur', 211234567, 'Jl. Industri No.2'),
(2, 'CV Berkah Abadi', 211234568, 'Jl. Perdagangan No.2'),
(3, 'PT Sentosa Raya', 211234569, 'Jl. Niaga No.3'),
(4, 'PT Jaya Mandiri', 211234570, 'Jl. Merdeka No.4'),
(5, 'PT Lancar Jaya', 211234571, 'Jl. Kemerdekaan No.5'),
(6, 'CV Amanah Sejahtera', 211234572, 'Jl. Veteran No.6'),
(7, 'PT Gemilang Bersama', 211234573, 'Jl. Sudirman No.7'),
(8, 'PT Sukses Mulia', 211234574, 'Jl. Gatot Subroto No.8'),
(9, 'PT Cahaya Baru', 211234575, 'Jl. Imam Bonjol No.9'),
(10, 'CV Maju Jaya', 211234576, 'Jl. Diponegoro No.10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` datetime DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01 10:00:00', 'Belanja harian', 85000.00, 1),
(2, '2025-10-02 11:30:00', 'Belanja bulanan', 125000.00, 2),
(3, '2025-10-03 09:15:00', 'Beli bahan pokok', 56000.00, 3),
(4, '2025-10-04 14:45:00', 'Belanja dapur', 74000.00, 4),
(5, '2025-10-05 16:10:00', 'Belanja kebutuhan rumah', 98000.00, 5),
(6, '2025-10-06 08:20:00', 'Pembelian ulang', 112000.00, 6),
(7, '2025-10-07 12:00:00', 'Belanja harian', 93000.00, 7),
(8, '2025-10-08 13:10:00', 'Beli perlengkapan', 71000.00, 8),
(9, '2025-10-09 17:00:00', 'Belanja bulanan', 150000.00, 9),
(10, '2025-10-10 09:30:00', 'Beli kebutuhan dapur', 65000.00, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 65000.00, 1),
(1, 2, 15000.00, 1),
(2, 3, 20000.00, 2),
(2, 4, 25000.00, 2),
(3, 5, 12000.00, 2),
(3, 6, 10000.00, 3),
(4, 7, 9000.00, 2),
(5, 8, 18000.00, 3),
(6, 9, 6000.00, 5),
(7, 10, 8000.00, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `level` enum('admin','kasir','pemilik') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin1', 'admin123', 'Administrator 1', 'Jl. Raya No.1', '0812000001', 'admin'),
(2, 'admin2', 'admin456', 'Administrator 2', 'Jl. Raya No.2', '0812000002', 'admin'),
(3, 'kasir1', 'kasir123', 'Kasir Satu', 'Jl. Melati No.1', '0812000003', 'kasir'),
(4, 'kasir2', 'kasir456', 'Kasir Dua', 'Jl. Mawar No.2', '0812000004', 'kasir'),
(5, 'kasir3', 'kasir789', 'Kasir Tiga', 'Jl. Kenanga No.3', '0812000005', 'kasir'),
(6, 'pemilik1', 'owner123', 'Pemilik Utama', 'Jl. Merdeka No.1', '0812000006', 'pemilik'),
(7, 'pemilik2', 'owner456', 'Pemilik Cabang', 'Jl. Merdeka No.2', '0812000007', 'pemilik'),
(8, 'kasir4', 'kasir147', 'Kasir Empat', 'Jl. Flamboyan No.4', '0812000008', 'kasir'),
(9, 'kasir5', 'kasir258', 'Kasir Lima', 'Jl. Dahlia No.5', '0812000009', 'kasir'),
(10, 'kasir6', 'kasir369', 'Kasir Enam', 'Jl. Anggrek No.6', '0812000010', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
