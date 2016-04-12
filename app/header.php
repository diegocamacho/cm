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

        <!--/ END Left nav -->

        <!-- START Right nav -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Profile dropdown -->
            <li class="dropdown profile">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="meta">
                        <span class="avatar"><img src="image/avatar/avatar7.jpg" class="img-circle" alt="" /></span>
                        <span class="text hidden-xs hidden-sm pl5"><? if($s_id_tipo_credencial==1){ echo nombreMedico($s_id_usuario); }else{ echo nombreSecretaria($s_id_usuario); }?></span>
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