<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Recetas</h4>
            </div>
        </div>
  
        <!-- Tabla y acciones -->
        <div class="row">
            <div class="col-md-3">
            
				<div class="panel panel-default">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h4 class="panel-title ellipsis">Márgenes para Receta</h4>
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="col-sm-12 mb10">
						    <label class="control-label">Formato</label>
						    <select name="size" class="form-control">
                                <option value="1">Media Carta</option>
                                <option value="2">Carta Completa</option>
                            </select>
						</div>
						<div class="col-sm-12 mb10">
						    <label class="control-label">Margen Superior</label>
						    <input type="text" class="form-control" name="website" value="20">
						</div>
						<div class="col-sm-12 mb10">
						    <label class="control-label">Margen Izquierdo</label>
						    <input type="text" class="form-control" name="website" value="20">
						</div>
						
                    </div>
                    <!--/ panel body -->
                    <div class="panel-footer text-center">
                        <button type="reset" class="btn btn-teal">Vita Previa</button>
                    </div>
                </div>
                    
            </div>    
<!-- Vista previa -->        
            <div class="col-md-9">
            
				<div class="panel panel-default">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h4 class="panel-title ellipsis">Vista Previa</h4>
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body -->
                    <div class="panel-body">
                        <iframe src="receta.pdf" class="col-md-12"  height="500" frameborder="0" />
						
                    </div>
                    <!--/ panel body -->
                    <div class="panel-footer text-right">
                        <button type="reset" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                    
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

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>

<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->