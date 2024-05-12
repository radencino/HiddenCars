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

// Fungsi untuk mendapatkan data dari tabel pelanggan
function getPelangganData() {
    global $conn;
    $query = "SELECT * FROM pelanggan";
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

// Fungsi untuk mendapatkan data dari tabel transaksi
function getTransaksiData() {
    global $conn;
    $query = "SELECT * FROM transaksi";
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

// Fungsi untuk menambahkan data ke tabel transaksi
function tambahTransaksiData($id_pelanggan, $id_mobil, $tanggal, $harga, $gambar) {
    global $conn;
    $id_pelanggan = mysqli_real_escape_string($conn, $id_pelanggan);
    $id_mobil = mysqli_real_escape_string($conn, $id_mobil);
    $tanggal = mysqli_real_escape_string($conn, $tanggal);
    $harga = mysqli_real_escape_string($conn, $harga);
    $gambar = mysqli_real_escape_string($conn, $gambar);

    $query = "INSERT INTO transaksi (id_pelanggan, id_mobil, tanggal, harga, gambar) VALUES ('$id_pelanggan', '$id_mobil', '$tanggal', '$harga', '$gambar')";
    echo $query; die();
    mysqli_query($conn, $query);
}

// Fungsi untuk mengubah data di tabel transaksi
function ubahTransaksiData($id, $id_pelanggan, $id_mobil, $tanggal, $harga) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);
    $id_pelanggan = mysqli_real_escape_string($conn, $id_pelanggan);
    $id_mobil = mysqli_real_escape_string($conn, $id_mobil);
    $tanggal = mysqli_real_escape_string($conn, $tanggal);
    $harga = mysqli_real_escape_string($conn, $harga);

    $query = "UPDATE transaksi SET id_pelanggan='$id_pelanggan', id_mobil='$id_mobil', tanggal='$tanggal', harga='$harga' WHERE id='$id'";
    mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data dari tabel transaksi
function hapusTransaksiData($id) {
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);

    $query = "DELETE FROM transaksi WHERE id='$id'";
    mysqli_query($conn, $query);
}

// Proses tambah data transaksi
if (isset($_POST['tambah_transaksi'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_mobil = $_POST['id_mobil'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    $gambar = $_FILES['gambar'];

    if(!isset($gambar)){
        die('No File Uploaded.');
    }
    move_uploaded_file($gambar['tmp_name'], './img/vehicleimages/' .$gambar['name']);

    tambahTransaksiData($id_pelanggan, $id_mobil, $tanggal, $harga, $gambar['name']);
    header('Location: dashboard.php');
    exit();
}

// Proses ubah data transaksi
if (isset($_POST['ubah_transaksi'])) {
    $id = $_POST['id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_mobil = $_POST['id_mobil'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    ubahTransaksiData($id, $id_pelanggan, $id_mobil, $tanggal, $harga);
    header('Location: dashboard.php');
    exit();
}

// Proses hapus data transaksi
if (isset($_GET['hapus_transaksi'])) {
    $id = $_GET['hapus_transaksi'];
    hapusTransaksiData($id);
    header('Location: dashboard.php');
    exit();
}

// Mengambil data dari tabel mobil, pelanggan, dan transaksi
$data_mobil = getMobilData();
$data_pelanggan = getPelangganData();
$data_transaksi = getTransaksiData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Data Mobil</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Merek</th>
            <th>Model</th>
        </tr>
        <?php foreach ($data_mobil as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['merk']; ?></td>
            <td><?php echo $row['model']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h1>Data Pelanggan</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
        <?php foreach ($data_pelanggan as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h1>Data Transaksi</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Pelanggan</th>
            <th>ID Mobil</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data_transaksi as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['id_pelanggan']; ?></td>
            <td><?php echo $row['id_mobil']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td>
                <a href="dashboard.php?hapus_transaksi=<?php echo $row['id']; ?>">Hapus</a>
                <a href="edit_transaksi.php?id=<?php echo $row['id']; ?>">Ubah</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Data Transaksi</h2>
    <form action="dashboard.php" method="POST" enctype="multipart/form-data">
        <label for="id_pelanggan">ID Pelanggan:</label>
        <input type="text" id="id_pelanggan" name="id_pelanggan" required><br>

        <label for="id_mobil">ID Mobil:</label>
        <input type="text" id="id_mobil" name="id_mobil" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br>

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" required><br>

        <label for="Foto">Gambar:</label>
        <input type="file" id="Gambar" name="gambar" required><br>

        <input type="submit" name="tambah_transaksi" value="Tambah">
    </form>
</body>
</html>

<?php
// Menutup koneksi ke database
mysqli_close($conn);
?>
