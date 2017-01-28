<?php include 'confere.php'; ?>
<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Criação da Galeria</title>
	<?php include "scripts.php" ?>
</head>
	<body>
		<div id="conteudo">
			   
<table width="800" border="1">
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
  <tr>
    
    <td>Titulo</td>
    <td>Editar</td>
    <td>Excluir</td>
  </tr>

  <?php  
        //paginação
        $pag = "$_GET[pag]";
        if($pag >= '1'){
         $pag = $pag;
        }else{
         $pag = '1';
        }

        $maximo = '5'; //RESULTADOS POR PÁGINA
        $inicio = ($pag * $maximo) - $maximo;

  $noticias = mysql_query("SELECT * FROM site_posts ORDER BY id DESC LIMIT $inicio, $maximo") or die(mysql_error());

        if(mysql_num_rows($noticias)<='0'){
          echo "Noticias não encontradas";
        }else{
          while($res_noticias = mysql_fetch_array($noticias)){
            $id_do_post = $res_noticias[0];           
            $thumb = $res_noticias[1];
            $titulo = $res_noticias[2];
            $texto = $res_noticias[3];
            $categoria = $res_noticias[4];
            $data = $res_noticias[5];
            $autor = $res_noticias[6];
            $visitas = $res_noticias[7];
  ?>

  <tr>
   
    <td><?php echo $titulo; ?></td>


    <td>
    <a href="../exibir.php?site=exibir&id=<?php echo $id_do_post; ?>">Visualizar postagem</a>
    </td>
    <td>
    <a href="upload_galeria.php?id=<?php echo $id_do_post; ?>">Criar Galeria</a>
      <a href=""></a>
    </td>
  </tr>
  <?php
    }
      }
  ?>
</table>
  <?php

  //USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
  //SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
  $sql_res = mysql_query("SELECT * FROM site_posts");
  $total = mysql_num_rows($sql_res);

  $paginas = ceil($total/$maximo);
  $links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

  echo "<a href=\"post_listar.php?pag=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

  for ($i = $pag-$links; $i <= $pag-1; $i++){
  if ($i <= 0){
  }else{
  echo"<a href=\"post_listar.php?pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

  }
  }echo "$pag &nbsp;&nbsp;&nbsp;";

  for($i = $pag +1; $i <= $pag+$links; $i++){
    if($i > $paginas){
      }else{
  echo "<a href=\"post_listar.php?pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
      }
    }
  echo "<a href=\"post_listar.php?pag=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
  ?>
			
		</div>
		
	</body>
</html>