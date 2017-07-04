<?php
include('conexion.php');
$id = $_POST['id-cpu'];
$proceso = $_POST['so'];
$nombre=$_POST['nombre'];
$serie=$_POST['serie'];
$adquisicion=$_POST['fechaadquisi'];
$asignacion=$_POST['fechaasig'];
$ups=$_POST['ups'];
$memoria=$_POST['memoria'];
$disco=$_POST['dd'];
date_default_timezone_set("America/Mexico_City");
$fechamodif= date('Y-m-d');
$observaciones=$_POST['obs'];
$usuario=$_POST['usuario'];
$especificacion=$_POST['esp'];
$procesador=$_POST['pro'];
$tipocpu=$_POST['tcpu'];
$status=$_POST['status'];
$tso=$_POST['tso'];
//VERIFICAMOS EL PROCESO

if ($proceso=='Registro'){
    mysql_query("INSERT INTO cpu (Idcpu, NombreRed, NumeroSerie, FechaAdquisicion, FechaAsignacion, UPS, MemoriaRam, DiscoD, FechaModificacion, CPUObservacion, IdUs, IdEsp, IdProcesador, idCatTipoCPU, idStatus, idCatSistemaO )VALUES('$id','$nombre','$serie','$adquisicion','$asignacion', '$ups', '$memoria', '$disco', '$fechamodif',  '$observaciones','$usuario','$especificacion', '$procesador', '$tipocpu', '$status', '$tso')");
}
else{
    mysql_query("UPDATE cpu SET NombreRed = '$nombre', NumeroSerie = '$serie', FechaAdquisicion = '$adquisicion', FechaAsignacion = '$asignacion', UPS = '$ups', MemoriaRam = '$memoria', DiscoD = '$disco', FechaModificacion = '$fechamodif', CPUObservacion = '$observaciones', IdUs = '$usuario', IdEsp = '$especificacion', IdProcesador = '$procesador', idCatTipoCPU = '$tipocpu', idStatus = '$status', idCatSistemaO = '$tso' WHERE Idcpu   = '$id'");
}



//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS PARA QUE SE ACTUALICEN SIN NECESIDAD DE RENDERIZAR LA PAGINA

$registro = mysql_query("SELECT * FROM cpu ORDER BY Idcpu ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX CON LOS DATOS QUE QUEREMOS presentar

echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Red</th>
                <th width="200">No Serie</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">UPS</th>
                <th width="200">Memoria Ram</th>
                <th width="200">Disco Duro</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Especificación</th>
                <th width="50">Procesador</th>
                <th width="50">Tipo CPU</th>
                <th width="50">Status</th>
                <th width="50">Sistema Operativo</th>
                <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                        <td>IT_PC-'.$registro2['Idcpu'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['UPS'].'</td>
                        <td>'.$registro2['MemoriaRam'].'</td>
                        <td>'.$registro2['DiscoD'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['CPUObservacion'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['IdProcesador'].'</td>
                        <td>'.$registro2['idCatTipoCPU'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td>'.$registro2['idCatSistemaO'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['Idcpu'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['Idcpu'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';
	}
echo '</table>';
?>   