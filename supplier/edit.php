<?php
include "../koneksi/koneksi.php";

$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

    $sql = "UPDATE supplier SET nama_supplier='$nama_supplier' , alamat='$alamat' , no_hp='$no_hp'  WHERE id_supplier='$id_supplier' ";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../supplier/index.php?edit=berhasil");
    }else{
        header("location:../supplier/index.php?edit=gagal");
    }


?>