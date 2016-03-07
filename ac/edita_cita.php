<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_agenda) exit("Ocurrió un error al reconocer la cita, la cita no se ha editado, por favor intente nuevamente.");
//if(!$id_clinica) exit("Debe selcionar una clínica");
if(!$fecha) exit("Debe seleccionar una fecha para la cita");
if(!$hora) exit("Debe seleccionar una hora para la cita");

$fecha=fechaBase($fecha);

$sql="UPDATE agenda SET fecha='$fecha', hora='$hora' WHERE id_agenda='$id_agenda'";
$q=mysql_query($sql);
if($q){
	echo "1";
}else{
	echo "Ocurrió un error, no se guardo la cita, intente nuevamente";
}
?>