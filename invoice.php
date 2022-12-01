<?php 
    session_start();
    require 'config.php';

    $user = $_SESSION['login'];

    if(isset($_POST['checkout'])){
        $id = $_POST['id'];
        $barang = mysqli_query($db, "SELECT * FROM barang WHERE id='$id'");
        $row = mysqli_fetch_array($barang);

        $tgl = date('d-m-Y');
        $brg = $row['nama_barang'];
        $jumlah = $_POST['jumlah'];
        $total = $row['harga']*$jumlah;

        $query = "INSERT INTO pesanan (tanggal, nama_pembeli, id_barang, jumlah, total) VALUES ('$tgl','$user','$id', '$jumlah','$total')";
        $pesan = mysqli_query($db,$query) or die(mysqli_error($db));

        if($query){
            echo "
            <script>
                alert('Berhasil Beli');
            </script>"
            ;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
        <link rel="stylesheet" href="css/form.css">
</head>
<body>
        <header>
            <div class="nav">
                <nav>
                    <h2 style="text-align: center; width:100%;">Invoice</h2>
                </nav>
            </div> 
        </header>
        <div class="list-table">
            <table border="1">
                <tr>
                    <td colspan=2><img src="gambar/<?=$row['gambar']?>" alt="" width="100px"></td>
                </tr>
                <tr>
                    <td>Nama Pembeli</td>
                    <td><?=$user?></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><?=$brg?></td>
                </tr>
                <tr>
                    <td>Jumlah Beli</td>
                    <td><?=$jumlah?></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td><?=$total?></td>
                </tr>
            </table>
        </div>
    <center><button onclick="window.location.href='hotitem.php';">Kembali</button></center>
</body>
</html>