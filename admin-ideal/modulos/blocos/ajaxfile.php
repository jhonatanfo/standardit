<?php
include "../../config/conn.php";


// Pegar as variareis enviadas pelo formulários.
$id = filter_input(INPUT_POST, 'id');
$categoria = filter_input(INPUT_POST, 'tipo');

// Validações
if($categoria == "") {
	print "<strong>Erro!</strong> Escolha uma categoria <script> $('input[name=tipo]').focus();</script>"; die;
}

// Conversão para 0 ou 1 do campo status 
$status = 0;
$status = filter_input(INPUT_POST, 'status');
if($status == "on"){
	$status = 1;
}else{
	$status = 0;
}

// inserir ou atualiza ideal_paginas, verificando pelo id existente ou não
if($id == ""){
    $insert = mysqli_query($conn, "INSERT INTO ideal_blocos VALUES ('', '".$status."', '', '".$categoria."')");  
}
else{  
    $insert = mysqli_query($conn, "UPDATE ideal_blocos SET status='$status', id_categoria='$categoria' where id_bloco = '$id'");
}


    // Pegar o último id cadastrado
    $result = mysqli_query($conn, "SELECT * FROM ideal_blocos ORDER BY id_bloco DESC LIMIT 1");
    $row = mysqli_fetch_array($result);
    $MaxID = $row['id_bloco'];


    // Consultar idiomas ativos
    if($result){

        $sql = "SELECT idioma FROM ideal_idioma WHERE status = '1'";   
        $query = mysqli_query($conn, $sql); 
        
        $x = 0;
        $countfiles = count($_FILES['files']['name']);
        $upload_location = "../../../uploads/blocos/";
        $files_arr = array();
        
        
        // Salvar campos conrreppndentes a quantidade de idiomas ativos
        while($sql = mysqli_fetch_array($query)){

            $sku = $sql["idioma"];
            $chamadadinamico = "chamada-$sku";
            $titulodinamico = "titulo-$sku";
            $textodinamico = "content-$sku";
            $videodinamico = "video";

            $titulo= filter_input(INPUT_POST, $titulodinamico);
            $texto = filter_input(INPUT_POST, $textodinamico);
            $video = filter_input(INPUT_POST, $videodinamico);
            
            $chamada = $_POST[$chamadadinamico];
            
            $chamada = serialize( $chamada );

            if($id == ""){
                $insert = mysqli_query($conn, "INSERT INTO ideal_blocos_idioma VALUES ('".$MaxID."', '".$sku."', '".$chamada."', '".$titulo."', '".$texto."', '".$video."','' )");
            }else{
                
                $insert = mysqli_query($conn, "UPDATE ideal_blocos_idioma SET chamada='$chamada', titulo='$titulo', texto='$texto', video='$video' where id_bloco='$id' and idioma='$sku'");
                
                $MaxID = $id;
            }

            // Upload de imagens conforme os idiomas ativos
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
                    $im1 = mysqli_query($conn, "UPDATE ideal_blocos_idioma SET imagem='$filename' where id_bloco ='$MaxID' AND idioma = '$sku'");
                }
                $x++;
            }
        }
    }

// Validação Final
mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua alteração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

//echo json_encode($files_arr);
//die;