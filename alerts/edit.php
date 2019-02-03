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

$id = $_GET['id'];
$color = $_GET['color'];
$description = $_GET['description'];

include_once '../connection.php';

$sql_edit = 'UPDATE COLORS SET COLOR =?, DESCRIPTION=? WHERE ID=?';
$statement_edit = $connection->prepare($sql_edit);
$statement_edit->execute(array($color, $description, $id));

$sql_edit = null;
$connection = null;
header('location:index_alerts.php');
?>