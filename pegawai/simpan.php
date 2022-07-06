<?php
    include ('../lib/koneksi.php');
    if(isset($_POST['submit1'])){
        //Mengambil data
    $transaksi=$_POST['no_transaksi'];
	$total=$_POST['total'];
    $bayar=$_POST['bayar'];
    $nip =$_POST['nip'];
    $kembalian=$_POST['kembalian'];
    $tgl = date("Y-m-d");
    $insertdata="INSERT INTO tbtransaksi(no_transaksi, nip, tgl_transaksi, total) VALUES('$transaksi','$nip','$tgl', '$total')";
    $sql=mysqli_query($koneksi,$insertdata); 

        if ($sql){
            echo "<script type='text/javascript'> window.location='invoice.php';</script>";
        } else {
            echo "<script type='text/javascript'>; alert('Pesanan  gagal disimpan');window.location='transaksi.php';</script>";
        }
}
?>