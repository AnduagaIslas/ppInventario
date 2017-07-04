<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title >Usuarios de Sistemas</title>
	<link href="../css/estilo.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
	<script src="../js/myjavausuariosistemas.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <link href="../css/estilo.css" rel="stylesheet">
</head>
<body>
<div class="row">
     <div class="col-xs-12 col-md-2">
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li class="submenu">
                <a href="#">Tablas</a>
                    <ul class="children">
                        <li><a href="#" class="glyphicon glyphicon-triangle-right"> Baterias</a></li>
                        <li><a href="#"> > Catalogo Status</a></li>
                        <li><a href="#"> > Tipos de CPU</a></li>
                        <li><a href="#"> > Tipo de Procesadores</a></li>
                        <li><a href="#"> > Tipo UPS</a></li>
                        <li><a href="#"> > CPU</a></li>
                        <li><a href="#"> > Departamento</a></li>
                        <li><a href="#"> > Equipos sin etiqueta</a></li>
                        <li><a href="#"> > Hand Helds</a></li>
                        <li><a href="#"> > Impresoras</a></li>
                        <li><a href="#"> > Monitores</a></li>
                        <li><a href="#"> > Otro HW</a></li>
                        <li><a href="#"> > Procesadores</a></li>
                        <li><a href="#"> > Sistema Operativo</a></li>
                        <li><a href="#"> > UPS</a></li>
                        <li><a href="#"> > Usuarios</a></li>
                        <li><a href="#"> > Usuarios Sistemas</a></li>
                    </ul>
            </li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="col-xs-12 col-md-10">
	<h1 align="center" class="titulo">Usuarios de Sistemas</h1>
	<section>
    <table border="0" align="center">
    	<tr>
        	<td width="600"><input type="text" style="width:300px" placeholder="Busca un Usuario por: Uruario o Apellido paterno" id="bs-prod"/></td>
            <td width="100"><button id="nuevo" class="btn btn-danger">Nuevo</button></td>
        </tr>
    </table>
    </section>
    <br>
    <div class= "registros" id="agrega-registros" style="background: white">
        <table class="table table-hover">
            <tr>
                <th width="200">Id</th>
                <th width="200">Usuario</th>
                <th width="200">Nombres</th>
                <th width="200">Apellido Paterno</th>
                <th width="200">Apellido Materno</th>
                <th width="200">Fecha de Alta</th>
                <th width="200">Tipo</th>
                <th width="200">Password</th>
                <th width="600">Observaciones</th>
                <th width="50">Opciones</th>
            </tr>
        <?php.
            include('../php/conexion.php');
            $registro = mysql_query("SELECT * FROM usuariossistemas ORDER BY idUsuarios ASC"); 
            while($registro2 = mysql_fetch_array($registro)){
                echo '<tr>
                        <td>'.$registro2['idUsuarios'].'</td>
                        <td>'.$registro2['IdUsuariosSistemas'].'</td>
                        <td>'.$registro2['Nombre'].'</td>
                        <td>'.$registro2['ApellidoPaterno'].'</td>
                        <td>'.$registro2['ApellidoMaterno'].'</td>
                        <td>'.$registro2['FechaAlta'].'</td>
                        <td>'.$registro2['TipoUsuario'].'</td>
                        <td>'.$registro2['Password'].'</td>
                        <td>'.$registro2['Observaciones'].'</td>
                        <td><a href="javascript:editarRegistro('.$registro2['idUsuarios'].');" class="glyphicon glyphicon-pencil blue"></a> <a href="javascript:eliminarRegistro('.$registro2['idUsuarios'].');" class="glyphicon glyphicon-trash blue"></a></td>
                    </tr>';       
            }
        ?>
        </table>
    </div>
    </div>
    </div>
<!-- MODAL PARA EL REGISTRO o editar-->
    <div class="modal fade" id="registra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Usuario de Sistemas</b></h4>
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
                        <td>Tipo Usuario: </td>
                        <td><input type="text" required="required"  name="tipo" id="tipo"/></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="text" required="required"  name="password" id="password"/></td>
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