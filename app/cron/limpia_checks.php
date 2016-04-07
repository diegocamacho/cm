<?
/*///// ATENCION /////
EL SIGUIENTE CODIGO SE ENCARGA DE LIMPIAR LA BASE DE DATOS DE TODOS AQUELLOS RECORDATORIOS
QUE YA HAYAN SIDO CHECKEADOS Y CUYA FECHA SEA MAYOR A AYER DE TAL FORMA QUE NO SE SOBRECARGUE 
LA BASE Y LOS DOCTORES NO TENGAN QUE BORRAR MANUALMENTE ESOS CHECKS.
///// ATENCION //////*/

include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

$ayer = date('Y-m-d',strtotime("yesterday"));

$qelimina = mysql_query("DELETE FROM recordatorios WHERE checa=1 AND fecha_alta < '$ayer'");

if ($qelimina) {
	echo 1;
}else{
	echo "Hubo un problema al limpiar los recordatorios con checks. Por favor, intente más tarde.";
}
?>