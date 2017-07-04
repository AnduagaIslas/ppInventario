<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta Baterias</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavacbb.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Consulta bajas Baterias</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca una Bateria por: id" id="bs-bat"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div >
        <table class="table table-hover">
            <tr>
                <th width="200">Bateria</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdBaterias,FechaModificacion,BateriasObservaciones
                                            from 
                                                bateriashh inner join catstatus on bateriashh.idStatus=catstatus.idStatus
                                                where Status='Baja' ORDER BY IdBaterias ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>BAT-'.$registro2['IdBaterias'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['BateriasObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

