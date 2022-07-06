<?php
session_start();
include '../lib/koneksi.php';

if(!isset($_SESSION['login'])){
    header("A:/RPL/index.php");
}

if(isset($_POST['logout'])){
    session_destroy();
    header("Location:/RPL/index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pegawai</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/RPL/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/RPL/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/RPL/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/RPL/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/RPL/lib/style.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-puRPLe sidebar-mini">
    <div class="wrapper">

        <header class="main-header" style="background-color:silver">
            <!-- Logo -->
            <a href="/RPL/index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PoS</b>K</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/RPL/admin/dist/img/user2-160x160.jpg" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">Pegawai</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/RPL/admin/dist/img/user2-160x160.jpg" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        Pegawai
                                        <small>Member since Nov. 2022</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <form action="" method="POST">
                                        <button class="btn btn-default btn-flat" name="logout">Sign out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar" style="background-color:silver">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="background-color :lightgrey">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/RPL/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Pegawai</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Transaksi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="menu-admin.php"><i class="fa fa-circle-o"></i> Transaksi </a></li>
                            <li><a href="meja-admin.php"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Penjualan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <?php
        include "../lib/koneksi.php";
        $no_transaksi = $_GET['id'];

    //panggil data
    $query1 = mysqli_query($koneksi, 'SELECT * FROM tbtransaksi JOIN tbpegawai on tbtransaksi.nip=tbpegawai.nip where tbtransaksi.no_transaksi="'.$no_transaksi.'"');
    while ($data = mysqli_fetch_array($query1)) {
        $nip = $data['nip'];
        $nama =  $data['nama_pegawai'];
        $tgl = $data['tgl_transaksi'];
        $total = $data['total'];
    }
    ?>
    <h3 style="margin-left:10px">No. invoice : <?php echo $no_transaksi; ?></h3>
    <h4 style="margin-left:10px">Tanggal Transaksi : <?php echo $tgl; ?> </h4>
    <h4 style="margin-left:10px">Kasir : <?php echo $nama; ?></h4>
    <table class="table table-bordered table-hover">
        <tr>
            <td>No.</td>
            <td>NAMA PRODUK</td>
            <td>HARGA</td>
            <td>QTY</td>
            <td>SUBTOTAL</td>
        </tr>
    <?php
    $n = 1;
    $query2 = mysqli_query($koneksi, 'SELECT * FROM tbdetail JOIN tbbarang on tbdetail.kode_barang=tbbarang.kode_barang where tbdetail.no_transaksi="'.$no_transaksi.'"');
    while ($data1 = mysqli_fetch_array($query2)) {
        $namabarang=$data1['nama_barang'];
        $harga=$data1['harga_barang'];
        $id = $data1['kode_barang'];
        $satuan = $data1['satuan_brg'];
        $qty = $data1['qty'];
    ?>
    <tr>
            <td><?php echo $n++; ?></td>
            <td><?php echo $namabarang; ?></td>
            <td><?php echo "Rp. ",number_format($harga,0,",",".");?></td>
            <td><?php echo "x",$qty," ", $satuan;?></td>
            <td><?php echo "Rp. ",number_format($data1['subtotal'],0,",",".");?></td>
    </tr>
    <?php } ?>
    </table>
    <h4 style="margin-top:20px; margin-bottom:20px; margin-left:10px">Total : <?php echo "Rp. ",number_format($total,0,",","."); ?></h4>
    <a class="btn btn-default btn-block" href="laporan.php" style="margin-bottom:10px">Kembali</a>
	
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">PoSK</a>.</strong> All rights
        reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="/RPL/admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/RPL/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="/RPL/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/RPL/admin/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/RPL/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/RPL/admin/dist/js/demo.js"></script>
</body>

</html>