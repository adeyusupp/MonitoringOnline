<?php
   include('../conf/conn.php');
   session_start();
   	
   	$title = "Monitoring Online";

    $user_check = $_SESSION['username'];
    $query = $conn->prepare('SELECT * FROM user WHERE username = ?');
    $query->bind_param('s', $user_check);
    $query->execute();
    $result=$query->get_result();
	  $jumrow=$result->num_rows;
	    if($jumrow > 0){
	    	$row=$result->fetch_array();
	        $nama = $row['nama'];
	        $lvl = $row['level'];
	        $npm = $row['npm'];
	        $username = $row['username'];
	        $bidang = $row['bidang'];
    	}
    	
    $query2 = $conn->prepare('SELECT * FROM list_proker WHERE npm_pj = ?');
    $query2->bind_param('s', $npm);
    $query2->execute();
    $result2=$query2->get_result();
    $jumprok=$result2->num_rows;  

    $query3 = $conn->prepare('SELECT * FROM user WHERE status = 0');
    $query3->execute();
    $result3=$query3->get_result();
	  $jumreq=$result3->num_rows;	

    $query4 = $conn->prepare('SELECT * FROM list_proker');
    $query4->execute();
    $result4=$query4->get_result();
    $jumallprok=$result3->num_rows;  

    if ($lvl == 0) {
    	$status = "Super Admin";
    }else if ($lvl == 1) {
    	$status = "Manajemen Kontrol";
    }else if ($lvl == 2) {
    	$status = "Ketua Departemen";
    }else if ($lvl == 3) {
    	$status = "Ketua Pelaksana";
    }

   	if(!isset($_SESSION['username'])){
      header("location: ../login.php");
   }
?>