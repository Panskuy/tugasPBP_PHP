<?php
include "services/database.php";
session_start();

$username = $_SESSION["username"];
$is_login = $_SESSION["is_login"];

if ($is_login == 0) {
    header("location: login.php");
}

// logout
if (isset($_POST ["logout"])) {
    
    
    $_SESSION["is_login" ] = false;
    session_destroy();
    session_unset();
    header("location: index.php");
}

// delete
if (isset($_POST ["delete"])) {
    $sql = "DELETE FROM user WHERE username = '$username'";

    if ($login-> query($sql)) {
    $_SESSION["is_login" ] = false;
    session_destroy();
    session_unset();
    header("location: index.php");

    }
} 

// to edit page

if (isset($_POST ["edit"])) {
 header("location: edit.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layout/header.html"?>

    <h3>Home</h3>

    

    <p>Selamat Datang <?php echo $username?>. Ini adalah website tugas PBP saya haha</p>
    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">Logout</button>
        <button type="submit" name="edit">Edit</button>
        <button type="submit" name="delete">Delete</button>
    </form>
    <?php include "layout/footer.html"?>
</body>
</html>