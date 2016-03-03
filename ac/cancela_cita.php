<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_agenda) exit("Ocurrió un error, no se identifico la cita, por favor vuelva a intentar");
$id_agenda=escapar($id_agenda,1);

$sql="UPDATE agenda SET activo=0 WHERE id_agenda=$id_agenda";
$q=mysql_query($sql);
if($q){
	echo "1";
}else{
	exit("Ocurrió un error, la cita no se ha cancelado, por favor vuelva a intentar");
}
?>