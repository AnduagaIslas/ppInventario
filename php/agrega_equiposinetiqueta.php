<?php
include('conexion.php');
$id = $_POST['id-equi'];
$proceso = $_POST['so'];
$nombre=$_POST['nombre'];
$serie=$_POST['serie'];
$adquisicion=$_POST['fechaadquisi'];
$asignacion=$_POST['fechaasig'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$clave=$_POST['clave'];
$observaciones=$_POST['obs'];
$usuario=$_POST['usuario'];
$especificacion=$_POST['esp'];
$status=$_POST['status'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO equipossinetiqueta (idEquipoSinEtiqueta, NombreEquipo, NumeroSerie, FechaAdquisicion, FechaAsignacion, FechaModificacion, Clave,  Observaciones, IdUs, IdEsp, idStatus)VALUES('$id','$nombre','$serie','$adquisicion','$asignacion','$fechamodif', '$clave','$observaciones','$usuario','$especificacion','$status')");
}
else{
    mysql_query("UPDATE equipossinetiqueta SET NombreEquipo = '$nombre', NumeroSerie = '$serie', FechaAdquisicion = '$adquisicion', FechaAsignacion = '$asignacion', FechaModificacion = '$fechamodif', Clave = '$clave', Observaciones = '$observaciones', IdUs = '$usuario', IdEsp = '$especificacion', idStatus = '$status' WHERE idEquipoSinEtiqueta   = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM equipossinetiqueta ORDER BY idEquipoSinEtiqueta ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre</th>
                <th width="200">No Serie</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="200">Clave</th>
                <th width="600">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Especificación</th>
                <th width="50">Status</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['idEquipoSinEtiqueta'].'</td>
                        <td>'.$registro2['NombreEquipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Clave'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idEquipoSinEtiqueta'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idEquipoSinEtiqueta'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   