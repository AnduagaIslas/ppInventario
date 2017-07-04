$(function(){	
	$('#nuevo').on('click',function(){
		$('#formulario')[0].reset();
		$('#so').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca_procesador.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function agregaRegistro(){
	var url = '../php/agrega_procesador.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#so').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarRegistro(id){
	var url = '../php/elimina_procesadores.php';
	var pregunta = confirm('¿Esta seguro de eliminar el Procesador con id: ' + id +'?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function editarRegistro(id){
	$('#formulario')[0].reset();
	var url = '../php/actualiza_procesadores.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#so').val('Edicion');
				$('#id-pro').val(id);
				$('#des').val(datos[0]);
				$('#velocidad').val(datos[1]);
				$('#obs').val(datos[3]);
				$('#tipo').val(datos[4]);
				$('#registra').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}