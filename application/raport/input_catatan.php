
<?php 
if ($_GET[act]==''){ 
    if (isset($_POST[simpan])){
            if ($_POST[status]=='Update'){
              mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_catatan SET catatan='$_POST[a]' where id_catatan='$_POST[id]'");
            }else{
              mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_catatan VALUES('','$_POST[nis]','$_SESSION[kode_kelas]','$_POST[a]')");
            }
        echo "<script>document.location='index.php?view=catatan&kelas=$_SESSION[kode_kelas]#$_POST[nis]';</script>";
    }

    if (isset($_GET[delete])){
        mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_catatan where id_catatan='$_GET[delete]'");
        echo "<script>document.location='index.php?view=catatan&kelas=$_SESSION[kode_kelas]#$_POST[nis]';</script>";
    }
?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-body">
                <?php 
                  echo "<table id='example' class='table table-bordered table-striped'>
                    <thead>
                      <tr><th rowspan='2'>No</th>
                        <th>NIS</th>
                        <th width='170px'>Nama Siswa</th>
                        <th width='270px'><center>Catatan</center></th>
                        <th><center>Action</center></th>
                      </tr>
                    </thead>
                    <tbody>";

                 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a, rb_kelas b, rb_guru c WHERE a.kode_kelas=b.kode_kelas AND a.kode_kelas=c.kode_kelas AND a.kode_kelas='$_SESSION[kode_kelas]' group by a.nis ORDER BY a.nis");
                    
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                      if (isset($_GET[edit])){
                          $e = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_catatan where id_catatan='$_GET[edit]'"));
                          $name = 'Update';
                      }else{
                          $name = 'Simpan';
                      }

                  if ($_GET[nis]==$r[nis]){   
                    echo "<form action='index.php?view=catatan&tahun=$_GET[tahun]&kelas=$_GET[kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nis]</td>
                              <td style='font-size:12px' id='$r[nis]'>$r[nama]</td>
                              <input type='hidden' name='nis' value='$r[nis]'>
                              <input type='hidden' name='id' value='$e[id_catatan]'>
                              <input type='hidden' name='status' value='$name'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Catatan...' value='$e[catatan]'></td>
                              
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'></td>
                            </tr>
                          </form>";
                  }else{
                    echo "<form action='index.php?view=catatan&tahun=kelas=$_SESSION[kode_kelas]' method='POST'>
                            <tr><td>$no</td>
                              <td>$r[nis]</td>
                              <td style='font-size:12px' id='$r[nis]'>$r[nama]</td>
                              <input type='hidden' name='nis' value='$r[nis]'>
                              <input type='hidden' name='nis' value='$r[nis]'>
                              <td><input type='text' name='a' class='form-control' style='width:100%; color:blue' placeholder='Tuliskan Catatan...'></td>
                              
                              <td align=center><input type='submit' name='simpan' class='btn btn-xs btn-primary' style='width:65px' value='$name'></td>
                            </tr>
                          </form>";
                  }

                            $pe = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_catatan where nis='$r[nis]' AND kode_kelas='$_SESSION[kode_kelas]'");
                            while ($n = mysqli_fetch_array($pe)){
                                echo "<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>$n[catatan]</td>
                                        <td width='90px' align=center><a href='index.php?view=catatan&kelas=".$_GET[kelas]."&edit=".$n[id_catatan]."&nis=".$r[nis]."#$r[nis]' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-edit'></span></a>
                                                        <a href='index.php?view=catatan&kelas=".$_GET[kelas]."&delete=".$n[id_catatan]."&nis=".$r[nis]."' class='btn btn-xs btn-danger' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a></td>
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