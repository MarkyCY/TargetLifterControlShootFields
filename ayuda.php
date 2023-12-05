<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Manual de Ayuda para la Tabla de Control de Levantadores</title>

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
        <link href="assets/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="assets/notifications/notification.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        
    </head>

<?php 

date_default_timezone_set('UTC');

$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));

$query = "select * from sold";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);
    
?>

    <body class="fixed-left">

        
<div class="row">
    
    
    <div class="col-lg-"> 
                                <ul class="nav nav-tabs tabs" style="width: 100%; position: fixed; z-index: 9999;">
                                    <li class="active tab" style="width: 25%;">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">Inicio</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab" style="width: 25%;"> 
                                        <a href="#leyenda-1" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="md md-class"></i>1</span> 
                                            <span class="hidden-xs">Leyenda | Tabla</span> 
                                        </a> 
                                    </li>
                                    <li class="tab" style="width: 25%;"> 
                                        <a href="#leyenda-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="md  md-book"></i>2</span> 
                                            <span class="hidden-xs">Leyenda | Caledario</span> 
                                        </a> 
                                    </li>
                                    <li class="tab" style="width: 25%;"> 
                                        <a href="#leyenda-3" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="md  md-book"></i>3</span> 
                                            <span class="hidden-xs">Leyenda | Registros</span> 
                                        </a> 
                                    </li>
                                    <li class="tab" style="width: 25%;"> 
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="md md-assignment-turned-in"></i></span> 
                                            <span class="hidden-xs">Procedimientos</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab" style="width: 25%;"> 
                                        <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="md md-perm-identity"></i></span> 
                                            <span class="hidden-xs">Sobre...</span> 
                                        </a> 
                                    </li> 
                                </ul>
                                <div class="tab-content col-lg-12 col-md-12 col-xs-12" style="margin-top: 70px; position: absolute;"> 
                                 <div id="home-2">
                                    <div style="margin-top: 15%; margin-bottom: 15%;" class="text-center page-header">
                                        <h1 style="" id="btn-fullscreen">Manual de uso para Control de Levantadores</h1>
                                </div>
                            </div>
                                    <div class="tab-pane" id="leyenda-1" style="display: none;">
                                        <div class="page-header">
                                        <h1>Tabla:</h1>
                                            <div class="page-header">
                                            <h3 class=""><strong><span class="fa fa-calendar text-purple"></span> Calendario individual:</strong> Pequeño calendario donde se muestran todos los registros de ciclos para un levantador determinado, permite añadir la fecha y hora de cada ciclo.</h3><br>
                                            
                                            <h3 class=""><strong><span class="fa fa-save text-success"></span> Guardar:</strong> Se usa para guardar el registro completo de los ciclos de carga que tenga cada levantador.</h3> <br>
                                            
                                            <h3 class=""><strong><i class="fa fa-pencil text-info"></i> Editar:</strong> Es para editar los datos del levantador, dígase <span>Carga</span>, <span>Ubicación</span> y una breve <span>Información</span> en caso de ser necesario.</h3><br>
                                            
                                            <h3 class=""><strong><i class="md md-info text-right"></i>/<i class="md md-info-outline text-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title=""></i> Información:</strong> Al poner el cursor sobre este ícono se podrá leer la información del levantador de manera directa; cuando se le añade información se mostrará de color negro <i class="md md-info text-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="(Información)"></i>; De no contenerla se mostrará transparente <i class="md md-info-outline text-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title=""></i></h3><br>
                                            
                                            <div>
                                            <h3 class=""><strong>Barra de batería:</strong></h3>
                                            <div class="progress" style="width: 10%; margin-bottom: 5px;">
                                                <div class="progress-bar progress-bar-animated bg-danger" style="width:93%;"> 13 V 93%
                                                </div>
                                            </div>
                                                <h3>Muestra un nivel de carga de la batería del levantador donde el mínimo es 0 V y el máximo es 14 V, además expresada en tanto porciento.</h3><br>
                                            </div>
                                                
                                            </div>
                                            <div class="page-header">
                                            <h3 class=""><strong>No. Levantador:</strong> Número de identificación de cada levantador.</h3><br>
                                            
                                            <h3 class=""><strong><i class="fa fa-spin fa-refresh"></i> Ciclo de carga:</strong> Panel de gestión del ciclo de carga de cada levantador que incluye el botón Calendario y Guardar.</h3><br>
                                            
                                            <h3 class=""><strong><i class="md md-battery-60"></i> Batería:</strong> Panel donde se indica el nivel de voltaje expresado en cada barra de batería.</h3><br>
                                            
                                            <h3 class=""><strong><i class="md md-place"></i> Ubicación:</strong> Ubicación actual de cada levantador. Ejem: (Almacén, Campo, Taller...)</h3><br>
                                            
                                            <h3 class=""><strong><i class="fa fa-pencil-square-o"></i> Editar:</strong> Panel donde se encuentran los íconos: Editar e Información.</h3><br>
                                                
                                            <h3 class=""><strong>Colores:</strong> Cuatro (4) colores que indican el estado de cada levantador.</h3> <p><span class="text-danger">Defectuoso:</span> Si la carga es menor o igual que 10. <span class="text-warning">Sin Carga:</span> Si la carga es igual a 11 o a 12. <span class="text-success">Buen Estado</span> Si la carga es igual a 13. <span class="text-info">Óptimo</span> Si la carga es igual a 14.</p><br>
                                            </div>
                                            <h1><i class="fa fa-save text-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Guardar Registros"></i></h1><h3><strong>Guardar registros:</strong> Este ícono permite guardar un registro general de todos los levantadores por escrito (No. Levantador, Voltaje, Ubicación, Información y su Estado)</h3>
                                            <h1><i class="md md-event text-purple" data-toggle="tooltip" data-placement="right" title="" data-original-title="Ciclo de Carga"></i></h1><h3><strong>Calendario General:</strong> Acceso directo al Calendario General donde aparecen reflejados todos los ciclos de carga cumplidos en el mes.</h3>
                                            <h1><i class="md md-wallet-travel text-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Carpetas de Registros"></i></h1><h3><strong>Carpetas de Registros:</strong> Sitio donde se ubican las carpetas de registros donde está el estado y los ciclos de carga de los levantadores.</h3>
                                            <h1><i class="md md-live-help text-danger" data-toggle="tooltip" data-placement="right" title="" data-original-title="Ayuda"></i></h1><h3><strong>Manual de Ayuda:</strong> Manual sobre como trabajar correctamente en la aplicación.</h3>
                                        </div>
                                        </div>
                                    <div class="tab-pane" id="leyenda-2" style="display: none;">
                                        <div class="page-header">
                                            <div class="container"><div class="col-lg-6 col-md-6"><h1>Calendario General:</h1> <div class="" style="background-image: url('images/cal.png'); width: 200px; height: 114px;"></div></div>
                                            <div class="col-lg-6 col-md-6"><h1>Calendario Individual:</h1> <div class="" style="background-image: url('images/cal-ind.png'); width: 200px; height: 114px;"></div></div></div>
                                            <hr>
                                        <h2>1-) Al acceder al calendario general por cualquiera de los iconos <span class="fa fa-calendar text-purple"></span> / <span class="md md-event text-purple"></span> aparecerán los marcadores de ciclo en las casillas correspondientes mostrándose de color rojo <i class="md md-lens text-danger"></i> los incumplidos y verde <i class="md md-lens text-success"></i> los cumplidos. Ej:<br><br></h2><tr>
                                            <h3 class=""><h3 class=""><strong>Marcador incumplido:</strong> </h3><div class="" style="background-image: url('images/ao.png'); width: 230px; height: 25px;"></div></h3>
                                            <h3 class=""><h3 class=""><strong>Marcador cumplido:</strong></h3><div class="" style="background-image: url('images/aoe.png'); width: 230px; height: 25px;"></div></h3><br>
                                            <h2>2-) Al hacer click izquierdo sobre un marcador se mostrará una breve información sobre el mismo.</h2>
                                            <h3 class=""><h2 class=""><br>3-) Y para <strong>eliminar un registro</strong> basta con hacer click en el botón <span class="text-danger">Eliminar</span> que aparece en la parte inferior derecha del panel que aparece en el paso 2.</h2></h3>
                                            <hr>
                                            <h2 class="text-center text-muted">Información de desplazamiento y utilización de los controles del Calendario General</h2>
                                            <div class="page-header">
                                            <div class="fc-toolbar"><div class="fc-left"><div class="fc-button-group"><button data-toggle="tooltip" data-placement="top" title="" data-original-title="Correr mes/semana/día a la izquierda" type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button data-toggle="tooltip" data-placement="top" title="" data-original-title="Correr mes/semana/día a la derecha" type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button data-toggle="tooltip" data-placement="top" title="" data-original-title="Ir al día actual." type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="disabled">hoy</button></div><div  class="fc-right"><div class="fc-button-group"><button data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar calendario por mes." type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">mes</button><button type="button" class="fc-basicWeek-button fc-button fc-state-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar calendario por semana.">semana</button><button type="button" class="fc-basicDay-button fc-button fc-state-default fc-corner-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mostrar calendario por día.">dia</button></div></div><div class="fc-center"><h2 data-toggle="tooltip" data-placement="top" title="" data-original-title="Fecha en cuestión">Mayo 2021</h2></div><div class="fc-clear"></div></div>
                                            </div>
                                            
                                            <h3><h1>Botones:</h1>
                                            <button class="btn btn-block  btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Una vez añadida la fecha, hora de inicio y/o período de carga este botón enviarán los datos para así ser registrados."><i class="fa fa-paper-plane"></i> Enviar</button>
                                                
                                            <a href="#" class="btn btn-lg btn-purple btn-block waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Al hacer click aparece un panel donde puede planificar un ciclo de carga al levantador asignado."><i class="md md-history"></i> Crear Ciclo</a>
                                                
                                            <a href="#" class="btn btn-lg btn-warning btn-block waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Este botón es para ir al inicio donde se encuentra la tabla del control de los levantadores."><i class="fa fa-home"></i> Volver</a>
                                            </h3>
                                        </div>
                                    </div> 
                                    <div id="leyenda-3">
                                        <div class="page">
                                        <div class="container"><div class="col-lg-3 col-md-3"><h3>Carpetas de Registros:</h3> <div class="" style="background-image: url('images/path_reg.jpg'); width: 200px; height: 114px;"></div></div>
                                            <div class="col-lg-3 col-md-3"><h3>Vista de Carpetas:</h3> <div class="" style="background-image: url('images/view_reg.jpg'); width: 200px; height: 114px;"></div></div>
                                            <div class="col-lg-3 col-md-3"><h3>Registro de Estados:</h3> <div class="" style="background-image: url('images/status_reg.jpg'); width: 200px; height: 114px;"></div></div>
                                            <div class="col-lg-3 col-md-3"><h3>Registros de Ciclos:</h3> <div class="" style="background-image: url('images/ciclo_reg.jpg'); width: 200px; height: 114px;"></div></div>
                                            </div>
                                            <hr>
                                            <h1 class="text-center">Carpetas de Registros</h1><h1 class="background-md" style="font-size: 27em; position: absolute; left: 40%; color: rgba(64, 65, 66, 0.07);"><i class="md md-map" style="top: 60px; position: relative;"></i></h1>
                                <div class="row maintenance-page col-md-12 col-sm-12 col-xs-12" style="margin: 1% 0%;">
                                <div id="rovert" class="rovert col-md-3 col-sm-3 col-xs-12 text-center text-muted">
                                    <a class="text-muted">
                                    <div class="mainten-box">
                                        <i class="fa fa-folder-open fa-2x m-b-15"></i>
                                        <p class="text-uppercase">Estado de Levantadores</p>
                                        <p class="text-m-mode">Carpeta de registros de estado de los Levantadores.</p>
                                    </div>
                                    </a>
                                </div>
                                <div><p>Blabla blabla</p></div>
                            </div>           
                            <div class="row maintenance-page col-md-12 col-sm-12 col-xs-12" style="margin: 1% 0%;">
                                <div id="rovert" class="rovert col-md-3 col-sm-3 col-xs-12 text-center text-muted">
                                    <a class="text-muted">
                                    <div class="mainten-box">
                                        <i class="fa fa-history fa-2x m-b-15"></i>
                                        <p class="text-med text-uppercase font-weight-600 letter-spacing-1 black-text">Ciclos</p>
                                        <p class="text-m-mode">Carpeta de registros de ciclos de los levantadores.</p>
                                    </div>
                                     </a>
                                </div>
                            </div>
                                        </div>
                            </div>
                                    <div class="tab-pane" id="messages-2" style="display: none;">
                                      <h1 class="lead">Pasos para la creación de un ciclo</h1> 
                                        <ol style="font-size: 20px;">
                                            <li>En el levantador que quieras trabajar, selecciona en su calendario individual el día donde se quiere comenzar el ciclo.</li>
                                            <li>Luego de ser enviado al calendario General preciona el botón: Crear Ciclo.</li>
                                            <li>Aparecerá un panel con los siguientes datos:</li>
                                            <ul>
                                            <li><span class="text-success">Levantador No. (#)</span> Número del levantador señalado en el 1er paso.</li>
                                            <li><span class="text-success">Inicio Fecha</span> Fecha Señalada donde inicia el ciclo (Puede ser cambiado haciendo click sobre la misma).</li>
                                            <li><span class="text-success">Cantidad de semanas</span> Cantidad de semanas que se van a marcar a partir de la fecha señalada. Con un máximo de 53 semanas ya que ese es el aproximado a todas las semanas que tiene un año.</li>
                                            <li><span class="text-success">Eliminar antiguos registros?</span> Elimina todos los registros del levantador asignado. (No es una opción recomendada)</li>
                                            <li><span class="text-success">Aceptar</span> Procede a ejecutar el ciclo </li>
                                            </ul>
                                            <li>Una vez aceptado el formulario se mostrará todos los marcadores nuevos creados y listos.</li>
                                        </ol>
                                        <p>(Nota: Los marcadores se registrarán como No Cumplidos.)</p>
                                        <hr>
                                        <h1 class="lead">Pasos para cumplir un día/marcador</h1> 
                                        <ol style="font-size: 20px;">
                                            <li>En el levantador que quieras trabajar, selecciona en su calendario individual el día que quieras cumplir.</li>
                                            <li>Luego de ser enviado al calendario General aparecerá un panel a la derecha de este con los siguientes datos:</li>
                                            <ul>
                                            <li><span class="text-success">Levantador (#)</span> Número del levantador señalado en el 1er paso.</li>
                                            <li><span class="text-success">Inicio Fecha</span> Fecha marcada.</li>
                                            <li><span class="text-success">Inicio de la Carga</span> Hora donde inicia la carga del levantador.</li>
                                            <li><span class="text-success">Período de Carga</span> Tres (3) opciones donde se debe señalar la cantidad de horas que duró la carga del levantador.</li>
                                            <li><span class="text-success">Cumplido?</span> Es obligatorio marcarlo para cumplir el día. (Si señalas un marcador no cumplido en el paso 1, esta opción aparecerá marcada y no podrá cambiarse) si no se marca el marcador se registra como incumplido.</li>
                                            <li><span class="text-success">Enviar</span> Procede a aceptar los datos anteriores y registrar el marcador. </li>
                                            </ul>
                                            <li>Una vez enviado el marcador se registra y queda plasmado como cumplido.</li>
                                        </ol>
                                        <hr>
                                        <h1 class="lead">Pasos para editar la información de un levantador</h1> 
                                        <ol style="font-size: 20px;">
                                            <li>Haz click en el icono <i class="fa fa-pencil text-info"></i> del levantador que se quiera editar.</li>
                                            <li>Luego aparecerá un panel con los siguientes datos que puedes modificar:</li>
                                            <ul>
                                            <li><span class="text-success">Carga</span> Donde se registra el nivel de carga del levantador.</li>
                                            <li><span class="text-success">Ubicación</span> Es donde se registra la ubicación actual del levantador.</li>
                                            <li><span class="text-success">Información</span> Aquí se registra una breve información sobre el estado o condición del levantador.</li>
                                            <li><span class="text-info">Aceptar</span> Acepta y registra los datos anteriores. </li>
                                            </ul>
                                            <li>Recomendación: Cada vez que se hace algún cambio al terminar en el día, accionar el botón Guardar Registros para plasmar los cambios en la carpeta de los registros.</li>
                                        </ol>
                                    </div> 
                                    <div class="tab-pane" id="settings-2" style="display: none;">
                                        <div class="text-center page-header">
                                            <h2 class="datosar">Agradecimientos <small></small></h2>
                                            <h3 class="datosa">En primer lugar queremos agradecer a la empresa de simuladores SIMPRO por aportar los medios necesarios para el desarollo de este proyecto, también a la jefatura del centro de estudio UM 7060 y del Sector Militar Especial Isla de la Juventud. Así como un agradecimiento especial al <strong>CapR.</strong> Yusniel Aliaga Saborit, <strong>1er Tte.</strong> Jose Luis Velazques Pérez, <strong>1er Tte.</strong> Juannier Alvarez Calunga, <strong>Cap.</strong> Yankiel Deroncele Morel, <strong>TCor.</strong> Alexis Laffita y <strong>TCor.</strong> Nicolai Castillo Quiñones.<br>(Y a todos los que de una forma u otra hicieron posible este proyecto)</h3>  
                                        </div>
                                        
                                        <address class="ng-scope text-center">
                                            <strong>Sector Militar Especial Isla de la Juventud</strong>
                                            <strong>Unidad Mayor 1180</strong><br>
                                            <strong>Unidad Menor 7060</strong><br><br>
                                            Sold. Marcos J. Cárdenas P.<br>
                                            <abbr title="Teléfono">Tel:</abbr> <a href="tel:+5355282694">(+53) 552-826-94</a><br>
                                            <abbr title="Correo Electrónico">Email:</abbr> <a href="mailto:oranmarcos@gmail.com">oranmarcos@gmail.com</a><br><br>
                                            Sold. Dairiel A. Ortiz C.<br>
                                            <abbr title="Correo Electrónico">Email:</abbr> <a href="mailto:dairielortiz2@gmail.com">dairielortiz2@gmail.com</a>
                                        </address>
                                        <blockquote class="blockquote-reverse"><p>Ser culto es el único modo de ser libre.</p><footer><cite title="Héroe Nacional">José Martí</cite></footer></blockquote>
                                       
                                    </div> 
                                </div> 
                            </div>
                        </div>
        
        
        
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
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