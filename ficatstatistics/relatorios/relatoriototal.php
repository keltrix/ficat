<?php

// Conexão com o Banco de Dados do FICAT
require __DIR__ . '/../assets/php/conexao.php';

// Conexão com as consultas ao banco de dados por Periodo
include __DIR__ . '/../assets/php/consulta_tot_rel.php';



$parte1 = '<!DOCTYPE html>
<html lang="pt-br">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: middle; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
	border: 0.1mm solid #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	
}

.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>
<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="100%"><span style="font-weight: bold; font-size: 14pt;"><img width="50%" height="25%" src="../assets/imgs/ficat_logo.png"></td>
<td width="100%" style="text-align: right;"><img width="25%" height="25%" src="../assets/imgs/bc_logo.png"></td>
</tr>
</table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Página {PAGENO} de {nb}
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->';
$parte2 = '<div style="text-align: right">'.$registro_source.'</div>
<div style="text-align: center"> <h2>Registros por Unidade Acadêmica</h2> </div>';

$parte3 = '<div style="text-align: right">
<br />
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="45%"><b>Unidade Acadêmica</b></td>
<td style="font-size: 14pt;" width="15%"><b>Sigla</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';




























$ca_row = '<tr><td align="center">Campus Universitário de Abaetetuba</td>
<td align="center">CA</td>
<td align="center">'.join($ca, ',').'</td></tr>';

$caa_row = '<tr><td align="center">Campus Universitário de Altamira</td>
<td align="center">CAA</td>
<td align="center">'.join($caa, ',').'</td></tr>';

$can_row = '<tr><td align="center">Campus Universitário de Ananindeua</td>
<td align="center">CAN</td>
<td align="center">'.join($can, ',').'</td></tr>';

$cb_row = '<tr><td align="center">Campus Universitário de Bragança</td>
<td align="center">CB</td>
<td align="center">'.join($cb, ',').'</td></tr>';

$cub_row = '<tr><td align="center">Campus Universitário de Breves</td>
<td align="center">CUB</td>
<td align="center">'.join($cub, ',').'</td></tr>';

$cuc_row = '<tr><td align="center">Campus Universitário de Cametá</td>
<td align="center">CUC</td>
<td align="center">'.join($cuc, ',').'</td></tr>';

$cuca_row = '<tr><td align="center">	
Campus Universitário de Capanema</td>
<td align="center">CUCA</td>
<td align="center">'.join($cuca, ',').'</td></tr>';

$cucst_row = '<tr><td align="center">Campus Universitário de Castanhal</td>
<td align="center">CUCST</td>
<td align="center">'.join($cucst, ',').'</td></tr>';

$cus_row = '<tr><td align="center">Campus Universitário de Salinópolis</td>
<td align="center">CUS</td>
<td align="center">'.join($cus, ',').'</td></tr>';

$cuso_row = '<tr><td align="center">Campus Universitário de Soure</td>
<td align="center">CUSO</td>
<td align="center">'.join($cuso, ',').'</td></tr>';

$cut_row = '<tr><td align="center">Campus Universitário de Tucuruí</td>
<td align="center">CUT</td>
<td align="center">'.join($cut, ',').'</td></tr>';

$ineaf_row = '<tr><td align="center">Instituto Amazônico de Agriculturas Familiares</td>
<td align="center">INEAF</td>
<td align="center">'.join($ineaf, ',').'</td></tr>';

$icb_row = '<tr><td align="center">Instituto de Ciências Biológicas</td>
<td align="center">ICB</td>
<td align="center">'.join($icb, ',').'</td></tr>';

$ica_row = '<tr><td align="center">Instituto de Ciências da Arte</td>
<td align="center">ICA</td>
<td align="center">'.join($ica, ',').'</td></tr>';

$iced_row = '<tr><td align="center">Instituto de Ciências da Educação</td>
<td align="center">ICED</td>
<td align="center">'.join($iced, ',').'</td></tr>';

$ics_row = '<tr><td align="center">	
Instituto de Ciências da Saúde</td>
<td align="center">ICS</td>
<td align="center">'.join($ics, ',').'</td></tr>';

$icen_row = '<tr><td align="center">	
Instituto de Ciências Exatas e Naturais</td>
<td align="center">ICEN</td>
<td align="center">'.join($icen, ',').'</td></tr>';

$icj_row = '<tr><td align="center">	
Instituto de Ciências Jurídicas</td>
<td align="center">ICJ</td>
<td align="center">'.join($icj, ',').'</td></tr>';

$icsa_row = '<tr><td align="center">	
Instituto de Ciências Sociais Aplicadas</td>
<td align="center">ICSA</td>
<td align="center">'.join($icsa, ',').'</td></tr>';

$iemci_row = '<tr><td align="center">	
Instituto de Educação Matemática e Científica</td>
<td align="center">IEMCI</td>
<td align="center">'.join($iemci, ',').'</td></tr>';

$ifch_row = '<tr><td align="center">Instituto de Filosofia e Ciências Humanas</td>
<td align="center">IFCH</td>
<td align="center">'.join($ifch, ',').'</td></tr>';

$ig_row = '<tr><td align="center">	
Instituto de Geociências</td>
<td align="center">IG</td>
<td align="center">'.join($ig, ',').'</td></tr>';

$ilc_row = '<tr><td align="center">	
Instituto de Letras e Comunicação</td>
<td align="center">ILC</td>
<td align="center">'.join($ilc, ',').'</td></tr>';

$itec_row = '<tr><td align="center">Instituto de Tecnologia</td>
<td align="center">ITEC</td>
<td align="center">'.join($itec, ',').'</td></tr>';

$naea_row = '<tr><td align="center">Núcleo de Altos Estudos Amazônicos</td>
<td align="center">NAEA</td>
<td align="center">'.join($naea, ',').'</td></tr>';

$linhas_tabela = $ca_row.$caa_row.$can_row.$cb_row.$cub_row.$cuc_row.$cuca_row.$cucst_row.$cus_row.$cuso_row.$cut_row.$ineaf_row.$icb_row.$ica_row.$iced_row.$ics_row.$icen_row.$icj_row.$icsa_row.$iemci_row.$ifch_row.$ig_row.$ilc_row.$itec_row.$naea_row;

$parte4 = '
</tbody>
</table>';

$parte5 = '<div style="text-align: right">
<br />
<br>
<br>
<div style="text-align: center"> <h2>Registros por Programa</h2></div>
<div style="text-align: center"> <h3>Graduação</h3></div>
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Programa</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';

$linhas_tabela2 = ' ';
while ($reg_result = mysql_fetch_array($cursounidade_query_grad, MYSQL_ASSOC)) {
	$nomedocurso = $reg_result['curso'];
	$sigla_unidade_curso = $reg_result['unidade'];
	$unidade_do_curso_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$sigla_unidade_curso'");
	$unidade_do_curso = mysql_fetch_array($unidade_do_curso_query, MYSQL_ASSOC);
	$results_sigla[] = $unidade_do_curso['nomedaunidade'];

	$proxima_linha = '<tr><td align="center">'.$reg_result['curso'].' - '.$unidade_do_curso['nomedaunidade'].'</td>
	<td align="center">'.$reg_result['regs'].'</td></tr>';
	$linhas_tabela2 = $linhas_tabela2.$proxima_linha;
}

$parte6 = '
</tbody>
</table>';


$parte7 = '<div style="text-align: right">
<br />
<br>
<br>
<div style="text-align: center"> <h3>Especialização</h3></div>
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Programa</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';

$linhas_tabela3 = ' ';
while ($reg_result = mysql_fetch_array($cursounidade_query_esp, MYSQL_ASSOC)) {
	$nomedocurso = $reg_result['curso'];
	$sigla_unidade_curso = $reg_result['unidade'];
	$unidade_do_curso_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$sigla_unidade_curso'");
	$unidade_do_curso = mysql_fetch_array($unidade_do_curso_query, MYSQL_ASSOC);
	$results_sigla[] = $unidade_do_curso['nomedaunidade'];

	$proxima_linha = '<tr><td align="center">'.$reg_result['curso'].' - '.$unidade_do_curso['nomedaunidade'].'</td>
	<td align="center">'.$reg_result['regs'].'</td></tr>';
	$linhas_tabela3 = $linhas_tabela3.$proxima_linha;
}

$parte8 = '
</tbody>
</table>';

$parte9 = '<div style="text-align: right">
<br />
<br>
<br>
<div style="text-align: center"> <h3>Mestrado</h3></div>
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Programa</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';

$linhas_tabela4 = ' ';
while ($reg_result = mysql_fetch_array($cursounidade_query_mest, MYSQL_ASSOC)) {
	$nomedocurso = $reg_result['curso'];
	$sigla_unidade_curso = $reg_result['unidade'];
	$unidade_do_curso_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$sigla_unidade_curso'");
	$unidade_do_curso = mysql_fetch_array($unidade_do_curso_query, MYSQL_ASSOC);
	$results_sigla[] = $unidade_do_curso['nomedaunidade'];

	$proxima_linha = '<tr><td align="center">'.$reg_result['curso'].' - '.$unidade_do_curso['nomedaunidade'].'</td>
	<td align="center">'.$reg_result['regs'].'</td></tr>';
	$linhas_tabela4 = $linhas_tabela4.$proxima_linha;
}

$parte10 = '
</tbody>
</table>';

$parte11 = '<div style="text-align: right">
<br />
<br>
<br>
<div style="text-align: center"> <h3>Doutorado</h3></div>
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Programa</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';

$linhas_tabela5 = ' ';
while ($reg_result = mysql_fetch_array($cursounidade_query_dout, MYSQL_ASSOC)) {
	$nomedocurso = $reg_result['curso'];
	$sigla_unidade_curso = $reg_result['unidade'];
	$unidade_do_curso_query = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla = '$sigla_unidade_curso'");
	$unidade_do_curso = mysql_fetch_array($unidade_do_curso_query, MYSQL_ASSOC);
	$results_sigla[] = $unidade_do_curso['nomedaunidade'];

	$proxima_linha = '<tr><td align="center">'.$reg_result['curso'].' - '.$unidade_do_curso['nomedaunidade'].'</td>
	<td align="center">'.$reg_result['regs'].'</td></tr>';
	$linhas_tabela5 = $linhas_tabela5.$proxima_linha;
}

$parte12 = '
</tbody>
</table>';

$parte13 = '<div style="text-align: right">
<br />
<br>
<br>
<div style="text-align: center"> <h2>Registros por Mês</h2></div>
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Mês</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->';

$janeiro_row = '<tr><td align="center">Janeiro</td>
<td align="center">'.join($janeiro, ',').'</td></tr>';

$fevereiro_row = '<tr><td align="center">Fevereiro</td>
<td align="center">'.join($fevereiro, ',').'</td></tr>';

$marco_row = '<tr><td align="center">Março</td>
<td align="center">'.join($marco, ',').'</td></tr>';

$abril_row = '<tr><td align="center">Abril</td>
<td align="center">'.join($abril, ',').'</td></tr>';

$maio_row = '<tr><td align="center">Maio</td>
<td align="center">'.join($maio, ',').'</td></tr>';

$junho_row = '<tr><td align="center">Junho</td>
<td align="center">'.join($junho, ',').'</td></tr>';

$julho_row = '<tr><td align="center">Julho</td>
<td align="center">'.join($julho, ',').'</td></tr>';

$agosto_row = '<tr><td align="center">Agosto</td>
<td align="center">'.join($agosto, ',').'</td></tr>';

$setembro_row = '<tr><td align="center">Setembro</td>
<td align="center">'.join($setembro, ',').'</td></tr>';

$outubro_row = '<tr><td align="center">Outrubro</td>
<td align="center">'.join($outubro, ',').'</td></tr>';

$novembro_row = '<tr><td align="center">Novembro</td>
<td align="center">'.join($novembro, ',').'</td></tr>';

$dezembro_row = '<tr><td align="center">Dezembro</td>
<td align="center">'.join($dezembro, ',').'</td></tr>';

$linhas_tabela6 = $janeiro_row.$fevereiro_row.$marco_row.$abril_row.$maio_row.$junho_row.$julho_row.$agosto_row.$setembro_row.$outubro_row.$novembro_row.$dezembro_row;

$parte14 = '
</tbody>
</table>';

////FILTRAR DADOS POR MES DE CADA CURSO
$total_grad_c = '';
$linhaspoc = '';

$cursos_foreach_aux_q = mysql_query("SELECT data_registro, curso, unidade, COUNT(curso) AS reg_num FROM registros 
	WHERE unidade !='DMT' 
	AND tipo='TCC Graduação' 
	AND YEAR(data_registro) = '$ano' 
	GROUP BY curso, unidade ASC"); 
while ($reg_consult = mysql_fetch_array($cursos_foreach_aux_q, MYSQL_ASSOC)) {
	$curso = $reg_consult['curso'];
	$unidade = $reg_consult['unidade'];
	$num_registros = $reg_consult['reg_num'];

	$sigla_str_q = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla ='$unidade'"); 
	$sigla_str_q_r = mysql_fetch_array($sigla_str_q, MYSQL_ASSOC);
	$sigla_str = $sigla_str_q_r['nomedaunidade'];

	$parte15 = '<div style="text-align: right">
	<br />
	<br>
	<br>
	<div style="text-align: center"> <h2>'.$curso.' - '.$sigla_str_q_r['nomedaunidade'].'</h2></div>
	<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
	<thead>
	<tr>
	<td style="font-size: 14pt;" width="25%"><b>Curso</b></td>
	<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
	</tr>
	</thead>
	<tbody>
	<!-- ITEMS HERE -->';

	$janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
		$janeiro = $reg_result['regs'];
	}

	$fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
		$fevereiro = $reg_result['regs'];
	}

	$marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
		$marco = $reg_result['regs'];
	}

	$abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
		$abril = $reg_result['regs'];
	}

	$maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
		$maio = $reg_result['regs'];
	}

	$junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
		$junho = $reg_result['regs'];
	}


	$julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
		$julho = $reg_result['regs'];
	}


	$agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
		$agosto  = $reg_result['regs'];
	}


	$setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
		$setembro = $reg_result['regs'];
	}


	$outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
		$outubro = $reg_result['regs'];
	}


	$novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
		$novembro = $reg_result['regs'];

	}


	$dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano' AND curso='$curso'"); 
	while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
		$dezembro = $reg_result['regs'];

	}

	$janeiro_row = '<tr><td align="center">Janeiro</td>
	<td align="center">'.$janeiro.'</td></tr>';

	$fevereiro_row = '<tr><td align="center">Fevereiro</td>
	<td align="center">'.$fevereiro.'</td></tr>';

	$marco_row = '<tr><td align="center">Março</td>
	<td align="center">'.$marco.'</td></tr>';

	$abril_row = '<tr><td align="center">Abril</td>
	<td align="center">'.$abril.'</td></tr>';

	$maio_row = '<tr><td align="center">Maio</td>
	<td align="center">'.$maio.'</td></tr>';

	$junho_row = '<tr><td align="center">Junho</td>
	<td align="center">'.$junho.'</td></tr>';

	$julho_row = '<tr><td align="center">Julho</td>
	<td align="center">'.$julho.'</td></tr>';

	$agosto_row = '<tr><td align="center">Agosto</td>
	<td align="center">'.$agosto.'</td></tr>';

	$setembro_row = '<tr><td align="center">Setembro</td>
	<td align="center">'.$setembro.'</td></tr>';

	$outubro_row = '<tr><td align="center">Outrubro</td>
	<td align="center">'.$outubro.'</td></tr>';

	$novembro_row = '<tr><td align="center">Novembro</td>
	<td align="center">'.$novembro.'</td></tr>';

	$dezembro_row = '<tr><td align="center">Dezembro</td>
	<td align="center">'.$dezembro.'</td></tr>';

	$linhas_tabela99 = $janeiro_row.$fevereiro_row.$marco_row.$abril_row.$maio_row.$junho_row.$julho_row.$agosto_row.$setembro_row.$outubro_row.$novembro_row.$dezembro_row;

	$parte16 = '
	</tbody>
	</table>';

	$total_grad_c = $total_grad_c.$parte15.$linhas_tabela99.$parte16;
}


///ESPEC

$cursos_foreach_aux_q = mysql_query("SELECT data_registro, curso, unidade, COUNT(curso) AS reg_num FROM registros 
	WHERE unidade !='DMT' 
	AND tipo='TCC Especialização' 
	AND YEAR(data_registro) = '$ano' 
	GROUP BY curso, unidade ASC"); 
while ($reg_consult = mysql_fetch_array($cursos_foreach_aux_q, MYSQL_ASSOC)) {
	$curso = $reg_consult['curso'];
	$unidade = $reg_consult['unidade'];
	$num_registros = $reg_consult['reg_num'];

	$sigla_str_q = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla ='$unidade'"); 
	$sigla_str_q_r = mysql_fetch_array($sigla_str_q, MYSQL_ASSOC);
	$sigla_str = $sigla_str_q_r['nomedaunidade'];

	$parte15 = '<div style="text-align: right">
	<br />
	<br>
	<br>
	<div style="text-align: center"> <h2>'.$curso.' - '.$sigla_str_q_r['nomedaunidade'].'</h2></div>
	<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
	<thead>
	<tr>
	<td style="font-size: 14pt;" width="25%"><b>Curso</b></td>
	<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
	</tr>
	</thead>
	<tbody>
	<!-- ITEMS HERE -->';

	$janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
		$janeiro = $reg_result['regs'];
	}

	$fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
		$fevereiro = $reg_result['regs'];
	}

	$marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
		$marco = $reg_result['regs'];
	}

	$abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
		$abril = $reg_result['regs'];
	}

	$maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
		$maio = $reg_result['regs'];
	}

	$junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
		$junho = $reg_result['regs'];
	}


	$julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
		$julho = $reg_result['regs'];
	}


	$agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
		$agosto  = $reg_result['regs'];
	}


	$setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
		$setembro = $reg_result['regs'];
	}


	$outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
		$outubro = $reg_result['regs'];
	}


	$novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
		$novembro = $reg_result['regs'];

	}


	$dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano' AND curso='$curso'"); 
	while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
		$dezembro = $reg_result['regs'];

	}

	$janeiro_row = '<tr><td align="center">Janeiro</td>
	<td align="center">'.$janeiro.'</td></tr>';

	$fevereiro_row = '<tr><td align="center">Fevereiro</td>
	<td align="center">'.$fevereiro.'</td></tr>';

	$marco_row = '<tr><td align="center">Março</td>
	<td align="center">'.$marco.'</td></tr>';

	$abril_row = '<tr><td align="center">Abril</td>
	<td align="center">'.$abril.'</td></tr>';

	$maio_row = '<tr><td align="center">Maio</td>
	<td align="center">'.$maio.'</td></tr>';

	$junho_row = '<tr><td align="center">Junho</td>
	<td align="center">'.$junho.'</td></tr>';

	$julho_row = '<tr><td align="center">Julho</td>
	<td align="center">'.$julho.'</td></tr>';

	$agosto_row = '<tr><td align="center">Agosto</td>
	<td align="center">'.$agosto.'</td></tr>';

	$setembro_row = '<tr><td align="center">Setembro</td>
	<td align="center">'.$setembro.'</td></tr>';

	$outubro_row = '<tr><td align="center">Outrubro</td>
	<td align="center">'.$outubro.'</td></tr>';

	$novembro_row = '<tr><td align="center">Novembro</td>
	<td align="center">'.$novembro.'</td></tr>';

	$dezembro_row = '<tr><td align="center">Dezembro</td>
	<td align="center">'.$dezembro.'</td></tr>';

	$linhas_tabela99 = $janeiro_row.$fevereiro_row.$marco_row.$abril_row.$maio_row.$junho_row.$julho_row.$agosto_row.$setembro_row.$outubro_row.$novembro_row.$dezembro_row;

	$parte16 = '
	</tbody>
	</table>';

	$total_grad_c = $total_grad_c.$parte15.$linhas_tabela99.$parte16;
}


///MESTRADO
$cursos_foreach_aux_q = mysql_query("SELECT data_registro, curso, unidade, COUNT(curso) AS reg_num FROM registros 
	WHERE unidade !='DMT' 
	AND tipo='Dissertação' 
	AND YEAR(data_registro) = '$ano' 
	GROUP BY curso, unidade ASC"); 
while ($reg_consult = mysql_fetch_array($cursos_foreach_aux_q, MYSQL_ASSOC)) {
	$curso = $reg_consult['curso'];
	$unidade = $reg_consult['unidade'];
	$num_registros = $reg_consult['reg_num'];

	$sigla_str_q = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla ='$unidade'"); 
	$sigla_str_q_r = mysql_fetch_array($sigla_str_q, MYSQL_ASSOC);
	$sigla_str = $sigla_str_q_r['nomedaunidade'];

	$parte15 = '<div style="text-align: right">
	<br />
	<br>
	<br>
	<div style="text-align: center"> <h2>'.$curso.' - '.$sigla_str_q_r['nomedaunidade'].'</h2></div>
	<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
	<thead>
	<tr>
	<td style="font-size: 14pt;" width="25%"><b>Curso</b></td>
	<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
	</tr>
	</thead>
	<tbody>
	<!-- ITEMS HERE -->';

	$janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
		$janeiro = $reg_result['regs'];
	}

	$fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
		$fevereiro = $reg_result['regs'];
	}

	$marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
		$marco = $reg_result['regs'];
	}

	$abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
		$abril = $reg_result['regs'];
	}

	$maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
		$maio = $reg_result['regs'];
	}

	$junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
		$junho = $reg_result['regs'];
	}


	$julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
		$julho = $reg_result['regs'];
	}


	$agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
		$agosto  = $reg_result['regs'];
	}


	$setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
		$setembro = $reg_result['regs'];
	}


	$outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
		$outubro = $reg_result['regs'];
	}


	$novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
		$novembro = $reg_result['regs'];

	}


	$dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano' AND curso='$curso'"); 
	while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
		$dezembro = $reg_result['regs'];

	}


	$totalis_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE YEAR(data_registro) = '$ano' AND curso='$curso'"); 
	while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
		$totalis = $reg_result['regs'];
	}

	$janeiro_row = '<tr><td align="center">Janeiro</td>
	<td align="center">'.$janeiro.'</td></tr>';

	$fevereiro_row = '<tr><td align="center">Fevereiro</td>
	<td align="center">'.$fevereiro.'</td></tr>';

	$marco_row = '<tr><td align="center">Março</td>
	<td align="center">'.$marco.'</td></tr>';

	$abril_row = '<tr><td align="center">Abril</td>
	<td align="center">'.$abril.'</td></tr>';

	$maio_row = '<tr><td align="center">Maio</td>
	<td align="center">'.$maio.'</td></tr>';

	$junho_row = '<tr><td align="center">Junho</td>
	<td align="center">'.$junho.'</td></tr>';

	$julho_row = '<tr><td align="center">Julho</td>
	<td align="center">'.$julho.'</td></tr>';

	$agosto_row = '<tr><td align="center">Agosto</td>
	<td align="center">'.$agosto.'</td></tr>';

	$setembro_row = '<tr><td align="center">Setembro</td>
	<td align="center">'.$setembro.'</td></tr>';

	$outubro_row = '<tr><td align="center">Outrubro</td>
	<td align="center">'.$outubro.'</td></tr>';

	$novembro_row = '<tr><td align="center">Novembro</td>
	<td align="center">'.$novembro.'</td></tr>';

	$dezembro_row = '<tr><td align="center">Dezembro</td>
	<td align="center">'.$dezembro.'</td></tr>';

	$linhas_tabela99 = $janeiro_row.$fevereiro_row.$marco_row.$abril_row.$maio_row.$junho_row.$julho_row.$agosto_row.$setembro_row.$outubro_row.$novembro_row.$dezembro_row;

	$parte16 = '
	</tbody>
	</table>';

	$total_grad_c = $total_grad_c.$parte15.$linhas_tabela99.$parte16;
}


//DOUTROADO
$cursos_foreach_aux_q = mysql_query("SELECT data_registro, curso, unidade, COUNT(curso) AS reg_num FROM registros 
	WHERE unidade !='DMT' 
	AND tipo='Tese' 
	AND YEAR(data_registro) = '$ano' 
	GROUP BY curso, unidade ASC"); 
while ($reg_consult = mysql_fetch_array($cursos_foreach_aux_q, MYSQL_ASSOC)) {
	$curso = $reg_consult['curso'];
	$unidade = $reg_consult['unidade'];
	$num_registros = $reg_consult['reg_num'];

	$sigla_str_q = mysql_query("SELECT * FROM unidadesacademicas WHERE sigla ='$unidade'"); 
	$sigla_str_q_r = mysql_fetch_array($sigla_str_q, MYSQL_ASSOC);
	$sigla_str = $sigla_str_q_r['nomedaunidade'];

	$parte15 = '<div style="text-align: right">
	<br />
	<br>
	<br>
	<div style="text-align: center"> <h2>'.$curso.' - '.$sigla_str_q_r['nomedaunidade'].'</h2></div>
	<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
	<thead>
	<tr>
	<td style="font-size: 14pt;" width="25%"><b>Curso</b></td>
	<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
	</tr>
	</thead>
	<tbody>
	<!-- ITEMS HERE -->';

	$janeiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '01' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($janeiro_query, MYSQL_ASSOC)) {
		$janeiro = $reg_result['regs'];
	}

	$fevereiro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '02' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($fevereiro_query, MYSQL_ASSOC)) {
		$fevereiro = $reg_result['regs'];
	}

	$marco_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '03' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($marco_query, MYSQL_ASSOC)) {
		$marco = $reg_result['regs'];
	}

	$abril_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '04' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($abril_query, MYSQL_ASSOC)) {
		$abril = $reg_result['regs'];
	}

	$maio_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '05' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($maio_query, MYSQL_ASSOC)) {
		$maio = $reg_result['regs'];
	}

	$junho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '06' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($junho_query, MYSQL_ASSOC)) {
		$junho = $reg_result['regs'];
	}


	$julho_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '07' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($julho_query, MYSQL_ASSOC)) {
		$julho = $reg_result['regs'];
	}


	$agosto_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '08' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($agosto_query, MYSQL_ASSOC)) {
		$agosto  = $reg_result['regs'];
	}


	$setembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '09' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($setembro_query, MYSQL_ASSOC)) {
		$setembro = $reg_result['regs'];
	}


	$outubro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '10' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($outubro_query, MYSQL_ASSOC)) {
		$outubro = $reg_result['regs'];
	}


	$novembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '11' AND YEAR(data_registro) = '$ano' AND curso='$curso' AND unidade='$unidade'"); 
	while ($reg_result = mysql_fetch_array($novembro_query, MYSQL_ASSOC)) {
		$novembro = $reg_result['regs'];

	}


	$dezembro_query = mysql_query("SELECT COUNT(*) AS regs FROM registros WHERE MONTH(data_registro) = '12' AND YEAR(data_registro) = '$ano' AND curso='$curso'"); 
	while ($reg_result = mysql_fetch_array($dezembro_query, MYSQL_ASSOC)) {
		$dezembro = $reg_result['regs'];

	}

	$janeiro_row = '<tr><td align="center">Janeiro</td>
	<td align="center">'.$janeiro.'</td></tr>';

	$fevereiro_row = '<tr><td align="center">Fevereiro</td>
	<td align="center">'.$fevereiro.'</td></tr>';

	$marco_row = '<tr><td align="center">Março</td>
	<td align="center">'.$marco.'</td></tr>';

	$abril_row = '<tr><td align="center">Abril</td>
	<td align="center">'.$abril.'</td></tr>';

	$maio_row = '<tr><td align="center">Maio</td>
	<td align="center">'.$maio.'</td></tr>';

	$junho_row = '<tr><td align="center">Junho</td>
	<td align="center">'.$junho.'</td></tr>';

	$julho_row = '<tr><td align="center">Julho</td>
	<td align="center">'.$julho.'</td></tr>';

	$agosto_row = '<tr><td align="center">Agosto</td>
	<td align="center">'.$agosto.'</td></tr>';

	$setembro_row = '<tr><td align="center">Setembro</td>
	<td align="center">'.$setembro.'</td></tr>';

	$outubro_row = '<tr><td align="center">Outrubro</td>
	<td align="center">'.$outubro.'</td></tr>';

	$novembro_row = '<tr><td align="center">Novembro</td>
	<td align="center">'.$novembro.'</td></tr>';

	$dezembro_row = '<tr><td align="center">Dezembro</td>
	<td align="center">'.$dezembro.'</td></tr>';

	$linhas_tabela99 = $janeiro_row.$fevereiro_row.$marco_row.$abril_row.$maio_row.$junho_row.$julho_row.$agosto_row.$setembro_row.$outubro_row.$novembro_row.$dezembro_row;

	$parte16 = '
	</tbody>
	</table>';

	$total_grad_c = $total_grad_c.$parte15.$linhas_tabela99.$parte16;
}

$partefinal = '<div style="text-align: right">
<br />
<br>
<br>
<div style="text-align: center"> <h2>Dados Estatisticos</h2></div>
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Dado</b></td>
<td style="font-size: 14pt;" width="30%"><b>Quantidade de Registros</b></td>
</tr>
</thead>
<tbody>
<tr>
<td><center>TOTAL</center><b></td>
<td><center>'.$total_per_int.'</center></td>
</tr>
<tr>
<td><center>MÉDIA DE REGISTROS NO ANO</center><b></td>
<td><center>'.$total_per_media.'</center></td>
</tr>
</tbody>


</table>
</body>


</body> </html>';

$html = ''.$parte1.$parte2.$parte3.$linhas_tabela.$parte4.$parte5.$linhas_tabela2.$parte6.$parte7.$linhas_tabela3.$parte8.$parte9.$linhas_tabela4.$parte10.$parte11.$linhas_tabela5.$parte12.$parte13.$linhas_tabela6.$parte14.$total_grad_c.$partefinal;

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
require_once $path . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Relatório FICAT - Biblioteca Central");
$mpdf->SetAuthor("SEDEPTI");
// $mpdf->SetWatermarkText("Biblioteca Central");
// $mpdf->showWatermarkText = true;
// $mpdf->watermark_font = 'DejaVuSansCondensed';
// $mpdf->watermarkTextAlpha = 0.1;

$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output();