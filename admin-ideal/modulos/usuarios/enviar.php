<?php 

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';
 
/*$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$celular = filter_var($_POST['celular'], FILTER_SANITIZE_STRING);
$como = filter_var($_POST['como'], FILTER_SANITIZE_STRING);
$msg = filter_var($_POST['msg'], FILTER_SANITIZE_STRING);*/

$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$assunto = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
$mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_STRING);
 
if (empty($nome)){
  echo "nome";
  die;
}
if (empty($email)){
  echo "email";
  die;
}
if (empty($telefone)){
  echo "telefone";
  die;
}

$res_admin = '<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="http://agenciahauze.com.br/img/email/top.jpg" ></td>
  </tr>
  <tr>
    <td><table width="468" height="89" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left: 1px solid #CDCDCD; border-right: 1px solid #CDCDCD; ">
      <tr>
        <td width="20" height="22"></td>
        <td width="448"  valign="top"></td>
      </tr>
	  <tr>
        <td width="20" height="22">&nbsp;</td>
        <td width="448"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">Nome:</span> '.$nome.'</td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td width="448"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">E-mail:</span> '.$email.'</td>
      </tr>
      <tr>
        <td height="22">&nbsp;</td>
        <td width="448"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">Telefone:</span>'.$telefone.'</td>
      </tr>
	  <tr>
        <td height="22">&nbsp;</td>
        <td width="448"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">Mensagem:</span>'.$mensagem.'</td>
      </tr>
	  <tr>
        <td width="20" height="22"></td>
        <td width="448"  valign="top"></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td><img src="http://agenciahauze.com.br/img/email/bottom.jpg" style="" ></td>
  </tr>
</table>';

$Mailer = new PHPMailer();
$Mailer->IsSMTP();

$Mailer->isHTML(true);
$Mailer->Charset = 'UTF-8';
$Mailer->SMTPAuth = true;
$Mailer->SMTPDebug = 0; 
$Mailer->SMTPSecure = 'tls';
$Mailer->Host = 'smtp.gmail.com';
$Mailer->Port = 587;
$Mailer->Username = 'naoresponda@homebrasil.com';
$Mailer->Password = '***Hfk48snd';
$Mailer->setFrom('naoresponda@homebrasil.com', utf8_decode('Agência Hauze '));

//$Mailer->From = 'naoresponda@homebrasil.com';
//$Mailer->FromName = utf8_decode('Planos de Saúde SulAmérica - Contato');
$Mailer->Subject = utf8_decode("Agência Hauze - Contato");
$Mailer->Body = $res_admin;
/*
$Mailer->Body = 'Enviado pelo Formulário de Contato
Nome: '.$nome.' 
E-mail: '.$email.' 
Celular: '.$telefone.' 
Assunto '.$assunto.' 
Mensagem: '.$mensagem.'
';*/

//$Mailer->AddBCC('fernando@homebrasil.com');
//$Mailer->AddCC('douglas@homebrasil.com');
$Mailer->AddAddress('allan@agenciahauze.com.br'); // Cópia Oculta
$Mailer->addAddress('allan@homebrasil.com', 'Allan Eduardo');
//$Mailer->AltBody = 'Mensagem em texto';
$Mailer->AddBCC("allan@homebrasil.com", "Allan Eduardo");
$Mailer->AddBCC("douglas@homebrasil.com", "Douglas Freitas");
$enviado = $Mailer->Send();

if ($enviado){
  echo "E-mail enviado com sucesso!";
}else{
  echo 'Erro do PHPMailer: ' . $Mailer->ErrorInfo;
}
?>
