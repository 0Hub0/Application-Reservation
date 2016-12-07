<?php
	session_start();
	include "modelR.php";
	include "modelP.php";
	
	$reserv = new reservation();
	$pers= new person();
	
	
	
	
	//Instantiate Destination-NumberofPlace-Status of insurance
	//$reserv -> setdest($_SESSION["dest"]);
	//$reserv -> setnbrP($_SESSION["nbrP"]);
	//$reserv -> setassur($_SESSION["assur"]);
	//$reserv -> s
	
	//Instantiate Passenger - Age - Trip ID
	
	/*
	$pers -> setname($_SESSION["Trav"]);
	$pers -> setage($_SESSION["ageTrav"]);
	$pers -> setIDres ($_SESSION["Idres"]);
	*/
	
	
	
	
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
	
	
	$price=0;
	//$reserv;
	
	
	//Verify if session already exists
	if (isset($_SESSION['reservation']))
	{
		$reserv = $_SESSION["res"];
		
		echo "!!!!!session existe !!!!A enlever!!!!";
		
		/*
		$reserv -> setdest($_SESSION["dest"]);
		$reserv -> setnbrP($_SESSION["nbrP"]);
		$reserv -> setassur($_SESSION["assur"]);
		
		
		$pers -> setname($_SESSION["Trav"]);
		$pers -> setage($_SESSION["ageTrav"]);
		$pers -> setIDres ($_SESSION["Idres"]);
		*/
		
	}
	else
	{
		
		$reserv= new reservation;
		$_SESSION["res"]= $reserv;
		
		echo"session n'existe pas  donc on a fabriqué !!!A enlever!!!";
			
		
	}
	
	
	
	
	//Verify that the data from the view doesn't exist
	
	if(!isset($_POST['view1']) && !isset($_POST[' view2']) && !isset($_POST[' view3']) && !isset($_POST[' view4']))
	{
		include 'page1.php';
		echo'test1';
		/*
		$reserv->getdest();
		$reserv->getnbrP();
		$reserv->getassur();
		*/
		
	}
	
		switch(true)
		{
			//??
			//Verify the entry of the reservation view is not empty and put the value in post
			//to param destination and place number
			case isset($_POST['view1']) && !isset($_POST['view2']) && !isset($_POST['view3']) && !isset($_POST['view4']) :
				
			
				$dest1=$_POST["dest"];
				$nbrP1=$_POST["nbrP"];
				
				
				
				//$_SESSION["dest"]=$_POST["dest"];
				//$_SESSION["nbrP"]=$_POST["nbrP"];
				
				
				
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
					$mess1='Veuillez entre une destination';
					echo'aa';
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
					if (!is_numeric($_POST['nbrP']) || $_POST['nbrP'] <1 || $_POST['nbrP'] > 10 )
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
						$_SESSION["dest"]=$dest1;	//ou $reserv->setdest() ?????
						$_SESSION["nbrP"]=$nbrP1;	//ou $reserv->setnbrP()
						
						
						
						
						
						$_SESSION["assur"]=$assur;	//ou $reserv->setassur()
						
						
						
						
						//$_SESSION['stat']
						
					
						
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
				
			
			break;		
			
			case isset($_POST['view2']):
			
					
				$name1=$_POST["nom"];
				$age1=$_POST["age"];
				
				
				
				echo 'vue 2 ok';
				if (isset($_POST["next2"]))
				{
					
		
					// For each passenger
					for($i=0;$i<$_SESSION['nbrP'];$i++)
					{
						//$_SESSION['name']=$_POST['nom'][$i];
						if (is_numeric($_POST['nom']) || $_POST['nom']=='')
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
						if ($_POST['age'][$i]=='' ||  !is_numeric($_POST['age'][$i]) || $_POST['age'][$i]<0 )
						{
							$errorView2b==true;
							$mess4="Veuillez un âge supérieurr à 0";
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
					else
					{
						
						
						
						$_SESSION['age']=$age1;
						$_SESSION['name']=$name1;
						//$_SESSION['assur']=$assur1;
						
						
						$reserv->setdest($_SESSION["dest"]);
						$reserv->setnbrP($_SESSION["nbrP"]);
						$reserv->setassur($_SESSION["assur"]);
						
						//$pers->setname($name1[0]);
						
						include 'page3.php';
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
					
					if(isset($_POST['before']))
					{
						include 'page1.php';
					}
				}
				
					
		
			
			break;
			
			case isset($_POST['view3']):
			
				echo 'vue3 ok';
				
				if (isset($_POST['next3']))
				{
					echo $pers->getage();
					
					$price=0;
					//Compute the price
					for($i=0;$i<$reserv->getnbrP();$i++)
					{
						if($pers->getage()[$i]<=12)
						{
							$price+=10;
							
							
						}
						else
						{
							$price+=15;
						}
					}
					
					if($reserv->getassur() =='OUI')
					{
						$price+=20;
						
					}
					
					$reserv->setprice($price);
					echo $reserv->getprice();
				include 'page4.php';
				}
				else
				{
					if(isset($_POST['cancel']))
					{
						session_destroy();
						include 'page1.php';
					}
					
					if(isset($_POST['before2']))
					{
						include 'page2.php';
					}	
				}
			
			break;
				
				
				
			
			case isset($_POST["view4"]):
			
				echo 'vue4 OK';
				
				session_destroy();
				include 'page1.php';
			
			
			break;
		}
		
	









?>
