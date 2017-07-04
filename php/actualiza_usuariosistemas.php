<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT * FROM usuariossistemas WHERE idUsuarios = '$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(
				0 => $valores2['IdUsuariosSistemas'],
				1 => $valores2['Nombre'], 
				2 => $valores2['ApellidoPaterno'],
				3 => $valores2['ApellidoMaterno'],
				4 => $valores2['FechaAlta'],
				5 => $valores2['TipoUsuario'], 
				6 => $valores2['Password'],
				7 => $valores2['Observaciones'],

				);
echo json_encode($datos);
?>