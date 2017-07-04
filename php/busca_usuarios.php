<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM usuarios WHERE IdUsuario LIKE '%$dato%' OR ApellidoPaterno LIKE '%$dato%' ORDER BY IdUs ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Id</th>
                <th width="200">Usuario</th>
                <th width="200">Tipo</th>
                <th width="200">Nombres</th>
                <th width="200">Apellido Paterno</th>
                <th width="200">Apellido Materno</th>
                <th width="200">Fecha de Alta/th>
                <th width="200">Puesto</th>
                <th width="200">Estado</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Departamento</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['TipoUsuario'].'</td>
                        <td>'.$registro2['Nombres'].'</td>
                        <td>'.$registro2['ApellidoPaterno'].'</td>
                        <td>'.$registro2['ApellidoMaterno'].'</td>
                        <td>'.$registro2['FechaAlta'].'</td>
                        <td>'.$registro2['Puesto'].'</td>
                        <td>'.$registro2['Estado'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td>'.$registro2['IdDep'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdUs'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdUs'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>