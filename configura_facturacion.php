<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">

        <!-- START row -->
        <div class="row">
                <div class="col-md-12">
                    <!-- START Panel -->
                    <div class="panel panel-default">
                        <!-- panel heading/header -->
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="ico-file-check mr5"></i> Configuración para facturar</h3>
                        </div>
                        
                        <!--/ panel heading/header -->
                        <!-- START Form Wizard -->         
                        <form class="form-horizontal form-bordered" action="" id="wizard-validate">
                            <!-- Wizard Container 1 -->
                            <div class="wizard-title">Certificados para sellar</div>
                            <div class="wizard-container">

	                            <h3 class="text-center title semibold" style="margin: 30px 0px 30px 0px;">Ingrese su Certificado de Sello Digital<br><small>Seleccione los archivos  y la contraseña de su Certificado de Sello Digital para continuar.</small></h3>
								
								<div class="row" style="margin-bottom: 30px;">
									<div class="col-md-12">
										<div class="alert alert-info fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4 class="semibold">Información:</h4>
                                            <p class="mb10">Para poder facturar electrónicamente es necesario que cuente con su <strong>Certificado de Sello Digital</strong>, éste consta de dos archivos con extensión .CER y .KEY, así como su contraseña de la llave privada. Estos archivos se generan en el portal del SAT y son exclusivos para la facturación electrónica; si tiene alguna duda  contáctenos para proporcionarle asesoría gratuita.</p>
                                            <a role="button" class="btn btn-default" data-toggle="modal" href="https://www.youtube.com/watch?v=bqJrPiS8iEc" data-target="#video">¿Cómo tramito mi Certificado de Sello Digital (CSD)?</a>
                                        </div>
									</div>
								</div>
                            
								<div class="row">
									<div class="col-md-4">	
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title"><i class="ico-file5 mr5"></i> Archivo .KEY</h3>
											</div>
											<div class="panel-body text-center">
												<p><i class="ico-file9" style="font-size: 62px"></i><br>Archivo certificado .KEY</p><br>
												<button id="uploadBtn" class="btn btn-sm btn-info">Seleccione archivo</button>&nbsp;
                                        		
                                        		<div id="progressOuter" class="progress progress-striped active" style="display:none;">
													<div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
          										</div>
          										<div id="msg_key" style="margin: 10px 0px 10px 0px;">
	                                    		    <div id="msg_key_data"></div>
          										</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title"><i class="ico-file5 mr5"></i> Archivo .CER</h3>
											</div>
											<div class="panel-body text-center">
												<p><i class="ico-file9" style="font-size: 62px"></i><br>Archivo certificado .CER</p><br>
												<button id="uploadBtn2" class="btn btn-sm btn-info">Seleccione archivo</button>&nbsp;
                                        		
                                        		<div id="progressOuter2" class="progress progress-striped active" style="display:none;">
													<div id="progressBar2" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
          										</div>
          										<div id="msg_cer" style="margin: 10px 0px 10px 0px;">
	                                    		    <div id="msg_cer_data"></div>
          										</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title"><i class="ico-file5 mr5"></i> Contraseña</h3>
											</div>
											<div class="panel-body text-center">
												<h4>Contraseña:</h4>
												<div class="input-group">
													<div class="input-group-addon"><i class="ico-key "></i></div>
													<input type="password" class="form-control" maxlength="46">
												</div>
                                        		
                                        		
											</div>
										</div>
                        
									</div>
								</div>
								
								<!--
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Llave:</label>
                                    <div class="col-sm-10">
                                        <button id="uploadBtn" class="btn btn-sm btn-info">Seleccione archivo (*.Key)</button>&nbsp;
                                        
                                        <div id="progressOuter" class="progress progress-striped active" style="display:none;">
											<div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
          								</div>
          								<div id="msg_key" style="margin: 10px 0px 10px 0px;">
	                                        <div id="msg_key_data"></div>
          								</div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Certificado:</label>
                                    <div class="col-sm-10">
                                        <button id="uploadBtn2" class="btn btn-sm btn-info">Seleccione archivo (*.Cer)</button>&nbsp;
                                        
                                        <div id="progressOuter" class="progress progress-striped active" style="display:none;">
											<div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
          								</div>
          								<div id="msg_key" style="margin: 10px 0px 10px 0px;">
	                                        <div id="msg_key_data"></div>
          								</div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña:</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="contrasena" class="form-control mb5" >
                                    </div>
                                </div>
                                -->
                                
                            </div>
                            <!--/ Wizard Container 1 -->

                            <!-- Wizard Container 2 -->
                            <div class="wizard-title">Datos del Cliente</div>
                            <div class="wizard-container">
                            
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h5 class="semibold text-primary nm">Diego Camacho Flores.</h5>
                                        <p class="text-muted nm">Consulta Médica $ 500.00</p>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Datos Fiscales <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                    	<div class="row">
                                    		<div class="col-sm-12">
                                        		<input type="text" name="razon_social" class="form-control mb5" placeholder="Nombre Razón Social" data-parsley-group="information" >
                                    		</div>
											<div class="col-sm-6">
											    <input type="text" name="rfc" class="form-control" placeholder="RFC" data-parsley-group="information" >
											</div>
											<div class="col-sm-6">
											    <select class="form-control" name="country-address">
											        <option value="">Tipo de Persona (Físico/Moral)</option>
											        <option value="1">Físico</option>
											        <option value="2">Moral</option>
											    </select>
											</div>
                                    	</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dirección</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="text" name="street-address" class="form-control mb5" placeholder="Calle">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="street-address" class="form-control mb5" placeholder="N. Interior">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="street-address" class="form-control mb5" placeholder="N. Exterior">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="line2-address" class="form-control mb5" placeholder="Colonia">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="city-address" class="form-control mb5" placeholder="Localidad">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="state-address" class="form-control mb5" placeholder="Municipio">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="postal-address" class="form-control mb5" placeholder="Código Postal">
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="country-address">
                                                    <option value="AGUASCALIENTES">Aguascalientes</option>
													<option value="BAJA CALIFORNIA">Baja California</option>
													<option value="BAJA CALIFORNIA SUR">Baja California Sur</option>
													<option value="CAMPECHE">Campeche</option>
													<option value="COAHUILA">Coahuila</option>
													<option value="COLIMA">Colima</option>
													<option value="CHIAPAS">Chiapas</option>
													<option value="CHIHUAHUA">Chihuahua</option>
													<option value="DISTRISTO FEDERAL">Distrito Federal</option>
													<option value="DURANGO">Durango</option>
													<option value="ESTADO DE MEXICO">Estado de México</option>
													<option value="GUANAJUATO">Guanajuato</option>
													<option value="GUERRERO">Guerrero</option>
													<option value="HIDALGO">Hidalgo</option>
													<option value="JALISCO">Jalisco</option>
													<option value="MICHOACAN">Michoacán</option>
													<option value="MORELOS">Morelos</option>
													<option value="NAYARIT">Nayarit</option>
													<option value="NUEVO LEON">Nuevo León</option>
													<option value="OAXACA">Oaxaca</option>
													<option value="PUEBLA">Puebla</option>
													<option value="QUERETARO">Querétaro</option>
													<option value="QUINTANA ROO">Quintana Roo</option>
													<option value="SAN LUIS POTOSI">San Luis Potosí</option>
													<option value="SINALOA">Sinaloa</option>
													<option value="SONORA">Sonora</option>
													<option value="TABASCO">Tabasco</option>
													<option value="TAMAULIPAS">Tamaulipas</option>
													<option value="TLAXCALA">Tlaxcala</option>
													<option value="VERACRUZ">Veracruz</option>
													<option value="YUCATAN">Yucatán</option>
													<option value="ZACATECAS">Zacatecas</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="postal-address" class="form-control mb5" placeholder="Teléfono">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="postal-address" class="form-control mb5" placeholder="Correo Electrónico">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Wizard Container 2 -->

                            <!-- Wizard Container 3 -->
                            <div class="wizard-title">Datos de Cobro</div>
                            <div class="wizard-container">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <h5 class="semibold text-primary nm">Diego Camacho Flores</h5>
                                        <p class="text-muted nm">Consulta Médica $ 500.00</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <!-- Prueba -->
                                    <div class="col-sm-2 mb10">
                                        <label class="control-label">Cantidad</label>
                                        <input name="name" type="text" class="form-control" value="1">
                                    </div>
                                    
                                    <div class="col-sm-2 mb10">
                                        <label class="control-label">Unidad</label>
                                        <input name="name" type="text" class="form-control" value="N/A">
                                    </div>
                                    
                                    <div class="col-sm-4 mb10">
                                        <label class="control-label">Descripción</label>
                                        <input name="name" type="text" class="form-control" value="Consulta Médica">
                                    </div>
                                    
                                    <div class="col-sm-2 mb10">
                                        <label class="control-label">P. Unitario</label>
                                        <input name="name" type="text" class="form-control text-right" value="500.00">
                                    </div>
                                    
                                    <div class="col-sm-2 mb10">
                                        <label class="control-label">Importe</label>
                                        <input name="name" type="text" class="form-control text-right" value="500.00">
                                    </div>
                                    
                                    
                                    <!--
                                    <div class="row ml5 mr10">
                                        <div class="col-sm-1 mb10 pr0">
                                            <input name="street" type="text" class="form-control" value="1">
                                        </div>

                                        <div class="col-sm-1 mb10 pr0">
                                            <input name="city" type="text" class="form-control" placeholder="Clave" value="01">
                                        </div>
                                        
                                        <div class="col-sm-5 mb10 pr0">
                                            <input name="state" type="text" class="form-control" placeholder="Descripción" value="Consulta Médica">
                                        </div>

                                        <div class="col-sm-2 mb10">
                                            <input name="city" type="text" class="form-control text-right" placeholder="Importe" value="500.00">
                                        </div>
                                        
                                    </div>
                                    -->
                                    <!-- Agrega otro concepto -->
                                    
                                    
                                    <div class="col-sm-12 text-right">
                            			<button type="button" class="btn btn-xs btn-primary mb5"><i class="ico-plus-sign"></i> Concepto</button>
									</div>
                                </div>
                                
                                	
                                
                                <div class="form-group">
									<!-- Totales 1
									<div class="row mr10">
										<div class="col-sm-11 text-right"><h5 class="mt0 mb5">Sub-Total: </h5></div>
										<div class="col-sm-1 text-right"><h5 class="mt0 mb5">550.00 </h5></div>
										
										<div class="col-sm-11 text-right"><h5 class="mt0 mb5">I.V.A: </h5></div>
										<div class="col-sm-1 text-right"><h5 class="mt0 mb5">50.00 </h5></div>
										
										<div class="col-sm-11 text-right"><h5 class="mt0 mb5">Retenciones: </h5></div>
										<div class="col-sm-1 text-right"><h5 class="mt0 mb5">20.00 </h5></div>
										</span>
										<div class="col-sm-11 text-right"><h5 class="mt0 mb5" style="font-weight:bold;">Total: </h5></div>
										<div class="col-sm-1 text-right"><h5 class="mt0 mb5" style="font-weight:bold;">570.00 </h5></div>
									</div>
									-->
									<div class="row mr5">
										<div class="col-sm-10 text-right mb5"><h5 class="mt10 mb5">Sub-Total: </h5></div>
										<div class="col-sm-2 text-right mb5"><input name="city" type="text" readonly="1" class="form-control text-right" value="700.00" ></div>
										
										<div class="col-sm-10 text-right mb5"><h5 class="mt10 mb5">I.V.A: </h5></div>
										<div class="col-sm-2 text-right mb5"><input name="city" type="text" readonly="1" class="form-control text-right" value="89.00" ></div>
										
										<div class="col-sm-10 text-right mb5"><h5 class="mt10 mb5">Retenciones: </h5></div>
										<div class="col-sm-2 text-right mb5"><input name="city" type="text" readonly="1" class="form-control text-right" value="60.00" ></div>
										
										<div class="col-sm-10 text-right mb5"><h5 class="mt10 mb5" style="font-weight:bold;">Total: </h5></div>
										<div class="col-sm-2 text-right mb5"><input name="city" type="text" class="form-control text-right" value="820.00" ></div>

									</div>
                                </div>
                                
                                

                                <div class="form-group">

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <select name="month" class="form-control" data-parsley-group="payment" data-parsley-required>
                                                    <option>Forma de Pago</option>
                                                    <option value="1">PAGO EN UNA SOLA EXHIBICION</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="year" class="form-control" data-parsley-group="payment" data-parsley-required>
                                                    <option>Método de Pago</option>
                                                    <option value="1">EFECTIVO</option>
                                                    <option value="2">TARJETA</option>
                                                    <option value="3">TRANSFERENCIA DE FONDOS</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="city" type="text" class="form-control" placeholder="Número de Cuenta de Pago">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Wizard Container 3 -->

                            <!-- Wizard Container 4 -->
                            <div class="wizard-title">Confirmar</div>
                            <div class="wizard-container">
								
								<div class="form-group">
									<div class="panel-collapse pull out">
									    <div class="panel-body">
									        <dl class="dl-horizontal mb0">
									            <dt>Nombre o Razón Social</dt>
									            <dd>Diego Rodolfo Camacho Flores</dd>
									            <dt>RFC</dt>
									            <dd>CAFD860208H73</dd>
									            <dt>Tipo de Persona</dt>
									            <dd>Física</dd>
									            <dt>Dirección</dt>
									            <dd>Efraín Aguilar #384, entre Andrés Quintana Roo e Infiernillo, Colonia Centro</dd>
									            <dd>Othón P. Blanco, Chetumal Quintana Roo. 77000</dd>
									            <dt>Contacto</dt>
									            <dd>(983) 11 23337 - diegocamacho2.0@gmail.com</dd>
									            <hr class="mt10 mb10" />
									            <dt>Forma de Pago</dt>
									            <dd>Pago en una sola exhibición</dd>
									            <dt>Método de Pago</dt>
									            <dd>Efectivo</dd>
									            <dt>Número de Cuenta*</dt>
									            <dd>1234</dd>
									        </dl>
									    </div>
									</div>
								</div>
								
								
								<div class="form-group">
								<!-- Títulos -->
									<div class="col-sm-2 mb10">
                                        <label>Cantidad</label>
                                    </div>
                                    
                                    <div class="col-sm-2 mb10">
                                        <label>Unidad</label>
                                    </div>
                                    
                                    <div class="col-sm-4 mb10">
                                        <label>Descripción</label>
                                    </div>
                                    
                                    <div class="col-sm-2 mb10">
                                        <label>P. Unitario</label>
                                    </div>
                                    
                                    <div class="col-sm-2 mb10 text-right">
                                        <label>Importe</label>
                                    </div>
                                    
                                <!-- While de datos de cobro -->
                                    <div class="col-sm-2 mb10 text-center">1</div>
                                    <div class="col-sm-2 mb10 text-center">N/A</div>
                                    <div class="col-sm-4 mb10">Consulta Médica</div>
                                    <div class="col-sm-2 mb10 text-center">500.00</div>
                                    <div class="col-sm-2 mb10 text-right">500.00</div>
                                    
                                    <div class="col-sm-2 mb10 text-center">1</div>
                                    <div class="col-sm-2 mb10 text-center">N/A</div>
                                    <div class="col-sm-4 mb10">Consulta Médica</div>
                                    <div class="col-sm-2 mb10 text-center">500.00</div>
                                    <div class="col-sm-2 mb10 text-right">500.00</div>
                                    
                                    <div class="col-sm-2 mb10 text-center">1</div>
                                    <div class="col-sm-2 mb10 text-center">N/A</div>
                                    <div class="col-sm-4 mb10">Consulta Médica</div>
                                    <div class="col-sm-2 mb10 text-center">500.00</div>
                                    <div class="col-sm-2 mb10 text-right">500.00</div>
                                <!-- Totales -->
								</div>
                                <div class="form-group">
                                	
                                	<div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-4 mb10"></div>
                                    <div class="col-sm-2 mb10 text-right"><b>IVA</b></div>
                                    <div class="col-sm-2 mb10 text-right">200.00</div>
                                    
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-4 mb10"></div>
                                    <div class="col-sm-2 mb10 text-right"><b>ISR</b></div>
                                    <div class="col-sm-2 mb10 text-right">80.00</div>
                                    
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-4 mb10"></div>
                                    <div class="col-sm-2 mb10 text-right"><b>SUBTOTAL</b></div>
                                    <div class="col-sm-2 mb10 text-right">1,280.00</div>
                                    
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-2 mb10 text-center"></div>
                                    <div class="col-sm-4 mb10"></div>
                                    <div class="col-sm-2 mb10 text-right"><b>TOTAL</b></div>
                                    <div class="col-sm-2 mb10 text-right">1,280.00</div>
								</div>
								
								
                                <!-- Termina el contenido-->
                            </div>
                            <!-- Wizard Container 4 -->
                        </form>
                        <!--/ END Form Wizard --> 
                    </div>
                    <!--/ END Panel -->
                </div>
            </div>
        <!--/ END row -->
    
    </div>
    <!--/ END Template Container -->
	
    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->
<script type="text/javascript" src="plugins/uploader/SimpleAjaxUploader.js"></script>
<script>
function escapeTags( str ) {
  return String( str )
           .replace( /&/g, '&amp;' )
           .replace( /"/g, '&quot;' )
           .replace( /'/g, '&#39;' )
           .replace( /</g, '&lt;' )
           .replace( />/g, '&gt;' );
}

window.onload = function() {

  var btn = document.getElementById('uploadBtn'),
      progressBar = document.getElementById('progressBar'),
      progressOuter = document.getElementById('progressOuter'),
      msgBox = document.getElementById('msg_key_data');

  var uploader = new ss.SimpleUpload({
        button: btn,
        url: 'carga_certificados.php',
        name: 'uploadfile',
        multipart: true,
        hoverClass: 'hover',
        focusClass: 'focus',
        responseType: 'json',
        multiple: false,
        allowedExtensions: ["jpg", "jpeg", "png", "gif"],
        startXHR: function() {
            progressOuter.style.display = 'block'; // make progress bar visible
            this.setProgressBar( progressBar );
        },
        onSubmit: function() {
            msgBox.innerHTML = ''; // empty the message box
            btn.innerHTML = 'Cargando...'; // change button text to "Uploading..."
          },
        onComplete: function( filename, response ) {
            btn.innerHTML = 'Cambiar por otro archivo';
            progressOuter.style.display = 'none'; // hide progress bar when upload is completed

            if ( !response ) {
	            $('#msg_key').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                msgBox.innerHTML = '<span class="ico-close2"></span> No se ha podido cargar el certificado.';
                return;
            }

            if ( response.success === true ) {
                $('#msg_key').attr("class","alert alert-dismissable alert-success animation animating flipInX");
                msgBox.innerHTML = '<span class="ico-checkmark"></span> <strong>' + escapeTags( filename ) + '</strong>' + ' se ha cargado correctamente.';

            } else {
                if ( response.msg )  {
	                $('#msg_key').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                    msgBox.innerHTML = escapeTags( response.msg );

                } else {
	                $('#msg_key').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                    msgBox.innerHTML = '<span class="ico-close2"></span> Ocurrió un error, la llave no se ha podido cargar, intente nuevamente.';
                }
            }
          },
        onError: function() {
            progressOuter.style.display = 'none';
            $('#msg_key').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
            msgBox.innerHTML = '<span class="ico-close2"></span> Error al cargar el achivo';
          }
	});
};
window.onload = function() {

  var btn = document.getElementById('uploadBtn2'),
      progressBar = document.getElementById('progressBar2'),
      progressOuter = document.getElementById('progressOuter2'),
      msgBox = document.getElementById('msg_cer_data');

  var uploader = new ss.SimpleUpload({
        button: btn,
        url: 'carga_certificados.php',
        name: 'uploadfile',
        multipart: true,
        hoverClass: 'hover',
        focusClass: 'focus',
        responseType: 'json',
        multiple: false,
        allowedExtensions: ["jpg", "jpeg", "png", "gif"],
        startXHR: function() {
            progressOuter.style.display = 'block'; // make progress bar visible
            this.setProgressBar( progressBar );
        },
        onSubmit: function() {
            msgBox.innerHTML = ''; // empty the message box
            btn.innerHTML = 'Cargando...'; // change button text to "Uploading..."
          },
        onComplete: function( filename, response ) {
            btn.innerHTML = 'Cambiar por otro archivo';
            progressOuter.style.display = 'none'; // hide progress bar when upload is completed

            if ( !response ) {
	            $('#msg_cer').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                msgBox.innerHTML = '<span class="ico-close2"></span> No se ha podido cargar el certificado.';
                return;
            }

            if ( response.success === true ) {
                $('#msg_cer').attr("class","alert alert-dismissable alert-success animation animating flipInX");
                msgBox.innerHTML = '<span class="ico-checkmark"></span> <strong>' + escapeTags( filename ) + '</strong>' + ' se ha cargado correctamente.';

            } else {
                if ( response.msg )  {
	                $('#msg_cer').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                    msgBox.innerHTML = escapeTags( response.msg );

                } else {
	                $('#msg_cer').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                    msgBox.innerHTML = '<span class="ico-close2"></span> Ocurrió un error, la llave no se ha podido cargar, intente nuevamente.';
                }
            }
          },
        onError: function() {
            progressOuter.style.display = 'none';
            $('#msg_cer').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
            msgBox.innerHTML = '<span class="ico-close2"></span> Error al cargar el achivo';
          }
	});
};
</script>


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" id="video" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>

<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>

<script type="text/javascript" src="plugins/steps/js/jquery.steps.min.js"></script>

<script type="text/javascript" src="plugins/inputmask/js/inputmask.min.js"></script>

<script type="text/javascript" src="javascript/forms/wizard.js"></script>

<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/tabletools.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/zeroclipboard.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables-custom.min.js"></script>
<script type="text/javascript" src="javascript/tables/datatable.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->