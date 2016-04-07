<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");
$id_clinica=escapar($_GET['id_clinica'],1);

$sql="SELECT clinica FROM clinicas WHERE id_clinica=$id_clinica";
$query=mysql_query($sql);
$ft=mysql_fetch_assoc($query);

echo $ft['clinica'];
?>