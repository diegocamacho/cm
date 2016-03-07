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
    $url="?Modulo=Gastos&Mes=".$mes_seleccionado;
}else{
    $fecha_consulta=$ano_actual."-".$mes_actual;
    $mes=soloMes($mes_actual);
    $url="?Modulo=Gastos";
}
//Datos para la tabla
$sql="SELECT gastos.*, categoria_gastos.categoria FROM gastos 
JOIN tipo_cobro ON categoria_gastos.id_cat_gastos=gastos.id_cat_gastos
WHERE gastos.id_medico=$id_medico AND categoria_gastos.activo=1 AND gastos.fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' $consulta_estado";
$query=mysql_query($sql);
$muestra=mysql_num_rows($query);
//Consulta para los totales
$sq_total="SELECT SUM(monto) AS total FROM gastos WHERE gastos.id_medico=$id_medico AND fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total=$datos_total['total'];
//Totales Facturados
$sq_total="SELECT SUM(monto) AS total FROM gastos WHERE gastos.id_medico=$id_medico AND fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' AND facturado=1";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total_facturas=$datos_total['total'];
//Totales No Facturados
$sq_total="SELECT SUM(monto) AS total FROM gastos WHERE gastos.id_medico=$id_medico AND fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' AND facturado=0";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total_nofacturas=$datos_total['total'];
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
                <h4 class="title semibold">Gastos de <?=$mes?></h4>
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
                		<div class="btn-group mr10">
						     <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Filtrar <span class="caret"></span></button>
						     <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						         <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#SeleccionaMes">Por Mes</a></li>
						         <li><a href="javascript:void(0);">Facturados</a></li>
						         <li><a href="javascript:void(0);">No Facturados</a></li>
						         <li class="divider"></li>
						     </ul>
						 </div><!-- /btn-group -->

                        <a class="btn btn-sm btn-primary" href="javascript:void(0);" role="button" data-toggle="modal" data-target="#NuevoIngreso">Nuevo Gasto</a>

            </div>
        </div>
        <!-- Page Header -->
		<!-- Sub-Header -->
		<div class="row">
            <div class="col-sm-4">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-primary">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm"><?=fnum($total)?></h4>
                            <p class="semibold text-muted mb0 mt5">GASTOS TOTALES <?=strtoupper($mes)?></p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-4">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-info">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm"><?=fnum($total_facturas)?></h4>
                            <p class="semibold text-muted mb0 mt5">GASTOS FACTURADOS</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-4">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-info">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm"><?=fnum($total_nofacturas)?></h4>
                            <p class="semibold text-muted mb0 mt5">GASTOS NO FACTURADOS</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            
        </div>
                
                
        <!-- Tabla y acciones -->
        <div class="row">
            <div class="col-md-12">
                <? if($muestra){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gastos de <?=$mes?></h3>
                    </div>
                   
                    <table class="table table-striped" id="zero-configuration">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? while($ft=mysql_fetch_assoc($query)){                             
                                $fact = $ft['facturado'];
                                $monto=$ft['monto'];
                                $pdf = $ft['pdf_archivo'];
                            ?>
                                <tr>
                                    <td><?$ft['descripcion']?></td>
                                    <td><?fechaLetra($ft['fecha'])?></td>
                                    <td align="right"><?=fnum($monto)?></td>
                                    <td><?if($pdf){?><a role="button" href="<?=$pdf?>" target="_blank" class="btn green-haze"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a><?}else{?><span class="label label-info">No Facturado</span><? } ?></td>
                                </tr>
                            <? } ?>
                            <tr>
                                <td>Pago de teléfono del consultorio</td>
                                <td>11 de Mayo</td>
                                <td>500.00</td>
                                <td><span class="label label-teal"><i class="ico-folder-download"></i> Facturado</span></td>
                            </tr>
                            <tr>
                                <td>Servicio de Internet Banda Ancha</td>
                                <td>11 de Mayo</td>
                                <td>500.00</td>
                                <td><span class="label label-default">No Facturado</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                 <? }else{ ?>
                    <div class="alert alert-dismissable alert-warning animation animating flipInX">No se han agregado gastos :)</div>
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
	$("#datepicker1").datepicker();
	
	$("#selectize-selectmultiple").selectize({
        maxItems: 1
    });
	
	$("#customcheckbox1").click(function() {

        if($("#customcheckbox1").is(':checked')) {  
            $('#sube_pdf').show('Fast');
        } else {  
            $('#sube_pdf').hide('Fast');
        }  
    });
});
</script>

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>
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
    <div class="modal-dialog">
        <form class="modal-content" action="">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-coins mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary">Nuevo Gasto</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    	
                    	<div class="form-group">

	                    	<label class="control-label">Categoría</label>
	                    	
	                    	<select id="selectize-selectmultiple" class="form-control" placeholder="Seleccione una..." multiple>
                        		<option value="">Seleccione una...</option>
							    <option value="1">Teléfono Consultorio</option>
							    <option value="2">Teléfono Celular</option>
							    <option value="3">Consultorio</option>
							    <option value="4">Internet</option>
							    <option value="5">Papeleria</option>
							    <option value="6">Publicidad</option>
							    <option value="7">Gasolina</option>
							    <option value="8">Comisiones Bancarias</option>
							    <option value="9">Servicios Contables</option>
							    <option value="10">Servicios de internet</option>
                        	</select>
	                                
                        </div>
                                
                        <div class="form-group">
                        	<div class="row">
                        		<div class="col-sm-6">
                                	<label class="control-label">Monto <span class="text-danger">*</span></label>
									<div class="input-group">
							        	<span class="input-group-addon">$</span>
										<input type="text" class="form-control">
									</div>
                        		</div>
                        		<div class="col-sm-6">
                                    <label class="control-label">Fecha <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="datepicker1" placeholder="Seleccione fecha" />
                        		</div>
                        	</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" maxlength="160" />
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 0px;">
                        	<span class="checkbox custom-checkbox custom-checkbox-primary">
		                    	<input type="checkbox" name="gasto_facturado" id="customcheckbox1">
		                    	<label for="customcheckbox1">&nbsp;&nbsp;Gasto facturado</label>
							</span>
                        </div>
                        <!-- Si el gasto es facturado mostramos uploaders -->
                        <div class="form-group" id="sube_pdf" style="display:none;"><br />
                        	<div class="row">
                        		<div class="col-sm-6">
									<label class="control-label">Archivo PDF (opcional)</label>
									<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
                                       <span class="icon iconmoon-file-3"></span> Seleccionar <input type="file">
                                    </div>
									</span>
									</div>
                        		</div>
                        		
                        		<div class="col-sm-6">
									<label class="control-label">Archivo XML (opcional)</label>
									<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
                                       <span class="icon iconmoon-file-3"></span> Seleccionar <input type="file">
                                    </div>
									</span>
									</div>
                        		</div>
                        	</div>
                       </div>
                       <!-- Termina -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->