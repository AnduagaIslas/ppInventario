<?php
include('../php/conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM handhelds WHERE IdHandH = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM handhelds ORDER BY IdHandH ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

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