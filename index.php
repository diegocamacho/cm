<?
include('app/includes/db.php');
$menu_php = isset($_GET['Seccion']) ? $_GET['Seccion']: NULL;
?>
<!DOCTYPE html>
<html class="frontend">
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pro Medica - Administrar tu consultorio nunca fue tan fácil</title>
        <meta name="author" content="epicmedia.pro">
        <meta name="description" content="Promedia es una herramienta para la gestión de consultas medicas.">
        <meta name="keywords" content="medical, medicas, consultorio, doctores, especialistas">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="image/favicon.ico">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="plugins/animatecss/css/animate.css">
        <link rel="stylesheet" href="plugins/owl/css/owl-carousel.css">
        <!--/ Plugins stylesheet : optional -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="stylesheet/layouts/layout.css">
        <link rel="stylesheet" href="stylesheet/layouts/options/fixed-header.css">
        <link rel="stylesheet" href="stylesheet/uielement.css">
        <!--/ Application stylesheet -->

        <!-- modernizr script -->
        <script type="text/javascript" src="plugins/modernizr/js/modernizr.js"></script>
        <!--/ modernizr script -->
        <!-- END STYLESHEETS -->
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="javascript/jquery.alphanumeric.pack.js"></script>
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body data-baseurl="">
        <!-- START Template Header -->
        <header id="header" class="navbar">
            <div class="container">
                <!-- START navbar header -->
                <div class="navbar-header navbar-header-transparent">
                    <!-- Brand -->
                    <a class="navbar-brand" href="javascript:void(0);">
						<img src="logo_negro.png" width="180" class="img-responsive" style="margin-top: 28px;">
                    </a>
                    <!--/ Brand -->
                </div>
                <!--/ END navbar header -->

                <!-- START Toolbar -->
                <div class="navbar-toolbar clearfix">
                    <!-- START Left nav -->
                    <ul class="nav navbar-nav">
                        <!-- Navbar collapse: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                        <li class="navbar-main navbar-toggle">
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="meta">
                                    <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                                </span>
                            </a>
                        </li>
                        <!--/ Navbar collapse -->
                    </ul>
                    <!--/ END Left nav -->

                    <!-- START navbar form -->
                    <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                        <form action="" role="search">
                            <div class="has-icon">
                                <input type="text" class="form-control input-lg" placeholder="Search this site...">
                                <i class="ico-search form-control-icon"></i>
                            </div>
                        </form>
                    </div>
                    <!-- START navbar form -->

                    <!-- START nav collapse -->
                    <div class="collapse navbar-collapse navbar-collapse-alt" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
	                        
                            <li class="dropdown <? if(!$menu_php){ ?>active<? } ?>">
                                <a href="index.php">
                                    <span class="meta">
                                        <span class="text">INICIO</span>
                                    </span>
                                </a>
                            </li>
                            <li class="dropdown <? if($menu_php=="Registro"){ ?>active<? } ?>">
                                <a href="index.php?Seccion=Registro">
                                    <span class="meta">
                                        <span class="text">REGISTRARSE</span>
                                    </span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="?Seccion=Contacto">
                                    <span class="meta">
                                        <span class="text">CONTACTO</span>
                                    </span>
                                </a>
                            </li>
                            <!--
                            <li class="dropdown ">
                                <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                                    <span class="meta">
                                        <span class="text">PAGES</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-alt">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact Us</a></li>
                                    <li><a href="page-left-sidebar.html">Left Sidebar</a></li>
                                    <li><a href="page-right-sidebar.html">Right Sidebar</a></li>
                                    <li><a href="page-account-register.html">Account Register</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown ">
                                <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                                    <span class="meta">
                                        <span class="text">BLOG</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-alt">
                                    <li><a href="blog-large.html">Large</a></li>
                                    <li><a href="blog-medium.html">Medium</a></li>
                                    <li><a href="blog-single.html">Single</a></li>
                                    <li><a href="blog-left-sidebar.html">Left sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Right sidebar</a></li>
                                    <li><a href="blog-masonry.html">Masonry</a></li>
                                </ul>
                            </li>
                            <li class="dropdown ">
                                <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                                    <span class="meta">
                                        <span class="text">PORTFOLIO</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-alt">
                                    <li><a href="portfolio-2-columns.html">2 Columns</a></li>
                                    <li><a href="portfolio-3-columns.html">3 Columns</a></li>
                                    <li><a href="portfolio-4-columns.html">4 Columns</a></li>
                                    <li><a href="portfolio-single.html">Single</a></li>
                                </ul>
                            </li>
                            <li class="dropdown ">
                                <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                                    <span class="meta">
                                        <span class="text">SHOP</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-alt">
                                    <li><a href="shop.html">Default</a></li>
                                    <li><a href="shop-item-detail.html">Item detail</a></li>
                                    <li><a href="shop-left-sidebar.html">Left sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Right sidebar</a></li>
                                    <li><a href="shop-shopping-cart.html">Shopping cart</a></li>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
                    <!--/ END nav collapse -->
                </div>
                <!--/ END Toolbar -->
            </div>
        </header>
        <!--/ END Template Header -->

        <?php
		
		switch($menu_php){
			    	
		    case 'Registro':
		    include("registro.php");	
		    break;
		    
		    case 'Recovery':
		    include("recupera.php");	
		    break;
		    		    
		    default:
		    include('portada.php');
		    
		}
		?>
		<? if($menu_php!="Recovery"){ ?>
        <!-- START Template Footer -->
        <footer role="contentinfo" class="bgcolor-dark pt25">
            <!-- container -->
            <div class="container mb25">
                <!-- row -->
                <div class="row">
                    <!-- About -->
                    <div class="col-md-4 hide">
                        <h4 class="font-alt mt0">ABOUT US</h4>
                        <p>Adminre is a clean and flat backend and frontend theme build with Twitter bootstrap</p>
                        <p> Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                        <a href="javascript:void(0);" class="text-primary">Learn More</a>
                    </div>
                    <div class="visible-sm visible-xs" style="margin-bottom:25px;"></div>
                    <!--/ About -->
					
                    <!-- Address + Social -->
                    <div class="col-md-4" style="background: url('image/others/map-vector.png') no-repeat center center;background-size: 100%;">
                        <h4 class="font-alt mt0">DIRECCIÓN</h4>
                        <address>
                            <strong>Epicmedia Pro.</strong><br>
                            Av. Álvaro Obregón 449-A<br>
                            Chetumal, Quintana Roo<br>
                            <abbr title="Phone">T:</abbr> 01 800 123 2222
                        </address>
                        <!--
                        <h4 class="font-alt mt0">STAY CONNECT</h4>
                        <a href="javascript:void(0);" class="text-muted mr15" data-toggle="tooltip" title="Facebook"><i class="ico-facebook2"></i></a>
                        <a href="javascript:void(0);" class="text-muted mr15" data-toggle="tooltip" title="Twitter"><i class="ico-twitter2"></i></a>
                        <a href="javascript:void(0);" class="text-muted mr15" data-toggle="tooltip" title="Vimeo"><i class="ico-vimeo"></i></a>
                        <a href="javascript:void(0);" class="text-muted mr15" data-toggle="tooltip" title="Flickr"><i class="ico-flickr2"></i></a>
                        <a href="javascript:void(0);" class="text-muted mr15" data-toggle="tooltip" title="Google+"><i class="ico-google-plus2"></i></a>
                        <a href="javascript:void(0);" class="text-muted mr15" data-toggle="tooltip" title="Instagram"><i class="ico-instagram2"></i></a>-->
                    </div>
                    <div class="visible-sm visible-xs" style="margin-bottom:25px;"></div>
                    <!--/ Address + Social -->
					<div class="col-md-4">&nbsp;</div>
                    <!-- Newsletter -->
                    <div class="col-md-4 hide">
                        <h4 class="font-alt mt0">NOTICIAS</h4>
                        <form role="form">
                            <div class="form-group">
                                <p class="form-control-static">Suscribirse a nuestro boletín de noticias y estar al día con las últimas noticias y ofertas!</p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="newsletter_email" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Subscribe Now</button>
                        </form>
                    </div>
                    <!--/ Newsletter -->
                </div>
                <!--/ row -->
            </div>
            <!--/ container -->

            <!-- bottom footer -->
            <div class="footer-bottom pt15 pb15 bgcolor-dark bgcolor-dark-darken10">
                <!-- container -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- copyright -->
                            <p class="nm text-muted">&copy; Copyright 2016 by <a href="http://epicmedia.pro" target="_blank" class="text-white">EPICMEDIA</a>. Todos los derechos resevados.</p>
                            <!--/ copyright -->
                        </div>
                        <div class="col-sm-6 text-right hidden-xs">
                            <a href="javascript:void(0);" class="text-white">Aviso de Privacidad</a>
                            <span class="ml5 mr5">&#8226;</span>
                            <a href="javascript:void(0);" class="text-white">Terminos y Condiciones</a>
                        </div>
                    </div>
                </div>
                <!--/ container -->
            </div>
            <!--/ bottom footer -->

        </footer>
        <!--/ END Template Footer -->
		<? } ?>
        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Application and vendor script : mandatory -->
        <script type="text/javascript" src="javascript/vendor.js"></script>
        <script type="text/javascript" src="javascript/core.js"></script>
        <script type="text/javascript" src="javascript/frontend/app.js"></script>
        <!--/ Application and vendor script : mandatory -->

        <!-- Plugins and page level script : optional -->
        <script type="text/javascript" src="plugins/smoothscroll/js/smoothscroll.js"></script>
        <script type="text/javascript" src="plugins/owl/js/owl.carousel.js"></script>
        <script type="text/javascript" src="plugins/stellar/js/jquery.stellar.js"></script>
        <script type="text/javascript" src="javascript/frontend/home/home-v2.js"></script>
        <!--/ Plugins and page level script : optional -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>
