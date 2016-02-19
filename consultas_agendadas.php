<?
$opciones=$_GET['Filtro'];
if($opciones==7){
	$nueva_fecha=strtotime('+7 day',strtotime($fecha_actual));
	$nueva_fecha=date ('Y-m-j',$nueva_fecha);
	$sql="SELECT agenda.*, pacientes.nombre,pacientes.celular, clinicas.clinica FROM agenda 
	JOIN pacientes ON pacientes.id_paciente=agenda.id_paciente
	JOIN clinicas ON clinicas.id_clinica=agenda.id_clinica
	LEFT JOIN secretarias ON secretarias.id_secretaria=agenda.id_secretaria
	WHERE agenda.id_medico=$id_medico AND agenda.activo=1 AND agenda.fecha >='$fecha_actual' AND agenda.fecha <='$nueva_fecha' ORDER BY hora ASC";	
}else{
	$sql="SELECT agenda.*, pacientes.nombre,pacientes.celular, clinicas.clinica FROM agenda 
	JOIN pacientes ON pacientes.id_paciente=agenda.id_paciente
	JOIN clinicas ON clinicas.id_clinica=agenda.id_clinica
	LEFT JOIN secretarias ON secretarias.id_secretaria=agenda.id_secretaria
	WHERE agenda.id_medico=$id_medico AND agenda.activo=1 AND agenda.fecha='$fecha_actual' ORDER BY hora ASC";	
}

	

$q=mysql_query($sql);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Consultas de Hoy</h4>
            </div>
            <div class="page-header-section">
                <div class="toolbar">
                
                	<div class="col-md-3 col-md-offset-2">
                		<div class="btn-group" style="margin-bottom:5px;">
                             <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="margin-right: 20px;">Filtrar <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu">
                                 <li class="active"><a href="?Modulo=ConsultasAgendadas">Hoy</a></li>
                                 <li><a href="?Modulo=ConsultasAgendadas&Filtro=7">Próximos 7 días</a></li>
                             </ul>
                         </div><!-- /btn-group -->
                	</div>
                	
                    <div class="col-md-7 col-md-offset-0">
                        <div class="has-icon">
                            <input type="search" class="form-control" name="shuffle-filter" id="shuffle-filter" placeholder="Buscar paciente">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Page Header -->
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
        <!-- START Row -->
        <div class="row" id="shuffle-grid" style="z-index: 3">
        
        	<? while($ft=mysql_fetch_assoc($q)){ ?>
        	
            <div class="col-sm-6 col-md-3 shuffle">
				<div class="widget panel" style="overflow: visible;">
				    <div class="panel-body">
                        <ul class="list-unstyled">
                        
                            <li class="text-center mb15">
                                <img class="img-rounded img-bordered-primary" src="image/avatar/displa_pacientes.png" alt="" width="100px" height="100px" />
                            </li>
                            
                            <li class="text-center mb15">
	                            <div class="btn-group">
	                            	<a class="btn btn-info btn-xs" href="?Modulo=Consulta&id=<?=ft['id_agemda']?>" role="button">Atender</a>
	                            	<div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                                            Opciones
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupDrop1" style="min-width: 0px;" >
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#cambiar_fecha" data-id="<?=$ft['id_agenda']?>">Cambiar Fecha</a></li>
                                            <li><a href="javascript:void(0);" onclick="cancelaCita(<?=$ft['id_agenda']?>)">Cancelar Cita</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            
                            <li class="text-center mb10 nombres">
                                <h4 class="semibold  nm"><?=substr($ft['nombre'],0,22)?></h4>
                                <p class="bold nm"><?=$ft['clinica']?></p>
                                <p class="text-muted nm">Hoy - <?=formatoHora($ft['hora'])?></p>
                                
                            </li>
                            
                        </ul>
                    </div>
				</div>
            </div>

            <? } ?>

            
        </div>
        <!--/ END Row -->
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
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/bootbox/js/bootbox.min.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/moment.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="plugins/shuffle/js/jquery.shuffle.min.js"></script>

<script>
$(function () {
	store.clear();
	//Para las fechas
	$("#fecha").datepicker({
		minDate: 0,
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
    });
	
	//Para la hora
	$('#hora').datetimepicker({
		pickDate: false,
		minuteStepping:10,
		language: 'es',
		autoclose: 1,
		format: 'HH:mm' //'LT',
	});
    // Shuffle
    // ================================
    var $grid   = $("#shuffle-grid"),
        $filter = $("#shuffle-filter"),
        $sizer  = $grid.find("shuffle-sizer");
    
    /* instatiate shuffle
    $grid.shuffle({
        itemSelector: ".shuffle",
        sizer: $sizer
    });
*/
	$(document).on('click', '[data-id]', function () {
		var id_agenda = $(this).attr('data-id');
		store.set('id_agenda',id_agenda);
	});
	
    // Filter options
    (function () {
        $filter.on("keyup change", function () {
            var val = this.value.toLowerCase();
            $grid.shuffle("shuffle", function ($el, shuffle) {

                // Only search elements in the current group
                if (shuffle.group !== "all" && $.inArray(shuffle.group, $el.data("groups")) === -1) {
                    return false;
                }

                var text = $.trim($el.find(".nombres > h4").text()).toLowerCase();
                return text.indexOf(val) !== -1;
            });
        });
    })();
});

function cancelaCita(id){
	bootbox.confirm("¿Estas seguro/a que quieres cancelar la cita?", function (result) {
        if(result==true){
	        $.post('ac/cancela_cita.php', { id_agenda: id },function(data){
				if(data==1){
					window.open("?Modulo=ConsultasAgendadas&msg=3", "_self");
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
function cambiaCita(){
	if(!store.get('id_agenda')){
		return false;
	}else{
		var id_agenda = store.get('id_agenda');
	}
	
	var btn_guarda = Ladda.create(document.querySelector('#btn-agendar'));
	btn_guarda.start();	
	var datos=$('#frm_guarda').serialize();
	$('.mod').attr("disabled", true); 
	$.post('ac/edita_cita.php',datos+'&id_agenda='+id_agenda,function(data){
	    if(data==1){
	    	$('.mod').removeAttr("disabled");
			window.open("?Modulo=ConsultasAgendadas&msg=2", "_self");
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
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->

 <!-- START modal-sm -->
<div id="cambiar_fecha" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="ico-calendar mb15 mt15" style="font-size:36px;"></div>
                <h3 class="semibold modal-title text-success">Re-agendar Cita</h3>
            </div>
            <div class="modal-body">
	            
		            <div class="row">
			            <div class="col-md-12">
				            <form id="frm_guarda">
					            <!-- Mensaje de Error -->
								<div id="msg" style="display:none;">
								    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								    <span id="msg_data"></span>
								</div>
								<!-- END Mensaje de Error -->
                				<div class="form-group">
									<label for="exampleInputEmail1">Nueva Fecha</label>
								    <input id="fecha" name="fecha" type="text" class="form-control mod" data-parsley-required>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Nueva Hora</label>
								    <div class='input-group date' id='hora'>
								    	<input type='text' class="form-control mod" name="hora" />
										<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
									</div>
								</div>
				            </form>
			            </div>
		            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" id="btn-agendar" onclick="cambiaCita()"><span class="ladda-label" id="btn_guarda_text">Guardar Cambios</span></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->