<?php
	session_start();
	
	include "models/modelR.php";
	include "models/modelP.php";	
	
	$reserv = new reservation();
	$pers= new person();
	
	// Check if the session already exists
	if (isset($_SESSION['reservation']))
	{
		$reserv = $_SESSION["res"];		
	}
	else
	{
		$reserv= new reservation;
		$_SESSION["res"]= $reserv;
	}
	
	// Error messages
	$mess1=NULL;
	$mess2=NULL;
	$mess3=NULL;
	$mess4=NULL;
	$action="";
	
	$errorForm1a=false;
	$errorForm1b=false;
	$errorForm1c=false;
	$errorForm2a=false;
	$errorForm2b=false;

	// Verify that the data from the form don't exist
	if(!isset($_POST['form1']) && !isset($_POST['form2']) && !isset($_POST['form3']) && !isset($_POST['form4']))
	{
		include 'views/form1.php';
	}
	switch(true)
	{
		// Check if the first form exists
		case isset($_POST['form1']) :
		{		
			$dest1=htmlspecialchars($_POST["dest"]);
			$nbrP1=$_POST["nbrP"];
			
			// Put the status of the insurance
			if(isset($_POST["assur"]))
			{
				$assur='OUI';
			}
			else
			{
				$assur='NON';
			}	
			
			// Verify that the 'dest' is neither empty and  neither a number otherwise there's an error
			if($_POST['dest']=='' || is_numeric($_POST['dest']))
			{
				$errorForm1a=true;
				$mess1='Veuillez entrer une destination';
			}
			
			//Verify that the entry nbrP is not empty 
			if($_POST['nbrP']=='' )
			{
				$errorForm1b=true;
				$mess2= "Veuillez entrer un nombre";
			}
			else
			{
				// Verify that the entry is a number between 1 and 10
				if (!is_numeric($_POST["nbrP"]) || $_POST["nbrP"] <1 || $_POST["nbrP"] > 10 )
				{
					$errorForm1c=true;
					$mess2="Veuillez entrer un nombre supérieur à 0 et inférieur à 10";		
				}
			}
				
			// If there's an error, the client stays on the first form
			if($errorForm1a == true || $errorForm1b ==true || $errorForm1c ==true)
			{
				include 'views/form1.php';
			}
				
			// Verify if the next page button is clicked
			// Send the client to the second page if the button is clicked
			if(isset($_POST['next1']))
			{	
				if($errorForm1a==false && $errorForm1b==false && $errorForm1c==false)
					{
						$_SESSION["dest"]=$dest1;	
						$_SESSION["nbrP"]=$nbrP1;	
						$_SESSION["assur"]=$assur;	

						include "views/form2.php";
					}
			}
			else
			{
				// If the resservation is cancelled, send the client to the first form
				if (isset($_POST["cancel"]))
				{
					session_destroy();
					include "views/form1.php";			
				}
			}	
		}
		break;		
			
		case isset($_POST['form2']):
		{	
			for($i=0;$i<count($_POST['nom']);$i++)
			{
				// Protect from XSS by filtering specific symbols
				$_POST['nom'][$i]=htmlspecialchars($_POST['nom'][$i]);
			}
	
			$name1=$_POST["nom"];
			$age1=$_POST["age"];
			
			if (isset($_POST["next2"]))
			{
				// Verify that there is not an error and save the passenger's name
				for($i=0;$i<$_SESSION['nbrP'];$i++)
				{	
					if (is_numeric($_POST['nom'][$i]) || $_POST['nom'][$i]=='')
					{
						$errorForm2a=true;
						$mess3='Veuillez entrer un nom pour chaque personne';
					}
					else
					{
						for ($i=0;$i<$_SESSION["nbrP"];$i++)
						{
							$pers->setname($name1)[$i];
						}		
					}
				}
				
				// Save the passenger's age if there is not an error
				for($i=0;$i<$_SESSION['nbrP'];$i++)
				{
					if(!is_numeric($_POST['age'][$i]))
					{
						$errorForm2b=true;
						$mess4="Veuillez entrer un âge supérieur à 0";
					}
					else
					{
						if($_POST['age'][$i]=='' || $_POST['age'][$i]<1 )
						{
							$errorForm2b=true;
							$mess4="Veuillez entrer un âge supérieur à 0";
						}
						else
						{
							$pers->setage($age1)[$i];
						}	
					}
					
				}		
				
				// If there's is an error, stay on the second form 
				if($errorForm2a==true || $errorForm2b==true)
				{
					include 'views/form2.php';
				}
				
				// If the client clicked on the button next and there is not an error
				// Send him/her to the next form
				if(isset($_POST['next2']))
				{	
					if($errorForm2a==false && $errorForm2b==false)
					{
						$_SESSION['age']=$age1;	
						$_SESSION['name']=$name1;	
						$reserv->setdest($_SESSION["dest"]);
						$reserv->setnbrP($_SESSION["nbrP"]);
						$reserv->setassur($_SESSION["assur"]);
		
						$pers->setage($_SESSION['age']);
						include 'views/form3.php';
					}	
				}
			}
			else
			{
				// If the client cancel his/her reservation, send him/her to the first form
				if(isset($_POST['cancel']))
				{
					session_destroy();
					include 'views/form1.php';
					break;
				}
				
				// Check if the client wants to go to the previous page
				// If yes, send him/her to the first form
				if(isset($_POST['before2']))
				{
					include 'views/form1.php';
				}
			}	
		}	
		break;
			
		case isset($_POST['form3']):
		{
			if (isset($_POST['next3']))
			{
				$price=0;
				
				// Compute the price
				for($i=0;$i<$_SESSION['nbrP'];$i++)
				{
					if($_SESSION['age'][$i]<=12)
					{
						$price=$price+10;
					}
					else
					{
						$price=$price+15;
					}
				}
				if($_SESSION['assur'] =='OUI')
				{
					$price=$price+20;					
				}
				
				$_SESSION['price']=$price;
				
				$reserv->setprice($_SESSION['price']);
			
				include 'views/form4.php';
			}
			else
			{
				// Check if the client wants to cancel his/her reservation 
				// If yes, send him/her to the first form
				if(isset($_POST['cancel']))
				{
					session_destroy();
					include 'views/form1.php';
				}
				
				// Check if the client wants to go to the previous page
				// If yes, send him/her to the second form
				if(isset($_POST['before3']))
				{
					include 'views/form2.php';
				}	
			}
		}	
		break;
				
		case isset($_POST["form4"]):
		{	
			// Save all the infomations needed for the reservation
			$reserv->setdest($_SESSION["dest"]);
			$reserv->setnbrP($_SESSION["nbrP"]);
			$reserv->setassur($_SESSION["assur"]);
			$reserv->setprice($_SESSION['price']);
			
			$pers->setage($_SESSION['age']);
			$pers->setname($_SESSION['name']);
					
			// Connection to the database
			$mysqli = new mysqli("localhost", "root", "test","trip") or
			die("Could not select database");
			if ($mysqli->connect_errno) 
			{
				echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
				" . $mysqli->connect_error;
			}
				
			// Execute the SQL query
			$query = "SELECT * FROM reservation";
			$result = $mysqli->query($query) or 
			die("Query failed (Exécuter requêtes SQL)");
			if ($result->num_rows == 0) 
			{
				echo "Aucune ligne trouvée, rien à afficher.";
			}
				
			// Loop that implements the database 
			for($i=0;$i<$_SESSION['nbrP'];$i++)
			{ 
				// Insertion of a recording
				$sql = "INSERT INTO `reservation` (`Id`,`Destination`,`Assurance`,`Prix`,`Nom`,`Age`)
				VALUES (NULL, '".$reserv->getdest()."', '".$reserv->getassur()."', '".$reserv->getprice()."', '".$pers->getname()[$i]."','".$pers->getage()[$i]."');";		
			}
			// Verify that the query is sent
			// And write a message if it is or if it's not
			if ($mysqli->query($sql) === TRUE) 
			{
				echo "Réservation effectuée sans problème ";
				$id_insert = $mysqli->insert_id;
			} 
			else 
			{
				echo "Error inserting record: " . $mysqli->error;
			}	
		
			// Close the connection
			$result->close();
			
			session_destroy();
			
			include 'views/form1.php';
		}
		break;
	}
?>