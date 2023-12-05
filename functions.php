<?php

date_default_timezone_set('UTC');

if (!isset($_GET['month'])) { $today = date('d M Y'); $fecha = new DateTime(''.$today.''); } else {  $today = date('d'); $fecha = new DateTime(''.$today.' '.$_GET['month'].' '.$_GET['year'].''); }

$fecha_comp = $fecha->format('m');
$fecha_comq = $fecha->format('M');
$fecha_comy = $fecha->format('Y');
$dateMonth = $fecha_comp;
$dateMontha = $fecha_comq;
$dateYear = $fecha_comy;   

    $date = $dateYear.'-'.$dateMonth.'-01';
    $currentMonthFirstDay = date("N",strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
    
if($dateMonth == 1){$dated = "Ene";} 
if($dateMonth == 2){$dated = "Feb";}  
if($dateMonth == 3){$dated = "Mar";}  
if($dateMonth == 4){$dated = "Abr";}  
if($dateMonth == 5){$dated = "May";}  
if($dateMonth == 6){$dated = "Jun";}  
if($dateMonth == 7){$dated = "Jul";}  
if($dateMonth == 8){$dated = "Ago";}
if($dateMonth == 9){$dated = "Sep";}  
if($dateMonth == 10){$dated = "Oct";}  
if($dateMonth == 11){$dated = "Nov";}  
if($dateMonth == 12){$dated = "Dic";}
    
 ?>

<html><head>
    <script type="text/javascript">
    
    function getCalendar(target_div,year,month){
    $.ajax({
    type:'GET',
    url:'functions.php',
    data:'&year='+year+'&month='+month+'&lev=<?php echo $_GET['lev']; ?>',
    success:function(html){
    $('#'+target_div).html(html);
    }
    });
    }

  </script>
    </head><body>


  <div class="datepicker-days" style="display: block;">
      
<table class="table-condensed popover-tbl" style="">
  <thead>
  <tr>
  <th colspan="7" class="datepicker-switch text-center"><a href="javascript:void(0);" onclick="getCalendar('target_div_<?php echo $_GET['lev']; ?>','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("M",strtotime($date.' - 1 Month')); ?>');">«</a>  Lev <?php echo $_GET['lev'];?> | <?php echo $dated;?> <?php  echo $dateYear;?>  <a href="javascript:void(0);" onclick="getCalendar('target_div_<?php echo $_GET['lev']; ?>','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("M",strtotime($date.' + 1 Month')); ?>');">»</a></th>
  <th colspan="1" class="datepicker-switch text-center closer_x"><i style="cursor: pointer;" class="close_c md md-clear" onclick="hideCalendar('<?php echo $_GET['lev'];?>')"></i></th>  
    <tr>
      <th class="dow">Do</th>
      <th class="dow">Lu</th>
      <th class="dow">Ma</th>
      <th class="dow">Mi</th>
      <th class="dow">Ju</th>
      <th class="dow">Vi</th>
      <th class="dow">Sa</th>
    </tr>
  </thead>
  <tbody id="calender_section_bot">
    <tr>
      <?php
                $dayCount = 1; 
                for($cb=1;$cb<=$boxDisplay;$cb++){
                    if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
                   
                        //Current date
                        $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
                        $fecha = date($currentDate);
                        $nuevafecha = strtotime ( '+0 hour' , strtotime ( $fecha ) ) ;
                        $mes = date ( 'M' , $nuevafecha );
                        $año = date ( 'Y' , $nuevafecha );

                        $currentDatea = $dateMontha.' '.$dayCount.' '.$dateYear;
                        $eventNum = 0;
                        //Include db configuration file

//db details
                        
$ini = parse_ini_file('php/config.ini');            
                        
$dbHost =       $ini['db_host'];
$dbUsername =   $ini['db_user'];
$dbPassword =   $ini['db_pass'];
$dbName =       $ini['db_base'];
$lev = $_GET['lev'];


//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
    }
    
                        //Get number of events based on the current date
                        $result = $db->query("SELECT * FROM events WHERE date = '".$currentDatea."' AND lev = '".$lev."'");
                        $eventNum = $result->num_rows;
                        
                        //Define date cell color
                        if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
                        if ($eventNum == 1) {
                        while($row = $result->fetch_assoc()){ 
                            echo '<td style="'; if ($row['status'] == 0) { echo 'background-color: #fec0c0;';} else if($row['status'] == 1) { echo 'background-color: #c0fee1;';} echo '" class="active_day" date="'.$currentDate.'" title="'.$row['startend'].'" data-toggle="" data-placement="top"><a style="display: block;" href="calendario.php?dia='.$dayCount.'&mes='.$mes.'&año='.$año.'&lev='.$lev.''; if ($row['status'] == 0) { echo '&edit=0';} else if ($row['status'] == 1){ echo '&edit=1'; } echo '">';
                        }} else {
                            echo '<td class="day" date="'.$currentDate.'" class="grey date_cell"><a style="display: block;" href="calendario.php?dia='.$dayCount.'&mes='.$mes.'&año='.$año.'&lev='.$lev.'">'; 
                            }
                            
                        } elseif($eventNum > 0){
                            while($row = $result->fetch_assoc()){ 
                           echo '<td style="'; if ($row['status'] == 0) { echo 'background-color: #fec0c0;';} else if($row['status'] == 1) { echo 'background-color: #c0fee1;';} echo '" class="active_day" date="'.$currentDate.'" title="'.$row['startend'].'" data-toggle="" data-placement="top">'; echo '<a style="display: block;" href="calendario.php?dia='.$dayCount.'&mes='.$mes.'&año='.$año.'&lev='.$lev.''; if ($row['status'] == 0) { echo '&edit=0';} else if ($row['status'] == 1){ echo '&edit=1'; } echo '">';
                        }
                        }else{
                            echo '<td style="" class="day" date="'.$currentDate.'" class="date_cell"><a style="display: block;" href="calendario.php?dia='.$dayCount.'&mes='.$mes.'&año='.$año.'&lev='.$lev.'">';
                        } 
                        //Date cell
                        //echo '<span>';
                        echo $dayCount;
                        //echo '</span>';
                        if ($cb == 7 || $cb == 14 || $cb == 21 || $cb == 28 || $cb == 35){ echo '<tr>';}
                        //Hover event popup
                        /*echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
                        echo '<div class="date_window">';
                        echo '<div class="popup_event">Events ('.$eventNum.')</div>';
                        echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents('.$currentDate.');">Ver Eventos</a>':'';
                        echo '</div></div>';*/
                        
                        echo '</td>';
                        $dayCount++;
            ?>
      <?php } else { ?>
      <td>
        <span>&nbsp;</span>
      </td>
      <?php } } ?>
    </tr>
  </tbody>
</table>
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
    </body></html>