<html>
	<head>
		<meta charset="utf-8" />
		<title>Reservation</title>
		<LINK rel=stylesheet type "css" href="../style.css">
	</head>
	<body>
		<h1>Validation des réservations</h1>
		<div>
			<form method='POST' action='../index.php'>
				<input type="hidden" name='form3' value=3>
				<?php
					echo"
						<table>
							<tr>
								<td>Destination:</td>
								<td>".$reserv->getDest()."</td>
							</tr>
							<tr>
								<td>Nombre de places:</td>
								<td>".$reserv->getNbrp()."</td>
							</tr>
						";
						
					for ($i=0;$i<$reserv->getNbrp();$i++)
						{
							echo "		
								<tr>
									<td>Nom:</td>
									<td>".$pers->getName()[$i]."</td>
								</tr>			
								<tr>
									<td>Age:</td>
									<td>".$pers->getAge()[$i]."</td>
								</tr>
								";
						}	
						
					echo "
						<tr>
								<td>Assurance:</td>
								<td>".$reserv->getAssur()."</td>
							</tr>
						</table>
						";
				?>				
				<input type="submit" name="next3" value="Confirmer">
				<input type="submit" name="before3" value="Retour à la page précédente" />
				<input type="submit" name="cancel" value="Annuler la réservation" />
			</form>
		</div>
	</body>
</html>