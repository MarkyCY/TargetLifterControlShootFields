<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Web de Gestión de los levantadores inalámbricos de la unidad 7060.">
        <meta name="author" content="Marcos J.">
        <meta name="author" content="Dairiel O.">

        <link rel="shortcut icon" href="images/favicon.png">

        <title>Tablas de Levantadores UM: 7060</title>

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

        <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Plugins css -->
        <link href="assets/modal-effect/css/component.css" rel="stylesheet">
        <link href="assets/notifications/notification.css" rel="stylesheet">
        
        <!-- ION Slider -->
        <link href="assets/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
        <link href="assets/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css"/> 

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="js/modernizr.min.js"></script>
        
        
    </head>
    <body>  
        <!-- Begin page -->
<div id="col-md-12 wrapper">
<div class="content">
<div class="col-md-12">
    <?php if(isset($_GET['reg']) && isset($_GET['log']) && $_GET['reg'] == "registros"){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>CARGA</th>
                                                            <th>ESTADO</th>
                                                            <th>UBICACION</th>
                                                            <th>INFO</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php

LeerXML();

?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <?php } else if(isset($_GET['reg']) && isset($_GET['log']) && $_GET['reg'] == "ciclo"){ 
        ?>
    
    <div class="page-header">
        <h1 class="text-center">Registro de Ciclo de Levantadores</h1>
        </div>
    <div class="panel panel-default">
        
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Lev</th>
                                                            <th>Inicio</th>
                                                            <th>Fin</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        <?php LeerXML2(); ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    <?php } else { 
            
} ?>
    
    
    <?php 
    
    function LeerXML() {
    
    $registros = simplexml_load_file("log_registros/$_GET[log]");
    
    foreach ($registros as $registro) {
        $id = $registro->ID;
        $carga = $registro->CARGA;
        $estado = $registro->ESTADO;
        $ubic = $registro->UBICACION;
        $info = $registro->INFO;
        
        echo "<tr><td>$id</td><td>$carga</td><td>$estado</td><td>$ubic</td><td>$info</td></tr>";
    }
    
}
    
    function LeerXML2() {
    
    $registros = simplexml_load_file("log_calendario/$_GET[log]");
    
    foreach ($registros as $registro) {
        $id = $registro->LEV;
        $start = $registro->INICIO;
        $end = $registro->FIN;
        
        echo "<tr><td>$id</td><td>$start</td><td>$end</td></tr>";
    }
}

    ?>
                            </div>
</div>
</div>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript" src="assets/spinner/spinner.min.js"></script>


        <!-- Modal-Effect -->
        <script src="assets/modal-effect/js/classie.js"></script>
        <script src="assets/modal-effect/js/modalEffects.js"></script>

        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

		<script src="js/jquery.min.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/ion-rangeslider/ion.rangeSlider.min.js"></script>
        <script src="assets/ion-rangeslider/ui-sliders.js"></script>
        
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        <script src="assets/notifications/notify.min.js"></script>
        <script src="assets/notifications/notify-metro.js"></script>
        <script src="assets/notifications/notifications.js"></script>
        
        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>

        
        
   <div id="tala" style="bottom: 0px; right: 0; display: ;" class="notifyjs-corner">
    <div class="notifyjs-wrapper">
  <div class="notifyjs-container" style="width: 39px;">
      <div style="opacity: 0.7; background-color: #fff;" class="notifyjs-metro-base notifyjs-metro-white">
          <div class="text-wrapper">
              <a href="log.php?path=<?php if(isset($_GET['reg']) && $_GET['reg'] == "ciclo"){ echo "log_calendario"; } else { echo "log_registros";} ?>"><div id="show" id="hide" class="image" data-notify-html="image"><i class="fa fa-arrow-left"></i></div></a>
          </div>
      </div>
    </div>
</div>
</div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>


</body>
</html>