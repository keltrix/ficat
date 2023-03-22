<?php

require __DIR__ . '/conexao.php';

  $ano = "Escolha o Ano";
  $singla_resultado = "Escolha a Unidade Acadêmica";

if (isset($_POST["anoSelect"]) && isset($_POST["uaSelect"])) { 
  
  $ano = $_POST['anoSelect'];
  $ua = $_POST['uaSelect'];

  $sigla_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla='$ua'"); 
  while ($reg_result = mysql_fetch_array($sigla_query, MYSQL_ASSOC)) {
    $results_sigla[] = $reg_result['nomedaunidade'];
    // printf("sigla: %s", $reg_result["nomedaunidade"]);
    // echo "<br>";
  }

  $singla_resultado = $results_sigla[0];

  $registro_source = 'Registros de Uso do FICAT - '.$ano.' - '.$results_sigla[0];

// echo $registro_source;
// echo $ano;
// echo $ua;

  if($ano!="Total"){

    $total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
      $total[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];
    // printf("março: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];
    // printf("abril: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];
    // printf("maio: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];
    // printf("junho: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];
    // printf("julho: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];
    // printf("agosto: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];
    // printf("setembro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];
    // printf("outubro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];
    // printf("novembro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];
    // printf("dezembro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


  } else {
    $janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
      $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
      $fevereiro[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
      $marco[] = $reg_result['regs'];
    // printf("março: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
      $abril[] = $reg_result['regs'];
    // printf("abril: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
      $maio[] = $reg_result['regs'];
    // printf("maio: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
      $junho[] = $reg_result['regs'];
    // printf("junho: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
      $julho[] = $reg_result['regs'];
    // printf("julho: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
      $agosto[] = $reg_result['regs'];
    // printf("agosto: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
      $setembro[] = $reg_result['regs'];
    // printf("setembro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
      $outubro[] = $reg_result['regs'];
    // printf("outubro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
      $novembro[] = $reg_result['regs'];
    // printf("novembro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND unidade='$ua'"); 
    while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
      $dezembro[] = $reg_result['regs'];
    // printf("dezembro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

  }
}else{
    // Nada a ser exibido
}

// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";
?>