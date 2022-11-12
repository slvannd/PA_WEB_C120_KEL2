<?php
session_start();
include_once("config.php");
    date_default_timezone_set("Asia/Makassar");

if(!isset($_SESSION['login'])){
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = 'loginmember.php'; 
        </script>"
        ;
}else{
    $username = $_SESSION['login'];

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
//untuk penggunaan nama setelah nama tabel menggunakan variable untuk pemanggilan nama tabel
$result = mysqli_query($db,"SELECT *,(SELECT SUM(jual.jumlah) FROM pesanan jual WHERE jual.id_barang=brg.id) as terjual FROM barang brg WHERE brg.id ='$id'");
$row = mysqli_fetch_array($result);
}
}

    $perintahSQL="SELECT *,(SELECT SUM(jual.jumlah) FROM pesanan jual WHERE jual.id_barang=brg.id) as terjual FROM barang brg";
    $result = mysqli_query($db, $perintahSQL);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <link rel="stylesheet" href="css/form1.css">
    <script src="jquery-3.6.0.min.js"></script>
</head>
    <body>
        <header>
            <div class="nav">
                <nav>
                    <h2 style="text-align: center; width:100%;">Detail</h2>
                </nav>
            </div> 
        </header>
        <div class="list-table">
            <table>
                <tr class="thead">
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok Barang</th>
                </tr>
                <tr>
                    <td><img src="gambar/<?=$row['gambar'];?>" alt="" width="100px"></td> 
                    <td><?=$row['nama_barang'];?></td>
                    <td id="harga"><?=$row['harga'];?></td>
                    <td id="stok"><?=($row['jumlah'] - $row['terjual']);?></td>
                </tr>
            </table>
    <form method="POST" action="invoice.php">
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <table>
            <tr>
                <td>Masukkan Jumlah Pembelian</td>
                <td><input type="number" name="jumlah" id="jumlah" placeholder="Jumlah Pembelian"></td>
            </tr>
            <tr>
                <td><input type="submit" name="checkout" value="Checkout"></td>
                <td id="total" style="text-align:right;">Rp</td>
            </tr>
        </table>
    </form>
    <script>
        $(document).ready(function(){
            var jq_harga = $("#harga").html();
            var jq_stok = $("#stok").html();
            $("#jumlah").change(function(){
                if(this.value > jq_stok){
                    alert("Jumlah Permintaan Anda Melebihi Stok");
                    $(this).val(jq_stok);
                }else{
                    var total = jq_harga * this.value;
                    $("#total").html("Rp " + total);
                }
            });
        });
    </script>
        </div>
    </body>
</html>