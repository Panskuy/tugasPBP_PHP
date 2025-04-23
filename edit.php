<?php
include "services/database.php";
session_start();

$message = "";

if (isset($_POST["editPassword"])) {
    $username = $_SESSION["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if ($password1 == $password2) {
        $sql = "UPDATE user SET password = '$password1' WHERE username = '$username'";
        if ($login->query($sql)) {
            header("location: dashboard.php");
        }
    } else {
        echo "<p style='color: red;'>Password tidak sama</p>";
    }
}


if (isset($_POST["cekUsername"])) {
    if (!empty($_POST["newUsername"])) {
        $newUsername = $_POST["newUsername"];
        $check = "SELECT * FROM user WHERE username = '$newUsername'";
        $result = $login->query($check);

        if ($result->num_rows > 0) {
            $message = "Username Sudah Digunakan";
        } else {
            $message = "Username Tersedia";
        }
    } else {
        $message = "Silakan isi username terlebih dahulu";
    }
}

if (isset($_POST["editUsername"])) {
    if (!empty($_POST["newUsername"])) {
        $username = $_SESSION["username"];
        $newUsername = $_POST["newUsername"];
        $check = "SELECT * FROM user WHERE username = '$newUsername'";
        $result = $login->query($check);

        if ($result->num_rows == 0) {
            $update = "UPDATE user SET username = '$newUsername' WHERE username = '$username'";
            if ($login->query($update)) {
                $_SESSION["username"] = $newUsername;
                header("Location: dashboard.php");
            }
        } else {
            $message = "Username sudah digunakan, tidak bisa diubah";
        }
    } else {
        $message = "Silakan isi username terlebih dahulu";
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

    <h3>Edit Password</h3>

    <form action="edit.php" method="POST">
        
        <p>Masukan password Baru <input type="text" name="password1" id="password1" placeholder="masukan password lama"></p>
        <p>Konfirmasi password baru <input type="text" name="password2" id="password2" placeholder="masukan password baru"></p>

        <button type="submit" name="editPassword">Edit Password</button>

    </form>
<h3>Edit Username</h3>
    <form action="edit.php" method="POST">
        
        <div style="display: flex; gap: 10px;">
            <p>Masukan Username Baru <input type="text" name="newUsername" id="newUsername" placeholder="masukan Username Baru"></p>
            <button type="submit" name="cekUsername">Cek</button>
        </div>
        <p><?php echo $message ?></p>
        

        <button type="submit" name="editUsername">Edit Username</button>

    </form>

    <?php include "layout/footer.html"?>
</body>
</html>