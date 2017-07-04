<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM impresoras WHERE IdImpresor = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['NombreRed'],
				1 => $valores2['DireccionIP'],
				2 => $valores2['NumeroSerie'],
				3 => $valores2['ColorNegro'],
				4 => $valores2['ColorCian'],
				5 => $valores2['ColorMagenta'],
				6 => $valores2['ColorAmarillo'],
				7 => $valores2['FechaAdquisicion'], 
				8 => $valores2['FechaAsignacion'], 
				9 => $valores2['FechaModificacion'],
				10 => $valores2['ImpresoraObservaciones'],
				11=> $valores2['IdUs'],
				12 => $valores2['IdEsp'],
				13=> $valores2['idStatus'],


				);
echo json_encode($datos);
?>