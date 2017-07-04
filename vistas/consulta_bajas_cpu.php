<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>CPU</title>
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
    <h1 align="center">Consulta bajas CPU</h1>
    <br>
    <section>
    <table border="0" align="center">
        <tr>
            <td width="600"><input type="text" style="width:400px" placeholder="Busca un CPU por: Nombre de Red o Usuario" id="bs-cpu"/></td>>
        </tr>
    </table>
    </section>
    <br>
    <br>
    <div >
        <table  class="table  table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Especificacion</th>
                <th width="200">Marca</th>
                <th width="200">Modelo</th>
                <th width="200">Tipo</th>
                <th width="200">Numero de Serie</th>
                <th width="200">Fecha Modificacion</th>
                <th width="600">Observaciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("Select Idcpu,IdEspecificaciones,Marca,Modelo,Tipo,NumeroSerie,FechaModificacion,CPUObservacion
                                            from
                                                cpu inner join especificaciones on cpu.IdEsp=especificaciones.IdEsp
                                                inner join CatTipoCPU on cpu.idCatTipoCPU=CatTipoCPU.idCatTipoCPU
                                                inner join catstatus on cpu.idStatus=catstatus.idStatus
                                                Where Status='Baja' ORDER BY Idcpu ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_PC-'.$registro2['Idcpu'].'</td>
                        <td>'.$registro2['IdEspecificaciones'].'</td>
                        <td>'.$registro2['Marca'].'</td>
                        <td>'.$registro2['Modelo'].'</td>
                        <td>'.$registro2['Tipo'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['CPUObservacion'].'</td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
</body>

