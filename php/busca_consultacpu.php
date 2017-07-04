<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysql_query("Select Idcpu,NombreRed,IdUsuario,IdEspecificaciones,Marca,Modelo,MemoriaRam,DiscoD,IdProcesadores,Descripcion,Velocidad,Tipo,Sistema,Edicion,BitsSistema,CPUObservacion
                from
                cpu inner join usuarios on cpu.IdUs=usuarios.IdUs
                inner join especificaciones on cpu.IdEsp=especificaciones.IdEsp
                inner join catsistemao on cpu.idCatSistemaO=catsistemao.idCatSistemaO
                inner join procesadores on cpu.IdProcesador=procesadores.IdProcesador
                inner join cattipoprocesadores on procesadores.idCatTipoProcesadores=cattipoprocesadores.idCatTipoProcesadores
                WHERE IdUsuario LIKE '%$dato%' OR NombreRed LIKE '%$dato%' ORDER BY Idcpu ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
           <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Red</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Memoria Ram</th>
                <th width="200">Disco Duro</th>
                <th width="50">Procesador</th>
                <th width="50">Descripcion</th>
                <th width="50">Velocidad</th>
                <th width="50">Tipo Procesador</th>
                <th width="50">Sistema Operativo</th>
                <th width="50">Edicion</th>
                <th width="50">Bits</th>
                <th width="600">Observaciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                       <td>IT_PC-'.$registro2['Idcpu'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['MemoriaRam'].'</td>
                        <td>'.$registro2['DiscoD'].'</td>
                        <td>'.$registro2['IdProcesadores'].'</td>
                        <td>'.$registro2['Descripcion'].'</td>
                        <td>'.$registro2['Velocidad'].'</td>
                        <td>'.$registro2['Tipo'].'</td>
                        <td>'.$registro2['Sistema'].'</td>
                        <td>'.$registro2['Edicion'].'</td>
                        <td>'.$registro2['BitsSistema'].'</td>
                        <td>'.$registro2['CPUObservacion'].'</td>
                    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="5">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>