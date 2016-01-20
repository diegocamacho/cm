<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);
/********************* Validacion de valores ************************/
if(!$contrasena) exit("3");
if(!$nueva_contrasena) exit("4");
if(!$verifica_contrasena) exit("5");

/********************* Conversiones ************************/
$contrasena=contrasena($contrasena);
$nueva_contrasena=contrasena($nueva_contrasena);
$verifica_contrasena=contrasena($verifica_contrasena);

/********************* Validaciones ************************/
$sql="SELECT contrasena FROM credenciales WHERE id_usuario=$id_medico AND id_tipo_credencial=1";
$q=@mysql_query($sql);
$datos=@mysql_fetch_assoc($q);
$old_pass=$datos['contrasena'];
if($old_pass==$contrasena){
	//Validamos las dos contraseñas
	if($nueva_contrasena!=$verifica_contrasena) exit("2");
	/********************* Mandamos la mágia ************************/
	if(ac_mi_cuenta_pass($nueva_contrasena)){
		echo "La contraseña se ha actualizado.";
	}else{
		echo "No se actualizaron los datos, por favor intente más tarde.";
	}	
}else{
	exit("1");
}
?>