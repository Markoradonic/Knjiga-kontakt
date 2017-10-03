
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <script src="main.js"></script>
</head>
<body>
	<?php 
function UnesiKontakt ($ime, $prezime, $telefon, $opis) 
{
	try {
		$db = new PDO('mysql:host=localhost;dbname=knjigakontakta;charset=utf8mb4', 'root', '');
		$stmt = $db->prepare("INSERT INTO kontakti (ime, prezime, broj_telefona, opis_poznanstva) VALUES(:ime, :prezime, :broj_telefona, :opis_poznanstva); ");
		$stmt->execute(array(":ime" => $ime, ":prezime" => $prezime, ":broj_telefona" => $telefon, "opis_poznanstva" => $opis));
	}

	catch(PDOException $ex) {

	}
}


function PrikaziSveKontakte() {
	try {
		$db = new PDO('mysql:host=localhost;dbname=knjigakontakta;charset=utf8mb4', 'root', '');
		$stmt = $db->query("SELECT id, ime, prezime FROM kontakti");
		$rezultat = $stmt->fetchALL(PDO::FETCH_ASSOC);
		//echo "<pre>", print_r($rezultat) , "</pre>";
		foreach ($rezultat as $kontakti) {
			# code...
			echo '<div><a href="kontakt.php?id=' . $kontakti['id'] . '">' . $kontakti['ime'] . '  ' . $kontakti['prezime'] . '</a></div>';
		}
	}

	catch(PDOException $ex) {

	}
}


function DajKontaktPoId($id){
	try {
		$db = new PDO('mysql:host=localhost;dbname=knjigakontakta;charset=utf8mb4', 'root', '');
		$stmt = $db->prepare("SELECT * FROM kontakti WHERE id=:id");
		$stmt->bindValue(':id', $id, 1);
		$stmt->execute();

		$brojRedova = $stmt->rowCount();

		if($brojRedova == 1){

			$rez = $stmt->fetch(PDO::FETCH_ASSOC);
	

			echo "<div class='row'>";
				echo "<div> ime: " . $rez['ime'] ."</div>" ;
				echo "<div> prezime: " . $rez['prezime'] ."</div>" ;
				echo "<div> telefon: " . $rez['broj_telefona'] ."</div>" ;
				echo "<div> opis: " . $rez['opis_poznanstva'] ."</div>" ;
				echo "<a href='kontakt.php?id=". $rez['id'] ."&action=delete' class='btn btn-danger' onClick=\"return confirm('are you sure you want to delete??');\"><center>Delete</center></a>";
				
				//echo "<a href='kontakt.php? id=". $rez['id'] ."&action=delete' class='btn btn-danger' onclick='moja()' name='dugme'>izbrisi</a>";
				echo "<a href='kontakt_update.php? id=". $rez['id'] ."' class='btn btn-success'> uredi</a>";
			echo "</div>";

		}else{
			echo "<div class='alert alert-danger'> Ne postoji stranica koju trazite </div>";
		}
		

		
	}

	catch(PDOException $ex) {

	}
}// kraj funkcije DajKontaktPoId


function IzbrisiKOntakt($id){
	
		$db = new PDO('mysql:host=localhost;dbname=knjigakontakta;charset=utf8mb4', 'root', '');
		$stmt = $db->prepare("DELETE  FROM kontakti WHERE id=:id");
		$stmt->bindValue(':id', $id, 1);
		$stmt->execute();
		header("Location: ./index.php");

	
}


function UreditiKontat($id){
	$db = new PDO('mysql:host=localhost;dbname=knjigakontakta;charset=utf8mb4', 'root', '');
		$stmt = $db->prepare("SELECT * FROM kontakti WHERE id=:id");
		$stmt->bindValue(':id', $id, 1);
		$stmt->execute();

		$brojRedova = $stmt->rowCount();
		if($brojRedova == 1){
			$rez = $stmt->fetch(PDO::FETCH_ASSOC);	
			//echo $rez['ime'];
			echo'<form method="post">';
                echo'<div class="form-group">';
                    echo '<label for="">Ime:</label>';
                    echo '<input type="text" class="form-control" placeholder="Ime" name="ime" value="'. $rez['ime'] .'"> ';
                echo '</div>';
               echo '<div class="form-group">';
                    echo '<label for="">Prezime:</label>';
                    echo '<input type="text" class="form-control" placeholder="Prezime" name="prezime" value="'. $rez['prezime'] .'">'; 
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<label for="">Broj telefona:</label>';
                    echo '<input type="text" class="form-control" placeholder="brojTelefona"name="telefon" value="'. $rez['broj_telefona'] .'">'; 
                echo '</div>';
                 echo '<div class="form-group">';
                 echo '<label for="">Opis</label>';
                  echo '<textarea class="form-control" name="opis">'. $rez['opis_poznanstva'] .'</textarea>';
                echo '</div>';
                echo '<div class="form-group">';
                     echo '<input class="btn btn-default" type="submit" value="potvrdi" name="sacuvaj"> ';
                     echo '<input class="btn btn-default" type="hidden" value="'. $rez['id'] .'" name="id"> ';
                echo '</div>';
            echo '</form>';

			}else{

			}
}


function IzvrsiPrepravljanje($id, $ime, $prezime, $telefon, $opis){
	$db = new PDO('mysql:host=localhost;dbname=knjigakontakta;charset=utf8mb4', 'root', '');
		$stmt = $db->prepare("UPDATE  kontakti SET ime = :ime, prezime = :prezime, broj_telefona = :telefon, opis_poznanstva= :opis_poznanstva WHERE id=:id");
		$stmt->bindValue(':id', $id, 1);
		$stmt->bindValue(':ime', $ime, PDO::PARAM_STR);
		$stmt->bindValue(':prezime', $prezime, PDO::PARAM_STR);
		$stmt->bindValue(':telefon', $telefon, PDO::PARAM_STR);
		$stmt->bindValue(':opis_poznanstva', $opis, PDO::PARAM_STR);
		$stmt->execute();
		header("Location: ./index.php");
}



	
 ?>

</body>
</html>

