
<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Calidad Médica</title>
        <meta name="author" content="DigmaStudio.com">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="image/touch/apple-touch-icon.png">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet/layout.min.css">
        <link rel="stylesheet" href="stylesheet/uielement.min.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->
		<!-- START CSS NO MANDATORY -->
		<link rel="stylesheet" href="plugins/jqueryui/css/jquery-ui.min.css">
		<!-- END CSS NO MANDATORY -->
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <!-- Header -->
        <!-- START Template Header -->
<header id="header" class="navbar navbar-fixed-top">
    <!-- START navbar header -->
    <div class="navbar-header">
        <!-- Brand -->
        <a class="navbar-brand" href="javascript:void(0);">
            <span class="logo-figure"></span>
            <span class="logo-text"></span>
        </a>
        <!--/ Brand -->
    </div>
    <!--/ END navbar header -->

    <!-- START Toolbar -->
    <div class="navbar-toolbar clearfix">
        <!-- START Left nav -->
        <ul class="nav navbar-nav navbar-left">
            <!-- Sidebar shrink -->
            <li class="hidden-xs hidden-sm">
                <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                    <span class="meta">
                        <span class="icon"></span>
                    </span>
                </a>
            </li>
            <!--/ Sidebar shrink -->

            <!-- Navbar collapse -->
            <li class="navbar-toggle">
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="meta">
                        <span class="icon"><i class="ico-sort-by-attributes-alt"></i></span>
                    </span>
                </a>
            </li>
            <!--/ Navbar collapse -->

            <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
            <li class="navbar-main hidden-lg hidden-md hidden-sm">
                <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                    <span class="meta">
                        <span class="icon"><i class="ico-paragraph-left3"></i></span>
                    </span>
                </a>
            </li>
            <!--/ Offcanvas left -->

            <!-- Notification dropdown -->
            <li class="dropdown custom" id="header-dd-notification">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="meta">
                        <span class="icon"><i class="ico-bell"></i></span>
                        <span class="hasnotification hasnotification-danger"></span>
                    </span>
                </a>

                <!-- mustache template: used for update the `.media-list` requested from server-side -->
                <script class="mustache-template" type="x-tmpl-mustache">
                
                    {{#data}}
                    <a href="javascript:void(0);" class="media border-dotted new">
                        <span class="media-object pull-left">
                            <i class="{{icon}}"></i>
                        </span>
                        <span class="media-body">
                            <span class="media-text">{{{text}}}</span>
                            <span class="media-meta pull-right">{{meta.time}}</span>
                        </span>
                    </a>
                    {{/data}}
                
                </script>
                <!--/ mustache template -->

                <!-- Dropdown menu -->
                <div class="dropdown-menu" role="menu">
                    <div class="dropdown-header">
                        <span class="title">Notification <span class="count"></span></span>
                        <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span>
                    </div>
                    <div class="dropdown-body slimscroll">
                        <!-- indicator -->
                        <div class="indicator inline"><span class="spinner"></span></div>
                        <!--/ indicator -->

                        <!-- Message list -->
                        <div class="media-list">
                            <a href="javascript:void(0);" class="media read border-dotted">
                                <span class="media-object pull-left">
                                    <i class="ico-basket2 bgcolor-info"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">Duis aute irure dolor in <span class="text-primary semibold">reprehenderit</span> in voluptate.</span>
                                    <!-- meta icon -->
                                    <span class="media-meta pull-right">2d</span>
                                    <!--/ meta icon -->
                                </span>
                            </a>

                            <a href="javascript:void(0);" class="media read border-dotted">
                                <span class="media-object pull-left">
                                    <i class="ico-call-incoming"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">Aliquip ex ea commodo consequat.</span>
                                    <!-- meta icon -->
                                    <span class="media-meta pull-right">1w</span>
                                    <!--/ meta icon -->
                                </span>
                            </a>

                            <a href="javascript:void(0);" class="media read border-dotted">
                                <span class="media-object pull-left">
                                    <i class="ico-alarm2"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">Excepteur sint <span class="text-primary semibold">occaecat</span> cupidatat non.</span>
                                    <!-- meta icon -->
                                    <span class="media-meta pull-right">12w</span>
                                    <!--/ meta icon -->
                                </span>
                            </a>

                            <a href="javascript:void(0);" class="media read border-dotted">
                                <span class="media-object pull-left">
                                    <i class="ico-checkmark3 bgcolor-success"></i>
                                </span>
                                <span class="media-body">
                                    <span class="media-text">Lorem ipsum dolor sit amet, <span class="text-primary semibold">consectetur</span> adipisicing elit.</span>
                                    <!-- meta icon -->
                                    <span class="media-meta pull-right">14w</span>
                                    <!--/ meta icon -->
                                </span>
                            </a>
                        </div>
                        <!--/ Message list -->
                    </div>
                </div>
                <!--/ Dropdown menu -->
            </li>
            <!--/ Notification dropdown -->

        </ul>
        <!--/ END Left nav -->

        <!-- START Right nav -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Profile dropdown -->
            <li class="dropdown profile">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="meta">
                        <span class="avatar"><img src="image/avatar/avatar7.jpg" class="img-circle" alt="" /></span>
                        <span class="text hidden-xs hidden-sm pl5">Diego Camacho</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0);"><span class="icon"><i class="ico-user-plus2"></i></span>Mi Cuenta</a></li>
                    <li><a href="javascript:void(0);"><span class="icon"><i class="ico-credit2"></i></span>Estado de Cuenta</a></li>
                    <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span>Ayuda</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0);"><span class="icon"><i class="ico-exit"></i></span>Cerrar Sesión</a></li>
                </ul>
            </li>
            <!--/ Profile dropdown -->

            <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior 
            <li class="navbar-main">
                <a href="javascript:void(0);" data-toggle="offcanvas" data-direction="rtl" rel="tooltip" title="Feed / contact sidebar">
                    <span class="meta">
                        <span class="icon"><i class="ico-users3"></i></span>
                    </span>
                </a>
            </li>
            <!--/ Offcanvas right -->
        </ul>
        <!--/ END Right nav -->

    </div>
    <!--/ END Toolbar -->
</header>
<!--/ END Template Header -->        <!-- Header -->

        <!-- Sidebar -->
        <!-- START Template Sidebar (Left) -->
<aside class="sidebar sidebar-left sidebar-menu">
    <!-- START Sidebar Content -->
    <section class="content slimscroll">
        <h5 class="heading"></h5>
        <!-- START Template Navigation/Menu -->
        <ul class="topmenu" data-toggle="menu">
            <li class="active">
                <a href="javascript:void(0);" data-target="#dashboard" data-parent=".topmenu">
                    <span class="figure"><i class="ico-home2"></i></span>
                    <span class="text">Panel de Control</span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-calendar6"></i></span>
                    <span class="text">Agenda</span>
                    <span class="number"><span class="label label-primary">5</span></span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-user-plus2"></i></span>
                    <span class="text">Consultas</span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-users"></i></span>
                    <span class="text">Pacientes</span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-tasks"></i></span>
                    <span class="text">Recordatorios</span>
                    <span class="number"><span class="label label-danger">1</span></span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-coins"></i></span>
                    <span class="text">Ingresos</span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-credit2"></i></span>
                    <span class="text">Gastos</span>
                </a>
            </li>

			<li >
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#facturacion" data-parent=".topmenu">
                    <span class="figure"><i class="ico-bar-chart"></i></span>
                    <span class="text">Facturación</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="facturacion" class="submenu collapse ">
                    <li >
                        <a href="#">
                            <span class="text">Nuevo Recibo CFDI</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Recibos Emitidos</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Facturas Recibidas</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure"><i class="ico-newspaper"></i></span>
                    <span class="text">Noticias</span>
                </a>
            </li>
            
            <li >
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#configuracion" data-parent=".topmenu">
                    <span class="figure"><i class="ico-grid"></i></span>
                    <span class="text">Configuración</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="configuracion" class="submenu collapse ">
                    <li >
                        <a href="#">
                            <span class="text">Mi Cuenta</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Alertas</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Facturación</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Recetas</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Secretarias</span>
                        </a>
                    </li>
                    <li >
                        <a href="#">
                            <span class="text">Usuarios</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            
            <li>
                <a href="javascript:void(0);">
                    <span class="figure">
                    	<span class="hasnotification hasnotification-success" title="Nuevos Productos"></span>
                    	<i class="ico-bag3"></i>
                    </span>
                    <span class="text">Tienda</span>
                </a>
            </li>
            
        </ul>
        <!--/ END Template Navigation/Menu -->
    </section>
    <!--/ END Sidebar Container -->
</aside>
<!--/ END Template Sidebar (Left) -->		<!--Sidebar -->
		
        <!-- Módulos -->
        


<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">Calendar</h4>
                    </div>
                    <div class="page-header-section text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalAddEvent"><span class="ico-plus-circle2"></span> Add Event</button>
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-calendar3"></i></span> Calendar</h3>
                                <!-- panel toolbar -->
                                <div class="panel-toolbar text-right">
                                    <!-- option -->
                                    <div class="option">
                                        <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                                        <button class="btn" data-toggle="panelremove"><i class="remove"></i></button>
                                    </div>
                                    <!--/ option -->
                                </div>
                                <!--/ panel toolbar -->
                            </div>
                            <div class="panel-collapse pull out">
                                <div id="full_calendar" class="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ END row -->

                <!-- START Modal -->
                <div id="ModalAddEvent" class="modal fade">
                    <div class="modal-dialog">
                        <form class="modal-content" action="">
                            <div class="modal-header">
                                <div class="cell text-center">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <div class="ico-calendar-empty mb15 mt15 fsize32"></div>
                                    <h4 class="semibold text-primary">Add new event</h4>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Event Name <span class="text-danger">*</span></label>
                                            <input name="eventname" type="text" class="form-control" data-parsley-required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label">Date (from) <span class="text-danger">*</span></label>
                                                    <input id="datepicker-from" name="datefrom" type="text" class="form-control" placeholder="01/01/2014" data-parsley-required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">Date (to)</label>
                                                    <input id="datepicker-to" name="dateto" type="text" class="form-control" placeholder="30/01/2014">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="control-label">All day event ?</label>
                                                    <select class="form-control" name="allday">
                                                        <option value="no">No</option>
                                                        <option value="yes">yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="control-label">Event Color</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span class="radio-inline custom-radio custom-radio-primary">  
                                                        <input type="radio" name="eventcolor" id="color1" value="primary" checked data-parsley-group="event-color">  
                                                        <label for="color1" class="pl10"></label>   
                                                    </span>
                                                    <span class="radio-inline custom-radio custom-radio-info">  
                                                        <input type="radio" name="eventcolor" id="color2" value="info" data-parsley-group="event-color">  
                                                        <label for="color2" class="pl10"></label>   
                                                    </span>
                                                    <span class="radio-inline custom-radio custom-radio-success">  
                                                        <input type="radio" name="eventcolor" id="color3" value="success" data-parsley-group="event-color">  
                                                        <label for="color3" class="pl10"></label>   
                                                    </span>
                                                    <span class="radio-inline custom-radio custom-radio-warning">  
                                                        <input type="radio" name="eventcolor" id="color4" value="warning" data-parsley-group="event-color">  
                                                        <label for="color4" class="pl10"></label>   
                                                    </span>
                                                    <span class="radio-inline custom-radio custom-radio-danger">  
                                                        <input type="radio" name="eventcolor" id="color5" value="danger" data-parsley-group="event-color">  
                                                        <label for="color5" class="pl10"></label>   
                                                    </span>
                                                    <span class="radio-inline custom-radio custom-radio-teal">  
                                                        <input type="radio" name="eventcolor" id="color6" value="teal" data-parsley-group="event-color">  
                                                        <label for="color6" class="pl10"></label>   
                                                    </span>
                                                    <span class="radio-inline custom-radio custom-radio-inverse">  
                                                        <input type="radio" name="eventcolor" id="color7" value="inverse" data-parsley-group="event-color">  
                                                        <label for="color7" class="pl10"></label>   
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea name="eventdescription" class="form-control" rows="4" placeholder="Describe your event"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!--/ END Modal -->
            </div>

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->



<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="javascript/app.min.js"></script>

<script type="text/javascript" src="plugins/jqueryui/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="plugins/fullcalendar/js/fullcalendar.min.js"></script>

<script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>

<script type="text/javascript" src="javascript/pages/calendar.js"></script>

<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->        <!-- Módulos -->

    </body>
    <!--/ END Body -->
</html>