<?php
session_start();
include_once("config.php");
    date_default_timezone_set("Asia/Makassar");

if(!isset($_SESSION['login'])){
    header("Location:loginadmin.php");
    exit;
}
    $perintahSQL="SELECT *,psn.jumlah as jumlah_pesanan FROM pesanan psn inner join barang brg on psn.id_barang=brg.id";
    $result = mysqli_query($db, $perintahSQL);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History</title>
        <link rel="stylesheet" href="css/form1.css">
</head>
    <body>
        <header>
   <div class="nav">
    <nav>
            <h2 style="width:80%;">History Pembelian</h2>
        <ul>
            <li><a href="formbarang.php">KEMBALI</a></li>
        </ul>
    </nav>
</div> 
        </header>

        <div class="list-table">
            <table>
                <tr class="thead">
                    <th>No</th>
                    <th nowrap>Tanggal Pembelian</th>
                    <th>Gambar</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>

                <?php 
                    $i = 1;
                    while($row = mysqli_fetch_array($result)){
                ?>

                <tr>
                    <td><?=$i;?></td>
                    <td nowrap><?=$row['tanggal']?></td>
                    <td><img src="gambar/<?=$row['gambar'];?>" alt="" width="100px"></td>
                    <td><?=$row['nama_pembeli']?></td>
                    <td><?=$row['nama_barang']?></td>
                    <td><?=$row['jumlah_pesanan']?></td>
                    <td><?=$row['total']?></td>
                </tr>
                
                <?php
                    $i++; 
                        }
                ?>

            </table>
        </div>
        
    </body>
</html>