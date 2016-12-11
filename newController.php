<?php
	session_start();
	include "modelR.php";
	include "modelP.php";
	
	/*
	// put the value of destination, number of place , statut of assurance  in model reservation
	$reserv ->setdest($_SESSION['dest']);
	$reserv -> setnbrP($_SESSION['nbrP']);
	$reserv -> setassur($_SESSION['assur']);
	//$reserv -> setStatus($_SESSION['status']);
	
	// put the value of passenger, age , trip Id  in model personne
	$pers = new Personne();
	$pers ->  setname($_SESSION['Voyageur']);
	$pers ->  setage($_SESSION['AgeVoyageur']);
	$pers ->  setIdres($_SESSION['reservationId']);
	*/

	
	$reserv = new reservation();
	$pers= new person();
	
	$mess1=NULL;
	$mess2=NULL;
	$mess3=NULL;
	$mess4=NULL;
	//Error message
	$errorView1a=false;
	$errorView1b=false;
	$errorView1c=false;
	$errorView2a=false;
	$errorView2b=false;
	
	
	//Verify if session already exists
	if (isset($_SESSION['reservation']))
	{
		$reserv = $_SESSION["res"];		
	}
	else
	{
		$reserv= new reservation;
		$_SESSION["res"]= $reserv;

	}
	

	
	//Verify that the data from the view doesn't exist
	if(!isset($_POST['view1']) && !isset($_POST['view2']) && !isset($_POST['view3']) && !isset($_POST['view4']))
	{
		include 'page1.php';
	}
	
		switch(true)
		{
			//Verify the entry of the reservation view is not empty and put the value in post
			//to param destination and place number
			case isset($_POST['view1']) :
			{	
				$dest1=$_POST["dest"];
				$nbrP1=$_POST["nbrP"];
								
				//Put the status of assurance
				if(isset($_POST["assur"]))
				{
					$assur='OUI';
				}
				else
				{
					$assur='NON';
				}
				
				//Verify the entry dest is neither empty and  neither a number otherwise there's an error
				if($_POST['dest']=='' || is_numeric($_POST['dest']))
				{
					$errorView1a=true;
					$mess1='Veuillez entrer une destination';
				}
				
				
				//Verify the enty nbrP is not empty 
				if($_POST['nbrP']=='' )
				{
					$errorView1b=true;
					$mess2= "Veuillez entrer un nombre";
				}
				else
				{
					// Verify the entry is a number between 1 and 10
					if (!is_numeric($_POST["nbrP"]) || $_POST["nbrP"] <1 || $_POST["nbrP"] > 10 )
					{
						$errorView1c=true;
						$mess2="Veuillez entrer un nombre supérieur à 0 et inférieur à 10";
						
					}
					
				}
				
				// If there's an error, stay on the reservation view
				if($errorView1a == true || $errorView1b ==true || $errorView1c ==true)
				{
					include 'page1.php';
					
				}
				
				//Verify if the next button is clicked
				if(isset($_POST['next1']))
				{	
					if($errorView1a==false && $errorView1b==false && $errorView1c==false)
					{
						$_SESSION["dest"]=$dest1;	
						$_SESSION["nbrP"]=$nbrP1;	
						$_SESSION["assur"]=$assur;	

						include "page2.php";
						
					}
				}
				else
				{
					// If there is an error, go to the page1
					if (isset($_POST["cancel"]))
					{
						session_destroy();
						include "page1.php";
						
					}
				}	
			}
			break;		
			
			case isset($_POST['view2']):
			{
				$name1=$_POST["nom"];
				$age1=$_POST["age"];
				
				if (isset($_POST["next2"]))
				{
					// For each passenger
					for($i=0;$i<$_SESSION['nbrP'];$i++)
					{
						//$_SESSION['name']=$_POST['nom'][$i];
						if (is_numeric($_POST['nom'][$i]) || $_POST['nom'][$i]=='')
						{
							$errorView2a=true;
							$mess3='Veuillez entrer un nom pour chaque personne';
						}
						else
						{
							for ($i=0;$i<$_SESSION["nbrP"];$i++)
							{
								$pers->setname($name1)[$i];
							}
								
						}
					
						for ($i=0;$i<$_SESSION["nbrP"];$i++)
						{
							if ($_POST['age'][$i]=='' ||  !is_numeric($_POST['age'][$i]) || $_POST['age'][$i]<1 )
							{
								$errorView2b==true;
								$mess4="Veuillez entrer un âge supérieurr à 0";
							}
							else
							{
								$pers->setage($age1)[$i];
							}
						}
							
					}
					
					if($errorView2a==true || $errorView2b==true)
					{
						include 'page2.php';
					}
					
					if(isset($_POST['next2']))
						{	
							if($errorView2a==false && $errorView2b==false)
							{
								$_SESSION['age']=$age1;	
								$_SESSION['name']=$name1;	
								$reserv->setdest($_SESSION["dest"]);
								$reserv->setnbrP($_SESSION["nbrP"]);
								$reserv->setassur($_SESSION["assur"]);
								
								$pers->setage($_SESSION['age']);
								include 'page3.php';
							}	
						}
					
				}
				else
				{
					if(isset($_POST['cancel']))
					{
						session_destroy();
						include 'page1.php';
						break;
					}
					
					if(isset($_POST['before2']))
					{
						include 'page1.php';
					}
				}		
		
			}	
			break;
			
			case isset($_POST['view3']):
			{
				if (isset($_POST['next3']))
				{
					$price=0;
					//Compute the price
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
				
				
				
				include 'page4.php';
				}
				else
				{
					if(isset($_POST['cancel']))
					{
						session_destroy();
						include 'page1.php';
					}
					
					if(isset($_POST['before3']))
					{
						include 'page2.php';
					}	
				}
			}	
			break;
				

			case isset($_POST["view4"]):
			{	
				$reserv->setdest($_SESSION["dest"]);
				$reserv->setnbrP($_SESSION["nbrP"]);
				$reserv->setassur($_SESSION["assur"]);
				$reserv->setprice($_SESSION['price']);
				
				$pers->setage($_SESSION['age']);
				$pers->setname($_SESSION['name']);
				
				
				// Connexion et sélection de la base
				$mysqli = new mysqli("localhost", "root", "test","trip") or
				die("Could not select database");
				if ($mysqli->connect_errno) 
				{
					echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")
					" . $mysqli->connect_error;
				}
				
				// Exécuter des requêtes SQL
				$query = "SELECT * FROM reservation";
				$result = $mysqli->query($query) or 
				die("Query failed (Exécuter requêtes SQL)");
				
				if ($result->num_rows == 0) 
				{
					echo "Aucune ligne trouvée, rien à afficher.";
					//exit;
				}
				
				// Insertion d'un enregistrement
				$sql = "INSERT INTO `reservation` (`Id`,`Destination`,`Assurance`,`Prix`,`Nom`,`Age`)
				VALUES (NULL, '".$reserv->getdest()."', '".$reserv->getassur()."', '".$reserv->getprice()."', '".$pers->getname()[0]."','".$pers->getage()[0]."');";
				
				if ($mysqli->query($sql) === TRUE) 
				{
					echo "Record updated successfully";
					$id_insert = $mysqli->insert_id;
				} 
				else 
				{
					echo "Error inserting record: " . $mysqli->error;
				}	
				
				
			
			// Afficher les résultats****************
				
				// Affichage des entêtes de colonnes
				echo "<table>\n<tr>";
				
				while ($finfo = $result->fetch_field())
				{ 
					echo '<th>'. $finfo->name .'</th>'; 
				}
				
				echo "</tr>\n";
				
				// Afficher des résultats en HTML
				while ($line = $result->fetch_assoc()) 
				{
					echo "\t<tr>\n";
					foreach ($line as $col_value) 
					{
						echo "\t\t<td>$col_value</td>\n";
					}
					echo "\t</tr>\n";
				}
				echo "</table>\n";
				
				
				/*
				// Récupération du résultat sous forme d'un tableau associatif
				$result = $mysqli->query($query) or die("Query failed (Récupération résult talbeau)");
				while ($line = $result->fetch_array(MYSQLI_ASSOC))
				{
					echo $line['lastname'].'<BR>';
				}
				*/
				
				// Libération des résultats
				$result->close();
				// Fermeture de la connexion								
				
				
												
					

					
						
				/*
				Boucle implémentant la dataBase
				for($i=0;$i<$_SESSION['nbrP'];$i++)
				{  		
		
						// insert from model person the data person into database 
						$sqlinsert2 = "INSERT INTO `personne` (`id`, `nom`, `age`, `reservationId`)VALUES ('', '".$pers->getname()."',".$pers->getage().",".$pers -> getId().");";
						
						if ($connection->query($sqlinsert2) === TRUE)
						{
							
						}
						else 
						{
							//if error of record person data do to the view resrvation 
							//include 'page1.php';
							echo 'FALSE2';
						}
						
				};
				*/
				//??????????????????????????????
				
				session_destroy();
				include 'page1.php';
			}
			break;
		}
		
	









?>
