<?
$id_agenda=escapar($_GET['ID'],1);
$id_paciente=escapar($_GET['id_paciente'],1);
$id_consulta=escapar($_GET['Consulta'],1); //RESUMEN DE CONSULTA
if(!$id_agenda){
	//Si viene desde los pacientes pero sin cita
	if($id_paciente){
		$sql="SELECT * FROM pacientes WHERE id_medico=$id_medico AND activo=1 AND id_paciente=$id_paciente";
		$q=mysql_query($sql);
		$valida_consulta=mysql_num_rows($q);
		if(!$valida_consulta) header("Location: index.php");
		
		$datos=mysql_fetch_assoc($q);
		/* Datos */
		$nombre=$datos['nombre'];
		$telefono=$datos['celular'];
		$email=$datos['email'];
		$edad=$datos['edad'];
		$sexo=$datos['sexo'];
		$anotacion=$datos['anotacion'];
		$antecedentes=$datos['antecedentes_alergias'];
		$titulo="/ ".$nombre;
        $return = "Pacientes";
	}else{
		//Clinicas
		$sql_clinica="SELECT * FROM clinicas WHERE id_medico='$id_medico' AND activo='1'";
		$q_clinica=mysql_query($sql_clinica);
		$valida_clinica=mysql_num_rows($q_clinica);
		
		//Pacientes
		$sql_pacientes="SELECT * FROM pacientes WHERE id_medico='$id_medico' AND activo='1'";
		$q_pacientes=mysql_query($sql_pacientes);
	}
}else{
	$sql="SELECT agenda.*, pacientes.*, clinicas.clinica FROM agenda 
	JOIN pacientes ON pacientes.id_paciente=agenda.id_paciente
	JOIN clinicas ON clinicas.id_clinica=agenda.id_clinica
	LEFT JOIN secretarias ON secretarias.id_secretaria=agenda.id_secretaria
	WHERE agenda.id_medico=$id_medico AND agenda.activo=1 AND agenda.id_agenda='$id_agenda' AND atendida=0";
	$q=mysql_query($sql);
	$valida_consulta=mysql_num_rows($q);
	if(!$valida_consulta) header("Location: index.php");
	
	$datos=mysql_fetch_assoc($q);
	/* Datos */
	$id_paciente=$datos['id_paciente'];
	$nombre=$datos['nombre'];
	$telefono=$datos['celular'];
	$email=$datos['email'];
	$edad=$datos['edad'];
	$sexo=$datos['sexo'];
	$anotacion=$datos['anotacion'];
	$antecedentes=$datos['antecedentes_alergias'];
	$titulo="/ ".$nombre;
    $return = "ConsultasAgendadas";
	
}

///SI VIENE DE RESUMEN
if($id_consulta){
    $sql="SELECT consultas.*, pacientes.*, recetas.receta FROM consultas 
    JOIN pacientes ON pacientes.id_paciente=consultas.id_paciente
    JOIN recetas ON recetas.id_consulta=consultas.id_consulta
    WHERE consultas.id_medico=$id_medico AND consultas.activo=1 AND consultas.id_consulta='$id_consulta'";
    $q=mysql_query($sql);
    $valida_consulta=mysql_num_rows($q);
    if(!$valida_consulta) header("Location: index.php");
    
    $datos=mysql_fetch_assoc($q);
    /* Datos */
    $id_paciente=$datos['id_paciente'];
    $nombre=$datos['nombre'];
    $telefono=$datos['celular'];
    $email=$datos['email'];
    $edad=$datos['edad'];
    $sexo=$datos['sexo'];
    $anotacion=$datos['anotacion'];
    $antecedentes=$datos['antecedentes_alergias'];
    $info1 = $datos['diagnostico'];
    $info2 = $datos['receta'];
    $info3 = $datos['sugerencias'];
    $titulo="/ ".$nombre." ".fechaLetra($datos['fecha_hora']);
    $msj = "Resumen ";
    $block = "readonly";
    $hide = "display:none;";
    $return = "ConsultasAtendidas";
}
///FIN DE RESUMEN

$sq_aseguradoras="SELECT * FROM aseguradoras WHERE id_medico=$id_medico AND activo=1";
$q_aseguradoras=mysql_query($sq_aseguradoras);
$valida_aseguradoras=mysql_num_rows($q_aseguradoras);
?>

<!-- START Template Main -->
<section id="main" role="main">

    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold"><?=$msj?> Consulta <?=$titulo?></h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">

                	<a class="btn btn-sm btn-danger" href="?Modulo=<?=$return?>" role="button">Regresar</a>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        <!-- START row -->
        <div class="row">
            <div class="col-md-6">
	            
                <!-- START panel -->
                <form class="panel panel-teal form-horizontal form-bordered" id="datos1">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                    	<h3 class="panel-title"><i class="ico-user22 mr5"></i> Datos Generales</h3>            
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Paciente<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
	                            <!--
	                            <? //if(!$id_agenda){ ?>
                                <select id="selectize-select" name="id_paciente" class="form-control mod" placeholder="Seleccione o escriba el nombre...">
            	                    <option value="">Seleccione o escriba el nombre...</option>
            	                    <? //while($ft=mysql_fetch_assoc($q_pacientes)){ ?>
        	                        <option value="<?=$ft['id_paciente']?>"><?=$ft['nombre']?></option>
        	                        <? //} ?>
								</select>
								<? //}else{ ?>
								-->
									
									<? if($id_agenda){ ?>
									<input type="text" class="form-control" name="nombre" value="<?=$nombre?>" >
									<input type="hidden" class="form-control" name="id_paciente" value="<?=$id_paciente?>" >
									<? }else{ 
										if($id_paciente){
									?>
										<input type="text" class="form-control" name="nombre" value="<?=$nombre?>" <?=$block?>>
										<input type="hidden" class="form-control" name="id_paciente" value="<?=$id_paciente?>" >
										<? }else{ ?>
									<input type="text" class="form-control" name="id_paciente" maxlength="68" >
										<? } ?>
									<? } ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Teléfono<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="telefono" data-mask="(99) 9999-9999" value="<?=$telefono?>" <?=$block?>>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="<?=$email?>" <?=$block?>>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </form>
                <!-- END form panel -->
            </div>

            <div class="col-md-6">
                <!-- START panel -->
                <form class="panel panel-teal form-bordered" id="datos2">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user22 mr5"></i> Datos Personales</h3>
                    </div>
                    
                    <!-- panel body -->
                    <div class="panel-body" style="padding-bottom:0px;">
                        
                        <div class="form-group">
                            <div class="row">
                            
                                <div class="col-sm-6">
                                    <label class="control-label">Edad</label>
                                    <input type="text" name="edad" class="form-control" data-mask="99" value="<?=$edad?>" <?=$block?>>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Sexo</label>
                                    <select class="form-control" name="sexo" <?=$block?>>
                                		<option>Seleccione</option>
										<option value="M" <? if($sexo=="M"){ ?>selected="selected" <? } ?>>Masculino</option>
										<option value="F" <? if($sexo=="F"){ ?>selected="selected" <? } ?>>Femenino</option>
									</select>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label">Antecedentes y Alergias</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb10">
                                    <textarea class="form-control animated" rows="4" name="antecedentes" <?=$block?>><?=$antecedentes?></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </form>
                <!-- END form panel -->
            </div>
            
        </div>
        <!--/ END row -->
<!-- Observación en la cita -->
<? if($anotacion){ ?>    
		<div class="row">
			<div class="col-md-12">
                <!-- START panel -->
                <div class="panel panel-teal">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user22 mr5"></i> Anotaciones al solicitar la cita</h3>
                    </div>
                    <!--/ panel heading/header -->
                    
                    <!-- panel body with collapse capable -->
                    <div class="panel-collapse pull out">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 mb10">
                                    <textarea class="form-control animated" rows="4"><?=$anotacion?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ panel body with collapse capabale -->

                </div>
                <!--/ END panel -->
            </div>
		</div>        
<? } ?>        
<!-- Diagnostico -->
		<div class="row">
			<div class="col-md-12">
                <!-- START panel -->
                <div class="panel panel-primary">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user-md mr5"></i> Diagnóstico</h3>
                    </div>
                    <!--/ panel heading/header -->
                    
                    <!-- panel body with collapse capable -->
                    <div class="panel-collapse pull out">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 mb10">
                                    <textarea class="form-control animated" rows="4" name="diagnostico" id="diagnostico" <?=$block?>><?=$info1?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ panel body with collapse capabale -->

                </div>
                <!--/ END panel -->
            </div>
		</div>
<!-- Receta -->
		<div class="row">
			<div class="col-md-12">
                <!-- START panel -->
                <div class="panel panel-primary">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user-md mr5"></i> Prescripción (Receta)</h3>
                    </div>
                    <!--/ panel heading/header -->
                    
                    <!-- panel body with collapse capable -->
                    <div class="panel-collapse pull out">
                        <div class="panel-body">
	                        
                            	<div class="summernote" id="summernote_receta" name="summernote_receta" ><?=$info2?></div>
                            	<br />
                            	
                            <div id="contenedor-receta" style="display: none;">
                            	<h4>Receta Adicional: </h4>
                            	<div class="summernote" id="summernote_receta_adicional" name="summernote_receta_adicional"></div>
                            	<br /><br />
                            </div>
                            <div class="panel-footer text-right" style="<?=$hide?>">
                                <button class="btn btn-primary" id="btn-receta-adicional" ><span class="ico-plus-circle2"></span> Receta Adicional</button>
                                <button class="btn btn-danger" id="btn-receta-adicional-x" style="display: none;"><span class="ico-plus-circle2"></span> Eliminar Receta Adicional</button>
                            </div>
                        </div>
                    </div>
                    <!--/ panel body with collapse capabale -->

                </div>
                <!--/ END panel -->
            </div>
		</div>	
<!-- Sugerencias -->
		<div class="row">
			<div class="col-md-12">
                <!-- START panel -->
                <div class="panel panel-primary">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user-md mr5"></i> Sugerencias</h3>
                    </div>
                    <!--/ panel heading/header -->
                    
                    <!-- panel body with collapse capable -->
                    <div class="panel-collapse pull out">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 mb10">
                                    <textarea class="form-control animated" rows="4" name="sugerencias" id="sugerencias" <?=$block?>><?=$info3?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ panel body with collapse capabale -->

                </div>
                <!--/ END panel -->
            </div>
		</div>
<!-- Termina el Row -->
		
		<div class="row">
			<div class="col-md-12 text-center">
				<br />
				<button class="btn btn-lg btn-primary" style="<?=$hide?>" data-toggle="modal" data-target="#ModalConfirma" data-backdrop="static">Terminar Consulta</button>
				<br /><br />
			</div>
		</div>

    </div>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->

<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->
<script>
$(function(){
	$('.animated').autosize();
	
	// Summernote
    // ================================
    $(".summernote").summernote({
        height: 200,
        toolbar: [
            ["style", ["style"]],
            ["style", ["bold", "italic", "underline", "clear"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
            ["table", ["table"]]
        ]
    });
    
    

	
	//Selector
	$("#selectize-select").selectize({
		create: true,
		onItemAdd: function(){
			$('#telefono').focus();
		},
        sortField: {
            field: "text",
            direction: "asc"
        }
        
    });
    
    $('#btn-receta-adicional').click(function() {
		$('#contenedor-receta').show().addClass("animation animating bounceInLeft");
		$('#btn-receta-adicional').hide();
		$('#btn-receta-adicional-x').show();
		$('#receta_adicional').summernote('focus');
	});
	
	$('#btn-receta-adicional-x').click(function() {
		$('#contenedor-receta').hide('fast');
		$('#btn-receta-adicional-x').hide();
		$('#btn-receta-adicional').show();
	});
	
	$('#tipo_cobro').change(function() {
		var	tipo_cobro=$('#tipo_cobro').val();
		if(tipo_cobro==4){
			$('#ver_aseguradoras').show('fast');
		}else{
			$('#ver_aseguradoras').hide('fast');
		}
		$('#monto').focus();
	});
    	
});

function terminarConsulta(){
	
	//var btn_guarda = Ladda.create(document.querySelector('#btn-cobrar'));
	//btn_guarda.start();	
	
	var datos1=$('#datos1').serialize();
	var datos2=$('#datos2').serialize();
	var diagnostico=$('#diagnostico').val();
	var sugerencias=$('#sugerencias').val();
	var receta = encodeURIComponent($('#summernote_receta').summernote('code'));
	var receta_adicional = encodeURIComponent($('#summernote_receta_adicional').summernote('code'));
	
	var enviar_email=$('#enviar_email').val();
	var monto=$('#monto').val();
	var id_aseguradora=$('#id_aseguradora').val();
	var	tipo_cobro=$('#tipo_cobro').val();
	var	observacion=$('#observacion').val();
	
	if(tipo_cobro==4){
		if(!id_aseguradora){
			$('#msg_data').html('No ha creado aseguradoras, no puede continuar.');
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    	btn_guarda.stop();
	    	return false;
		}
	}
	var datos=datos1+'&'+datos2+'&receta='+receta+'&sugerencias='+sugerencias+'&diagnostico='+diagnostico+'&receta_adicional='+receta_adicional+'&tipo_cobro='+tipo_cobro+'&monto='+monto+'&id_aseguradora='+id_aseguradora+'&anotacion='+observacion;
	//$('.mod').attr("disabled", true); 
	$.post('ac/consulta.php',datos,function(data){
	    if(data==1){
			window.open("?Modulo=ConsultasAtendidas&msg=1", "_self");
	    }else{
		    alert(data);
		    /*
	    	$('#msg_data').html(data);
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");*/
	    	//btn_guarda.stop();
	    }
	});
}
</script>
<!-- App and page level script -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/summernote/js/summernote.min.js"></script>
<script type="text/javascript" src="plugins/inputmask/js/inputmask.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>



<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->

<!-- START Modal -->
<div id="ModalConfirma" class="modal fade">
    <div class="modal-dialog">
        <form class="modal-content" >
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-user-md mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary">Resumen de Consulta</h4>
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
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Tipo de Cobro</label>
                                    <select class="form-control" name="tipo_cobro" id="tipo_cobro">
                                		<option value="">Seleccione</option>
										<option value="1">Cobro en Caja</option>
										<option value="2">Cobro Inmediato (Dentro de Consultorio)</option>
										<option value="3">Crédito General</option>
										<option value="4">Crédito Aseguradora</option>
									</select>
                                </div>
                                
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Monto de honorarios</label>
                                    <div class="input-group">
									    <span class="input-group-addon">$</span>
									    <input type="text" class="form-control" name="monto" id="monto">
									    
									</div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group" id="ver_aseguradoras" style="display: none;">
                        	<div class="row">                                
                                <!-- En saco de que elija aseguradora (El botón de monto se va para abajo) Otra nota; si es con aseguradora también se debe pedir el número de poliza-->
                                <div class="col-sm-12" >
	                                <? if($valida_aseguradoras){ ?>
                                    <label class="control-label">Seleccione Aseguradora</label>
                                    <select class="form-control" name="id_aseguradora" id="id_aseguradora">
                                		<option value="">Seleccione</option>
                                		<? while($ft=mysql_fetch_assoc($q_aseguradoras)){ ?>
										<option value="<?=$ft['id_aseguradora']?>"><?=$ft['nombre_aseguradora']?></option>
										<? } ?>
									</select>
									<? }else{ ?>
									<div class="alert alert-dismissable alert-warning">Aún no ha creado aseguradoras.</div>
									<? } ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Observación</label>
                            <textarea name="observacion" id="observacion" class="form-control" rows="4" ></textarea>
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 0px; display: none;">
                        	<span class="checkbox custom-checkbox custom-checkbox-primary">
		                    	<input type="checkbox" name="enviar_email" id="enviar_email">
		                    	<label for="customcheckbox1">&nbsp;&nbsp;Enviar receta por Email</label>
							</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
                <div class="row">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-success ladda-button" data-style="zoom-in" id="btn-cobrar" onclick="terminarConsulta()"><span class="ladda-label" id="btn_guarda_text">Aceptar</span></button>
                </div>

            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->