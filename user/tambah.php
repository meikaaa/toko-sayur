<?php
include "../koneksi/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ('$username',md5('$password'))";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("location:../user/index.php?tambah=berhasil");
    }else{
        header("location:../user/index.php?tambah=gagal");
    }


?>