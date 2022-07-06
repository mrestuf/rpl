<?php
session_start();
include '../lib/koneksi.php';
//get data dari form
$username      = $_POST['username'];
$password = $_POST['password'];
$hakakses = $_POST['hakakses'];

//query insert data ke dalam database
$query = "INSERT INTO user (username, password, hakakses) VALUES ('$username', '$password', '$hakakses')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($koneksi->query($query)) {

    //redirect ke halaman index.php 
    echo "<script type='text/javascript'>alert('Data User Berhasil Disimpan');location='/RPL/admin/user.php';</script>";

} else {

    //pesan error gagal insert data
    echo "<script type='text/javascript'>alert('Data User Gagal Disimpan');location='/RPL/admin/input-user.php';</script>";
}

?>