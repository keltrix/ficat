<?php

require __DIR__ . '/conexao.php';


$ano = "Escolha o Ano";
$mesOp = "Escolha";
$uaOp = "Escolha";
$tipoOp = "Escolha";
$programa = "Escolha";
$programad = "Escolha";
$programam = "Escolha";
$programae = "Escolha";
$programag = "Escolha";


$nomefull_rs = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$valor'");

$todas_unidades = mysql_query("SELECT * FROM unidadesacademicas");

$todos_registros = mysql_query("SELECT unidade,curso, COUNT(unidade) AS regs FROM registros
  GROUP BY unidade, curso
  ORDER BY registros.curso ASC");



if (isset($_POST["uaSelect"])) { 
  $uaVal = $_POST['uaSelect'];

  if($uaVal == "Todas"){
    $dot_rs = mysql_query("SELECT * FROM cursosdedoutorado WHERE unidade != 'DMT' ORDER BY cursosdedoutorado.nomedocurso ASC ");

    $mest_rs = mysql_query("SELECT * FROM cursosdemestrado WHERE unidade != 'DMT' ORDER BY cursosdemestrado.nomedocurso ASC ");

    $grad_rs = mysql_query("SELECT * FROM cursosdegraduacao WHERE unidade != 'DMT' ORDER BY cursosdegraduacao.nomedocurso ASC ");

    $espc_rs = mysql_query("SELECT * FROM cursosdeespecializacao WHERE unidade != 'DMT' ORDER BY cursosdeespecializacao.nomedocurso ASC ");
    
  }else{

    $dot_rs = mysql_query("SELECT * FROM cursosdedoutorado WHERE unidade = '$uaVal' ORDER BY cursosdedoutorado.nomedocurso ASC ");

    $mest_rs = mysql_query("SELECT * FROM cursosdemestrado WHERE unidade = '$uaVal' ORDER BY cursosdemestrado.nomedocurso ASC ");

    $grad_rs = mysql_query("SELECT * FROM cursosdegraduacao WHERE unidade = '$uaVal' ORDER BY cursosdegraduacao.nomedocurso ASC ");

    $espc_rs = mysql_query("SELECT * FROM cursosdeespecializacao WHERE unidade = '$uaVal' ORDER BY cursosdeespecializacao.nomedocurso ASC ");
  }
}

if (isset($_POST["anoSelect"])) { 
  $ano = $_POST['anoSelect'];
  $mesVal = $_POST['mesSelect'];
  $uaVal = $_POST['uaSelect'];
  $tipoVal = $_POST['tipoSelect'];

  $programad = $_POST['programaDSelect'];
  $programam = $_POST['programaMSelect'];
  $programae = $_POST['programaESelect'];
  $programag = $_POST['programaGSelect'];

  if($mesVal=="01"){
    $mesOp = "Janeiro";

  } else if ($mesVal=="02"){
    $mesOp = "Fevereiro";

  } else if ($mesVal=="03"){
    $mesOp = "Março";
    
  } else if ($mesVal=="04"){
    $mesOp = "Abril";
    
  } else if ($mesVal=="05"){
    $mesOp = "Maio";
    
  } else if ($mesVal=="06"){
    $mesOp = "Junho";
    
  } else if ($mesVal=="07"){
    $mesOp = "Julho";
    
  } else if ($mesVal=="08"){
    $mesOp = "Agosto";
    
  } else if ($mesVal=="09"){
    $mesOp = "Setembro";
    
  } else if ($mesVal=="10"){
    $mesOp = "Outubro";
    
  } else if ($mesVal=="11"){
    $mesOp = "Novembro";
    
  } else if ($mesVal=="12"){
    $mesOp = "Dezembro";
    
  } else if ($mesVal=="Todos"){
    $mesOp = "Todos";
    
  }


  if($uaVal=="Todas"){
    $uaOp = "Todas";
  } else {
    $sigla_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla='$uaVal'"); 
    while ($reg_result = mysql_fetch_array($sigla_query, MYSQL_ASSOC)) {
      $results_sigla[] = $reg_result['nomedaunidade'];
    // printf("sigla: %s", $reg_result["nomedaunidade"]);
    // echo "<br>";
    }

    $uaOp = $results_sigla[0];
  }

  if($tipoVal=='TCC Graduaçao'){
    $tipoOp = "Graduação";
    $programa = $_POST['programaGSelect'];
    $programag = $_POST['programaGSelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdegraduacao WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    }

  } else if($tipoVal=='TCC Especialização'){
    $tipoOp = "Especialização";
    $programa = $_POST['programaESelect'];
    $programae = $_POST['programaESelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdeespecializacao WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    }


  } else if($tipoVal=='Dissertação'){
    $tipoOp = "Mestrado";
    $programa = $_POST['programaMSelect'];
    $programam = $_POST['programaMSelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdemestrado WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    }

  } else if($tipoVal=='Tese'){
    $tipoOp = "Doutorado";
    $programa = $_POST['programaDSelect'];
    $programad = $_POST['programaDSelect'];

    $cursounidade_query = mysql_query("SELECT * FROM cursosdedoutorado WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    }

  } else if($tipoVal=='Todos'){
    $tipoOp = "Todos";
    $programa = 'Todos';
    $programad = 'Todos';
    $programam = 'Todos';
    $programae = 'Todos';
    $programag = 'Todos';
    
    $cursounidade_query = mysql_query("SELECT * FROM cursosdedoutorado WHERE  nomedocurso = '$programa'"); 
    while ($reg_result = mysql_fetch_array($cursounidade_query, MYSQL_ASSOC)) {
      $cursounidade_unico[] = $reg_result['unidade'];
    }

  }

  $auxnomecurso = $cursounidade_unico[0];
  $cursonomeunidade_query = mysql_query("SELECT * FROM unidadesacademicas WHERE  sigla = '$auxnomecurso'"); 
  while ($reg_result = mysql_fetch_array($cursonomeunidade_query, MYSQL_ASSOC)) {
    $cursonomeunidade_unico[] = $reg_result['nomedaunidade'];
  }

  if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $programa=='Todos' &&  $tipoVal=='Todos') { 
    $registro_source = $ano.' - '.'Consulta de Registros Totais por Programa';

    $ATTTT_query = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
      FROM registros 
      WHERE  unidade != 'DMT' 
      AND YEAR(data_registro) = '$ano'
      GROUP BY curso, unidade 
      ORDER BY registros.curso ASC");



  }else if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $tipoVal=='Todos' &&  $programa!='Todos') { 
    $registro_source = $ano.' - '.$tipoOp.' - '.$programa;

    $ATTTP_query = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
      FROM registros 
      WHERE unidade != 'DMT' 
      AND tipo='$tipoVal'
      AND YEAR(data_registro) = '$ano'
      GROUP BY curso, unidade 
      ORDER BY registros.curso ASC");

  }else if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $tipoVal!='Todos' &&  $programa!='Todos') { 
    $registro_source = $ano.' - '.$tipoOp.' - '.$programa;

    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];

    }

    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];

    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];

    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];

    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];

    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];

    }

    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];

    }

    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];

    }

    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];

    }

    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];

    }

    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];

    }

    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];

    }

  }else if ($mesVal=='Todos' &&  $uaVal=='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') { 
    $registro_source = $ano.' - '.$tipoOp;

    $ATTTP_query = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
      FROM registros 
      WHERE unidade != 'DMT' 
      AND tipo='$tipoVal'
      AND YEAR(data_registro) = '$ano'
      GROUP BY curso, unidade 
      ORDER BY registros.curso ASC");

  }else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal=='Todos' &&  $programa=='Todos') { 
    $registro_source = $ano.' - '.$uaOp;

    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }


    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'   AND MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

  }else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') { 
    $registro_source = $ano.' - '.$uaOp.' - '.$tipoOp;

    $ATUGT_query = mysql_query("SELECT *, COUNT(curso) AS regs
      FROM registros 
      WHERE unidade = '$uaVal'
      AND tipo='$tipoVal'
      AND YEAR(data_registro) = '$ano'
      GROUP BY curso, unidade 
      ORDER BY registros.curso ASC");


  }else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal!='Todos' &&  $programa!='Todos') { 
    $registro_source = $ano.' - '.$uaOp.' - '.$tipoOp.' - '.$programa;

    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal' AND MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }


    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }




  } 










































  else if ($mesVal!='Todos' &&  $uaVal=='Todas' &&  $programa=='Todos' &&  $tipoVal=='Todos') { 
    $registro_source = $ano.' - '.'Consulta de Registros Totais por Mês';

    $total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
      $total_anoxmes[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CA'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CAA'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CAN'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CB'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUB'"); 
    while ($reg_result = mysql_fetch_array($cub_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUC'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUCA'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUCST'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUS'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUSO'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUT'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICA'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICB'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICED'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICEN'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICJ'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICS'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICSA'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='IEMCI'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='IFCH'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='IG'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ILC'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='INEAF'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ITEC'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='NAEA'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

  }else if ($mesVal!='Todos' &&  $uaVal=='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') { 
    $registro_source = $ano.' - '.$tipoOp;

    $total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
      $total_anoxmes[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CA' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CAA' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CAN' AND tipo='$tipoVal' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CB' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUB' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cub_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUC' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUCA' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUCST' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUS' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUSO' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='CUT' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICA' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICB' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICED' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICEN' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICJ' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICS' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ICSA' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='IEMCI' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='IFCH' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='IG' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ILC' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='INEAF' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='ITEC'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mesVal' AND YEAR(data_registro) = '$ano' AND unidade='NAEA' AND tipo='$tipoVal'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

  }else if ($mesVal!='Todos' &&  $uaVal!='Todas' &&  $tipoVal=='Todos' &&  $programa=='Todos') { 
    $registro_source = $ano.' - '.$uaOp;

    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }


    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'   AND MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal'  AND MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$uaVal' AND MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

  }else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal!='Todos' &&  $programa=='Todos') { 
    $registro_source = $ano.' - '.$uaOp.' - '.$tipoOp;

    $ATUGT_query = mysql_query("SELECT *, COUNT(curso) AS regs
      FROM registros 
      WHERE unidade = '$uaVal'
      AND tipo='$tipoVal'
      AND YEAR(data_registro) = '$ano'
      GROUP BY curso, unidade 
      ORDER BY registros.curso ASC");


  }else if ($mesVal=='Todos' &&  $uaVal!='Todas' &&  $tipoVal!='Todos' &&  $programa!='Todos') { 
    $registro_source = $ano.' - '.$uaOp.' - '.$tipoOp.' - '.$programa;

    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal' AND MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }


    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE curso='$programa' AND unidade='$uaVal' AND tipo='$tipoVal'  AND MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";

    }

  }

}

// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";

?>
