<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta UPS</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavacups.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Consulta UPS</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca un UPS por: Usuario o id" id="bs-prod"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div id="agrega-registros">
        <table class="table table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Usuario</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Tipo de UPS</th>
                <th width="200">Fecha de adquisicion</th>
                <th width="200">Status</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select Idu,IdUsuario,NumeroSerie,IdEspecificaciones,Marca,Modelo,TipoUPS,FechaAdquisicion,Status,UPSObservaciones
                                        from
                                            ups inner join usuarios on ups.IdUs=usuarios.IdUs
                                                inner join especificaciones on ups.IdEsp=especificaciones.IdEsp
                                                inner join catstatus on ups.idStatus=catstatus.idStatus
                                                inner join cattipoups on ups.idCatTipoUPS=cattipoups.idCatTipoUPS ORDER BY Idu ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_UPS-'.$registro2['Idu'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['TipoUPS'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['UPSObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

