<?php
include('conexion.php');
$id = $_POST['id-tipocpu'];
$proceso = $_POST['so'];
$tipo=$_POST['tipo'];
$observaciones=$_POST['obs'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO cattipocpu (idCatTipoCPU, Tipo, observaciones)VALUES('$id','$tipo','$observaciones')");
}
else{
    mysql_query("UPDATE cattipocpu SET Tipo = '$tipo', observaciones = '$observaciones' WHERE idCatTipoCPU = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM cattipocpu ORDER BY idCatTipoCPU ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Tipo</th>
                <th width="300">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['Tipo'].'</td>
                        <td>'.$registro2['observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idCatTipoCPU'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idCatTipoCPU'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   