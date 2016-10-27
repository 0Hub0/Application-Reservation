<?php
	session_start();
	include "modelR.php";
	include "modelP.php";
	
	$reserv= new reservation();
	//Instantiate Destination-NumberofPlace-Status of insurance
	$reserv -> setdest($_SESSION['city']);
	$reserv -> setnbrP($_SESSION["nbrP"]);
	$reserv -> setassur($_SESSION["assur"]);
	
	//Instantiate Passenger - Age - Trip ID
	$pers = new Person();
	$pers -> setname($_SESSION["Trav"]);
	$pers -> setage($_SESSION["ageTrav"]);
	$pers -> setIDres ($_SESSION["Idres"]);

	
	//Verify if session already exists
	if (isset($_SESSION['reservation']))
	{
		$reservation=$_SESSION["reservation"];
		echo"session existe !!!!A enlever!!!";
	}
	else
	{
		$reservation = new Reservation;
		echo"session n'existe pas !!!A enlever!!!";
	}
	
	//Verify that the data from the view doesn't exist
	if(!isset($_POST['view1']) && !isset($_POST[' view2']) && !isset($_POST[' view3']) && !isset($_POST[' view4']))
	{
		include 'page1.php';
	}
	else
	{
		switch(TRUE)
		{
			//??
			//Verify the entry of the reservation view is not empty and put the value in post
			//to param destination and place number
			case isset($_POST['view1'])
			{
				$dest1=$_POST['dest'];
				$nbrP1=$_POST['nbrP'];
					//Put the status of assurance
					if(isset($_POST['assur']) && $_POST['assurance' ==true )
					{
						$assur='OUI';
					}
					else
					{
						$assur='NON';
					}
					//Verify the entry des is not empty and  is a number otherwise there's an error
					if($_POST['dest']=='' || is_numeric(!$_POST['dest']))
					{
						$errorView1a=true;
						$mess1='Veuillez entre une destination';
					}
					//Verify the enty nbrP is not empty or is a number otherwise there's an error
					if($_POST['nbrP']=='' || is_numeric(!$_POST['nbrP']))
					{
						$errorView1b=true;
						echo "Veuillez entrer le nombre de place désirer";
					}
					else
					{
						/
					}
				
				
				
				
			}
			
		}
		
	}

	



		









?>
