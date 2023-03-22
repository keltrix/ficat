<?php 


include "./conexao.php";
//Capturando valores do servidor
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if($usuario == "" || $usuario == null || $senha == "" || $senha == null){
  echo"<script language='javascript' type='text/javascript'>alert('O campo usuário deve ser preenchido');window.location.href='index.php';</script>";

}else{

    $query = "INSERT INTO usuariosficat (usuario,senha) VALUES ('$usuario',MD5('$senha'))";
    $insert = mysql_query($query,$conexao);

    if($insert){
      echo"<script language='javascript' type='text/javascript'>alert('Registrado com sucesso!');window.location.href='../../poranoxmes'</script>";

    }else{
      echo"<script language='javascript' type='text/javascript'>alert('Não registrado com sucesso.')</script>";
    }
  
}
?>
