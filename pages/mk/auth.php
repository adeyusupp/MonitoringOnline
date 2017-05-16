<?php 
$lvl_check = $_SESSION['lvl'];

if ($lvl_check != 1){
	header("location: ../login.php");
}
?>