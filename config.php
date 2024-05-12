<?php
// Database Configuration
$dbHost = 'localhost'; // Nama host database
$dbUsername = 'root'; // Username database
$dbPassword = ''; // Password database
$dbName = 'dealer_mobil'; // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Menangani error jika koneksi gagal
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Konfigurasi lainnya
define('SITE_URL', 'http://localhost/dealer-mobil'); // URL situs Anda
define('SITE_NAME', 'Daihatsu Serang'); // Nama situs Anda
?>

