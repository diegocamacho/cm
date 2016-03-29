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
WHERE ingresos.id_medico=$id_medico AND consultas.activo = 1 AND estado=2 AND ingresos.activo=1 AND (ingresos.id_tipo_cobro=3 OR ingresos.id_tipo_cobro=4) AND fecha_hora_pago BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' $consulta_estado";
$query=mysql_query($sql);
$muestra=mysql_num_rows($query);
//Consulta para los totales
$sq_total="SELECT SUM(ingresos.monto) AS total FROM ingresos
LEFT JOIN consultas ON consultas.id_consulta=ingresos.id_consulta 
WHERE ingresos.id_medico=$id_medico AND consultas.activo=1 AND estado=2 AND ingresos.activo=1 AND (ingresos.id_tipo_cobro=3 OR ingresos.id_tipo_cobro=4) AND fecha_hora_pago BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total=$datos_total['total'];

$sq_total="SELECT SUM(monto) AS total FROM ingresos 
LEFT JOIN consultas ON consultas.id_consulta=ingresos.id_consulta
WHERE ingresos.id_medico=$id_medico AND consultas.activo=1 AND estado=2 AND ingresos.activo=1 AND ingresos.id_tipo_cobro=3 AND fecha_hora_pago BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total_general=$datos_total['total'];

$sq_total="SELECT SUM(monto) AS total FROM ingresos 
LEFT JOIN consultas ON consultas.id_consulta=ingresos.id_consulta
WHERE ingresos.id_medico=$id_medico AND consultas.activo=1 AND estado=2 AND ingresos.activo=1 AND ingresos.id_tipo_cobro=4 AND fecha_hora_pago BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total_aseguradora=$datos_total['total'];
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
                <h4 class="title semibold">Cuentas por Cobrar</h4>
            </div>
            <div class="page-header-section text-right">
            			<? if($valida_clinicas>1){ ?>
            			<!-- Filtro por clínica 
            			<div class="btn-group mr10">
						     <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Clínicas <span class="caret"></span></button>
						     <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						     	<? while($ft=mysql_fetch_assoc($q_clinicas)){ ?>
						         <li><a href="javascript:void(0);"><?=$ft['clinica']?></a></li>
						        <? } ?>
						     </ul>
						</div>
						<? } ?> 
						<!-- Filtro por mes 
                		<div class="btn-group mr10">
						     <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Filtrar <span class="caret"></span></button>
						     <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						         <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#SeleccionaMes">Por Mes</a></li>
						         <li><a href="<?=$url?>&Estado=1">Pagados</a></li>
						         <li><a href="<?=$url?>&Estado=2">No Pagados</a></li>
						     </ul>
						 </div>
						
                        <a class="btn btn-sm btn-primary" href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#NuevoIngreso">Nuevo Ingreso Adicional</a>
                        -->
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
				                <p class="semibold text-muted mb0 mt5">CRÉDITO TOTAL</p>
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
				                <h4 class="semibold nm"><?=fnum($total_general)?></h4>
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
				                <h4 class="semibold nm"><?=fnum($total_aseguradora)?></h4>
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
            <div id="msg_pendientes" style="display:none;margin: 20px 10px 10px 10px;">
                <span id="msg_data_pendientes"></span>
            </div>
            <div class="col-md-12">
            	<? if($muestra){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cuentas por cobrar</h3>
                    </div>
					
                    <table class="table table-striped" id="pagos_pendientes">
                        <thead>
                            <tr>
                            	<th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th align="right">Monto</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <? while($ft=mysql_fetch_assoc($query)){ 
	                        $id_tipo_ingreso=$ft['id_tipo_ingreso'];
                            $id_paciente = $ft['id_paciente'];
	                        $estado=$ft['estado'];
	                        $monto=$ft['monto'];
                        ?>
                            <tr>
                            	<td>Diego Camacho</td>
                                <td><? if($id_tipo_ingreso==1){ echo "<a href='?Modulo=PerfilPaciente&id=$id_paciente'>".$ft['nombre']."</a>"; }else{ echo $ft['anotacion']; }?></td>
                                <td><? if($id_tipo_ingreso==1){ echo fechaLetra($ft['fecha_hora_pago']); }else{ echo fechaLetra(fechaSinHora($ft['fecha_hora_pago'])); }?></td>
                                <td><?=fnum($monto)?></td>
                                <td><? if($estado==1){ ?><span class="label label-primary">Pagado</span> <? }else{ ?><span class="label label-danger"> Pagar</span> <span class="label label-teal"><?=$ft['tipo_cobro']?></span> <? } ?></td>
                                <td>
                                    <div class="btn-group mb5 ml10">
                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel" role="menu" style="min-width: 0px;">
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-ingreso="<?=$ft['id_ingreso']?>" data-target="#pagaAdeudo" class="text-success">Pagar</a></li>
                                            <li><a href="javascript:void(0);" onclick="eliminaPagoPendiente(<?=$ft['id_ingreso']?>)" class="text-danger">Eliminar</a></li>
                                       </ul>
                                    </div>                                    
                                </td>
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
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/bootbox/js/bootbox.js"></script>
<script type="text/javascript" src="plugins/blockui/jquery.blockUI.js"></script>
<!--/ Library script -->
<script>
$(function(){
	//Envio el formulario al presionar enter
	$('form').submit(function(e) {
		ac_nuevo_ingreso();
		e.preventDefault();
	});
	
	$(document).on('click', '[data-ingreso]', function () {

        var id_ingreso = $(this).attr('data-ingreso');
        $('#muestra_info_deuda').html(''); 
        $.ajax({
        url: "data/adeudo.php",
        data: 'id_ingreso='+id_ingreso,
        success: function(data){
            $('#muestra_info_deuda').html(data);
            $('#footer_adeudo').show();
            
            store.set('id_ingreso',id_ingreso);
        },
        cache: false
       });
    });
    
    $('#pagaAdeudo').on('hidden.bs.modal', function (e) {
        store.remove('id_ingreso');
        $('#muestra_info_deuda').html("");
    });

});

function eliminaPagoPendiente(id){
    bootbox.confirm("¿Estas seguro/a que quieres eliminar el pago pendiente?", function (result) {
        if(result==true){
            $('#pagos_pendientes').block({ 
                overlayCSS:  { 
                backgroundColor: '#FFF', 
                opacity: 0.5, 
                cursor: 'wait' 
            },
                message: '', 
            });
            $.post('ac/elimina_ingreso_pendiente.php?id_ingreso='+id,function(data){
                if(data==1){
                    $('#msg_pendientes').hide();
                    $('.pendientes_'+id).hide();
                    $('#pagos_pendientes').unblock();
                }else{
                    $('#msg_data_pendientes').html(data);
                    $('#msg_pendientes').show();
                    $('#msg_pendientes').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
                    scrollToElement('#main');
                    $('#pagos_pendientes').unblock();
                }
            });
        }else{
            event.preventDefault();
        }
    });
}

function pagaDeuda(){
    var btn_guarda = Ladda.create(document.querySelector('#btn_guarda'));
    btn_guarda.start();
    if(!store.get('id_ingreso')){
        var id_ingreso = 0;
    }else{
        var id_ingreso = store.get('id_ingreso');
    }
    
    $.post('ac/paga_pendiente.php?id_ingreso='+id_ingreso,function(data){
        if(data==1){
            alert("ok");
            window.open("?Modulo=PerfilPaciente&id=<?=$id_paciente?>", "_self");
        }else{
            $('#msg_data_paga').html(data);
            $('#msg_paga').show();
            $('#msg_paga').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
            $('#msg_paga').focus();
            btn_guarda.stop();
        }
    });
}
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
<div id="pagaAdeudo" class="modal fade">
    <div class="modal-dialog">
        <form class="modal-content" id="frm_guarda">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-coins mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary">Pago de Adeudo</h4>
                </div>
            </div>
            <div class="modal-body">
                <!-- Mensaje -->
                <div id="msg_paga" style="display:none;margin: 0px 10px 10px 10px;">
                    <span id="msg_data_paga"></span>
                </div>
                <!-- End Mensaje -->
                <div id="muestra_info_deuda"></div>
            </div>
            <div class="modal-footer" style="display:none;" id="footer_adeudo">
                <button type="button" class="btn mod btn-default" data-dismiss="modal">Cancelar</button>&nbsp;&nbsp;
                <button type="button" class="btn btn-success ladda-button" data-style="zoom-in" id="btn_guarda" onclick="pagaDeuda();"><span class="ladda-label">Pagar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->