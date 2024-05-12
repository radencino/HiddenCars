<?php
session_start();
include('config.php');
error_reporting(0);

$id = $_GET['id'];

$host = 'localhost';
$db   = 'dealer_mobil';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    die();
}

// Ambil daftar mobil
$query = $conn->query("SELECT * FROM mobil WHERE id=$id");
$mobil = $query->fetchAll(PDO::FETCH_ASSOC);

// Proses form transaksi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mobil_id = $_POST['mobil_id'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $jumlah_beli = $_POST['jumlah_beli'];

    // Ambil data mobil berdasarkan ID
    $query = $conn->prepare("SELECT * FROM mobil WHERE id = :mobil_id");
    $query->bindParam(':mobil_id', $mobil_id);
    $query->execute();
    $data_mobil = $query->fetch(PDO::FETCH_ASSOC);

    // Hitung total harga
    $total_harga = $data_mobil['harga'] * $jumlah_beli;

    // Simpan transaksi ke database
    $query = $conn->prepare("INSERT INTO transaksi (pelanggan_id, tipe_pembayaran, jumlah, tanggal_transaksi) VALUES (:pelanggan_id, :tipe_pembayaran, :jumlah, :tanggal_transaksi)");
    $query->bindParam(':pelanggan_id', $pelanggan_id);
    $query->bindParam(':tipe_pembayaran', $tipe_pembayaran);
    $query->bindParam(':jumlah', $jumlah);
    $query->bindParam(':tanggal_transaksi', $tanggal_transaksi);
    $query->execute();

    $query = $conn->prepare("INSERT INTO sub_transaksi (transaksi_id, mobil_id, nama_mobil, harga, jumlah) VALUES (:transaksi_id, :mobil_id, :nama_mobil, :harga, :jumlah)");
    $query->bindParam(':transaksi_id', $transaksi_id);
    $query->bindParam(':mobil_id', $mobil_id);
    $query->bindParam(':nama_mobil', $nama_mobil);
    $query->bindParam(':harga', $harga);
    $query->bindParam(':jumlah', $jumlah);
    $query->execute();
    // Redirect ke halaman utama setelah transaksi berhasil disimpan
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="Author" name="WebThemez">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
        rel="stylesheet">

    <!-- Tailwind CSS File -->
    <link rel="icon" href="img/logo1.png">
    <link rel="stylesheet" href="dist/output.css">
</head>

<body>
    <?php include('header.php');?>

    <section class="container w-10/12 mx-auto py-20 px-20 ">
    
        <div class="mb-7">
            <h2 class="font-extrabold text-4xl mb-10 mt-10">Transaksi</h2>
        </div>
    <div class="shadow-lg flex rounded-md mx-auto justify-center gap-9 p-10">
        <div class="flex flex-col gap-8 border-r-2 text-xs">
            <div class="flex justify-center pt-10 pb-10 ">
             <?php foreach ($mobil as $m) : ?>
                <img class="w-2/3 " src="./img/<?= $m['gambar']; ?>" alt="">
             <?php endforeach; ?>
            </div>
            <h3 class="font-extrabold text-black">Informasi Mobil</h3>
            <div class="flex justify-between mb-10">
                <div class="flex gap-14">
                    <div class="flex flex-col gap-5">
                        <p>Make :</p>
                        <p>Year :</p>
                        <p>VIN :</p>
                        <P>Color :</P>
                        <p>Door :</p>
                    </div>
                    <div class="font-bold text-black flex flex-col gap-5">
                        <p>Daihatsu</p>
                        <p>21</p>
                        <p>OOWAJWAN981H</p>
                        <P>Red/Black</P>
                        <p>4 Pintu</p>
                    </div>
                </div>
                <div class="flex gap-14">
                    <div class="flex flex-col gap-5">
                        <p>Engine :</p>
                        <p>Transmition :</p>
                        <p>Seat :</p>
                        <P>Interior Color :</P>
                        <p>Drive :</p>
                    </div>
                    <div class="font-bold text-black flex flex-col gap-5 ">
                        <p>996 cc </p>
                        <p>Automatic</p>
                        <p>4 Seat</p>
                        <P>Hitam</P>
                        <p>Kanan</p>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <h3 class="font-extrabold text-3xl "><?= $m['merk'] . ' ' . $m['model']; ?>
                <br><?= $m['tahun_produksi']; ?></h3>
                <form method="post" action="" id="trans">
                <div class="flex gap-14 mt-5">
                    <div class="flex flex-col gap-5  ">
                        <label for="jumlah">Jumlah Beli:</label>
                         <input type="number" id="jumlah" name="jumlah" min="1" onchange="hitungTotal()" required><br>
                         <?php foreach ($mobil as $m) : ?>
                            <p>Harga :Rp. <?= number_format($m['harga']); ?></p>
                            <input type="hidden" name="" id="harga" value="<?= $m['harga']; ?>">
                         <?php endforeach; ?>

                        <label for="nama_pembeli">Nama Pembeli:</label>
                        <input type="text" id="nama_pembeli" name="nama_pembeli" required><br>
                        <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                        <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" required><br>
                        <label for="tipe_pembayaran">Tipe Pembayaran</label>
                        <select name="tipe_pembayaran" id="">
                            <option value="1">Cash</option>
                            <option value="2">Credit</option>
                        </select>
                        <label for="total">Total:</label>
                        <span id="total"></span>
                        
                    </div>
                    <div class="font-bold text-black flex flex-col gap-5 w-6/12 ">
                        <!-- <input placeholder="-Input Nama-"> 
                        <p>134.000.000</p>
                        <input placeholder="-Nama-">
                        <input placeholder="-Input Data Tangal-">
                        <p class="font-extrabold text-xl text-[#E71D4F]"> Rp.134.000.000</p> -->
                    </div>
                </div>
                <div>
                    <a class="px-6 py-2 w-full mb-16 mt-5 inline-block text-center rounded-lg font-bold bg-[#E71D4F] text-[#FFFFFF]" href="thank_you.php">Beli
                        Sekarang</a>
                </div>
                </form>
        </div>
    </div>
    </section>
    <?php include('footer.php');?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // Fungsi untuk menghitung total
  function hitungTotal() {
    var harga = parseInt($("#harga").val());
    var jumlah = parseInt($("#jumlah").val());

    // Periksa jika input kosong atau bukan angka
    if (isNaN(harga) || isNaN(jumlah)) {
      $("#total").text("");
    } else {
      var data = {
        harga: harga,
        jumlah: jumlah
      };

      $.ajax({
        url: "input_harga.php", // Ganti dengan URL yang sesuai
        method: "POST",
        data: data,
        success: function(response) {
          $("#total").text(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }
  }
</script>

</body>

</html>