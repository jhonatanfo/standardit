<?php
session_cache_limiter(10);
session_start();
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Idealiz | Painel Administrativo</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">	
	
<link rel="stylesheet" href="content/css/bootstrap.min.css">
<link rel="stylesheet" href="content/slick/slick.css"/>
<link rel="stylesheet" href="content/css/all.css">
<link rel="stylesheet" href="content/css/styles.css">
<?php include_once("include/script.php"); ?>
</head>
<body>
<section class="login">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-7 d-none d-md-block">
				<div class="chamada-login">
					<i><img src="content/img/bg-centro-menu.png" width="70" height="42" alt=""/></i>
				  	<h2>Bem-vindo <br>ao seu painel <br>administrativo</h2>
					<p>Faça <strong>login</strong> para acessar sua conta</p>
					<p><?php
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset ($_SESSION['msg']);
						}
					?></p>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-5 bg-login">
				<div class="box-login">
					<div class="area-login">
						
						<div class="logo"><img src="content/img/logo-mobile.png" width="79" alt=""/></div>
						<form method="POST" action="valida.php">
						  <div class="form-group">
							<label>LOGIN</label>
							<input type="text" name="usuario" id="usuario" class="form-control">
						  </div>
							<div class="form-group">
							  <label>SENHA</label>
							  <input type="password" name="senha" id="password" class="form-control">
							</div>
							<p>Esqueceu sua senha? Lembre-me</p>
							<button type="submit" name="btnLogin" class="btn-acessar" id="acessar" value="acessar">Acessar</button>
						</form>
						
						<h2>Aqui as suas ideais evoluem em produtos</h2>
						<h3>Caso tenha alguma dúvida, entre em contato conosco através do e-mail: ola@idealiz.com.br</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		
<script type="text/javascript" src="content/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="content/js/bootstrap.min.js"></script>
<script type="text/javascript" src="content/slick/slick.min.js"></script>
	
<script type="text/javascript">	
$(document).ready(function(){
	
	$(document).on('click', 'a[href^="#"]', function (event) {

	
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 500);
	});
	
	
	var altura = $(window).height();
	$(".box-login").css("height",altura);
	
	$(window).resize(function() {
	  var altura = $(window).height();
	  $(".box-login").css("height",altura);
	});
});
</script>

</body>
</html>