<?php
include "../../config/conn.php";



// variaveis padroes

$id = filter_input(INPUT_POST, 'id');
$tipo = filter_input(INPUT_POST, 'tipo');

$inicioo = filter_input(INPUT_POST, 'inicio');
$terminoo = filter_input(INPUT_POST, 'termino');
$inicio = implode('-', array_reverse(explode('/', $inicioo)));
$termino = implode('-', array_reverse(explode('/', $terminoo)));


if($tipo == "") {
	print "<strong>Erro!</strong> Escolha a página a ser vinculada ao banner <script> $('input[name=tipo]').focus();</script>";
    die;
}
if($inicio > $termino) {
    print "<strong>Erro!</strong> A data do termino deve ser maior que a data inicial";
    die;
}

$status = filter_input(INPUT_POST, 'status');
if($status == "on"){
	$status = 1;
}else{
	$status = 0;
}

// inseri ou atualiza ideal_banners
if($id == ""){
    $insert = mysqli_query($conn, "INSERT INTO ideal_banners VALUES ('', '".$inicio."', '".$termino."', '".$status."', '', '".$tipo."', '".$modulobanner."')");    
}
else{  
    $insert = mysqli_query($conn, "UPDATE ideal_banners SET inicio='$inicio', termino='$termino', id_pagina='$tipo', status='$status' where id='$id'");
}

    $result = mysqli_query($conn, "SELECT * FROM ideal_banners ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_array($result);
    $MaxID = $row['id'];


    if($result){

        $sql = "SELECT idioma FROM ideal_idioma WHERE status = '1'";  
        $query = mysqli_query($conn, $sql); 
        
        $x = 0;
        $countfiles = count($_FILES['files']['name']);
        $upload_location = "../../../uploads/banners/";
        $files_arr = array();
        
        
        while($sql = mysqli_fetch_array($query)){

            $sku = $sql["idioma"];

            $titulodinamico = "titulo-$sku";
            $frasedinamico = "frase-$sku";
            $linkdinamico = "link-$sku";
            $botaodinamico = "botao-$sku";

            $titulo= filter_input(INPUT_POST, $titulodinamico);
            $frase = filter_input(INPUT_POST, $frasedinamico);
            $link = filter_input(INPUT_POST, $linkdinamico);
            $botao = filter_input(INPUT_POST, $botaodinamico);

            if($id == ""){
                $insert = mysqli_query($conn, "INSERT INTO ideal_banner_idioma VALUES ('".$MaxID."', '".$sku."', '".$titulo."', '".$frase."', '".$link."', '".$botao."','','','')");
            }else{
                $insert = mysqli_query($conn, "UPDATE ideal_banner_idioma SET titulo='$titulo', frase='$frase', link='$link', botao='$botao' where id_banner='$id' and idioma='$sku'");
                
                $MaxID = $id;
            }

            
            for($index = 0;$index < 3;$index++){
                
                
                
                
                $filename = $_FILES['files']['name'][$x];
                $valida = $_FILES['files']['name'][$x];

                // Get extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                $filename = md5(uniqid()) . '-' . time() . '.' . $ext;

                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");

                // Check extension
                if(in_array($ext, $valid_ext)){

                    // File path
                    $path = $upload_location.$filename;

                    // Upload file
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$x],$path)){
                        $files_arr[] = $path;
                    }
                }

                $tipoimg = ["desktop","tablet","mobile"];
                
                if($valida != ""){
                    $im1 = mysqli_query($conn, "UPDATE ideal_banner_idioma SET $tipoimg[$index]='$filename' where id_banner ='$MaxID' AND idioma = '$sku'");
                }
                
                $x++;
                
                
                
            }
        }
    }




mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua alteração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}