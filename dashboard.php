<?
//RECORDATORIOS
$qrecordatorios = mysql_query("SELECT * FROM recordatorios WHERE id_medico='$id_medico' AND activo=1 ORDER BY fecha_limite ASC");
//END RECORDATORIOS
?>

<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
<!-- Citas del día  y pendientes -->
                
        <div class="row">
    <!-- Citas del día -->
    		<div class="col-md-8">
    			<!-- START Widget Panel -->
        		<div class="widget panel">
        		<a href="?Modulo=ConsultasAgendadas" class="panel-ribbon panel-ribbon-teal pull-right"><i class="ico-user-md"></i></a>
        	    <!-- panel body -->
        	    <div class="panel-body">
        	        <h5 class="semibold text-teal">Citas para hoy</h5>
        	    </div>
        	    <!--/ panel body -->
        	    <table class="table">
        	        <tbody>
        	            <tr>
        	                <td width="15%">12:00 PM</td>
        	                <td>Diego Camacho Flores</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	            <tr>
        	                <td width="15%">01:00 PM</td>
        	                <td>Adolfo Flores</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	            <tr>
        	                <td width="15%">02:00 PM</td>
        	                <td>José González Samudio</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	            <tr>
        	                <td width="15%">03:00 PM</td>
        	                <td>Edgar Dorantes Celis</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	            <tr>
        	                <td width="15%">06:00 PM</td>
        	                <td>Antonino Salgado Nosequemás</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	            <tr>
        	                <td width="15%">07:00 PM</td>
        	                <td>Edgar Dorantes Celis</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	            <tr>
        	                <td width="15%">08:00 PM</td>
        	                <td>Antonino Salgado Nosequemás</td>
        	                <td align="right">
                                <div class="btn-group mb5 ml10">
	                            	<button type="button" class="btn btn-xs btn-teal dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                	<ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                	    <li><a href="javascript:void(0);">Atender</a></li>
                                	    <li><a href="javascript:void(0);">Cancelar</a></li>
                                	    <li class="divider"></li>
                                	    <li><a href="javascript:void(0);">Perfil</a></li>
                                	</ul>
                                </div>
        	                </td>
        	            </tr>
        	        </tbody>
        	    </table>
        	</div>
        		<!--/ END Widget Panel -->
    		
    		</div>    
    <!-- Pendientes -->
    		<div class="col-md-4">
        		<!-- START Widget Panel -->
        		<div class="widget panel">
        		<a href="?Modulo=Recordatorios" class="panel-ribbon panel-ribbon-teal pull-right"><i class="ico-tasks"></i></a>
        	    <!-- panel body -->
        	    <div class="panel-body">
        	        <h5 class="semibold text-teal">Recordatorios</h5>
        	    </div>
        	    <!--/ panel body -->
        	    <table class="table" id="tabla_recordatorios">
        	        <tbody>
        	            <!-- Solo este TR se va utilizar, los demás son ejemplos. -->    
                        <?while($recordatorio=mysql_fetch_assoc($qrecordatorios)){?>                                
                            <tr id="tr_<?=$recordatorio['id_recordatorio']?>">
                                <td width="5%">
                                <div class="checkbox custom-checkbox nm">  
                                    <input type="checkbox" id="customcheckbox<?=$recordatorio['id_recordatorio']?>" value="1" data-toggle="selectrow" data-target="tr" data-contextual="stroke" onclick="check(<?=$recordatorio['id_recordatorio']?>)" <?if($recordatorio['checa']==1){?>checked<?}?>>  
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
        	                <button class="btn btn-teal" id="agrega_recordatorio" data-style="expand-right" type="button" onclick="agregaRecord();">Agregar</button>
        	            </span>
        	        </div>
        	    </div>
        	    <!--/ panel footer -->
        	</div>
        		<!--/ END Widget Panel -->
        	</div>    
        </div>
        <!-- end row -->
<!-- Termina citas y recordatorios -->
<!-- Inicia Finanzas -->
		<hr>
        <div class="section-header">
        	<h5 class="semibold title mb15">Finanzas</h5>
        </div>
<!-- Ingresos -->		
		<!-- row -->
		<div class="row">
			
			<div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-success">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">83,845.00</h4>
                            <p class="semibold text-muted mb0 mt5">INGRESOS HOY</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-success">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">13,560.00</h4>
                            <p class="semibold text-muted mb0 mt5">INGRESOS AYER</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-success">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">54,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">INGRESOS SEMANA</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-success">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">104,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">INGRESOS MES</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
		</div>
		
<!-- Egresos -->
		<!-- row -->
		<div class="row">
			
			<div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-danger">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">33,845.00</h4>
                            <p class="semibold text-muted mb0 mt5">EGRESOS HOY</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-danger">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">24,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">EGRESOS AYER</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-danger">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">44,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">EGRESOS SEMANA</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-danger">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">74,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">EGRESOS MES</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
		</div>
		

<!-- Totales -->
		<!-- row -->
		<div class="row">
			
			<div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">

                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">10,845.00</h4>
                            <p class="semibold text-muted mb0 mt5">TOTAL HOY</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">8,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">TOTAL AYER</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">58,000.00</h4>
                            <p class="semibold text-muted mb0 mt5">TOTAL SEMANA</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-3">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm">232,040.30</h4>
                            <p class="semibold text-muted mb0 mt5">TOTAL MES</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
		</div>
<!-- Balance -->
        <hr>
        <div class="section-header">
        	<h5 class="semibold title mb15">Balance</h5>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- START panel -->
                <div class="panel mt10">
                    <!-- panel-toolbar -->
                    <div class="panel-heading">
                    	<!--
                        <div class="panel-toolbar">
                            <h5 class="semibold nm ellipsis">Balance</h5>
                        </div>
                        <div class="panel-toolbar text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default">Duration</button>
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">Select duration :</li>
                                    <li><a href="#">Year</a></li>
                                    <li><a href="#">Month</a></li>
                                    <li><a href="#">Week</a></li>
                                    <li><a href="#">Day</a></li>
                                </ul>
                            </div>
                        </div>
                        -->
                    </div>
                    <!--/ panel-toolbar -->
                    <!-- panel-body -->
                    <div class="panel-body pt0">
                        <div class="chart mt10" id="chart-audience" style="height:250px;"></div>
                    </div>
                    <!--/ panel-body -->
                    <!-- panel-footer -
                    <div class="panel-footer hidden-xs">
                        <ul class="nav nav-section nav-justified">
                            <li>
                                <div class="section">
                                    <h4 class="bold text-default mt0 mb5">24,548</h4>
                                    <p class="nm text-muted">
                                        <span class="semibold">Semana</span>
                                        <span class="text-muted mr5 ml5">•</span>
                                        <span class="text-danger"><i class="ico-arrow-down4"></i> 32%</span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="section">
                                    <h4 class="bold text-default mt0 mb5">175,132</h4>
                                    <p class="nm text-muted">
                                        <span class="semibold">Mes</span>
                                        <span class="text-muted mr5 ml5">•</span>
                                        <span class="text-success"><i class="ico-arrow-up4"></i> 15%</span>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="section">
                                    <h4 class="bold text-default mt0 mb5">89.96%</h4>
                                    <p class="nm text-muted">
                                        <span class="semibold">Año</span>
                                        <span class="text-muted mr5 ml5">•</span>
                                        <span class="text-success"><i class="ico-arrow-up4"></i> 3%</span>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--/ panel-footer -->
                </div>
                <!--/ END panel -->
            </div>
        </div>
<!-- Termina finanzas -->
		<hr>

<!-- Cuentas por cobrar y contabilidad -->
		<div class="row">
		<!-- Cuentas por cobrar -->
			<div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i class="ico-credit2 mr5"></i>Cuentas por Cobrar</h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Diego Camacho Flores <span class="semibold pull-right">500.00</span></li>
                        <li class="list-group-item">Adolfo Flores (AXA Seguros y Fianzas) <span class="semibold pull-right">4,890.00</span></li>
                        <li class="list-group-item">Banorte Seguros y Fianzas <span class="semibold pull-right">13,698.98</span></li>
                        <li class="list-group-item">Grupo Nacional Financiera Seguros <span class="semibold pull-right">800.00</span></li>
                        <li class="list-group-item">Banco Azteca Seguros <span class="semibold pull-right">3,483.98</span></li>
                        <!-- Total -->
                        <li class="list-group-item text-right semibold">Total: <span class="ml10 semibold pull-right">35,483.98</span></li>
                    </ul>
                </div>
            </div>
        <!-- Contabilidad -->
        	<div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i class="ico-bar-chart mr5"></i>Resumen Fiscal</h5>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Recibos Emitidos <span class="semibold pull-right">10</span></li>
                        <li class="list-group-item">Facturas Recibidas <span class="semibold pull-right">22</span></li>
                        <li class="list-group-item">
                            <p>Resumen de Totales</p>
                            <p class="mb5 clearfix">
                                <i class="ico-circle mr5 text-success"></i>Recibos Emitidos
                                <span class="pull-right semibold">5,000.00</span>
                            </p>
                            <p class="mb5 clearfix">
                                <i class="ico-circle mr5 text-danger"></i>Facturas Recibidas
                                <span class="pull-right semibold">12,000.00</span>
                            </p>
                            <p class="mb5 clearfix">
                                <i class="ico-circle mr5"></i>Resultado
                                <span class="pull-right semibold">7,000.00</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
		</div>
        
    </div>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->



<!-- Scripts -->
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
<script type="text/javascript" src="plugins/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.categories.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="plugins/flot/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="javascript/pages/dashboard.js"></script>
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->
<script>
///TODO LO DE RECORDATORIOS
$("#nv_record").keyup(function(event){
    if(event.keyCode == 13){
        agregaRecord();
    }
  });

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
          /*$("#record_mod").val(record);
          $('#datepicker1').val(fecha);
          $('#id_mod').val(id);
          abrir();*/
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
  $('#msg_error2').hide('Fast');
  $('.btn_ac').hide();
  $('#load2').show();
  var id_record = $('#id_mod').val();
  $.post('ac/elimina_recordatorio.php','id_record='+id_record,function(data) {
        if(data=='1'){
          cerrar();
          $('#tr_'+id_record).fadeOut('slow');
          $('#load2').hide();
          $('.btn').show();
          $('#modal_confirma').modal('hide');
        }else{
          $('#load2').hide();
          $('.btn').show();
          $('#msg_error2').html(data);
          $('#msg_error2').show('Fast');
        }
      });
}

function check(id){
  var id_record = id;
  var revisa = $('#customcheckbox'+id).attr('checked');
  if (revisa){
    var tipo = 1;
  }else{
    var tipo = 0;
  } 
  $.post('ac/check_recordatorio.php','id_record='+id_record+'&tipo='+tipo,function(data) {
        if(data=='1'){
          
        }else{
          alert('Error: '+data);
          //App.unblockUI('#modal_crop');
        }
      });
}
///END DE TODO LO DE RECORDATORIOS
</script>