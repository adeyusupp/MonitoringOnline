<?php
  if(isset($_POST['save'])){
    //deklarasi variabel
    $proker = $_POST['nama-proker'];
    $bidang = $_POST['bidang'];
    $divisi = $_POST['divisi'];
    $deskripsi = $_POST['deskripsi'];
    $tujuan = $_POST['tujuan'];
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $tahun = $_POST['tahun'];
    $p_penilaian = 0;
    

    //insert data ke tabel list-proker
    $SQL = $conn->prepare('INSERT INTO list_proker(nama_proker,deskripsi,tujuan,pj,npm_pj,waktu,tempat,bidang,divisi,p_penilaian,tahun) VALUES(?,?,?,?,?,?,?,?)');
      $SQL->bind_param('ssssssss',$proker,$deskripsi,$tujuan,$nama,$npm,$waktu,$tempat,$bidang,$p_penilaian,$tahun);
      $SQL->execute();

      //cek error
      if(!$SQL){
        echo "$conn->error";
            echo '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data gagal disimpan.
              </div>
            ';
      }else{
         echo '
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Data berhasil disimpan.
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
                    <input name="nama-proker" type="text" class="form-control" placeholder="Nama Proker" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Proker Bidang</label>
                  <div class="col-sm-10">
                    <select name="bidang" class="form-control select2" style="width: 100%;" required>
                      <option value="" selected disabled>Bidang</option>
                      <option value="Bidang 1">Bidang 1</option>
                      <option value="Bidang 2">Bidang 2</option>
                      <option value="Bidang 3">Bidang 3</option>
                      <option value="Bidang 4">Bidang 4</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Departemen/Biro</label>
                  <div class="col-sm-10">
                    <select name="divisi" class="form-control select2" style="width: 100%;" required>
                      <option value="" selected disabled>Dep/Biro</option>
                      <option value="akademik">Departemen Akademik</option>
                      <option value="psdm">Departemen PSDM</option>
                      <option value="kewirausahaan">Departemen Kewirausahaan</option>
                      <option value="kesma">Departemen Kesejahteraan Mahasiswa</option>
                      <option value="pengmas">Departemen Pengabdian Masyarakat</option>
                      <option value="olahraga">Departemen Olahraga</option>
                      <option value="senbud">Departemen Seni Budaya</option>
                      <option value="media">Biro Media</option>
                      <option value="humas">Biro Hubungan Masyarakat</option>
                      <option value="pti">Biro Pengembangan Teknologi Informasi</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Deskripsi Proker</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" rows="8" placeholder="Deskipsi" required></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tujuan</label>
                  <div class="col-sm-10">
                    <textarea name="tujuan" class="form-control" rows="3" placeholder="Tujuan" required></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Waktu Pelaksanaan <b style="color: red;">*</b></label>
                  <div class="col-sm-10">
                    <input name="waktu" type="text" class="form-control" placeholder="Waktu Pelaksanaan" required>
                    <p class="help-block">Contoh : April 2017</p>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Pelaksanaan <b style="color: red;">*</b> </label>
                  <div class="col-sm-10">
                    <input name="tempat" type="text" class="form-control" placeholder="Tempat Pelaksanaan" required>
                    <p class="help-block">Contoh : Kampus J1 Universitas Gunadarma</p>
                  </div>  
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun </label>
                  <div class="col-sm-10">
                    <input name="tahun" type="text" class="form-control" placeholder="Tahun" required>
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
                <input name="save" type="submit" class="btn btn-info pull-left" value="Simpan">
              </div>
              <!-- /.box-footer -->
            </form>