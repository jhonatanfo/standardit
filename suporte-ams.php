<?php include "content/include/head.php"; ?>
<?php include "content/include/tags.php"; ?>
</head>

<body>
    <?php include "content/include/menu.php"; ?>

    <?php for($index = 0;$index < $totalbanners;$index++){ ?>
    <section class="bg-suporte-ams" style="background: #E5E5E5 url(uploads/banners/<?php echo $banners[$index]["desktop"]; ?>) no-repeat center bottom / cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo $banners[$index]["titulo"]; ?></h3>
                    <h1><?php echo $banners[$index]["frase"]; ?></h1>
                    <i></i>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <section class="suporte-mercado">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <h2><?=  $seo[0]["titulo"]; ?></h2>
                </div>
                <div class="col-md-6">
                    <?= $seo[0]["texto"]; ?>
                </div>
            </div>

            <br>
            <br>

            <div class="row">
                <?php  for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
				?>
                <div class="col-md-6">
                    <div class="box-suporte-mercado">
                        <i class="icon-fabrica-software"></i>
                        <h2><?php $bloco = unserialize($blocos[$index]["chamada"]); if($bloco[0] != ""){ echo $bloco[0]; } ?><span><?php if($blocos[$index]["titulo"] != ""){ echo "<br>" . $blocos[$index]["titulo"]; } ?></span></h2>
                        <p><?= $blocos[$index]["texto"]; ?></p>
                    </div>
                </div>
                <?php } } ?>
            </div> 
            

        </div>
    </section>

    <section class="bg-destaque-suporte-ams">
        <?php  for($index = 0;$index < $totalblocos;$index++){ 
            if($blocos[$index]["id_categoria"] == $Arraycategorias[1]['id_categoria']){ 
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                    <?= $blocos[$index]["texto"]; ?>
                    </h3>
                </div>
            </div>
        </div>
        <?php } } ?>
    </section>
 
    <section class="solucoes-suporte-ams">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        Soluções que atendemos
                    </h3>
                </div>
            </div>

            <div class="row">
                <?php  for($index = 0;$index < $totalblocos;$index++){ 
                    if($blocos[$index]["id_categoria"] == $Arraycategorias[2]['id_categoria']){ 
                ?>
                <div class="col-md-4">
                    <div class="box-solucoes-suporte-ams two-line">
                        <h4><?= $blocos[$index]["titulo"]; ?></h4>
                        <p><?= $blocos[$index]["texto"]; ?></p>
                    </div>
                </div>
                <?php } } ?>
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
        AOS.init();
    </script>
</body>
</html>