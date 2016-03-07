<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');
extract($_POST);
//Validamos que llegue un correo
if(!$id_paciente) exit("No se encontro el paciente.");
if(!$nombre) exit("Debe escribir un nombre para el paciente.");
if(!$celular) exit("Debe escribir un número de teléfono para el paciente.");
if(!$edad) exit("Debe escribir una edad para el paciente");
if(!$sexo) exit("Debe seleccionar el sexo del paciente.");
//Validamos email
if($email){ if(!validarEmail($email)) exit("El correo <strong>".escapar($email)."</strong> no es válido, verifique el formato."); }
if($antecedentes_alergias){ $antecedentes_alergias=limpiaStr($antecedentes_alergias); }
if(!validarTelefono($celular)) exit("El teléfono <strong>".escapar($celular)."</strong> no es válido, verifique el formato.");
$id_paciente=escapar($id_paciente,1);
$nombre=limpiaStr($nombre,1);
$sexo=limpiaStr($sexo,1);

if(ac_edita_paciente($id_paciente,$nombre,$celular,$email,$edad,$sexo,$antecedentes_alergias)){
    exit("1");
}else{
    exit("No se editaron los datos, por favor intente más tarde.");
}