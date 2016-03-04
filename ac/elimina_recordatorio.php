<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_record) exit("Hubo un problema al recibir el número de recordatorio");

$qelimina = mysql_query("DELETE FROM recordatorios WHERE id_recordatorio=$id_record AND id_medico = $id_medico");

if ($qelimina) {
	echo 1;
}else{
	echo "Hubo un problema al eliminar el recordatorio. Intente de nuevo más tarde.";
}
?>