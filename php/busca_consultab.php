<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("Select IdBaterias,IdUsuario,FechaAdquisicion,Status,FechaAsignacion,BateriasObservaciones
                                            from 
                                            bateriashh inner join  usuarios on bateriashh.IdUs=usuarios.IdUs
                                            inner join catstatus on bateriashh.idStatus=catstatus.idStatus WHERE IdBaterias LIKE '%$dato%' OR idStatus LIKE '%$dato%' ORDER BY IdBaterias ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-hover">
           <tr>
                <th width="200">Bateria</th>
                <th width="200">Usuario</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Status</th>
                <th width="200">Fecha de Asignacion</th>
                <th width="600">Observaciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>BAT-'.$registro2['IdBaterias'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['BateriasObservaciones'].'</td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>