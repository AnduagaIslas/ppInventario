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
	<h1 align="center">CPU</h1>
	<section>
    <table border="0" align="center">
    	<tr>
        	<td width="600"><input type="text" style="width:300px" placeholder="Busca un Equipo por: Id o Nombre de red" id="bs-prod"/></td>
            <td width="100"><button id="nuevo" class="btn btn-primary">Nuevo</button></td>
        </tr>
    </table>
    </section>
    <br>
    <div  id="agrega-registros">
        <table style="margin-left: 80px;" class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Equipo</th>
                <th width="200">Nombre de Red</th>
                <th width="200">No Serie</th>
                <th width="200">Fecha de Adquisicion</th>
                <th width="200">Fecha de Asiganacion</th>
                <th width="200">UPS</th>
                <th width="200">Memoria Ram</th>
                <th width="200">Disco Duro</th>
                <th width="200">Fecha de Modificacion</th>
                <th width="600">Observaciones</th>
                <th width="50">Usuario</th>
                <th width="50">Especificación</th>
                <th width="50">Procesador</th>
                <th width="50">Tipo CPU</th>
                <th width="50">Status</th>
                <th width="50">Sistema Operativo</th>
                <th width="50">Opciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM cpu ORDER BY Idcpu ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>IT_PC-'.$registro2['Idcpu'].'</td>
                        <td>'.$registro2['NombreRed'].'</td>
                        <td>'.$registro2['NumeroSerie'].'</td>
                        <td>'.$registro2['FechaAdquisicion'].'</td>
                        <td>'.$registro2['FechaAsignacion'].'</td>
                        <td>'.$registro2['UPS'].'</td>
                        <td>'.$registro2['MemoriaRam'].'</td>
                        <td>'.$registro2['DiscoD'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['CPUObservacion'].'</td>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdEsp'].'</td>
                        <td>'.$registro2['IdProcesador'].'</td>
                        <td>'.$registro2['idCatTipoCPU'].'</td>
                        <td>'.$registro2['idStatus'].'</td>
                        <td>'.$registro2['idCatSistemaO'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['Idcpu'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['Idcpu'].');" class="glyphicon glyphicon-trash"></a></td>
                    </tr>';       
            }
        ?>
        </table>
    </div>


<!-- MODAL PARA EL REGISTRO o editar-->
    <div class="modal fade" id="registra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Baterias HH</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-cpu" name="id-cpu" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="so" name="so"/></td>
                    </tr>
                        <td>Nombre de Red:</td>
                        <td><input type="text" required="required" name="nombre" id="nombre"/></td>
                    </tr>
                        <td>Numero de serie:</td>
                        <td><input type="text" required="required" name="serie" id="serie"/></td>
                    </tr>
                    <tr>
                    	<td>Fecha de Adquisicion: </td>
                        <td><input type="date" required="required" name="fechaadquisi" id="fechaadquisi"/></td>
                    </tr>
                    <tr>
                    	<td>Fecha de Asignacion: </td>
                        <td><input type="date"  required="required" name="fechaasig" id="fechaasig"/></td>
                    </tr>
                        <td>UPS:</td>
                        <td><input type="text" required="required" name="ups" id="ups"/></td>
                    </tr>
                    </tr>
                        <td>Memoria Ram:</td>
                        <td><input type="text" required="required" name="memoria" id="meoria"/></td>
                    </tr>
                    </tr>
                        <td>Disco Duro:</td>
                        <td><input type="text" required="required" name="dd" id="dd"/></td>
                    </tr>
                    <tr>
                    	<td>Observaciones: </td>
                        <td><input type="text"  name="obs" id="obs"/></td>
                    </tr>
                    <tr>
                        <td>Usuario: </td>
                        <td><input type="number"  required="required" name="usuario" id="usuario"/></td>
                    </tr>
                        <td>Especificaciones:</td>
                        <td><input type="number" required="required" name="esp" id="esp"/></td>
                    </tr>
                    </tr>
                        <td>Procesador:</td>
                        <td><input type="text" required="required" name="pro" id="pro"/></td>
                    </tr>
                    </tr>
                        <td>Tipo CPU:</td>
                        <td><input type="text" required="required" name="tcpu" id="tcpu"/></td>
                    </tr>
                    <tr>
                        <td>Status: </td>
                        <td><input type="number"  required="required" name="status" id="status"/></td>
                    </tr>
                    </tr>
                        <td>Sistema Operativo:</td>
                        <td><input type="text" required="required" name="tso" id="tso"/></td>
                    </tr>
                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      
</body>
</html>