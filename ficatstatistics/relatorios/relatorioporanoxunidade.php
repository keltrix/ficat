<?php

// Conexão com o Banco de Dados do FICAT
require __DIR__ . '/../assets/php/conexao.php';

// Conexão com as consultas ao banco de dados de Ano x Unidade
include __DIR__ . '/../assets/php/consulta_poranoxunidade.php';


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
td { vertical-align: top; }
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
$parte2 = '<div style="text-align: right">'.$registro_source.'</div>';

$parte3 = '<div style="text-align: right">
<br />
<table class="items" width="100%" style="font-size: 12pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td style="font-size: 14pt;" width="25%"><b>Mês</b></td>
<td style="font-size: 14pt;" width="10%"><b>Quantidade de Registros</b></td>
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

$linhas_tabela = $janeiro_row.$fevereiro_row.$marco_row.$abril_row.$maio_row.$junho_row.$julho_row.$agosto_row.$setembro_row.$outubro_row.$novembro_row.$dezembro_row;

$parte4 = '<tr>
<!-- END ITEMS HERE -->
<tr>

<td class="totals"><b>TOTAL:<b></td>
<td class="totals cost"><b>'.join($total, ',').'</b></td>
</tr>
</tbody>
</table>
</body>';

$parte5 = ' </html>';

$html = ''.$parte1.$parte2.$parte3.$linhas_tabela.$parte4.$parte5;

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