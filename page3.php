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
			<input type='hidden' name='view3' value=3>
			<fieldset>
				<legend>Resume</legend>
				<table>
					<tr>
						<td>Destination:</td>
						<td><?php echo $_SESSION[city];?></td>
					</tr>
					<tr>
						<td>Nombre de places:</td>
						<td><?php echo $_SESSION[nbrP];?></td>
					</tr>
					
					
					<?php
						for ($i=0;$i<$_SESSION['nbrP'],$i++)
						{
							$j=$i+1;
							echo "
									<fieldset>
										<legend><b>Info Voy".$j."</b></legend>
											<table>
												<tr>
													<td>Nom:</td>
													<td>".$nom[$i]"</td>
												</tr>
												
												<tr>
													<td>Age:</td>
													<td>".$age[$i]"</td>
												</tr>
											</table>
									</fieldset>
								";
						}
					?>
	
					
					<tr>
						<td>Assurance</td>
						<td><?php echo $_SESSION[assur];?></td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				
				<input type="submit" name="next" value="Confirmer">
				<input type="submit" name="before" value="Retour à la page précédente" />
				<input type="submit" name="cancel" value="Annuler la réservation" />
				
			</fieldset>
			</form>
		</div>
	</body>
</html>
