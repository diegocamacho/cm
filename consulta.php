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
                    	<h3 class="panel-title"><i class="ico-user22 mr5"></i> Datos Generales</h3>            
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="nombre" id="selectize-contact" class="form-control" placeholder="Nombre del paciente..." >
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
                    
                    
                </form>
                <!-- END form panel -->
            </div>

            <div class="col-md-6">
                <!-- START panel -->
                <form class="panel panel-teal form-bordered" action="">
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
                                    <input type="text" name="edad" class="form-control" data-mask="99" >
                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Sexo</label>
                                    <select class="form-control">
                                		<option>Seleccione</option>
										<option value="1">Masculino</option>
										<option value="1">Femenino</option>
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
                                    <textarea class="form-control animated" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </form>
                <!-- END form panel -->
            </div>
            
        </div>
        <!--/ END row -->
        
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
                                    <textarea class="form-control animated" rows="4"></textarea>
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
                            <!-- Summernote -->
                            <div class="summernote"></div>
                            <br /><br />
                            <!--/ Summernote -->
                            <div class="panel-footer text-right">
                                <button class="btn btn-primary"><span class="ico-plus-circle2"></span> Receta Adicional</button>
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
                                    <textarea class="form-control animated" rows="4"></textarea>
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
				<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#ModalConfirma">Terminar Consulta</button>
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
	
	// Contact style
    // ================================
    (function () {
        var REGEX_EMAIL = "([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@" +
                    "(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)";

        var formatName = function (item) {
            return $.trim((item.first_name || '') + ' ' + (item.last_name || ''));
        };
        // contact
        $("#selectize-contact").selectize({
            persist: false,
            maxItems: 1,
            valueField: "email",
            labelField: "name",
            searchField: ["first_name", "last_name", "email"],
            sortField: [{
                field: "first_name",
                direction: "asc"
            }, {
                field: "last_name",
                direction: "asc"
            }],
            options: [{
                email: "nikola@tesla.com",
                first_name: "Nikola",
                last_name: "Tesla"
            }, {
                email: "diego@thirdroute.com",
                first_name: "diego",
                last_name: "Reavis"
            },{
                email: "juan@thirdroute.com",
                first_name: "Juan",
                last_name: "Reavis"
            },{
                email: "pepe@thirdroute.com",
                first_name: "Pepe",
                last_name: "Reavis"
            },{
                email: "adolfo@thirdroute.com",
                first_name: "Adolfo",
                last_name: "Reavis"
            },{
                email: "jose@thirdroute.com",
                first_name: "Jose",
                last_name: "Reavis"
            },{
                email: "jorge@thirdroute.com",
                first_name: "Jorge",
                last_name: "Reavis"
            },{
                email: "pampersdry@gmail.com",
                first_name: "John",
                last_name: "Pozy"
            }],
            render: {
                item: function (item, escape) {
                    var name = formatName(item);
                    return "<div>" +
                        (name ? "<span class=\"name\">" + escape(name) + "</span>" : "") +
                        (item.email ? "<small class=\"text-muted ml10\">" + escape(item.email) + "</small>" : "") +
                        "</div>";
                },
                option: function (item, escape) {
                    var name = formatName(item);
                    var label = name || item.email;
                    var caption = name ? item.email : null;
                    return "<div>" +
                        "<span class=\"text-primary\">" + escape(label) + "</span><br/>" +
                        (caption ? "<small class=\"text-muted\">" + escape(caption) + "</small>" : "") +
                        "</div>";
                }
            },
            create: function (input) {
                if ((new RegExp("^" + REGEX_EMAIL + "$", "i")).test(input)) {
                    return {
                        email: input
                    };
                }
                var match = input.match(new RegExp("^([^<]*)\<" + REGEX_EMAIL + "\>$", "i"));
                if (match) {
                    var name = $.trim(match[1]);
                    var pos_space = name.indexOf(" ");
                    var first_name = name.substring(0, pos_space);
                    var last_name = name.substring(pos_space + 1);

                    return {
                        email: match[2],
                        first_name: first_name,
                        last_name: last_name
                    };
                }
                alert("Invalid email address.");
                return false;
            }
        });
    })();
    	
});
</script>
<!-- App and page level script -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/summernote/js/summernote.min.js"></script>
<script type="text/javascript" src="plugins/inputmask/js/inputmask.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="javascript/forms/element.js"></script>


<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->

<!-- START Modal -->
<div id="ModalConfirma" class="modal fade">
    <div class="modal-dialog">
        <form class="modal-content" action="">
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
                    
                        <div class="form-group">
                        	<div class="row">
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Tipo de Cobro</label>
                                    <select class="form-control">
                                		<option>Seleccione</option>
										<option value="1">Cobro en Caja</option>
										<option value="1">Cobro Inmediato</option>
										<option value="2">Crédito General</option>
										<option value="3">Crédito Aseguradora</option>
									</select>
                                </div>
                                
                                <!-- En saco de que elija aseguradora (El botón de monto se va para abajo) Otra nota; si es con aseguradora también se debe pedir el número de poliza-->
                                <div class="col-sm-6" style="display:none;">
                                    <label class="control-label">Aseguradora</label>
                                    <select class="form-control">
                                		<option>Seleccione</option>
										<option value="1">Bancomer</option>
										<option value="2">Banco Azteca</option>
										<option value="3">Seguros Banorte</option>
									</select>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Monto de honorarios</label>
                                    <div class="input-group">
									    <span class="input-group-addon">$</span>
									    <input type="text" class="form-control">
									    <span class="input-group-addon">.00</span>
									</div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Anotación</label>
                            <textarea name="eventdescription" class="form-control" rows="4" ></textarea>
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 0px;">
                        	<span class="checkbox custom-checkbox custom-checkbox-primary">
		                    	<input type="checkbox" name="customcheckbox1" id="customcheckbox1">
		                    	<label for="customcheckbox1">&nbsp;&nbsp;Enviar receta por Email</label>
							</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
                <div class="row">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Cobrar</button>
                </div>

            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->