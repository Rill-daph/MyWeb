<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Log in page</title>
</head>

<body>

    <?php if (isset($_GET['belum_login'])) { ?>
        <script>alert("<?= $_GET['belum_login'] ?>")</script>
    <?php }
    if (isset($_GET['logout'])) { ?>
        <script>alert("<?= $_GET['logout'] ?>")</script>
    <?php } ?>

    <div class="background"></div>
    <form action="prses_login.php" method="post">
        <table class="card">
            <tr>
                <td colspan="2">
                    <H2>LOG IN</H2>
                </td>
            </tr>
            <tr>
                <div class="inp">
                    <td><label>Username</label></td>
                    <td><input type="text" name="usn"></td>
                </div>
            </tr>
            <tr>
                <div class="inp">
                    <td><label>Password</label></td>
                    <td><input type="password" name="pw"></td>
                </div>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="a">log in </button></td>
            </tr>
        </table>
    </form>

</body>

</html>