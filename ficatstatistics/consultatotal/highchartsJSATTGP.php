<script type="text/javascript">

  $(function () { 
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
      series: [{
        name: 'Janeiro',
        data: [<?php echo join($janeiro, ',') ?>]
      }, {
        name: 'Fevereiro',
        data: [<?php echo join($fevereiro, ',') ?>]
      }, {
        name: 'Março',
        data: [<?php echo join($marco, ',') ?>]
      }, {
        name: 'Abril',
        data: [<?php echo join($abril, ',') ?>]
      }, {
        name: 'Maio',
        data: [<?php echo join($maio, ',') ?>]
      }, {
        name: 'Junho',
        data: [<?php echo join($junho, ',') ?>]
      }, {
        name: 'Julho',
        data: [<?php echo join($julho, ',') ?>]
      }, {
        name: 'Agosto',
        data: [<?php echo join($agosto, ',') ?>]
      }, {
        name: 'Setembro',
        data: [<?php echo join($setembro, ',') ?>]
      }, {
        name: 'Outubro',
        data: [<?php echo join($outubro, ',') ?>]
      }, {
        name: 'Novembro',
        data: [<?php echo join($novembro, ',') ?>]
      }, {
        name: 'Dezembro',
        data: [<?php echo join($dezembro, ',') ?>]
      }]
    });

    highcharts.exportChart({
      filename: filename
    });
  });
</script>