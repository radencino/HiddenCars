<?php

// Update Data Mahasiswa
$id = $_GET['id'] ?? $_POST['id'];

// Menghubungkan ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dealer_mobil';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}