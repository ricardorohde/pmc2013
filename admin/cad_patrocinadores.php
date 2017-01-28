<?php include 'confere.php'; ?>
<?php include "config.php"; ?>
<?php include "scripts.php"; ?>

<div id="painel">
    <?php 
      if(isset($_POST['cadastrar_posts']) && $_POST['cadastrar_posts'] == 'cad'){
        $img = $_FILES['foto'];
        $titulo = $_POST['titulo'];
        


        $pasta = "../patro/";
        $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');

        require("../scripts/funcao_upload.php");
        $nome = $img['name'];
        $tmp = $img['tmp_name'];
        $type = $img['type'];

        if (!empty($nome) && in_array($type, $permitido)) {/*Verifica se esta passando dados na variavel*/
          $name = md5(uniqid(rand(), true)).".jpg";/*Renomeia e mascara o nome do arquivo*/
          Redimensionar($tmp, $name, 390, $pasta);

          $cadastrar_noticias = mysql_query("INSERT INTO site_patrocinadores (foto, titulo)
                                            VALUES('$name', '$titulo')")
                                      or die(mysql_error());
                                      if($cadastrar_noticias >='1'){
                                        echo "<div class=\"ok\">Patrocinador cadastrado com susesso</div>";
                                      } else{
                                        echo "<div class=\"no\">Cadastro não realizado</div>";
                                      }

          # code...
        }

      }
     ?>

	   <form neme="cadastrar_posts" action="" id="cadastrar_posts" method="post" enctype="multipart/form-data">
     <fieldset>
      <label for=""> 
      <span>Logo do patrocinador</span> 
      </label>
      <input type="file" name="foto" size="50">
     </fieldset>

     <label for="">
       <span>Nome do patrocinador</span>
       <input type="text" name="titulo">       
     </label>    
     <input type="hidden" name="cadastrar_posts" value="cad"> 
     <input type="submit" value="Cadastrar" name="cadastrar" class="cadastro_btn">

      </form>
	</div>