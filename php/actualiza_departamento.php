<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM departamento WHERE IdDep = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Nombre'], 
				1 => $valores2['FechaModificacion'], 
				2 => $valores2['Observaciones'], 
				);
echo json_encode($datos);
?>