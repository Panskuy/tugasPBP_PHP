<?php
include "services/database.php";
session_start();

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    // echo $username . " " . $password;
    $masuk = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    $hasil = $login->query($masuk);

    if($hasil->num_rows > 0){
        echo "Login sukses";


    $data = $hasil->fetch_assoc();
    echo $data["username"] . $data["username"];
    

    $_SESSION["username"] = $data["username"];
    $_SESSION["is_login"] = true;
    header("location: dashboard.php");
    } else {
        echo "Login gagal";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include "layout/header.html"?>

    <h3>Login</h3>

    <form action="login.php" method="POST">
        <p>Masukkan username <input type="text" name="username" id="username" placeholder="username"></p>
        <p>Masukkan password <input type="password" name="password" id="password" placeholder="password"></p>

        <button type="submit" name="login">Login</button>

    <?php include "layout/footer.html"?>
</body>
</html>