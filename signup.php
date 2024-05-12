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

// Fungsi untuk melakukan pendaftaran
function signup($username, $password, $role) {
    global $conn;
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $role = mysqli_real_escape_string($conn, $role);

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = mysqli_query($conn, $query);

    return $result;
}

// Proses pendaftaran
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $result = signup($username, $password, $role);
    if ($result) {
        header('Location: login.php');
        exit();
    } else {
        $error = "Gagal melakukan pendaftaran.";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="dist/output.css">
    <link rel="icon" href="img/logo1.png">
</head>
<body>
<section style="background : url('./img/Background_belakang.jpg') no-repeat fixed center; background-size: cover;" class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-18 h-8 mr-2" src="img/logo3.png" alt="logo">
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white ">
                  Create Your Account
              </h1>
              <form class="space-y-4 md:space-y-6" action="" method="post">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                      <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div>
                      <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                      <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                      </select>
                  </div>
                  <button type="submit" class="w-full text-black bg-[#282828] hover:bg-white-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 text-white" name="signup">Signup</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <a href="loginpage.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</body>
</html>
