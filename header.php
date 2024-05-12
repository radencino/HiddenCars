<?php
session_start();
include('config.php');
error_reporting(0);
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title> 
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="dist/output.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
</body>
<header class="">
  <nav style="z-index: 1000;" class="bg-white flex justify-between items-center w-[100%] mx-auto px-10 h-20 w-10/12 fixed">
    <div>
      <img class="w-40" src="img/logo_hiddencars.png" alt="Logo Daihatsu">
    </div>
    <div class="utama items-center justify-between space-x-6  max-md:hidden">
        <a class="text-base menu-active hover:text-[#808080]" href="index.php">Beranda</a>
        <a class="text-base menu-active hover:text-[#808080]" href="vehicle.php">Vehicle</a>
        <a class="text-base hover:text-[#808080]" href="about.php">Tentang Kami</a>
        <a class="text-base hover:text-[#808080]" href="contact.php">Kontak Kami</a>
    </div>
    <div class="nav-links md:static-absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5 gap-8 fixed">
      <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
        <li class="border-3">
          <a class="text-base menu-active hover:text-[#808080]" href="index.php">Beranda</a>
        </li>
        <li class="border-3">
          <a class="text-base menu-active hover:text-[#808080]" href="vehicle.php">Vehicle</a>
        </li>
        <li class="border-3">
          <a class="text-base hover:text-[#808080]" href="about.php">Tentang Kami</a>
        </li>
        <li class="border-3">
          <a class="text-base hover:text-[#808080]" href="contact.php">Kontak Kami</a>
        </li>
      </ul>
    </div>
    <div class="flex items-center gap-6">
      <button class="text-white px-5 py-2 rounded-full">
        <?php if (!$_SESSION['username']) { ?>
          <a class="px-5 py-1 rounded-lg font-bold bg-[#282828] text-[#FFFFFF] hover:bg-white-500" href="loginpage.php">Login</a>
          <a class = "px-5 py-1 rounded-lg font-bold  text-[#282828]" href="signup.php">Register</a>
        <?php } else { ?>
          <a class="px-5 py-1 rounded-lg font-bold bg-[#282828] text-[#FFFFFF] hover:bg-white-500" href="logout.php">Logout</a>
        <?php } ?>
      </button>
      <ion-icon onclick="onToggleMenu(this)" name="grid" class="text-3xl cursor-pointer md:hidden"></ion-icon>
    </div>
  </nav>
</header>


  <script>
  </script>
