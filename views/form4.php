<html>
	<head>
		<meta charset="utf-8" />
			<title>Reservation</title>
			<LINK rel=stylesheet type "css" href="../style.css">
	</head>
	<body>
		<h1>Confirmation des réservations</h1>
		<div>
			<form method='POST' action='../index.php'>
				<input type="hidden" name='form4' value=4>
				Votre demande a bien été enregistrée.<br/>	
				Merci de bien vouloir verser la somme de <?php echo $reserv->getPrice() ?> euros sur le compte 000-000000-00
				<br/><br/>
				<input type='submit' value ="Retour à la page d'accueil">
			</form>
		</div>
	</body>
</html>