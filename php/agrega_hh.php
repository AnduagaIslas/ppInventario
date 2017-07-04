<?php
include('conexion.php');
$id = $_POST['id-hh'];
$proceso = $_POST['so'];
$serie=$_POST['serie'];
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
    mysql_query("INSERT INTO handhelds (IdHandH, NumeroSerie, FechaAdquisicion, FechaAsignacion, FechaModificacion, HHObservacion, IdUs, IdEsp, idStatus)VALUES('$id','$serie','$adquisicion','$asignacion', '$fechamodif',  '$observaciones','$usuario','$especificacion', '$status')");
}
else{
    mysql_query("UPDATE handhelds SET NumeroSerie = '$serie', FechaAdquisicion = '$adquisicion', FechaAsignacion = '$asignacion', FechaModificacion = '$fechamodif', HHObservacion = '$observaciones', IdUs = '$usuario', IdEsp = '$especificacion', idStatus = '$status' WHERE IdHandH   = '$id'");
}
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM handhelds ORDER BY IdHandH ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
               <th width="200">Hand Held</th>
                <th width="200">No Serie</th>
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
                        <td>SAHH'.$registro2['IdHandH'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['HHObservaciones'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdHandH'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdHandH'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   