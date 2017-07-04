<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL REGISTRO

$valores = mysql_query("SELECT * FROM cattipoups WHERE idCatTipoUPS = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['TipoUPS'], 
				1 => $valores2['Observaciones'],
				);
echo json_encode($datos);
?>