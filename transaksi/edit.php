<?php
include "../koneksi/koneksi.php";

$id_transaksi = $_POST['id_transaksi'];
$id_pembeli = $_POST['id_pembeli'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

$sql1 = "SELECT * FROM barang WHERE id_barang='$id_barang' ";
$query1 = mysqli_query($koneksi, $sql1);

if($query1){
    $barang = mysqli_fetch_assoc($query1);
    $id_barang = $barang['id_barang'];
    $harga_perkilo = $barang['harga_perkilo'];
    $total = $harga_perkilo * $jumlah;

    $sql = "UPDATE transaksi SET id_pembeli='$id_pembeli', id_barang='$id_barang', jumlah='$jumlah', total='$total' WHERE id_transaksi='$id_transaksi' ";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../index.php?edit=berhasil");
    }else{
        header("location:../index.php?edit=gagal");
    }
}


?>