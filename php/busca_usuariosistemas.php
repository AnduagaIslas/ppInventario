<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("SELECT * FROM usuariossistemas WHERE IdUsuariosSistemas LIKE '%$dato%' OR ApellidoPaterno LIKE '%$dato%' ORDER BY idUsuarios ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-hover">
           <tr>
                <th width="200">Id</th>
                <th width="200">Usuario</th>
                <th width="200">Nombres</th>
                <th width="200">Apellido Paterno</th>
                <th width="200">Apellido Materno</th>
                <th width="200">Fecha de Alta</th>
                <th width="200">Tipo</th>
                <th width="200">Password</th>
                <th width="600">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['idUsuarios'].'</td>
                        <td>'.$registro2['IdUsuariosSistemas'].'</td>
                        <td>'.$registro2['Nombre'].'</td>
                        <td>'.$registro2['ApellidoPaterno'].'</td>
                        <td>'.$registro2['ApellidoMaterno'].'</td>
                        <td>'.$registro2['FechaAlta'].'</td>
                        <td>'.$registro2['TipoUsuario'].'</td>
                        <td>'.$registro2['Password'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idUsuarios'].');" class="glyphicon glyphicon-pencil blue"></a> <a href="javascript:eliminarRegistro('.$registro2['idUsuarios'].');" class="glyphicon glyphicon-trash blue"></a></td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>