<?php
	// Conexao BD
	require ("./bd/bd_connection.php");

	// Declarar variavel vazia para armazenar resultado
	$output = '';

	// Query SQL para obter Freguesias pertencentes ao Concelho escolhido
	$sql = "SELECT id_freguesia, nome FROM freguesia WHERE id_concelho = '".$_POST["id_concelho"]."' ";

	// Executar a Query. Retorna valor boolean 
	$res = mysqli_query($conn, $sql);

	// Concatenar opcoes na variavel $output, com tag HTML <option> 
	$output .= '<option value="" disabled selected>Selecione Freguesia</option>';

	// Verificar se foram obtidos registos da tabela Freguesia na execucao da Query 
	if(mysqli_num_rows($res)>0){
		// Procurar informacao dos Concelhos que pertencem a determinado Concelho no Array $row
		while ($row = mysqli_fetch_array($res)) {
			//Concatenar informacao em $output
			$output .= '<option value="'.$row["id_freguesia"].'">'.$row["nome"].'</option>';
		}
	}
	// Exibir Freguesias
	echo $output;
?>