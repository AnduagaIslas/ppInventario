<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM cattipoprocesadores WHERE idCatTipoProcesadores = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Tipo'], 
				1 => $valores2['Observaciones'],
				);
echo json_encode($datos);
?>