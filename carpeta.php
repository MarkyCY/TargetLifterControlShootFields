<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Mapa de Sitio</title>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/notifications/notification.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        
    </head>
    <body>


        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="home-wrapper">
                            <h1 class="icon-main text-muted"><i class="md md-map"></i></h1>
                            <h1 class="home-text text-uppercase">Seleccione la carpeta de registro</h1>
                            
                            <!-- COUNTDOWN -->      
                            <div class="row maintenance-page">
                                <div id="rovert" class="rovert col-md-6 col-sm-6 col-xs-12 text-center text-muted">
                                    <a class="text-muted" href="log.php?path=log_registros">
                                    <div class="mainten-box">
                                        <i class="fa fa-folder-open fa-2x m-b-15"></i>
                                        <p class="text-uppercase">Estado de Levantadores</p>
                                        <p class="text-m-mode">Carpeta de registros de estado de los Levantadores.</p>
                                    </div>
                                    </a>
                                </div>
                                <div id="rovert" class="rovert col-md-6 col-sm-6 col-xs-12 text-center text-muted">
                                    <a class="text-muted" href="log.php?path=log_calendario">
                                    <div class="mainten-box">
                                        <i class="fa fa-history fa-2x m-b-15"></i>
                                        <p class="text-med text-uppercase font-weight-600 letter-spacing-1 black-text">Ciclos</p>
                                        <p class="text-m-mode">Carpeta de registros de ciclos de los levantadores.</p>
                                    </div>
                                     </a>
                                </div>
                            </div>
                          <!-- /COUNTDOWN -->
                        </div>
                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->


        
        <script>
            var resizefunc = [];
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
        <script src="assets/notifications/notify.min.js"></script>
        <script src="assets/notifications/notify-metro.js"></script>
        <script src="assets/notifications/notifications.js"></script>
        
   <div id="tala" style="bottom: 0px; right: 0; display: ;" class="notifyjs-corner">
    <div class="notifyjs-wrapper">
  <div class="notifyjs-container" style="width: 39px;">
      <div style="opacity: 0.7; background-color: #fff;" class="notifyjs-metro-base notifyjs-metro-white">
          <div class="text-wrapper">
              <a href="tabla.php"><div id="show" id="hide" class="image" data-notify-html="image"><i class="fa fa-home"></i></div></a>
          </div>
      </div>
    </div>
</div>
</div>
    
    </body>
</html>