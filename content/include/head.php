<?php
ini_set('display_errors', 0 );
error_reporting(0);
if (!isset($_SESSION)) {
  session_start();
  $_SESSION['midia'] = $_GET["utm_medium"];
  $_SESSION['origin'] = $_GET["utm_source"];
}
echo $_SESSION['midia'];
include_once("admin-ideal/config/frontend.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $seo[0]["titulourl"]; ?></title>
<meta name="Description" content="<?php echo $seo[0]["descricao"]; ?>" />
<meta name="Keywords" content="<?php echo $seo[0]["palavras"]; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>

<!-- Global site CSS -->  

<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/slick/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/aos-master/dist/aos.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/nos.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/suporte-ams.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/erp-sap.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/solucao-comercio-externo.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>content/css/contato.css">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL; ?>favicon.png">
	

