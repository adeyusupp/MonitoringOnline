<?php
	include_once ('conf/con.php');
	session_start();
	if(isset($_POST['login'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];

		 // Check username
		    $query = $conn->prepare('SELECT * FROM user WHERE username = ?');
		    $query->bind_param('s', $user);
		    $query->execute();
		    $result=$query->get_result();
		    $jumrow=$result->num_rows;
		    if($jumrow > 0){
		    	$row=$result->fetch_array();
		        $hash = $row['hash'];
		        $name = $row['nama'];
		        $lvl = $row['level'];
		        $stat = $row['status'];
		        	$verif = password_verify($pass, $hash);
		        	if($verif == 1){
		        		if ($stat == 0) {
		        			echo '
				        		<div class="alert alert-warning">
			                		Akun anda belum di verifikasi, silakan hubungi admin atau ketua departemen anda !
			                	</div>
		        			';
		        		}else{
		        			if ($lvl == 0) {
		        				$_SESSION['username']=$user;
		        				$_SESSION['lvl']=$lvl;
		        				header('Location: psdm/index.php');
		        			}else if ($lvl == 1) {
		        				$_SESSION['username']=$user;
		        				$_SESSION['lvl']=$lvl;
		        				header('Location: mk/index.php');
		        			}else if ($lvl == 2) {
		        				$_SESSION['username']=$user;
		        				$_SESSION['lvl']=$lvl;
		        				header('Location: kadep/index.php');
		        			}else if ($lvl == 3) {
		        				$_SESSION['username']=$user;
		        				$_SESSION['lvl']=$lvl;
		        				header('Location: ketuplak/index.php');
		        			}
		        		}
		        	}else{
		        		echo '
		        		<div class="alert alert-danger">
	                		Password Salah
	                	</div>
		        		';
		        	}
		    }else {
		    	echo '
		        	<div class="alert alert-danger">
	                	Username Tidak Terdaftar
	                </div>
		        	';
		    }
	}
 ?>
	<form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login" name="login">
        </div>
        <!-- /.col -->
      </div>
    </form>