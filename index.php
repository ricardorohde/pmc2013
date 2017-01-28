
<?php
	include "header.php";
?>
</script>
	<section id="geral"> <!-- AREA PRINCIPAL DO SITE -->		
		<div id="googlenews"> <!-- Google News -->
			<div class="noticias"> <!-- Rotatoria de Noticias -->
					<iframe frameborder="0" width="728" height="90" marginwidth="0" marginheight="0"
  					 src="http://www.google.com/uds/modules/elements/newsshow/iframe.html?topic=h&rsz=small&format=728x90">
					</iframe>		 
			
		</div>
	<div id="main"> <!-- Div  Main -->
		<div class="post">	<!-- Area das ultimas noticias -->

			<?php get_destaque(); ?>			
		</div>

		<div id="tabs"> <!-- Abas -->
			 <ul>
			 	<li><a href="#tabs-1">Noticias</a></li>
			 	<li><a href="#tabs-2">Eventos</a></li>
			 	<li><a href="#tabs-3">Cutltura</a></li>
			 	<li><a href="#tabs-4">Especiais</a></li>
			 	<li><a href="#tabs-5">Esportes</a></li>
			 </ul>
					<div id="tabs-1">
						<ul>						
							<?php get_noticias_random(); ?>										
						</ul>			
					</div>

						<div id="tabs-2">
							<ul>
							<?php get_eventos_random(); ?>
							</ul>				
						</div>

							<div id="tabs-3">
								<ul>
								<?php  get_cultura_random(); ?>
								</ul>				
							</div>

								<div id="tabs-4">
									<ul>
									<?php get_especiais_random(); ?>
									</ul>				
								</div>


									<div id="tabs-5">
										<ul>
										<?php get_esportes_random(); ?>
										</ul>										
									</div>
	</div><!-- Abas -->

	<div id="serv">
		<h1>Destaques</h1>
		<table width="700" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td>Areas urbanas</td>
            <td>Simproc</td>
            <td>Mais alguma coisa </td>
            <td>mais alguma coisa </td>
          </tr>
          <tr>
            <td><img src="imgs/urbanismo.jpg" alt="" width="306" height="289" /></td>
            <td><p><img src="imgs/logo_simproc.jpg" alt="" /> </p>
            <p>Acompanhe os seus processos </p></td>
            <td><img src="imgs/logo/log.png" width="242" height="217" /></td>
            <td><img src="imgs/logo/log.png" width="242" height="217" /></td>
          </tr>
          <tr>
            <td>Mais alguma coisa </td>
            <td>Mais alguma coisa </td>
            <td>Mais alguma coisa </td>
            <td>Mais alguma coisa </td>
          </tr>
          <tr>
            <td><img src="imgs/logo/log.png" width="242" height="217" /></td>
            <td><img src="imgs/logo/log.png" width="242" height="217" /></td>
            <td><img src="imgs/logo/log.png" width="242" height="217" /></td>
            <td><img src="imgs/logo/log.png" width="242" height="217" /></td>
          </tr>
        </table>
		<p>&nbsp;</p>
		<br>
		<h3>&nbsp;</h3>
		

		<h3>&nbsp;</h3>

		<p>Pesquise andamento do seu processo</p>
		
	</div>


	<div class="patrocinadores"><!--Patrocinadores -->
		<h1>Patrocinadores</h1>
		<ul><?php echo get_patrocinadores(); ?></ul>
	</div><!--Patrocinadores -->

		<div class="enquete"> <!-- Enquete-->
			<div id="pollcontainer"> </div>
			<h2 id="loader">Carregando</h2>
			
			
		</div><!-- Enquete-->





</div><!-- Div  Main -->
		
	<!-- CHAMAR AS SIDEBAR -->
	<?php
	include "sidebars.php";
?>


	<div id="news"><!-- Newsleter -->	
		<h1>Newsleter</h1>
			<h2>Cadastre o seu email para receber as novidades do site</h2>
		<form name="news" method="post" action="news_funcoes.php?funcao=cadastrar">
			<table>
				<tr>
					<td><input type="text" name="txt_email"></td>
					<td><input type="submit" name="button" value="Enviar"></td>
				</tr>
			</table>
		</form>
	</div><!-- Newsleter -->	

	<!--Rodape-->
	<?php
	include "rodape.php";
?>