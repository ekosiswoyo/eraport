<?php 
session_start();
error_reporting(0);
include "../config/koneksi.php"; 
include "../config/fungsi_indotgl.php"; 
$frt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_header_print ORDER BY id_header_print DESC LIMIT 1")); 

$kepsek = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_users where level='kepala' and aktif='Y' order by id_user desc limit 1")); 
?>
<head>
<title>Hal 4 - Raport Siswa</title>
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
        <tr><td>No Induk Siswa</td>            <td> : $s[nis] / $s[nis]</td>        <td></td></tr>
      </table><br>";

echo "<table id='tablemodul1' width=100% border=1>
          <tr>
            <th width='160px' colspan='2' rowspan='2'>Mata Pelajaran</th>
            <th colspan='3' style='text-align:center'>Keterampilan</th>
          </tr>
          <tr>
            <th>Nilai</th>
            <th>Predikat</th>
            <th>Deskripsi</th>
          </tr>";
      $kelompok = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelompok_mata_pelajaran");  
      while ($k = mysqli_fetch_array($kelompok)){
      echo "<tr>
            <td colspan='9'><b>$k[nama_kelompok_mata_pelajaran]</b></td>
          </tr>";
        $mapel = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  rb_jadwal_pelajaran a JOIN rb_mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran 
                                  where a.kode_kelas='$_GET[kelas]' AND a.id_tahun_akademik='$_GET[tahun]' AND b.id_kelompok_mata_pelajaran='$k[id_kelompok_mata_pelajaran]'");
        $no = 1;
        while ($m = mysqli_fetch_array($mapel)){                                
        $rapn = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum((nilai1+nilai2+nilai3+nilai4)/4)/count(nis) as raport, deskripsi FROM rb_nilai_pengetahuan where kodejdwl='$m[kodejdwl]' AND nis='$s[nis]'"));
        $cekpredikat = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat"));
            if ($cekpredikat >= 1){
                $grade3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `rb_predikat` where (".number_format($rapn[raport])." >=nilai_a) AND (".number_format($rapn[raport])." <= nilai_b)"));
            }else{
                $grade3 = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `rb_predikat` where (".number_format($rapn[raport])." >=nilai_a) AND (".number_format($rapn[raport])." <= nilai_b)"));
            }

        $rapnk = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum((nilai1+nilai2+nilai3+nilai4)/4)/count(nis) as raport, deskripsi FROM rb_nilai_keterampilan where kodejdwl='$m[kodejdwl]' AND nis='$s[nis]'"));
        $cekpredikat2 = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat"));
            if ($cekpredikat2 >= 1){
                $grade = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `rb_predikat` where (".number_format($rapnk[raport])." >=nilai_a) AND (".number_format($rapnk[raport])." <= nilai_b)"));
            }else{
                $grade = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `rb_predikat` where (".number_format($rapnk[raport])." >=nilai_a) AND (".number_format($rapnk[raport])." <= nilai_b)"));
            }

        echo "<tr>
                <td align=center>$no</td>
                <td>$m[namamatapelajaran]</td>
                <td align=center>".number_format($rapnk[raport])."</td>
                <td align=center>$grade[grade]</td>

                <td>$rapnk[deskripsi]</td>
            </tr>";
        $no++;
        }
      }

        echo "</table><br/>";
        $cekpredikat1 = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat where kode_kelas='$_GET[kelas]'"));
        if ($cekpredikat1 >= 1){
          $grade = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat where kode_kelas='$_GET[kelas]'");
          $gradea = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat where kode_kelas='$_GET[kelas]'");
          $total = mysqli_num_rows($grade);
        }else{
          $grade = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat where kode_kelas='0'");
          $gradea = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_predikat where kode_kelas='0'");
          $total = mysqli_num_rows($grade);
        }
          echo "<center><table width='90%' border=1 id='tablemodul1'>
              <tr>
                  <th rowspan='2'>KKM</th>
                  <th colspan='$total'>Predikat</th>
              </tr>
              <tr>";
                  while ($g = mysqli_fetch_array($grade)){
                      echo "<th>$g[grade] = $g[keterangan]</th>";
                  }
              echo "</tr>
              <tr>
                  <th>75</th>";
                  while ($p = mysqli_fetch_array($gradea)){
                      echo "<th>$p[nilai_a] - $p[nilai_b]</th>";
                  }
              echo "</tr>
          </table></center><br>";
?>

<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala SMP Negeri 2 Kajen</td>
    <td width="260" align="left">Pekalongan, <?php echo tgl_raport(date("Y-m-d")); ?> <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br /><br /><br />
    <b><?php echo "$kepsek[nama_lengkap]"; ?><br>
      NIP : <?php echo "$kepsek[username]"; ?></b>
    </td>

    <td align="left" valign="top"><br /><br /><br /><br /><br />
      <b><?php echo $s[walikelas]; ?><br />
      NIP : <?php echo $s[nip]; ?></b>
    </td>
  </tr>
</table> 
</body>