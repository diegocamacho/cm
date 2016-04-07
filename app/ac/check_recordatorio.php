<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_record) exit("No se localizo el número de recordatorio");

$q = mysql_query("UPDATE recordatorios SET checa='$tipo' WHERE id_recordatorio=$id_record AND id_medico=$id_medico");
if ($q) {
	echo "1";
}else{
	echo "Hubo un problema al actualizar su recordatorio. Por favor, intente más tarde.";
}
?>