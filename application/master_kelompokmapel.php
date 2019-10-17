<?php if ($_GET[act]==''){ ?> 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kelompok Mata Pelajaran </h3>
                  <?php if($_SESSION[level]!='kepala'){ ?>
                  <a class='pull-right btn btn-info btn-sm' href='index.php?view=kelompokmapel&act=tambah'>Tambahkan Data</a>
                  <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Jenis</th>
                        <th>Nama Kelompok</th>
                        <?php if($_SESSION[level]!='kepala'){ ?>
                        <th style='width:70px'>Action</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelompok_mata_pelajaran ORDER BY id_kelompok_mata_pelajaran DESC");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[jenis_kelompok_mata_pelajaran]</td>
                              <td>$r[nama_kelompok_mata_pelajaran]</td>";
                              if($_SESSION[level]!='kepala'){
                        echo "<td><center>
                                <a class='fa fa-fw fa-edit' title='Edit Data' href='index.php?view=kelompokmapel&act=edit&id=$r[id_kelompok_mata_pelajaran]'></a>
                                <a class='fa fa-fw fa-eraser' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\" title='Delete Data' href='index.php?view=kelompokmapel&hapus=$r[id_kelompok_mata_pelajaran]'></a>
                              </center></td>";
                              }
                            echo "</tr>";
                      $no++;
                      }

                      if (isset($_GET[hapus])){
                          mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM rb_kelompok_mata_pelajaran where id_kelompok_mata_pelajaran='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=kelompokmapel';</script>";
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
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE rb_kelompok_mata_pelajaran SET jenis_kelompok_mata_pelajaran = '$_POST[a]',
                                         nama_kelompok_mata_pelajaran = '$_POST[b]' where id_kelompok_mata_pelajaran='$_POST[id]'");
      echo "<script>document.location='index.php?view=kelompokmapel';</script>";
    }
    $edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelompok_mata_pelajaran where id_kelompok_mata_pelajaran='$_GET[id]'");
    $s = mysqli_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Kelompok Mata Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                 
                    <input type='hidden' name='id' value='$s[id_kelompok_mata_pelajaran]'>

                    <div class='form-group'>
                    <label for=''>Jenis</label>
                    <input type='text' class='form-control' name='a' value='$s[jenis_kelompok_mata_pelajaran]'> 
                    </div>
                    <div class='form-group'>
                    <label for=''>Nama Kelompok</label>
                    <input type='text' class='form-control' name='b' value='$s[nama_kelompok_mata_pelajaran]'> 
                    </div>

                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>Update</button>
                    <a href='index.php?view=kelompokmapel'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO rb_kelompok_mata_pelajaran VALUES('','$_POST[a]','$_POST[b]')");
        
          echo "<script>window.alert('Data Berhasil di Simpan !')</script>";
        echo "<script>document.location='index.php?view=kelompokmapel';</script>";
    }

    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Kelompok Mata Pelajaran</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                <div class='form-group'>
                <label for=''>Jenis</label>
                <input type='text' class='form-control' name='a' > 
                </div>
                <div class='form-group'>
                <label for=''>Nama Kelompok</label>
                <input type='text' class='form-control' name='b' > 
                </div>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=kelompokmapel'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>
            </div>";
}
?>