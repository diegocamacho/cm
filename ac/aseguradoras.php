<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);
//Elimina

if($eliminar){
	$id_aseguradora=escapar($id_aseguradora,1);
	if(ac_aseguradora($nombre,$id_aseguradora,1)){
	    echo "3";
	}else{
	    echo "No se elimino la aseguradora, por favor intente más tarde.";
	}
}else{

	if(!$nombre) exit("Debe escribir un nombre para la nueva aseguradora");
	$nombre=limpiaStr($nombre,1);

	//Guarda y edita
	if(!$id_aseguradora){
			if(ac_aseguradora($nombre)){
				echo "1";
			}else{
				echo "No se guardaron los datos, por favor intente más tarde.";
			}
			
	}else{
			if(!$id_aseguradora) exit("No se actualizaron los datos, intente más tarde.");
		
			$id_aseguradora=escapar($id_aseguradora,1);
			if(ac_aseguradora($nombre,$id_aseguradora)){
				echo "2";
			}else{
				echo "No se editaron los datos, por favor intente más tarde.";
			}
			
	}
}
?>