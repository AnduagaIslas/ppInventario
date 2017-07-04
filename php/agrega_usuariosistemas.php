<?php
include('conexion.php');
$id = $_POST['id-us'];
$proceso = $_POST['so'];
$tipo=$_POST['tipo'];
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$fechaalta=$_POST['fechaalta'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];

//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO usuariossistemas (idUsuarios,IdUsuariosSistemas,Nombre,ApellidoPaterno, ApellidoMaterno,FechaAlta,TipoUsuario, Observaciones)VALUES('$id','$usuario','$nombre','$paterno', '$materno','$fechaalta','$tipo', '$observaciones')");
}
else{
    mysql_query("UPDATE usuariossistemas SET  IdUsuariosSistemas = '$usuario', Nombre = '$nombre' , ApellidoPaterno = '$paterno', ApellidoMaterno = '$materno', FechaAlta = '$fechaalta',TipoUsuario = '$tipo', Observaciones = '$observaciones' WHERE idUsuarios  = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM usuariossistemas ORDER BY idUsuarios ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-hover">
            <tr>
                <th width="200">Id</th>
                <th width="200">Usuario</th>
                <th width="200">Nombres</th>
                <th width="200">Apellido Paterno</th>
                <th width="200">Apellido Materno</th>
                <th width="200">Fecha de Alta</th>
                <th width="200">Tipo</th>
                <th width="200">Password</th>
                <th width="600">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['idUsuarios'].'</td>
                        <td>'.$registro2['IdUsuariosSistemas'].'</td>
                        <td>'.$registro2['Nombre'].'</td>
                        <td>'.$registro2['ApellidoPaterno'].'</td>
                        <td>'.$registro2['ApellidoMaterno'].'</td>
                        <td>'.$registro2['FechaAlta'].'</td>
                        <td>'.$registro2['TipoUsuario'].'</td>
                        <td>'.$registro2['Password'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idUsuarios'].');" class="glyphicon glyphicon-pencil blue"></a> <a href="javascript:eliminarRegistro('.$registro2['idUsuarios'].');" class="glyphicon glyphicon-trash blue"></a></td>
                    </tr>';
	}
echo '</table>';
?>   