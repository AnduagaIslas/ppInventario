<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta HH</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavaequipos.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Consulta Hand Helds</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca una Bateria por: Status o id" id="bs-bat"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div >
        <table class="table table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Usuario</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Status</th>
                <th width="200">Fecha de Asignacion</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdHandH,IdUsuario,NumeroSerie,IdEspecificaciones,Marca,Modelo,Status,FechaAsignacion,HHObservaciones
                                            from
                                                handhelds inner join usuarios on handhelds.IdUs=usuarios.IdUs
                                                inner join especificaciones on handhelds.IdEsp=especificaciones.IdEsp
                                                inner join catstatus on handhelds.idStatus=catstatus.idStatus ORDER BY IdHandH ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>SAHH'.$registro2['IdHandH'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['HHObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

