<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);

/********************* Validacion de valores ************************/
if(!$monto) exit("Debe capturar un monto");
if(!$fecha) exit("Debe seleccionar una fecha");
if(!$descripcion) exit("Debe escribir una descripción para el gasto");

/********************* Validaciones ************************/
if(!escapar($monto,1)) exit("El monto debe ser número");

/********************* Limpiamos datos ************************/
$fecha=fechaBase($fecha);
$monto=escapar($monto,1);
$descripcion=limpiaStr($descripcion,1,1);
if(!$factura){
	$factura=0;
	$pdf="";
	$xml="";
}

/********************* Mandamos la mágia ************************/
if(!is_numeric($id_cat)){
	if(limpiaStr($id_cat,1,1)==true){
		$sql="INSERT INTO categorias_gastos (id_medico,categoria)VALUES('$id_medico','$id_cat')";
		$query=@mysql_query($sql);
		if($query){
				$n_id_cat=mysql_insert_id();
				if(ac_gastos($monto,$fecha,$n_id_cat,$descripcion,$factura,$pdf,$xml,$id_clinica)){
					echo "1";
				}else{
					echo "No se guardaron los datos $n_id_cat, por favor intente más tarde.";
				}
			}else{
				exit("Ocurrió un error al guardar la categoría de gastos, no se creo el gasto, intente de nuevo.");
			}
	}else{
		exit("La categoria ".$id_cat." no es válida");
	}
}else{
	if(ac_gastos($monto,$fecha,$id_cat,$descripcion,$factura,$pdf,$xml,$id_clinica)){
		echo "1";
	}else{
		echo "No se guardaron los datos, por favor intente más tarde.";
	}
}

?>