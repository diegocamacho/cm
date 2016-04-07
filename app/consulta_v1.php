<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Consulta / Diego Camacho Flores</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">

                	<a class="btn btn-sm btn-danger" href="javascript:void(0);" role="button">Regresar</a>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
            <div class="col-md-6">
                <!-- START panel -->
                <form class="panel panel-teal form-horizontal form-bordered" action="">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                    	<h3 class="panel-title"><i class="ico-user22 mr5"></i> Datos del Paciente</h3>            
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body -->
                    <div class="panel-body" style="padding-bottom:0px;">
                        <h4>Datos Generales</h4>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nombre" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Celular<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="celular" data-mask="(999) 999-9999" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" >
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="panel-body" style="padding-bottom:0px; padding-top: 0px;">
                        <h4>Datos Personales</h4>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Edad</label>
                            <div class="col-sm-9">
                                <input type="text" name="edad" class="form-control" data-mask="99" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sexo</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                	<option>Seleccione</option>
                                	<option value="1">Masculino</option>
                                	<option value="1">Femenino</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="panel-body" style="padding-top:0px;">

                        <div class="form-group">
                        	<div class="col-sm-12">
                            	<h4>Datos Adicionales</h4>
								<p class="text-teal">(Hipertensión, alergias, etc.)</p>
                        	</div>
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                </form>
                <!-- END form panel -->
            </div>

            <div class="col-md-6">
                <!-- START panel -->
                <form class="panel panel-info form-horizontal form-bordered" action="">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user-md mr5"></i> Datos de Consulta</h3>
                    </div>
                    
                    <!-- panel body -->
                    <div class="panel-body" style="padding-bottom:0px;">
                        <h4>Diagnóstico<span class="text-danger">*</span></h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="panel-body" style="padding-top: 0px; padding-bottom:0px;">
                        <h4>Tratamiento (Receta)<span class="text-danger">*</span></h4>
                        <div class="form-group">
                            <div class="col-sm-12 mb10">
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <br />
                            <div class="col-sm-12 text-right">
                            	<span class="label label-info">Nueva Receta</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel-body" style="padding-top: 0px;">
                        <h4>Sugerencias</h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    
                </form>
                <!-- END form panel -->
            </div>
            
            <div class="col-md-6">
                <!-- START panel -->
                <form class="panel panel-info form-horizontal form-bordered" action="">
                    <!-- panel heading/header -->
                    <br />
                    <div class="panel-body text-center" style="padding-top: 0px;">
                        <button type="button" class="btn btn-primary btn-lg active">Terminar Consulta</button>
                        
                    </div>
                    
                </form>
                <!-- END form panel -->
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




<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="javascript/app.min.js"></script>

<script type="text/javascript" src="plugins/inputmask/js/inputmask.min.js"></script>

<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>

<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>

<script type="text/javascript" src="javascript/forms/element.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->