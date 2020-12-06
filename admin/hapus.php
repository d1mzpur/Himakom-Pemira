  
<?php
    require "../koneksi.php";
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_mahasiswa WHERE npm='$_GET[npm]'");

        echo "<script> alert('Data Berhasil di Hapus!');
        document.location.href='/admin';
        </script>"; 
    ?>