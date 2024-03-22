<?php
session_start();
include "../koneksi/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM user WHERE username='$username' AND password=md5('$password')";
$query = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($query) > 0){
    header("location:../index.php?login=berhasil");
    $_SESSION['login'] = "$username";
}else {
    header("location:../login/login.php?login=gagal");
}




?>