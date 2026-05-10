<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "toko2";
$con = mysqli_connect("localhost","root","","toko2");

if($con == false){
    die("koneksi gagal: ". mysqli_connect_error());
}
?>