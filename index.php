<?php session_start();
if (!isset($_SESSION['usn2'])) {
    header("location: ../../myweb/auth/login.php? belum_login=anda belum login");
    exit();
}

if (isset($_GET['inp_err'])) { ?>
    <script>alert("<?= $_GET['inp_err']; ?>");</script>
<?php }

if (isset($_GET['err_inp'])) { ?>
    <script>alert("<?= $_GET['err_inp']; ?>");</script>
<?php }

include 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Book-Shop</title>
</head>

<body>
    <header>
        <h2>
            <?php echo "Selamat Datang, " . $_SESSION['usn2']; ?>
        </h2>
    </header>
    <nav>
        <a href="../../myweb/auth/logout.php">Log-out</a>
    </nav>
    <form action="prses_index.php" method="post">
        <table>
            <tr>
                <th>Id</th>
                <th>Pilihan</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
            <?php $a = 1;
            $Data = mysqli_query($con, "SELECT * FROM buku");
            while ($Hasil = mysqli_fetch_array($Data)) { ?>
                <tr>
                    <td>
                        <?= $a++; ?>
                    </td>
                    <td>
                        <input type="checkbox" name="cb[]" value="<?= $Hasil['id']; ?>">
                    </td>
                    <td>
                        <label name="Judul"><?= $Hasil['judul']; ?></label>
                    </td>
                    <td>
                        <label name="desk"><?= $Hasil['deskripsi']; ?></label>
                    </td>
                    <td>
                        <label name="harga"><?= $Hasil['harga'] ?></label>
                    </td>
                    <td>
                        <input type="number" name="total[<?= $Hasil['id']; ?>]" min="0" value="0">
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <button type="submit" name="submit">Pesan sekarang</button>
            </tr>
        </table>
    </form>
</body>

</html>