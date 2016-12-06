<html>
	<head>
		<meta charset="utf-8" />
		<title>Reservation</title>
		<LINK rel=stylesheet type "css" href="style.css">
	</head>
	<body>
		<h1>Validation des réservations</h1>
		<div>
			
			<form method='POST' action='newController.php'>
			<input type="hidden" name='view3' value=3>
			
				<table>
					<tr>
						<td>Destination:</td>
						<td><?php echo $reserv->getdest();?></td>
					</tr>
					<tr>
						<td>Nombre de places:</td>
						<td><?php echo $reserv->getnbrP();?></td>
					</tr>
					
					
					<?php
						
						
						
						//echo $reserv->getdest();
						
					
						
						
						for ($i=0;$i<$_SESSION["nbrP"];$i++)
						{
							//$j=$i+1;
							echo "
									<fieldset>
											<table>
												<tr>
													<td>Nom:</td>
													<td>".$pers->getname()[$i]."</td>
												</tr>
												
												<tr>
													<td>Age:</td>
													<td>".$pers->getage()[$i]."</td>
												</tr>
											</table>
									</fieldset>
								";
						}
						//??-getname()[i]
					?>
				
					
					<tr>
						<td>Assurance:</td>
						<td><?php $_SESSION["assur"];?></td>
					</tr>
					
				</table>
			
				
				<input type="submit" name="next3" value="Confirmer">
				<input type="submit" name="before3" value="Retour à la page précédente" />
				<input type="reset" name="cancel" value="Annuler la réservation" />
				
			
			</form>
		</div>
	</body>
</html>
