<?php 

date_default_timezone_set('UTC');

if($_GET['reg'] == "registro" && !isset($_GET['lev'])){

$fecha = date("d-m-y");

//$file = "log_registros/".$fecha.".xml";
//if(file_exists($file)){ unlink($file);}



CrearXML();


}


function CrearXML() {
    $doc = new DOMDocument('1.0');
    
    $doc->formatOutput = true;
    
    $raiz = $doc->createElement("REGISTROS");
    $raiz = $doc->appendChild($raiz);
    
$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));
$query = "select * from datos";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);

$fecha = date("d-m-y");
    
    
while($row=mysqli_fetch_array($res)){
$id = $row['id'];
$parte = $row['carga'];
$carga_por = $row['carga_porc'];
$info =$row['info'];
$where =$row['ubicacion'];
    
if($row['carga'] <= 10){ $state_i = "Defectuoso ";} elseif($row['carga'] == 13){ $state_i = "Buen Estado";} elseif($row['carga'] == 11 || $row['carga'] == 12){ $state_i = "Sin Carga  ";} elseif($row['carga'] == 14){ $state_i = "�ptimo     ";}
    
    $registro = $doc->createElement("REGISTRO");
    $registro = $raiz->appendChild($registro);
    
    $idd = $doc->createElement("ID");
    $idd = $registro->appendChild($idd);
    $textId = $doc->createTextNode($id);
    $textId = $idd->appendChild($textId);
    
    $carga = $doc->createElement("CARGA");
    $carga = $registro->appendChild($carga);
    $textCarga = $doc->createTextNode($parte);
    $textCarga = $carga->appendChild($textCarga);
    
    $estado = $doc->createElement("ESTADO");
    $estado = $registro->appendChild($estado);
    $textEstado = $doc->createTextNode($state_i);
    $textEstado = $estado->appendChild($textEstado);
    
    $ubicacion = $doc->createElement("UBICACION");
    $ubicacion = $registro->appendChild($ubicacion);
    $textUbicacion = $doc->createTextNode($where);
    $textUbicacion = $ubicacion->appendChild($textUbicacion);
    
    $informacion = $doc->createElement("INFO");
    $informacion = $registro->appendChild($informacion);
    $textInfo = $doc->createTextNode($info);
    $textInfo = $informacion->appendChild($textInfo);
    
    }
    
    echo 'Escrito: ' . $doc->save('log_registros/'.$fecha.'.xml') . 'bytes <br><br>';
    header('Location:tabla.php?Se-ha-registrado-correctamente-'.$fecha.'.xml');
}


if(isset($_GET['lev']) && $_GET['reg'] == "ciclo"){
    
    CrearXML2();
    
}






function CrearXML2() {
    $doc = new DOMDocument('1.0');
    
    $doc->formatOutput = true;
    
    $raiz = $doc->createElement("CICLOS");
    $raiz = $doc->appendChild($raiz);
    
$ini = parse_ini_file('php/config.ini');

$db_user = $ini['db_user'];
$db_pass = $ini['db_pass'];
$db_base = $ini['db_base'];
$db_host = $ini['db_host'];

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_base) or die (mysqli_error($connection));
$query = "select * from calendario where lev = $_GET[lev] AND estado = 1";
$utf = $connection->query("SET NAMES 'utf8'");
$res = mysqli_query($connection,$query);

$fecha = date("d-m-y");
    
    
while($row=mysqli_fetch_array($res)){
$lev = $row['lev'];
$start = $row['fechainicio'];
$end = $row['fechafin'];
    
    $registro = $doc->createElement("CICLO");
    $registro = $raiz->appendChild($registro);
    
    $idd = $doc->createElement("LEV");
    $idd = $registro->appendChild($idd);
    $textId = $doc->createTextNode($lev);
    $textId = $idd->appendChild($textId);
    
    $carga = $doc->createElement("INICIO");
    $carga = $registro->appendChild($carga);
    $textCarga = $doc->createTextNode($start);
    $textCarga = $carga->appendChild($textCarga);
    
    $estado = $doc->createElement("FIN");
    $estado = $registro->appendChild($estado);
    $textEstado = $doc->createTextNode($end);
    $textEstado = $estado->appendChild($textEstado);
    
    }
    
    echo 'Escrito: ' . $doc->save('log_calendario/Lev '.$_GET['lev'].' '.$fecha.'.xml') . 'bytes <br><br>';
    
    header('Location:tabla.php?Se-ha-registrado-correctamente-Lev_'.$_GET['lev'].' '.$fecha.'');
}






















?>