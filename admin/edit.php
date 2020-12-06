  
<?php
    require "../koneksi.php";
    $hapus = mysqli_query($koneksi,"UPDATE tb_mahasiswa SET password=md5($_GET[pass]) WHERE npm='$_GET[npm]'");

        echo "<script> alert('Data Berhasil di Rubah!');
        document.location.href='/admin';
        </script>"; 
    ?>