<?php
include('conexion.php');
$id = $_POST['id-pro'];
$proceso = $_POST['so'];
$descripcion=$_POST['des'];
$velocidad=$_POST['velocidad'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
$tipo=$_POST['tipo'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO procesadores (IdProcesador, Descripcion,Velocidad, FechaModificacion, Observaciones, idCatTipoProcesadores)VALUES('$id','$descripcion','$velocidad', '$fechamodif',  '$observaciones','$tipo')");
}
else{
    mysql_query("UPDATE procesadores SET  Descripcion = '$descripcion', Velocidad = '$velocidad', FechaModificacion = '$fechamodif', Observaciones = '$observaciones', idCatTipoProcesadores = '$tipo' WHERE IdMonitor  = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM procesadores ORDER BY IdProcesador ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

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
echo '</table>';
?>   