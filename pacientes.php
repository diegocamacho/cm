<?
$sql="SELECT * FROM pacientes WHERE activo=1 AND id_medico=1 ORDER BY nombre ASC";
$q_pacientes=mysql_query($sql);
?>
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Directorio de Pacientes</h4>
            </div>
            <div class="page-header-section">
                <div class="toolbar">
                    <div class="col-md-6 col-md-offset-6">
                        <div class="has-icon">
                            <input type="search" class="form-control" name="shuffle-filter" id="shuffle-filter" placeholder="Buscar paciente por nombre">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header -->

        <!-- START Row -->
        <div class="row" id="shuffle-grid">
	        <? while($ft=mysql_fetch_assoc($q_pacientes)){ ?>
            <div class="col-sm-6 col-md-4 shuffle">
                <div class="panel widget">
                    <div class="table-layout nm">
                        <div class="col-xs-4 text-center"><img src="image/avatar/avatar.png" width="100%"></div>
                        <div class="col-xs-8 valign-middle">
                            <div class="panel-body">
                                <h5 class="semibold mt0 mb5"><a href="index.php?Modulo=PerfilPaciente&id=<?=$ft['id_paciente']?>"><?=$ft['nombre']?></a></h5>
                                <!--<p class="ellipsis text-muted mb5"><? if($ft['email']){ ?><i class="ico-envelop mr5"></i> <?=$ft['email']?><? } ?>&nbsp;</p>-->
                                <p class="text-muted nm mb5"><? if($ft['celular']){ ?><i class="ico-phone2 mr5"></i> <?=$ft['celular']?><? } ?></p>
                                <div class="btn-group">
                                	<a href="index.php?Modulo=PerfilPaciente&id=<?=$ft['id_paciente']?>" role="button" class="btn btn-primary btn-sm">Perfil</a>
									<a href="#" role="button" class="btn btn-teal btn-sm">Consultar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<? } ?>
            
        </div>
        <!--/ END Row -->
    </div>
    <!--/ END Template Container -->

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

<script type="text/javascript" src="plugins/shuffle/js/jquery.shuffle.min.js"></script>

<script type="text/javascript" src="javascript/pages/people.js"></script>        
<!--/ App and page level scrip -->
<!--/ END JAVASCRIPT SECTION -->