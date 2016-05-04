<?
$mes_seleccionado=$_GET['Mes'];

if(!escapar($mes_seleccionado,1)){ $mes_seleccionado=""; }

$mes_actual=date('m');
$ano_actual=date('Y');

//Para cambiar de mes
if($mes_seleccionado){
    $fecha_consulta=$ano_actual."-".$mes_seleccionado;
    $consulta_fecha= "AND consultas.fecha_hora BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
    $mes="de ".soloMes($mes_seleccionado);
    $url="?Modulo=ConsultasAtendidas&Mes=".$mes_seleccionado;
}else{
    $consulta_fecha='';
}

$sql="SELECT consultas.*, tipo_cobro.tipo_cobro,pacientes.nombre,aseguradoras.nombre_aseguradora FROM consultas 
LEFT JOIN pacientes on pacientes.id_paciente=consultas.id_paciente
LEFT JOIN ingresos on ingresos.id_consulta=consultas.id_consulta
LEFT JOIN tipo_cobro on ingresos.id_tipo_cobro=tipo_cobro.id_tipo_cobro
LEFT JOIN aseguradoras on ingresos.id_aseguradora=aseguradoras.id_aseguradora
WHERE consultas.activo=1 $consulta_fecha";	
$q_consultas=mysql_query($sql);

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
                <h4 class="title semibold">Consultas Atendidas</h4>
            </div>
            <div class="page-header-section">
                <div class="col-md-12 text-right">
                	<!--<div class="btn-group" style="margin-bottom:5px;">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Clínicas <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                        <? while($ft=mysql_fetch_assoc($q_clinicas)){ ?>
                            <li><a href="<?=$url?>&Clinica=<?=$ft['id_clinica']?>"><?=$ft['clinica']?></a></li>
                        <? } ?>
                        </ul>
                    </div>-->	
                    <div class="btn-group" style="margin-bottom:5px;">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Filtrar <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                            <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#SeleccionaMes">Por Mes</a></li>
                            <?if($mes_seleccionado){?>
                            <li class="divider">
                            <li><a href="?Modulo=ConsultasAtendidas" role="button">Todas</a></li>
                            <?}?>
                        </ul>
                    </div>
                    
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
                        <h3 class="panel-title">Consultas Atendidas <?=$mes?></h3>
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
                                <td><span style="display:none;"><?=$ft['fecha_hora']?></span><?=fechaLetra(fechaSinHora($ft['fecha_hora']))?></td>
                                <td><?=$ft['tipo_cobro']?> <? if($ft['nombre_aseguradora']){ echo "(".$ft['nombre_aseguradora'].")"; } ?></td>
                                <td><?=$ft['diagnostico']?></td>
                                <td><a class="btn btn-sm btn-teal" href="?Modulo=Consulta&Consulta=<?=$ft['id_consulta']?>" role="button">Ver Resumen</a></td>
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

<script>
$(function(){
    
    //Cambiamos de mes la consulta
    $('#btn_mes').click(function(){
        var mes = $('#mes').val();
        location.href = "?Modulo=ConsultasAtendidas&Mes="+mes;
    });
    
});
</script>

<!-- START modal-sm Seleccionar mes-->
<div id="SeleccionaMes" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="ico-calendar3 mb15 mt15" style="font-size:36px;"></div>
                <h4 class="semibold modal-title text-primary">Consultas Atendidas por Mes</h4>
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

