<?php include "content/include/head.php"; ?>
<?php include "content/include/tags.php"; ?>
</head>

<body>
    <?php include "content/include/menu.php"; ?>
    
    <?php for($index = 0;$index < $totalbanners;$index++){ ?>
    <section class="bg-erp-sap" style="background: #E5E5E5 url(uploads/banners/<?php echo $banners[$index]["desktop"]; ?>) no-repeat center bottom / cover;">
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
    <section class="description-erp-sap">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3><?=  $seo[0]["titulo"]; ?></h3>
                </div>
                <div class="col-md-6">
                <?= $seo[0]["texto"]; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="items-erp-sap">
        <div class="container">
            <div class="row">
                <?php  for($index = 0;$index < $totalblocos;$index++){ 
					if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
				?>
                <div class="col-md-4">
                    <div class="box-items-erp-sap">
                        <i class="icon-ams-sap" style="background-image: urluploads/blocos/<?= $blocos[$index]["imagem"]; ?>);"></i>
                        <h3><?= $blocos[$index]["titulo"]; ?></h3>
                        <p>
                        <?= $blocos[$index]["texto"]; ?>
                        </p>
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
        $(document).ready(function() {
            $('.slick-standard-premios').slick({
                arrows: true,
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
            });
        });

        AOS.init();
    </script>

</body>

</html>