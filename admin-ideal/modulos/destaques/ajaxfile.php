<?php
include "../../config/conn.php";

$id = filter_input(INPUT_POST, 'id');
$status = filter_input(INPUT_POST, 'status');
$imagem = filter_input(INPUT_POST, 'imagem');

if($status == "on"){
	$status = 1;
}else{
	$status = 0;
}



// inseri ou atualiza ideal_paginas
if($id == ""){
    $insert = mysqli_query($conn, "INSERT INTO ideal_destaques VALUES ('', '".$status."', '', '".$modulodestaque."')");  
}
else{  
    $insert = mysqli_query($conn, "UPDATE ideal_destaques SET status='$status'");
}

    $result = mysqli_query($conn, "SELECT * FROM ideal_destaques ORDER BY id_destaque DESC LIMIT 1");
    $row = mysqli_fetch_array($result);
    $MaxID = $row['id_destaque'];


    if($result){

        $sql = "SELECT idioma FROM ideal_idioma WHERE status = '1'";
        $query = mysqli_query($conn, $sql); 
        
        $x = 0;
        $countfiles = count($_FILES['files']['name']);
        $upload_location = "../../../uploads/destaques/";
        $files_arr = array();
        
        
        while($sql = mysqli_fetch_array($query)){

            $sku = $sql["idioma"];

            $titulodinamico = "titulo-$sku";
            $chamadadinamico = "chamada-$sku";
            $botaodinamico = "botao-$sku";
            $linkdinamico = "link-$sku";

            $titulo= filter_input(INPUT_POST, $titulodinamico);
            $chamada = filter_input(INPUT_POST, $chamadadinamico);
            $botao = filter_input(INPUT_POST, $botaodinamico);
            $link = filter_input(INPUT_POST, $linkdinamico);

            if($id == ""){
                $insert = mysqli_query($conn, "INSERT INTO ideal_destaques_idioma VALUES ('".$MaxID."', '".$sku."', '".$titulo."', '".$chamada."','".$botao."','".$link."','')");
            }else{
                
                $insert = mysqli_query($conn, "UPDATE ideal_destaques_idioma SET titulo='$titulo', chamada='$chamada', botao='$link', titulo='$link'  where id_destaque='$id' and idioma='$sku'");
                
                $MaxID = $id;
            }
            
            for($index = 0;$index < 1;$index++){
                
                
                
                
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

                //$tipoimg = ["desktop","tablet","mobile"];
                
                if($valida != ""){
                    $im1 = mysqli_query($conn, "UPDATE ideal_destaques_idioma SET imagem='$filename' where id_destaque ='$MaxID' AND idioma = '$sku'");
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

//echo json_encode($files_arr);
//die;