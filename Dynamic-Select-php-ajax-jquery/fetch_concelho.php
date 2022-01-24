<?php
	// Conexao BD
	require ("./bd/bd_connection.php");

	// Declarar variavel vazia para armazenar resultado
	$output = '';

	// Query SQL para obter Concelhos pertencentes ao Distrito inserido no campo de input
	$sql = "SELECT * FROM concelho WHERE id_distrito = '".$_POST["id_distrito"]."' ";

	// Executar a Query. Retorna valor boolean 
	$res = mysqli_query($conn, $sql);

	// Concatenar opcoes na variavel $output, com tag HTML <option> 
	$output .= '<option value="" disabled selected>Selecione Concelho</option>';

	// Verificar se foram obtidos registos da tabela Concelho na execucao da Query 
	if(mysqli_num_rows($res)>0){
		// Procurar informacao dos Concelhos que pertencem a determinado Distrito no Array $row
		while ($row = mysqli_fetch_array($res)) {
			//Concatenar informacao em $output
			$output .= '<option value="'.$row["id_concelho"].'">'.$row["nome"].'</option>';
		}
	}
	// Exibir Concelhos
	echo $output;
?>