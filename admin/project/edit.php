<?php session_start();
if (!isset($_SESSION["usn1"])) {
    header("location: ../auth/login.php? belum_login=anda belum login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/edit-data.css">
    <title>Edit-Database</title>
</head>

<body>
    <?php
    if (isset($_GET["succsess"])): ?>
        <script>alert("<?php echo $_GET["succsess"]; ?>");</script>
    <?php endif;
    include "../../config/koneksi.php";
    $id = $_GET["edit"];
    $Data = mysqli_fetch_assoc(
        mysqli_query($con, "SELECT * FROM buku WHERE id = $id"),
    );
    ?>
    <header>
        <p>Dashboard Admin</p>
        <h1>Edit Barang</h1>
        <p>
            <?php echo "Selamat datang, " . $_SESSION["usn1"]; ?>
        </p>
    </header>

    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label>
                        Judul
                        <input type="text" name="judul" value="<?= $Data["judul"] ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        Deskripsi
                        <input type="text" name="deskripsi" value="<?= $Data["deskripsi"] ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        Harga
                        <input type="number" name="harga" value="<?= $Data["harga"] ?>">
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="btn btn-secondary" href="index.php">Kembali</a>
                </td>
                <td>
                    <button class="btn btn-primary" type="submit" name="submit">Simpan perubahan</button>
                </td>
            </tr>
        </table>
    </form>


    <?php if (isset($_POST["submit"])) {
        $judul = $_POST["judul"];
        $deskripsi = $_POST["deskripsi"];
        $harga = $_POST["harga"];

        $update = mysqli_query(
            $con,
            "UPDATE buku SET judul = '$judul', deskripsi = '$deskripsi', harga = $harga WHERE id = $id",
        );

        if ($update) {
            header("location: index.php");
        } else {
            echo "<script>alert('Data gagal diupdate');</script>";
        }
    } ?>
</body>

</html>