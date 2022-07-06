<?php 
  include('../lib/koneksi.php');

  $nip = $_GET['nip'];

  $query = "DELETE FROM tbpegawai WHERE nip = '$nip'";

  if($koneksi->query($query)){
    header("Location:/RPL/admin/pegawai.php");
  }
  else{
      echo "Data Gagal Dihapus";
  }