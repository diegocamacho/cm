<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_paciente) exit("Ocurrió un error, no se encontro al paciente seleccionado.");
$id_paciente=escapar($id_paciente,1);

if(!validaPaciente($id_paciente)) exit("Ocurrió un error, no se encontro al paciente seleccionado.");

$q=mysql_query("UPDATE pacientes SET activo='$tipo' WHERE id_paciente=$id_paciente AND id_medico = $id_medico");

if($q){
	echo 1;
}else{
	echo "Ocurrió un error al eliminar el paciente, por favor vuelva a intentar.";
}
?>