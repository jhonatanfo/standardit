<?php
include "../../config/conn.php";
  
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$link = $_POST['link'];
$sub = $_POST['sub']; 

if($sub == ""){
    if($link == "true"){
        $insert = mysqli_query($conn, "UPDATE ideal_menu SET link='$valor' where nome = $nome and sub = 'false'");
        sleep(2);
    } 
    if ($link == "false") {        
        
     
        $sql = "SELECT * FROM ideal_menu where nome = $nome"; 
		$query = mysqli_query($conn, $sql);
        $sql = mysqli_fetch_array($query);
        $consulta = $sql["nome"]; 
        
        if($consulta == ""){
            $insert = mysqli_query($conn, "INSERT INTO ideal_menu(nome, texto, sub) VALUES('". $nome ."', '". $valor ."','false')"); 
             sleep(2);
       
        }
        
     }
}
if($sub != ""){
    if($link == "true"){
        $insert = mysqli_query($conn, "UPDATE ideal_menu SET link='$valor' where nome = $nome");
        sleep(2);
    } 
    if ($link == "false") {        
        
     
        $sql = "SELECT * FROM ideal_menu where nome = $nome and sub = '". $sub ."'"; 
		$query = mysqli_query($conn, $sql);
        $sql = mysqli_fetch_array($query);
        $consulta = $sql["nome"]; 
        
        if($consulta == ""){
            $insert = mysqli_query($conn, "INSERT INTO ideal_menu(nome, texto, sub) VALUES('". $nome ."', '". $valor ."','". $sub ."')"); 
            sleep(2);
       
        }
        
     }
}


mysqli_close($conn);
if($insert) {
	print "<strong>Parabéns!</strong> Sua alteração foi salva";
}else {
	print "<strong>Erro!</strong> " . mysqli_error($conn);
}

?>
