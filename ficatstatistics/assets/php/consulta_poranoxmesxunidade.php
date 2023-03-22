<?php

require __DIR__ . '/conexao.php';


$ano = "Escolha o Ano";
$nome_mes = "Escolha o Mês";
$singla_resultado = "Escolha a Unidade";

if (isset($_POST["anoSelect"]) && isset($_POST["mesSelect"])) { 

  $ano = $_POST['anoSelect'];
  $mes = $_POST['mesSelect'];
  $ua = $_POST['uaSelect'];

  $sigla_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla='$ua'"); 
  while ($reg_result = mysql_fetch_array($sigla_query, MYSQL_ASSOC)) {
    $results_sigla[] = $reg_result['nomedaunidade'];
    // printf("sigla: %s", $reg_result["nomedaunidade"]);
    // echo "<br>";
  }

  $singla_resultado = $results_sigla[0];


  if($mes=="01"){
    $nome_mes = "Janeiro";

  } else if ($mes=="02"){
    $nome_mes = "Fevereiro";

  } else if ($mes=="03"){
    $nome_mes = "Março";
    
  } else if ($mes=="04"){
    $nome_mes = "Abril";
    
  } else if ($mes=="05"){
    $nome_mes = "Maio";
    
  } else if ($mes=="06"){
    $nome_mes = "Junho";
    
  } else if ($mes=="07"){
    $nome_mes = "Julho";
    
  } else if ($mes=="08"){
    $nome_mes = "Agosto";
    
  } else if ($mes=="09"){
    $nome_mes = "Setembro";
    
  } else if ($mes=="10"){
    $nome_mes = "Outubro";
    
  } else if ($mes=="11"){
    $nome_mes = "Novembro";
    
  } else if ($mes=="12"){
    $nome_mes = "Dezembro";
    
  }

  $registro_source = 'Registros de Uso do FICAT - '.$nome_mes.' - '.$ano.' - '.$singla_resultado;

// echo $registro_source;
// echo $ano;
// echo $ua;

  $cursos_query = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
      FROM registros 
      WHERE unidade = '$ua' 
      AND YEAR(data_registro) = '$ano'
      GROUP BY curso, unidade 
      ORDER BY registros.curso ASC");
  
}else{
    // Nada a ser exibido
}


// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";

?>