<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);


if(!$telefono) exit("Debe escribir el teléfono del paciente.");
if(!$sexo) exit("Debe escribir el diagnóstico de la consulta.");
if(!$tipo_cobro) exit("Debe seleccionar un tipo de cobro.");
if(!$monto) exit("Debe escribir el monto para la consulta.");

if($telefono){
	$telefono=limpiaNumero($telefono);
}

if($receta){
	$receta=urldecode($receta);	
}

if($receta_adicional){
	$receta_adicional=urldecode($receta_adicional);
}

if($telefono){if(!limpiaNumero($telefono)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");}

if(!is_numeric($id_paciente)){
	//Creamos el paciente
	if(limpiaStr($id_paciente,1,1)==true){
		if(!$telefono) exit("Debe escribir el número del teléfono del paciente.");
		if(!validarTelefono($telefono)) exit("El teléfono <strong>".escapar($telefono)."</strong> no es válido, verifique el formato.");
		if($email){if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");}
		$sql="INSERT INTO pacientes (id_medico,nombre,celular,email,edad,sexo,antecedentes_alergias,fecha_alta)VALUES('$id_medico','$id_paciente','$telefono','$email','$edad','$sexo','$antecedentes','$fechahora')";
		$query=@mysql_query($sql);
		$n_id_paciente=mysql_insert_id();
		if(!$n_id_paciente){
				exit("Ocurrió un error al guardar el paciente, <b>no se guardo la consulta</b>, intente de nuevo.");
			}
		$nombre=$id_paciente;
		$id_paciente=$n_id_paciente;
	}else{
		exit("El nombre ".$id_paciente." no es válido");
	}
}else{
	$sq4=@mysql_query("UPDATE pacientes SET nombre='$nombre', celular='$telefono', email='$mail', edad='$edad', sexo='$sexo', antecedentes_alergias='$antecedentes' WHERE id_paciente=$id_paciente");
	if(!$sq4) exit("Ocurrió un error al actualizar los datos el paciente, <b>no se guardo la consulta</b>, intente de nuevo.");
}

if($tipo_cobro==4){
	if(!$id_aseguradora) exit("Debe seleccionar una aseguradora.");	
}


if(!$id_paciente){
	if(!$nombre) exit("Debe escribir un nombre para el paciente o seleccionar uno.");
}

	mysql_query('BEGIN');
		
	$sq1=@mysql_query("INSERT INTO consultas (id_paciente,id_agenda,id_medico,diagnostico,sugerencias,fecha_hora)VALUES('$id_paciente','$id_agenda','$id_medico','$diagnostico','$sugerencias','$fechahora')");
	if(!$sq1) $error=true;
	$id_consulta=mysql_insert_id();

	$sq2=@mysql_query("INSERT INTO ingresos (id_medico,estado,id_secretaria,id_tipo_ingreso,id_tipo_cobro,id_aseguradora,id_consulta,id_cuentas_cobrar,monto,anotacion,fecha_hora_captura,fecha_hora_pago)
									VALUES('$id_medico','1','0','1','$tipo_cobro','$id_aseguradora','$id_consulta','$id_cuentas_cobrar','$monto','$anotacion','$fechahora','$fechahora')");
	if(!$sq2) $error=true;
	
	$sq3=@mysql_query("INSERT INTO recetas (id_consulta,receta)VALUES('$id_consulta','$receta')");
	if(!$sq3) $error=true;
	
	if($receta_adicional){ $sq5=@mysql_query("INSERT INTO recetas (id_consulta,receta)VALUES('$id_consulta','$receta_adicional')"); if(!$sq5) $error=true; }
	
	if($error){
		mysql_query('ROLLBACK');
		exit("Ocurrió un error, intente más tarde.");
	}else{
		mysql_query('COMMIT');
		echo "1";
	}



//Repartimos los Insert
/*
-consultas
id_paciente
id_agenda
id_medico
diagnostico
sugerencias
fecha_hora

-ingresos
id_medico
estado
id_secretaria
id_tipo_ingreso
id_tipo_cobro
id_aseguradora
id_consulta
id_cuentas_cobrar
monto
anotacion
fecha_hora_captura
fecha_hora_pago

-recetas
id_consulta
receta
*/

?>