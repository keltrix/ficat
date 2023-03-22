<!DOCTYPE html>
<html lang="pt-br">
<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

// Biblioteca do analytics
include_once "assets/php/analyticstracking.php";

// Conexão com o banco de dados
include "assets/php/conexao.php";
// include "ajax.php";
$rs = mysql_query("SELECT * FROM unidadesacademicas ORDER BY unidadesacademicas.nomedaunidade ASC");
$captcha;
// $assuntosbd = mysql_query("SELECT COD_AREA_CONHECIMENTO, DESC_AREA_CONHECIMENTO FROM newareadoconhecimento ");
// -- Valida o captcha -- //

//Se houver envio de formuário ...
if(isset($_POST['submit'])){
    
    // Chave secreta
    $secret = "6Lfqo1gUAAAAAMQFQVOqvUnifxDY6yuhIGALMq2O";

    // Resposta do captcha
    $response = $_POST['g-recaptcha-response'];

    // IP do site
    $remoteip = $_SERVER["REMOTE_ADDR"];

    // URL para verificação de resposta
    $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
    
    //Resultado da resposta em json
    $result = json_decode($url, TRUE);

    //Se falhar, na nova aba será alertado para preencher o captcha.
    if($result['success'] != 1){
        ?><script>alert("Preencha o captcha");
                  window.close()</script><?php

        //Submição de formulário é setado para null para que o php de geração de PDF não seja executado
        $_POST['submit'] = null;

    }
}


// Se não houver valor de submição de formulário, apresenta o formulário para ser preenchido
if (empty($_POST['submit'])) {
    ?>
    
    
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FICAT | Sistema De Geração Automática de Ficha Catalográfica da Universidade Federal do Pará</title>

        <meta name="description"
        content="Sistema de geração automática de Fichas Catalográficas padronizado para a Universidade Federal do Pará e Região Norte. Desenvolvido por: SEDEPTI | João Henrique Rabelo Barbosa | Paulo Victor Lobato Sarmento">
        <meta name="author" content="SEDEPTI | João Henrique Rabelo Barbosa | Paulo Victor Lobato Sarmento">

        <link rel="icon" href="assets/imgs/favicon.png" />
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/FicatStyleSheet.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="assets/js/ficatjavascript.js"></script>
        <script type="text/javascript" src="assets/js/prefix-free.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

        <style>
         video::cue {
           background: black;
           color: yellow;
       }
       video::cue(b) {
           color: red;
       }
   </style>

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126015084-1"></script>
   <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-126015084-1');
</script>
</head>

<body>
    <script>
        $(document).ready(function () {
            $('.categoriasDeAssunto').magnificPopup({
                type: 'iframe',
            // other options
        });
        });
    </script>
    <div class="container" id="body">
        <img src="assets/imgs/header.png" alt="Ficat 2.0">
        <nav class="navResponsive"><a href="#" ><i class="fa fa-bars" onclick="mostrarMenu()"></i></a></nav>

        <nav class="navegacao animated fadeInDown" id="menu">
            <ul class="menu">
                <li ><a href="" class="active" ><i class="fa fa-home" style="font-size:25px"></i>Página Inicial</a>
                </li>
                <li><a href="sobre/"><i class="fa fa-info-circle" style="font-size:25px"></i>Sobre</a></li>
                <li class="dropdown"><a href="" ><i class="fa fa-plus-circle" style="font-size:25px"></i>Instruções</a>
                    <ul class="submenu">
                        <li><a href="pdf/Preencher.pdf" target="_blank">Como preencher o formulário</a>
                        </li>
                        <li><a href="pdf/Inserir.pdf" target="_blank">Como inserir a ficha em seu trabalho</a>
                        </li>
                    </ul>
                </li>
                <li><a href="fale-conosco/"><i class="fa fa-envelope" style="font-size:25px"></i>Fale conosco</a></li>
            </ul>
        </nav>

        <form name="ficha" method="post" target="_blank">
            <fieldset>
                <fieldset class="campo campo1">
                    <legend>Dados do Autor</legend>

                    <div class="tooltip">
                        <label>Nome<span>*</span>:</label>
                        <span class="tooltiptext">Digite seu prenome, nome e primeiro sobrenome, se houver. (Ex.:  João Ribeiro dos)</span>
                        <input type="text" name="nome" placeholder="Ex.: João Henrique Rabelo">
                    </div>
                    <br>

                    <div class="tooltip">
                        <label>Sobrenome<span>*</span>:</label>
                        <span class="tooltiptext">Digite seu último sobrenome. Lembre-se de incluir
                            sobrenomes compostos (exemplo: Castelo Branco) e agnomes (exemplos:
                        Filho, Neto, Júnior, Segundo), caso tenha. Exemplo: Santos Filho</span>
                        <input type="text" name="sobrenome" placeholder="Ex.: Barbosa">
                    </div>
                    <br>

                    <div class="tooltip">
                        <label>Nome do 2º autor:</label>
                        <span class="tooltiptext">Digite o nome do 2º autor, caso exista.</span>
                        <input type="text" name="nome_coaut" placeholder="Ex.: Caio Shimada">
                    </div>
                    <br>

                    <div class="tooltip">
                        <label>Sobrenome do 2º autor:</label>
                        <span class="tooltiptext">Digite o sobrenome do 2º autor.</span>
                        <input type="text" name="sobrenome_coaut" placeholder="Ex.: Rabello">
                    </div>
                    <br>
                </fieldset>
                <fieldset class="campo campo2">
                    <legend>Dados do Trabalho</legend>
                    <div class="tooltip">
                        <label>Título do Trabalho<span>*</span>:</label>
                        <span class="tooltiptext">Digite o título do trabalho. Lembre-se de usar letras
                            maiúsculas somente na primeira palavra do título e em nomes próprios. O
                        subtítulo deve ser digitado no campo seguinte, caso exista.</span>
                        <input type="text" name="titulo" placeholder="Ex.: Redes sociais em bibliotecas universitárias">
                    </div>
                    <br>
                    <div class="tooltip">
                        <label>Subtítulo do Trabalho:</label>
                        <span class="tooltiptext">Digite o subtítulo do trabalho iniciando com letra
                        minúscula e utilizando letras maiúsculas somente para nomes próprios.</span>
                        <input type="text" name="subtitulo" placeholder="Ex.: estudo exploratório">
                    </div>
                    <br>

                    <div class="tooltip">
                        <label>Nome do Orientador<span>*</span>:</label>
                        <span class="tooltiptext">Digite o nome do Orientador (a).</span>
                        <input id="nOrientador" type="text" name="nome_ori" placeholder="Ex.: Paulo Victor Lobato">
                    </div>
                    <br>

                    <div class="tooltip">
                        <label>Sobrenome do Orientador<span>*</span>:</label>
                        <span class="tooltiptext">Digite o sobrenome do orientador (a). Se for
                        orientadora, marque a opção disponível abaixo.</span>
                        <input type="text" name="sobrenome_ori" placeholder="Ex.: Sarmento">
                    </div>
                    <br>

                    <div class="tooltip">
                        <span class="tooltiptext">Se for orientadora, marque a opção.</span>
                        <label class="emptyLabel"></label><input type="checkbox" name="orientadora" value="a"> Orientadora
                    </div>
                    <br>
                    <br>

                    <div class="tooltip">
                        <span class="tooltiptext">Selecione a titulação do seu Orientador(a).
                            Caso não saiba, consulte a <a href="http://buscatextual.cnpq.br/buscatextual/busca.do?metodo=apresentar" target="_blank">Plataforma Lattes</a>.
                        </span>
                        <label>Titulação do Orientador<span>*</span>:</label>
                        <select name="titulacaoorientador" id="titulacaoorientador" class="titulacaoorientador">
                            <option selected="selected" value="selecione">- Selecione -</option>
                            <option value="orientadorgraduado">Graduado</option>
                            <option value="orientadorespecialista">Especialista</option>
                            <option value="orientadormestre">Mestre</option>
                            <option value="orientadordoutor">Doutor</option>
                        </select>
                    </div>
                    <br>

                    <div class="tooltip">
                        <span class="tooltiptext">Digite o nome completo do Coorientador(a).</span>
                        <label>Nome do Coorientador:</label>
                        <input type="text" name="nome_coori" placeholder="Ex.: Bruno Santos Sousa">
                    </div>
                    <br>

                    <div class="tooltip">
                        <span class="tooltiptext">Se for coorientadora, marque a opção.</span>
                        <label class="emptyLabel"></label><input type="checkbox" name="coorientadora" value="a"> Coorientadora
                    </div>
                    <br>
                    <br>

                    <div class="tooltip">
                        <span class="tooltiptext">Selecione a titulação do seu Coorientador(a).
                            Caso não saiba, consulte a <a href="http://lattes.cnpq.br/" target="_blank">Plataforma Lattes</a>.
                        </span>
                        <label>Titulação do Coorientador:</label>
                        <select name="titulacaocoorientador" id="titulacaocoorientador" class="titulacaocoorientador">
                            <option value="selecionetitulacaocoorientador">- Selecione -</option>
                            <option value="coorientadorgraduado">Graduado</option>
                            <option value="coorientadorespecialista">Especialista</option>
                            <option value="coorientadormestre">Mestre</option>
                            <option value="coorientadordoutor">Doutor</option>
                        </select>
                    </div>


                    <div class="tooltip">
                        <span class="tooltiptext">Selecione o ano de defesa do seu trabalho.</span>
                        <label>Ano de apresentação<span>*</span>:</label>
                        <select name="ano" id="ano" class="styled-select-ilustracao">
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
		            <option value="2022">2022</option>
                        </select>
                    </div>


                    <div class="tooltip">
                        <span class="tooltiptext">Digite a quantidade de folhas de seu trabalho. Deve
                            informar o número de páginas pré-textuais em algarismos romanos, seguido por
                            uma vírgula e pelo número de páginas textuais em algarismos arábicos (Ex.:
                        xxi, 70); ou somente em algarismos arábicos com o total de páginas (Ex.: 70).</span>
                        <label>Número de Folhas<span>*</span>:</label>
                        <input type="text" name="pags" placeholder="Ex.: xxi, 70">
                    </div>



                    <div class="tooltip">
                        <span class="tooltiptext">Selecione entre as opções “Não possui” (para trabalhos sem
                            ilustração) ou “Coloridas” (no caso de possuir ilustrações coloridas) ou “Preto e
                            branco” (no caso de possuir somente ilustrações em preto e branco).
                            Ilustrações são elementos gráficos dos trabalhos acadêmicos, e engloba
                        figuras, gráficos, mapas, quadros entre outros.</span>
                        <label>Ilustração<span>*</span>:</label>
                        <select name="ilustração" id="ilustração" class="styled-select-ilustracao">
                            <option selected="selected" value="selecione">- Selecione -</option>
                            <option value="naopossui">Não Possui</option>
                            <option value="coloridas">Coloridas</option>
                            <option value="pretoebranco">Preto e branco</option>
                        </select>
                    </div>



                    <div class="tooltip">
                        <span class="tooltiptext">Selecione a unidade acadêmica a que seu curso está
                        vinculado.</span>
                        <label>Unidade Acadêmica<span>*</span>:</label>
                        <select style="width: 95%; max-width:350px" name="unidades" id="unidades" class="unidadesacademicas"
                        onchange="setTextField(this)">
                        <option name="selecione" value="0" id="0" selected="selected">- Selecione -</option>
                        <?php while ($reg = mysql_fetch_object($rs)): ?>
                            <option value="<?php echo $reg->sigla ?>"><?php echo $reg->nomedaunidade ?></option>
                        <?php endwhile;?>
                    </select>
                    <input id="make_text" type="hidden" name="make_text" value=""/>
                    <script type="text/javascript">
                        function setTextField(ddl) {
                            document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
                        }
                    </script>
                </div>
                <br>

                <div class="tooltip">
                    <span class="tooltiptext">Selecione o tipo de trabalho entre Tese (doutorado),
                    Dissertação (mestrado), TCC (especialização) e TCC (graduação).</span>
                    <label>Tipo de Trabalho<span style="color:#EE0000">*</span>:</label>
                    <div class="tipoTrabalho">
                        <div class="opcaoTrabalho"><input type="radio" name="trabalho" value="Tese"> Tese</div>
                        <div class="opcaoTrabalho"><input type="radio" name="trabalho" value="Dissertação"> Disserta&ccedil;&atilde;o</div>
                        <div class="opcaoTrabalho opE"><input type="radio" name="trabalho" value="TCC Especialização"> TCC (Especializa&ccedil;&atildeo)</div>
                        <div class="opcaoTrabalho opG"><input type="radio" name="trabalho" value="TCC Graduação"> TCC (Gradua&ccedil;&atilde;o)</div>
                    </div>
                </div>
                <br>

                <div class="tooltip">
                    <span class="tooltiptext">Selecione o tipo de trabalho entre Tese (doutorado),
                    Dissertação (mestrado), TCC (especialização) e TCC (graduação).</span>

                    <div class="cursoprograma">
                        <label id="curso">Curso/Programa<span style="color:#EE0000">*</span>:</label>
                        <select style="width: 95%; max-width:350px" id="cursosdoutorado" name="cursosdoutorado" class="cursos">
                            <option name="programa" value="0" id="0" selected="selected">- Selecione sua Unidade Acadêmica
                                -
                            </option>
                        </select>
                        <select style="width: 95%; max-width:350px" name="cursosmestrado" id="cursosmestrado" class="cursos">
                            <option name="programa" value="1" id="1">- Selecione sua Unidade Acadêmica -</option>
                        </select>
                        <select style="width: 95%; max-width:350px" name="cursosespecializacao" id="cursosespecializacao" class="cursos">
                            <option name="programa" value="2" id="2">- Selecione sua Unidade Acadêmica -</option>
                        </select>
                        <select style="width: 95%; max-width:350px" name="cursosdegraduação" id="cursosdegraduação" class="cursos">
                            <option name="programa" value="3" id="3">- Selecione sua Unidade Acadêmica -</option>
                        </select>
                    </div>
                </div>

<!--                 <div class="tooltip">
                    <span class="tooltiptext">Selecione o assunto que representa melhor o seu trabalho. A área do conhecimento do Ficat é baseada na Classificação Decimal de Dewey (CDD) e o assunto selecionado corresponde ao número de classificação da CDD.</span>
                    <label>Área do conhecimento<span style="color:#EE0000">*</span>:</label>
                    <select class="buscarAssunto form-control" name="buscarAssunto"></select>
                </div> -->

                <div class="tooltip">
                    <span class="tooltiptext">Selecione o assunto que representa melhor o seu trabalho. A área do conhecimento do Ficat é baseada na Classificação Decimal de Dewey (CDD) e o assunto selecionado corresponde ao número de classificação da CDD.</span>
                    <label>Área do conhecimento<span style="color:#EE0000">*</span>:</label>
                    <input type="text" readonly
                    class="form-control categoriasDeAssunto" href="areadoconhecimento.php"
                    name="txtAreadoconhecimento"
                    id="dc_subject_cnpq_1_id"
                    placeholder="Buscar um assunto no botão Categorias de assunto">


                    <div style="display: none"><label>CDD: <span style="color:#EE0000;">*</span>:</label><input type="text"
                        readonly
                        class="form-control"
                        name="txtCddconhecimento"
                        id="dc_subject_cnpq_1_id"
                        placeholder="CDD">
                    </div>

                    <script language="javascript" type="text/javascript">
                        function popitup(url) {
                            newwindow = window.open(url, 'name', 'height=515,width=500');
                            if (window.focus) {
                                newwindow.focus()
                            }
                            return false;
                        }
                    </script>
                </div>
            </fieldset>
        </br>


        <fieldset class="campo campo3">
            <legend>Palavras-chave</legend>

            <div class="tooltip">
                <span class="tooltiptext">Indicamos o uso de vocabulários controlados palavras-chave, conforme link.
                    Evite o uso de siglas nas palavras-chave. Em caso de dúvidas, entre em contato
                com o bibliotecário da biblioteca.</span>
                <nav>
                    <a href="http://bibcentral.ufpa.br/pergamum/biblioteca/autoridade.php" target="_blank">Consulte
                    vocabulário controlado</a>
                </nav>
            </div>
            <br>
            <br>

            <div class="tooltip">
                <span class="tooltiptext">Lista de palavras ou expressões que representam o
                    conteúdo da obra. Digite as palavras-chave em ordem decrescente de
                    importância, evitando sinônimos, termos repetitivos e vagos. É obrigatório
                inserir, no mínimo, uma palavra-chave.</span>
                <label>Assuntos (mín.: 1, máx.: 5):</label>
                <input type="text" name="assunto1" placeholder="Ex.: Bibliotecas universitárias">1<span>*</span>
                <br>
                <label class="emptyLabel"></label><input type="text" name="assunto2" placeholder="Ex.: Redes sociais">2
                <br>
                <label class="emptyLabel"></label><input type="text" name="assunto3" placeholder="Ex.: Universidades e faculdades">3
                <br>
                <label class="emptyLabel"></label><input type="text" name="assunto4">4
                <br>
                <label class="emptyLabel"></label><input type="text" name="assunto5">5
                <br>
            </div>
            <br>
            <br>

            <div class="tooltip">
                <span class="tooltiptext">Selecione a fonte a ser utilizada na elaboração da ficha de acordo
                    com a fonte utilizada na digitação do seu trabalho. Opções: Arial ou Times
                New Roman.</span>
                <label>Fonte<span>*</span>:</label>
                <select name="fonte" id="tipodefonte" class="styled-select-fonte">
                    <option selected="selected" value="fonte">- Selecione -</option>
                    <option value="times"> Times New Roman</option>
                    <option value="arial"> Arial</option>
                </select>
            </div>


        </fieldset>

        <!-- CAPTCHA -->

        <div class="captcha">
            <div class="g-recaptcha" data-sitekey="6Lfqo1gUAAAAAGh4rHQ-0vTBgub_WDIYXzBG8Htk"></div>

        </div>

        <input id="botao" class="botao" type="submit" name="submit" value="Gerar Ficha Catalográfica" onClick="return validarFicha()">

    </fieldset>
</form>
<br>

<video width="100%" controls src="video/tutorial.mp4">
  <track src="video/tutorial.vtt" kind="subtitles" srclang="pt" label="Português" />
  <!-- fallback for rubbish browsers -->
</video>

<br>
<img src="assets/imgs/footer.png" alt="Ficat 2.0">

<div class="second-footer">
    <hr>
    <p>Desenvolvido e mantido por SEDEPTI.</p>
</div>

</div>
</body>
</html>
<?php
} else {

    // Resposta do captcha
    if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
    }
    
    if(!$captcha){
        ?>
        <script>
            alert("Confirme o captcha!!!!");
        window.close()</script>
        <?php
    }

    $secretKey = "6Lfqo1gUAAAAAMQFQVOqvUnifxDY6yuhIGALMq2O";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);


        ?>
        <script>
            var id = $('.g-recaptcha', form).attr('id');
        grecaptcha.reset(id);</script>
        <?php

    // -- Formulário enviado e validado, gerar PDF -- //

        require "assets/tcpdf/tcpdf_include.php";
        ob_clean();

    // instancia de novo documento
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $espaço = "&nbsp;";
        $margem = $espaço . $espaço . $espaço . $espaço . $espaço . $espaço . $espaço . $espaço . $espaço;
        $fichaLinha = "<hr>";

    ///////////// => Estrutura ficha

        function getNomeCurso($str)
        {
            if (strstr($str, "|")) {
                $cursoaux = explode("|", $str);
                return $cursoaux[0];
            } else {
                return $str;
            }

        }

        $fichaCabecalho = "<b>Dados Internacionais de Catalogação na Publicação (CIP) de acordo com ISBD<br>Sistema de Bibliotecas da Universidade Federal do Pará<br>Gerada automaticamente pelo módulo Ficat, mediante os dados fornecidos pelo(a) autor(a)</b><br>";

    // Nome do autor do trabalho
        $fichaAutorNome = trim(ucfirst($_POST["nome"]));

        if (!empty($fichaAutorNome)) {
            $fichaAutorNomeArray = explode(' ', $fichaAutorNome);
            $fichaAutorNome = strtolower($fichaAutorNomeArray[0]);
            $fichaAutorNome = ucfirst($fichaAutorNomeArray[0]);  
            $size = count($fichaAutorNomeArray);
            for ($i = 1; $i < $size; $i++) {
                $nome = strtolower($fichaAutorNomeArray[$i]);
                $nome = ucfirst($fichaAutorNomeArray[$i]);
                $fichaAutorNome = $fichaAutorNome . ' ' . $nome;
            }
        }



    // foreach ($fichaAutorNomeArray as $nome) {
    //     $nome = strtolower($nome);
    //     $nome = ucfirst($nome);
    //     $fichaAutorNome = $fichaAutorNome . ' ' . $nome;
    // }

        $fichaAutorNome = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaAutorNome);

    // Sobrenome do autor do trabalho
        $fichaAutorSobrenome = trim(ucfirst($_POST["sobrenome"]));
        

        if (!empty($fichaAutorSobrenome)) {
            $fichaAutorSobrenomeArray = explode(' ', $fichaAutorSobrenome);
            $fichaAutorSobrenome = strtolower($fichaAutorSobrenomeArray[0]);
            $fichaAutorSobrenome = ucfirst($fichaAutorSobrenomeArray[0]);
            $size = count($fichaAutorSobrenomeArray);

            for ($i = 1; $i < $size; $i++) {
                $sobrenome = strtolower($fichaAutorSobrenomeArray[$i]);
                $sobrenome = ucfirst($fichaAutorSobrenomeArray[$i]);
                $fichaAutorSobrenome = $fichaAutorSobrenome . ' ' . $sobrenome;
            }
        }

    // foreach ($fichaAutorSobrenomeArray as $nome) {
    //     $nome = strtolower($nome);
    //     $nome = ucfirst($nome);
    //     $fichaAutorSobrenome = $fichaAutorSobrenome . ' ' . $nome;
    // }

        $fichaAutorSobrenome = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaAutorSobrenome);

    // Nome do coauto do trabalho
        $fichaCoautorNome = trim(ucfirst($_POST["nome_coaut"]));

        if (!empty($fichaCoautorNome)) {
            $fichaCoautorNomeArray = explode(' ', $fichaCoautorNome);
            $fichaCoautorNome = strtolower($fichaCoautorNomeArray[0]);
            $fichaCoautorNome = ucfirst($fichaCoautorNomeArray[0]);
            $size = count($fichaCoautorNomeArray);

            for ($i = 1; $i < $size; $i++) {
                $conome = strtolower($fichaCoautorNomeArray[$i]);
                $conome = ucfirst($fichaCoautorNomeArray[$i]);
                $fichaCoautorNome = $fichaCoautorNome . ' ' . $conome;
            }
        }

        $fichaCoautorNome = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaCoautorNome);

    // Sobrenome do coautor do trabalho
        $fichaCoautorSobrenome = trim(ucfirst($_POST["sobrenome_coaut"]));

        if (!empty($fichaCoautorSobrenome)) {
            $fichaCoautorSobrenomeArray = explode(' ', $fichaCoautorSobrenome);
            $fichaCoautorSobrenome = strtolower($fichaCoautorSobrenomeArray[0]);
            $fichaCoautorSobrenome = ucfirst($fichaCoautorSobrenomeArray[0]);
            $size = count($fichaCoautorNomeArray);

            for ($i = 1; $i < $size; $i++) {
                $cosobrenome = strtolower($fichaCoautorSobrenomeArray[$i]);
                $cosobrenome = ucfirst($fichaCoautorSobrenomeArray[$i]);
                $fichaCoautorSobrenome = $fichaCoautorSobrenome . ' ' . $cosobrenome;
            }
        }

        $fichaCoautorSobrenome = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaCoautorSobrenome);

    //Titulo do trabalho
        $fichaTitulo = $_POST["titulo"];

        $fichaTituloBD = addslashes($_POST["titulo"]);

    // Subtítulo do trabalho
        $fichaSubtitulo = $_POST["subtitulo"];

    // Opções de cursos de Doutorado
        $fichaCurso1 = getNomeCurso($_POST["cursosdoutorado"]);

    // Opções de cursos de Mestrado
        $fichaCurso2 = getNomeCurso($_POST["cursosmestrado"]);

    // Opções de cursos de Especialização
        $fichaCurso3 = getNomeCurso($_POST["cursosespecializacao"]);

    // Opções de cursos de Graduação
        $fichaCurso4 = $_POST["cursosdegraduação"];

    // tese / Dissertação / TCC(Especialização / TCC (Graduação)
        $fichaTipoTrabalho = $_POST["trabalho"];

    // nome do orientador
        $fichaNomeOrientador = $_POST["nome_ori"];

        $fichaNomeOrientadorArray = explode(' ', $fichaNomeOrientador);
        $fichaNomeOrientador = '';

        foreach ($fichaNomeOrientadorArray as $nome) {
            $nome = strtolower($nome);
            $nome = ucfirst($nome);
            $fichaNomeOrientador = $fichaNomeOrientador . ' ' . $nome;
        }

        $fichaNomeOrientador = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaNomeOrientador);

    // sobrenome do orientador
        $fichaSobrenomeOrientador = $_POST["sobrenome_ori"];
        $fichaSobrenomeOrientadorArray = explode(' ', $fichaSobrenomeOrientador);
        $fichaSobrenomeOrientador = '';

        foreach ($fichaSobrenomeOrientadorArray as $nome) {
            $nome = strtolower($nome);
            $nome = ucfirst($nome);
            $fichaSobrenomeOrientador = $fichaSobrenomeOrientador . ' ' . $nome;
        }

        $fichaSobrenomeOrientador = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaSobrenomeOrientador);

    // se sexo feminino, vale "a"
        if (isset($_POST["orientadora"]) && !empty($_POST["orientadora"])) {
            $fichaOrientadora = $_POST["orientadora"];

        }

    // se sexo feminino, vale "a"
        if (isset($_POST["coorientadora"]) && !empty($_POST["coorientadora"])) {
            $fichaCoorientadora = $_POST["coorientadora"];

        }

    // Definição de existência de ilustrações
        $fichaIlustracao = $_POST["ilustração"];

    // nome do coorientador
        $fichaNomeCoorientador = $_POST["nome_coori"];

        $fichaNomeCoorientadorArray = explode(' ', $fichaNomeCoorientador);
        $fichaNomeCoorientador = '';

        foreach ($fichaNomeCoorientadorArray as $nome) {
            $nome = strtolower($nome);
            $nome = ucfirst($nome);
            $fichaNomeCoorientador = $fichaNomeCoorientador . ' ' . $nome;
        }

        $fichaNomeCoorientador = preg_replace(array("/\bDe\b/", "/\bDo\b/", "/\bDos\b/", "/\bDa\b/", "/\bDas\b/"),
            array("de", "do", "dos", "da", "das"), $fichaNomeCoorientador);

    // Escolha do tipo de fonte
        $fichaFonte = $_POST["fonte"];

    // Determinação do ano de publicação do trabalho
        $fichaAno = $_POST["ano"];

    //Tipo de paginação
        $fichaUnidade = $_POST["unidades"];
        $fichaNomeUnidadeAcademica = $_POST["make_text"];

        if (isset($_POST["paginacao"]) && !empty($_POST["paginacao"])) {
            $fichaPaginacao = $_POST["paginacao"];
        }

    //Número de páginas do trabalho
        $fichaPaginas = $_POST["pags"];

    //Primeira palavra-chave
        $fichaAssunto1 = $_POST["assunto1"];

    //Segunda palavra-chave
        $fichaAssunto2 = $_POST["assunto2"];

    //Terceira palavra-chave
        $fichaAssunto3 = $_POST["assunto3"];

    //Quarta palavra-chave
        $fichaAssunto4 = $_POST["assunto4"];

    //Quinta palavra-chave
        $fichaAssunto5 = $_POST["assunto5"];

    //Primeira letra do nome para Definição do código da tabela PHA
        $fichaPrimeiraLetra = strtoupper(substr($fichaAutorNome, 0, 1));

    //Titulação do orientador
        $fichaTitulacaoOrientador = $_POST["titulacaoorientador"];

    //Titulação do coorientador
        $fichaTitulacaoCoorientador = $_POST["titulacaocoorientador"];

    //CDD
        $fichaCdd = "CDD " . $_POST["txtCddconhecimento"];

    //Para Unidade de Demonstração não salva no banco
        if ($fichaUnidade != 'DMT') {
            if ($fichaTipoTrabalho == 'Tese') {
                $query = "INSERT INTO registros (unidade,tipo, curso) VALUES ('$fichaUnidade','$fichaTipoTrabalho','$fichaCurso1')";
                $insert = mysql_query($query);

            } else if ($fichaTipoTrabalho == 'Dissertação') {
                $query = "INSERT INTO registros (unidade,tipo, curso) VALUES ('$fichaUnidade','$fichaTipoTrabalho','$fichaCurso2')";
                $insert = mysql_query($query);

            } else if ($fichaTipoTrabalho == 'TCC Especialização') {
                $query = "INSERT INTO registros (unidade,tipo, curso) VALUES ('$fichaUnidade','$fichaTipoTrabalho','$fichaCurso3')";
                $insert = mysql_query($query);

            } else if ($fichaTipoTrabalho == 'TCC Graduação') {
                $query = "INSERT INTO registros (unidade,tipo, curso) VALUES ('$fichaUnidade','$fichaTipoTrabalho','$fichaCurso4')";
                $insert = mysql_query($query);
            }
        }

    // Recebe a tabela PHA

        require_once 'assets/php/consulta_pha.php';

    // Padronizacao do titulo
        if (!empty($fichaSubtitulo)) {
            if (!empty($fichaCoautorNome) && !empty($fichaCoautorSobrenome)) {
                $fichaTitulo = $fichaTitulo . " : " . $fichaSubtitulo . " / " . $fichaAutorNome . " " . $fichaAutorSobrenome . ', ' . $fichaCoautorNome . " " . $fichaCoautorSobrenome . ". — " . $fichaAno . '.';
            } else {
                $fichaTitulo = $fichaTitulo . " : " . $fichaSubtitulo . " / " . $fichaAutorNome . " " . $fichaAutorSobrenome . ". — " . $fichaAno . '.';
            }
        } else {
            if (!empty($fichaCoautorNome) && !empty($fichaCoautorSobrenome)) {
                $fichaTitulo = $fichaTitulo . " / " . $fichaAutorNome . " " . $fichaAutorSobrenome . ', ' . $fichaCoautorNome . " " . $fichaCoautorSobrenome . ". — " . $fichaAno . '.';
            } else {
                $fichaTitulo = $fichaTitulo . " / " . $fichaAutorNome . " " . $fichaAutorSobrenome . ". — " . $fichaAno . '.';
            }
        }

    // Descrição física
        if ($fichaIlustracao == "naopossui") {
            $fichaDescricaoFisica = $fichaPaginas . " f. ";
        } else if ($fichaIlustracao == "coloridas") {
            $fichaDescricaoFisica = $fichaPaginas . " f. : il. color.";
        } else {
            $fichaDescricaoFisica = $fichaPaginas . " f. : il. ";
        }

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=
    // Orientação e Coorientação

        $fichaNotas .= "Orientador(a): ";
        if ($fichaTitulacaoOrientador == "orientadorespecialista" && isset($fichaOrientadora)) {
            $fichaNotas .= "Profª. Esp." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else if ($fichaTitulacaoOrientador == "orientadorespecialista") {
            $fichaNotas .= "Prof. Esp." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else if ($fichaTitulacaoOrientador == "orientadormestre" && isset($fichaOrientadora)) {
            $fichaNotas .= "Profª. MSc." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else if ($fichaTitulacaoOrientador == "orientadormestre") {
            $fichaNotas .= "Prof. Me." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else if ($fichaTitulacaoOrientador == "orientadordoutor" && isset($fichaOrientadora)) {
            $fichaNotas .= "Profª. Dra." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else if ($fichaTitulacaoOrientador == "orientadordoutor") {
            $fichaNotas .= "Prof. Dr." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else if ($fichaTitulacaoOrientador == "orientadorgraduado" && isset($fichaOrientadora)) {
            $fichaNotas .= "Profª." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        } else {
            $fichaNotas .= "Prof." . " " . $fichaNomeOrientador . " " . $fichaSobrenomeOrientador;
        }

        if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadorespecialista" && isset($fichaCoorientadora)) {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . "Coorientador(a): Profª. Esp." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadorespecialista") {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientação: Prof. Esp." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadormestre" && isset($fichaCoorientadora)) {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientador(a): Profª. MSc." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadormestre") {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientador(a): Prof. Me." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadordoutor" && isset($fichaCoorientadora)) {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientação: Profª. Dra." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadordoutor") {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientador(a): Prof. Dr." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadorgraduado" && isset($fichaCoorientadora)) {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientador(a): Profª." . " " . $fichaNomeCoorientador;
        } else if (!empty($fichaNomeCoorientador) && $fichaTitulacaoCoorientador == "coorientadorgraduado") {
            $fichaNotas .= "<br>" . $espaço . $espaço . $espaço . $espaço . $espaço . "Coorientador(a): Prof." . " " . $fichaNomeCoorientador;
        } else {
            $fichaNotas .= "";
        }

        $fichaNotas .= "<br>".$espaço.$espaço.$espaço;

        if ($fichaUnidade == "CABAE" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Abaetetuba, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CALTA" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Altamira, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CANAN" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Ananindeua, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBRAG" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Bragança, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBREV" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Breves, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNTI" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Cametá, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNCA" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Capanema, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CCAST" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Castanhal, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUSAL" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Salinópolis, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CSOUR" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Soure, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CAMTU" && $fichaTipoTrabalho == "Tese" || $fichaUnidade == "NDAE" && $fichaTipoTrabalho == "Tese") {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Tucuruí, " . $fichaAno . ".\n";
        } elseif ($fichaTipoTrabalho == "Tese")
    //$texto .= "       Tese (Doutorado) - Universidade Federal do Pará, ".$curso1.", Belém, " .$ano.".\n";
        {
            $fichaNotas .= "Tese (Doutorado) - " . $fichaCurso1 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Belém, " . $fichaAno . ".\n";
        }

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=
        elseif ($fichaUnidade == "CABAE" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Abaetetuba, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CALTA" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Altamira, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CANAN" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Ananindeua, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBRAG" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Bragança, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBREV" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Breves, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNTI" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Cametá, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNCA" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Capanema, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CCAST" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Castanhal, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUSAL" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Salinópolis, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CSOUR" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Soure, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CAMTU" && $fichaTipoTrabalho == "Dissertação" || $fichaUnidade == "NDAE" && $fichaTipoTrabalho == "Dissertação") {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Tucuruí, " . $fichaAno . ".\n";
        } elseif ($fichaTipoTrabalho == "Dissertação")
    //$texto .= "       Dissertação (Mestrado) - Universidade Federal do Pará, ".$curso2.", Belém, " .$ano.".\n";
        {
            $fichaNotas .= "       Dissertação (Mestrado) - " . $fichaCurso2 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Belém, " . $fichaAno . ".\n";
        }

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=
        elseif ($fichaUnidade == "CABAE" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Abaetetuba, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CALTA" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Altamira, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CANAN" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Ananindeua, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBRAG" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Bragança, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBREV" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Breves, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNTI" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Cametá, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNCA" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Capanema, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CCAST" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Castanhal, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUSAL" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Salinópolis, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CSOUR" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Soure, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CAMTU" && $fichaTipoTrabalho == "TCC Especialização" || $fichaUnidade == "NDAE" && $fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Tucuruí, " . $fichaAno . ".\n";
        } elseif ($fichaTipoTrabalho == "TCC Especialização") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Especialização) - " . $fichaCurso3 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Belém, " . $fichaAno . ".\n";
        }

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=
        elseif ($fichaUnidade == "CABAE" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Abaetetuba, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CALTA" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Altamira, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CANAN" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Ananindeua, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBRAG" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Bragança, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CBREV" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Breves, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNTI" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Cametá, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUNCA" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Capanema, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CCAST" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Castanhal, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CUSAL" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Salinópolis, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CSOUR" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Soure, " . $fichaAno . ".\n";
        } elseif ($fichaUnidade == "CAMTU" && $fichaTipoTrabalho == "TCC Graduação" || $fichaUnidade == "NDAE" && $fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Tucuruí, " . $fichaAno . ".\n";
        } elseif ($fichaTipoTrabalho == "TCC Graduação") {
            $fichaNotas .= "       Trabalho de Conclusão de Curso (Graduação) - " . $fichaCurso4 . ", " . $fichaNomeUnidadeAcademica . ", Universidade Federal do Pará, Belém, " . $fichaAno . ".\n";
        }

    // =_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=

    // Palavras chave
        if (!empty($fichaAssunto1)) {
            $fichaPalavrasChave .= "1. $fichaAssunto1. ";
        }

        if (!empty($fichaAssunto2)) {
            $fichaPalavrasChave .= "2. $fichaAssunto2. ";
        }
        if (!empty($fichaAssunto3)) {
            $fichaPalavrasChave .= "3. $fichaAssunto3. ";
        }

        if (!empty($fichaAssunto4)) {
            $fichaPalavrasChave .= "4. $fichaAssunto4. ";
        }

        if (!empty($fichaAssunto5)) {
            $fichaPalavrasChave .= "5. $fichaAssunto5. ";
        }

        if (!empty($fichaTitulo)) {
            if (!empty($fichaCoautorNome) && !empty($fichaCoautorSobrenome)) {
                $fichaPalavrasChave .= "I. Título.";
            } else {
                $fichaPalavrasChave .= "I. Título.";
            }
        }

        // $crb_query = mysqli_query($conexao, "SELECT * FROM elaboradores e JOIN unidadesacademicas u
        //     ON e.unidade = u.id
        //     WHERE sigla='$fichaUnidade'");

        // while ($reg_result = mysqli_fetch_array($crb_query, MYSQL_ASSOC)) {
        //     $crbs_totais[] = $reg_result['crb'];
        //     $elaborador_totais[] = $reg_result['elaborador'];
        //     $codigoCRB = $crbs_totais[0];
        //     $elaborador = $elaborador_totais[0];
        // }

        // $fichaElaborado = "Elaborado por " . $elaborador . " – CRB-" . $codigoCRB;

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

    // seta fonte
        if ($fichaFonte == "times") {
            $pdf->SetFont('times', '', 10);
            $pdf->setCellHeightRatio(1);
        } else if ($fichaFonte == "arial") {
            $pdf->SetFont($fontArial, '', 10);
            $pdf->setCellHeightRatio(1);
        } else {
            echo "A fonte nao pode ser selecionada";
        }

    // seta margens
        $pdf->SetMargins(0, 180, 0,true);
    //$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        $pdf->SetAutoPageBreak(true, 0);

    // Adiciona uma pagina
        $pdf->AddPage();

        $ficha = '
        <style>
        hr {
            height: 1px;
        }
        .fichaTitulo {

        }


        </style>
        <!-- Cabecalho -->


        <table border="0" cellspacing="3" cellpadding="4">
        <tbody>

        <!-- Cabecalho -->



        <tr>  
        <td style="width:120px"> </td>
        <td style="width:340px" align="center" colspan="2"><p style="font-size: 8px">' .$fichaCabecalho. '</p></td>
        <td style="width:127px"> </td>
        </tr>

        <tr>
        <td style="width:120px"> </td>
        <td style="width:340px" colspan="2"><hr></td>
        <td style="width:127px"> </td>
        </tr>
        <!-- Cabecalho -->

        <!-- Cutter / Autor -->
        <tr>
        <td style="width:160px" align="right">'.$codigo.'</td>
        <td style="width:280px">'.$fichaAutorSobrenome.', '.$fichaAutorNome.'<br>'
        .$espaço.$espaço.$espaço.$espaço.$espaço.$espaço.$fichaTitulo.'<br>' 
        .$fichaDescricaoFisica.'</td>
        <td style="width:147px"> </td>
        </tr>
        <!-- Cutter / Autor -->

        <!-- Notas -->
        <tr>
        <td style="width:160px"> </td>
        <td style="width:280px"><br>'.$espaço.$espaço.$espaço.$espaço.$fichaNotas.'</td>
        <td style="width:147px"> </td>
        </tr>
        <!-- Notas -->

        <!-- Keywords -->
        <tr>
        <td style="width:160px"> </td>
        <td style="width:260px">' .$espaço.$espaço.$espaço.$espaço. $fichaPalavrasChave . '</td>
        <td style="width:147px"> </td>
        </tr>
        <!-- Keywords -->

        <!-- CDD -->
        <tr>
        <td style="width:120px"> </td>
        <td style="width:340px" align="right" colspan="2">' . $fichaCdd . '</td>
        <td style="width:127px"> </td>
        </tr>
        <!-- CDD -->

        <!-- BL -->
        <tr>
        <td style="width:120px"> </td>
        <td style="width:340px" colspan="2"><hr></td>
        <td style="width:127px"> </td>
        <br>
        </tr>
        <!-- BL -->


        </tbody>
        </table>';

    //USAR CODIGO ABAIXO APÓS ABASTERCER BANCO COM CDD

    // <!-- CDD -->

    // <!-- BL -->
    // <tr>
    // <td style="width: 100%" colspan="2"><hr></td>
    // <br>
    // <td style="width: 100%" align="center" colspan="2"><b><br>'.$fichaElaborado.'</b></td>
    // </tr>
    // <!-- BL -->

    // </tbody>
    // </table>';

        $pdf->writeHTMLCell('', '', '', '', $ficha, 0);
    //$pdf->writeHTML($ficha);
        $pdf->Output('ficha.pdf', 'I');

    // Seta padding da celula
    // Padding = Distancia do texto para a borda interna da celular
    //$pdf->setCellPaddings(1, 1, 1, 1);

    // Seta margem da celular
    // Margem = Distancia da parte externa para o elemento mais externo no documento
    //$pdf->setCellMargins('', 1, 1, 1);
    
}
?>
