<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Otro HW</title>
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
	<h1 align="center">Consulta Baja Otro Hardware</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca un Equipo por: ID o Nombre" id="bs-otro"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div >
        <table class="table table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Equipo</th>
                <th width="200">Numero de serie</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdOtroHw,NombreEquipo,NumeroSerie,IdEspecificaciones,Marca,Modelo,FechaModificacion,OtrohwObservaciones
                                            from
                                                otrohw inner join especificaciones on otrohw.IdEsp=especificaciones.IdEsp
                                                inner join catstatus on otrohw.idStatus=catstatus.idStatus
                                                where Status='Baja' ORDER BY IdOtroHw ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_EQ-'.$registro2['IdOtroHw'].'</td>
                        <td>'.$registro2['NombreEquipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['OtrohwObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

