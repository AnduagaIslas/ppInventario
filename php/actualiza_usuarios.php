<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM usuariossistemas WHERE idUsuarios = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['IdUsuario'],
				1 => $valores2['TipoUsuario'], 
				2 => $valores2['Nombres'], 
				3 => $valores2['ApellidoPaterno'],
				4 => $valores2['ApellidoMaterno'],
				5 => $valores2['FechaAlta'],
				6 => $valores2['Puesto'],
				7 => $valores2['Estado'],  
				8 => $valores2['FechaModificacion'],
				9 => $valores2['Observaciones'],
				10 => $valores2['IdDep'],

				);
echo json_encode($datos);
?>