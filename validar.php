<?php 

date_default_timezone_set('UTC');

$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));
$utf = $connection->query("SET NAMES 'utf8'");

$id = $_GET['id'];
$carga = $_GET['carga'];
$ubicacion = $_GET['where'];
$info = $_GET['info'];
$resul= $carga * 100 / 14;

/*echo $carga;
echo $ubicacion;
echo $info;*/
if ($carga <= 14 && $carga >= 0){
include_once('db.php');
$query = "UPDATE datos SET carga = '$carga', carga_porc = '$resul', ubicacion = '$ubicacion', info = '$info' WHERE id = '$id'";
echo $query;

mysqli_query($connection, $query);

header('Location:tabla.php');
} else {
echo "<h1>Error: El valor de la carga no debe ser mayor de 14 o menor que 0.</h1> <a href='./tabla.php'><< Volver</a>";
header('Location:php/error.php?error=1');
}
?>