<?php 

session_start();

if(isset($_SESSION['admin'])){
	echo 'Welcome ' . $_SESSION['admin'];
	echo '<br> <a href="close.php">Log out</a>';
}else{
	header('location:../index.php');
}
?>