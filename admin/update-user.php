<?php 
  include('../lib/template.php');
  include('../lib/koneksi.php');
  
  $username        = $_POST['username'];
  $password = $_POST['password'];
  $hakakses = $_POST['hakakses'];

  //query update data ke dalam database berdasarkan ID
  $query = "UPDATE user SET username = '$username', password = '$password', hakakses = '$hakakses' WHERE username = '$username'";
  
  //kondisi pengecekan apakah data berhasil diupdate atau tidak
  if($koneksi->query($query)) {
      //redirect ke halaman index.php 
      header("Location:/RPL/admin/user.php");
  } else {
      //pesan error gagal update data
      echo "Data Gagal Diupate!";
  }
  ?>