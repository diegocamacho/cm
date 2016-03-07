<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");
$email=$_GET['email'];
//Validamos email
if(validarEmail($email)==false){
    exit('5');
}
//Validamos en credenciales que exista el email
$query=mysql_query("SELECT * FROM credenciales WHERE email='$email' AND id_tipo_credencial=2 AND activo=1");
$valida=mysql_num_rows($query);
if($valida>0){
	$ft=mysql_fetch_assoc($query);
	$id_secretaria=$ft['id_usuario'];
	//consulta relación
	$sq="SELECT * FROM rel_secretarias_medicos WHERE id_medico=$id_medico AND id_secretaria=$id_secretaria";
	$q=mysql_query($sq);
	$val=mysql_num_rows($q);
	if($val>0){
		exit('3');//secretaria ya esta vinculada a la cuenta
	}else{
		$q=mysql_query("SELECT nombre,confirmado FROM secretarias WHERE id_secretaria=$id_secretaria");
		$datos=mysql_fetch_assoc($q);
		$nombre=$datos['nombre'];
		$confirmado=$datos['confirmado'];
		if($confirmado>0){
			echo "1|".$nombre;//Secretaria existe pero no esta vinculada al médico.
		}else{
			exit('4');
		}
	}
}else{	
    exit('2');//Secretaria no existe.
}
?>