//*-----Função para filtrar os cursos depois da unidade acadêmica------ Conexão com o banco de dados*
$(document).ready(function() {
    $('#unidades').change(function() {
        $('#cursosdoutorado').load('assets/php/listaCursosDoutorado.php?unidades=' + $('#unidades').val());
        $('#cursosmestrado').load('assets/php/listaCursosMestrado.php?unidades=' + $('#unidades').val());
        $('#cursosespecializacao').load('assets/php/listaCursosEspecializacao.php?unidades=' + $('#unidades').val());
        $('#cursosdegraduação').load('assets/php/listaCursosGraduacao.php?unidades=' + $('#unidades').val());
    });
});


$(function reloadPage() {
    $('#titulacaoorientador option[value="selecionetitulacao"]').attr('selected', true);
    $('#titulacaocoorientador option[value="selecionetitulacaocoorientador"]').attr('selected', true);
    $('#ano').find('option[value="2018"]').attr('selected', true);
    $('#Ilustração option[value="selecione"]').attr('selected', true);
    $('#unidades option[value=""]').attr('selected', true);
});


//*-----Select dos cursos------*

$(document).ready(function() {
    $('select[name=cursosdoutorado]').hide();
    $('select[name=cursosmestrado]').hide();
    $('select[name=cursosespecializacao]').hide();
    $('select[name=cursosdegraduação]').hide();
    $('label[id=curso]').hide();


    $('input[name=trabalho]').change(function() {
        //quebradelinha = document.createElement("br");
        switch ($(this).val()) {

            case 'Tese':
                {
                    $('label[id=curso]').show();
                    $('select[name=cursosdoutorado]').show();
                    $('select[name=cursosmestrado]').hide();
                    $('select[name=cursosespecializacao]').hide();
                    $('select[name=cursosdegraduação]').hide();

                    break;
                }
            case 'Dissertação':
                {
                    $('label[id=curso]').show();
                    $('select[name=cursosdoutorado]').hide();
                    $('select[name=cursosmestrado]').show();
                    $('select[name=cursosespecializacao]').hide();
                    $('select[name=cursosdegraduação]').hide();


                    break;
                }
            case 'TCC Especialização':
                {
                    $('label[id=curso]').show();
                    $('select[name=cursosdoutorado]').hide();
                    $('select[name=cursosmestrado]').hide();
                    $('select[name=cursosespecializacao]').show();
                    $('select[name=cursosdegraduação]').hide();

                    break;
                }
            case 'TCC Graduação':
                {
                    $('label[id=curso]').show();
                    $('select[name=cursosdoutorado]').hide();
                    $('select[name=cursosmestrado]').hide();
                    $('select[name=cursosespecializacao]').hide();
                    $('select[name=cursosdegraduação]').show();

                    break;
                }



        }
    });
});


/* Função para validar campos do formulário */


function validarFicha() {
    var nome = document.ficha.nome.value;
    var sobrenome = document.ficha.sobrenome.value;
    var nome_coaut = document.ficha.nome_coaut.value;
    var sobrenome_coaut = document.ficha.sobrenome_coaut.value;
    var titulo = document.ficha.titulo.value;
    var nome_ori = document.ficha.nome_ori.value;
    var sobrenome_ori = document.ficha.sobrenome_ori.value;
    var titulacao_orientador = document.ficha.titulacaoorientador.value;
    var nome_coorientador = document.ficha.nome_coori.value;
    var titulacao_coorientador = document.ficha.titulacaocoorientador.value;
    var ano = document.ficha.ano.value;
    var pags = document.ficha.pags.value;
    var assunto1 = document.ficha.assunto1.value;
    var curso1 = document.ficha.cursosdoutorado.value;
    var curso2 = document.ficha.cursosmestrado.value;
    var curso3 = document.ficha.cursosespecializacao.value;
    var curso4 = document.ficha.cursosdegraduação.value;
    var ilustracao = document.ficha.ilustração.value;
    var fonte = document.ficha.fonte.value;
    var areadoconhecimento = document.ficha.txtAreadoconhecimento.value;
    var cdd = document.ficha.txtCddconhecimento.value;

    if (nome == "") {
        alert('Informe seu Nome');
        ficha.nome.focus();
        return false;
    }

    if (sobrenome == "") {
        alert('Informe seu Sobrenome');
        ficha.sobrenome.focus();
        return false;
    }

    if ((nome_coaut == "") && (sobrenome_coaut != "")) {
        alert('Informe o nome do coautor');
        ficha.nome_coaut.focus();
        return false;
    }

    if ((nome_coaut != "") && (sobrenome_coaut == "")) {
        alert('Informe o sobrenome do coautor');
        ficha.sobrenome_coaut.focus();
        return false;
    }

    if (titulo == "") {
        alert('Informe o título do seu trabalho');
        ficha.titulo.focus();
        return false;
    }

    if (nome_ori == "") {
        alert('Informe o nome do seu orientador');
        ficha.nome_ori.focus();
        return false;
    }

    if (sobrenome_ori == "") {
        alert('Informe o sobrenome do seu orientador');
        ficha.sobrenome_ori.focus();
        return false;
    }

    if (titulacao_orientador == "selecione") {
        alert('Informe a titulação do seu orientador');
        ficha.titulacaoorientador.focus();
        return false;
    }

    if ((nome_coorientador == "") && (titulacao_coorientador != "selecionetitulacaocoorientador")){
        alert('Informe o nome do coorientador');
        ficha.nome_coori.focus();
        return false;
    }

    if ((nome_coorientador != "") && (titulacao_coorientador == "selecionetitulacaocoorientador")){
        alert('Informe a titulação do coorientador');
        ficha.titulacaocoorientador.focus();
        return false;
    }


    if (ano == "") {
        alert('Informe o ano de publicação do seu trabalho');
        ficha.ano.focus();
        return false;
    }

    if (ano < 1000) {
        alert('Informe os quatro dígitos do ano de seu trabalho (ex. 2014)');
        ficha.ano.focus();
        return false;
    }

    if (ano < 1950) {
        alert('Verifique o ano de publicação do seu trabalho, ele não poderá ser menor que 1950.');
        ficha.ano.focus();
        return false;
    }

    if (ano > 9999) {
        alert('Informe apenas os quatro dígitos do ano de seu trabalho\n(ex. 2014)');
        ficha.ano.focus();
        return false;
    }

    if (pags == "") {
        alert('Informe o número de folhas do seu trabalho');
        ficha.pags.focus();
        return false;
    }

    if (ilustracao == "selecione") {
        alert('Escolha o tipo de ilustração');
        ficha.ilustração.focus();
        return false;
    }

    if (fonte == "fonte") {
        alert('Escolha o tipo de Fonte');
        return false;
    }

    if (assunto1 == "") {
        alert('Preencha pelo menos uma palavra-chave');
        ficha.assunto1.focus();
        return false;
    }

    if (areadoconhecimento == "") {
        alert('Informe a Área do conhecimento');
        ficha.txtAreadoconhecimento.focus();
        return false;
    }

    if (cdd == "") {
        alert('CDD inválido. Por favor, selecione outro valor');
        ficha.txtAreadoconhecimento.focus();
        return false;
    }


}



function validarFaleConosco(){
    var nome = document.formContato.nome.value;
    var email = document.formContato.email.value;
    var telefone = document.formContato.telefone.value;
    var mensagem = document.formContato.mensagem.value;

    if (nome == ""){
        alert("Por favor, insira seu nome.");
        formContato.nome.focus();
        return false;
    }
    
    if (email == ""){
        alert("Por favor, insira um e-mail para contato.");
        formContato.email.focus();
        return false;   
    }

    if (telefone == ""){
        alert("Por favor, insira um telefone para contato");
        formContato.email.focus();
        return false;
    }

    if (mensagem == ""){
        alert("Por favor, digite sua mensagem para contato.");
        formContato.email.focus();
        return false;
    }

}

function mostrarMenu() {
    var menu = document.getElementById('menu');
    if (menu.style.display == 'block'){
        menu.style.display = 'none';
    }else {
        menu.style.display = 'block';
    }
}

