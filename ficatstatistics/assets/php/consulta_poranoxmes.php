<?php

require __DIR__ . '/conexao.php';


  $ano = "Escolha o Ano";
  $nome_mes = "Escolha o Mês";


if (isset($_POST["anoSelect"]) && isset($_POST["mesSelect"])) { 

  $ano = $_POST['anoSelect'];
  $mes = $_POST['mesSelect'];

  $unidades_querium = mysql_query("SELECT unidade, COUNT(unidade) AS regs
      FROM registros 
      WHERE unidade != '0' 
      AND MONTH(data_registro) = '$mes' 
      AND YEAR(data_registro) = '$ano'
      GROUP BY unidade
      HAVING regs > 0");      


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

  $registro_source = 'Registros de Uso do FICAT - '.$ano.' - '.$nome_mes;

// echo $registro_source;
// echo $ano;
// echo $ua;

  if($ano!="Total" && $mes!="Total"){

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CABAE'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CALTA'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CANAN'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CBRAG'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CBREV'"); 
    while ($reg_result = mysql_fetch_array($cub_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CUNTI'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CUNCA'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CCAST'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CUSAL'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CSOUR'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='CAMTU'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICA'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICB'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICED'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICEN'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICJ'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICS'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ICSA'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='IEMCI'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='IFCH'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='IG'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ILC'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='INEAF'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='ITEC'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $neb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NEB'"); 
    while ($reg_result = mysql_fetch_array($neb_query, MYSQL_ASSOC)) {
      $neb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NAEA'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ncadr_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NCADR'"); 
    while ($reg_result = mysql_fetch_array($ncadr_query, MYSQL_ASSOC)) {
      $ncadr[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ndae_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NDAE'"); 
    while ($reg_result = mysql_fetch_array($ndae_query, MYSQL_ASSOC)) {
      $ndae[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $nitae_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NITAE'"); 
    while ($reg_result = mysql_fetch_array($nitae_query, MYSQL_ASSOC)) {
      $nitae[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $nmt_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NMT'"); 
    while ($reg_result = mysql_fetch_array($nmt_query, MYSQL_ASSOC)) {
      $nmt[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $npo_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NPO'"); 
    while ($reg_result = mysql_fetch_array($npo_query, MYSQL_ASSOC)) {
      $npo[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ntpc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NTPC'"); 
    while ($reg_result = mysql_fetch_array($ntpc_query, MYSQL_ASSOC)) {
      $ntpc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }



    $numa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano' AND unidade='NUMA'"); 
    while ($reg_result = mysql_fetch_array($numa_query, MYSQL_ASSOC)) {
      $numa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $total_anoxmes_query = mysql_query("SELECT COUNT(*) AS regs FROM registros  WHERE MONTH(data_registro) = '$mes' AND YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($total_anoxmes_query, MYSQL_ASSOC)) {
      $total_anoxmes[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

  }


//Seleciona o total de registros ao longo de todos os anos em mês definido
  if($ano=="Total" && $mes!="Total"){

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CA'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CAA'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CAN'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CB'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUB'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUC'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUCA'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUCST'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUS'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUSO'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='CUT'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICA'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICB'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICED'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICEN'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICJ'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICS'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ICSA'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='IEMCI'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='IFCH'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='IG'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ILC'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='INEAF'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='ITEC'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '$mes' AND unidade='NAEA'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

  }


























  if($mes=="Total" && $ano!="Total"){

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CA'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHEREYEAR(data_registro) = '$ano' AND unidade='CAA'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CAN'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CB'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUB'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUC'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUCA'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUCST'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUS'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUSO'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CUT'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICA'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICB'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICED'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICEN'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICJ'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICS'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ICSA'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='IEMCI'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='IFCH'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='IG'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ILC'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='INEAF'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='IT'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='NAEA'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


  } 








  if($ano=="Total" && $mes=="Total"){

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CA'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CAA'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CAN'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CB'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUB'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUC'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUCA'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUCST'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUS'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUSO'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='CUT'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICA'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICB'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICED'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICEN'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICJ'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICS'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ICSA'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='IEMCI'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='IFCH'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='IG'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ILC'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='INEAF'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='ITEC'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE unidade='NAEA'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }
  } 
}


// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";

?>