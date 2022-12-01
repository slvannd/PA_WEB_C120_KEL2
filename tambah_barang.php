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
        <h2>Tambah Data Barang</h2>
    </header>
    
    <div class="form-class">
        <h3>Tambah Data Baru</h3>
        <form action="read.php" method="post" enctype="multipart/form-data"> 
            
            <label for="">Nama Barang</label><br>
            <input type="text" name="nama_barang" class="form-text"><br>
            
            <label for="">Gambar Barang</label><br>
            <input type="file" name="Gambar"><br><br>
    
            <label for="">Harga</label><br> 
            <input type="text" name="harga" class="form-text"><br>

            <label for="">Jumlah</label><br> 
            <input type="text" name="jumlah" class="form-text"><br>
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        </form>
    </div>
</body>
</html>