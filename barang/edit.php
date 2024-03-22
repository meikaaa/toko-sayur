<?php
include "../koneksi/koneksi.php";

$id_barang = $_POST['id_barang'];
$id_supplier = $_POST['id_supplier'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga_perkilo = $_POST['harga_perkilo'];

    $sql = "UPDATE barang SET id_supplier='$id_supplier', nama_barang='$nama_barang', stok='$stok', harga_perkilo='$harga_perkilo' WHERE id_barang = '$id_barang'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../barang/index.php?edit=berhasil");
    }else{
        header("location:../barang/index.php?edit=gagal");
    }


?>