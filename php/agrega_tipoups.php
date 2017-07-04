<?php
include('conexion.php');
$id = $_POST['id-tipoups'];
$proceso = $_POST['so'];
$tipo=$_POST['tipo'];
$observaciones=$_POST['obs'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO cattipoups (idCatTipoUPS, TipoUPS, Observaciones)VALUES('$id','$tipo','$observaciones')");
}
else{
    mysql_query("UPDATE cattipoups SET TipoUPS = '$tipo', Observaciones = '$observaciones' WHERE idCatTipoUPS = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM cattipoups ORDER BY idCatTipoUPS ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Tipo</th>
                <th width="300">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['TipoUPS'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idCatTipoUPS'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idCatTipoUPS'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   