<?php
include "../koneksi/koneksi.php";

$id_user = $_GET['id_user'];

$sql = "DELETE FROM user WHERE id_user ='$id_user' ";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../user/index.php?hapus=berhasil");
}else{
    header("location:../user/index.php?hapus=gagal");
}
?>