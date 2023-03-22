<?php

require __DIR__ . '/conexao.php';


$ano = "Escolha o Ano";
$tipoOp = "Escolha o Grau";
$tipoVal = "";
$programa = "Escolha o Programa";

if (isset($_POST["anoSelect"])) { 

  $ano = $_POST['anoSelect'];
  $tipoVal = $_POST['tipoSelect'];

  if($tipoVal=='TCC Graduaçao'){
    $tipoOp = "Graduação";


  } else if($tipoVal=='TCC Especialização'){
    $tipoOp = "Especialização";


  } else if($tipoVal=='Dissertação'){
    $tipoOp = "Mestrado";

  } else if($tipoVal=='Tese'){
    $tipoOp = "Doutorado";

  }
}

$cursounidade_query = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
  FROM registros 
  WHERE unidade != 'DMT' 
  AND tipo='$tipoVal'
  AND YEAR(data_registro) = '$ano'
  GROUP BY curso, unidade 
  ORDER BY registros.curso ASC");


$total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade!='DMT' AND tipo='$tipoVal' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
  $total[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";
}

$registro_source = $ano.' - '.$tipoOp;


// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";

?>