<html>
	<?php
		// Deleting the reservation that has an id equals to $id
		$query = "DELETE FROM reservation WHERE Id =".$id."";
		
		// Connection to the database
		$mysqli = new mysqli("localhost", "root", "test","trip") or
		die("Could not select database");
		if ($mysqli->connect_errno) 
		{
			echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
			" . $mysqli->connect_error;
		}			
		
		$result = $mysqli->query($query) or die("Query failed (Exécuter requêtes SQL)");
		if ($mysqli->query($query) === TRUE) 
		{
			echo "Suppresion effectu&eacutee correctement";
			echo'</br>';
			echo "\t\t<td><a href='../views/index.php'>Retourner &agrave la database</a></td>\n";
		} 
		else 
		{
			echo "Erreur lors de la tentative de suppression".$mysqli->error;
		}
		die();
		break;	
	?>
</html>