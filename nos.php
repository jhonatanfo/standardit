<?php include "content/include/head.php"; ?>
<?php include "content/include/tags.php"; ?>
</head>

<body>
    <?php include "content/include/menu.php"; ?>

    <?php for($index = 0;$index < $totalbanners;$index++){ ?>
    <section class="nos-somos" style="background: #E5E5E5 url(uploads/banners/<?php echo $banners[$index]["desktop"]; ?>) no-repeat center bottom / cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <?php echo $banners[$index]["titulo"]; ?>
                    </h1>
                    <p>
                        <?php echo $banners[$index]["frase"]; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <section class="standard">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        <?=  $seo[0]["titulo"]; ?>
                    </h2>
                </div>
                <div class="col-md-6">
                    <?= $seo[0]["texto"]; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="standard-contato">
        <?php  for($index = 0;$index < $totalblocos;$index++){ 
            if($blocos[$index]["id_categoria"] == $Arraycategorias[0]['id_categoria']){ 
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span></span>
                    <h3>
                        <?= $blocos[$index]["titulo"]; ?>
                    </h3>
                    <a href="<?= $blocos[$index][" video "]; ?>">
                        <?php $bloco = unserialize($blocos[$index]["chamada"]);  echo $bloco[0]; ?>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </section>


    <section class="standard-premios">
        <div class="container slick-standard-premios">
            <div class="box">
                <div class="standard-premios-img">
                    <img src="content/img/standard.jpg" />
                </div>
                <div class="standard-premios-box">
                    <i></i>
                    <p>
                        STANDARD é<br>
                        <span>ganhadora do prêmio</span><br> Thomson Reuters de<br> Inovação de 2019
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="standard-premios-img">
                    <img src="content/img/standard.jpg" />
                </div>
                <div class="standard-premios-box">
                    <i></i>
                    <p>
                        STANDARD é<br>
                        <span>ganhadora do prêmio</span><br> Thomson Reuters de<br> Inovação de 2019
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="standard-missao-visao-valores">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h3>Jeito STANDARD de ser.</h3>

                    <h2>
                        Confira nossa <span>Missão,<br> Visão e Valores.</span>
                    </h2>

                    <p>
                        <span>Missão:</span><br> Temos como propósito ajudar nossos clientes a terem sucesso em seus projetos de implementação e sustentação ERP SAP, RPA, RPA fiscal, soluções fiscais, soluções de comércio exterior e soluções de gestão
                        de tarefas humanas e robóticas.
                    </p>

                    <p>
                        Isto é possível porque contamos com pessoas sensacionais em nosso time que geram Uau em toda a jornada, além disto utilizamos as melhores tecnologias disponíveis no mercado. Se não existir a gente cria. 🚀
                    </p>

                    <br>
                    <p>
                        <span>visão:</span><br> Ser reconhecida pelos clientes como uma empresa indispensável para o seu sucesso.
                    </p>

                </div>

                <div class="col-md-6">
                    <div class="slick-standard-missao-visao-valores">
                        <div class="box">
                            <img src="content/img/nossos-valores.jpg">
                        </div>
                        <div class="box">
                            <img src="content/img/nossos-valores.jpg">
                        </div>
                        <div class="box">
                            <img src="content/img/nossos-valores.jpg">
                        </div>
                        <div class="box">
                            <img src="content/img/nossos-valores.jpg">
                        </div>
                        <div class="box">
                            <img src="content/img/nossos-valores.jpg">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="agende button-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Nosso foco <strong>é o seu foco</strong></h2>
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
        $(document).ready(function() {
            $('.slick-standard-premios').slick({
                arrows: true,
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
            });

            $('.slick-standard-missao-visao-valores').slick({
                arrows: false,
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                customPaging: function(slider, i) {
                    var thumb = $(slider.$slides[i]).data();
                    return '<a>0' + (i + 1) + '</a>';
                },
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
        });

        AOS.init();
    </script>

</body>

</html>