<?php
include "../koneksi/koneksi.php";

$id_transaksi = $_GET['id_transaksi'];

$sql = "DELETE FROM transaksi WHERE id_transaksi ='$id_transaksi' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../index.php?hapus=berhasil");
}else{
    header("location:../index.php?hapus=gagal");
}
?>