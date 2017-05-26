<?php include ('../include/session.php'); ?>
<?php include ('auth.php'); ?>
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
        <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
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
        <div class="col-md-12">
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
                  $bidang2 = "Bidang $bidang";
                  $query = $conn->prepare('SELECT * FROM list_proker');
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
                            <a href="index.php?id='.$id.'" class="btn btn-info btn-block btn-flat pull-left"><i class="fa fa-pencil"> Buat Perencanaan</i></a>
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
                ?>
                <div class="col-md-5">
                  <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Proker</h3>
                </div>
                <div class="box-body">
                <form class="form-horizontal" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">PJ</label>
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
                      <label class="col-sm-2 control-label">Waktu</label>
                      <div class="col-sm-10">
                        <input name="waktu" type="text" class="form-control" placeholder="Waktu Pelaksanaan" value="<?php echo "$waktu"; ?>" disabled>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat</label>
                      <div class="col-sm-10">
                        <input name="tempat" type="text" class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo "$tempat"; ?>" disabled>
                      </div>  
                    </div>
                  </div>
                  <!-- /.box-body -->
                </form>
              </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Penilaian</h3>
                </div>  
                <div class="box-body">
                  <?php 
                    if (isset($_POST['save'])) {
                      $nilai = $_POST['nilai'];
                      $stat = "1";
                      $b = count($nilai);

                      for($i=1;$i<=$b;$i++){
                      $isi = $_POST['nilai'][''.$i.''];
                      $isi2 = $_POST['id_objektif'][''.$i.''];
                      $SQL = $conn->prepare("UPDATE objektif SET nilai = '$isi', stat = '$stat' WHERE id_objektif = '$isi2' ");
                      $SQL->execute();
                      }                
                    }
                  ?>
                  <form class="form-horizontal" method="POST">
                  <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Perencanaan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $stat = 0;
                    $no = 1;
                    $query = $conn->prepare('SELECT * FROM objektif WHERE id_proker = '.$idproker.' and stat= '.$stat.' ');
                    $query->execute();
                    $result=$query->get_result();
                    $jumrow=$result->num_rows;
                        if($jumrow > 0){
                          while ($row=$result->fetch_array()){
                            $pertanyaan = $row['pertanyaan'];
                            $id_objektif = $row['id_objektif'];
                            $x = $no++;
                            echo '
                            <input type="hidden" name="id_objektif['.$x.']" value="'.$id_objektif.'">
                              <tr>
                                <td>'.$x.'</td>
                                <td>'.$pertanyaan.'</td>
                                <td><input name="nilai['.$x.']" type="text" class="form-control" placeholder="Nilai"</td>
                              </tr>
                            ';
                          }       
                    }
                    ?>
                    </tbody>
                  </table>    
                  </div>
                  <div class="box-footer">
                      <input name="save" type="submit" class="btn btn-info pull-left" value="Simpan">
                  </div>
                  </form>       
                </div>
              </div>
            <?php
                }
              ?>
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