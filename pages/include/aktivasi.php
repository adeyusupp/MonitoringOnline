<?php 
	if (isset($_GET['uname'])) {
		include ('../conf/con.php');
		$username = $_GET['uname'];
		$sql = $conn->prepare("UPDATE user SET status='1' WHERE username='$username'");
		$sql->execute();

		header('Location: ../psdm/aktivasiakun.php');
	}
	
 ?>
 <table id="example1" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Bidang</th>
        <th>Status</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      $query = $conn->prepare('SELECT * FROM user WHERE status = 0');
          $query->execute();
          $result=$query->get_result();
          $jumrow=$result->num_rows;
          $no = 1;
            if($jumrow > 0){
              while($row=$result->fetch_array()){
              $nama = $row['nama'];
	          $lvl = $row['level'];
	          $npm = $row['npm'];
	          $username = $row['username'];
	          $bidang = $row['bidang'];

	          if ($lvl == 0) {
	    	    $status = "Super Admin";
	           }else if ($lvl == 1) {
	    	    $status = "Manajemen Kontrol";
	           }else if ($lvl == 2) {
	    	    $status = "Ketua Departemen";
	           }else if ($lvl == 3) {
	    	    $status = "Ketua Pelaksana";
	           }
               echo '
              <tr>
                <td>'.$no++.'</td>
                <td>'.$username.'</td>
                <td>'.$nama.'</td>
                <td>'.$npm.'</td>
                <td>'.$bidang.'</td>
                <td>'.$status.'</td>
                <td align="center">
                <a href="../include/aktivasi.php?uname='.$username.'" class="btn btn-success"><i class="fa fa-unlock-alt"> Aktifkan</i></a>
                </td>
              </tr>  
               ';
              }
            }
        ?>          
    </tbody>
  </table>