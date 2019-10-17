<?php 
session_start();
error_reporting(0);
include "config/koneksi.php"; 
include "config/fungsi_indotgl.php"; 
$kls =  $_GET[kelas];
$frt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_header_print ORDER BY id_header_print DESC LIMIT 1")); 
$nip =  mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_kelas a, rb_guru b where a.kode_kelas='$kls' and a.nip=b.nip"));

$kepsek = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_users where level='kepala' and aktif='Y' order by id_user desc limit 1")); 
?>
<head>
<title>Data Siswa Kelas <?php echo $_GET[kelas]; ?></title>
<link rel="stylesheet" href="bootstrap/css/printer.css">
</head>
<body onload="window.print()">
<?php
            echo "<h2><center>Semua Data Siswa Kelas $_GET[kelas] <br></center></h2>
                <table width='100%' id='tablemodul1'>
                    <thead>
                      <tr><th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>";
                      echo "</tr>
                    </thead>
                    <tbody>";

                  if ($_GET[kelas] != '' AND $_GET[angkatan] != ''){
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas where a.kode_kelas='$_GET[kelas]' AND a.angkatan='$_GET[angkatan]' ORDER BY a.nis");
                  }elseif ($_GET[kelas] != '' AND $_GET[angkatan] == ''){
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas where a.kode_kelas='$_GET[kelas]' ORDER BY a.nis");
                  }elseif ($_GET[kelas] == '' AND $_GET[angkatan] != ''){
                    $tampil = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa a LEFT JOIN rb_kelas b ON a.kode_kelas=b.kode_kelas where a.angkatan='$_GET[angkatan]' ORDER BY a.nis");
                  }
                    $no = 1;
                    while($r=mysqli_fetch_array($tampil)){
                    echo "<tr>";
                              echo "<td>$no</td>
                              <td>$r[nis]</td>
                              <td style='font-size:12px'>$r[nama]</td>
                              <td>$r[jenis_kelamin]</td>";
                            echo "</tr>";
                      $no++;
                      }

                  ?>
                    </tbody>
                  </table>

<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala SMP NEGERI 2 KAJEN</td>
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
      <b><?php echo $nip[nama_guru]; ?><br />
      NIP : <?php echo $nip[nip]; ?></b>
    </td>
  </tr>
</table> 
</body>