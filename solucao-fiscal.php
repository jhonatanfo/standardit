<?php
session_start();
if(isset($_POST['token'])){
    if($_SESSION['token'] == $_POST['token']){
        //post valido
    }
}else{
   $_SESSION['token'] = md5(time());
   //adicione o token em um input hidden
}
?>
<?php include "content/include/head.php"; ?>	
<?php include "content/include/tags.php"; ?>
</head>
<body>
<?php include "content/include/menu.php"; ?>	

<?php for($index = 0;$index < $totalbanners;$index++){ ?>
<section class="banner-produto text-left" style="background: #E5E5E5 url(uploads/banners/<?php echo $banners[$index]["desktop"]; ?>) no-repeat center bottom / cover;">
	<div class="container">
		<div class="row">
			<div class="col-12"  data-aos="fade-down" data-aos-delay="300">
				<div class="texto-sobre">
                   
                    <div>
						<h6><?php echo $banners[$index]["titulo"]; ?></h6>
						<h2><?php echo $banners[$index]["frase"]; ?></h2>
						<a href="<?= URL; ?><?php echo $banners[$index]["link"]; ?>"><?php echo $banners[$index]["botao"]; ?></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<section class="sobre tipo1">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 sobre-img">
				<img src="<?php echo URL; ?>/uploads/paginas/<?php echo $seo[0]["imagem"]; ?>"/>
			</div>
			<div class="col-12 col-md-6">
				<i><img src="<?php echo URL; ?>/content/img/icon-solucoes.svg"/></i>
				<h4><?=  $seo[0]["titulo"]; ?></h4>
				<h3><?= $chamada[0]; ?></h3>
				<?= $seo[0]["texto"]; ?>
			</div>
		</div>
	</div>
</section>

<section class="frase">Conheça os módulos do ONESOURCE Tax One:</section>

<section class="menu-modulos">
	<div class="row">
		<div class="col-12">
			<ul class="slider-nav">
				<?php  for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
				?>
				<li><a><?= $blocos[$index]["titulo"]; ?></a></li>
			<?php } } ?>
			</ul>
		</div>
	</div>
</section>

<section class="view-modulos">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="slider-for">
					<?php for($index = 0;$index < $totalblocos;$index++){ 
						if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
					?>
					<div class="box-modulos">
						<div class="modulos-for-img" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></div>
						<div class="modulos-for-text">
							
							<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
							<div class="scroll">
							<p><?= $blocos[$index]["texto"]; ?></p>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="vantagens">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12"><h3>Veja todas as vantagens de estar na nuvem</h3></div>	
			<div class="col-12 list-vantagens slick1">
				<?php  for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[1]['id_categoria']){ 
				?>
				<div class="item-vantagens">
					<div class="box-vantagens">
						<i style="background-image: url(uploads/blocos/<?php echo $blocos[$index]["imagem"]; ?>);"></i>
						<h5><?= $blocos[$index]["titulo"]; ?></h5>
						<p><?= $blocos[$index]["texto"]; ?></p>
					</div>
				</div>
				<?php } } ?>
			</div>	
		</div>	
	</div>						
</section>

<?php  for($index = 0;$index < $totalblocos;$index++){ 
		if($blocos[$index]["id_categoria"] == $Arraycategorias[2]['id_categoria']){ 
	?>
<section class="afinal" style="background-image: url(uploads/blocos/<?php echo $blocos[$index]["imagem"]; ?>);">

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3><?= $blocos[$index]["titulo"]; ?></h3>
				<h2><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h2>
				<p><?= $blocos[$index]["texto"]; ?></p>
			</div>	
		</div>	
	</div>	
						
</section>
<?php } } ?>

<section class="parceria">
	<?php  for($index = 0;$index < $totalblocos;$index++){ 
		if($blocos[$index]["id_categoria"] == $Arraycategorias[3]['id_categoria']){ 
	?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p><?= $blocos[$index]["texto"]; ?></p>
			</div>	
		</div>	
	</div>
	<?php } } ?>				
</section>


<section class="bg-solucao-comercio-servicos">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>
					Serviços especializados nas Soluções<br>
					<b>Thomson Reuters</b>
				</h3>
			</div>
		</div>

		<div class="row">

		<?php  for($index = 0;$index < $totalblocos;$index++){ 
			if($blocos[$index]["id_categoria"] == $Arraycategorias[4]['id_categoria']){ 
		?>

			<div class="col-md-6">
				<div class="solucao-comercio-servicos <?php if($index ==19){ echo "active"; } ?>">
					<span></span>
					<h2><?= $blocos[$index]["titulo"]; ?></h2>
					<ul>
						<li>
							<?= $blocos[$index]["texto"]; ?>
						</li>
					</ul>
				</div>
			</div>


		<?php } } ?>

		</div>
	</div>
</section>

<section class="form-interno">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<h2>Otimize processos <strong>e foque no que realmente importa!</strong></h2>
				<p>entre em contato</p>
			</div>
			<div class="col-12 col-md-6">
				<form class="form-servicos box-formulario">
					<input type="hidden" name="token"  id="token" value="<?= $_SESSION['token']; ?>">
					<input type="hidden" name="servico"  id="servico" value="RPAFiscal">
					<div class="form-group">
						<input type="email" class="form-control" id="nome" placeholder="Digite o seu nome">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" placeholder="E-mail corporativo">
					</div>
					<div class="form-group">
						<input type="text" id="telefone" class="form-control" placeholder="Telefone">
					</div>
					<div class="form-group">
						<textarea class="form-control" id="mensagem" rows="3" placeholder="Mensagem"></textarea>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<div class="erro"></div>
							<button  type="button" class="btn-enviar" id="enviar">comece agora</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="agende">
	<div class="container">	
		<div class="row">
			<div class="col-12">
				<h2>Nosso foco <strong>é o seu foco</strong></h2>
				<a href="contato">Agende uma demonstração </a>
			</div>
		</div>
	</div>
</section>

<?php include ('content/include/social.php'); ?>	
<?php include ('content/include/rodape.php'); ?>	

<div class="backdrop"></div>

<div class="modal-video">
	<div class="bg-ripple">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
	<a class="fechar"></a>
	<div class="incluir-video"></div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>content/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/aos-master/dist/aos.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/js/action.js"></script>
		
<script type="text/javascript">	
	
$(document).ready(function(){

	var largura = $(document).width();
	if(largura < 800){ 
		$(".slick1").addClass("slick-vantagens");
		$('.slick-vantagens').slick({
			infinite: true,
			dots: false,
			speed: 300,
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1
		});
    }

	$('.solucao-comercio-servicos').hover(function() {
		$('.solucao-comercio-servicos').removeClass("active");
		$(this).addClass("active");
	});
	

	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		slidesToShow: 8,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			arrows: false,
			dots: false
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 2,
			dots: false,
			arrows: false,
			slidesToScroll: 2
		  }
		}
	  ]
	});

	$('.modulos-for').on('mouseenter', function(){
		$('.modulos-nav').slick('slickPause');
	});
	$('.modulos-for').on('mouseleave', function(){
		$('.modulos-nav').slick('slickPlay');
	});


	$('#enviar').on('click', function() {	
		var id = "<?php echo $_SESSION['origin'] ?>";
		var midiaid = "<?php echo $_SESSION['midia'] ?>";	
		var token = $("#token");
		var tokenPost = token.val();
		var nome = $("#nome");
		var nomePost = nome.val();
		var email = $("#email");
		var emailPost = email.val();
		var telefone = $("#telefone");
		var telefonePost = telefone.val();
		var mensagem = $("#mensagem");
		var mensagemPost = mensagem.val();
		var servico = $("#servico");
		var servicoPost = servico.val();
		var origemPost = id;
		var midiaPost = midiaid;
		
		if(origemPost == ""){
			origemPost = "Direto";
		}
		if(midiaPost == ""){
			midiaPost = "Sem mídia";
		}

		$(".erro").html("Carregando...").css('padding', "13px");

		$.post("<?php echo URL; ?>enviar.php", {
			nome: nomePost,
			email: emailPost,
			telefone: telefonePost,
			mensagem: mensagemPost,
			origem: origemPost,
			midia: midiaPost,
			servico: servicoPost,
			token: tokenPost
		},

		function(resposta) {
			if (resposta == "nome") {
				$(".erro").html("Preencha o Nome!");
				$("#nome").css('border-color', "#1ab4e4");
				$("#nome").focus();
				return false;
			} else {
				$("#nome").css('color', "#8b8b8b");
			}
			if (resposta == "email") {
				$(".erro").html("O e-mail invalido!");
				$("#email").css('border-color', "#1ab4e4");
				$("#email").focus();
				return false;
			} else {
				$("#email").css('color', "#8b8b8b");
			}
			if (resposta == "corporativo") {
				$(".erro").html("O e-mail corporativo e invalido!");
				$("#email").css('border-color', "#1ab4e4");
				$("#email").focus();
				return false;
			} else {
				$("#email").css('border-color', "#d0d0d0");
			}
			if (resposta == "telefone") {
				$(".erro").html("Preencha o telefone!");
				$("#telefone").css('border-color', "#1ab4e4");
				$("#telefone").focus();
				return false;
			} else {
				$("#telefone").css('color', "#8b8b8b");
			}
			$("#enviar").attr("disabled", true);
			$(".erro").html("Enviando...");
			$(".erro").html(resposta);
			setTimeout(function(){ 
				$(".erro").html("");
				$("#mensagem").val("");
				$("#telefone").val("");
				$("#nome").val("");
				$("#email").val("");
				$("#enviar").attr("disabled", false);
			}, 2000);
		}, "html");
	});
});

AOS.init();

</script>

</body>
</html>