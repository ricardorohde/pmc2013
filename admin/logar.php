<?php
 include 'config.php'; 
 $login = $_POST['login'];
 $senha = $_POST['senha'];

 	$sql = mysql_query("SELECT * FROM adm WHERE login = '$login'") or die(mysql_error());
 		$contar = mysql_num_rows($sql);
 			while ($linha = mysql_fetch_array($sql)) {

 				# code...
 				$senha_db = $linha['senha'];

 			}

 				if($contar == 0 ){
 					header('Location: login.php');
 				}else{
 					if($senha_db != $senha){
 						header('Location: login.php');	
 					}else{
 						session_start();
 						$_SESSION['login_usuario'] = $login;
 						$_SESSION['senha_usuario'] = $senha;

 						header('Location: index.php');
 					}
 				}
?>
