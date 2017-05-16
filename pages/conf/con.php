<?php 
	define('_HOST','localhost');
	define('_USR','root');
	define('_PW','');
	define('_DB','monitoring');

	$conn = new mysqli(_HOST,_USR,_PW,_DB);

	if($conn->connect_errno){
		die("EROR : -> ".$conn->connect_error);
	}
?>