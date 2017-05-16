<?php 
  if (isset($_POST['save'])) {
    $password = $_POST['password'];

    $options = ['cost ==> 10'];
    $hash = password_hash($password, PASSWORD_BCRYPT, $options);

    $sql = "UPDATE user SET hash='$hash' WHERE username='$username'";

    if (mysqli_query($conn, $sql)){
      echo "$conn->error";
      echo '
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Data berhasil disimpan.
          </div>
      ';
    } else {
      echo '
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          Data gagal disimpan.
          </div>
      ';
    }
  }
 ?>
<form role="form" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label>Username</label>
                  <input name="username" type="text" class="form-control" id="exampleInputEmail1" value="<?php  echo "$username"; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input name="save" type="submit" class="btn btn-primary" value="Simpan">
              </div>
</form>