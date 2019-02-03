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

$id = $_GET['id'];

$sql_delete = 'DELETE FROM colors WHERE id=?';
$statement_delete = $connection->prepare($sql_delete);
$statement_delete->execute(array($id));

$sql_delete = null;
$connection = null;
header('location:index_alerts.php');
?>