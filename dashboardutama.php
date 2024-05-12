<!-- crud mobil -->
<?php
// Menghubungkan ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dealer_mobil';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

function tambah_data_Mobil($merk, $model, $harga, $gambar, $tahun_produksi, $deskripsi) {
    global $conn;
    $merk = mysqli_real_escape_string($conn, $merk);
    $model = mysqli_real_escape_string($conn, $model);
    $harga = mysqli_real_escape_string($conn, $harga);
    $gambar = mysqli_real_escape_string($conn, $gambar);
    $tahun_produksi = mysqli_real_escape_string($conn, $tahun_produksi);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);

    $query = "INSERT INTO mobil (merk, model, harga, gambar, tahun_produksi, deskripsi) VALUES ('$merk', '$model', '$harga', '$gambar', '$tahun_produksi', '$deskripsi')";
    // echo $query;die();
    mysqli_query($conn, $query);
}
// Fungsi untuk mendapatkan data dari tabel mobil
function getMobilData() {
    global $conn;
    $query = "SELECT * FROM mobil";
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

// Proses tambah data transaksi
if (isset($_POST['tambah_data_mobil'])) {
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar'];
    $tahun_produksi = $_POST['tahun_produksi'];
    $deskripsi = $_POST['deskripsi'];

    if(!isset($gambar)){
        die('No File Uploaded.');
    }
    // print_r($_FILES); die();
    move_uploaded_file($gambar['tmp_name'], './img/vehicleimages/' .$gambar['name']);

    tambah_data_Mobil($merk, $model, $harga, $gambar['name'], $tahun_produksi, $deskripsi);
    header('Location: crud.php');
    exit();
}

// Mengambil data dari tabel mobil, pelanggan
$data_mobil = getMobilData();
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="img/logo1.png">
    <link rel="stylesheet" href="dist/output.css">
</head>
<body>
    
</body>
</html>

<body class="font-poppins antialiased">
    <?php include("navadmin.php"); ?>
    <?php 
      if(isset($_GET['p'])){
        if($_GET['p']=="home"){
          include "Home.php";
        }else if($_GET['p']=="produk"){
          include "product.php";
        } else if($_GET['p']=="crud"){
          include "crud.php";
        }
      } else {
        include "Home.php";
      }
    ?>
    </div>
  </body>