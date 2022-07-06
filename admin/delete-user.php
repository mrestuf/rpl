<?php 
  include('../lib/koneksi.php');

  $username = $_GET['username'];

  $query = "DELETE FROM user WHERE username = '$username'";

  if($koneksi->query($query)){
    header("Location:/RPL/admin/user.php");
  }
  else{
      echo "Data Gagal Dihapus";
  }