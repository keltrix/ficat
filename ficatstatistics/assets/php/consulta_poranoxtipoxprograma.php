<?php

require __DIR__ . '/conexao.php';


$ano = "Escolha o Ano";
$tipoOp = "Escolha o Grau";
$programa = "Escolha o Programa";
$programad = "Escolha o Programa";
$programam = "Escolha o Programa";
$programae = "Escolha o Programa";
$programag = "Escolha o Programa";
$programat = "Escolha o Programa";

$nomefull_rs = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$valor'");

$dot_rs = mysql_query("SELECT * FROM cursosdedoutorado WHERE unidade != 'DMT' ORDER BY cursosdedoutorado.nomedocurso ASC ");

$mest_rs = mysql_query("SELECT * FROM cursosdemestrado WHERE unidade != 'DMT' ORDER BY cursosdemestrado.nomedocurso ASC ");

$grad_rs = mysql_query("SELECT * FROM cursosdegraduacao WHERE unidade != 'DMT' ORDER BY cursosdegraduacao.nomedocurso ASC ");

$espc_rs = mysql_query("SELECT * FROM cursosdeespecializacao WHERE unidade != 'DMT' ORDER BY cursosdeespecializacao.nomedocurso ASC ");

if (isset($_POST["anoSelect"])) { 

  $ano = $_POST['anoSelect'];
  $tipo = $_POST['tipoSelect'];
  $tipoVal = $_POST['tipoSelect'];

  if($tipoVal=='TCC Graduaçao'){
    $tipoOp = "Graduação";
    $programa = $_POST['programaGSelect'];
    $programag = $_POST['programaGSelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdegraduacao WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

  } else if($tipoVal=='TCC Especialização'){
    $tipoOp = "Especialização";
    $programa = $_POST['programaESelect'];
    $programae = $_POST['programaESelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdeespecializacao WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }


  } else if($tipoVal=='Dissertação'){
    $tipoOp = "Mestrado";
    $programa = $_POST['programaMSelect'];
    $programam = $_POST['programaMSelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdemestrado WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

  } else if($tipoVal=='Tese'){
    $tipoOp = "Doutorado";
    $programa = $_POST['programaDSelect'];
    $programad = $_POST['programaDSelect'];


    $cursounidade_query = mysql_query("SELECT * FROM cursosdedoutorado WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

  } 

  $auxnomecurso = $cursounidade_unico[0];
  $cursonomeunidade_query = mysql_query("SELECT * FROM unidadesacademicas WHERE  sigla = '$auxnomecurso'"); 
  while ($reg_result = mysql_fetch_array($cursonomeunidade_query, MYSQL_ASSOC)) {
    $cursonomeunidade_unico[] = $reg_result['nomedaunidade'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $programat = $programa.' - '.$cursonomeunidade_unico[0];
  $programag = $programag.' - '.$cursonomeunidade_unico[0];

  $total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
    $total[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
    $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }


  $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
    $fevereiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
    $marco[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
    $abril[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
    $maio[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
    $junho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
    $julho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
    $agosto[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
    $setembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
    $outubro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
    $novembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }

  $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
  while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
    $dezembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

  }


}

$registro_source = $ano.' - '.$tipoOp.' - '.$programat;


// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";

?>