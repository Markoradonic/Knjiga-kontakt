<?php 
include_once('funkcije/fnc.php');
if(isset($_POST['sacuvaj'])){
	if(empty($_POST['ime']) && empty($_POST['prezime']) && empty($_POST['telefon']) && empty($_POST['opis'])){
		echo "Popunite polja";
	}else{
		$id = $_POST['id']; 
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$telefon = $_POST['telefon'];
		$opis = $_POST['opis'];

		IzvrsiPrepravljanje($id, $ime, $prezime, $telefon, $opis);
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
				UreditiKontat($id);
			}
		 ?>
	</div>
</div>
</body>
</html>