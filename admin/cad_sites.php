<?php include 'confere.php'; ?>
<?php include "config.php"; ?>
<?php include "scripts.php"; ?>

<div id="painel">
    <?php 
      if(isset($_POST['cadastrar_posts']) && $_POST['cadastrar_posts'] == 'cad'){
        $nome = $_POST['nome'];
        $url = $_POST['url'];
        $cadastrar_noticias = mysql_query("INSERT INTO site_indicados (nome, url)
                                            VALUES('$nome', '$url')")
                                      or die(mysql_error());
                                      if($cadastrar_noticias >='1'){
                                        echo "<div class=\"ok\">link cadastrado com susesso</div>";
                                      } else{
                                        echo "<div class=\"no\">Cadastro não realizado</div>";
                                      }

          # code...
        }

      
     ?>

	   <form neme="cadastrar_posts" action="" id="cadastrar_posts" method="post" enctype="multipart/form-data">
     <fieldset>
      <label for=""> 
      <span>Nome do site</span> 
      </label>
      <input type="texot" name="nome" size="50">
     </fieldset>

     <label for="">
       <span>URL</span>
       <input type="text" name="url">       
     </label>    
     <input type="hidden" name="cadastrar_posts" value="cad"> 
     <input type="submit" value="Cadastrar" name="cadastrar" class="cadastro_btn">

      </form>
	</div>