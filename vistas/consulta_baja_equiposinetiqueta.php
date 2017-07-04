<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Equipos sin etiqueta </title>
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
	<h1 align="center">Consulta bajas Equipos sin etiqueta</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca unEquipo por: Nombre o id" id="bs-equi"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div >
        <table class="table table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Fecha Baja</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select  idEquipoSinEtiqueta,NumeroSerie,IdEspecificaciones,Marca,Modelo,FechaModificacion
                                            from
                                                equipossinetiqueta inner join especificaciones on equipossinetiqueta.IdEsp=especificaciones.IdEsp 
                                                inner join catstatus on equipossinetiqueta.idStatus=catstatus.idStatus
                                                where Status='Baja' ORDER BY idEquipoSinEtiqueta ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_PTR-'.$registro2['idEquipoSinEtiqueta'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>
