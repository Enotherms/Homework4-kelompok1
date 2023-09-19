-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2023 pada 02.05
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok1_h4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_acc` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `password`, `no_ktp`, `no_acc`, `fullname`, `balance`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '1234', '291002', '1', 'abiyyu', 10100000, '2023-09-15 23:57:54', NULL, NULL, NULL),
(2, '1234', '1234', '2', 'Charish', 20000000, '2023-09-14 05:51:27', NULL, NULL, NULL),
(3, '1234', '620702', '3', 'Apriyani Penisa', 100000, '2023-09-15 23:57:54', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `from_acc` varchar(20) NOT NULL,
  `to_acc` varchar(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `from_acc`, `to_acc`, `amount`, `transaction_date`) VALUES
(7, 'Apriyani Penisa', 'Abiyyu', 100000, '2023-09-15 23:57:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`),
  ADD UNIQUE KEY `no_acc` (`no_acc`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
