<?
//Utilerias
date_default_timezone_set("America/Mexico_City");
$fechahora=date("Y-m-d H:i:s");
$fecha_actual=date("Y-m-d");
$hora_actual=date("H:i");
function nombreMedico($id){
	
	global $conexion;
	global $s_id_usuario;
	global $fechahora;
	
	$sql="SELECT nombre FROM medicos WHERE id_medico=$id";
	$query=@mysql_query($sql);
	if($query){ 
		$ft=mysql_fetch_assoc($query);
		return $ft['nombre'];
	}else{ 
		return "N/A"; 
	}
}

/*------------------------------------- Módulos ---------------------------------*/
//Ingresos
function ac_ingresos($monto,$fecha,$descripcion){
	
	global $conexion;
	global $s_id_usuario;
	global $fechahora;
	
	$sql="INSERT INTO ingresos (id_medico,estado,id_tipo_ingreso,id_tipo_cobro,monto,anotacion,fecha_hora_captura,fecha_hora_pago) VALUES ('$s_id_usuario','1','2','1','$monto','$descripcion','$fechahora','$fecha')";
	$query=@mysql_query($sql);
	if($query){ return true; }else{ return false; }
	
}
/*------------------------------- Configuración ---------------------------------*/
//Mi cuenta alertas
function ac_mi_cuenta_alertas($agenda,$resumen_inicial,$resumen_final,$facturacion_1,$facturacion_2){
	
	global $conexion;
	global $s_id_usuario;
	
	//Actualizamos contraseña
	$sql="UPDATE alertas SET agenda='$agenda', resumen_inicial='$resumen_inicial', resumen_final='$resumen_final', facturacion_1='$facturacion_1', facturacion_2='$facturacion_2' WHERE id_medico=$s_id_usuario";
	$query=@mysql_query($sql);
	if($query){ return true; }else{ return false; }
}
//Mi cuenta contraseñas
function ac_mi_cuenta_pass($nueva_contrasena){
	
	global $conexion;
	global $s_id_usuario;
	
	//Actualizamos contraseña
	$sql="UPDATE credenciales SET contrasena='$nueva_contrasena' WHERE id_usuario=$s_id_usuario AND id_tipo_credencial=1";
	$query=@mysql_query($sql);
	if($query){ return true; }else{ return false; }
}
//Mi cuenta perfil
function ac_mi_cuenta_perfil($nombre,$cedula,$sexo,$email,$celular,$id_celular_compania,$fecha_nacimiento,$id_estado,$ciudad){
	
	global $conexion;
	global $s_id_usuario;
	
	//Validamos el estado
	$valida=mysql_num_rows(mysql_query("SELECT * FROM estados WHERE id_estado=$id_estado"));
	if($valida==0) exit("No existe el estado que intentas usar.");
	//Validamos que exista la compania teléfonica
	$valida=mysql_num_rows(mysql_query("SELECT * FROM celular_compania WHERE id_celular_compania='$id_celular_compania'"));
	if($valida==0) exit("No existe la compañía de celular.");
	//Updateamos
	mysql_query('BEGIN');
	
	$sq1=@mysql_query("UPDATE medicos SET nombre='$nombre',cedula='$cedula',sexo='$sexo',celular='$celular',id_celular_compania='$id_celular_compania',fecha_nacimiento='$fecha_nacimiento',id_estado='$id_estado',ciudad='$ciudad' WHERE id_medico=$s_id_usuario");
	if(!$sq1) $error = true;
	
	$sq2=@mysql_query("UPDATE credenciales SET email='$email' WHERE id_usuario=$s_id_usuario AND id_tipo_credencial=1");
	if(!$sq2) $error = true;
	
	if($error){
	    mysql_query('ROLLBACK');
	    return false;
	}else{
	    mysql_query('COMMIT');
	    return true;
	}

	
}
//Datos de facturación
function ac_facturacion($rfc,$nombre,$calle,$ext,$interior,$cp,$colonia,$localidad,$mpio,$id_estado){
	
	global $conexion;
	global $s_id_usuario;
	
	//Validamos el estado
	$valida=mysql_num_rows(mysql_query("SELECT * FROM estados WHERE id_estado=$id_estado"));
	if($valida==0) exit("No existe el estado que intentas usar.");
	//consultamos si el doc tiene registro
	$valida=mysql_num_rows(mysql_query("SELECT * FROM informacion_fiscal WHERE id_medico=$s_id_usuario"));
	if($valida==0){
		//Creamos el registro
		$sql="INSERT INTO informacion_fiscal (id_medico,rfc,nombre,calle,ext,interior,cp,colonia,localidad,mpio,id_estado) VALUES ('$s_id_usuario','$rfc','$nombre','$calle','$ext','$interior','$cp','$colonia','$localidad','$mpio','$id_estado')";
		$query=@mysql_query($sql);
		if($query){ return true; }else{ return false; }
	}else{
		//Updateamos el registro
		$sql="UPDATE informacion_fiscal SET rfc='$rfc',nombre='$nombre',calle='$calle',ext='$ext',interior='$interior',cp='$cp',colonia='$colonia',localidad='$localidad',mpio='$mpio',id_estado='$id_estado' WHERE id_medico=$s_id_usuario";
		$query=@mysql_query($sql);
		if($query){ return true; }else{ return false; }
	}
}
//Clinicas
function ac_clinica($nombre,$id_clinica=false,$elimina=false){

	global $conexion;
	global $s_id_usuario;
	
	//Elimina
	if($elimina){
		$valida=mysql_num_rows(mysql_query("SELECT * FROM clinicas WHERE id_medico='$s_id_usuario' AND activo=1"));
		if($valida==1) exit("Debe tener como mínimo una clínica.");
		
		$sql="UPDATE clinicas SET activo='0' WHERE id_clinica=$id_clinica";
		$ultimo=@mysql_query($sql);
	}else{
		//Validamos el límite de clínicas
		$valida=mysql_num_rows(mysql_query("SELECT * FROM clinicas WHERE id_medico='$s_id_usuario' AND activo=1"));
		if($valida>30) exit("Haz alcanzado el límite máximo de clínicas, contacta a soporte.");
	
		if($id_clinica){
			//Edita Clinica
			$sql="UPDATE clinicas SET clinica='$nombre' WHERE id_clinica=$id_clinica";
			$ultimo=@mysql_query($sql);
		}else{
			//Nueva Clinica
			$sql="INSERT INTO clinicas (id_medico,clinica) VALUES ('$s_id_usuario','$nombre')";
			$query=@mysql_query($sql);
			$ultimo=@mysql_insert_id();
			
		}
	}
	if($ultimo){
		return true;
	}else{
		return false;
	}
}

//Aseguradoras
function ac_aseguradora($nombre,$id_aseguradora=false,$elimina=false){

	global $conexion;
	global $s_id_usuario;
	
	//Elimina
	if($elimina){
		$sql="UPDATE aseguradoras SET activo='0' WHERE id_aseguradora=$id_aseguradora";
		$ultimo=@mysql_query($sql);
	}else{
		//Validamos el límite de clínicas
		$valida=@mysql_num_rows(mysql_query("SELECT * FROM aseguradoras WHERE id_medico='$s_id_usuario' AND activo=1"));
		if($valida>50) exit("Haz alcanzado el límite máximo de aseguradoras, contacta a soporte.");
		
		if($id_aseguradora){
			//Edita Clinica
			$sql="UPDATE aseguradoras SET nombre_aseguradora='$nombre' WHERE id_aseguradora=$id_aseguradora";
			$ultimo=@mysql_query($sql);
		}else{
			//Nueva Clinica
			$sql="INSERT INTO aseguradoras (id_medico,nombre_aseguradora) VALUES ('$s_id_usuario','$nombre')";
			$query=@mysql_query($sql);
			$ultimo=@mysql_insert_id();
			
		}
	}
	if($ultimo){
		return true;
	}else{
		return false;
	}
}

//Citas
function nuevaCita($id_secretaria,$id_clinica,$id_paciente,$fecha,$hora,$anotacion){

	global $conexion;
	global $s_id_usuario;
	global $id_medico;

	$sql="INSERT INTO agenda (id_medico,id_secretaria,id_clinica,id_paciente,fecha,hora,anotacion) VALUES ('$id_medico','$id_secretaria','$id_clinica','$id_paciente','$fecha','$hora','$anotacion')";
	$query=@mysql_query($sql);
	$ultimo=@mysql_insert_id();
			
	if($ultimo){
		return true;
	}else{
		return false;
	}
}

//Secretarias *Vincula
function ac_secretaria_vincula($id_secretaria,$id_clinica){
	global $conexion;
	global $s_id_usuario;
	
	$sql="INSERT INTO rel_secretarias_medicos (id_medico,id_secretaria,id_clinica) VALUES ('$s_id_usuario','$id_secretaria','$id_clinica')";
	$ultimo=@mysql_query($sql);
	
	if($ultimo){
		return true;
	}else{
		return false;
	}
}
//Secretarias *Elimina
function ac_secretaria_elimina($id_secretaria){
	global $conexion;
	global $s_id_usuario;

	$valida=mysql_num_rows(mysql_query("SELECT * FROM rel_secretarias_medicos WHERE id_secretaria=$id_secretaria AND id_medico=$s_id_usuario"));
	if($valida>0){
		
		$valida=mysql_fetch_assoc(mysql_query("SELECT confirmado FROM secretarias WHERE id_secretaria=$id_secretaria"));
		if($valida['confirmado']>0){
			//Validar que la secretaria este confirmada
			
				$sq1=@mysql_query("DELETE FROM rel_secretarias_medicos WHERE id_secretaria=$id_secretaria AND id_medico=$s_id_usuario");
				if($sq1) return true;
			
		}else{
			//No esta confirmada voy a borrar el registro
			mysql_query('BEGIN');
			
			$sq1=@mysql_query("DELETE FROM rel_secretarias_medicos WHERE id_secretaria=$id_secretaria AND id_medico=$s_id_usuario");
			if(!$sq1) $error = true;
			
			$sq2=@mysql_query("DELETE FROM credenciales WHERE id_usuario=$id_secretaria AND id_tipo_credencial=2");
			if(!$sq2) $error = true;
			
			$sq3=@mysql_query("DELETE FROM secretarias WHERE id_secretaria=$id_secretaria");
			if(!$sq3) $error = true;
			
				if($error){
					mysql_query('ROLLBACK');
					return false;
				}else{
					mysql_query('COMMIT');
					return true;
				}
			
		}
	}else{
		exit("No puedes eliminar una secretaria que no tienes vinculada.");
	}
	
}
//Secretarias *Alta de nueva secretaria
function ac_secretaria_alta($id_clinica,$nombre,$email,$celular,$id_celular_compania,$contrasena){
	global $conexion;
	global $s_id_usuario;
	global $fechahora;
	
	//Validamos el límite de secretarias
	$valida=mysql_num_rows(mysql_query("SELECT * FROM rel_secretarias_medicos WHERE id_medico='$s_id_usuario'"));
	if($valida>30) exit("Haz alcanzado el límite máximo de secretarias, contacta a soporte.");
	//Validamos la clínica
	$valida=mysql_num_rows(mysql_query("SELECT * FROM clinicas WHERE id_clinica='$id_clinica' AND activo=1"));
	if($valida==0) exit("La clínica que intentas usar no te pertenece.");
	//Validamos que exista la compania teléfonica
	$valida=mysql_num_rows(mysql_query("SELECT * FROM celular_compania WHERE id_celular_compania='$id_celular_compania'"));
	if($valida==0) exit("No existe la compañía de celular.");
	//Guardamos datos de la secretaria
	$sql="INSERT INTO secretarias (nombre,celular,id_celular_compania,fecha_alta) VALUES ('$nombre','$celular','$id_celular_compania','$fechahora')";
	$query=@mysql_query($sql);
	$id_secretaria=@mysql_insert_id();
	//Creamos credencial de la secretaria
	if($id_secretaria){
	    $sql="INSERT INTO credenciales (id_usuario,id_tipo_credencial,email,contrasena) VALUES ('$id_secretaria','2','$email','$contrasena')";
	    $query=@mysql_query($sql);
	    $id_credencial=@mysql_insert_id();
	    if($id_credencial){
	    	$sql="INSERT INTO rel_secretarias_medicos (id_medico,id_secretaria,id_clinica) VALUES ('$s_id_usuario','$id_secretaria','$id_clinica')";
	    	$ultimo=@mysql_query($sql);
	    }else{
	    	echo "No se concedió el acceso para esta secretaria, intente más tarde.";
	    }
	}else{
	    exit("La secretaria no se vinculo a su cuenta, intente más tarde.");
	}
	
	//Devolvemos resultado
	if($ultimo){
		return true;
	}else{
		return false;
	}
}
function ac_secretaria_edita($id_clinica,$nombre,$email,$celular,$id_celular_compania,$contrasena,$id_secretaria){

	global $conexion;
	global $s_id_usuario;
	
	//Validamos el límite de secretarias
	$valida=mysql_num_rows(mysql_query("SELECT * FROM rel_secretarias_medicos WHERE id_medico='$s_id_usuario'"));
	if($valida>30) exit("Haz alcanzado el límite máximo de secretarias, contacta a soporte.");
	//Validamos la clínica
	$valida=mysql_num_rows(mysql_query("SELECT * FROM clinicas WHERE id_clinica='$id_clinica' AND activo=1"));
	if($valida==0) exit("La clínica que intentas usar no te pertenece.");
	//Validamos que exista la compania
	$valida=mysql_num_rows(mysql_query("SELECT * FROM celular_compania WHERE id_celular_compania='$id_celular_compania'"));
	if($valida==0) exit("No existe la compañía de celular.");	
	//Validamos que no este activa
	$valida=mysql_fetch_assoc(mysql_query("SELECT confirmado FROM secretarias WHERE id_secretaria=$id_secretaria"));
	if($valida['confirmado']>0) exit("Esta secretaria no se puede editar, la cuenta esta en uso.");
	//Validamos el correo
	$q=mysql_query("SELECT * FROM credenciales WHERE email='$email' AND id_usuario != $id_secretaria AND id_tipo_credencial=2");
	$valida=mysql_num_rows($q);
	if($valida>0) exit("El correo ya esta en uso.");
	//Validamos que exista una relación medico secretaria
	$q=mysql_query("SELECT * FROM rel_secretarias_medicos WHERE id_medico=$s_id_usuario AND id_secretaria=$id_secretaria");
	$valida=mysql_num_rows($q);
	if($valida>0){
		if($contrasena)$act=",contrasena='$contrasena'";
		mysql_query('BEGIN');
		
		$sq1=@mysql_query("UPDATE secretarias SET nombre='$nombre', celular='$celular', id_celular_compania='$id_celular_compania' WHERE id_secretaria=$id_secretaria");
		if(!$sq1) $error=true;
		$sq2=@mysql_query("UPDATE credenciales SET email='$email' ".$act." WHERE id_usuario=$id_secretaria AND id_tipo_credencial=2");
		if(!$sq2) $error=true;
		$sq3=@mysql_query("UPDATE rel_secretarias_medicos SET id_clinica='$id_clinica' WHERE id_secretaria=$id_secretaria AND id_medico=$s_id_usuario");
		if(!$sq3) $error=true;
		
			if($error){
				mysql_query('ROLLBACK');
				return false;
			}else{
				mysql_query('COMMIT');
				return true;
			}
			
	}else{
		exit("No existe una relación con la secretaria");
	}
}
//Validar cédula
function validaCedula($cedula){
	if( (is_numeric($cedula)) && (strlen($cedula)==10) ){
		return true;
	}else{
		return false;
	}

}
//Valida cadena de fecha
function validaStrFecha($fecha,$ano=false){
	if(!$ano){
		if( (is_numeric($fecha)) && (strlen((string)$fecha)==2) ){
			return true;
		}else{
			return false;
		}
	}else{
		if( (is_numeric($fecha)) && (strlen((string)$fecha)==4) ){
			return true;
		}else{
			return false;
		}
	}
}
//Encripta contraseña
function contrasena($contrasena){
	return md5($contrasena);
}
//Valida código postal
function validarCP($cp){
	if( (is_numeric($cp)) && (strlen($cp)==5) ){
		return true;
	}else{
		return false;
	}
}
//Valida teléfono
function validarTelefono($telefono){
	if( (is_numeric($telefono)) && (strlen($telefono)==10) ){
		return true;
	}else{
		return false;
	}
}
//Validar email
function validarEmail($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}
//Formatear cadenas
function limpiaStr($v,$base=false,$m=false){
 if($m){
 	$v =  mb_convert_case($v, MB_CASE_UPPER, "UTF-8");
 }else{
	$v =  mb_convert_case($v, MB_CASE_TITLE, "UTF-8"); 
 }
 if($base){
	 $v = mysql_real_escape_string(strip_tags($v));
 }
 return  $v;
}
//Funcion para escapar
function escapar($cadena,$numerico=false){
	if($numerico){
		if(is_numeric($cadena)){
			return mysql_real_escape_string($cadena);
		}else{
			return false;
		}
	}else{
		return mysql_real_escape_string(strip_tags($cadena));
	}
}
//Comprobamos una cadena de texto para un nombre
function comprobarNombre($nombre){ 
	if(ereg("^[a-zA-Z0-9\-_]{3,20}$+", $nombre)) { 
	   return true; 
   	}else{ 
	   	return false; 
   	} 
}
//Fecha para base de datos
function fechaBase($fecha){ 
	list($mes,$dia,$anio)=explode("/",$fecha); 

	$dia=(string)(int)$dia;
	return $anio."-".$mes."-".$dia;
}
//Para mostrar fecha
function fechaSinHora($fecha){
	return $fecha=substr($fecha,0,11);
}
//Fecha sin hora
function fechaLetra($fecha){
    
	list($anio,$mes,$dia)=explode("-",$fecha); 
	switch($mes){
	case 1:
	$mest="Ene";
	break;
	case 2:
	$mest="Feb";
	break;
	case 3:
	$mest="Mar";
	break;
	case 4:
	$mest="Abr";
	break;
	case 5:
	$mest="May";
	break;
	case 6:
	$mest="Jun";
	break;
	case 7:
	$mest="Jul";
	break;
	case 8:
	$mest="Ago";
	break;
	case 9:
	$mest="Sep";
	break;
	case 10:
	$mest="Oct";
	break;
	case 11:
	$mest="Nov";
	break;
	case 12:
	$mest="Dic";
	break;
	
	}
	$dia=(string)(int)$dia;
	return $dia." ".$mest." ".$anio;
}
//Obtener el mes
function soloMes($mes){
    
	switch($mes){
	case 1:
	$mest="Enero";
	break;
	case 2:
	$mest="Febrero";
	break;
	case 3:
	$mest="Marzo";
	break;
	case 4:
	$mest="Abril";
	break;
	case 5:
	$mest="Mayo";
	break;
	case 6:
	$mest="Junio";
	break;
	case 7:
	$mest="Julio";
	break;
	case 8:
	$mest="Agosto";
	break;
	case 9:
	$mest="Septiembre";
	break;
	case 10:
	$mest="Octubre";
	break;
	case 11:
	$mest="Noviembre";
	break;
	case 12:
	$mest="Diciembre";
	break;
	
	}
	return $mest;
}
function formatoHora($hora){
    return date('h:i A',strtotime($hora));
}
function fnum($num,$sinDecimales = false, $sinNumberFormat = false){

//SinDecimales = TRUE: envias: 1500.1234 devuelve: 1,500
//SinNumberFormat = TRUE: envias 1500.1234 devuelve 1500.12
//SinNumberFormat = TRUE && SinDecimales = TRUE: envias: 1500.1234 devuelve 1500

	if(is_numeric($num)){
		$roto = explode('.',$num);
		if($roto[1]){
			$dec = substr($roto[1],0,2);
		}else{
			$dec = "00";
		}

		if(is_numeric($roto[0])){
			if($sinDecimales){
				if($sinNumberFormat){
					return $roto[0];
				}else{
					return number_format($roto[0]);
				}
			}else{
				if($sinNumberFormat){
					return $roto[0].'.'.$dec;
				}else{
					return number_format($roto[0]).'.'.$dec;
				}
			}
		}else{
			if($sinDecimales){
				return '0';
			}else{
				return '0.'.$dec;
			}
		}
	}else{
		if($sinDecimales){
			return '0';
		}else{
			return '0.00';
		}
	}

}