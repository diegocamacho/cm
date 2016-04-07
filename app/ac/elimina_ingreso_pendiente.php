<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_GET);
if(!$id_ingreso) exit("No se ha encontrado el ingreso seleccionada.");
$id_ingreso=escapar($id_ingreso,1);

$sql="SELECT id_cuentas_cobrar FROM ingresos WHERE activo='1' AND id_ingreso=$id_ingreso AND id_medico=$id_medico";
$q=mysql_query($sql);
$ft=mysql_fetch_assoc($q);
$id_cuentas_cobrar=$ft['id_cuentas_cobrar'];


mysql_query('BEGIN');

	$sq1=@mysql_query("DELETE FROM cuentas_cobrar WHERE id_cuentas_cobrar=$id_cuentas_cobrar");
	if(!$sq1) $error=true;
	
	$sq2=@mysql_query("UPDATE ingresos SET activo=0 WHERE id_ingreso=$id_ingreso AND id_medico=$id_medico");
	if(!$sq2) $error=true;

	if($error){
		mysql_query('ROLLBACK');
		exit("Ocurrió un error, intente más tarde.");
	}else{
		mysql_query('COMMIT');
		echo "1";
	}
?>