<?php
// Menerima data harga dan jumlah dari permintaan Ajax
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

// Hitung total harga
$total = $harga * $jumlah;

// Kembalikan total harga sebagai respons
echo "Rp ".number_format($total);
?>
