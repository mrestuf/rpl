<?php
include ('../lib/koneksi.php');

$transaksi = $_GET['id'];
$deletepesanan = mysqli_query($koneksi,"DELETE FROM tbdetail where no_transaksi = '$transaksi'");
// var_dump($deletepesanan)
if ($deletepesanan){
	echo "<script type='text/javascript'> alert('Pesanan berhasil dihapus'); 
	window.location='transaksi.php'; </script>";
	}else{
	 echo "<script type='text/javascript'> alert('Pesanan  gagal dihapus'); 
	 window.location='transaksi.php'; </script>";
	}
		
?>