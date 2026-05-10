    <?php
    include '../../config/koneksi.php';
    $id = $_GET['hapus'];
    mysqli_query($con, "DELETE FROM buku WHERE `buku`.`id`=$id");
    header('location: index.php');
    exit();
    ?>