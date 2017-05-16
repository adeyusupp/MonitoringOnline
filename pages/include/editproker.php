<?php
  $idproker = $_GET['id'];
  $query = $conn->prepare('SELECT * FROM list_proker WHERE npm_pj = ?');
  $query->bind_param('s', $npm);
  $query->execute();
  $result=$query->get_result();
  $jumrow=$result->num_rows;
      if($jumrow > 0){
        $row=$result->fetch_array();
        $namaproker = $row['nama_proker'];
        $bidang = $row['bidang'];
        $tujuan = $row['tujuan'];
        $deskripsi = $row['deskripsi'];
        $waktu = $row['waktu'];
        $tempat = $row['tempat']; 
        $tahun = $row['tahun']; 
        $divisi = $row['divisi']; 
      }

  if(isset($_POST['simpan'])){
    //deklarasi variabel
    $proker = $_POST['nama-proker'];
    $bidang = $_POST['bidang'];
    $deskripsi = $_POST['deskripsi'];
    $tujuan = $_POST['tujuan'];
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $divisi = $_POST['divisi'];
    $tahun = $_POST['tahun'];
    

    //update data tabel list-proker
    $sql = "UPDATE list_proker SET nama_proker='$proker', deskripsi='$deskripsi', tujuan='$tujuan', waktu='$waktu', tempat='$tempat', bidang='$bidang', divisi='$divisi',tahun='$tahun' WHERE id_proker='$idproker'";

    if (mysqli_query($conn, $sql)){
      echo "$conn->error";
      echo '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Data berhasil diupdate.
          </div>
      ';
      echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php\"/>";
    } else {
      echo '
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          Data gagal diupdate.
          </div>
      ';
    }
  }
 ?>
 <!-- Form Pengisian data proker -->
<form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Penanggung Jawab</label>
                  <div class="col-sm-10">
                    <input name="nama" type="text" class="form-control" value="<?php echo "$nama"; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">NPM</label>
                  <div class="col-sm-10">
                    <input name="npm" type="text" class="form-control" value="<?php echo "$npm"; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Proker</label>
                  <div class="col-sm-10">
                    <input name="nama-proker" type="text" class="form-control" value="<?php echo "$namaproker"; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Proker Bidang</label>
                  <div class="col-sm-10">
                    <select name="bidang" class="form-control select2" style="width: 100%;" id="bidang">
                      <option value="" selected disabled>Bidang</option>
                      <?php 
                        if ($bidang == "Bidang 1") {
                          echo '
                            <option selected value="Bidang 1">Bidang 1</option>
                            <option value="Bidang 2">Bidang 2</option>
                            <option value="Bidang 3">Bidang 3</option>
                            <option value="Bidang 4">Bidang 4</option>
                          ';
                        }elseif ($bidang == "Bidang 2") {
                          echo '
                            <option value="Bidang 1">Bidang 1</option>
                            <option selected value="Bidang 2">Bidang 2</option>
                            <option value="Bidang 3">Bidang 3</option>
                            <option value="Bidang 4">Bidang 4</option>
                          ';
                        }elseif ($bidang == "Bidang 3") {
                          echo '
                            <option value="Bidang 1">Bidang 1</option>
                            <option value="Bidang 2">Bidang 2</option>
                            <option selected value="Bidang 3">Bidang 3</option>
                            <option value="Bidang 4">Bidang 4</option>
                          ';
                        }elseif ($bidang == "Bidang 4") {
                          echo '
                            <option value="Bidang 1">Bidang 1</option>
                            <option value="Bidang 2">Bidang 2</option>
                            <option value="Bidang 3">Bidang 3</option>
                            <option selected value="Bidang 4">Bidang 4</option>
                          ';
                        }else{
                          echo '
                            <option value="Bidang 1">Bidang 1</option>
                            <option value="Bidang 2">Bidang 2</option>
                            <option value="Bidang 3">Bidang 3</option>
                            <option value="Bidang 4">Bidang 4</option>
                          ';
                        }
                       ?>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Departemen/Biro</label>
                  <div class="col-sm-10">
                    <select name="divisi" class="form-control select2" style="width: 100%;">
                      <option value="" selected disabled>Dep/Biro</option>
                      <?php 
                        if ($divisi == "akademik") {
                          echo '
                            <option value="akademik" selected>Departemen Akademik</option>
                            <option value="psdm">Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "psdm") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" selected>Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "kewirausahaan") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan" selected>Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "kesma") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma" selected>Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "pengmas") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas" selected>Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "olahraga") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga" selected>Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "senbud") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud" selected>Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "media") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media" selected>Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "humas") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas" selected>Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }elseif ($divisi == "pti") {
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti" selected>Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }else{
                          echo '
                            <option value="akademik" >Departemen Akademik</option>
                            <option value="psdm" >Departemen PSDM</option>
                            <option value="kewirausahaan">Departemen Kewirausahaan</option>
                            <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                            <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                            <option value="olahraga">Departemen Olahraga</option>
                            <option value="senbud">Departemen Seni Budaya</option>
                            <option value="media">Biro Media</option>
                            <option value="humas">Biro Hubungan Masyarakat</option>
                            <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                          ';
                        }
                       ?>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Deskripsi Proker</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" rows="8" placeholder="Deskipsi"><?php echo "$deskripsi"; ?></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tujuan</label>
                  <div class="col-sm-10">
                    <textarea name="tujuan" class="form-control" rows="3" placeholder="Tujuan"><?php echo "$tujuan"; ?></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Waktu Pelaksanaan <b style="color: red;">*</b></label>
                  <div class="col-sm-10">
                    <input name="waktu" type="text" class="form-control" placeholder="Waktu Pelaksanaan" value="<?php echo "$waktu"; ?>">
                    <p class="help-block">Contoh : April 2017</p>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Pelaksanaan <b style="color: red;">*</b> </label>
                  <div class="col-sm-10">
                    <input name="tempat" type="text" class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo "$tempat"; ?>">
                    <p class="help-block">Contoh : Kampus J1 Universitas Gunadarma</p>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun <b style="color: red;">*</b> </label>
                  <div class="col-sm-10">
                    <input name="tahun" type="text" class="form-control" placeholder="Tahun" value="<?php echo "$tahun"; ?>">
                  </div>  
                </div><br>
                <div class="form-group">
                  <div class="pull-left">
                    <label class="col-md-12 control-label"><b style="color: red;">*</b> Isikan dengan strip "-" tanpa tanda kutip jika ingin anda kosongkan.</label>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input name="simpan" type="submit" class="btn btn-info pull-left" value="Simpan">
              </div>
              <!-- /.box-footer -->
            </form>