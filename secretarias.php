<?
$sql="SELECT nombre, secretarias.id_secretaria,confirmado,vinculado FROM secretarias 
JOIN rel_secretarias_medicos ON rel_secretarias_medicos.id_secretaria=secretarias.id_secretaria
WHERE rel_secretarias_medicos.id_medico=$id_credencial";
$query=mysql_query($sql);
$muestra=mysql_num_rows($query);

//Buscamos clínicas
$sq="SELECT * FROM clinicas WHERE id_medico=$id_medico AND activo=1";
$q=mysql_query($sq);
$valida_clinica=mysql_num_rows($q);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Secretarias</h4>
            </div>
            <div class="page-header-section text-right">
            	<a class="btn btn-sm btn-primary" href="javascript:void(0);" role="button" data-nuevo="1" data-toggle="modal" data-backdrop="static" data-target="#NuevaSecretaria">Nueva Secretaria</a>
            </div>
        </div>
  
        <!-- Tabla y acciones -->
        <div class="row">
            <div class="col-md-12">
            	<? if($_GET['msg']==1){ ?>
            	<div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡La secretaria se ha agregado!
                </div>
                <? }elseif($_GET['msg']==2){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡La secretaria se ha editado!
                </div>
                <? }elseif($_GET['msg']==3){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡La secretaria se ha eliminado!
                </div>
                <? } ?>
                <? if($muestra){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Secretarias</h3>
                    </div>
                   
                    <table class="table table-striped" id="zero-configuration">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <? while($ft=mysql_fetch_assoc($query)){ ?>
                            <tr>
                                <td><?=$ft['nombre']?></td>
                                <td align="right" style="padding-right:20px;">
                                	<? if($ft['confirmado']==0){ ?>
                                	<button type="button" class="btn btn-xs btn-danger mr10" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$ft['nombre']?> no ha confirmado su cuenta." data-original-title="" title="">No confirmada</button>
                                	<? }else{ ?>
                                		<? if($ft['vinculado']==0){?> 
										<button type="button" class="btn btn-xs btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$ft['nombre']?> no ha aceptado la vinculación de cuentas." data-original-title="" title="">No vinculada</button>
										<? } ?>
                                	<? } ?>
	                                <div class="btn-group mb5 ml10" style="padding-top:5px;">
	                                <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">Acciones <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                    	<? if($ft['confirmado']==0){ ?>
                                        <li><a href="#" role="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#NuevaSecretaria" data-id="<?=$ft['id_secretaria']?>">Editar</a></li>
                                        <li class="divider"></li>
                                        <? } ?>
                                        
                                        <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#EliminaScretaria" data-id-elimina="<?=$ft['id_secretaria']?>">Eliminar</a></li>
                                        
                                    </ul>
                                	</div>
                                </td>
                            </tr>
                        <? } ?>  
                        </tbody>
                    </table>
                </div>
                <? }else{ ?>
                <div class="alert alert-dismissable alert-warning animation animating flipInX">
                    No se han agregado secretarias :(
                </div>
                <? } ?>
            </div>
        </div>
        <!--/ END row -->
    </div>
</section>


<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->
<script>
$(function(){
	//Limpiamos el local storage
	store.clear();
	
	//Nueva Clinica
	$('#btn_guarda').click(function(){
	 	ac_form();
	 });
	 
	 $('#btn_eliminar').click(function(){
	 	ac_form(1);
	 });
	 
	
	$(document).on('click', '[data-id]', function () {

	    var data_id = $(this).attr('data-id');

	    $('.mod').val(''); 
	    $('#titulo_modal').html('Edita Secretaria');
	    $.ajax({
	   	url: "data/secretaria.php",
	   	data: 'id_secretaria='+data_id,
	   	success: function(data){
	   		var datos = data.split('|');
	   		$('#id_clinica').val(datos[0]);
	   		$('#nombre').val(datos[1]);
	   		$('#email').val(datos[2]);
	   		$('#celular').val(datos[3]);
	   		$('#id_celular_compania').val(datos[4]);
	   		//Mostramos datos
	   		$('#titulo_modal').html('Edita Secretaria');
	   		$('#titulo_contrasena').html('Cambiar Contraseña');
	   		$('#btn_valida_con').hide();
	   		$('.labels').show();
	    	$('#datos').show('Fast');
	    	$('#footer').show();
	  	
	   		store.set('id_secretaria',data_id);
	   	},
	   	cache: false
	   });
	});
	 
	$('#NuevaSecretaria').on('shown.bs.modal', function (e) {
		$('#email').focus();		
  	});
  	$('#NuevaSecretaria').on('hidden.bs.modal', function (e) {
		$('.labels').hide();
	    $('#datos').hide();
	    $('#footer').hide();
	    $('.mod').removeAttr("disabled").val('');
	    $('#btn_guarda').removeAttr("disabled");
	    $('#btn_valida').removeAttr("disabled");
	    $('#titulo_modal').html('Nueva Secretaria');
	   	$('#titulo_contrasena').html('Contraseña');
	    $('#msg').hide();
	    if($('#btn_valida_con').length){
			$('#btn_valida_con').show();
	    }
  	});
	/* 
	$('#frm_guarda').submit(function(e) {
		ac_form();
		e.preventDefault();
	});
	*/
	$(document).on('click', '[data-nuevo]', function () {
		 $('.mod').val('');
		 store.remove('id_secretaria');
		 $('#titulo_modal').html('Nueva Secretaria');
	});
	
	$(document).on('click', '[data-id-elimina]', function () {
		var id_secretaria = $(this).attr('data-id-elimina');
		store.set('id_secretaria',id_secretaria);
	});
	

});

function ac_form(elimina){

	if(!elimina){
		elimina = '0';
	}else{
		var btn_eliminar = Ladda.create(document.querySelector('#btn_eliminar'));
		btn_eliminar.start();
	}

	var datos=$('#frm_guarda').serialize();
	
	var btn_guarda = Ladda.create(document.querySelector('#btn_guarda'));
	
	btn_guarda.start();
	$('.mod').attr("disabled", true);
	
	if(!store.get('id_secretaria')){
		var id_secretaria = 0;
	}else{
		var id_secretaria = store.get('id_secretaria');
	}

	$.post('ac/secretaria.php',datos+'&id_secretaria='+id_secretaria+'&eliminar='+elimina,function(data){

	    if(data==1){
	    	location.href = "?Modulo=Secretarias&msg=1";
	    }else if(data==2){
	    	location.href = "?Modulo=Secretarias&msg=2";
	    }else if(data==3){
	    	location.href = "?Modulo=Secretarias&msg=3";
	    }else{
	    
	    	if(elimina==1){
		    	$('#msg_data2').html(data);
	    		$('#msg2').show();
	    		$('#msg2').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    		$('.mod').removeAttr("disabled");
	    		btn_eliminar.stop();
	    	}else{
	    		$('#msg_data').html(data);
	    		$('#msg').show();
	    		$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    		btn_guarda.stop();
	    		$('.mod').removeAttr("disabled");
	    		$('#nombre').focus();
	    	}
	    	
	    }
	});
};
//Validamos que la secretaria exista
function validaCorreo(){
	$('#msg').hide();
	var email = $('#email').val();
	$('#email').attr("readonly", true);
    $.ajax({
    url: "data/valida_secretaria.php",
    data: 'email='+email,
    success: function(data){
    	var datos = data.split('|');
    	var valida = datos[0];
    	if(valida==1){
	    	$('#nombre').val(datos[1]);
	    	$('#datos').show('Fast');
	    	$('#footer').show();
	    	//deshabilitamos
	    	$('#btn_valida').attr("disabled", true);
	    	$('#nombre').attr("disabled", true);
	    	$('#btn_valida_con').hide();
	    	//Clases
	    	$('#label_clinica').attr("class","col-sm-12 has-error");
	    	//mostramos el mensaje
	    	$('#msg_data').html('Esta <strong>secretaria</strong> ya existe en <strong>Calidad Médica</strong>, si desea continuar haga click en vincular.');
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-success animation animating flipInX");
	    	$('#btn_guarda_text').html('Vincular');
    	}else if(valida==2){
    		$('#email').removeAttr("readonly");
    		$('.labels').show();
	    	$('#datos').show('Fast');
	    	$('#footer').show();
	    	$('#nombre').focus();
	    }else if(valida==3){
	    	$('#msg_data').html('Esta secretaria ya esta vinculada a su cuenta.');
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    	$('#email').removeAttr("readonly");
    	}else if(valida==4){
    		$('#msg_data').html('La cuenta <strong>'+email+'</strong> no ha sido confirmada, Intente más tarde.');
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    	$('#email').removeAttr("readonly");
    	}else if(valida==5){
    		$('#msg_data').html('El correo <strong>'+email+'</strong> no es valido, verifique el formato.');
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    	$('#email').removeAttr("readonly");	
    	}
    },
    cache: false
   });
}
</script>

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/tabletools.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/zeroclipboard.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables-custom.min.js"></script>
<script type="text/javascript" src="javascript/tables/datatable.js"></script>

<script type="text/javascript" src="javascript/components/animation.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="javascript/forms/element.js"></script>
<script type="text/javascript" src="plugins/prettify/js/prettify.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->

<!-- START Modal -->
<div id="NuevaSecretaria" class="modal fade">
    <div class="modal-dialog ">
        <form class="modal-content" id="frm_guarda">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-vcard mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary" id="titulo_modal">Cargando..</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <!-- Mensaje de Error -->
                    	<div id="msg" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <span id="msg_data"></span>
                        </div>
                    <!-- END Mensaje de Error -->
                       	<div class="form-group">
                       		<div class="row">
                            	<div class="col-sm-12">
                            		<label class="control-label">Email <span class="text-danger">*</span></label>
                            	    <div class="input-group">
                            	        <input type="text" class="form-control mod" name="email" id="email" maxlength="65" autocomplete="off">
                            	        <span class="input-group-btn" id="btn_valida_con">
                            	            <button class="btn btn-primary" type="button" onclick="javascript:validaCorreo();" id="btn_valida">Siguiente</button>
                            	        </span>
                            	    </div>
                            	</div>
                       		</div>
                        </div>
                    <!-- En caso de que no exista -->
                    <div id="datos" style="display:none;">
                    <? if($valida_clinica>1){ ?>
                    	<div class="form-group">
                        	<div class="row">
                            	<div class="col-sm-12" id="label_clinica">
                                	<label class="control-label">Clínica <span class="text-danger">*</span></label>
									<select name="id_clinica" class="form-control mod" id="id_clinica">
                                    	<option>Seleccione una</option>
                                    	<? while($ft=mysql_fetch_assoc($q)){ ?>
										<option value="<?=$ft['id_clinica']?>"><?=$ft['clinica']?></option>
										<? } ?>
                                    </select>
								</div>
                        	</div>
                        </div>
                    <? }else{ 
	                    $ft=@mysql_fetch_assoc($q);
                    ?>
                    	<input type="hidden" name="id_clinica" value="<?=$ft['id_clinica']?>" />
                    <? } ?>
                        <div class="form-group">
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<label class="control-label">Nombre <span class="text-danger">*</span></label>
                                	<input type="text" class="form-control mod" name="nombre" id="nombre" autocomplete="off" maxlength="45">
								</div>
                        	</div>
                        </div>
                        
                        <div class="form-group labels" style="display:none;">
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<label class="control-label">Celular <span class="text-danger">*</span></label>
									<input type="text" class="form-control mod" name="celular" id="celular" autocomplete="off" maxlength="10">
								</div>
                        	</div>
                        </div>
                        
                        <div class="form-group labels" style="display:none;">
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<label class="control-label">Compañía movil <span class="text-danger">*</span></label>
									<select name="id_celular_compania" class="form-control mod" id="id_celular_compania">
                                    	<? $q=mysql_query("SELECT * FROM celular_compania"); ?>
                                    	<? while($ft=mysql_fetch_assoc($q)){ ?>
										<option value="<?=$ft['id_celular_compania']?>"><?=$ft['compania']?></option>
										<? } ?>
                                    </select>
								</div>
                        	</div>
                        </div>
                        
                        <div class="form-group labels" style="display:none;">
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<label class="control-label" id="titulo_contrasena">Contraseña <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="contrasena" id="contrasena" autocomplete="off" maxlength="16">
								</div>
                        	</div>
                        </div>
                        
                    </div>
                    <!-- Termina en caso de que no exista -->
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display:none;" id="footer">
                <button type="button" class="btn mod btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success ladda-button" data-style="zoom-in" id="btn_guarda"><span class="ladda-label" id="btn_guarda_text">Guardar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->




<!-- START Modal -->
<div id="EliminaScretaria" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" id="frm_elimina">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-trash mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary " id="titulo">Elimina Secretaria</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <!-- Mensaje de Error -->
                    	<div id="msg2" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <span id="msg_data2"></span>
                        </div>
						<h5 class="text-center">¿Desea eliminar?</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mod btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" id="btn_eliminar"><span class="ladda-label">Aceptar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->