<?php

header('Content-type: application/json; charset=UTF-8');

$response = array();

if ($_POST['delete']) {

require_once 'dbcon.php';

$pid = intval($_POST['delete']);
$query = "DELETE FROM calendario WHERE global=:pid";
$stmt = $DBcon->prepare( $query );
$stmt->execute(array(':pid'=>$pid));
    
$query_glb = "DELETE FROM events WHERE global=:pid";
$stmt_glb = $DBcon->prepare( $query_glb );
$stmt_glb->execute(array(':pid'=>$pid));
    

if ($stmt) {
$response['status'] = 'success';
$response['message'] = 'Producto eliminado correctamente...';
} else {
$response['status'] = 'error';
$response['message'] = 'No se puede eliminar el producto ...';
}
echo json_encode($response);
}
?>