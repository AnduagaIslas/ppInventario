<?php
include('conexion.php');
$id = $_POST['id-imp'];
$proceso = $_POST['so'];
$nombre= $_POST['nombre'];
$serie=$_POST['serie'];
$direccion=$_POST['direccion'];
$negro = $_POST['negro'];
$cian = $_POST['cian'];
$magenta = $_POST['magenta'];
$amarillo = $_POST['amarillo'];
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
    mysql_query("INSERT INTO impresoras (IdImpresor, NombreRed, DireccionIP, NumeroSerie, ColorNegro, ColorCian, ColorMagenta, ColorAmarillo, FechaAdquisicion, FechaAsignacion,  FechaModificacion, ImpresoraObservaciones, IdUs, IdEsp, idStatus)VALUES('$id','$nombre','$direccion', '$serie','$negro','$cian', '$magenta','$amarillo','$adquisicion','$asignacion', '$fechamodif',  '$observaciones','$usuario','$especificacion','$status')");
}
else{
    mysql_query("UPDATE impresoras SET NombreRed = '$nombre', DireccionIP = '$direccion', NumeroSerie = '$serie', ColorNegro = '$negro', ColorCian = '$cian', ColorMagenta = '$magenta', ColorAmarillo = '$amarillo', FechaAdquisicion = '$adquisicion', FechaAsignacion = '$asignacion', FechaModificacion = '$fechamodif', ImpresoraObservaciones = '$observaciones', IdUs = '$usuario', IdEsp = '$especificacion', idStatus = '$status' WHERE IdImpresor   = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM impresoras ORDER BY IdImpresor ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Impresora</th>
                <th width="200">Nombre de Red</th>
                <th width="200">Direccion IP</th>
                <th width="200">No Serie</th>
                <th width="200">Color Negro</th>
                <th width="200">Color Cian</th>
                <th width="200">Color Magenta</th>
                <th width="200">Color Amarillo</th>
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
                        <td>IT_PTR-'.$registro2['IdImpresor'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['DireccionIP'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['ColorNegro'].'</td>
                        <td>'.$registro2['ColorCian'].'</td>
                        <td>'.$registro2['ColorMagenta'].'</td>
                        <td>'.$registro2['ColorAmarillo'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['ImpresoraObservaciones'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdImpresor'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdImpresor'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   