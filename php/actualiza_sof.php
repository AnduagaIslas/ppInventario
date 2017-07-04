<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM catsistemao WHERE idCatSistemaO = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Sistema'], 
				1 => $valores2['Edicion'], 
				2 => $valores2['BitsSistema'], 
				3 => $valores2['Observaciones'],
				);
echo json_encode($datos);
?>