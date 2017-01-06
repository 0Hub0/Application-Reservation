<?php
	// Editing of the recording by completing a form
	// Then the form is sent to another page that handles the editing of the database
	echo "Veuillez completer les cases suivantes pour faire les changements:";
	echo'</br></br>';
	echo"";
	echo"
		<form method='POST' ACTION='endEdit.php?id=".$_GET['id']."' >
			<input type='hidden' name='formEdit' value=1>	
			<table>
				<tr>
					<td>Destination :</td>
					<td><input type ='text' name='destEd'  maxlength= '30'></td>
				</tr>
				<tr>
					<td>Assurance annulation:</td>
					<td><input type ='checkbox' name ='assurEd' value='NON'<br/></td>
				</tr>	
				<tr>	
					<td>Nom:</td>
					<td><input type ='text' name ='nameEd' <br/></td>
				</tr>
				<tr>
					<td>Age:</td>
					<td><input type ='texte' name ='ageEd' <br/></td>
				</tr>
			</table>
			<br/><br/>				
			<input type='submit' name='texte' value='Fin Modification' />
		</form>";
?>