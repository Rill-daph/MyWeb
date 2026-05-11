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
    <link rel="stylesheet" href="../assets/css/dashboard-admin.css">
    <title>DASHBOARD ADMIN</title>
</head>

<body>
    <div class="head1">
        <?= "Selamat datang, " . $_SESSION["usn1"]; ?>
    </div>
    <div class="ul">
        <nav>
            <div class="url">
                <a href="project/index.php">Lihat-barang</a>
                <a href="../index.php">Test-user</a>
                <a href="../auth/login.php">logout</a>
            </div>
        </nav>
    </div>
    <div class="content">
        <div class="main">
            <div class="pint1">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum
                dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum
                dolor sit ametlorem ipsum dolor sit amet</div>
        </div>
        <div class="main2">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum
            dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum
            dolor sit ametlorem ipsum dolor sit amet
        </div>
    </div>
    <div class="copyright">
        <div class="coppy">
            <?php include "../partials/footer.php"; ?>
        </div>
    </div>
</body>

</html>