<html>
	<?php
		if(!isset($_POST['assurEd']) ||$_POST['assurEd']=='')
		{
			$_POST['assurEd']='NON';
		}
													
		// Updating the recording 
		$sql = "UPDATE reservation SET Destination='".$_POST['destEd']."',Assurance='".$_POST['assurEd']."',Nom='".$_POST['nameEd']."', Age='".$_POST['ageEd']."' WHERE id=".$_GET['id']."";
		
		// Connection to the database
		$mysqli = new mysqli("localhost", "root", "test","trip") or
		die("Could not select database");
		if ($mysqli->connect_errno) 
		{
			echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
			" . $mysqli->connect_error;
		}				
		if ($mysqli->query($sql) === TRUE) 
		{
			echo "Mise &agrave jour effectuer correctement";
		} 
		else 
		{
			echo "Erreur lors de la tentative de mise &agrave jour:".$mysqli->error;
		}
		
		echo'<br/>';
		echo "\t\t<td><a href='../views/index.php'>Retourner &agrave la database</a></td>\n";
	?>
</html>