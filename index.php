<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login/login.php?logindulu");
}
include "koneksi/koneksi.php";

if(isset($_POST['tambah'])){

    $id_pembeli = $_POST['id_pembeli'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    
    $sql1 = "SELECT * FROM barang WHERE id_barang='$id_barang' ";
    $query1 = mysqli_query($koneksi, $sql1);
    
    if($query1){
        $barang = mysqli_fetch_assoc($query1);
        $id_barang = $barang['id_barang'];
        $harga_perkilo = $barang['harga_perkilo'];
        $stok = $barang['stok'];
        $melebihi = $jumlah > $stok;
    
        if($melebihi){
            echo "
            <script>alert('Tambah transaksi gagal, jumlah melebihi stok').window.location.href='index.php'</script> ";
        //    ("location:index.php");
       

        }else{
            $total = $harga_perkilo * $jumlah;
            $sql = "INSERT INTO transaksi (id_pembeli, id_barang, jumlah, total) VALUES ('$id_pembeli','$id_barang','$jumlah','$total')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                header("location:index.php?tambah=berhasil");
            
        }
        }
    }


}
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
    <link rel="stylesheet" href="style.css">
    <style>
        .p{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">TOKO SAYUR</a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a href="barang/index.php" class="nav-link">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a href="pembeli/index.php" class="nav-link ">Pembeli</a>
                        </li>
                        <li class="nav-item">
                            <a href="supplier/index.php" class="nav-link ">Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a href="user/index.php" class="nav-link ">User</a>
                        </li>

                    </ul>
                   
                </div>
                <div class="d-flex">
                        <a href="login/logout.php" class="btn btn-outline-danger btn-sm">LOGOUT</a>
                    </div>
            </div>
        </nav>

        <p><div class="d-flex alert alert-primary alert-dismiss" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       Anda login sebagai : @<?=$_SESSION['login']?>
          
        </div></p>

        <div class="card">
            <div class="card-body">
           
     <h4>Daftar Transaksi</h4><br>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary btn-sm">Tambah </button>  |

                <a href="cetak/cetak_transaksi.php" target="_blank" class="btn btn-success btn-sm">Cetak</a><br><br>
                <table class="table table-striped table-hover text-center">
                <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tgl Transaksi</th>
                    <th>Opsi</th>
                </tr>
                <?php while ($transaksi = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$transaksi['id_transaksi']?></td>
                        <td><?=$transaksi['nama_pembeli']?></td>
                        <td><?=$transaksi['nama_barang']?></td>
                        <td><?=$transaksi['jumlah']?></td>
                        <td><?=$transaksi['total']?></td>
                        <td><?=$transaksi['tgl_transaksi']?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?=$transaksi['id_transaksi']?>">Edit</button> |
                            <a href="transaksi/hapus.php?id_transaksi=<?=$transaksi['id_transaksi']?>" onclick="return confirm('Apakah anda yakin akan hapus data ini?')"  class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>

                    

<div class="modal fade" id="edit<?=$transaksi['id_transaksi']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Transaksi</h3>
            </div>
            <div class="modal-body">
                    <form action="transaksi/edit.php" method="post">
                        <input type="hidden" name="id_transaksi" value="<?=$transaksi['id_transaksi']?>">
                    <label for="" class="form-label">Nama Pembeli</label><br>
                    <select name="id_pembeli" id="" class="form-control" required>
                        <option value="" class="form-control" disable selected>-- Pilih Pembeli --</option>
                        <?php 
                        mysqli_data_seek($query_pembeli, 0);
                        while ($pembeli = mysqli_fetch_assoc($query_pembeli)){
                            $id_pembeli = $pembeli['id_pembeli'];
                            $nama_pembeli = $pembeli['nama_pembeli'];
                            $id_transaksi_pembeli = $transaksi['id_pembeli'];

                            echo "<option value='$id_pembeli'";
                            if($id_transaksi_pembeli == $id_pembeli){
                                echo " selected";
                            }
                            echo ">$nama_pembeli</option>";
                        }?>
                    </select><br>
                    <label for="" class="form-label">Nama Barang</label><br>
                    <select name="id_barang" id="" class="form-control" required>
                        <option value="" class="form-control" disable selected>-- Pilih barang --</option>
                        <?php 
                        mysqli_data_seek($query_barang, 0);
                        while ($barang = mysqli_fetch_assoc($query_barang)){
                            $id_barang = $barang['id_barang'];
                            $nama_barang = $barang['nama_barang'];
                            $id_transaksi_barang = $transaksi['id_barang'];

                            echo "<option value='$id_barang'";
                            if($id_transaksi_barang == $id_barang){
                                echo " selected";
                            }
                            echo ">$nama_barang</option>";
                        }?>
                    </select><br>


                        <label for="" class="form-label">Jumlah</label><br>
                        <input type="number" name="jumlah" id="" class="form-control"  value="<?=$transaksi['jumlah']?>" required><br>


                        <!-- <label for="" class="form-label">Tgl Transaksi</label><br> -->
                        <input type="hidden" name="date-time" id="" class="form-control"  value="<?=$transaksi['tgl_transaksi']?>" required><br>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
            </div>
     
        </div>
    </div>
</div>



<script src="bootstrap/bootstrap.min.js"></script>


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
                <h3 class="modal-title">Tambah Transaksi</h3>
            </div>
            <div class="modal-body">
                    <form action="" method="post">
                    <label for="" class="form-label">Nama Pembeli</label><br>
                    <select name="id_pembeli" id="" class="form-control" required>
                        <option value="" class="form-control" disable selected>-- Pilih Pembeli --</option>
                        <?php 
                        mysqli_data_seek($query_pembeli, 0);
                        while ($pembeli = mysqli_fetch_assoc($query_pembeli)){
                            $id_pembeli = $pembeli['id_pembeli'];
                            $nama_pembeli = $pembeli['nama_pembeli'];

                            echo "<option value='$id_pembeli'>$nama_pembeli</option>";
                        }?>
                    </select><br>
                    <label for="" class="form-label">Nama Barang</label><br>
                    <select name="id_barang" id="" class="form-control" required>
                        <option value="" class="form-control" disable selected>-- Pilih barang --</option>
                        <?php 
                        mysqli_data_seek($query_barang, 0);
                        while ($barang = mysqli_fetch_assoc($query_barang)){
                            $id_barang = $barang['id_barang'];
                            $nama_barang = $barang['nama_barang'];

                            echo "<option value='$id_barang'>$nama_barang</option>";
                        }?>
                    </select><br>


                        <label for="" class="form-label">Jumlah</label><br>
                        <input type="number" name="jumlah" id="" class="form-control" required><br>


                        <!-- <label for="" class="form-label">Tgl Transaksi</label><br> -->
                        <input type="hidden" name="date-time" id="" class="form-control" required><br>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
            </div>
     
        </div>
    </div>
</div>



<script src="bootstrap/bootstrap.min.js"></script>