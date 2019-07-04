<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kelas </h3>
                  <?php if($_SESSION[level]!='kepala'){ ?>
                  <a class='pull-right btn btn-info btn-sm' href='index.php?view=kelas&act=tambah'>Tambahkan Data</a>
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Jumlah Siswa</th>
                        <?php if($_SESSION[level]!='kepala'){ ?>
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.kode_kelas, a.nama_kelas, b.nama_guru FROM rb_kelas a LEFT JOIN rb_guru b ON a.nip=b.nip 
                                             ORDER BY a.kode_kelas DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    $hitung = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where kode_kelas='$r[kode_kelas]'"));
                    echo "<tr><td>$no</td>
                              <td>$r[kode_kelas]</td>
                              <td>$r[nama_kelas]</td>
                              <td>$r[nama_guru]</td>
                              <td>$hitung Orang</td>";
                              if($_SESSION[level]!='kepala'){
                        echo "<td><center>
                                <a class='fa fa-fw fa-edit' title='Edit Data' href='?view=kelas&act=edit&id=$r[kode_kelas]'></a>
                                <a class='fa fa-fw fa-eraser' title='Delete Data' href='?view=kelas&hapus=$r[kode_kelas]'></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_kelas where kode_kelas='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=kelas';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_kelas SET kode_kelas = '$_POST[a]',
                                         nip = '$_POST[b]',
                                         nama_kelas = '$_POST[e]', 
                                         aktif = '$_POST[f]' where kode_kelas='$_POST[id]'");
      echo "<script>document.location='index.php?view=kelas';</script>";
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas a LEFT JOIN rb_guru b ON a.nip=b.nip 
                        
                                  where a.kode_kelas='$_GET[id]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Kelas</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[kode_kelas]'>

                    <div class='form-group'>
                    <label for=''>Kode Kelas</label>
                    <input type='text' class='form-control' name='a' value='$s[kode_kelas]'>
                    </div>
                    <div class='form-group'>
                    <label for=''>Wali Kelas</label>
                    <select class='form-control' name='b'> 
                    <option value='0' selected>- Pilih Wali Kelas -</option>"; 
                      $wali = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru");
                      while($a = mysqli_fetch_array($wali)){
                        if ($a[nip] == $s[nip]){
                          echo "<option value='$a[nip]' selected>$a[nama_guru]</option>";
                        }else{
                          echo "<option value='$a[nip]'>$a[nama_guru]</option>";
                        }
                      }
                    echo "</select>
                    </div>

                    
                    <div class='form-group'>
                    <label for=''>Nama Kelas</label>
                    <input type='text' class='form-control' name='e' value='$s[nama_kelas]'>
                    </div>

                    <div class='form-group'>
                    <label for=''>Aktif</label><br>";
                    if ($s[aktif]=='Ya'){
                      echo "<input type='radio' name='f' value='Ya' checked> Ya
                             <input type='radio' name='f' value='Tidak'> Tidak";
                  }else{
                      echo "<input type='radio' name='f' value='Ya'> Ya
                             <input type='radio' name='f' value='Tidak' checked> Tidak";
                  }
                   echo" </div>

                    
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=kelas'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_kelas VALUES('$_POST[a]','$_POST[b]','$_POST[e]','$_POST[f]')");
        echo "<script>document.location='index.php?view=kelas';</script>";
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Kelas</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                    <div class='form-group'>
                    <label for=''>Kode Kelas</label>
                    <input type='text' class='form-control' name='a'>
                    </div>
                    <div class='form-group'>
                    <label for=''>Wali Kelas</label>
                    <select class='form-control' name='b'> 
                    <option value='0' selected>- Pilih Wali Kelas -</option>"; 
                      $wali = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru");
                      while($a = mysqli_fetch_array($wali)){
                          echo "<option value='$a[nip]'>$a[nama_guru]</option>";
                      }
                    echo "</select>
                    </div>


                    
                    <div class='form-group'>
                    <label for=''>Nama Kelas</label>
                    <input type='text' class='form-control' name='e'>
                    </div>
                    <div class='form-group'>
                    <label for=''>Aktif</label><br>
                    <input type='radio' name='f' value='Ya' checked> Ya
                     <input type='radio' name='f' value='Tidak'> Tidak 
                    </div>



                    
                
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=kelas'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>