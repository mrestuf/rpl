<?php
    include "../lib/koneksi.php";
    $transaksi = $_GET['id'];
    echo $transaksi;
    $query = mysqli_query($koneksi, 'DELETE FROM tbtransaksi WHERE no_transaksi = "'.$transaksi.'"');
    $query1 = mysqli_query($koneksi, 'DELETE FROM tbdetail WHERE no_transaksi = "'.$transaksi.'"');
    if ($query){
        echo "<script type='text/javascript'> alert('Data Transaksi berhasil dihapus'); 
        window.location='laporan.php'; </script>";
        }else{
         echo "<script type='text/javascript'> alert('Data Transaksi gagal dihapus'); 
         window.location='laporan.php'; </script>";
        }
?>