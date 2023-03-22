<?php

$keys = array(
	'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u', 'ç' => 'c', 
	'Á' => 'A', 'À' => 'A', 'Ã' => 'A', 'Â' => 'A', 'É' => 'E', 'Ê' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ü' => 'U', 'Ç' => 'C', 
	' ' => '_');

// monta o Codigo PHA
$sobrenome = $_POST["sobrenome"];

  // Primeira letra do Sobrenome
$sobrenome = strtr($sobrenome,$keys);
$sobrenome = ucfirst(strtolower($sobrenome));
$codigo1 = strtoupper(substr($sobrenome,0,1));


  // separa o Título por espaços em branco e verifica a primeira palavra
  // se a	 primeira palavra for uma stopword, o $codigo2 será a primeira letra da segunda palavra do Título

$titulo = $_POST["titulo"];

$aspas_filtro = array("'", '"');
$titulo = str_replace($aspas_filtro, "", $titulo);


$vetitulo = explode (" ",$titulo);

$stopwords = array ("o", "[']", '["]', "a", "os", "as", "um", "uns", "uma", "umas", "de", "do", "da", "dos", "das", "no", "na", "nos", "nas", "ao", "aos", "à", "às", "pelo", "pela", "pelos", "pelas", "duma", "dumas", "dum", "duns", "num", "numa", "nuns", "numas", "com", "por", "em");

if (in_array (strtolower($vetitulo[0]), $stopwords)){
	$vetitulo[1] = strtr($vetitulo[1],$keys);
	$codigo2 = strtolower(substr($vetitulo[1],0,1));
}
else{
	$vetitulo[0] = strtr($vetitulo[0],$keys);
	$codigo2 = strtolower(substr($vetitulo[0],0,1));
}
if(strtolower($sobrenome[0])==strtolower($sobrenome[1])){
	$sobrenome = substr($sobrenome, 1);
	if(strtolower($sobrenome[0])==strtolower($sobrenome[1])){
		$sobrenome = substr($sobrenome, 1);
		if(strtolower($sobrenome[0])==strtolower($sobrenome[1])){
			$sobrenome = substr($sobrenome, 1);
		}
	}
}

$sobrenomeaux = explode(" ", $sobrenome);

$sobrenomeaux[0] = ucfirst($sobrenomeaux[0]);
$sobrenomeaux[0] = strtr($sobrenomeaux[0], "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_");
$txt = "assets/txt/pha.txt";
$abre = fopen($txt, "r");
$informacao = fread($abre, filesize($txt));
fclose($abre);
$linha = explode("\n", $informacao);
for($i = 0; $i < count($linha); $i++)
{
	$separa = explode("	", $linha[$i]);
	$codigo_pha = trim($separa[0]);
	$nome_pha = trim($separa[1]);


	if ($sobrenomeaux[0] == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux2 = substr($sobrenomeaux[0],0,10);

	if ($sobrenomeaux2 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux3 = substr($sobrenomeaux[0],0,9);

	if ($sobrenomeaux3 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux4 = substr($sobrenomeaux[0],0,8);

	if ($sobrenomeaux4 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux5 = substr($sobrenomeaux[0],0,7);
	
	if ($sobrenomeaux5 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux6 = substr($sobrenomeaux[0],0,6);

	if ($sobrenomeaux6 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux7 = substr($sobrenomeaux[0],0,5);

	if ($sobrenomeaux7 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux8 = substr($sobrenomeaux[0],0,4);

	if ($sobrenomeaux8 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux9 = substr($sobrenomeaux[0],0,3);

	if ($sobrenomeaux9 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux10 = substr($sobrenomeaux[0],0,2);

	if ($sobrenomeaux10 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
	else
		$sobrenomeaux11 = substr($sobrenomeaux[0],0,1);

	if ($sobrenomeaux11 == $nome_pha){
		$codigo = $codigo1.$codigo_pha.$codigo2;
	}
		// Condi��es PHA
		/*
		if ($sobrenomeaux[0] == "Abreu" && $primeira_letra >= "M"){
			$codigo_pha == "146";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aguiar" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "228";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aguiar" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "229";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aguiar" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "23";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aguiar" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "231";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aguiar" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "232";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}	
		if ($sobrenomeaux[0] == "Aguiar" && $primeira_letra >= "T"){
			$codigo_pha = "233";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Albuquerque" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "299";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Albuquerque" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "31";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Albuquerque" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "311";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Albuquerque" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "312";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Albuquerque" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "313";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Albuquerque" && $primeira_letra >= "T"){
			$codigo_pha = "314";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Alcantara" && $primeira_letra >= "F" && $primeira_letra < "P"){
				$codigo_pha = "319";
				$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Alcantara" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "32";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Alcantara" && $primeira_letra >= "T"){
			$codigo_pha = "321";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Alencar" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "354";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alencar" && $primeira_letra >= "R"){
			$codigo_pha = "355";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alexander" && $primeira_letra >= "M"){
			$codigo_pha = "368";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alexandre" && $primeira_letra >= "M"){
			$codigo_pha = "37";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alencar" && $primeira_letra >= "R"){
			$codigo_pha = "355";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Allen" && $primeira_letra >= "M"){
			$codigo_pha = "428";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "C" && $primeira_letra < "E"){
			$codigo_pha = "445";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}

		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "E" && $primeira_letra < "G"){
			$codigo_pha = "446";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "G" && $primeira_letra < "J"){
			$codigo_pha = "447";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
	
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "448";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "449";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "45";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "S" && $primeira_letra < "V"){
			$codigo_pha = "451";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Almeida" && $primeira_letra >= "V"){
			$codigo_pha = "452";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alvarenga" && $primeira_letra >= "M"){
			$codigo_pha = "471";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alvares" && $primeira_letra >= "M"){
			$codigo_pha = "473";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alvarez" && $primeira_letra >= "M"){
			$codigo_pha = "475";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alves" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "478";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alves" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "479";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alves" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha = "48";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alves" && $primeira_letra >= "N" && $primeira_letra < "R"){
			$codigo_pha = "481";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alves" && $primeira_letra >= "R"){
			$codigo_pha = "482";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Alvim" && $primeira_letra >= "M"){
			$codigo_pha = "484";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amaral" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "513";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amaral" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "514";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amaral" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "515";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amaral" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "516";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amaral" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "517";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amaral" && $primeira_letra >= "T") {
			$codigo_pha = "518";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amorim" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "544";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Amorim" && $primeira_letra >= "R") {
			$codigo_pha = "545";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrada" && $primeira_letra >= "M") {
			$codigo_pha = "564";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrade" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "566";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrade" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "567";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrade" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "568";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrade" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "569";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrade" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "57";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Andrade" && $primeira_letra >= "T"){
			$codigo_pha = "571";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Antunes" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "643";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Antunes" && $primeira_letra >= "R"){
			$codigo_pha = "644";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aragao" && $primeira_letra >= "M"){
			$codigo_pha = "672";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aranha" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "681";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Aranha" && $primeira_letra >= "R"){
			$codigo_pha = "682";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Arantes" && $primeira_letra >= "M"){
			$codigo_pha = "684";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Araujo" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "688";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Araujo" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "689";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Araujo" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "69";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Araujo" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "691";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Araujo" && $primeira_letra >= "T"){
			$codigo_pha = "692";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Arruda" && $primeira_letra >= "L" && $primeira_letra < "M"){
			$codigo_pha = "818";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Arruda" && $primeira_letra >= "M"){
			$codigo_pha = "819";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Assis" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "866";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Assis" && $primeira_letra >= "R"){
			$codigo_pha = "867";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Assumpcao" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "871";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Assumpcao" && $primeira_letra >= "R"){
			$codigo_pha = "872";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Augusto" && $primeira_letra >= "M"){
			$codigo_pha= "937";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ayres" && $primeira_letra >= "M"){
			$codigo_pha= "981";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Azevedo" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha= "987";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Azevedo" && $primeira_letra >= "M" && $primeira_letra < "T"){
			$codigo_pha= "988";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ayres" && $primeira_letra >= "T") {
			$codigo_pha= "989";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bandeira" && $primeira_letra >= "D" && $primeira_letra < "L") {
			$codigo_pha= "165";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bandeira" && $primeira_letra >= "L" && $primeira_letra < "P") {
			$codigo_pha= "166";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bandeira" && $primeira_letra >= "T"){
			$codigo_pha= "167";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Baptista" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "173";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}	
		
		if ($sobrenomeaux[0] == "Baptista" && $primeira_letra >= "J" && $primeira_letra < "N"){
			$codigo_pha= "174";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Baptista" && $primeira_letra >= "N" && $primeira_letra < "S"){
			$codigo_pha= "175";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Baptista" && $primeira_letra >= "S"){
			$codigo_pha= "176";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "196";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "197";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha= "198";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha= "199";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha= "21";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "211";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha= "212";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barbosa" && $primeira_letra >= "T"){
			$codigo_pha= "213";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barra" && $primeira_letra >= "M"){
			$codigo_pha= "249";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barreira" && $primeira_letra >= "J"){
			$codigo_pha= "254";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barreto" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "261";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barreto" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "262";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barreto" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "263";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barreto" && $primeira_letra >= "P"){
			$codigo_pha= "264";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barretto" && $primeira_letra >= "C" && $primeira_letra < "M"){
			$codigo_pha= "266";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barretto" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha= "267";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barretto" && $primeira_letra >= "P"){
			$codigo_pha= "268";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "B" && $primeira_letra < "C"){
			$codigo_pha= "274";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "C" && $primeira_letra < "D"){
			$codigo_pha= "275";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "D" && $primeira_letra < "F"){
			$codigo_pha= "276";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "277";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha= "278";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha= "279";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha= "28";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha= "281";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha= "282";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "T" && $primeira_letra < "V"){
			$codigo_pha= "283";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Barros" && $primeira_letra >= "V"){
			$codigo_pha= "284";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bastos" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "327";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bastos" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "328";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bastos" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "329";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bastos" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "33";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bastos" && $primeira_letra >= "S"){
			$codigo_pha= "331";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Batista" && $primeira_letra >= "J"){
			$codigo_pha= "337";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bittencourt" && $primeira_letra >= "D" && $primeira_letra < "J"){
			$codigo_pha= "543";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bittencourt" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha= "544";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bittencourt" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha= "545";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bittencourt" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "546";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}	
		
		if ($sobrenomeaux[0] == "Bittencourt" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "547";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bittencourt" && $primeira_letra >= "T"){
			$codigo_pha = "548";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Black" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha= "563";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Black" && $primeira_letra >= "P"){
			$codigo_pha= "564";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Blake" && $primeira_letra >= "P"){
			$codigo_pha= "569";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Blanco" && $primeira_letra >= "P"){
			$codigo_pha= "573";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borba" && $primeira_letra >= "D" && $primeira_letra < "J"){
			$codigo_pha= "719";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borba" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "720";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borba" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha= "721";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borba" && $primeira_letra >= "T"){
			$codigo_pha= "722";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borges" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "731";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borges" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha= "732";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borges" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha= "733";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Borges" && $primeira_letra >= "R"){
			$codigo_pha= "734";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Botelho" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "761";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Botelho" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha= "762";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Botelho" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha= "763";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
			
		if ($sobrenomeaux[0] == "Botelho" && $primeira_letra >= "R"){
			$codigo_pha= "764";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Braga" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "793";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Braga" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "794";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Braga" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha= "795";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Braga" && $primeira_letra >= "T"){
			$codigo_pha= "796";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Branco" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "814";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Branco" && $primeira_letra >= "P"){
			$codigo_pha= "815";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Brandao" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "818";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Brandao" && $primeira_letra >= "P"){
			$codigo_pha= "819";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Brito" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "876";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Brito" && $primeira_letra >= "P"){
			$codigo_pha= "877";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Brotero" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "893";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Brotero" && $primeira_letra >= "P"){
			$codigo_pha= "894";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bueno" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "941";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bueno" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha= "942";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bueno" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha= "943";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Bueno" && $primeira_letra >= "P"){
			$codigo_pha= "944";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cabral" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "118";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cabral" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha= "119";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cabral" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha= "12";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cabral" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "121";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cabral" && $primeira_letra >= "S"){
			$codigo_pha= "122";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camara" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "173";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camara" && $primeira_letra >= "P"){
			$codigo_pha= "174";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "176";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "177";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha= "178";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha= "179";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha= "180";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "181";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha= "182";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Camargo" && $primeira_letra >= "T"){
			$codigo_pha= "183";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "211";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "212";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha= "213";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha= "214";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha= "215";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "216";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha= "217";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Campos" && $primeira_letra >= "T"){
			$codigo_pha= "218";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "261";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "262";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha= "263";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha= "264";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha= "265";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "266";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha= "267";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cardoso" && $primeira_letra >= "T"){
			$codigo_pha= "268";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carneiro" && $primeira_letra >= "C" && $primeira_letra < "J"){
			$codigo_pha= "288";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carneiro" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "289";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carneiro" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha= "29";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carneiro" && $primeira_letra >= "T"){
			$codigo_pha= "291";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
			if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha= "322";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha= "323";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha= "324";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha= "325";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha= "326";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha= "327";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha= "328";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Carvalho" && $primeira_letra >= "T"){
			$codigo_pha= "329";
		$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Castilho" && $primeira_letra >= "J"){
			$codigo_pha= "349";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Castro" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha= "351";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Castro" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha= "352";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Castro" && $primeira_letra >= "P"){
			$codigo_pha= "353";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cavalcanti" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "366";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cavalcanti" && $primeira_letra >= "P"){
			$codigo_pha= "367";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cerqueira" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha= "395";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cerqueira" && $primeira_letra >= "P"){
			$codigo_pha= "396";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cesar" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha= "415";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cesar" && $primeira_letra >= "P"){
			$codigo_pha= "416";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Chaves" && $primeira_letra >= "L"){
			$codigo_pha= "439";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cintra" && $primeira_letra >= "C" && $primeira_letra < "L"){
			$codigo_pha= "519";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cintra" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha= "52";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cintra" && $primeira_letra >= "P" ){
			$codigo_pha= "521";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Clark" && $primeira_letra >= "M"){
			$codigo_pha= "544";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Clarke" && $primeira_letra >= "N"){
			$codigo_pha= "546";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "615";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "616";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "617";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "618";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "619";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "62";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coelho" && $primeira_letra >= "T"){
			$codigo_pha = "621";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coimbra" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha = "634";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coimbra" && $primeira_letra >= "P"){
			$codigo_pha = "635";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Colombo" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "684";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Colombo" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "685";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Colombo" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "686";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Colombo" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "687";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Colombo" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "688";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Colombo" && $primeira_letra >= "T"){
			$codigo_pha = "689";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Conceicao" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha = "744";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Conceicao" && $primeira_letra >= "P"){
			$codigo_pha = "745";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cordeiro" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "819";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cordeiro" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "82";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cordeiro" && $primeira_letra >= "R"){
			$codigo_pha = "821";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correa" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "841";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correa" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "842";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correa" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "843";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correa" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "844";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correa" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "845";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correa" && $primeira_letra >= "T"){
			$codigo_pha = "846";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correia" && $primeira_letra >= "J" && $primeira_letra < "R"){
			$codigo_pha = "848";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Correia" && $primeira_letra >= "R"){
			$codigo_pha = "849";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Costa" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "871";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Costa" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "872";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Costa" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "873";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Costa" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "874";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Costa" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "875";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Costa" && $primeira_letra >= "T"){
			$codigo_pha = "876";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coutinho" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "896";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coutinho" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "897";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Coutinho" && $primeira_letra >= "P"){
			$codigo_pha = "898";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Couto" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "91";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Couto" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "911";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Couto" && $primeira_letra >= "P"){
			$codigo_pha = "912";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cruz" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "961";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cruz" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "962";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cruz" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "963";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cruz" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "964";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cruz" && $primeira_letra >= "T"){
			$codigo_pha = "965";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cunha" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "978";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cunha" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "979";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Cunha" && $primeira_letra >= "P"){
			$codigo_pha = "98";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Daniel" && $primeira_letra >= "M"){
			$codigo_pha = "186";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dantas" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "211";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dantas" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "212";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dantas" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "213";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dantas" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "214";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dantas" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "215";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dantas" && $primeira_letra >= "T"){
			$codigo_pha = "216";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "David" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "273";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "David" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "274";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "David" && $primeira_letra >= "R"){
			$codigo_pha = "275";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davids" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "277";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davids" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "278";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davids" && $primeira_letra >= "R"){
			$codigo_pha = "279";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davidson" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "281";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		
		if ($sobrenomeaux[0] == "Davidson" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "282";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davidson" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "283";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davidson" && $primeira_letra >= "T"){
			$codigo_pha = "284";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davies" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "287";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davies" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "288";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davies" && $primeira_letra >= "R"){
			$codigo_pha = "289";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davis" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "293";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davis" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "294";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Davis" && $primeira_letra >= "R"){
			$codigo_pha = "295";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "David" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "274";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "David" && $primeira_letra >= "R"){
			$codigo_pha = "275";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dias" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "531";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Dias" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "532";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dias" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "533";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dias" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "534";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dias" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "535";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dias" && $primeira_letra >= "T"){
			$codigo_pha = "536";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Diniz" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "611";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Diniz" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "612";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Diniz" && $primeira_letra >= "R"){
			$codigo_pha = "613";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Domingos" && $primeira_letra >= "F" && $primeira_letra < "T"){
			$codigo_pha = "716";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Domingos" && $primeira_letra >= "T"){
			$codigo_pha = "717";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Doria" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "753";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Doria" && $primeira_letra >= "R"){
			$codigo_pha = "754";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Duarte" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "871";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Duarte" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "872";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Duarte" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "873";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Duarte" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "874";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Duarte" && $primeira_letra >= "T"){
			$codigo_pha = "875";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dutra" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "975";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dutra" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "976";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dutra" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "977";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Dutra" && $primeira_letra >= "T"){
			$codigo_pha = "978";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fagundes" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "142";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fagundes" && $primeira_letra >= "R"){
			$codigo_pha = "143";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Falcao" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "164";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Falcao" && $primeira_letra >= "R"){
			$codigo_pha = "165";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Faria" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "234";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Faria" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "235";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Faria" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "236";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Faria" && $primeira_letra >= "T"){
			$codigo_pha = "237";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fernandes" && $primeira_letra >= "C" && $primeira_letra < "M"){
			$codigo_pha = "399";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fernandes" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "41";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fernandes" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "411";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fernandes" && $primeira_letra >= "T"){
			$codigo_pha = "412";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferrari" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "428";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferrari" && $primeira_letra >= "R"){
			$codigo_pha = "429";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferraz" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "432";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferraz" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "433";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferraz" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "434";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferraz" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "435";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferraz" && $primeira_letra >= "T"){
			$codigo_pha = "436";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferreira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "44";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferreira" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "441";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferreira" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "442";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferreira" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "443";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ferreira" && $primeira_letra >= "T"){
			$codigo_pha = "444";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueira" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "486";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueira" && $primeira_letra >= "R"){
			$codigo_pha = "487";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueiredo" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "489";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueiredo" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "49";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueiredo" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "491";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueiredo" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "492";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Figueiredo" && $primeira_letra >= "T"){
			$codigo_pha = "493";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fleury" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "633";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fleury" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "634";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fleury" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "635";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fleury" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "636";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fleury" && $primeira_letra >= "R" && $primeira_letra < "T" ){
			$codigo_pha = "637";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fleury" && $primeira_letra >= "T"){
			$codigo_pha = "638";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fogaca" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "684";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fogaca" && $primeira_letra >= "R"){
			$codigo_pha = "685";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fonseca" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "743";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fonseca" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "744";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fonseca" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "745";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fonseca" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "746";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fonseca" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "747";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fonseca" && $primeira_letra >= "T"){
			$codigo_pha = "748";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontana" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "757";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontana" && $primeira_letra >= "R"){
			$codigo_pha = "758";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "765";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontes" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "766";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontes" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "767";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontes" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "768";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontes" && $primeira_letra >= "R"){
			$codigo_pha = "769";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontoura" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "773";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontoura" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "774";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontoura" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "775";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontoura" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "776";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontoura" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "777";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fontoura" && $primeira_letra >= "T"){
			$codigo_pha = "778";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forbes" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "788";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forbes" && $primeira_letra >= "R"){
			$codigo_pha = "789";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forjaz" && $primeira_letra >= "M" && $primeira_letra < "T"){
			$codigo_pha = "814";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forjaz" && $primeira_letra >= "T"){
			$codigo_pha = "815";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forster" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "838";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forster" && $primeira_letra >= "R"){
			$codigo_pha = "839";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forte" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "842";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Forte" && $primeira_letra >= "R"){
			$codigo_pha = "843";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fortes" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "845";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Fortes" && $primeira_letra >= "R"){
			$codigo_pha = "846";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Foster" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "857";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Foster" && $primeira_letra >= "R"){
			$codigo_pha = "858";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Franca" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "882";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Franca" && $primeira_letra >= "R"){
			$codigo_pha = "883";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Franco" && $primeira_letra >= "C" && $primeira_letra < "M"){
			$codigo_pha = "895";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Franco" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "896";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Franco" && $primeira_letra >= "P"){
			$codigo_pha = "897";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Frank" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "911";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Frank" && $primeira_letra >= "R"){
			$codigo_pha = "912";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Freire" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "934";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Freire" && $primeira_letra >= "R"){
			$codigo_pha = "935";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Freitas" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "937";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Freitas" && $primeira_letra >= "R"){
			$codigo_pha = "938";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Furtado" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "988";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Furtado" && $primeira_letra >= "R"){
			$codigo_pha = "989";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Galvao" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "172";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Galvao" && $primeira_letra >= "R"){
			$codigo_pha = "173";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gama" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "177";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gama" && $primeira_letra >= "R"){
			$codigo_pha = "178";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Garcia" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "199";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Garcia" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "21";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Garcia" && $primeira_letra >= "R"){
			$codigo_pha = "211";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Godinho" && $primeira_letra >= "M"){
			$codigo_pha = "531";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Godoy" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "533";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Godoy" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "534";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Godoy" && $primeira_letra >= "R"){
			$codigo_pha = "535";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goes" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "544";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goes" && $primeira_letra >= "R"){
			$codigo_pha = "545";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "613";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomes" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "614";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "615";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomes" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "616";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomes" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "617";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomes" && $primeira_letra >= "T"){
			$codigo_pha = "618";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gomide" && $primeira_letra >= "M"){
			$codigo_pha = "621";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goncalves" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "624";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goncalves" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "625";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goncalves" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "626";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goncalves" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "627";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goncalves" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "628";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goncalves" && $primeira_letra >= "T"){
			$codigo_pha = "629";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gonzaga" && $primeira_letra >= "M"){
			$codigo_pha = "651";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gonzalez" && $primeira_letra >= "M"){
			$codigo_pha = "653";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Good" && $primeira_letra >= "M"){
			$codigo_pha = "656";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goode" && $primeira_letra >= "M"){
			$codigo_pha = "658";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Goulart" && $primeira_letra >= "M"){
			$codigo_pha = "728";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gouvea" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "735";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gouvea" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "736";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gouvea" && $primeira_letra >= "R"){
			$codigo_pha = "737";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gouveia" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "739";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gouveia" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "74";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Gouveia" && $primeira_letra >= "R"){
			$codigo_pha = "741";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guedes" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "958";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guedes" && $primeira_letra >= "R"){
			$codigo_pha = "959";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guerra" && $primeira_letra >= "M"){
			$codigo_pha = "964";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guimaraes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "977";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guimaraes" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "978";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guimaraes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "979";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guimaraes" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "98";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Guimaraes" && $primeira_letra >= "T"){
			$codigo_pha = "981";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Holland" && $primeira_letra >= "M"){
			$codigo_pha = "679";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Labate" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "118";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Labate" && $primeira_letra >= "R"){
			$codigo_pha = "119";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "135";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "136";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "137";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha = "138";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "N" && $primeira_letra < "P"){
			$codigo_pha = "139";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "14";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "141";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Lacerda" && $primeira_letra >= "T"){
			$codigo_pha = "142";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ladeira" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "154";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ladeira" && $primeira_letra >= "R"){
			$codigo_pha = "155";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lage" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "171";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lage" && $primeira_letra >= "R"){
			$codigo_pha = "172";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lago" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "175";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lago" && $primeira_letra >= "R"){
			$codigo_pha = "176";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lane" && $primeira_letra >= "M"){
			$codigo_pha = "257";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lang" && $primeira_letra >= "F" && $primeira_letra < "R"){
			$codigo_pha = "261";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lang" && $primeira_letra >= "R"){
			$codigo_pha = "262";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lange" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "265	";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lange" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "266";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lange" && $primeira_letra >= "R"){
			$codigo_pha = "267";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lapa" && $primeira_letra >= "M"){
			$codigo_pha = "314";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lara" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "326";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lara" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "327";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lara" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "328";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lara" && $primeira_letra >= "T"){
			$codigo_pha = "329";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lawrence" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "448";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lawrence" && $primeira_letra >= "R"){
			$codigo_pha = "449";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leal" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "471";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leal" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "472";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leal" && $primeira_letra >= "R"){
			$codigo_pha = "473";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leao" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "477";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leao" && $primeira_letra >= "R"){
			$codigo_pha = "478";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lee" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "517";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lee" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "518";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lee" && $primeira_letra >= "R"){
			$codigo_pha = "519";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leitao" && $primeira_letra >= "M"){
			$codigo_pha = "549";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leite" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "551";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leite" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "552";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leite" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "553";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leite" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "554";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leite" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "555";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leite" && $primeira_letra >= "T"){
			$codigo_pha = "556";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leme" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "567";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leme" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "568";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Leme" && $primeira_letra >= "R"){
			$codigo_pha = "569";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
	
		if ($sobrenomeaux[0] == "Lemos" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "577";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lemos" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "578";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lemos" && $primeira_letra >= "R"){
			$codigo_pha = "579";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lessa" && $primeira_letra >= "M"){
			$codigo_pha = "632";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lewis" && $primeira_letra >= "M"){
			$codigo_pha = "653";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lima" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "697";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}

		if ($sobrenomeaux[0] == "Lima" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "698";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lima" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "699";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lima" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "71";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lima" && $primeira_letra >= "T"){
			$codigo_pha = "711";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lins" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "732";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lins" && $primeira_letra >= "R"){
			$codigo_pha = "733";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Little" && $primeira_letra >= "M"){
			$codigo_pha = "757";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lobato" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "778";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lobato" && $primeira_letra >= "R"){
			$codigo_pha = "779";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lobo" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "783";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lobo" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "784";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lobo" && $primeira_letra >= "R"){
			$codigo_pha = "785";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "851";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopes" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "852";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopes" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "853";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "854";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopes" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "855";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopes" && $primeira_letra >= "T"){
			$codigo_pha = "856";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopez" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "858";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lopez" && $primeira_letra >= "R"){
			$codigo_pha = "859";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Loureiro" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "553";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Loureiro" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "554";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Loureiro" && $primeira_letra >= "P"){
			$codigo_pha = "555";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lourenco" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "934";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lourenco" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "935";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Lourenco" && $primeira_letra >= "P"){
			$codigo_pha = "936";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Macedo" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "12";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Macedo" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "121";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Macedo" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "122";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Macedo" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "123";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Macedo" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "124";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Macedo" && $primeira_letra >= "T"){
			$codigo_pha = "125";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Machado" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "13";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Machado" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "131";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Machado" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "132";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Machado" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "133";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Machado" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "134";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Machado" && $primeira_letra >= "T"){
			$codigo_pha = "135";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Maciel" && $primeira_letra >= "M"){
			$codigo_pha = "139";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Magalhaes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "165";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Magalhaes" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "166";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Magalhaes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "167";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Magalhaes" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "168";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Magalhaes" && $primeira_letra >= "S"){
			$codigo_pha = "169";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Maia" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "185";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Maia" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "186";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Maia" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "187";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Maia" && $primeira_letra >= "R"){
			$codigo_pha = "188";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Malta" && $primeira_letra >= "M"){
			$codigo_pha = "226";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marcondes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "269";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marcondes" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "27";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marcondes" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "271";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marcondes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "272";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marcondes" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "273";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marcondes" && $primeira_letra >= "S"){
			$codigo_pha = "274";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marinho" && $primeira_letra >= "M"){
			$codigo_pha = "291";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marques" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "316";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marques" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "317";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marques" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "318";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marques" && $primeira_letra >= "L"&& $primeira_letra < "P"){
			$codigo_pha = "319";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marques" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "32";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Marques" && $primeira_letra >= "S"){
			$codigo_pha = "321";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Martins" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "342";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Martins" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "343";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Martins" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "344";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Martins" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "345";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Martins" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "346";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Martins" && $primeira_letra >= "T"){
			$codigo_pha = "347";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Matos" && $primeira_letra >= "M"){
			$codigo_pha = "382";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mattos" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "39";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mattos" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "391";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mattos" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "392";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mattos" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "393";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mattos" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "394";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mattos" && $primeira_letra >= "T"){
			$codigo_pha = "395";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Medeiros" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "439";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Medeiros" && $primeira_letra >= "M"){
			$codigo_pha = "44";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Meira" && $primeira_letra >= "M"){
			$codigo_pha = "452";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Meirelles" && $primeira_letra >= "M"){
			$codigo_pha = "455";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mello" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "477";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mello" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "478";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mello" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "479";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mello" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "48";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mello" && $primeira_letra >= "S" && $primeira_letra < "T"){
			$codigo_pha = "481";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		if ($sobrenomeaux[0] == "Mello" && $primeira_letra >= "T"){
			$codigo_pha = "482";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Melo" && $primeira_letra >= "M"){
			$codigo_pha = "486";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mendes" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "491";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mendes" && $primeira_letra >= "M"){
			$codigo_pha = "492";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mendonca" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "495";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mendonca" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "496";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mendonca" && $primeira_letra >= "R"){
			$codigo_pha = "497";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Menezes" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "511";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Menezes" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "512";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Menezes" && $primeira_letra >= "R"){
			$codigo_pha = "513";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mesquita" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "544";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mesquita" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "545";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mesquita" && $primeira_letra >= "R"){
			$codigo_pha = "546";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Meyer" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "56";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Meyer" && $primeira_letra >= "P"){
			$codigo_pha = "561";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Miranda" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "641";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Miranda" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "642";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Miranda" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "643";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Miranda" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "644";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Miranda" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "645";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Miranda" && $primeira_letra >= "T"){
			$codigo_pha = "646";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Modesto" && $primeira_letra >= "M"){
			$codigo_pha = "696";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monte" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "767";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monte" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "768";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monte" && $primeira_letra >= "R"){
			$codigo_pha = "769";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monteiro" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "775";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monteiro" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "776";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monteiro" && $primeira_letra >= "J" && $primeira_letra < "L"){
			$codigo_pha = "777";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monteiro" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "778";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monteiro" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "779";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Monteiro" && $primeira_letra >= "T"){
			$codigo_pha = "78";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Montenegro" && $primeira_letra >= "M"){
			$codigo_pha = "784";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moraes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "819";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moraes" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "82";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moraes" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "821";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moraes" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "822";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moraes" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "823";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moraes" && $primeira_letra >= "T"){
			$codigo_pha = "824";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Morais" && $primeira_letra >= "M"){
			$codigo_pha = "826";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Morales" && $primeira_letra >= "M"){
			$codigo_pha = "828";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moreira" && $primeira_letra >= "C" && $primeira_letra < "M"){
			$codigo_pha = "837";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moreira" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "838";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moreira" && $primeira_letra >= "R"){
			$codigo_pha = "839";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Motta" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "874";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Motta" && $primeira_letra >= "M" && $primeira_letra < "S"){
			$codigo_pha = "875";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Motta" && $primeira_letra >= "S"){
			$codigo_pha = "876";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moura" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "885";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moura" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "886";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moura" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "887";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moura" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "888";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moura" && $primeira_letra >= "P"){
			$codigo_pha = "889";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Mourao" && $primeira_letra >= "M"){
			$codigo_pha = "891";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Moutinho" && $primeira_letra >= "M"){
			$codigo_pha = "896";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Muller" && $primeira_letra >= "M"){
			$codigo_pha = "924";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Munhoz" && $primeira_letra >= "M"){
			$codigo_pha = "933";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Muniz" && $primeira_letra >= "M"){
			$codigo_pha = "936";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nascimento" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "194";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nascimento" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "195";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nascimento" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "196";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nascimento" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "197";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nascimento" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "198";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nascimento" && $primeira_letra >= "T"){
			$codigo_pha = "199";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Navarro" && $primeira_letra >= "F" && $primeira_letra < "P"){
			$codigo_pha = "241";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Navarro" && $primeira_letra >= "P"){
			$codigo_pha = "242";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nebias" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "268";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nebias" && $primeira_letra >= "R"){
			$codigo_pha = "269";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negrao" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "297";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negrao" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "298";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negrao" && $primeira_letra >= "R"){
			$codigo_pha = "299";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negreiros" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "312";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negreiros" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "313";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negreiros" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "314";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negreiros" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "315";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negreiros" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "316";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Negreiros" && $primeira_letra >= "T"){
			$codigo_pha = "317";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Netto" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "389";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Netto" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "39";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Netto" && $primeira_letra >= "R"){
			$codigo_pha = "391";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Neves" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "423";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Neves" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "424";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Neves" && $primeira_letra >= "L" && $primeira_letra < "N"){
			$codigo_pha = "425";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Neves" && $primeira_letra >= "N" && $primeira_letra < "R"){
			$codigo_pha = "426";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Neves" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "427";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Neves" && $primeira_letra >= "T"){
			$codigo_pha = "428";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Niemayer" && $primeira_letra >= "M"){
			$codigo_pha = "574";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nobre" && $primeira_letra >= "F" && $primeira_letra < "P"){
			$codigo_pha = "672";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nobre" && $primeira_letra >= "P"){
			$codigo_pha = "673";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nobrega" && $primeira_letra >= "F" && $primeira_letra < "P"){
			$codigo_pha = "675";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nobrega" && $primeira_letra >= "P"){
			$codigo_pha = "676";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nogueira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "711";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nogueira" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "712";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nogueira" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "713";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nogueira" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "714";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nogueira" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "715";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nogueira" && $primeira_letra >= "T"){
			$codigo_pha = "716";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Noronha" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "768";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Noronha" && $primeira_letra >= "R"){
			$codigo_pha = "769";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Novaes" && $primeira_letra >= "C" && $primeira_letra < "L"){
			$codigo_pha = "815";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Novaes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "816";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Novaes" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "817";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Novaes" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "818";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Novaes" && $primeira_letra >= "T"){
			$codigo_pha = "819";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nunes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "924";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nunes" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "925";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nunes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "926";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nunes" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "927";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nunes" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "928";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Nunes" && $primeira_letra >= "T"){
			$codigo_pha = "929";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
			
		if ($sobrenomeaux[0] == "Oliveira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "46";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Oliveira" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "47";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Oliveira" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "48";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Oliveira" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "49";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Oliveira" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "51";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Oliveira" && $primeira_letra >= "T"){
			$codigo_pha = "52";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pacheco" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "118";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pacheco" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "119";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pacheco" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "12";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pacheco" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "121";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pacheco" && $primeira_letra >= "T"){
			$codigo_pha = "122";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paes" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "144";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paes" && $primeira_letra >= "R"){
			$codigo_pha = "145";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paiva" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "167";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paiva" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "168";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paiva" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "169";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paiva" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "17";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paiva" && $primeira_letra >= "T"){
			$codigo_pha = "171";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paschoal" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "284";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paschoal" && $primeira_letra >= "R"){
			$codigo_pha = "285";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Passos" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "32";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Passos" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "321";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Passos" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "322";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Passos" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "323";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Passos" && $primeira_letra >= "T"){
			$codigo_pha = "324";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paula" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "347";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paula" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "348";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paula" && $primeira_letra >= "R"){
			$codigo_pha = "349";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paulo" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "355";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Paulo" && $primeira_letra >= "R"){
			$codigo_pha = "356";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pedroso" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "416";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pedroso" && $primeira_letra >= "R"){
			$codigo_pha = "417";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Peixoto" && $primeira_letra >= "M"){
			$codigo_pha = "431";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Penna" && $primeira_letra >= "M"){
			$codigo_pha = "46";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Penteado" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "471";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Penteado" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "472";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Penteado" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "473";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Penteado" && $primeira_letra >= "R"){
			$codigo_pha = "474";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "49";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "491";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "492";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "493";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "494";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "495";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pereira" && $primeira_letra >= "T"){
			$codigo_pha = "496";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Peres" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "511";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Peres" && $primeira_letra >= "R"){
			$codigo_pha = "512";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Perez" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "515";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Perez" && $primeira_letra >= "R"){
			$codigo_pha = "516";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Person" && $primeira_letra >= "M"){
			$codigo_pha = "553";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pessoa" && $primeira_letra >= "M"){
			$codigo_pha = "568";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pestana" && $primeira_letra >= "M"){
			$codigo_pha = "572";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Peters" && $primeira_letra >= "M"){
			$codigo_pha = "576";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pimentel" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "699";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pimentel" && $primeira_letra >= "R"){
			$codigo_pha = "71";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinheiro" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "719";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinheiro" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "72";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinheiro" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "721";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinheiro" && $primeira_letra >= "R"){
			$codigo_pha = "722";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinho" && $primeira_letra >= "M"){
			$codigo_pha = "724";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinto" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "727";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinto" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "728";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinto" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "729";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinto" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "73";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinto" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "731";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pinto" && $primeira_letra >= "T"){
			$codigo_pha = "732";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pires" && $primeira_letra >= "F" && $primeira_letra < "J"){
			$codigo_pha = "744";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pires" && $primeira_letra >= "J" && $primeira_letra < "M"){
			$codigo_pha = "745";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pires" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "746";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pires" && $primeira_letra >= "R"){
			$codigo_pha = "747";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Piza" && $primeira_letra >= "M"){
			$codigo_pha = "766";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Pontes" && $primeira_letra >= "M"){
			$codigo_pha = "859";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Porto" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "882";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Porto" && $primeira_letra >= "R"){
			$codigo_pha = "883";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Portugal" && $primeira_letra >= "M"){
			$codigo_pha = "886";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Prado" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "916";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Prado" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "917";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Prado" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "918";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Prado" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "919";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Prado" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "92";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Prado" && $primeira_letra >= "T"){
			$codigo_pha = "921";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Quartim" && $primeira_letra >= "M"){
			$codigo_pha = "28";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Queiroz" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "43";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Queiroz" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "44";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Queiroz" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "45";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Queiroz" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "46";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Queiroz" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "47";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Queiroz" && $primeira_letra >= "T"){
			$codigo_pha = "48";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Quirino" && $primeira_letra >= "M"){
			$codigo_pha = "81";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramalho" && $primeira_letra >= "M"){
			$codigo_pha = "136";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramos" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "142";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramos" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "143";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramos" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "144";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramos" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "145";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramos" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "146";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ramos" && $primeira_letra >= "T"){
			$codigo_pha = "147";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rangel" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "155";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rangel" && $primeira_letra >= "R"){
			$codigo_pha = "156";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Raposo" && $primeira_letra >= "M"){
			$codigo_pha = "553";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reboucas" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "241";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reboucas" && $primeira_letra >= "R"){
			$codigo_pha = "242";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rego" && $primeira_letra >= "M"){
			$codigo_pha = "268";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reis" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "299";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reis" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "31";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reis" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "311";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reis" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "312";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Reis" && $primeira_letra >= "T"){
			$codigo_pha = "313";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Rezende" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "357";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rezende" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "358";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rezende" && $primeira_letra >= "T"){
			$codigo_pha = "359";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ribas" && $primeira_letra >= "M"){
			$codigo_pha = "366";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ribeiro" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "368";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ribeiro" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "369";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ribeiro" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "37";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ribeiro" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "371";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ribeiro" && $primeira_letra >= "R"){
			$codigo_pha = "372";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rice" && $primeira_letra >= "M"){
			$codigo_pha = "382";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rich" && $primeira_letra >= "M"){
			$codigo_pha = "384";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Richard" && $primeira_letra >= "M"){
			$codigo_pha = "386";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Richards" && $primeira_letra >= "M"){
			$codigo_pha = "388";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rizzo" && $primeira_letra >= "M"){
			$codigo_pha = "539";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Robinson" && $primeira_letra >= "M"){
			$codigo_pha = "556";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rocha" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "572";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rocha" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "573";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rocha" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "574";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rocha" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "575";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rocha" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "576";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rocha" && $primeira_letra >= "T"){
			$codigo_pha = "577";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodrigues" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "612";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodrigues" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "613";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodrigues" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "614";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodrigues" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "615";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodrigues" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "616";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodrigues" && $primeira_letra >= "T"){
			$codigo_pha = "617";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rodriguez" && $primeira_letra >= "M"){
			$codigo_pha = "619";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rolim" && $primeira_letra >= "M"){
			$codigo_pha = "654";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Romano" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "666";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Romano" && $primeira_letra >= "R"){
			$codigo_pha = "667";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rosa" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "695";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rosa" && $primeira_letra >= "R"){
			$codigo_pha = "696";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rossi" && $primeira_letra >= "L" && $primeira_letra < "M"){
			$codigo_pha = "742";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rossi" && $primeira_letra >= "M"){
			$codigo_pha = "743";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Rudge" && $primeira_letra >= "M"){
			$codigo_pha = "85";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ruiz" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "885";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ruiz" && $primeira_letra >= "R"){
			$codigo_pha = "886";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Russo" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "931";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Russo" && $primeira_letra >= "R"){
			$codigo_pha = "932";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
					
		if ($sobrenomeaux[0] == "Sa" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "111";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sa" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "112";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sa" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "113";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sa" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "114";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sa" && $primeira_letra >= "R"){
			$codigo_pha = "115";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "A" && $primeira_letra < "C"){
			$codigo_pha = "142";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "C" && $primeira_letra < "E"){
			$codigo_pha = "143";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "E" && $primeira_letra < "H"){
			$codigo_pha = "144";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "H" && $primeira_letra < "L"){
			$codigo_pha = "145";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "L" && $primeira_letra < "M"){
			$codigo_pha = "146";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "M" && $primeira_letra < "P"){
			$codigo_pha = "147";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "P" && $primeira_letra < "S"){
			$codigo_pha = "148";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "S" && $primeira_letra < "V"){
			$codigo_pha = "149";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saint" && $primeira_letra >= "V"){
			$codigo_pha = "15";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Salgado" && $primeira_letra >= "M"){
			$codigo_pha = "159";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Salles" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "163";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Salles" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "164";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Salles" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "165";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Salles" && $primeira_letra >= "R"){
			$codigo_pha = "166";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sampaio" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "182";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sampaio" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "183";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sampaio" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "184";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sampaio" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "185";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sampaio" && $primeira_letra >= "R"){
			$codigo_pha = "186";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sanches" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "191";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sanches" && $primeira_letra >= "R"){
			$codigo_pha = "192";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sanchez" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "194";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sanchez" && $primeira_letra >= "R"){
			$codigo_pha = "195";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Santos" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "234";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Santos" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "235";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Santos" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "236";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Santos" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "237";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Santos" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "238";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Santos" && $primeira_letra >= "T"){
			$codigo_pha = "239";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sao" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "241";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sao" && $primeira_letra >= "R"){
			$codigo_pha = "242";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Saraiva" && $primeira_letra >= "M"){
			$codigo_pha = "247";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Schmid" && $primeira_letra >= "M"){
			$codigo_pha = "375";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Schmidt" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "377";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Schmidt" && $primeira_letra >= "R"){
			$codigo_pha = "378";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Scott" && $primeira_letra >= "W"){
			$codigo_pha = "44";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Seabra" && $primeira_letra >= "M"){
			$codigo_pha = "445";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Seixas" && $primeira_letra >= "M"){
			$codigo_pha = "465";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Serra" && $primeira_letra >= "M"){
			$codigo_pha = "497";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silva" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "579";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silva" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "58";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silva" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "581";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silva" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "582";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silva" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "583";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silva" && $primeira_letra >= "T"){
			$codigo_pha = "584";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silveira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "587";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silveira" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "588";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silveira" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "589";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silveira" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "59";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Silveira" && $primeira_letra >= "R"){
			$codigo_pha = "591";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Simoes" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "613";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Simoes" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "614";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Simoes" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "615";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Simoes" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "616";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Simoes" && $primeira_letra >= "T"){
			$codigo_pha = "617";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Siqueira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "629";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Siqueira" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "63";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Siqueira" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "631";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Siqueira" && $primeira_letra >= "P"){
			$codigo_pha = "632";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Smith" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "647";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Smith" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "648";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Smith" && $primeira_letra >= "T"){
			$codigo_pha = "649";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Soares" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "653";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Soares" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "654";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Soares" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "655";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Soares" && $primeira_letra >= "P" && $primeira_letra < "T"){
			$codigo_pha = "656";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Soares" && $primeira_letra >= "T"){
			$codigo_pha = "657";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sobral" && $primeira_letra >= "M"){
			$codigo_pha = "661";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sousa" && $primeira_letra >= "J" && $primeira_letra < "P"){
			$codigo_pha = "697";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Sousa" && $primeira_letra >= "P"){
			$codigo_pha = "698";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Souza" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "237";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Souza" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "238";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Souza" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "239";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Souza" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "234";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Souza" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "235";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Souza" && $primeira_letra >= "T"){
			$codigo_pha = "236";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
			
		if ($sobrenomeaux[0] == "Tavares" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "229";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Tavares" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "23";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Tavares" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "231";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Tavares" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "232";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Tavares" && $primeira_letra >= "R"){
			$codigo_pha = "233";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Taylor" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "241";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Taylor" && $primeira_letra >= "R"){
			$codigo_pha = "242";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Teixeira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "265";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Teixeira" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "266";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Teixeira" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "267";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Teixeira" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "268";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Teixeira" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "269";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Teixeira" && $primeira_letra >= "T"){
			$codigo_pha = "27";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Telles" && $primeira_letra >= "M"){
			$codigo_pha = "276";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Telles" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "234";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thomas" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "381";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thomas" && $primeira_letra >= "R"){
			$codigo_pha = "382";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thome" && $primeira_letra >= "M"){
			$codigo_pha = "387";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thompson" && $primeira_letra >= "E" && $primeira_letra < "M"){
			$codigo_pha = "39";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thompson" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "391";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thompson" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "392";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Thompson" && $primeira_letra >= "T"){
			$codigo_pha = "393";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
			
		if ($sobrenomeaux[0] == "Toledo" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "581";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Toledo" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "582";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Toledo" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "583";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Toledo" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "584";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Toledo" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "585";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Toledo" && $primeira_letra >= "T"){
			$codigo_pha = "586";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Torres" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "644";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Torres" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "645";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Torres" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "646";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Torres" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "647";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Torres" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "648";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Torres" && $primeira_letra >= "T"){
			$codigo_pha = "649";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Turner" && $primeira_letra >= "M"){
			$codigo_pha = "853";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Val" && $primeira_letra >= "M"){
			$codigo_pha = "231";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Valente" && $primeira_letra >= "M"){
			$codigo_pha = "25";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Varella" && $primeira_letra >= "M"){
			$codigo_pha = "421";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vargas" && $primeira_letra >= "M"){
			$codigo_pha = "427";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vasconcellos" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "447";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vasconcellos" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "448";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vasconcellos" && $primeira_letra >= "R"){
			$codigo_pha = "449";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vasconcelos" && $primeira_letra >= "M"){
			$codigo_pha = "451";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vaz" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "496";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vaz" && $primeira_letra >= "R"){
			$codigo_pha = "497";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Veiga" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "529";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Veiga" && $primeira_letra >= "R"){
			$codigo_pha = "53";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Velloso" && $primeira_letra >= "M"){
			$codigo_pha = "553";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vergueiro" && $primeira_letra >= "M"){
			$codigo_pha = "617";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Viana" && $primeira_letra >= "M"){
			$codigo_pha = "668";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vianna" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "671";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vianna" && $primeira_letra >= "R"){
			$codigo_pha = "672";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vidal" && $primeira_letra >= "M"){
			$codigo_pha = "692";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vidigal" && $primeira_letra >= "M"){
			$codigo_pha = "696";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vieira" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "714";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vieira" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "715";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vieira" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "716";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vieira" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "717";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vieira" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "718";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Vieira" && $primeira_letra >= "T"){
			$codigo_pha = "719";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Villa" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "76";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Villa" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "761";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Villa" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "762";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Villa" && $primeira_letra >= "R"){
			$codigo_pha = "763";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Villela" && $primeira_letra >= "M"){
			$codigo_pha = "781";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wagner" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "137";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wagner" && $primeira_letra >= "R"){
			$codigo_pha = "138";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Walter" && $primeira_letra >= "M"){
			$codigo_pha = "193";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ware" && $primeira_letra >= "M"){
			$codigo_pha = "235";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Warner" && $primeira_letra >= "M"){
			$codigo_pha = "248";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Warren" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "253";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Warren" && $primeira_letra >= "R"){
			$codigo_pha = "254";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Washington" && $primeira_letra >= "L"){
			$codigo_pha = "277";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Waters" && $primeira_letra >= "M"){
			$codigo_pha = "313";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Watson" && $primeira_letra >= "M"){
			$codigo_pha = "333";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Weber" && $primeira_letra >= "M"){
			$codigo_pha = "237";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Webster" && $primeira_letra >= "M"){
			$codigo_pha = "389";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wheeler" && $primeira_letra >= "M"){
			$codigo_pha = "572";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Whitaker" && $primeira_letra >= "M"){
			$codigo_pha = "583";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Whyte" && $primeira_letra >= "M"){
			$codigo_pha = "619";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Williams" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "69";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Williams" && $primeira_letra >= "P"){
			$codigo_pha = "691";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wilson" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "72";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wilson" && $primeira_letra >= "R"){
			$codigo_pha = "721";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wolf" && $primeira_letra >= "M"){
			$codigo_pha = "837";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wolff" && $primeira_letra >= "M"){
			$codigo_pha = "839";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wright" && $primeira_letra >= "L" && $primeira_letra < "R"){
			$codigo_pha = "934";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Wright" && $primeira_letra >= "R"){
			$codigo_pha = "935";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
				
		if ($sobrenomeaux[0] == "Xavier" && $primeira_letra >= "C" && $primeira_letra < "F"){
			$codigo_pha = "18";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Xavier" && $primeira_letra >= "F" && $primeira_letra < "L"){
			$codigo_pha = "19";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Xavier" && $primeira_letra >= "L" && $primeira_letra < "P"){
			$codigo_pha = "21";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Xavier" && $primeira_letra >= "P" && $primeira_letra < "R"){
			$codigo_pha = "22";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Xavier" && $primeira_letra >= "R" && $primeira_letra < "T"){
			$codigo_pha = "23";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Xavier" && $primeira_letra >= "T"){
			$codigo_pha = "24";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ximenes" && $primeira_letra >= "M"){
			$codigo_pha = "35";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Ximenez" && $primeira_letra >= "M"){
			$codigo_pha = "37";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Yonge" && $primeira_letra >= "M"){
			$codigo_pha = "57";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Young" && $primeira_letra >= "F" && $primeira_letra < "M"){
			$codigo_pha = "68";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Young" && $primeira_letra >= "M" && $primeira_letra < "R"){
			$codigo_pha = "69";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}
		
		if ($sobrenomeaux[0] == "Young" && $primeira_letra >= "R"){
			$codigo_pha = "71";
			$codigo = $codigo1.$codigo_pha.$codigo2;
		}*/
		
	}
	
	?>
