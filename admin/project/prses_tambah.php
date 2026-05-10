<?php
include "../../config/koneksi.php";
$judul = $_POST["judul"];
$desk = $_POST["desk"];
$harga = $_POST["number"];
// $button = ;

if (isset($_POST["tambah"])) {
    if ($judul == "" || $desk == "" || $harga == "") {
        header("location: tambah.php? error=data tidak boleh kosong!");
        exit();
    } else {
        mysqli_query(
            $con,
            "INSERT INTO buku(judul, deskripsi, harga) VALUES ('$judul', '$desk', '$harga')",
        );
        header("location: index.php? succsess=data berhasil ditambahkan");
        exit();
    }
}
?>
