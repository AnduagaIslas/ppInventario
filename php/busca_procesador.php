<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM procesadores WHERE IdProcesador LIKE '%$dato%' OR Descripcion LIKE '%$dato%' ORDER BY IdProcesador ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Procesador</th>
                <th width="200">Descripcion</th>
                <th width="200">Velocidad</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Tipo de procesador</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_Proc-'.$registro2['IdProcesador'].'</td>
                        <td>'.$registro2['Descripcion'].'</td>
                        <td>'.$registro2['Velocidad'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td>'.$registro2['idCatTipoProcesadores'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdProcesador'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdProcesador'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>