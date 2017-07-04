<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Impresoras</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavacsi.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Consulta Suministros de Impresora</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca una Impresora por: Nombre de Red o IP" id="bs-prod"/></td>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div id="agrega-registros">
        <table class="table table-hover">
            <tr>
                <th width="200">Impresora</th>
                <th width="200">Nombre de Red</th>
                <th width="200">Usuario</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">ColorNegro</th>
                <th width="200">ColorCian</th>
                <th width="200">ColorMagenta</th>
                <th width="200">ColorAmarillo</th>
                <th width="200">Status</th>
                <th width="200">ImpresoraObservaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select IdImpresor,NombreRed,IdUsuario,IdEspecificaciones,Marca,Modelo,ColorNegro,ColorCian,ColorMagenta,ColorAmarillo,
                                            Status,ImpresoraObservaciones
                                            from
                                            impresoras inner join usuarios on impresoras.IdUs=usuarios.IdUs
                                            inner join especificaciones on impresoras.IdEsp=especificaciones.IdEsp
                                            inner join catstatus on impresoras.idStatus=catstatus.idStatus ORDER BY IdImpresor ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_PTR-'.$registro2['IdImpresor'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['ColorNegro'].'</td>
                        <td>'.$registro2['ColorCian'].'</td>
                        <td>'.$registro2['ColorMagenta'].'</td>
                        <td>'.$registro2['ColorAmarillo'].'</td>
                        <td>'.$registro2['Status'].'</td>
                        <td>'.$registro2['ImpresoraObservaciones'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

