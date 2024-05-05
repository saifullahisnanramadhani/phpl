<!-- KODE PROGRAM UNTUK NOMOR 6 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pendaftaran</title>
</head>
<body>
    <?php
    // Memeriksa apakah ada data yang dikirim melalui POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Memeriksa apakah cookie nim sudah ada
        if (isset($_COOKIE["nim"])) {
            // Mengambil data dari cookie
            $nama = $_COOKIE["nama"];
            $nim = $_COOKIE["nim"];
            $email = $_COOKIE["email"];
            $tempat = $_COOKIE["tempat"];
            $tanggal = $_COOKIE["tanggal"];
            $alamat = $_COOKIE["alamat"];
            $jenis_kelamin = $_COOKIE["jenis_kelamin"];

            // Menampilkan data
            echo "Selamat datang <b>$nama</b><br>";
            echo "NIM: $nim<br>";
            echo "Email: $email<br>";
            echo "Tempat, Tanggal Lahir: $tempat, $tanggal<br>";
            echo "Alamat: $alamat<br>";
            echo "Jenis Kelamin: $jenis_kelamin<br>";
        } else {
            echo "Data pendaftaran belum tersedia.";
        }
    } else {
        echo "Metode pengiriman data harus POST.";
    }
    ?>
</body>
</html>