<?php

// ambil id mobil
$id = $_GET['id'];

// Menghubungkan ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dealer_mobil';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

$id = mysqli_real_escape_string($conn, $id);

$sql = "DELETE FROM mobil where id = '$id'";
mysqli_query($conn, $sql);

header('location:crud.php');
mysqli_close($conn);
