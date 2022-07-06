<?php
session_start();
include '../lib/koneksi.php';
//get data dari form
$kode_barang      = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];
$satuan_brg = $_POST['satuan_brg'];
$harga_barang = $_POST['harga_barang'];

//query insert data ke dalam database
$query = "INSERT INTO tbbarang (kode_barang, nama_barang, stok, satuan_brg, harga_barang) VALUES ('$kode_barang', '$nama_barang', $stok, '$satuan_brg', $harga_barang)";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($koneksi->query($query)) {

    //redirect ke halaman index.php 
    echo "<script type='text/javascript'>alert('Data Barang Berhasil Disimpan');location='/RPL/admin/barang.php';</script>";

} else {

    //pesan error gagal insert data
    echo "<script type='text/javascript'>alert('Data Barang Gagal Disimpan');location='/RPL/admin/input-barang.php';</script>";
}

?>