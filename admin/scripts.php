<?php// include "verifica.php";?>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="scripts/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/cadastro_posts_func.js"></script>
<script type="text/javascript" src="scripts/validate.js"></script>
<script type="text/javascript" src="scripts/validate_func.js"></script>
<script type="text/javascript" src="scripts/validate_func_edit.js"></script>
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="scripts/tiny_func.js"></script>
<script type="text/javascript" src="scripts/pop_up.js"></script>
<script type="text/javascript">
 function AddCampo(id){
 el = document.getElementById(id);
 el.innerHTML += '<label><span>Resposta:</span><input type="text" name="resposta[]" /></label>';
 }
</script>
