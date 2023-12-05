<?php
date_default_timezone_set('UTC');

$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));

$query = "select * from datos";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);
$counter = mysqli_num_rows($res);

?>

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

                <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">

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
<div class="container">
                    
<h1 id="title" class="text-center">Registros de <?php if($_GET['path'] == "log_registros"){ echo "Estado de Levantadores"; } else { echo "Ciclos"; } ?></h1>
<h1 id="title" class="text-center"></h1>
     
       

<!--p class="text-center text-success">Registro guardado del día de hoy llamado <a data-toggle="tooltip" data-placement="bottom" title="C:\xampp\htdocs\tabla\log_registros"><?php //echo date("d-m-y") ?>.txt</a></p-->
<div class="col-sm-12 row page-header">
                                        <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Lev</th>
                                                            <th>Mes / Día</th>
                                                            <th>Año</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php 
    $path = $_GET['path'];
    
    if(isset($_GET['path']) && $_GET['path'] == "log_registros"){
        $reg = "registros";
    } else { $reg = "ciclo"; }
    
    foreach (new DirectoryIterator($path) as $fileInfo) {
        if ($fileInfo->isDot()) continue;
        $file = $fileInfo->getFilename();
        $fileTime = $fileInfo->getCTime();
        
        $date = date('d-m-Y H:i:s', $fileTime);
        // md-file-download
        $fecha = new DateTime(''.$date.''); 
        $fecha->modify('+0 hours');
        $fecha_day = $fecha->format('d');
        $fecha_mes = $fecha->format('M');
        $fecha_year = $fecha->format('Y');
            /*echo '<div class="col-md-2">
                        <div class="col-md-12">
                            <div class="row">
                            <a href="reader.php?log='.$file.'&reg='.$reg.'">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="price_card text-center">
                                      
                                        <ul class="price-features">
                                            <li>
                                            <!--i class="md md-file-download md-5x m-b-15" style="position: absolute; color: #f9f4f487;"></i-->
                                            <i class="md md-description md-5x m-b-15"></i><br>
                                                <label>'.$file.'</label>
                                            </li>                 
                                        </ul>
                                       <div class="pricing-num">
                                            '.$fecha_day.' <sup>'.$fecha_mes.'</sup> '.$fecha_year.'
                                        </div>
                                    </div> 
                                </div> 
                                </a>
                            </div> 
                        </div> 
                    </div>';*/
      
        echo "<tr onclick=getDir('vaca');><td><a href='reader.php?log=$file&reg=$reg'<i class='md md-description'></i>$file</a></td><td>$fecha_mes $fecha_day</td><td>$fecha_year</td></tr>";
    }
    
    ?>
                                                        </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
    
</div>
</div>
</div>
</div>
        
<script type='text/javascript'>
	document.oncontextmenu = function(){return false}
</script>


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
        
   <div id="tala" style="bottom: 0px; right: 0; display: ;" class="notifyjs-corner">
    <div class="notifyjs-wrapper">
  <div class="notifyjs-container" style="width: 39px;">
      <div style="opacity: 0.7; background-color: #fff;" class="notifyjs-metro-base notifyjs-metro-white">
          <div class="text-wrapper">
              <a href="carpeta.php"><div id="show" id="hide" class="image" data-notify-html="image"><i class="fa fa-arrow-left"></i></div></a>
          </div>
      </div>
    </div>
</div>
</div>


            
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
    <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>


</body>
</html>
