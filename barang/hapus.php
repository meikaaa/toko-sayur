<?php
include "../koneksi/koneksi.php";

$id_barang = $_GET['id_barang'];

$sql = "DELETE FROM barang WHERE id_barang ='$id_barang' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../barang/index.php?hapus=berhasil");
}else{
    header("location:../barang/index.php?hapus=gagal");
}
?>