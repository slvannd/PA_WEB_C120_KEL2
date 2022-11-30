<?php
session_start();
include_once("config.php");
date_default_timezone_set("Asia/Makassar");

if (!isset($_SESSION['login'])) {
    header("Location:loginadmin.php");
    exit;
}
$perintahSQL = "SELECT *,psn.jumlah as jumlah_pesanan FROM pesanan psn inner join barang brg on psn.id_barang=brg.id";
$result = mysqli_query($db, $perintahSQL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
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
            <tbody>
                <?php
                $batas = 5;
                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;
                $data = mysqli_query($db, "select *, psn.jumlah as jumlah_pesanan FROM pesanan psn inner join barang brg on psn.id_barang=brg.id");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $result = mysqli_query($db, "select *, psn.jumlah as jumlah_pesanan FROM pesanan psn inner join barang brg on psn.id_barang=brg.id limit $halaman_awal, $batas");
                $nomor = $halaman_awal + 1;
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td nowrap>
                        <?= $row['tanggal'] ?>
                    </td>
                    <td><img src="gambar/<?= $row['gambar']; ?>" alt="" width="100px"></td>
                    <td>
                        <?= $row['nama_pembeli'] ?>
                    </td>
                    <td>
                        <?= $row['nama_barang'] ?>
                    </td>
                    <td>
                        <?= $row['jumlah_pesanan'] ?>
                    </td>
                    <td>
                        <?= $row['total'] ?>
                    </td>
                </tr>

                <?php
                    $i++;
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