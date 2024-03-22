<?php
include "../koneksi/koneksi.php";

$sql = "select b.*, s.nama_supplier
        from barang as b
        inner join supplier as s on b.id_supplier = s.id_supplier";
$query = mysqli_query($koneksi, $sql);

$sql_supplier = "SELECT * FROM supplier";
$query_supplier = mysqli_query($koneksi, $sql_supplier);

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
                <h4>Daftar Barang</h4><br>
  
                <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Perkilo</th>
                  </tr>
                <?php while ($barang = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$barang['id_barang']?></td>
                        <td><?=$barang['nama_supplier']?></td>
                        <td><?=$barang['nama_barang']?></td>
                        <td><?=$barang['stok']?></td>
                        <td><?=$barang['harga_perkilo']?></td>
                        
                    </tr>
               <?php } ?>
            </table>
            </div>
        </div>
        
    </div>
</body>
</html>
<script>
    window.print();
</script>