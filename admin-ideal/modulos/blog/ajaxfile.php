<?php
include "../../config/conn.php";

$id = filter_input(INPUT_POST, 'id');
$status = filter_input(INPUT_POST, 'status');
$imagem = filter_input(INPUT_POST, 'imagem');
$categoria = filter_input(INPUT_POST, 'categoria');
$destaque = filter_input(INPUT_POST, 'destaque');

$data = filter_input(INPUT_POST, 'data');
$data = implode('-', array_reverse(explode('/', $data)));

if($data == "") {
    print "<strong>Erro!</strong> Preencha o campo data";
    die;
}

if($status == "on"){
	$status = 1;
}else{
	$status = 0;
}
if($destaque == ""){
	$destaque = 0;
}


// inseri ou atualiza ideal_paginas
if($id == ""){
    $insert = mysqli_query($conn, "INSERT INTO ideal_blog VALUES ('', '".$status."', '', '".$data."', '".$categoria."', '".$moduloblog."', '".$destaque."')");  
}
else{  
    $insert = mysqli_query($conn, "UPDATE ideal_blog SET status='$status', data='$data', id_categoria='$categoria', destaque='$destaque' where id_blog='$id'");
}

    $result = mysqli_query($conn, "SELECT * FROM ideal_blog ORDER BY id_blog DESC LIMIT 1");
    $row = mysqli_fetch_array($result);
    $MaxID = $row['id_blog'];


    if($result){

        $sql = "SELECT idioma FROM ideal_idioma WHERE status = '1'";
        $query = mysqli_query($conn, $sql); 
        
        $x = 0;
        $countfiles = count($_FILES['files']['name']);
        $upload_location = "../../../uploads/blog/";
        $files_arr = array();
        
        
        while($sql = mysqli_fetch_array($query)){

            $sku = $sql["idioma"];

            $titulodinamico = "titulo-$sku";
            $chamadadinamico = "chamada-$sku";
            $textodinamico = "content-$sku";
            $linkdinamico = "link-$sku";

            $titulo= filter_input(INPUT_POST, $titulodinamico);
            $chamada = filter_input(INPUT_POST, $chamadadinamico);
            $texto = filter_input(INPUT_POST, $textodinamico);
            $link = filter_input(INPUT_POST, $linkdinamico);

            if($id == ""){
                $insert = mysqli_query($conn, "INSERT INTO ideal_blog_idioma VALUES ('".$MaxID."', '".$sku."', '".$titulo."', '".$chamada."','".$texto."','".$link."','')");
            }else{
                
                $insert = mysqli_query($conn, "UPDATE ideal_blog_idioma SET titulo='$titulo', chamada='$chamada', texto='$texto', link='$link'  where id_blog='$id' and idioma='$sku'");
                
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
                    $im1 = mysqli_query($conn, "UPDATE ideal_blog_idioma SET imagem='$filename' where id_blog ='$MaxID' AND idioma = '$sku'");
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