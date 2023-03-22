<html>
<head> 
<script>
function chamaAreaDoConhecimento(from, to){
	/***
		* N. do A.:
		* Ajuda da função:
		* Toda chamada de função, em JS, deve ser feita com os numeros entre aspas simples: ''; pois o javascript passa numeros
		* começados em 0 em base octal, dessa forma, para o numero 010, o resultado retornado é 8. Esse problema é contornado com o uso de aspas simples.
		*
		* A variável de controle, requestFrom, foi alterada para apenas from. O codigo ira puxar o elemento que possui o mesmo valor em "from", e alterará seu conteudo.
		* Ou seja, as variaveis "id" e "from" devem possuir o mesmo valor.
	***/
    var from;
    var to;
    //var requestFrom;
    $.ajax({
        type: 'POST',
        url: 'areadoconhecimentoLoad.php', 
        data:({from, to}),
        success: function(data) {
            document.getElementById(from).innerHTML=data;
        }
    });
} 
</script>
<title>Selecionar valor</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>


<link rel="shortcut icon" href="/jspui/favicon.ico" type="image/x-icon"/>
<link type="text/css" rel="stylesheet" href="../css/areadoconhecimento.css"/>

<style type="text/css">
 body {background-color: #ffffff}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" language="JavaScript" src="../js/utils.js"></script>


	<script type="text/javascript">

		function fecharPopup(){
			parent.$.magnificPopup.instance.close();
		}

		function sendBackToParentWindow(node) {
			var cdd = node.getAttribute("value");
			var resultPath = "";
			
			var pathSeparator = " - ";

			resultPath = cdd + pathSeparator + getTextValue(node);
			
			// Para uso com iFrame (biblioteca magnificPopup)
			window.parent.document.ficha.txtAreadoconhecimento.value = resultPath;
			window.parent.document.ficha.txtCddconhecimento.value = cdd;
			parent.$.magnificPopup.instance.close();

			// Para uso em funções como window.open
			//window.opener.document.ficha.txtAreadoconhecimento.value = resultPath;
			//window.opener.document.ficha.txtCddconhecimento.value = cdd;
			//self.close();
			return false;
		}
	</script>
</head>

<body>
<?php 
//while($reg2 = mysql_fetch_object($rs2)):
//	echo $reg2->COD_AREA_CONHECIMENTO;

//endwhile;

?>
<div style="margin-left:10px">

	Buscar um assunto em um vocabulário controlado:

<table>
<tr>
<!-- <td>
    Filtrar: 
</td> -->
<td>    
	<form name="searchform" 
		  method="post" 
		  action="areadoconhecimentoBusca.php?go">
	
	  <label for="termo">Filtrar: </label>
	  <input style="border-width:1px;border-style:solid;" name="termo" type="text" size="35" placeholder="Insira o termo aqui"/>
	  <input type="submit" name="submit" value="Aplicar"/>
	  <input type="hidden" name="ID" value="txtAreadoconhecimento"/>
	  <input type="hidden" name="action" value="filter"/>
	  <input type="hidden" name="callerUrl" value="index.php"/>
	</form>
</td>


<td>
	<form name="clearFilter" method="post" action="../../areadoconhecimento.php">
	  <input type="hidden" name="ID" value="txtAreadoconhecimento"/>
	  <input type="hidden" name="filter" value=""/>
	  <input type="submit" name="submit" value="Excluir"/>
	  <input type="hidden" name="action" value="filter"/> 
	  <input type="hidden" name="callerUrl" value="index.php"/>
    </form>
</td>
</tr>
<tr>
<td colspan="3" class="submitFormHelpControlledVocabularies">

<br>

<a href="../../areadoconhecimento.php">Exibir todas as categorias
</td>
</tr>
</table>

</div>

<h1>Selecionar valor</h1>

<?php

$forbChars = "/[A-Z | a-z]+/";

if (isset($_POST['submit'])) {
	if (isset($_GET['go'])){
		if (preg_match($forbChars, $_POST['termo'])){
			$termo=$_POST['termo'];
			$db=mysql_connect("10.7.2.45", "sedepti", "Z.7/X=F5b@F5") or die("Não conectou. Erro: " . mysql_error());
			$mydb=mysql_select_db("fichacatalog");
            mysql_set_charset("utf8");
			$sql="SELECT* FROM `newareadoconhecimento` WHERE `DESC_AREA_CONHECIMENTO` LIKE '%" . $termo . "%' ORDER BY `COD_AREA_CONHECIMENTO` ASC";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result)){
                $COD_AREA_CONHECIMENTO = $row['COD_AREA_CONHECIMENTO'];
				$DESC_AREA_CONHECIMENTO = $row['DESC_AREA_CONHECIMENTO'];
				echo"<ul>\n";
				//echo "<li>" ."<a href=\"areadoconhecimentobusca.php?id=$ID\">".$DESC_AREA_CONHECIMENTO."</a></li>\n";
                //echo "<li>" . "<a href='javascript:void(null') onclick='javascript: i(this); class='value' value=" .$COD_AREA_CONHECIMENTO . ">" . echo $DESC_AREA_CONHECIMENTO. "</li>";
                echo "<li>" . "<a href='javascript:void(null);' onclick='javascript: i(this);' class='value' value=" .$COD_AREA_CONHECIMENTO.">"; echo $DESC_AREA_CONHECIMENTO;
                echo "</ul>";
			}
		}
		else {
			echo  "<p>Digite uma busca</p>";
		}
	}
}

?>

<!-- As seguintes closing tags encerram o campo UFPA. Todas as inserções devem ser realizadas acima -->
</ul>
</ul>
</li>
</ul>




<br/>
<center>
	<input type="button" name="cancel" onclick="fecharPopup()" value="Fechar" />
</center>
</body>
</html>
