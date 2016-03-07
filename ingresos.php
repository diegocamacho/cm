<?
$estado=$_GET['Estado'];
$mes_seleccionado=$_GET['Mes'];
$mes_actual=date('m');
$ano_actual=date('Y');

if(!escapar($mes_seleccionado,1)){ $mes_seleccionado=""; }
if(!escapar($estado,1)){ $estado=""; }
//para el pagado y no pagado
if($estado){
	$consulta_estado="AND estado=".$estado;
}else{
	$consulta_estado="";
}
//Para cambiar de mes
if($mes_seleccionado){
	$fecha_consulta=$ano_actual."-".$mes_seleccionado;
	$mes=soloMes($mes_seleccionado);
	$url="?Modulo=Ingresos&Mes=".$mes_seleccionado;
}else{
	$fecha_consulta=$ano_actual."-".$mes_actual;
	$mes=soloMes($mes_actual);
	$url="?Modulo=Ingresos";
}
//Datos para la tabla
$sql="SELECT ingresos.*, tipo_cobro.tipo_cobro,pacientes.nombre,consultas.id_paciente FROM ingresos 
JOIN tipo_cobro ON tipo_cobro.id_tipo_cobro=ingresos.id_tipo_cobro
LEFT JOIN consultas ON consultas.id_consulta=ingresos.id_consulta
LEFT JOIN pacientes ON pacientes.id_paciente=consultas.id_paciente
WHERE ingresos.id_medico=$id_medico AND ingresos.activo=1 AND fecha_hora_pago BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' $consulta_estado";
$query=mysql_query($sql);
$muestra=mysql_num_rows($query);
//Consulta para los totales
$sq_total="SELECT SUM(monto) AS total FROM ingresos WHERE ingresos.id_medico=1 AND ingresos.activo=1 AND fecha_hora_pago BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total=$datos_total['total'];
//Falta relacionar los ingresos facturados

//Buscamos clínicas
$sq_clinicas="SELECT * FROM clinicas WHERE id_medico=$id_medico AND activo=1";
$q_clinicas=mysql_query($sq_clinicas);
$valida_clinicas=mysql_num_rows($q_clinicas);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Ingresos de <?=$mes?></h4>
            </div>
            <div class="page-header-section text-right">
            			<? if($valida_clinicas>1){ ?>
            			<!-- Filtro por clínica -->
            			<div class="btn-group mr10">
						     <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Clínicas <span class="caret"></span></button>
						     <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						     	<? while($ft=mysql_fetch_assoc($q_clinicas)){ ?>
						         <li><a href="javascript:void(0);"><?=$ft['clinica']?></a></li>
						        <? } ?>
						     </ul>
						</div>
						<? } ?> 
						<!-- Filtro por mes -->
                		<div class="btn-group mr10">
						     <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Filtrar <span class="caret"></span></button>
						     <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						         <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#SeleccionaMes">Por Mes</a></li>
						         <li><a href="<?=$url?>&Estado=1">Pagados</a></li>
						         <li><a href="<?=$url?>&Estado=2">No Pagados</a></li>
						     </ul>
						 </div>

                        <a class="btn btn-sm btn-primary" href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#NuevoIngreso">Nuevo Ingreso Adicional</a>

            </div>
        </div>
        <!-- Page Header -->
		<!-- Sub-Header -->
		<div class="row">
			<div class="col-md-12">
				<? if($_GET['msg']==1){ ?>
            	<div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡El ingreso se ha agregado!
                </div>
                <? }elseif($_GET['msg']==2){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡El ingreso se ha editado!
                </div>
                <? }elseif($_GET['msg']==3){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡El ingreso se ha eliminado!
                </div>
                <? } ?>
                
				<div class="col-sm-4">
				    <!-- START Statistic Widget -->
				    <div class="table-layout">
				        <div class="col-xs-4 panel bgcolor-primary">
				            <div class="ico-coins fsize24 text-center"></div>
				        </div>
				        <div class="col-xs-8 panel">
				            <div class="panel-body text-center">
				                <h4 class="semibold nm"><?=fnum($total)?></h4>
				                <p class="semibold text-muted mb0 mt5">INGRESOS <?=limpiaStr($mes,0,1)?></p>
				            </div>
				        </div>
				    </div>
				    <!--/ END Statistic Widget -->
				</div>
				<div class="col-sm-4">
				    <!-- START Statistic Widget -->
				    <div class="table-layout">
				        <div class="col-xs-4 panel bgcolor-teal">
				            <div class="ico-credit2 fsize24 text-center"></div>
				        </div>
				        <div class="col-xs-8 panel">
				            <div class="panel-body text-center">
				                <h4 class="semibold nm">13,560.00</h4>
				                <p class="semibold text-muted mb0 mt5">CRÉDITO EN GENERAL</p>
				            </div>
				        </div>
				    </div>
				    <!--/ END Statistic Widget -->
				</div>
				<div class="col-sm-4">
				    <!-- START Statistic Widget -->
				    <div class="table-layout">
				        <div class="col-xs-4 panel bgcolor-teal">
				            <div class="ico-aid fsize24 text-center"></div>
				        </div>
				        <div class="col-xs-8 panel">
				            <div class="panel-body text-center">
				                <h4 class="semibold nm">104,000.00</h4>
				                <p class="semibold text-muted mb0 mt5">CRÉDITO ASEGURADORA</p>
				            </div>
				        </div>
				    </div>
				    <!--/ END Statistic Widget -->
				</div>
			</div><!--Termina el header de cantidades-->
        </div>
                
                
        <!-- Tabla y acciones -->
        <div class="row">
            <div class="col-md-12">
            	<? if($muestra){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingresos de <?=$mes?></h3>
                        <div class="panel-toolbar text-right">
                            <button class="btn btn-xs btn-default">No Pagados</button>
							<button class="btn btn-xs btn-default">Pagados</button>
                        </div>
                    </div>
					
                    <table class="table table-striped" id="zero-configuration">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th align="right">Monto</th>
                                <th>Estado</th>
                                <th>Recibo CFDI</th>
                            </tr>
                        </thead>
                        <tbody>
                        <? while($ft=mysql_fetch_assoc($query)){ 
	                        $id_tipo_ingreso=$ft['id_tipo_ingreso'];
	                        $estado=$ft['estado'];
	                        $monto=$ft['monto'];
                        ?>
                            <tr>
                                <td><? if($id_tipo_ingreso==1){ echo "<a href='#'>".$ft['nombre']."</a>"; }else{ echo $ft['anotacion']; }?></td>
                                <td><? if($id_tipo_ingreso==1){ echo fechaLetra($ft['fecha_hora_pago']); }else{ echo fechaLetra(fechaSinHora($ft['fecha_hora_pago'])); }?></td>
                                <td align="right"><?=fnum($monto)?></td>
                                <td><? if($estado==1){ ?><span class="label label-primary">Pagado</span> <? }else{ ?><span class="label label-danger"> Pagar</span> <span class="label label-teal"><?=$ft['tipo_cobro']?></span> <? } ?></td>
                                <td><span class="label label-default">No Emitido</span></td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
                <? }else{ ?>
					<div class="alert alert-dismissable alert-warning animation animating flipInX">No se han agregado ingresos :(</div>
				<? } ?>
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
<script>
$(function(){
	$("#fecha").datepicker();
	
	//Nuevo Ingreso
	$('#btn_guarda').click(function(){
	 	ac_nuevo_ingreso();
	});	
	
	//Enfoco el primer campo
	$('#NuevoIngreso').on('shown.bs.modal', function (e) {
		$('#monto').focus();		
  	});
  	
  	//Limpiamos el modal cuando se cierre
  	$('#NuevoIngreso').on('hidden.bs.modal', function (e) {
  		$('.mod').removeAttr("disabled");
	  	$('.mod').val('');
  	});
	
	//Envio el formulario al presionar enter
	$('form').submit(function(e) {
		ac_nuevo_ingreso();
		e.preventDefault();
	});
	
	//Cambiamso de mes la consulta
	$('#btn_mes').click(function(){
		var mes = $('#mes').val();
		location.href = "?Modulo=Ingresos&Mes="+mes;
	});
	
});

function ac_nuevo_ingreso(){

	var datos=$('#frm_guarda').serialize();

	var btn_guarda = Ladda.create(document.querySelector('#btn_guarda'));
	
	btn_guarda.start();
	$('.mod').attr("disabled", true);

	$.post('ac/ingresos.php',datos,function(data){

	    if(data==1){
	    	location.href = "?Modulo=Ingresos&msg=1";
	    }else if(data==2){
	    	location.href = "?Modulo=Ingresos&msg=2";
	    }else if(data==3){
	    	location.href = "?Modulo=Ingresos&msg=3";
	    }else{
	    	$('#msg_data').html(data);
	    	$('#msg').show();
	    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    	btn_guarda.stop();
	    	$('.mod').removeAttr("disabled");
	    	$('#nombre').focus();
	    }
	});
};
</script>

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/tabletools.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/zeroclipboard.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables-custom.min.js"></script>
<script type="text/javascript" src="javascript/tables/datatable.js"></script>

<script type="text/javascript" src="javascript/components/animation.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="javascript/forms/element.js"></script>
<script type="text/javascript" src="javascript/pages/calendar.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->


<!-- START Modal -->
<div id="NuevoIngreso" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" id="frm_guarda">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-coins mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary">Nuevo Ingreso Adicional</h4>
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
                        <div class="form-group">
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<label class="control-label">Monto <span class="text-danger">*</span></label>
									<div class="input-group">
							        	<span class="input-group-addon">$</span>
										<input type="text" class="form-control mod" name="monto" id="monto">
									</div>
								</div>
                        	</div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label">Fecha <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mod" id="fecha" name="fecha" placeholder="Seleccione fecha" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <textarea name="descripcion" class="form-control mod" rows="4" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success ladda-button" data-style="zoom-in" id="btn_guarda"><span class="ladda-label">Guardar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->


<!-- START modal-sm Seleccionar mes-->
<div id="SeleccionaMes" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="ico-calendar3 mb15 mt15" style="font-size:36px;"></div>
                <h4 class="semibold modal-title text-primary">Ingresos por Mes</h4>
            </div>
            <div class="modal-body">
            <form id="frm_mes">
                <select class="form-control" name="mes" id="mes">
                	<option>Seleccione uno</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_mes">Aceptar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->