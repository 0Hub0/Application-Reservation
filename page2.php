<body>
	<h1>Detail des Reservations</h1> <br/>
	<div>
		<form method="POST" ACTION="newController.php" >
		<input type="hidden" name='view2' value=2>	
		
		<?php
			for ($i=0;$i<$_POST['nbrP'];$i++)
			{
				//$j=$i+1;
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
		<input type="reset" name="cancel" value="Annuler la réservation" />
		
		</form>
	</div>
		
	
	
</body>


</html>
