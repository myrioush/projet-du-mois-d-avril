<? php
  require "database.php";

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
	<div class="container">
		<div class="row mr-5">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Mot de passe</th>
						<th>Date de création</th>
						<th>Choix</th>
						<th>Date de visite</th>
						<th>Heure de visite</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					    
					    	echo "<tr>";
					    	echo "<td>'nomutil'</td>";
					    	echo "<td>'prenomutil'</td>";
					    	echo "<td>'emailutil'</td>";
					    	echo "<td>'motdepasseutil'</td>";
					    	echo "<td>'date_crea'</td>";
					    	echo "<td>'nomchoix'</td>";
					    	echo "<td>'datevisite'</td>";
					    	echo "<td>'heurevisite'</td>";
					    	echo "</tr>";
					    
					?>
</body>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>