<?php include "content/include/head.php"; ?>
<?php include "content/include/tags.php"; ?>
</head>

<body>
    <?php include "content/include/menu.php"; ?>

    <?php for($index = 0;$index < $totalbanners;$index++){ ?>
    <section class="bg-solucao-comercio-externo" style="background: #E5E5E5 url(uploads/banners/<?php echo $banners[$index]["desktop"]; ?>) no-repeat center bottom / cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo $banners[$index]["titulo"]; ?></h3>
                    <h1>
                    <?php echo $banners[$index]["frase"]; ?>
                    </h1>
                    <i></i>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <section class="description-solucao-comercio-externo">
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
    

    <section class="bg-funcionalidades-comercio">
        <h2>Conheça as funcionalidades da Solução<br>OneSource Global Trade </h2>

        <div class="slider-funcionalidades-comercio">
            <?php  for($index = 0;$index < $totalblocos;$index++){ 
                if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
            ?>
            <div class="box-slider-funcionalidades-comercio">
                <h3><?= $blocos[$index]["titulo"]; ?></h3>
                <p><?= $blocos[$index]["texto"]; ?></p>
            </div>
            <?php } } ?>
        </div>
    </section>

    
    <section class="bg-solucao-comercio-homologada">
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
                    if($blocos[$index]["id_categoria"] == $Arraycategorias[2]['id_categoria']){ 
                ?>
                <div class="col-md-6">
                    <div class="solucao-comercio-servicos <?php  if($index == 5){ echo "active"; } ?>">
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


    <?php include ('content/include/social.php'); ?>
    <?php include ('content/include/rodape.php'); ?>

    <script type="text/javascript" src="<?php echo URL; ?>content/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>content/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>content/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>content/aos-master/dist/aos.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>content/js/action.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.slider-funcionalidades-comercio').slick({
                arrows: false,
                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                speed: 500,
                customPaging: function(slider, i) {
                    var thumb = $(slider.$slides[i]).data();
                    return '<a>0' + (i + 1) + '</a>';
                },
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            });
        });

        AOS.init();
    </script>

</body>

</html>