<html>
	<head>
		<meta charset="utf-8" />
		<title>Reservation</title>
		<LINK rel=stylesheet type "css" href="style.css">
	</head>
	<body>
		<h1>Confirmation des réservations</h1>
		<div>
		<form method='POST' action='newController.php'>
		<input type="hidden" name='view4' value=4>
			Votre demande a bien ete enregistrée.<br/>
			<?php
			$price=0;
					//Compute the price
					
					
					for($i=0;$i<$reserv->getnbrP();$i++)
					{
						if($pers->getage()[$i]<=12)
						{
							$price+=10;
							
							echo'Agé de moins de 12 ans';
							
						}
						else
						{
							$price+=15;
							echo'agé de plus de 12 ans';
						}
					}
					
					if($reserv->getassur() == 'OUI')
					{
						$price+=20;
					}
					
			

			echo "Merci de bien vouloir verser la somme de ".$price." euros sur le compte 000-000000-00";
			?>
			<br/><br/>
			<input type='submit' value ="Retour à la page d'acceuil">
			
		</form>
		</div>
	</body>
</html>
