<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Nilai Raport SMP N 2 KAJEN | Log in</title>
    <meta name="author" content="lokomedia.web.id">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <style>
    body {
     margin: 0;
     padding: 0;
     text-align: center;
}
.bg {
     width: 100%;
     height: 100%;
     position: fixed;
     z-index: 1;
     float: left;
     left: 0;
}
.content {
     width: 80%;
     height: auto;
     margin: 0 auto;
     position: relative;
     z-index: 5;
     background: #fff;
     padding: 30px;
     text-align: left;
}
    </style>
  </head>
  <body class="hold-transition login-page">
  
  <!-- <img src="gambarku.jpg" alt="gambar" class="bg" /> -->

  <a href="../../index2.html"> </a>
    
         
         <img src="logo.png" width="10%;height:5%;"><br>

        <h2> Sistem Informasi Nilai Raport (SINIRA)</h2> 
        <h3> Sekolah Menengah Pertama (SMP) Negeri 2 Kajen </h3>
    <div class="login-box" style="">
      <div class="login-logo" style="background-color:;">
     
      </div><!-- /.login-logo -->
      <div class="login-box-body"  style="background-color:;">
        <p class="login-box-msg">Silahkan Login Pada Form dibawah ini</p>

        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name='a' placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name='b' placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
           <!--  <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div> --><!-- /.col -->
            <div class="col-xs-4">
              <button name='login' type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div>
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

<?php 

if (isset($_POST[login])){
 $passlain=anti_injection($_POST[b]);
 $data=md5(anti_injection($_POST[b]));
 $pass=hash("sha512",$data);
 $admin = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_users WHERE username='".anti_injection($_POST[a])."' AND password='$pass'");
 $guru = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru WHERE nip='".anti_injection($_POST[a])."' AND password='$passlain'");
 $siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa WHERE nis='".anti_injection($_POST[a])."' AND password='$passlain'");
 
 $hitungadmin = mysqli_num_rows($admin);
 $hitungguru = mysqli_num_rows($guru);
 $hitungsiswa = mysqli_num_rows($siswa);
 if ($hitungadmin >= 1){
    $r = mysqli_fetch_array($admin);
    $_SESSION[id]     = $r[id_user];
    $_SESSION[namalengkap]  = $r[nama_lengkap];
    $_SESSION[level]    = $r[level];
    include "config/user_agent.php";

    echo "<script>document.location='index.php';</script>";
 }elseif ($hitungguru >= 1){
    $r = mysqli_fetch_array($guru);
    $_SESSION[id]     = $r[nip];
    $_SESSION[kode_kelas]     = $r[kode_kelas];
    $_SESSION[namalengkap]  = $r[nama_guru];
    $_SESSION[level]    = 'guru';
    include "config/user_agent.php";
  
    echo "<script>document.location='index.php';</script>";
 }elseif ($hitungsiswa >= 1){
    $r = mysqli_fetch_array($siswa);
    $_SESSION[id]     = $r[nis];
    $_SESSION[namalengkap]  = $r[nama];
    $_SESSION[kode_kelas]     = $r[kode_kelas];
    $_SESSION[angkatan]     = $r[angkatan];
    $_SESSION[level]    = 'siswa';
    include "config/user_agent.php";
  
    echo "<script>document.location='index.php';</script>";
 }else{
    echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
                                  window.location=('index.php?view=login')</script>";
 }
}
?>

          
