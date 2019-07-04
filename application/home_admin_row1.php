            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box">
                
               
               
                  <center><h2 style="padding-top: 28px;">SISTEM INFORMASI NILAI RAPORT SMP NEGERI 2 KAJEN</h2></center>
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <a style='color:#000' href='index.php?view=siswa'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                <?php $siswa = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM rb_siswa")); ?>
                  <span class="info-box-text">Siswa</span>
                  <span class="info-box-number"><?php echo $siswa[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='index.php?view=guru'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                <?php $guru = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(*) as total FROM rb_guru")); ?>
                  <span class="info-box-text">Guru</span>
                  <span class="info-box-number"><?php echo $guru[total]; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            