<?php
include "../koneksi/koneksi.php";

$id_pembeli = $_GET['id_pembeli'];

$sql = "DELETE FROM pembeli WHERE id_pembeli ='$id_pembeli' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../pembeli/index.php?hapus=berhasil");
}else{
    header("location:../pembeli/index.php?hapus=gagal");
}
?>