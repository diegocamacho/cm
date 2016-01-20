<?
$sql="SELECT medicos.*,alertas.*,credenciales.email FROM medicos 
JOIN credenciales ON credenciales.id_usuario=medicos.id_medico
JOIN alertas ON alertas.id_medico=medicos.id_medico
WHERE medicos.id_medico=$id_medico";
$q=mysql_query($sql);
$datos_medico=mysql_fetch_assoc($q);

$fecha_nacimiento=$datos_medico['fecha_nacimiento'];
$dia_nacimiento=substr($fecha_nacimiento, 8,2);
$mes_nacimiento=substr($fecha_nacimiento, 5,2);
$ano_nacimiento=substr($fecha_nacimiento, 0,4);

//Alertas
$agenda=$datos_medico['agenda'];
$resumen_inicial=$datos_medico['resumen_inicial'];
$resumen_final=$datos_medico['resumen_final'];
$facturacion_1=$datos_medico['facturacion_1'];
$facturacion_2=$datos_medico['facturacion_2'];
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Configuración de la cuenta</h4>
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
            <!-- Left / Top Side -->
            <div class="col-lg-3">
                <!-- tab menu -->
                <ul class="list-group list-group-tabs">
                    <li class="list-group-item active" onclick="javascript:limpia();"><a href="#perfil" data-toggle="tab"><i class="ico-user2 mr5"></i> Información Personal</a></li>
                    <li class="list-group-item" onclick="javascript:limpia();"><a href="#contrasenas" data-toggle="tab"><i class="ico-key2 mr5"></i> Contraseña</a></li>
                    <li class="list-group-item" onclick="javascript:limpia();"><a href="#alertas" data-toggle="tab"><i class="ico-bubble-notification2 mr5"></i> Alertas</a></li>
                </ul>
                <!-- tab menu -->


                <!-- figure with progress -
                <ul class="list-table">
                    <li style="width:70px;">
                        <img class="img-circle img-bordered" src="image/avatar/avatar7.jpg" alt="" width="65px">
                    </li>
                    <li class="text-left">
                        <h5 class="semibold ellipsis mt0">Dr. Diego Camacho Flores</h5>
                        <div style="max-width:200px;">
                            <div class="progress progress-xs mb5">
                                <div class="progress-bar progress-bar-warning" style="width:70%"></div>
                            </div>
                            <p class="text-muted clearfix nm">
                                <span class="pull-left">Perfil completado</span>
                                <span class="pull-right">70%</span>
                            </p>
                        </div>
                    </li>
                </ul>
                <!--/ figure with progress -->



                <!-- follower stats --
                <ul class="nav nav-section nav-justified mt15">
                    <li>
                        <div class="section">
                            <h4 class="nm semibold">12.5k</h4>
                            <p class="nm text-muted">Followers</p>
                        </div>
                    </li>
                    <li>
                        <div class="section">
                            <h4 class="nm semibold">1853</h4>
                            <p class="nm text-muted">Following</p>
                        </div>
                    </li>
                    <li>
                        <div class="section">
                            <h4 class="nm semibold">3451</h4>
                            <p class="nm text-muted">Tweets</p>
                        </div>
                    </li>
                </ul>
                <!--/ follower stats -->
            </div>
            <!--/ Left / Top Side -->

            <!-- Left / Bottom Side -->
            <div class="col-lg-9">
                <!-- START Tab-content -->
                <div class="tab-content">
                    <!-- tab-pane: perfil -->
                    <div class="tab-pane active" id="perfil">
                        <!-- form profile -->
                        <form class="panel form-horizontal form-bordered" id="frm_perfil">
                            <div class="panel-body pt0 pb0">
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Información Personal</h4>
                                        <p class="text-default nm">Mantenga su información actualizada.</p>
                                    </div>
                                </div>
                                
                                <!-- Mensaje-->
                                <div id="msg_perfil" style="display:none;">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            		<span id="msg_data_perfil"></span>
								</div>
                                <!-- End mensaje -->
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Foto</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group pr5">
                                            <img class="img-circle img-bordered" src="image/avatar/avatar7.jpg" alt="" width="34px">
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Cambiar Foto</button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Subir Foto</a></li>
                                                <li><a href="#">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="nombre" maxlength="70" value="<?=$datos_medico['nombre']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cédula Profesional:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mod" name="cedula" maxlength="10" value="<?=$datos_medico['cedula']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo:</label>
                                    <div class="col-sm-3">
                                    	<select class="form-control mod" name="sexo">
                                            <option value="M" <? if($datos_medico['sexo']=='M'){ ?>selected="1" <? } ?>>Masculino</option>
                                            <option value="F" <? if($datos_medico['sexo']=='F'){ ?>selected="1" <? } ?>>Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Correo Electrónico:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control mod" name="email" maxlength="65" value="<?=$datos_medico['email']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Teléfono Móvil:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mod" name="celular" maxlength="10" value="<?=$datos_medico['celular']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Compañía Móvil:</label>
                                    <div class="col-sm-3">
                                        <select name="id_celular_compania" class="form-control mod" id="id_celular_compania">
                                    	<? $q=mysql_query("SELECT * FROM celular_compania"); ?>
                                    	<? while($ft=mysql_fetch_assoc($q)){ ?>
										<option value="<?=$ft['id_celular_compania']?>" <? if($datos_medico['id_celular_compania']==$ft['id_celular_compania']){ ?>selected="1" <? } ?>><?=$ft['compania']?></option>
										<? } ?>
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                                    <div class="col-sm-1" style="padding-right: 0px;">
                                        <input type="text" class="form-control mod" name="dia_nacimiento" maxlength="2" value="<?=$dia_nacimiento?>">
                                    </div>
                                    <div class="col-sm-2" style="padding-right: 0px;">
                                    	<select class="form-control mod" name="mes_nacimiento">
                                    		<option value="01" <? if($mes_nacimiento=='01'){ ?>selected="1"<? } ?>>Enero</option>
                                            <option value="02" <? if($mes_nacimiento=='02'){ ?>selected="1"<? } ?>>Febrero</option>
                                            <option value="03" <? if($mes_nacimiento=='03'){ ?>selected="1"<? } ?>>Marzo</option>
                                            <option value="04" <? if($mes_nacimiento=='04'){ ?>selected="1"<? } ?>>Abril</option>
                                            <option value="05" <? if($mes_nacimiento=='05'){ ?>selected="1"<? } ?>>Mayo</option>
                                            <option value="06" <? if($mes_nacimiento=='06'){ ?>selected="1"<? } ?>>Junio</option>
                                            <option value="07" <? if($mes_nacimiento=='07'){ ?>selected="1"<? } ?>>Julio</option>
                                            <option value="08" <? if($mes_nacimiento=='08'){ ?>selected="1"<? } ?>>Agosto</option>
                                            <option value="09" <? if($mes_nacimiento=='09'){ ?>selected="1"<? } ?>>Septiembre</option>
                                            <option value="10" <? if($mes_nacimiento=='10'){ ?>selected="1"<? } ?>>Octubre</option>
                                            <option value="11" <? if($mes_nacimiento=='11'){ ?>selected="1"<? } ?>>Noviembre</option>
                                            <option value="12" <? if($mes_nacimiento=='12'){ ?>selected="1"<? } ?>>Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2" style="padding-right: 0px;">
                                        <input type="text" class="form-control mod" name="ano_nacimiento" maxlength="4" value="<?=$ano_nacimiento?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Estado:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mod" name="id_estado">
                                            <? $q=mysql_query("SELECT * FROM estados");
                                            while($ft=mysql_fetch_assoc($q)){ ?>
											<option value="<?=$ft['id_estado']?>" <? if($ft['id_estado']==$datos_medico['id_estado']){?> selected="selected"<? } ?>><?=$ft['estado']?></option>
											<? } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ciudad:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control mod" name="ciudad" maxlength="100" value="<?=$datos_medico['ciudad']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <!--<button type="reset" class="btn btn-default">Cancelar</button>-->
                                <button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" id="btn_guarda_perfil"><span class="ladda-label">Guardar</span></button>
                            </div>
                        </form>
                        <!--/ form profile -->
                    </div>
                    <!--/ tab-pane: perfil -->

                    <!-- tab-pane: contrasena -->
                    <div class="tab-pane" id="contrasenas">
                        <!-- form password -->
                        <form class="panel form-horizontal form-bordered" id="frm_pass">
                            <div class="panel-body pt0 pb0">
                            	
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Contraseña</h4>
                                        <p class="text-default nm">Cambiar la contraseña o recuperar la actual.</p>
                                    </div>
                                </div>
                                
                                <!-- Mensaje-->
                                <div id="msg_pass" style="display:none;">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            		<span id="msg_data_pass"></span>
								</div>
                                <!-- End mensaje -->
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contraseña Actual</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control mod" name="contrasena" id="contrasena">
                                        <div class="help-block mt12 text-danger" id="msg_contrasena"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nueva Contraseña</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control mod" name="nueva_contrasena" id="nueva_contrasena">
                                        <div class="help-block mt12 text-danger" id="msg_nueva_contrasena"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Repetir Contraseña</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control mod" name="verifica_contrasena" id="verifica_contrasena">
                                        <div class="help-block mt12 text-danger" id="msg_verifica_contrasena"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="panel-footer text-right">
                                <!--<button type="reset" class="btn btn-default">Reset</button>-->
                                <button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" id="btn_pass"><span class="ladda-label">Guardar</span></button>
                            </div>
                        </form>
                    </div>
                    <!--/ tab-pane: çcontrasena -->
                    
                    <!-- tab-pane: alertas -->
                    <div class="tab-pane" id="alertas">
                        <!-- form security -->
                        <form class="panel form-horizontal form-bordered" id="frm_alertas">
                            <div class="panel-body pt0 pb0">
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Alertas</h4>
                                        <p class="text-default nm">Active las alertas para diversas tareas.</p>
                                    </div>
                                </div>
                                
                                <!-- Mensaje-->
                                <div id="msg_alerta" style="display:none;">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            		<span id="msg_data_alerta"></span>
								</div>
                                <!-- End mensaje -->
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Agenda</label>
                                    <div class="col-sm-9">
                                        <span class="checkbox custom-checkbox">
                                            <input type="checkbox" name="agenda" id="agenda" <? if($agenda==1){ ?> checked="1" <? } ?>>
                                            <label for="agenda">&nbsp;&nbsp;Notificarme cuándo se agregue o edite una cita a la agenda</label>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Resumen inicial</label>
                                    <div class="col-sm-9">
                                        <span class="checkbox custom-checkbox">
                                            <input type="checkbox" name="resumen_inicial" id="resumen_inicial" <? if($resumen_inicial==1){ ?> checked="1" <? } ?>>
                                            <label for="resumen_inicial">&nbsp;&nbsp;Enviarme una notificación con las citas agendadas para el día</label>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Resumen final</label>
                                    <div class="col-sm-9">
                                        <span class="checkbox custom-checkbox">
                                            <input type="checkbox" name="resumen_final" id="resumen_final" <? if($resumen_final==1){ ?> checked="1" <? } ?>>
                                            <label for="resumen_final">&nbsp;&nbsp;Enviarme una notificación con el resumen del día de trabajo</label>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Facturación</label>
                                    <div class="col-sm-9">
                                        <span class="checkbox custom-checkbox">
                                            <input type="checkbox" name="facturacion_1" id="facturacion_1" <? if($facturacion_1==1){ ?> checked="1" <? } ?> >
                                            <label for="facturacion_1">&nbsp;&nbsp;Notificarme cuándo se timbre un recibo de honorarios</label>
                                        </span>
                                    </div>
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <span class="checkbox custom-checkbox">
                                            <input type="checkbox" name="facturacion_2" id="facturacion_2" <? if($facturacion_2==1){ ?> checked="1" <? } ?>>
                                            <label for="facturacion_2">&nbsp;&nbsp;Notificarme cuándo se cancele un recibo de honorarios</label>
                                        </span>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="panel-footer text-right">
                                <!--<button type="reset" class="btn btn-default">Reset</button>-->
                                <button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" id="btn_alertas"><span class="ladda-label">Guardar</span></button>
                            </div>
                        </form>
                    </div>
                    <!--/ tab-pane: alertas -->
                    
                </div>
                <!--/ END Tab-content -->
            </div>
            <!--/ Left / Bottom Side -->
        </div>
        <!--/ END row -->
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
$(function() {
	$('#btn_guarda_perfil').click(function(){
	 	ac_form_perfil();
	});
	
	$('#btn_pass').click(function(){
		$('#msg_contrasena').hide();
		$('#contrasena').attr("class","form-control mod");
		$('#msg_nueva_contrasena').hide();
		$('#nueva_contrasena').attr("class","form-control mod");
		$('#msg_verifica_contrasena').hide();
		$('#verifica_contrasena').attr("class","form-control mod");
	 	ac_form_pass();
	});
	
	$('#btn_alertas').click(function(){
	 	ac_form_alertas();
	});
});
function limpia(){
	$('#msg_perfil').hide();
	$('#msg_pass').hide();
	$('#msg_alerta').hide();
};
function scrollToElement(target) {
    var topoffset = 30;
    var speed = 100;
    var destination = jQuery( target ).offset().top - topoffset;
    jQuery( 'html:not(:animated),body:not(:animated)' ).animate( { scrollTop: destination}, speed, function() {
        window.location.hash = target;
    });
    return false;
};
//Actualizo datos del perfil
function ac_form_perfil(){
	
	$('#msg_perfil').hide();
	var btn_guarda_perfil = Ladda.create(document.querySelector('#btn_guarda_perfil'));
	btn_guarda_perfil.start();
	var datos=$('#frm_perfil').serialize();
	$('.mod').attr("readonly", true);
	
	$.post('ac/mi_cuenta_perfil.php',datos,function(data){
	    if(data==1){
	    	btn_guarda_perfil.stop();
	    	scrollToElement('#main');
	    	$('#msg_data_perfil').html('Tu perfil de ha actualizado.');
	    	$('#msg_perfil').show();
	    	$('#msg_perfil').attr("class","alert alert-dismissable alert-success animation animating flipInX mt15");
	    	$('.mod').removeAttr("readonly");
	    }else{
	    	btn_guarda_perfil.stop();
	    	scrollToElement('#main');
			$('#msg_data_perfil').html(data);
	    	$('#msg_perfil').show();
	    	$('#msg_perfil').attr("class","alert alert-dismissable alert-danger animation animating flipInX mt15");
			$('.mod').removeAttr("readonly");
	    }
	});
};
//Actualizo contraseña
function ac_form_pass(){
	
	$('#msg_pass').hide();
	var btn_pass = Ladda.create(document.querySelector('#btn_pass'));
	btn_pass.start();
	var datos=$('#frm_pass').serialize();
	$('.mod').attr("readonly", true);
	
	$.post('ac/mi_cuenta_pass.php',datos,function(data){
	    if(data==1){
	    	btn_pass.stop();
	    	$('#msg_contrasena').html('Contraseña inválida.');
	    	$('#msg_contrasena').show();
	    	$('#contrasena').attr("class","form-control mod parsley-error");
	    	$('.mod').removeAttr("readonly");
	    	$('#contrasena').focus();
	    }else if(data==2){
	    	btn_pass.stop();
	    	$('#msg_verifica_contrasena').html('Esta contraseña no coincide.');
	    	$('#msg_verifica_contrasena').show();
	    	$('#verifica_contrasena').attr("class","form-control mod parsley-error");
	    	$('.mod').removeAttr("readonly");
	    	$('#verifica_contrasena').focus();
	    }else if(data==3){
	    	btn_pass.stop();
	    	$('#msg_contrasena').html('Debe escribir su contraseña actual.');
	    	$('#msg_contrasena').show();
	    	$('#contrasena').attr("class","form-control mod parsley-error");
	    	$('.mod').removeAttr("readonly");
	    	$('#contrasena').focus();
	    }else if(data==4){
	    	btn_pass.stop();
	    	$('#msg_nueva_contrasena').html('Debe escribir una nueva contraseña.');
	    	$('#msg_nueva_contrasena').show();
	    	$('#nueva_contrasena').attr("class","form-control mod parsley-error");
	    	$('.mod').removeAttr("readonly");
	    	$('#nueva_contrasena').focus();
	    }else if(data==5){
	    	btn_pass.stop();
	    	$('#msg_verifica_contrasena').html('Debe verificar la nueva contraseña.');
	    	$('#msg_verifica_contrasena').show();
	    	$('#verifica_contrasena').attr("class","form-control mod parsley-error");
	    	$('.mod').removeAttr("readonly");
	    	$('#verifica_contrasena').focus();
	    }else{
		    btn_pass.stop();
	    	scrollToElement('#main');
			$('#msg_data_pass').html(data);
	    	$('#msg_pass').show();
	    	$('#msg_pass').attr("class","alert alert-dismissable alert-success animation animating flipInX mt15");
			$('.mod').removeAttr("readonly");
	    }
	});
};

//Actualizo datos de alertas
function ac_form_alertas(){
	
	$('#msg_alerta').hide();
	var btn_alertas = Ladda.create(document.querySelector('#btn_alertas'));
	btn_alertas.start();
	var datos=$('#frm_alertas').serialize();

	$.post('ac/mi_cuenta_alertas.php',datos,function(data){
	    if(data==1){
	    	btn_alertas.stop();
	    	scrollToElement('#main');
	    	$('#msg_data_alerta').html('Las alertas se han actualizado.');
	    	$('#msg_alerta').show();
	    	$('#msg_alerta').attr("class","alert alert-dismissable alert-success animation animating flipInX mt15");
	    }else{
	    	btn_alertas.stop();
	    	scrollToElement('#main');
			$('#msg_data_alerta').html(data);
	    	$('#msg_alerta').show();
	    	$('#msg_alerta').attr("class","alert alert-dismissable alert-danger animation animating flipInX mt15");
	    }
	});
};
</script>
<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>

<script type="text/javascript" src="javascript/pages/profile.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->