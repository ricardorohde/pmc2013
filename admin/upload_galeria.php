<?php include 'confere.php'; ?>
<?php include "config.php"; ?>
<?php include "scripts.php";?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<title>Painel de Administra&ccedil;&atilde;o de Sites</title>

</head>

<body>
<table width="800" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <th height="100" colspan="2" valign="top" bgcolor="#003366" scope="col"><h2>Gerador de Galerias - Connectiva Systems </h2></th>
  </tr>
  <tr>
    <td width="254" valign="top" bgcolor="#F0F0F0"><?php include "menu.php";?></td>
    <td width="530" valign="top" bgcolor="#999999">

<div id="conteudo">  
<script type="text/javascript" src="../scripts/jquery.js"></script>
<script type="text/javascript" src="../scripts/jquery.MultiFile.js"></script>
<?php if(isset($_POST['upload'])){
 $id_post = $_GET['id'];
 $pasta = '../upload/galerias/';
 foreach($_FILES["img"]["error"] as $key => $error){

 if($error == UPLOAD_ERR_OK){
 $tmp_name = $_FILES["img"]["tmp_name"][$key];
 $cod = md5(uniqid(rand(), true)) . $_FILES["img"]["name"][$key];

 $nome = $_FILES["img"]["name"][$key];
 $uploadfile = $pasta . basename($cod);

 if(move_uploaded_file($tmp_name, $uploadfile)){
 echo "O Arquivo " . $nome . " foi enviado com sucesso!<br />";
 $inserir = mysql_query("INSERT INTO site_fotos (img, id_post) VALUES ('$cod','$id_post')");
 }else{
 echo "Erro ao enviar o arquivo " . $nome . "! Por favor tente outra vez!";
 } } } } ?>
 
<form name="upload_files" action="" enctype="multipart/form-data" method="post">
<input type="hidden" name="id_post" value="<?php echo $_GET['id'];?>" />
<input type="file" name="img[]" class="multi" maxlength="100" accept="jpeg|jpg|png|gif" />
<input name="upload" type="submit" class="cadastro_btn" value="Enviar Fotos" />
</form>

<a href="criar_galerias.php"><p>Concluído</p></a>
</div>   
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top" bgcolor="#003366"><p>&copy; 2015 Connectiva Systems </p></td>
  </tr>
</table>
</body>
</html>