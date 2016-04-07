<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_gasto) exit("Hubo un problema al recibir el número de gasto");

$qelimina = mysql_query("DELETE FROM gastos WHERE id_gasto=$id_gasto AND id_medico = $id_medico");

if ($qelimina) {
	echo 1;
}else{
	echo "Hubo un problema al eliminar el recordatorio. Por favor, intente más tarde.";
}
?>