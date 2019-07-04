<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Semua Data Guru </h3>
                  <?php if($_SESSION[level]!='kepala'){ ?>
                  <a class='pull-right btn btn-info btn-sm' href='index.php?view=guru&act=tambahguru'>Tambahkan Data Guru</a>
                  
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telpon</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru ORDER BY nip DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    $tanggal = tgl_indo($r[tgl_posting]);
                    echo "<tr><td>$no</td>
                              <td>$r[nip]</td>
                              <td>$r[nama_guru]</td>
                              <td>$r[jenis_kelamin]</td>
                              <td>$r[hp]</td>";
                              if($_SESSION[level]!='kepala'){
                        echo "<td><center>
                                <a class='fa fa-fw fa-search' title='Lihat Detail' href='?view=guru&act=detailguru&id=$r[nip]'></a>
                                <a class='fa fa-fw fa-edit' title='Edit Data' href='?view=guru&act=editguru&id=$r[nip]'></a>
                                <a class='fa fa-fw fa-eraser' title='Delete Data' href='?view=guru&hapus=$r[nip]'></a>
                              </center></td>";
                              }else{
                                echo "<td><center>
                                <a class='btn btn-info btn-xs' title='Lihat Detail' href='?view=guru&act=detailguru&id=$r[nip]'><span class='glyphicon glyphicon-search'></span></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_guru where nip='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=guru';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='tambahguru'){
  if (isset($_POST[tambah])){
      $rtrw = explode('/',$_POST[al]);
      $rt = $rtrw[0];
      $rw = $rtrw[1];
      $dir_gambar = 'foto_pegawai/';
      $filename = basename($_FILES['ax']['name']);
      $filenamee = date("YmdHis").'-'.basename($_FILES['ax']['name']);
      $uploadfile = $dir_gambar . $filenamee;
      if ($filename != ''){      
        if (move_uploaded_file($_FILES['ax']['tmp_name'], $uploadfile)) {
          mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_guru VALUES('$_POST[aa]','$_POST[ab]','$_POST[zx]','$_POST[ac]','$_POST[af]','$_POST[ad]',
                           '$_POST[ae]','$_POST[ba]','$_POST[bv]',
                           '$_POST[ag]','$_POST[ak]','$_POST[ah]','$_POST[aj]',
                           '$_POST[aw]','$filenamee')");
        }
      }else{
          mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_guru VALUES('$_POST[aa]','$_POST[ab]','$_POST[zx]','$_POST[ac]','$_POST[af]','$_POST[ad]',
                           '$_POST[ae]','$_POST[ba]', 
                           '$_POST[ag]','$_POST[ak]','$_POST[ah]','$_POST[aj]',
                           '$_POST[aw]','')");
      }
      echo "<script>document.location='index.php?view=guru&act=detailguru&id=".$_POST[aa]."';</script>";
  }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Guru</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[nip]'>
                    <tr><th width='120px' scope='row'>Nip</th>      <td><input type='text' class='form-control' name='aa'></td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' name='ab'></td></tr>
                    <tr><th scope='row'>Kelas</th>                  <td><select class='form-control' name='zx'> 
                    <option value='0' selected>- Kode Kelas -</option>";
                    $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas");
                    while($a = mysqli_fetch_array($kelas)){
                      echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                    }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='ac'></td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>           <td><input type='text' class='form-control' name='ad'></td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>          <td><input type='text' class='form-control' name='ae'></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>          <td><select class='form-control' name='af'> 
                                                                          <option value='0' selected>- Pilih Jenis Kelamin -</option>
                                                                            <option value='Laki-Laki'>Laki-Laki</option>
                                                                            <option value='Perempuan'>Perempuan</option></select>
                                                                            </td></tr>
                    <tr><th scope='row'>Agama</th>                  <td><select class='form-control' name='ag'> 
                                                                          <option value='0' selected>- Pilih Agama -</option>
                                                                          <option value='Islam'>Islam</option>
                                                                          <option value='Kristen'>Kristen</option>
                                                                          <option value='Katolik'>Katolik</option>
                                                                          <option value='Hindu'>Hindu</option>
                                                                          <option value='Budha'>Budha</option>

                                                                            </select></td></tr>
                    <tr><th scope='row'>No Hp</th>                  <td><input type='text' class='form-control' name='ah'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>           <td><input type='text' class='form-control' name='aj'></td></tr>
                    <tr><th scope='row'>Alamat</th>                 <td><input type='text' class='form-control' name='ak'></td></tr>
                   
                    <tr><th scope='row'>Status Nikah</th>           < <td><select class='form-control' name='aw'> 
                                                                    <option value='0' selected>- Pilih Status Pernikahan -</option>
                                                                    <option value='Menikah'>Menikah</option>
                                                                    <option value='Belum Menikah'>Belum Menikah</option></select>
                                                                    </td></tr>
                    <tr><th scope='row'>Foto</th>             <td><div style='position:relative;''>
                                                                          <a class='btn btn-primary' href='javascript:;'>
                                                                            <span class='glyphicon glyphicon-search'></span> Browse..."; ?>
                                                                            <input type='file' class='files' name='ax' onchange='$("#upload-file-info").html($(this).val());'>
                                                                          <?php echo "</a> <span style='width:155px' class='label label-info' id='upload-file-info'></span>
                                                                        </div>
                    </td></tr>
                   
                   
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                   

                  </tbody>
                  </table>
                </div> 
                <div style='clear:both'></div>
                        <div class='box-footer'>
                          <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                          <a href='index.php?view=siswa'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                        </div> 
              </div>
            </form>
            </div>";
}elseif($_GET[act]=='editguru'){
  if (isset($_POST[update1])){
      $rtrw = explode('/',$_POST[al]);
      $rt = $rtrw[0];
      $rw = $rtrw[1];
      $dir_gambar = 'foto_pegawai/';
      $filename = basename($_FILES['ax']['name']);
      $filenamee = date("YmdHis").'-'.basename($_FILES['ax']['name']);
      $uploadfile = $dir_gambar . $filenamee;
      if ($filename != ''){      
        if (move_uploaded_file($_FILES['ax']['tmp_name'], $uploadfile)) {
          mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_guru SET 
                           nip          = '$_POST[aa]',
                           password     = '$_POST[ab]',
                           kode_kelas     = '$_POST[zx]',
                           nama_guru         = '$_POST[ac]',
                           tempat_lahir       = '$_POST[ad]',
                           tanggal_lahir = '$_POST[ae]',
                           jenis_kelamin       = '$_POST[af]',
                           agama           = '$_POST[ag]',
                           hp         = '$_POST[ah]',
                           email        = '$_POST[aj]',
                           alamat_jalan      = '$_POST[ak]',
                           status_pernikahan = '$_POST[aw]', 
                           foto = '$filenamee'
                           where nip='$_POST[id]'");
        }
      }else{
          mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_guru SET 
                           nip          = '$_POST[aa]',
                           password     = '$_POST[ab]',
                           kode_kelas     = '$_POST[zx]',
                           nama_guru         = '$_POST[ac]',
                           tempat_lahir       = '$_POST[ad]',
                           tanggal_lahir = '$_POST[ae]',
                           jenis_kelamin       = '$_POST[af]',
                           agama           = '$_POST[ag]',
                           hp         = '$_POST[ah]',
                           email        = '$_POST[aj]',
                           alamat_jalan      = '$_POST[ak]',
                           status_pernikahan = '$_POST[aw]'
                           where nip='$_POST[id]'");
      }
      echo "<script>document.location='index.php?view=guru&act=detailguru&id=".$_POST[id]."';</script>";
  }

    $detail = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru where nip='$_GET[id]'");
    $s = mysqli_fetch_array($detail);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Guru</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-7'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[nip]'>
                    
                    <tr><th style='background-color:#E7EAEC' width='160px' rowspan='25'>";
                        if (trim($s[foto])==''){
                          echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/no-image.jpg'>";
                        }else{
                          echo "<img class='img-thumbnail' style='width:155px' src='foto_pegawai/$s[foto]'>";
                        }
                        echo "</th>
                    </tr>
                    
                    <input type='hidden' name='id' value='$s[nip]'
                    <tr><th width='120px' scope='row'>Nip</th>      <td><input type='text' class='form-control' value='$s[nip]' name='aa'></td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' value='$s[password]' name='ab'></td></tr>
                    <tr><th scope='row'>Kelas</th>                  <td><select class='form-control' name='zx'> 
                    <option value='0' selected>- Kode Kelas -</option>";
                    $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas");
                    while($a = mysqli_fetch_array($kelas)){
                      echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                    }
                    echo "</select></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' value='$s[nama_guru]' name='ac'></td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>           <td><input type='text' class='form-control' value='$s[tempat_lahir]' name='ad'></td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>          <td><input type='text' class='form-control' value='$s[tanggal_lahir]' name='ae'></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>          <td><select class='form-control' name='af'> 
                                                                          <option value='0' selected>- Pilih Jenis Kelamin -</option> 
                                                                            <option value='Laki-Laki'>Laki-Laki</option>
                                                                            <option value='Perempuan'>Perempuan</option></select>
                                                                            </td></tr>
                    <tr><th scope='row'>Agama</th>                  <td><select class='form-control' name='ag'> 
                                                                          <option value='0' selected>- Pilih Agama -</option>
                                                                          <option value='Islam'>Islam</option>
                                                                          <option value='Kristen'>Kristen</option>
                                                                          <option value='Katolik'>Katolik</option>
                                                                          <option value='Hindu'>Hindu</option>
                                                                          <option value='Budha'>Budha</option>
                                                                          </select></td></tr>
                    <tr><th scope='row'>No Hp</th>                  <td><input type='text' class='form-control' value='$s[hp]' name='ah'></td></tr>
                  
                    <tr><th scope='row'>Alamat Email</th>           <td><input type='text' class='form-control' value='$s[email]' name='aj'></td></tr>
                    <tr><th scope='row'>Alamat</th>                 <td><input type='text' class='form-control' value='$s[alamat_jalan]' name='ak'></td></tr>
                   
                    <tr><th scope='row'>Status Nikah</th>           <td><select class='form-control' name='aw'> 
                                                                          <option value='0' selected>- Pilih Status Pernikahan -</option>
                                                                          <option value='Menikah'>Menikah</option>
                                                                          <option value='Belum Menikah'>Belum Menikah</option></select>
                                                                          </td></tr>
                    <tr><th scope='row'>Ganti Foto</th>             <td><div style='position:relative;''>
                                                                          <a class='btn btn-primary' href='javascript:;'>
                                                                            <span class='glyphicon glyphicon-search'></span> Browse..."; ?>
                                                                            <input type='file' class='files' name='ax' onchange='$("#upload-file-info").html($(this).val());'>
                                                                          <?php echo "</a> <span style='width:155px' class='label label-info' id='upload-file-info'></span>
                                                                        </div>
                    </td></tr>
                   
                  
                  </tbody>
                  </table>
                </div>

                <div class='col-md-5'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    

                  </tbody>
                  </table>
                </div> 
                <div style='clear:both'></div>
                        <div class='box-footer'>
                          <button type='submit' name='update1' class='btn btn-info'>Update</button>
                          <a href='index.php?view=siswa'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                        </div> 
              </div>
            </form>
            </div>";
}elseif($_GET[act]=='detailguru'){
    $detail = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *  FROM rb_guru where nip='$_GET[id]'");
    $s = mysqli_fetch_array($detail);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Guru</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-7'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[nip]'>
                    <tr><th style='background-color:#E7EAEC' width='160px' rowspan='25'>";
                        if (trim($s[foto])==''){
                          echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/no-image.jpg'>";
                        }else{
                          echo "<img class='img-thumbnail' style='width:155px' src='foto_pegawai/$s[foto]'>";
                        }
                      if($_SESSION[level]!='kepala'){
                        echo "<a href='index.php?view=guru&act=editguru&id=$_GET[id]' class='btn btn-success btn-block'>Edit Profile</a>";
                      }
                        echo "</th>
                    </tr>
                    
                   
                    <tr><th width='120px' scope='row'>Nip</th>      <td>$s[nip]</td></tr>
                    <tr><th scope='row'>Password</th>               <td>$s[password]</td></tr>
                    <tr><th scope='row'>Kode Kelas</th>               <td>$s[kode_kelas]</td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td>$s[nama_guru]</td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>           <td>$s[tempat_lahir]</td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>          <td>$s[tanggal_lahir]</td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>          <td>$s[jenis_kelamin]</td></tr>
                    <tr><th scope='row'>Agama</th>                  <td>$s[agama]</td></tr>
                    <tr><th scope='row'>No Hp</th>                  <td>$s[hp]</td></tr>
                    <tr><th scope='row'>Alamat Email</th>           <td>$s[email]</td></tr>
                    <tr><th scope='row'>Alamat</th>                 <td>$s[alamat_jalan]</td></tr>
                   
                    <tr><th scope='row'>Status Nikah</th>           <td>$s[status_pernikahan]</td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-5'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  
                   

                  </tbody>
                  </table>
                </div> 
              </div>
            </form>
            </div>";
}  
?>