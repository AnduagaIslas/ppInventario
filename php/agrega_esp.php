<?php
include('conexion.php');
$id = $_POST['id-esp'];
$proceso = $_POST['so'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$numero=$_POST['numero'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO especificaciones (IdEsp, Marca, Modelo, NumeroParte, EspFechaModificacion, Observaciones)VALUES('$id','$marca','$modelo','$numero','$fechamodif', '$observaciones')");
}
else{
    mysql_query("UPDATE especificaciones SET Marca = '$marca', Modelo = '$modelo',NumeroParte = '$numero', EspFechaModificacion = '$fechamodif', Observaciones = '$observaciones'  WHERE Idcpu   = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM especificaciones ORDER BY IdEsp ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Numero de parte</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_Marca-'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['NumeroParte'].'</td>
                        <td>'.$registro2['EspFechaModificacion'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdEsp'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdEsp'].');" class="glyphicon glyphicon-trash"></a></td>
                </tr>';
	}
echo '</table>';
?>   