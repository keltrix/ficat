<script type="text/javascript">

  $(function () { 
    var myChart = Highcharts.chart('container', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 700
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
        while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
          $cursounidade_unico[] = $reg_result['regs']; 
          $nomedocurso = $reg_result['curso'];
          $sigla_unidade_curso = $reg_result['unidade'];
          $unidade_do_curso_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$sigla_unidade_curso'");
          $unidade_do_curso = mysql_fetch_array($unidade_do_curso_query, MYSQL_ASSOC);
          $results_sigla[] = $unidade_do_curso['nomedaunidade'];
          $texto_full_unidade = $reg_result['curso'].' - '.$unidade_do_curso['nomedaunidade'];
          ?>

          {
            name: <?php echo json_encode($texto_full_unidade); ?>,
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