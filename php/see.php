<?php 

$db_user = "root";
$db_pass = "";
$db_base = "gestion";
$db_host = "localhost";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));

$query = "select * from calendario where global='$_GET[global]'";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);
$counter = mysqli_num_rows($res);


while($row=mysqli_fetch_array($res)){
$lev = $row['lev'];
$status = $row['estado'];
$inicio = $row['fechainicio'];
$fin = $row['fechafin'];


$principio = new DateTime(''.$inicio.''); 
$inicio = $principio->format('H:i');
$iniciod = $principio->format('d M Y');

$final = new DateTime(''.$fin.''); 
$fin = $final->format('H:i');
$find = $final->format('d M Y');

}
?>


                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myModalLabel">Detalle de registro</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Levantador No. <?php echo $lev; ?></h4>
                                                        <p><?php if($status == 0){ echo "Aún no se ha cumplido este registro.";} else {echo "Se ha cumplido este registro";} ?></p>
                                                        <hr>
                                                        <h4>Ciclo de carga:</h4>
                                                        <p><?php if($status == 0){ echo 'Empezará el <span class="text-warning">'.$iniciod.'</span> desde la(s) <span class="text-warning">'.$inicio.'</span> hasta el <span class="text-warning">'.$find.'</span> a la(s) <span class="text-warning">'.$fin.'</span>';} else {echo 'Empezó el <span class="text-warning">'.$iniciod.'</span> a la(s) <span class="text-danger">'.$inicio.'</span> <br><br> Terminó el <span class="text-warning">'.$find.'</span> a la(s) <span class="text-danger">'.$fin.'</span>.';} ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>