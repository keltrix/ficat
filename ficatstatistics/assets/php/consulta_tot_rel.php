<?php

require __DIR__ . '/conexao.php';

$ano = "Escolha o Ano";
$singla_resultado = "Escolha a Unidade Acadêmica";



$ano = $_POST['anoSelect'];
$ua = $_POST['uaSelect'];

$sigla_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla='$ua'"); 
while ($reg_result = mysql_fetch_array($sigla_query, MYSQL_ASSOC)) {
  $results_sigla[] = $reg_result['nomedaunidade'];
    // printf("sigla: %s", $reg_result["nomedaunidade"]);
    // echo "<br>";
}

$singla_resultado = $results_sigla[0];

$registro_source = 'Registros de Uso do FICAT - '.$ano;


$cursounidade_query = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
  FROM registros 
  WHERE unidade != 'DMT' 
  AND YEAR(data_registro) = '$ano'
  GROUP BY curso, unidade 
  ORDER BY registros.curso ASC");

$cursounidade_query_grad = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
  FROM registros 
  WHERE unidade != 'DMT' 
  AND tipo='TCC Graduação'
  AND YEAR(data_registro) = '$ano'
  GROUP BY curso, unidade 
  ORDER BY registros.curso ASC");

$cursounidade_query_esp = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
  FROM registros 
  WHERE unidade != 'DMT' 
  AND tipo='TCC Especialização'
  AND YEAR(data_registro) = '$ano'
  GROUP BY curso, unidade 
  ORDER BY registros.curso ASC");

$cursounidade_query_mest = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
  FROM registros 
  WHERE unidade != 'DMT' 
  AND tipo='Dissertação'
  AND YEAR(data_registro) = '$ano'
  GROUP BY curso, unidade 
  ORDER BY registros.curso ASC");

$cursounidade_query_dout = mysql_query("SELECT curso, unidade, COUNT(curso) AS regs
  FROM registros 
  WHERE unidade != 'DMT' 
  AND tipo='Tese'
  AND YEAR(data_registro) = '$ano'
  GROUP BY curso, unidade 
  ORDER BY registros.curso ASC");



$total_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano'"); 
    while ($reg_result = mysql_fetch_array($total_query, MYSQL_ASSOC)) {
      $total_periodo[] = $reg_result['regs'];
      $total_per_int = $total_periodo[0]; 
      $total_per_media = round(($total_per_int/33), 2);
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
    }


$janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
  $janeiro[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";
}

$fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
  $fevereiro[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
}

$marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
  $marco[] = $reg_result['regs'];
    // printf("março: %s", $reg_result["regs"]);
    // echo "<br>";
}

$abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
  $abril[] = $reg_result['regs'];
    // printf("abril: %s", $reg_result["regs"]);
    // echo "<br>";
}

$maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
  $maio[] = $reg_result['regs'];
    // printf("maio: %s", $reg_result["regs"]);
    // echo "<br>";
}

$junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
  $junho[] = $reg_result['regs'];
    // printf("junho: %s", $reg_result["regs"]);
    // echo "<br>";
}


$julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
  $julho[] = $reg_result['regs'];
    // printf("julho: %s", $reg_result["regs"]);
    // echo "<br>";
}


$agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
  $agosto[] = $reg_result['regs'];
    // printf("agosto: %s", $reg_result["regs"]);
    // echo "<br>";
}


$setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
  $setembro[] = $reg_result['regs'];
    // printf("setembro: %s", $reg_result["regs"]);
    // echo "<br>";
}


$outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
  $outubro[] = $reg_result['regs'];
    // printf("outubro: %s", $reg_result["regs"]);
    // echo "<br>";
}


$novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
  $novembro[] = $reg_result['regs'];
    // printf("novembro: %s", $reg_result["regs"]);
    // echo "<br>";
}


$dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
  $dezembro[] = $reg_result['regs'];
    // printf("dezembro: %s", $reg_result["regs"]);
    // echo "<br>";
}


$total_unidade_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano'"); 
while ($reg_result = mysql_fetch_array($total_mes_query, MYSQL_ASSOC)) {
  $total_mes[] = $reg_result['regs'];
    // printf("janeiro: %s", $reg_result["regs"]);
    // echo "<br>";
}

$ca_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CA'"); 
while ($reg_result = mysql_fetch_array($ca_query, MYSQL_ASSOC)) {
  $ca[] = $reg_result['regs'];
    // printf("fevereiro: %s", $reg_result["regs"]);
    // echo "<br>";
}

$caa_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='CAA'"); 
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
while ($reg_result = mysql_fetch_array($cub_query, MYSQL_ASSOC)) {
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

$itec_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND unidade='ITEC'"); 
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



// echo mysql_errno($conexao) . ": " . mysql_error($conexao). "\n";
?>