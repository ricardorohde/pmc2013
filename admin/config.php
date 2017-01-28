<?php error_reporting(0) ?>
<?php 
	$db = mysql_connect("localhost", "root", "");
	$dados = mysql_select_db("portal", $db);
 ?>