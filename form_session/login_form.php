<!DOCTYPE html>
<html>
<head>
	<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Login</title>
  </head>
</head>
<body class="bg-secondary">
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 bg-light rounded">
				<h3 class="text-center mt-3">Login</h3>
				<form action="login.php" method="post">
					<input type="text" name="login_name" placeholder="type your name" class="form-control mt-3 ">
					<input type="password" name="login_pass" placeholder="type your password" class="form-control mt-3">
					<button type="submit" class="btn btn-primary my-3 ">Sing in</button>	
					<a href="user_register.php" class="ml-5 pl-5">Create an account</a>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>