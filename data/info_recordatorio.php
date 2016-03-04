<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");

if(!$_GET['id_record']){ exit("Error de ID");}

$id_record=escapar($_GET['id_record'],1);

$query=mysql_query("SELECT * FROM recordatorios WHERE id_recordatorio=$id_record AND id_medico=$id_medico");
if($query){
	$ft=mysql_fetch_assoc($query);
	echo "1|".$ft['recordatorio']."|".$ft['fecha_limite']."|".$ft['observaciones'];
}else{
	echo "0|error";
}
