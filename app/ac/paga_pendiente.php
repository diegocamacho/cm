<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
extract($_GET);

if(!$id_ingreso) exit("No se ha encontrado el ingreso seleccionada.");
$id_ingreso=escapar($id_ingreso,1);

//if(!validaPaciente($id_paciente)) exit("Ocurrió un error, no se encontro al paciente seleccionado.");

$sql="SELECT * FROM ingresos 
LEFT JOIN cuentas_cobrar ON cuentas_cobrar.id_cuentas_cobrar=ingresos.id_cuentas_cobrar
WHERE ingresos.activo='1' AND ingresos.id_ingreso=$id_ingreso AND ingresos.id_medico=$id_medico";
$q=mysql_query($sql);
$ft=mysql_fetch_assoc($q);
$id_cuentas_cobrar=$ft['id_cuentas_cobrar'];
$id_paciente=$ft['id_paciente'];

if(!validaPaciente($id_paciente)) exit("Ocurrió un error, no se encontro al paciente seleccionado.");

mysql_query('BEGIN');

	$sq1=@mysql_query("UPDATE cuentas_cobrar SET fecha_pago='$fecha_actual' WHERE id_cuentas_cobrar=$id_cuentas_cobrar");
	if(!$sq1) $error=true;
	
	$sq2=@mysql_query("UPDATE ingresos SET estado=1 WHERE id_ingreso=$id_ingreso AND id_medico=$id_medico");
	if(!$sq2) $error=true;

	if($error){
		mysql_query('ROLLBACK');
		exit("Ocurrió un error, intente más tarde.");
	}else{
		mysql_query('COMMIT');
		echo "1";
	}
?>