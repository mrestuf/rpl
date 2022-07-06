<?php
session_start();
include '../lib/koneksi.php';

if (!isset($_SESSION['login'])) {
    header("A:/RPL/index.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:/RPL/index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                                <img src="/RPL/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/RPL/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Admin
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
                        <p>Admin</p>
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
                            <li><a href="transaksi.php"><i class="fa fa-circle-o"></i> Transaksi </a></li>
                            <li><a href="laporan.php"><i class="fa fa-circle-o"></i> Laporan Penjualan </a></li>
                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span> Data-Data</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="user.php"><i class="fa fa-circle-o"></i> User </a></li>
                            <li><a href="pegawai.php"><i class="fa fa-circle-o"></i> Pegawai </a></li>
                            <li><a href="barang.php"><i class="fa fa-circle-o"></i> Barang </a></li>
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
                <?php
                        include "../lib/koneksi.php";
                        if (isset($_POST['submit1'])) {
                            //Mengambil data
                            $tglawal = $_POST['tglawal'];
                            $tglakhir = $_POST['tglakhir'];
                            // $nip = $_POST['nip'];
                        }
                        ?>
                    <div class="box-header">
                        <h3 class="box-title">Laporan Periode <?php echo $tglawal, " sampai ", $tglakhir; ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        
                        <h1 style="margin-left:10px"></h1>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>No.</td>
                                <td>Invoice</td>
                                <td>Tanggal</td>
                                <td>Kasir</td>
                                <td>Total</td>
                            </tr>
                            <?php
                            $n = 1;
                            $totalsemua = 0;
                            $query = mysqli_query($koneksi, 'SELECT * FROM tbtransaksi WHERE tgl_transaksi BETWEEN "' . $tglawal . '" AND "' . $tglakhir . '"');
                            while ($data = mysqli_fetch_array($query)) {
                                $notransaksi = $data['no_transaksi'];
                                $tgl = $data['tgl_transaksi'];
                                $nip = $data['nip'];
                                $total = $data['total'];
                                $totalsemua += $total;
                            ?>
                                <tr>
                                    <td><?php echo $n++; ?></td>
                                    <td><?php echo $notransaksi; ?></td>
                                    <td><?php echo $tgl; ?></td>
                                    <td><?php echo $nip; ?></td>
                                    <td><?php echo "Rp. ", number_format($total, 0, ",", "."); ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4">Total</td>
                                <td> <?php echo "Rp. ", number_format($totalsemua, 0, ",", "."); ?></td>
                            </tr>
                        </table>
                        <!-- <button onclick="display()">Click to Print</button> -->
                        <script>
                            window.print();
                        </script>

</body>
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