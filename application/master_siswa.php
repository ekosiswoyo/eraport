    
<?php 
if ($_GET[act]==''){ 
  cek_session_admin();
    if (isset($_POST[pindahkelas])){
      if ($_POST[angkatan]!='' AND $_POST[kelas] != ''){
        $jml = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as jmlp FROM rb_siswa where kode_kelas='$_POST[kelas]' AND angkatan='$_POST[angkatan]'"));
      }elseif ($_POST[angkatan]=='' AND $_POST[kelas] != ''){
        $jml = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as jmlp FROM rb_siswa where kode_kelas='$_POST[kelas]'"));
      }elseif ($_POST[angkatan]!='' AND $_POST[kelas] == ''){
        $jml = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as jmlp FROM rb_siswa where angkatan='$_POST[angkatan]'"));
      }

       $n = $jml[jmlp];
       $kelas = $_POST['kelaspindah'];
       $angkatan = $_POST['angkatanpindah'];
       for ($i=0; $i<=$n; $i++){
         if (isset($_POST['pilih'.$i])){
           $nis = $_POST['pilih'.$i];
           if ($angkatan != '' AND $kelas != ''){
              mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_siswa SET angkatan='$angkatan', kode_kelas='$kelas' where nis='$nis'");
           }elseif ($angkatan == '' AND $kelas != ''){
              mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_siswa SET kode_kelas='$kelas' where nis='$nis'");
           }elseif ($angkatan != '' AND $kelas == ''){
              mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_siswa SET angkatan='$angkatan' where nis='$nis'");
           }
         }
       }
       echo "<script>document.location='index.php?view=siswa&angkatan=".$angkatan."&kelas=".$kelas."';</script>";
    }
?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Semua Data Siswa </h3>
                   <?php if($_SESSION[level]!='kepala'){ ?>
                  <a class='pull-right btn btn-success btn-sm' target='_BLANK' href='print-siswa.php?kelas=<?php echo $_GET[kelas]; ?>&angkatan=<?php echo $_GET[angkatan]; ?>'>Print Siswa</a>
                  <a style='margin-right:5px' class='pull-right btn btn-primary btn-sm' href='index.php?view=siswa&act=tambah'>Tambahkan Data Siswa</a>
                    
                  <?php } ?>

                  <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
                    <input type="hidden" name='view' value='siswa'>
                    <input type="number" name='angkatan' style='padding:3px' placeholder='Angkatan' value='<?php echo $_GET[angkatan]; ?>'>
                    <select name='kelas' style='padding:4px'>
                        <?php 
                            echo "<option value=''>- Filter Kelas -</option>";
                            $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas order by kode_kelas asc");
                            while ($k = mysqli_fetch_array($kelas)){
                              if ($_GET[kelas]==$k[kode_kelas]){
                                echo "<option value='$k[kode_kelas]' selected>$k[kode_kelas] - $k[nama_kelas]</option>";
                              }else{
                                echo "<option value='$k[kode_kelas]'>$k[kode_kelas] - $k[nama_kelas]</option>";
                              }
                            }
                        ?>
                    </select>
                    <input type="submit" style='margin-top:-4px' class='btn btn-info btn-sm' value='Lihat'>
                  </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action='' method='POST'>
                <input type="hidden" name='angkatan' value='<?php echo $_GET[angkatan]; ?>'>
                <input type="hidden" name='kelas' value='<?php echo $_GET[kelas]; ?>'>
                <?php 
                  if (isset($_GET[kelas])){
                    echo "<table id='myTable' class='table table-bordered table-striped'>
                            <tr><th></th>";
                  }else{
                    echo "<table id='example' class='table table-bordered table-striped'>
                            <thead>
                              <tr>";
                  }
                  echo "<th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Angkatan</th>
                        <th>Kelas</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

                  if ($_GET[kelas] != '' AND $_GET[angkatan] != ''){
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                                              
                                                  where a.kode_kelas='$_GET[kelas]' AND a.angkatan='$_GET[angkatan]' ORDER BY a.nis");
                  }elseif ($_GET[kelas] != '' AND $_GET[angkatan] == ''){
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                                              
                                                  where a.kode_kelas='$_GET[kelas]' ORDER BY a.nis");
                  }elseif ($_GET[kelas] == '' AND $_GET[angkatan] != ''){
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                                           
                                                  where a.angkatan='$_GET[angkatan]' ORDER BY a.nis");
                  }
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr>";
                            if (isset($_GET[kelas])){
                                echo "<td><input type='checkbox' name='pilih".$no."' value='$r[nis]'/></td>";
                            }
                              echo "<td>$no</td>
                              <td>$r[nis]</td>
                              <td>$r[nama]</td>
                              <td>$r[angkatan]</td>
                              <td>$r[nama_kelas]</td>";
                              if($_SESSION[level]!='kepala'){
                                echo "<td><center>
                                  <a class='fa fa-fw fa-search' title='Lihat Detail' href='?view=siswa&act=detailsiswa&id=$r[nis]'></a>
                                  <a class='fa fa-fw fa-edit' title='Edit Siswa' href='?view=siswa&act=editsiswa&id=$r[nis]'></a>
                                  
                                </center></td>";
                              }else{
                                  echo "<td><center>
                                  <a class='btn btn-default btn-xs' title='Lihat Detail' href='?view=siswa&act=detailsiswa&id=$r[nis]'><span class='glyphicon glyphicon-search'></span></a>
                                  <!--<a class='btn btn-success btn-xs' title='Penilaian Diri' href='?view=siswa&act=penilaiandiri&id=$r[nis]'><span class='glyphicon glyphicon-th-list'></span></a>
                                  <a class='btn btn-warning btn-xs' title='Penilaian Teman' href='?view=siswa&act=penilaianteman&id=$r[nis]'><span class='glyphicon glyphicon-list'></span></a>-->
                                </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_siswa where nis='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=siswa';</script>";
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                <?php 
                    if ($_GET[kelas] == '' AND $_GET[tahun] == ''){
                        echo "<center style='padding:60px; color:blue'>TIDAK ADA DATA !<br>Silahkan Input Angkatan dan Memilih Kelas Terlebih dahulu...</center>";
                    }
                ?>
              </div><!-- /.box -->
              <?php if($_SESSION[level]!='kepala'){
                    if (isset($_GET[kelas])){ ?>
              <div class='box-footer'>
                  Pindah Ke : 
                  <input type="number" name='angkatanpindah' style='padding:3px' placeholder='Angkatan' value='<?php echo $_GET[angkatan]; ?>'>
                  <select name='kelaspindah' style='padding:4px' required>
                        <?php 
                            echo "<option value=''>- Pilih Kelas -</option>";
                            $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas");
                            while ($k = mysqli_fetch_array($kelas)){
                                echo "<option value='$k[kode_kelas]'>$k[kode_kelas] - $k[nama_kelas]</option>";
                            }
                        ?>
                    </select>
                  <button style='margin-top:-5px' type='submit' name='pindahkelas' class='btn btn-sm btn-info'>Proses</button>
                  <a href='index.php?view=siswa'><button type='button' class='btn btn-sm  btn-default pull-right'>Cancel</button></a>
              </div>
              <?php }} ?>

              </form>
            </div>
<?php 
}elseif($_GET[act]=='tambah'){
  cek_session_admin();
  if (isset($_POST[cek])){
    $nis = $_POST['ab'];
     

   $cek = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$nis'"));
   if($cek > 0){
    // echo "<script>window.alert('NIS Sudah Ada!');</script>";
       echo "<script>window.location='index.php?view=siswa&act=nis';</script>";

   }else{
          echo "<script>document.location='index.php?view=siswa&act=tambahsiswa&nis=$nis';</script>";
    }
         
  }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Siswa</h3>
                </div>
                <div class='box-body'>

                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#siswa' id='siswa-tab' role='tab' data-toggle='tab' aria-controls='siswa' aria-expanded='true'>Data </a></li>
                      
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>
                      <div role='tabpanel' class='tab-pane fade active in' id='siswa' aria-labelledby='siswa-tab'>
                          <form action='' method='POST' enctype='multipart/form-data' class='form-horizontal'>
                          <div class='col-md-6'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                             
                              <tr><th scope='row'>NIS</th> <td><input type='text' class='form-control' name='ab'></td></tr>
                             <tr><th scope='row'>Password</th> <td><input type='text' class='form-control' name='ac' disabled></td></tr>
                              <tr><th scope='row'>Nama Siswa</th> <td><input type='text' class='form-control' name='ad' disabled></td></tr>
                              <tr><th scope='row'>Kelas</th> <td><select class='form-control' name='ae' disabled> 
                                                                            <option value='0' selected>- Pilih Kelas -</option>"; 
                                                                              $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas order by kode_kelas asc");
                                                                              while($a = mysqli_fetch_array($kelas)){
                                                                                  echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                                                                              }
                                                                    echo "</select></td></tr>
                              <tr><th scope='row'>Angkatan</th> <td><input type='text' class='form-control' name='af' disabled></td></tr>
                             
                              <tr><th scope='row'>Alamat Siswa</th> <td><input type='text' class='form-control' name='ah' disabled></td></tr>
                             
                              <tr><th scope='row'>Status Awal</th> <td><input type='text' class='form-control' name='an' disabled></td></tr>
                              <tr><th scope='row'>Tempat Lahir</th> <td><input type='text' class='form-control' name='bb' disabled></td></tr>
                              <tr><th scope='row'>Tanggal Lahir</th> <td><input type='text' class='form-control datepicker' name='bc' disabled></td></tr>
                              <tr><th scope='row'>Jenis Kelamin</th> <td><select class='form-control' name='bd' disabled> 
                                                                            <option value='0' selected>- Pilih Jenis Kelamin -</option>
                                                                            <option value='Laki-Laki'>Laki-Laki</option>
                                                                            <option value='Perempuan'>Perempuan</option></select>
                                                                            </td></tr>
                              <tr><th scope='row'>Agama</th> <td><select class='form-control' name='be' disabled> 
                                                                            <option value='0' selected>- Pilih Agama -</option> 
                                                                            <option value='Islam'>Islam</option>
                                                                            <option value='Kristen'>Kristen</option>
                                                                            <option value='Katolik'>Katolik</option>
                                                                            <option value='Hindu'>Hindu</option>
                                                                            <option value='Budha'>Budha</option>
                                                                            </select></td></tr>
                              <tr><th scope='row'>No Handpone</th> <td><input type='text' class='form-control' name='bj' disabled></td></tr>
                              <tr><th scope='row'>Alamat Email</th> <td><input type='text' class='form-control' name='bk' disabled></td></tr>
                             
                              <tr><th scope='row'>Status Siswa</th> <td><input type='radio' name='bo' value='Aktif' disabled> Aktif
                                                                        <input type='radio' name='bo' value='Tidak Aktif' disabled> Tidak Aktif </td></tr>

                              <tr><th scope='row'>Foto</th>             <td><input type='file' name='file' disabled>
                              </td></tr>

                            </tbody>
                            </table>
                          </div>
                          <div class='col-md-6'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                 <tr bgcolor=#e3e3e3><th width='130px' scope='row'>Nama Ayah</th> <td><input type='text' class='form-control' name='ca' disabled></td></tr>
                         
                              <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' name='cg' disabled></td></tr>
                              <tr><th scope='row' coslpan='2'><br></th></tr>
                              <tr bgcolor=#e3e3e3><th scope='row'>Nama Ibu</th> <td><input type='text' class='form-control' name='ch' disabled></td></tr>
                            
                              <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' name='cn' disabled></td></tr>
                              <tr><th scope='row' coslpan='2'><br></th></tr>
                              <tr bgcolor=#e3e3e3><th scope='row'>Nama Wali</th> <td><input type='text' class='form-control' name='co' disabled></td></tr>
                            </tbody>
                            </table>
                          </div>  
                          <div style='clear:both'></div>
                          <div class='box-footer'>
                            <button type='submit' name='cek' class='btn btn-info'>Simpan</button>
                          </div> 
                          </form>
                      </div>

                     
                    </div>
                  </div>

                </div>
            </div>
        </div>";
}elseif($_GET[act]=='nis'){
  cek_session_admin();
  if (isset($_POST[cek])){
    $nis = $_POST['ab'];
     

   $cek = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$nis'"));
   if($cek > 0){
    // echo "<script>window.alert('NIS Sudah Ada!');</script>";
       echo "<script>window.location='index.php?view=siswa&act=nis';</script>";

   }else{
          echo "<script>document.location='index.php?view=siswa&act=tambahsiswa&nis=$nis';</script>";
    }
         
  }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Siswa</h3>
                </div>
                <div class='box-body'>

                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#siswa' id='siswa-tab' role='tab' data-toggle='tab' aria-controls='siswa' aria-expanded='true'>Data </a></li>
                      
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>
                      <div role='tabpanel' class='tab-pane fade active in' id='siswa' aria-labelledby='siswa-tab'>
                          <form action='' method='POST' enctype='multipart/form-data' class='form-horizontal'>
                          <div class='col-md-6'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                             
                              <tr><th scope='row'>NIS</th> <td><input type='text' class='form-control' name='ab'></td></tr>
                              <tr><th scope='row' style='color:red;'>**NIS Sudah Ada !!</th> <td></td></tr>
                            <tr><th scope='row'>Password</th> <td><input type='text' class='form-control' name='ac' disabled></td></tr>
                              <tr><th scope='row'>Nama Siswa</th> <td><input type='text' class='form-control' name='ad' disabled></td></tr>
                              <tr><th scope='row'>Kelas</th> <td><select class='form-control' name='ae' disabled> 
                                                                            <option value='0' selected>- Pilih Kelas -</option>"; 
                                                                              $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas order by kode_kelas asc");
                                                                              while($a = mysqli_fetch_array($kelas)){
                                                                                  echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                                                                              }
                                                                    echo "</select></td></tr>
                              <tr><th scope='row'>Angkatan</th> <td><input type='text' class='form-control' name='af' disabled></td></tr>
                             
                              <tr><th scope='row'>Alamat Siswa</th> <td><input type='text' class='form-control' name='ah' disabled></td></tr>
                             
                              <tr><th scope='row'>Status Awal</th> <td><input type='text' class='form-control' name='an' disabled></td></tr>
                              <tr><th scope='row'>Tempat Lahir</th> <td><input type='text' class='form-control' name='bb' disabled></td></tr>
                              <tr><th scope='row'>Tanggal Lahir</th> <td><input type='text' class='form-control datepicker' name='bc' disabled></td></tr>
                              <tr><th scope='row'>Jenis Kelamin</th> <td><select class='form-control' name='bd' disabled> 
                                                                            <option value='0' selected>- Pilih Jenis Kelamin -</option>
                                                                            <option value='Laki-Laki'>Laki-Laki</option>
                                                                            <option value='Perempuan'>Perempuan</option></select>
                                                                            </td></tr>
                              <tr><th scope='row'>Agama</th> <td><select class='form-control' name='be' disabled> 
                                                                            <option value='0' selected>- Pilih Agama -</option> 
                                                                            <option value='Islam'>Islam</option>
                                                                            <option value='Kristen'>Kristen</option>
                                                                            <option value='Katolik'>Katolik</option>
                                                                            <option value='Hindu'>Hindu</option>
                                                                            <option value='Budha'>Budha</option>
                                                                            </select></td></tr>
                              <tr><th scope='row'>No Handpone</th> <td><input type='text' class='form-control' name='bj' disabled></td></tr>
                              <tr><th scope='row'>Alamat Email</th> <td><input type='text' class='form-control' name='bk' disabled></td></tr>
                             
                              <tr><th scope='row'>Status Siswa</th> <td><input type='radio' name='bo' value='Aktif' disabled> Aktif
                                                                        <input type='radio' name='bo' value='Tidak Aktif' disabled> Tidak Aktif </td></tr>

                              <tr><th scope='row'>Foto</th>             <td><input type='file' name='file' disabled>
                              </td></tr>

                            </tbody>
                            </table>
                          </div>
                          <div class='col-md-6'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                 <tr bgcolor=#e3e3e3><th width='130px' scope='row'>Nama Ayah</th> <td><input type='text' class='form-control' name='ca' disabled></td></tr>
                         
                              <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' name='cg' disabled></td></tr>
                              <tr><th scope='row' coslpan='2'><br></th></tr>
                              <tr bgcolor=#e3e3e3><th scope='row'>Nama Ibu</th> <td><input type='text' class='form-control' name='ch' disabled></td></tr>
                            
                              <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' name='cn' disabled></td></tr>
                              <tr><th scope='row' coslpan='2'><br></th></tr>
                              <tr bgcolor=#e3e3e3><th scope='row'>Nama Wali</th> <td><input type='text' class='form-control' name='co' disabled></td></tr>
                            </tbody>
                            </table>
                          </div>  
                          <div style='clear:both'></div>
                          <div class='box-footer'>
                            <button type='submit' name='cek' class='btn btn-info'>Simpan</button>
                          </div> 
                          </form>
                      </div>

                     
                    </div>
                  </div>

                </div>
            </div>
        </div>";
}
elseif($_GET[act]=='tambahsiswa'){
  cek_session_admin();
  if (isset($_POST[tambah])){
    $nis = $_GET['nis'];
      $rtrw = explode('/',$_POST[ai]);
      $rt = $rtrw[0];
      $rw = $rtrw[1]; 
      $nama_file1     = $_FILES['file']['name'];
      $ab = ucfirst($_POST[ab]);
      $ad=ucfirst($_POST[ad]);
      $bd=ucfirst($_POST[bd]);
      $bb=ucfirst($_POST[bb]);

      $bk=ucfirst($_POST[bk]);
      $be=ucfirst($_POST[be]);
      $ah=ucfirst($_POST[ah]);
      $bk=ucfirst($_POST[bk]);
      $ca=ucfirst($_POST[ca]);
      $ch=ucfirst($_POST[ch]);
      $co=ucfirst($_POST[co]);
      $af=ucfirst($_POST[af]);
      $an=ucfirst($_POST[an]);
      $bo=ucfirst($_POST[bo]);
      $ae=ucfirst($_POST[ae]);
    
      $format=date('Y-m-d',
      strtotime($_POST[bc]));
    
    $lokasi_file1    = $_FILES['file']['tmp_name'];
    $ekstensi_file = $_FILES["file"]["type"];

   $cek = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$nis'"));
   if($cek > 0){
    echo "<script>window.alert('NIS Sudah Ada!');</script>";
       echo "<script>window.location='index.php?view=siswa';</script>";

   }else{
     if($ekstensi_file == "image/jpeg" or $ekstensi_file == ""){

         move_uploaded_file($_FILES["file"]["tmp_name"],"files/".$nama_file1);
     mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_siswa VALUES('$ab','$_POST[ac]','$ad','$bd',
                               '$bb','$format','$be','$ah',
                               '$_POST[bj]','$bk','$ca',
                               '$_POST[cg]','$ch',
                              '$_POST[cn]','$co','$af','$an','$bo',
                               '$ae','$nama_file1')");

          echo "<script>window.alert('Data Berhasil di Simpan !')</script>";
          echo "<script>document.location='index.php?view=siswa';</script>";
      }else{
             echo 'Update Data Gagal!';
      }
    }
         
  }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Siswa</h3>
                </div>
                <div class='box-body'>

                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#siswa' id='siswa-tab' role='tab' data-toggle='tab' aria-controls='siswa' aria-expanded='true'>Data </a></li>
                      
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>
                      <div role='tabpanel' class='tab-pane fade active in' id='siswa' aria-labelledby='siswa-tab'>
                          <form action='' method='POST' enctype='multipart/form-data' class='form-horizontal'>
                          <div class='col-md-6'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                             
                              <tr><th scope='row'>NIS</th> <td><input type='text' class='form-control' name='ab' value='$_GET[nis]' readonly></td></tr>
                              <tr><th scope='row'>Password</th> <td><input type='text' class='form-control' name='ac'></td></tr>
                              <tr><th scope='row'>Nama Siswa</th> <td><input type='text' class='form-control' name='ad'></td></tr>
                              <tr><th scope='row'>Kelas</th> <td><select class='form-control' name='ae'> 
                                                                            <option value='0' selected>- Pilih Kelas -</option>"; 
                                                                              $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas order by kode_kelas asc");
                                                                              while($a = mysqli_fetch_array($kelas)){
                                                                                  echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                                                                              }
                                                                    echo "</select></td></tr>
                              <tr><th scope='row'>Angkatan</th> <td><input type='text' class='form-control' name='af'></td></tr>
                             
                              <tr><th scope='row'>Alamat Siswa</th> <td><input type='text' class='form-control' name='ah'></td></tr>
                             
                              <tr><th scope='row'>Status Awal</th> <td><input type='text' class='form-control' name='an'></td></tr>
                              <tr><th scope='row'>Tempat Lahir</th> <td><input type='text' class='form-control' name='bb'></td></tr>
                              <tr><th scope='row'>Tanggal Lahir</th> <td><input type='text' class='form-control datepicker' name='bc'></td></tr>
                              <tr><th scope='row'>Jenis Kelamin</th> <td><select class='form-control' name='bd'> 
                                                                            <option value='0' selected>- Pilih Jenis Kelamin -</option>
                                                                            <option value='Laki-Laki'>Laki-Laki</option>
                                                                            <option value='Perempuan'>Perempuan</option></select>
                                                                            </td></tr>
                              <tr><th scope='row'>Agama</th> <td><select class='form-control' name='be'> 
                                                                            <option value='0' selected>- Pilih Agama -</option> 
                                                                            <option value='Islam'>Islam</option>
                                                                            <option value='Kristen'>Kristen</option>
                                                                            <option value='Katolik'>Katolik</option>
                                                                            <option value='Hindu'>Hindu</option>
                                                                            <option value='Budha'>Budha</option>
                                                                            </select></td></tr>
                              <tr><th scope='row'>No Handpone</th> <td><input type='text' class='form-control' name='bj'></td></tr>
                              <tr><th scope='row'>Alamat Email</th> <td><input type='text' class='form-control' name='bk'></td></tr>
                             
                              <tr><th scope='row'>Status Siswa</th> <td><input type='radio' name='bo' value='Aktif' checked> Aktif
                                                                        <input type='radio' name='bo' value='Tidak Aktif'> Tidak Aktif </td></tr>

                              <tr><th scope='row'>Foto</th>             <td><input type='file' name='file'>
                              </td></tr>

                            </tbody>
                            </table>
                          </div>
                          <div class='col-md-6'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                 <tr bgcolor=#e3e3e3><th width='130px' scope='row'>Nama Ayah</th> <td><input type='text' class='form-control' name='ca'></td></tr>
                         
                              <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' name='cg'></td></tr>
                              <tr><th scope='row' coslpan='2'><br></th></tr>
                              <tr bgcolor=#e3e3e3><th scope='row'>Nama Ibu</th> <td><input type='text' class='form-control' name='ch'></td></tr>
                            
                              <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' name='cn'></td></tr>
                              <tr><th scope='row' coslpan='2'><br></th></tr>
                              <tr bgcolor=#e3e3e3><th scope='row'>Nama Wali</th> <td><input type='text' class='form-control' name='co'></td></tr>
                            </tbody>
                            </table>
                          </div>  
                          <div style='clear:both'></div>
                          <div class='box-footer'>
                            <button type='submit' name='tambah' class='btn btn-info'>Simpan</button>
                            <a href='index.php?view=siswa'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                          </div> 
                      </div>

                     
                    </div>
                  </div>

                </div>
            </div>
        </div>";
}elseif($_GET[act]=='editsiswa'){
  cek_session_siswa();
  if (isset($_POST[update1])){
      $rtrw = explode('/',$_POST[ai]);
      $rt = $rtrw[0];
      $rw = $rtrw[1];
      $dir_gambar = 'foto_siswa/';
      $format=date('Y-m-d',
      strtotime($_POST[bc]));
      $filename = basename($_FILES['ao']['name']);
      $filenamee = date("YmdHis").'-'.basename($_FILES['ao']['name']);
      $uploadfile = $dir_gambar . $filenamee;
     
            mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_siswa SET 
                                     password         = '$_POST[ac]',
                                     nama       = '$_POST[ad]',
                                     kode_kelas    = '$_POST[ae]',
                                     angkatan   = '$_POST[af]',
                                     alamat        = '$_POST[ah]',
                                     status_awal   = '$_POST[an]',

                                    
                                     tempat_lahir = '$_POST[bb]',
                                     tanggal_lahir = '$format',
                                     jenis_kelamin = '$_POST[bd]',
                                     agama = '$_POST[be]',
                                     email = '$_POST[bk]',
                               status_siswa = '$_POST[bo]' where nis='$_POST[id]'");
      
          echo "<script>document.location='index.php?view=siswa';</script>";
  }

  if (isset($_POST[update2])){
           mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_siswa SET 
                               nama_ayah        = '$_POST[ca]',
                               no_telpon_ayah   = '$_POST[cg]',

                               nama_ibu        = '$_POST[ch]',
                               no_telpon_ibu   = '$_POST[cn]',

                               nama_wali        = '$_POST[co]' where nis='$_POST[id]'");

            echo "<script>document.location='index.php?view=siswa;</script>";
  }
    if ($_SESSION[level] == 'siswa'){
        $nis = $_SESSION[id];
        $close = 'readonly=on';
    }else{
        $nis = $_GET[id];
        $close = '';
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                                      where a.nis='$nis'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Siswa</h3>
                </div>
                <div class='box-body'>";
                
                  if ($_SESSION[level] == 'siswa'){
                    echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'> 
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>×</span></button> <strong>Perhatian!</strong> - Semua Data-data yang ada dibawah ini akan digunakan untuk keperluan pihak sekolah, jadi tolong di isi dengan data sebenarnya dan jika kedapatan data yang diisikan tidak seuai dengan yang sebenarnya, maka pihak sekolah akan memberikan sanksi tegas !!!
                    </div>";
                  }

                  echo "<div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#siswa' id='siswa-tab' role='tab' data-toggle='tab' aria-controls='siswa' aria-expanded='true'>Data Siswa </a></li>
                      <li role='presentation' class=''><a href='#ortu' role='tab' id='ortu-tab' data-toggle='tab' aria-controls='ortu' aria-expanded='false'>Data Orang Tua / Wali</a></li>
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>
                    <div role='tabpanel' class='tab-pane fade active in' id='siswa' aria-labelledby='siswa-tab'>
                        <form action='' method='POST' enctype='multipart/form-data' class='form-horizontal'>
                        <div class='col-md-7'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                            <tr><th style='background-color:#E7EAEC' width='160px' rowspan='17'>";
                               
                                  
                            echo "</th></tr>
                            <input type='hidden' value='$s[nis]' name='id'>
                            
                            <tr><th scope='row'>NIS</th> <td><input type='text' class='form-control' value='$s[nis]' name='ab' $close readonly></td></tr>
                            <tr><th scope='row'>Password</th> <td><input type='text' class='form-control' value='$s[password]' name='ac'></td></tr>
                            <tr><th scope='row'>Nama Siswa</th> <td><input type='text' class='form-control' value='$s[nama]' name='ad'></td></tr>
                            <tr><th scope='row'>Kelas</th> <td><select class='form-control' name='ae' $close> 
                                                                          <option value='0' selected>- Pilih Kelas -</option>"; 
                                                                            $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas");
                                                                            while($a = mysqli_fetch_array($kelas)){
                                                                              if ($_SESSION[level] == 'siswa'){
                                                                                if ($a[kode_kelas] == $s[kode_kelas]){
                                                                                  echo "<option value='$a[kode_kelas]' selected>$a[nama_kelas]</option>";
                                                                                }
                                                                              }else{
                                                                                if ($a[kode_kelas] == $s[kode_kelas]){
                                                                                  echo "<option value='$a[kode_kelas]' selected>$a[nama_kelas]</option>";
                                                                                }else{
                                                                                  echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                                                                                }
                                                                              }
                                                                            }
                                                                  echo "</select></td></tr>
                            <tr><th scope='row'>Angkatan</th> <td><input type='text' class='form-control' value='$s[angkatan]' name='af' $close></td></tr>
                            
                            <tr><th scope='row'>Alamat Siswa</th> <td><input type='text' class='form-control' value='$s[alamat]' name='ah'></td></tr>
                            <tr><th scope='row'>Status Awal</th> <td><input type='text' class='form-control' value='$s[status_awal]' name='an' $close></td></tr>
                          
                          </tbody>
                          </table>
                        </div>
                        <div class='col-md-5'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                           
                            <tr><th scope='row'>Tempat Lahir</th> <td><input type='text' class='form-control' value='$s[tempat_lahir]' name='bb'></td></tr>
                            <tr><th scope='row'>Tanggal Lahir</th> <td><input type='text' class='form-control datepicker' value='$s[tanggal_lahir]' name='bc'></td></tr>
                            <tr><th scope='row'>Jenis Kelamin</th> <td><select class='form-control' name='bd'> 
                                                                          <option value='0' selected>- Pilih Jenis Kelamin -</option>
                                                                         
                                                                          <option value='Laki-Laki'>Laki-Laki</option>
                                                                          <option value='Perempuan'>Perempuan</option></select></td></tr>
                            <tr><th scope='row'>Agama</th> <td><select class='form-control' name='be'> 
                                                                          <option value='0' selected>- Pilih Agama -</option>
                                                                          <option value='Islam'>Islam</option>
                                                                          <option value='Kristen'>Kristen</option>
                                                                          <option value='Katolik'>Katolik</option>
                                                                          <option value='Hindu'>Hindu</option>
                                                                          <option value='Budha'>Budha</option>
                                                                  </select></td></tr>
                            <tr><th scope='row'>No Handpone</th> <td><input type='text' class='form-control' value='$s[hp]' name='bj'></td></tr>
                            <tr><th scope='row'>Alamat Email</th> <td><input type='text' class='form-control' value='$s[email]' name='bk'></td></tr>
                            
                            <tr><th scope='row'>Status Siswa</th> <td>";
                                                                    if ($s[status_siswa]=='Aktif'){
                                                                        echo "<input type='radio' name='bo' value='Aktif' checked> Aktif
                                                                              <input type='radio' name='bo' value='Tidak Aktif'> Tidak Aktif";
                                                                    }else{
                                                                        echo "<input type='radio' name='bo' value='Aktif'> Aktif
                                                                              <input type='radio' name='bo' value='Tidak Aktif' checked> Tidak Aktif";
                                                                    } 
                                                                    echo "</td></tr>
                          </tbody>
                          </table>
                        </div>  
                        <div style='clear:both'></div>
                        <div class='box-footer'>
                          <button type='submit' name='update1' class='btn btn-info'>UPDATE</button>
                          <a href='index.php?view=siswa'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                        </div> 

                        </form>
                    </div>


                    <div role='tabpanel' class='tab-pane fade' id='ortu' aria-labelledby='ortu-tab'>
                        <form action='' method='POST' class='form-horizontal'>
                        <div class='col-md-12'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                            <tr><th style='background-color:#E7EAEC' width='160px' rowspan='22'>";
                                
                            echo "</th></tr>
                            <input type='hidden' value='$s[nis]' name='id'>
                            <tr bgcolor=#e3e3e3><th width='130px' scope='row'>Nama Ayah</th> <td><input type='text' class='form-control' value='$s[nama_ayah]' name='ca'></td></tr>
                         
                           
                            <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' value='$s[no_telpon_ayah]' name='cg'></td></tr>
                            <tr><th scope='row' coslpan='2'><br></th></tr>
                            <tr bgcolor=#e3e3e3><th scope='row'>Nama Ibu</th> <td><input type='text' class='form-control' value='$s[nama_ibu]' name='ch'></td></tr>
                            <tr><th scope='row'>No Telpon</th> <td><input type='text' class='form-control' value='$s[no_telpon_ibu]' name='cn'></td></tr>
                            <tr><th scope='row' coslpan='2'><br></th></tr>
                            <tr bgcolor=#e3e3e3><th scope='row'>Nama Wali</th> <td><input type='text' class='form-control' value='$s[nama_wali]' name='co'></td></tr>
                          </tbody>
                          </table>
                        </div>
                        <div class='box-footer'>
                          <button type='submit' name='update2' class='btn btn-info'>UPDATE</button>
                          <a href='index.php?view=siswa'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                        </div>
                        </form>
                    </div>

                </div>
            </div>";

}elseif($_GET[act]=='detailsiswa'){
  cek_session_siswa();
    if ($_SESSION[level] == 'siswa'){
        $nis = $_SESSION[id];
    }else{
        $nis = $_GET[id];
    }
    $detail = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                   
                                      where a.nis='$nis'");
    $s = mysqli_fetch_array($detail);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Siswa</h3>
                </div>
                <div class='box-body'>

                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#siswa' id='siswa-tab' role='tab' data-toggle='tab' aria-controls='siswa' aria-expanded='true'>Data Siswa </a></li>
                      <li role='presentation' class=''><a href='#ortu' role='tab' id='ortu-tab' data-toggle='tab' aria-controls='ortu' aria-expanded='false'>Data Orang Tua / Wali</a></li>
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>
                    <div role='tabpanel' class='tab-pane fade active in' id='siswa' aria-labelledby='siswa-tab'>
                        <form class='form-horizontal'>
                        <div class='col-md-7'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                            <tr><th style='background-color:#E7EAEC' width='160px' rowspan='17'>";
                                if (trim($s[foto])==''){
                                  echo "<img class='img-thumbnail' style='width:155px' src='files/no-image.jpg'>";
                                }else{
                                  echo "<img class='img-thumbnail' style='width:155px' src='files/$s[foto]'>";
                                }
                              if($_SESSION[level]!='kepala'){
                                echo "<a href='
                                index.php?view=siswa&act=editsiswa&id=$_GET[id]' class='btn btn-success btn-block'>Edit Profile</a>";
                              }
                                echo "</th>
                            </tr>
                            <tr><th width='120px' scope='row'>NIS</th> <td>$s[nis]</td></tr>
                            
                            <tr><th scope='row'>Password</th> <td>$s[password]</td></tr>
                            <tr><th scope='row'>Nama Siswa</th> <td>$s[nama]</td></tr>
                            <tr><th scope='row'>Kelas</th> <td>$s[nama_kelas]</td></tr>
                            <tr><th scope='row'>Angkatan</th> <td>$s[angkatan]</td></tr>
                            <tr><th scope='row'>Alamat Siswa</th> <td>$s[alamat]</td></tr>
                           
                            <tr><th scope='row'>Status Awal</th> <td>$s[status_awal]</td></tr>
                            <tr><th scope='row'>Status Siswa</th> <td>$s[status_siswa]</td></tr>
                          </tbody>
                          </table>
                        </div>
                        <div class='col-md-5'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                            <tr><th scope='row'>Tempat Lahir</th> <td>$s[tempat_lahir]</td></tr>
                            <tr><th scope='row'>Tanggal Lahir</th> <td>".tgl_indo($s[tanggal_lahir])."</td></tr>
                            <tr><th scope='row'>Jenis Kelamin</th> <td>$s[jenis_kelamin]</td></tr>
                            <tr><th scope='row'>Agama</th> <td>$s[agama]</td></tr>
                            <tr><th scope='row'>No Handpone</th> <td>$s[hp]</td></tr>
                            <tr><th scope='row'>Alamat Email</th> <td>$s[email]</td></tr>
                           
                          </tbody>
                          </table>
                        </div>   
                        </form>
                    </div>

                    <div role='tabpanel' class='tab-pane fade' id='ortu' aria-labelledby='ortu-tab'>
                        <form class='form-horizontal'>
                        <div class='col-md-12'>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                            <tr><th style='background-color:#E7EAEC' width='160px' rowspan='20'>";
                                
                              if($_SESSION[level]!='kepala'){
                                echo "<a href='index.php?view=siswa&act=editsiswa&id=$_GET[id]' class='btn btn-success btn-block'>Edit Profile</a>";
                              }
                                echo "</th>
                            </tr>
                            <tr bgcolor=#e3e3e3><th width='120px' scope='row'>Nama Ayah</th> <td>$s[nama_ayah]</td></tr>
                            <tr><th scope='row'>No Telpon</th> <td>$s[no_telpon_ayah]</td></tr>
                            <tr><th scope='row' coslpan='2'><br></th></tr>
                            <tr bgcolor=#e3e3e3><th scope='row'>Nama Ibu</th> <td>$s[nama_ibu]</td></tr>
                            <tr><th scope='row'>No Telpon</th> <td>$s[no_telpon_ibu]</td></tr>
                            <tr><th scope='row' coslpan='2'><br></th></tr>
                            <tr bgcolor=#e3e3e3><th scope='row'>Nama Wali</th> <td>$s[nama_wali]</td></tr>
                          </tbody>
                          </table>
                        </div>
                        </form>
                    </div>

                </div>
            </div>";
}elseif($_GET[act]=='penilaiandiri'){
            $t = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas where a.nis='$_GET[id]'"));
            echo "<div class='col-xs-12'>  
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Data Pertanyaan dan Jawaban Penilaian Diri </h3>
                </div>
                <div class='box-body'>

                        <div class='col-md-12'>
                            <table class='table table-condensed table-hover'>
                                <tbody>
                                  <tr><th width='120px' scope='row'>NIS</th> <td>$t[nis]</td></tr>
                                  <tr><th scope='row'>Nama Siswa</th>           <td>$t[nama]</td></tr>
                                  <tr><th scope='row'>Kelas</th>           <td>$t[nama_kelas]</td></tr>
                                </tbody>
                            </table>
                        </div>

                  <table id='example2' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Pertanyaan</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_pertanyaan_penilaian where status='diri' ORDER BY id_pertanyaan_penilaian DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    $jwb = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_pertanyaan_penilaian_jawab where nis='$_GET[id]' AND id_pertanyaan_penilaian='$r[id_pertanyaan_penilaian]' AND status='diri' AND kode_kelas='$t[kode_kelas]'"));
                    if (trim($jwb[jawaban])==''){
                      $jawab = "<i style='color:red'>Belum Ada Jawaban...</i>";
                    }else{
                      $jawab = "<i>$jwb[jawaban]</i>";
                    }
                    echo "<tr><td>$no</td>
                              <td>$r[pertanyaan] <br> <strong>Jawaban :</strong> <br>$jawab</td>
                          </tr>";
                      $no++;
                      }
                    echo "</tbody>
                  </table>
                </div>
              </div>
            </div>";
}elseif($_GET[act]=='penilaianteman'){
          echo "<div class='col-xs-12'>  
              <div class='box'>
              <form action='' method='POST'>
                <div class='box-header'>
                  <h3 class='box-title'>Semua Data Teman Kelas anda </h3>
                </div>
                <div class='box-body'>
                  <table class='table table-bordered table-striped'>
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Angkatan</th>
                        
                        <th>Kelas</th>
                        <th width='135px'></th>
                      </tr>
                    </thead>
                    <tbody>";

                    $cs = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$_GET[id]'"));
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                                              LEFT JOIN rb_jenis_kelamin c ON a.id_jenis_kelamin=c.id_jenis_kelamin 
                                                
                                                  where a.kode_kelas='$cs[kode_kelas]' AND a.angkatan='$cs[angkatan]' AND nis!='$_GET[id]' ORDER BY a.nis");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                            
                              <td>$r[nis]</td>
                              <td>$r[nama]</td>
                              <td>$r[angkatan]</td>
                              <td>$r[nama_kelas]</td>
                              <td align=center><a class='btn btn-success btn-xs' title='Lihat Penilaian' href='index.php?view=siswa&act=pertanyaan&nis=$r[nis]&id=$_GET[id]'><span class='glyphicon glyphicon-search'></span> Lihat Penilaian</a></td>
                          </tr>";
                      $no++;
                      }
                    echo "</tbody>
                  </table>
                </div>
              </form>
              </div>
            </div>";
}elseif($_GET[act]=='pertanyaan'){ ?>
            <div class="col-xs-12">  
              <div class="box">
              <form action='' method='POST'>
                <div class="box-header">
                  <h3 class="box-title">Data Pertanyan dan Jawaban Penilaian Teman </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php
                      echo "<input type='hidden' value='$_GET[nis]' name='nisteman'>";
                      $t = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$_GET[nis]'"));
                      $tt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$_GET[id]'"));
                      echo "<div class='col-md-12'>
                            <table class='table table-condensed table-hover'>
                                <tbody>
                                  <tr><th scope='row'>NIS Penilai</th>           <td>$tt[nis]</td></tr>
                                  <tr><th scope='row'>Nama Penilai</th>           <td>$tt[nama]</td></tr>

                                  <tr bgcolor=#f4f4f4><th width='120px' scope='row'>NIS Teman</th> <td style='color:blue'>$t[nis]</td></tr>
                                  <tr bgcolor=#f4f4f4><th scope='row'>Nama Teman</th>           <td style='color:blue'>$t[nama]</td></tr>
                                </tbody>
                            </table>
                            </div>";
                  ?>
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Pertanyaan</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_pertanyaan_penilaian where status='teman' ORDER BY id_pertanyaan_penilaian DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    $jwb = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_pertanyaan_penilaian_jawab where nis='$_GET[id]' AND nis_teman='$_GET[nis]' AND id_pertanyaan_penilaian='$r[id_pertanyaan_penilaian]' AND status='teman' AND kode_kelas='$tt[kode_kelas]'"));
                    if (trim($jwb[jawaban])==''){
                      $jawab = "<i style='color:red'>Belum Ada Jawaban...</i>";
                    }else{
                      $jawab = "<i>$jwb[jawaban]</i>";
                    }
                    echo "<tr><td>$no</td>
                              <td>$r[pertanyaan] <br> <strong>Jawaban :</strong> <br>$jawab</td>
                          </tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php
}
?>