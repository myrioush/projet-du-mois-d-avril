<?php

session_start();

if(empty($_SESSION['utilisateur'])){
   header('location:index.php');
   $_SESSION['message'] = "Vous devez vous connectez avant d'accéder à l'administration";
}

require "database.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    extract($_POST);

    /*Insertion dans la base de donnée*/
    $table =  "visite";

    /* je recupere l'id de l'utilisateur dans la var session */
    $idutil = $_SESSION['utilisateur']['idutil'];

    $colonne = ['idchoix', 'idutil', 'heureVisite','dateVisite'];

    $donnee = [$idchoix,$idutil,$heurevisite,$datevisite];

    Inserer($table,$colonne,$donnee);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>strength</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  
  
</head>
<body>
	<section id="visite">
		<div class="container">
    <h3 style="margin-left:20%;">choisissez-votre jour de visite</h3>
    <div class="row ml-5">
      <div class="">
        <form action="" method="post">
         
            <a href="dashboard.php">retour</a>
            
          <div class="form-group">
            <div class="input-group-prepend">
                      <label> Date de visite </label>
                      <input type="date" class="form-control" placeholder="" name="datevisite" id="datevisite" required="">
                      
                    </div>

          </div>          
          <div class="form-group">
            <div class="input-group-prepend">
                      <label>Heure de visite</label>
                      <input type="time" class="form-control" placeholder="" name="heurevisite" id="heurevisite" required="">
                      
                    </div>

          </div>  
          <div class="form-group">
            <div class="input-group-prepend">
              <select name="idchoix">
                        <?php $data = getAll("choix",false); ?>
                            <?php foreach($data as $donnee): ?>
                                <option value="<?= $donnee['idchoix'] ?>"><?= $donnee['nomchoix'] ?></option>
                            <?php endforeach; ?>
                    </select>
            </div>

          </div>                  
          <div class="form-group">
            <input type="submit" value="Enregistrer" name="insc" class="btn btn-primary ml-5">
          </div>
        </form>
        
      </div>
    </div>
  </div> 

	</section>
	
</body>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>