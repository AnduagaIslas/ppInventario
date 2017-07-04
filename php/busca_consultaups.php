<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("Select Idu,IdUsuario,NumeroSerie,IdEspecificaciones,Marca,Modelo,TipoUPS,FechaAdquisicion,Status,UPSObservaciones
                                        from
                                            ups inner join usuarios on ups.IdUs=usuarios.IdUs
                                                inner join especificaciones on ups.IdEsp=especificaciones.IdEsp
                                                inner join catstatus on ups.idStatus=catstatus.idStatus
                                                inner join cattipoups on ups.idCatTipoUPS=cattipoups.idCatTipoUPS
                                         WHERE Idu LIKE '%$dato%' OR IdUsuario LIKE '%$dato%' ORDER BY Idu ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Equipo</th>
                <th width="200">Usuario</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Tipo de UPS</th>
                <th width="200">Fecha de adquisicion</th>
                <th width="200">Status</th>
                <th width="600">Observaciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_UPS-'.$registro2['Idu'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['TipoUPS'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['UPSObservaciones'].'</td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>