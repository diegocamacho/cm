<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");

$mes_actual=date('m');
$ano_actual=date('Y');
$fecha_tope = $ano_actual."-".$mes_actual."-31";
/*if(mysql_num_rows(mysql_query("SELECT fecha_hora_pago FROM ingresos WHERE estado=1 AND id_medico=$id_medico AND activo=1 AND (ingresos.id_tipo_cobro=1 OR ingresos.id_tipo_cobro=2) ORDER BY fecha_hora_pago ASC"))){
	$fingresos = mysql_result(mysql_query("SELECT fecha_hora_pago FROM ingresos WHERE estado=1 AND id_medico=$id_medico AND activo=1 AND (ingresos.id_tipo_cobro=1 OR ingresos.id_tipo_cobro=2) ORDER BY fecha_hora_pago ASC"),0);
}else{
	$fingresos = $fecha_tope;
}
if(mysql_num_rows(mysql_query("SELECT fecha FROM gastos WHERE id_medico=$id_medico ORDER BY fecha ASC"))){
	$fgastos = mysql_result(mysql_query("SELECT fecha FROM gastos WHERE id_medico=$id_medico ORDER BY fecha ASC"),0);
}else{
	$fgastos = $fecha_tope;
}

$mes_old_ing = substr($fingresos,5,2);
$ano_old_ing = substr($fingresos,0,4);

$mes_old_gas = substr($fgastos,5,2);
$ano_old_gas = substr($fgastos,0,4);

if($ano_old_ing > $ano_old_gas){
	$oldest_ano = $ano_old_gas;
	$oldest_mes = $mes_old_gas;
}else{
	$oldest_ano = $ano_old_ing;
	$oldest_mes = $mes_old_ing;
}*/
$oldest_mes = 1;
$oldest_ano = $ano_actual;
$oldest_fecha_fin = $oldest_ano."-01-31";
$oldest_fecha_ini = $oldest_ano."-01-01";

///EMPIEZA EL INFIERNO.
while($oldest_fecha_fin<=$fecha_tope){
	$total_ing = mysql_result(mysql_query("SELECT SUM(monto) AS total FROM ingresos WHERE id_medico = $id_medico AND estado=1 AND (ingresos.id_tipo_cobro=1 OR ingresos.id_tipo_cobro=2) AND activo=1 AND DATE(fecha_hora_pago) BETWEEN '$oldest_fecha_ini' AND '$oldest_fecha_fin'"), 0);
	$total_gas = mysql_result(mysql_query("SELECT SUM(monto) AS total FROM gastos WHERE id_medico = $id_medico AND fecha BETWEEN '$oldest_fecha_ini' AND '$oldest_fecha_fin'"), 0);
	if($total_ing<1){
		$total_ing=0;
	}
	if($total_gas<1){
		$total_gas=0;
	}
	$ingresos .= soloMes($oldest_mes)." ".$oldest_ano."&".$total_ing."_";
	$egresos .= soloMes($oldest_mes)." ".$oldest_ano."&".$total_gas."_";
	
	if($oldest_mes == 12 && $oldest_ano<=$ano_actual){
		$oldest_ano++;
		$oldest_mes = "01";
	}else{
		$oldest_mes++;
		if($oldest_mes<10){
			$oldest_mes="0".$oldest_mes;
		}
	}
	$oldest_fecha_fin = $oldest_ano."-".$oldest_mes."-31";
	$oldest_fecha_ini = $oldest_ano."-".$oldest_mes."-01";
}

if(strlen($ingresos)>0 && strlen($egresos)>0){
	echo "1|".$ingresos."|".$egresos;

}else{
	echo "0|NO HAY INGRESOS O EGRESOS.";
}
