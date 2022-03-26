<?php
include "../../config/conn.php";


// Pegar as variareis enviadas pelo formulários.
$id = filter_input(INPUT_POST, 'id');
$categoria = filter_input(INPUT_POST, 'tipo');
$nome = filter_input(INPUT_POST, 'nome');
$titulourl = filter_input(INPUT_POST, 'titulourl');
$descricao = filter_input(INPUT_POST, 'descricao');
$palavras =  filter_input(INPUT_POST, 'palavras');
$nome = filter_input(INPUT_POST, 'nome');
$url = filter_input(INPUT_POST, 'url');
$chamada = filter_input(INPUT_POST, 'chamada');
$categoria = filter_input(INPUT_POST, 'tipo');

// Validações
if($categoria == "") {
	print "<strong>Erro!</strong> Escolha um tipo de página <script> $('input[name=tipo]').focus();</script>"; die;
}
if($nome == "") {
	print "<strong>Erro!</strong> Preencha o nome da página <script> $('input[name=nome]').focus();</script>"; die;
}

if($titulourl != ""){
    $contString = strlen($titulourl);
    if($contString > 40){ print "<strong>Erro!</strong> Seu título tem que ter no máximo 40 caracteres! <script> $('input[name=titulourl]').focus();</script>"; die; }
}
if($descricao != ""){
    $contString = strlen($descricao);
    if($contString > 158){ print "<strong>Erro!</strong> Sua descrição tem que ter no máximo 158 caracteres !<script> $('input[name=descricao]').focus();</script>"; die; }
}
if($palavras != ""){
    $contString = strlen($palavras);
    if($contString > 40){ print "<strong>Erro!</strong> Suas palavras chaves tem que ter no máximo 40 caracteres!<script> $('input[name=palavras]').focus();</script>"; die; }
}

// Conversão para 0 ou 1 do campo status 
$status = filter_input(INPUT_POST, 'status');
if($status == "on"){
	$status = 1;
}else{
	$status = 0;
}


// inserir ou atualiza ideal_paginas, verificando pelo id existente ou não
if($id == ""){
    $insert = mysqli_query($conn, "INSERT INTO ideal_paginas VALUES ('', '".$titulourl."', '".$descricao."', '".$palavras."', '".$nome."', '".$url."','".$status."','".$modulopaginas."','".$categoria."','')");  
}
else{  
    $insert = mysqli_query($conn, "UPDATE ideal_paginas SET titulourl='$titulourl', descricao='$descricao', palavras='$palavras', nome='$nome', url='$url', status='$status', id_categoria='$categoria' where id_pagina='$id'");
}


    // Pegar o último id cadastrado
    $result = mysqli_query($conn, "SELECT * FROM ideal_paginas ORDER BY id_pagina DESC LIMIT 1");
    $row = mysqli_fetch_array($result);
    $MaxID = $row['id_pagina'];


    // Consultar idiomas ativos
    if($result){

        $sql = "SELECT idioma FROM ideal_idioma WHERE status = '1'";   
        $query = mysqli_query($conn, $sql); 
        
        $x = 0;
        $countfiles = count($_FILES['files']['name']);
        $upload_location = "../../../uploads/paginas/";
        $files_arr = array();
        
        
        // Salvar campos conrreppndentes a quantidade de idiomas ativos
        while($sql = mysqli_fetch_array($query)){

            $sku = $sql["idioma"];
            $titulodinamico = "titulo-$sku";
            $chamadadinamico = "chamada-$sku";
            $textodinamico = "content-$sku";
            
            $titulo= filter_input(INPUT_POST, $titulodinamico);
            $chamada = $_POST[$chamadadinamico];
            $texto = filter_input(INPUT_POST, $textodinamico);
            
            $chamada = serialize( $chamada );

            if($id == ""){
                $insert = mysqli_query($conn, "INSERT INTO ideal_paginas_idioma VALUES ('".$MaxID."', '".$sku."', '".$titulo."', '".$chamada."','".$texto."','')");
            }else{
                
                $insert = mysqli_query($conn, "UPDATE ideal_paginas_idioma SET titulo='$titulo', chamada='$chamada', texto='$texto'  where id_pagina='$id' and idioma='$sku'");
                
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
                    $im1 = mysqli_query($conn, "UPDATE ideal_paginas_idioma SET imagem='$filename' where id_pagina ='$MaxID' AND idioma = '$sku'");
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