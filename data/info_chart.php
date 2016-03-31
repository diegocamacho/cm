<?
include("../includes/session.php");
include("../includes/db.php");
include("../includes/funciones.php");

$mes_actual=date('m');
$ano_actual=date('Y');
$fecha_tope = $ano_actual."-".$mes_actual."-31";
$fingresos = mysql_result(mysql_query("SELECT fecha_hora_pago FROM ingresos WHERE estado=1 AND id_medico=$id_medico AND activo=1 AND (ingresos.id_tipo_cobro=1 OR ingresos.id_tipo_cobro=2) ORDER BY fecha_hora_pago ASC"),0);
$fgastos = mysql_result(mysql_query("SELECT fecha FROM gastos WHERE id_medico=$id_medico ORDER BY fecha ASC"),0);

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
}
$oldest_fecha_fin = $oldest_ano."-".$oldest_mes."-31";
$oldest_fecha_ini = $oldest_ano."-".$oldest_mes."-01";

///EMPIEZA EL INFIERNO.
while($oldest_fecha_fin<=$fecha_tope){
	
	
	if($oldest_mes == 12 && $oldest_ano<$ano_actual){
		$oldest_ano++;
		$oldest_mes = 1;
	}else{
		$oldest_mes++;
	}
	$oldest_fecha_fin = $oldest_ano."-".$oldest_mes."-31";
	$oldest_fecha_ini = $oldest_ano."-".$oldest_mes."-01";
}

$qtingresos = mysql_query("SELECT SUM(monto) AS total FROM ingresos WHERE estado=1 AND id_medico=$id_medico AND activo=1 AND (ingresos.id_tipo_cobro=1 OR ingresos.id_tipo_cobro=2) ORDER BY fecha_hora_pago ASC");
$qtgastos = mysql_query("SELECT SUM(monto) AS total FROM gastos WHERE id_medico=$id_medico ORDER BY fecha ASC");

if($query){
	$ft=mysql_fetch_assoc($query);
	echo "1|".$ingresos."|".$egresos;
}else{
	echo "0|No se pudo localizar el gasto seleccionado.";
}
