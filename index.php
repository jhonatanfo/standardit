<?php include "content/include/head.php"; ?>	
<?php include "content/include/tags.php"; ?>

</head>
<body>
	
<?php include "content/include/menu.php"; ?>	

<section class="banner">
	<?php for($index = 0;$index < $totalbanners;$index++){ ?>	
		<div>
		<div class="item-banner" style="background-image:  url(<?php echo URL; ?>/uploads/banners/<?php echo $banners[$index]["desktop"]; ?>);">
			<div class="container texto-banner">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6 descricao" data-aos="fade-zoom-in" data-aos-delay="300">
							<h4><?php echo $banners[$index]["titulo"]; ?> </h4>
							<h3 class="texto-banner1"><?php echo $banners[$index]["frase"]; ?></h3>
							<a href="<?php echo $banners[$index]["link"]; ?>"><?php echo $banners[$index]["botao"]; ?></a>
						</div>  
					</div>  
				</div>
			</div>
		</div>
		</div>
	<?php } ?>
</section>

<section class="sobre">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 sobre-img">
				<img src="<?php echo URL; ?>/uploads/paginas/<?php echo $seo[0]["imagem"]; ?>"/>
			</div>
			<div class="col-12 col-md-6">
				<h4><?=  $seo[0]["titulo"]; ?></h4>
				<h3><?= $chamada[0]; ?></h3>
				<?= $seo[0]["texto"]; ?>
				<a href="<?= URL; ?>contato">Entre em contato conosco</a>
			</div>
		</div>
	</div>
</section>

<section class="solucoes" id="o-que-fazemos">
	<div class="container-fluid">
		<div class="row slick-desktop">
			<?php for($index = 0;$index < $totalblocos;$index++){ if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ ?>
				
					<?php if($index < 3){  ?>


						<div class="col-12 col-md-6">
							<div class="itens-solucoes" style="background:  url(<?php echo URL; ?>/uploads/blocos/<?= $blocos[$index]["imagem"]; ?>) no-repeat center / cover;">
								<div class="itens-solucoes-destaque">
									<span><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[1];  ?></span>
									<h2><?= $blocos[$index]["titulo"]; ?></h2>
									<p><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0];  ?></p>
									<a href="<?php echo $blocos[$index]["video"]; ?>">Saiba mais</a>
								</div>
								<div class="itens-solucoes-destaque">
									<h2><?= $blocos[$index + 1]["titulo"]; ?></h2>
									<p><?php $bloco = unserialize($blocos[$index + 1]["chamada"]);  echo $bloco[0];  $index ++;?></p>
									<a href="<?php echo $blocos[$index]["video"]; ?>">Saiba mais</a>
								</div>
							</div>
						</div>
				
					<?php } else {  ?>


						<div class="col-12 <?php echo "col-md-4"; ?> ">
							<div class="itens-solucoes full" style="background:  url(<?php echo URL; ?>/uploads/blocos/<?= $blocos[$index]["imagem"]; ?>) no-repeat center / cover;">
								<span><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[1];  ?></span>
								<h2><?= $blocos[$index]["titulo"]; ?></h2>
								<p><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0];  ?></p>
								<a href="<?php echo $blocos[$index]["video"]; ?>"></a>
							</div>
						</div>

			<?php } } } ?>
					
		</div>


		<div class="row slick-mobile">
			<?php for($index = 0;$index < $totalblocos;$index++){ if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ ?>

				<div class="col-12">
					<div class="itens-solucoes full" style="background:  url(<?php echo URL; ?>/uploads/blocos/<?= $blocos[$index]["imagem"]; ?>) no-repeat center / cover;">
						<span><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[1];  ?></span>
						<h2><?= $blocos[$index]["titulo"]; ?></h2>
						<p><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0];  ?></p>
						<a href="<?php echo $blocos[$index]["video"]; ?>"></a>
					</div>
				</div>

			<?php } } ?>
		</div>
	</div>
</section>

<section class="numeros">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h5>98% dos nossos clientes tiveram sucesso em seus projetos</h5>
				<p>Veja alguns de nossos números</p>
			</div>
		</div>
		<div class="row">
			<?php for($index = 0;$index < $totalblocos;$index++){ if($blocos[$index]["id_categoria"] == $Arraycategorias[1]['id_categoria']){ ?>
				<div class="col-12 col-md-3">
					<div class="itens-numeros">
						<i style="background-image:  url(<?php echo URL; ?>/uploads/blocos/<?= $blocos[$index]["imagem"]; ?>);"></i>
						<h3><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0];  ?></h3>
						<h2><?= $blocos[$index]["titulo"]; ?></h2>
						<h4><?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[1];  ?></h4>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>

<section class="depoimentos img">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5>Veja o que nossos clientes empoderados tem a dizer </h5>
			</div>
		</div>
	</div>
</section>

<section class="depoimentos slick">
	<div class="container">	
		<div class="row">
			<div class="col-12">
				<div class="slick-depoimentos">
					<div class="itens-depoimentos">
					    <img src="content/img/aspas.png"/>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada orci ut elit elementum, efficitur porta neque rhoncus. Nullam elit leo, maximus sit amet cursus egestas, pellentesque sed erat. </p>
						<div class="assinatura">
							<i><img src="content/img/avatar-depoimento.png"/></i>
							<h4>Empresa Gomara<span>Rodrigo Cruz - CEO</span></h4>
						</div>
					</div>

					<div class="itens-depoimentos">
						<img src="content/img/aspas.png"/>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada orci ut elit elementum, efficitur porta neque rhoncus. Nullam elit leo, maximus sit amet cursus egestas, pellentesque sed erat. </p>
						<div class="assinatura">
							<i><img src="content/img/avatar-depoimento.png"/></i>
							<h4>Empresa Gomara<span>Rodrigo Cruz - CEO</span></h4>
						</div>
					</div>

					<div class="itens-depoimentos">
						<img src="content/img/aspas.png"/>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada orci ut elit elementum, efficitur porta neque rhoncus. Nullam elit leo, maximus sit amet cursus egestas, pellentesque sed erat. </p>
						<div class="assinatura">
							<i><img src="content/img/avatar-depoimento.png"/></i>
							<h4>Empresa Gomara<span>Rodrigo Cruz - CEO</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="clientes" id="parceiros">
	<div class="container">	
		<div class="row">
			<div class="col-12 slick-clientes">
				<?php for($index = 0;$index < $totalclientes;$index++){ ?>
				<div><a><img src="<?php echo URL."uploads/clientes/".$clientes[$index]["img_name"]; ?>" alt="<?php echo $clientes[$index]["nome"]; ?>"/></a></div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php include ('content/include/social.php'); ?>	
<?php include ('content/include/rodape.php'); ?>	

<script type="text/javascript" src="<?php echo URL; ?>content/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/aos-master/dist/aos.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/js/action.js"></script>
		
<script type="text/javascript">	
	$(document).ready(function(){

		

		$(function(){
			var url  = window.location.href; 
			var current = url.split("/")[url.split("/").length -1];

            /*if(current == "pt" || current == "en" || current == "es"){
                current = url.split("/")[url.split("/").length -2];
                
            }*/
            if(current == ""){
                
            }else{
                $('.navbar-nav a').each(function(){
                    var $this = $(this);
                    if($this.attr('href').indexOf(current) !== -1){
                        $this.addClass('active');
                    }
                })
            }
		});
	});

	
	var largura = $(document).width();
	if(largura < 800){ 
		$(".slick-mobile").addClass("slick-solucoes");
		$('.slick-solucoes').slick({
			infinite: true,
			dots: true,
			speed: 300,
			arrows: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerMode: true,
			centerPadding: '30px'
		});
    }

	$('.banner').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 5000,
	  infinite: true,
	  speed: 800,
	  dots: false,
	  arrows: true,
	});

	$('.slick-clientes').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 5000,
	  infinite: true,
	  speed: 800,
	  dots: true,
	  arrows: true,
	  responsive: [
			{
			breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false
				}
			},
			{
			breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false
				}
			},
			{
			breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false
				}
			}
		]
	});


	$('.slick-depoimentos').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 8000,
	  infinite: true,
	  speed: 800,
	  dots: false,
	  arrows: true,
	});
	
	$(document).ready(function(){
		

		// Modal video
		$('.modal-video .fechar').on('click', function() {
			$('.incluir-video').css("opacity","0");
			setTimeout(function(){ $('.modal-video').css("left","105%"); }, 500);
			setTimeout(function(){ 
				$('.backdrop').css("left","-110%");
			}, 500);
			$(".incluir-video").html("");
		});
		
		// Play Video
		$('.play, .btn-play').on('click', function() {
			var videoid = $(this).attr('data-video');
			$('.backdrop').css("left","0");
			setTimeout(function(){ $('.modal-video').css("left","5%"); }, 500);
			setTimeout(function(){ 
				$('<iframe width="100%" height="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>')
				.attr("src", "https://www.youtube.com/embed/" + videoid + "?autoplay=1")
				.appendTo(".incluir-video");
				setTimeout(function(){ $('.incluir-video').css("opacity","1"); }, 500);
				
			}, 2000);
			
		});
		
		
		$('#enviar').on('click', function() {
			var nome = $("#nome");
			var nomePost = nome.val();
			var email = $("#email");
			var emailPost = email.val();
			var telefone = $("#telefone");
			var telefonePost = telefone.val();
			var mensagem = $("#mensagem");
			var mensagemPost = mensagem.val();

			$(".erro").html("Carregando...").css('padding', "13px");
			$.post("enviar.php", {
				nome: nomePost,
				email: emailPost,
				telefone: telefonePost,
				mensagem: mensagemPost
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
				if (resposta == "telefone") {
					$(".erro").html("Preencha o telefone!");
					$("#telefone").css('border-color', "#1ab4e4");
					$("#telefone").focus();
					return false;
				} else {
					$("#telefone").css('color', "#8b8b8b");
				}
				if (resposta == "mensagem") {
					$(".erro").html("Preencha o mensagem!");
					$("#mensagem").css('border-color', "#1ab4e4");
					$("#mensagem").focus();
					return false;
				} else {
					$("#mensagem").css('color', "#8b8b8b");
				}
				$(".erro").html(resposta);
				setTimeout(function(){ 
					$(".erro").html("");
					$("#mensagem").html("");
					$("#telefone").html("");
					$("#nome").html("");
					$("#email").html("");
				}, 2000);
			}, "html");
		});
	});

  AOS.init();
</script>

</body>
</html>