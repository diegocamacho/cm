<? session_start();
$s_id_credencial=$_SESSION['s_id_credencial'];
$s_id_usuario=$_SESSION['s_id_usuario'];
$s_id_tipo_credencial=$_SESSION['s_id_tipo_credencial'];

if($s_id_tipo_credencial==1){
	$id_medico=$s_id_usuario;
	$id_secretaria=0;
}elseif($s_id_tipo_credencial==2){
	$id_secretaria=$s_id_usuario;
	$id_medico=$_SESSION['s_id_medico'];
}else{
	header("Location: login.php");
}

if(!isset($_SESSION['s_id_credencial'])){
	header("Location: login.php");
}
?>