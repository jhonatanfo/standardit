<?php include "content/include/head.php"; ?>
<?php include "content/include/tags.php"; ?>
</head>

<body>
    <?php include "content/include/menu.php"; ?>

    <section class="bg-contato">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?=  $seo[0]["titulo"]; ?></h3>
                    <h1><?= $seo[0]["texto"]; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-contato-form">

        <div class="container bg-branco-contato-form">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="contato-form-right">
                        <h3>
                            Entre em contato e saiba<br> mais sobre nossas soluções!
                        </h3>
                        <ul>
                            <li class="link-ios"><i class="icon-contato-telefone"></i> 3280-2600</li>
                            <li><i class="icon-contato-email"></i> contato@standard.com.br</li>
                        </ul>
                        <a href=""><i></i> Ou fale com um consultor</a>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="contato-form-left">
                        <i class="icon-contato"></i>
                        <h2>Envie-nos uma mensagem.</h2>
                        <p>Responderemos na velocidade de um foguete</p>
                        <form class="form-servicos">
                            <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>">
                            <input type="hidden" name="servico" id="servico" value="Bob">
                            <div class="form-group">
                                <input type="email" class="form-control" id="nome" placeholder="Digite o seu nome">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <input type="text" id="telefone" class="form-control" placeholder="Telefone">
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="mensagem" rows="3" placeholder="Mensagem"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="erro"></div>
                                    <button type="button" class="btn-enviar" id="enviar">Enviar mensagem</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
 
    <section>
        <div class="row">
            <div class="col-md-8 contato-mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.807358306373!2d-46.73054388502266!3d-23.539430184693796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef89f6320b17f%3A0xc62333a0cb007c86!2sAv.%20Queiroz%20Filho%2C%201700%20-%20Vila%20Leopoldina%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005319-000!5e0!3m2!1spt-BR!2sbr!4v1647141060101!5m2!1spt-BR!2sbr"
                    width="100%" height="412" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col-md-4 bg-contato-mapa">
                <div class="box-contato-mapa">
                    <i></i>
                    <h3>
                        Onde estamos:
                    </h3>
                    <p>
                        Av. Queiroz Filho, 1700, Vila B Escritório 30<br> Vila Leopoldina - São Paulo - SP
                    </p>
                    <a href="">Veja como chegar</a>
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
                    $("#nome").css('border-color', "red");
                    $("#nome").focus();
                    return false;
                } else {
                    $("#nome").css('border-color', "#DCD8D8");
                }
                if (resposta == "email") {
                    $(".erro").html("O e-mail invalido!");
                    $("#email").css('border-color', "red");
                    $("#email").focus();
                    return false;
                } else {
                    $("#email").css('border-color', "#DCD8D8");
                }
                if (resposta == "corporativo") {
                    $(".erro").html("O e-mail corporativo e invalido!");
                    $("#email").css('border-color', "red");
                    $("#email").focus();
                    return false;
                } else {
                    $("#email").css('border-color', "#DCD8D8");
                }
                if (resposta == "telefone") {
                    $(".erro").html("Preencha o telefone!");
                    $("#telefone").css('border-color', "red");
                    $("#telefone").focus();
                    return false;
                } else {
                    $("#telefone").css('border-color', "#DCD8D8");
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
        AOS.init();
    </script>

</body>

</html>