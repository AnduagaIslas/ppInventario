<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM cpu WHERE Idcpu LIKE '%$dato%' OR NombreRed LIKE '%$dato%' ORDER BY Idcpu ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Red</th>
                <th width="200">No Serie</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">UPS</th>
                <th width="200">Memoria Ram</th>
                <th width="200">Disco Duro</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Especificación</th>
                <th width="50">Procesador</th>
                <th width="50">Tipo CPU</th>
                <th width="50">Status</th>
                <th width="50">Sistema Operativo</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_PC-'.$registro2['Idcpu'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['UPS'].'</td>
                        <td>'.$registro2['MemoriaRam'].'</td>
                        <td>'.$registro2['DiscoD'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['CPUObservacion'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['IdProcesador'].'</td>
                        <td>'.$registro2['idCatTipoCPU'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td>'.$registro2['idCatSistemaO'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['Idcpu'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['Idcpu'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>