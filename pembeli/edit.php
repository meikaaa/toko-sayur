<?php
include "../koneksi/koneksi.php";

$id_pembeli = $_POST['id_pembeli'];
$nama_pembeli = $_POST['nama_pembeli'];
$no_hp = $_POST['no_hp'];

    $sql = "UPDATE pembeli SET nama_pembeli='$nama_pembeli', no_hp='$no_hp' WHERE id_pembeli='$id_pembeli' ";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../pembeli/index.php?edit=berhasil");
    }else{
        header("location:../pembeli/index.php?edit=gagal");
    }


?>