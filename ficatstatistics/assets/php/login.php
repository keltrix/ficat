<?php 

include "conexao.php";

if(isset($_POST['usuario'])){
$usuario = $_POST['usuario'];  
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 

if(!$usuario || !$senha) { 
	echo"<script language='javascript' type='text/javascript'>alert(' ACESSO NEGADO!  ACESSO NEGADO! PREENCHER DIREITO');window.location.href='http://bcficat.ufpa.br/';</script>";
	exit; 
}

$query = "SELECT usuario,senha FROM usuariosficat WHERE usuario='$usuario' AND senha='$senha'";
$search = mysql_query($query,$conexao) or die("erro ao selecionar");
$rows = mysql_num_rows($search);

if($rows) { 
	header("Location: ../../poranoxunidade"); 
	exit; 
}else{ 
	echo"<script language='javascript' type='text/javascript'>alert('O usuário ou senha digitado esta incorreto. ACESSO NEGADO!');window.location.href='http://bcficat.ufpa.br/'</script>";
	exit; 
}

}else{
	echo"<script language='javascript' type='text/javascript'>alert('USUARIO INEXISTENTE. ACESSO NEGADO!');window.location.href='http://bcficat.ufpa.br/'</script>";
	exit; 
}


?>
