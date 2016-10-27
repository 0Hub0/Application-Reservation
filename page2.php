<html>
<head>
	<meta charset="utf-8" />
	<title>
	Reservation
	</title>
	<LINK rel=stylesheet type "css" href="style.css">
	
</head>

<body>
	<h1>Detail des Reservations</h1> <br/>
	<div>
		<form method="POST" ACTION="newController.php" >
		<input type='hidden' name='view2' value=2>
		<?php
			for ($i=0;$i<$_SESSION["nbrP"];$i++)
			{
				$j=$i+1;
				echo "
					<fieldset>
						<legend><b>InfoVoya".$j."</b></legend>
							<table>
								<tr>
									<td>Nom:</td>
									<td><input type='text' name='nom[]'></td>
								</tr>
								
								<tr>
									<td>Age:</td>
									<td><input type='text' name='age[]'></td>
								</tr>
							</table>
					</fieldset>
				
				
					";
			}
		
		
		
		?>
		
		<br/>
		<input type="submit" name="next" value="Etape suivante" />
		<input type="submit" name="before" value="Retour à la page précédente" />
		<input type="submit" name="cancel" value="Annuler la réservation" />
		
		</form>
	</div>
		
	
	
</body>


</html>
