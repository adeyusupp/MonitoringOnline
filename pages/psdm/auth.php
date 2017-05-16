<?php 
$lvl_check = $_SESSION['lvl'];
if ($lvl_check != 0){
	header("location: ../login.php");
}
?>