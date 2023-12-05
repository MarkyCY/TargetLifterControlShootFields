<?php

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
        <meta name="title" content="Gestión y Control de levantadores inalámbricos con variante de control inalámbrico.">
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
                    
<h1 id="title" class="text-center">Gestión y Control de Levantadores</h1>
<h1 id="title" class="text-center"></h1>
    
<div id="talo" style="top: 0px; right: 0;" class="notifyjs-corner">
    <div class="notifyjs-wrapper">
  <div class="notifyjs-container" style="">
      <div style="opacity: 0.7; background-color: #fff;" class="notifyjs-metro-base notifyjs-metro-white">
          <div class="text-wrapper">
              <div id="hide" onclick="$('#talo').hide(); $('#tala').show();" class="image" data-notify-html="image"><i class="fa fa-eye-slash"></i></div>
              <div id="show" onclick="$('#talo').show();" style="display: none;" id="hide" class="image" data-notify-html="image"><i class="fa fa-eye-slash"></i></div>
              <h1><a href="calendario.php"><i class="md md-event text-purple" data-toggle="tooltip" data-placement="bottom" title="Ciclo de Carga"></i></a> <a href="registros.php?reg=registro"><i class="fa fa-save text-info" data-toggle="tooltip" data-placement="bottom" title="Guardar Registros"></i></a> <a href="carpeta.php"><i data-toggle="tooltip" data-placement="bottom" title="Carpetas de Registros" class="md md-wallet-travel text-warning"></i></a><a href="ayuda.php"><i data-toggle="tooltip" data-placement="bottom" title="Ayuda" class="md md-live-help text-danger"></i></a> <a href="/cta/web"><i data-toggle="tooltip" data-placement="bottom" title="Volver al SACT" class="ion-compass text-primary"></i></a></h1>
          </div>
      </div>
    </div>
</div> 
</div>
       
<div id="tala" style="top: 0px; right: 0; display: none;" class="notifyjs-corner">
    <div class="notifyjs-wrapper">
  <div class="notifyjs-container" style="width: 39px;">
      <div style="opacity: 0.7; background-color: #fff;" class="notifyjs-metro-base notifyjs-metro-white">
          <div class="text-wrapper">
              <div id="show" onclick="$('#talo').show(); $('#tala').hide();"id="hide" class="image" data-notify-html="image"><i class="fa fa-eye"></i></div>
          </div>
      </div>
    </div>
</div>
    
</div>
<!--p class="text-center text-success">Registro guardado del día de hoy llamado <a data-toggle="tooltip" data-placement="bottom" title="C:\xampp\htdocs\tabla\log_registros"><?php //echo date("d-m-y") ?>.txt</a></p-->
<div class="col-sm-12 row page-header">
<div class="form-group">
<table class="table table-hover table-bordered col-lg-12">
<tr>
<thead>
<td colspan="1">No. Levantador</td>
<td colspan="1"><i class="fa fa-spin fa-refresh"></i> Ciclo de carga</td>
<td colspan="1"><i class="md md-battery-60"></i>Batería</td>
<td colspan="2"><i class="md md-place"></i>Ubicación</td>
<td colspan="1"><i class="fa fa-pencil-square-o"></i> Editar</td>
</thead>
<tbody>
<?php 

 $statea= array(
 'Sin Carga',
 'Buen Estado',
 'Defectuoso',
 'Óptimo'
 );
 
while($row=mysqli_fetch_array($res)){
$id = $row['id'];
$parte = $row['carga'];
$carga_por = $row['carga_porc'];
$info =$row['info'];
$where =$row['ubicacion'];
?>



<?php

//Estados
if($row['carga'] <= 10){ $state = "danger";} elseif($row['carga'] == 13){ $state = "success";} elseif($row['carga'] == 11 || $row['carga'] == 12){ $state = "warning";} elseif($row['carga'] == 14){ $state = "primary";}

if($row['carga'] <= 10){ $state_i = "Defectuoso";} elseif($row['carga'] == 13){ $state_i = "Buen Estado";} elseif($row['carga'] == 11 || $row['carga'] == 12){ $state_i = "Sin Carga";} elseif($row['carga'] == 14){ $state_i = "Óptimo";}

echo '
<tr class="'.$state.'">
<th colspan="1">'.$id.'</th>'; ?>
<th colspan="1"><a href="javascript:void(0);" onclick="getCalendare('<?php echo $id;?>')"><span class="fa fa-calendar text-purple"></span></a> <a data-toggle="tooltip" data-placement="right" title="" data-original-title="Guardar registros del ciclo para este levantador." href="registros.php?lev=<?php echo $id;?>&reg=ciclo"><span class="fa fa-save text-success"></span></a>
<div id="target_div_<?php echo $id;?>"></div>

<?php
echo '</th>
<th colspan="1">
<div class="progress">
<div class="progress-bar progress-bar-animated bg-danger" style="width:'.$carga_por.'%;"> '.$parte.' V '.$carga_por.'%
</div>
</div>
</th>

<th colspan="2">'.$row['ubicacion'].'</th>
<th class="actions">
<a href="#" data-toggle="modal" data-target="#con-close-modal-'.$id.'" class="on-default edit-row"><i class="fa fa-pencil text-info"></i> </a> ';

if($info){echo '<i class="md md-info text-right" data-toggle="tooltip" data-placement="bottom" title="'.$info.'"></i>';} else 
{ 
echo '<i class="md md-info-outline text-right" data-toggle="tooltip" data-placement="bottom" title="'.$info.'"></i>';
}
echo '</th>';

echo '<div id="con-close-modal-'.$id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<form action="validar.php" method="GET">
                                            <div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class="modal-header"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button> 
                                                        <h4 class="modal-title">Levantador No. '.$id.'</h4> 
                                                    </div> 
                                                    <div class="modal-body"> 
                                                        <div class="row"> 
                                                            <div class="col-md-6"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-1" class="control-label">Carga</label> 
                                                                    <input type="hidden" name="id" value="'.$id.'">
                                                 
                                                 <div class="row">
                                                    <div id="spinner'.$id.'">
                                                        <div class="input-group" style="width:250px;">
                                                            <input type="text" class="spinner-input form-control" name="carga" maxlength="2">
                                                            <div class="spinner-buttons input-group-btn">
                                                                <button type="button" class="btn btn-info spinner-up waves-effect">
                                                                    <i class="fa fa-angle-up"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-pink spinner-down waves-effect">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       </div>
                                                            
                                                        <div class="row"> 
                                                            <div class="col-md-12"> 
                                                                <div class="form-group"> 
                                                                    <label for="field-3" class="control-label">Ubicación</label> 
                                                                    <input type="text" name="where" value="'.$where.'" class="form-control" id="field-3" list="li">
                                                                    <datalist id="li">
																		<option value="Taller">
																		<option value="Almacén">
																		<option value="Campo">
                                                                    </datalist>
                                                                </div> 
                                                            </div> 
                                                        </div> 
                                                        <div class="row"> 
                                                            <div class="col-md-12"> 
                                                                <div class="form-group no-margin"> 
                                                                    <label for="field-7" class="control-label">Información</label> 
                                                                    <textarea class="form-control  autogrow" id="field-7" name="info" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">'.$info.'</textarea> 
                                                                </div> 
                                                            </div> 
                                                        </div>
                                                    </div> 
                                                    <div class="modal-footer"> 
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Aceptar</button> 
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancelar</button> 
                                                    </div> 
                                                </div> 
                                            </div>
                                            </form>
                                        </div>'; 
?>



<?php

}
?>
</tbody>
<tfoot>
<tr>
<td colspan="3"></td>
</tr>
<tr>
<td colspan="1" class="danger">Defectuosos</td>
<td colspan="1" class="warning">Sin Carga</td>
<td colspan="1" class="success">Buen Estado</td>
<td colspan="3" class="primary">Óptimo</td>
</tr>
</tfoot>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
        
<?php 
 $query = "select * from datos";
$res = mysqli_query($connection,$query);   
 ?>
        
<script type='text/javascript'>
	document.oncontextmenu = function(){return false}
</script>
<script>

function getCalendare(lev){
    <?php
    while($row_a=mysqli_fetch_array($res)){
$id = $row_a['id'];
        
     echo "$('#target_div_".$id."').hide();"; 
    }?>
    
 
    
    $('#target_div_'+lev).show();
    
    $.ajax({
    type:'GET',
    url:'functions.php',
    data:'func=getCalendare&lev='+lev,
    success:function(html){
    $('#target_div_'+lev).html(html);
    }
    });
  
    }
    
function hideCalendar(lev){
    $('#target_div_'+lev).hide();
}
    
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
        
        
        
        <script>
       
 <?php  
 
 $query_alt = "select * from datos";
 $res_alt = mysqli_query($connection,$query_alt);
 while($row_alt=mysqli_fetch_array($res_alt)){
 
 ?>
               $("#spinner<?php echo $row_alt['id']; ?>").spinner({value:<?php echo $row_alt['carga']; ?>, min: 0, max: 14});
               
<?php } ?>
                
</script>

		<script src="js/jquery.min.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/ion-rangeslider/ion.rangeSlider.min.js"></script>
        <script src="assets/ion-rangeslider/ui-sliders.js"></script>
        
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        <script src="assets/notifications/notify.min.js"></script>
        <script src="assets/notifications/notify-metro.js"></script>
        <script src="assets/notifications/notifications.js"></script>
        
        <script>
        
        </script>


</body>
</html>





















