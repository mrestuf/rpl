<?php 
  include('../lib/template.php');
  include('../lib/koneksi.php');
  
  $nip        = $_POST['nip'];
  $nama_pegawai = $_POST['nama_pegawai'];

  //query update data ke dalam database berdasarkan ID
  $query = "UPDATE tbpegawai SET nip = '$nip', nama_pegawai = '$nama_pegawai' WHERE nip = '$nip'";
  
  //kondisi pengecekan apakah data berhasil diupdate atau tidak
  if($koneksi->query($query)) {
      //redirect ke halaman index.php 
      header("Location:/RPL/admin/pegawai.php");
  } else {
      //pesan error gagal update data
      echo "Data Gagal Diupate!";
  }
  ?>