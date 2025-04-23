<?php
include "services/database.php";
session_start();

$message = "";

if (isset($_POST["upload"])) {
    $file = $_FILES["gambar"];
    $filename = basename($file["name"]);
    $target = "upload/" . $filename;
    $targetExtention = pathinfo($target, PATHINFO_EXTENSION);
    $targetFix = strtolower($targetExtention);

    $allowed = ["jpg","png","jpeg","gif"]; 

    if (in_array($targetFix, $allowed)) {
        if (move_uploaded_file($file["tmp_name"], $target)) {
            $message = "File uploaded successfully!";
        } else {
            $message = "Failed to upload file!";
        }
    } else {
        $message = "Hanya format gambar yang di izinkan!!!";
    }
        
    
   
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

    <h3>File Upload</h3>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        
        <input type="file" name="gambar" id="gambar">

        <button type="submit" name="upload">Upload Gambar</button>
        <p> <?php echo $message ?>.</p>

    </form>

    

    <?php include "layout/footer.html"?>
</body>
</html>