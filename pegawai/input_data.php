<html>
<?php
//koneksi database
include ('../lib/koneksi.php');
$id = $_GET['id'];

//Membuat No Transaksi
$query="SELECT no_transaksi FROM tbtransaksi";
$cek=mysqli_query($koneksi,$query);
if(!$cek){
    printf("Error: %s\n", mysqli_error($koneksi));
    exit();
}   
if (mysqli_num_rows($cek)!=0){
    //query ambil data terakhir
    $querymax="SELECT no_transaksi FROM tbtransaksi ORDER BY no_transaksi DESC LIMIT 1";
    $sqlmax=mysqli_query($koneksi,$querymax);

    while ($idmax=mysqli_fetch_assoc($sqlmax)){
        $iddtl=$idmax['no_transaksi'];
        $nomor=(int) substr($iddtl, 3, 3); //ambil dari urutan ke 1 sebanyak 2
        $nomor=$nomor+1;
        $no_transaksi="TRA".sprintf("%03s",$nomor);
    }
} else {
    $no_transaksi="TRA001";
}

//Membuat ID DETAIL
$query="SELECT id_detail FROM tbdetail";
    $cekid=mysqli_query($koneksi,$query);

    if(!$cekid){
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }   
    if (mysqli_num_rows($cekid)!=0){
        //query ambil data terakhir
        $querymax="SELECT id_detail FROM tbdetail ORDER BY id_detail DESC LIMIT 1";
        $sqlmax=mysqli_query($koneksi,$querymax);

        while ($idmax=mysqli_fetch_assoc($sqlmax)){
            $iddtl=$idmax['id_detail'];
            $nomor=(int) substr($iddtl, 3, 3); //ambil dari urutan ke 1 sebanyak 2
            $nomor=$nomor+1;
            $iddetail="DTL".sprintf("%03s",$nomor);
        }

    } else {
        $iddetail="DTL001";
    }
    //Panggil data $id
    $datapesan = mysqli_query($koneksi, 'SELECT * FROM tbbarang where kode_barang="'.$id.'"');
    while ($dp = mysqli_fetch_array($datapesan)){
    $harga = $dp['harga_barang'];
    }

    $qty = 1;
    $insertpesanan="INSERT INTO tbdetail(id_detail,no_transaksi, kode_barang, qty, subtotal) VALUES('$iddetail','$no_transaksi', '$id','$qty','$harga')";
    $sql=mysqli_query($koneksi,$insertpesanan);    
        if ($sql){
            echo "<script type='text/javascript'> alert('Data pesanan berhasil ditambahkan'); window.location='transaksi.php';</script>";
        } else {
            
            echo "<script type='text/javascript'> alert('Data pesanan gagal ditambahkan'); window.location='transaksi.php';</script>";
        }	
?>
</html>