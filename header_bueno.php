<!-- START Template Header -->
<header id="header" class="navbar navbar-fixed-top">
    <!-- START navbar header -->
    <div class="navbar-header">
        <!-- Brand -->
        <a class="navbar-brand" href="javascript:void(0);">
            <!--<span class="logo-figure"></span>-->
            <!--<span class="logo-text"></span>-->
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
                    <li><a href="?Modulo=MiCuenta"><span class="icon"><i class="ico-user-plus2"></i></span>Mi Cuenta</a></li>
                    <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span>Ayuda</a></li>
                    <li class="divider"></li>
                    <li><a href="login.php"><span class="icon"><i class="ico-exit"></i></span>Cerrar Sesión</a></li>
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
<!--/ END Template Header -->