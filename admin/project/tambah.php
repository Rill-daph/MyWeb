<?php session_start();
if (!isset($_SESSION['usn1'])) {
    header("location: ../auth/login.php? belum_login=anda belum login");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/tambah-data.css">
    <title>TAMBAH-DATA</title>
</head>

<body>
    <?php if (isset($_GET['error'])): ?>
        <script> alert("<?php echo $_GET['error']; ?>"); </script>
    <?php endif; ?>

    <header>
        <p>Dashboard Admin</p>
        <h1>Tambah Barang</h1>
        <p>Masukkan data barang baru ke database.</p>
    </header>


    <form action="prses_tambah.php" method="post">
        <table>
            <tr>
                <td>
                    <label>Judul
                        <input type="text" name="judul" placeholder="Masukkan judul">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Deskripsi
                        <input type="text" name="desk" placeholder="Masukkan deskripsi">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Harga
                        <input type="number" name="number" placeholder="Masukkan harga">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-secondary" href="index.php">Kembali</a>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                </td>
            </tr>
        </table>
    </form>

</body>


</html>