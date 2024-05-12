<?php
session_start();
include('config.php');
error_reporting(0);
$id = $_GET['id'];

function getMobilData($id) {
    global $conn;
    $query = "SELECT * from mobil WHERE id=$id";
    $result = mysqli_query($conn, $query);
  
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
  
    return $data;
  }
  
  $data_mobil = getMobilData($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dealer Mobil | Beranda</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="Author" name="WebThemez">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
        rel="stylesheet">
    <link rel="icon" href="img/logo1.png">
    <!-- Tailwind CSS File -->

    <link rel="stylesheet" href="dist/output.css">
</head>

<body>
    <?php include('header.php');?>
    <section class="px-10  mx-auto ">
        <div class="flex pt-32 justify-between gap-8 items-start px-20 ">
         <?php foreach ($data_mobil as $row): ?>
            <div class="flex  flex-col justify-center gap-4 shadow-lg p-5 w-[30%] ">
                <img class="mb-20" src="./img/<?= $row['logo']; ?>" alt="">
                <div class="flex flex-col gap-5 border-2 border-[#BABABA] p-7 rounded-lg text-xs">

                    <h2 class="font-extrabold">Ringanan Cicilan</h2>
                    <div class="flex justify-between">
                        <p class="text-[#787878]">3 bulan</p>
                        <p class="text-[#282828] font-bold">45jt/Bulan</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#787878]">6 bulan</p>
                        <p class="text-[#282828] font-bold">23jt/Bulan</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#787878]">2 Tahun</p>
                        <p class="text-[#282828] font-bold">6jt/Bulan</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-[#787878]">5 Tahun</p>
                        <p class="text-[#282828] font-bold">2,5jt/Bulan</p>
                    </div>
                </div>
                <div class="flex flex-col gap-5 border-2 border-[#BABABA] rounded-lg text-xs p-7">
                    <h2 class="font-extrabold"> Contact Dealer </h2>
                    <div class="flex gap-5">
                        <img src="./img/telp.png" alt="">
                        <p class="text-[#787878] font-bold">0827391272310</p>
                    </div>
                    <div class="flex gap-5">
                        <img src="./img/ig_1.png" alt="">
                        <p class="text-[#787878] font-bold">daihatsuindo</p>
                    </div>
                    <div class="flex gap-5">
                        <img src="./img/twiter.png" alt="">
                        <p class="text-[#787878] font-bold">daihatsuindo_</p>
                    </div>
                </div>
                <img src="./img/iklan_2.png" alt="">
            </div>

            <div class="w-[70%] mb-28 shadow-lg p-10">
                <div class="flex justify-center pt-10 pb-10">
                     <img class="w-2/3 " src="./img/<?= $row['gambar']; ?>" alt="">
                 </div>
                <div class="flex justify-between py-5 border-b-2">
                    <h3 class="font-bold"><?= $row['merk'] . ' ' . $row['model'] . ' ' . $row['tahun_produksi']; ?></h3>
                    <p class="text-[#787878] font-extrabold">Rp <?= number_format($row['harga']); ?></p>
                </div>
                <a class="px-6 py-2 w-full mb-16 mt-5 inline-block text-center rounded-lg font-bold bg-[#282828] text-[#FFFFFF]" href="transaksi.php?id=<?= $id; ?>">Beli
                    Sekarang</a>
                <div class="flex flex-col gap-8 ">
                    <h3 class="font-extrabold text-black">Informasi Mobil</h3>
                    <div class="flex justify-between mb-10 text-xs">
                        <div class="flex gap-28">
                            <div class="flex flex-col gap-5">
                                <p>Make :</p>
                                <p>Year :</p>
                                <p>VIN :</p>
                                <P>Color :</P>
                                <p>Door :</p>
                            </div>
                            <div class="font-bold text-black flex flex-col gap-5 ">
                                <p>Daihatsu</p>
                                <p>21</p>
                                <p>OOWAJWAN981H</p>
                                <P>Red/Black</P>
                                <p>4 Pintu</p>
                            </div>
                        </div>
                        <div class="flex gap-28 text-xs">
                            <div class="flex flex-col gap-5">
                                <p>Engine :</p>
                                <p>Transmition :</p>
                                <p>Seat :</p>
                                <P>Interior Color :</P>
                                <p>Drive :</p>
                            </div>
                            <div class="font-bold text-black flex flex-col gap-5 text-xs">
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
                    <h3 class="font-extrabold text-black">Informasi Mobil</h3>
                    <div class="flex justify-between gap-9 mb-10 text-xs">
                        <div>
                            <p><?= $row['deskripsi']; ?></p>
                        </div>
                        <div>
                            <p><?= $row['deskripsi']; ?></p>
                        </div>
                    </div>
                    <h3 class="font-extrabold text-black">Galeri Mobil</h3>
                    <div class="flex justify-start gap-10 ">
                            <img class="w-5/12" src="./img/bahan_galery_rocky.png" alt="">
                            <img class="w-5/12" src="./img/bahan_galery_rocky2.png" alt="">
                    </div>
                </div>
            </div>
         <?php endforeach; ?>
        </div>
    </section>
    <?php include('footer.php');?>
</body>

</html>