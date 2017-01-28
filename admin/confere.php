<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="scripts/tiny_func.js"></script>
<script type="text/javascript" src="scripts/cadastro_posts_func.js"></script>
<script type="text/javascript" src="scripts/validate.js"></script>
<script type="text/javascript" src="scripts/validate_func.js"></script>
<script type="text/javascript" src="scripts/validate_func_edit.js"></script>
<script type="text/javascript">
 function AddCampo(id){
 el = document.getElementById(id);
 el.innerHTML += '<label><span>Resposta:</span><input type="text" name="resposta[]" /></label>';
 }
</script>



<?php 
	session_start();
	include 'config.php';

	if(isset($_SESSION['login_usuario']) AND isset($_SESSION['senha_usuario'])){
		$login_usuario = $_SESSION['login_usuario'];
		$senha_usuario = $_SESSION['senha_usuario'];

			$sql = mysql_query("SELECT * FROM adm WHERE login = '$login_usuario'") or die(mysql_error());
 		$contar = mysql_num_rows($sql);
 			while ($linha = mysql_fetch_array($sql)) {

 				# code...
 				$senha_db = $linha['senha'];

 			}

 				if($contar == 0 ){
 					unset($_SESSION['login_usuario']);
				 	unset($_SESSION['senha_usuario']);
 					header('Location: login.php');
 				}
 				if($senha_db != $senha_usuario){ 					
 						unset($_SESSION['login_usuario']);
					 	unset($_SESSION['senha_usuario']);
	 					header('Location: login.php'); 						
 					}
	}else{
		//header('Location: index.php');
		header('Location: login.php');
	}