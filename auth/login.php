<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Log in page</title>
</head>

<body>
    <div class="background"></div>
    <form action="" method="post">
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

<?php
if(isset($_POST['a'])){
    $usn = $_POST["usn"];
    $pw = $_POST["pw"];

    if ($usn == "admin" && $pw == "admin123") {
        $_SESSION['usn1'] = $usn;
        header("location: ../admin/project/index.php");
        exit();
    } else {
        header("location: login.php");
    }
}
?>

</body>

</html>