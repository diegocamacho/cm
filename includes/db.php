<?php
//error_reporting(0);
$servidor="internal-db.s188479.gridserver.com";
$usuario="db188479";
$clave="adolfo.diego";
$base="db188479_cm_app";
$conexion = @mysql_connect ($servidor,$usuario,$clave) or die ("Error en conexi&oacute;n.");
@mysql_select_db($base) or die ("No BD");
?>