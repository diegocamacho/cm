<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Perfil / Diego Camacho Flores</h4>
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

                <hr><!-- horizontal line -->

                <!-- figure with progress -->
                <ul class="list-table">
                    <li style="width:70px;">
                        <img class="img-circle img-bordered" src="image/avatar/avatar7.jpg" alt="" width="65px">
                    </li>
                    <li class="text-left">
                        <h5 class="semibold mt0">Diego Camacho Flores</h5>
                        <div style="max-width:200px;">

                            <p class="text-muted clearfix nm">
                                <span class="pull-left">Consultas</span>
                                <span class="pull-right"><span class="label label-danger">28</span></span>
                            </p>
                            
                        </div>
                    </li>
                </ul>
                <!--/ figure with progress -->

                <hr><!-- horizontal line -->

                        <!-- follower stats -->
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
                        <!--/ follower stats -->


            </div>
            <!--/ Left / Top Side -->

            <!-- Left / Bottom Side -->
            <div class="col-lg-9">
                <!-- START Tab-content -->
                <div class="tab-content">
                    <!-- tab-pane: profile -->
                    <div class="tab-pane active" id="vergeneral">
                        <!-- form profile -->
                        <form class="panel form-horizontal form-bordered" name="form-profile">
                            <div class="panel-body pt0 pb0">
                                <div class="form-group header bgcolor-default">
                                    <div class="col-md-12">
                                        <h4 class="semibold text-primary mt0 mb5">Datos Generales</h4>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" value="Diego Camacho Flores">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Teléfono Celular</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="celular" value="(983) 11 23337">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="website" value="diegocamacho2.0@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Edad</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="website" value="28">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo</label>
                                    <div class="col-sm-6">
										<select class="form-control">
											<option>Seleccione</option>
										    <option value="1" selected="selected">Masculino</option>
										    <option value="1">Femenino</option>
										</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Antecedentes y Alergias</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3">Hipertenso</textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="panel-footer">
                          	<div class="row">
                          		<div class="col-sm-6">
                          			<button type="button" class="btn btn-danger"><i class="ico-trash"></i> Eliminar Paciente</button>
                          		</div>
						  		<div class="col-sm-6 text-right">
                                	<button type="button" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label">Guardar Cambios</span></button>
						  		</div>
							</div>
                          </div>
                        </form>
                        <!--/ form profile -->
                    </div>
                    <!--/ tab-pane: profile -->

                    <!-- tab-pane: account -->
                    <div class="tab-pane" id="verconsultas">
                        <!-- START row -->
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-primary">
						            <div class="panel-heading">
						                <h3 class="panel-title">Historial de Consultas</h3>
						            </div>
						           
						            <table class="table table-striped" id="historial_consultas">
						                <thead>
						                    <tr>
						                        <th>Fecha/Hora</th>
						                        <th>Diagnóstico</th>
						                        <th>Opciones</th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                        
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo 2014 - 18:00</td>
						                        <td>Fractura en el hueso de la pierna izquierda</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                </tbody>
						            </table>
						        </div>
						    </div>
						</div>
						<!--/ END row -->
                    </div>
                    <!--/ tab-pane: account -->

                    <!-- tab-pane: security -->
                    <div class="tab-pane" id="verpagos">
                        <!-- START row -->
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-teal">
						            <div class="panel-heading">
						                <h3 class="panel-title">Historial de Pagos</h3>
						            </div>
						           
						            <table class="table table-striped" id="historial_pagos">
						                <thead>
						                    <tr>
						                        <th>Fecha</th>
						                        <th>Tipo de cobro</th>
						                        <th>Monto</th>
						                        <th>Opciones</th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                        
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014/td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Pago Inmediato</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-primary">Detalles</span></td>
						                    </tr>
						                </tbody>
						            </table>
						        </div>
						    </div>
						</div>
						<!--/ END row -->
                    </div>
                    <!--/ tab-pane: security -->
                    
                    
                    
                    <!-- tab-pane: security -->
                    <div class="tab-pane" id="verpagospendientes">
                        <!-- START row -->
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-danger">
						            <div class="panel-heading">
						                <h3 class="panel-title">Pagos Pendientes</h3>
						            </div>
						           
						            <table class="table table-striped" id="pagos_pendientes">
						                <thead>
						                    <tr>
						                        <th>Fecha de Consulta</th>
						                        <th>Tipo de Cobro</th>
						                        <th>Monto</th>
						                        <th>Opciones</th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Crédito General</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-danger">Pagar</span> <span class="label label-primary"> Detalles</span></td>
						                    </tr>
						                    
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Crédito General</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-danger">Pagar</span> <span class="label label-primary"> Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Crédito General</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-danger">Pagar</span> <span class="label label-primary"> Detalles</span></td>
						                    </tr>
						                    <tr>
						                        <td>11 de Mayo del 2014</td>
						                        <td>Crédito General</td>
						                        <td>$ 550.00</td>
						                        <td><span class="label label-danger">Pagar</span> <span class="label label-primary"> Detalles</span></td>
						                    </tr>
						                </tbody>
						            </table>
						        </div>
						    </div>
						</div>
						<!--/ END row -->
                    </div>
                    <!--/ tab-pane: security -->

                    
                </div>
                <!--/ END Tab-content -->
            </div>
            <!--/ Left / Bottom Side -->
        </div>
        <!--/ END row -->
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

<!-- App and page level script -->

<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>

<script type="text/javascript" src="plugins/datatables/tabletools/js/tabletools.min.js"></script>

<script type="text/javascript" src="plugins/datatables/tabletools/js/zeroclipboard.js"></script>

<script type="text/javascript" src="plugins/datatables/js/jquery.datatables-custom.min.js"></script>

<script type="text/javascript" src="javascript/tables/datatable.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->