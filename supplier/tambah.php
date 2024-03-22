<?php
include "../koneksi/koneksi.php";

$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO supplier (nama_supplier, alamat, no_hp) VALUES ('$nama_supplier','$alamat','$no_hp')";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../supplier/index.php?tambah=berhasil");
    }else{
        header("location:../supplier/index.php?tambah=gagal");
    }


?>