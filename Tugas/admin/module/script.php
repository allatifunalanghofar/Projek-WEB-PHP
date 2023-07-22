<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<!-- Plug-in Script -->
<script src="plugins/select2/select2.full.min.js" type="text/javascript"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Chart -->
<script src="chartjs/Chart.js" type="text/javascript"></script>

<!-- Load Jquery & Datatable JS -->

<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="plugins/datatables/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="plugins/datatables/responsive.bootstrap.min.js"></script>




<!--Customize Script -->
<script type="text/javascript">

$( function() {
  $( "#date" ).datepicker({
    autoclose:true,
    todayHighlight:true,
    format:'yyyy-mm-dd',
    language: 'id'
  });
} );
</script>

<script>
$(document).ready(function() {
    var table = $('#table1').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>

<!-- Line Chart Beras IR 64 Pre -->
<?php
    $koneksi = new mysqli("localhost","root","","db_artshop");
    $data_output = mysqli_query($koneksi, "SELECT tanggal_pembelian, SUM(total_pembelian) AS total FROM pembelian GROUP BY tanggal_pembelian");
    
    $data_tanggal = array();
    $data_total = array();

    

    while ($data = mysqli_fetch_array($data_output)) {
      $data_tanggal[] = date('d-m-Y', strtotime($data['tanggal_pembelian'])); // Memasukan tanggal ke dalam array
      $data_total[] = $data['total']; // Memasukan total ke dalam array
      
      
    }
 
?>
<script  type="text/javascript">

var ctx = document.getElementById("linechart").getContext("2d");
var data = {
          labels: <?php echo json_encode($data_tanggal) ?>,
          datasets: [
          {
            label: "Data Penjualan",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#3498DB",
            borderColor: "#3498DB",
            pointHoverBackgroundColor: "#3498DB",
            pointHoverBorderColor: "#3498DB",
            data: <?php echo json_encode($data_total) ?>
          }
          ]
          };


var myBarChart = new Chart(ctx, {
          type: 'line',
          data: data,
          options: {
          barValueSpacing: 20,
          scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
            }
        }
      });
</script>

