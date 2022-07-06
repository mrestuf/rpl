<?php
include ('../lib/koneksi.php');
if(isset($_POST['submit']))
{
//mengambil data yang dikirim dari form
    $id=$_POST['iddetail'];
	$qty=$_POST['qty'];
    $harga=$_POST['harga'];
    $subtotal=$qty*$harga;

}

// echo $id, " ";
// echo $qty," ";
// echo $harga;
//Update Qty
$update=mysqli_query($koneksi,"UPDATE tbdetail SET qty='$qty', subtotal='$subtotal' WHERE id_detail='$id'");
if ($update)
	echo "<script type='text/javascript'> alert('Update berhasil'); 
	window.location='transaksi.php'; </script>";
	 else
		 echo "<script type='text/javascript'> alert('Update gagal'); 
		 window.location='transaksi.php'; </script>";
?>