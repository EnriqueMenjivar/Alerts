<?php 

$link ='mysql:host=localhost; dbname=php_colors';
$user = 'root';
$pass = '';

try {
	$connection = new PDO($link, $user, $pass);

	//echo "Connected";

	/*foreach ($connection->query('SELECT * FROM COLORS') as $row) {
		print_r($row);
	}*/

} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br>";
	die();
}

?>