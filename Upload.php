<?php
include "services/database.php";
session_start();

$message = "";

if (isset($_POST["upload"])) {
    $file = $_FILES["gambar"];
    $file_name = basename($file["name"]);
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>
<body>
    <?php include "layout/header.html"?>

    <h3>Edit Password</h3>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        
        <input type="file" name="gambar" id="gambar" accept="image/*">

        <button type="submit" name="upload">Upload Gambar</button>

    </form>

    

    <?php include "layout/footer.html"?>
</body>
</html>