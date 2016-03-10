<?
$estado=$_GET['Estado'];
$mes_seleccionado=$_GET['Mes'];
$mes_actual=date('m');
$ano_actual=date('Y');

if(!escapar($mes_seleccionado,1)){ $mes_seleccionado=""; }
if(!escapar($estado,1)){ $estado=""; }
//para el pagado y no pagado
if($estado){
    if($estado==2){$estado=0;}
    $consulta_estado="AND facturado=".$estado;
}else{
    $consulta_estado="";
}
//Para cambiar de mes
if($mes_seleccionado){
    $fecha_consulta=$ano_actual."-".$mes_seleccionado;
    $mes=soloMes($mes_seleccionado);
    $url="?Modulo=Gastos&Mes=".$mes_seleccionado;
}else{
    $fecha_consulta=$ano_actual."-".$mes_actual;
    $mes=soloMes($mes_actual);
    $url="?Modulo=Gastos";
}
//Datos para la tabla
$sql="SELECT gastos.*, categorias_gastos.categoria FROM gastos 
JOIN categorias_gastos ON categorias_gastos.id_cat_gastos=gastos.id_cat_gastos
WHERE gastos.id_medico=$id_medico AND categorias_gastos.activo=1 AND gastos.fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' $consulta_estado";
$query=mysql_query($sql);
$muestra=mysql_num_rows($query);
//Consulta para los totales
$sq_total="SELECT SUM(monto) AS total FROM gastos WHERE gastos.id_medico=$id_medico AND fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31'";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total=$datos_total['total'];
//Totales Facturados
$sq_total="SELECT SUM(monto) AS total FROM gastos WHERE gastos.id_medico=$id_medico AND fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' AND facturado=1";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total_facturas=$datos_total['total'];
//Totales No Facturados
$sq_total="SELECT SUM(monto) AS total FROM gastos WHERE gastos.id_medico=$id_medico AND fecha BETWEEN '$fecha_consulta-01' AND '$fecha_consulta-31' AND facturado=0";
$q_total=mysql_query($sq_total);
$datos_total=mysql_fetch_assoc($q_total);
$total_nofacturas=$datos_total['total'];
//Buscamos clínicas
$sq_clinicas="SELECT * FROM clinicas WHERE id_medico=$id_medico AND activo=1";
$q_clinicas=mysql_query($sq_clinicas);
$valida_clinicas=mysql_num_rows($q_clinicas);
?>

<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Gastos de <?=$mes?></h4>
            </div>
            <div class="page-header-section text-right">
                        <? if($valida_clinicas>1){ ?>
                        <!-- Filtro por clínica -->
                        <div class="btn-group mr10">
                             <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Clínicas <span class="caret"></span></button>
                             <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                <? while($ft=mysql_fetch_assoc($q_clinicas)){ ?>
                                 <li><a href="javascript:void(0);"><?=$ft['clinica']?></a></li>
                                <? } ?>
                             </ul>
                        </div>
                        <? } ?> 
                		<div class="btn-group mr10">
						     <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Filtrar <span class="caret"></span></button>
						     <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
						         <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-target="#SeleccionaMes">Por Mes</a></li>
						         <li><a href="<?=$url?>&Estado=1">Facturados</a></li>
						         <li><a href="<?=$url?>&Estado=2">No Facturados</a></li>
						         <li class="divider"></li>
						     </ul>
						 </div><!-- /btn-group -->

                        <a class="btn btn-sm btn-primary" href="javascript:void(0);" role="button" data-toggle="modal" data-target="#NuevoIngreso">Nuevo Gasto</a>

            </div>
        </div>
        <!-- Page Header -->
		<!-- Sub-Header -->
		<div class="row">
            <div class="col-md-12">
           
                <? if($_GET['msg']==1){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡El gasto se ha agregado!
                </div>
                <? }elseif($_GET['msg']==2){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡El gasto se ha editado!
                </div>
                <? }elseif($_GET['msg']==3){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡El gasto se ha eliminado!
                </div>
                <? } ?>
            <div class="col-sm-4">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-primary">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm"><?=fnum($total)?></h4>
                            <p class="semibold text-muted mb0 mt5">GASTOS TOTALES <?=strtoupper($mes)?></p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-4">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-info">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm"><?=fnum($total_facturas)?></h4>
                            <p class="semibold text-muted mb0 mt5">GASTOS FACTURADOS</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            <div class="col-sm-4">
                <!-- START Statistic Widget -->
                <div class="table-layout">
                    <div class="col-xs-4 panel bgcolor-info">
                        <div class="ico-coins fsize24 text-center"></div>
                    </div>
                    <div class="col-xs-8 panel">
                        <div class="panel-body text-center">
                            <h4 class="semibold nm"><?=fnum($total_nofacturas)?></h4>
                            <p class="semibold text-muted mb0 mt5">GASTOS NO FACTURADOS</p>
                        </div>
                    </div>
                </div>
                <!--/ END Statistic Widget -->
            </div>
            </div>   
        </div>
                
                
        <!-- Tabla y acciones -->
        <div class="row">
            <div class="col-md-12">
                <? if($muestra){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gastos de <?=$mes?></h3>
                    </div>
                   
                    <table class="table table-striped" id="zero-configuration">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Estado</th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? while($ft=mysql_fetch_assoc($query)){                             
                                $fact = $ft['facturado'];
                                $monto=$ft['monto'];
                                $pdf = $ft['pdf_archivo'];
                            ?>
                                <tr>
                                    <td><?=$ft['descripcion']?></td>
                                    <td><?=fechaLetra($ft['fecha'])?></td>
                                    <td><?=fnum($monto)?></td>
                                    <td><?if($fact==1){?><a role="button" href="<?=$pdf?>" target="_blank" class="label label-teal"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Facturado</a><?}else{?><span class="label label-info">No Facturado</span><? } ?></td>
                                    <td width="10%">
                                        <div class="btn-group mb5 ml10">
                                            <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></button>
                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel" role="menu" style="min-width: 0px;">
                                                <li><a data-id="<?=$ft['id_gasto']?>" data-toggle="modal" href="#EditaGasto">Editar</a></li>
                                                <li><a data-supr="<?=$ft['id_gasto']?>"  data-toggle="modal" href="#ModalConfirma" class="text-danger">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>  
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </div>
                 <? }else{ ?>
                    <div class="alert alert-dismissable alert-warning animation animating flipInX">No tiene gastos registrados en <?=$mes?> :)</div>
                <? } ?>
            </div>
        </div>
        <!--/ END row -->
    </div>
</section>


<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->
<script>
$(function(){
	//UPLOADER
    $("#fileuploader").uploadFile({url: "subir_files_gastos.php",
        dragDrop: true,
        fileName: "archivo",
        returnType: "json",
        showDelete: true,
        showDownload:false,
        statusBarWidth:470,
        dragdropWidth:470,
        showFileCounter:false,
        showPreview:false,
        showFileSize: false,
        multiple:false,
     
        deleteCallback: function (data, pd) {
            
            for (var i = 0; i < data.length; i++) {
                $('.inputs_subida[value="'+data[i]+'"]').remove();
                $.post("eliminar.php", {op: "delete",name: data[i]});
            }
            pd.statusbar.hide(); //You choice.
        
        },

        afterUploadAll: function(){
            $('#btn_guarda').prop('disabled',false).val('Guardar');
        },
        onSubmit: function(){
            $('#btn_guarda').prop('disabled',true).val('Espere...');

        },
        onError: function(){
            $('#btn_guarda').prop('disabled',false).val('Actualizar');
        },

        onSuccess:function(files,data,xhr){
            //files: list of files uploaded
            //data: response from server
            //xhr : jquer xhr object
            $('#fileuploader').append('<input type="hidden" class="inputs_subida" id="'+data+'" name="archivo[]" value="'+data+'"/>')
        }
        
    });

    $("#datepicker1").datepicker();

    $("#datepicker2").datepicker();
	
	$("#selectize-selectmultiple").selectize({
        maxItems: 1
    });

   
	
	$("#customcheckbox1").click(function() {

        if($("#customcheckbox1").is(':checked')) {  
            $('#sube_pdf').show('Fast');
        } else {  
            $('#sube_pdf').hide('Fast');
        }  
    });

    $("#customcheckbox2").click(function() {

        if($("#customcheckbox2").is(':checked')) {  
            $('#edita_pdf').show('Fast');
        } else {  
            $('#edita_pdf').hide('Fast');
        }  
    });

    //Enfoco el primer campo
    $('#NuevoIngreso').on('shown.bs.modal', function (e) {
        $('#monto').focus();        
    });

    //Nuevo Gasto
    $('#btn_guarda').click(function(){
        ac_nuevo_gasto();
    });
    //Limpiamos el modal cuando se cierre
    $('#NuevoIngreso').on('hidden.bs.modal', function (e) {
        $('.mod').removeAttr("disabled");
        $('.mod').val('');
    });

    //Envio el formulario al presionar enter
    $('form').submit(function(e) {
        ac_nuevo_gasto();
        e.preventDefault();
    });
    
    //Cambiamso de mes la consulta
    $('#btn_mes').click(function(){
        var mes = $('#mes').val();
        location.href = "?Modulo=Gastos&Mes="+mes;
    });

    $('.oculto').css("display","none");

    $('.link').css("cursor","pointer");

    //Edita Gasto
    $('#btn_edita').click(function(){
        ac_edita_gasto();
    });

});

    


function ac_nuevo_gasto(){

    var datos=$('#frm_guarda').serialize();

    var btn_guarda = Ladda.create(document.querySelector('#btn_guarda'));
  
    btn_guarda.start();
    $('.mod').attr("disabled", true);

    $.post('ac/gastos.php',datos,function(data){

        if(data==1){
            location.href = "?Modulo=Gastos&msg=1";
        }else if(data==2){
            location.href = "?Modulo=Gastos&msg=2";
        }else if(data==3){
            location.href = "?Modulo=Gastos&msg=3";
        }else{
            $('#msg_data').html(data);
            $('#msg').show();
            $('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
            btn_guarda.stop();
            $('.mod').removeAttr("disabled");
            $('#nombre').focus();
        }
    });
};

function ac_edita_gasto(){

    var datos=$('#frm_edita').serialize();
    var id_gasto = $('#id_mod').val();
    var btn_guarda = Ladda.create(document.querySelector('#btn_edita'));
  
    btn_guarda.start();
    $('.mod').attr("disabled", true);

    $.post('ac/edita_gastos.php',datos+"&id_gasto="+id_gasto,function(data){

        if(data==1){
            location.href = "?Modulo=Gastos&msg=2";
        }else{
            $('#msg_data2').html(data);
            $('#msg2').show();
            $('#msg2').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
            btn_guarda.stop();
            $('.mod').removeAttr("disabled");
            $('#edita_monto').focus();
        }
    });
};

function ac_elimina_gasto(){
    var gasto = $('#id_elimina').val();

    $.post('ac/elimina_gasto.php',"id_gasto="+gasto,function(data){

        if(data==1){
            location.href = "?Modulo=Gastos&msg=3";
        }else{
            $('#msg_error2').val(data);
            $('#msg_error2').show();
        }
    });
};

//PARA PODER MODIFICAR
$(document).on('click', '[data-id]', function () {
    var id_gasto = $(this).attr('data-id');
    $.get('data/info_gasto.php','id_gasto='+id_gasto,function(data) {
        var respuesta = data.split("|");
        result = respuesta[0];
        fecha = respuesta[3].split("-");
        fecha = fecha[1]+"/"+fecha[2]+"/"+fecha[0];
        if(result=='1'){
          $("#selectize_edit option[value='"+respuesta[1]+"']").attr("selected", "selected");
          $('#datepicker2').val(fecha);
          $('#id_mod').val(id_gasto);
          $("#edita_monto").val(respuesta[2]);
          $("#edit_descripcion").val(respuesta[4]);
          if(respuesta[5]==1){
            $("#customcheckbox2").prop('checked', true);
            $('#edita_pdf').show('Fast');
            $("#pdf_edit").val(respuesta[6]);
            $("#xml_edit").val(respuesta[7]);
          }
        }else{
          alert('Error: '+respuesta[1]);
          //App.unblockUI('#modal_crop');
        }
      }); 
});

//PARA PODER ELIMINAR
$(document).on('click', '[data-supr]', function () {
    var id_gasto = $(this).attr('data-supr');
    $('#id_elimina').val(id_gasto);
});
</script>

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
<script type="text/javascript" src="plugins/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/tabletools.min.js"></script>
<script type="text/javascript" src="plugins/datatables/tabletools/js/zeroclipboard.js"></script>
<script type="text/javascript" src="plugins/datatables/js/jquery.datatables-custom.min.js"></script>
<script type="text/javascript" src="javascript/tables/datatable.js"></script>

<script type="text/javascript" src="javascript/components/animation.js"></script>
<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="plugins/autosize/js/jquery.autosize.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="javascript/forms/element.js"></script>
<script type="text/javascript" src="javascript/pages/calendar.js"></script>

<link href="plugins/jQuery-Upload-File/uploadfile.css" rel="stylesheet">
<script src="plugins/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->


<!-- START Modal -->
<div id="NuevoIngreso" class="modal fade">
    <div class="modal-dialog">
        <form class="modal-content" id="frm_guarda">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-coins mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary">Nuevo Gasto</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    	<!-- Mensaje de Error -->
                        <div id="msg" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <span id="msg_data"></span>
                        </div>
                        <!-- END Mensaje de Error -->
                    	<div class="form-group">

	                    	<label class="control-label">Categoría</label>
	                    	<select id="selectize-selectmultiple" name="id_cat" class="form-control mod" placeholder="Seleccione una..." multiple>
                                <?$q_categorias = mysql_query("SELECT * FROM categorias_gastos WHERE id_medico=$id_medico AND activo=1");
                                while($categorias = mysql_fetch_assoc($q_categorias)){?>
							    <option value="<?=$categorias['id_cat_gastos']?>"><?=$categorias['categoria']?></option>
                        	   <?}?>  
                            </select>      
                        </div>
                                
                        <div class="form-group">
                        	<div class="row">
                        		<div class="col-sm-6">
                                	<label class="control-label">Monto <span class="text-danger">*</span></label>
									<div class="input-group">
							        	<span class="input-group-addon">$</span>
										<input type="text" id="monto" name="monto" class="form-control mod">
									</div>
                        		</div>
                        		<div class="col-sm-6">
                                    <label class="control-label">Fecha <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mod" name="fecha" id="datepicker1" placeholder="Seleccione fecha" />
                        		</div>
                        	</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control mod" name="descripcion" id="descripcion" maxlength="160" />
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 0px;">
                        	<span class="checkbox custom-checkbox custom-checkbox-primary">
		                    	<input type="checkbox" name="factura" id="customcheckbox1" value="1">
		                    	<label for="customcheckbox1">&nbsp;&nbsp;Gasto facturado</label>
							</span>
                        </div>
                        <!-- Si el gasto es facturado mostramos uploaders -->
                        <div class="form-group" id="sube_pdf" style="display:none;"><br />
                        	<div class="row">
                        		<div class="col-sm-6">
									<label class="control-label">Archivo PDF (opcional)</label>
									<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
                                       <span class="icon iconmoon-file-3"></span> Seleccionar <input type="file" name="pdf" id="nv_pdf" accept="application/pdf">
                                    </div>
									</span>
									</div>
                        		</div>
                        		
                        		<div class="col-sm-6">
									<label class="control-label">Archivo XML (opcional)</label>
									<div class="input-group">
										<input type="text" class="form-control" readonly>
										<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
                                       <span class="icon iconmoon-file-3"></span> Seleccionar <input type="file" name="xml" id="nv_xml" accept="application/xml">
                                    </div>
									</span>
									</div>
                        		</div>
                        	</div>
                       </div>
                       <!-- Termina -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" data-style="zoom-in" id="btn_guarda"><span class="ladda-label">Guardar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->

<!-- START modal-sm Seleccionar mes-->
<div id="SeleccionaMes" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="ico-calendar3 mb15 mt15" style="font-size:36px;"></div>
                <h4 class="semibold modal-title text-primary">Gastos por Mes</h4>
            </div>
            <div class="modal-body">
            <form id="frm_mes">
                <select class="form-control" name="mes" id="mes">
                    <option>Seleccione uno</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_mes">Aceptar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->

<!-- START EDITA Modal -->
<div id="EditaGasto" class="modal fade">
    <div class="modal-dialog">
        <form class="modal-content" id="frm_edita">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-coins mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary">Edita Gasto</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Mensaje de Error -->
                        <div id="msg2" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <span id="msg_data2"></span>
                        </div>
                        <!-- END Mensaje de Error -->
                        <div class="form-group">

                            <label class="control-label">Categoría</label>
                            <select id="selectize_edit" name="id_cat" class="form-control mod" placeholder="Seleccione una...">
                                <?$q_categorias = mysql_query("SELECT * FROM categorias_gastos WHERE id_medico=$id_medico AND activo=1");
                                while($categorias = mysql_fetch_assoc($q_categorias)){?>
                                <option value="<?=$categorias['id_cat_gastos']?>"><?=$categorias['categoria']?></option>
                               <?}?>  
                            </select>      
                        </div>
                                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Monto <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" id="edita_monto" name="monto" class="form-control mod">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Fecha <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mod" name="fecha" id="datepicker2" placeholder="Seleccione fecha" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control mod" name="descripcion" id="edit_descripcion" maxlength="160" />
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 0px;">
                            <span class="checkbox custom-checkbox custom-checkbox-primary">
                                <input type="checkbox" name="factura" id="customcheckbox2" value="1">
                                <label for="customcheckbox2">&nbsp;&nbsp;Gasto facturado</label>
                            </span>
                        </div>
                        <!-- Si el gasto es facturado mostramos uploaders -->
                        <div class="form-group" id="edita_pdf" style="display:none;"><br />
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Archivo PDF (opcional)</label>
                                    <div class="input-group">
                                        <input type="text" id="pdf_edit" class="form-control" readonly>
                                        <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                       <span class="icon iconmoon-file-3"></span> Seleccionar <input type="file" name="pdf" accept="application/pdf">
                                    </div>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Archivo XML (opcional)</label>
                                    <div class="input-group">
                                        <input type="text" id="xml_edit" class="form-control" readonly>
                                        <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                       <span class="icon iconmoon-file-3"></span> Seleccionar <input type="file" name="xml" accept="application/xml">
                                    </div>
                                    </span>
                                    </div>
                                </div>
                            </div>
                       </div>
                       <!-- Termina -->
                    </div>
                </div>
            </div>
             <input type="hidden" id="id_mod" val="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" data-style="zoom-in" id="btn_edita"><span class="ladda-label">Guardar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal EDITA -->


<!-- Modal -->
<div class="modal fade" id="ModalConfirma">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <h5 class="modal-title">Confirmación</h5>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger oculto" role="alert" id="msg_error2"></div>
<!-- Loader -->
    <div class="row oculto" id="load_big">
      <div class="col-md-12 text-center" >
        <img src="assets/global/img/loading-spinner-grey.gif" border="0" width="50" />
      </div>
    </div>
<!--Formulario -->
    <center><h3 id="msj_confirma">¿Está usted seguro de eliminar este gasto?</h3></center>
    <input type="hidden" id="id_elimina" value="">      
      </div>
      <div class="modal-footer">        
        <img src="assets/global/img/loading-spinner-grey.gif" border="0" id="load2" width="30" class="oculto" />
        <button type="button" class="btn btn-default btn_ac btn-modal" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger btn_ac btn-modal" onclick="ac_elimina_gasto()">Si</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->