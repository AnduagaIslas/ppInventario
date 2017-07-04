<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("Select IdOtroHw,NombreEquipo,NumeroSerie,IdUsuario,IdEspecificaciones,Marca,Modelo,FechaAdquisicion,Status,FechaAsignacion,OtrohwObservaciones
                                    from
                                        otrohw inner join usuarios on otrohw.IdUs=usuarios.IdUs
                                        inner join especificaciones on otrohw.IdEsp=especificaciones.IdEsp
                                        inner join catstatus on otrohw.idStatus=catstatus.idStatus
                                    WHERE IdOtroHw LIKE '%$dato%' OR NombreEquipo LIKE '%$dato%' ORDER BY IdOtroHw ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-hover">
           <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Equipo</th>
                <th width="200">Numero de serie</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Fecha de adquisicion</th>
                <th width="200">Status</th>
                <th width="200">Fecha de asignacion</th>
                <th width="600">Observaciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_EQ-'.$registro2['IdOtroHw'].'</td>
                        <td>'.$registro2['NombreEquipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['OtrohwObservaciones'].'</td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>