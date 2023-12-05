 <?php

$ini = parse_ini_file('config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));

$query = "select * from sold";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);




if ( isset($_GET['lev']) && isset($_GET['day']) && isset($_GET['rpt'])) {
$lev = $_GET['lev'];
$rpt = $_GET['rpt'];
    
if ( isset($_GET['chk']) ){
    $delete = "DELETE FROM calendario WHERE lev = $lev";
    $deletec = "DELETE FROM events WHERE lev = $lev";
     $rest = mysqli_query($connection, $delete);
     $rest = mysqli_query($connection, $deletec);
    }
    
    
    
    
    $day = $_GET['day'];
     //$day = "May 01 21:45:00 2021";

    
    $principio = new DateTime($day);
        $principio->modify("+0 day");
        $day = $principio->format('M d H:i:s Y');
        
        //Generar id Global 
        $glb_id = $principio->format('mdY');
        $global = ''.$lev.''.$glb_id.'';
        //Generar Fecha del calendario pequeño
         $date_m = $principio->format('M'); $date_d = $principio->format('d'); $date_y = $principio->format('Y'); $date_a = $date_d + 0;
         $date_a = "$date_m $date_a $date_y";
         $startend = $principio->format('H:i');
         $startend = "$startend - ?";
    
        $daytwo = new DateTime($day);
        $daytwo->modify("+1 hours");
        $dayt = $daytwo->format('M d H:i:s Y');
         
$db = new mysqli($db_host, $db_user, $db_pass, $db_base);
$result = $db->query("select * from calendario where fechainicio = '".$day."' AND lev = '".$lev."'");
$eventNum = $result->num_rows;
        
$est = $db->query("select * from calendario WHERE estado = 1 AND global = '".$global."'");
$estNum = $est->num_rows;

        //echo "$day <br>"; 
         if ($estNum == 1){
             
         }else if ($eventNum == 0){
        //echo "$day <br>"; 
         $query = "INSERT INTO calendario (`lev`, `global`, `fechainicio`, `fechafin`, `estado`) VALUES ('$lev', '$global', '$day', '$dayt', '0')";
         $query_min = "INSERT INTO events (`lev`, `global`, `date`, `startend`, `status`) VALUES ('$lev', '$global', '$date_a', '$startend', '0')";
         echo "$query <br> $query_min <br>";
         $rest = mysqli_query($connection, $query);
         $rest = mysqli_query($connection, $query_min);
    }
    
    
    
    
    
     for($r=1;$r<=$rpt;$r++){
  
         
        $principio = new DateTime($day);
        $principio->modify("+7 day");
        $day = $principio->format('M d H:i:s Y');
        
        //Generar id Global 
        $glb_id = $principio->format('mdY');
        $global = ''.$lev.''.$glb_id.'';
        //Generar Fecha del calendario pequeño
         $date_m = $principio->format('M'); $date_d = $principio->format('d'); $date_y = $principio->format('Y'); $date_a = $date_d + 0;
         $date_a = "$date_m $date_a $date_y";
         $startend = $principio->format('H:i');
         $startend = "$startend - ?";
         
         $daytwo = new DateTime($day);
        $daytwo->modify("+1 hours");
        $dayt = $daytwo->format('M d H:i:s Y');
         

$db = new mysqli($db_host, $db_user, $db_pass, $db_base);
$result = $db->query("select * from calendario where fechainicio = '".$day."' AND lev = '".$lev."'");
$eventNum = $result->num_rows;
        
$est = $db->query("select * from calendario WHERE estado = 1 AND global = '".$global."'");
$estNum = $est->num_rows;
   //echo   "$estNum<br>$global<br>$day<br><br>";    
         
//echo "$day dia<br>";
         
        //echo "$day <br>"; 
         if ($estNum == 1){
             
         }else if ($eventNum == 0){
         $query = "INSERT INTO calendario (`lev`, `global`, `fechainicio`, `fechafin`, `estado`) VALUES ('$lev', '$global', '$day', '$dayt', '0')";
         $query_min = "INSERT INTO events (`lev`, `global`, `date`, `startend`, `status`) VALUES ('$lev', '$global', '$date_a', '$startend', '0')";
         $rest = mysqli_query($connection, $query);
         $rest = mysqli_query($connection, $query_min);
}
     }

} header("Location:../calendario.php");






