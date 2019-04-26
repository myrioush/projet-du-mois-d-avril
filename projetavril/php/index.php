<?php
session_start();
require "database.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    extract($_POST);
    /* je fais une réquête SQL pour selectionner des données */
    $reponse =requete("SELECT * FROM utilisateur WHERE emailutil = '$email' AND motdepasseutil = '$motdepasse'");  
        
    /* si les champs */
    if(empty($nom_utilisateur) || empty($mot_de_passe)){
        $_SESSION['message'] = "Veuillez remplir tous les champs";
    }

    if(is_array($reponse) && count($reponse) > 0){
        $_SESSION['utilisateur'] = $reponse;
        header("location:dashboard.php");
    }else{
        $_SESSION['message'] = "le nom d'utilisateur ou le mot de passe est incorrecte";
    }  
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
 <img src="../imagep/k.jpg" style="position:fixed;
 width: 100%;
 height:100%;"> 

<nav class="navbar navbar-expand-lg navbar-primary" id="barre">
 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">à propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se connecter</a>
      </li>
    </ul>
  </div>
</nav>


<section id="connecter">
  <div class="container">
    <h3>Connectez vous</h3>
    <a href="admi.php">click</a>
    <?php
            if(isset($_SESSION['message']))
            echo $_SESSION['message'];
        ?>
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <div class="form-group">
            <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="email" class="form-control" placeholder="entrez l'email" name="email" id="email" required>
                    </div>
            
          </div>
          <div class="form-group">
            <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="password" class="form-control" placeholder="mot de passe" name="motdepasse" id="motdepasse" required="">
                      
                    </div>

          </div>          
          <div class="form-group">
            <input type="submit" value="Connexion" name="insc" class="btn btn-primary w-100">
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