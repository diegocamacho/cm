<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_GET);

if(!$id_ingreso) exit("No se ha encontrado el ingreso seleccionada.");
$id_ingreso=escapar($id_ingreso,1);

$qelimina = mysql_query("UPDATE ingresos SET activo='0' WHERE id_ingreso=$id_ingreso AND id_medico=$id_medico");

if ($qelimina) {
	echo 1;
}else{
	echo "Ocurrió un error al eliminar la consulta. Por favor, intente más tarde.";
}
?>