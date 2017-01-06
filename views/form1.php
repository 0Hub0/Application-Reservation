<html>
	<head>
		<meta charset="utf-8"/>
		<title>Reservation</title>
		<LINK rel=stylesheet type= "css" href="../style.css">
	</head>
	<body>
		<h1>Reservation</h1>
		<div>
			<?php
				// Show the error message if there is one
				if($mess1 !=NULL)
				{
					echo "<font color='red'>".$mess1."</font></br>";
				}
				if($mess2 !=NULL)
				{
					echo "<font color='red'>".$mess2."</font></br>";
				}
			?>
			
			Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.<br/>
			Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.
			<br/><br/>
			<form method="POST" ACTION="../index.php>
				<input type="hidden" name='form1' value=1>	
				<table>
					<tr>
						<td>Destination :</td>
						<td><input type ="text" name="dest" value="" maxlength= "30"></td>
					</tr>
					<tr>
						<td>Nombre de places: </td>
						<td><input type="text" name="nbrP" value=""><br/> </td>
					</tr>
					<tr>
						<td>Assurance annulation:</td>
						<td><input type ="checkbox" name ="assur" value=""><br/></td>
					</tr>
				</table>
				<br/>
				<input type="submit" name="next1" value="Etape Suivante" />
				<input type="reset" name="cancel" value="Annuler la reservation" />
			</form>
		</div>
	</body>

</html>