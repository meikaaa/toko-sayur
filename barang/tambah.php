<?php
include "../koneksi/koneksi.php";

// $id_barang = $_POST['id_barang'];
$id_supplier = $_POST['id_supplier'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$harga_perkilo = $_POST['harga_perkilo'];

    $sql = "INSERT INTO barang (id_supplier, nama_barang, stok, harga_perkilo) VALUES ('$id_supplier','$nama_barang','$stok','$harga_perkilo')";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../barang/index.php?tambah=berhasil");
    }else{
        header("location:../barang/index.php?tambah=gagal");
    }


?>