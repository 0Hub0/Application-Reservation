<html>
	<head>
		<meta charset="utf-8"/>
		<title>Reservation</title>
		<LINK rel=stylesheet type "css" href="../style.css">	
	</head>
	<body>
		<h1>Detail des Reservations</h1> <br/>
		<div>
			<?php
				// Show an error message if there is one
				if($mess3 !=NULL)
				{
					echo "<font color='red'>".$mess3."</font></br>";
				}
				if($mess4 !=NULL)
				{
					echo "<font color='red'>".$mess4."</font></br>";
				}
			?>
			
			<form method="POST" ACTION="../index.php">
				<input type="hidden" name='form2' value=2>	
				<?php
					for ($i=0;$i<$_SESSION["nbrP"];$i++)
					{
						echo "
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
							";
					}	
				?>
				<br/>
				<input type="submit" name="next2" value="Etape suivante" />
				<input type="submit" name="before2" value="Retour à la page précédente" />
				<input type="submit" name="cancel" value="Annuler la réservation" />
			</form>
		</div>
	</body>
</html>