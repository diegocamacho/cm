<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);

/********************* Validacion de valores ************************/
if(!$monto) exit("Debe capturar un monto");
if(!$fecha) exit("Debe seleccionar una fecha");
if(!$descripcion) exit("Debe escribir una descripción para el ingreso");

/********************* Validaciones ************************/
if(!escapar($monto,1)) exit("El monto debe ser número");

/********************* Limpiamos datos ************************/
$fecha=fechaBase($fecha);
$monto=escapar($monto,1);
$descripcion=limpiaStr($descripcion,1,1);

/********************* Mandamos la mágia ************************/
if(ac_ingresos($monto,$fecha,$descripcion)){
	echo "1";
}else{
	echo "No se guardaron los datos, por favor intente más tarde.";
}
?>