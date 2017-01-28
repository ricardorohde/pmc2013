<?php include 'config.php';?>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
 function AddCampo(id){
 el = document.getElementById(id);
 el.innerHTML += '<label><span>Resposta:</span><input type="text" name="resposta[]" /></label>';
 }
 </script>>
<div id="painel">
<?php if(isset($_POST['cadastra_pergunta']) && $_POST['cadastra_pergunta'] == 'ok'){

 $pergunta = $_POST['pergunta'];

 if(empty($pergunta)){
 $retorno = '<div>Você precisa digitar a pergunta!</div>';
 }if(empty($retorno)){

 $data = date('Y-m-d H:i:s');

 $cadastrar_pergunta = mysql_query("INSERT INTO questions (ques, created_on) VALUES ('$pergunta', '$data')")
 or die(mysql_error());

 if($cadastrar_pergunta == '1'){
 echo "<div class=\"ok\">A pergunta <strong>$pergunta</strong>, foi cadastrada com sucesco!</div>";
 }else{
 echo "<div class=\"no\">Erro ao cadastrar a pergunta, tente novamente!</div>";
 }

 }
}
?>

<?php if(isset($_POST['cadastra_resposta']) && $_POST['cadastra_resposta'] == 'ok'){

 $id_resposta = $_POST['id_resposta'];
 $resposta = $_POST['resposta'];

 if($id_resposta == '-1'){
 $retorno = "<div class=\"no\">Selecione uma das enquetes</div>";
 }else{

 $contar = count($resposta);
 for($i = 0; $i < $contar; $i++){

 if(empty($resposta[$i])){
 $retorno = "<div class=\"no\">Existe uma resposta em branco, <strong>a mesma não foi cadastrada!</strong></div>";
 }if(empty($retorno)){

 $cadastrar_resposta = mysql_query("INSERT INTO options (ques_id, value) VALUES ('$id_resposta', '$resposta[$i]')")
 or die(mysql_error());

 if($cadastrar_resposta == '1'){
 echo "<div class=\"ok\">A resposta <strong>$resposta[$i]</strong>, foi cadastrada com sucesco!</div>";
 }else{
 echo "<div class=\"no\">Erro ao cadastrar a resposta, tente novamente!</div>";
 }
 }
 }
 }
}
?>

<?php if(isset($_POST['excluir_enquete']) && $_POST['excluir_enquete'] == 'ok'){

 $enquete = $_POST['id_enquete'];

 $pega_option = mysql_query("SELECT id FROM options WHERE ques_id = '$enquete'")
 or die(mysql_error());

 while($option=mysql_fetch_array($pega_option)){

 $id_option = $option[0];

 $deleta = mysql_query("DELETE FROM votes WHERE option_id = '$id_option'")
 or die(mysql_error());
 $deleta .= mysql_query("DELETE FROM options WHERE ques_id = '$enquete'")
 or die(mysql_error());
 }

 $del_enquete = mysql_query("DELETE FROM questions WHERE id = '$enquete'")
 or die(mysql_error());

 if($del_enquete >= '1'){
 echo "<div class=\"ok\">Enquete totalmente excluida do sistema</div>";
 }else{
 echo "<div class=\"no\">Erro ao excluir enquete!</div>";
 }

}
?>

<?php
if(isset($retorno)){
 echo $retorno;
}
?>
  <h1>Cadastre sua pergunta!</h1>
 <form method="post" action="" name="pergunta" enctype="multipart/form-data">
 <label>

 <input type="text" name="pergunta" />
 </label>
 <input type="hidden" name="cadastra_pergunta" value="ok" />
 <input name="Cadastrar" type="submit" class="cadastro_btn" value="Cadastrar" />
 </form>

 <h1>Cadastrar Respostas</h1>

 <form method="post" action="" name="resposta" enctype="multipart/form-data">
 <select name="id_resposta" id="id_resposta">
 <option value="-1">Selecione uma das perguntas</option>
<?php

$pegar_pergunta = mysql_query("SELECT id, ques FROM questions")
 or die(mysql_error());

while($res_pergunta=mysql_fetch_array($pegar_pergunta)){

 $id_pergunta = $res_pergunta[0];
 $pergunta = $res_pergunta[1];

?>
 <option value="<?php echo $id_pergunta;?>"><?php echo $pergunta; ?></option>

<?php
}
?>
 </select>
 <label>
 <span>Resposta:</span>
 <input type="text" name="resposta[]" />
 </label>
 <div id="resposta"></div>
 <a href="#addstat" onclick="AddCampo('resposta')"><p style="color:000; margin:10px;">Adicionar Novo Campo</p></a>

 <input type="hidden" name="cadastra_resposta" value="ok" />
 <input name="Cadastrar" type="submit" class="cadastro_btn" value="Cadastrar" />
 </form>

 <h1>Excluir Enquete</h1>

 <form method="post" enctype="multipart/form-data" name="exclur" action="">
 <select name="id_enquete" id="id_enquete">
 <option value="-1">Selecione uma das perguntas</option>
<?php

$pegar_pergunta = mysql_query("SELECT id, ques FROM questions")
 or die(mysql_error());

while($res_pergunta=mysql_fetch_array($pegar_pergunta)){

 $id_pergunta = $res_pergunta[0];
 $pergunta = $res_pergunta[1];

?>
 <option value="<?php echo $id_pergunta;?>"><?php echo $pergunta; ?></option>

<?php
}
?>
 </select>

 <input type="hidden" name="excluir_enquete" value="ok" />
 <input name="Exluir" type="submit" class="cadastro_btn" value="Excluir" />

 </form>
 </div>