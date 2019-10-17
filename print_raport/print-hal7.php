<?php 
session_start();
error_reporting(0);
include "../config/koneksi.php"; 
include "../config/fungsi_indotgl.php"; 
$skp = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_nilai_sikap_semester where id_tahun_akademik='$_GET[tahun]' AND nis='$_GET[id]' AND kode_kelas='$_GET[kelas]'")); 

$kepsek = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_users where level='kepala' and aktif='Y' order by id_user desc limit 1")); 
?>
<html>
<head>
<title>Hal 7 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<?php
$t = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_tahun_akademik where id_tahun_akademik='$_GET[tahun]'"));
$s = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT a.*, b.*, c.nama_guru as walikelas, c.nip FROM rb_siswa a 
                                      JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas 
                                        LEFT JOIN rb_guru c ON b.nip=c.nip where a.nis='$_GET[id]'"));
if (substr($_GET[tahun],4,5)=='1'){ $semester = 'Ganjil'; }else{ $semester = 'Genap'; }

echo "<table width=100%>
        <tr><td width=140px>Nama Sekolah</td> <td> : SMP NEGERI 2 KAJEN </td>       <td width=140px>Kelas </td>   <td>: $s[kode_kelas]</td></tr>
        <tr><td>Alamat</td>                   <td> : Jl. Pahlawan No. 737 </td>     <td>Semester </td> <td>: $semester</td></tr>
        <tr><td>Nama Peserta Didik</td>       <td> : <b>$s[nama]</b> </td>           <td>Tahun Pelajaran </td> <td>: 2019/2020</td></tr>
        <tr><td>No Induk Siswa</td>            <td> : $s[nipd] / $s[nis]</td>        <td></td></tr>
      </table><br>";

echo "<b>C. Extrakulikuler</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Kegiatan Extrakulikuler</th>
            <th>Nilai</th>
            <th>Deskripsi</th>
          </tr>";

          $extra = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_nilai_extrakulikuler where id_tahun_akademik='$_GET[tahun]' AND nis='$_GET[id]' AND kode_kelas='$_GET[kelas]'");
          $no = 1;
          while ($ex = mysqli_fetch_array($extra)){
            echo "<tr>
                    <td>$no</td>
                    <td>$ex[kegiatan]</td>
                    <td>$ex[nilai]</td>
                    <td>$ex[deskripsi]</td>
                  </tr>";
              $no++;
          }
      echo "</table>";

echo "<b>D. Prestasi</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='40px'>No</th>
            <th width='30%'>Jenis Kegiatan</th>
            <th>Keterangan</th>
          </tr>";

          $prestasi = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_nilai_prestasi where id_tahun_akademik='$_GET[tahun]' AND nis='$_GET[id]' AND kode_kelas='$_GET[kelas]'");
          $no = 1;
          while ($pr = mysqli_fetch_array($prestasi)){
            echo "<tr>
                    <td>$no</td>
                    <td>$pr[jenis_kegiatan]</td>
                    <td>$pr[keterangan]</td>
                  </tr>";
              $no++;
          }
      echo "</table>";

echo "<b>E. Ketidakhadiran</b>
      <table id='tablemodul1' width=85% border=1>";

      $kehadiran = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kehadiran where nis='$_GET[id]' AND kode_kelas='$_GET[kelas]' ORDER BY id_kehadiran DESC LIMIT 1");
      while ($pr = mysqli_fetch_array($kehadiran)){
      echo " <tr><td width='70%'>Sakit</td>  <td width='10px'> : </td> <td align=center>$pr[sakit]</td> </tr>
        <tr><td>Izin</td>               <td> : </td>              <td align=center>$pr[izin]</td> </tr>
        <tr><td>Tanpa Keterangan</td>   <td> : </td>              <td align=center>$pr[alpha]</td> </tr>";
      }
      echo "</table>";
 

echo "<b>F. Catatan Wali Kelas</b>";
    $catatan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_catatan where nis='$_GET[id]' AND kode_kelas='$_GET[kelas]' ORDER BY id_catatan DESC LIMIT 1");
    while ($pr = mysqli_fetch_array($catatan)){
     echo "<table id='tablemodul1' width=100% height=80px border=1>
        <tr><td>$pr[catatan]</td></tr>";
      }
      echo "</table><br>";

echo "<b>G. Tanggapan Orang tua / Wali</b>
      <table id='tablemodul1' width=100% height=80px border=1>
        <tr><td></td></tr>
      </table><br/>";

?>
<p>Naik ke Kelas :.........</p>
<p>Tinggal di Kelas :.........</p>
<i><p>*Coret yang tidak perlu</p></i>
<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala SMP Negeri 2 Kajen</td>
    <td width="260" align="left">Pekalongan, <?php echo tgl_raport(date("Y-m-d")); ?> <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br />
    <b><?php echo "$kepsek[nama_lengkap]"; ?><br>
      NIP : <?php echo "$kepsek[username]"; ?></b>
    </td>

    <td align="left" valign="top"><br /><br /><br />
      <b><?php echo $s[walikelas]; ?><br />
      NIP : <?php echo $s[nip]; ?></b>
    </td>
  </tr>
</table> 
</body>
</html>