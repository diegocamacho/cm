<?
$sql="SELECT consultas.*, pacientes.nombre FROM consultas 
LEFT JOIN pacientes on pacientes.id_paciente=consultas.id_paciente
WHERE consultas.activo=1";	
$q_consultas=mysql_query($sql);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Consultas Atendidas</h4>
            </div>
            <div class="page-header-section">
                <div class="col-md-12 text-right">
                		<div class="btn-group" style="margin-bottom:5px;">
                             <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Filtrar <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                 <li class="active"><a href="javascript:void(0);">May</a></li>
                                 <li><a href="javascript:void(0);">Abr</a></li>
                                 <li><a href="javascript:void(0);">Mar</a></li>
                                 <li><a href="javascript:void(0);">Feb</a></li>
                                 <li><a href="javascript:void(0);">Ene</a></li>
                                 <li><a href="javascript:void(0);">Dic 2013</a></li>
                                 <li class="divider"></li>
                                 <li><a href="javascript:void(0);">Clínica</a></li>
                             </ul>
                         </div><!-- /btn-group -->
                	</div>
            </div>
        </div>
        <!-- Page Header -->
		<!-- Page Header -->
		<? if($_GET['msg']==1){ ?>
        <div class="alert alert-dismissable alert-success animation animating flipInX">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            ¡La consulta se ha atendido!
        </div>
        <? }elseif($_GET['msg']==2){ ?>
        <div class="alert alert-dismissable alert-info animation animating flipInX">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            ¡La consulta se ha editado!
        </div>
        <? }elseif($_GET['msg']==3){ ?>
        <div class="alert alert-dismissable alert-danger animation animating flipInX">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            ¡La consulta se ha eliminado!
        </div>
        <? } ?>
        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Consultas de Mayo</h3>
                    </div>
                   
                    <table class="table table-striped" id="zero-configuration">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Fecha</th>
                                <th>Tipo de cobro</th>
                                <th>Diagnóistico</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
	                        <? while($ft=mysql_fetch_assoc($q_consultas)){ ?>
                            <tr>
                                <td><?=$ft['nombre']?></td>
                                <td><?=fechaLetra(fechaSinHora($ft['fecha_hora']))?></td>
                                <td>Pago Inmediato</td>
                                <td><?=$ft['diagnostico']?></td>
                                <td><span class="label label-teal">Ver Resumen</span></td>
                            </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </div>
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

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>

<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>

<script type="text/javascript" src="plugins/datatables/tabletools/js/tabletools.min.js"></script>

<script type="text/javascript" src="plugins/datatables/tabletools/js/zeroclipboard.js"></script>

<script type="text/javascript" src="plugins/datatables/js/jquery.datatables-custom.min.js"></script>

<script type="text/javascript" src="javascript/tables/datatable.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->