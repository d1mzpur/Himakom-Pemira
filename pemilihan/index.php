<?php 

require '../koneksi.php';

session_start();

if (!isset($_SESSION['npm'])){
        echo "<script> alert('Anda Belum Login');
    document.location.href='../'</script>";
}


if (isset($_SESSION['level'])){
    if ($_SESSION['level'] == "kpu"){
        echo "<script>document.location.href='/admin'</script>";
}
    
}


$npm = $_SESSION['npm'];
$nama = $_SESSION['name'];
$pecah = explode(" ",$nama);




$checkpemilih = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pemilihan WHERE npm ='".$npm."'"));
if($checkpemilih > 0){ 
    
    $ambilcalon = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pemilihan INNER JOIN himakom ON pemilihan.idcalon = himakom.idcalon WHERE pemilihan.npm ='".$npm."'"));
    
    $_SESSION['checkpemilih'] = $ambilcalon['nama'];
    }else{
    $_SESSION['checkpemilih'] = "Belum Memilih";}
    
    
  $data = mysqli_query ($koneksi,"SELECT * FROM himakom");
    


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
          <img class="logo" src="../images/main_logo.png">
        </div>
        <div class="header-right">
        <a href="/kandidat"><?php echo "Kandidat"?></a>
          <a href="logout.php"><?php echo "Logout ", $pecah[0];?></a>
          <div>
      </div>
    </header>
     <div class="top-wrapper">
      <div class="container">
        <img src='../images/himakom.png' width='200' height='200' />
        <h1>PEMILIHAN UMUM</h1>
        <h1>KETUA HIMPUNAN MAHASISWA ILMU KOMPUTER 2020-2021</h1>
        <div class="btn-wrapper">
 
        </div>
      </div>
    </div>
    <div class="lesson-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Status Pilihan:<br> <?php echo $_SESSION['checkpemilih'];?></h2>
        </div>
        
        
        <div class="lessons">
             <?php 
        while ($row = mysqli_fetch_assoc($data)): ?>
          <div class="lesson">
            <div class="lesson-icon">
                
                <a href="pilih.php?idcalon=<? echo $row['idcalon'];?>" onClick="return confirm('Sistem Memasikan Apakah Benar <?php echo $_SESSION['name'];?>, Memilih <? echo $row['nama'];?> Sebagai Ketua Himpunan Periode 2020-2021 ?')"><img src="<? echo $row['photo'];?>"  width="230" height="230" border="0"?></a>
						<h1><?php echo $row['nama'];?></h1><br>
            </div>
          </div> 
         <?php endwhile; ?>  
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">

        <img src="http://himakom.crudim.my.id/images/image.png">
      </div>
    </footer>
  </body>
</html>
