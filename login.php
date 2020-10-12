<?php 
session_start();

require 'koneksi.php';

$npm = $_POST['npm'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE npm='$npm' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0){
    $data = mysqli_fetch_array($login);
    
        $_SESSION['npm'] = $npm;
        $_SESSION['name'] = $data['name'];
        header("location:pemilihan/");
}else{
header("location:index.php?pesan=gagal");
}
?>
