<?php
    // get_distrito() retorna $output com info da tabela distrito
	
    function get_distrito(){
		// Construir a variavel de conexao a BD
		require ("./bd/bd_connection.php");
		
		// Declarar uma variavel do tipo String com Distritos 
		$output = '';
		
		// Query SQL para procurar Distritos ordenados por ordem alfabetica
		$sql = "SELECT * FROM distrito ORDER BY nome";
		
		// Executar a Query. Retorna valor boolean 
		$res = mysqli_query($conn , $sql);

		// Verificar se resultado da query a tabela distrito contem registos
		if(mysqli_num_rows($res)>0){
			while ($row = mysqli_fetch_array($res)) {
				// Concatenar informacao recolhida na vari?vel de saida $output
				// Formato <option value="1">'Aveiro'</option>'
				$output .= '<option value="'.$row["id_distrito"].'">'.$row["nome"].'</option>';
			}
		}
		// retorna $output
		return $output;
	}
?>