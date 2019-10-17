<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Predikat / Grade Nilai </h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Dari</th>
                        <th>Sampai</th>
                        <th>Grade</th>
                        <th>Keterangan</th>
                        <?php if($_SESSION[level]!='kepala'){ ?>
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT id_predikat, nilai_a, nilai_b, grade, keterangan FROM rb_predikat ORDER BY id_predikat DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                      if ($r[akelas]=='0'){
                          $kelas = 'Lainnya';
                      }else{
                          $kelas = $r[akelas];
                      }
                    echo "<tr><td>$no</td>
                              <td>$r[nilai_a]</td>
                              <td>$r[nilai_b]</td>
                              <td>$r[grade]</td>
                              <td>$r[keterangan]</td>";
                              if($_SESSION[level]!='kepala'){
                        echo "<td><center>
                                <a class='fa fa-fw fa-edit' title='Edit Data' href='index.php?view=predikat&act=edit&id=$r[id_predikat]'></a>
                                
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_predikat where id_predikat='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=predikat';</script>";
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
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_predikat SET  
                                         nilai_a = '$_POST[a]',
                                         nilai_b = '$_POST[b]',
                                         grade = '$_POST[c]',
                                         keterangan = '$_POST[d]' where id_predikat='$_POST[id]'");

          echo "<script>window.alert('Data Berhasil di Edit !')</script>";
      echo "<script>document.location='index.php?view=predikat';</script>";
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat where id_predikat='$_GET[id]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Predikat / Grade</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                 
                    <input type='hidden' name='id' value='$s[id_predikat]'>
                   <div class='form-group'>
                   <label>Dari</label><br>
                   <input type='text' class='form-control' name='a' value='$s[nilai_a]'>                    
                   </div>
                   <div class='form-group'>
                   <label>Sampai</label><br>
                   <input type='text' class='form-control' name='b' value='$s[nilai_b]'>                    
                   </div>
                   <div class='form-group'>
                   <label>Grade</label><br>
                   <input type='text' class='form-control' name='c' value='$s[grade]'>              
                   </div>
                   <div class='form-group'>
                   <label>Keterangan</label><br>
                   <input type='text' class='form-control' name='d' value='$s[keterangan]'>              
                   </div>
                   
                    
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=predikat'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>