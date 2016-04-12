<?
session_start();
require '../includes/db.php';
date_default_timezone_set ("America/Mexico_City");
$fecha_hora=date("Y-m-d H:i:s");
	if(isset ($_POST['email']) && ($_POST['pass']))
	{

		$email=mysql_real_escape_string($_POST['email']);
		$contrasena=md5(mysql_real_escape_string($_POST['pass']));
		// Admin
 		$sql = "SELECT * FROM credenciales WHERE email='$email' AND contrasena='$contrasena' AND activo='1' LIMIT 1";
		$res = mysql_query($sql) or die ('Error en db');
		$num_result = mysql_num_rows($res);
		if($num_result != 0){
			while ($row=mysql_fetch_object($res))
				{
					$_SESSION['s_id_credencial'] = $row->id_credencial;
					$_SESSION['s_id_usuario'] = $row->id_usuario;
					$_SESSION['s_id_tipo_credencial'] = $row->id_tipo_credencial;
				}
			if(mysql_query("UPDATE credenciales SET ultimo_acceso='$fecha_hora' WHERE id_credencial='".$_SESSION['s_id_credencial']."'")){
				echo "1";
			}
		}else{
			exit('Datos de acceso incorrectos, por favor intente nuevamente.');
		}

	}
?>