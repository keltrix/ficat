<?php 


$banco = "";
$usuario = "";
$senha = "";
$host = "localhost";

// $banco = "fichacatalog";
// $usuario = "root";
// $senha = "";
// $host = "localhost";



$conexao = @mysql_connect($host,$usuario,$senha);
if (!($conexao)){
    print("<script language=JavaScript>
          alert(\"Não foi possível conectar ao Banco de Dados.\");
          </script>");
	echo $conexao;
    exit;
}


$db = mysql_select_db($banco,$conexao) or
    die("<script language=JavaScript>alert(\"Tabela inexistente!\");</script>");    

mysql_set_charset("utf8");

?>
