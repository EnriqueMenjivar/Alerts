<?php 

include_once 'connection.php';

$sql_query = 'SELECT * FROM colors';

$statement_query = $connection->prepare($sql_query);
$statement_query->execute();

$resultset=$statement_query->fetchAll();

echo json_encode($resultset)
?>