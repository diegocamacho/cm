<!DOCTYPE html>
<!-- 
TEMPLATE NAME : Adminre - Clean and flat admin theme build with twitter bootstrap 3.1.1
CURRENT VERSION : 1.1.2
AUTHOR : pampersdry
CONTACT : pampersdry@gmail.com

** A license must be purchased in order to legally use this template for your project **
** PLEASE SUPPORT ME. YOUR SUPPORT ENSURE THE CONTINUITY OF THIS PROJECT **
-->
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adminre - 1.1.2</title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat admin theme build with Twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="app/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="app/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="app/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="app/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="app/image/touch/apple-touch-icon.png">
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->
        
        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="app/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="app/stylesheet/layout.min.css">
        <link rel="stylesheet" href="app/stylesheet/uielement.min.css">
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
                        <div class="text-center" style="margin-bottom:20px;">
                            <span class="logo-figure inverse"></span>
                            <span class="logo-text inverse"></span>
                            <h5 class="semibold text-muted mt-5">Create a new account.</h5>
                        </div>
                        <!--/ Brand -->

                        <!-- Register form -->
                        <form class="panel" name="form-register" action="">
                            <ul class="list-table pa15">
                                <li>
                                    <!-- Alert message -->
                                    <div class="alert alert-warning nm">
                                        <span class="semibold">Note :</span>&nbsp;&nbsp;Please fill all the below field.
                                    </div>
                                    <!--/ Alert message -->
                                </li>
                                <li class="text-right" style="width:20px;"><a href="app/javascript:void(0);"><i class="ico-question-sign fsize16"></i></a></li>
                            </ul>
                            <hr class="nm">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <div class="has-icon pull-left">
                                        <input type="text" class="form-control" name="username" data-parsley-required>
                                        <i class="ico-user2 form-control-icon"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <div class="has-icon pull-left">
                                        <input type="password" class="form-control" name="password" data-parsley-required>
                                        <i class="ico-key2 form-control-icon"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Retype Password</label>
                                    <div class="has-icon pull-left">
                                        <input type="password" class="form-control" name="retype-password" data-parsley-equalto="input[name=password]">
                                        <i class="ico-asterisk form-control-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="nm">
                            <div class="panel-body">
                                <p class="semibold text-muted">To confirm and activate your new account, we will need to send the activation code to your e-mail.</p>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <div class="has-icon pull-left">
                                        <input type="email" class="form-control" name="email" placeholder="you@mail.com">
                                        <i class="ico-envelop form-control-icon"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox custom-checkbox">  
                                        <input type="checkbox" name="agree" id="agree" value="1">  
                                        <label for="agree">&nbsp;&nbsp;I agree to the <a class="semibold" href="app/javascript:void(0);">Term Of Services</a></label>   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox custom-checkbox">  
                                        <input type="checkbox" name="news" id="news" value="1">  
                                        <label for="news">&nbsp;&nbsp;Send me Newsletters.</label>   
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-block btn-success"><span class="semibold">Sign up</span></button>
                            </div>
                        </form>
                        <!-- Register form -->

                        <hr><!-- horizontal line -->

                        <p class="text-center">
                            <span class="text-muted">Already have an account? <a class="semibold" href="app/page-login.html">Sign in here</a></span>
                        </p>
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
        
        <script type="text/javascript" src="javascript/pages/register.js"></script>
        
        <!--/ App and page level scrip -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>