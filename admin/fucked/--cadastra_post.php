<?php include "config.php"; ?>

<html>
<meta charset="utf8">
<link rel="stylesheet" href="scripts/css.css">
<div id="conteudo"> <!-- Div conteudo -->
<table width="800" border="1">
  <tr>
    <td width="134">&nbsp;</td>
    <td width="650">&nbsp;Prefeitura Municipal de Corrente - PI</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;Sistema de Administração Web</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>

    <?php 
      if(isset($_POST['cadastrar_posts']) && $_POST['cadastrar_posts'] == 'cad'){
        $img = $_FILES['foto'];
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $autor = $_POST['autor'];
        $categoria = $_POST['categoria'];
        $data = $_POST['data'];


        $pasta = "../upload/posts";
        $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');

        require("../scripts/funcao_upload.php");
        $nome = $img['name'];
        $tmp = $img['tmp_name'];
        $type = $img['type'];

        if (!empty($nome) && in_array($type, $permitido)) {/*Verifica se esta passando dados na variavel*/
          $name = md5(uniqid(rand(), true)).".jpg";/*Renomeia e mascara o nome do arquivo*/
          Redimensionar($tmp, $name, 390, $pasta);

          $cadastrar_noticias = mysql_query("INSERT INTO site_posts (foto, titulo, texto, categoria, data, autor, visitas)
                                            VALUES('$name', '$titulo', '$texto', '$categoria', '$data', '$autor', '1')")
                                      or die(mysql_error());
                                      if($cadastrar_noticias >='1'){
                                        echo "<div class=\"ok\">Seu topico foi cadastrado com susesso</div>";
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
      <span>Imagem a ser exibida</span> 
      </label>
      <input type="file" name="foto" size="50">
     </fieldset>

     <label for="">
       <span>Titulo da Postagem</span>
       <input type="text" name="titulo">       
     </label>

     <label for="">
       <span>Texto</span>
       <textarea name="texto" id="" cols="30" rows="10"></textarea>
     </label>
    
    <label for="">
       <span>Autor</span>
       <input type="text" name="autor">       
     </label>

     <label for="">
       <span>Categorias</span>
       <select name="categoria" id="categoria">
         <option value="">Selecione uma categoria</option>
         <option value="noticias" id="noticias">Noticias</option>
         <option value="eventos" id="eventos">Eventos</option>
         <option value="especiais" id="especiais">Especiais</option>
         <option value="esportes" id="esportes">Esportes</option>
         <option value="cultura" id="cultura">Cultura</option>
       </select>
     </label>

     <label for="">
       <span>Data</span>
       <input type="text" name="data" value="<?php echo date('d/m/Y'); ?>">
     </label>
     <input type="hidden" name="cadastrar_posts" value="cad"> 
     <input type="submit" value="Cadastrar" name="cadastrar" class="cadastro_btn">

      </form>
	</td>
  </tr>
</table>
</div> <!-- Div conteudo -->
</html>