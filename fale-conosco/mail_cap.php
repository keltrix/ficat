<?php
if (isset($_POST['BTEnvia'])){
	$captcha;
	if(isset($_POST['g-recaptcha-response'])){
		$captcha=$_POST['g-recaptcha-response'];
	}

	if(!$captcha){
		?>
		<script>
			alert("Confirme o captcha");
		window.close()</script>
		<?php

		header('Location: index.php');
	}
	$secretKey = "6Lfqo1gUAAAAAMQFQVOqvUnifxDY6yuhIGALMq2O";
	$ip = $_SERVER['REMOTE_ADDR'];
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
	if(intval($responseKeys["success"]) !== 1) {
		?>
		<script>
			alert("Não foi possivel verificar a sua autenticidade");
		window.close()</script>
		<?php

		header('Location: index.php');
	} else {
		include_once('../assets/phpmailer/class.phpmailer.php');
		require_once('../assets/phpmailer/class.smtp.php');

  // Inicia a classe PHPMailer
		$mail = new PHPMailer(true);

  // Define os dados do servidor e tipo de conexão
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  $mail->IsSMTP(); // Define que a mensagem será SMTP
  $mail -> IsHTML (true);

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $mensagem = $_POST['mensagem'];
  try {

  //Configuração do e-mail
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
  //$mail->SMTPDebug = 2;
  $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
  $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
  $mail->SMTPSecure = 'ssl'; //secure transfer enabled
  $mail->Port       = 465; //  Usar 587 porta SMTP
  $mail->Username = 'sedepti.ufpa@gmail.com'; // Usuário do servidor SMTP (endereço de email)
  $mail->Password = '538&J<5k'; // Senha do servidor SMTP (senha do email usado)
  //Define o remetente
  //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  $mail->setFrom('sedepti.ufpa@gmail.com','Ficat 2.0');
  $mail->AddReplyTo($email);//e-mail para enviar resposta
  $mail->Subject = 'Modulo FICAT - Contato: '.utf8_decode($nome);//Assunto do e-mail

  //Define os destinatário(s)
  //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  $mail->AddAddress('sedepti.ufpa@gmail.com', 'SEDEPTI');

  $mail->MsgHTML('<b>De: </b>'.$nome. '<br><b>E-mail: </b>'.$email.'<br><b>Telefone: </b>'.$telefone."<br><br>".$mensagem);

  //Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
  //$mail->MsgHTML(file_get_contents('arquivo.html'));

  ?>
		<script>
			alert("Mensagem Registrada.");
		window.close()</script>
	<?php

  $mail->Send();
  echo '<script language="javascript">';
  echo 'alert("E-mail enviado com sucesso. Retornaremos assim que possível"); window.location.href="index.php";';
  echo '</script>';
  header('Location: index.php');

  // Arquivo de configuração - modelo UFPA
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
  //$mail->SMTPDebug=2;
    //$mail->IsSMTP(); // send via SMTP
    //$mail->Host = "smtp.ufpa.br"; //seu servidor SMTP
    //$mail->SMTPAuth = true; // 'true' para autenticação
    //$mail->Username = "sedepti@ufpa.br"; // usuário de SMTP
    //$mail->Password = "!Ufpa2088"; // senha de SMTP
    //$mail->From = "sedepti@ufpa.br"; //coloque aqui o seu email, para que a autenticação não barre a mensagem
    //$mail->FromName = "SEDEPTI";
    //$mail->AddAddress("sedepti@ufpa.br","Nome do Destinatario" );
    //$mail->AddAddress("sedepti@ufpa.br" ); // (opcional) só o envio pelo email
    //$mail->AddReplyTo("sedepti@ufpa.br.copia","Nome do Destinatario com cópia" ); //aqui você coloca o endereço de quem está enviando a mensagem pela sua página
    //$mail->WordWrap = 50; // Definição de quebra de linha
    //$mail->AddAttachment("/caminho/do/anexo/no/servidor.ext" ); // (opcional) anexos
    //$mail->AddAttachment("/caminho/do/anexo/servidor.ext","nome_do_anexo.ext"); // (opcional) mais anexos
    //$mail->IsHTML(true); // envio como HTML se 'true'
    //$mail->Body = "Conteúdo da mensagem HTML ";
    //$mail->AltBody = "Para mensagens somente texto";

  //Meu arquivo de configuração
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
  //$mail->SMTPDebug = 2;
  //$mail->Host = 'smtp.ufpa.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
  //$mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
  //$mail->SMTPSecure = 'ssl'; //secure transfer enabled
  //$mail->Port       = 587; //  Usar 587 porta SMTP
  //$mail->Username = 'sedepti@ufpa.br'; // Usuário do servidor SMTP (endereço de email)
  //$mail->Password = '!Ufpa2088'; // Senha do servidor SMTP (senha do email usado)
  //$mail->From='sedepti@ufpa.br';
  //Define o remetente
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  //$mail->SetFrom('SetFrom@gmail.com', 'Victor'); //Seu e-mail
  //$mail->AddReplyTo('ReplyTo@gmail.com', 'Victor'); //Seu e-mail
  //$mail->Subject = 'Modulo FICAT - Contato';//Assunto do e-mail


    //Define os destinatário(s)
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddAddress('sedepti@ufpa.br', 'SEDEPTI');

    //Campos abaixo são opcionais
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
    //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
    //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo

    //Define o corpo do email
    //$mail->MsgHTML('<b>De: </b>'.$nome. '<br><b>E-mail: </b>'.$email.'<br><b>Telefone: </b>'.$telefone."<br><br>".$mensagem);

    ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
    //$mail->MsgHTML(file_get_contents('arquivo.html'));

    //$mail->Send();
    //echo '<script language="javascript">';
    //echo 'alert("E-mail enviado com sucesso. Retornaremos assim que possível")';
    //echo '</script>';

    //caso apresente algum erro é apresentado abaixo com essa exceção.
}catch (phpmailerException $e) {
    echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
  }
}
}


?>