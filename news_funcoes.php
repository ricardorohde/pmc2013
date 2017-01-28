<?php
if($_GET['funcao'] == "cadastrar"){

//PEGA OS DADOS ENVIADOS PELO FORMULÁRIO
	$email	=	$_POST["txt_email"];
	
	//PREPARA O CONTEÚDO A SER GRAVADO
	$conteudo	=	"$email\r\n";
	
	//ARQUIVO TXT
	$arquivo	=	"admin/lista_news.txt";
	
	//TENTA ABRIR O ARQUIVO TXT
	if (!$abrir = fopen($arquivo, "a")) {
         echo  "Erro abrindo arquivo ($arquivo)";
         exit;
    }
	
	//ESCREVE NO ARQUIVO TXT
	if (!fwrite($abrir, $conteudo)) {
        print "Erro escrevendo no arquivo ($arquivo)";
        exit;
    }
		
	//FECHA O ARQUIVO 
	fclose($abrir);
?>
<script language="JavaScript">alert('Seu email foi cadastrado!');
        location.href='http://localhost/pmc';
</script>
<?php
}
?>
<?php
if($_GET['funcao'] == "enviar"){
	// lista.txt é onde está os e-mails, um em cada linha 
$lendo = @fopen("admin/lista_news.txt","r"); 
if (!$lendo) { 
echo "Erro ao abrir a Lista de emails.<br>"; 
exit; 
} 

// assunto do e-mail enviado 
$assunto = $_POST['assunto']; 

// mensagem do e-mail enviado 
$mensagem = $_POST['codigo']; 

// seu e-mail 
$seu_email = "seu email"; 

$posicao = 0; 
while (!feof($lendo)) { 
$linha = fgets($lendo,256); 
mail("$linha","$assunto","$mensagem","From: < $seu_email > Content-type: text/txt"); 
} 
echo "Mensagem Enviada!"; 
fclose($lendo);
}
?>