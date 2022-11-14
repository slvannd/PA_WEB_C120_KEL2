<?php
    require 'config.php';
    $perintahSQL="SELECT *,(SELECT SUM(jual.jumlah) FROM pesanan jual WHERE jual.id_barang=brg.id) as terjual FROM barang brg";
    if(isset($_GET['text'])){
        $perintahSQL.=" WHERE brg.nama_barang LIKE '%".$_GET['text']."%'";
    }
    $kirim = mysqli_query($db, $perintahSQL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="gambar/nama_gambar.jpg" type="image/ico"/>
    <title>EtamFashion</title>
    <link rel="stylesheet" href="css/style41.css">
    
</head>
<body>
   <div class="nav">
    <nav>
        <ul>
        <li> <a href="index.php"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
            <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg></a></li>
        <li><div class="header-logo">EtamFashion</div></li>
        <li>
            
    <div class="main">
        <div class="container">
            <form method="GET" action="">
            <input class="search-area" type="text" name="text" placeholder="Search" autocomplete="off"> 
            <input class="search-btn" type="submit" name="submit" value="search">
            </form>
        </div>
    <div>
        </li>
        </ul>
        <input type="checkbox" onclick="ubahMode()">
    </nav>
</div> 
        <div class="contents">
            <h3 class="section-tittle">Flash Sale</h3>
            <?php 
                while($row=mysqli_fetch_array($kirim)){
                    $stok = $row['jumlah'] - $row['terjual'];
            ?>
            <div class="contents-item">
                <img src="gambar/<?=$row['gambar'];?>" width="200" height="200">
                <p>Nama Barang : <?=$row['nama_barang'];?></p>
                <p>Harga :<?=$row['harga']?></p>
                <p>Jumlah :<?=$stok;?></p>
                <button onclick="window.location.href='detail.php?id=<?=$row['id'];?>';">Order Sekarang</button>
            </div>
            <?php
                }
            ?>
            
        </div>
    </div>

    </div>
    <div class="footer">
        <div class="footer-logo">
            <p>@Copyright by etam_fashion</p>
        </div>
    </div>
    <script>
        function ubahMode(){
            const ubah = document.body;
            ubah.classList.toggle("dark");
        }
   </script>
</body>
</html>