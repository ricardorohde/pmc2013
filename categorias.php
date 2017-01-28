
<?php
	include "header.php";
?>

	<section id="geral"> <!-- AREA PRINCIPAL DO SITE -->		
		<div id="googlenews"> <!-- Google News -->
			<div class="noticias"> <!-- Rotatoria de Noticias -->
				<!--	<iframe frameborder="0" width="728" height="90" marginwidth="0" marginheight="0"
  					 src="http://www.google.com/uds/modules/elements/newsshow/iframe.html?topic=h&rsz=small&format=728x90">
					</iframe>		-->
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
			
			<div class="categorias"><!-- Categorias -->
				<ul>
				
				<?php get_exibe_categorias(); ?>
				
				</ul>
			</div>	<!-- Categorias -->
				
		</div><!-- Paginas -->

	
		
	<!-- CHAMAR AS SIDEBAR -->
	<?php
	include "sidebars.php";
?>


	

	<!--Rodape-->
	<?php
	include "rodape.php";
?>