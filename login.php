<?php 
session_start();

require 'koneksi.php';

$npm = $_POST['npm'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi,"SELECT * FROM tb_mahasiswa WHERE npm='$npm' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0){
    $data = mysqli_fetch_array($login);
    
    if($data['level']== "kpu"){
        $_SESSION['npm'] = $npm;
        $_SESSION['name'] = $data['name'];
        $_SESSION['level'] = $data['level'];
        header("location:admin/");
    }else{
        $_SESSION['npm'] = $npm;
        $_SESSION['name'] = $data['name'];
        $_SESSION['level'] = $data['level'];
        header("location:pemilihan/");
    }
        
}else{
header("location:index.php?pesan=gagal");
}
?>
