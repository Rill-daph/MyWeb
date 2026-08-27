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
        <p>Dashboard Admin</p><br>
        <h1>Data Barang</h1><br>
        <p>
            <?= "Selamat datang, " . $_SESSION["usn1"]; ?>
        </p>
    </header>
    <nav>
        <a class="btn btn-secondary" href="../../auth/logout.php">Kembali & log out</a>
        <a class="btn btn-primary" href="tambah.php">Tambah Barang</a>
        <a class="btn btn-secondary" href="index.php">Kembali ke dashboard</a>
    </nav>
    <table>
        <tr>
            <th colspan="5">
                <h2>Daftar Barang</h2>
                <p>Kelola judul, deskripsi, harga, dan aksi data.</p>
            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $angka = 1;
        $Data = mysqli_query($con, "SELECT * FROM buku");
        while ($Hasil = mysqli_fetch_array($Data)) { ?>
            <tr>
                <td><?php echo $angka++; ?></td>
                <td><?php echo $Hasil["judul"]; ?></td>
                <td><?php echo $Hasil["deskripsi"]; ?></td>
                <td><?php echo $Hasil["harga"]; ?></td>
                <td class="action-cell">
                    <a class="action-link danger" href="hapus.php?hapus=<?php echo $Hasil["id"]; ?>">Hapus</a>
                    <a class="action-link" href="edit.php?edit=<?php echo $Hasil["id"]; ?>">Edit</a>
                </td>
            </tr>
        <?php }
        ?>
        <tr>
            <td colspan="5">
                <button onclick="window.print()">Print / Simpan PDF</button>
            </td>
        </tr>
    </table>
</body>

</html>