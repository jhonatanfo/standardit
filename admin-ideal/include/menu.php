<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="dashboard">
          <img src="assets/img/logo-mobile.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
              
            <?php
                // Dados Total origem
              
                $id_usuario = $_SESSION['id'];
                $sql = "SELECT ideal_permissao.id_modulo, ideal_permissao.status , ideal_modulos.nome, ideal_modulos.icone, ideal_modulos.link
                FROM ideal_permissao
                LEFT JOIN ideal_usuario
                ON ideal_permissao.id_usuario = ideal_usuario.id_usuario 
                LEFT JOIN ideal_modulos
                ON ideal_modulos.id_modulo = ideal_permissao.id_modulo
                WHERE ideal_usuario.id = '". $id_usuario ."' and status_menu = '1' order by ordem"; 
                $query = mysqli_query($conn, $sql); while($sql = mysqli_fetch_array($query)){ 
                    
                $status = $sql["status"];
                $nomemenu = $sql["nome"];
                $linkmenu = $sql["link"]; 
                $iconemenu = $sql["icone"]; 
                
              
                if($status == '1' and $nomemenu != "Dashboard"){
            ?>
              
              
			<li class="nav-item">
              <a class="nav-link" href="<?php echo $linkmenu; ?>">
                <i class="ni <?php echo $iconemenu; ?> text-orange"></i>
                <span class="nav-link-text"><?php echo $nomemenu; ?></span>
              </a>
            </li>
              
            <?php } } ?>
            
          </ul>
            
            
          <div class="banner-bem-vindo">
            <img src="content/img/banner-bem-vindo.png" width="100%"  alt=""/>
          </div>

        </div>
      </div>
    </div>
</nav>