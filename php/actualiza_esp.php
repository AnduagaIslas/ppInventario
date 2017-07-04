<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM especificaciones WHERE IdEsp = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Marca'],
				1 => $valores2['Modelo'],
				2 => $valores2['NumeroParte'], 
				3 => $valores2['EspFechaModificacion'],
				4 => $valores2['Observaciones'],


				);
echo json_encode($datos);
?>