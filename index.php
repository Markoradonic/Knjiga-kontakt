<?php 


include_once('funkcije/fnc.php');


if(isset($_POST['sacuvaj'])){

   $ime = $_POST['ime'];
   $prezime = $_POST['prezime'];
   $telefon = $_POST['telefon'];
   $opis = $_POST['opis'];


UnesiKontakt($ime, $prezime, $telefon, $opis);
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
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form method="post">
                <div class="form-group">
                    <label for="">Ime:</label>
                    <input type="text" class="form-control" placeholder="Ime" name="ime"> 
                </div>
                <div class="form-group">
                    <label for="">Prezime:</label>
                    <input type="text" class="form-control" placeholder="Prezime" name="prezime"> 
                </div>
                <div class="form-group">
                    <label for="">Broj telefona:</label>
                    <input type="text" class="form-control" placeholder="brojTelefona"
                    name="telefon"> 
                </div>
                 <div class="form-group">
                 <label for="">Opis</label>
                  <textarea class="form-control" name="opis" placeholder="opis prijatelja"></textarea>
                </div>
                <div class="form-group">
                     <input class="btn btn-default" type="submit" value="potvrdi" name="sacuvaj" > 
                </div>
            </form>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <?php 
            PrikaziSveKontakte(); 
       ?>
      
           <!--   -->
        </div>

    </div> 
</div>
<script src="main.js"></script>
</body>
</html>