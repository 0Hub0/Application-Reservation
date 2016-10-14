<html>
<head>
	<title>
	Reservation
	</title>
	<LINK rel=stylesheet type "css" href="style.css">
	
	
	
</head>

<body>
	<h1>Reservation</h1>
	<div>
	Le prix de la place est de 10 euros jusqu'&agrave 12 ans et ensuite de 15 euros.<br/>
	Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.
	<br/><br/>
	
	
	
	
	<table>
		<form method="POST">
			<tr>
				<td>Destination :</td>
				<td><input type ="text" name="dest[]"></td>
			</tr>
			<tr>
				<td>Nombre de places: </td>
				<td><input type="text" name="nbrP[]"><br/></td>
			</tr>
			<tr>
				<td>Assurance annulation:</td>
				<td><input type ="checkbox" name ="insur"><br/></td>
			</tr>
	</table>
		
		<br/>
		<input type="submit" name="envoyer" value="Etape Suivante" onclick="alert($suiv)/>
		<input type="submit" name="retour" value="Annuler la reservation"/>
	</form>
		
	</div>
	
	
	
	
	
	<?php 
	//!!!faire un pop-up!!!!
	/* A Modifier
	$res= href="index2.html";
	$suiv= "<button type=\"button\" onclick=\"alert($res)\" >Test</button>";
	
	$listeDest=$_POST["dest"];
	//Attention &agrave = à en HTML

	foreach ($listeDest as $dest)
	{
		echo $dest . '<br>';
		echo $suiv;
	}
	*/
	?>


</body>

</html>