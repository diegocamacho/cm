<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");
$id_aseguradora=escapar($_GET['id_aseguradora'],1);

$sql="SELECT nombre_aseguradora FROM aseguradoras WHERE id_aseguradora=$id_aseguradora";
$query=mysql_query($sql);
$ft=mysql_fetch_assoc($query);

echo $ft['nombre_aseguradora'];
?>