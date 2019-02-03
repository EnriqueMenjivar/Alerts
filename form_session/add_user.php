<?php //Validation of session starts ?>
<?php 
session_start();

$tag_a = '<a href="../form_session/close.php" class = "float-right">Log out</a>';
$class_b = 'class="container mt-4 bg-light text-center rounded"';
if(isset($_SESSION['admin'])){

  $current_user = $_SESSION['admin'];
  echo "<div $class_b ><strong> Welcome $current_user </strong> $tag_a </div>";
  
}else{
  header('location:../index.php');
}
?>

<?php

include_once '../connection.php';

$new_user = $_POST['name'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$pass1 = password_hash($pass1, PASSWORD_DEFAULT);

//Verify if user existx
$sql_users = 'SELECT * FROM users WHERE name=?';
$user_exists = $connection->prepare($sql_users);
$user_exists->execute(array($new_user));
$result = $user_exists->fetch();

if($result){
	echo "This user already exists";
	die();
}


if (password_verify($pass2, $pass1)) {

    $slq_add = 'INSERT INTO users (name, password) VALUES (?,?)';
	$statement_add = $connection->prepare($slq_add);
	
	if($statement_add->execute(array($new_user, $pass1))){
		header('location:../index.php');
	}else{
		echo "Error!!!";
	}

	$sql_add = null;
	$connection = null;
	//header('location:index.php');
} else {
    echo 'La contraseña no es válida.';
}
?>