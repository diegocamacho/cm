<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_GET);

if(!$id_consulta) exit("No se ha encontrado la consulta seleccionada.");
$id_consulta=escapar($id_consulta,1);

$qelimina = mysql_query("UPDATE consultas SET activo='0' WHERE id_consulta=$id_consulta AND id_medico=$id_medico");

if ($qelimina) {
	echo 1;
}else{
	echo "Ocurrió un error al eliminar la consulta. Por favor, intente más tarde.";
}
?>