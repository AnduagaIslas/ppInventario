<?php
$conexion = mysql_connect('127.0.0.1', 'root', '12345678');
mysql_select_db('inventario', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>