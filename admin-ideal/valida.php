<?php
session_start();
include_once("config/conn.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$user = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
    $usuario = preg_replace('/[^[:alpha:]_]/', '',$user);
    
	//echo "$usuario - $senha";
   // die;
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
     
        
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id_usuario, id, nome, email, senha FROM ideal_usuario WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
                
                $_SESSION['donoDaSessao'] = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
                
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
                $_SESSION['tipo'] = $row_usuario['id_usuario'];
                
				header("Location: dashboard.php");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: login.php");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: login.php");
}
