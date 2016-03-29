<?

?>

<!-- START Template Main -->
<section id="main" role="main">

    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Reporte de Consultas por Fecha</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">

                	<!--<a class="btn btn-sm btn-danger" href="javascript:void(0);" role="button">Regresar</a>-->
                </div>
                <!--/ Toolbar -->
            </div>
        </div>


		<div class="row">
			<div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>

                    <div class="panel-collapse pull out">
                        <div class="panel-body">
                            <div class="row">
	                            <!-- Mensaje -->
									<div id="msg" style="display:none;margin: 0px 10px 20px 10px;">
										<span id="msg_data"></span>
									</div>
									<!-- End Mensaje -->
                                <div class="col-sm-6 mb10">
                                    <div class="col-sm-12">
                                        <label class="control-label">Fecha Inicial <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control mod" name="fecha_ini" id="fecha_inicio" placeholder="Seleccione fecha" />
                                    </div>
                                </div>

                                <div class="col-sm-6 mb10">
                                    <div class="col-sm-12">
                                        <label class="control-label">Fecha Final <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control mod" name="fecha_fin" id="fecha_fin" placeholder="Seleccione fecha" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="panel-footer">
                        <button class="btn btn-primary pull-right" id="btn_guarda">Generar Reporte</button>
                    </div>
                </div>

            </div>
		</div>

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
    $("#fecha_inicio").datepicker();

    $("#fecha_fin").datepicker();
	   	
});

$('#btn_guarda').click(function(){
        var fecha_inicio = $('#fecha_inicio').val();
        var fecha_fin = $('#fecha_fin').val();
        
        if(fecha_inicio && fecha_fin){
            $('#fecha_inicio').val('');
            $('#fecha_fin').val('');
            window.open(
                "/cm/formatos/consultas.php?fecha_ini="+fecha_inicio+"&fecha_fin="+fecha_fin,
                "_blank"
            );
        }else{
	        $('#msg_data').html("Para generar el reporte es necesario seleccionar el rango de fechas.");
			$('#msg').show();
			$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
        }
        
    });
</script>
<!-- App and page level script -->

<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="javascript/components/animation.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="javascript/forms/element.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/moment.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/bootstrap-datetimepicker.min.js"></script>
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->