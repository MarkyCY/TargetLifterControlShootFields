<?php 

date_default_timezone_set('UTC');

$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));
$utf = $connection->query("SET NAMES 'utf8'");

$lev = $_GET['lev'];


if (!isset($_GET['modify'])){

$start_date = $_GET['start_date'];

$start_time = $_GET['start_time'];



//Fin del tiempo por ciclos





/*Mini Calendario*/


$date_a = $start_date;


echo '<br>';
echo $date_a;
echo '<br>';

$fecha = new DateTime(''.$date_a.''); 
$fecha->modify('+0 hours');
$fecha_comp = $fecha->format('M d Y');
echo 'start '.$fecha_comp.'//start';

/*FIN Mini Calendario*/

$db = new mysqli('localhost', 'root', '', 'gestion');

$result = $db->query("SELECT * FROM events WHERE date = '".$date_a."' AND lev = '".$lev."'");
$eventNum = $result->num_rows;
if ($eventNum == 0){                      

if (isset($_GET['chck'])) {$chck = 1; echo $_GET['chck'];} else { $chck = 0; }

      
$inicio = ''.$start_date.' '.$start_time.':00';
      
echo '<br>';
$inicio = ''.$start_date.' '.$start_time.':00';    
echo $inicio;    
echo '<br>';   

$radio = $_GET['radio'];
      
$principio = new DateTime(''.$inicio.''); 
$principio->modify('+0 hours');
$inicio = $principio->format('M d H:i:s Y');
echo 'start '.$inicio.'//start';
    
$glb_id = $principio->format('mdY');
    
$global = ''.$lev.''.$glb_id.'';
echo 'global<br>'.$global.'<br>global';
      
$mifecha = new DateTime(''.$inicio.''); 
$mifecha->modify('+'.$radio.' hours');
$fin = $mifecha->format('M d H:i:s Y');
$end_time = $mifecha->format('H:i');
echo $end_time;  
echo '<br>';  
$startend = $start_time.' - '.$end_time;
      
$query = "INSERT INTO calendario (`lev`, `global`, `fechainicio`, `fechafin`, `estado`) VALUES ('$lev', '$global', '$inicio', '$fin', '$chck')";
$query_min = "INSERT INTO events (`lev`, `global`, `date`, `startend`, `status`) VALUES ('$lev', '$global', '$date_a', '$startend', '$chck')";
echo $query;
echo '<br>';
echo $query_min;


mysqli_query($connection, $query) or die("Error");
mysqli_query($connection, $query_min) or die("Error");

header('Location:calendario.php');

} else { header('Location:php/error.php?error=2'); 
  }



$mes = date('4');
//echo $mes;

/*$er = new DateTime('Apr 4 15:54:00 2021');
$ar = $er->format('M');
echo $ar;*/

} /*MODIFYYYYYY*/ 

elseif (isset($_GET['modify']) && $_GET['modify'] == 0) {
    
    
$start_date = $_GET['start_date'];

$start_time = $_GET['start_time'];



//Fin del tiempo por ciclos


/*Mini Calendario*/


$date_a = $start_date;


/*echo '<br>';
echo $date_a;
echo '<br>';*/

$fecha = new DateTime(''.$date_a.''); 
$fecha->modify('+0 hours');
$fecha_comp = $fecha->format('M d Y');
//echo 'start '.$fecha_comp.'//start';

/*FIN Mini Calendario*/

$db = new mysqli('localhost', 'root', '', 'gestion');

$result = $db->query("SELECT * FROM events WHERE date = '".$date_a."' AND lev = '".$lev."'");
$eventNum = $result->num_rows;
if ($eventNum == 0 || isset($_GET['modify'])){                      

if (isset($_GET['chck'])) {$chck = 1; echo $_GET['chck'];} else { $chck = 0; }

      
$inicio = ''.$start_date.' '.$start_time.':00';
      
echo '<br>';
$inicio = ''.$start_date.' '.$start_time.':00';    
echo $inicio;    
echo '<br>';   

$radio = $_GET['radio'];
      
$principio = new DateTime(''.$inicio.''); 
$principio->modify('+0 hours');
$inicio = $principio->format('M d H:i:s Y');
echo 'start '.$inicio.'//start';
    
    
$glb_id = $principio->format('mdY');
    
$global = ''.$lev.''.$glb_id.'';
echo 'global<br>'.$global.'<br>global';
      
      
$mifecha = new DateTime(''.$inicio.''); 
$mifecha->modify('+'.$radio.' hours');
$fin = $mifecha->format('M d H:i:s Y');
$end_time = $mifecha->format('H:i');
echo $end_time;  
echo '<br>';  
$startend = $start_time.' - '.$end_time;
    

    
$query = "UPDATE calendario SET estado = '1', fechainicio = '$inicio', fechafin = '$fin' WHERE lev = '$lev' AND global = '$global'";
$query_min = "UPDATE events SET date = '$date_a', startend = '$startend', status = '1' WHERE lev = '$lev' AND global = '$global'";
    
mysqli_query($connection, $query) or die("Error");
mysqli_query($connection, $query_min) or die("Error");

header('Location:calendario.php');
    
echo $query;
 echo '<br>';
echo $query_min;
    
    
} else {
    
    header('Location:tabla.php');
}}
    
    
?>













