<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM ups WHERE Idu = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['NumeroSerie'],
				1 => $valores2['FechaAdquisicion'], 
				2 => $valores2['FechaAsignacion'], 
				3 => $valores2['FechaModificacion'],
				4 => $valores2['UPSObservaciones'],
				5 => $valores2['IdUs'],
				6 => $valores2['IdEsp'],
				7 => $valores2['idStatus'],
				8 => $valores2['idCatTipoUPS'],

				);
echo json_encode($datos);
?>