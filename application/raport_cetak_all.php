<?php if ($_GET[act]==''){ 
  $k = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas where kode_kelas='$_SESSION[kode_kelas]'"));
  $t = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik where id_tahun_akademik='$_GET[tahun]'"));
?>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak Raport Semester Siswa <?php echo $_GET[tahun]; ?></h3>
                  <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
                    <input type="hidden" name='view' value='raportcetak'>
                    <select name='tahun' style='padding:4px'>
                        <?php 
                            echo "<option value=''>- Pilih Tahun Akademik -</option>";
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
                   
                    <input type="submit" style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
                  </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa ORDER BY nis");
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td width=40px>$no</td>

                              <td>$r[nis]</td>
                              <td>$r[nama]</td>
                              <td>$r[jenis_kelamin]</td>
                              <td width='420px'>
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Cover</a>
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal1.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 1</a>
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal2.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 2</a>
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal3.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 3</a>
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal4.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 4</a>
                             
                             <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal5.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 5</a>
                             
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal5.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 6</a>
                                <a target='_BLANK' class='btn btn-success btn-xs' href='print_raport/print-hal6.php?id=$r[nis]&kelas=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-print'></span> Hal 7</a>
                             </td>";
                            echo "</tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              
              </div>
            </div>




             <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cetak Raport Semester Siswa <?php echo $_GET[tahun]; ?></h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                   <h3>Keterangan : </h3>
                   <p>- Cover : Halaman Depan </p>
                   <p>- Hal 1 : Data alamat Sekolah </p>
                   <p>- Hal 2 : Identitas Siswa </p>
                   <p>- Hal 3 : Data Capaian Belajar </p>
                   <p>- Hal 4 : Nilai keterampilan </p>
                   <p>- Hal 5 : Deskripsi Pengetahuan dan Keterampilan </p>
                   <p>- Hal 6 : data nilai extra, prestasi, keidakhadiran </p>

                </div><!-- /.box-body -->
               
              </div>
            </div>

<?php } ?>