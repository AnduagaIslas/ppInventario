<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Switches y Access point</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavacsa.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Switches y Access Point</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca una Impresora por: Nombre o id" id="bs-prod"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div id="agrega-registros">
        <table class="table table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Equipo</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Nombre de Red</th>
                <th width="200">Fecha de adquisicion</th>
                <th width="200">Status</th>
                <th width="200">Fecha de asignacion</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdOtroHw,NombreEquipo,NumeroSerie,IdUsuario,IdEspecificaciones,Marca,Modelo,NombreRed,FechaAdquisicion,Status,FechaAsignacion,
                                            OtrohwObservaciones
                                     from
                                        otrohw inner join usuarios on otrohw.IdUs=usuarios.IdUs
                                        inner join especificaciones on otrohw.IdEsp=especificaciones.IdEsp
                                        inner join catstatus on otrohw.idStatus=catstatus.idStatus

                                        where NombreEquipo='Switch' or NombreEquipo='Access Point' or NombreEquipo='Switch_No_Red' ORDER BY IdOtroHw ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_EQ-'.$registro2['IdOtroHw'].'</td>
                        <td>'.$registro2['NombreEquipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['OtrohwObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

