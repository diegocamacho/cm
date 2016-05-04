<?
session_start();
include('../app/includes/db.php');
include('../app/includes/funciones.php');

extract($_POST);

	if(!$nombre) exit("Es necesario que escriba su nombre.");
	if(!$email) exit("Es necesario que escriba su dirección de E-mail.");
	if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");
	if(!$telefono) exit("Es necesario que escriba su número de teléfono.");
	if(!validarTelefono($telefono)) exit("El teléfono <strong>".escapar($celular)."</strong> no es válido, verifique el formato.");
	//if(!$id_celular_compania) exit("Es necesario que seleccione su proveedor.");
	//if(!$id_estado) exit("Es necesario que seleccione el estado donde radica.");
	if(!$ciudad) exit("Es necesario que escriba la ciudad en donde radica.");
	if(!$contrasena) exit("Es necesario que escriba una contraseña.");
	if(!$condiciones) exit("Es necesario que acepte los <b>Terminos y Condiciones</b> del servicio.");
	//if(!$politicas) exit("Es necesario que marque de enterado en la casilla de <b>Politica de privacidad</b>");
	$nombre=limpiaStr($nombre,1);
	//$id_celular_compania=escapar($id_celular_compania,1);
	//$id_estado=escapar($id_estado,1);
	$ciudad=limpiaStr($ciudad,1);
	$contrasena=contrasena($contrasena);
	//if($condiciones) $condiciones=1;
	//if($politicas) $politicas=1;
	
	$sq="SELECT * FROM credenciales WHERE email='$email' AND activo=1";
	$q=mysql_query($sq);
	$val=mysql_num_rows($q);
	if($val){
		exit("El correo <strong>".escapar($email)."</strong> ya se ha registrado. <br><a href='javascript:;' onclick='javascript:recupertaContrasena();'>¿Olvido su contraseña?</a>.");
	}
	
	mysql_query('BEGIN');
	
	$sql1="INSERT INTO medicos (nombre,celular,ciudad,fecha_alta)VALUES('$nombre','$telefono','$ciudad','$fechahora')";
	$sq1=mysql_query($sql1) or $error=true;
	$id_medico=mysql_insert_id();
	
	$sql2="INSERT INTO credenciales (id_usuario,id_tipo_credencial,email,contrasena)VALUES('$id_medico','1','$email','$contrasena')";
	$sq2=mysql_query($sql2) or $error=true;
	
	$sql3="INSERT INTO alertas (id_medico)VALUES('$id_medico')";
	$sq3=mysql_query($sql3) or $error=true;
	
	if($error){
		mysql_query('ROLLBACK');
		//sapo($nombre,$email,$telefono);
		exit("Ocurrió un error, por favor intente más tarde.");
	}else{
		mysql_query('COMMIT');
		
		//Hacemos el Login
		$sql = "SELECT * FROM credenciales WHERE email='$email' AND contrasena='$contrasena' AND activo='1' LIMIT 1";
		$res = mysql_query($sql) or die ('Error en db');
		$num_result = mysql_num_rows($res);
		if($num_result != 0){
			while ($row=mysql_fetch_object($res))
				{
					$_SESSION['s_id_credencial'] = $row->id_credencial;
					$_SESSION['s_id_usuario'] = $row->id_usuario;
					$_SESSION['s_id_tipo_credencial'] = $row->id_tipo_credencial;
				}
			if(mysql_query("UPDATE credenciales SET ultimo_acceso='$fechahora' WHERE id_credencial='".$_SESSION['s_id_credencial']."'")){
				echo "1";
			}
		}else{
			exit('Datos de acceso incorrectos, por favor intente nuevamente.');
		}
	}