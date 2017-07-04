<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta Monitores</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavaconsultamonitor.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>
	<h1 align="center">Consulta monitores</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca un Monitor por: Usuario o id" id="bs-prod"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div id="agrega-registros">
        <table class="table table-hover">
            <tr>
                <th width="200">Monitor</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Fecha de adquisicion</th>
                <th width="200">Status</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdMonitor,IdUsuario,IdEspecificaciones,Marca,Modelo,NumeroSerie,FechaAdquisicion,Status,MonitorObservaciones
                                            from
                                                monitor inner join usuarios on monitor.IdUs=usuarios.IdUs
                                                inner join especificaciones on monitor.IdEsp=especificaciones.IdEsp
                                                inner join catstatus on monitor.idStatus=catstatus.idStatus ORDER BY IdMonitor ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_SCR-'.$registro2['IdMonitor'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['MonitorObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

