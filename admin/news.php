<?php include "config.php" ?>
<?php include "scripts.php" ?>
<div id="conteudo">
	<form name="news" method="post" action="../news_funcoes.php?funcao=enviar">
		<input type="text" name="assunto" id="assunto" size="40"> 
		<textarea name="codigo" cols="50" rows="5" id="codigo"></textarea>
		<input type="submit" name="button" value="Enviar">				
	</form>
</div>