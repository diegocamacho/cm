<?
session_start();
include('../app/includes/db.php');
include('../app/includes/funciones.php');

extract($_POST);

	if(!$email) exit("Es necesario que escriba su dirección de E-mail.");
	if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");
	
	$sq="SELECT credenciales.*,medicos.* FROM credenciales 
	JOIN medicos ON medicos.id_medico=credenciales.id_usuario
	WHERE email='$email' AND credenciales.activo=1";
	$q=mysql_query($sq);
	$val=mysql_num_rows($q);
	if($val){
		$ft=mysql_fetch_assoc($q);
		$nombre=$ft['nombre'];
		$id_credencial=$ft['id_credencial'];
		$token=md5($id_credencial);
		//update token
		$sql="UPDATE credenciales SET token='$token' WHERE id_credencial=$id_credencial";
		$q=mysql_query($sql) or exit("Ocurrió un error, intenta nuevamente2.");
		
		$msg="Hola ".$nombre." haz solicitado que te enviemos tu contraseña de acceso a <b>Promedica</b>.<br>Recuerda que tu nombre de usuario es tu cuenta de correo: ".$email." <br> Por motivos de seguridad no es posible enviar tu contraseña actual, pero puedes restablecerla haciendo click en el siguiente vinculo <a href='http://promedica.mx/recupera.php?m=".$email."&token=".$token."'>http://promedica.mx/index.php?Seccion=Recovery&m=".$email."&token=".$token."</a> <br><br>Si no solicitaste restablecer tu contraseña haz caso omiso a este correo.<br><br><b>Recuerda en Promedita tu eres lo más importante</b><br>";
		
		if(recuperaContrasena($email,$msg)){
			echo "1";	
		}else{
			exit("Ocurrió un error, intenta nuevamente.");
		}
		
	}else{
		exit("El correo <strong>".escapar($email)."</strong> no existe en nuestros registros, puedes usarlo para crear una cuenta.");
	}