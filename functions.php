<?php 
	$db = mysql_connect("localhost", "root", "");
	$dados = mysql_select_db("portal", $db);
 ?>

<?php include "/scripts/limita_palavras.php"; ?>


<!-- Categorias -->

<?php
	function get_exibe_categorias(){
		switch ($_GET['categoria']) {
			case 'eventos':
				include"paginas/eventos.php";
				break;

				case 'contato':
				include"paginas/contato.php";
				break;

				case 'cultura':
				include"paginas/cultura.php";
				break;

				case 'especiais':
				include"paginas/especiais.php";
				break;

				case 'noticias':
				include"paginas/noticias.php";
				break;

				case 'historia':
				include"paginas/historia.php";
				break;

				case 'onde':
				include"paginas/onde.php";
				break;

				case 'adminsitracao':
				include"paginas/admin.php";
				break;			
				
				default:
				include ("paginas/noticias.php");
				break;
		}
	}
?> 
<!-- Categorias -->

<?php 
		function get_destaque(){
			$sql = mysql_query("SELECT * FROM site_posts ORDER BY id DESC LIMIT 1");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>

	<h1>
		<?php
		 	echo $titulo; 
		 ?>
	 </h1>

	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=233&w=510&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 300, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>

<?php					
				}
			}
		}

 ?>




 <!-- Ultimas noticias-->
<?php 
		function get_ultimas_noticias(){
			$sql = mysql_query("SELECT * FROM site_posts ORDER BY RAND() LIMIT 2, 3");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=100&w=185&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 150, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>

<?php					
				}
			}
		}

 ?><!-- Ultimas noticias close-->

 <!-- Noticias Randomicas-->
<?php 
		function get_noticias_random(){
			$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'noticias' ORDER BY RAND() LIMIT 10");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
<li>
	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 90, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>
</li>
<?php					
				}
			}
		}

 ?><!-- Noticias Randomicas-->

<!-- Eventos Randomicos-->
<?php 
		function get_eventos_random(){
			$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'eventos' ORDER BY RAND() LIMIT 6");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
<li>
	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 90, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>
</li>
<?php					
				}
			}
		}

 ?><!-- Eventos Randomicos-->

<!-- Cultura Randomicos-->
<?php 
		function get_cultura_random(){
			$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'cultura' ORDER BY RAND() LIMIT 4");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
<li>
	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 90, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>
</li>
<?php					
				}
			}
		}

 ?><!-- Cultura Randomicos-->

 <!-- Especiais Randomicos-->
<?php 
		function get_especiais_random(){
			$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'especiais' ORDER BY RAND() LIMIT 6");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
<li>
	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 90, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>
</li>
<?php					
				}
			}
		}

 ?><!-- Especiais Randomicos-->

 <!-- Esportes Randomicos-->
<?php 
		function get_esportes_random(){
			$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'esportes' ORDER BY RAND() LIMIT 6");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
<li>
	 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($texto, 90, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">Leia mais</a></p>
</li>
<?php					
				}
			}
		}

 ?><!-- Esportes Randomicos-->


<!-- Materias mais antigas-->
<?php 
		function get_materias_antigas(){
			$sql = mysql_query("SELECT * FROM site_posts ORDER BY id ASC LIMIT 6");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
	 
	 <p><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>"><?php echo  $titulo; ?></a></p>

<?php					
				}
			}
		}

 ?><!-- Materias mais antigas-->


<!-- Materias mais vistas-->
<?php 
		function get_materias_vistas(){
			$sql = mysql_query("SELECT * FROM site_posts ORDER BY visitas LIMIT 6");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];					
					
					# code...
?>
	 
	 <p><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>"><?php echo  $titulo; ?></a></p>

<?php					
				}
			}
		}

 ?><!-- Materias mais Vistas-->


<!-- #####################################################################################################################
		ARQUIVO DE EXIBIÇÃO DE MATERIAS
#####################################################################################################################   -->

<?php function get_exibe_materias(){	
	if($_GET['site']=="exibir"){
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM site_posts WHERE id = '$id'");
		$contar = mysql_num_rows($sql);
		if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";				
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];
					$texto = $rs['3'];
					$categoria = $rs['4'];
					$data = $rs['5'];
					$autor = $rs['6'];
					$visitas = $rs['7'];	


					//Codigo do contador de visitas
					$add_visita = $visitas + 1;
					$site_visitas = mysql_query("UPDATE site_posts SET visitas = '$add_visita' WHERE id = '$id'") 
					or die(mysql_error());

?>
	<h1><?php echo $titulo; ?></h1>
	<div class="info">Postado por <?php echo $autor; ?> | Data <?php echo $data ?> | Categoria <?php echo $categoria; ?> | Nº visitas <?php echo $visitas ?></div>
	<img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=233&w=510&zc=1&q=90 ">
	<p><?php echo $texto; ?></p>
<?php
	}
	}
	}					
	}
?>

<!-- #####################################################################################################################
		ARQUIVO DE EXIBIÇÃO DE MATERIAS
#####################################################################################################################   -->


<!--((((((((((((((((((((((((((((((((((((((	EXIBE CATEGORIA	)))))))))))))))))))))))))))))))))))))) -->
	<!--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&   EXIBE CATEGORIA_NOTICIAS &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&-->
		<?php 
		function get_categoria_noticias(){

				//paginação
				$pag = "$_GET[pag]";
				if($pag >= '1'){
				 $pag = $pag;
				}else{
				 $pag = '1';
				}

				$maximo = '5'; //RESULTADOS POR PÁGINA
				$inicio = ($pag * $maximo) - $maximo;

				$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'noticias' ORDER BY id DESC LIMIT $inicio,$maximo");
				$contar = mysql_num_rows($sql);

				if ($contar <='0') {
					echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
					# code...
				}else{
					while($rs =  mysql_fetch_array($sql)){
						$id = $rs['0'];
						$foto = $rs['1'];
						$titulo = $rs['2'];
						$texto = $rs['3'];
						$categoria = $rs['4'];
						$data = $rs['5'];
						$autor = $rs['6'];
						$visitas = $rs['7'];					
						
			
		 ?>
	<li><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">
		 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
		 <p>
		 <?php echo strip_tags(trim(str_truncate($texto, 140, $rep))); ?>
		 </a>
		 </p>
	</li>

	<?php					
					}
				}
			

	 ?>

	 <?php

	//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
	//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
	$sql_res = mysql_query("SELECT * FROM site_posts
							WHERE categoria = 'noticias'");
	$total = mysql_num_rows($sql_res);

	$paginas = ceil($total/$maximo);
	$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

	echo "<a href=\"categorias.php?categoria=noticias&pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

	for ($i = $pag-$links; $i <= $pag-1; $i++){
	if ($i <= 0){
	}else{
	echo"<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

	}
	}echo "$pag &nbsp;&nbsp;&nbsp;";

	for($i = $pag +1; $i <= $pag+$links; $i++){
		if($i > $paginas){
			}else{
	echo "<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
			}
		}
	echo "<a href=\"categorias.php?categoria=noticias&pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
	?>

	<?php
		}
	?>
	<!--&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&   EXIBE CATEGORIA_NOTICIAS &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&-->

	<!--********************************* EXIBE CATEGORIA_CULTURA ******************************-->
		<?php 
		function get_categoria_cultura(){

				//paginação
				$pag = "$_GET[pag]";
				if($pag >= '1'){
				 $pag = $pag;
				}else{
				 $pag = '1';
				}

				$maximo = '5'; //RESULTADOS POR PÁGINA
				$inicio = ($pag * $maximo) - $maximo;

				$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'cultura' ORDER BY id DESC LIMIT $inicio,$maximo");
				$contar = mysql_num_rows($sql);

				if ($contar <='0') {
					echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
					# code...
				}else{
					while($rs =  mysql_fetch_array($sql)){
						$id = $rs['0'];
						$foto = $rs['1'];
						$titulo = $rs['2'];
						$texto = $rs['3'];
						$categoria = $rs['4'];
						$data = $rs['5'];
						$autor = $rs['6'];
						$visitas = $rs['7'];					
						
			
		 ?>
	<li><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">
		 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
		 <p>
		 <?php echo strip_tags(trim(str_truncate($texto, 140, $rep))); ?>
		 </a>
		 </p>
	</li>

	<?php					
					}
				}
			

	 ?>

	 <?php

	//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
	//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
	$sql_res = mysql_query("SELECT * FROM site_posts
							WHERE categoria = 'cultura'");
	$total = mysql_num_rows($sql_res);

	$paginas = ceil($total/$maximo);
	$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

	echo "<a href=\"categorias.php?categoria=noticias&pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

	for ($i = $pag-$links; $i <= $pag-1; $i++){
	if ($i <= 0){
	}else{
	echo"<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

	}
	}echo "$pag &nbsp;&nbsp;&nbsp;";

	for($i = $pag +1; $i <= $pag+$links; $i++){
		if($i > $paginas){
			}else{
	echo "<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
			}
		}
	echo "<a href=\"categorias.php?categoria=noticias&pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
	?>

	<?php
		}
	?>
<!--********************************* EXIBE CATEGORIA_CULTURA ******************************-->

	<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% EXIBE CATEGORIA_EVENTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
		<?php 
		function get_categoria_eventos(){

				//paginação
				$pag = "$_GET[pag]";
				if($pag >= '1'){
				 $pag = $pag;
				}else{
				 $pag = '1';
				}

				$maximo = '5'; //RESULTADOS POR PÁGINA
				$inicio = ($pag * $maximo) - $maximo;

				$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'eventos' ORDER BY id DESC LIMIT $inicio,$maximo");
				$contar = mysql_num_rows($sql);

				if ($contar <='0') {
					echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
					# code...
				}else{
					while($rs =  mysql_fetch_array($sql)){
						$id = $rs['0'];
						$foto = $rs['1'];
						$titulo = $rs['2'];
						$texto = $rs['3'];
						$categoria = $rs['4'];
						$data = $rs['5'];
						$autor = $rs['6'];
						$visitas = $rs['7'];					
						
			
		 ?>
	<li><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">
		 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
		 <p>
		 <?php echo strip_tags(trim(str_truncate($texto, 140, $rep))); ?>
		 </a>
		 </p>
	</li>

	<?php					
					}
				}
			

	 ?>

	 <?php

	//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
	//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
	$sql_res = mysql_query("SELECT * FROM site_posts
							WHERE categoria = 'eventos'");
	$total = mysql_num_rows($sql_res);

	$paginas = ceil($total/$maximo);
	$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

	echo "<a href=\"categorias.php?categoria=noticias&pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

	for ($i = $pag-$links; $i <= $pag-1; $i++){
	if ($i <= 0){
	}else{
	echo"<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

	}
	}echo "$pag &nbsp;&nbsp;&nbsp;";

	for($i = $pag +1; $i <= $pag+$links; $i++){
		if($i > $paginas){
			}else{
	echo "<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
			}
		}
	echo "<a href=\"categorias.php?categoria=noticias&pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
	?>

	<?php
		}
	?>
<!--********************************* EXIBE CATEGORIA_EVENTOS ******************************-->

<!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{ EXIBE CATERIA_ESPECIAIS}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->
		<?php 
		function get_categoria_especiais(){

				//paginação
				$pag = "$_GET[pag]";
				if($pag >= '1'){
				 $pag = $pag;
				}else{
				 $pag = '1';
				}

				$maximo = '5'; //RESULTADOS POR PÁGINA
				$inicio = ($pag * $maximo) - $maximo;

				$sql = mysql_query("SELECT * FROM site_posts WhERE categoria = 'especiais' ORDER BY id DESC LIMIT $inicio,$maximo");
				$contar = mysql_num_rows($sql);

				if ($contar <='0') {
					echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
					# code...
				}else{
					while($rs =  mysql_fetch_array($sql)){
						$id = $rs['0'];
						$foto = $rs['1'];
						$titulo = $rs['2'];
						$texto = $rs['3'];
						$categoria = $rs['4'];
						$data = $rs['5'];
						$autor = $rs['6'];
						$visitas = $rs['7'];					
						
			
		 ?>
	<li><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>">
		 <img src="timthumb.php?src=upload/posts/<?php echo $foto; ?>&h=75&w=100&zc=1&q=90 ">
		 <p>
		 <?php echo strip_tags(trim(str_truncate($texto, 140, $rep))); ?>
		 </a>
		 </p>
	</li>

	<?php					
					}
				}
			

	 ?>

	 <?php

	//USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
	//SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
	$sql_res = mysql_query("SELECT * FROM site_posts
							WHERE categoria = 'especiais'");
	$total = mysql_num_rows($sql_res);

	$paginas = ceil($total/$maximo);
	$links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

	echo "<a href=\"categorias.php?categoria=noticias&pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

	for ($i = $pag-$links; $i <= $pag-1; $i++){
	if ($i <= 0){
	}else{
	echo"<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

	}
	}echo "$pag &nbsp;&nbsp;&nbsp;";

	for($i = $pag +1; $i <= $pag+$links; $i++){
		if($i > $paginas){
			}else{
	echo "<a href=\"categorias.php?categoria=noticias&pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
			}
		}
	echo "<a href=\"categorias.php?categoria=noticias&pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
	?>

	<?php
		}
	?>
<!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{ EXIBE CATERIA_ESPECIAIS}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->

<!--((((((((((((((((((((((((((((((((((((((	EXIBE CATEGORIAS	)))))))))))))))))))))))))))))))))))))) -->

<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ GET PATROCINADORES ///////////////////////////////////////////-->
<?php 
		function get_patrocinadores(){
			$sql = mysql_query("SELECT * FROM site_patrocinadores ORDER BY id DESC LIMIT 3");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$foto = $rs['1'];
					$titulo = $rs['2'];					
					# code...
?><li>
	 <img src="timthumb.php?src=patro/<?php echo $foto; ?>&h=44&w=5&4zc=1&q=90 ">
	 <p><?php echo strip_tags(trim(str_truncate($titulo, 150, $rep))); ?><a href="exibir.php?site=exibir&amp;id=<?php echo $id; ?>"></a></p>
</li>
<?php					
				}
			}
		}

 ?>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ GET PATROCINADORES ///////////////////////////////////////////-->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% GET SITES_INDICADOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<?php 
		function get_sites_indicados(){
			$sql = mysql_query("SELECT * FROM site_indicados ORDER BY id DESC LIMIT 5");
			$contar = mysql_num_rows($sql);

			if ($contar <='0') {
				echo "<p>Etamos alimentando o nosso site. Por favor volte mais tarde</p>";
				# code...
			}else{
				while($rs =  mysql_fetch_array($sql)){
					$id = $rs['0'];
					$nome = $rs['1'];
					$url = $rs['2'];					
					# code...
?><li>
	 <p><a href="<?php echo $url; ?>"><?php echo $nome; ?></a></p>
	 
</li>
<?php					
				}
			}
		}

 ?>
 <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% GET SITES_INDICADOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->