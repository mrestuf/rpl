<?php
session_start();
include '../lib/koneksi.php';
//get data dari form
$nip      = $_POST['nip'];
$nama_pegawai = $_POST['nama_pegawai'];

//query insert data ke dalam database
$query = "INSERT INTO tbpegawai (nip, nama_pegawai) VALUES ('$nip', '$nama_pegawai')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($koneksi->query($query)) {

    //redirect ke halaman index.php 
    echo "<script type='text/javascript'>alert('Data Pegawai Berhasil Disimpan');location='/RPL/admin/pegawai.php';</script>";

} else {

    //pesan error gagal insert data
    echo "<script type='text/javascript'>alert('Data User Gagal Disimpan');location='/RPL/admin/input-pegawai.php';</script>";
}

?>