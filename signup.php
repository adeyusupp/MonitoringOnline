<?php
	include_once 'config/kon.php';
	if(isset($_POST['save'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$lvl = 0;

		//hash password
		$options = ['cost ==> 10'];
		$hash = password_hash($pass, PASSWORD_BCRYPT, $options);

		//insert data ke tabel user
		$SQL = $conn->prepare('INSERT INTO user(username,password,level) VALUES(?,?,?)');
	    $SQL->bind_param('sss',$user,$hash,$lvl);
	    $SQL->execute();

	  	//cek error
	    if(!$SQL){
	   	echo $conn->error;
	  	}
	}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sign Up</title>
 </head>
 <body>
 	<form action="" method="POST">
 		<p>Username : <input type="text" name="user"></p>
 		<p>Password : <input type="password" name="pass"></p>
 		<p><input type="submit" value="GO" name="save"></p>
 	</form>
 </body>
 </html>
