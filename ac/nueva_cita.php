<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
//sleep(10);
extract($_POST);

if(!$id_paciente) exit("Debe selcionar un paciente o escribir su nombre");
if(!$id_clinica) exit("Debe selcionar una clínica");
if(!$fecha) exit("Debe seleccionar una fecha para la cita");
if(!$hora) exit("Debe seleccionar una hora para la cita");

$fecha=fechaBase($fecha);

if(!is_numeric($id_paciente)){
	if(limpiaStr($id_paciente,1,1)==true){
		if(!$telefono) exit("Debe escribir el número del teléfono del paciente.");
		if(!validarTelefono($telefono)) exit("El teléfono <strong>".escapar($telefono)."</strong> no es válido, verifique el formato.");
		if($email){if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");}
		$sql="INSERT INTO pacientes (id_medico,nombre,celular,email,fecha_alta)VALUES('$id_medico','$id_paciente','$telefono','$email','$fechahora')";
		$query=@mysql_query($sql);
		if($query){
				$n_id_paciente=mysql_insert_id();
				if(nuevaCita($id_secretaria,$id_clinica,$n_id_paciente,$fecha,$hora,$anotacion)){
					echo "1";
				}else{
					echo "Ocurrió un error, no se guardo la cita, intente nuevamente";
				}
			}else{
				exit("Ocurrió un error al guardar el paciente, no se creo la cita, intente de nuevo.");
			}
	}else{
		exit("El nombre ".$id_paciente." no es válido");
	}
}else{
	if(nuevaCita($id_secretaria,$id_clinica,$id_paciente,$fecha,$hora,$anotacion)){
		echo "1";
	}else{
		echo "Ocurrió un error, no se guardo la cita, intente nuevamente";
	}
}
?>