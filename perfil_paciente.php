<?
$id_paciente=escapar($_GET['id'],1);
$sql_paciente="SELECT * FROM pacientes WHERE id_paciente=$id_paciente AND id_medico=$id_medico";
$q_paciente=mysql_query($sql_paciente);
$valida=mysql_num_rows($q_paciente);
	if($valida){
		$ft=mysql_fetch_assoc($q_paciente);
		$nombre=$ft['nombre'];
		$celular=$ft['celular'];
		$email=$ft['email'];
		$edad=$ft['edad'];
		$sexo=$ft['sexo'];
		$antecedentes_alergias=$ft['antecedentes_alergias'];
	}
	
//Consultas
$sql_consultas="SELECT * FROM consultas WHERE id_paciente=$id_paciente AND id_medico=$id_medico AND activo=1";
$q_consultas=mysql_query($sql_consultas);
$valida_consultas=mysql_num_rows($q_consultas);

//Pagos
$sql_pagos="SELECT ingresos.*,consultas.*,tipo_cobro.tipo_cobro FROM consultas 
JOIN ingresos ON ingresos.id_consulta=consultas.id_consulta
JOIN tipo_cobro ON tipo_cobro.id_tipo_cobro=ingresos.id_tipo_cobro
WHERE consultas.id_paciente=$id_paciente AND consultas.id_medico=$id_medico AND ingresos.activo=1 AND ingresos.estado=1";
$q_pagos=mysql_query($sql_pagos);
$valida_pagos=mysql_num_rows($q_pagos);

//Cuentas por cobrar
$sql_cuentas="SELECT cuentas_cobrar.*,ingresos.*,tipo_cobro.*,aseguradoras.* FROM cuentas_cobrar 
LEFT JOIN ingresos ON ingresos.id_cuentas_cobrar=cuentas_cobrar.id_cuentas_cobrar
LEFT JOIN tipo_cobro ON tipo_cobro.id_tipo_cobro=ingresos.id_tipo_cobro
LEFT JOIN aseguradoras on ingresos.id_aseguradora=aseguradoras.id_aseguradora
WHERE cuentas_cobrar.id_paciente=$id_paciente AND ingresos.estado=2";
$q_cuentas=mysql_query($sql_cuentas);
$valida_cuentas=mysql_num_rows($q_cuentas);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Perfil <? if($nombre){ echo "/ ".$nombre; } ?></h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <a class="btn btn-sm btn-info" href="index.php?Modulo=Pacientes" role="button">Regresar</a>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
	        <? if($valida){ ?>
            <!-- Left / Top Side -->
            <div class="col-lg-3">
                <!-- tab menu -->
                <!-- Poner en notificaciones las cantidades en cada menu -->
                <ul class="list-group list-group-tabs">
                    <li class="list-group-item active"><a href="#vergeneral" data-toggle="tab"><i class="ico-user2 mr5"></i> Datos Generales</a></li>
                    <li class="list-group-item"><a href="#verconsultas" data-toggle="tab"><i class="ico-user-md mr5"></i> Historial de Consultas</a></li>
                    <li class="list-group-item"><a href="#verpagos" data-toggle="tab"><i class="ico-coin mr5"></i> Historial de Pagos</a></li>
                    <li class="list-group-item"><a href="#verpagospendientes" data-toggle="tab"><i class="ico-coins mr5"></i> Pagos Pendientes</a> </li>
                </ul>
                <!-- tab menu -->
				
				<!-- Datos del usuario
                <hr>

                 
                <ul class="list-table">
                    <li style="width:70px;">
                        <img class="img-circle img-bordered" src="image/avatar/avatar.png" alt="" width="65px">
                    </li>
                    <li class="text-left">
                        <h5 class="semibold mt0"><? if($nombre){ echo $nombre; } ?></h5>
                        <div style="max-width:200px;">

                            <p class="text-muted clearfix nm">
                                <span class="pull-left">Consultas</span>
                                <span class="pull-right"><span class="label label-danger">28</span></span>
                            </p>
                            
                        </div>
                    </li>
                </ul>

                <hr>                        
                        <ul class="nav nav-section nav-justified mt15">
                            <li>
                                <div class="section">
                                    <h4 class="nm semibold">14,300.00</h4>
                                    <p class="nm text-muted">Pagado</p>
                                </div>
                            </li>
                            <li>
                                <div class="section">
                                    <h4 class="nm semibold">1,100.00</h4>
                                    <p class="nm text-muted">Adeudo</p>
                                </div>
                            </li>
                        </ul>
                -->


            </div>
            <!--/ Left / Top Side -->

            <!-- Left / Bottom Side -->
            <div class="col-lg-9">
                <!-- START Tab-content -->
                <div class="tab-content">
                    <!-- tab-pane: perfil -->
                    <div class="tab-pane active" id="vergeneral">
                        <!-- form perfil -->
                        <form class="panel form-horizontal form-bordered" id="frm_perfil">
                            <div class="panel-body pt0 pb0">
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Datos Generales</h4>
                                    </div>
                                </div>
                                <!-- Mensaje -->
                                <div id="msg" style="display:none;margin-top: 20px;">
									<span id="msg_data"></span>
								</div>
								<!-- End Mensaje -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nombre" value="<?=$nombre?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Teléfono Celular</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="celular" value="<?=$celular?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="email" value="<?=$email?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Edad</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="edad" value="<?=$edad?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo</label>
                                    <div class="col-sm-6">
										<select class="form-control" name="sexo">
											<option value="">Seleccione</option>
										    <option value="M" <? if($sexo=="M"){?>selected="selected"<?}?>>Masculino</option>
										    <option value="F" <? if($sexo=="F"){?>selected="selected"<?}?>>Femenino</option>
										</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Antecedentes y Alergias</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" name="antecedentes_alergias"><?=$antecedentes_alergias?></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="panel-footer">
                          	<div class="row">
                          		<div class="col-sm-6">
                          			<button type="button" class="btn btn-default ladda-button" data-style="zoom-in" id="btn_elimina_paciente"><span class="ladda-label">Eliminar Paciente</span></button>
                          		</div>
						  		<div class="col-sm-6 text-right">
                                	<button type="button" class="btn btn-primary ladda-button" data-style="zoom-in" id="actualiza_perfil"><span class="ladda-label">Guardar Cambios</span></button>
						  		</div>
							</div>
                          </div>
                        </form>
                        <!--/ form perfil -->
                    </div>
                    <!--/ tab-pane: perfil -->

                    <!-- tab-pane: consultas -->
                    <div class="tab-pane" id="verconsultas">
                        <!-- START row -->
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-primary">
						            <div class="panel-heading">
						                <h3 class="panel-title">Historial de Consultas</h3>
						            </div>
						            <? if($valida_consultas){ ?>
						            <table class="table table-striped" id="historial_consultas">
						                <thead>
						                    <tr>
						                        <th width="15%">Fecha</th>
						                        <th>Diagnóstico</th>
						                        <th width="10%"></th>
						                    </tr>
						                </thead>
						                <tbody>
							                <? while($ft=mysql_fetch_assoc($q_consultas)){ ?>
						                    <tr>
						                        <td><?=fechaLetra(fechaSinHora($ft['fecha_hora']))?></td>
						                        <td><?=$ft['diagnostico']?></td>
						                        <td align="right">
							                        <div class="btn-group mb5 ml10">
														<button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel" role="menu" style="min-width: 0px;">
														    <li><a data-toggle="modal" href="data/consulta.php?id_consulta=<?=$ft['id_consulta']?>" data-target="#consulta">Ver Consulta</a></li>
														    <li><a href="javascript:void(0);" class="text-danger">Eliminar</a></li>
														</ul>
													</div>
						                        </td>
						                    </tr>
						                    <? } ?>
						                </tbody>
						            </table>
						            <? }else{ ?>
						            <div class="col-md-12 mt15">
						            	<div class="alert alert-dismissable alert-info">
											<b><?=$nombre?></b> aún no ha tenido consultas.
										</div>
						            </div>
									<div style="clear: both"></div>
						            <? } ?>
						        </div>
						    </div>
						</div>
						<!--/ END row -->
                    </div>
                    <!--/ tab-pane: consultas -->

                    <!-- tab-pane: pagos -->
                    <div class="tab-pane" id="verpagos">
                        <!-- START row -->
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-teal">
						            <div class="panel-heading">
						                <h3 class="panel-title">Historial de Pagos</h3>
						            </div>
						            <? if($valida_pagos){ ?>
						            <table class="table table-striped" id="historial_pagos">
						                <thead>
						                    <tr>
						                        <th width="15%">Fecha</th>
						                        <th width="15%">Tipo de cobro</th>
						                        <th>Observación</th>
						                        <th width="8%" style="text-align: right">Monto</th>
						                        <th width="10%"></th>
						                    </tr>
						                </thead>
						                <tbody>
							                <? while($ft=mysql_fetch_assoc($q_pagos)){ ?>
						                    <tr>
						                        <td><?=fechaLetra(fechaSinHora($ft['fecha_hora_pago']))?></td>
						                        <td><?=$ft['tipo_cobro']?></td>
						                        <td><?=$ft['anotacion']?></td>
						                        <td align="right"><?=number_format($ft['monto'],2)?></td>
						                        <td align="right">
							                        <div class="btn-group mb5 ml10">
														<button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel" role="menu" style="min-width: 0px;">
														    <li><a href="javascript:void(0);">Convertir en Deuda</a></li>
														    <li><a href="javascript:void(0);" class="text-danger">Eliminar</a></li>
														</ul>
													</div>
						                        </td>
						                    </tr>
						                    <? } ?>
						                </tbody>
						            </table>
						            <? }else{ ?>
						            <div class="col-md-12 mt15">
							            <div class="alert alert-dismissable alert-info">
											<b><?=$nombre?></b> aún no ha tenido consultas.
										</div>
						            </div>
						            <div style="clear: both"></div>
						            <? } ?>
						        </div>
						    </div>
						</div>
						<!--/ END row -->
                    </div>
                    <!--/ tab-pane: pagos -->

                    <!-- tab-pane: pagos pendientes -->
                    <div class="tab-pane" id="verpagospendientes">
                        <!-- START row -->
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-danger">
						            <div class="panel-heading">
						                <h3 class="panel-title">Pagos Pendientes</h3>
						            </div>
						            <? if($valida_cuentas){ ?>
						            <table class="table table-striped" id="pagos_pendientes">
						                <thead>
						                    <tr>
						                        <th  width="15%">Fecha del adeudo</th>
						                        <th width="20%">Tipo de cobro</th>
						                        <th>Observación</th>
						                        <th width="8%" style="text-align: right">Monto</th>
						                        <th width="10%"></th>
						                    </tr>
						                </thead>
						                <tbody>
							                <? while($ft=mysql_fetch_assoc($q_cuentas)){ ?>
						                    <tr>
						                        <td><?=fechaLetra($ft['fecha_adeudo'])?></td>
						                        <td><?=$ft['tipo_cobro']?> <? if($ft['nombre_aseguradora']){ echo "<br>(".$ft['nombre_aseguradora'].")"; } ?></td>
						                        <td><?=$ft['anotacion']?></td>
						                        <td align="right"><?=number_format($ft['monto'],2)?></td>
						                        <td align="right">
							                        <div class="btn-group mb5 ml10">
														<button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel" role="menu" style="min-width: 0px;">
														    <li><a href="javascript:void(0);" class="text-success">Pagar</a></li>
														    <li><a href="javascript:void(0);" class="text-danger">Eliminar</a></li>
														</ul>
													</div>
						                        </td>
						                    </tr>
						                    <? } ?>
						                </tbody>
						            </table>
						            <? }else{ ?>
						            <div class="col-md-12 mt15">
										<div class="alert alert-dismissable alert-danger">
											<b><?=$nombre?></b> aún no tiene cuentas por cobrar.
										</div>
									</div>
						            <div style="clear: both"></div>
						            <? } ?>
						        </div>
						    </div>
						</div>
						<!--/ END row -->
                    </div>
                    <!--/ tab-pane: pagos pendientes -->

                    
                </div>
                <!--/ END Tab-content -->
            </div>
            <!--/ Left / Bottom Side -->
            <? }else{ ?>
            <div class="col-md-12">
            	<div class="alert alert-dismissable alert-info">
					<strong>Ocurrió un error:</strong> No se ha encontrado el perfil de paciente.
				</div>
            </div>
            <? } ?>
        </div>
        <!--/ END row -->
    </div>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->

<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>

<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/bootbox/js/bootbox.js"></script>
<script type="text/javascript" src="plugins/blockui/jquery.blockUI.js"></script>

<script>
function scrollToElement(target) {
    var topoffset = 30;
    var speed = 100;
    var destination = jQuery( target ).offset().top - topoffset;
    jQuery( 'html:not(:animated),body:not(:animated)' ).animate( { scrollTop: destination}, speed, function() {
        window.location.hash = target;
    });
    return false;
};
$(function(){

	$('#actualiza_perfil').click(function() {
		var btn_actualiza = Ladda.create(document.querySelector('#actualiza_perfil'));
		btn_actualiza.start();
		var datos=$('#frm_perfil').serialize();
        $('#vergeneral').block({ 
	        overlayCSS:  { 
	 		backgroundColor: '#FFF', 
	 		opacity: 0.5, 
	 		cursor: 'wait' 
	 	},
            message: '', 
        });
        $.post('ac/perfil_paciente.php',datos+'&id_paciente='+<?=$id_paciente?>,function(data){
		    if(data==1){
				$('#msg_data').html("Se ha actualizado el perfil del paciente.");
		    	$('#msg').show();
		    	$('#msg').attr("class","alert alert-dismissable alert-success animation animating flipInX");
		    	btn_actualiza.stop();
		    	scrollToElement('#main');
		    	$('#vergeneral').unblock();
		    }else{
		    	$('#msg_data').html(data);
		    	$('#msg').show();
		    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
		    	$('#msg').focus();
		    	btn_actualiza.stop();
		    	scrollToElement('#main');
		    	$('#vergeneral').unblock();
		    }
		});
		
    });
    
    
    $('#btn_elimina_paciente').click(function() {
	    bootbox.confirm("¿Estas seguro/a que quieres eliminar al paciente <?=$nombre?>?", function (result) {
        	if(result==true){
				var btn_actualiza = Ladda.create(document.querySelector('#actualiza_perfil'));
				btn_actualiza.start();
				var datos=$('#frm_perfil').serialize();
        		$('#vergeneral').block({ 
	    		    overlayCSS:  { 
	 				backgroundColor: '#FFF', 
	 				opacity: 0.5, 
	 				cursor: 'wait' 
	 			},
        		    message: '', 
        		});
        		$.post('ac/activa_desactiva_paciente.php',datos+'&id_paciente=<?=$id_paciente?>&tipo=0',function(data){
				    if(data==1){
						window.open("?Modulo=Pacientes&msg=1", "_self");
				    }else{
				    	$('#msg_data').html(data);
				    	$('#msg').show();
				    	$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
				    	$('#msg').focus();
				    	btn_actualiza.stop();
				    	scrollToElement('#main');
				    	$('#vergeneral').unblock();
				    }
				});
			}else{
				event.preventDefault();
			}
		});
		
    });
});
</script>





<div class="modal fade" id="consulta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		</div>
	</div>
</div>