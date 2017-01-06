<?php
	if (isset($_GET['id'])) 
	{
        $id = $_GET['id'];
    }
	
	$action=$_GET['action'];
	
	// Decide which action to take, depending on the value of $action [Edit or Delete]	
	if($action=='edit')
	{
		include 'indexEd.php';
	}
	elseif($action=="delete")
	{
		include 'indexDel.php';
	}
	else
	{
		$action=null;
	}
?>