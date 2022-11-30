<?php
session_start();
include_once("config.php");
date_default_timezone_set("Asia/Makassar");

if (!isset($_SESSION['login'])) {
    header("Location:loginadmin.php");
    exit;
}
$perintahSQL = "SELECT *,(SELECT SUM(jual.jumlah) FROM pesanan jual WHERE jual.id_barang=brg.id) as terjual FROM barang brg";
$result = mysqli_query($db, $perintahSQL); //variabel $result
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <title>SilviaFashion</title>
    <link rel="stylesheet" href="css/form1.css">
</head>

<body>
    <header>
        <div class="nav">
            <nav>
                <h2 style="width:80%;">Formulir Data Tambah Barang</h2>
                <ul>
                    <li><a href="history.php">TRANSAKSI</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="list-table">
        <h3>Daftar Data Barang</h3>
        <a href="tambah_barang.php" class="tambah">Tambah Data</a>
        <table class="table table-bordered">
            <tr class="thead">
                <th>No</th>
                <th nowrap>Nama Barang</th>
                <th>Jumlah</th>
                <th>Gambar</th>
                <th>Harga</th>

                <th colspan="2">Actions</th>
            </tr>
            <tbody>
                <?php
                $batas = 5;
                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;
                $data = mysqli_query($db, "select * from barang");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $perintahSQL_2 = "SELECT *,(SELECT SUM(jual.jumlah) FROM pesanan jual WHERE jual.id_barang=brg.id) as terjual FROM barang brg LIMIT $halaman_awal, $batas";
                $result_2 = mysqli_query($db, $perintahSQL_2); //terjual nya mana? lihati, nade kan variabel terjual?
                //disini jgn lagi pakai variabel $result supaya nde bingung...jgn telpon. rosyid main HP
                $nomor = $halaman_awal + 1;
                $i = 1;
                while ($row = mysqli_fetch_array($result_2)) {
                    $stok = $row['jumlah'] - $row['terjual'];
                ?>
                <tr>
                    
                    <td>
                        <?php echo $nomor++; ?>
                    </td>
                    <td nowrap>
                        <?= $row['nama_barang'] ?>
                    </td>
                    <td>
                        <?= $stok ?>
                    </td>
                    <td><img src="gambar/<?= $row['gambar']; ?>" alt="" width="100px"></td>
                    <td>
                        <?= $row['harga'] ?>
                    </td>
                    <td class="edit">
                        <a href="edit.php?id=<?= $row['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </td>
                    <td class="hapus">
                        <a href="hapus.php?id=<?= $row['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman > 1) { echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>">
                        <?php echo $x; ?>
                    </a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman < $total_halaman) { echo "href='?halaman=$next'"; }
                    ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>

</body>

</html>