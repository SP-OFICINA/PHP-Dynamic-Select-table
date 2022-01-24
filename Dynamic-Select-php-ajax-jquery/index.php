<!DOCTYPE html>
<head>
	<title>Dynamic Select</title>
	<meta charset="UTF-8">
	<!-- Bootstrap CSS styles -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<!-- Bootstrap Bundle with Popper -->
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Bootstrap JS file -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Google jQuery CDN -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<!-- NAV BAR -->
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3f51b5;">
	  	<div class="container-fluid">
			<a class="navbar-brand" href="https://www.oficina.pt/">OFICINA</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=
			"#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label=
			"Toggle navigation">
		  		<span class="navbar-toggler-icon"></span>
			</button>
	  </div>
	</nav>
	<!-- NAV BAR END -->
	<!-- TITULO  -->
	<div class="row">
		<div class="col-md-12 mt-5">
		<center>
			<h1>
				Dropdown din&acirc;mica | PHP | MySql | jQuery | Ajax 
			</h1>
		</center>
		</div>
	</div>
	<!-- TITULO END -->
	<!-- SELECTS -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">			
				<!-- SELECT DISTRITO -->
				<label class="form-label" style="font-size:20px; font-style:bold;">Selecionar Distrito</label>
				<select name="distrito" id="distrito" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
					<option value="">-- distrito --</option>
						<!-- load the PHP function to fetch Distrito name -->
						<?php 
						include 'get_distritos.php';
						echo get_distrito(); 
						?>
				</select>	
				<!-- SELECT CONCELHO -->
				<label class="form-label" style="font-size:20px; font-style:bold;">Selecionar Concelho</label>
				<select name="concelho" id="concelho" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
					<option value="">-- concelho --</option>
				</select>	
				<!-- SELECT FREGUESIA -->
				<label class="form-label" style="font-size:20px; font-style:bold;">Selecionar Freguesia</label>
				<select name="freguesia" id="freguesia" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
				<option>-- freguesia --</option>
				</select>
			</div>
		</div>
	</div> 
	<!-- SELECTS END -->


<!-- jQuery FUNCTIONS -->
<!-- CHANGE DISTRITO -->
<script type="text/javascript">
	// Iniciar a função jQuery para carregar o conteudo de todas as funções após a página ser carregada completamente
	$(document).ready(function(){
		// função jQuery change para obter o valor do campo de entrada (após ser alterado) 
		$('#distrito').change(function(){
			// Armazenar o valor de entrada selecionado em distrito (id_distrito)
			var id_distrito = $(this).val();
			// Iniciar Ajax para obter os dados que pertencem a um id_distrito específico
			$.ajax({
				url: "fetch_concelho.php",			// Caminho para o ficheiro PHP que procura os concelhos na BD
				method: "POST",						// Metodo POST
				data: {id_distrito:id_distrito},	// Dados enviados no pedido ao servidor
				success:function(data)				// Se pedido ao servidor obtiver resposta esta função é executada
				{
					// console.log(data);			// TESTE para exibir resposta recebida do servidor (concelhos obtidos na resposta)
					$('#concelho').html(data);		// Exibir os Concelhos na tag #concelho
				}
			});
		});
	});
</script> 
<!-- CHANGE DISTRITO END -->
<!-- CHANGE CONCELHO -->
<script type="text/javascript">
		// Iniciar a funcao  para carregar o conteudo de todas as funcoes apos a pagina ser completamente carregada 
		$(document).ready(function(){
			// fun?ao  change para obter o valor do campo de entrada (apos ser alterado) 
			$('#concelho').change(function(){
				// Armazenar o valor de entrada selecionado em concelho (id_concelho)
				var id_concelho = $(this).val();
				// Iniciar Ajax para obter os dados que pertencem a um id_concelho especifico
				$.ajax({
					url: "fetch_freguesia.php",			// Caminho para o ficheiro PHP que procura as freguesias na BD
					method: "POST",						// Metodo POST
					data: {id_concelho:id_concelho},	// Dados enviados no pedido ao servidor
					success:function(data)				// Se pedido ao servidor obtiver resposta esta fun??o e executada
					{
						// console.log(data);			// TESTE para exibir resposta recebida do servidor (freguesias obtidas na resposta)
						$('#freguesia').html(data);		// Exibir as freguesias na tag #freguesia
					}
				});
			// terminar chamada change
			});
		});
	</script> 
<!-- CHANGE CONCELHO END -->
<!-- END jQuery FUNCTIONS END -->
</body>
</html>