<?php
session_start();
include "lib/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];
if($op=="in"){
    $sql = mysqli_query($koneksi,'SELECT * FROM user WHERE username="'.$username.'" AND password="'.$password.'"');
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysqli_fetch_array($sql);
        $_SESSION['username'] = $qry['username'];
        $_SESSION['nama'] = $qry['nama'];
        $_SESSION['hakakses'] = $qry['hakakses'];
        if($qry['hakakses']=="ADMIN"){
            header("location:/rpl/admin/user.php");
        }
        else if($qry['hakakses']=="PEGAWAI"){
            header("location:/rpl/pegawai/transaksi.php");
        }
    }else{
        ?>
        <script language="JavaScript">
            alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
            document.location='index.php';
        </script>
        <?php
    }
}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['hakakses']);
    header("location:index.php");
}
?>