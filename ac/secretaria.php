<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);
//Elimina
if($eliminar){
	if(!$id_secretaria) exit("No se encontro identificador de la secretaria, intente más tarde.");
	$id_secretaria=escapar($id_secretaria,1);
	if(ac_secretaria_elimina($id_secretaria)){
	    echo "3";
	}else{
	    echo "No se elimino la secretaria, por favor intente más tarde.";
	}
}else{
	//Validamos que llegue un correo
	if(!$email) exit("Debe escribir un email para la secretaria");
	if(!$id_clinica) exit("Debe seleccionar una clínica para la secretaria");
	//Validamos email
	if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");
	$id_clinica=escapar($id_clinica,1);
//Editamos
	if($id_secretaria){
		if(!$nombre) exit("Debe escribir un nombre para la secretaria");
		if(!$celular) exit("Debe escribir un celular para la secretaria");
		if(!$id_celular_compania) exit("Debe seleccionar la compañía celular de la secretaria");
		
		if(!validarTelefono($celular)) exit("El teléfono <strong>".escapar($celular)."</strong> no es válido, verifique el formato.");
		if($contrasena) $contrasena=contrasena($contrasena);
		$nombre=limpiaStr($nombre,1);
		$id_celular_compania=escapar($id_celular_compania,1);
		
		
		if(!$id_secretaria) exit("No se encontro identificador de la secretaria, intente más tarde.");	
		if(ac_secretaria_edita($id_clinica,$nombre,$email,$celular,$id_celular_compania,$contrasena,$id_secretaria)){
		    exit("2");
		}else{
		    exit("No se editaron los datos, por favor intente más tarde.");
		}
	}
	//Validamos el correo
	$q=mysql_query("SELECT * FROM credenciales WHERE email='$email' AND activo=1");
	$valida=mysql_num_rows($q);
	if($valida>0){
		$datos=mysql_fetch_assoc($q);
		$id_secretaria=$datos['id_usuario'];
		//Validamos que la cuenta este confirmada
		$datos_secretaria=mysql_fetch_assoc(mysql_query("SELECT confirmado FROM secretarias WHERE id_secretaria=$id_secretaria"));
		$confirmado=$datos_secretaria['confirmado'];
		if($confirmado>0){
			//Validamos que no este relacionado la secretaria con el medico (no me vayana chamaquear)
			$val_rel=mysql_num_rows(mysql_query("SELECT * FROM rel_secretarias_medicos WHERE id_medico=$id_medico AND id_secretaria=$id_secretaria"));
			if($val_rel>0){ 
				exit('La cuenta <strong>'.$email.'</strong> ya esta vinculada a su cuenta.');	
			}else{
				if(ac_secretaria_vincula($id_secretaria,$id_clinica)){
					echo "1";
				}else{
					echo "No se guardaron los datos, por favor intente más tarde.";
				}
			}
		}else{
			exit('No es posible agregar a esta secretaria hasta que confirme su cuenta, Intente más tarde.');
		}
	}else{
		//Se agrega
		if(!$nombre) exit("Debe escribir un nombre para la secretaria");
		if(!$celular) exit("Debe escribir un celular para la secretaria");
		if(!$id_celular_compania) exit("Debe seleccionar la compañía celular de la secretaria");
		if(!$contrasena) exit("Debe escribir una contraseña para la secretaria");
		
		if(!validarTelefono($celular)) exit("El teléfono <strong>".$celular."</strong> no es válido, verifique el formato.");
		$contrasena=contrasena($contrasena);
		$nombre=limpiaStr($nombre,1);
		$id_celular_compania=escapar($id_celular_compania,1);
		
		//Guarda
		if(ac_secretaria_alta($id_clinica,$nombre,$email,$celular,$id_celular_compania,$contrasena)){
		    echo "1";
		}else{
		    echo "No se guardaron los datos, por favor intente más tarde.";
		}
	}//Termina donde se agregan
}
