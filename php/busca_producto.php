<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM catsistemao WHERE idCatSistemaO LIKE '%$dato%' OR Edicion LIKE '%$dato%' ORDER BY idCatSistemaO ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Sistema</th>
                <th width="200">Edición</th>
                <th width="200">Bits del Sistema</th>
                <th width="300">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['Sistema'].'</td>
                        <td>'.$registro2['Edicion'].'</td>
                        <td>'.$registro2['BitsSistema'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarProducto('.$registro2['idCatSistemaO'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idCatSistemaO'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>