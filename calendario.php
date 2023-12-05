<?php

date_default_timezone_set('UTC');

$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));

$query = "select * from datos";
$query_a = "select * from events";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);
$res_a = mysqli_query($connection,$query_a);
$counter = mysqli_num_rows($res);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Web de Gestión de los levantadores inalámbricos de la unidad 7060.">
        <meta name="author" content="Marcos J.">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Calendario de Levantadores UM: 7060</title>

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

        <link href="assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />

         <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!--calendar css-->
        <link href="assets/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <link href="assets/select2/select2.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        
        <!-- Modal-Effect -->
        <script src="assets/modal-effect/js/classie.js"></script>
        <script src="assets/modal-effect/js/modalEffects.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        
    </head>
    <body>

        
<div class="row">
                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-md-<?php if( isset($_GET['dia'])){ echo "9"; } else { echo "12";} ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="" id="calendar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                    
<div class="modal fade" id="event-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Vista de registros</strong></h4>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-danger delete-event waves-effect" data-dismiss="modal">Eliminar</button>
                                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Add Category -->
                                <div class="modal fade" id="add-category">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="control-label">Category Name</label>
                                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label">Choose Category Color</label>
                                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                                <option value="success">Success</option>
                                                                <option value="danger">Danger</option>
                                                                <option value="primary">Primary</option>
                                                                <option value="warning">Warning</option>
                                                                <option value="inverse">Inverse</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
<?php

if( isset($_GET['dia'])){ 
                                                                             
      while($row_a=mysqli_fetch_array($res_a)){
      $fi = $row_a['startend'];
      }    
                                    ?>
                                    <div style="padding-top: 5px;" class="col-md-3">
                                    <form style="background-color: #fff;" action="validar_fecha.php" method="GET">
                                            <div class=""> 
                                                <div class=""> 
                                                    <div class="">
                                                        <h1 class="modal-title text-center">Levantador <?php echo $_GET['lev'];?></h1> 
                                                    </div> 
                                                    <div class="modal-body"> 
                                                        <div class="row"> 
                                                            <div class="col-md-12"> 
                                                                <div class="form-group">                                                       
                                                      
                                 <div class="page-header"></div> 
                                 
                                 <input type="hidden" name="lev" value="<?php echo $_GET['lev']; ?>">
                                                                
                                <label>Inicio Fecha</label>
                                <div class="input-group">
                                    <input name="start_date" type="hidden" value="<?php echo $_GET['mes']; echo ' '.$_GET['dia'].''; echo ' '.$_GET['año'].''; ?>" class="form-control" placeholder="Mes Dia">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i><?php echo ''.$_GET['mes'].' '; echo ''.$_GET['dia'].''; echo ' '.$_GET['año'].''; ?></span>
                                </div>
                                                 
                                                 <label>Inicio de la Carga</label>
															<div class="input-group m-b-15">
                                    
															<div class="bootstrap-timepicker">
                                                                <?php if ( !isset($_GET['edit']) || $_GET['edit'] == 0) {?>
                                                                <input id="timepicker4" type="text" name="start_time" class="form-control"/>
                                                                <?php } else { ?>
                                                                <input type="text" name="start_time" value="<?php echo $fi; ?>" disabled="" class="form-control"/>
                                                                <?php } ?>
                                                                </div>
															<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
												            </div>
                                                            <div class="input-group">
                                    
															<div class="bootstrap-timepicker">
                                                                                                                         
                                                                </div>
												            </div>
																
											<div class="page-header"></div>
                                                                 
                                <br>
                                                   <?php /*if ( isset($_GET['edit'])) {*/ ?>              
                                                    <label>Período de Carga</label>
															<div class="input-group m-b-15">
                                    
															<div class="radio radio-danger radio-inline"><input type="radio" <?php if ( isset($_GET['edit']) && $_GET['edit'] == 1) { echo 'disabled=""'; }?>  id="inlineRadio1" value="6" name="radio" <?php if ( !isset($_GET['edit']) || $_GET['edit'] == 0) { echo 'checked=""'; }?>>
                                                            <label for="inlineRadio1"> 6 Horas </label> </div>
                                                            <div class="radio radio-warning radio-inline"><input type="radio" <?php if ( isset($_GET['edit']) && $_GET['edit'] == 1) { echo 'disabled=""'; }?>  id="inlineRadio2" value="7" name="radio">
                                                            <label for="inlineRadio2"> 7 Horas </label></div>
                                                            <div class="radio radio-success radio-inline"><input type="radio" <?php if ( isset($_GET['edit']) && $_GET['edit'] == 1) { echo 'disabled=""'; }?>  id="inlineRadio3" value="8" name="radio" >
                                                            <label for="inlineRadio3"> 8 Horas </label> </div>
																</div> 
                                                                </div> 
                                                                <?php  if (isset($_GET['edit']) && $_GET['edit'] == 0){ echo '<input type="hidden" name="modify" value="0">'; } /*}*/ ?>  
														
														<input type="hidden" value=""<?php echo date("Y-m"); ?>-<?php echo $_GET['dia'];?>>
														
												<div class="col-sm-offset-3 col-sm-9">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="checkbox3" name="chck" type="checkbox" <?php if(isset($_GET['edit']) && $_GET['edit'] == 0 ) { echo 'disabled=""'; } if ( isset($_GET['edit']) && $_GET['edit'] == 1) { echo 'disabled=""'; } if ( isset($_GET['edit'])) { echo 'checked=""'; }?>>
                                                        <label for="checkbox3">
                                                            Cumplido?
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php if ( !isset($_GET['edit']) || $_GET['edit'] == 0) { ?> 
                                                                <button type="submit" class="btn btn-block  btn-info waves-effect waves-light"><i class="fa fa-paper-plane"></i> Enviar</button> 
                                                                
                                                        <?php } ?>
                                                    
                                                </div> 
                                            </div>
                                            </form>
                                             <div class="page-header"></div>
                                             
                                     <?php } ?>
                                        <div class="widget">
                                            <div class="widget-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <!--a href="#" data-toggle="modal" data-target="#create" class="btn btn-lg btn-primary btn-block waves-effect waves-light">
                                                            <i class="fa fa-plus"></i> Crear nuevo
                                                        </a-->
                                                        <?php if (isset($_GET['lev'])) {?>
                                                        
                                                        <a href="#" data-toggle="modal" data-target="#create" class="btn btn-lg btn-purple btn-block waves-effect waves-light">
                                                            <i class="md md-history"></i> Crear Ciclo
                                                        </a>
                                                    <?php } ?>
                                                        <a href="tabla.php" class="btn btn-lg btn-warning btn-block waves-effect waves-light">
                                                            <i class="fa fa-home"></i> Volver
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
								<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
										<form action="php/crear_ciclos.php" method="GET">
                                            <div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class="modal-header"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button> 
                                                        <h4 class="modal-title">Agregar ciclo de Carga</h4> 
                                                    </div> 
                                                    <div class="modal-body"> 
                                                        <div class="row"> 
                                                            <div class="col-md-12"> 
                                                                <div class="form-group">
                                                                
                                       <h2>Levantador No. <?php echo $_GET['lev']; ?></h2>  <br>        
                                                                
                                <label>Inicio Fecha</label>
                                <div class="input-group">
                                    <input name="day" type="text" value="<?php /*dia=1&mes=May&año=2021*/ if(!isset($_GET['dia'])) {echo date("M d Y");} else { echo "$_GET[mes] $_GET[dia] $_GET[año]"; } ?>" class="form-control" placeholder="Mes Dia" id="datepicker">
                                    <input name="lev" type="hidden" value="<?php echo $_GET['lev']; ?>" class="form-control">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div><br>
                                                 
                                                 <label>Cantidad de semanas</label>
													
                                                    <div id="spinner3">
                                                        <div class="input-group" style="width:150px;">
                                                            <input name="rpt" type="text" class="spinner-input form-control" maxlength="2" readonly="">
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
                                                     <span class="help-block">
                                                     Hasta 53 como máximo.
                                                     </span>
											
                                                       <div class="checkbox checkbox-primary">
                                                    <input name="chk" id="checkbox31" type="checkbox">
                                                    <label for="checkbox31">
                                                        Eliminar antiguos registros?<p class="text-danger">(Advertencia!) Si activa esta casilla: A la hora de crear el ciclo, todos los registros (ciclos viejos) del Levantador No. <?php echo $_GET['lev']; ?> van a desaparecer. <span class="text-success">(Para mayor seguridad guarde todos los registros anteriores.)</span></p>
                                                    </label>
                                                </div>
                                                    <div class="modal-footer"> 
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Aceptar</button> 
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button> 
                                                    </div> 
                                                </div> 
                                                </div> 
                                            </div>
                                            </form>
                                        </div>

                                                                                                                           


        <script>
                                                                                                                           
            var resizefunc = [];
           document.oncontextmenu = function(){return false} 
        </script>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        <script src="js/jquery-ui-1.10.1.custom.min.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <!-- BEGIN PAGE SCRIPTS -->
        <script src='assets/fullcalendar/moment.min.js'></script>
        <script src='assets/fullcalendar/fullcalendar.min.js'></script>
        
        <script>
            
 !function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };


    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) { 
        var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
    },
    /* on click on event */
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
        var $this = this;
            var form = $("<form></form>");
        
            var starth = calEvent.start.format('HH:mm:ss');
            var endh = calEvent.end.format('HH:mm:ss');
        
            var startd = calEvent.start.format('DD/MM/YYYY');
            var endd = calEvent.end.format('DD/MM/YYYY');
        
            form.append("<label>" + calEvent.title + "</label>");
            form.append("<div><h5>Inicio de Fecha: </h5>" + startd + "<h5>Hora: </h5>" + starth + "</div>");
            form.append("<div class='page-header'></div>");
            form.append("<div><h5>Fin de Fecha: </h5>" + endd + "<h5>Hora: </h5>" + endh + "</div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    console.log(calEvent.url); 
                    $.ajax({
                    url: 'php/eliminar.php',
                    type: 'POST',
                    data: 'delete='+calEvent.url,
                    dataType: 'json',
                    success:function(html){
                         //$('#calendar').load('php/calendario_reload.php');
                    }
                });
                    return (ev._id == calEvent._id);
                    
                    
                });
                $this.$modal.modal('hide');
                
            });
            
                
                
        
        
        
        
        
        
        
        
       /* $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    
                   var start = start.format('YYYY-MM-DD HH:mm:ss');
                   var end = end.format('YYYY-MM-DD HH:mm:ss');
                    
                     $.ajax({
                        type:'GET',
                        url:'action.php',
                        data:'&title='+title+'&start='+start+'&end='+end+'&className='+categoryClass,
                        success:function(){
                        }
                     });
                    $this.$calendarObj.fullCalendar('renderEvent', {
                        title: title,
                        start:start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);  
                    $this.$modal.modal('hide');
                }
                else{
                    alert('You have to give a title to your event');
                }
                return false;
                
            });*/
        
        
        
        
        
        
        
        
    },  CalendarApp.prototype.onEventauxClick =  function (calEvent, jsEvent, view) {
        var $this = this;
            var form = $("<form></form>");
        
            var starth = calEvent.start.format('HH:mm:ss');
            var endh = calEvent.end.format('HH:mm:ss');
        
            var startd = calEvent.start.format('DD/MM/YYYY');
            var endd = calEvent.end.format('DD/MM/YYYY');
        
            form.append("<label>" + calEvent.title + "</label>");
            form.append("<div><h5>Inicio de Fecha: </h5>" + startd + "<h5>Hora: </h5>" + starth + "</div>");
            form.append("<div class='page-header'></div>");
            form.append("<div><h5>Fin de Fecha: </h5>" + endd + "<h5>Hora: </h5>" + endh + "</div>");
            $this.$modal.modal({
                backdrop: 'static'
            });
            $this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                    console.log(calEvent.url); 
                    $.ajax({
                    url: 'php/eliminar.php',
                    type: 'POST',
                    data: 'delete='+calEvent.url,
                    dataType: 'json',
                    success:function(html){
                         //$('#calendar').load('php/calendario_reload.php');
                    }
                });
                    return (ev._id == calEvent._id);
                    
                    
                });
                $this.$modal.modal('hide');
                
            });
    },
    /* on select */
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
        var $this = this;
            $this.$modal.modal({
                backdrop: 'static'
            });
            var form = $("<form></form>");
            form.append("<div class='row'></div>");
            form.find(".row")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")
                .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")
                .find("select[name='category']")
                .append("<option value='bg-danger'>Danger</option>")
                .append("<option value='bg-success'>Success</option>")
                .append("<option value='bg-purple'>Purple</option>")
                .append("<option value='bg-primary'>Primary</option>")
                .append("<option value='bg-warning'>Warning</option></div></div>");
            $this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                form.submit();
            });
        
            $this.$modal.find('form').on('submit', function () {
                var title = form.find("input[name='title']").val();
                var beginning = form.find("input[name='beginning']").val();
                var ending = form.find("input[name='ending']").val();
                var categoryClass = form.find("select[name='category'] option:checked").val();
                if (title !== null && title.length != 0) {
                    $this.$calendarObj.fullCalendar('renderEvent', {
                        title: title,
                        start:start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);  
                    $this.$modal.modal('hide');
                }
                else{
                    alert('You have to give a title to your event');
                }
                return false;
                
            });
            $this.$calendarObj.fullCalendar('unselect');
    },
    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }
    /* Initializing */
    CalendarApp.prototype.init = function() {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());
        
        //"sun","mon","tue","wed","thu","fri","sat"
        //Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec
        
        var defaultEvents =  [<?php 
        
$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];



$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));
if (!isset($_GET['lev'])) {
$query_alt = "select * from calendario";
} else {
$query_alt = "select * from calendario where lev = $_GET[lev]";
}
            
$res_alt = mysqli_query($connection,$query_alt);

while($row_alt=mysqli_fetch_array($res_alt)){

$state = $row_alt['estado'];
if ($state == 1) {
$estado = "bg-success";
} else {
$estado = "bg-danger";
}

?>{


                title: 'Lev. <?php echo $row_alt['lev']; ?>',
                start: '<?php echo $row_alt['fechainicio']; ?>',
                end: '<?php echo $row_alt['fechafin']; ?>',
                url: '<?php echo $row_alt['global']; ?>',
                className: '<?php echo $estado; ?>'
            },
<?php } ?> {
                title: 'Fin',
                start: 'Feb 27 14:00:00 2090',
                className: 'bg-danger'
            }];

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '00:00:00',
            maxTime: '24:00:00',  
            defaultView: 'month',  
            handleWindowResize: true,   
            height: $(window).height() - 200,   
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            events: defaultEvents,
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            eventLimit: false, // allow "more" link when too many events
            selectable: false,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); },

        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });
    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
        </script>
        
       <script>
       

           
/*$(document).ready(function(){


$(document).on('auxclick', '#delete_product', function(e){

var productId = $(this).data('id');
SwalDelete(productId);
e.preventDefault();
});

});

function SwalDelete(productId){

    
        swal({   
            title: "Estás seguro?",   
            text: "No podrás recuperar el registro!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, eliminalo!",   
            cancelButtonText: "No, cancela!",   
            closeOnConfirm: false,   
            closeOnCancel: true 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Eliminado!", "Ha sido eliminado el registro satisfactoriamente.", "success"); 
                
                    $.ajax({
                    url: 'php/eliminar.php',
                    type: 'POST',
                    data: 'delete='+productId,
                    dataType: 'json',
                    success:function(html){
                         $('#calendar').load('php/calendario_reload.php');
                    }
                });
            }
        });
    */
    
/*swal({
title: 'Estas seguro?',
text: "Se borrará de forma permanente!",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Si, bórralo!',
showLoaderOnConfirm: true,

preConfirm: function() {
return new Promise(function(resolve) {

$.ajax({
url: 'php/eliminar.php',
type: 'POST',
data: 'delete='+productId,
dataType: 'json'
})
.done(function(response){
swal('Eliminado!', response.message, response.status);
readProducts();
})
.fail(function(){
swal('Oops...', 'Algo salió mal con ajax !', 'error');
});
});
},
allowOutsideClick: false 
}); */

/*}*/

/*$(document).ready(function(){


$(document).on('click', '#delete_product', function(e){

var productId = $(this).data('id');
SwalComplete(productId);
e.preventDefault();
});

});

function SwalComplete(productId){

    
        swal({   
            title: "Seguro?",   
            text: "Has completado este ciclo!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#0db152",   
            confirmButtonText: "Si, eliminalo!",   
            cancelButtonText: "No, cancela!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Eliminado!", "Ha sido eliminado el registro satisfactoriamente.", "success"); 
                
                    $.ajax({
                    url: 'php/eliminar.php',
                    type: 'POST',
                    data: 'delete='+productId,
                    dataType: 'json'
                    });
            } else {     
                swal("Cancelado", "", "error");   
            } 
        });
}
           */
           
           
function readProducts(){
$('#load-products').load('panel.php'); 
}
           
           
           
       </script>
                <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <script src="assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="assets/toggles/toggles.min.js"></script>
        <script src="assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/spinner/spinner.min.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>
                                                
<script>
            jQuery(document).ready(function() {
                    
                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});

                // Form Toggles
                jQuery('.toggle').toggles({on: true});

                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({showMeridian: false});
                jQuery('#timepicker4').timepicker({showMeridian: false});
                jQuery('#timepicker5').timepicker({showMeridian: false});

                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker1').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                //colorpicker start

                $('.colorpicker-default').colorpicker({
                    format: 'hex'
                });
                $('.colorpicker-rgba').colorpicker();


                //multiselect start

                $('#my_multi_select1').multiSelect();
                $('#my_multi_select2').multiSelect({
                    selectableOptgroup: true
                });

                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                //spinner start
                $('#spinner1').spinner({value:<?php echo date("Y"); ?>, min: <?php echo date("Y") - 1; ?>, max: <?php echo date("Y"); ?>});
                $('#spinner2').spinner({disabled: true});
                $('#spinner3').spinner({value:53, min: 1, max: 53});
                $('#spinner4').spinner({value:0, step: 5, min: 0, max: 200});
                //spinner end

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>


        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
       

</body>
</html>