<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
</html>
<?php
include "conexao.php";

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$id_estado = $_GET['unidades'];

$rs = mysql_query("SELECT * FROM cursosdegraduacao WHERE unidade = '$id_estado' ORDER BY id");
	while($reg = mysql_fetch_object($rs)){
		echo "<option id='escolhido' value='$reg->nomedocurso'>$reg->nomedocurso</option>";
}

?>
