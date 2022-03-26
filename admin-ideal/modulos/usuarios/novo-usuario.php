<?php
require 'PHPMailer-master/class.phpmailer.php';
require 'PHPMailer-master/class.smtp.php';

$nometipo = "Bem-vindo!";
$Mailer = new PHPMailer();
$Mailer->IsSMTP();

$Mailer->isHTML(true);
$Mailer->Charset = 'UTF-8';
$Mailer->SMTPAuth = true;
$Mailer->SMTPDebug = 0; 
$Mailer->SMTPSecure = 'tls';
$Mailer->Host = 'smtp-relay.gmail.com';
$Mailer->Port = 587;
$Mailer->Username = 'ola@idealiz.com.br';
$Mailer->Password = 'home1010*';
$Mailer->setFrom('ola@idealiz.com.br', utf8_decode('Agência Idealiz '));



$Mailer->Subject = utf8_decode("Admin Ideal - " . $nometipo);
$Mailer->Body =  file_get_contents("../../templete/bem-vindo/novo-usuario.php");
$Mailer->Body = str_replace( '%NOME%', $nome, $Mailer->Body );
$Mailer->Body = str_replace( '%USUARIO%', $usuario, $Mailer->Body );
$Mailer->Body = str_replace( '%SENHA%', $senhapadrao, $Mailer->Body );

$Mailer->AltBody = 'Mensagem em texto';
$Mailer->AddAddress($email);
$Mailer->AddBCC("ola@idealiz.com.br", "Agência Idealiz");
//$Mailer->AddAttachment('arquivo.pdf');
if ($Mailer->Send()){echo "Enviado com sucesso";}else{echo 'Erro do PHPMailer: ' . $Mailer->ErrorInfo;}
?>
