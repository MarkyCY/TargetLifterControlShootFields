<?php 

$ini = parse_ini_file('php/config.ini');

echo $ini['host'];

$db_user = "root";
$db_pass = "";
$db_base = "gestion";
$db_host = "localhost";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));

?>