<?
session_start();
include('../app/includes/db.php');
include('../app/includes/funciones.php');

extract($_POST);

	if(!$email) exit("(456) Ocurrió un error, intente nuevamente.");
	if(!validarEmail($email)) exit("(354) Ocurrió un error, intente nuevamente.");
	if(!$token) exit("(827) Ocurrió un error, intente nuevamente.");
	$contrasena=contrasena($contrasena);
	$contrasena2=contrasena($contrasena2);
	if($contrasena!=$contrasena2) exit("(232) Ocurrió un error, intente nuevamente.");
	
	$email=escapar($email);
	$token=escapar($token);
	
	
	$sql="SELECT * FROM credenciales WHERE email='$email' AND token='$token' AND activo=1";
	$q=mysql_query($sql);
	$v=mysql_num_rows($q);
	if(!$v) exit("(2532) Ocurrió un error, intente nuevamente.");
	
	$sq="UPDATE credenciales SET contrasena='$contrasena' WHERE email='$email' AND token='$token' AND activo=1";
	$qu=mysql_query($sq);
	if($qu){
		echo "1";
	}else{
		exit("(986) Ocurrió un error, intente nuevamente.");
	}
	
	