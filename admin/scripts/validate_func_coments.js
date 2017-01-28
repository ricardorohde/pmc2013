  $(document).ready(function(){
							 
						 
			$("#comentar_posts").validate({
						   
				rules:{
				nome:{required:true},
				contact:{required: true},
				comentario:{required: true, minlength: 5},
				},
				
				messages:{
			    nome:{required: "Informe seu nome"},
				contact:{required: "Informe seu email!"},
				comentario:{required: "Digite um comentario", minlength: "No minimo 5 caracteres devem ser digitados aqui"},
				},						   

			});
			
  });