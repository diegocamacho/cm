<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PROMEDIA</title>
        <meta name="author" content="epicmedia.pro">
        <meta name="description" content="App para el contreol de consulta medica y consultorios">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="../image/favicon.ico">
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

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <section class="container">
                <!-- START row -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <!-- Brand -->
                        <div class="text-center" style="margin-bottom:40px;">
                            <center><img src="../logo_negro.png" width="200" class="mb15 mt15 img-responsive"></center>
                            <h5 class="semibold text-muted mt-5">Recupere su cuenta.</h5>
                        </div>
                        <!--/ Brand -->

                        <!-- Social button -->
                        <ul class="list-table hide">
                            <li><button type="button" class="btn btn-block btn-facebook">Connect with <i class="ico-facebook2 ml5"></i></button></li>
                            <li><button type="button" class="btn btn-block btn-twitter">Connect with <i class="ico-twitter2 ml5"></i></button></li>
                        </ul>
                        <!-- Social button -->

                        <hr><!-- horizontal line -->

                        <!-- Login form -->
                        <form class="panel" name="form-login" action="">
                            <div class="panel-body">
                                <!-- Alert message -->
                                <div class="alert alert-warning" style="display: none;" id="msg_error">
                                    
                                </div>
                                <!--/ Alert message -->
                                
                                <div class="form-group">
                                    <div class="form-stack has-icon pull-left">
                                        <input name="email" id="email" type="text" class="form-control input-lg" placeholder="Correo Electrónico" data-parsley-errors-container="#error-container" data-parsley-error-message="Debe ingresar su cuenta de correo electrónico" data-parsley-required>
                                        <i class="ico-user2 form-control-icon"></i>
                                    </div>
                                </div>

                                <!-- Error container -->
                                <div id="error-container"class="mb15"></div>
                                <!--/ Error container -->

                                
                                <div class="form-group nm">
                                    <button type="submit" class="btn btn-block btn-info"><span class="semibold">Recuperar Contraseña</span></button>
                                </div>
                            </div>
                        </form>
                        <!-- Login form -->

                        <hr><!-- horizontal line -->

                        <p class="text-muted text-center">¿Sabe su usuario y contraseña? <a class="semibold" href="login.php">inicie sesión aquí</a></p>
                    </div>
                </div>
                <!--/ END row -->
            </section>
            <!--/ END Template Container -->
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
        
        <script type="text/javascript" src="plugins/parsley/js/parsley.min.js"></script>
        
        <script type="text/javascript" src="javascript/pages/login.js"></script>
        
        <!--/ App and page level scrip -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>