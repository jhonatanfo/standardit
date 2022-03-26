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

<section class="texto-produtos" id="bob">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 texto-servicos" data-aos="fade-right" data-aos-delay="300">
				<h3><?= $seo[0]["titulo"]; ?></h3>
				<h2><?= $chamada[0]; ?></h2>
			</div>
			<div class="col-12 col-md-6 texto-servicos" data-aos="fade-right" data-aos-delay="300">
				<p><?= $seo[0]["texto"]; ?></p>
			</div>
		</div>
	</div>
</section>	

<section class="videos-produtos">
    <div class="container">
		<div class="row">
			<div class="col-12">
                <div class="slick-videos-produtos">
					<?php  for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
					?>
                    <div class="item-videos-produtos" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"><a class="btn-play" data-video="<?= $blocos[$index]["video"]; ?>"><i></i></a></div>
					<?php }  } ?>
                </div>
            </div>
        </div>
    </div>
</section>	

<section class="banner-inteligencia">
	<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
	if($blocos[$index]["id_categoria"] == $Arraycategorias[1]['id_categoria']){ 
	?>
    <div class="container">
		<div class="row">
			<div class="col-12 col-md-6 text-center" data-aos="fade-right" data-aos-delay="300">
                <img src="<?php echo URL; ?>uploads/blocos/<?= $blocos[$index]["imagem"]; ?>" width="100%" alt=""/>
            </div>
            <div class="col-12 col-md-6 texto-servicos" data-aos="fade-left" data-aos-delay="300">
                <h2><?= $blocos[$index]["titulo"]; ?></h2>
                <h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
            </div>
        </div>
    </div>
	<?php } } ?>
</section>

<section class="numeros-bob">
	<div class="container">
		<div class="row">
			<div class="col-12" >
				<div class="list-numeros">
					<?php for($index = 0;$index < $totalblocos;$index++){ 
						if($blocos[$index]["id_categoria"] == $Arraycategorias[8]['id_categoria']){ 
					?>
                    <div class="item-numeros <?php  if($index == "35"){ echo "active"; } ?>"   data-aos="fade-up" data-aos-delay="100">
                        <div class="num">
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

<section class="jornada">
	<div class="container">
		<div class="row">
			<div class="offset-0 col-12 offset-md-3 col-md-6" data-aos="fade-in" data-aos-delay="300">
				<h2>comece agora a sua jornada com o rpa bob</h2>
				<h5>navegue no menu abaixo </h5>
			</div>
		</div>
	</div>
</section>

<section class="plataforma-bob">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6" data-aos="fade-right" data-aos-delay="300" >
				<ul class="plataforma-nav">
					<?php $plataforma = 1; for($index = 0;$index < $totalblocos;$index++){ 
						if($blocos[$index]["id_categoria"] == $Arraycategorias[2]['id_categoria']){ 
					?>
					<li><a><b>0<?= $plataforma; $plataforma++;?></b> <?= $blocos[$index]["titulo"]; ?></a></li>
					<?php }   } ?>
				</ul>
			</div>
			<div class="col-12 col-md-6" data-aos="fade-left" data-aos-delay="300">
				<div class="plataformas-itens plataforma-for">
					<?php $plataforma = 1; for($index = 0;$index < $totalblocos;$index++){ 
						if($blocos[$index]["id_categoria"] == $Arraycategorias[2]['id_categoria']){ 
					?>
					<div class="plataformas-item">
						<h3>0<?= $plataforma; $plataforma++;?></h3>
						<h2><?= $blocos[$index]["titulo"]; ?> </h2>
						<p><?= $blocos[$index]["texto"]; ?> </a>
					</div>
					<?php }   } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="setores">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <h2>Quais departamentos podem ser automatizados pelo RPA Bob?</h2>
                <p>Não existe restrição! Se você possui um processo recorrente na sua empresa, você pode automatizá-lo! Confira alguns exemplos de setores:</p>
            </div>
            <ul>
				<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
				if($blocos[$index]["id_categoria"] == $Arraycategorias[3]['id_categoria']){ 
			?>
                <li>
					<i><img src="uploads/blocos/<?= $blocos[$index]["imagem"]; ?>" width="100%" alt=""/></i>
					<h4><?= $blocos[$index]["titulo"]; ?></h4>
					<p><?= $blocos[$index]["texto"]; ?></p>
				</li>

			<?php }   } ?>
			</ul>
		</div>
	</div>
</section>

<div class="beneficios beneficios-bob">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<h2>Processos</h2>
				<span>Automatizações</span>
			</div>
		</div>
		<div class="row list-beneficios slick1">
			<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
				if($blocos[$index]["id_categoria"] == $Arraycategorias[4]['id_categoria']){ 
			?>
			<div class="col-3 item-beneficios <?php if($beneficios == 0){ echo "offset-0 offset-md-6"; } if($beneficios == 6){ echo "offset-0 offset-md-3"; }  $beneficios++;?>">
			<div class="icons"><i class="icon-blocos" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i></div>
				<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3>
			</div>
			<?php }   } ?>
		</div>
	</div>
</div>

<section class="banner-produtos box-bob" style="background-image: url(<?php echo URL; ?>/content/img/banner-bob-libertade.png);">
    <div class="container">
		<div class="row">
			<div class="col-12 text-center">
                <h3>Libere as pessoas para focarem no que <b>realmente importa</b></h3>
				<a href="#banner-produto">agende uma demonstração</a>
            </div>
        </div>
    </div>
</section>

<div class="integracao-api">
	<div class="container">
		<div class="row">
			<div class="col-12 offset-0 col-md-8 offset-md-2">
				<h2>Integração simples e rápida <br><b>em poucos passos</b></h2>
			</div>
		</div>
		<div class="row">
			<?php $beneficios = 0; for($index = 0;$index < $totalblocos;$index++){ 
				if($blocos[$index]["id_categoria"] == $Arraycategorias[6]['id_categoria']){ 
			?>
			<div class="col-12 col-md-4">
				<div class="passos">
					<i style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i>
					<h2><?= $blocos[$index]["titulo"]; ?></h2>
					<p><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></p>
				</div>
			</div>
			<?php }   } ?>
		</div>
		<div class="row">
			<div class="col-12 offset-0 col-md-6 offset-md-3 API">
				<h2>Integração API</h2>
			</div>
		</div>
		<div class="row list-integraca slick3">
			<?php $beneficios = 0; for($index = 0; $index < $totalblocos;$index++){ 
				if($blocos[$index]["id_categoria"] == $Arraycategorias[5]['id_categoria']){ 
			?>
			<div class="item-integracao <?php if($index == 9){ echo "active"; } ?>">
				<div class="in-integracao">
				<div class="icons"><i class="icon-integracao" style="background-image: url(uploads/blocos/<?= $blocos[$index]["imagem"]; ?>)"></i></div>
				<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?></h3> <!-- uploads/blocos/<?= $blocos[$index]["imagem"]; ?> 
			--></div>
			</div>
			<?php }   } ?>
		</div>
	</div>
</div>

<section class="escritorio">
	<div class="bg1"></div>
	<div class="bg2"></div>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-12">
				<h3>Por que automatizar?</h3>
				<div class="pagingInfo"></div>
				<div class="slick-escritorio">
					<?php $plataforma = 1; for($index = 0;$index < $totalblocos;$index++){ 
						if($blocos[$index]["id_categoria"] == $Arraycategorias[7]['id_categoria']){ 
					?>
					<div><img src="uploads/blocos/<?= $blocos[$index]["imagem"]; ?>" width="100%"/><h6><?= $blocos[$index]["titulo"]; ?> </h6></div>
					<?php }   } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="box-porque-cotratar bob-box">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 porque-texto" >
				<h2>O Bob <b>aprende e evolui</b> a cada novo processo e está pronto para fazer parte da sua equipe!</h2>
				<h4>Tecnologia própria <br><b>e 100% nacional</b></h4>
			</div>
			<div class="col-12 col-md-6 porque-img texte-center" >
				<img src="content/img/bob-img.png" width="100%">
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
					<input type="hidden" name="servico"  id="servico" value="Bob">
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

	$('.numeros-produtos .item-numeros').hover(function() {
		$('.numeros-produtos .item-numeros').removeClass("active");
		$(this).addClass("active");
	});

	var $status = $('.pagingInfo');
		var $slickElement = $('.slick-escritorio');

		$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
		// no dots -> no slides
		if(!slick.$dots){
			return;
		}

		//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
		var i = (currentSlide ? currentSlide : 0) + 1;
		// use dots to get some count information
		$status.text(i + '/' + (slick.$dots[0].children.length));
		});

		$slickElement.slick({
		infinite: false,
		slidesToShow: 1,
		autoplay: true,
		dots: true
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
			slidesToShow: 1,
			dots: true,
			slidesToScroll: 1
		  }
		}
	  ]
	});

	$('.slick-videos-produtos').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 2000,
	  dots: false,
	  arrows: false,

	});

	$('.plataforma-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		autoplay: false,
  		autoplaySpeed: 4000,
		pauseOnHover:true,
		asNavFor: '.plataforma-nav'
	});

	$('.plataforma-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.plataforma-for',
		dots: false,
		centerMode: false,
		vertical: true,
		verticalSwiping: true,
		focusOnSelect: true
	});

	$('.plataforma-for').on('mouseenter', function(){
		$('.plataforma-nav').slick('slickPause');
	});
	$('.plataforma-for').on('mouseleave', function(){
		$('.plataforma-nav').slick('slickPlay');
	});

	var largura = $(document).width();
	if(largura < 900){ 
		$(".slick1").addClass("slick-beneficios");
		$(".slick2").addClass("slick-modulos");
		$(".slick3").addClass("slick-api");

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
			slidesToShow: 1,
			slidesToScroll: 1
		});
		$('.slick-api').slick({
			infinite: true,
			dots: true,
			speed: 300,
			arrows: false,
			slidesToShow: 2,
			slidesToScroll: 1
		});
	}

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