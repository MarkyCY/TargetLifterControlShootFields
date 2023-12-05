<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Error</title>

        <!-- Base Css Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="../css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="../css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="../css/helper.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />

        <script src="../js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="ex-page-content text-center">
            <h1>Error!</h1>
            <?php
            if(isset($_GET['error'])){
            $error = $_GET['error'];
            
            if($error == 1){
            $info = 'El valor de la carga no debe ser mayor de <span class="text-pink">14</span> o menor que <span class="text-pink">0</span>.';
            echo "<h2>".$info."</h2><br>";
            } else if($error == 2){
            $info = 'Esta fecha ya esta registrada para este <span class="text-pink">Levantador</span>.';
            echo "<h2>".$info."</h2><br>";
            } else { 
            echo '<h2>No hay error alguno que mostrar ;)</h2><br>'; 
            }
            
            } else if(!isset($_GET['error'])){
            $info = 'No hay error alguno que mostrar ;)';
            
            echo "<h2>".$info."</h2><br>";
            }
            ?>
                
                
                
                <a class="btn btn-purple waves-effect waves-light" href="../tabla.php"><i class="fa fa-angle-left"></i> Volver </a>
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/waves.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../assets/jquery-detectmobile/detect.js"></script>
        <script src="../assets/fastclick/fastclick.js"></script>
        <script src="../assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="../assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="../js/jquery.app.js"></script>
	
	</body>
</html>