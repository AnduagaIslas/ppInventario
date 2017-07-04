<?php
include('conexion.php');
$id = $_POST['id-sof'];
$proceso = $_POST['so'];
$sistema=$_POST['sistema'];
$edicion=$_POST['edicion'];
$bits=$_POST['bits'];
$observaciones=$_POST['obs'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO catsistemao (idCatSistemaO, Sistema, Edicion, BitsSistema, Observaciones)VALUES('$id','$sistema','$edicion','$bits','$observaciones')");
}
else{
    mysql_query("UPDATE catsistemao SET Sistema = '$sistema', Edicion = '$edicion', BitsSistema = '$bits', Observaciones = '$observaciones' WHERE idCatSistemaO   = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM catsistemao ORDER BY idCatSistemaO ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Sistema</th>
                <th width="200">Edición</th>
                <th width="200">Bits del Sistema</th>
                <th width="300">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['Sistema'].'</td>
                        <td>'.$registro2['Edicion'].'</td>
                        <td>'.$registro2['BitsSistema'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idCatSistemaO'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idCatSistemaO'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   