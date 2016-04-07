<?set_time_limit(0); 
ob_start(); 
include("../includes/session.php");
include("../includes/db.php"); 
include('../includes/funciones.php');
$fecha_inicio = fechaBase($_GET['fecha_ini']);
$fecha_fin = fechaBase($_GET['fecha_fin']); 
$sql="SELECT * FROM consultas WHERE id_medico=$id_medico AND activo = 1 AND fecha_hora>='$fecha_inicio' AND fecha_hora<='$fecha_fin' ORDER BY id_consulta ASC";
$q=mysql_query($sql);
$valida=mysql_num_rows($q);
$gran_total = $valida;
?>

<style type="text/css">
body {
    margin-left:0px;
    margin-right:0px;
    margin-top:0px;
    margin-bottom:0px;
    font-family:"Arial", Helvetica, sans-serif;
  }
.info{ 
	font-size: 16px;
}
.info td{
	padding: 10px;
	text-transform: uppercase;
}
.cal{ 
	font-size: 12px;
}
.cal td{
	padding: 3px;
	text-transform: uppercase;
}
table.page_header {width: 100%; border: none; padding-top: 2mm; font-size: 14px; font-weight: bold; }
table.page_footer {
	width: 100%; 
	padding: 2mm;
	font-size: 11px;
	padding-bottom: 10px;
}
.titulos{ 
	font-size: 12px;
	font-weight: bold;
}
.titulos td{
	padding: 5px;
	text-transform: uppercase;
}
</style>

<page backtop="35mm" backbottom="15mm" backleft="10mm" backright="10mm" footer="page">
<!-- header -->	
	<page_header>
	<table class="page_header">
		<tr>
			<td align="left" style="width: 100%; text-align: left;padding-left:10px;">
				<h2>CALIDAD MEDICA</h2>
			</td>
		</tr>
	</table>
	<table class="page_header">
		<tr>
			<td align="left" style="width: 100%; text-align: left;padding-left:10px;">
				
			</td>
		</tr>
		<tr>
			<td align="center" style="width: 100%;font-size: 18px;">REPORTE DE CONSULTAS DEL <?=strtoupper(fechaLetra($fecha_inicio))?> AL <?=strtoupper(fechaLetra($fecha_fin))?></td>
		</tr>
	</table>
	</page_header>
<!-- Footer -->
	<page_footer>
	<table class="page_footer">
		<tr>
			<td align="left">
				<h5>CALIDAD MEDICA by EpicMedia</h5>
			</td>
		</tr>
	</table>
	</page_footer>
<? if($valida){ ?>
<!-- contenido -->
<br/><br/>
	<table style="width: 100%;" width="1300" align="center" border=".5" cellpadding="0" cellspacing="0" class="cal">
		<tr>
			<th width="80" align="center"># Consulta</th>
			<th width="150" align="center">Fecha</th>
			<th width="230" align="center">Paciente</th>
			<th width="230" align="center">Diagnostico</th>
			<th width="80" align="center">Clinica</th>

		</tr>
		<? while($ft=mysql_fetch_assoc($q)){ ?>
				        <tr id="tr_<?=$ft['id_consulta']?>">
				        	<td align="center"><?=str_pad($ft['id_consulta'],4,"0",STR_PAD_LEFT)?></td>
				          	<td align="center"><?=date('d-M-Y',strtotime($ft['fecha_hora']))?></td>
				          	<td align="center"><?=nombrePaciente($ft['id_paciente'])?></td>
				          	<td align="center"><?=$ft['diagnostico']?></td>
				          	<td align="center"><?=$ft['sugerencias']?></td>
				        </tr>
				      <?}?>
	</table>
<br/><br/><br/><br/><br/>
<div style="width:100%;text-align:center">	
	<h2>CANTIDAD DE CONSULTAS EN EL PERIODO: <?=$gran_total?> </h2>	
</div>
	
<? }else{ ?>
<h1>No se ha registrado ningún ingreso en las fechas seleccionadas</h1>
<? } ?>
</page>


<?php

	$content_html = ob_get_clean();

	// initialisation de HTML2PDF
	require_once(dirname(__FILE__).'/pdf/html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('L','A4','es', true, 'UTF-8', array(0, 0, 0, 0));
		$html2pdf->pdf->SetDisplayMode('fullpage');
		//$html2pdf = new HTML2PDF('L','A4','es', false, 'utf-8', array(0, 0, 0, 0));
		$html2pdf->writeHTML($content_html, isset($_GET['vuehtml']));
//		$html2pdf->createIndex('Sommaire', 25, 12, false, true, 1);
		$html2pdf->Output('lista.pdf');
	}
	catch(HTML2PDF_exception $e) { echo $e; }	

?>