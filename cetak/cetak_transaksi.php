<?php
include "../koneksi/koneksi.php";

$sql = "select t.*, p.nama_pembeli, b.nama_barang
        from transaksi as t
        inner join pembeli as p on t.id_pembeli = p.id_pembeli
        inner join barang as b on t.id_barang = b.id_barang";
$query = mysqli_query($koneksi, $sql);

$sql_barang = "SELECT * FROM barang";
$query_barang = mysqli_query($koneksi, $sql_barang);

$sql_pembeli = "SELECT * FROM pembeli";
$query_pembeli = mysqli_query($koneksi, $sql_pembeli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP SAYUR</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container">
       <br>

        <div class="card">
            <div class="card-body">
            <table class="table table-striped table-hover text-center">
                <h4>Daftar Transaksi</h4><br>
                   <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tgl Transaksi</th>
                </tr>
                <?php while ($transaksi = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$transaksi['id_transaksi']?></td>
                        <td><?=$transaksi['nama_pembeli']?></td>
                        <td><?=$transaksi['nama_barang']?></td>
                        <td><?=$transaksi['jumlah']?></td>
                        <td><?=$transaksi['total']?></td>
                        <td><?=$transaksi['tgl_transaksi']?></td>
                       
                    </tr>
<?php } ?>


<script>
    window.print();
</script>