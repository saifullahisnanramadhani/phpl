<?php
session_start(); // Memulai session

// Mengecek apakah pengguna sudah login
if(isset($_SESSION['login_user'])){
    header("location: welcome.php"); // Redirect ke halaman selamat datang jika pengguna sudah login
}

// Inisialisasi variabel
$username = $password = "";
$usernameErr = $passwordErr = "";
$errorMessage = "";

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa username
    if (empty($_POST["u"])) {
        $usernameErr = "Masukkan username";
    } else {
        $username = bersihkan_input($_POST["u"]);
    }
    // Memeriksa password
    if (empty($_POST["p"])) {
        $passwordErr = "Masukkan password";
    } else {
        $password = bersihkan_input($_POST["p"]);
    }

    try {
        // Proses autentikasi
        if($username == "richonovians" && $password == "root"){ // Ganti dengan autentikasi yang sesuai
            $_SESSION['login_user'] = $username; // Menyimpan username pengguna ke session
            header("location: welcome.php"); // Redirect ke halaman selamat datang setelah login sukses
        } else {
            throw new Exception("Username atau password salah"); // Melemparkan exception jika autentikasi gagal
        }
    } catch(Exception $e) {
        $errorMessage = $e->getMessage(); // Menyimpan pesan error pada variabel errorMessage
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <style>
        .error {
            color: red; /* Warna merah */
            font-size: smaller; /* Ukuran font lebih kecil */
        }
    </style>
</head>
<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="u">
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
        Password: <input type="password" name="p">
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <input type="submit" value="Login">
        <p class="error"><?php echo $errorMessage; ?></p> <!-- Menampilkan pesan error -->
    </form>
    
</body>
</html>