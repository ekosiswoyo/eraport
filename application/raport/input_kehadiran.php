
<?php 
if ($_GET[act]==''){ 
    if (isset($_POST[simpan])){
            if ($_POST[status]=='Update'){
              mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_kehadiran SET sakit='$_POST[a]', izin='$_POST[b]', alpha='$_POST[c]' where id_kehadiran='$_POST[id]'");
            }else{
              mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_kehadiran VALUES('','$_POST[nisn]','$_SESSION[kode_kelas]','$_POST[a]','$_POST[b]','$_POST[c]')");
            }
        echo "<script>document.location='index.php?view=kehadiran&kelas=$_SESSION[kode_kelas]#$_POST[nisn]';</script>";
    }

    if (isset($_GET[delete])){
        mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_kehadiran where id_kehadiran='$_GET[delete]'");
        echo "<script>document.location='index.php?view=kehadiran&kelas=$_SESSION[kode_kelas]#$_POST[nisn]';</script>";
    }
?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-body">
                <?php 
                  echo "<table id='example' class='table table-bordered table-striped'>
                    <thead>
                      <tr><th rowspan='2'>No</th>
                        <th>NISN</th>
                        <th width='170px'>Nama Siswa</th>
                        <th width='270px'><center>Sakit</center></th>
                        <th width='270px'><center>Izin</center></th>
                        <th width='270px'><center>Alpha</center></th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>";

                 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a, rb_kelas b, rb_guru c WHERE a.kode_kelas=b.kode_kelas AND a.kode_kelas=c.kode_kelas AND a.kode_kelas='$_SESSION[kode_kelas]' ORDER BY a.id_siswa");
                    
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                      if (isset($_GET[edit])){
                          $e = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kehadiran where id_kehadiran='$_GET[edit]'"));
                          $name = 'Update';
                      }else{
                          $name = 'Simpan';
                      }

                  if ($_GET[nisn]==$r[nisn]){   
                    echo "<form action='index.php?view=kehadiran&tahun=$_GET[tahun]&kelas=$_GET[kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td style='font-size:12px' id='$r[nisn]'>$r[nama]</td>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <input type='hidden' name='id' value='$e[id_kehadiran]'>
                              <input type='hidden' name='status' value='$name'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Jumlah Sakit' value='$e[sakit]'></td>
                              <td><input type='text' name='b' class='form-control' style='width:100%; color:blue' placeholder='Jumlah Izin' value='$e[izin]'></td>
                              <td><input type='text' name='c' class='form-control' style='width:100%; color:blue' placeholder='Jumlah Alpha' value='$e[alpha]'></td>
                              
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'></td>
                            </tr>
                          </form>";
                  }else{
                    echo "<form action='index.php?view=kehadiran&tahun=kelas=$_SESSION[kode_kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nisn]</td>
                              <td style='font-size:12px' id='$r[nisn]'>$r[nama]</td>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <input type='hidden' name='nisn' value='$r[nisn]'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Jumlah Sakit'></td>
                              <td><input type='text' name='b' class='form-control' style='width:100%; color:blue' placeholder='Jumlah Izin'></td>
                              <td><input type='text' name='c' class='form-control' style='width:100%; color:blue' placeholder='Jumlah Alpha'></td>
                              
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'></td>
                            </tr>
                          </form>";
                  }

                            $pe = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kehadiran where nisn='$r[nisn]' AND kode_kelas='$_SESSION[kode_kelas]'");
                            while ($n = mysqli_fetch_array($pe)){
                                echo "<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>$n[sakit]</td>
                                        <td>$n[izin]</td>
                                        <td>$n[alpha]</td>
                                        <td width='90px' align=center><a href='index.php?view=kehadiran&kelas=".$_GET[kelas]."&edit=".$n[id_kehadiran]."&nisn=".$r[nisn]."#$r[nisn]' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-edit'></span></a>
                                                        <a href='index.php?view=kehadiran&kelas=".$_GET[kelas]."&delete=".$n[id_kehadiran]."&nisn=".$r[nisn]."' class='btn btn-xs btn-danger' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a></td>
                                      </tr>";
                            }
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              
              </div><!-- /.box -->
              
            </div>
<?php }  ?>