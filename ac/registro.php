<?
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
	if($condiciones) $condiciones=1;
	//if($politicas) $politicas=1;
	
	$sq="SELECT * FROM credenciales WHERE email='$email'";
	$q=mysql_query($sq);
	$val=mysql_num_rows($q);
	if($val){
		exit("El correo <strong>".escapar($email)."</strong> ya se ha registrado. <br><a href=''>¿Olvido su contraseña?</a>.");
	}
	
	mysql_query('BEGIN');
	
	$sql1="INSERT INTO medicos (nombre,celular,ciudad,fecha_alta)VALUES('$nombre','$telefono','$ciudad','$fechahora')";
	$sq1=@mysql_query($sql1);
	if(!$sq1) $error=true;
	$id_medico=mysql_insert_id();
	
	$sql2="INSERT INTO credenciales (id_usuario,id_tipo_credencial,email,contrasena)VALUES('$id_medico','1','$email','$contrasena')";
	$sq2=@mysql_query($sql2);
	if(!$sq2) $error=true;
	
	if($error){
		mysql_query('ROLLBACK');
		//sapo($nombre,$email,$telefono);
		exit("Ocurrió un error, por favor intente más tarde.");
	}else{
		mysql_query('COMMIT');
		echo "1";
	}