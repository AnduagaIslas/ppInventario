<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CPU</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavaccpu.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Consulta general CPU</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca un CPU por: Nombre de Red o Usuario" id="bs-prod"/></td>>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div id="agrega-registros">
        <table  class="table  table-hover">
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
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select Idcpu,NombreRed,IdUsuario,IdEspecificaciones,Marca,Modelo,MemoriaRam,DiscoD,IdProcesadores,Descripcion,Velocidad,Tipo,Sistema,Edicion,BitsSistema,CPUObservacion
                from
                cpu inner join usuarios on cpu.IdUs=usuarios.IdUs
                inner join especificaciones on cpu.IdEsp=especificaciones.IdEsp
                inner join catsistemao on cpu.idCatSistemaO=catsistemao.idCatSistemaO
                inner join procesadores on cpu.IdProcesador=procesadores.IdProcesador
                inner join cattipoprocesadores on procesadores.idCatTipoProcesadores=cattipoprocesadores.idCatTipoProcesadores ORDER BY Idcpu ASC"); 
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
        ?>
        </table>
    </div>
</body>

