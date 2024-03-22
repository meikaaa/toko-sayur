<?php
include "../koneksi/koneksi.php";

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];

    $sql = "UPDATE user SET username='$username', password=md5('$password') WHERE id_user='$id_user' ";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../user/index.php?edit=berhasil");
    }else{
        header("location:../user/index.php?edit=gagal");
    }


?>