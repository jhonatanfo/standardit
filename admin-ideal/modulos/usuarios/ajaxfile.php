<?php
include "../../config/conn.php";

$id = "";
$nome = utf8_decode(filter_input(INPUT_POST, 'nome'));
$email = utf8_decode(filter_input(INPUT_POST, 'email'));
$usuario = utf8_decode(filter_input(INPUT_POST, 'usuario'));
$senhapadrao = utf8_decode(filter_input(INPUT_POST, 'senha'));
$tipo = utf8_decode(filter_input(INPUT_POST, 'tipo'));
$status = filter_input(INPUT_POST, 'status');

if($nome == "") {
	print "<strong>Erro!</strong> " . mysqli_error($conn) . "Preencha o campo nome <script> $('input[name=nome]').focus();</script>";
    die;
}



if($status == "on"){
	$status = 1;
}else{
	$status = 0;
}

$senha = password_hash($senhapadrao, PASSWORD_DEFAULT);
// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "../../../uploads/usuarios/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

	// File name
	$filename = $_FILES['files']['name'][$index];
	
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
		if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
			$files_arr[] = $path;
		}
    }
    
	if($index == 0){
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ext == ""){
            $arquivo1 = "";
        }else{
            $arquivo1 = $filename;
        }
    
    }
    if($index == 1){
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ext == ""){
            $arquivo2 = "";
        }else{
            $arquivo2 = $filename;
        }
    
    }
			   	
}



if($id == ""){
    $insert = mysqli_query($conn, "INSERT INTO ideal_usuario VALUES ('', '".$nome."', '".$email."', '".$usuario."', '".$senha."', '".$status."', '".$arquivo1."','".$tipo."')");

}else{
    
    $insert = mysqli_query($conn, "UPDATE ideal_usuario SET nome='$nome', email='$email', usuario='$usuario', senha='$senha', tipo='$tipo',  status='$status', img='$arquivo1'");
}

mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Seu cadastro foi salvo";
    include "novo-usuario.php";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

//echo json_encode($files_arr);
//die;