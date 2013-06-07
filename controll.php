<?php
$action="";

$action =$_POST['action'];

	switch($action){
		case "delete":
			require_once 'delete_view.php';
		break;
		
		case "confirm":
			require_once 'confirm_view.php';
		break;
		
		default:
			require_once 'form.php';
	}

?>