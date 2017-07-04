<?php
include('conexion.php');
$id = $_POST['id-dep'];
$proceso = $_POST['so'];
$nombre = $_POST['nombre'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
//VERIFICAMOS EL PROCESO    

if ($proceso=='Registro'){
    mysql_query("INSERT INTO  departamento (IdDep, IdDepartamento, Nombre, FechaModificacion, Observaciones)VALUES('$id','$id','$nombre','$fechamodif', '$observaciones')");
}
else{
    mysql_query("UPDATE departamento SET  Nombre = '$nombre', FechaModificacion = '$fechamodif', Observaciones = '$observaciones' WHERE IdDep  = '$id'");
}
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM departamento ORDER BY IdDep ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>

                <th width="200">Departamento</th>
                <th width="200">Nombre</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_NDepto-'.$registro2['IdDep'].'</td>
                        <td>'.$registro2['Nombre'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdDep'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdDep'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   