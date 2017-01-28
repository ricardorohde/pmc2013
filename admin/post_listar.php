<?php include 'confere.php'; ?>
<meta charset="utf8">
<!--<link rel="stylesheet" href="scripts/css.css"> -->

<?php include "config.php"; ?>
<div id="painel">
  <?php 
    if(isset($_POST['excluir_post']) && $_POST['excluir_post']=='excluir'){
      $post_meta = $_POST['id_do_post'];
      $pega_imagem = mysql_query("SELECT foto, categoria FROM site_posts WHERE id = '$post_meta'") or die(mysql_error());

        if(mysql_num_rows($pega_imagem)<='0'){
          echo "Erro ao selecionar post";
        }else{
          while ($res_pega_imagem=mysql_fetch_array($pega_imagem)) {
            $thumb_meta = $res_pega_imagem[0];
            $categoria_meta = $res_pega_imagem[1];            
            chdir("../upload/posts");
            $del = unlink("$thumb_meta");

            $deletar_post = mysql_query("DELETE FROM site_posts WHERE id = '$post_meta'") or die (mysql_error());

            if($deletar_post>=1){
              echo "<div class=\"ok\">Post excluido com susesso</div>";
            }else{
              echo "<div class=\"no\">Erro ao deletar post, por favor refaça a operação <br /> Obrigado</div>";
            }
          }
        }

    }

   ?>
   
<table width="800" border="1">
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td>Data</td>
    <td>Categoria</td>
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
    <td><?php echo $data; ?> </td>
    <td><?php echo $categoria; ?></td>
    <td><?php echo $titulo; ?></td>


    <td>
      <form action="post_editar.php" name="editar_posts" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id_do_post" value="<?php echo $id_do_post; ?>">  
        <input name="editar" type="submit" class="cadastro_btn" value="Editar">
      </form>
    </td>
    <td>
      <form action="" name="excluir_posts" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id_do_post" value="<?php echo $id_do_post; ?>">  
        <input type="hidden" name="excluir_post" value="excluir">
        <input name="excluir" type="submit" class="cadastro_btn" value="Excluir">
      </form>      
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