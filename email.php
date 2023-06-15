<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if(isset($_POST["enviar"])){
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->isSMTP();
      $mail->Host       = 'mail.alfaiatariaarquiteturafina.com.br';
      $mail->SMTPAuth   = true;
      $mail->Username   = 'contato@alfaiatariaarquiteturafina.com.br';
      $mail->Password   = '^z,_X_PQ=e,M';
      $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('contato@alfaiatariaarquiteturafina.com.br', 'Alfaiataria Arquitetura Fina');
      $mail->addAddress('alfaiatariaarquiteturafina@gmail.com');     //Add a recipient
      $mail->addReplyTo($_POST["email"], 'Information');


      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Mensagem Cliente via Site';
      $mail->Body    = "Nome: " .$_POST["nome"]. "<br/>Telefone: " .$_POST["telefone"]. "<br/>Email: " .$_POST["email"]. "<br/>Mensagem: " .$_POST["mensagem"];
      $mail->AltBody = 'Nome: 
      Telefone: 
      Email: 
      Mensagem: ';

      $mail->send();
      echo 'Mensagem enviada com sucesso';
  } catch (Exception $e) {
      echo "Ocorreu o seguinte erro: {$mail->ErrorInfo}";
  }
}