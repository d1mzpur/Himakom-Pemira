<?php 

require '../koneksi.php';
    
    $query=mysqli_query($koneksi,"SELECT sum(total_suara) as total FROM himakom ");
	$total=mysqli_fetch_array($query);
    $total_suara=$total['total'];
  
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
          <a href="../">Voting</a>

          <div>
      </div>
    </header>
     <div class="top-wrapper">
      <div class="container">
        <img src='../images/himakom.png' width='200' height='200' />
        <h1>PEMILIHAN UMUM</h1>
        <h1>KETUA HIMPUNAN MAHASISWA ILMU KOMPUTER 2021</h1>
        <div class="btn-wrapper">
 
        </div>
      </div>
    </div>
    <div class="lesson-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Calon Ketua Himpunan & Hasil Penghitungan</h2>
        </div>
     <div class="lessons">
             <?php 
        while ($row = mysqli_fetch_assoc($data)):  
        ?>
        
        
          <div class="lesson">
            <div class="lesson-icon">
              <img src="<?php echo $row['photo'];?>" height="200" width="200">
              <h1><?php echo $row['nama'];?></h1><br>
              <h3>Visi</h3>
            <p class="text-contents"><?php echo $row['visi'];?></p>
            <h3>Misi</h3>
            <p class="text-contents"><?php echo $row['misi'];?></p>
            <h3>RealTime Penghitungan</h3>
            <? $jumlah_suara=$row['total_suara'];
  $persen=round(((int)$jumlah_suara/(int)$total_suara)*100,2);
  $lebar=$persen*2; ?>
              <img src="../images/stat.jpg" border="1" width="<? echo $lebar; ?>" height="20" /><br>
              <? echo $jumlah_suara." SUARA - ";?><? echo $persen." %";?>
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
        
        <p>Akun Bermasalah Kontak : <b>0821-2236-6675/ 0895-3553-28028 / 0812-1033-1200</b></p>
      </div>
    </footer>
  </body>
</html>
