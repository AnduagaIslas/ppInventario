<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("Select IdMonitor,IdUsuario,IdEspecificaciones,Marca,Modelo,NumeroSerie,FechaAdquisicion,Status,MonitorObservaciones
                                            from
                                                monitor inner join usuarios on monitor.IdUs=usuarios.IdUs
                                                inner join especificaciones on monitor.IdEsp=especificaciones.IdEsp
                                                inner join catstatus on monitor.idStatus=catstatus.idStatus
                                            WHERE IdMonitor LIKE '%$dato%' OR IdUsuario LIKE '%$dato%' ORDER BY IdMonitor ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-hover">
           <tr>
                <th width="200">Monitor</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Fecha de adquisicion</th>
                <th width="200">Status</th>
                <th width="600">Observaciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_SCR-'.$registro2['IdMonitor'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['MonitorObservaciones'].'</td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>