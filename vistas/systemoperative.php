<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistemas Operativos</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjava.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Sistemas operativos</h1>
	<section>
    <table border="0" align="center">
    	<tr>
        	<td width="600"><input type="text" style="width:300px" placeholder="Busca un Sistema por: Id o Edición" id="bs-prod"/></td>
            <td width="100"><button id="nuevo" class="btn btn-primary">Nuevo</button></td>
        </tr>
    </table>
    </section>
    <br>
    <div class="registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Sistema</th>
                <th width="200">Edición</th>
                <th width="200">Bits del Sistema</th>
                <th width="300">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>
        <?php
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM catsistemao"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['Sistema'].'</td>
                        <td>'.$registro2['Edicion'].'</td>
                        <td>'.$registro2['BitsSistema'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idCatSistemaO'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['idCatSistemaO'].');" class="glyphicon glyphicon-trash"></a></td>
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
              <h4 class="modal-title" id="myModalLabel"><b>Sistemas Operativos</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-sof" name="id-sof" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="so" name="so"/></td>
                    </tr>
                    <tr>
                    	<td>Sistema: </td>
                        <td><input type="text" required="required" name="sistema" id="sistema"/></td>
                    </tr>
                    <tr>
                    	<td>Edición: </td>
                        <td><input type="text"  required="required" name="edicion" id="edicion"/></td>
                    </tr>
                    <tr>
                    	<td>Bits del sistema: </td>
                        <td><input type="number"  required="required" name="bits" id="bits"/></td>
                    </tr>
                    <tr>
                    	<td>Observaciones: </td>
                        <td><input type="text"  name="obs" id="obs"/></td>
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