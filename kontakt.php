<?php 
include_once('funkcije/fnc.php');

if(isset($_GET['id']) && isset($_GET['action'])){

	if($_GET['action'] == "delete"){
		
		IzbrisiKOntakt($_GET['id']);
	}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/main.css">
</head>
<body>
<div class="container">
	<div class="row top90">
		<?php 
			if(isset($_GET['id'])){

				$id = $_GET['id'];
				DajKontaktPoId($id);
			}
		 ?>
	</div>
</div>
</body>
</html>