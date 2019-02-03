<?php 

session_start();
include_once '../connection.php';

$login_user=$_POST['login_name'];
$login_pass=$_POST['login_pass'];

$sql_users = 'SELECT * FROM users WHERE name=?';
$user_exists = $connection->prepare($sql_users);
$user_exists->execute(array($login_user));
$result = $user_exists->fetch();

if(!$result){
	echo "This user doesn't exist";
	die();
}

if (password_verify($login_pass, $result['password'])){

	$_SESSION['admin'] = $login_user;
	header('location:../alerts/index_alerts.php');

}else{
	echo "Password error";
}
?>