<?
include('includes/session_ui.php');
include('includes/db.php');
include('includes/funciones.php');
?>
<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Calidad Médica</title>
        <meta name="author" content="epicmedia.pro">
        <meta name="description" content="App para el contreol de consulta medica y consultorios">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="image/touch/apple-touch-icon.png">

        <!-- CSS: mandatory -->
        <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet/layout.min.css">
        <link rel="stylesheet" href="stylesheet/uielement.min.css">
        <link rel="stylesheet" href="plugins/jqueryui/css/jquery-ui.min.css">
         
        <!--/ CSS -->
        
		<!-- START CSS NO MANDATORY -->
		<?php
		$menu_php = isset($_GET['Modulo']) ? $_GET['Modulo']: NULL;
		
		switch($menu_php){
			    	
		    case 'Agenda': 
		    ?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/fullcalendar/css/fullcalendar.min.css">
			<? 
		    break;
		    
		    case 'ConsultasAtendidas':
		    ?>
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<? 
		    break;
		    
		    case 'ConsultasAgendadas':
		    ?>
			 
			 
			<? 
		    break;
		    
			case 'Consulta';
			?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/summernote/css/summernote.css">
			<!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">-->
			<?
			break;
		    case 'PerfilPaciente':
		    ?>
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<? 
		    break;
		    
		    case 'Recordatorios':
		    ?>
			<link rel="stylesheet" href="plugins/switchery/css/switchery.min.css">
			<link rel="stylesheet" href="plugins/fullcalendar/css/fullcalendar.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<? 
		    break;

		    case 'Ingresos':
		    ?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<? 
		    break;
		    
		    case 'Gastos':
		    ?>
			 
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<? 
		    break;
		    
		    case 'Cuentas':
		    ?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<?
			break;
			
		    case 'NuevoCFDI':
		    ?>
			<link rel="stylesheet" href="plugins/steps/css/jquery-steps.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<? 
		    break;

		    case 'RecibosEmitidos':
		    ?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<? 
		    break;
		    
		    case 'FacturasRecibidas':
		    ?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<? 
		    break;
		    
		    case 'Aseguradoras':
		    ?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<?
			break;
			
			case 'Recetas':
			?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<?
			break;
			
			case 'Secretarias':
			?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<?
			break;
			
			case 'Clinicas':
			?>
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<link rel="stylesheet" href="plugins/datatables/css/jquery.datatables.min.css">
			<link rel="stylesheet" href="plugins/selectize/css/selectize.min.css">
			<?
			break;
			 
		}
		?>
		
		<!-- END CSS NO MANDATORY -->
		
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
        
        <script src="plugins/storage/store.min.js"></script>

		<script>
		    init()
		    function init() {
		        if (!store.enabled) {
		            alert('Local storage is not supported by your browser. Please disable "Private Mode", or upgrade to a modern browser.')
		            return
		        }
		    }
/*
// Store 'marcus' at 'username'
store.set('username', 'marcus')

// Get 'username'
store.get('username')

// Remove 'username'
store.remove('username')

// Clear all keys
store.clear()

// Store an object literal - store.js uses JSON.stringify under the hood
store.set('user', { name: 'marcus', likes: 'javascript' })

// Get the stored object - store.js uses JSON.parse under the hood
var user = store.get('user')
alert(user.name + ' likes ' + user.likes)

*/
		    
		    store.get('username');
		    store.set('id_clinica', '2')
		</script>

    </head>

    <body>
        <!-- Header -->
        <? include("header.php"); ?>
        <!-- Header -->

        <!-- Sidebar -->
        <? include("sidebar.php"); ?>
		<!--Sidebar -->
		
        <!-- Módulo -->
		<?php
		$menu_php = isset($_GET['Modulo']) ? $_GET['Modulo']: NULL;
		
		switch($menu_php){
			    	
		    case 'Agenda':
		    include("agenda.php");	
		    break;
		    
		    //Consultas
		    	case 'ConsultasAgendadas':
		    	include("consultas_agendadas.php");
		    	break;
		    	
		    	case 'Consulta':
		    	include("consulta.php");
		    	break;
		    	
		    	case 'ConsultasAtendidas':
		    	include("consultas_atendidas.php");
		    	break;

		    case 'Pacientes':
		    include("pacientes.php");
		    break;
		    	
		    	case 'PerfilPaciente':
				include("perfil_paciente.php");
				break;
		    
		    case 'Recordatorios':
		    include("recordatorios.php");
		    break;

		    case 'Ingresos':
		    include("ingresos.php");
		    break;
		    
		    case 'Gastos':
		    include("gastos.php");
		    break;
		    
		    case 'Cuentas':
		    include("cuentas.php");
		    break;
		    		  
		    case 'NuevoCFDI':
		    include("nuevo_cfdi.php");
		    break;

		    case 'RecibosEmitidos':
		    include("recibos_emitidos.php");
		    break;
		    
		    case 'FacturasRecibidas':
		    include("facturas_recibidas.php");
		    break;
		    
		    //Configuración
		    	case 'MiCuenta';
		    	include("mi_cuenta.php");
		    	break;
		    	
		    	case 'Facturacion';
		    	include("facturacion.php");
		    	break;
		    	
		    	case 'Aseguradoras';
		    	include("aseguradoras.php");
		    	break;
		    	
		    	case 'Recetas';
		    	include("recetas.php");
		    	break;
		    	
		    	case 'Secretarias';
		    	include("secretarias.php");
		    	break;
		    	
		    	case 'Clinicas';
		    	include("clinicas.php");
		    	break;
		    
		    //Tienda
		    case 'Tienda':
		    include("tienda.php");
		    break;

		    //Reportes
		    case 'ReporteGasto':
		    include("repo_gasto.php");
		    break;

		    	case 'ReporteIngreso':
			    include("repo_ingreso.php");
			    break;

			    case 'ReporteConsultas':
			    include("repo_consultas.php");
			    break;

			    case 'ReporteFacturas':
			    include("repo_facturas.php");
			    break;
		    		    
		    default:
		    include('dashboard.php');
		    
		}
		?>
        <!-- Módulo -->

    </body>
</html>