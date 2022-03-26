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


<?php 
    $id_blog = $_GET['id'];

    $sqlblog = "
    SELECT
        a.id_blog,
        a.status,
        a.ordem,
        a.id_categoria,
        b.titulo AS titulo,
        b.chamada AS chamada,
        b.texto,
        a.data AS data,
        b.link AS link,
        c.nome AS categoria,
        b.imagem AS imagem
    FROM ideal_blog_idioma AS b
    LEFT JOIN ideal_blog AS a ON a.id_blog = b.id_blog
    LEFT JOIN ideal_blog_categoria AS c ON a.id_categoria = c.id_categoria
    WHERE b.idioma = '".$sku."' and a.id_blog = '".$id_blog."'"; 

    $queryblog = mysqli_query($conn, $sqlblog);
    $sqlblog = mysqli_fetch_array($queryblog, MYSQLI_ASSOC);

    $id = $sqlblog['id_blog'];
    $link = $sqlblog['link'];
    $categoria = $sqlblog['categoria'];
    $data = $sqlblog['data'];
    $chamada = $sqlblog['chamada'];
    $imagem = $sqlblog['imagem'];
    $titulo = $sqlblog['titulo'];
    $texto = $sqlblog['texto'];
    $id_categoria = $sqlblog['id_categoria'];

    $sqlproximo = "SELECT id_blog FROM ideal_blog WHERE id_blog = (SELECT MIN(id_blog) FROM ideal_blog WHERE id_categoria = '$id_categoria' AND  id_blog > '$id')";

    $queryproximo = mysqli_query($conn, $sqlproximo);
    $sqlproximo = mysqli_fetch_array($queryproximo, MYSQLI_ASSOC);

    $idproximo = $sqlproximo['id_blog'];
    
?>

	
<section class="banner-interno materia text-center">
	<div class="container">
		<div class="row">
            <a href="javascript:history.back()" class="btn-voltar"></a>

                <?php if($idproximo != ""){ ?>
                <a href="http://gomara.tech/materia.php?id=<?php echo $idproximo ?>" class="btn-proximo"></a>
                <?php } ?>
			<div class="col-12 offset-0 col-md-8 offset-md-2">

                

				<div class="texto-blog">
                
					<h4><?php echo $categoria ?></h4>
					<h2><?php echo $titulo ?></h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="destaques-blog ">
	<div class="container">
		<div class="row">
        <div class="col-12" id="materia">
            <div class="data"><i></i>
            <?php 
                setlocale(LC_ALL, 'pt_BT', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                $data_convertida = strftime('%d de %B de %Y', strtotime($data)); 
                echo $data_convertida;
            ?>
            </div>
            <img src="<?php echo URL."uploads/blog/".$imagem ?>" widht="100%"/>
			<p><?php echo $texto ?></p>
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
	
<script type="text/javascript" src="<?php echo URL; ?>content/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/aos-master/dist/aos.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>content/js/action.js"></script>
<script>
  AOS.init();
</script>	
<script type="text/javascript">	

	$(document).ready(function(){

		$('a[href^="#"]').on('click', function(e) {
			e.preventDefault();

			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top
			}, 500);

		});

	});
</script>
</body>
</html>