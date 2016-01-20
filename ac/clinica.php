<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);

//Elimina
if($eliminar){
	$id_clinica=escapar($id_clinica,1);
	if(ac_clinica($nombre,$id_clinica,1)){
	    echo "3";
	}else{
	    echo "No se elimino la clínica, por favor intente más tarde.";
	}
}else{

	if(!$nombre) exit("Debe escribir un nombre para la nueva clínica");
	$nombre=limpiaStr($nombre,1);

	//Guarda y edita
	if(!$id_clinica){
			if(ac_clinica($nombre)){
				echo "1";
			}else{
				echo "No se guardaron los datos, por favor intente más tarde.";
			}
			
	}else{
			if(!$id_clinica) exit("No se actualizaron los datos, intente más tarde.");
		
			$id_clinica=escapar($id_clinica,1);
			if(ac_clinica($nombre,$id_clinica)){
				echo "2";
			}else{
				echo "No se editaron los datos, por favor intente más tarde.";
			}
			
	}
}
?>