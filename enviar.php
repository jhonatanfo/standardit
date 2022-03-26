<?php 
session_start();
if(isset($_POST['token'])){
    if($_SESSION['token'] == $_POST['token']){
    
    ini_set('display_errors', 0 );
    error_reporting(0);
    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    date_default_timezone_set('Etc/UTC');
    require 'content/PHPMailer-master/PHPMailerAutoload.php';

    $aux1 = chr(13);
    $aux2 = chr(10);
    $regex= array("/(B|b|)(C|c)c:/","/$aux1/","/$aux2/","/ /","/ /");

    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
    $mensagem = filter_var($_POST['mensagem'], FILTER_SANITIZE_STRING);
    $origem = filter_var($_POST['origem'], FILTER_SANITIZE_STRING);
    $midia = filter_var($_POST['midia'], FILTER_SANITIZE_STRING);
    $servico = filter_var($_POST['servico'], FILTER_SANITIZE_STRING);


    $nome = preg_replace($regex," ",$nome);
    $email = preg_replace($regex," ",$email);
    $telefone = preg_replace($regex," ",$telefone);
    $mensagem = preg_replace($regex," ",$mensagem);

    function VerificarEndereçoEmail($endereço)  
    {  
      $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
      if(preg_match($Sintaxe,$endereço))  {
        echo "email"; die;
      } 
      else { 
        
        
      }
    }


    if (empty($nome)){
      echo "nome";
      die;
    }
    if (empty($email)){
      echo "email";
      die;
    }else{
      if (strpos($email, 'gmail') !== false || strpos($email, 'yahoo') !== false || strpos($email, 'outlook') !== false || strpos($email, 'uol') !== false || strpos($email, 'hotmail') !== false || strpos($email, 'terra') !== false) {
        echo 'corporativo';
        die;
      }
      else{
        VerificarEndereçoEmail($email);
      }
    }
    
    if (empty($telefone)){
      echo "telefone";
      die;
    }
    if (empty($servico)){
      $servico = "Contato";
    }

    $res_admin = '<table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="https://gomara.tech/new-standardit/content/img/top.jpg"></td>
      </tr>
      <tr>
        <td><table width="468" height="89" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left: 1px solid #CDCDCD; border-right: 1px solid #CDCDCD; ">
          <tr>
            <td width="20" height="22"></td>
            <td width="448"  valign="top"></td>
          </tr>
          <tr>
            <td width="20" height="22">&nbsp;</td>
            <td width="448" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">Nome:</span> '.$nome.'</td>
          </tr>
          <tr>
            <td height="23">&nbsp;</td>
            <td width="448" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">E-mail:</span> '.$email.'</td>
          </tr>
          <tr>
            <td height="22">&nbsp;</td>
            <td width="448"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">Telefone:</span>'.$telefone.'</td>
          </tr>
          <tr>
            <td height="22">&nbsp;</td>
            <td width="448" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #253e66;"><span style="color: #05568f;">Mensagem:</span>'.$mensagem.'</td>
          </tr>
          <tr>
            <td valign="top" height="22">&nbsp;</td>
            <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">Página:</span> '.$servico.'</td>
          </tr>
          <tr>
            <td valign="top" height="22">&nbsp;</td>
            <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">Origem:</span> '.$origem.'</td>
          </tr>
          <tr>
            <td valign="top" height="22">&nbsp;</td>
            <td width="394"  valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size: 12px; color: #4a6e8c;"><span style="color: #183b58;">Média:</span> '.$midia.'</td>
          </tr>
          <tr>
            <td width="20" height="22"></td>
            <td width="448"  valign="top"></td>
          </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td><img src="https://gomara.tech/new-standardit/content/img/bottom.jpg"></td>
      </tr>
    </table>';

    $Mailer = new PHPMailer();
    $Mailer->IsSMTP();

    $Mailer->isHTML(true);
    $Mailer->Charset = 'UTF-8';
    $Mailer->SMTPAuth = true;
    $Mailer->SMTPDebug = 0; 
    $Mailer->SMTPSecure = 'ssl';
    $Mailer->Host = 'email-ssl.com.br';
    $Mailer->Port = 465;
    $Mailer->Username = 'mkt@gomara.tech';
    $Mailer->Password = 'Marketing2@20';
    $Mailer->setFrom('contato@gomara.tech', utf8_decode('StandardIT '));
    $Mailer->Subject = utf8_decode("StandardIT  - Formulário ($servico)");
    $Mailer->Body = $res_admin;
    $Mailer->addAddress("ola@idealiz.com.br", "Agencia Idealiz");
    //$Mailer->addAddress('contato@gomara.tech', 'gomara smart processes');
    //$Mailer->AddBCC('rodrigo@gomara.tech', 'Rodrigo Cruz');
    $Mailer->AddBCC("ola@idealiz.com.br", "Agencia Idealiz");
    $enviado = $Mailer->Send();

    if ($enviado){
      echo "E-mail enviado com sucesso!";
      include_once("admin-ideal/config/conn.php");
      $data = date('Y-m-d');
      $insert = mysqli_query($conn, "INSERT INTO ideal_formulario VALUES ('', '".$nome."', '".$telefone."', '".$email."', '".$mensagem."', '".$origem."', '".$data."', '".$servico."', '".$midia."')");


    }else{
      echo 'Erro do PHPMailer: ' . $Mailer->ErrorInfo;
    }
}
}else{
   echo "Tentativa de invação"; 
}
?>
