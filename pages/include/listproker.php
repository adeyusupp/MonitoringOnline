<div class="box-body">
  <table id="example1" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Proker</th>
        <th>Tujuan</th>
        <th>waktu</th>
        <th>Tempat</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      $query = $conn->prepare('SELECT * FROM list_proker WHERE npm_pj = ?');
          $query->bind_param('s', $npm);
          $query->execute();
          $result=$query->get_result();
          $jumrow=$result->num_rows;
          $no = 1;
            if($jumrow > 0){
              while($row=$result->fetch_array()){
              $id = $row['id_proker'];
              $namaproker = $row['nama_proker'];
              $tujuan = $row['tujuan'];
              $waktu = $row['waktu'];
              $tempat = $row['tempat']; 
               echo '
              <tr>
                <td>'.$no++.'</td>
                <td>'.$namaproker.'</td>
                <td>'.$tujuan.'</td>
                <td>'.$waktu.'</td>
                <td>'.$tempat.'</td>
                <td align="center">
                <a href="prokeredit.php?id='.$id.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"> Edit</i></a>
                <a href="javascript:delete_id(' .$id . ')"class="btn btn-danger btn-xs"><i class="fa fa-times"> delete</i></a>
                </td>
              </tr>  
               ';
              }
            }
        ?>          
    </tbody>
  </table>
</div>