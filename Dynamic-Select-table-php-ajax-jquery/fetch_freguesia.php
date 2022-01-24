<?php 
    // Conexao BD
    require ("./bd/bd_connection.php");

    // Declarar variavel vazia para armazenar resultado
	$output = '';

    // Query SQL para obter Freguesias pertencentes ao Concelho 
	$sql = "SELECT * FROM freguesia WHERE id_concelho = '".$_POST["id_concelho"]."' ";

	// Executar a Query. Retorna valor boolean 
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
		// Obter informacao das Freguesias que pertencem a determinado Concelho no Array $row
		while ($row = mysqli_fetch_array($res)) {
			// abrir elemento tr
			$output .= '<tr>';
			// elementos th
			// coluna id freguesia
			$output .= '<th>'.$row["id_freguesia"].'</th>';
			// coluna nome freguesia
			$output .= '<th>'.$row["nome"].'</th>';
			// coluna url freguesia
			$output .= '<td><a href="'.$row["url"].'">'.$row["url"].'</a></td>';
			// fechar elemento tr
			$output .= '</tr>';
		}
	}
	echo $output;
?>
	