<?php
include('conexion.php');
$id = $_POST['id-bat'];
$proceso = $_POST['so'];
$idbat=$_POST['id-bat'];
$fechaadquisi=$_POST['fechaadquisi'];
$fechaasig=$_POST['fechaasig'];
$fechafab=$_POST['fechafab'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
$usuario=$_POST['usuario'];
$status=$_POST['status'];
//VERIFICAMOS EL PROCESO    

if ($proceso=='Registro'){
    mysql_query("INSERT INTO  bateriashh (IdBaterias, IdBateriasHH, FechaAdquisicion, FechaAsignacion, FechaFabricacion, FechaModificacion, BateriasObservaciones, IdUs, idStatus)VALUES('$id','$idbat','$fechaadquisi','$fechaasig', '$fechafab','$fechamodif', '$observaciones', '$usuario', '$status')");
}
else{
    mysql_query("UPDATE bateriashh SET  FechaAdquisicion = '$fechaadquisi', FechaAsignacion = '$fechaasig', FechaFabricacion = '$fechafab', FechaModificacion = '$fechamodif', BateriasObservaciones = '$observaciones', IdUs = '$usuario', idStatus='$status' WHERE IdBaterias  = '$id'");
}
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM bateriashh ORDER BY IdBaterias ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Bateria</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">Fecha de Fabricacion</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="300">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Status</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>BAT-'.$registro2['IdBaterias'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['FechaFabricacion'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['BateriasObservaciones'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdBaterias'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdBaterias'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   