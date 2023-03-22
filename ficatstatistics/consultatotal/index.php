<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 


// Conexão com o banco de dados do FICAT
include __DIR__ . '/../assets/php/conexao.php';

// Conexão com as consultas ao banco de dados de Ano x Unidade
include __DIR__ . '/../assets/php/consulta_total.php';

$rs = mysql_query("SELECT * FROM unidadesacademicas ORDER BY unidadesacademicas.nomedaunidade ASC");

$total_query = mysql_query("SELECT MAX(regs) FROM (SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' GROUP BY curso)"); 
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

  <script type="text/javascript">

    $(document).ready(function() {

     var val2 = document.getElementById("tipoSelect").value;
     var val3 = document.getElementById("mesSelect").value;

     $('#defaultdiv').addClass('hide');
     $('#doutoradodiv').addClass('hide');
     $('#mestradodiv').addClass('hide');
     $('#especializacaodiv').addClass('hide');
     $('#graduacaodiv').addClass('hide');
     $('#unidadediv').removeClass('hide');

     if(val2 === "Tese" && val3 != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val2 === "Dissertação" && val3 != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val2 === "TCC Graduaçao" && val3 != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val2 === "TCC Especialização" && val3 != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val2 === "Todos" && val3 != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val2 === "Tese" && val3 === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').removeClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').removeClass('hide');
      } else if(val2 === "Dissertação" && val3 === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').removeClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').removeClass('hide');
      } else if(val2 === "TCC Graduaçao" && val3 === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').removeClass('hide');
        $('#unidadediv').removeClass('hide');
      } else if(val2 === "TCC Especialização" && val3 === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').removeClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').removeClass('hide');
      }


    $("#uaSelect").change(function() {
      var val = $(this).val();
      $.post("../assets/php/consulta_total.php", { uaSelect : val});
      $("#form").submit();
      // window.location = "index.php"+ '?uaSelect=' + val;;
    });


    $("#tipoSelect").change(function() {
      var val = $(this).val();
      var valmes = document.getElementById("mesSelect").value;
      if(val === "Tese" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').removeClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
      } else if(val === "Dissertação" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').removeClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
      } else if(val === "TCC Graduaçao" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').removeClass('hide');
      } else if(val === "TCC Especialização" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').removeClass('hide');
        $('#graduacaodiv').addClass('hide');
      } else if(val === "Todos" && valmes != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
      } else if(val === "Todos" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
      }
    });

    $("#mesSelect").change(function() {
      var valmes = $(this).val();
      var val = document.getElementById("tipoSelect").value;
      if(val === "Tese" && valmes != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val === "Dissertação" && valmes != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val === "TCC Graduaçao" && valmes != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val === "TCC Especialização" && valmes != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val === "Todos" && valmes != "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').addClass('hide');
      } else if(val === "Tese" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').removeClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').removeClass('hide');
      } else if(val === "Dissertação" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').removeClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').removeClass('hide');
      } else if(val === "TCC Graduaçao" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').addClass('hide');
        $('#graduacaodiv').removeClass('hide');
        $('#unidadediv').removeClass('hide');
      } else if(val === "TCC Especialização" && valmes === "Todos"){
        $('#defaultdiv').addClass('hide');
        $('#doutoradodiv').addClass('hide');
        $('#mestradodiv').addClass('hide');
        $('#especializacaodiv').removeClass('hide');
        $('#graduacaodiv').addClass('hide');
        $('#unidadediv').removeClass('hide');
      }
    });

  });

</script>

<!-- Iniciando o HighCharts -->
<?php
if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $programa=='Todos' &&  $tipoVal=='Todos') { 
  include('highchartsJSATTTT.php');
} else if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') {
  include('highchartsJSATTGT.php');
} else if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $tipoVal!='Todos' &&  $programa!='Todos') {
  include('highchartsJSATTGP.php');
} else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal=='Todos' &&  $programa=='Todos') {
  include('highchartsJSATUTT.php');
} else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') {
  include('highchartsJSATUGT.php');
} else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal!='Todos' &&  $programa!='Todos') {
  include('highchartsJSATUGP.php');
} else if ($mesVal!='Todos' &&  $uaVal=='Todas' &&  $tipoVal=='Todos' &&  $programa=='Todos') {
  include('highchartsJSAMTTT.php');
}else if ($mesVal!='Todos' &&  $uaVal=='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') {
  include('highchartsJSAMTTT.php');
  echo "byhe";
}else if ($mesVal!='Todos' &&  $uaVal!='Todas' &&  $tipoVal=='Todos' &&  $programa=='Todos') {
  include('highchartsJSATTGP.php');
  echo "byhe";
}else if ($mesVal!='Todos' &&  $uaVal!='Todas' &&  $tipoVal=='Todos' &&  $programa=='Todos') {
  include('highchartsJSATTGP.php');
  echo "byhe";
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
      <a>CONSULTA COMPLETA</a>
      <a href="../" class="brand-logo center hide-on-med-and-down"><img class="responsive-img" hspace="40" width="20%" height="2%" src="../assets/imgs/ficat_logo_w_b.png"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://bcficat.ufpa.br" target="_blank">FICAT</a></li>
        <li><a href="http://bc.ufpa.br" target="_blank">Biblioteca Central</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav center-align" id="full-screen">
    <li><a href="../poranoxunidade/">POR ANO X UNIDADE</a></li>
    <li><a href="../poranoxmes/">POR ANO X MÊS</a></li>
    <li><a href="../poranoxmesxunidade/">POR ANO X MÊS X UNIDADE</a></li>
    <li><a href="../porperiodo/">POR PERIODO</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../poranoxtipo/">POR ANO X TIPO</a></li>
    <li><a href="../poranoxtipoxprograma/">POR ANO X TIPO X PROGRAMA</a></li>
    <li><div class="divider"></div></li>
    <li class="active"><a>CONSULTA COMPLETA</a></li>
    <li><div class="divider"></div></li>
  </ul>

  <ul class="sidenav center-align" id="mobile-demo">
    <br>
    <li><div class="container">
      <img width="60%" height="60%" class="responsive-img" src="../assets/imgs/ficat_logo.png">
    </div></li>
    
    <li><div class="divider"></div></li>
    <li><a href="../poranoxunidade/">POR ANO X UNIDADE</a></li>
    <li><a href="../poranoxmes/">POR ANO X MÊS</a></li>
    <li><a href="../porperiodo/">POR PERIODO</a></li>
    <li><div class="divider"></div></li>
    <li><a href="../poranoxtipo/">POR ANO X TIPO</a></li>
    <li><a href="../poranoxtipoxprograma/">POR ANO X TIPO X PROGRAMA</a></li>
    <li><div class="divider"></div></li>
    <li class="active"><a>CONSULTA COMPLETA</a></li>
    <li><div class="divider"></div></li>
    <li><a href="http://bcficat.ufpa.br" target="_blank">FICAT</a></li>
    <li><a href="http://bc.ufpa.br" target="_blank">Biblioteca Central</a></li>
  </ul>

  <br>

  <main>
    <form id="form" method="POST" action="./index.php">
      <div class="container">
        <div class="row">
          <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->
          <div class="col s12 m12 l12">
            <div class="input-field col s12 l3 m3">
              <!-- //Select com os possiveis anos de buscar -->
              <select name="anoSelect" id="anoSelect">
                <option value="<?php echo $ano; ?>" selected><?php echo $ano; ?></option>
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

            <div class="input-field col s12 l3 m3">
              <!-- //Select com os possiveis anos de buscar -->
              <select name="mesSelect" id="mesSelect">
                <option value="<?php echo $mesVal; ?>" selected><?php echo $mesOp; ?></option>
                <option value="Todos">Todos</option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
              </select>
              <label>Selecione o Mês</label>
            </div>

            <div id="unidadediv" 
            <div class="input-field col s12 l6 m6">
              <!-- //Select com os possiveis anos de buscar -->
              <select name="uaSelect" id="uaSelect">
                <option value="<?php echo $uaVal; ?>" selected><?php echo $uaOp; ?></option>
                <option value="Todas">Todas</option>
                <?php while ($reg = mysql_fetch_object($rs)): ?>
                  <option value="<?php echo $reg->sigla ?>"><?php echo $reg->nomedaunidade ?></option>
                <?php endwhile; ?>
              </select>
              <label>Selecione a Unidade Acadêmica</label>
            </div>
            <div>

            </div>
          </div>

          <div class="row">
            <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->
            <div class="col s12 m12 l12">

              <div id="tipodiv" class="input-field col s12 l3 m3">
                <!-- //Select com as unidades academicas -->
                <select name="tipoSelect" id="tipoSelect">
                  <option value="<?php echo $tipoVal; ?>" selected><?php echo $tipoOp; ?></option>
                  <option value="Todos">Todos</option>
                  <option value="TCC Graduaçao">Graduação</option>
                  <option value="TCC Especialização">Especialização</option>
                  <option value="Dissertação">Mestrado</option>
                  <option value="Tese">Doutorado</option>
                </select>
                <label>Selecione o Grau</label>
              </div>

              <div id="defaultdiv" class="input-field col s12 l7 m7">
                <select name="programaMSelect" id="programaMSelect">
                  <option value="<?php echo $programa; ?>" selected><?php echo $programa; ?></option>
                  <option value="Todos">Todos</option>
                </select>
                <label>Selecione o Programa ou Curso</label>
              </div>

              <div id="mestradodiv" class="input-field col s12 l7 m7">
                <select name="programaMSelect" id="programaMSelect">
                  <option value="<?php echo $programa; ?>" selected><?php echo $programam; ?></option>
                  <option value="Todos">Todos</option>
                  <?php while ($reg = mysql_fetch_object($mest_rs)): ?>
                    <option value="<?php echo $reg->nomedocurso ?>"><?php echo $reg->nomedocurso ?></option>
                  <?php endwhile; ?>
                </select>
                <label>Selecione o Programa ou Curso</label>
              </div>

              <div id="graduacaodiv" class="input-field col s12 l7 m7">    
                <select name="programaGSelect" id="programaGSelect">
                  <option value="<?php echo $programa; ?>" selected><?php echo $programag; ?></option>
                  <option value="Todos">Todos</option>
                  <?php while ($reg = mysql_fetch_object($grad_rs)): 
                    $valor = $reg->unidade;
                    $nomefull_rs = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$valor'");
                    $maisunidade = mysql_fetch_array($nomefull_rs, MYSQL_ASSOC);
                    $results_sigla[] = $maisunidade['nomedaunidade'];?>

                    <option value="<?php echo $reg->nomedocurso ?>"><?php echo $reg->nomedocurso.' - '.$maisunidade['nomedaunidade']; ?></option>
                  <?php endwhile; ?>
                </select>
                <label>Selecione o Curso</label>
              </div>

              <div id="especializacaodiv" class="input-field col s12 l7 m7"> 
                <select name="programaESelect" id="programaESelect">
                  <option value="<?php echo $programa; ?>" selected><?php echo $programae; ?></option>
                  <option value="Todos">Todos</option>
                  <?php while ($reg = mysql_fetch_object($espc_rs)): ?>
                    <option value="<?php echo $reg->nomedocurso ?>"><?php echo $reg->nomedocurso ?></option>
                  <?php endwhile; ?>
                </select>
                <label>Selecione o Programa ou Curso</label>
              </div>

              <div  id="doutoradodiv" class="input-field col s12 l7 m7">           
                <select name="programaDSelect" id="programaDSelect">
                  <option value="<?php echo $programa; ?>" selected><?php echo $programad; ?></option>
                  <option value="Todos">Todos</option>
                  <?php while ($reg = mysql_fetch_object($dot_rs)): ?>
                    <option value="<?php echo $reg->nomedocurso ?>"><?php echo $reg->nomedocurso ?></option>
                  <?php endwhile; ?>
                </select>
                <label>Selecione o Programa ou Curso</label>
              </div>

              <div class="input-field col s12 l2 m2 center-align">
                <button class="btn waves-effect waves-light center-align indigo darken-4" type="submit" name="cadastrar">BUSCAR <i class="material-icons right">send</i> </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- //div container da API do Highcharts -->
    <div class="row center-align">
      <div class="col s12 m12 l12 ">
        <div id="container" style="min-width: 310px; height: 650px; margin: 0 auto">
        </div>
      </div>
    </div>

    <form method="POST" action="../relatorios/relatoriototal.php" target="_blank">
      <!-- //Estrutura com grid responsivo de coluna com centralização em mobile e desktop. -->
      <div class="col s12 m12 l12">
        <div class="input-field hide col s12 l4 m4">
          <!-- //Select com os possiveis anos de buscar -->
          <select name="anoSelect" id="anoSelect">
            <option value="<?php echo $ano; ?>" selected>Escolha o Ano</option>
          </select>
          <label>Selecione o Ano</label>
        </div>
        <div class="input-field hide col s12 l4 m4">
          <!-- //Select com os possiveis anos de buscar -->
          <select name="mesSelect" id="mesSelect">
            <option value="<?php echo $mesVal; ?>" selected>Escolha o mes</option>
          </select>
          <label>Selecione o Ano</label>
        </div>
        <div class="input-field hide col s12 l4 m4">
          <!-- //Select com os possiveis anos de buscar -->
          <select name="uaSelect" id="uaSelect">
            <option value="<?php echo $uaVal; ?>" selected>Escolha o Ano</option>
          </select>
          <label>Selecione o Ano</label>
        </div>
        <div class="input-field hide col s12 l6 m6">
          <!-- //Select com as unidades academicas -->
          <select name="tipoSelect" id="tipoSelect">
            <option value="<?php echo $tipoVal; ?>" selected>Escolha o Grau</option>
          </select>
          <label>Selecione o Grau</label>
        </div>
        <div class="input-field hide col s12 l6 m6">
          <!-- //Select com as unidades academicas -->
          <select name="programaGSelect" id="programaGSelect">
            <option value="<?php echo $programa; ?>" selected>Escolha o Grau</option>
          </select>
          <label>Selecione o Programa</label>
        </div>
        <div class="input-field hide col s12 l6 m6">
          <!-- //Select com as unidades academicas -->
          <select name="programaESelect" id="programaESelect">
            <option value="<?php echo $programa; ?>" selected>Escolha o Grau</option>
          </select>
          <label>Selecione o Programa</label>
        </div>
        <div class="input-field hide col s12 l6 m6">
          <!-- //Select com as unidades academicas -->
          <select name="programaDSelect" id="programaDSelect">
            <option value="<?php echo $programa; ?>" selected>Escolha o Grau</option>
          </select>
          <label>Selecione o Programa</label>
        </div>
        <div class="input-field hide col s12 l6 m6">
          <!-- //Select com as unidades academicas -->
          <select name="programaMSelect" id="programaMSelect">
            <option value="<?php echo $programa; ?>" selected>Escolha o Grau</option>
          </select>
          <label>Selecione o Programa</label>
        </div>


        <?php
        if (isset($_POST["anoSelect"])) { 
          echo '<div class="input-field col s12 l2 m2 center-align">
          <button class="btn waves-effect waves-light center-align indigo darken-4" type="submit" name="cadastrar">GERAR RELATÓRIO COMPLETO<i class="material-icons right">send</i> </button>
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




