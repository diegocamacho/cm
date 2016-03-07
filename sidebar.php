<?php
$menu_php = isset($_GET['Modulo']) ? $_GET['Modulo']: NULL;

switch($menu_php){
	    	
    case 'Agenda':
    $agenda_active = "active";	
    break;
    
    case 'ConsultasAgendadas':
    $consultas_active = "1";
	$consultas_agendadas_active = "active";
    break;
    
    case 'ConsultasAtendidas':
    $consultas_active = "1";
	$consultas_atendidas_active = "active";
    break;
    
    case 'Consulta':
    $consultas_active = "1";
    break;

    case 'Pacientes':
	$pacientes_active = "active";
    break;
    
    case 'Recordatorios':
    $recordatorios_active = "active";
    break;

    case 'Ingresos':
	$ingresos_active = "active";
    break;
    
    case 'Gastos':
	$gastos_active = "active";
    break;
    
    case 'Cuentas':
	$cuentas_active = "active";
    break;
    
    case 'NuevoCFDI':
    $facturacion_active = "1";
	$nuevo_recibo_active = "active";
    break;
    
    case 'RecibosEmitidos':
    $facturacion_active = "1";
	$recibos_emitidos_active = "active";
    break;
    
    case 'FacturasRecibidas':
    $facturacion_active = "1";
	$facturas_recibidas_active = "active";
    break;
    
    case 'Noticias':
	$noticias_active = "active";
    break;
    
    case 'Tienda':
	$tienda_active = "active";
    break;
    
    case 'MiCuenta':
    $configuracion_active = "1";
    $mi_cuenta_active = "active";
    break;
    
    case 'Facturacion':
    $configuracion_active = "1";
    $configura_facturacion_active = "active";
    break;
    
    case 'Aseguradoras':
    $configuracion_active = "1";
    $aseguradoras_active = "active";
    break;
    
    case 'Recetas':
    $configuracion_active = "1";
    $recetas_active = "active";
    break;
    
    case 'Secretarias':
    $configuracion_active = "1";
    $secretarias_active = "active";
    break;
    
    case 'Clinicas':
    $configuracion_active = "1";
    $clinicas_active = "active";
    break;
    
    default:
    $panel_active ="active";	    
	break;
}

//Número de citas para el día
$sql_citas="SELECT * FROM agenda WHERE id_medico=$id_medico AND activo=1 AND fecha='$fecha_actual'";
$q_citas=mysql_query($sql_citas);
$numero=mysql_num_rows($q_citas);

$sql_citas2="SELECT * FROM agenda WHERE id_medico=$id_medico AND activo=1 AND fecha='$fecha_actual' AND hora > '$hora_actual'";
$q_citas2=mysql_query($sql_citas2);
$numero2=mysql_num_rows($q_citas2);

//Número de todos pendientes de checar
$q_recordatorios = mysql_query("SELECT * FROM recordatorios WHERE id_medico=$id_medico AND (checa=0 OR checa IS NULL)");
$num_record = mysql_num_rows($q_recordatorios);
?>


<!-- START Template Sidebar (Left) -->
<aside class="sidebar sidebar-left sidebar-menu">
    <!-- START Sidebar Content -->
    <section class="content slimscroll">
        <h5 class="heading"></h5>
        <!-- START Template Navigation/Menu -->
        <ul class="topmenu" data-toggle="menu">
            <li class="<?=$panel_active?>">
                <a href="index.php" data-target="#dashboard" data-parent=".topmenu">
                    <span class="figure"><i class="ico-home2"></i></span>
                    <span class="text">Panel de Control</span>
                </a>
            </li>
            
            <li class="<?=$agenda_active?>">
                <a href="?Modulo=Agenda">
                    <span class="figure"><i class="ico-calendar6"></i></span>
                    <span class="text">Agenda</span>
                    <? if($numero){ ?>
                    <span class="number"><span class="label label-primary"><?=$numero?></span></span>
                    <? } ?>
                </a>
            </li>
            
            <li <? if($consultas_active==1){ ?> class="active open" <? } ?>>
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#consultas" data-parent=".topmenu">
                	<span class="figure">
                    	<span class="hasnotification hasnotification-primary" title="¡Hay consultas para hoy!"></span>
                    	<i class="ico-user-plus2"></i>
                    </span>
                    <span class="text">Consultas</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="consultas" class="submenu collapse <? if($consultas_active==1){ ?>in<? } ?>">
                    <li class="<?=$consultas_agendadas_active?>">
                        <a href="?Modulo=ConsultasAgendadas">
                            <span class="text">Agendadas</span>
                            <? if($numero2){ ?>
                            <span class="number"><span class="label label-primary"><?=$numero2?></span></span>
                            <? } ?>
                        </a>
                    </li>
                    <li <? if($consultas_nueva_active==1){ ?> class="active" <? } ?>>
                        <a href="?Modulo=Consulta">
                            <span class="text">Nueva</span>
                        </a>
                    </li>
                    <li class="<?=$consultas_atendidas_active?>">
                        <a href="?Modulo=ConsultasAtendidas">
                            <span class="text">Consultas Atendidas</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            
            <li class="<?=$pacientes_active?>">
                <a href="?Modulo=Pacientes">
                    <span class="figure"><i class="ico-users"></i></span>
                    <span class="text">Pacientes</span>
                </a>
            </li>
            
            <li class="<?=$recordatorios_active?>">
                <a href="?Modulo=Recordatorios">
                    <span class="figure"><i class="ico-tasks"></i></span>
                    <span class="text">Recordatorios</span>
                    <span class="number"><span class="label label-primary"><?=$num_record?></span></span>
                </a>
            </li>
            
            <li class="<?=$ingresos_active?>">
                <a href="?Modulo=Ingresos">
                    <span class="figure"><i class="ico-coins"></i></span>
                    <span class="text">Ingresos</span>
                </a>
            </li>
            
            <li class="<?=$gastos_active?>">
                <a href="?Modulo=Gastos">
                    <span class="figure"><i class="ico-credit2"></i></span>
                    <span class="text">Gastos</span>
                </a>
            </li>
            
            <li class="<?=$cuentas_active?>">
                <a href="?Modulo=Cuentas">
                    <span class="figure"><i class="ico-stackexchange"></i></span>
                    <span class="text">Cuentas Por Cobrar</span>
                </a>
            </li>

			<li <? if($facturacion_active==1){ ?> class="active open" <? } ?>>
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#facturacion" data-parent=".topmenu">
                    <span class="figure"><i class="ico-bar-chart"></i></span>
                    <span class="text">Facturación</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="facturacion" class="submenu collapse <? if($facturacion_active==1){ ?>in<? } ?>">
                    <li class="<?=$nuevo_recibo_active?>" >
                        <a href="?Modulo=NuevoCFDI">
                            <span class="text">Nuevo Recibo CFDI</span>
                        </a>
                    </li>
                    <li class="<?=$recibos_emitidos_active?>">
                        <a href="?Modulo=RecibosEmitidos">
                            <span class="text">Recibos Emitidos</span>
                        </a>
                    </li>
                    <li class="<?=$facturas_recibidas_active?>">
                        <a href="?Modulo=FacturasRecibidas">
                            <span class="text">Facturas Recibidas</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            
            <!-- Reportes -->
            
            <li >
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#reportes" data-parent=".topmenu">
                    <span class="figure"><i class="ico-paste4"></i></span>
                    <span class="text">Reportes</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="reportes" class="submenu collapse ">
                    <li >
                        <a href="#">
                            <span class="text">Agenda</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Consultas</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Ingresos</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Gastos</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Facturas</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            
            <!-- Noticias
            <li class="<?=$noticias_active?>">
                <a href="?Modulo=Noticias">
                    <span class="figure"><i class="ico-newspaper"></i></span>
                    <span class="text">Noticias</span>
                </a>
            </li>
            -->
            <li <? if($configuracion_active==1){ ?> class="active open" <? } ?>>
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#configuracion" data-parent=".topmenu">
                    <span class="figure"><i class="ico-grid"></i></span>
                    <span class="text">Configuración</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="configuracion" class="submenu collapse <? if($configuracion_active==1){ ?>in<? } ?> ">
                    <li class="<?=$mi_cuenta_active?>">
                        <a href="index.php?Modulo=MiCuenta">
                            <span class="text">Mi Cuenta</span>
                        </a>
                    </li>
                    <li class="<?=$configura_facturacion_active?>">
                        <a href="index.php?Modulo=Facturacion">
                            <span class="text">Facturación</span>
                        </a>
                    </li>
                    <li class="<?=$aseguradoras_active?>">
                        <a href="index.php?Modulo=Aseguradoras">
                            <span class="text">Aseguradoras</span>
                        </a>
                    </li>
                    <li class="<?=$recetas_active?>">
                        <a href="index.php?Modulo=Recetas">
                            <span class="text">Recetas</span>
                        </a>
                    </li>
                    <li class="<?=$secretarias_active?>">
                        <a href="index.php?Modulo=Secretarias">
                            <span class="text">Secretarias</span>
                        </a>
                    </li>
                    <li class="<?=$clinicas_active?>">
                        <a href="index.php?Modulo=Clinicas">
                            <span class="text">Clínicas</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <!--
            <li class="<?$tienda_active?>">
                <a href="index.php?Modulo=Tienda">
                    <span class="figure">
                    	<span class="hasnotification hasnotification-primary" title="Nuevos Productos"></span>
                    	<i class="ico-bag3"></i>
                    </span>
                    <span class="text">Tienda</span>
                </a>
            </li>
            -->
        </ul>
        <!--/ END Template Navigation/Menu -->
    </section>
    <!--/ END Sidebar Container -->
</aside>
<!--/ END Template Sidebar (Left) -->