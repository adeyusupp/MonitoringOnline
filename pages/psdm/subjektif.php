<?php include ('../include/session.php');
      include ('auth.php'); ?>
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
        <li class="treeview">
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
            <li><a href="buatakun.php"><i class="fa fa-circle-o"></i> Buat Akun</a></li>  
          </ul>
          <li class="active"><a href="subjektif.php"><i class="fa fa-pencil-square-o"></i> Penilaian Subjektif Proker</a></li>
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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Program Kerja</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Proker</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $query = $conn->prepare('SELECT * FROM list_proker WHERE  NOT EXISTS (SELECT * FROM subjektif WHERE subjektif.id_proker = list_proker.id_proker)');
                      $query->execute();
                      $result=$query->get_result();
                      $jumrow=$result->num_rows;
                      $no = 1;
                        if($jumrow > 0){
                          while($row=$result->fetch_array()){
                          $id = $row['id_proker'];
                          $namaproker = $row['nama_proker'];
                           echo '
                          <tr>
                            <td>'.$no++.'</td>
                            <td>'.$namaproker.'</td>
                            <td align="center">
                            <a href="subjektif.php?id='.$id.'" class="btn btn-info btn-block btn-flat pull-left"><i class="fa fa-pencil"> Nilai</i></a>
                            </td>
                          </tr>  
                           ';
                          }
                        }
                    ?>          
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div> 
        <div class="col-md-7">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Penilaian</h3>
            </div>
            <div class="box-body">
              <?php
                if (isset($_GET['id'])) {
                $idproker = $_GET['id'];
                $query = $conn->prepare('SELECT * FROM list_proker WHERE id_proker = ?');
                $query->bind_param('s', $idproker);
                $query->execute();
                $result=$query->get_result();
                $jumrow=$result->num_rows;
                    if($jumrow > 0){
                      $row=$result->fetch_array();
                      $pj = $row['pj'];
                      $pjnpm = $row['npm_pj'];
                      $namaproker = $row['nama_proker'];
                      $bidang = $row['bidang'];
                      $tujuan = $row['tujuan'];
                      $deskripsi = $row['deskripsi'];
                      $waktu = $row['waktu'];
                      $tempat = $row['tempat']; 
                    }
                }else{
                  $pj = "-";
                  $pjnpm = "-";
                  $namaproker = "-";
                  $bidang = "-";
                  $tujuan = "-";
                  $deskripsi = "-";
                  $waktu = "-";
                  $tempat = "-";
                }

                  if(isset($_POST['simpan'])){
                    $nilai = $_POST['nilai'];

                    $SQL = $conn->prepare('INSERT INTO subjektif(id_proker,nilai) VALUES(?,?)');
                      $SQL->bind_param('ii',$idproker,$nilai);
                      $SQL->execute();

                      //cek error
                      if(!$SQL){
                        echo "$conn->error";
                            echo '
                                <div class="callout callout-danger">
                                <h4>gagal!</h4>
                                <p>Data Gagal Disimpan :( , silakan ulangi.</p>
                              </div>
                            ';
                           
                      }else{
                          echo '
                           <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            Data berhasil disimpan.
                          </div>';
                          echo "<meta http-equiv=\"refresh\" content=\"1;url=subjektif.php\"/>";
                        }
                  }
              ?>
            
            <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Penanggung Jawab</label>
                  <div class="col-sm-10">
                    <input name="nama" type="text" class="form-control" value="<?php echo "$pj"; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">NPM</label>
                  <div class="col-sm-10">
                    <input name="npm" type="text" class="form-control" value="<?php echo "$pjnpm"; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Proker</label>
                  <div class="col-sm-10">
                    <input name="nama-proker" type="text" class="form-control" value="<?php echo "$namaproker"; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Proker Bidang</label>
                  <div class="col-sm-10">
                    <input name="bidang" type="text" class="form-control" value="<?php echo "$bidang"; ?>" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Deskripsi Proker</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" rows="8" placeholder="Deskipsi" disabled><?php echo "$deskripsi"; ?></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tujuan</label>
                  <div class="col-sm-10">
                    <textarea name="tujuan" class="form-control" rows="3" placeholder="Tujuan" disabled><?php echo "$tujuan"; ?></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Waktu Pelaksanaan </label>
                  <div class="col-sm-10">
                    <input name="waktu" type="text" class="form-control" placeholder="Waktu Pelaksanaan" value="<?php echo "$waktu"; ?>" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Pelaksanaan </label>
                  <div class="col-sm-10">
                    <input name="tempat" type="text" class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo "$tempat"; ?>" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nilai </label>
                  <div class="col-sm-10">
                    <input name="nilai" type="text" class="form-control" placeholder="Nilai" required>
                    <p class="help-block">Berikan nilai 1-100</p>
                  </div>  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input name="simpan" type="submit" class="btn btn-info pull-left" value="Simpan">
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
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
<script>
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