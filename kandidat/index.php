<?php 

require '../koneksi.php';

  
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
        <h1>KETUA HIMPUNAN MAHASISWA ILMU KOMPUTER 2020-2021</h1>
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
        while ($row = mysqli_fetch_assoc($data)): ?>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="<?php echo $row['photo'];?>" height="200" width="200">
              <h1><?php echo $row['nama'];?></h1><br>
              <h3>Visi</h3>
            <p class="text-contents"><?php echo $row['visi'];?></p>
            <h3>Misi</h3>
            <p class="text-contents"><?php echo $row['misi'];?></p>
            </div>
          </div> 
         <?php endwhile; ?>  
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <img src="#">
        <p>Learn to code, learn to be creative.</p>
      </div>
    </footer>
  </body>
</html>
