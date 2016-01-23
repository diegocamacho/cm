<?
$sql="SELECT * FROM aseguradoras WHERE id_medico='$id_credencial' AND activo='1'";
$query=mysql_query($sql);
$muestra=mysql_num_rows($query);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Aseguradoras</h4>
            </div>
            <div class="page-header-section text-right">
            	<a class="btn btn-sm btn-primary" href="javascript:void(0);" role="button" data-nuevo="1" data-toggle="modal" data-backdrop="static" data-target="#NuevaAseguradora">Nueva Aseguradora</a>
            </div>
        </div>
  
        <!-- Tabla y acciones -->
        <div class="row">
            <div class="col-md-12">
            	<? if($_GET['msg']==1){ ?>
            	<div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡La aseguradora se ha agregado!
                </div>
                <? }elseif($_GET['msg']==2){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡La aseguradora se ha editado!
                </div>
                <? }elseif($_GET['msg']==3){ ?>
                <div class="alert alert-dismissable alert-success animation animating flipInX">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ¡La aseguradora se ha eliminado!
                </div>
                <? } ?>
                <? if($muestra){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Aseguradoras</h3>
                    </div>
                   
                    <table class="table table-striped" id="zero-configuration">
	                    <!--
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        -->
                        <tbody>
                        <? while($ft=mysql_fetch_assoc($query)){ ?>
                            <tr>
                                <td><a href="#"><?=$ft['nombre_aseguradora']?></a></td>
                                <td align="right">
	                                <div class="btn-group mb5 ml10">
	                                <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown">Acciones <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu" style="min-width: 0px;">
                                        <li><a href="#" role="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#NuevaAseguradora" data-id="<?=$ft['id_aseguradora']?>">Editar</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:void(0);" role="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#EliminaAseguradora" data-id-elimina="<?=$ft['id_aseguradora']?>">Eliminar</a></li>
                                    </ul>
                                	</div>
                                </td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
                <? }else{ ?>
                <div class="alert alert-dismissable alert-warning animation animating flipInX">
                    No se han agregado aseguradoras :(
                </div>
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
	//Limpiamos el local storage
	store.clear();
	
	//Nueva Aseguradora
	$('#btn_guarda').click(function(){
	 	ac_form();
	 });
	 
	 $('#btn_eliminar').click(function(){
	 	ac_form(1);
	 });
	 
	
	 $(document).on('click', '[data-id]', function () {
		 var data_id = $(this).attr('data-id');
		 $('.mod').val(''); 
		 $('#titulo').html('Editar Aseguradora');
		 $.ajax({
			url: "data/aseguradora.php",
	 		data: 'id_aseguradora='+data_id,
	 		success: function(data){
				$('#nombre').val(data);
				store.set('id_aseguradora',data_id);
			},
			cache: false
		});
	 });
	 
	$('#NuevaAseguradora').on('shown.bs.modal', function (e) {
		$('#nombre').focus();		
  	});
	 
	$('form').submit(function(e) {
		ac_form();
		e.preventDefault();
	});
	
	$(document).on('click', '[data-nuevo]', function () {
		 $('.mod').val('');
		 store.remove('id_aseguradora');
		 $('#titulo').html('Nueva Aseguradora');
	});
	
	$(document).on('click', '[data-id-elimina]', function () {
		var id_aseguradora = $(this).attr('data-id-elimina');
		store.set('id_aseguradora',id_aseguradora);
	});
	

});

function ac_form(elimina){

	if(!elimina){
		elimina = '0';
	}else{
		var btn_eliminar = Ladda.create(document.querySelector('#btn_eliminar'));
		btn_eliminar.start();
	}

	var datos=$('#frm_guarda').serialize();

	var btn_guarda = Ladda.create(document.querySelector('#btn_guarda'));
	
	btn_guarda.start();
	$('.mod').attr("disabled", true);

	
	if(!store.get('id_aseguradora')){
		var id_aseguradora = 0;
	}else{
		var id_aseguradora = store.get('id_aseguradora');
	}
	
	$.post('ac/aseguradoras.php',datos+'&id_aseguradora='+id_aseguradora+'&eliminar='+elimina,function(data){

	    if(data==1){
	    	location.href = "?Modulo=Aseguradoras&msg=1";
	    }else if(data==2){
	    	location.href = "?Modulo=Aseguradoras&msg=2";
	    }else if(data==3){
	    	location.href = "?Modulo=Aseguradoras&msg=3";
	    }else{
	    
	    	if(elimina==1){
		    	$('#msg_data2').html(data);
	    		$('#msg2').show();
	    		$('#msg2').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    		$('.mod').removeAttr("disabled");
	    		btn_eliminar.stop();
	    	}else{
	    		$('#msg_data').html(data);
	    		$('#msg').show();
	    		$('#msg').attr("class","alert alert-dismissable alert-danger animation animating flipInX");
	    		btn_guarda.stop();
	    		$('.mod').removeAttr("disabled");
	    		$('#nombre').focus();
	    	}
	    	
	    }
	});
};
</script>

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>
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

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->


<!-- START Modal -->
<div id="NuevaAseguradora" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" id="frm_guarda">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-briefcase mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary" id="titulo">Nueva Aseguradora</h4>
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
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<label class="control-label">Nombre <span class="text-danger">*</span></label>
									<input type="text" class="form-control mod" name="nombre" id="nombre" autocomplete="off" maxlength="45">
								</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mod btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success ladda-button" data-style="zoom-in" id="btn_guarda"><span class="ladda-label">Guardar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->


<!-- START Modal -->
<div id="EliminaAseguradora" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" id="frm_guarda">
            <div class="modal-header">
                <div class="cell text-center">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-trash mb15 mt15 fsize32"></div>
                    <h4 class="semibold text-primary " id="titulo">Elimina Aseguradora</h4>
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
						<h5 class="text-center">¿Desea eliminar aseguradora?</h5>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn mod btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" id="btn_eliminar"><span class="ladda-label">Aceptar</span></button>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END Modal -->