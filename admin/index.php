<?php 

require '../koneksi.php';

session_start();


if (!isset($_SESSION['npm'])){
        echo "<script> alert('Anda Belum Login');
    document.location.href='../'</script>";
}


if (isset($_SESSION['level'])){
    if ($_SESSION['level'] == "mahasiswa"){
        echo "<script>document.location.href='/pemilihan'</script>";
}elseif ($_SESSION['level'] == ""){
        echo "<script>document.location.href='/pemilihan'</script>";
}}


$npm = $_SESSION['npm'];
    
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
    <style>
#myScrollTable2 tbody{
clear:both;
height:300px;
overflow:auto;
float:left;
}
#myScrollTable tbody{
clear:both;
height:300px;
overflow:auto;
float:left;
}
</style>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-left">
          <img class="logo" src="../images/main_logo.png">
        </div>
        <div class="header-right">
          <a href="logout.php"><?php echo "Logout ", $_SESSION['name'];?></a>

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
          <h2>Hasil Penghitungan</h2>
          <h2><? echo 'Total Suara : ',$total_suara; ?></h2>
        </div>
     <div class="lessons">
             <?php 
        while ($row = mysqli_fetch_assoc($data)):  
        
        $calon=$row['idcalon'];
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
                 <br><br><h3>Manual Penghitungan</h3>
         
         <table id="myScrollTable" border="0" cellpadding="4" cellspacing="1" align="center">
        <tbody>
            <tr bgcolor="#4B0082">
            <th><font color="#FFFFFF">Nomer</font></th>
            <th><font color="#FFFFFF">Kode Suara</font></th>
            <th><font color="#FFFFFF">Waktu</font></th>
            <th><font color="#FFFFFF">IP</font></th>
        </tr>
         <?php $data2 = mysqli_query ($koneksi,"SELECT * FROM pemilihan WHERE idcalon = '".$calon."'");?>
            <?php $i = 1; ?>
             <?php while ($row = mysqli_fetch_assoc($data2)):?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo "KPU-HIMA-", $row["id"] ?></td>
            <td><?php echo $row["waktu"] ?></td>
            <td><?php echo $row["ip"] ?></td>
        </tr>
        <?php $i++; ?>
            <?php endwhile ?>  
        </tbody>
        </table>
            </div>
          </div> 
         <?php endwhile; ?>  
          <div class="clear"></div>
        </div>
      </div>
    </div>
    
    <div class="message-wrapper">
      <div class="container">
        <center><h2>Data Pemilihan</h2></center><br>
      	<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>
 <center>
<form method="post" enctype="multipart/form-data" action="error3.php">
	Pilih File: 
	<input name="filepegawai" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form></center>
<br>
        
           <table id="myScrollTable2" border="0" cellpadding="20" cellspacing="1" align="center">
        <tbody>
            <tr bgcolor="#4B0082">
            <th><font color="#FFFFFF">Nomer</font></th>
            <th><font color="#FFFFFF">Nomer Induk Mahasiswa</font></th>
            <th><font color="#FFFFFF">Nama</font></th>            
            <th><font color="#FFFFFF">Status Pemilihan</font></th     >       
            <th><font color="#FFFFFF">Tindakan</font></th>
        </tr>
         <?php $data3 = mysqli_query ($koneksi,"SELECT * FROM tb_mahasiswa ORDER BY `tb_mahasiswa`.`npm` ASC");?>
            <?php $i = 1; ?>
             <?php while ($row = mysqli_fetch_assoc($data3)):
             
             $npmmaha=$row['npm']?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["npm"] ?></td>
            <td><?php echo $row["name"] ?></td>
              <? $checkpemilih = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pemilihan WHERE npm ='".$npmmaha."'"));
    if($checkpemilih > 0){ 
    
    $ambilcalon = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pemilihan INNER JOIN himakom ON pemilihan.idcalon = himakom.idcalon WHERE pemilihan.npm ='".$npmmaha."'"));
    
    $_SESSION['checkpemilih'] = "Memilih";
    }else{
    $_SESSION['checkpemilih'] = "Belum Memilih";}?>
    
    <td><?php echo $_SESSION['checkpemilih'];?></td>
     <td><a href="edit.php?npm=<?php echo $row["npm"]?>&pass=<?php echo $row["npm"]?>">Edit Password<a> || <a href="hapus.php?npm=<?php echo $row["npm"]?>" onClick="return confirm('Anda Yakin, Menghapus Akun <?php echo $row["name"];?>')">Hapus Akun<a></td>
            
         
    
        </tr>
        <?php $i++; ?>
            <?php endwhile ?>  
        </tbody>
        </table>
     
          <div class="clear"></div></div></div>
        
    
    <footer>
      <div class="container">
        <img src="http://himakom.crudim.my.id/images/image.png">
      </div>
    </footer>
  </body>
</html>