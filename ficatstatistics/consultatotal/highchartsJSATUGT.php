<script type="text/javascript">

  $(function () { 
    var myChart = Highcharts.chart('container', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 650
      },
      title: {
        text: <?php echo json_encode($registro_source); ?>
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            style: {
              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
          }
        }
      },
      exporting: {
        sourceWidth: 1502,
        scale: 1, 
        chartOptions: {
          chart:{
            height: this.chartHeight
          }
        }
      },
      series: [{
        name: 'Curso/Programa',
        colorByPoint: true,
        data: [
        <?php 
        while ($reg_result = mysql_fetch_array($ATUGT_query, MYSQL_ASSOC)) {
          $nomedocurso = $reg_result['curso'];
          ?>

          {
            name: <?php echo json_encode($nomedocurso); ?>,
            y: <?php echo $reg_result['regs']; ?>
          },
        <?php }; ?>
        ]
      }]

    });

    highcharts.exportChart({
      filename: filename
    });
  });
</script>