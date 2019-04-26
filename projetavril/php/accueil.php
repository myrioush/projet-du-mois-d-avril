<?php
session_start();
require "database.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  extract($_POST);
   if (empty($_POST)) 
    {
        $_SESSION['message'] = "Veuillez remplir tous les champs svp !";
    }
    elseif (!filter_var($emailutil, FILTER_VALIDATE_EMAIL)) 
    {
        $_SESSION['message']= "Donner une email correcte !";
    } 
    else
    {
     
    $table =  "utilisateur";
    $colonne = [ 'idgrputil', 'nomutil','prenomutil','emailutil','motdepasseutil'];

    $donnee = [2,$nomutil,$prenomutil,$emailutil,$motdepasseutil];

    Inserer($table,$colonne,$donnee);
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
	
<section class="ca">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../imagep/o.jpg" class="w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../imagep/o.jpg" class="w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../imagep/o.jpg" class="w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
</section>
<nav class="navbar navbar-expand-lg navbar-primary" id="barre">
 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accueil.php">à propos </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#inscription">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Se connecter</a>
      </li>
    </ul>
  </div>
</nav>
<section id="propos">
	<div class="rtext">
		<h1>Strength</h1><p>c'est une entreprise de construction.Nous nous occupons de la construction de vos maisons ,immeuble,ect.Strength c'est aussi suivre l'actualité sur les maisons,appartement en vente,les terrains en vente.</p>
  
	</div>
	<div>
		<div class="row">
  <div class="col-sm-6">
    <div class="card ml-4">
      <div class="card-body">
        <img src="../imagep/tt.jpg" class="card-img-top" alt="...">
        <h5 class="card-title mt-5">Notre équipe</h5>
        <p class="card-text">Nous mettons une équipe à votre disposition pour la construction de vos maisons,immeuble.</p>
        <a href="#inscription" class="btn btn-primary mb-4 w-100">s'inscrire</a>
        <img src="../imagep/ss.jpg" class="card-img-top" alt="...">
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card mr-4">
      <div class="card-body">
         <img src="../imagep/yy.jpg" class="card-img-top" alt="...">
        <h5 class="card-title mt-4">Nos services</h5>
        <p class="card-text">Nous vous informons sur l'actualité des maisons à vendre et terrain. </p>
        <a href="index.php" class="btn btn-primary mb-4 w-100">
        se connecter</a>
        <img src="../imagep/q.jpg" class="card-img-top mb-3" alt="...">
      </div>
    </div>
  </div>
</div>
	</div>
</section>

<section id="inscription">
  <div class="container">
    <div class="row">
      <h2>Inscription</h2>
      <div class="col-md-6">
        <form action="" method="post">
           <?php
            if(isset($_SESSION['message']))
            echo $_SESSION['message'];
           ?>
          <div class="form-group">
            <div class="input-group-prepend">
                      <label for="nomutil">Nom:</label>
                      <input type="text" class="form-control" placeholder="entrez le nom" name="nomutil" id="nomutil" required>
                    </div>
            
          </div>
          <div class="form-group">
            <div class="input-group-prepend">
                      <label for="prenomutil">prénom:</label>
                      <input type="text" class="form-control" placeholder="entrez votre prénom" name="prenomutil" id="prenomutil"required>
                      
                    </div>

          </div> 
          <div class="form-group">
            <div class="input-group-prepend">
                      <label for="emailutil">Email:</label>
                      <input type="email" class="form-control" placeholder="entrez votre email" name="emailutil" id="emailutil"required>
                      
                    </div>

          </div>                   
          <div class="form-group">
            <div class="input-group-prepend">
                      <label for="motdepasseutil">Mot de passe:</label>
                      <input type="password" class="form-control" placeholder="entrez votre mot de passe" name="motdepasseutil" id="motdepasseutil"required>
                      
                    </div>

          </div> 
          
          <div class="form-group">
            <input type="submit" value="Soumettre" name="insc" class="btn btn-primary ml-5">
          </div>
          
        </form>
        
      </div>
    </div>
  </div> 

  
</section>

<footer>
	<div class="st">
		<h1>Strenght</h1>
  
	</div>
  <div class="contact">
    <p>email:strenght@yahoo.fr</p>
    <p>contact:42366045</p>
  </div>
</footer>


</body>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>