<?php include 'confere.php'; ?>
<meta charset="utf8">
<!--<link rel="stylesheet" href="scripts/css.css">-->
<div id="painel">

<?php include "config.php"; ?>

<?php 
	if(isset($_POST['cadastrar_posts']) && $_POST['cadastrar_posts'] == 'cad'){
		$id_a_editar = $_POST['id_do_post'];
		$img = $_FILES['foto'];
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $autor = $_POST['autor'];
        $categoria = $_POST['categoria'];
        $data = $_POST['data'];

        if(empty($_POST['foto']['nome'])){
        	$editar_posts = mysql_query("UPDATE site_posts SET titulo = '$titulo', texto = '$texto', autor = '$autor', categoria = '$categoria', data = NOW() WHERE id ='$id_a_editar'") or die(mysql_error());
		if($editar_posts>='1'){
				echo "<div class=\"ok\">Post atualizado com susesso</div>";
			}else{
				echo "<div class=\"no\">Não foi possivel atualizar a postagem</div>";
			}
        }
	}

	$editar_post_id = $_POST['id_do_post'];
	 $noticias = mysql_query("SELECT * FROM site_posts WHERE id = '$editar_post_id'") or die(mysql_error());

        if(mysql_num_rows($noticias)<='0'){
          echo "Noticias não encontradas";
        }else{
          while($res_noticias = mysql_fetch_array($noticias)){
            $id_do_post = $res_noticias[0];           
            $thumb = $res_noticias[1];
            $titulo = $res_noticias[2];
            $texto = $res_noticias[3];
            $categoria = $res_noticias[4];
            $data = $res_noticias[5];
            $autor = $res_noticias[6];          
  
 ?>

			<form action="" name="editar_posts" method="post" enctype="multipart/form-data">
				<label><input type="file" name="foto" size="50"></label>

				<label><input type="text" name="titulo" value="<?php echo $titulo; ?>"></label>	

				<label><textarea name="texto" cols="30" rows="10"><?php echo $texto; ?></textarea></label>	

				<label><input type="text" name="autor" value="<?php echo $autor; ?>"></label>

				<label><input type="text" name="categoria" value="<?php echo $categoria; ?>"></label>

				<label><input type="text" name="data" value="<?php echo $data; ?>"></label>

				<input type="hidden" name="id_do_post" value="<?php echo $id_do_post; ?>">

				<input type="hidden" name="cadastrar_posts" value="cad">

				<input type="submit" name="editar" value="Editar" class="cadastro_btn">
			</form>
		
<?php 
	}
}
 ?>
</div> <!-- Div conteudo -->