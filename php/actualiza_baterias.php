<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM bateriashh WHERE IdBaterias = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['FechaAdquisicion'], 
				1 => $valores2['FechaAsignacion'], 
				2 => $valores2['FechaFabricacion'], 
				3 => $valores2['FechaModificacion'],
				4 => $valores2['BateriasObservaciones'],
				5 => $valores2['IdUs'],
				6 => $valores2['idStatus'],

				);
echo json_encode($datos);
?>