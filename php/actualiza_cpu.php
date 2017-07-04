<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM cpu WHERE Idcpu = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['NombreRed'],
				1 => $valores2['NumeroSerie'],
				2 => $valores2['FechaAdquisicion'], 
				3 => $valores2['FechaAsignacion'], 
				4 => $valores2['FechaModificacion'],
				5 => $valores2['UPS'],
				6 => $valores2['MemoriaRam'],
				7 => $valores2['DiscoD'],
				8 => $valores2['CPUObservacion'],
				9 => $valores2['IdUs'],
				10 => $valores2['IdEsp'],
				11=> $valores2['IdProcesador'],
				12=> $valores2['idCatTipoCPU'],
				13=> $valores2['idStatus'],
				14=> $valores2['idCatSistemaO'],


				);
echo json_encode($datos);
?>