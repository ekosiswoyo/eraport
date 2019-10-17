
<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image"> --><br>

             <!-- <p style="color:#ffffff;"><?php echo $nama; ?></p>
               <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>

           <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-calendar"></i> <span>Laporan Nilai Siswa</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              
                <li><a href="index.php?view=raportuts&act=detailguru"><i class="fa fa-circle-o"></i> Input Nilai UTS</a></li>
                <li><a href="index.php?view=raport&act=detailguru"><i class="fa fa-circle-o"></i> Input Nilai Raport</a></li>
                <li><a href="index.php?view=extrakulikuler"><i class="fa fa-circle-o"></i> Data Extrakulikuler</a></li>
              </ul>
            </li>
            <?php
           
            if($kode_kelas != '0' ){
              echo " <li classtreeview'>
              <a href='#'><i class='fa fa-calendar'></i> <span>Menu Wali Kelas</span><i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
              <li><a href='index.php?view=capaianhasilbelajar'><i class='fa fa-circle-o'></i> Data Capaian Belajar</a></li>
                
                <li><a href='index.php?view=prestasi'><i class='fa fa-circle-o'></i> Data Prestasi</a></li>
              <li><a href='index.php?view=catatan'><i class='fa fa-circle-o'></i> Input Catatan Raport</a></li>
              <li><a href='index.php?view=kehadiran'><i class='fa fa-circle-o'></i> Input Kehadiran</a></li>
              <li><a href='index.php?view=utssiswa'><i class='fa fa-circle-o'></i> Data UTS Siswa</a></li>
              <li><a href='index.php?view=raportsiswa'><i class='fa fa-circle-o'></i> Data Raport Siswa</a></li>

                
              </ul>
            </li>
              <li class='treeview'>
              <a href='#''><i class='fa fa-calendar'></i> <span>Cetak Laporan Nilai Siswa</span><i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
               
                <li><a href='index.php?view=raportcetakuts'><i class='fa fa-circle-o'></i> Cetak Raport UTS</a></li>

                <li><a href='index.php?view=raportcetak'><i class='fa fa-circle-o'></i> Cetak Raport</a></li>
                
              </ul>
            </li>";
            }
            ?>
            
          </ul>
        </section>