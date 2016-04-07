<?
//Clinicas
$sql_clinica="SELECT * FROM clinicas WHERE id_medico='$id_medico' AND activo='1'";
$q_clinica=mysql_query($sql_clinica);
$valida_clinica=mysql_num_rows($q_clinica);

//Pacientes
$sql_pacientes="SELECT * FROM pacientes WHERE id_medico='$id_medico' AND activo='1'";
$q_pacientes=mysql_query($sql_pacientes);

//Citas
$sql_agenda="SELECT agenda.*, pacientes.nombre,pacientes.celular FROM agenda 
JOIN pacientes ON pacientes.id_paciente=agenda.id_paciente
WHERE agenda.id_medico=$id_medico AND agenda.activo=1";
$q_agenda=mysql_query($sql_agenda);
$valida_agenda=mysql_num_rows($q_agenda);
if($valida_agenda){

	while($ft=mysql_fetch_assoc($q_agenda)){
	
	$paciente=$ft['nombre'];
	$fecha=$ft['fecha'];
	$dato = explode("-", $fecha);  
	$ano=$dato[0];
	$mes=$dato[1];
	$dia=$dato[2];
	$hora_chida=$ft['hora'];
	$dato2 = explode(":",$hora_chida);  
	$hora=$dato2[0];
	$minuto=$dato2[1];
	$hora2=$dato2[0]+1;
	$cadena='{
			id: "'.$ft['id_agenda'].'",
            title: "'.$paciente.'",
            telefono: "'.$celular.'",
            start: "'.$fecha.'T'.$hora_chida.'",
            end: "'.$fecha.'T'.$hora2.':'.$minuto.':00",
            allDay: false,
            className: "fc-event-info"
        }';
    $citas=$citas.$cadena.',';
    
	}
$citas=substr($citas, 0,-1);
}

?>
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
	                    <? if($_GET['msg']==1){ ?>
            			<div class="alert alert-dismissable alert-success animation animating flipInX">
                		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		    ¡La cita se ha agendado!
                		</div>
                		<? }elseif($_GET['msg']==2){ ?>
                		<div class="alert alert-dismissable alert-info animation animating flipInX">
                		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		    ¡La cita se ha editado!
                		</div>
                		<? }elseif($_GET['msg']==3){ ?>
                		<div class="alert alert-dismissable alert-danger animation animating flipInX">
                		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		    ¡La cita se ha eliminado!
                		</div>
                		<? } ?>
                		
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
                        <form class="modal-content" id="frm_guarda">
                            <div class="modal-header">
                                <div class="cell text-center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <div class="ico-calendar-empty mb15 mt15 fsize32"></div>
                                    <h4 class="semibold text-primary">Agenda una Cita</h4>
                                    <!--<p class="text-muted">Descripción</p>-->
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
                                    <? if($valida_clinica){ ?>
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label" style="padding-left: 0px;">Nombre del Paciente</label>
											<select id="selectize-select" name="id_paciente" class="form-control mod" placeholder="Seleccione o escriba el nombre...">
            	                                <option value="">Seleccione o escriba el nombre...</option>
            	                                <? while($ft=mysql_fetch_assoc($q_pacientes)){ ?>
        	                                    <option value="<?=$ft['id_paciente']?>"><?=$ft['nombre']?></option>
        	                                    <? } ?>
											</select>
                                        </div>
                                        
                                        <div class="form-group datos_adicionales" style="display:none;">
                                            <label class="control-label">Teléfono del paciente</label>
                                            <input name="telefono" type="text" class="form-control mod" id="telefono" maxlength="10" placeholder="5522990033">
                                        </div>
                                        
                                        <div class="form-group datos_adicionales" style="display:none;">
                                            <label class="control-label">Email del paciente</label>
                                            <input name="email" type="text" class="form-control mod" id="email" maxlength="180">
                                        </div>
                                        <? if($s_id_tipo_credencial==1){ ?>
                                        <div class="form-group">
                                            <label class="col-sm-6 control-label" style="padding-left: 0px;">Seleccione una Clínica</label>
											<select name="id_clinica" class="form-control mod">
												<option value="">&nbsp;</option>
												<? while($ft=mysql_fetch_assoc($q_clinica)){ ?>
        	                                    <option value="<?=$ft['id_clinica']?>"><?=$ft['clinica']?></option>
        	                                    <? } ?>
											</select>
                                        </div>
                                        <? } ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label">Fecha <span class="text-danger">*</span></label>
                                                    <input id="fecha" name="fecha" type="text" class="form-control mod" data-parsley-required>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                	<label class="control-label">Hora <span class="text-danger">*</span></label>
													<div class='input-group date' id='hora'>
								                    	<input type='text' class="form-control mod" name="hora" />
														<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
													</div>
												</div>
												
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Anotación</label>
                                            <textarea name="anotacion" class="form-control mod" rows="4" ></textarea>
                                        </div>
                                        
									<? }else{ ?>
									
                                    	<div class="alert alert-danger fade in">
                                            <h4 class="semibold">Aviso:</h4>
                                            <p class="mb10">Para poder crear citas es necesario que primero configure una <b>Clínica</b></p>
                                            <a role="button" class="btn btn-danger btn-block" href="?Modulo=Clinicas">Ir a Clínicas y crear una</a>
                                        </div>
                                        
                                    <? } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default mod" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success ladda-button" data-style="zoom-in" id="btn-agendar" onclick="agendaCita()"><span class="ladda-label" id="btn_guarda_text">Agendar</span></button>
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
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/js/fullcalendar.min.js"></script>

<script type="text/javascript" src="plugins/timepicker/js/moment.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>

<script type="text/javascript" src="plugins/bootbox/js/bootbox.js"></script>


<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->
<script>
$(function () {
	
	//Para la hora
	$('#hora').datetimepicker({
		pickDate: false,
		minuteStepping:10,
		language: 'es',
		autoclose: 1,
		format: 'HH:mm' //'LT',
	});
	
	//Agenda

    $("#full_calendar").fullCalendar({
	    defaultView: 'agendaWeek',
	    lang: 'es',
        header: {
            left: "prev,next",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        buttonText: {
            prev: '<i class="ico-angle-left"></i>',
            next: '<i class="ico-angle-right"></i>'
        },
        editable: true,
        events: [<? echo $citas; ?>],
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        monthNamesShort: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles','Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
        columnFormat: {
			month: 'ddd',    // Mon
		    week: 'ddd d', // Mon 9/7
		    day: 'dddd d'  // Monday 9/7
		},
		titleFormat: {
			month: 'MMMM yyyy',                             // September 2009
		    week: "MMM 'del 'd[ yyyy]{ 'al'[ MMM] d }", // Sep 7 - 13 2009
		    day: 'dddd, MMM d, yyyy'                  // Tuesday, Sep 8, 2009
		},
		buttonText: {
		    prev:     '&lsaquo;', // <
		    next:     '&rsaquo;', // >
		    prevYear: '&laquo;',  // <<
		    nextYear: '&raquo;',  // >>
		    today:    'Hoy',
		    month:    'Mes',
		    week:     'Semana',
		    day:      'Día'
		},
		minTime: '06:00',
		maxTime: '23:00',
		allDaySlot: false,
		editable: false,
        eventClick: function (calEvent, jsEvent, view) {
            // content
            var id_agenda = calEvent.id;
            var pcontent = "";
            pcontent += "<h5 class=semibold>";
            //pcontent += "<img class='img-circle mr10' src='image/avatar/avatar2.jpg' width='42px' height='42px' />";
            pcontent += calEvent.title;
            pcontent += "</h5>";
            pcontent += "<hr/>";
            pcontent += "<p class=''><span class='ico-clock'></span> Inicia: ";
            pcontent += $.fullCalendar.formatDate(calEvent.start, "MM/dd/yyyy @ hh:mmtt");
            pcontent += "</p>";
            if (calEvent.end !== null) {
                pcontent += "<p class=''><span class='ico-clock'></span>  Finaliza: ";
                pcontent += $.fullCalendar.formatDate(calEvent.end, "MM/dd/yyyy @ hh:mmtt");
                pcontent += "</p>";
            }
            pcontent += "<p><a href='#' role='button' class='btn btn-block btn-default' onclick='cancelaCita("+id_agenda+")'>Cancelar Cita</a></p>";

            // bootstrap popover
            $(this).popover({
                placement: "left auto",
                html: true,
                trigger: "manual",
                content: pcontent
            }).popover("toggle");
        }
        
    });
    
    //Para las fechas
	$("#fecha").datepicker({
		minDate: 0,
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
    });
	
	
	
	//Selector
	$("#selectize-select").selectize({
		create: true,
		onItemAdd: function(){
			$('.datos_adicionales').show();
			$('#telefono').focus();
		},
		onItemRemove: function(){
			$('.datos_adicionales').hide();
			$('#telefono').val("");
			$('#email').val("");
		},
		onChange: function(){
			var id_paciente =$("#selectize-select").val();
			if (/^([0-9])*$/.test(id_paciente)){
				$('.datos_adicionales').hide();
				$('#telefono').val("");
				$('#email').val("");
			}
		},
        sortField: {
            field: "text",
            direction: "asc"
        }
        
    });
    
    
});
function cancelaCita(id){
	bootbox.confirm("¿Estas seguro/a que quieres cancelar la cita?", function (result) {
        if(result==true){
	        $.post('ac/cancela_cita.php', { id_agenda: id },function(data){
				if(data==1){
					window.open("?Modulo=Agenda&msg=3", "_self");
				}else{
					alert("Error: "+data);
					/*
					$("#load_"+id+"").hide();
					$(".btn_"+id+"").show();
					alert(data);*/
				}
			});
        }else{
			event.preventDefault();        
        }
    });
}
function agendaCita(){
	var btn_guarda = Ladda.create(document.querySelector('#btn-agendar'));
	btn_guarda.start();	
	var datos=$('#frm_guarda').serialize();
	$('.mod').attr("disabled", true); 
	$.post('ac/nueva_cita.php',datos,function(data){
	    if(data==1){
	    	$('.mod').removeAttr("disabled");
			window.open("?Modulo=Agenda&msg=1", "_self");
	    }else{
	    	$('#msg_data').html(data);
	    		$('#msg').show();
	    		$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    		btn_guarda.stop();
	    		$('.mod').removeAttr("disabled");
	    }
	});
}
</script>