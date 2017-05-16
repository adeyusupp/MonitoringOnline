<?php 
$lvl_check = $_SESSION['lvl'];

if ($lvl_check != 2){
	header("location: ../login.php");
}
?>