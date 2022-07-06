<?php 
  include('../lib/koneksi.php');

  $kode_barang = $_GET['kode_barang'];

  $query = "DELETE FROM tbbarang WHERE kode_barang = '$kode_barang'";

  if($koneksi->query($query)){
    header("Location:/RPL/admin/barang.php");
  }
  else{
      echo "Data Gagal Dihapus";
  }