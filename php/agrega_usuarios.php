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
$puesto=$_POST['puesto'];
$estado=$_POST['estado'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
$departamento=$_POST['dep'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO usuarios (IdUs,IdUsuario,TipoUsuario,Nombres,ApellidoPaterno, ApellidoMaterno,FechaAlta,Puesto, Estado, FechaModificacion, Observaciones, IdDep)VALUES('$id','$usuario','$tipo','$nombre','$paterno', '$materno','$fechaalta','$puesto','$estado','$fechamodif', '$observaciones','$departamento')");
}
else{
    mysql_query("UPDATE usuarios SET  IdUsuario = '$usuario', TipoUsuario = '$tipo', Nombres = '$nombre' , ApellidoPaterno = '$paterno', ApellidoMaterno = '$materno', FechaAlta = '$fechaalta', Puesto= '$puesto', Estado= '$estado', FechaModificacion = '$fechamodif', Observaciones = '$observaciones', IdDep = '$departamento' WHERE IdUs  = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM usuarios ORDER BY IdUs ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Id</th>
                <th width="200">Usuario</th>
                <th width="200">Tipo</th>
                <th width="200">Nombres</th>
                <th width="200">Apellido Paterno</th>
                <th width="200">Apellido Materno</th>
                <th width="200">Fecha de Alta/th>
                <th width="200">Puesto</th>
                <th width="200">Estado</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Departamento</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['TipoUsuario'].'</td>
                        <td>'.$registro2['Nombres'].'</td>
                        <td>'.$registro2['ApellidoPaterno'].'</td>
                        <td>'.$registro2['ApellidoMaterno'].'</td>
                        <td>'.$registro2['FechaAlta'].'</td>
                        <td>'.$registro2['Puesto'].'</td>
                        <td>'.$registro2['Estado'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td>'.$registro2['IdDep'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdUs'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdUs'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   