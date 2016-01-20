<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);
if(!$rfc) exit("Debe escribir su RFC.");
if(!$nombre) exit("Debe escribir su nombre");
if(!$calle) exit("Debe escribir la calle");
if(!$ext) exit("Debe escribir un número exterior");
if(!$cp) exit("Debe escribir un código postal");
if(!$colonia) exit("Debe escribir una colonia");
if(!$localidad) exit("Debe escribir una localidad");
if(!$mpio) exit("Debe escribir un municipio");
if(!$id_estado) exit("Debe seleccionar un estado");

$rfc=limpiaStr($rfc,1,1);
$nombre=limpiaStr($nombre,1,1);
$calle=limpiaStr($calle,1,1);
$ext=limpiaStr($ext,1,1);
$interior=limpiaStr($interior,1,1);
if(!validarCP($cp)) exit("El código postal <strong>".escapar($cp)."</strong> no es válido, verifique el formato.");
$colonia=limpiaStr($colonia,1,1);
$localidad=limpiaStr($localidad,1,1);
$mpio=limpiaStr($mpio,1,1);
$id_estado=escapar($id_estado,1);

if(ac_facturacion($rfc,$nombre,$calle,$ext,$interior,$cp,$colonia,$localidad,$mpio,$id_estado)){
	echo "1";
}else{
	echo "No se guardaron los datos, por favor intente más tarde.";
}
?>