<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location:formbarang.php");
}
require 'config.php';
$error=false;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($db, " SELECT * from loginadmin WHERE username = '$username' and pass = '".md5($password)."'") or die("error db");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['login'] = $username;
        header("Location:formbarang.php");
        exit;
    }else{
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Login</title>
</head>
<body>
    <div class="container login">
        <div class="logo">
            <img src="gambar/logo1.png" alt="logo toko" width="70%">
        </div>
        <div class="form-login">
            <h3>LOGIN ADMIN</h3>
            <?php if($error){
                echo "<p style='color: red;'>Username Atau Password Salah!</p>";
            } ?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="email atau username" class="input">
                <input type="password" name="password" placeholder="password" class="input">

                <input type="submit" name="login" value="Login" class="submit"><br><br>
            </form>
        </div>
    </div>
</body>
</html>