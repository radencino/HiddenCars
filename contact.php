<?php
session_start();
include('config.php');
error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Simpan pesan ke database atau file teks, sesuaikan dengan kebutuhan Anda
    // Contoh menggunakan file teks untuk penyimpanan
    $file = 'pesan.txt';
    $content = "Nama: $name\nEmail: $email\nSubjek: $subject\nPesan: $message\n\n";

    // Tambahkan pesan ke file teks
    file_put_contents($file, $content, FILE_APPEND);

    // Kirim email ke alamat tujuan, sesuaikan dengan kebutuhan Anda
    // Contoh menggunakan fungsi mail() PHP
    $to = 'tujuan@example.com';
    $subjectEmail = "Pesan Kontak dari $name";
    $messageEmail = "Nama: $name\nEmail: $email\nSubjek: $subject\nPesan: $message";

    mail($to, $subjectEmail, $messageEmail);

    // Redirect ke halaman "terima kasih" atau halaman lain yang sesuai
    header("Location: thank_you.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Kontak Kami</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link rel="icon" href="img/logo1.png">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">

  <!-- Tailwind CSS File -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="dist/output.css">

</head>

<body id="body">
  <?php include('header.php');?>
  <main style="background : url('./img/background.jpg')" id="main">
    
    <section  id="contact" class="pt-32 container mx-auto ">

      <div class="flex flex-col min-h-screen justify-between w-6/12 mx-auto py-20 space-y-9 shadow-2xl p-5 w-50% " >
        
        <div class="text-center font-extrabold">
          <h2 class="text-white font-extrabold">Isi From Berikut</h2>
          <p class="text-white">Kami Akan Segera mengirim email kepada Anda</p>
        </div>

        <div class="text-[#787878] flex flex-col justify-between mx-auto w-full space-y-5">
          <form action="" method="post"></form>
          <input type="text"class="border  border-[#787878]-200" placeholder="Nama" required>
          <input type="gender" class="border  border-[#787878]-200" placeholder=" Pilih Jenis Kelamin " required>
          <input type="text" class="border  border-[#787878]-200" placeholder="Pilih Kota" required>
          <input type="text" class="border  border-[#787878]-200" placeholder="Pilih Mobil" required>
          <input type="text" class="border  border-[#787878]-200" placeholder="Alamat" required>
          <input type="text" class="border  border-[#787878]-200" placeholder="No Telp" required>
          <input type="text" class="border  border-[#787878]-200" placeholder="Pilih Kategori" required>
          <input type="text" class="border  border-[#787878]-200" placeholder="Email" required>
          <input type="text" class="border  border-[#787878]-200" placeholder="Pesan" required>
        </div>
        <div class="w-full text-center py-14">
          <button class="px-32 py-2 bg-[#282828] text-[#FFFFFF] rounded-lg"><a class=" w-full text-center  font-bold  mx-auto" href="thank_you.php">Kirim</a></button>
        </div>
      </div>
      </div>
    </section><!-- #Contact -->

  </main>



  <?php include('footer.php');?>

  <!-- JavaScript -->
  <!-- <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="contact/jqBootstrapValidation.js"></script>
  <script src="contact/contact_me.js"></script>
  <script src="js/main.js"></script> -->

</body>

</html>