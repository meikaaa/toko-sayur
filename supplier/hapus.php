<?php
include "../koneksi/koneksi.php";

$id_supplier = $_GET['id_supplier'];

$sql = "DELETE FROM supplier WHERE id_supplier ='$id_supplier' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../supplier/index.php?hapus=berhasil");
}else{
    header("location:../supplier/index.php?hapus=gagal");
}
?>