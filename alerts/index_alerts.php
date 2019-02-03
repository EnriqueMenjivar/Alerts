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

//READ
$sql_read = 'SELECT * FROM COLORS';
$statement = $connection->prepare($sql_read);
$statement->execute();
$resultset = $statement->fetchAll(); //Retorns an Array
//var_dump($resultset)

//ADD
if($_POST){
	$color = $_POST['color'];
	$description = $_POST['description'];

	$slq_add = 'INSERT INTO COLORS (COLOR, DESCRIPTION) VALUES (?,?)';
	$statement_add = $connection->prepare($slq_add);
	$statement_add->execute(array($color, $description));

	$sql_add = null;
	$connection = null;
	header('location:index_alerts.php');
}

//EDIT
if($_GET){
	$id = $_GET['id'];

	$sql_unic = 'SELECT * FROM colors  WHERE id=?';
	$statement_unic = $connection->prepare($sql_unic);
	$statement_unic->execute(array($id));

	$resultset_unic = $statement_unic->fetch();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Colors Alerts</title>
  </head>
  <body class="bg-secondary">
    <div class="container mt-2">
    	<div class="row bg-light rounded">
    		<div class="col-md-6 my-4">

    			<?php foreach ($resultset as $color): ?>
	    			<div class="alert alert-<?php echo $color['color']; ?> text-uppercase" role="alert">
  						<?php echo $color['color']; ?>
  						-
  						<?php echo $color['description']; ?>
  						<a href="delete.php?id=<?php echo $color['id']  ?>" class="float-right ml-3"><i class="far fa-trash-alt"></i></a>
  						<a href="index_alerts.php?id=<?php echo $color['id'] ?>" class="float-right"><i class="fas fa-pencil-alt"></i></a>
					</div>
				<?php endforeach ?>
    		</div>

    		<div class="col-md-6 my-4">

    			<?php if(!$_GET): ?>
	    			<h2>ADD ELEMENTS</h2>
	    			<form method="post">
	    				<input type="text" name="color" class="form-control" placeholder="name">
	    				<input type="text" name="description" class="form-control mt-3" placeholder="description">
	    				<button type="submit" class="btn btn-primary mt-3 bt">Add Alert</button>
	    			</form>
    			<?php endif ?>

    			<?php if($_GET): ?>
	    			<h2>EDIT ELEMENTS</h2>
	    			<form method="get" action="edit.php">
	    				<input type="text" name="color" class="form-control" value="<?php echo $resultset_unic['color'] ?>">
	    				<input type="text" name="description" class="form-control mt-3" value="<?php echo $resultset_unic['description'] ?>">
	    				<input type="hidden" name="id" value="<?php echo $resultset_unic['id'] ?>">
	    				<button type="submit" class="btn btn-primary mt-3 bt">Save Changes</button>
	    			</form>
    			<?php endif ?>

          <hr class="my-4">
          <div class="row">
            <div class="col-md-6 my-2">
              <button class="btn btn-dark" onclick="get('color')">Color</button>
              <div id="color"></div>
            </div>
            <div class="col-md-6 my-2">
              <button class="btn btn-dark" onclick="get('description')">Description</button>
              <div id="description"></div>
            </div>
          </div>

    		</div>
    	</div>
    </div>
    
    <script type="text/javascript" src="query.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

<?php 

$resultset = null;
$connection = null;

?>