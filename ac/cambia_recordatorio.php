<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_record) exit("No se localizo el número de recordatorio");
if(!$record) exit("Debe escribir su recordatorio");
if(!$limit) exit("Debe seleccionar una fecha limite");

$limit = explode("/", $limit);
$limit = $limit[2]."-".$limit[0]."-".$limit[1];

if($alerta){
	$alerta = explode("/", $alerta);
	$alerta = $alerta[2]."-".$alerta[0]."-".$alerta[1];
	$hora_alerta = horaOficial($hora_alerta);
	$fecha_hora_alarma = $alerta." ".$hora_alerta;
}

$q = mysql_query("UPDATE recordatorios SET recordatorio='$record', fecha_limite='$limit',fecha_hora_alerta_sms='$fecha_hora_alarma' WHERE id_recordatorio=$id_record AND id_medico=$id_medico");
if ($q) {
	echo "1";
}else{
	echo "Hubo un problema al actualizar su recordatorio. Por favor, intente más tarde.";
}
?>