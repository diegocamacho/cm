<?
include('../app/includes/db.php');
include('../app/includes/funciones.php');
$email=$_GET['m'];
$token=$_GET['token'];

if(!$email) header('Location: index.php');
if(!$token) header('Location: index.php');

$sql="SELECT * FROM credenciales WHERE email='$email' AND token='$token' AND activo=1";
$q=mysql_query($sql);
$v=mysql_num_rows($q);
if(!$v) header('Location: index.php');
?>
<section id="main" role="main">
    <!-- START page header -->
    <section class="page-header page-header-block nm hide">
        <!-- pattern -->
        <div class="pattern pattern9"></div>
        <!--/ pattern -->
        <div class="container pt15 pb15">
            <div class="page-header-section">
                <h4 class="title">Recueperar Contraseña</h4>
            </div>
            <div class="page-header-section hide">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="javascript:void(0);">Pages</a></li>
                        <li class="active">Account Register</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!--/ END page header -->

    <!-- START Register Content -->
    <section class="section">
        <div class="container">
            <!-- START Section Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center">
                        <h1 class="section-title font-alt mb25">Recuper a tu contraseña</h1>
                        <div class="row hide">
                            <div class="col-md-8 col-md-offset-2">
                                <h4 class="thin text-muted text-center">
                                    Administrar tu consultorio nunca fue tan fácil y economico, te presentamos ProMedica, registrate para tener la app más avanzada del mercado.
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ END Section Header -->

            <!-- START Row -->
            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <!-- Register form -->
                    <form class="panel no-border nm" name="frm-registro" id="frm-registro">
	                    <ul class="list-table pa15" id="msg" style="display: none;">
                            <li>
                                <!-- Alert message -->
                                <div class="alert alert-danger nm" id="msg_data">
                                    
                                </div>
                                <!--/ Alert message -->
                            </li>
                        </ul>
                        
                        
                        <div class="panel-body">
                            
                            <div class="form-group" id="form-contrasena">
                                <label class="control-label">Nueva contraseña</label>
                                <div class="has-icon pull-left">
                                    <input type="password" class="form-control" name="contrasena" id="contrasena" maxlength="16">
                                    <i class="ico-key2 form-control-icon"></i>
                                </div>
                                <span id="msg-contrasena" class="help-block" style="display: none;"></span>
                            </div>
                            
                            <div class="form-group" id="form-contrasena2">
                                <label class="control-label">Repite la contraseña</label>
                                <div class="has-icon pull-left">
                                    <input type="password" class="form-control" name="contrasena2" id="contrasena2" maxlength="16">
                                    <i class="ico-key2 form-control-icon"></i>
                                </div>
                                <span id="msg-contrasena2" class="help-block" style="display: none;"></span>
                            </div>

                            
                        </div>
                        <div class="panel-footer">
	                        <input type="hidden" name="email" value="<?=$email?>" />
	                        <input type="hidden" name="token" value="<?=$token?>" />
                            <button type="button" class="btn btn-block btn-lg btn-success" id="btn-recupera"><span class="semibold">Restablecer mi contraseña</span></button>
                        </div>
                    </form>
                    <!-- Register form -->
                </div>
            </div>
            <!--/ END Row -->
        </div>
    </section>
    <!--/ END Register Content -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->
</section>


<script>
$(function(){
	
	$('.form-control').keyup(function(e) {
	
			if(e.keyCode==13){
				registra();
			}
	
	});
	
	
	
    
    $("#contrasena").blur(function() {
		var contrasena = $('#contrasena').val();
		if(contrasena){ 
			$('#form-contrasena').removeClass('has-error')
			$('#msg-contrasena').hide();
			return false;
		}
    });
    
    $("#contrasena2").blur(function() {
		var contrasena2 = $('#contrasena2').val();
		if(contrasena2){ 
			$('#form-contrasena2').removeClass('has-error')
			$('#msg-contrasena2').hide();
			return false;
		}
    });
	

	$("#btn-recupera").click(function() {
		var contrasena = $('#contrasena').val();
		var contrasena2 = $('#contrasena2').val();
		
		if(contrasena==contrasena2){
			recupera();
		}else{
			$('#msg_data').html("Las contraseñas deben coincidir");
	    	$('#msg').show();
	    	$('#contrasena2').focus();
		}
	});
	
	
});
function recupera(){
		
		var formulario=$('#frm-registro').serialize();
		$.post('ac/cambia_contrasena.php',formulario,function(data){
	    	if(data==1){
		    	window.open("app/login.php", "_self");
	    	}else{
		    	$('#msg_data').html(data);
	    		$('#msg').show();
	    	}
		});
}

</script>