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

function tambah_data_Mobil($merk, $model, $harga, $gambar, $logo, $tahun_produksi, $deskripsi) {
    global $conn;
    $merk = mysqli_real_escape_string($conn, $merk);
    $model = mysqli_real_escape_string($conn, $model);
    $harga = mysqli_real_escape_string($conn, $harga);
    $gambar = mysqli_real_escape_string($conn, $gambar);
    $logo = mysqli_real_escape_string($conn, $logo);
    $tahun_produksi = mysqli_real_escape_string($conn, $tahun_produksi);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);

    $query = "INSERT INTO mobil (merk, model, harga, gambar, logo, tahun_produksi, deskripsi) VALUES ('$merk', '$model', '$harga', '$gambar', '$logo', '$tahun_produksi', '$deskripsi')";
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
    $logo = $_FILES['logo'];
    $tahun_produksi = $_POST['tahun_produksi'];
    $deskripsi = $_POST['deskripsi'];

    if(!isset($gambar)){
        die('No File Uploaded.');
    }
    // print_r($_FILES); die();
    move_uploaded_file($gambar['tmp_name'], '../img/vehicleimages/' .$gambar['name'], $logo['tmp_name'], '../img/' .$logo['logo_name']);

    tambah_data_Mobil($merk, $model, $harga, $gambar['name'], $logo['logo_name'], $tahun_produksi, $deskripsi);
    header('Location: index.php');
    exit();
}

// Mengambil data dari tabel mobil, pelanggan, dan transaksi
$data_mobil = getMobilData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Data Mobil</h1>
    <table border="1">
        <tr>
            <th>Merk</th>
            <th>Model</th>
            <th>harga</th>
            <th>tahun_produksi</th>
            <th>deskripsi</th>
            <th>gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data_mobil as $row): ?>
        <tr>
            <td><?php echo $row['merk']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><?php echo $row['tahun_produksi']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><img src="../img/vehicleimages/<?= $row['gambar']; ?>" width="150" alt=""></td>
            <td><img src="../img/<?= $row['logo']; ?>" width="150" alt=""></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="px-3 py-1">Edit</a>
                <a href="delete_mobil.php?id=<?= $row['id'] ?>" class="px-3 py-1"
                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</a>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Data Mobil</h2>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <label for="merk">Merk:</label>
        <input type="text" id="Merk" name="merk" required><br>

        <label for="model">Model:</label>
        <input type="text" id="Model" name="model" required><br>

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" required><br>

        <label for="Foto">Gambar:</label>
        <input type="file" id="Gambar" name="gambar" required><br>

        <label for="Logo">Logo:</label>
        <input type="file" id="Logo" name="logo" required><br>

        <label for="Tahun_Produksi">Tahun Produksi:</label>
        <input type="text" id="Tahun_Produksi" name="tahun_produksi" required><br>

        <label for="Deskripsi">Deskripsi:</label>
        <input type="text" id="Deskripsi" name="deskripsi" required><br>

        <input type="submit" name="tambah_data_mobil" value="Tambah">
    </form>
</body>
</html>

<?php
// Menutup koneksi ke database
mysqli_close($conn);
?>
