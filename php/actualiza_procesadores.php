<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM procesadores WHERE IdProcesador = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Descripcion'],
				1 => $valores2['Velocidad'], 
				2=> $valores2['FechaModificacion'],
				3 => $valores2['Observaciones'],
				4 => $valores2['idCatTipoProcesadores'],
				);
echo json_encode($datos);
?>