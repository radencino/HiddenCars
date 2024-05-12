<?php
session_start();
include('config.php');
error_reporting(0);
function getMobilData() {
  global $conn;
  $query = "SELECT * from mobil limit 4";
  $result = mysqli_query($conn, $query);

  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
  }

  return $data;
}

$data_mobil = getMobilData();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Beranda</title> 
    <script src="https://cdn.tailwindcss.com"></script>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
  <link rel="icon" href="img/logo1.png">
  <!-- Tailwind CSS File -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="dist/output.css">
  <style>
    body {
      font-family: Archivo;
    }

    .btn {
      color: white;
    }
    .btn:hover { background-color: #FFFFFF; /* Change background color on hover */
        color: black; }
  </style>
</head>

<body>
  <?php include('header.php');?>

  <section id="about" class="gif mx-auto pt-56 pb-36"
    style="background: url('./img/7zC7.gif') no-repeat fixed center; background-size: cover;">
    <div class="flex items-center justify-center w-10/12 mx-auto mt-10">
      <div data-aos="fade-up" data-aos-duration="900" class="flex w-8/12 container flex-col mx-auto px-10 gap-9" style="display: flex;
        justify-content: center;
        align-items: center;
        height: 40vh;">
        <img src="img/hidden_cars.png" class="flex items-center justify-center" style="max-width: 100%;" alt="logo_hiddencars">
        <h2 class="text-5xl font-extrabold text-white"></h2>
        <p class="text-[15px] text-center font-semibold text-white">Selamat datang di Hidden Cars, tempat di mana Anda dapat menemukan mobil impian dengan kualitas terbaik dan pelayanan yang tak tertandingi. Kami mengedepankan kenyamanan dan performa untuk memenuhi kebutuhan pelanggan yang mengutamakan pengalaman berkendara yang istimewa.</p>
        <a style="padding: 6px;
        width: 50%;
        text-align: center;
        font-weight: bold;
        text-decoration: none;  display: inline-block;
        padding: 10px 20px;
        border: 2px solid #ffffff;
        text-decoration: none;
        transition: background-color 0.3s;" href="vehicle.php" class="btn" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="500"
     data-aos-offset="0">Lihat
          Selengkapnya</a>
      </div>
      <div>
      </div>
    </div>
  </section>
  <section class="container mx-auto  px-10 mt-20">
  <div class="text-center gap-4 flex flex-col">
      <h5 class="font-bold text-[24px] text-[#787878]">Vehicle</h5>
      <h3 class="font-extrabold text-[48px] text-black text-2xl">Discover the Unseen Excellence</h3>
      <p clas="">Personalisasikan sesuai dengan kebutuhan 
dan style kamu.</p>
    </div>
    <div class="w-10/12 mx-auto mt-10">
      <div class="flex justify-between">
      <?php foreach ($data_mobil as $row): ?>
        <div class="flex w-56 flex-col justify-center items-center px-7 py-12 shadow-lg gap-5">
          <img width="200" src="./img/<?= $row['gambar']; ?>" alt="">
          <p class="text-[#787878] text-center"><?php echo $row['model']; ?></p>
        </div>
      <?php endforeach; ?>
      </div>
  </section>

  <section class="container w-10/12 mx-auto mt-24 ">
    <div class="flex w-full items-center justify-center">
      <div class="flex w-8/12 container flex-col mx-auto px-20 gap-9">
        <h2 class="text-6xl font-extrabold text-black text-[54px]">Why Choose Hidden Cars?</h2>
        <p class="font-semibold text-black text-[12px]">Dengan Hidden Cars anda dapat merasa tenang karena mengetahui bahwa mobil anda berada di tangan yang tepat. Teknisi servis kendaraan kami yang telah disetujui dilatih secara teratur dalam teknik-teknik terbaru.</p>
        <img width="300" src="./img/kenapa.svg" alt="">
      </div>
      <div><img width="800" src="./img/All_new_Alya.png" alt=""></div>
    </div>
  </section>

  <section id="about" class="py-20 mx-auto mt-20" style="background : url('./img/background_beakang.jpg') no-repeat fixed center; background-size: cover;
 ">
    <div class="flex w-10/12 mx-auto">
      <div class="flex flex-col container mx-auto px-10 justify-between ">
        <h2 class="text-6xl font-bold text-white">Layanan</h2>
        <p class="text-white text-[16px]">Memilih Hidden Cars adalah pilihan tepat yang berarti anda memilih layanan servis resmi yang di setujui oleh Hidden Cars, teknisi yang terampil dalam mengerjakan, serta menggunakan suku cadang yang dirancang khusus untuk mobil anda.</p>
          <a style="padding: 6px;
        width: 50%;
        text-align: center;
        font-weight: bold;
        text-decoration: none;  display: inline-block;
        padding: 10px 20px;
        border: 2px solid #ffffff;
        text-decoration: none;
        transition: background-color 0.3s;" href="contact.php" class="btn">Lihat
          Selengkapnya</a>
      </div>
      <div>
        <img width="740" src="./img/luxio.png" alt="">
      </div>
    </div>



  </section>
  <?php include('footer.php');?>
</body>

<script>
  AOS.init();
</script>

</html>