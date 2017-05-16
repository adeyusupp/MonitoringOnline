<?php 
$lvl_check = $_SESSION['lvl'];

if ($lvl_check != 3){
	header("location: ../login.php");
}
?>