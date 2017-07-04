<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Usuarios</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavausuarios.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    
</head>
<body>
	<h1 align="center">Usuarios</h1>
	<section>
    <table border="0" align="center">
    	<tr>
        	<td width="600"><input type="text" style="width:300px" placeholder="Busca un Usuario por: Uruario o Apellido paterno" id="bs-prod"/></td>
            <td width="100"><button id="nuevo" class="btn btn-primary">Nuevo</button></td>
        </tr>
    </table>
    </section>
    <br>
    <div class= "registros" id="agrega-registros">
        <table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="200">Id</th>
                <th width="200">Usuario</th>
                <th width="200">Tipo</th>
                <th width="200">Nombres</th>
                <th width="200">Apellido Paterno</th>
                <th width="200">Apellido Materno</th>
                <th width="200">Fecha de Alta/th>
                <th width="200">Puesto</th>
                <th width="200">Estado</th>
                <th width="200">Fecha de Modificacion</th> 
                <th width="600">Observaciones</th>
                <th width="50">Departamento</th>
                <th width="50">Opciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM usuarios ORDER BY IdUs ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['IdUs'].'</td>
                        <td>'.$registro2['IdUsuario'].'</td>
                        <td>'.$registro2['TipoUsuario'].'</td>
                        <td>'.$registro2['Nombres'].'</td>
                        <td>'.$registro2['ApellidoPaterno'].'</td>
                        <td>'.$registro2['ApellidoMaterno'].'</td>
                        <td>'.$registro2['FechaAlta'].'</td>
                        <td>'.$registro2['Puesto'].'</td>
                        <td>'.$registro2['Estado'].'</td>
                        <td>'.$registro2['FechaModificacion'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td>'.$registro2['IdDep'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['IdUs'].');" class="glyphicon glyphicon-pencil"></a> <a href="javascript:eliminarRegistro('.$registro2['IdUs'].');" class="glyphicon glyphicon-trash"></a></td>
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
              <h4 class="modal-title" id="myModalLabel"><b>Usuario</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-us" name="id-us" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="so" name="so"/></td>
                    </tr>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" required="required" name="usuario" id="usuario"/></td>
                    </tr>
                    <tr>
                    	<td>Tipo Usuario: </td>
                        <td><input type="text" required="required"  name="tipo" id="tipo"/></td>
                    </tr>
                    <tr>
                        <td>Nombres: </td>
                        <td><input type="text" required="required"  name="nombre" id="nombre"/></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno: </td>
                        <td><input type="text" required="required"  name="paterno" id="paterno"/></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno: </td>
                        <td><input type="text" required="required"  name="materno" id="materno"/></td>
                    </tr>
                    <tr>
                    	<td>Fecha de Alta: </td>
                        <td><input type="date"  required="required"  name="fechaalta" id="fechaalta"/></td>
                    </tr>
                    <tr>
                        <td>Puesto: </td>
                        <td><input type="text" required="required"  name="puesto" id="puesto"/></td>
                    </tr>
                    <tr>
                        <td>Estado: </td>
                        <td><input type="text" required="required"  name="estado" id="estado"/></td>
                    </tr>
                    <tr>
                    	<td>Observaciones: </td>
                        <td><input type="text"  name="obs" id="obs"/></td>
                    </tr>
                    <tr>
                        <td>Departamento: </td>
                        <td><input type="number"  required="required" name="dep" id="dep"/></td>
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