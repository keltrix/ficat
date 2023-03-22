<?php

// Conexão com o banco de dados do FICAT
include __DIR__ . '/../assets/php/conexao.php';

// Conexão com as consultas ao banco de dados de Ano x Unidade
include __DIR__ . '/../assets/php/consulta_poranoxunidade.php';

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <!-- Incluindo a Materialize Framework CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

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

  <!-- Iniciando o HighCharts -->
  <?php
  if (isset($_POST["anoSelect"]) && isset($_POST["uaSelect"])) { 
    include('highchartsJS.php');
  }else{
    // Nada a ser exibido
  }
  ?>

  <!-- Ajustes pro Sekect -->
  <style type="text/css">
  ul.select-dropdown,ul.dropdown-content{
    height: 900% !important;
    width: 100% !important;
  }
</style>

</head>

<body>  

  <nav>
    <div class="nav-wrapper pink darken-4">
      <a href="#!" data-target="full-screen" class="sidenav-trigger show-on-large hide-on-med-and-down"><i class="material-icons">menu</i></a>
      <a href="#!" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a>ANO X UNIDADE</a>
      <a href="../" class="brand-logo center hide-on-med-and-down"><img class="responsive-img" hspace="40" width="20%" height="2%" src="../assets/imgs/ficat_logo_w_b.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://bcficat.ufpa.br" target="_blank">FICAT</a></li>
        <li><a href="http://bc.ufpa.br" target="_blank">Biblioteca Central</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav center-align" id="full-screen">
    <li class="active"><a>POR ANO X UNIDADE</a></li>
    <li><a href="../poranoxmes/">POR ANO X MÊS</a></li>
    <li><a href="../porperiodo/">POR PERIODO</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../poranoxtipo/">POR ANO X TIPO</a></li>
    <li><a href="../poranoxtipoxprograma/">POR ANO X TIPO X PROGRAMA</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../consultatotal/">CONSULTA COMPLETA</a></li>
  </ul>

  <ul class="sidenav center-align" id="mobile-demo">
    <br>
    <li><div class="container">
      <img width="60%" height="60%" class="responsive-img" src="../assets/imgs/ficat_logo.png">
    </div></li>
    
    <li><div class="divider"></div></li>
    <li class="active"><a>POR ANO X UNIDADE</a></li>
    <li><a href="../poranoxmes/">POR ANO X MÊS</a></li>
    <li><a href="../porperiodo/">POR PERIODO</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../poranoxtipo/">POR ANO X TIPO</a></li>
    <li><a href="../poranoxtipoxprograma/">POR ANO X TIPO X PROGRAMA</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../consultatotal/">CONSULTA COMPLETA</a></li>
    <li><div class="divider"></div></li>
    <li><a href="http://bcficat.ufpa.br" target="_blank">FICAT</a></li>
    <li><a href="http://bc.ufpa.br" target="_blank">Biblioteca Central</a></li>

  </ul>

  <br>

  <main>
    <form method="POST" action="./index.php">
      <div class="container">
        <div class="row">
          <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->
          <div class="col s12 m12 l8 offset-l2">
            <div class="input-field col s12 l3 m4">
              <!-- //Select com os possiveis anos de buscar -->
              <select name="anoSelect" id="anoSelect">
                <option value="<?php echo $ano; ?>" disabled selected><?php echo $ano; ?></option>
                <option value="Total">Total</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
              </select>
              <label>Selecione o Ano</label>
            </div>
            <div class="input-field col s12 l6 m6">
              <!-- //Select com as unidades academicas -->
              <select name="uaSelect" id="uaSelect">
                <option value="<?php echo $ua; ?>" disabled selected><?php echo $singla_resultado; ?></option>
                <?php while ($reg = mysql_fetch_object($rs)): ?>
                  <option value="<?php echo $reg->sigla ?>"><?php echo $reg->nomedaunidade ?></option>
                <?php endwhile; ?>
              </select>
              <label>Selecione a Unidade Acadêmica</label>
            </div>
            <div class="input-field col s12 l3 m2 center-align">
              <button class="btn waves-effect waves-light center-align indigo darken-4" type="submit" name="cadastrar">BUSCAR <i class="material-icons right">send</i> </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- //div container da API do Highcharts -->
    <div class="row center-align">
      <div class="col s12 m12 l12 ">
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
        </div>
      </div>
    </div>

    <form method="POST" action="../relatorios/relatorioporanoxunidade.php" target="_blank">
      <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->
      <div class="col s12 m12 l12">
        <div class="input-field hide col s12 l4 m4">
          <!-- //Select com os possiveis anos de buscar -->
          <select name="anoSelect" id="anoSelect">
            <option value="<?php echo $ano; ?>" selected>Escolha o Ano</option>
          </select>
          <label>Selecione o Ano</label>
        </div>
        <div class="input-field hide col s12 l6 m6">
          <!-- //Select com as unidades academicas -->
          <select name="uaSelect" id="uaSelect">
            <option value="<?php echo $ua; ?>" selected>Escolha a Unidade Acadêmica</option>
          </select>
          <label>Selecione a Unidade Acadêmica</label>
        </div>
        

        <?php
        if (isset($_POST["anoSelect"]) && isset($_POST["uaSelect"])) { 
          echo '<div class="input-field col s12 l2 m2 center-align">
          <button class="btn waves-effect waves-light center-align indigo darken-4" type="submit" name="cadastrar">GERAR RELATÓRIO <i class="material-icons right">send</i> </button>
          </div>';
        }else{
    // Nada a ser exibido
        }
        ?>
      </div>
    </form>

  </main>
</body>

</html>




