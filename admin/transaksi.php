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
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/RPL/admin/dist/img/user2-160x160.jpg" class="img-circle"
                                        alt="User Image">

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
            <section class="sidebar" style="background-color:lightgrey">
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
                <div class="box-header">
                        <h3 class="box-title">Transaksi</h3>
                    </div>
                <table class="table table-bordered table-hover">
        <tr>
            <td>No.</td>
            <td>NAMA PRODUK</td>
            <td>HARGA</td>
            <td>QTY</td>
            <td>SATUAN</td>
            <td>SUBTOTAL</td>
            <td>AKSI</td>
        </tr>
        <?php
    $n=1;
    $total =0;
    $query="SELECT no_transaksi FROM tbtransaksi";
    $cek=mysqli_query($koneksi,$query);
    if(!$cek){
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }   
    if (mysqli_num_rows($cek)!=0){
        //query ambil data terakhir
        $querymax="SELECT no_transaksi FROM tbtransaksi ORDER BY no_transaksi DESC LIMIT 1";
        $sqlmax=mysqli_query($koneksi,$querymax);

        while ($idmax=mysqli_fetch_assoc($sqlmax)){
            $iddtl=$idmax['no_transaksi'];
            $nomor=(int) substr($iddtl, 3, 3); //ambil dari urutan ke 1 sebanyak 2
            $nomor=$nomor+1;
            $no_transaksi="TRA".sprintf("%03s",$nomor);
        }
    } else {
        $no_transaksi="TRA001";
    }?>
        <h1 style="margin-left: 15px; margin-bottom: 10px"><?php echo $no_transaksi?></h1>

        <div class="row-ml-4" style="margin-left: 15px; margin-bottom: 10px">
                <a class="btn btn-default" href="hal_pilihproduk.php">Cari Barang</a>
                </div>
        <?php
    $query1 = mysqli_query($koneksi, 'SELECT * FROM tbdetail JOIN tbbarang on tbdetail.kode_barang=tbbarang.kode_barang where tbdetail.no_transaksi="'.$no_transaksi.'"');
    while ($data = mysqli_fetch_array($query1)) {
        $namabarang=$data['nama_barang'];
        $harga=$data['harga_barang'];
        $id = $data['kode_barang'];
        $satuan = $data['satuan_brg'];
        $qty = $data['qty'];
        $stok = $data['stok'];
        
    ?>

        <tr>
            <td><?php echo $n++; ?></td>
            <td><?php echo $namabarang; ?></td>
            <td><?php echo "Rp. ",number_format($harga,0,",",".");?></td>
            <td>
                <form action="update.php" method="POST">
                    <input type="number" name=qty value=<?php echo $qty; ?> min="1" max="<?php echo $stok;?>">
                    <input type="hidden" name=id value=<?php echo $id; ?>>
                    <input type="hidden" name=harga value=<?php echo $harga; ?>>
                    <input type="hidden" name=iddetail value=<?php echo $data['id_detail']; ?>>
                    <!-- <a href="update.php?id=<?php echo $id; ?>">Up</a> -->
                    <input type="submit" name="submit" value="UPDATE">
                </form>
            </td>
            <td><?php echo $satuan; ?></td>
            <td><?php echo "Rp. ",number_format($data['subtotal'],0,",",".");?></td>
            <td><a href="delete.php?id=<?php echo $data['id_detail']; ?>">Delete</a></td>
            <?php
        $total += $data['subtotal'];
        ?>
        </tr>

        <?php } ?>
    </table>

    <form action="simpan.php" method="POST">
        <div class="row">
        <div class="form-group col-md-2" style="margin-left: 15px; margin-bottom: 10px">
        <label>Kode Pegawai</label>
            <select class="form-control" name="nip">
                <?php
        $query2 = mysqli_query($koneksi, 'SELECT * FROM tbpegawai');
        while ($data1 = mysqli_fetch_array($query2)) {
            $nip = $data1['nip'];
    ?>
                <option value="<?php echo $nip; ?>"><?php echo $nip; ?></option>
                <?php } ?>
            </select>
            </div>
            </div>
            <div class="form-group">
                <input type="hidden" name=no_transaksi value=<?php echo $no_transaksi; ?>>
        <h2 style="margin-left: 15px; margin-bottom: 10px">Total : <?php echo "Rp. ",number_format($total,0,",","."); ?></h2>
        </div>
        <div class="form-group" style="margin-left: 15px; margin-bottom: 10px">
        <input type="hidden" id="a" name=total value=<?php echo $total; ?> onkeyup="sum();">
        <label>Bayar : <input type="text" class="form-control" name=bayar id="b" onkeyup="sum();"></label>
        </div>
        <div class="form-group" style="margin-left: 15px; margin-bottom: 10px">
        <label>Kembalian : <input type="text" class="form-control" name=kembalian id="txt3"> </label>
        </div>
        <script>
            function sum() {
                var txtFirstNumberValue = document.getElementById('a').value;
                var txtSecondNumberValue = document.getElementById('b').value;
                var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('txt3').value = -result;
                }
            }
        </script>
        <div class="form-group" style="margin-left: 15px; padding-bottom: 10px">
        <input type="submit" class="btn btn-primary" name="submit1" value="Simpan Payment">

        <a class="btn btn-danger" href="hapusTransaksi.php?id=<?php echo $no_transaksi; ?>">Hapus Transaksi</a>
        </div>
    </form>
  
    <!-- <a href="simpan.php?id=<?php echo $no_transaksi; ?>">Simpan Payment</a> -->
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