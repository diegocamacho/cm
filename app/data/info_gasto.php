<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");

if(!$_GET['id_gasto']){ exit("Error de ID");}

$id_gasto=escapar($_GET['id_gasto'],1);

$query=mysql_query("SELECT * FROM gastos WHERE id_gasto=$id_gasto AND id_medico=$id_medico");
if($query){
	$ft=mysql_fetch_assoc($query);
	echo "1|".$ft['id_cat_gastos']."|".$ft['monto']."|".$ft['fecha']."|".$ft['descripcion']."|".$ft['facturado']."|".$ft['pdf_archivo']."|".$ft['xml_archivo']."|".$ft['id_clinica'];
}else{
	echo "0|No se pudo localizar el gasto seleccionado.";
}
