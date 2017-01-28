
<?php
	include "header.php";
?>
	<section id="geral"> <!-- AREA PRINCIPAL DO SITE -->		
		<div id="googlenews"> <!-- Google News -->
			<div class="noticias"> <!-- Rotatoria de Noticias -->
					<iframe frameborder="0" width="728" height="90" marginwidth="0" marginheight="0"
  					 src="http://www.google.com/uds/modules/elements/newsshow/iframe.html?topic=h&rsz=small&format=728x90">
					</iframe>		
			</div><!-- Rotatoria de Noticias -->
			<div class="redes"> <!-- Midias Sociais-->
			<a href="#"><img src="imgs/icon/Email.png"></a>
			<a href="#"><img src="imgs/icon/facebook.png"></a>
			<a href="#"><img src="imgs/icon/Google-plus.png"></a>
			<a href="#"><img src="imgs/icon/Instagram.png"></a>
			<a href="#"><img src="imgs/icon/Linkedin.png"></a>
			<a href="#"><img src="imgs/icon/Twitter.png"></a>
			<a href="#"><img src="imgs/icon/Youtube.png"></a>
			</div><!-- Midias Sociais-->
		</div><!-- Google News -->
		
		<div id="paginas"><!-- Paginas -->
			
			<div class="texto"><!-- Textos do site -->
				<?php get_exibe_materias(); ?>
			</div>	<!-- Categorias -->
				Texto
				<br>
				<div id="galeria"><!-- Galeria -->
					<h1>Confira as imagens da materia na integra</h1>
					<?php 
						$id = $_GET['id'];
						$galeria = mysql_query("SELECT * FROM site_fotos WHERE id_post = '$id'") or die(mysql_error());
						if(mysql_num_rows($galeria)<='0'){
							echo "<p>Não há fotos para esta postagem </p>";
						}else{
							while ($res_galeria = mysql_fetch_array($galeria)) {
								$id = $res_galeria['id'];
								$picture = $res_galeria['img'];
								$id_post = $res_galeria['id_post'];
								# code...					
					 ?>
						<a class="galeria" href="upload/galerias/<?php echo $picture; ?>" rel="shadowbox[vocation]" title="<?php $titulo; ?>">
							<img src="timthumb.php?src=upload/galerias/<?php echo $picture; ?>&h=70&w=90&zc=1" alt="">
						</a>

					 <?php 	
					}
						}

						 ?>
				<div id="comentarios"><!-- Comentarios -->

					<h1>Comentarios</h1>
						
						<?php 
						$id = $_GET['id'];
							$pega_comentario = mysql_query("SELECT * FROM coment WHERE id_post = '$id' AND status = 'aprovado'")or die(mysql_error());
							if(mysql_num_rows($pega_comentario) <= '0'){
								echo "<p> Seja o primeiro a comentar essa postagem </p>";
							}else{
								while ($res_comentarios = mysql_fetch_array($pega_comentario)) {
									# code...
									$id = $res_comentarios['0'];
									$nome = $res_comentarios['1'];
									$email = $res_comentarios['2'];
									$mostra_comentario = $res_comentarios['3'];

								?>
								
								<div class="coment">
									<?php echo "<strong>$nome</strong>"; ?> Dise: <br>
									<?php echo "$mostra_comentario"; ?>
									
								</div>
								<?php 
								}
							}
						 ?>

					<h1>Deixe o seu comentario</h1>
					<?php 
						if(isset($_POST['comentar_post']) && $_POST['comentar_post'] == 'cad'){
							$nome = strip_tags(trim($_POST['nome']));
							$email = strip_tags(trim($_POST['contact']));
							$comentario = strip_tags(trim($_POST['comentario']));
							$ip = $_SERVER['REMOTE_ADDR'];

							$id_post = $_GET['id'];


							if(empty($_POST['email'])){
								$comentar = mysql_query("INSERT INTO coment (nome, email, comentario, id_post, ip, status) VALUES ('$nome', '$email', '$comentario', '$id_post', '$ip', 'aguardando')") or die(mysql_error());
								echo "
									<script type=\"text/javascript\">
										alert(\"O seu comentario foi enviado e aguarda avaliação para publicação\");
									</script>
								";								
							}
							if(!empty($_POST['email'])){
								echo "
									<script type=\"text/javascript\">
										alert(\"O seu comentario não foi enviado!\");
									</script>
								";							
							}

						}

					 ?>
					<form name="comentar_posts" id="comentar_posts" method="post" action="">
						<table width="200" border="0" cellspacing="2" cellpadding="2">
							  <tr>
							    <td>Nome:</td>
							    <td><input name="nome" type="text" size="50" maxlength="100"></td>
							  </tr>
							  <tr>
							    <td>E-mail:</td>
							    <td><input name="contact" type="text" size="50" maxlength="100"></td>
							  </tr>
							  <tr>
							    <td>Comentario:</td>
							    <td><textarea name="comentario" cols="60" rows="5" id="comentario"></textarea></td>
							  </tr>
							  <tr>
							    <td></td><!-- Enganar spamers -->

							    <td><span style="display: none; visibility:hidden;">
							    Se ferrou spammer idiota<input type="hidden" name="email" id="email"></span></td>
							  </tr>
							  <tr>
							    <td></td>
							    <td>
							    <input type="hidden" name="comentar_post" value="cad">
							      <input name="contatato_btn" type="submit" id="contatato_btn" value="Publicar meu comentario"  class="button" />
							    </td>
							  </tr>
						</table>
					</form>					
				</div><!-- Comentarios -->


			</div><!-- Galeria -->

				
		</div><!-- Paginas -->

	
		
	<!-- CHAMAR AS SIDEBAR -->
	<?php
	include "sidebars.php";
?>


	

	<!--Rodape-->
	<?php
	include "rodape.php";
?>