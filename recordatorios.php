<?
  $qrecordatorios = mysql_query("SELECT * FROM recordatorios WHERE id_medico='$id_medico' AND activo=1 ORDER BY fecha_limite ASC");
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Recordatorios</h4>
            </div>
        </div>
        <!-- Page Header -->
        
        
  		<!-- START row -->
          <div class="row">
              <div class="col-md-12" id="panel_lista1">
                  <!-- START Widget Panel -->
                  <div class="widget panel">
                      <!-- panel body -
                      <div class="panel-body">
                          <h5 class="semibold text-primary">Recordatorios</h5>
                      </div>
                      <!--/ panel body -->
                      <table class="table">
                                <tbody id="tabla_recordatorios">
                                    <!-- Solo este TR se va utilizar, los demás son ejemplos. -->    
                                    <?while($recordatorio=mysql_fetch_assoc($qrecordatorios)){?>                                
                                    <tr id="tr_<?=$recordatorio['id_recordatorio']?>">
                                        <td width="5%">
                                            <div class="checkbox custom-checkbox nm">  
                                                <input type="checkbox" id="customcheckbox<?=$recordatorio['id_recordatorio']?>" value="1" data-toggle="selectrow" data-target="tr" data-contextual="stroke">  
                                                <label for="customcheckbox<?=$recordatorio['id_recordatorio']?>"></label>   
                                            </div>
                                        </td>
										
                                        <td onclick="abrir()" style="cursor: pointer;" data-id="<?=$recordatorio['id_recordatorio']?>"><?=$recordatorio['recordatorio']?></td>
                                        
                                        <td width="8%" align="right" class="text-muted" ><small><?=fechaDiaMes($recordatorio['fecha_limite'])?></small></td>
                                    </tr>
                                    <?}?>
                                </tbody>
                            </table>
                      <!-- panel footer -->
                      <div class="panel-footer">
                          <div class="input-group">
                          <input type="text" class="form-control" id="nv_record" name="task" placeholder="Agregar nuevo recordatorio">
                              <span class="input-group-btn">
                                  <button class="btn btn-primary" id="agrega_recordatorio" data-style="expand-right" type="button" onclick="agregaRecord();"><span class="ladda-label">Agregar</span></button>
                              </span>
                          </div>
                      </div>
                      <!--/ panel footer -->
                  </div>
                  <!--/ END Widget Panel -->
              </div>
              

             <div class="col-md-4" id="panel_lista2" style="display:none">
                  <!-- START panel -->
                  <div class="panel panel-primary">
                      <!-- panel heading/header -->
                      <div class="panel-heading">
                          <h3 class="panel-title"><i class="ico-cogs2 mr5"></i> Opciones</h3>
                          <!-- panel toolbar -->
                          <div class="panel-toolbar text-right">
                              <!-- option -->
                              <div class="option">
                                  <button class="btn" id="demoCerrar" data-parent=".col-md-4"><i class="remove"></i></button>
                              </div>
                              <!--/ option -->
                          </div>
                          <!--/ panel toolbar -->
                      </div>
                      <!--/ panel heading/header -->
                      
                      <!-- panel body with collapse capable -->
                      <div class="panel-collapse pull out">
                          <div class="panel-body">
                          <!-- Nombre del recordatorio -->
						  		              <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control animated" rows="3" id="record_mod"></textarea>
                                        </div>
                                    </div>
                                </div>
                          <!-- Observaciones del Recordatorio -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="control-label">Observaciones de Recordatorio</label>
                                            <textarea class="form-control animated" rows="4" id="observ_mod"></textarea>
                                        </div>
                                    </div>
                                </div>
                          <!--- Asignar a un usuario -->      
                              	<!--<div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="control-label">Asignar a secretaria</label>
                                            <select name="color" class="form-control" required="" data-parsley-id="5686">
                                                <option value="">Seleccione</option>
                                                <option value="1">María López Huerta</option>
                                                <option value="2">Mariana González</option>
                                                <option value="3">Meredith Camacho Algomás</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>-->
                          <!--- Configurar una fecha límite -->      
                              	<div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="control-label">Configurar una fecha límite</label>
                                            <input type="text" class="form-control" id="datepicker1" placeholder="Seleccione fecha" />
                                        </div>
                                    </div>
                                </div>
                          <!--- Recordatorio -->      
                              	<div class="form-group">
                                    <div class="row mb10">
                                        <div class="col-sm-12">
                                        	<button type="button" class="btn btn-primary btn-xs" id="ver_configura_recordar">Envíame un Recordatorio</button>
                                            <!-- Al activar que se despliegue la fecha por defecto -->
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="configura_recordar" style="display:none;">
                                    	
                                    	<div class="col-sm-5">
                                    		<input type="text" class="form-control" id="datepicker2" placeholder="Fecha" />
                                    	</div>
                                    	
                                    	<div class="col-sm-5">
                                    		<div class='input-group date' id='hora'>
								                <input type='text' class="form-control" name="hora" id="hora_alarma"/>
											    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
											</div>
                                    	</div>
                                    	
                                    	<div class="col-sm-2 mt5">
                                        
                                        	<span class="badge badge-danger" id="cierra_configura_recordar" style="cursor: pointer;">X</span>
                                            
                                        </div>
                                    	
                                    </div>
                                </div>
                          </div>
                          <input type="hidden" id="id_mod" val="">
                          <div class="panel-footer">
                          	<div class="row">
                          		<div class="col-sm-6">
                          			<button type="button" class="btn btn-default" onclick="eliminaRecord();"><i class="ico-trash"></i> Eliminar</button>
                          		</div>
						  		<div class="col-sm-6 text-right">
                                	<button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" onclick="modificaRecord();"><span class="ladda-label">Guardar</span></button>
						  		</div>
							</div>
                          </div>
                      </div>
                      <!--/ panel body with collapse capabale -->

                      <!-- Loading indicator -->
                      <div class="indicator"><span class="spinner"></span></div>
                      <!--/ Loading indicator -->
                  </div>
                  <!--/ END panel -->
              </div>
            
         </div>
         <!-- Termina el row -->
         
         </div>
         <!-- Termina el row -->

     </div>
</section>

<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<script>
$(function(){

	$("#demoCerrar").click(function() {		
		cerrar();
    });

  $("#nv_record").keyup(function(event){
    if(event.keyCode == 13){
        agregaRecord();
    }
  });

	$(".ver").click(function() {		
    abrir();
    });
    
    $("#ver_configura_recordar").click(function() {		
		$('#configura_recordar').show('Slow',function() {
			$("#datepicker2").datepicker('show');
		});
		
    });
    
    $("#cierra_configura_recordar").click(function() {		
		$('#configura_recordar').hide('Slow');
    });
    
    $('#hora').datetimepicker({
		pickDate: false,
		minuteStepping:10
	});
	
	$("#datepicker1").datepicker();
	
	$("#datepicker2").datepicker();
	
	$('.animated').autosize();
	
	Ladda.bind(".btn.ladda-button", { timeout: 5000 } );
   

});

function abrir(){
    $( "#panel_lista1" ).animate({
			width : '66.66666667%'
			}, 200,function() {
				$('#panel_lista1').removeClass('col-md-12');
				$('#panel_lista1').css('width','none').addClass('col-md-8');
				Ladda.bind(".btn.ladda-button", { timeout: 5000 } );
		});
			
		setTimeout(function() {
			$('#panel_lista2').addClass("animation animating bounceInRight").show().
			one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function () {
				$(this).removeClass("animation animating bounceInRight");
        $("#record_mod").focus();
			});
		 }, 100);

    
}

function cerrar(){
	
	$('#panel_lista2').addClass("animation animating bounceOutDown").show().
		one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function () {
			$(this).removeClass("animation animating bounceOutDown");
			$(this).hide();
		});
		setTimeout(function() {		
			$( "#panel_lista1" ).animate({
				width : '100%'
				}, 200,function() {
					$('#panel_lista1').removeClass('col-md-8');
					$('#panel_lista1').css('width','none').addClass('col-md-12');
			});
		 }, 300);		

}

function agregaRecord(){
  var record = $('#nv_record').val();
  $.post('ac/nuevo_recordatorio.php','nv_record='+record,function(data) {
        var respuesta = data.split("|");
        var tr = respuesta[1];
        var id = respuesta[2];
        var fecha = respuesta[3].split("-");
        fecha = fecha[1]+"/"+fecha[2]+"/"+fecha[0];
        respuesta = respuesta[0];
        if(respuesta=='1'){
          $("#tabla_recordatorios").append(tr);
          $('#nv_record').val("");
          $("#record_mod").val(record);
          $('#datepicker1').val(fecha);
          $('#id_mod').val(id);
          abrir();
        }else{
          alert('Error: '+tr);
          //App.unblockUI('#modal_crop');
        }
      });
}

//PARA PODER MODIFICAR Y ELIMINAR
$(document).on('click', '[data-id]', function () {
    var id_record = $(this).attr('data-id');
    $.get('data/info_recordatorio.php','id_record='+id_record,function(data) {
        var respuesta = data.split("|");
        result = respuesta[0];
        fecha = respuesta[2].split("-");
        fecha = fecha[1]+"/"+fecha[2]+"/"+fecha[0];
        if(result=='1'){
          $("#record_mod").val(respuesta[1]);
          $('#datepicker1').val(fecha);
          $('#id_mod').val(id_record);
          $("#observ_mod").val(respuesta[3]);
        }else{
          alert('Error: '+respuesta[1]);
          //App.unblockUI('#modal_crop');
        }
      }); 
});

function modificaRecord(){
  var id_record = $('#id_mod').val();
  var record = $('#record_mod').val();
  var observ = $('#observ_mod').val();
  var limit = $('#datepicker1').val();
  var alerta = $('#datepicker2').val();
  var alerta2 = $('#hora_alarma').val();
  $.post('ac/cambia_recordatorio.php','id_record='+id_record+'&record='+record+'&limit='+limit+'&alerta='+alerta+'&hora_alerta='+alerta2+"&observ="+observ,function(data) {
        if(data=='1'){
          location.reload(true);
        }else{
          alert('Error: '+data);
          //App.unblockUI('#modal_crop');
        }
      });
}

function eliminaRecord(){
  var id_record = $('#id_mod').val();
  $.post('ac/elimina_recordatorio.php','id_record='+id_record,function(data) {
        if(data=='1'){
          cerrar();
          $('#tr_'+id_record).fadeOut('slow');
        }else{
          alert('Error: '+data);
          //App.unblockUI('#modal_crop');
        }
      });
}



</script>
<!--/ Library script -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="javascript/components/animation.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="javascript/forms/element.js"></script>
<script type="text/javascript" src="javascript/pages/calendar.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/moment.js"></script>
<script type="text/javascript" src="plugins/timepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>