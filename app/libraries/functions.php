<?php 

/* <=== ==================================================================
    Seccion de funciones
================================================================== ===> */

function getOne($table, $id) {
	$conn = new mysqli('localhost', 'root', '', 'corvus');
	$conn->set_charset('utf-8');
	$sql = $conn->prepare("SELECT * FROM {$table} WHERE id = ?");
	$sql->bind_param('i', $id);
	$sql->execute();
	$sql->bind_result($result[], $result[], $result[], $result[], $result[], $result[]);

	while( $sql->fetch() ):
		$data[] = [
			'id' => $result[0],
			'title' => $result[1],
			'link' => $result[2],
			'date_end' => $result[3],
			'category' => $result[4]
		];
	endwhile;

	return $data;

}

/* <=== ==================================================================
    Seccion de condicionales de funciones
================================================================== ===> */

if ( file_get_contents('php://input') != null && !empty(file_get_contents('php://input')) ):
	// echo (file_get_contents('php://input'));
	try {
		$dataAjax = file_get_contents('php://input');
		$dataAjax = json_decode($dataAjax, true);
		$functionName = $dataAjax['functionName'];
		$data = $functionName($dataAjax['table'], $dataAjax['id']);
		
		echo json_encode($data);

	} catch (Exeption $e) {
		echo "Excepcion: {$e}";
	}
endif;
