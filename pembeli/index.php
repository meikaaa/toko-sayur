<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";

$sql = "SELECT * FROM pembeli";
$query = mysqli_query($koneksi, $sql);

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
                            <a href="../barang/index.php" class="nav-link ">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a href="../pembeli/index.php" class="nav-link  active">Pembeli</a>
                        </li>
                        <li class="nav-item">
                            <a href="../supplier/index.php" class="nav-link">Supplier</a>
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
                <h4>Daftar Pembeli</h4><br>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary btn-sm">Tambah</button> |
                <a href="../cetak/cetak_pembeli.php" target="_blank" class="btn btn-success btn-sm">Cetak</a><br>
                <br>
                <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama pembeli</th>
                    <th>No HP</th>
                    <th>Opsi</th>
                </tr>
                <?php while ($pembeli = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$pembeli['id_pembeli']?></td>
                        <td><?=$pembeli['nama_pembeli']?></td>
                        <td><?=$pembeli['no_hp']?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?=$pembeli['id_pembeli']?>">Edit</button> |
                            <a href="../pembeli/hapus.php?id_pembeli=<?=$pembeli['id_pembeli']?>" onclick="return confirm('Apakah anda yakin akan hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>

                    

<div class="modal fade" id="edit<?=$pembeli['id_pembeli']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Pembeli</h3>
            </div>
            <div class="modal-body">
                    <form action="../pembeli/edit.php" method="post">
                        <input type="hidden" name="id_pembeli" value="<?=$pembeli['id_pembeli']?>">


                        <label for="" class="form-label">Nama pembeli</label><br>
                        <input type="text" name="nama_pembeli" id="" class="form-control"  value="<?=$pembeli['nama_pembeli']?>" required><br>


                        <label for="" class="form-label">No HP</label><br>
                        <input type="text" name="no_hp" id="" class="form-control"  value="<?=$pembeli['no_hp']?>" required><br>


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
                <h3 class="modal-title">Tambah Pembeli</h3>
            </div>
            <div class="modal-body">
                    <form action="../pembeli/tambah.php" method="post">

                    <label for="" class="form-label">Nama pembeli</label><br>
                    <input type="text" name="nama_pembeli" id="" class="form-control" required><br>

                        <label for="" class="form-label">No HP</label><br>
                        <input type="text" name="no_hp" id="" class="form-control" required><br>


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