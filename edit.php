<?php 

$id = $_GET['id'];
$color = $_GET['color'];
$description = $_GET['description'];

include_once 'connection.php';

$sql_edit = 'UPDATE COLORS SET COLOR =?, DESCRIPTION=? WHERE ID=?';
$statement_edit = $connection->prepare($sql_edit);
$statement_edit->execute(array($color, $description, $id));

$sql_edit = null;
$connection = null;
header('location:index.php');
?>