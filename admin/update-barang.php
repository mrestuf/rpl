<?php 
  include('../lib/template.php');
  include('../lib/koneksi.php');
  
  $kode_barang        = $_POST['kode_barang'];
  $nama_barang = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $satuan_brg = $_POST['satuan_brg'];
  $harga_barang = $_POST['harga_barang'];

  //query update data ke dalam database berdasarkan ID
  $query = "UPDATE tbbarang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', stok = '$stok', satuan_brg = '$satuan_brg', harga_barang = $harga_barang WHERE kode_barang = '$kode_barang'";
  
  //kondisi pengecekan apakah data berhasil diupdate atau tidak
  if($koneksi->query($query)) {
      //redirect ke halaman index.php 
      header("Location:/RPL/admin/barang.php");
  } else {
      //pesan error gagal update data
      echo "Data Gagal Diupate!";
  }
  ?>