<?php 
session_start();
error_reporting(0);
include "../config/koneksi.php"; 
include "../config/fungsi_indotgl.php"; 
$frt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_header_print ORDER BY id_header_print DESC LIMIT 1")); 
?>
<head>
<title>Hal 6 - Raport Siswa</title>
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

echo "SIKAP<br>
1. SIKAP SPIRITUAL
<table id='tablemodul1' width=100% style='margin-top:2px' border=1>
          <tr>
            <th>Predikat</th>
            <th>Deskripsi</th>
          </tr>";
      $n = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_nilai_sikap_semester where id_tahun_akademik='$_GET[tahun]' AND nis='$s[nis]' AND kode_kelas='$_GET[kelas]'");
      while ($k = mysqli_fetch_array($n)){
      echo "<tr>
            <td>$k[spiritual_predikat]</td>
                <td>$k[spiritual_deskripsi]</td>
          </tr>";
        
      }



        echo "</table><br/>";


echo "
2. SIKAP SOSIAL
<table id='tablemodul1' width=100% style='margin-top:2px' border=1>
          <tr>
            <th>Predikat</th>
            <th>Deskripsi</th>
          </tr>";
      $n = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_nilai_sikap_semester where id_tahun_akademik='$_GET[tahun]' AND nis='$s[nis]' AND kode_kelas='$_GET[kelas]'");
      while ($k = mysqli_fetch_array($n)){
      echo "<tr>
            <td>$k[sosial_predikat]</td>
                <td>$k[sosial_deskripsi]</td>
          </tr>";
        
      }
       echo "</table><br/>";

echo "DESKRIPSI PENGETAHUAN DAN KETERAMPILAN
<table id='tablemodul1' width=100% style='margin-top:2px' border=1>
          <tr>
            <th width='160px' colspan='2'>Mata Pelajaran</th>
            <th width='140px'>Aspek</th>
            <th>Deskripsi</th>
          </tr>";
      $kelompok = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelompok_mata_pelajaran");  
      while ($k = mysqli_fetch_array($kelompok)){
      echo "<tr>
            <td colspan='7'><b>$k[nama_kelompok_mata_pelajaran]</b></td>
          </tr>";
        $mapel = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM  rb_jadwal_pelajaran a JOIN rb_mata_pelajaran b ON a.kode_pelajaran=b.kode_pelajaran 
                                  where a.kode_kelas='$_GET[kelas]' AND a.id_tahun_akademik='$_GET[tahun]' AND b.id_kelompok_mata_pelajaran='$k[id_kelompok_mata_pelajaran]'");
        $no = 1;
        while ($m = mysqli_fetch_array($mapel)){
        $maxn = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ((nilai1+nilai2+nilai3+nilai4+nilai5)/5) as rata_rata, deskripsi FROM rb_nilai_pengetahuan where kodejdwl='$m[kodejdwl]' AND nis='$s[nis]' ORDER BY rata_rata DESC LIMIT 1"));
        $maxnk = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT deskripsi, GREATEST(nilai1,nilai2,nilai3,nilai4,nilai5,nilai6) as tertinggi FROM rb_nilai_keterampilan where kodejdwl='$m[kodejdwl]' AND nis='$s[nis]' ORDER BY tertinggi DESC LIMIT 1"));
        echo "<tr>
                <td width='30px' rowspan=2 align=center>$no</td>
                <td width='160px' rowspan=2>$m[namamatapelajaran]</td>
                <td>Pengetahuan</td>
                <td>$maxn[deskripsi]</td>
            </tr>
            <tr>
                <td>Keterampilan</td>
                <td>$maxnk[deskripsi]</td>
            </tr>";
        $no++;
        }
      }

        echo "</table><br/>";
?>
</body>