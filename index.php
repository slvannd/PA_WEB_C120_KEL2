<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETAM FASHION</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="https://fonts.googleapis.com/css?family-great+vibes" href="stylesheet" type="text/cs">
    <link rel="https://fonts.googleapis.com/css?family-great-raleway" href="stylesheet">
</head>
<body>
   <div class="nav">
    <nav>
        <ul>
        <li> <a href="index.php"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
            <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></li>
            <li><a href="hotitem.php">HOT ITEMS</a></li>
            <?php
                if(isset($_SESSION['login'])){
                    echo "<li><a href='logout.php'>LOGOUT</a></li>";
                }else{
                    echo "
                        <li><a href='loginadmin.php'>LOGIN ADMIN</a></li> 
                        <li><a href='loginmember.php'>LOGIN MEMBER</a></li>
                        <li><a href='registmember.php'>REGISTRASI MEMBER</a></li>
                    ";
                }
            ?>
            
        </ul>
        <input type="checkbox" onclick="ubahMode()">
    </nav>
</div> 

    <div class="header">
        <h2>HAPPY SHOPING</h2>
    </div>

    <div class="contents">
        <h3 class="contents-title"></h3>
    <div class="contents-item">
        <img src="gambar/etam_fashion.png" width="400px" height="500px">
    </div>
</div>

   <script>
        function ubahMode(){
            const ubah = document.body;
            ubah.classList.toggle("dark");
        }
   </script>
   <script src="scr.js"></script>

</body>
</html>