-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 06:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealer_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL,
  `tahun_produksi` int(4) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `merk`, `model`, `harga`, `tahun_produksi`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Daihatsu', 'All New Ayla', 134000000, 2021, 'Mobil Daihatsu Rocky adalah sebuah Sport Utility Vehicle (SUV) kompak yang diproduksi oleh perusahaan otomotif Jepang, Daihatsu. Diluncurkan pada tahun 2019, Rocky menawarkan desain yang kuat dan unik dengan kemampuan off-road yang tangguh.: Rocky tersedia dengan pilihan mesin bensin 1.2 liter 3-silinder yang bertenaga, yang mampu menghasilkan sekitar 87 tenaga kuda. Mesin ini dikombinasikan dengan transmisi manual 5 percepatan atau transmisi otomatis CVT untuk memberikan performa yang halus dan efisien. ', 'All_new_Alya.png', '2023-06-29 08:20:33', '2023-06-30 05:59:31'),
(4, 'Daihatsu', 'Rocky', 207000000, 2021, 'Mobil Daihatsu Rocky adalah sebuah Sport Utility Vehicle (SUV) kompak yang diproduksi oleh perusahaan otomotif Jepang, Daihatsu. Diluncurkan pada tahun 2019, Rocky menawarkan desain yang kuat dan unik dengan kemampuan off-road yang tangguh.: Rocky tersedia dengan pilihan mesin bensin 1.2 liter 3-silinder yang bertenaga, yang mampu menghasilkan sekitar 87 tenaga kuda. Mesin ini dikombinasikan dengan transmisi manual 5 percepatan atau transmisi otomatis CVT untuk memberikan performa yang halus dan efisien. ', 'Rocky.png', '2023-06-29 08:27:15', '2023-06-30 05:59:39'),
(5, 'Daihatsu', 'Sigra', 135000000, 2021, '-', 'Sigera.png', '2023-06-29 08:28:52', '2023-06-30 05:59:49'),
(6, 'Daihatsu', 'All New Sirion', 228000000, 2021, '-', 'All_new_sirion.png', '2023-06-29 08:29:29', '2023-06-30 06:00:08'),
(7, 'Daihatsu', 'Terios', 204000000, 2021, '-', 'Terios.png', '2023-06-29 08:30:13', '2023-06-30 06:00:17'),
(8, 'Daihatsu', 'Xenia', 218000000, 2021, '-', 'xenia.png', '2023-06-29 08:30:50', '2023-06-30 06:00:25'),
(9, 'Daihatsu', 'Grand Max Pu', 157000000, 2021, '-', 'Grand_Max_Pu.png', '2023-06-29 08:31:32', '2023-06-30 06:00:33'),
(10, 'Daihatsu', 'Luxio', 231000000, 2021, '-', 'luxio.png', '2023-06-29 08:32:08', '2023-06-30 06:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_transaksi`
--

CREATE TABLE `sub_transaksi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `mobil_id` int(11) NOT NULL,
  `nama_mobil` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `tipe_pembayaran` int(1) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `pelanggan_id`, `tipe_pembayaran`, `jumlah`, `tanggal_transaksi`, `update_at`) VALUES
(2, NULL, NULL, NULL, '2023-06-29', '2023-06-29 16:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'admin@gmail.com', '123456789', 'admin'),
(3, 'ucupnet@gmail.com', '123456789', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `mobil_id` (`mobil_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_transaksi`
--
ALTER TABLE `sub_transaksi`
  ADD CONSTRAINT `sub_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `sub_transaksi_ibfk_2` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
