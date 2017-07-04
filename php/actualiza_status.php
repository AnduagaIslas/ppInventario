<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM catstatus WHERE idStatus = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Status'], 
				1 => $valores2['Observaciones'],
				);
echo json_encode($datos);
?>