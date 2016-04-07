<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);
/********************* Validacion de valores ************************/
if(!$nombre) exit("Debe escribir su nombre");
if(!$cedula) exit("Debe escribir su cedula");
if(!$sexo) exit("Debe seleccionar su sexo");
if(!$email) exit("Debe escribir su email");
if(!$celular) exit("Debe escribir un teléfono");
if(!$id_celular_compania) exit("Debe seleccionar la compañía móvil de su celular");
//Fecha de nacimiento
if(!$dia_nacimiento) exit("Debe escribir el día de su nacimiento");
if(!$mes_nacimiento) exit("Debe seleccionar el mes de su nacimiento");
if(!$ano_nacimiento) exit("Debe escribir el año de su nacimiento");
//end fecha nacimiento
if(!$id_estado) exit("Debe seleccionar su estado");
if(!$ciudad) exit("Debe escribir su ciudad");

/********************* Validaciones ************************/
//Validamos email
if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato.");
//Validamos celular
if(!validarTelefono($celular)) exit("El teléfono <strong>".escapar($celular)."</strong> no es válido, verifique el formato.");
//Validamos fecha
if(!validaStrFecha($dia_nacimiento)) exit("El formato del día en la fecha debe ser a 2 caracteres.");
if(!validaStrFecha($mes_nacimiento)) exit("El formato del mes en la fecha debe ser a 2 caracteres.");
if(!validaStrFecha($ano_nacimiento,1)) exit("El formato del año en la fecha debe ser a 4 caracteres.");
if(!validaCedula($cedula)) exit("La cédula sólo puede tener 10 caracteres y deben ser números.");
if(!escapar($id_celular_compania,1)) exit("La compañía celular seleccionada no existe");
if(!escapar($id_estado,1)) exit("El estado seleccionado no existe");

/********************* Limpiamos datos ************************/
$nombre=limpiaStr($nombre,1,1);
$cedula=escapar($cedula,1);
$sexo=limpiaStr($sexo,1,1);
$email=escapar($email);
$celular=escapar($celular);
$id_celular_compania=escapar($id_celular_compania,1);
$id_estado=escapar($id_estado,1);
$ciudad=limpiaStr($ciudad,1,1);

$fecha_nacimiento=$ano_nacimiento."-".$mes_nacimiento."-".$dia_nacimiento;

/********************* Mandamos la mágia ************************/
if(ac_mi_cuenta_perfil($nombre,$cedula,$sexo,$email,$celular,$id_celular_compania,$fecha_nacimiento,$id_estado,$ciudad)){
	echo "1";
}else{
	echo "No se guardaron los datos, por favor intente más tarde.";
}
?>