<html>
	<head>
		<meta charset="UTF-8">
		<title>Liste des Reservations</title>
		<LINK rel=stylesheet type "css" href="../style.css">
	</head>
	<body>
		<h1>Liste des Reservations</h1><br/>
		<div>
			<?php
				// Actualise la page pour voir la modif et enlever le get dans l'url
				// Connexion et sélection de la base
				$mysqli = new mysqli("localhost", "root", "test","trip") or
				die("Could not select database");
				if ($mysqli->connect_errno) 
					{
						echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
						" . $mysqli->connect_error;
					}			
				// Exécuter des requêtes SQL
				$query = "SELECT * FROM reservation";
				$result = $mysqli->query($query) or 
				die("Query failed (Exécuter requêtes SQL)");
								
				if ($result->num_rows == 0) 
					{
						echo "Aucune ligne trouv&eacutee, rien &agrave afficher.";
						echo '</br>';
						echo "La table est vide.";
						exit;
					}
						
				echo"
					<form method='POST' ACTION='../index.php?action=addRes>
						<input type='hidden' name='db' value=0>	
						<input type='submit' name='addReserv' value='Ajouter une reservation' />
					</form>
					<fieldset>
						<table>
							<tr>
								<td data-field='id'><h2>Id</h2></td>
								<td data-field='destination'><h2>Destination</h2></td>
								<td data-field='asurance'><h2>Assurance</h2></td>
								<td data-field='somme'><h2>Total</h2></td>
								<td data-field='nom'><h2>Nom</h2></td>
								<td data-field='age'><h2>Age</h2></td>
								<td data-field='edit'><h2>Editer</h2></td>
								<td data-field='delete'><h2>Supprimer</h2></td>
							</tr>
				";
							
				// Afficher des résultats en HTML
				while ($line = $result->fetch_assoc()) 
				{
					echo "\t<tr>\n";
					foreach ($line as $col_value) 
						{
							echo "\t\t<td><h2>$col_value</h2></td>\n";
						}
						
					echo "\t\t<td><a href='../controllers/controller.php?action=edit&id=".$line['Id']."'>Editer</a></td>\n";		
					echo "\t\t<td><a href='../controllers/controller.php?action=delete&id=".$line['Id']."'>Supprimer</a></td>\n";		
					echo "\t</tr>\n";	
				}
							
				echo"
					</tr>
					</table>	
					</fieldset>
					";
			?>
		</div>
	</body>
</html>