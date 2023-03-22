<?php

require __DIR__ . '/conexao.php';

$dataFim = "as Datas";
$dataInicio = "Selecione";


if (isset($_POST["dataFim"]) && isset($_POST["dataInicio"])) { 
  $dataFim = $_POST['dataFim'];
  $dataInicio = $_POST['dataInicio'];

  $registro_source = 'Registros de Uso do FICAT de '.$dataInicio.' até '.$dataFim;

  $ano = "";
  $mes = "";
  if($ano!="Total" && $mes!="Total"){

    $total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade != '0'"); 
    while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
      $total_periodo[] = $reg_result['regs'];
      $total_per_int = $total_periodo[0]; 
      $total_per_media = round(($total_per_int/33), 2);
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CABAE'"); 
    while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
      $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CALTA'"); 
    while ($reg_result = mysql_fetch_array($caa_query, MYSQL_ASSOC)) {
      $caa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $can_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CANAN'"); 
    while ($reg_result = mysql_fetch_array($can_query, MYSQL_ASSOC)) {
      $can[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CBRAG'"); 
    while ($reg_result = mysql_fetch_array($cb_query, MYSQL_ASSOC)) {
      $cb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cub_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CBREV'"); 
    while ($reg_result = mysql_fetch_array($cub_query, MYSQL_ASSOC)) {
      $cub[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CUNTI'"); 
    while ($reg_result = mysql_fetch_array($cuc_query, MYSQL_ASSOC)) {
      $cuc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CUNCA'"); 
    while ($reg_result = mysql_fetch_array($cuca_query, MYSQL_ASSOC)) {
      $cuca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cucst_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CCAST'"); 
    while ($reg_result = mysql_fetch_array($cucst_query, MYSQL_ASSOC)) {
      $cucst[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cus_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CUSAL'"); 
    while ($reg_result = mysql_fetch_array($cus_query, MYSQL_ASSOC)) {
      $cus[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cuso_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CSOUR'"); 
    while ($reg_result = mysql_fetch_array($cuso_query, MYSQL_ASSOC)) {
      $cuso[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $cut_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='CAMTU'"); 
    while ($reg_result = mysql_fetch_array($cut_query, MYSQL_ASSOC)) {
      $cut[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ica_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICA'"); 
    while ($reg_result = mysql_fetch_array($ica_query, MYSQL_ASSOC)) {
      $ica[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICB'"); 
    while ($reg_result = mysql_fetch_array($icb_query, MYSQL_ASSOC)) {
      $icb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iced_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICED'"); 
    while ($reg_result = mysql_fetch_array($iced_query, MYSQL_ASSOC)) {
      $iced[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icen_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICEN'"); 
    while ($reg_result = mysql_fetch_array($icen_query, MYSQL_ASSOC)) {
      $icen[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icj_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICJ'"); 
    while ($reg_result = mysql_fetch_array($icj_query, MYSQL_ASSOC)) {
      $icj[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ics_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICS'"); 
    while ($reg_result = mysql_fetch_array($ics_query, MYSQL_ASSOC)) {
      $ics[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $icsa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ICSA'"); 
    while ($reg_result = mysql_fetch_array($icsa_query, MYSQL_ASSOC)) {
      $icsa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $iemci_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='IEMCI'"); 
    while ($reg_result = mysql_fetch_array($iemci_query, MYSQL_ASSOC)) {
      $iemci[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ifch_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='IFCH'"); 
    while ($reg_result = mysql_fetch_array($ifch_query, MYSQL_ASSOC)) {
      $ifch[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ig_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='IG'"); 
    while ($reg_result = mysql_fetch_array($ig_query, MYSQL_ASSOC)) {
      $ig[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ilc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ILC'"); 
    while ($reg_result = mysql_fetch_array($ilc_query, MYSQL_ASSOC)) {
      $ilc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ineaf_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='INEAF'"); 
    while ($reg_result = mysql_fetch_array($ineaf_query, MYSQL_ASSOC)) {
      $ineaf[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='ITEC'"); 
    while ($reg_result = mysql_fetch_array($itec_query, MYSQL_ASSOC)) {
      $itec[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $neb_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NEB'"); 
    while ($reg_result = mysql_fetch_array($neb_query, MYSQL_ASSOC)) {
      $neb[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


    $naea_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NAEA'"); 
    while ($reg_result = mysql_fetch_array($naea_query, MYSQL_ASSOC)) {
      $naea[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ncadr_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NCADR'"); 
    while ($reg_result = mysql_fetch_array($ncadr_query, MYSQL_ASSOC)) {
      $ncadr[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ndae_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NDAE'"); 
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

    $nmt_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NMT'"); 
    while ($reg_result = mysql_fetch_array($nmt_query, MYSQL_ASSOC)) {
      $nmt[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $npo_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NPO'"); 
    while ($reg_result = mysql_fetch_array($npo_query, MYSQL_ASSOC)) {
      $npo[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

    $ntpc_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NTPC'"); 
    while ($reg_result = mysql_fetch_array($ntpc_query, MYSQL_ASSOC)) {
      $ntpc[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }



    $numa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE data_registro BETWEEN '$dataInicio' AND '$dataFim' AND unidade='NUMA'"); 
    while ($reg_result = mysql_fetch_array($numa_query, MYSQL_ASSOC)) {
      $numa[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }

  } 
}
// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";

?>