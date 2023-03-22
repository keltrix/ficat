<script type="text/javascript">

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

    var myChart = {
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

      $unidades_querium_png = mysql_query("SELECT unidade, COUNT(unidade) AS regs
      FROM registros 
      WHERE unidade != '0' 
      AND MONTH(data_registro) = '$mes' 
      AND YEAR(data_registro) = '$ano'
      GROUP BY unidade
      HAVING regs > 0");    

      while ($reg_result_png = mysql_fetch_array($unidades_querium_png, MYSQL_ASSOC)) {
          $siglaunidade_png = $reg_result_png['unidade'];
          $unidade_nome_query_png = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$siglaunidade_png'");
          $unidade_nome_png = mysql_fetch_array($unidade_nome_query_png, MYSQL_ASSOC);
          $texto_full_unidade_png = $unidade_nome_png['nomedaunidade'];
          ?>
          {
        name: <?php echo json_encode($texto_full_unidade_png); ?>,
        data: [<?php echo $reg_result_png['regs']; ?>]
      }, 
      <?php }; ?>
    ]};

var exportUrl = 'http://export.highcharts.com/';

// POST parameter for Highcharts export server
var object = {
    options: JSON.stringify(myChart),
    type: 'image/png',
    async: true
};

// Ajax request
$.ajax({
    type: 'post',
    url: exportUrl,
    data: object,
    success: function (data) {
        // Update "src" attribute with received image URL
        $('#chart').attr('src', exportUrl + data);
        $('#imgUrl').attr('value', exportUrl + data);
    }
});

</script>