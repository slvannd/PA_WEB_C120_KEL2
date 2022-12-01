<?php 
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM barang WHERE id = '$id' ");
        $baris = mysqli_fetch_array($result);
    }

    if(isset($_POST['submit'])){
        $nama_barang = $_POST['nama_barang'];
        $jumlah = $_POST['jumlah'];
        
        $update = mysqli_query($db, "UPDATE barang SET nama_barang='$nama_barang', jumlah='$jumlah' WHERE id='$id'");

        if($update){
            header("Location:formbarang.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EtamFashion</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <header>
        <h2>Formulir Data Pembelian</h2>
    </header>
    
    <div class="form-class">
        <h3>Edit Data</h3>
        <form action="" method="post">
            
            <label for="">Nama Barang</label><br>
            <input type="text" name="nama_barang" class="form-text" value=<?=$baris['nama_barang'];?>><br>
            
            <label for="">Jumlah</label><br>
            <input type="text" name="jumlah" class="form-text" value=<?=$baris['jumlah'];?>><br>
            
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
            
        
        </form>
    </div>

</body>
</html>