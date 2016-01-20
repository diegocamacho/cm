<?
include('../includes/session.php');
include('../includes/db.php');
include('../includes/funciones.php');

extract($_POST);

/********************* Validaciones ************************/
if($agenda=='on'){ $agenda=1; }else{ $agenda=0; }
if($resumen_inicial=='on'){ $resumen_inicial=1; }else{ $resumen_inicial=0; }
if($resumen_final=='on'){ $resumen_final=1; }else{ $resumen_final=0; }
if($facturacion_1=='on'){ $facturacion_1=1; }else{ $facturacion_1=0; }
if($facturacion_2=='on'){ $facturacion_2=1; }else{ $facturacion_2=0; }


/********************* Mandamos la mágia ************************/
if(ac_mi_cuenta_alertas($agenda,$resumen_inicial,$resumen_final,$facturacion_1,$facturacion_2)){
    echo "1";
}else{
    echo "No se actualizaron los datos, por favor intente más tarde.";
}
?>