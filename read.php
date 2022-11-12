<?php 

require 'config.php';

if(isset($_POST['submit'])){
    
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];


    $gambar =  $_FILES['Gambar']['name'];
    $x = explode('.',$gambar);
    $ekstensi = strtolower(end($x));
    $gambar_baru = "$nama_barang.$ekstensi";
    $tmp = $_FILES['Gambar']['tmp_name'];

    if(move_uploaded_file($tmp, 'gambar/'.$gambar_baru)){
        $kirim = mysqli_query($db, "INSERT INTO barang (nama_barang,gambar,harga,jumlah) VALUES ('$nama_barang','$gambar_baru','$harga','$jumlah')");

    if($kirim){
        // echo "<script> alert('Data Berhasil Dikirim');</script>";
        header("Location:formbarang.php");
    }else {
        echo "gagal mengirim";
    }
}
}