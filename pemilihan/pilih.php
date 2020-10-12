<?php

require '../koneksi.php';

session_start();

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}


$npm = $_SESSION['npm'];
$pilihan=$_GET['idcalon'];

$ceking=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pemilihan WHERE npm ='".$npm."'"));
if($ceking > 0){ 
    
    echo "<script> alert('Anda Sudah Memilih Sebelumnya');
    document.location.href='./';</script>"; 
    }else{
    $insert=mysqli_query($koneksi,"insert into pemilihan values('','".$npm."','$pilihan',now(),'". get_client_ip()."')");
    
    echo "<script> alert('Terima Kasih Telah Menyukseskan KPU Himakom 2020-2021');
    document.location.href='./';</script>"; 
    }


?>
