<?php 
session_start();
error_reporting(0);
include "../config/koneksi.php"; 
include "../config/fungsi_indotgl.php"; 

?>
<html>
<head>
<title>Hal 1 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
<style type="text/css">
  td { padding:9px; }
</style>
</head>
<body onload="window.print()">
    <h1 align=center>RAPORT <br>SEKOLAH MENENGAH PERTAMA <br> (SMP)</h1><br>

    <table style='font-size:23px' width='100%'>
        <tr><td width='180px'>Nama Sekolah</td>   <td width='10px'> : </td><td> SMP NEGERI 2 KAJEN</td></tr>
        <tr><td width='180px'>NPSN/NSS</td>       <td width='10px'> : </td><td> 20323548</td></tr>
        <tr><td width='180px'>Alamat Sekolah</td> <td width='10px'> : </td><td> Jl. Pahlawan No. 737</td></tr>
        <tr><td width='180px'></td>               <td width='10px'>   </td><td> Kode Pos 51161, Telp. </td></tr>
        <tr><td width='180px'>Kelurahan</td>      <td width='10px'> : </td><td> Gejlig</td></tr>
        <tr><td width='180px'>Kecamatan</td>      <td width='10px'> : </td><td> Kec. Kajen</td></tr>
        <tr><td width='180px'>Kabupaten/Kota</td> <td width='10px'> : </td><td> Kab. Pekalongan</td></tr>
        <tr><td width='180px'>Provinsi</td>       <td width='10px'> : </td><td> Jawa Tengah</td></tr>
</table><br><br><br>
<footer>
<center>Halaman 1</center>
</footer>
</body>
</html>