<?php session_start();
if (!isset($_SESSION["usn1"])) {
    header("location: ../auth/login.php? belum_login=anda belum login");
    exit();
}
include "../../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/tampil-data.css">
    <title>Data Barang</title>
</head>

<body>
    <header>
        <p>Dashboard Utama Admin</p><br>
        <h1>Toko Buku Di Maria</h1><br>
        <p>
            <?= "Selamat datang, " . $_SESSION["usn1"]; ?>
            Siladkan pilih salah satu opsi di bawah ini untuk melanjutkan
        </p>
    </header>
    <nav>
        <a class="btn btn-secondary" href="../../auth/logout.php">Kembali & log out</a>
        <a class="btn btn-primary" href="menu.php">Ke Data Barang</a>
    </nav>

</body>

</html>