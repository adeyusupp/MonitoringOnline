<?php
	include_once 'kon.php';

	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		 // Check username
		    $query = $conn->prepare('SELECT * FROM user WHERE username = ?');
		    $query->bind_param('s', $user);
		    $query->execute();
		    $result=$query->get_result();
		    $jumrow=$result->num_rows;
		    if($jumrow > 0){
		    	$row=$result->fetch_array();
		        $stat = $row['status'];
		        $user = $row['username'];
		        $hash = $row['hash'];
		        	if($stat == 0){
		        		$verif = password_verify($pass, $hash);
		        			if($verif == 1){
		        				echo 'Login Berhasil <br> Selamat Datang '.$user.' ';
		        			}else{
		        				echo 'Password Salah';
		        			}
		        	}else{
		        		echo 'Akun Belum Di Aktifasi Oleh Pihak MK';
		        	}
		    }else {
		    	echo 'Username tidak ada';
		    }
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 </head>
 <body>
 	<form action="" method="POST">
 		<p>Username : <input type="text" name="user"></p>
 		<p>Password : <input type="password" name="pass"></p>
 		<p><input type="submit" value="GO" name="login"></p>
 	</form>
 </body>
 </html>
