<?php 
    session_start();

    $usn = $_POST["usn"];
    $pw = $_POST["pw"];

    if($usn == "admin" && $pw == "admin123"){
        $_SESSION['usn1'] = $usn;
        header("location: ../admin/index.php");
        exit();
    }elseif ($usn == "Dhapp" && $pw == "Dhappa123") {
        $_SESSION['usn2'] = $usn;
        header("location: ../index.php");
        exit();
    }else{
        header("location: login.php");
    }
?>