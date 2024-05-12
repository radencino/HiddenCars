<?php
session_start();
include('config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami</title>  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="img/logo1.png">
  <link rel="stylesheet" href="dist/output.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <?php include('header.php');?>

  <!-- Page Content -->

  <section id="about" class="pt-56 pb-36" style="background : url('./img/bg_aboutus.jpg') no-repeat fixed center; background-size: cover px-20 ;
">
    <div class="flex container mx-auto px-10 justify-between px-20 ">
      <h2 class="text-6xl font-bold text-white">Who <br>We Are</h2>
      <div><img width="330" src="./img/logo3.png" alt="Daihatsu Logo"></div>
    </div>
  </section>
  <section class="bg-[#282828]">
    <div class="container mx-auto px-10 py-12 flex justify-between text-white px-20  ">
      <div class="flex items-center justify-center">
        <h4 class="font-bold text-3xl ">About Us</h4>
      </div>
      <p class="w-8/12 text-lg">Hidden Cars adalah produsen otomotif Jepang yang mengkhususkan diri dalam produksi mobil kompak dan kendaraan niaga ringan. Perusahaan ini didirikan pada tahun 1907 dan telah menjadi bagian dari Grup Toyota dan Daihatsu sejak tahun 2016. <br><br><br>Hidden Cars dikenal karena mobil-mobil kecil yang hemat bahan bakar, handal, dan terjangkau. Merek ini memiliki sejarah panjang dalam mengembangkan mobil berukuran kecil yang cocok untuk kota-kota padat di Jepang dan pasar global lainnya. <br><br><br>
      Salah satu model yang terkenal dari Hidden Cars adalah Hidden Terios, sebuah SUV kompak yang dirancang untuk mobilitas perkotaan dan petualangan di luar jalan raya. Terios memiliki ukuran yang kompak namun mampu menampung hingga tujuh penumpang.</p>
    </div>
  </section>
  <section>
    <div class="container mx-auto px-10 text-center py-11 gap-11 flex flex-col px-20 ">
      <h4 class="font-bold text-3xl ">Layanan Kami</h4>
      <div class="flex justify-between">
        <div class="flex w-56 flex-col justify-center items-center px-7 py-12 shadow-lg gap-5">
          <img width="40" src="./img/telp.svg" alt="">
          <p class="text-[#787878] text-center">Pelayanan 24 Jam</p>
        </div>
        <div class="flex w-56 flex-col justify-center items-center px-7 py-12 shadow-lg gap-5">
          <img width="40" src="./img/icon_service.svg" alt="">
          <p class="text-[#787878] text-center">Service dan perawatan</p>
        </div>
        <div class="flex w-56 flex-col justify-center items-center px-7 py-12 shadow-lg gap-5">
          <img width="40" src="./img/icon_suku.svg" alt="">
          <p class="text-[#787878] text-center">Suku cadang dan
            Aksesoris</p>
        </div>
        <div class="flex w-56 flex-col justify-center items-center px-7 py-12 shadow-lg gap-5">
          <img width="40" src="./img/icon_asuransi.svg" alt="">
          <a href="vehicle.php">
          <p class="text-[#787878] text-center">Asuransi Mobil</p></a>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-[#282828]">
    <div class="container mx-auto px-10 py-12 flex justify-between text-white px-20  ">
      <p class="text-lg">Dalam beberapa tahun terakhir, Hidden Cars telah berfokus pada pengembangan mobil listrik dan teknologi ramah lingkungan lainnya. Mereka telah memperkenalkan beberapa model mobil listrik dan berusaha mengurangi jejak karbon melalui penggunaan bahan-bahan ramah lingkungan dalam produksi mobil mereka.<br><br><br>Secara keseluruhan, Hidden Cars adalah produsen mobil yang terkenal karena mobil-mobil kompaknya, efisiensi bahan bakarnya, dan teknologi yang inovatif. Merek ini terus berusaha memenuhi kebutuhan pasar dengan memperkenalkan produk-produk yang sesuai dengan tren dan permintaan konsumen.Di pasar Jepang, Hidden Cars juga memiliki kendaraan niaga ringan seperti truk kecil dan van kompak yang digunakan untuk pengiriman barang di kota-kota besar.</p>
    </div>
  </section>
  <section class="container mx-auto px-10 py-10 px-20 ">
    <h4 class="font-bold text-3xl text-center pb-10 ">Galeri</h4>
    <div>
      <img src="./img/galeri.png" alt="">
    </div>
  </section>
  <!-- Footer -->
  <?php include('footer.php');?>

  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
    crossorigin="anonymous"></script>
</body>

</html>