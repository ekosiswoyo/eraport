<?php 
  session_start();
  error_reporting(0);
  include "config/koneksi.php";
  include "config/library.php";
  include "config/fungsi_indotgl.php";
  include "config/fungsi_seo.php";
  if (isset($_SESSION[id])){
      if ($_SESSION[level]=='superuser'){
          $iden = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_users where id_user='$_SESSION[id]'"));
           $nama =  $iden[nama_lengkap];
           $level = 'Administrator';
           $foto = 'dist/img/user2-160x160.jpg';
      }elseif($_SESSION[level]=='kepala'){
          $iden = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_users where id_user='$_SESSION[id]'"));
            $gu = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru where nip='$iden[username]'"));
           $nama =  $iden[nama_lengkap];
           $level = 'Kepala Sekolah';
           if (trim($gu[foto])==''){
              $foto = 'foto_siswa/no-image.jpg';
           }else{
              $foto = 'foto_pegawai/'.$gu[foto];
           }     
      }elseif($_SESSION[level]=='guru'){
          $iden = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_guru where nip='$_SESSION[id]'"));
           $nama =  $iden[nama_guru];
           $kode_kelas = $iden[kode_kelas];
           $level = 'Guru / Pengajar';
           if (trim($iden[foto])==''){
              $foto = 'foto_siswa/no-image.jpg';
           }else{
              $foto = 'foto_pegawai/'.$iden[foto];
           } 
      }elseif($_SESSION[level]=='siswa'){
          $iden = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa where nis='$_SESSION[id]'"));
           $nama =  $iden[nama];
           $level = 'Siswa / Murid';
           if (trim($iden[foto])==''){
              $foto = 'foto_siswa/no-image.jpg';
           }else{
              $foto = 'foto_siswa/'.$iden[foto];
           } 
      }

    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Nilai Raport SMP N 2 KAJEN</title>
    <meta name="author" content="lokomedia.web.id">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
     <link rel="stylesheet" href="dist/css/font-awesome.min.css"> 
      <link rel="stylesheet" href="dist/css/ionicons.min.css"> 
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="plugins/jQuery/jquery-1.12.3.min.js"></script>
    <script language="javascript" type="text/javascript"> 
      var maxAmount = 160;
      function textCounter(textField, showCountField) {
        if (textField.value.length > maxAmount) {
          textField.value = textField.value.substring(0, maxAmount);
        } else { 
          showCountField.value = maxAmount - textField.value.length;
        }
      }

    </script>
  </head>

  <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
            <?php 
              if ($_SESSION[level]=='siswa'){
                include "menu-siswa.php";
              }elseif ($_SESSION[level]=='guru'){
                include "menu-guru.php";
              }elseif ($_SESSION[level]=='kepala'){
                include "menu-kepsek.php";
              }else{
                include "menu-admin.php"; 
              }
            ?>
      </aside>

      <div class="content-wrapper">
        <!-- <section class="content-header">
          <h1> Dashboard <small>Control panel</small> </h1>
        </section> -->

        <section class="content">
        <!--<div class="box box-info">
          </div> 

            <center><img src="dist/photo4.jpg" style="width:600px;height:400px;text-align:center;"></center>-->
        <?php 
          if ($_GET[view]=='home' OR $_GET[view]==''){
              if($_SESSION[level]=='siswa'){
                  include "application/home_siswa.php";
              }elseif($_SESSION[level]=='guru'){
                  include "application/home_guru.php";
              }else{
                  echo "<div class='row'>";
                          include "application/home_admin_row1.php";
                  if($_SESSION[level]=='kepala'){
                  echo "</div>
                        <div class='row'>";
                          include "application/home_admin_row2.php";
                  echo "</div>";
                }
              }
          }

          

          elseif ($_GET[view]=='siswa'){
            echo "<div class='row'>";
                    include "application/master_siswa.php";
            echo "</div>";
          }elseif ($_GET[view]=='guru'){
            cek_session_guru();
            echo "<div class='row'>";
                    include "application/master_guru.php";
            echo "</div>";
          }elseif ($_GET[view]=='wakilkepala'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_wakilkepala.php";
            echo "</div>";
          }elseif ($_GET[view]=='admin'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_admin.php";
            echo "</div>";
          }elseif ($_GET[view]=='kelas'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_kelas.php";
            echo "</div>";
          }elseif ($_GET[view]=='tahunakademik'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_tahun_akademik.php";
            echo "</div>";
          }elseif ($_GET[view]=='matapelajaran'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_matapelajaran.php";
            echo "</div>";
          }elseif ($_GET[view]=='jadwalpelajaran'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_jadwalpelajaran.php";
            echo "</div>";
          }elseif ($_GET[view]=='predikat'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_predikat.php";
            echo "</div>";
          }elseif ($_GET[view]=='kelompokmapel'){
            cek_session_admin();
            echo "<div class='row'>";
                    include "application/master_kelompokmapel.php";
            echo "</div>";
          }elseif ($_GET[view]=='raport'){
            echo "<div class='row'>";
                    include "application/raport.php";
            echo "</div>";
          }elseif ($_GET[view]=='raportuts'){
            echo "<div class='row'>";
                    include "application/raport_uts.php";
            echo "</div>";
          }elseif ($_GET[view]=='raportcetak'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport_cetak.php";
            echo "</div>";
          }elseif ($_GET[view]=='raportcetakuts'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport_cetak_uts.php";
            echo "</div>";
          }elseif ($_GET[view]=='capaianhasilbelajar'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport/raport_capaian_hasil_belajar.php";
            echo "</div>";
          }elseif ($_GET[view]=='extrakulikuler'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport/raport_extrakulikuler.php";
            echo "</div>";
          }elseif ($_GET[view]=='prestasi'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport/raport_prestasi.php";
            echo "</div>";
          }elseif ($_GET[view]=='catatan'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport/input_catatan.php";
            echo "</div>";
          }elseif ($_GET[view]=='kehadiran'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport/input_kehadiran.php";
            echo "</div>";
          }elseif ($_GET[view]=='raportsiswa'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport/raport_data_siswa.php";
            echo "</div>";
          }elseif ($_GET[view]=='raportall'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport_cetak_all.php";
            echo "</div>";
          }elseif ($_GET[view]=='utssiswa'){
            // cek_session_admin();
            echo "<div class='row'>";
                    include "application/raport_uts_siswa.php";
            echo "</div>";
          }


        ?>
        </section>
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="plugins/chart.js/Chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <script>
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        $('#example3').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200
        });
      });
      $('.datepicker').datepicker({
        dateFormat:'yyyy/mm/dd',
        changeMonth: true,
        changeYear: true
      });
    </script>
    <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
   
  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["K-VIIA", "K-VIIB", "K-VIIC"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah_teknik = mysqli_query($GLOBALS["___mysqli_ston"],"select * from rb_users where kode_kelas='K-VIIA'");
          echo mysqli_num_rows($jumlah_teknik);
          ?>, 
          <?php 
          $jumlah_ekonomi = mysqli_query($GLOBALS["___mysqli_ston"],"select * from rb_users where kode_kelas='K-VIIB'");
          echo mysqli_num_rows($jumlah_ekonomi);
          ?>, 
          <?php 
          $jumlah_fisip = mysqli_query($GLOBALS["___mysqli_ston"],"select * from rb_users where kode_kelas='K-VIIC'");
          echo mysqli_num_rows($jumlah_fisip);
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  </body>
</html>

<?php 
  }else{
    include "login.php";
  }
?>
