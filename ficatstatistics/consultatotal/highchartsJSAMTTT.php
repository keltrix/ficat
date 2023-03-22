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
        name: 'Campos Universitário de Abaetetuba',
        data: [<?php echo join($ca, ',') ?>]
      }, {
        name: 'Campos Universitário de Altamira',
        data: [<?php echo join($caa, ',') ?>]
      }, {
        name: 'Campus Universitário de Ananindeua',
        data: [<?php echo join($can, ',') ?>]
      }, {
        name: 'Campus Universitário de Bragança',
        data: [<?php echo join($cb, ',') ?>]
      }, {
        name: 'Campus Universitário de Breves',
        data: [<?php echo join($cub, ',') ?>]
      }, {
        name: 'Campus Universitário de Cametá',
        data: [<?php echo join($cuc, ',') ?>]
      }, {
        name: 'Campus Universitário de Capanema',
        data: [<?php echo join($cuca, ',') ?>]
      }, {
        name: 'Campus Universitário de Castanhal',
        data: [<?php echo join($cucst, ',') ?>]
      }, {
        name: 'Campus Universitário de Salinópolis',
        data: [<?php echo join($cus, ',') ?>]
      }, {
        name: 'Campus Universitário de Soure',
        data: [<?php echo join($cuso, ',') ?>]
      }, {
        name: 'Campus Universitário de Tucuruí',
        data: [<?php echo join($cut, ',') ?>]
      }, {
        name: 'Instituto de Ciências da Arte',
        data: [<?php echo join($ica, ',') ?>]
      }, {
        name: 'Instituto de Ciências Biológicas',
        data: [<?php echo join($icb, ',') ?>]
      }, {
        name: 'Instituto de Ciências da Educação',
        data: [<?php echo join($iced, ',') ?>]
      }, {
        name: 'Instituto de Ciências Exatas e Naturais',
        data: [<?php echo join($icen, ',') ?>]
      }, {
        name: 'Instituto de Ciências Jurídicas',
        data: [<?php echo join($icj, ',') ?>]
      }, {
        name: 'Instituto de Ciências da Saúde',
        data: [<?php echo join($ics, ',') ?>]
      }, {
        name: 'Instituto de Ciências Sociais Aplicadas',
        data: [<?php echo join($icsa, ',') ?>]
      }, {
        name: 'Instituto de Educação Matemática e Científica',
        data: [<?php echo join($iemci, ',') ?>]
      }, {
        name: 'Instituto de Filosofia e Ciências Humanas',
        data: [<?php echo join($ifch, ',') ?>]
      }, {
        name: 'Instituto de Geociências',
        data: [<?php echo join($ig, ',') ?>]
      }, {
        name: 'Instituto de Letras e Comunicação',
        data: [<?php echo join($ilc, ',') ?>]
      }, {
        name: 'Instituto Amazônico de Agriculturas Familiares',
        data: [<?php echo join($ineaf, ',') ?>]
      }, {
        name: 'Instituto de Tecnologia',
        data: [<?php echo join($itec, ',') ?>]
      }, {
        name: 'Núcleo de Altos Estudos Amazônicos',
        data: [<?php echo join($naea, ',') ?>]
      }]
    });
  });
</script>