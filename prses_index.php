<?php
include "config/koneksi.php";

if (!isset($_POST["cb"])) {
    header("location: index.php?inp_err=silahkan pilih menu terlebih dahulu");
    exit();
}

$total = 0;
$adaPesanan = false;
$pesanan = [];

foreach ($_POST["cb"] as $id) {
    $data = mysqli_query($con, "SELECT * FROM buku WHERE id='$id'");
    $hasil = mysqli_fetch_array($data);

    $judul = $hasil["judul"];
    $harga = $hasil["harga"];
    $jumlah = $_POST["total"][$id];

    if ($jumlah > 0) {
        $subtotal = $harga * $jumlah;
        $total += $subtotal;
        $adaPesanan = true;

        $pesanan[] = [
            "judul" => $judul,
            "harga" => $harga,
            "jumlah" => $jumlah,
            "subtotal" => $subtotal,
        ];
    }
}

if (!$adaPesanan) {
    header("location: index.php?err_inp=pastikan checkbox dan total terisi");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/prses-index.css">
    <title>Ringkasan Pesanan</title>
</head>

<body>
    <header>
        <h1 class="ringkasan">Ringkasan Pesanan</h1><br>
        <p>Kamu harus membayar sebesar</p>
        <h3>Rp <?= number_format($total, 0, ",", " "); ?></h3>
    </header>
    <table>
        <tr>
            <th>Judul</th>
            <th>Harga</th>
            <th>Jumlah Buku</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($pesanan as $item) { ?>
            <tr>
                <td><?= $item["judul"]; ?></td>
                <td>Rp <?= number_format($item["harga"], 0, ",", " "); ?></td>
                <td><?= $item["jumlah"]; ?></td>
                <td>Rp <?= number_format($item["subtotal"], 0, ",", " "); ?></td>
            </tr>
        <?php } ?>

        <tr>
            <td colspan="3">Total</td>
            <td>Rp <?= number_format($total, 0, ",", " "); ?></td>
        </tr>
        <tr>
            <td colspan="4">
                <a class="btn" href="index.php">Kembali</a>
            </td>
        </tr>
    </table>
    </div>
    <?php include 'partials/footer.php'; ?>
</body>

</html>