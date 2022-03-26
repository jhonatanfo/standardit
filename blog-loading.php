<?php 

include_once("admin-ideal/config/conn.php");
$acao = "";
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
                WHERE b.idioma = '".$sku."' and c.id_categoria = '".$categoria."' and a.destaque = '0' and a.status = '1' ORDER BY a.data DESC limit 6"; 
                
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
                WHERE b.idioma = '".$sku."' and c.id_categoria = '1' and destaque = '0' Order by a.data DESC limit 6";  
            }

				$queryblog = mysqli_query($conn, $sqlblog);
				$totalblog = 0;
				while($sqlblog = mysqli_fetch_array($queryblog, MYSQLI_ASSOC)){ 

                    $id_blog = $sqlblog['id_blog'];
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
					<h4><?php $data = str_replace("/", "-", $data); echo date('d/m/Y', strtotime($data)); ?></h4>
					<h2><?php echo $titulo ?></h2>
				</a>
            </div>

			<?php } } ?>