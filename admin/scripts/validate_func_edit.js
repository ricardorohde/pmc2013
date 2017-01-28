  $(document).ready(function(){
							 
						 
			$("#editar_posts").validate({
						   
				rules:{
				titulo:{required: true, minlength: 5},
				categoria:{required: true},
				},
				
				messages:{
				titulo:{required: "Preencha o titulo, por favor!", minlength: "No minimo 5 caracteres devem ser digitados aqui"},
				categoria:{required: "Selecione a categoria do seu post"},
				},						   

			});
			
  });