<?php 

session_start();

if (isset($_SESSION['npm'])){
        echo "<script> alert('Anda Belum Logout');
    document.location.href='/pemilihan'</script>";
}


if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
        echo "<script> alert('Username Atau Password Salah!');

        </script>";
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMILIHAN UMUM HIMAKOM</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-left">
          <img class="logo" src="images/main_logo.png">
        </div>
        <div class="header-right">
          <a href="kandidat">Kandidat</a>

          <div>
      </div>
    </header>
     <div class="top-wrapper">
      <div class="container">
        <img src='images/himakom.png' width='200' height='200' />
        <h1>PEMILIHAN UMUM</h1>
        <h1>KETUA HIMPUNAN MAHASISWA ILMU KOMPUTER 2020-2021</h1>
        <div class="btn-wrapper">
 
        </div>
      </div>
    </div>
    <div class="lesson-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Cara Memilih Ketua Himpunan</h2>
        </div>
        <div class="lessons">
          <div class="lesson">
            <div class="lesson-icon">
              <img src="images/1.png" height="150" width="150">
            <p class="text-contents">Panitia KPU akan Memberikan Akun kepada Mahasiswa untuk memilih Ketua Himpunan</p>
            </div>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="images/2.png" height="150" width="150">
            </div>
            <p class="text-contents">Mahasiswa Login dengan Akun yang sudah diberikan panitia</p>
       </div>
          <div class="lesson">
            <div class="lesson-icon">
            <img src="images/3.png" height="150" width="150">
            </div>
            <p class="text-contents">Mahasiswa akan dihadapkan dengan Foto beserta Visi Misi Calon Ketua Himpunan.</p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="images/4.png"  height="150" width="150">
            </div>
            <p class="text-contents">Untuk memilih kandidat dengan menekan Foto Calon Ketua Himpunan, Selesai</p><br><br><br>
          </div>
          <div class="heading">
              
          <h2>Apakah Nomer Induk Mahasiswa Terdaftar ?</h2>
        </div>
          <div class="clear"></div>
                  <p>Akun Bermasalah Kontak : <br><b>0821-2236-6675 atau 0895-3553-28028<br>0812-1033-1200</b></p>
        </div>
      </div>
    </div>
    
    <div class="message-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Sukseskan Pemilihan Ketua Himpunan Mahasiswa Ilmu Komputer - Univesitas Pakuan!</h2>
          <h3>Untuk Ilmu Komputer yang lebih baik</h3><br>
          
          
          <form action="login.php" method="post">
          <p>Nomer Induk Mahasiswa</p>
            <input name="npm" type="npm"  required="">
            <p>Password</p>
            <input name="password" type="password" required="" >
            <br><br><br>
            <button class="btn signup" name="login">Login</form>
     
        </div>
    </div>   
    </div>
    <footer>
      <div class="container">
        <img src="http://himakom.crudim.my.id/images/image.png">
        <p>Akun Bermasalah Kontak : <b>0821-2236-6675/ 0895-3553-28028 / 0812-1033-1200</b></p>
      </div>
    </footer>
  </body>
</html>
