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
    <link rel="stylesheet" href="css/form.css">
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
                $batas = 2;
                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                $offset = $halaman - 1;
                $halaman_awal = $offset * $batas;

                $previous = $halaman - 1;
                $next = $halaman + 1;
                $data = mysqli_query($db, "select * FROM pesanan");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $result = mysqli_query($db, "select *, psn.jumlah as jumlah_pesanan FROM pesanan psn inner join barang brg on psn.id_barang=brg.id limit $halaman_awal, $batas");
                $nomor = $halaman_awal + 1;
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <td>
                        <?= $nomor; ?>
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
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <?php
                    if($halaman > 1){
                        echo "
                        <li class='page-item'>
                            <a class='page-link' href='?halaman=$previous'>Previous</a>
                        </li>
                        ";
                    }
                    $hal_awal=$halaman - 2;
                    $hal_awal=($hal_awal<=1) ? 1 : $hal_awal;
                    $hal_akhir=$halaman + 2;
                    $hal_akhir=($hal_akhir>=$total_halaman) ? $total_halaman : $hal_akhir;
                    for ($x = $hal_awal; $x <= $hal_akhir; $x++) {
                        $link_url=($halaman==$x) ? "" : "?halaman=$x";
                        $active=($halaman==$x) ? "active" : "";
                        $attr=($halaman==$x) ? "onclick='return false;'" : "";
                        echo "
                            <li class='page-item $active'><a class='page-link' href='$link_url' $attr>
                                $x
                            </a></li>
                        ";
                    }
                    if($halaman < $total_halaman){
                        echo "
                        <li class='page-item'>
                            <a class='page-link' href='?halaman=$next'>Next</a>
                        </li>
                        ";
                    }
                ?>
            </ul>
        </nav>
    </div>

</body>

</html>