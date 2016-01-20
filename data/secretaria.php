<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");

if(!$_GET['id_secretaria']){ exit("Error de ID");}

$id_secretaria=escapar($_GET['id_secretaria'],1);

$sql="SELECT secretarias.*, credenciales.email FROM secretarias 
JOIN credenciales ON credenciales.id_usuario=secretarias.id_secretaria
WHERE id_secretaria=$id_secretaria";
$query=mysql_query($sql);
$ft=mysql_fetch_assoc($query);
if($ft['confirmado']==0){
	echo $ft['id_clinica']."|".$ft['nombre']."|".$ft['email']."|".$ft['celular']."|".$ft['id_celular_compania'];
}else{
	echo "error";
}
