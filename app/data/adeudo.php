<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");
extract($_GET);
if(!$id_ingreso) exit("Ocurrió un error, no se encontro la consulta seleccionada.");
$id_ingreso=escapar($id_ingreso,1);

$sql="SELECT * FROM ingresos 
LEFT JOIN cuentas_cobrar ON cuentas_cobrar.id_cuentas_cobrar=ingresos.id_cuentas_cobrar
LEFT JOIN pacientes ON pacientes.id_paciente=cuentas_cobrar.id_paciente
WHERE ingresos.id_ingreso=$id_ingreso AND ingresos.id_medico=$id_medico AND ingresos.estado=2 AND ingresos.activo=1";
$q=mysql_query($sql);
$ft=mysql_fetch_assoc($q);


?>
<style>
	.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}
</style>

	<div class="row" style="margin: 10px;">
        <div class="col-md-12">
	        <h4>A continuación liquidará la siguiente deuda:</h4>
    		<div class="invoice-title" style="text-align: right">
    			<h2>Monto: <?=number_format($ft['monto'],2)?><br><small class="text-muted" style="font-size: 16px;" >Fecha de Adeudo: <?=fechaLetra($ft['fecha_adeudo'])?></small></h2>
    		</div>
    		
    	</div>
    </div>