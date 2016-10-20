<html>
<head>
	<title>
	Detail des Reservations
	</title>
	<LINK rel=stylesheet type "css" href="style.css">
	
</head>

<body>
	<h1>Detail des Reservations</h1> <br/>
	<div>
		<?php
			
			
			if (isset($_POST['nbrP'])) 
			{
			$nbrP=$_POST['nbrP'];	
			}
			else
			{
				echo("Pas de place(s) réservée(s)");
			}
			
			if (isset($_POST['dest'])) 
			{
			$dest=$_POST['dest'];	
			}
			
			if (isset($_POST['insur'])) 
			{
			$insur=$_POST['insur'];	
			}
			
			
			
			$a=1;
			if ($a=1 and $_POST['nbrP'] !=''  )
			{
				for ($a=1;$a<$nbrP['0'];$a++)
				{
				
				
					$out='	
				
						<tr>
							<td >Nom</td>
							<td><input type="text" name="nom"></td>
						</tr>
						<tr>
							<td>Age</td>
							<td><input type="text" name="age"></td>
						</tr>';
				
				
					echo '<table><tr><td rowspan="10">';
					echo $out;
					echo '</td></tr></table>';
								
	
				}
					
					echo '<table><tr><td rowspan="10">';
					echo $out;
					echo '</td></tr></table>';
					

			}
			
	
		?>
		
		
		

			
			
			
		
		
		
		
		<br/>
		<input type="submit" name="next" value="Etape suivante" />
		<input type="submit" name="before" value="Retour à la page précédente" />
		<input type="submit" name="cancel" value="Annuler la réservation" />
		
	</div>
		
	
	
</body>


</html>
