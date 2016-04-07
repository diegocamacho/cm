<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
extract($_GET);
if(!$id_paciente) exit("Ocurrió un error, no se identifico al paciente, intente más tarde.");
$id_paciente=escapar($id_paciente,1);

if(!$id_ingreso) exit("No se ha encontrado el ingreso seleccionada.");
$id_ingreso=escapar($id_ingreso,1);

if(!validaPaciente($id_paciente)) exit("Ocurrió un error, no se encontro al paciente seleccionado.");

$sql="INSERT INTO cuentas_cobrar (id_paciente,fecha_adeudo)VALUES('$id_paciente','$fecha_actual')";
$q=mysql_query($sql);
$id_cuentas_cobrar=mysql_insert_id();

if($id_cuentas_cobrar){
	$qelimina = mysql_query("UPDATE ingresos SET id_cuentas_cobrar='$id_cuentas_cobrar', estado='2' WHERE id_ingreso=$id_ingreso AND id_medico=$id_medico");
	if ($qelimina) {
		echo 1;
	}else{
		echo "Ocurrió un error al eliminar la consulta. Por favor, intente más tarde.";
	}
}else{
	exit("Ocurrió un error. Por favor, intente más tarde.");
}
?>