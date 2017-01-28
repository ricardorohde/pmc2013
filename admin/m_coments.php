<?php include 'confere.php'; ?>
<meta charset="utf8">
<!--<link rel="stylesheet" href="scripts/css.css">-->

<div id="painel">

<?php include "config.php"; ?>

  <?php 
    if(isset($_POST['moderar']) && $_POST['moderar'] == 'ok'){
      $aceitar = mysql_query("UPDATE coment SET status = 'aprovado' WHERE id = '$_POST[id]'") or die(mysql_error());
}
   ?>

   <?php 
    if(isset($_POST['moderar']) && $_POST['moderar'] == 'no'){
      $recusar = mysql_query("DELETE FROM coment WHERE id = '$_POST[id]'") or die(mysql_error());
}
   ?>
<table width="800" border="1">
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Usuarios</td>
    <td>Dados do Usuario </td>
    <td>Comentario</td>
    <td>Dados</td>
    <td>Aceitar</td>
    <td>Recusar</td>
  </tr>

  <?php  
        //paginação
        $pag = "$_GET[aguardando]";
        if($pag >= '1'){
         $pag = $pag;
        }else{
         $pag = '1';
        }

        $maximo = '8'; //RESULTADOS POR PÁGINA
        $inicio = ($pag * $maximo) - $maximo;

  $noticias = mysql_query("SELECT * FROM coment WHERE status = 'aguardando' ORDER BY id DESC LIMIT $inicio, $maximo") or die(mysql_error());

        if(mysql_num_rows($noticias)<='0'){
          echo "Sem Comentarios";
        }else{
          while($res_noticias = mysql_fetch_array($noticias)){
            $id = $res_noticias[0];           
            $nome = $res_noticias[1];
            $email = $res_noticias[2];
            $mostra_comentario = $res_noticias[3];
            $post_id = $res_noticias[4];
            $ip = $res_noticias[5];
            $status = $res_noticias[6];   

            //Gravatar
            $default = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60";
            $size = 60;
            $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5( strtolower( $email ) ) ."&default=" . urlencode( $default ) ."&size=" . $size;

  ?>

    <!-- Puxa os posts -->

    <?php 
      $posts = mysql_query("SELECT titulo FROM site_posts WHERE id = '$post_id'") or die(mysql_error());

        if(mysql_num_rows($posts)<='0'){
          echo "Noticias não encontradas";
        }else{
          while($res_posts = mysql_fetch_array($posts)){            
            $titulo = $res_posts[0];
            
  ?>    

    <!-- Puxa os posts -->

  <tr>
    <td> <img src="<?php echo $grav_url; ?>" alt=""></td>
    <td>
      Nome: <?php echo $nome; ?><br>
      E-mail: <?php echo $email; ?><br>
      IP: <?php echo $ip; ?><br>
    </td>
    <td><?php echo $mostra_comentario; ?></td>
    <td><?php echo $titulo; ?></td>


    <td>
      <form action="" name="aceitar" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="moderar" value="ok">
        <input name="editar" type="submit" class="cadastro_btn" value="Aceitar" />
      </form>    
    </td>

    <td>
     <form action="" name="aceitar" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="moderar" value="no">
        <input name="editar" type="submit" class="cadastro_btn" value="Recusar" />
      </form>   
    </td>
  </tr>
  <?php
    }
      }
        }
          }
  ?>
</table>
  <?php

  //USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
  //SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
  $sql_res = mysql_query("SELECT * FROM coment");
  $total = mysql_num_rows($sql_res);

  $paginas = ceil($total/$maximo);
  $links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

  echo "<a href=\"m_coments.php?aguardando=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

  for ($i = $pag-$links; $i <= $pag-1; $i++){
  if ($i <= 0){
  }else{
  echo"<a href=\"m_coments.php?aguardando=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

  }
  }echo "$pag &nbsp;&nbsp;&nbsp;";

  for($i = $pag +1; $i <= $pag+$links; $i++){
    if($i > $paginas){
      }else{
  echo "<a href=\"m_coments.php?aguardando=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
      }
    }
  echo "<a href=\"m_coments.php?aguardando=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
  ?>


  <!-- ########################## COMENTARIOS JÁ GRAVADOS ############################### -->

  <table width="800" border="1">
  <tr>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Usuarios</td>
    <td>Dados do Usuario </td>
    <td>Comentario</td>
    <td>Dados</td>
    <td>Aceitar</td>
    <td>Recusar</td>
  </tr>

  <?php  
        //paginação
        $pag = "$_GET[aprovado]";
        if($pag >= '1'){
         $pag = $pag;
        }else{
         $pag = '1';
        }

        $maximo = '8'; //RESULTADOS POR PÁGINA
        $inicio = ($pag * $maximo) - $maximo;

  $noticias = mysql_query("SELECT * FROM coment WHERE status = 'aprovado' ORDER BY id DESC LIMIT $inicio, $maximo") or die(mysql_error());

        if(mysql_num_rows($noticias)<='0'){
          echo "Sem Comentarios";
        }else{
          while($res_noticias = mysql_fetch_array($noticias)){
            $id = $res_noticias[0];           
            $nome = $res_noticias[1];
            $email = $res_noticias[2];
            $mostra_comentario = $res_noticias[3];
            $post_id = $res_noticias[4];
            $ip = $res_noticias[5];
            $status = $res_noticias[6];   

            //Gravatar
            $default = "http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60";
            $size = 60;
            $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5( strtolower( $email ) ) ."&default=" . urlencode( $default ) ."&size=" . $size;

  ?>

    <!-- Puxa os posts -->

    <?php 
      $posts = mysql_query("SELECT titulo FROM site_posts WHERE id = '$post_id'") or die(mysql_error());

        if(mysql_num_rows($posts)<='0'){
          echo "Noticias não encontradas";
        }else{
          while($res_posts = mysql_fetch_array($posts)){            
            $titulo = $res_posts[0];
            
  ?>    

    <!-- Puxa os posts -->

  <tr>
    <td> <img src="<?php echo $grav_url; ?>" alt=""></td>
    <td>
      Nome: <?php echo $nome; ?><br>
      E-mail: <?php echo $email; ?><br>
      IP: <?php echo $ip; ?><br>
    </td>
    <td><?php echo $mostra_comentario; ?></td>
    <td><?php echo $titulo; ?></td>


    <td>
     -
    </td>

    <td>
     <form action="" name="aceitar" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="moderar" value="no">
        <input name="editar" type="submit" class="cadastro_btn" value="Excluir" />
      </form>   
    </td>
  </tr>
  <?php
    }
      }
        }
          }
  ?>
</table>
  <?php

  //USE A MESMA SQL QUE QUE USOU PARA RECUPERAR OS RESULTADOS
  //SE TIVER A PROPRIEDADE WHERE USE A MESMA TAMBÉM
  $sql_res = mysql_query("SELECT * FROM coment");
  $total = mysql_num_rows($sql_res);

  $paginas = ceil($total/$maximo);
  $links = '5'; //QUANTIDADE DE LINKS NO PAGINATOR

  echo "<a href=\"m_coments.php?aprovado=1\">Primeira Página</a>&nbsp;&nbsp;&nbsp;";

  for ($i = $pag-$links; $i <= $pag-1; $i++){
  if ($i <= 0){
  }else{
  echo"<a href=\"m_coments.php?aprovado=$i\">$i</a>&nbsp;&nbsp;&nbsp;";

  }
  }echo "$pag &nbsp;&nbsp;&nbsp;";

  for($i = $pag +1; $i <= $pag+$links; $i++){
    if($i > $paginas){
      }else{
  echo "<a href=\"m_coments.php?aprovado=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
      }
    }
  echo "<a href=\"m_coments.php?aprovado=$paginas\">Última página</a>&nbsp;&nbsp;&nbsp;";
  ?>

  <!-- ########################## COMENTARIOS JÁ GRAVADOS ############################### -->
  </div>