<?
//Consultamos los datos
$sql="SELECT * FROM informacion_fiscal WHERE id_medico=$id_medico";
$query=mysql_query($sql);
$ft=mysql_fetch_assoc($query);
//Consultamos la lista de estados
$q=mysql_query("SELECT * FROM estados");
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Configuración para facturación</h4>
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
            <!-- Left / Top Side -->
            <div class="col-lg-3">
                <!-- tab menu -->
                <ul class="list-group list-group-tabs">
                    <li class="list-group-item active"><a href="#datos" data-toggle="tab"><i class="ico-user2 mr5"></i> Datos Fiscales</a></li>
                    <li class="list-group-item"><a href="#sellos" data-toggle="tab"><i class="ico-key2 mr5"></i> Información para Sellar</a></li>
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
                    <div class="tab-pane active" id="datos">
                        <!-- form profile -->
                        <form class="panel form-horizontal form-bordered" id="frm_datos" >
                            <div class="panel-body pt0 pb0">
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Información Fiscal</h4>
                                    </div>
                                </div>
                                <!-- Mensaje-->
                                <div id="msg" style="display:none;">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            		<span id="msg_data"></span>
								</div>
                                <!-- End mensaje -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">RFC:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="rfc" maxlength="12" value="<?=$ft['rfc']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="nombre" maxlength="65" value="<?=$ft['nombre']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Calle:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control mod" name="calle" maxlength="100" value="<?=$ft['calle']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Número Exterior:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mod" name="ext" maxlength="10" value="<?=$ft['ext']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Número Interior:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control mod" name="interior" maxlength="10" value="<?=$ft['interior']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Código Postal:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="cp" maxlength="5" value="<?=$ft['cp']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Colonia:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="colonia" maxlength="45" value="<?=$ft['colonia']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Localidad:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="localidad" maxlength="100" value="<?=$ft['localidad']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Municipio:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mod" name="mpio" maxlength="100" value="<?=$ft['mpio']?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Estado:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mod" name="id_estado">
                                        	<option>Seleccione uno</option>
                                            <? while($datos=mysql_fetch_assoc($q)){ ?>
											<option value="<?=$datos['id_estado']?>" <? if($datos['id_estado']==$ft['id_estado']){?> selected="selected"<? } ?>><?=$datos['estado']?></option>
											<? } ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="panel-footer text-right">
                                <!--<button type="reset" class="btn btn-default">Cancelar</button>-->
                                <button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" id="btn_datos"><span class="ladda-label">Guardar</span></button>
                            </div>
                        </form>
                        <!--/ form profile -->
                    </div>
                    <!--/ tab-pane: perfil -->

                    <!-- tab-pane: pagoa -->
                    <div class="tab-pane" id="sellos">
                        <!-- form account -->
                        <form class="panel form-horizontal form-bordered" id="frm_certificados">
                            <div class="panel-body pt0 pb0">
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Información para Sellar</h4>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contraseña:</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" name="name" value="wefwefwefw">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Llave (.key)</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" readonly="">
                                            <span class="input-group-btn">
                                                <div class="btn btn-primary btn-file">
                                                    <span class="icon iconmoon-file-3"></span> Buscar <input type="file">
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Certificado (.cer)</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" readonly="">
                                            <span class="input-group-btn">
                                                <div class="btn btn-primary btn-file">
                                                    <span class="icon iconmoon-file-3"></span> Buscar <input type="file">
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="panel-footer text-right">
                                <!--<button type="reset" class="btn btn-default">Reset</button>-->
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                        <!--/ form account -->
                    </div>
                    <!--/ tab-pane: pagos -->
                    
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
	$('#btn_datos').click(function(){
		$('#msg_data').html('');
	 	ac_form();
	});
});
function scrollToElement(target) {
    var topoffset = 30;
    var speed = 100;
    var destination = jQuery( target ).offset().top - topoffset;
    jQuery( 'html:not(:animated),body:not(:animated)' ).animate( { scrollTop: destination}, speed, function() {
        window.location.hash = target;
    });
    return false;
}
function ac_form(){
	var btn_datos = Ladda.create(document.querySelector('#btn_datos'));
	btn_datos.start();
	var datos=$('#frm_datos').serialize();
	$('.mod').attr("readonly", true);
	
	$.post('ac/facturacion.php',datos,function(data){
	    if(data==1){
	    	btn_datos.stop();
	    	scrollToElement('#main');
	    	$('#msg_data').html('Los datos de facturación se han actualizado.');
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-success animation animating flipInX mt15");
	    	$('.mod').removeAttr("readonly");
	    }else{
	    	btn_datos.stop();
	    	scrollToElement('#main');
			$('#msg_data').html(data);
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX mt15");
			$('.mod').removeAttr("readonly");
	    }
	});
};
</script>
<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="javascript/components/animation.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>


<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->