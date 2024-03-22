<?php
include "../koneksi/koneksi.php";

$nama_pembeli = $_POST['nama_pembeli'];
$no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO pembeli (nama_pembeli, no_hp) VALUES ('$nama_pembeli','$no_hp')";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../pembeli/index.php?tambah=berhasil");
    }else{
        header("location:../pembeli/index.php?tambah=gagal");
    }


?>