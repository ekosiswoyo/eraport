            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php if (isset($_GET[tahun])){ echo "Laporan Nilai Raport Siswa"; }else{ echo "Laporan Nilai Raport Siswa ".date('Y'); } ?></h3>
                  <form style='margin-right:5px; margin-top:0px' class='pull-right' action='' method='GET'>
                    <input type="hidden" name='view' value='raport'>
                    <input type="hidden" name='act' value='nilairaportkepsek'>
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Jadwal Pelajaran</th>
                        <th>Kelas</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Semester</th>
                        <?php 
                          if (isset($_GET[tahun])){
                            echo "<th>Action</th>";
                          }
                        ?>
                      </tr>
                    </thead>
                    <tbody>


                      
                                                    
                                                    


                  <?php
                    if (isset($_GET[tahun])){
                      $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.*, e.nama_kelas, b.namamatapelajaran, b.kode_pelajaran,  c.nama_guru FROM rb_jadwal_pelajaran a 
                                            JOIN rb_mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran
                                              JOIN rb_guru c ON a.nip=c.nip 
                                                  JOIN rb_kelas e ON a.kode_kelas=e.kode_kelas 
                                                  where  a.id_tahun_akademik='$_GET[tahun]' GROUP BY b.kode_pelajaran ORDER BY a.hari DESC");
                    
                    }else{
                      $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.*, e.nama_kelas, b.namamatapelajaran, b.kode_pelajaran,  c.nama_guru FROM rb_jadwal_pelajaran a 
                                            JOIN rb_mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran
                                              JOIN rb_guru c ON a.nip=c.nip 
                                                  JOIN rb_kelas e ON a.kode_kelas=e.kode_kelas 
                                                  where a.id_tahun_akademik LIKE '".date('Y')."%' GROUP BY b.kode_pelajaran ORDER BY a.hari DESC");
                    }
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[namamatapelajaran]</td>
                              <td>$r[nama_kelas]</td>
                              <td>$r[nama_guru]</td>
                              <td>$r[hari]</td>
                              <td>$r[jam_mulai]</td>
                              <td>$r[jam_selesai]</td>
                              <td>$r[id_tahun_akademik]</td>";
                              if (isset($_GET[tahun])){
                                echo "<td style='width:255px !important'>
                                          <a class='btn btn-warning btn-xs' title='Lihat Nilai Sikap Siswa' href='index.php?view=raport&act=listsiswasikapwali&jdwl=$r[kodejdwl]&kd=$r[kode_pelajaran]&id=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-th-list'></span> Sikap</a>
                                          <a class='btn btn-success btn-xs' title='Lihat Nilai Pengetahuan Siswa' href='index.php?view=raport&act=listsiswawali&jdwl=$r[kodejdwl]&kd=$r[kode_pelajaran]&id=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-th-list'></span> Pengetahuan</a>
                                          <a class='btn btn-primary btn-xs' title='Lihat Nilai Keterampilan Siswa' href='index.php?view=raport&act=listsiswaketerampilanwali&jdwl=$r[kodejdwl]&kd=$r[kode_pelajaran]&id=$r[kode_kelas]&tahun=$_GET[tahun]'><span class='glyphicon glyphicon-th-list'></span> Keterampilan</a>
                                        </td>";
                              }
                          
                          echo "</tr>";
                      $no++;
                      }
                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
                </div>
            </div>