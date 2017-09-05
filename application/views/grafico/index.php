        <?php 
$cont_lib = $pops[0]['soma'];
$cont_res = $pops[1]['soma'];
$cont_110 = $vol[2]['soma_vol'];
$cont_220 = $vol[1]['soma_vol'];
$cont_48 = $vol[0]['soma_vol'];

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gráficos Pops
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Gráficos</a></li>
        <li class="active">Pops</li>
      </ol>
    </section>
     <section class="content box">    
   
         <a class="btn btn-success"
            href="<?php echo base_url('index.php/pops/index'); ?>"/> <<< Pops</a>

         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipos de Acessos:', 'Total:'],
          ['Liberado',     <?php echo $cont_lib ?>],
          ['Restrito',      <?php echo $cont_res ?>]
        ]);

        var options = {
          title: 'Gráfico de Acesso aos Pops:',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Voltagem:', 'Total:'],
          ['110 Volts',     <?php echo $cont_110 ?>],
          ['220 Volts',      <?php echo $cont_220 ?>],
          ['-48 Volts',  <?php echo $cont_48 ?>]
        ]);

        var options = {
          title: 'Gráfico de Voltagens nos Pops:',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
     <div id="piechart_3d" style="width: 900px; height: 500px;"></div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        