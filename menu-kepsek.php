<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image"> --><br>
            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
           <!--  <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> <span>Data Pengguna</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=siswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
                <li><a href="index.php?view=guru"><i class="fa fa-circle-o"></i> Data Guru</a></li>
                <li><a href="index.php?view=wakilkepala"><i class="fa fa-circle-o"></i> Data Kepala Sekolah</a></li>
              </ul>
            </li> -->
            <!-- <li class="treeview">
              <a href="#"><i class="fa fa-th"></i> <span>Data Master</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
                <li><a href="index.php?view=matapelajaran"><i class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
                <li><a href="index.php?view=jadwalpelajaran"><i class="fa fa-circle-o"></i> Data Jadwal Pelajaran</a></li>
              </ul>
            </li>
            -->
            <li><a href="index.php?view=raportall"><i class="fa fa-calendar"></i> <span>Laporan Nilai</span></a></li>
            <li><a href="index.php?view=raport&act=nilaiutskepsek"><i class="fa fa-calendar"></i> <span>Data UTS Siswa</span></a></li>

            <li><a href="index.php?view=raport&act=nilairaportkepsek"><i class="fa fa-calendar"></i> <span>Data Raport Siswa</span></a></li>
          </ul>
        </section>