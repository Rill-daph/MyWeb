<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/tambah-data.css">
    <title>TAMBAH-DATA</title>
</head>

<body>

    <header>
        <p>Dashboard Admin</p>
        <h1>Tambah Barang</h1>
        <p>Masukkan data barang baru ke database.</p>
    </header>


    <form action="tambah.php" method="post">
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
                        <input type="number" name="harga" placeholder="Masukkan harga">
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="form-actions">
                    <a class="btn btn-secondary" href="menu.php">Kembali</a>
                    <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    include "../../config/koneksi.php";

    if(isset($_POST['tambah'])){
        $judul = $_POST['judul'] ?? '';
        $desk = $_POST['desk'] ?? '';
        $harga = $_POST['harga'] ?? '';

        if ($judul === '' || $desk === '' || $harga === '') {
            echo "<script>alert('Semua field wajib diisi.');</script>";
        } else {
            $query = "INSERT INTO buku (judul, deskripsi, harga) VALUES ('$judul', '$desk', '$harga')";
            $result = mysqli_query($con, $query);

            if ($result) {
                header('location: menu.php?succsess=Data berhasil ditambahkan');
            } else {
                header('location: menu.php?error=Gagal menambahkan data');
            }
        }
    }
    ?>

</body>

</html>