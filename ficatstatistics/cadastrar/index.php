<!DOCTYPE html>
<html lang="pt-br">
<?php

// Conexão com o banco de dados do FICAT
include "assets/php/conexao.php";
$rs = mysql_query("SELECT * FROM unidadesacademicas ORDER BY unidadesacademicas.nomedaunidade ASC");

?>

<head>

	<title>FICAT Statistics</title>

  <script>
    <!--by: victor-->
    senha = prompt("digite sua senha:ndigite sair para cancelar","");
    if (senha =="sedepti@suporte@2018"){
      document.getElementById('pagina').style.display = 'block';
    }else if(senha ==""){
      alert("campo obrigatorio");window.location = "http://bcficat.ufpa.br/" 
    }else if(senha =="sair"){
      alert("cancelado");window.location = "http://bcficat.ufpa.br/"
    }else{
      alert("senha errada");window.location = "http://bcficat.ufpa.br/"
    }
  </script>
  

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

  <link rel="stylesheet" href="css/preferences.css">

  <script src="https://code.highcharts.com/highcharts.js"></script>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!--Materialize Select Inicialization-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('select').formSelect();
    });

  </script>

  <!--Materialize SideNav Inicialization-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
  </script>

</head>

<body>

  <main>
    <br>
    <br>
    <div class="row center-align">
      <div class="col s12 m6 offset-m3 l6 offset-l3">
        <div class="card ">
          <div class="card-panel indigo lighten-5">
            <div class="card-content white-text">
              <form method="POST" action="../assets/php/cadastro.php">
                <label class="black-text">ACESSO RESTRITO</label>  
                <div class="row">
                  <div class="input-field col s12 m6 offset-m3">
                    <input id="usuario" name="usuario" type="text" class="validate">
                    <label for="usuario">Usuario</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6 offset-m3 ">
                    <input id="senha" type="password" name="senha" class="validate">
                    <label for="senha">Senha</label>
                  </div>
                </div>  
                <div class="row">
                  <div class="input-field col s12 m6 offset-m3 ">
                    <button class="btn waves-effect waves-light" type="submit" name="action">CADASTRAR
                      <i class="material-icons right">send</i>
                    </button>          
                  </div>  
                </div>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>

  </html>