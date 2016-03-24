<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");
extract($_GET);
if(!$id_consulta) exit("Ocurrió un error, no se encontro la consulta seleccionada.");
$id_consulta=escapar($id_consulta,1);

$sql="SELECT consultas.*, tipo_cobro.tipo_cobro,pacientes.*,aseguradoras.nombre_aseguradora FROM consultas 
LEFT JOIN pacientes on pacientes.id_paciente=consultas.id_paciente
LEFT JOIN ingresos on ingresos.id_consulta=consultas.id_consulta
LEFT JOIN tipo_cobro on ingresos.id_tipo_cobro=tipo_cobro.id_tipo_cobro
LEFT JOIN aseguradoras on ingresos.id_aseguradora=aseguradoras.id_aseguradora 
WHERE consultas.id_medico=$id_medico AND consultas.activo=1 AND consultas.id_consulta=$id_consulta";
$query=mysql_query($sql);
$ft=mysql_fetch_assoc($query);

//Recetas
$sq_recetas="SELECT * FROM recetas WHERE id_consulta=$id_consulta";
$q_recetas=mysql_query($sq_recetas);
$valida_recetas_resumen=mysql_num_rows($q_recetas);

?>
<style>
	.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}
</style>

	<div class="row" style="margin: 10px;">
        <div class="col-md-12">
    		<div class="invoice-title">
    			<h2><?=$ft['nombre']?></h2><h3 class="pull-right">Consulta # <?=$id_consulta?></h3>
    		</div>
            <small><?=fechaLetra(fechaSinHora($ft['fecha_hora']))?></small>
    		<hr>
    		<div class="row">
    			<div class="col-md-8">
    				<address>
    				<strong>Diagnóstico:</strong><br>
    					<?=$ft['diagnostico']?>
    				</address>
    			</div>
    			<div class="col-md-4 text-right">
    				<address>
        			<strong><?=$ft['nombre']?></strong><br>
    					<?=$ft['celular']?><br>
    					<?=$ft['email']?><br>
    					Edad: <?=$ft['edad']?> - Sexo: <?=$ft['sexo']?><br>
    				<strong>Alergias o antecedentes</strong><br>
    					<?=$ft['antecedentes_alergias']?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
	    			<? if($valida_recetas_resumen){ ?>
	    			<? while($rec=mysql_fetch_assoc($q_recetas)){ ?>
    				<address>
    					<strong>Prescripción (Receta):</strong><br>
    					<?=$rec['receta']?>
    				</address>
    				
    				<? } ?>
    				<? } ?>
    				<address>
    					<strong>Sugerencias:</strong><br>
							<?=$ft['sugerencias']?>
    				</address>
    				
    			</div>
    		</div>
    	</div>
    </div>