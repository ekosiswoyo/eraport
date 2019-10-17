<script type="text/javascript" src="plugins/jQuery/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: ''
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        'Ada ' + this.point.y + ' Orang';
                }
            }
        });
    });
</script>

<!--<div class="box box-success">
    <div class="box-header">
    <i class="fa fa-th-list"></i>
    <h3 class="box-title">Jumlah Siswa</h3>
        <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button> 
        </div>
        </div>

<div class="box-body chat" id="chat-box">
    <script src="plugins/highchart/highcharts.js"></script>
    <script src="plugins/highchart/modules/data.js"></script>
    <script src="plugins/highchart/modules/exporting.js"></script>
    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->

<table id="datatable" style='display:none'>
    <thead>
        <tr>
            <th></th>
            <th>Jumlah Siswa</th>
           
        </tr>
    </thead>
    <tbody>
    <?php 
        $grafik = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa GROUP BY kode_kelas ORDER BY kode_kelas");
        while ($r = mysqli_fetch_array($grafik)){
            $ale = $r[kode_kelas];
            $siswa = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM rb_siswa  where kode_kelas='$r[kode_kelas]'"));
            // $abc = mysql_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(nilai1+nilai2+nilai3+nilai4+nilai5+nilai6) as total FROM rb_nilai_keterampilan a, rb_siswa b where a.nis=b.nis and b.kode_kelas='$r[kode_kelas]'");
            $z = $abc["total"];
            echo "<tr>
                    <th>$ale</th>
                    <td>$siswa</td>
                    
                  </tr>";
        }
    ?>
    </tbody>
</table>
</div><!-- /.chat -->
</div><!-- /.box (chat box) -->

