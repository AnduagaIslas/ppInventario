<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM cattipocpu WHERE idCatTipoCPU = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['Tipo'], 
				1 => $valores2['observaciones'],
				);
echo json_encode($datos);
?>