<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:../login/login.php?logindulu");
}
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">TOKO SAYUR</a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link ">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a href="../barang/index.php" class="nav-link active">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pembeli/index.php" class="nav-link ">Pembeli</a>
                        </li>
                        <li class="nav-item">
                            <a href="../supplier/index.php" class="nav-link ">Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a href="../user/index.php" class="nav-link ">User</a>
                        </li>

                    </ul>
                
                </div>
                <div class="d-flex">
                        <a href="../login/logout.php" class="btn btn-outline-danger btn-sm">LOGOUT</a>
                    </div>
            </div>
        </nav><br>

        <div class="card">
            <div class="card-body">
            <table class="table table-striped table-hover text-center">
                <h4>Daftar Barang</h4><br>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary btn-sm">Tambah</button> |
                <a href="../cetak/cetak_barang.php" target="_blank" class="btn btn-success btn-sm">Cetak</a><br>
                
                <br>
                <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Perkilo</th>
                    <th>Opsi</th>
                </tr>
                <?php while ($barang = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$barang['id_barang']?></td>
                        <td><?=$barang['nama_supplier']?></td>
                        <td><?=$barang['nama_barang']?></td>
                        <td><?=$barang['stok']?></td>
                        <td><?=$barang['harga_perkilo']?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?=$barang['id_barang']?>">Edit</button> |
                            <a href="../barang/hapus.php?id_barang=<?=$barang['id_barang']?>" onclick="return confirm('Apakah anda yakin akan hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>

                    

<div class="modal fade" id="edit<?=$barang['id_barang']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Barang</h3>
            </div>
            <div class="modal-body">
                    <form action="../barang/edit.php" method="post">
                        <input type="hidden" name="id_barang" value="<?=$barang['id_barang']?>">
                    <label for="" class="form-label">Nama supplier</label><br>
                    <select name="id_supplier" id="" class="form-control" required>
                        <option value="" class="form-control" disable selected>-- Pilih supplier --</option>
                        <?php 
                        mysqli_data_seek($query_supplier, 0);
                        while ($supplier = mysqli_fetch_assoc($query_supplier)){
                            $id_supplier = $supplier['id_supplier'];
                            $nama_supplier = $supplier['nama_supplier'];
                            $id_barang_supplier = $barang['id_supplier'];

                            echo "<option value='$id_supplier'";
                            if($id_barang_supplier == $id_supplier){
                                echo " selected";
                            }
                            echo ">$nama_supplier</option>";
                        }?>
                    </select><br>
                    <label for="" class="form-label">Nama Barang</label><br>
                    <input type="text" name="nama_barang" id="" class="form-control"  value="<?=$barang['nama_barang']?>" required><br>


                        <label for="" class="form-label">Stok</label><br>
                        <input type="number" name="stok" id="" class="form-control"  value="<?=$barang['stok']?>" required><br>


                        <label for="" class="form-label">Harga Perkilo</label><br>
                        <input type="number" name="harga_perkilo" id="" class="form-control"  value="<?=$barang['harga_perkilo']?>" required><br>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
            </div>
     
        </div>
    </div>
</div>



<script src="../bootstrap/bootstrap.min.js"></script>


               <?php } ?>
            </table>
            </div>
        </div>
        
    </div>
</body>
</html>



<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Barang</h3>
            </div>
            <div class="modal-body">
                    <form action="../barang/tambah.php" method="post">
                    <label for="" class="form-label">Nama supplier</label><br>
                    <select name="id_supplier" id="" class="form-control" required>
                        <option value="" class="form-control" disable selected>-- Pilih supplier --</option>
                        <?php 
                        mysqli_data_seek($query_supplier, 0);
                        while ($supplier = mysqli_fetch_assoc($query_supplier)){
                            $id_supplier = $supplier['id_supplier'];
                            $nama_supplier = $supplier['nama_supplier'];

                            echo "<option value='$id_supplier'>$nama_supplier</option>";
                        }?>
                    </select><br>
                    <label for="" class="form-label">Nama Barang</label><br>
                    <input type="text" name="nama_barang" id="" class="form-control" required><br>


                        <label for="" class="form-label">Stok</label><br>
                        <input type="number" name="stok" id="" class="form-control" required><br>


                        <label for="" class="form-label">Harga Perkilo</label><br>
                        <input type="number" name="harga_perkilo" id="" class="form-control" required><br>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
            </div>
     
        </div>
    </div>
</div>



<script src="../bootstrap/bootstrap.min.js"></script>