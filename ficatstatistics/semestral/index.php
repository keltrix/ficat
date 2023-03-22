<?php

// Conexão com o banco de dados do FICAT
include __DIR__ . '/../assets/php/conexao.php';

// Conexão com as consultas ao banco de dados por Periodo
include __DIR__ . '/../assets/php/consulta_porperiodo.php';

$rs = mysql_query("SELECT * FROM unidadesacademicas ORDER BY unidadesacademicas.nomedaunidade ASC");

?>

<!DOCTYPE html>

<html>

<head>

  <title>FICAT Statistics</title>

  <!-- Incluindo a jQuery 2.1.1 -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <!-- Incluindo a jQuery 3.1.1 -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

  <!--Importando Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Incluindo a Materialize Framework JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

  <!-- Incluindo a Materialize Framework CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

  <!-- Incluindo o HighCharts API -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>

  <!--Permitindo ao navegador saber que o site é otimizado a mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Iniciando o Materialize Sidenav -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });

  </script>

  <!-- Iniciando o Materialize Select -->
  <script type="text/javascript">

    $(document).ready(function(){
      $('select').formSelect();
    });

  </script>

  <!-- Iniciando o Materialize Datepicker -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.datepicker').datepicker({
        firstDay: true,
        format: 'yyyy-mm-dd',
        i18n: {
          months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
          weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
          weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
          today: 'Hoje',
          clear: 'Limpar',
          cancel: 'Sair',
          done: 'Confirmar',
          labelMonthNext: 'Próximo mês',
          labelMonthPrev: 'Mês anterior',
          labelMonthSelect: 'Selecione um mês',
          labelYearSelect: 'Selecione um ano',
          selectMonths: true,
          selectYears: 15,
        }
      });
    });
  </script>

  <!-- Iniciando o HighCharts -->
  <?php
  if (isset($_POST["dataFim"]) && isset($_POST["dataInicio"])) {
   include 'highchartsJS.php';
 } else {
 // Nada a ser exibido
 }
 ?>

</head>

<body class="col s12 m12 l12">
  <nav>
    <div class="nav-wrapper pink darken-4">
      <a href="#!" data-target="full-screen" class="sidenav-trigger show-on-large hide-on-med-and-down"><i class="material-icons">menu</i></a>
      <a href="#!" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a>POR PERÍODO</a>
      <a href="../" class="brand-logo center hide-on-med-and-down"><img class="responsive-img" hspace="40" width="20%" height="2%" src="../assets/imgs/ficat_logo_w_b.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://bcficat.ufpa.br" target="_blank">FICAT</a></li>
        <li><a href="http://bc.ufpa.br" target="_blank">Biblioteca Central</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav center-align" id="full-screen">
    <li ><a href="../poranoxunidade/">POR ANO X UNIDADE</a></li>
    <li><a href="../poranoxmes/">POR ANO X MÊS</a></li>
    <li class="active"><a>POR PERIODO</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../poranoxtipo/">POR ANO X TIPO</a></li>
    <li><a href="../poranoxtipoxprograma/">POR ANO X TIPO X PROGRAMA</a></li>
  </ul>

  <ul class="sidenav center-align" id="mobile-demo">
    <br>
    <li><div class="container">
      <img width="60%" height="60%" class="responsive-img" src="../assets/imgs/ficat_logo.png">
    </div></li>

    <li><div class="divider"></div></li>
    <li ><a href="../poranoxunidade">POR ANO X UNIDADE</a></li>
    <li><a href="../poranoxmes">POR ANO X MÊS</a></li>
    <li class="active"><a>POR PERIODO</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../poranoxtipo/">POR ANO X TIPO</a></li>
    <li><a href="../poranoxtipoxprograma/">POR ANO X TIPO X PROGRAMA</a></li>
    <li><div class="divider"></div></li>
    <li><a href="http://bcficat.ufpa.br" target="_blank">FICAT</a></li>
    <li><a href="http://bc.ufpa.br" target="_blank">Biblioteca Central</a></li>
  </ul>

  <br>

  <main>
    <form id="dataform" method="POST" action="./index.php">
      <div class="row">
        <div class="col s10 offset-s1 m6 offset-m3 l4 offset-l4">
          <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->

          <!-- //div container com DatePicker da data inicial de busca de registros -->
          <div class="input-field col s12 l4 m4">
            <div class="container">
              <label>DATA INICIAL</label>
              <input type="text" id="dataInicio" required="required" name="dataInicio" value="<?php echo $dataInicio; ?>" class="datepicker">
            </div>
          </div>

          <!-- //div container com DatePicker da data final de busca de registros -->
          <div class="input-field col s12 l4 m4">
            <div class="container">
              <label>DATA FINAL</label>
              <input type="text" id="dataFim" required="required" name="dataFim" value="<?php echo $dataFim; ?>" class="datepicker">
            </div>
          </div>

          <!-- Botão de tipo submit para envio de informações via POST -->
          <div class="input-field col s12 l4 m2 center-align">
            <br class="hide-on-med-and-down">
            <button class="btn waves-effect waves-light indigo darken-4 left-align" type="submit" name="cadastrar">BUSCAR <i class="material-icons right">send</i> </button>
          </div>
        </div>
      </form>
      <br>

      <!-- //div container da API do Highcharts -->
      <div class="row center-align">
        <div class="col s12 m12 l12 ">
          <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
          </div>
        </div>
      </div>

      <form id="dataform" method="POST" action="../relatorios/relatorioporperiodo.php" target="_blank">
        <div class="col s10 offset-s1 m8 offset-m2 l8 offset-l2">
          <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->

          <!-- //div container com DatePicker da data inicial de busca de registros -->
          <div class="hide input-field col s12 l4 m4">
            <div class="container">
              <label>Data Inicial</label>
              <input type="text" id="dataInicio" required="required" name="dataInicio" value="<?php echo $dataInicio; ?>" class="datepicker">          
            </div>
          </div>

          <!-- //div container com DatePicker da data final de busca de registros -->
          <div class="hide input-field col s12 l4 m4">
            <div class="container">
              <label>Data Final</label>
              <input type="text" id="dataFim" required="required" name="dataFim" value="<?php echo $dataFim; ?>" class="datepicker">
            </div>
          </div>

          <!-- Botão de tipo submit para envio de informações via POST -->
          

          <?php
          if (isset($_POST["dataInicio"]) && isset($_POST["dataFim"])) { 
            echo '<div class="input-field col s12 l4 offset-l4 m4 offset-m4 center-align">
            <button class="btn waves-effect waves-light indigo darken-4 left-align" type="submit" name="cadastrar">GERAR RELATÓRIO  <i class="material-icons right">send</i>  </button>
            </div>';
          }else{
    // Nada a ser exibido
          }
          ?>
        </form>

      </main>
    </body>

    </html>