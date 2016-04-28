<section id="main" role="main">
    <!-- START page header -->
    <section class="page-header page-header-block nm hide">
        <!-- pattern -->
        <div class="pattern pattern9"></div>
        <!--/ pattern -->
        <div class="container pt15 pb15">
            <div class="page-header-section">
                <h4 class="title">Registro de cuenta</h4>
            </div>
            <div class="page-header-section hide">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="javascript:void(0);">Pages</a></li>
                        <li class="active">Account Register</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--/ END page header -->

    <!-- START Register Content -->
    <section class="section">
        <div class="container">
            <!-- START Section Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center">
                        <h1 class="section-title font-alt mb25">Crea tu cuenta Gratis</h1>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4 class="thin text-muted text-center">
                                    Administrar tu consultorio nunca fue tan fácil y economico, te presentamos ProMedica, registrate para tener la app más avanzada del mercado.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END Section Header -->

            <!-- START Row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- features #1 -->
                    <div class="table-layout">
                        <div class="col-xs-2 valign-top"><img src="image/icons/brandprotection.png" width="100%"></div>
                        <div class="col-xs-10 valign-top pl15">
                            <h4 class="section-title font-alt mt0">Total Seguridad</h4>
                            <p class="hide">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non
                            proident.</p>
                        </div>
                    </div>
                    <!-- features #1 -->
                    <div class="visible-md visible-lg" style="margin-bottom:50px;"></div><!-- spacer -->
                    <!-- features #2 -->
                    <div class="table-layout">
                        <div class="col-xs-2 valign-top"><img src="image/icons/seoperfomance.png" width="100%"></div>
                        <div class="col-xs-10 valign-top pl15">
                            <h4 class="section-title font-alt mt0">Potente integración</h4>
                            <p class="hide">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>
                    <!-- features #2 -->
                    <div class="visible-md visible-lg" style="margin-bottom:50px;"></div><!-- spacer -->
                    <!-- features #3 -->
                    <div class="table-layout">
                        <div class="col-xs-2 valign-top"><img src="image/icons/responsivewebdesign.png" width="100%"></div>
                        <div class="col-xs-10 valign-top pl15">
                            <h4 class="section-title font-alt mt0">Compatible con todos los dispositivos</h4>
                            <p class="hide">Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia.</p>
                        </div>
                    </div>
                    <!-- features #3 -->
                    <div class="visible-md visible-lg" style="margin-bottom:50px;"></div><!-- spacer -->
                    <!-- features #4 -->
                    <div class="table-layout">
                        <div class="col-xs-2 valign-top"><img src="image/icons/supportservices.png" width="100%"></div>
                        <div class="col-xs-10 valign-top pl15">
                            <h4 class="section-title font-alt mt0">Soporte Técnico personalizado</h4>
                            <p class="hide">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>
                    <!-- features #4 -->
                </div>

                <div class="col-md-6">
                    <!-- Register form -->
                    <form class="panel no-border nm" name="frm-registro" id="frm-registro">
	                    <ul class="list-table pa15" id="msg" style="display: none;">
                            <li>
                                <!-- Alert message -->
                                <div class="alert alert-danger nm" id="msg_data">
                                    
                                </div>
                                <!--/ Alert message -->
                            </li>
                        </ul>
                        
                        
                        <div class="panel-body">
                            <div class="form-group" id="form-nombre">
                                <label class="control-label">Nombre: </label>
                                <div class="has-icon pull-left">
                                    <input type="text" class="form-control" name="nombre" id="nombre" maxlength="128">
                                    <i class="ico-user2 form-control-icon"></i>
                                </div>
                                <span id="msg-nombre" class="help-block" style="display: none;"></span>
                            </div>
                            <div class="form-group" id="form-email">
                                <label class="control-label">Email</label>
                                <div class="has-icon pull-left">
                                    <input type="email" class="form-control" name="email" id="email" maxlength="128">
                                    <i class="ico-envelop form-control-icon"></i>
                                </div>
                                <span id="msg-email" class="help-block" style="display: none;"></span>
                            </div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6" id="form-telefono">
										<label class="control-label">Teléfono Celular (Clave)</label>
										<div class="has-icon pull-left">
										    <input type="phone" class="form-control numero" name="telefono" id="telefono" maxlength="10">
										    <i class="ico-phone2 form-control-icon"></i>
										</div>
										<span id="msg-telefono" class="help-block" style="display: none;"></span>
									</div>
									<div class="col-md-6" id="form-ciudad">
										<label class="control-label">Ciudad</label>
                                		<div class="has-icon pull-left">
                                		    <input type="text" class="form-control" name="ciudad" id="ciudad" maxlength="64">
                                		    <i class="ico-flag form-control-icon"></i>
                                		</div>
                                		<span id="msg-ciudad" class="help-block" style="display: none;"></span>
									</div>
								</div>
                            </div>
                            
                            <div class="form-group" id="form-contrasena">
                                <label class="control-label">Contraseña</label>
                                <div class="has-icon pull-left">
                                    <input type="password" class="form-control" name="contrasena" id="contrasena" maxlength="16">
                                    <i class="ico-key2 form-control-icon"></i>
                                </div>
                                <span id="msg-contrasena" class="help-block" style="display: none;"></span>
                            </div>
                            <!--
                            <hr>
                            <div class="form-group">
                                <label class="control-label">Plan</label>
									<select class="form-control" name="tipo_plan">
										<option value="1">MENSUAL 549.00</option>
										<option value="2">SEMESTRAL 1,549.00</option>
										<option value="3">ANUAL 2,549.00</option>
									</select>
                            </div>
                            <p class="">A continuación agregue su método de pago, no se le cobrara nada hasta después del periodo de prueba.</p>
                            <div class="form-group">
                                <label class="control-label">Número de tarjeta</label>
                                <div class="has-icon pull-left">
                                    <input type="text" class="form-control" name="retype-password" data-parsley-equalto="input[name=password]">
                                    <i class="ico-credit2 form-control-icon"></i>
                                </div>
                            </div>
                            <div class="form-group">
	                            <div class="row">
	                            	<div class="col-md-4">
                                		<label class="control-label">CVC</label>
                                		<input type="email" class="form-control" name="email" >
	                            	</div>
	                            	<div class="col-md-4">
                                		<label class="control-label">Mes de expiración</label>
                                		<input type="email" class="form-control" name="email" >
	                            	</div>
	                            	<div class="col-md-4">
                                		<label class="control-label">Año de expiración</label>
                                		<input type="email" class="form-control" name="email">
	                            	</div>
	                            </div>
                            </div>
                            -->
                            <div class="form-group" id="form-condiciones">
                                <div class="checkbox custom-checkbox">  
                                    <input type="checkbox" name="condiciones" id="condiciones" >  
                                    <label for="condiciones">&nbsp;&nbsp;Acepto <a class="semibold" href="javascript:void(0);">Terminos y condiciones</a> y <a class="semibold" href="javascript:void(0);">Aviso de Privacidad</a></label>   
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-block btn-lg btn-info" id="btn-registra"><span class="semibold">Crear mi cuenta</span></button>
                        </div>
                    </form>
                    <!-- Register form -->
                </div>
            </div>
            <!--/ END Row -->
        </div>
    </section>
    <!--/ END Register Content -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->
</section>


<script>
$(function(){
	
	$('.form-control').keyup(function(e) {
	
			if(e.keyCode==13){
				registra();
			}
	
	});
	
	
	$("#nombre").blur(function() {
		var nombre = $('#nombre').val();
		if(nombre){ 
			$('#form-nombre').removeClass('has-error')
			$('#msg-nombre').hide();
			return false;
		}
    });
    
    $("#email").blur(function() {
		var email = $('#email').val();
		if(email){
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!expr.test(email)){
				$('#msg-email').html("La dirección de correo "+email+" es incorrecta.");
				$('#msg-email').show();
				$('#form-email').addClass('has-error');
				$('#email').focus();
				return false;
			}else{
				$('#form-email').removeClass('has-error')
				$('#msg-email').hide();
				return false;
			}
		}
    });
    
    $("#telefono").blur(function() {
		var telefono = $('#telefono').val();
		if(telefono){ 
			$('#form-telefono').removeClass('has-error')
			$('#msg-telefono').hide();
			return false;
		}
    });
    /*
    $("#id_celular_compania").blur(function() {
		var id_celular_compania = $('#id_celular_compania').val();
		if(id_celular_compania){ 
			$('#form-id_celular_compania').removeClass('has-error')
			$('#msg-id_celular_compania').hide();
			return false;
		}
    });
    
    $("#id_estado").blur(function() {
		var id_estado = $('#id_estado').val();
		if(id_estado){ 
			$('#form-id_estado').removeClass('has-error')
			$('#msg-id_estado').hide();
			return false;
		}
    });
    */
    $("#ciudad").blur(function() {
		var ciudad = $('#ciudad').val();
		if(ciudad){ 
			$('#form-ciudad').removeClass('has-error')
			$('#msg-ciudad').hide();
			return false;
		}
    });
    
    $("#contrasena").blur(function() {
		var contrasena = $('#contrasena').val();
		if(contrasena){ 
			$('#form-contrasena').removeClass('has-error')
			$('#msg-contrasena').hide();
			return false;
		}
    });
	

	$("#btn-registra").click(function() {
		registra();
	});
	
	
});
function registra(){
		var nombre = $('#nombre').val();
		var email = $('#email').val();
		var telefono = $('#telefono').val();
		//var id_celular_compania = $('#id_celular_compania').val();
		//var id_estado = $('#id_estado').val();
		var ciudad = $('#ciudad').val();
		var contrasena = $('#contrasena').val();
		
		
		if(!nombre){ 
			$('#msg-nombre').html('Es necesario que escriba su nombre.');
			$('#msg-nombre').show();
			$('#form-nombre').addClass('has-error');
			$('#nombre').focus();
			return false;
		}
		
		if(!email){ 
			$('#msg-email').html('Es necesario que escriba su dirección de E-mail.');
			$('#msg-email').show();
			$('#form-email').addClass('has-error');
			$('#email').focus();
			return false;
		}
		
		if(!telefono){ 
			$('#msg-telefono').html('Es necesario que escriba su número de teléfono.');
			$('#msg-telefono').show();
			$('#form-telefono').addClass('has-error');
			$('#telefono').focus();
			return false;
		}
		/*
		if(!id_celular_compania){ 
			$('#msg-id_celular_compania').html('Es necesario que seleccione su proveedor.');
			$('#msg-id_celular_compania').show();
			$('#form-id_celular_compania').addClass('has-error');
			return false;
		}
		
		if(!id_estado){ 
			$('#msg-id_estado').html('Es necesario que seleccione el estado donde radica.');
			$('#msg-id_estado').show();
			$('#form-id_estado').addClass('has-error');
			return false;
		}
		*/
		if(!ciudad){ 
			$('#msg-ciudad').html('Es necesario que escriba la ciudad en donde radica.');
			$('#msg-ciudad').show();
			$('#form-ciudad').addClass('has-error');
			$('#ciudad').focus();
			return false;
		}
		
		if(!contrasena){ 
			$('#msg-contrasena').html('Es necesario que escriba una contraseña.');
			$('#msg-contrasena').show();
			$('#form-contrasena').addClass('has-error');
			$('#contrasena').focus();
			return false;
		}
		
		var formulario=$('#frm-registro').serialize();
		$.post('ac/registro.php',formulario,function(data){
	    	if(data==1){
		    	window.open("app/index.php", "_self");
	    	}else{
		    	$('#msg_data').html(data);
	    		$('#msg').show();
	    	}
		});
}
function recupertaContrasena(){
	var formulario=$('#frm-registro').serialize();
	$.post('ac/recupera.php',formulario,function(data){
		if(data==1){
	    	alert("ok");
		}else{
	    	$('#msg_data').html(data);
			$('#msg').show();
		}
	});
}

$('.numero').numeric();
</script>