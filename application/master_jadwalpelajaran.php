<?php if ($_GET[act]==''){ ?>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php if (isset($_GET[kelas]) AND isset($_GET[tahun])){ echo "Jadwal Pelajaran"; }else{ echo "Jadwal Pelajaran Pada Tahun ".date('Y'); } ?></h3>
                  <?php if($_SESSION[level]!='kepala'){ ?>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=jadwalpelajaran&act=tambah'>Tambahkan Jadwal Pelajaran</a>
                  <?php } ?>
                  <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
                    <input type="hidden" name='view' value='jadwalpelajaran'>
                    <select name='tahun' style='padding:4px'>
                        <?php 
                            echo "<option value=''>- Pilih Tahun Ajaran -</option>";
                            $tahun = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik");
                            while ($k = mysqli_fetch_array($tahun)){
                              if ($_GET[tahun]==$k[id_tahun_akademik]){
                                echo "<option value='$k[id_tahun_akademik]' selected>$k[nama_tahun]</option>";
                              }else{
                                echo "<option value='$k[id_tahun_akademik]'>$k[nama_tahun]</option>";
                              }
                            }
                        ?>
                    </select>
                    <select name='kelas' style='padding:4px'>
                        <?php 
                            echo "<option value=''>- Pilih Kelas -</option>";
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
                    <input type="submit" style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
                  </form>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Jadwal Pelajaran</th>
                        <th>Kelas</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                       
                        <?php
                        if($_SESSION[level]!='kepala'){ ?>
                        <th>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    if (isset($_GET[kelas]) AND isset($_GET[tahun])){
                      $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.*, e.nama_kelas, b.namamatapelajaran, b.kode_pelajaran, c.nama_guru FROM rb_jadwal_pelajaran a 
                                            JOIN rb_mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran
                                              JOIN rb_guru c ON a.nip=c.nip 
                                                  JOIN rb_kelas e ON a.kode_kelas=e.kode_kelas 
                                                  where a.kode_kelas='$_GET[kelas]' AND 
                                                    a.id_tahun_akademik='$_GET[tahun]' ORDER BY a.hari DESC");
                    
                    }
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[namamatapelajaran]</td>
                              <td>$r[nama_kelas]</td>
                              <td>$r[nama_guru]</td>
                              <td>$r[hari]</td>
                              <td>$r[jam_mulai]</td>
                              <td>$r[jam_selesai]</td>";
                              
                              if($_SESSION[level]!='kepala'){
                                echo "<td style='width:70px !important'><center>
                                        <a class='fa fa-fw fa-edit' title='Edit Jadwal' href='index.php?view=jadwalpelajaran&act=edit&id=$r[kodejdwl]'></span></a>
                                        <a class='fa fa-fw fa-eraser' title='Hapus Jadwal' href='index.php?view=jadwalpelajaran&hapus=$r[kodejdwl]' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\"></a>
                                      </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                        mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_jadwal_pelajaran where kodejdwl='$_GET[hapus]'");
                        echo "<script>document.location='index.php?view=jadwalpelajaran';</script>";
                      }
                  ?>
                    <tbody>
                  </table>
                </div><!-- /.box-body -->
                <?php 
                    if ($_GET[kelas] == '' AND $_GET[tahun] == ''){
                        echo "<center style='padding:60px; color:blue'>TIDAK ADA DATA !<br>Silahkan Input Tahun Akademik dan Memilih Kelas Terlebih dahulu...</center>";
                    }
                ?>
                </div>
            </div>

<?php 
}elseif($_GET[act]=='tambah'){
     if (isset($_POST[tambah])){
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_jadwal_pelajaran VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[e]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]')");
        
          echo "<script>window.alert('Data Berhasil di Simpan !')</script>";
        echo "<script>document.location='index.php?view=jadwalpelajaran';</script>";
    }
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Jadwal Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  
                    <div class='form-group'>
                    <label for=''>Tahun Ajaran</label>
                    <select class='form-control' name='a'> 
                      <option value='0' selected>- Pilih Tahun Ajaran -</option>"; 
                      $tahun = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik");
                      while($a = mysqli_fetch_array($tahun)){
                        echo "<option value='$a[id_tahun_akademik]'>$a[nama_tahun]</option>";
                      }
                      echo "</select>
                    </div>

                    <div class='form-group'>
                    <label for=''>Kelas</label>
                    <select class='form-control' name='b'> 
                    <option value='0' selected>- Pilih Kelas -</option>"; 
                    $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas order by kode_kelas asc");
                    while($a = mysqli_fetch_array($kelas)){
                      echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                    }
                    echo "</select>
                    </div>

                    <div class='form-group'>
                    <label for=''>Mata Pelajaran</label>
                    <select class='form-control' name='c'> 
                    <option value='0' selected>- Pilih Mata Pelajaran -</option>"; 
                    $mapel = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_mata_pelajaran");
                    while($a = mysqli_fetch_array($mapel)){
                      echo "<option value='$a[kode_pelajaran]'>$a[namamatapelajaran]</option>";
                    }
                    echo "</select>
                    </div>

                   

                    <div class='form-group'>
                    <label for=''>Guru</label>
                    <select class='form-control' name='e'> 
                    <option value='0' selected>- Pilih Guru -</option>"; 
                    $guru = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru");
                    while($a = mysqli_fetch_array($guru)){
                      echo "<option value='$a[nip]'>$a[nama_guru]</option>";
                    }
                    echo "</select>
                    </div>

                    <div class='form-group'>
                    <label for=''>Jam Mulai</label>
                   <input type='text' class='form-control' name='h' placeholder='hh:ii:ss' value='".date('H:i:s')."'>
                    </div>

                    <div class='form-group'>
                    <label for=''>Jam Selesai</label>
                    <input type='text' class='form-control' name='i' placeholder='hh:ii:ss' value='".date('H:i:s')."'>
                    </div>

                    <div class='form-group'>
                    <label for=''>Hari</label>
                    <select class='form-control' name='j'>
                    <option value='0' selected>- Pilih Hari -</option>
                    <option value='Senin'>Senin</option>
                    <option value='Selasa'>Selasa</option>
                    <option value='Rabu'>Rabu</option>
                    <option value='Kamis'>Kamis</option>
                    <option value='Jumat'>Jumat</option>
                    <option value='Sabtu'>Sabtu</option>
                    <option value='Minggu'>Minggu</option>
                    </select>
                    </div>

                    <div class='form-group'>
                    <label for=''>Aktif</label><br>
                    <input type='radio' name='k' value='Ya' checked> Ya
                    <input type='radio' name='k' value='Tidak'> Tidak
                    </div>

                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=kelas'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_jadwal_pelajaran SET id_tahun_akademik = '$_POST[a]',
                                                    kode_kelas = '$_POST[b]',
                                                    kode_pelajaran = '$_POST[c]',
                                                    nip = '$_POST[e]',
                                                    jam_mulai = '$_POST[h]',
                                                    jam_selesai = '$_POST[i]',
                                                    hari = '$_POST[j]',
                                                    aktif = '$_POST[k]' where kodejdwl='$_POST[id]'");
        echo "<script>document.location='index.php?view=jadwalpelajaran';</script>";
    }
    $e = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_jadwal_pelajaran where kodejdwl='$_GET[id]'"));
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Jadwal Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type='hidden' name='id' value='$_GET[id]'>
                    <tr><th style='width:120px' scope='row'>Tahun Akademik</th>   <td><select class='form-control' name='a'> 
                                                <option value='0' selected>- Pilih Tahun Akademik -</option>"; 
                                                $tahun = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik");
                                                while($a = mysqli_fetch_array($tahun)){
                                                  if ($e[id_tahun_akademik]==$a[id_tahun_akademik]){
                                                    echo "<option value='$a[id_tahun_akademik]' selected>$a[nama_tahun]</option>";
                                                  }else{
                                                    echo "<option value='$a[id_tahun_akademik]'>$a[nama_tahun]</option>";
                                                  }
                                                }
                                                echo "</select>
                    </td></tr>
                    <tr><th scope='row'>Kelas</th>   <td><select class='form-control' name='b'> 
                                                <option value='0' selected>- Pilih Kelas -</option>"; 
                                                $kelas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas order by kode_kelas asc");
                                                while($a = mysqli_fetch_array($kelas)){
                                                  if ($e[kode_kelas]==$a[kode_kelas]){
                                                    echo "<option value='$a[kode_kelas]' selected>$a[nama_kelas]</option>";
                                                  }else{
                                                    echo "<option value='$a[kode_kelas]'>$a[nama_kelas]</option>";
                                                  }
                                                }
                                                echo "</select>
                    </td></tr>
                    <tr><th scope='row'>Mata Pelajaran</th>   <td><select class='form-control' name='c'> 
                                                <option value='0' selected>- Pilih Mata Pelajaran -</option>"; 
                                                $mapel = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_mata_pelajaran");
                                                while($a = mysqli_fetch_array($mapel)){
                                                  if ($e[kode_pelajaran]==$a[kode_pelajaran]){
                                                    echo "<option value='$a[kode_pelajaran]' selected>$a[namamatapelajaran]</option>";
                                                  }else{
                                                    echo "<option value='$a[kode_pelajaran]'>$a[namamatapelajaran]</option>";
                                                  }
                                                }
                                                echo "</select>
                    </td></tr>
                    
                    <tr><th scope='row'>Guru</th>   <td><select class='form-control' name='e'> 
                                                <option value='0' selected>- Pilih Guru -</option>"; 
                                                $guru = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru");
                                                while($a = mysqli_fetch_array($guru)){
                                                  if ($e[nip]==$a[nip]){
                                                    echo "<option value='$a[nip]' selected>$a[nama_guru]</option>";
                                                  }else{
                                                    echo "<option value='$a[nip]'>$a[nama_guru]</option>";
                                                  }
                                                }
                                                echo "</select>
                    </td></tr>
                    <tr><th scope='row'>Jam Mulai</th>  <td><input type='text' class='form-control' name='h' placeholder='hh:ii:ss' value='$e[jam_mulai]'></td></tr>
                    <tr><th scope='row'>Jam Selesai</th><td><input type='text' class='form-control' name='i' placeholder='hh:ii:ss' value='$e[jam_selesai]'></td></tr>
                    <tr><th scope='row'>Hari</th>  <td><select class='form-control' name='j'>
                                                <option value='$e[hari]' selected>$e[hari]</option>
                                                <option value='Senin'>Senin</option>
                                                <option value='Selasa'>Selasa</option>
                                                <option value='Rabu'>Rabu</option>
                                                <option value='Kamis'>Kamis</option>
                                                <option value='Jumat'>Jumat</option>
                                                <option value='Sabtu'>Sabtu</option>
                                                <option value='Minggu'>Minggu</option>
                    </td></tr>
                    <tr><th scope='row'>Aktif</th>                <td>";
                                                                  if ($e[aktif]=='Ya'){
                                                                      echo "<input type='radio' name='k' value='Ya' checked> Ya
                                                                             <input type='radio' name='k' value='Tidak'> Tidak";
                                                                  }else{
                                                                      echo "<input type='radio' name='k' value='Ya'> Ya
                                                                             <input type='radio' name='k' value='Tidak' checked> Tidak";
                                                                  }
                  echo "</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=kelas'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>