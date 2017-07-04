<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM equipossinetiqueta WHERE idEquipoSinEtiqueta = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['NombreEquipo'],
				1 => $valores2['NumeroSerie'],
				2 => $valores2['FechaAdquisicion'], 
				3 => $valores2['FechaAsignacion'], 
				4 => $valores2['FechaModificacion'],
				5 => $valores2['Clave'],
				6 => $valores2['Observaciones'],
				7 => $valores2['IdUs'],
				8 => $valores2['IdEsp'],
				9 => $valores2['idStatus'],


				);
echo json_encode($datos);
?>