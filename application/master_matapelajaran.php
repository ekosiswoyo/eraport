<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Mata Pelajaran </h3>
                  <?php if($_SESSION[level]!='kepala'){ ?>
                  <a class='pull-right btn btn-info btn-sm' href='index.php?view=matapelajaran&act=tambah'>Tambahkan Data</a>
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Guru Pengampu</th>
                        <?php if($_SESSION[level]!='kepala'){ ?>
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_mata_pelajaran a 
                                                LEFT JOIN rb_guru c ON a.nip=c.nip");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[kode_pelajaran]</td>
                              <td>$r[namamatapelajaran]</td>
                              <td>$r[nama_guru]</td>
";
                              if($_SESSION[level]!='kepala'){
                        echo "<td><center>
                                <a class='fa fa-fw fa-search' title='Detail Data' href='?view=matapelajaran&act=detail&id=$r[kode_pelajaran]'></a>
                                <a class='fa fa-fw fa-edit' title='Edit Data' href='?view=matapelajaran&act=edit&id=$r[kode_pelajaran]'></a>
                                <a class='fa fa-fw fa-eraser' title='Delete Data' href='?view=matapelajaran&hapus=$r[kode_pelajaran]'></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_mata_pelajaran where kode_pelajaran='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=matapelajaran';</script>";
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
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_mata_pelajaran SET 
                                         kelompok_mata_pelajaran = '$_POST[b]',
                                         nip = '$_POST[d]',
                                         namamatapelajaran = '$_POST[f]',
                                         kompetensi_umum = '$_POST[i]',
                                         kompetensi_khusus = '$_POST[j]',
                                         aktif = '$_POST[m]' where kode_pelajaran='$_POST[id]'");
      echo "<script>document.location='index.php?view=matapelajaran';</script>";
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_mata_pelajaran where kode_pelajaran='$_GET[id]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Mata Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  
                    <input type='hidden' name='id' value='$s[kode_pelajaran]'>
                   

                    <div class='form-group'>
                    <label for=''>Kode Pelajaran</label>
                    <input type='text' class='form-control' name='a' value='$s[kode_pelajaran]' readonly> 
                    </div>
                    <div class='form-group'>
                    <label for=''>Nama Mapel</label>
                    <input type='text' class='form-control' name='f' value='$s[namamatapelajaran]'>
                    </div>
                    <div class='form-group'>
                    <label for=''>Guru Pengampu</label>
                    <select class='form-control' name='d'> 
                    <option value='0' selected>- Pilih Guru Pengampu -</option>"; 
                    $guru = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru");
                        while($a = mysqli_fetch_array($guru)){
                          if ($s[nip]==$a[nip]){
                              echo "<option value='$a[nip]' selected>$a[nama_guru]</option>";
                          }else{
                              echo "<option value='$a[nip]'>$a[nama_guru]</option>";
                          }
                        }
                    echo "</select>
                    </div>
                    <div class='form-group'>
                    <label for=''>Kompetensi Umum</label>
                    <input type='text' class='form-control' name='i' value='$s[kompetensi_umum]'>
                    </div>
                    <div class='form-group'>
                    <label for=''>Kompetensi Khusus</label>
                    <input type='text' class='form-control' name='j' value='$s[kompetensi_khusus]'>
                    </div>
                    
                    <div class='form-group'>
                    <label for=''>Kelompok</label>
                    <input type='text' class='form-control' name='b' value='$s[kelompok_mata_pelajaran]'>
                    </div>
                    <div class='form-group'>
                    <label for=''>Aktif</label>";
                        if ($s[aktif]=='Ya'){
                          echo "<input type='radio' name='m' value='Ya' checked> Ya
                                  <input type='radio' name='m' value='Tidak'> Tidak";
                      }else{
                          echo "<input type='radio' name='m' value='Ya'> Ya
                                  <input type='radio' name='m' value='Tidak' checked> Tidak";
                      }
                  echo "</div>


                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=matapelajaran'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_mata_pelajaran VALUES('$_POST[a]','$_POST[b]','$_POST[d]','$_POST[f]','$_POST[i]','$_POST[j]','$_POST[m]')");
        echo "<script>document.location='index.php?view=matapelajaran';</script>";
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Mata Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>


                

                <div class='form-group'>
                <label for=''>Kode Pelajaran</label>
                <input type='text' class='form-control' name='a' value='$s[kode_pelajaran]'>
                </div>
                <div class='form-group'>
                <label for=''>Nama Mapel</label>
                <input type='text' class='form-control' name='f' value='$s[namamatapelajaran]'>
                </div>
                <div class='form-group'>
                <label for=''>Guru Pengampu</label>
                <select class='form-control' name='d'> 
                             <option value='0' selected>- Pilih Guru Pengampu -</option>"; 
                              $guru = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru");
                                  while($a = mysqli_fetch_array($guru)){
                                       echo "<option value='$a[nip]'>$a[nama_guru]</option>";
                                  }
                             echo "</select>
                </div>
                <div class='form-group'>
                <label for=''>Kompetensi Umum</label>
                <input type='text' class='form-control' name='i' value='$s[kompetensi_umum]'>
                </div>
                <div class='form-group'>
                <label for=''>Kompetensi Khusus</label>
                <input type='text' class='form-control' name='j' value='$s[kompetensi_khusus]'>
                </div>
                
                <div class='form-group'>
                <label for=''>Kelompok</label>
                <select class='form-control' name='b'> 
                             <option value='0' selected>- Pilih Kelompok Mata -</option>"; 
                              $guru = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelompok_mata_pelajaran");
                                  while($a = mysqli_fetch_array($guru)){
                                       echo "<option value='$a[id_kelompok_mata_pelajaran]'>$a[nama_kelompok_mata_pelajaran]</option>";
                                  }
                             echo "</select>
                </div>
                <div class='form-group'>
                <label for=''>Aktif</label> <br>
                <input type='radio' name='m' value='Ya' checked> Ya
                <input type='radio' name='m' value='Tidak'> Tidak



                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=matapelajaran'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='detail'){
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.*, c.nama_guru FROM rb_mata_pelajaran a 
                                              
                                                JOIN rb_guru c ON a.nip=c.nip
                                                      where a.kode_pelajaran='$_GET[id]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Mata Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th scope='row'>Kode Pelajaran</th>       <td>$s[kode_pelajaran] </td></tr>
                    <tr><th scope='row'>Nama Mapel</th>           <td>$s[namamatapelajaran]</td></tr>
                    <tr><th scope='row'>Guru Pengampu</th>        <td>$s[nama_guru]</td></tr>
                    <tr><th scope='row'>Kompetensi Umum</th>      <td>$s[kompetensi_umum]</td></tr>
                    <tr><th scope='row'>Kompetensi Khusus</th>    <td>$s[kompetensi_khusus]</td></tr>
                    <tr><th scope='row'>Kelompok</th>             <td>$s[kelompok_mata_pelajaran]</td></tr>
                    <tr><th scope='row'>Aktif</th>                <td>$s[aktif]</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <a href='index.php?view=matapelajaran'><button type='button' class='btn btn-default pull-right'>Kembali</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>