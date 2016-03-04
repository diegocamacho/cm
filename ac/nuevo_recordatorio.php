<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$nv_record) exit("Debe escribir un recordatorio");

$qrecord = mysql_query("INSERT INTO recordatorios (id_medico,recordatorio,fecha_alta,fecha_limite) VALUES ('$id_medico','$nv_record','$fecha_actual','$fecha_actual')");
if($qrecord){
	$id_recordatorio = mysql_insert_id();
	$tabla = "<tr id='tr_".$id_recordatorio."'><td width='5%'><div class='checkbox custom-checkbox nm'><input type='checkbox' id='customcheckbox".$id_recordatorio."' value='1' data-toggle='selectrow' data-target='tr' data-contextual='stroke'><label for='customcheckbox".$id_recordatorio."'></label></div></td><td onclick='abrir()' style='cursor: pointer;' data-id='".$id_recordatorio."'>".$nv_record."</td><td width='8%' align='right' class='text-muted' ><small>".fechaDiaMes($fecha_actual)."</small></td></tr>";
	echo "1|".$tabla."|".$id_recordatorio."|".$fecha_actual;
}else{
	$msj = "Ocurrió un error, no se guardo el recordatorio, intente nuevamente";
	echo "0|".$msj;	
}

?>