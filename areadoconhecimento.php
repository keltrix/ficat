<html>
<?php
include "assets/php/conexao.php";

?>
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
        url: 'assets/php/areadoconhecimentoLoad.php', 
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
<link type="text/css" rel="stylesheet" href="assets/css/areadoconhecimento.css"/>

<style type="text/css">
 body {background-color: #ffffff}
</style>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" language="JavaScript" src="assets/js/utils.js"></script>


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

<div style="margin-left:10px">

	Buscar um assunto no sistema de classificação:

<table>
<tr>
<td>    
	<form name="searchform" 
		  method="post" 
		  action="assets/php/areadoconhecimentoBusca.php?go">
	  <label for="termo">Filtrar: </label>
	  <input style="border-width:1px;border-style:solid;" name="termo" type="text" size="35" placeholder="Insira o termo aqui"/>
	  <input type="submit" name="submit" value="Aplicar"/>
	  <input type="hidden" name="ID" value="txtAreadoconhecimento"/>
	  <input type="hidden" name="action" value="filter"/>
	  <input type="hidden" name="callerUrl" value="index.php"/>
	</form>
</td>

<td>
	<form name="clearFilter" method="post" action="areadoconhecimento.php">
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

</td>
</tr>
</table>

</div>

<h1>Selecionar valor</h1>

<ul class="controlledvocabulary">
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');" alt="expand search term category"/>

<label>UFPA</label>
<ul class="controlledvocabulary">

<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('000', '000');" alt="expand search term category"/>
<label>GENERALIDADES</label>
<ul class="controlledvocabulary" id="000">

</li>
</ul>

<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('001', '001.94');" alt="expand search term category"/>
<label>CONHECIMENTO</label>
<ul class="controlledvocabulary" id="001">

</ul>
</li>

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('002', '002.0981');" alt="expand search term category"/>
<label>O LIVRO</label>
<ul class="controlledvocabulary" id="002">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('003', '003.857');" alt="expand search term category"/>
<label>SISTEMAS</label>
<ul class="controlledvocabulary" id="003">

</ul>
</li>

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('004', '004.9');" alt="expand search term category"/>
<label>PROCESSAMENTO DE DADOS. CIÊNCIA DA COMPUTAÇÃO (INFORMÁTICA)</label>
<ul class="controlledvocabulary" id="004">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('005', '005.84');" alt="expand search term category"/>
<label>PROGRAMAÇAO DE COMPUTADOR, PROGRAMAS, DADOS</label>
<ul class="controlledvocabulary" id="005">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('006', '006.8');" alt="expand search term category"/>
<label>MÉTODOS ESPECIAIS DE COMPUTADOR</label>
<ul class="controlledvocabulary" id="006">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('010', '019.1');" alt="expand search term category"/>
<label>BIBLIOGRAFIA</label>
<ul class="controlledvocabulary" id="010">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('020', '029.961');" alt="expand search term category"/>
<label>BIBLIOTECONOMIA E CIÊNCIA DA INFORMAÇÃO</label>
<ul class="controlledvocabulary" id="020">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->


<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('030', '039.924');" alt="expand search term category"/>
<label>ENCICLOPÉDIAS GERAIS</label>
<ul class="controlledvocabulary" id="030">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('060', '069.75');" alt="expand search term category"/>
<label>ORGANIZAÇÕES DE CARÁTER GERAL E MUSEOLOGIA</label>
<ul class="controlledvocabulary" id="060">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('070', '079.87');" alt="expand search term category"/>
<label>MÍDIA DOCUMENTÁRIA, JORNALISMO, EDITORES E EDIÇÃO</label>
<ul class="controlledvocabulary" id="070">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('080', '089');" alt="expand search term category"/>
<label>COLETÂNEAS</label>
<ul class="controlledvocabulary" id="080">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('090', '099');" alt="expand search term category"/>
<label>MANUSCRITOS E LIVROS RAROS</label>
<ul class="controlledvocabulary" id="090">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('100', '109.2');" alt="expand search term category"/>
<label>FILOSOFIA</label>
<ul class="controlledvocabulary" id="100">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('110', '119');" alt="expand search term category"/>
<label>METAFÍSICA</label>
<ul class="controlledvocabulary" id="110">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('120', '129.6');" alt="expand search term category"/>
<label>EPISTEMOLOGIA, CAUSALIDADE, O HOMEM</label>
<ul class="controlledvocabulary" id="120">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('130', '139');" alt="expand search term category"/>
<label>FENÔMENOS E ARTES PARANORMAIS, PARAPSICOLOGIA E OCULTISMO</label>
<ul class="controlledvocabulary" id="130">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('140', '149.97');" alt="expand search term category"/>
<label>SISTEMAS FILOSÓFICOS</label>
<ul class="controlledvocabulary" id="140">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('150', '159');" alt="expand search term category"/>
<label>PSICOLOGIA</label>
<ul class="controlledvocabulary" id="150">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('160', '169');" alt="expand search term category"/>
<label>LÓGICA</label>
<ul class="controlledvocabulary" id="160">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('170', '179.9');" alt="expand search term category"/>
<label>ÉTICA (FILOSOFIA MORAL)</label>
<ul class="controlledvocabulary" id="170">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('180', '189.5');" alt="expand search term category"/>
<label>FILOSOFIA ANTIGA, MEDIEVAL, ORIENTAL</label>
<ul class="controlledvocabulary" id="180">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('190', '199.82');" alt="expand search term category"/>
<label>FILOSOFIA MODERNA, FILOSOFIA CRISTÃ</label>
<ul class="controlledvocabulary" id="190">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('200', '209');" alt="expand search term category"/>
<label>RELIGIÃO</label>
<ul class="controlledvocabulary" id="200">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('210', '215.72');" alt="expand search term category"/>
<label>FILOSOFIA E TEORIA DA RELIGIÃO</label>
<ul class="controlledvocabulary" id="210">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('220', '229.9206');" alt="expand search term category"/>
<label>BÍBLIA</label>
<ul class="controlledvocabulary" id="220">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('230', '239.4');" alt="expand search term category"/>
<label>TEOLOGIA CRISTÃ, DOUTRINA CRISTÃ</label>
<ul class="controlledvocabulary" id="230">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('240', '249');" alt="expand search term category"/>
<label>CRISTIANISMO, TEOLOGIA MORAL E DEVOCIONAL</label>
<ul class="controlledvocabulary" id="240">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('250', '259');" alt="expand search term category"/>
<label>IGREJA CRISTÃ E ORDENS RELIGIOSAS</label>
<ul class="controlledvocabulary" id="250">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('260', '269.20946');" alt="expand search term category"/>
<label>CRISTIANISMO. TEOLOGIA SOCIAL E ECLESIÁSTICA</label>
<ul class="controlledvocabulary" id="260">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('270', '278.1');" alt="expand search term category"/>
<label>IGREJA CRISTÃ. HISTÓRIA DA IGREJA</label>
<ul class="controlledvocabulary" id="270">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('280', '289.94');" alt="expand search term category"/>
<label>IGREJA CRISTÃ. CREDOS E SEITAS</label>
<ul class="controlledvocabulary" id="280">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('290', '299.935');" alt="expand search term category"/>
<label>RELIGIÃO COMPARADA E OUTRAS RELIGIÕES</label>
<ul class="controlledvocabulary" id="290">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('300', '300.981');" alt="expand search term category"/>
<label>CIÊNCIAS SOCIAIS</label>
<ul class="controlledvocabulary" id="300">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('301', '301.7');" alt="expand search term category"/>
<label>SOCIOLOGIA E ANTROPOLOGIA</label>
<ul class="controlledvocabulary" id="301">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui');  chamaAreaDoConhecimento('302', '302.545');" alt="expand search term category"/>
<label>INTERAÇÃO SOCIAL - COMUNICAÇÃO</label>
<ul class="controlledvocabulary" id="302">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('303', '303.483309811');" alt="expand search term category"/>
<label>PROCESSOS SOCIAIS</label>
<ul class="controlledvocabulary" id="303">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('304', '304.483309811');" alt="expand search term category"/>
<label>FATORES INFLUENCIANDO O COMPORTAMENTO SOCIAL</label>
<ul class="controlledvocabulary" id="304">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('305', '305.963');" alt="expand search term category"/>
<label>GRUPOS SOCIAIS</label>
<ul class="controlledvocabulary" id="305">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('306', '306.9098115');" alt="expand search term category"/>
<label>CULTURAS E INSTITUIÇÕES</label>
<ul class="controlledvocabulary" id="306">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('307', '307.768098115');" alt="expand search term category"/>
<label>COMUNIDADES</label>
<ul class="controlledvocabulary" id="307">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('309', '309.2620981');" alt="expand search term category"/>
<label>CONDIÇÕES SOCIAIS</label>
<ul class="controlledvocabulary" id="309">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('310', '318.16');" alt="expand search term category"/>
<label>ESTATÍSTICA</label>
<ul class="controlledvocabulary" id="310">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('320', '329.982');" alt="expand search term category"/>
<label>CIÊNCIA POLÍTICA (POLÍTICA E GOVERNO)</label>
<ul class="controlledvocabulary" id="320">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('330', '330.987');" alt="expand search term category"/>
<label>ECONOMIA</label>
<ul class="controlledvocabulary" id="330">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('331', '331.89298161');" alt="expand search term category"/>
<label>ECONOMIA DO TRABALHO</label>
<ul class="controlledvocabulary" id="331">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('332', '332.9');" alt="expand search term category"/>
<label>ECONOMIA FINANCEIRA</label>
<ul class="controlledvocabulary" id="332">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('333', '333.9595');" alt="expand search term category"/>
<label>ECONOMIA DA TERRA: ENERGIA</label>
<ul class="controlledvocabulary" id="333">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('334', '334.7098115');" alt="expand search term category"/>
<label>COOPERATIVAS</label>
<ul class="controlledvocabulary" id="334">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('335', '335.9');" alt="expand search term category"/>
<label>SOCIALISMO E SISTEMAS AFINS</label>
<ul class="controlledvocabulary" id="335">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('336', '336.8134');" alt="expand search term category"/>
<label>FINANÇAS PUBLICAS: FORMAS DE RENDA</label>
<ul class="controlledvocabulary" id="336">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('337', '337.87');" alt="expand search term category"/>
<label>ECONOMIA INTERNACIONAL. PLANEJAMENTO ECONÔMICO INTERNACIONAL</label>
<ul class="controlledvocabulary" id="337">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('338', '338.987');" alt="expand search term category"/>
<label>PRODUÇÃO, INDÚSTRIA</label>
<ul class="controlledvocabulary" id="338">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('339', '339.530981');" alt="expand search term category"/>
<label>MACROECONOMIA E ASSUNTOS CORRELATOS</label>
<ul class="controlledvocabulary" id="339">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('340', '340.98115');" alt="expand search term category"/>
<label>DIREITO</label>
<ul class="controlledvocabulary" id="340">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('341', '341.53328');" alt="expand search term category"/>
<label>DIREITO PUBLICO</label>
<ul class="controlledvocabulary" id="341">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('342', '342.6981');" alt="expand search term category"/>
<label>DIREITO PRIVADO</label>
<ul class="controlledvocabulary" id="342">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('343', '343.8104');" alt="expand search term category"/>
<label>DIREITO CANÔNICO E ECLESIÁSTICO</label>
<ul class="controlledvocabulary" id="343">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('344', '344.81099');" alt="expand search term category"/>
<label>DIREITO ROMANO</label>
<ul class="controlledvocabulary" id="344">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('350', '350.99');" alt="expand search term category"/>
<label>ADMINISTRAÇÃO PÚBLICA. PODER EXECUTIVO. CIÊNCIA MILITAR</label>
<ul class="controlledvocabulary" id="350">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('351', '351.8550981');" alt="expand search term category"/>
<label>ADMINISTRAÇÃO PUBLICA</label>
<ul class="controlledvocabulary" id="351">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('352', '352.96208161');" alt="expand search term category"/>
<label>ADMINISTRAÇÃO MUNICIPAL</label>
<ul class="controlledvocabulary" id="352">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('353', '353.95098115');" alt="expand search term category"/>
<label>ÁREAS ESPECIFICAS DA ADMINISTRAÇÃO PUBLICA</label>
<ul class="controlledvocabulary" id="353">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('354', '354.8681');" alt="expand search term category"/>
<label>ADMINISTRAÇÃO PÚBLICA DA ECONOMIA E MEIO AMBIENTE</label>
<ul class="controlledvocabulary" id="354">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('355', '355.8209');" alt="expand search term category"/>
<label>CIÊNCIA MILITAR. FORÇAS ARMADAS</label>
<ul class="controlledvocabulary" id="355">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('356', '356.15');" alt="expand search term category"/>
<label>FORÇAS ARMADAS: EXÉRCITO</label>
<ul class="controlledvocabulary" id="356">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('358', '358.4');" alt="expand search term category"/>
<label>AR E OUTRAS FORÇAS E GUERRAS ESPECIALIZADAS. ENGENHARIA E SERVIÇOS AFINS</label>
<ul class="controlledvocabulary" id="358">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('359', '359.96');" alt="expand search term category"/>
<label>FORÇAS ARMADAS. MARINHA</label>
<ul class="controlledvocabulary" id="359">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('360', '362.98115');" alt="expand search term category"/>
<label>PATOLOGIA SOCIAL. SERVIÇOS SOCIAIS. ASSOCIAÇÕES</label>
<ul class="controlledvocabulary" id="360">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<!-- <li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('362 (18.ED.)', '362.98115');" alt="expand search term category"/>
<label>PATOLOGIA SOCIAL (********A CORRIGIR********)</label>
<ul class="controlledvocabulary" id="362 (18.ED.)">

</ul>
</li> -->
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('363', '363.9709811');" alt="expand search term category"/>
<label>OUTROS PROBLEMAS E SERVIÇOS SOCIAIS</label>
<ul class="controlledvocabulary" id="363">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('364', '364.98161');" alt="expand search term category"/>
<label>CRIMINOLOGIA</label>
<ul class="controlledvocabulary" id="364">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('365', '365.98153');" alt="expand search term category"/>
<label>INSTITUIÇÕES PENAIS</label>
<ul class="controlledvocabulary" id="365">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('366', '366.1098115');" alt="expand search term category"/>
<label>SOCIEDADES. SOCIEDADES ESOTÉRICAS, SECRETAS E SEMI SECRETAS</label>
<ul class="controlledvocabulary" id="366">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('367', '367.98115');" alt="expand search term category"/>
<label>CLUBES EM GERAL. CLUBES SOCIAIS</label>
<ul class="controlledvocabulary" id="367">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('368', '368.42');" alt="expand search term category"/>
<label>SEGUROS. PREVIDÊNCIA SOCIAL</label>
<ul class="controlledvocabulary" id="368">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('369', '369.5');" alt="expand search term category"/>
<label>SOCIEDADES HEREDITÁRIAS, MILITARES, PATRIÓTICAS</label>
<ul class="controlledvocabulary" id="369">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('370', '370.9861');" alt="expand search term category"/>
<label>EDUCAÇÃO</label>
<ul class="controlledvocabulary" id="370">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('371', '371.9798083');" alt="expand search term category"/>
<label>EDUCAÇÃO E SUAS ATIVIDADES</label>
<ul class="controlledvocabulary" id="371">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('372', '372.6561');" alt="expand search term category"/>
<label>EDUCAÇÃO ELEMENTAR (ENSINO DE 1º GRAU. ENSINO FUNDAMENTAL)</label>
<ul class="controlledvocabulary" id="372">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('373', '373.98115');" alt="expand search term category"/>
<label>EDUCAÇÃO SECUNDÁRIA (ENSINO MÉDIO)</label>
<ul class="controlledvocabulary" id="373">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('374', '374.98165');" alt="expand search term category"/>
<label>EDUCAÇÃO DE ADULTOS</label>
<ul class="controlledvocabulary" id="374">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('375', '375.91');" alt="expand search term category"/>
<label>CURRÍCULOS</label>
<ul class="controlledvocabulary" id="375">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('376', '376.98161');" alt="expand search term category"/>
<label>EDUCAÇÃO FEMININA</label>
<ul class="controlledvocabulary" id="376">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('377', '377.6');" alt="expand search term category"/>
<label>ENSINO RELIGIOSO</label>
<ul class="controlledvocabulary" id="377">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('378', '378.981');" alt="expand search term category"/>
<label>EDUCAÇÃO SUPERIOR. EDUCAÇÃO UNIVERSITÁRIA. UNIVERSIDADES</label>
<ul class="controlledvocabulary" id="378">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('379', '379.8162');" alt="expand search term category"/>
<label>EDUCAÇÃO E ESTADO. POLÍTICAS PÚBLICAS PARA EDUCAÇÃO</label>
<ul class="controlledvocabulary" id="379">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('380', '380.509811');" alt="expand search term category"/>
<label>COMÉRCIO, COMUNICAÇÕES, TRANSPORTES</label>
<ul class="controlledvocabulary" id="380">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('381', '381.45002098151');" alt="expand search term category"/>
<label>COMÉRCIO INTERNO</label>
<ul class="controlledvocabulary" id="381">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('382', '382.710981');" alt="expand search term category"/>
<label>COMÉRCIO INTERNACIONAL</label>
<ul class="controlledvocabulary" id="382">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('383', '383');" alt="expand search term category"/>
<label>COMUNICAÇÃO POSTAL. CORREIOS</label>
<ul class="controlledvocabulary" id="383">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('384', '384.830981');" alt="expand search term category"/>
<label>TELECOMUNICAÇÕES E OUTROS SISTEMAS DE COMUNICAÇÃO</label>
<ul class="controlledvocabulary" id="384">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('385', '385.2');" alt="expand search term category"/>
<label>TRANSPORTE FERROVIÁRIO. FERROVIAS<label>
<ul class="controlledvocabulary" id="385">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('386', '386.8098115');" alt="expand search term category"/>
<label>TRANSPORTE HIDROVIÁRIO</label>
<ul class="controlledvocabulary" id="386">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('387', '387.71098115');" alt="expand search term category"/>
<label>TRANSPORTE MARÍTIMO</label>
<ul class="controlledvocabulary" id="387">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('388', '388.473');" alt="expand search term category"/>
<label>TRANSPORTE TERRESTRE. RODOVIAS</label>
<ul class="controlledvocabulary" id="388">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('389', '389.60981');" alt="expand search term category"/>
<label>NORMALIZAÇÃO. METROLOGIA</label>
<ul class="controlledvocabulary" id="389">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('390', '399');" alt="expand search term category"/>
<label>COSTUMES, ETIQUETA, FOLCLORE</label>
<ul class="controlledvocabulary" id="390">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('400', '409.2');" alt="expand search term category"/>
<label>LINGUAGEM E LÍNGUA</label>
<ul class="controlledvocabulary" id="400">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('410', '419.8115');" alt="expand search term category"/>
<label>LINGUÍSTICA</label>
<ul class="controlledvocabulary" id="410">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('420', '429');" alt="expand search term category"/>
<label>LÍNGUA INGLESA</label>
<ul class="controlledvocabulary" id="420">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('430', '439.9');" alt="expand search term category"/>
<label>LÍNGUAS GERMÂNICAS. ALEMÃO</label>
<ul class="controlledvocabulary" id="430">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('440', '449.9');" alt="expand search term category"/>
<label>LÍNGUAS ROMÂNICAS. FRANCÊS.</label>
<ul class="controlledvocabulary" id="440">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('450', '459.9');" alt="expand search term category"/>
<label>LÍNGUAS INTALIANA, SARDO, DALMÁCIO, ROMENO, RETRO-ROMÂNICO</label>
<ul class="controlledvocabulary" id="450">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('460', '469.8');" alt="expand search term category"/>
<label>LÍNGUA ESPANHOLA E PORTUGUESA</label>
<ul class="controlledvocabulary" id="460">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('470', '479.9');" alt="expand search term category"/>
<label>LÍNGUAS ITÁLICAS. LATIM</label>
<ul class="controlledvocabulary" id="470">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('480', '489.3');" alt="expand search term category"/>
<label>LÍNGUAS HELÊNICAS. GREGO</label>
<ul class="controlledvocabulary" id="480">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('490', '499.993');" alt="expand search term category"/>
<label>OUTRAS LÍNGUAS</label>
<ul class="controlledvocabulary" id="490">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('500', '509.8162');" alt="expand search term category"/>
<label>CIÊNCIAS NATURAIS. CIÊNCIAS APLICADAS</label>
<ul class="controlledvocabulary" id="500">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('510', '519.86');" alt="expand search term category"/>
<label>MATEMÁTICA</label>
<ul class="controlledvocabulary" id="510">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('520', '529');" alt="expand search term category"/>
<label>ASTRONOMIA</label>
<ul class="controlledvocabulary" id="520">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('530', '539.47');" alt="expand search term category"/>
<label>FÍSICA</label>
<ul class="controlledvocabulary" id="530">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('540', '549.98121');" alt="expand search term category"/>
<label>QUÍMICA E CIÊNCIAS AFINS</label>
<ul class="controlledvocabulary" id="540">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('550', '558.175');" alt="expand search term category"/>
<label>CIÊNCIAS DA TERRA: GEOFÍSICA</label>
<ul class="controlledvocabulary" id="550">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('560', '569.80981');" alt="expand search term category"/>
<label>PALEONTOLOGIA, PALEOZOOLOGIA</label>
<ul class="controlledvocabulary" id="560">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('570', '579.89098121');" alt="expand search term category"/>
<label>CIÊNCIAS DA VIDA. BIOLOGIA</label>
<ul class="controlledvocabulary" id="570">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('580', '598.4');" alt="expand search term category"/>
<label>CIÊNCIAS BOTÂNICAS. JARDINS BOTÂNICOS. PLANTAS</label>
<ul class="controlledvocabulary" id="580">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('590', '599.989912');" alt="expand search term category"/>
<label>CIÊNCIAS ZOOLÓGICAS. JARDINS ZOOLÓGICOS. ANIMAIS.</label>
<ul class="controlledvocabulary" id="590">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('600', '609.811');" alt="expand search term category"/>
<label>TECNOLOGIA (CIÊNCIAS APLICADAS), PATENTES E INVENÇÕES</label>
<ul class="controlledvocabulary" id="600">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('610', '618.976994');" alt="expand search term category"/>
<label>CIÊNCIAS MÉDICAS. SAÚDE PÚBLICA. FARMACOLOGIA. DOENÇAS.</label>
<ul class="controlledvocabulary" id="610">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('620', '629.895');" alt="expand search term category"/>
<label>ENGENHARIA</label>
<ul class="controlledvocabulary" id="620">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('630', '639.9');" alt="expand search term category"/>
<label>AGRICULTURA</label>
<ul class="controlledvocabulary" id="630">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('640', '649.8');" alt="expand search term category"/>
<label>ECONOMIA DOMÉSTICA E VIDA FAMILIAR</label>
<ul class="controlledvocabulary" id="640">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('650', '659.2');" alt="expand search term category"/>
<label>PRÁTICA COMERCIAL. NEGÓCIOS</label>
<ul class="controlledvocabulary" id="650">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('660', '670.95141');" alt="expand search term category"/>
<label>ENGENHARIA QUÍMICA E TECNOLOGIAS RELACIONADAS</label>
<ul class="controlledvocabulary" id="660">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('670', '679');" alt="expand search term category"/>
<label>FÁBRICAS. FABRICAÇÃO DE PRODUTOS</label>
<ul class="controlledvocabulary" id="670">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('680', '688.8');" alt="expand search term category"/>
<label>PRODUTOS MANUFATURADOS</label>
<ul class="controlledvocabulary" id="680">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('690', '698');" alt="expand search term category"/>
<label>CONSTRUÇÕES</label>
<ul class="controlledvocabulary" id="690">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('700', '709.8161');" alt="expand search term category"/>
<label>BELAS ARTES E ARTES DECORATIVAS</label>
<ul class="controlledvocabulary" id="700">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('710', '719.32098161');" alt="expand search term category"/>
<label>URBANISMO E ARQUITETURA PAISAGÍSTIA</label>
<ul class="controlledvocabulary" id="710">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('720', '729.29');" alt="expand search term category"/>
<label>ARQUITETURA</label>
<ul class="controlledvocabulary" id="720">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('730', '739.7');" alt="expand search term category"/>
<label>ARTES PLÁSTICAS. ESCULTURA</label>
<ul class="controlledvocabulary" id="730">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('740', '749.09');" alt="expand search term category"/>
<label>DESENHO. ARTES DECORATIVAS E ARTES MENORES.</label>
<ul class="controlledvocabulary" id="740">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('750', '759.995');" alt="expand search term category"/>
<label>PINTURA</label>
<ul class="controlledvocabulary" id="750">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('760', '769.981');" alt="expand search term category"/>
<label>ARTES GRÁFICAS, GRAVURAS</label>
<ul class="controlledvocabulary" id="760">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('770', '779');" alt="expand search term category"/>
<label>FOTOGRAFIA, ARTE POR COMPUTADOR</label>
<ul class="controlledvocabulary" id="770">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('780', '789.01');" alt="expand search term category"/>
<label>MÚSICA</label>
<ul class="controlledvocabulary" id="780">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('790', '799.3');" alt="expand search term category"/>
<label>RECREAÇÕES E ESPETÁCULOS ARTÍSTICOS</label>
<ul class="controlledvocabulary" id="790">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('800', '809.93355');" alt="expand search term category"/>
<label>LITERATURA E RETÓRICA</label>
<ul class="controlledvocabulary" id="800">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('810', '818.52');" alt="expand search term category"/>
<label>LITERATURA AMERICANA</label>
<ul class="controlledvocabulary" id="810">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('820', '829.09');" alt="expand search term category"/>
<label>LITERATURA INGLESA</label>
<ul class="controlledvocabulary" id="820">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('830', '839.9');" alt="expand search term category"/>
<label>LITERATURA ALEMÃ</label>
<ul class="controlledvocabulary" id="830">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('840', '849.9');" alt="expand search term category"/>
<label>LITERATURA DE LÍNGUAS ROMÂNICAS. LITERATURA FRANCESA</label>
<ul class="controlledvocabulary" id="840">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('850', '859.9');" alt="expand search term category"/>
<label>LITERATURAS ITALIANA, ROMENA, RÉTICA</label>
<ul class="controlledvocabulary" id="850">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('860', '869.985');" alt="expand search term category"/>
<label>LITERATURA EM LÍNGUA ESPANHOLA E PORTUGUESA</label>
<ul class="controlledvocabulary" id="860">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('870', '879');" alt="expand search term category"/>
<label>LITERATURA ITÁLICA. LITERATURA LATINA</label>
<ul class="controlledvocabulary" id="870">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('880', '889');" alt="expand search term category"/>
<label>LITERATURA CLÁSSICA GREGA E LATINA</label>
<ul class="controlledvocabulary" id="880">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('890', '899');" alt="expand search term category"/>
<label>LITERATURAS DE LÍNGUAS DIVERSAS (EXCETO GERMÂNICA, LATINAS E GREGAS)</label>
<ul class="controlledvocabulary" id="890">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('900', '909.83');" alt="expand search term category"/>
<label>GEOGRAFIA. HISTÓRIA E CIÊNCIAS AUXILIARES</label>
<ul class="controlledvocabulary" id="900">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('910', '919.9');" alt="expand search term category"/>
<label>GEOGRAFIA E VIAGENS</label>
<ul class="controlledvocabulary" id="910">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('920', '929.920981');" alt="expand search term category"/>
<label>BIOGRAFIAS</label>
<ul class="controlledvocabulary" id="920">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('930', '939');" alt="expand search term category"/>
<label>HISTÓRIA ANTIGA ATÉ CA. 499</label>
<ul class="controlledvocabulary" id="930">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('940', '949.9');" alt="expand search term category"/>
<label>HISTÓRIA. EUROPA</label>
<ul class="controlledvocabulary" id="940">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('950', '959.9');" alt="expand search term category"/>
<label>HISTÓRIA. ASIS. EXTREMO ORIENTE</label>
<ul class="controlledvocabulary" id="950">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('960', '969.1');" alt="expand search term category"/>
<label>HISTÓRIA. AFRICA</label>
<ul class="controlledvocabulary" id="960">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('970', '974.742');" alt="expand search term category"/>
<label>HISTÓRIA. AMÉRICA DO NORTE</label>
<ul class="controlledvocabulary" id="970">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('980', '989.5');" alt="expand search term category"/>
<label>HISTÓRIA. AMÉRICA DO SUL. AMÉRICA LATINA</label>
<ul class="controlledvocabulary" id="980">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->
<li>
<img class="controlledvocabulary" src="assets/imgs/p.gif" onclick="ec(this, '/jspui'); chamaAreaDoConhecimento('990', '999');" alt="expand search term category"/>
<label>HISTÓRIA. OCEANIA. OUTRAS REGIÕES. MUNDOS EXTRATERRESTRES</label>
<ul class="controlledvocabulary" id="990">

</ul>
</li>
<!-- =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_= -->

<!-- As seguintes closing tags encerram o campo UFPA. Todas as inserções devem ser realizadas acima -->
</ul>
</ul>
</li>
</ul>


<br/>
<center>
	<input type="button" name="cancel" onclick="fecharPopup();" value="Fechar" />
</center>
</body>
</html>
