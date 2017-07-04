<?php
include('conexion.php');
$id = $_POST['id-otro'];
$proceso = $_POST['so'];
$nombre = $_POST['nombre'];
$serie=$_POST['serie'];
$nombrered= $_POST['nombrer'];
$adquisicion=$_POST['fechaadquisi'];
$asignacion=$_POST['fechaasig'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
$usuario=$_POST['usuario'];
$especificacion=$_POST['esp'];
$status=$_POST['status'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO otrohw (IdOtroHw, NombreEquipo, NumeroSerie, NombreRed, FechaAdquisicion, FechaAsignacion, FechaModificacion, OtrohwObservaciones, IdUs, IdEsp, idStatus)VALUES('$id','$nombre', '$serie','$nombrer','$adquisicion','$asignacion', '$fechamodif',  '$observaciones','$usuario','$especificacion','$status')");
}
else{
    mysql_query("UPDATE otrohw SET  NombreEquipo = '$nombre', NumeroSerie = '$serie', NombreRed = '$nombrer', FechaAdquisicion = '$adquisicion', FechaAsignacion = '$asignacion', FechaModificacion = '$fechamodif', OtrohwObservaciones = '$observaciones', IdUs = '$usuario', IdEsp = '$especificacion',idStatus = '$status' WHERE IdOtroHw = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM otrohw ORDER BY IdOtroHw ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="300">Equipo</th>
                <th width="200">Nombre</th>
                <th width="200">No Serie</th>
                <th width="200">Nombre de Red</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Especificación</th>
                <th width="50">Status</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_EQ-'.$registro2['IdOtroHw'].'</td>
                        <td>'.$registro2['NombreEquipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['OtrohwObservaciones'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdOtroHw'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdOtroHw'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   