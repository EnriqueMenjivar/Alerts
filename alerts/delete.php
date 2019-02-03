<?php 

include_once '../connection.php';

$id = $_GET['id'];

$sql_delete = 'DELETE FROM colors WHERE id=?';
$statement_delete = $connection->prepare($sql_delete);
$statement_delete->execute(array($id));

$sql_delete = null;
$connection = null;
header('location:index_alerts.php');
?>