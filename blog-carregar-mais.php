<?php 

include_once("admin-ideal/config/conn.php");
$acao = "";
$inicio = $_POST['inicio'];
$categoria = $_POST['categoria'];
$sku = $_POST['sku'];


            if($categoria != ""){
            $sqlblog = "
                SELECT
                    a.id_blog,
                    a.status,
                    a.ordem,
                    b.titulo AS titulo,
                    b.chamada AS chamada,
                    a.data AS data,
                    b.link AS link,
                    c.nome AS categoria,
                    b.imagem AS imagem
                FROM ideal_blog_idioma AS b
                LEFT JOIN ideal_blog AS a ON a.id_blog = b.id_blog
                LEFT JOIN ideal_blog_categoria AS c ON a.id_categoria = c.id_categoria
                WHERE b.idioma = '".$sku."' and c.id_categoria = '".$categoria."' and destaque = '0' Order by  a.id_blog DESC limit ".$inicio.", 3"; 
                
            }
            else{
                $sqlblog = "
                SELECT
                    a.id_blog,
                    a.status,
                    a.ordem,
                    b.titulo AS titulo,
                    b.chamada AS chamada,
                    a.data AS data,
                    b.link AS link,
                    c.nome AS categoria,
                    b.imagem AS imagem
                FROM ideal_blog_idioma AS b
                LEFT JOIN ideal_blog AS a ON a.id_blog = b.id_blog
                LEFT JOIN ideal_blog_categoria AS c ON a.id_categoria = c.id_categoria
                WHERE b.idioma = '".$sku."' and destaque = '0' and a.status = '1' ORDER BY a.data limit ".$inicio.", 3";  
            }

				$queryblog = mysqli_query($conn, $sqlblog);
				$totalblog = 0;
				while($sqlblog = mysqli_fetch_array($queryblog, MYSQLI_ASSOC)){ 

					$link = $sqlblog['link'];
					$categoria = $sqlblog['categoria'];
					$data = $sqlblog['data'];
					$chamada = $sqlblog['chamada'];
					$imagem = $sqlblog['imagem'];
					$titulo = $sqlblog['titulo'];
                    if($categoria == 'Posts'){
                ?>
    
    
                <div class="col-12 col-md-4">
                    <a href="<?=  $link; ?>" class="destaque-item-blog post">
                        <img src="<?php echo "uploads/blog/".$imagem ?>" width="100%" />
                    </a>
                </div>
                
                <?php }else{ ?>
    
                    <div class="col-12 col-md-4">
                    <a href="materia.php?id=<?=  $id_blog; ?>" class="destaque-item-blog">
                        <div class="img"  style="background-image:  url('<?php echo "uploads/blog/".$imagem ?>')"><span></span></div>
                        <span><?php echo $categoria ?></span>
                        <h4><?php echo $data ?></h4>
                        <h2><?php echo $titulo ?></h2>
                    </a>
                </div>
    
                <?php } } ?>