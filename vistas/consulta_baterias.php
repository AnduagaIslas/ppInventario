<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta Baterias</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavacb.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Consulta Baterias</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca una Bateria por: Status o id" id="bs-prod"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div id="agrega-registros">
        <table class="table table-hover">
            <tr>
                <th width="200">Bateria</th>
                <th width="200">Usuario</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Status</th>
                <th width="200">Fecha de Asignacion</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdBaterias,IdUsuario,FechaAdquisicion,Status,FechaAsignacion,BateriasObservaciones
                                            from 
                                            bateriashh inner join  usuarios on bateriashh.IdUs=usuarios.IdUs
                                            inner join catstatus on bateriashh.idStatus=catstatus.idStatus ORDER BY IdBaterias ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>BAT-'.$registro2['IdBaterias'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['BateriasObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

