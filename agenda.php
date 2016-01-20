<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Agenda</h4>
                    </div>
                    <div class="page-header-section text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAddEvent"><span class="ico-plus-circle2"></span> Nueva Cita</button>
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-calendar6"></i></span> Calendario de Citas</h3>
                            </div>
                            <div class="panel-collapse pull out">
                                <div id="full_calendar" class="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ END row -->

                <!-- START Modal -->
                <div id="ModalAddEvent" class="modal fade">
                    <div class="modal-dialog">
                        <form class="modal-content" action="">
                            <div class="modal-header">
                                <div class="cell text-center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <div class="ico-calendar-empty mb15 mt15 fsize32"></div>
                                    <h4 class="semibold text-primary">Agenda una Cita</h4>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                    
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label" style="padding-left: 0px;">Nombre del Paciente</label>
											<select id="selectize-contact" class="form-control" placeholder="Seleccione un contacto..."></select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label">Date (from) <span class="text-danger">*</span></label>
                                                    <input id="datepicker-from" name="datefrom" type="text" class="form-control" placeholder="01/01/2014" data-parsley-required>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                	<label class="control-label">Hora <span class="text-danger">*</span></label>
													<div class='input-group date' id='hora'>
								                    	<input type='text' class="form-control" name="hora" />
														<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
													</div>
												</div>
												
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Anotación</label>
                                            <textarea name="eventdescription" class="form-control" rows="4" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Agendar</button>
                            </div>
                        </form><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!--/ END Modal -->
            </div>

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->



<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="/library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="/library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="/plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="/javascript/app.min.js"></script>
<script type="text/javascript" src="/plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/plugins/fullcalendar/js/fullcalendar.min.js"></script>
<script type="text/javascript" src="/plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="/javascript/pages/calendar.js"></script>
<script type="text/javascript" src="/plugins/timepicker/js/moment.js"></script>
<script type="text/javascript" src="/plugins/timepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/plugins/selectize/js/selectize.min.js"></script>
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->
<script>
$(function () {
	$('#hora').datetimepicker({
		pickDate: false,
		minuteStepping:10
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