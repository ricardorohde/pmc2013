<div id="sidebar-a"><!-- Sidebar a -->
		<!-- <h1 class="titulos">Text</h1>
		<img src="upload/posts/1.jpg">
		<p>Corrente</p> -->
		<?php get_ultimas_noticias();?>

	</div><!-- Sidebar a -->
	




	<div id="sidebar-b"><!-- Sidebar b -->
		<h1 class="titulos">Corrente Agora</h1>
		<p>Clima</p>
		<h2>Facebook</h2>
		<p>Facebook</p>
		<h2>Twitter</h2>
		<p>Twitter</p>
		
		<h1 class="titulos">Antigas</h1>		
		<?php get_materias_antigas(); ?>

		<h1 class="titulos">Mais visitadas</h1>
		<?php get_materias_vistas(); ?>

		<h1 class="titulos">Links Uteis</h1>
		
		<?php  get_sites_indicados(); ?>


	</div><!-- Sidebar b -->