  $(document).ready(function(){
							 
						 
			$("#cadastrar_posts").validate({
						   
				rules:{
				foto:{required:true},
				titulo:{required: true, minlength: 5},
				autor:{required: true, minlength: 5},
				categoria:{required: true},
				},
				
				messages:{
			    foto:{required: "A imagem deve ser informada"},
				titulo:{required: "Preencha o titulo, por favor!", minlength: "No minimo 5 caracteres devem ser digitados aqui"},
				autor:{required: "O nome do autor é obrigátorio", minlength: "No minimo 5 caracteres devem ser digitados aqui"},
				categoria:{required: "Selecione a categoria do seu post"},
				},						   

			});
			
  });