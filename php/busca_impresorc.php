<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("Select IdImpresor,NombreRed,IdUsuario,IdEspecificaciones,Marca,Modelo,ColorNegro,ColorCian,ColorMagenta,ColorAmarillo,
                                            Status,ImpresoraObservaciones
                                            from
                                            impresoras inner join usuarios on impresoras.IdUs=usuarios.IdUs
                                            inner join especificaciones on impresoras.IdEsp=especificaciones.IdEsp
                                            inner join catstatus on impresoras.idStatus=catstatus.idStatus
                                            WHERE DireccionIP LIKE '%$dato%' OR NombreRed LIKE '%$dato%' ORDER BY IdImpresor ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Impresora</th>
                <th width="200">Nombre de Red</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">ColorNegro</th>
                <th width="200">ColorCian</th>
                <th width="200">ColorMagenta</th>
                <th width="200">ColorAmarillo</th>
                <th width="200">Status</th>
                <th width="200">ImpresoraObservaciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_PTR-'.$registro2['IdImpresor'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['ColorNegro'].'</td>
                        <td>'.$registro2['ColorCian'].'</td>
                        <td>'.$registro2['ColorMagenta'].'</td>
                        <td>'.$registro2['ColorAmarillo'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['ImpresoraObservaciones'].'</td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>