<?
$id_agenda=escapar($_GET['ID'],1);

if(!$id_agenda){
	//Clinicas
	$sql_clinica="SELECT * FROM clinicas WHERE id_medico='$id_medico' AND activo='1'";
	$q_clinica=mysql_query($sql_clinica);
	$valida_clinica=mysql_num_rows($q_clinica);

	//Pacientes
	$sql_pacientes="SELECT * FROM pacientes WHERE id_medico='$id_medico' AND activo='1'";
	$q_pacientes=mysql_query($sql_pacientes);
}else{
	$sql="SELECT agenda.*, pacientes.*, clinicas.clinica FROM agenda 
	JOIN pacientes ON pacientes.id_paciente=agenda.id_paciente
	JOIN clinicas ON clinicas.id_clinica=agenda.id_clinica
	LEFT JOIN secretarias ON secretarias.id_secretaria=agenda.id_secretaria
	WHERE agenda.id_medico=$id_medico AND agenda.activo=1 AND agenda.id_agenda='$id_agenda' AND atendida=0";
	$q=mysql_query($sql);
	$valida_consulta=mysql_num_rows($q);
	if(!$valida_consulta) header("Location: index.php");
	
	$datos=mysql_fetch_assoc($q);
	/* Datos */
	$id_paciente=$datos['id_paciente'];
	$nombre=$datos['nombre'];
	$telefono=$datos['celular'];
	$email=$datos['email'];
	$edad=$datos['edad'];
	$sexo=$datos['sexo'];
	$anotacion=$datos['anotacion'];
	$antecedentes=$datos['antecedentes_alergias'];
	$titulo="/ ".$nombre;
	
}

$sq_aseguradoras="SELECT * FROM aseguradoras WHERE id_medico=$id_medico AND activo=1";
$q_aseguradoras=mysql_query($sq_aseguradoras);
$valida_aseguradoras=mysql_num_rows($q_aseguradoras);
?>

<!-- START Template Main -->
<section id="main" role="main">

    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Reporte de Ingresos por Fecha</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">

                	<!--<a class="btn btn-sm btn-danger" href="javascript:void(0);" role="button">Regresar</a>-->
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        <!-- START row -->
        <div class="row">             

     
<!-- Diagnostico -->
		<div class="row">
			<div class="col-md-12">
                <!-- START panel -->
                <div class="panel panel-primary">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="ico-user-md mr5"></i> Reporte de Ingresos por Fecha</h3>
                    </div>
                    <!--/ panel heading/header -->
                    
                    <!-- panel body with collapse capable -->
                    <div class="panel-collapse pull out">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 mb10">
                                    <div class="col-sm-6">
                                        <label class="control-label">Fecha Inicio <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control mod" name="fecha_ini" id="datepicker1" placeholder="Seleccione fecha" />
                                    </div>
                                </div>
                                <div class="col-sm-12 mb10">
                                    <div class="col-sm-6">
                                        <label class="control-label">Fecha Fin <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control mod" name="fecha_fin" id="datepicker2" placeholder="Seleccione fecha" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ panel body with collapse capabale -->

                </div>
                <!--/ END panel -->
            </div>
		</div>

<!-- Termina el Row -->
		
		<div class="row">
			<div class="col-md-12 text-center">
				<br />
				<button class="btn btn-lg btn-primary" id="btn_guarda">Generar Reporte</button>
				<br /><br />
			</div>
		</div>

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
<script>
$(function(){
    $("#datepicker1").datepicker();

    $("#datepicker2").datepicker();
	
	// Summernote
    // ================================
    $(".summernote").summernote({
        height: 200,
        toolbar: [
            ["style", ["style"]],
            ["style", ["bold", "italic", "underline", "clear"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
            ["table", ["table"]]
        ]
    });
    	
});

$('#btn_guarda').click(function(){
        var fecha_inicio = $('#fecha_inicio').val();
        var fecha_fin = $('#fecha_fin').val();
        
        if(fecha_inicio && fecha_fin){
            $('#fecha_inicio').val('');
            $('#fecha_fin').val('');
            window.open(
                "/panel/formatos/gastos.php?fecha_ini="+fecha_inicio+"&fecha_fin="+fecha_fin,
                "_blank"
            );
        }else{
            alert("Debe seleccionar una fecha de inicio y una fecha de fin");
        }
        
    });
</script>
<!-- App and page level script -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/summernote/js/summernote.min.js"></script>
<script type="text/javascript" src="plugins/inputmask/js/inputmask.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>



<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->