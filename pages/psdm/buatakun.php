<?php include ('../include/session.php'); 
	  include ('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo "$title"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">M O</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo "$title"; ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo "$nama"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo "$nama"; ?>
                  <small><?php echo "$status"; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../include/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo "$nama"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Akun</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo "$jumreq"; ?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="aktivasiakun.php">
                <i class="fa fa-circle-o"></i> Aktivasi Akun 
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right"><?php echo "$jumreq"; ?></span>
                  </span>
              </a>
            </li>
            <li class="active"><a href="buatakun.php"><i class="fa fa-circle-o"></i> Buat Akun</a></li>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Akun</li>
        <li class="active">Pendaftaran Akun Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pendaftaran Akun Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <?php
            if(isset($_POST['save'])){
              $nama = $_POST['nama'];
              $npm = $_POST['npm'];
              $bidang = $_POST['bidang'];
              $username = $_POST['username'];
              $pass = $_POST['password'];
              $lvl = $_POST['lvl'];
              $status = 1;
                  
              //hash password
              $options = ['cost ==> 10'];
              $hash = password_hash($pass, PASSWORD_BCRYPT, $options);

              //insert data ke tabel user
              $SQL = $conn->prepare('INSERT INTO user(nama,npm,bidang,username,hash,level,status) VALUES(?,?,?,?,?,?,?)');
                $SQL->bind_param('ssissii',$nama,$npm,$bidang,$username,$hash,$lvl,$status);
                $SQL->execute();

                //cek error
                if(!$SQL){
                  echo "$conn->error";
                      echo '
                          <div class="callout callout-danger">
                          <h4>Pendaftaran Gagal</h4>
                          <p>Maaf data gagal disimpan :( , silakan ulangi.</p>
                        </div>
                      ';
                     
                }else{
                   echo '
                          <div class="callout callout-success">
                          <h4>Pendaftaran berhasil!</h4>
                          <p>selamat data berhasil disimpan.</p>
                        </div>
                  ';
                  }
            }
           ?>
           <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">NPM</label>
                  <div class="col-sm-10">
                    <input name="npm" type="text" class="form-control" placeholder="NPM" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bidang</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" id="jurusan" name="bidang" required>
                    <option value="" selected disabled>Bidang</option>
                    <option value="1">Bidang 1</option>
                    <option value="2">Bidang 2</option>
                    <option value="3">Bidang 3</option>
                    <option value="4">Bidang 4</option>
                    <option value="0">-</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input name="username" type="text" class="form-control" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input name="password" type="text" class="form-control" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" id="lvl" name="lvl" required>
                    <option value="" selected disabled>Status</option>
                    <option value="1">Badan Pengurus Harian</option>
                    <option value="2">Ketua Departemen</option>
                  </select>
                  </div>
                </div>
                <div class="box-footer">
                  <input name="save" type="submit" class="btn btn-info btn-block btn-flat pull-left" value="Simpan">
                </div>
                
                  <!-- /.col -->
               </div> 
              </form>
            </div>
      </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.28.04.17
    </div>
    <strong>Copyright &copy; 2017 <a href="http://fikti.bem.gunadarma.ac.id/" target="_blank">BEM FIKTI Universitas Gunadarma</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Page script -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
