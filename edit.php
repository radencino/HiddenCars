<?php

// Update Data Mobil
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

$id = mysqli_real_escape_string($conn, $id);

if (isset($_POST['edit_data_mobil'])) {
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $harga = $_POST['harga'];
    $tahun_produksi = $_POST['tahun_produksi'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE mobil SET merk='$merk', model='$model', harga='$harga', 
        tahun_produksi='$tahun_produksi', deskripsi='$deskripsi' WHERE id = '$id'";

    mysqli_query($conn, $sql);
    header('location:crud.php');
    die();
}

$sql = "SELECT * FROM mobil where id = '$id'";
$query = mysqli_query($conn, $sql);

$mobil = mysqli_fetch_assoc($query);
?>

<div class="flex flex-col min-h-screen justify-between w-6/12 mx-auto py-20 space-y-9 shadow-2xl p-5 w-50% " >
    <h2 class="text-center font-extrabold">Update Database</h2>
    <form action="edit.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mobil['id'] ?>">
    <label for="merk">Merk:</label>
    <input type="text" id="Merk" class="border  border-[#787878]-200 mx-10 my-10" value="<?= $mobil['merk'] ?>" name="merk" required><br>

    <label for="model">Model:</label>
    <input type="text" id="Model" class="border  border-[#787878]-200 mx-10 my-10" value="<?= $mobil['model'] ?>" name="model" required><br>

    <label for="harga">Harga:</label>
    <input type="text" id="Harga" class="border  border-[#787878]-200 mx-10 my-10" value="<?= $mobil['harga'] ?>" name="harga" required><br>

    <label for="Foto">Gambar:</label>
    <input type="file" id="Gambar" class="border  border-[#787878]-200 mx-10 my-10" name="gambar"><br>

    <label for="Tahun_Produksi">Tahun Produksi:</label>
    <input type="text" id="Tahun_Produksi" class="border  border-[#787878]-200 mx-10 my-10" value="<?= $mobil['tahun_produksi'] ?>" name="tahun_produksi" required><br>

    <label for="Deskripsi">Deskripsi:</label>
    <input type="text" id="Deskripsi" class="border  border-[#787878]-200 mx-10 my-10" value="<?= $mobil['deskripsi'] ?>" name="deskripsi" required><br>

    <input type="submit" name="edit_data_mobil" value="Update">
</form>