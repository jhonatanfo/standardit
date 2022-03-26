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
						<h3><?php echo $banners[$index]["titulo"]; ?></h3>
						<h2><?php echo $banners[$index]["frase"]; ?></h2>
						<a href="<?= URL; ?><?php echo $banners[$index]["link"]; ?>"><?php echo $banners[$index]["botao"]; ?></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<section class="texto-produtos">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 texto-servicos" data-aos="fade-right" data-aos-delay="300">
				<h3><?= $seo[0]["titulo"]; ?></h3>
				<h2><?= $chamada[0]; ?></h2>
				<h4><?= $chamada[1]; ?></h4>
			</div>
			<div class="col-12 col-md-6 texto-servicos" data-aos="fade-right" data-aos-delay="300">
				<p><?= $seo[0]["texto"]; ?></p>
			</div>
		</div>
	</div>
</section>

<section class="numeros-produtos">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="list-numeros">
				<?php for($index = 0;$index < $totalblocos;$index++){ 
				if($blocos[$index]["id_categoria"] == $Arraycategorias[4]['id_categoria']){ 
				?>
				<div>
					<div class="item-numeros <?php if($index == "27"){ echo "active"; } ?> ">
						<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
						<h5><?= $blocos[$index]["titulo"]; ?></h5>
					</div>
				</div>
				<?php } } ?>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="slick-video">
	<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
	if($blocos[$index]["id_categoria"] == $Arraycategorias[3]['id_categoria']){ 
	?>
	<section class="video-tax text-center item-video" style="background: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>) no-repeat center / cover;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					
					
						<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
						<h2><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[1]; ?></h2>
						<a class="btn-play" data-video="<?= $blocos[$index]["video"]; ?>"><i></i><?= $blocos[$index]["titulo"]; ?></a>
					
				</div>
			</div>
		</div>
	</section>
	<?php }  $beneficios++; } ?>
</div>

<div class="beneficios modulos">
	<div class="container">
		<div class="row">
			<div class="col-12 titutlo-modulos">
				<h2>Módulos </h2>
				<p>Clique nos módulos para saber mais </p>
				<span>Módulos </span>
			</div>
		</div>
		<div class="row list-beneficios  justify-content-start">
			<div class="col-12 col-md-4 img-robo">
				<img src="content/img/robo-modulo.png" width="500"/>
			</div>
			<div class="col-12 col-md-8">
				<div class="row slick2">
				<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[1]['id_categoria']){ 
				?>
				<div class="col-3 item-beneficios "  style="<?php if($beneficios == 4){ echo 'margin-left: 25%'; } else if($beneficios == 7){ echo 'margin-left: 50%'; } else if($beneficios == 9){ echo 'margin-left: 75%'; } $beneficios++;?>">
					<div class="item-circ">
						<!-- div class="icons"><i class="icon-blocos" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i></div -->
						<a href="detalhe.php?id=<?=  $blocos[$index]["id_bloco"]; ?>" class="circ-item">
						<h2><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
						<p><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[1]; ?></p>
						<?php if($blocos[$index]["titulo"] != ""){ ?>
						<div class="btn"></div>
						<?php } ?>
						</a>
						<!-- h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3 -->
					</div>
				</div>
				<?php }   } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="beneficios">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<h2>Benefícios</h2>
				<p>Veja as principais características e benefícios que o taxForce pode te proporcionar</p>
				<span>Benefícios</span>
			</div>
		</div>
		<div class="row list-beneficios slick1">
			<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
				if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
			?>
			<div class="col-3 item-beneficios <?php if($beneficios == 0){ echo "offset-0 offset-md-6"; } else if($beneficios == 2){ echo "offset-0 offset-md-3"; } $beneficios++;?>">
				<div class="icons"><i class="icon-blocos" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i></div>
				<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
			</div>
			<?php }   } ?>
		</div>
	</div>
</div>

<section class="clientes text-center box-beneficios box-texforce no-desktop" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-12 offset-0 col-md-6 offset-md-3">
				<h2><?= $chamada[0]; ?></h2>
				<ul class="menu-clientes">
					<li><a class="btn-parceiros active"><?= $Arraycategorias[0]['nome']; ?></a></li>
                    <li><a class="btn-clientes"><?= $Arraycategorias[1]['nome']; ?></a></li>
				</ul>
			</div>
			<div class="col-12 offset-0 col-md-10 offset-md-1">

				<div class="cliente cliente-interna text-left item-beneficios">
                    <?php for($index = 0;$index < $totalblocos;$index++){ 
                        if($blocos[$index]["id_categoria"] == $Arraycategorias[1]['id_categoria']){
                    ?>
                    <div>
						<div class="descricao-beneficios">
							<div>
							<i class="icon-blocos" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i>
							<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0];  ?></h3>
							
							</div>
						</div>
					</div>
                     <?php } } ?>
				</div>
				<div class="parceiros parceiros-interna text-left item-beneficios">
                    <?php for($index = 0;$index < $totalblocos;$index++){ 
                        if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){
                    ?>
					<div>
						<div class="descricao-beneficios">
							<div>
							<i class="icon-blocos" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i>
							<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0];  ?></h3>
							
							</div>
						</div>
					</div>
                     <?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="resultado">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3>Veja os <strong>resultados</strong> que você perceberá ao utilizar o taxForce</h3>

				<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[2]['id_categoria']){ 
				?>			
				<div class="item-resultado">
					<?php if($index % 2 == 0){ ?>
						<span>
					<?php }  ?>
					<i><img src="uploads/blocos/<?= $blocos[$index]["imagem"]; ?>"/></i>
					<h4><?= $blocos[$index]["titulo"]; ?></h4>
					<p><?= $blocos[$index]["texto"]; ?></p>
					<?php if($index % 2 == 0){ ?>
						</span>
					<?php }  ?>
				</div>
				<?php } } ?>




	
				
				
			</div>
		</div>
	</div>
</section>

<section class="primeira">
	<div class="container">
		<div class="row">
			<div class="col-10 offset-1 col-md-6 offset-md-3">
				<h3>taxForce: a solução mais <b> premiada do mercado <img src="content/img/foguete.png"/></b> </h3>
				<p>Ganhadores do prêmio Thomson Reuters na Accelerator Day 2019, 9ª colocada em Inovação em 2020 e 4ª colocada em 2021 do ranking da 100 Open Startups. </p>
			</div>
			<div class="col-12 col-md-6 offset-md-3 text-center">
				<img class="logo-premio" src="content/img/thomson.png"/>
				<img class="logo-premio" src="content/img/legaltechs.png" />
				<img class="logo-premio" src="content/img/legaltechs2021.png" />
			</div>
		</div>
	</div>
</section>

<section class="box-porque-cotratar">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 porque-texto">
				<h2>Elevamos a performance dos processos fiscais gerando impacto na vida das <b>empresas, pessoas</b> e do <b>mundo.</b> </h2>
				<h4>taxFORCE, definitivamente a solução de tax transformation mais completa do BRASIL.</h4>
			</div>
			<div class="col-12 col-md-6">
				<img src="content/img/robo-taxforce.png" width="100%">
				<span></span>
			</div>
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
		$(".slick1").addClass("slick-beneficios");
		$(".slick2").addClass("slick-modulos");
		$('.slick-beneficios').slick({
			infinite: true,
			dots: true,
			speed: 300,
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1
		});
		$('.slick-modulos').slick({
			infinite: true,
			dots: true,
			speed: 300,
			arrows: false,
			slidesToShow: 2,
			slidesToScroll: 1,
			
		});
    }

	$('.numeros-produtos .item-numeros').hover(function() {
		$('.numeros-produtos .item-numeros').removeClass("active");
		$(this).addClass("active");
	});

	$('.slick-video').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 4000,
	  infinite: true,
	  speed: 800,
	  dots: false,
	  arrows: false,
	});
		
	$('.list-numeros').slick({
	  dots: false,
	  arrows: false,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 5,
	  slidesToScroll: 3,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
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
			dots: true,
			slidesToScroll: 2
		  }
		}
	  ]
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