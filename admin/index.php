<?php include 'confere.php'; ?>
<?php 
	include 'config.php';
	date_default_timezone_set('America/Sao_Paulo');
	session_start();
	$login_usuario = $_SESSION['login_usuario'];

		$sql = mysql_query("SELECT * FROM adm WHERE login = '$login_usuario'") or die(mysql_error()); 		
 			while ($linha = mysql_fetch_array($sql)) {

 				# code...
 				$nome = $linha['login'];

 			}
 ?>
	<!DOCTYPE <!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Painel de Administração 1.0 - Connectiva Systems</title>
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript" src="../scripts/shadowbox/shadowbox.js" ></script>
		<script type="text/javascript" src="../scripts/shadowbox/funcoes_shadowbox.js" ></script>
		<link href="../scripts/shadowbox/shadowbox.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="box"> <!-- Box -->
		
			<div id="header"><!-- Header -->
			<h1>Painel Administrativo 1.0 - Connectiva Systems</h1>
				<img src="../imgs/logo/Connectiva Systems.png" width="100" height="100" alt="">
				<p><strong>  Bem vindo</strong> <?php echo  ucfirst($nome); ?>  | Hoje é dia <?php echo date('d') ?>
				 do mês<?php echo date('m') ?>  de<?php echo date('y') ?> | <strong> Agora são </strong><?php echo date('H:i') ?>
				 | <a href="logout.php">Sair</a> 
			  </p>			
		  </div><!-- Header -->
				 <div id="painel"><!-- painel -->
				 	<p>&nbsp;</p>
				 	<table width="700" border="0" align="center" cellpadding="5" cellspacing="5">
                      <tr>
                        <td><div align="center"><strong>Cadastros</strong></div></td>
                        <td><div align="center"><strong>Edição</strong></div></td>
                        <td><div align="center"><strong>Moderação</strong></div></td>
                      </tr>
                      <tr>
                        <td><p><a href="post_cadastra.php" rel="shadowbox"><img src="icons/8.png" width="64" height="64" align="" border="0">Nova postagem </a></p>                        </td>
                        <td><a href="post_listar.php" rel="shadowbox"><img src="icons/11.png" width="64" height="64" border="0">Postagens</a></td>
                        <td><a href="m_coments.php" rel="shadowbox"><img src="icons/54.png" width="64" height="64" border="0">Comentarios</a></td>
                      </tr>
                      <tr>
                        <td><a href="cad_patrocinadores.php" rel="shadowbox"><img src="icons/8.png" width="64" height="64" border="0">Patrocinadores</a></td>
                        <td><a href="criar_galerias.php" rel="shadowbox"><img src="icons/125.png" width="64" height="64" border="0">Galerias</a></td>
                        <td><a href="news.php" rel="shadowbox"><img src="icons/44.png" width="64" height="64" border="0">Newsleter</a></td>
                      </tr>
                      <tr>
                        <td><a href="cad_sites.php" rel="shadowbox"><img src="icons/8.png" width="64" height="64" border="0">Links uteis </a></td>
                        <td>&nbsp;</td>
                        <td><a href="criar_enquete.php" rel="shadowbox"><img src="icons/10.png" width="64" height="64" border="0">Enquetes</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="http://localhost/pmc" target="_blank"><img src="icons/10.png" width="64" height="64">Visualizar site</a></td>
                      </tr>
                    </table>
				 	<p>&nbsp;   </p>
				 </div><!-- painel -->
					 <div id="footer"><!-- Footer-->
					 	Roda Casco
					 </div><!-- Footer-->
		</div><!-- Box -->

	</body>
	</html>