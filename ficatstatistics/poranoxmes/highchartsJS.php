<script type="text/javascript">

  $(function () { 
    var colors = ['#ef9a9a', '#f48fb1', '#ce93d8', 
    '#4caf50', '#dcedc8', '#cddc39',
    '#880e4f', '#4a148c', '#d500f9',
    '#f9a825', '#ffe082', '#e65100',
    '#673ab7', '#3f51b5', '#2196f3',
    '#6d4c41', '#616161', '#455a64',
    '#f44336', '#e91e63', '#9c27b0',
    '#b3e5fc', '#b2ebf2', '#b2dfdb',
    '#03a9f4', '#00bcd4', '#009688',
    '#01579b', '#006064', '#004d40'];

    var myChart = Highcharts.chart('container', {
      chart: {
        type: 'column'
      },
      title: {
        text: <?php echo json_encode($registro_source); ?>
      },
      subtitle: {
        text: 'Source: Biblioteca Central'
      },
      xAxis: {
        categories: ['Número de Registros']
      },
      yAxis: {
        title: {
          text: 'Número de Registros'
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
      colors: colors,
      series: [
      <?php

      while ($reg_result = mysql_fetch_array($unidades_querium, MYSQL_ASSOC)) {
          $siglaunidade = $reg_result['unidade'];
          $unidade_nome_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$siglaunidade'");
          $unidade_nome = mysql_fetch_array($unidade_nome_query, MYSQL_ASSOC);
          $texto_full_unidade = $unidade_nome['nomedaunidade'];
          ?>
          {
        name: <?php echo json_encode($texto_full_unidade); ?>,
        data: [<?php echo $reg_result['regs']; ?>]
      },
      <?php }; ?>
    ]
  });
  });
</script>

